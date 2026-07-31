<?php

// Start the session for managing cart and user data
session_start();

// Define constants
define('BASE_PATH', __DIR__);

// Simple Autoloader for Controllers and Models
spl_autoload_register(function ($class) {
    $paths = [
        BASE_PATH . '/app/controllers/',
        BASE_PATH . '/app/models/',
    ];
    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Basic Router
$route = isset($_GET['route']) ? $_GET['route'] : (isset($_SERVER['PATH_INFO']) ? trim($_SERVER['PATH_INFO'], '/') : 'home');
if (empty($route)) {
    $route = 'home';
}

$parts = explode('/', $route);
$controllerName = ucfirst($parts[0]) . 'Controller';
$action = isset($parts[1]) ? $parts[1] : 'index';

// Initialize global user and cart if they don't exist
if (!isset($_SESSION['user']) || empty($_SESSION['user']['name'])) {
    $_SESSION['user'] = [
        'name' => 'Jeff Smith',
        'title' => 'Master Brew Limer',
        'email' => 'jeff.smith@jeffbrewery.com',
        'phone' => '+1 (868) 746-7332',
        'location' => 'Port of Spain, Trinidad & Tobago',
        'member_since' => 'March 2024',
        'points' => 1450,
        'rank' => 'Master Brew Limer',
        'next_rank' => 'Legendary Brewmaster',
        'next_rank_points' => 2000,
        'favorite_style' => 'Maracas Mist & Soca Starter',
        'bio' => 'Passionate Trinbagonian craft beer enthusiast, hophead, and home-brew experimenter.',
        'wishlist' => ['brechin-castle', 'island-ipa', 'm12'],
        'badges' => [
            ['id' => 'first_sip', 'name' => 'First Sip', 'icon' => 'beer', 'description' => 'Purchased your first craft beer', 'unlocked_at' => 'Mar 2024'],
            ['id' => 'island_explorer', 'name' => 'Island Explorer', 'icon' => 'compass', 'description' => 'Tried 5+ unique Caribbean brew styles', 'unlocked_at' => 'Apr 2024'],
            ['id' => 'krewe_vip', 'name' => 'Krewe VIP', 'icon' => 'crown', 'description' => 'Accumulated over 1,000 Krewe Points', 'unlocked_at' => 'Jun 2024'],
            ['id' => 'master_blender', 'name' => 'Master Blender', 'icon' => 'flask-conical', 'description' => 'Created a custom recipe in Craft Your Own', 'unlocked_at' => 'Jul 2024'],
            ['id' => 'review_guru', 'name' => 'Review Guru', 'icon' => 'star', 'description' => 'Reviewed 3+ craft brews', 'unlocked_at' => 'Jul 2024']
        ],
        'saved_recipes' => [
            [
                'id' => 'rec_101',
                'batch_id' => 'BATCH-MNG-9842',
                'name' => "Jeff's Spicy Mango Haze",
                'base' => 'Hazy IPA',
                'infusion' => 'Trinidad Moruga Scorpion & Mango Zest',
                'abv' => '6.8%',
                'ibu' => 45,
                'created_at' => 'July 12, 2026',
                'notes' => 'Crisp citrus aroma with a subtle spicy kick on the finish.',
                'status' => 'Primary Fermentation',
                'progress_percent' => 65,
                'current_stage_index' => 3,
                'temp' => '18.5 °C',
                'gravity' => '1.014 SG (Target: 1.010 SG)',
                'est_completion' => 'August 3, 2026 (3 Days Left)',
                'brewer_notes' => 'Master Brewer Marcus added fresh Tobago Mango puree yesterday. Yeast activity is vigorous and aromatic!',
                'timeline' => [
                    ['stage' => 'Mashing & Milling', 'desc' => 'Crushed Pale Ale malt & Flaked Oats mashed at 65°C to extract fermentable sugars.', 'date' => 'July 28, 2026 - 08:30 AM', 'status' => 'completed', 'icon' => 'wheat'],
                    ['stage' => 'Kettle Boil & Moruga Infusion', 'desc' => '60-minute boil with Citra hops, whirlpool infused with Moruga Scorpion essence and mango zest.', 'date' => 'July 28, 2026 - 02:15 PM', 'status' => 'completed', 'icon' => 'flame'],
                    ['stage' => 'Primary Fermentation', 'desc' => 'Whirlpool knockout into conical fermenter #F-04. Pitching London Ale yeast at 18°C.', 'date' => 'July 29, 2026 - Current', 'status' => 'in_progress', 'icon' => 'flask-conical'],
                    ['stage' => 'Cold Conditioning & Dry Hopping', 'desc' => 'Chilling to 2°C and dry hopping with Mosaic & Galaxy for tropical fruit aroma.', 'date' => 'Scheduled for Aug 1, 2026', 'status' => 'upcoming', 'icon' => 'snowflake'],
                    ['stage' => 'Carbonation & Nitro Canning', 'desc' => 'Custom label printing, counter-pressure nitro canning & quality assurance tasting.', 'date' => 'Scheduled for Aug 3, 2026', 'status' => 'upcoming', 'icon' => 'package']
                ]
            ],
            [
                'id' => 'rec_102',
                'batch_id' => 'BATCH-COC-8719',
                'name' => "Port of Spain Cocoa Stout",
                'base' => 'Imperial Stout',
                'infusion' => 'Organic Tobago Cacao & Roasted Vanilla Bean',
                'abv' => '8.2%',
                'ibu' => 55,
                'created_at' => 'June 04, 2026',
                'notes' => 'Rich chocolatey undertones paired with dark roasted malt.',
                'status' => 'Cold Conditioning & Lagering',
                'progress_percent' => 85,
                'current_stage_index' => 4,
                'temp' => '2.0 °C',
                'gravity' => '1.012 SG (Target Final)',
                'est_completion' => 'August 1, 2026 (Tomorrow)',
                'brewer_notes' => 'Steeping roasted Tobago Cacao nibs in tank #L-02. Flavors are smooth, velvety, and deeply aromatic.',
                'timeline' => [
                    ['stage' => 'Mashing & Milling', 'desc' => 'Dark Chocolate malt, Roasted Barley & Caramel Pils mashed at 68°C.', 'date' => 'July 20, 2026', 'status' => 'completed', 'icon' => 'wheat'],
                    ['stage' => 'Kettle Boil & Cacao Mash', 'desc' => 'Boiled for 90 minutes. Infused with Tobago roasted cacao nibs and vanilla bean pods.', 'date' => 'July 20, 2026', 'status' => 'completed', 'icon' => 'flame'],
                    ['stage' => 'Primary Fermentation', 'desc' => 'High gravity ale yeast fermentation completed at 20°C.', 'date' => 'July 25, 2026', 'status' => 'completed', 'icon' => 'flask-conical'],
                    ['stage' => 'Cold Conditioning & Lagering', 'desc' => 'Maturing at 2°C to clarify and meld dark roasted chocolate malt flavors.', 'date' => 'July 27, 2026 - Current', 'status' => 'in_progress', 'icon' => 'snowflake'],
                    ['stage' => 'Carbonation & Canning', 'desc' => 'Kegging & custom label canning.', 'date' => 'Scheduled for Aug 1, 2026', 'status' => 'upcoming', 'icon' => 'package']
                ]
            ]
        ],
        'order_history' => [
            [
                'id' => 'JB-9842',
                'date' => 'July 15, 2026',
                'status' => 'Out for Delivery',
                'delivery_type' => 'delivery',
                'carrier' => 'TT-Post Express Courier',
                'tracking' => 'TT-POST-9842011',
                'eta' => 'Today by 4:00 PM',
                'step' => 3,
                'address' => '14 Maraval Road, Port of Spain, Trinidad',
                'items' => [
                    ['name' => 'Brechin Castle Historic Blonde Ale', 'qty' => 2, 'price' => 15.00, 'image' => '/public/images/brechin_castle.jpg'],
                    ['name' => 'J\'ouvert Lager (6-Pack)', 'qty' => 1, 'price' => 28.00, 'image' => '/public/images/jouvert_lager.jpg']
                ],
                'total' => 58.00,
                'shipping' => 'Free (Krewe VIP)'
            ],
            [
                'id' => 'JB-8719',
                'date' => 'July 28, 2026',
                'status' => 'Ready for Brewery Collection',
                'delivery_type' => 'pickup',
                'location' => 'Jeff Brewery Taproom & Brewpub',
                'pickup_address' => 'Estate Road 4, Couva Industrial Estate, Trinidad',
                'pickup_code' => 'PICKUP-8719-VIP',
                'hours' => 'Mon - Sat: 10:00 AM - 9:00 PM',
                'step' => 3,
                'items' => [
                    ['name' => 'Soca Sorrel Ale', 'qty' => 3, 'price' => 18.00, 'image' => '/public/images/Soca Sorrel Ale.png'],
                    ['name' => 'Logo Hoodie - French Terry Pullover', 'qty' => 1, 'price' => 395.00, 'image' => 'https://placehold.co/600x750/333333/FFFFFF.png?text=French+Terry\nHoodie']
                ],
                'total' => 449.00,
                'shipping' => 'Taproom Pickup'
            ],
            [
                'id' => 'JB-7430',
                'date' => 'February 12, 2026',
                'status' => 'Delivered',
                'delivery_type' => 'delivery',
                'carrier' => 'TT-Post Standard',
                'tracking' => 'TT-POST-7430092',
                'eta' => 'Delivered Feb 14, 2026',
                'step' => 4,
                'address' => '14 Maraval Road, Port of Spain, Trinidad',
                'items' => [
                    ['name' => 'Bitter Truth Stout', 'qty' => 2, 'price' => 20.00, 'image' => '/public/images/bitter_truth_stout.jpg'],
                    ['name' => 'Tamarind Gose', 'qty' => 2, 'price' => 18.00, 'image' => '/public/images/Tamarind Gose.png']
                ],
                'total' => 76.00,
                'shipping' => '$15.00'
            ]
        ]
    ];
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Dispatch
if (class_exists($controllerName)) {
    $controller = new $controllerName();
    if (method_exists($controller, $action)) {
        // Pass any additional URL params to the action, excluding route parameter itself if from GET
        $params = $_GET;
        unset($params['route']);
        $controller->$action($params);
    } else {
        http_response_code(404);
        echo "404 Not Found - Action '$action' not found in '$controllerName'";
    }
} else {
    http_response_code(404);
    echo "404 Not Found - Controller '$controllerName' not found";
}
