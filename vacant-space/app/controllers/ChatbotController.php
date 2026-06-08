<?php

class ChatbotController extends Controller {
    public function ask() {
        $input = json_decode(file_get_contents('php://input'), true);
        $message = $input['message'] ?? '';

        if (empty($message)) {
            $this->json(['error' => 'Message is empty'], 400);
            return;
        }

        $msgLower = strtolower(trim($message));
        
        // Default reply in Brewer Guide persona
        $reply = "Wha gwan! I didn't quite catch dat. Ask me about our brewing process (like mashing or fermenting), or ask for a beer recommendation!";

        // 1. Check if user is asking about recommendations/best flavors
        $isRecommendationQuery = false;
        $recommendationKeywords = ['recommend', 'best', 'flavor', 'flavours', 'flavour', 'good', 'drink', 'choice', 'popular', 'favourite', 'favorite', 'seller', 'try', 'pick', 'suggest', 'rn'];
        foreach ($recommendationKeywords as $kw) {
            if (str_contains($msgLower, $kw)) {
                $isRecommendationQuery = true;
                break;
            }
        }
        
        // Match informal queries like "what is the best flavors rn" or "what flavors you have"
        if ($isRecommendationQuery) {
            $reply = "Ayo, let me break it down for yuh! If yuh looking for the **best flavors right now**, our top sellers are the **Island IPA** (6.5% ABV, $18) - packed with bold pine and passionfruit vibes, and the crisp **J'ouvert Lager** (5.0% ABV, $15) made for pure road stamina! 🌴🍻\n\n" .
                     "We also have special batches like the **Soca Sorrel Ale** ($18) and the limited edition **Tamarind Gose** ($19) if yuh want something sweet and tart!\n\n" .
                     "**CRITICAL TIP:** Did yuh know yuh can earn **Krewe loyalty points** on all these? Yuh get **10 points for every $1** spent! Join the Krewe loyalty program today to level up and get dem sweet rewards! 👑✨";
        }
        // 2. Check for brewing process queries
        elseif (str_contains($msgLower, 'mash') || str_contains($msgLower, 'milling')) {
            $reply = "Ah, the start of the magic! **Mashing** is where we mix our milled grains with hot water (around 60–70°C). This extracts all the sweet starches and turns them into fermentable sugars. We keep it precise to get that perfect body for our brews!";
        } elseif (str_contains($msgLower, 'boil') || str_contains($msgLower, 'hop')) {
            $reply = "Now we cooking! During the **Boiling** stage (usually 60 to 90 minutes), we sterilize the sweet wort. This is also when we drop in the hops: early hops for that smooth bitterness and late hops for the tropical aroma that makes you feel the North Coast breeze!";
        } elseif (str_contains($msgLower, 'ferment') || str_contains($msgLower, 'yeast')) {
            $reply = "This is where the yeast does de heavy lifting! We cool the wort down and pitch the yeast. During **Fermentation** (5 to 14 days), the yeast eats the sugars and converts them into alcohol and CO₂. It's the biological heartbeat of our beer!";
        } elseif (str_contains($msgLower, 'condition') || str_contains($msgLower, 'maturation') || str_contains($msgLower, 'age')) {
            $reply = "Patience is key, my friend! **Conditioning/Maturation** is when we cold-store the beer (0–4°C). This allows the flavors to mellow out, yeast to settle, and clarifies the brew so it pours clean and beautiful in yuh glass.";
        } elseif (str_contains($msgLower, 'package') || str_contains($msgLower, 'bottle') || str_contains($msgLower, 'can') || str_contains($msgLower, 'keg')) {
            $reply = "The final touch! **Packaging** is where we carbonate the beer, filter it, and seal it tight in cans, bottles, or kegs. We run strict quality checks (like checking dissolved oxygen) to make sure every drop stays fresh and bubbly for the journey!";
        } elseif (str_contains($msgLower, 'process') || str_contains($msgLower, 'brewing') || str_contains($msgLower, 'flowchart')) {
            $reply = "Our brewing flowchart has 4 main stages: \n" .
                     "1. **Hot Processes** (Mashing & Boiling) to extract sugars and hops.\n" .
                     "2. **Cold Processes** (Cooling & Conditioning) for clarity and maturation.\n" .
                     "3. **Biological Processes** (Yeast Pitching & Fermentation) to create alcohol.\n" .
                     "4. **Packaging & QC** to seal in the freshness.\n" .
                     "Check out the **Brewer Guide** page to see the full flowchart in action!";
        }
        // 3. General greetings or story queries
        elseif (str_contains($msgLower, 'hello') || str_contains($msgLower, 'hi') || str_contains($msgLower, 'wha gwan') || str_contains($msgLower, 'wotless')) {
            $reply = "Wha gwan! I'm your Brewer Guide. Ready to talk craft beer and brewing culture? Ask me about our process or ask for recommendations!";
        } elseif (str_contains($msgLower, 'story') || str_contains($msgLower, 'about') || str_contains($msgLower, 'history')) {
            $reply = "Jeff Brewery started right in a backyard in Port of Spain, Trinidad! We wanted to merge premium West Coast brewing techniques with the vibrant culture and local ingredients of the Caribbean. Now, we brew stories in every bottle!";
        } elseif (str_contains($msgLower, 'krewe') || str_contains($msgLower, 'points') || str_contains($msgLower, 'loyalty')) {
            $reply = "Join the Krewe! It's our loyalty program where yuh earn **10 points for every $1** spent on beers and merch. You can rank up from Freshman Liming to Carnival King and unlock exclusive perks!";
        }

        // Award points for chatting (Gamification)
        if (isset($_SESSION['user'])) {
            $_SESSION['user']['points'] += 5; 
        }

        // Simulate network delay for premium feel
        usleep(500000); // 0.5s delay

        $this->json([
            'reply' => $reply,
            'pointsAwarded' => 5
        ]);
    }
}
