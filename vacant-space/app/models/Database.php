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

    public static function getBeerById($id) {
        foreach (self::getBeers() as $beer) {
            if ($beer['id'] === $id) {
                return $beer;
            }
        }
        return null;
    }

    public static function getBeers() {
        return [
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
                'image' => 'public/images/island_ipa.jpg',
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
                'image' => 'public/images/jouvert_lager.jpg',
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
                'image' => 'public/images/bitter_truth_stout.jpg',
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
                'image' => 'public/images/OCD Siason.png',
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
                'image' => 'public/images/Soca Sorrel Ale.png',
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
                'image' => 'public/images/Sugarcne Kolsch.png',
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
                'image' => 'public/images/Tamarind Gose.png',
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
                'image' => 'public/images/Maracas Mist.png',
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
                'image' => 'public/images/Soca Starter.png',
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
                'image' => 'public/images/Midnight Robber.png',
                'reviews' => [],
            ],
        ];
    }
}
