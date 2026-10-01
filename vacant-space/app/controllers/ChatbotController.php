<?php

class ChatbotController extends Controller {

    /**
     * Main conversation endpoint for Brewer Guide
     */
    public function ask() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $input = json_decode(file_get_contents('php://input'), true);
        $message = trim($input['message'] ?? '');
        $context = $input['context'] ?? []; // e.g. current page, selected beer, filter

        if (empty($message)) {
            $this->json(['error' => 'Please ask a question or select a topic!'], 400);
            return;
        }

        // Retrieve beers & customer profile
        $allBeers = Database::getBeers();
        $user = $_SESSION['user'] ?? null;

        // Process message through Brewer Guide Intelligence Architecture
        $response = $this->processBrewerGuideQuery($message, $allBeers, $user, $context);

        // Award Krewe gamification points for chatting (5 pts)
        $pointsEarned = 5;
        if (isset($_SESSION['user'])) {
            $_SESSION['user']['points'] = ($_SESSION['user']['points'] ?? 1450) + $pointsEarned;
        }

        // Record Analytics Event (Layer 4)
        $this->recordAnalyticsEvent('chatbot_message', [
            'query' => $message,
            'has_recommendations' => !empty($response['recommendations']),
            'customer' => $user['name'] ?? 'Guest Limer'
        ]);

        if (!empty($response['recommendations'])) {
            $this->recordAnalyticsEvent('recommendation_generated', [
                'count' => count($response['recommendations']),
                'top_match' => $response['recommendations'][0]['name'] ?? 'N/A',
                'customer' => $user['name'] ?? 'Guest Limer',
                'source' => 'Brewer Guide AI'
            ]);
        }

        $this->json([
            'reply' => $response['reply'],
            'recommendations' => $response['recommendations'] ?? [],
            'suggestedChips' => $response['suggestedChips'] ?? [],
            'pointsAwarded' => $pointsEarned,
            'userPoints' => $_SESSION['user']['points'] ?? 1450
        ]);
    }

    /**
     * Dedicated API endpoint for direct recommendation queries
     */
    public function getRecommendations() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $allBeers = Database::getBeers();
        $user = $_SESSION['user'] ?? null;
        $scored = $this->calculateRecommendationScores($allBeers, $user);

        $this->json([
            'success' => true,
            'recommendations' => array_slice($scored, 0, 4)
        ]);
    }

    /**
     * Track recommendation interaction events (Layer 4 Feedback Loop)
     */
    public function trackEvent() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $input = json_decode(file_get_contents('php://input'), true);
        $eventType = $input['event'] ?? 'recommendation_view';
        $data = $input['data'] ?? [];

        $this->recordAnalyticsEvent($eventType, $data);

        $this->json(['success' => true]);
    }

    /**
     * Brewer Guide Core Intent & Natural Language Intelligence Engine
     */
    private function processBrewerGuideQuery($query, $allBeers, $user, $context) {
        $q = strtolower($query);

        // 1. COMPARISON: "What's the difference between Island IPA and OCD Saison?"
        if ((str_contains($q, 'difference') || str_contains($q, 'compare') || str_contains($q, 'vs')) && 
            (str_contains($q, 'island ipa') || str_contains($q, 'ocd saison') || str_contains($q, 'stout') || str_contains($q, 'blonde'))) {
            return $this->handleBeerComparison($q, $allBeers);
        }

        // 2. BEER MATCH: Commercial beers (Heineken, Carib, Stag, Guinness, Corona, etc.)
        if (str_contains($q, 'heineken') || str_contains($q, 'carib') || str_contains($q, 'stag') || 
            str_contains($q, 'guinness') || str_contains($q, 'corona') || str_contains($q, 'budweiser') || 
            str_contains($q, 'blue moon') || str_contains($q, 'normally drink') || str_contains($q, 'similar to')) {
            return $this->handleCommercialBeerMatch($q, $allBeers);
        }

        // 3. FIND MY BEER: Flavor & Mood Preferences
        if (str_contains($q, 'refreshing') || str_contains($q, 'strong') || str_contains($q, 'bitter') || 
            str_contains($q, 'sweet') || str_contains($q, 'light') || str_contains($q, 'complex') || 
            str_contains($q, 'surprise me') || str_contains($q, 'find my beer') || str_contains($q, 'mood')) {
            return $this->handleFindMyBeer($q, $allBeers, $user);
        }

        // 4. MY RECOMMENDATIONS: Personalized advice
        if (str_contains($q, 'my recommendation') || str_contains($q, 'recommend for me') || 
            str_contains($q, 'what should i try') || str_contains($q, 'what would you recommend') || 
            str_contains($q, 'suggest') || str_contains($q, 'pick for me') || str_contains($q, 'recommendation')) {
            return $this->handlePersonalizedRecommendations($allBeers, $user);
        }

        // 5. EDUCATIONAL / BEER GUIDE: "What does IBU mean?", "What is ABV?", "Why bitter?"
        if (str_contains($q, 'ibu') || str_contains($q, 'abv') || str_contains($q, 'why does this beer taste bitter') || 
            str_contains($q, 'teach me') || str_contains($q, 'what is an ipa') || str_contains($q, 'saison') || 
            str_contains($q, 'gose') || str_contains($q, 'kolsch') || str_contains($q, 'stout')) {
            return $this->handleEducationalQuery($q, $allBeers);
        }

        // 6. SHOP ASSISTANT: Price, Inventory & Seasonal queries
        if (str_contains($q, 'under $20') || str_contains($q, 'under 20') || str_contains($q, 'cheap') || 
            str_contains($q, 'low in stock') || str_contains($q, 'available') || str_contains($q, 'seasonal') || 
            str_contains($q, 'gift') || str_contains($q, 'price') || str_contains($q, 'shop')) {
            return $this->handleShopAssistantQuery($q, $allBeers);
        }

        // 7. THE KREWE GAMIFICATION: Points, Tiers, Rewards
        if (str_contains($q, 'krewe') || str_contains($q, 'points') || str_contains($q, 'tier') || 
            str_contains($q, 'reward') || str_contains($q, 'rank') || str_contains($q, 'badge') || str_contains($q, 'loyalty')) {
            return $this->handleKreweQuery($user);
        }

        // 8. BREWING PROCESS / STORY / GENERAL
        if (str_contains($q, 'mash') || str_contains($q, 'boil') || str_contains($q, 'ferment') || 
            str_contains($q, 'brew') || str_contains($q, 'process') || str_contains($q, 'story')) {
            return $this->handleBrewingProcessQuery($q);
        }

        // Default Smart Response with Starter Suggestions
        return [
            'reply' => "Greetings! I'm **Brewer Guide**, your AI Beer Advisor at Jeff Brewery. I combine brewing science, live inventory, and your personal taste preferences to help you discover the perfect pint.\n\nHere are some things we can do together:",
            'suggestedChips' => [
                '🍺 Find My Beer',
                '🔍 Similar to Island IPA',
                '🧠 My Recommendations',
                '📚 Teach me about IPAs',
                '🛒 Beers Under $20',
                '🏆 Check Krewe Points'
            ],
            'recommendations' => []
        ];
    }

    /**
     * Section 2: Beer Comparison
     */
    private function handleBeerComparison($q, $allBeers) {
        $ipa = Database::getBeerById('island-ipa');
        $saison = Database::getBeerById('ocd-saison');

        $reply = "Here's how **Island IPA** and **OCD Saison** compare side-by-side across our brewery specs:\n\n" .
                 "• **Beer Style**: Island IPA is a classic West Coast-style IPA, whereas OCD Saison is a Belgian-inspired farmhouse ale.\n" .
                 "• **Strength (ABV)**: Island IPA sits at **6.5% ABV**, while OCD Saison packs a slightly punchier **6.8% ABV**.\n" .
                 "• **Bitterness (IBU)**: Island IPA is boldly bitter at **65 IBU** (pine & citrus rind). OCD Saison is much milder in bitterness at **28 IBU**, emphasizing spicy yeast esters instead.\n" .
                 "• **Flavor Profile**: Island IPA hits with pine resin, passionfruit, and a dry crisp finish. OCD Saison delivers complex white pepper, bubblegum esters, and rustic farmhouse earthy malt.\n" .
                 "• **Body & Refreshment**: Island IPA is medium-bodied with punchy carbonation. OCD Saison has a dry, effervescent champagne-like finish.\n\n" .
                 "**Brewer's Take:** If you crave hop bitterness and tropical punch, go for **Island IPA**. If you want complex spice, aromatic depth, and a dry effervescence, pick **OCD Saison**!";

        return [
            'reply' => $reply,
            'recommendations' => [$ipa, $saison],
            'suggestedChips' => ['Show me IPAs', 'Tell me about OCD Saison', 'What beers are under $20?']
        ];
    }

    /**
     * Section 9: Commercial Beer Match
     */
    private function handleCommercialBeerMatch($q, $allBeers) {
        if (str_contains($q, 'heineken') || str_contains($q, 'carib') || str_contains($q, 'stag') || str_contains($q, 'corona') || str_contains($q, 'budweiser')) {
            $lager = Database::getBeerById('jouvert-lager');
            $kolsch = Database::getBeerById('sugarcane-kolsch');

            return [
                'reply' => "If you enjoy clean, crisp commercial lagers like Heineken, Carib, or Stag, you'll love **J'ouvert Lager** (5.0% ABV, $15.00)!\n\n" .
                           "It delivers that familiar ultra-crisp, thirst-quenching snap, but brewed with artisanal malt and natural carbonation for a smoother, fresher finish without adjunct chemicals. For something with a gentle tropical twist, **Sugarcane Kölsch** (5.2% ABV, $16.00) offers pure Couva sugar mill heritage with a hint of lime.",
                'recommendations' => [$lager, $kolsch],
                'suggestedChips' => ['Add J\'ouvert Lager to Cart', 'What is Sugarcane Kölsch?', 'Check my Krewe points']
            ];
        }

        if (str_contains($q, 'guinness') || str_contains($q, 'mackeson')) {
            $stout = Database::getBeerById('bitter-truth-stout');
            $robber = Database::getBeerById('midnight-robber');

            return [
                'reply' => "Big fan of dark roasts like Guinness or Mackeson? Our **Bitter Truth Stout** (7.2% ABV, $20.00) is right in your wheelhouse! It features intense roasted barley, dark cocoa, and bold espresso depth with a velvety mouthfeel.\n\n" .
                           "If you want even bolder character, check out **Midnight Robber** (8.0% ABV, $25.00) — an imperial strength Caribbean stout brewed with dark molasses.",
                'recommendations' => [$stout, $robber],
                'suggestedChips' => ['Bitter Truth Stout details', 'What is highest ABV?', 'Find My Beer']
            ];
        }

        if (str_contains($q, 'similar to island ipa') || str_contains($q, 'like island ipa')) {
            $saison = Database::getBeerById('ocd-saison');
            $stout = Database::getBeerById('bitter-truth-stout');
            $maracas = Database::getBeerById('maracas-mist');

            return [
                'reply' => "You like Island IPA but want to branch out? Here are the top ranked matches using our recommendation engine:\n\n" .
                           "1. **OCD Saison (91% Match)** — Different yeast profile, but matches your preference for high ABV (6.8%) and complex aromatics.\n" .
                           "2. **Bitter Truth Stout (84% Match)** — Retains bold bitterness (55 IBU) and high alcohol (7.2%), transitioning into rich cocoa and roasted malts.\n" .
                           "3. **Maracas Mist (72% Match)** — Shares the vibrant citrus zest notes, but in an easy-drinking 4.8% wheat ale body.",
                'recommendations' => [$saison, $stout, $maracas],
                'suggestedChips' => ['Order OCD Saison', 'What is OCD Saison?', 'Surprise me']
            ];
        }

        // Generic similar match
        return $this->handlePersonalizedRecommendations($allBeers, null);
    }

    /**
     * Section 8: Find My Beer
     */
    private function handleFindMyBeer($q, $allBeers, $user) {
        $recs = [];
        $reply = "";

        if (str_contains($q, 'refreshing') || str_contains($q, 'light')) {
            $recs = [
                Database::getBeerById('jouvert-lager'),
                Database::getBeerById('maracas-mist'),
                Database::getBeerById('sugarcane-kolsch')
            ];
            $reply = "Looking for pure island refreshment? These crisp, lower-ABV brews will beat the Trinidad heat:\n\n" .
                     "• **J'ouvert Lager (5.0%)** — Pure sessionable snap, perfect for liming in the sun.\n" .
                     "• **Maracas Mist (4.8%)** — Refreshing wheat beer with citrus zest and coriander notes.\n" .
                     "• **Sugarcane Kölsch (5.2%)** — Crisp German-style ale with subtle sweet cane nectar.";
        } elseif (str_contains($q, 'strong') || str_contains($q, 'highest')) {
            $recs = [
                Database::getBeerById('midnight-robber'),
                Database::getBeerById('bitter-truth-stout'),
                Database::getBeerById('ocd-saison')
            ];
            $reply = "Looking for beers with serious backbone and depth? Here are our heavy hitters:\n\n" .
                     "• **Midnight Robber (8.0% ABV)** — Our strongest brew, layered with rich molasses and dark roasted character.\n" .
                     "• **Bitter Truth Stout (7.2% ABV)** — Robust, velvety cocoa and espresso punch.\n" .
                     "• **OCD Saison (6.8% ABV)** — Farmhouse complexity with peppery warming alcohol.";
        } elseif (str_contains($q, 'bitter') || str_contains($q, 'hop')) {
            $recs = [
                Database::getBeerById('island-ipa'),
                Database::getBeerById('soca-starter'),
                Database::getBeerById('bitter-truth-stout')
            ];
            $reply = "For true hopheads who love an upfront punch of bitterness:\n\n" .
                     "• **Island IPA (65 IBU)** — Resinous pine and passionfruit bitterness upfront with a crisp dry finish.\n" .
                     "• **Bitter Truth Stout (55 IBU)** — Deep roasted bitterness that balances the heavy malt.\n" .
                     "• **Soca Starter (45 IBU)** — Vibrant tropical hop burst with a lighter 5.5% session ABV.";
        } elseif (str_contains($q, 'sweet') || str_contains($q, 'tart') || str_contains($q, 'fruit')) {
            $recs = [
                Database::getBeerById('soca-sorrel'),
                Database::getBeerById('tamarind-gose'),
                Database::getBeerById('brechin-castle')
            ];
            $reply = "Looking for fruit-forward, sweeter, or tangy notes?\n\n" .
                     "• **Soca Sorrel Ale (5.8%)** — Tart hibiscus, spicy ginger, and holiday clove.\n" .
                     "• **Tamarind Gose (4.5%)** — Tangy tamarind street food soul with sea salt and coriander.\n" .
                     "• **Brechin Castle (4.2%)** — Gentle biscuit sweetness and honeyed malt heritage.";
        } else {
            // Surprise me / General Find My Beer
            $scored = $this->calculateRecommendationScores($allBeers, $user);
            $recs = array_slice($scored, 0, 3);
            $reply = "What are you in the mood for today? Based on our brewery floor favorites, here is a curated tasting flight:";
        }

        return [
            'reply' => $reply,
            'recommendations' => array_filter($recs),
            'suggestedChips' => ['Something refreshing', 'Something strong', 'Something bitter', 'Something sweet', 'Surprise me']
        ];
    }

    /**
     * Section 4 & 5: Personalized Recommendations using 5-Factor Scoring Model
     */
    private function handlePersonalizedRecommendations($allBeers, $user) {
        $scored = $this->calculateRecommendationScores($allBeers, $user);
        $top3 = array_slice($scored, 0, 3);

        $reply = "Based on your recorded liming history, previous purchases, and taste profile affinities (High IBU 90%, High ABV 80%), here are your top personalised recommendations:\n\n";

        foreach ($top3 as $i => $rec) {
            $reply .= ($i + 1) . ". **{$rec['name']} — {$rec['matchPct']}% Match**\n" .
                      "   *Reason:* {$rec['reason']}\n\n";
        }

        $reply .= "You can view full flavor profiles or add any of these directly to your cart below!";

        return [
            'reply' => $reply,
            'recommendations' => $top3,
            'suggestedChips' => ['Show me beers under $20', 'Explain recommendation score', 'Check my Krewe points']
        ];
    }

    /**
     * Section 11: Educational / Beer Guide
     */
    private function handleEducationalQuery($q, $allBeers) {
        if (str_contains($q, 'ibu')) {
            return [
                'reply' => "**IBU stands for International Bitterness Units.**\n\n" .
                           "It measures the concentration of isomerized alpha acids from hops in the beer (roughly 1 IBU = 1 milligram of alpha acid per liter of beer).\n\n" .
                           "• **Low Bitterness (10-25 IBU)**: J'ouvert Lager (18 IBU), Brechin Castle (25 IBU), Sugarcane Kölsch (20 IBU).\n" .
                           "• **Medium Bitterness (25-45 IBU)**: OCD Saison (28 IBU), Soca Starter (45 IBU).\n" .
                           "• **High Bitterness (50-70+ IBU)**: Bitter Truth Stout (55 IBU), Island IPA (65 IBU).\n\n" .
                           "Remember: High IBU beers don't always taste unbearably bitter if balanced by strong residual malts!",
                'suggestedChips' => ['What does ABV mean?', 'Why does beer taste bitter?', 'Find My Beer']
            ];
        }

        if (str_contains($q, 'abv')) {
            return [
                'reply' => "**ABV stands for Alcohol By Volume.**\n\n" .
                           "It indicates the percentage of the liquid that is pure ethanol alcohol. Across Jeff Brewery:\n\n" .
                           "• **Session / Easy Drinking (4.0% – 5.0%)**: Brechin Castle (4.2%), Tamarind Gose (4.5%), Maracas Mist (4.8%), J'ouvert Lager (5.0%).\n" .
                           "• **Standard Craft (5.2% – 6.5%)**: Sugarcane Kölsch (5.2%), Soca Starter (5.5%), Island IPA (6.5%).\n" .
                           "• **High Gravity / Strong (6.8% – 8.0%)**: OCD Saison (6.8%), Bitter Truth Stout (7.2%), Midnight Robber (8.0%).",
                'suggestedChips' => ['What is IBU?', 'Show me strongest beer', 'Show me light beers']
            ];
        }

        if (str_contains($q, 'why does this beer taste bitter') || str_contains($q, 'bitter')) {
            return [
                'reply' => "Bitterness in craft beer comes primarily from **hops (Humulus lupulus)**.\n\n" .
                           "When hops are boiled in the sweet malt wort, heat converts their natural alpha acids into **iso-alpha acids**, creating pleasant bitter notes that balance the heavy sweetness of the barley malt. Different hop varieties also impart pine, grapefruit, and tropical aromatics!\n\n" .
                           "Want to experience the spectrum? Compare **Island IPA** (bold 65 IBU hop punch) with **Brechin Castle** (gentle 25 IBU English malt sweetness).",
                'suggestedChips' => ['Island IPA vs OCD Saison', 'What is IBU?', 'Find My Beer']
            ];
        }

        if (str_contains($q, 'ipa')) {
            return [
                'reply' => "**India Pale Ale (IPA)** is a hop-forward ale style known for vibrant floral, fruity, citrus, and pine aromatics paired with assertive bitterness.\n\n" .
                           "Our flagship **Island IPA** (6.5% ABV, $18.00) uses West Coast dry-hopping techniques with Citra and Mosaic hops, complemented by island passionfruit zest. If you prefer a lighter, all-day version, try **Soca Starter Session IPA** (5.5% ABV, $15.00)!",
                'recommendations' => [Database::getBeerById('island-ipa'), Database::getBeerById('soca-starter')],
                'suggestedChips' => ['Island IPA vs OCD Saison', 'What beers are under $20?', 'Find My Beer']
            ];
        }

        return [
            'reply' => "Craft beer is pure sensory science! We use four primary natural ingredients: **Water, Malted Grains, Hops, and Yeast**, accented with local Trinidad botanicals (Tobago mango, cocoa nibs, sorrel, and scorpion peppers).\n\nWhat brewing topic or beer style would you like to explore?",
            'suggestedChips' => ['What does IBU mean?', 'What does ABV mean?', 'Why does beer taste bitter?', 'Teach me about IPAs']
        ];
    }

    /**
     * Section 12: Shop Assistant Queries
     */
    private function handleShopAssistantQuery($q, $allBeers) {
        if (str_contains($q, 'under $20') || str_contains($q, 'under 20') || str_contains($q, 'cheap')) {
            $under20 = array_filter($allBeers, fn($b) => ($b['price'] ?? 20) <= 20);
            return [
                'reply' => "Here are our craft brews available for **$20 or under**:\n\n" .
                           "• **Brechin Castle** — $15.00 (Blonde Ale)\n" .
                           "• **J'ouvert Lager** — $15.00 (Crisp Lager)\n" .
                           "• **Soca Starter** — $15.00 (Session IPA)\n" .
                           "• **Sugarcane Kölsch** — $16.00 (Heritage Kölsch)\n" .
                           "• **Maracas Mist** — $16.00 (Citrus Wheat)\n" .
                           "• **Island IPA** — $18.00 (Flagship IPA)\n" .
                           "• **Soca Sorrel Ale** — $18.00 (Seasonal Fruited Ale)\n" .
                           "• **Tamarind Gose** — $19.00 (Sour Gose)\n" .
                           "• **Bitter Truth Stout** — $20.00 (Cocoa Espresso Stout)\n\n" .
                           "You'll also earn **10 Krewe Points for every $1 spent** on all of these!",
                'recommendations' => array_slice(array_values($under20), 0, 4),
                'suggestedChips' => ['What is currently available?', 'Which beers are seasonal?', 'Check my Krewe points']
            ];
        }

        if (str_contains($q, 'low in stock') || str_contains($q, 'limited')) {
            $lowStock = array_filter($allBeers, fn($b) => ($b['stock'] ?? 100) <= 20 || ($b['availability'] ?? '') === 'LIMITED');
            return [
                'reply' => "⚠️ **Low Stock Alert:** The following small-batch releases are currently running low in our Couva brewery cold room:\n\n" .
                           "• **OCD Saison** — Only 12 bottles remaining! (High ABV Farmhouse Ale, $24.00)\n" .
                           "• **Tamarind Gose** — Only 12 bottles remaining! (Experimental Sour, $19.00)\n" .
                           "• **Midnight Robber** — Limited batch reserves! (8.0% Strong Stout, $25.00)\n\n" .
                           "We recommend grabbing these before the current fermentation batch sells out!",
                'recommendations' => array_values($lowStock),
                'suggestedChips' => ['Order OCD Saison', 'Order Tamarind Gose', 'What is currently available?']
            ];
        }

        if (str_contains($q, 'seasonal')) {
            $seasonal = array_filter($allBeers, fn($b) => ($b['availability'] ?? '') === 'SEASONAL');
            return [
                'reply' => "🎄 **Current Seasonal Release: Soca Sorrel Ale ($18.00)**\n\n" .
                           "Brewed specially for the island holiday season! We infuse this ale with fresh local sorrel petals (hibiscus), warm crushed ginger, and cloves. It pours a deep ruby red with a festive, crisp tartness. Grab it while the season lasts!",
                'recommendations' => array_values($seasonal),
                'suggestedChips' => ['What beers are under $20?', 'My Recommendations', 'Surprise me']
            ];
        }

        if (str_contains($q, 'gift')) {
            $brechin = Database::getBeerById('brechin-castle');
            $ipa = Database::getBeerById('island-ipa');
            return [
                'reply' => "Looking for a top-tier brewery gift? We recommend:\n\n" .
                           "1. **Brechin Castle Six-Pack ($15/bottle)** — Comes in our heritage estate gift box celebrating Couva's sugar history.\n" .
                           "2. **Custom Craft Your Own Batch ($280)** — Let your friend design their own beer in the Craft Lab and get a personalized 12-pack!\n" .
                           "3. **Jeff Brewery Gift Card ($25 - $200)** — Redeemable on beers, taproom liming, or official merch.",
                'recommendations' => [$brechin, $ipa],
                'suggestedChips' => ['Show me merch', 'Check gift cards', 'What is Brechin Castle?']
            ];
        }

        return [
            'reply' => "All our core beers are in stock and ready for either **Island Delivery (TT-Post)** or **Couva Taproom Pickup**! Browse the list or ask me for any specific style, ABV, or price.",
            'recommendations' => array_slice($allBeers, 0, 3),
            'suggestedChips' => ['Beers under $20', 'What is low in stock?', 'Which beers are seasonal?']
        ];
    }

    /**
     * Section 13: The Krewe Gamification Integration
     */
    private function handleKreweQuery($user) {
        $name = $user['name'] ?? 'Jeff Smith';
        $points = $user['points'] ?? 1450;
        $rank = $user['rank'] ?? 'Master Brew Limer';
        $nextRank = $user['next_rank'] ?? 'Legendary Brewmaster';
        $needed = max(0, 2000 - $points);

        $reply = "🏆 **The Krewe Loyalty Status for {$name}**\n\n" .
                 "• **Current Balance**: **" . number_format($points) . " Krewe Points**\n" .
                 "• **Membership Tier**: **{$rank}** (VIP Perks Active)\n" .
                 "• **Next Tier**: **{$nextRank}** (Only {$needed} points to level up!)\n\n" .
                 "**How to Earn More Points Today:**\n" .
                 "• **10 pts** for every $1 spent in the Shop\n" .
                 "• **50 pts** for submitting a Brew Review\n" .
                 "• **100 pts** for saving a custom recipe in Craft Lab\n" .
                 "• **5 pts** for every chat with Brewer Guide (awarded right now!)\n\n" .
                 "Your points can be redeemed at checkout for free delivery, limited edition merch, or taproom pours!";

        return [
            'reply' => $reply,
            'suggestedChips' => ['My Recommendations', 'Show me beers under $20', 'What is low in stock?']
        ];
    }

    /**
     * Brewing Process Explanation
     */
    private function handleBrewingProcessQuery($q) {
        return [
            'reply' => "Our Couva brewhouse operates on strict traditional craft engineering:\n\n" .
                       "1. **Mashing**: Milled grains meet filtered water at 65°C to convert starches into fermentable sugars.\n" .
                       "2. **Kettle Boil**: Wort is boiled for 60–90 mins with hops added for bitterness and tropical aroma.\n" .
                       "3. **Fermentation**: Pure brewer's yeast pitches at 18°C, converting sugars into alcohol and lively carbonation.\n" .
                       "4. **Cold Lagering & Conditioning**: Chilled to 2°C for crystal clarity and rounded mouthfeel.\n\n" .
                       "Visit our **The Brewer Guide** page in the navigation to pan and explore our interactive live flowchart!",
            'suggestedChips' => ['What does IBU mean?', 'Island IPA vs OCD Saison', 'Find My Beer']
        ];
    }

    /**
     * Section 5 & 16: Recommendation Scoring Engine
     * 
     * Formula:
     * Recommendation Score = 
     *   (User Preference × 0.40) +
     *   (Behaviour Similarity × 0.25) +
     *   (Product Popularity × 0.15) +
     *   (Recent Activity × 0.10) +
     *   (Inventory Availability × 0.10)
     */
    private function calculateRecommendationScores($allBeers, $user) {
        $scored = [];

        // Inferred preferences (defaults for Jeff Smith)
        $prefStyles = ['IPA' => 0.90, 'SAISON' => 0.80, 'STOUT' => 0.70, 'ALE' => 0.55, 'LAGER' => 0.40, 'KOLSCH' => 0.45, 'WHEAT' => 0.50, 'GOSE' => 0.60];
        $purchasedBeers = ['island-ipa', 'brechin-castle'];
        $wishlistBeers = ['brechin-castle', 'island-ipa'];

        foreach ($allBeers as $beer) {
            $id = $beer['id'];
            $style = strtoupper($beer['style'] ?? 'ALE');
            $stock = $beer['stock'] ?? 142;
            $availability = $beer['availability'] ?? 'CORE';

            // 1. Inventory Rule (Section 6 & 15)
            if ($stock <= 0) {
                continue; // Do not recommend out of stock
            }

            // Factor 1: User Preference Match (40%)
            $styleKey = 'ALE';
            foreach ($prefStyles as $k => $v) {
                if (str_contains($style, $k)) {
                    $styleKey = $k;
                    break;
                }
            }
            $userPrefScore = ($prefStyles[$styleKey] ?? 0.50) * 100;

            // Factor 2: Behaviour Similarity (25%)
            $behaviourScore = 60;
            if (in_array($id, $purchasedBeers)) {
                $behaviourScore = 95;
            } elseif (in_array($id, $wishlistBeers)) {
                $behaviourScore = 88;
            } elseif (str_contains($style, 'IPA') || str_contains($style, 'SAISON')) {
                $behaviourScore = 85;
            }

            // Factor 3: Product Popularity (15%)
            $popScores = [
                'island-ipa' => 96,
                'bitter-truth-stout' => 90,
                'ocd-saison' => 84,
                'brechin-castle' => 82,
                'jouvert-lager' => 78,
                'maracas-mist' => 75,
                'soca-sorrel' => 88
            ];
            $popularityScore = $popScores[$id] ?? 70;

            // Factor 4: Recent Activity (10%)
            $recentActivityScore = in_array($id, $wishlistBeers) ? 90 : (str_contains($style, 'IPA') ? 85 : 65);

            // Factor 5: Inventory Availability (10%)
            $isLowStock = ($stock <= 20) || ($availability === 'LIMITED');
            $inventoryScore = $isLowStock ? 40 : 95;

            // Calculate Weighted Score
            $rawScore = ($userPrefScore * 0.40) +
                        ($behaviourScore * 0.25) +
                        ($popularityScore * 0.15) +
                        ($recentActivityScore * 0.10) +
                        ($inventoryScore * 0.10);

            // Normalize between 60% and 96%
            $finalPct = round(min(96, max(58, $rawScore)));

            // Formulate Explainable Reason (Section 12 & 17)
            $reason = "Matches your taste profile for balanced Caribbean craft brewing.";
            if ($id === 'island-ipa') {
                $reason = "Customer frequently interacts with IPA products and previously purchased Island IPA.";
            } elseif ($id === 'ocd-saison') {
                $reason = "Customer has shown interest in higher-ABV (6.8%) and complex Belgian farmhouse beers. Note: Low stock.";
            } elseif ($id === 'bitter-truth-stout') {
                $reason = "Matches customer preference for darker beers with higher bitterness (55 IBU) and roasted cocoa.";
            } elseif ($id === 'brechin-castle') {
                $reason = "Previously purchased and featured in your wishlist. Historic Couva sugar heritage.";
            } elseif ($id === 'jouvert-lager') {
                $reason = "Popularity-based recommendation: High popularity among session limers and new customers.";
            } elseif ($id === 'maracas-mist') {
                $reason = "Shares citrus zest and coriander aromatics with your favorite IPA hops in a lighter wheat body.";
            } elseif ($id === 'soca-sorrel') {
                $reason = "Seasonal recommendation: Infused with fresh holiday sorrel, ginger, and clove.";
            }

            $beerCopy = $beer;
            $beerCopy['matchPct'] = $finalPct;
            $beerCopy['reason'] = $reason;
            $beerCopy['isLowStock'] = $isLowStock;

            $scored[] = $beerCopy;
        }

        // Sort descending by recommendation percentage
        usort($scored, fn($a, $b) => $b['matchPct'] <=> $a['matchPct']);

        return $scored;
    }

    /**
     * Record interaction events into session for Admin Analytics
     */
    private function recordAnalyticsEvent($eventType, $data = []) {
        if (!isset($_SESSION['data_events']) || !is_array($_SESSION['data_events'])) {
            $_SESSION['data_events'] = [];
        }

        $event = [
            'id' => 'EVT-' . strtoupper(substr(uniqid(), -6)),
            'type' => $eventType,
            'time' => date('H:i:s'),
            'timestamp' => time(),
            'customer' => $_SESSION['user']['name'] ?? 'Guest Limer',
            'data' => $data
        ];

        // Keep last 50 events in session
        array_unshift($_SESSION['data_events'], $event);
        if (count($_SESSION['data_events']) > 50) {
            array_pop($_SESSION['data_events']);
        }
    }
}
