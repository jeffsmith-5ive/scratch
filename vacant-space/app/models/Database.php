<?php

class Database {
    public static $MOCK_REVIEWS = [
        ['id' => '1', 'user' => 'TriniMan', 'rating' => 5, 'comment' => 'Real vibes in this bottle!', 'date' => '2023-10-12'],
        ['id' => '2', 'user' => 'IsleSip', 'rating' => 4, 'comment' => 'Good flavor, stronger than I thought.', 'date' => '2023-11-01']
    ];

    public static $BADGES = [
        ['id' => 'newbie', 'name' => 'Freshman Liming', 'description' => 'Joined the Krewe', 'icon' => '🌴', 'requiredPoints' => 0],
        ['id' => 'taster', 'name' => 'Taste Explorer', 'description' => 'Reviewed 5 Beers', 'icon' => '🍺', 'requiredPoints' => 200],
        ['id' => 'collector', 'name' => 'Stocked Cooler', 'description' => 'Placed 3 Orders', 'icon' => '🧊', 'requiredPoints' => 500],
        ['id' => 'vip', 'name' => 'Carnival King', 'description' => 'Top Tier Loyalty', 'icon' => '👑', 'requiredPoints' => 1000]
    ];

    public static $BEERS = []; // Will initialize in a static initializer context conceptually, but PHP arrays don't allow complex initialization containing variables directly. Let's explicitly define it:

    public static $BLOG_POSTS = [
        [
            'id' => '1',
            'title' => 'The History of Stout in the Caribbean',
            'excerpt' => 'Why do islanders love a dark beer in hot weather? We dive into the colonial history and modern evolution.',
            'content' => 'Full content placeholder...',
            'date' => 'Oct 15, 2023',
            'image' => 'https://placehold.co/800x400/171717/FFFFFF.png?text=History+of+Stout',
            'author' => 'Jeff B.',
        ],
        [
            'id' => '2',
            'title' => 'Pairing IPA with Spicy Curry',
            'excerpt' => 'The hops in IPA cut through the richness of coconut milk and amplify the heat of scotch bonnet peppers.',
            'content' => 'Full content placeholder...',
            'date' => 'Nov 02, 2023',
            'image' => 'https://placehold.co/800x400/FF6F00/FFFFFF.png?text=Curry+&+IPA+Pairing',
            'author' => 'Chef Maria',
        ]
    ];

    public static $MERCH_ITEMS = [
        'm1' => ['name' => 'Logo Rope Hat - Assorted Colours', 'price' => 295, 'category' => 'Apparel', 'image' => 'https://placehold.co/600x750/00695C/FFFFFF.png?text=Logo+Rope+Hat\n(Assorted+Colours)'],
        'm2' => ['name' => 'Tin Tacker Sign - Island Series', 'price' => 250, 'category' => 'Accessories', 'soldOut' => true, 'image' => 'https://placehold.co/600x750/FF6F00/FFFFFF.png?text=Tin+Tacker+Sign\n(Island+Series)'],
        'm3' => ['name' => 'Island Series Willi Becher Glass - 16oz', 'price' => 75, 'category' => 'Glassware', 'image' => 'https://placehold.co/600x750/FFD54F/171717.png?text=Willi+Becher+Glass\n(16oz)'],
        'm4' => ['name' => 'Island Series Can Taster Glass - 5oz', 'price' => 55, 'category' => 'Glassware', 'image' => 'https://placehold.co/600x750/CE1126/FFFFFF.png?text=Can+Taster\n(5oz)'],
        'm5' => ['name' => 'Vintage Logo Trucker', 'price' => 275, 'category' => 'Apparel', 'image' => 'https://placehold.co/600x750/171717/FFFFFF.png?text=Vintage+Logo\nTrucker'],
        'm6' => ['name' => 'Logo Trucker', 'price' => 275, 'category' => 'Apparel', 'image' => 'https://placehold.co/600x750/00695C/FFFFFF.png?text=Logo+Trucker\n(Standard)'],
        'm7' => ['name' => 'Brewed for the Journey Trucker', 'price' => 275, 'category' => 'Apparel', 'image' => 'https://placehold.co/600x750/FF6F00/FFFFFF.png?text=Journey+Trucker\n(Mesh+Back)'],
        'm8' => ['name' => 'Logo Beach Towel', 'price' => 450, 'category' => 'Accessories', 'image' => 'https://placehold.co/600x750/00695C/FFFFFF.png?text=Logo+Beach+Towel\n(Oversized)'],
        'm9' => ['name' => 'Branded Can Taster Glass - 5oz', 'price' => 40, 'category' => 'Glassware', 'image' => 'https://placehold.co/600x750/FFD54F/171717.png?text=Branded+Taster\n(5oz)'],
        'm10' => ['name' => 'Branded Willi Becher Glass 2024 - 13oz', 'price' => 45, 'category' => 'Glassware', 'image' => 'https://placehold.co/600x750/171717/FFFFFF.png?text=Willi+Becher+2024\n(13oz)'],
        'm11' => ['name' => 'Branded Willi Becher Glass 2024 - 16oz', 'price' => 50, 'category' => 'Glassware', 'image' => 'https://placehold.co/600x750/171717/FFFFFF.png?text=Willi+Becher+2024\n(16oz)'],
        'm12' => ['name' => 'Logo Hoodie - French Terry Pullover', 'price' => 395, 'category' => 'Apparel', 'image' => 'https://placehold.co/600x750/333333/FFFFFF.png?text=French+Terry\nHoodie'],
        'm13' => ['name' => 'Unisex Logo T-Shirt', 'price' => 150, 'category' => 'Apparel', 'image' => 'https://placehold.co/600x750/FFFFFF/171717.png?text=Unisex+Logo+Tee'],
        'm14' => ['name' => 'Logo Jersey Hoodie', 'price' => 325, 'category' => 'Apparel', 'image' => 'https://placehold.co/600x750/CE1126/FFFFFF.png?text=Jersey+Hoodie\n(Lightweight)'],
        'm15' => ['name' => 'Branded Willi Becher Glass - 12oz', 'price' => 40, 'originalPrice' => 48, 'category' => 'Glassware', 'image' => 'https://placehold.co/600x750/FF6F00/FFFFFF.png?text=Willi+Becher\n(12oz)'],
        'm16' => ['name' => 'Branded Teku Glass - 11.2oz', 'price' => 72, 'originalPrice' => 80, 'category' => 'Glassware', 'image' => 'https://placehold.co/600x750/FFD54F/171717.png?text=Teku+Glass\n(11.2oz)'],
        'm17' => ['name' => 'Logo Tin Sign', 'price' => 199, 'category' => 'Accessories', 'image' => 'https://placehold.co/600x750/00695C/FFFFFF.png?text=Logo+Tin+Sign\n(Classic)'],
        'm18' => ['name' => 'Tap Handle', 'price' => 395, 'category' => 'Accessories', 'image' => 'https://placehold.co/600x750/171717/FFFFFF.png?text=Custom+Tap+Handle\n(Wood)'],
        'm19' => ['name' => 'Limited Edition Christmas Sweater 2023', 'price' => 350, 'originalPrice' => 359, 'category' => 'Apparel', 'image' => 'https://placehold.co/600x750/CE1126/FFFFFF.png?text=Xmas+Sweater\n(2023+Edition)'],
        'm20' => ['name' => 'Key Ring - Antique Brass', 'price' => 40, 'originalPrice' => 49, 'category' => 'Accessories', 'image' => 'https://placehold.co/600x750/B8860B/FFFFFF.png?text=Brass+Key+Ring'],
    ];

    public static function getBeerById($id) {
        if (str_starts_with($id, 'gift-card-')) {
            $parts = explode('-', $id);
            // format is: gift-card-{amount}-{timestamp}
            $amount = isset($parts[2]) ? floatval($parts[2]) : 50.0;
            return [
                'id' => $id,
                'name' => 'Jeff Brewery Gift Card',
                'tagline' => 'Give the gift of vibes.',
                'style' => 'Gift Card',
                'abv' => 0.0,
                'price' => $amount,
                'description' => "A $$amount digital gift card redeemable for anything in the Jeff Brewery shop. The perfect gift for the craft beer lover in your life.",
                'flavorProfile' => ['Digital', 'Instant', 'Vibes'],
                'pairing' => ['Birthdays', 'Anniversaries', 'Tabanca'],
                'vibe' => 'Celebration',
                'availability' => 'CORE',
                'image' => 'https://images.unsplash.com/photo-1622646698651-409395290b3a?auto=format&fit=crop&w=800&q=80',
                'reviews' => []
            ];
        }

        if (isset(self::$MERCH_ITEMS[$id])) {
            $item = self::$MERCH_ITEMS[$id];
            return [
                'id' => $id,
                'name' => $item['name'],
                'tagline' => $item['category'],
                'style' => 'Merch',
                'abv' => 0.0,
                'price' => $item['price'],
                'description' => 'Official Jeff Brewery Merchandise.',
                'flavorProfile' => [],
                'pairing' => [],
                'vibe' => 'Lifestyle',
                'availability' => isset($item['soldOut']) && $item['soldOut'] ? 'LIMITED' : 'CORE',
                'image' => $item['image'],
                'reviews' => []
            ];
        }

        foreach (self::getBeers() as $beer) {
            if ($beer['id'] === $id) {
                return $beer;
            }
        }
        return null;
    }

    public static function getBeers() {
        $beers = [
            [
                'id' => 'island-ipa',
                'name' => 'Island IPA',
                'tagline' => 'Bold confidence, island heat.',
                'style' => 'IPA',
                'abv' => 6.5,
                'price' => 18,
                'description' => 'A West Coast style IPA that captures the bold confidence of the islands. It hits with piney bitterness upfront and finishes dry, leaving lingering notes of passionfruit and citrus zest.',
                'flavorProfile' => ['Passionfruit', 'Citrus', 'Pine', 'Dry Finish'],
                'pairing' => ['Spicy Curry', 'Geera Pork', 'Buffalo Wings'],
                'vibe' => 'Island Heat',
                'availability' => 'CORE',
                'image' => '/public/images/island_ipa.jpg',
                'reviews' => self::$MOCK_REVIEWS,
                'isBestSeller' => true,
            ],
            [
                'id' => 'jouvert-lager',
                'name' => 'J\'ouvert Lager',
                'tagline' => 'Sunrise on the road.',
                'style' => 'LAGER',
                'abv' => 5.0,
                'price' => 15,
                'description' => 'The ultimate Caribbean Lager. Crisp, light malt profile with a slight sweetness that mimics the freshness of a Carnival sunrise. Engineered for "road vibes" and stamina.',
                'flavorProfile' => ['Light Malt', 'Crisp', 'Slight Sweetness'],
                'pairing' => ['Doubles', 'Corn Soup', 'Pholourie'],
                'vibe' => 'Carnival Sunrise',
                'availability' => 'CORE',
                'image' => '/public/images/jouvert_lager.jpg',
                'reviews' => [],
                'isBestSeller' => true,
            ],
            [
                'id' => 'bitter-truth',
                'name' => 'Bitter Truth Stout',
                'tagline' => 'Deep reflection in a glass.',
                'style' => 'STOUT',
                'abv' => 7.0,
                'price' => 20,
                'description' => 'An Export Stout for the serious drinker. It offers depth and maturity with rich molasses, roasted bitterness, and dark cocoa notes. A beer for sipping and reflecting.',
                'flavorProfile' => ['Molasses', 'Roasted Bitterness', 'Cocoa'],
                'pairing' => ['Rich Chocolate Cake', 'Oxtail Stew', 'Blue Cheese'],
                'vibe' => 'Maturity & Depth',
                'availability' => 'CORE',
                'image' => '/public/images/bitter_truth_stout.jpg',
                'reviews' => [],
            ],
            [
                'id' => 'ocd-saison',
                'name' => 'OCD Saison',
                'tagline' => 'Order within chaos.',
                'style' => 'SAISON',
                'abv' => 6.8,
                'price' => 24,
                'description' => 'A Belgian Saison that balances the chaos of farmhouse funky yeast with the order of lemongrass spice. A prestige pour for those who appreciate complexity.',
                'flavorProfile' => ['Dry Farmhouse', 'Spice', 'Lemongrass'],
                'pairing' => ['Grilled Seafood', 'Goat Cheese Salad', 'Thai Curry'],
                'vibe' => 'Order vs Chaos',
                'availability' => 'LIMITED',
                'image' => '/public/images/OCD Siason.png',
                'reviews' => [],
            ],
            [
                'id' => 'soca-sorrel',
                'name' => 'Soca Sorrel Ale',
                'tagline' => 'Celebration in every bubble.',
                'style' => 'ALE',
                'abv' => 5.8,
                'price' => 18,
                'description' => 'A Fruited Spiced Ale that tastes like Christmas. Tart sorrel (hibiscus), warm ginger, and clove come together to create a festive celebration in a glass.',
                'flavorProfile' => ['Tart Sorrel', 'Ginger', 'Clove'],
                'pairing' => ['Pastelles', 'Ham', 'Black Cake'],
                'vibe' => 'Christmas Celebration',
                'availability' => 'SEASONAL',
                'image' => '/public/images/Soca Sorrel Ale.png',
                'reviews' => [],
                'isNew' => true,
            ],
            [
                'id' => 'sugarcane-kolsch',
                'name' => 'Sugarcane Kölsch',
                'tagline' => 'Sweet heritage, crisp finish.',
                'style' => 'KOLSCH',
                'abv' => 5.2,
                'price' => 16,
                'description' => 'Paying homage to our sugar mill history, this Kölsch is brewed with fresh cane juice for a subtle sweetness, balanced by a clean malt body and a hint of lime.',
                'flavorProfile' => ['Clean Malt', 'Cane Sweetness', 'Lime'],
                'pairing' => ['Grilled Fish', 'Ceviche', 'Light Salads'],
                'vibe' => 'Heritage',
                'availability' => 'CORE',
                'image' => '/public/images/Sugarcne Kolsch.png',
                'reviews' => [],
            ],
            [
                'id' => 'tamarind-gose',
                'name' => 'Tamarind Gose',
                'tagline' => 'Street food soul.',
                'style' => 'GOSE',
                'abv' => 4.5,
                'price' => 19,
                'description' => 'An experimental Sour Gose that captures the essence of Trini street snacks. Bold tamarind tartness meets sea salt and coriander for a lip-smacking finish.',
                'flavorProfile' => ['Tamarind Tart', 'Sea Salt', 'Coriander'],
                'pairing' => ['Chow', 'Shark & Bake', 'Fried Calamari'],
                'vibe' => 'Street Food',
                'availability' => 'LIMITED',
                'image' => '/public/images/Tamarind Gose.png',
                'reviews' => [],
                'isNew' => true,
            ],
            [
                'id' => 'maracas-mist',
                'name' => 'Maracas Mist',
                'tagline' => 'North Coast breeze.',
                'style' => 'WHEAT',
                'abv' => 5.0,
                'price' => 16,
                'description' => 'A Citrus Wheat / Pale Ale hybrid that feels like a cool breeze on Maracas Bay. Soft wheat mouthfeel with refreshing citrus zest accents.',
                'flavorProfile' => ['Citrus Zest', 'Soft Wheat', 'Refreshing'],
                'pairing' => ['Bake & Shark', 'Fruit Salad', 'Grilled Shrimp'],
                'vibe' => 'Beach Breeze',
                'availability' => 'CORE',
                'image' => '/public/images/Maracas Mist.png',
                'reviews' => self::$MOCK_REVIEWS,
            ],
            [
                'id' => 'soca-starter',
                'name' => 'Soca Starter',
                'tagline' => 'Get de pump started.',
                'style' => 'IPA',
                'abv' => 4.8,
                'price' => 15,
                'description' => 'A Session IPA designed for pre-fete energy. Low bitterness but packed with tropical hops to get the vibes going without slowing you down.',
                'flavorProfile' => ['Tropical Hops', 'Low Bitterness', 'Citrus'],
                'pairing' => ['BBQ Chicken', 'Pizza', 'Chips'],
                'vibe' => 'Pre-fete Energy',
                'availability' => 'CORE',
                'image' => '/public/images/Soca Starter.png',
                'reviews' => [],
            ],
            [
                'id' => 'midnight-robber',
                'name' => 'Midnight Robber',
                'tagline' => 'Surrender to the taste.',
                'style' => 'STOUT',
                'abv' => 8.0,
                'price' => 25,
                'description' => 'A Strong Stout / Black Ale inspired by the Midnight Robber character. Intense dark roast, spicy molasses, and a high ABV that commands respect. A storytelling beer.',
                'flavorProfile' => ['Dark Roast', 'Molasses Spice', 'Intense'],
                'pairing' => ['Steak', 'Dark Chocolate', 'Strong Cheese'],
                'vibe' => 'Resistance & Power',
                'availability' => 'LIMITED',
                'image' => '/public/images/Midnight Robber.png',
                'reviews' => [],
            ],
        ];

        if (isset($_SESSION['beers_overrides'])) {
            foreach ($beers as &$beer) {
                if (isset($_SESSION['beers_overrides'][$beer['id']])) {
                    $beer['image'] = $_SESSION['beers_overrides'][$beer['id']];
                }
            }
        }

        return $beers;
    }
}
