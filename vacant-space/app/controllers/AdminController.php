<?php

class AdminController extends Controller {
    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Initialize orders if not set
        if (!isset($_SESSION['user']['order_history'])) {
            $_SESSION['user']['order_history'] = [
                ['id' => 'JB-9842', 'customer' => 'Jeff Smith', 'total' => 58.00, 'status' => 'Out for Delivery', 'date' => 'Today 12:35 PM', 'delivery_type' => 'delivery', 'carrier' => 'TT-Post Express Courier', 'eta' => 'Today by 4:00 PM', 'step' => 3],
                ['id' => 'JB-8719', 'customer' => 'Jane Doe', 'total' => 449.00, 'status' => 'Ready for Brewery Collection', 'date' => 'July 28, 2026', 'delivery_type' => 'pickup', 'pickup_code' => 'PICKUP-8719-VIP', 'location' => 'Jeff Brewery Taproom', 'step' => 3],
                ['id' => 'JB-7430', 'customer' => 'Bob Miller', 'total' => 76.00, 'status' => 'Delivered', 'date' => 'Feb 12, 2026', 'delivery_type' => 'delivery', 'step' => 4],
                ['id' => 'JB-6520', 'customer' => 'Maria Gonzales', 'total' => 112.00, 'status' => 'Brewing & Bottling', 'date' => 'Yesterday 3:15 PM', 'delivery_type' => 'delivery', 'step' => 2],
                ['id' => 'JB-5108', 'customer' => 'Liam Hosein', 'total' => 34.00, 'status' => 'Order Placed', 'date' => 'Today 9:20 AM', 'delivery_type' => 'pickup', 'step' => 1],
            ];
        }
        $userOrders = $_SESSION['user']['order_history'];

        // Live customer activity stream
        $customerActivity = [
            ['user' => 'Jeff Smith', 'email' => 'jeff.smith@jeffbrewery.com', 'action' => 'Placed Order #JB-9842', 'type' => 'order', 'amount' => '$58.00', 'time' => '10 mins ago', 'icon' => 'truck', 'badge' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20', 'detail' => 'Out for Delivery'],
            ['user' => 'Jeff Smith', 'email' => 'jeff.smith@jeffbrewery.com', 'action' => 'Order #JB-8719 is Ready for Taproom Collection', 'type' => 'pickup', 'amount' => 'PICKUP-8719', 'time' => '25 mins ago', 'icon' => 'package-check', 'badge' => 'bg-amber-500/10 text-amber-400 border-amber-500/20', 'detail' => 'Taproom Collection'],
            ['user' => 'Jeff Smith', 'email' => 'jeff.smith@jeffbrewery.com', 'action' => 'Logged into Customer Portal', 'type' => 'login', 'amount' => 'IP: 190.213.4.12', 'time' => '30 mins ago', 'icon' => 'log-in', 'badge' => 'bg-blue-500/10 text-blue-400 border-blue-500/20', 'detail' => 'Port of Spain, TT'],
            ['user' => 'Jeff Smith', 'email' => 'jeff.smith@jeffbrewery.com', 'action' => 'Saved Custom Brew: "Jeff\'s Spicy Mango Haze"', 'type' => 'craft', 'amount' => '6.8% ABV', 'time' => '1 hour ago', 'icon' => 'flask-conical', 'badge' => 'bg-teal-500/10 text-teal-400 border-teal-500/20', 'detail' => 'Custom Brew Lab'],
            ['user' => 'Jeff Smith', 'email' => 'jeff.smith@jeffbrewery.com', 'action' => 'Earned 50 Loyalty Points for Brew Review', 'type' => 'points', 'amount' => '+50 pts', 'time' => '2 hours ago', 'icon' => 'coins', 'badge' => 'bg-yellow-500/10 text-yellow-400 border-yellow-500/20', 'detail' => 'Island IPA Review'],
            ['user' => 'Jeff Smith', 'email' => 'jeff.smith@jeffbrewery.com', 'action' => 'Added Island IPA to Wishlist', 'type' => 'wishlist', 'amount' => 'Wishlist', 'time' => '3 hours ago', 'icon' => 'heart', 'badge' => 'bg-red-500/10 text-red-400 border-red-500/20', 'detail' => 'Catalog Interaction'],
            ['user' => 'Maria Gonzales', 'email' => 'maria.g@gmail.com', 'action' => 'Asked Brewer Guide: "What beer is similar to Island IPA?"', 'type' => 'chatbot', 'amount' => 'Chatbot', 'time' => '3.5 hours ago', 'icon' => 'message-square', 'badge' => 'bg-purple-500/10 text-purple-400 border-purple-500/20', 'detail' => 'Recommended OCD Saison (91%)'],
            ['user' => 'Liam Hosein', 'email' => 'liam.h@outlook.com', 'action' => 'Clicked AI Recommendation for Bitter Truth Stout', 'type' => 'recommendation', 'amount' => '83% Match', 'time' => '4 hours ago', 'icon' => 'sparkles', 'badge' => 'bg-indigo-500/10 text-indigo-400 border-indigo-500/20', 'detail' => 'Added to Cart']
        ];

        // Key Performance Indicators (Section 3)
        $kpis = [
            'totalRevenue' => ['value' => '$24,500', 'change' => '+12%', 'period' => 'vs last week', 'icon' => 'dollar-sign', 'color' => 'emerald'],
            'activeOrders' => ['value' => '42', 'change' => '8 pending', 'period' => 'processing', 'icon' => 'shopping-bag', 'color' => 'blue'],
            'loyaltyPoints' => ['value' => '12,500', 'change' => '18%', 'period' => 'engagement', 'icon' => 'award', 'color' => 'purple'],
            'inventoryAlerts' => ['value' => '3', 'change' => 'Low Stock', 'period' => 'needs attention', 'icon' => 'alert-triangle', 'color' => 'red'],
            'aiRecommendations' => ['value' => '1,284', 'change' => '+24%', 'period' => 'recommendations generated', 'icon' => 'sparkles', 'color' => 'amber'],
            'recommendationConversion' => ['value' => '6.1%', 'change' => '+1.4%', 'period' => 'resulting in purchases', 'icon' => 'trending-up', 'color' => 'teal']
        ];

        // Sales Performance across periods (Section 5)
        $salesAnalytics = [
            'periods' => [
                '7d' => ['revenue' => 24500, 'orders' => 42, 'aov' => 58.33, 'unitsSold' => 1240, 'conversionRate' => '3.4%'],
                '30d' => ['revenue' => 89400, 'orders' => 158, 'aov' => 56.58, 'unitsSold' => 4520, 'conversionRate' => '3.8%'],
                '90d' => ['revenue' => 245000, 'orders' => 420, 'aov' => 58.33, 'unitsSold' => 12450, 'conversionRate' => '4.1%'],
                'year' => ['revenue' => 890000, 'orders' => 1480, 'aov' => 60.13, 'unitsSold' => 45800, 'conversionRate' => '4.5%']
            ]
        ];

        // Product Performance Analytics (Section 6)
        $productPerformance = [
            ['name' => 'Island IPA', 'style' => 'IPA', 'views' => 428, 'wishlist' => 64, 'cartAdds' => 81, 'purchases' => 52, 'revenue' => 936, 'conversion' => '12.1%'],
            ['name' => 'Bitter Truth Stout', 'style' => 'Stout', 'views' => 351, 'wishlist' => 48, 'cartAdds' => 62, 'purchases' => 38, 'revenue' => 760, 'conversion' => '10.8%'],
            ['name' => 'Brechin Castle', 'style' => 'Blonde Ale', 'views' => 302, 'wishlist' => 39, 'cartAdds' => 51, 'purchases' => 34, 'revenue' => 510, 'conversion' => '11.3%'],
            ['name' => 'J\'ouvert Lager', 'style' => 'Lager', 'views' => 280, 'wishlist' => 35, 'cartAdds' => 45, 'purchases' => 30, 'revenue' => 450, 'conversion' => '10.7%'],
            ['name' => 'Maracas Mist', 'style' => 'Wheat', 'views' => 260, 'wishlist' => 32, 'cartAdds' => 40, 'purchases' => 26, 'revenue' => 416, 'conversion' => '10.0%'],
            ['name' => 'Sugarcane Kölsch', 'style' => 'Kölsch', 'views' => 220, 'wishlist' => 29, 'cartAdds' => 38, 'purchases' => 24, 'revenue' => 384, 'conversion' => '10.9%'],
            ['name' => 'OCD Saison', 'style' => 'Saison', 'views' => 214, 'wishlist' => 31, 'cartAdds' => 42, 'purchases' => 21, 'revenue' => 504, 'conversion' => '9.8%'],
            ['name' => 'Soca Starter', 'style' => 'IPA', 'views' => 210, 'wishlist' => 26, 'cartAdds' => 34, 'purchases' => 22, 'revenue' => 330, 'conversion' => '10.5%'],
            ['name' => 'Soca Sorrel Ale', 'style' => 'Ale', 'views' => 195, 'wishlist' => 28, 'cartAdds' => 36, 'purchases' => 22, 'revenue' => 396, 'conversion' => '11.2%'],
            ['name' => 'Midnight Robber', 'style' => 'Stout', 'views' => 190, 'wishlist' => 22, 'cartAdds' => 28, 'purchases' => 16, 'revenue' => 400, 'conversion' => '8.4%'],
            ['name' => 'Tamarind Gose', 'style' => 'Gose', 'views' => 180, 'wishlist' => 24, 'cartAdds' => 30, 'purchases' => 18, 'revenue' => 342, 'conversion' => '10.0%']
        ];

        // AI Recommendation Analytics (Section 7, 8, 9)
        $aiRecommendationStats = [
            'funnel' => [
                'generated' => 1284,
                'viewed' => 927,
                'clicked' => 347,
                'cartAdds' => 126,
                'purchased' => 78,
                'conversionRate' => '6.1%'
            ],
            'mostRecommended' => [
                ['name' => 'Island IPA', 'recommendations' => 284, 'clicks' => 92, 'cartAdds' => 34, 'purchases' => 24, 'conversion' => '8.5%', 'match' => 'High', 'status' => 'In Stock'],
                ['name' => 'Bitter Truth Stout', 'recommendations' => 231, 'clicks' => 71, 'cartAdds' => 29, 'purchases' => 18, 'conversion' => '7.8%', 'match' => 'High', 'status' => 'In Stock'],
                ['name' => 'OCD Saison', 'recommendations' => 186, 'clicks' => 48, 'cartAdds' => 17, 'purchases' => 12, 'conversion' => '6.5%', 'match' => 'Strong (Low Stock)', 'status' => 'Low Stock'],
                ['name' => 'Brechin Castle', 'recommendations' => 164, 'clicks' => 42, 'cartAdds' => 15, 'purchases' => 9, 'conversion' => '5.5%', 'match' => 'Moderate', 'status' => 'In Stock'],
                ['name' => 'J\'ouvert Lager', 'recommendations' => 151, 'clicks' => 37, 'cartAdds' => 14, 'purchases' => 8, 'conversion' => '5.3%', 'match' => 'Popularity-Based', 'status' => 'In Stock']
            ],
            'insights' => [
                [
                    'product' => 'Island IPA',
                    'observation' => 'Frequently recommended to customers who interact with high-IBU and IPA products.',
                    'match' => 'High',
                    'inventory' => 'In Stock (142/200)',
                    'priority' => 'Normal / High',
                    'badge' => 'border-emerald-500/30 text-emerald-400 bg-emerald-500/10'
                ],
                [
                    'product' => 'OCD Saison',
                    'observation' => 'Strong preference match among customers interested in complex and higher-ABV beers.',
                    'match' => 'High',
                    'inventory' => 'Low Stock (12/50)',
                    'priority' => 'Reduced (Low Stock Warning)',
                    'badge' => 'border-amber-500/30 text-amber-400 bg-amber-500/10'
                ],
                [
                    'product' => 'Bitter Truth Stout',
                    'observation' => 'Frequently purchased by customers who previously purchased darker and higher-ABV beers.',
                    'match' => 'High',
                    'inventory' => 'In Stock (142/200)',
                    'priority' => 'High',
                    'badge' => 'border-purple-500/30 text-purple-400 bg-purple-500/10'
                ],
                [
                    'product' => 'J\'ouvert Lager',
                    'observation' => 'High popularity among new customers as a crisp entry-level session beer.',
                    'match' => 'Popularity-Based',
                    'inventory' => 'In Stock (142/200)',
                    'priority' => 'High for New Visitors',
                    'badge' => 'border-blue-500/30 text-blue-400 bg-blue-500/10'
                ]
            ]
        ];

        // Customer Intelligence Profile (Section 10, 11, 12)
        $customerIntelligence = [
            'customer' => [
                'name' => 'Jeff Smith',
                'email' => 'jeff.smith@jeffbrewery.com',
                'phone' => '+1 (868) 746-7332',
                'memberSince' => 'March 14, 2024',
                'lastLogin' => '30 mins ago (IP: 190.213.4.12)',
                'totalOrders' => 14,
                'totalSpent' => '$748.00',
                'loyaltyPoints' => 1450,
                'rank' => 'Master Brew Limer',
                'favProducts' => ['Island IPA', 'Brechin Castle', 'Maracas Mist']
            ],
            'stylePreferences' => [
                ['name' => 'IPA', 'percent' => 90],
                ['name' => 'Saison', 'percent' => 80],
                ['name' => 'Stout', 'percent' => 70],
                ['name' => 'Ale', 'percent' => 55],
                ['name' => 'Lager', 'percent' => 40]
            ],
            'tastePreferences' => [
                ['name' => 'Bitterness', 'percent' => 90],
                ['name' => 'Complexity', 'percent' => 80],
                ['name' => 'Fruitiness', 'percent' => 65],
                ['name' => 'Sweetness', 'percent' => 30]
            ],
            'strengthPreference' => ['name' => 'ABV Preference (High ABV)', 'percent' => 80],
            'recommendations' => [
                [
                    'product' => 'Island IPA',
                    'match' => 94,
                    'price' => 18,
                    'reason' => 'Customer frequently interacts with IPA products and previously purchased Island IPA.',
                    'explanationType' => 'Similar to previously purchased products',
                    'stock' => 'In Stock'
                ],
                [
                    'product' => 'OCD Saison',
                    'match' => 88,
                    'price' => 24,
                    'reason' => 'Customer has shown interest in higher-ABV and complex beers.',
                    'explanationType' => 'Matches customer taste preferences',
                    'stock' => 'Low Stock (12 left)'
                ],
                [
                    'product' => 'Bitter Truth Stout',
                    'match' => 83,
                    'price' => 20,
                    'reason' => 'Customer previously purchased darker beers with higher bitterness.',
                    'explanationType' => 'Matches taste preferences & past purchases',
                    'stock' => 'In Stock'
                ]
            ]
        ];

        // Chatbot Analytics (Section 13, 14)
        $chatbotAnalytics = [
            'totalConversations' => 412,
            'questionsAsked' => 1845,
            'productRecommendations' => 642,
            'recommendationClicks' => 218,
            'cartAdds' => 89,
            'purchases' => 54,
            'commonQueries' => [
                ['query' => 'What beer is similar to Island IPA?', 'count' => 142, 'topMatch' => 'OCD Saison (91%)'],
                ['query' => 'What is your strongest beer?', 'count' => 118, 'topMatch' => 'Midnight Robber (8.0% ABV)'],
                ['query' => 'What would you recommend?', 'count' => 96, 'topMatch' => 'Personalised Rec Model'],
                ['query' => 'I want something sweet.', 'count' => 74, 'topMatch' => 'Sugarcane Kölsch & Soca Sorrel'],
                ['query' => 'What beer has the highest IBU?', 'count' => 68, 'topMatch' => 'Island IPA (65 IBU)'],
                ['query' => 'What is popular right now?', 'count' => 61, 'topMatch' => 'J\'ouvert Lager'],
                ['query' => 'What should I try?', 'count' => 54, 'topMatch' => 'Brechin Castle (Historic Blonde)']
            ]
        ];

        // Gamification Analytics (Section 17)
        $gamification = [
            'pointsAwarded' => 45200,
            'pointsRedeemed' => 18400,
            'reviewsCompleted' => 148,
            'challengesCompleted' => 82,
            'rewardsClaimed' => 96,
            'repeatPurchases' => '64%',
            'levelsDistribution' => [
                ['name' => 'Freshman Liming', 'count' => 120, 'badge' => '🌴'],
                ['name' => 'Taste Explorer', 'count' => 68, 'badge' => '🍺'],
                ['name' => 'Stocked Cooler', 'count' => 24, 'badge' => '🧊'],
                ['name' => 'Carnival King (VIP)', 'count' => 8, 'badge' => '👑']
            ]
        ];

        // Data Collection Event Stream (Section 21)
        $dataEvents = [
            ['event' => 'purchase', 'customer' => 'Jeff Smith', 'product' => 'Island IPA (x2), Maracas Mist (x1)', 'source' => 'Checkout Flow', 'recId' => 'REC-IPA-94', 'time' => '12 mins ago'],
            ['event' => 'cart_add', 'customer' => 'Jeff Smith', 'product' => 'Island IPA', 'source' => 'Shop Page', 'recId' => 'N/A', 'time' => '22 mins ago'],
            ['event' => 'recommendation_click', 'customer' => 'Maria Gonzales', 'product' => 'OCD Saison', 'source' => 'TriniChat Assistant', 'recId' => 'REC-SAIS-91', 'time' => '38 mins ago'],
            ['event' => 'chatbot_message', 'customer' => 'Maria Gonzales', 'product' => 'Inquiry', 'source' => 'Brewer Guide', 'recId' => 'N/A', 'time' => '42 mins ago'],
            ['event' => 'product_view', 'customer' => 'Liam Hosein', 'product' => 'Bitter Truth Stout', 'source' => 'Catalog Grid', 'recId' => 'N/A', 'time' => '1 hour ago'],
            ['event' => 'wishlist_add', 'customer' => 'Jeff Smith', 'product' => 'Island IPA', 'source' => 'Product Detail', 'recId' => 'N/A', 'time' => '3 hours ago'],
            ['event' => 'custom_brew_saved', 'customer' => 'Jeff Smith', 'product' => 'Jeff\'s Spicy Mango Haze (6.8%)', 'source' => 'Craft Lab', 'recId' => 'BATCH-MNG-9842', 'time' => '1 hour ago'],
            ['event' => 'review_submit', 'customer' => 'Jeff Smith', 'product' => 'Island IPA (5 Stars)', 'source' => 'Reviews Modal', 'recId' => 'N/A', 'time' => '2 hours ago'],
            ['event' => 'loyalty_points_earned', 'customer' => 'Jeff Smith', 'product' => '+50 Points Awarded', 'source' => 'Gamification Engine', 'recId' => 'N/A', 'time' => '2 hours ago']
        ];

        $data = [
            'kpis' => $kpis,
            'recentOrders' => $userOrders,
            'customerActivity' => $customerActivity,
            'salesAnalytics' => $salesAnalytics,
            'productPerformance' => $productPerformance,
            'aiRecommendations' => $aiRecommendationStats,
            'customerIntelligence' => $customerIntelligence,
            'chatbotAnalytics' => $chatbotAnalytics,
            'gamification' => $gamification,
            'dataEvents' => $dataEvents,
            'inventory' => Database::getBeers()
        ];

        $this->render('admin/index', $data);
    }

    public function updateOrderStatus() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $input = json_decode(file_get_contents('php://input'), true);
        $orderId = $input['orderId'] ?? null;
        $newStatus = $input['status'] ?? null;

        if ($orderId && $newStatus) {
            if (isset($_SESSION['user']['order_history'])) {
                foreach ($_SESSION['user']['order_history'] as &$ord) {
                    if ($ord['id'] === $orderId) {
                        $ord['status'] = $newStatus;
                        if ($newStatus === 'Ready for Brewery Collection' || $newStatus === 'Ready for Collection') {
                            $ord['step'] = 3;
                            $ord['delivery_type'] = 'pickup';
                            $ord['pickup_code'] = 'PICKUP-' . rand(1000, 9999) . '-VIP';
                            $ord['location'] = 'Jeff Brewery Taproom & Brewpub';
                            $ord['pickup_address'] = 'Estate Road 4, Couva Industrial Estate, Trinidad';
                            $ord['hours'] = 'Mon - Sat: 10:00 AM - 9:00 PM';
                        } elseif ($newStatus === 'Out for Delivery') {
                            $ord['step'] = 3;
                            $ord['delivery_type'] = 'delivery';
                            $ord['carrier'] = 'TT-Post Express Courier';
                            $ord['eta'] = 'Today by 4:00 PM';
                        } elseif ($newStatus === 'Delivered' || $newStatus === 'Picked Up') {
                            $ord['step'] = 4;
                        } elseif ($newStatus === 'Brewing & Bottling') {
                            $ord['step'] = 2;
                        } elseif ($newStatus === 'Order Placed') {
                            $ord['step'] = 1;
                        }
                        break;
                    }
                }
            }
            $this->json(['success' => true, 'orderId' => $orderId, 'newStatus' => $newStatus]);
        } else {
            $this->json(['success' => false, 'error' => 'Invalid order data'], 400);
        }
    }

    public function addProduct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $input = json_decode(file_get_contents('php://input'), true);
        $name = trim($input['name'] ?? '');
        $style = trim($input['style'] ?? 'IPA');
        $price = floatval($input['price'] ?? 15);
        $stock = intval($input['stock'] ?? 142);
        $maxStock = intval($input['max_stock'] ?? 200);
        $abv = floatval($input['abv'] ?? 5.5);
        $ibu = intval($input['ibu'] ?? 30);
        $description = trim($input['description'] ?? 'Craft beer created in Couva Brew Lab.');
        $availability = trim($input['availability'] ?? 'CORE');
        $image = trim($input['image'] ?? '/public/images/Island IPA.png');

        if (empty($name)) {
            $this->json(['success' => false, 'error' => 'Product name is required'], 400);
            return;
        }

        $id = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $name));
        $newBeer = [
            'id' => $id,
            'name' => $name,
            'tagline' => 'Handcrafted Trinbagonian brew.',
            'style' => strtoupper($style),
            'abv' => $abv,
            'ibu' => $ibu,
            'price' => $price,
            'stock' => $stock,
            'max_stock' => $maxStock,
            'description' => $description,
            'flavorProfile' => ['Tropical', 'Balanced Malt', 'Craft Freshness'],
            'pairing' => ['Local Caribbean Dishes', 'Grilled Meats'],
            'vibe' => 'Island Craft',
            'availability' => $availability,
            'image' => $image,
            'reviews' => []
        ];

        if (!isset($_SESSION['beers_custom'])) {
            $_SESSION['beers_custom'] = [];
        }
        $_SESSION['beers_custom'][] = $newBeer;

        $this->json(['success' => true, 'beer' => $newBeer]);
    }

    public function updateProduct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'] ?? null;

        if (!$id) {
            $this->json(['success' => false, 'error' => 'Beer ID is required'], 400);
            return;
        }

        if (!isset($_SESSION['beers_data_overrides'])) {
            $_SESSION['beers_data_overrides'] = [];
        }

        $allowedKeys = ['price', 'stock', 'max_stock', 'abv', 'ibu', 'style', 'description', 'availability', 'image', 'tagline'];
        $updates = [];
        foreach ($allowedKeys as $k) {
            if (isset($input[$k])) {
                $updates[$k] = $input[$k];
            }
        }

        $_SESSION['beers_data_overrides'][$id] = array_merge(
            $_SESSION['beers_data_overrides'][$id] ?? [],
            $updates
        );

        $this->json(['success' => true, 'id' => $id, 'updates' => $updates]);
    }

    public function deleteProduct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'] ?? null;

        if (!$id) {
            $this->json(['success' => false, 'error' => 'Product ID is required'], 400);
            return;
        }

        if (!isset($_SESSION['beers_deleted'])) {
            $_SESSION['beers_deleted'] = [];
        }
        if (!in_array($id, $_SESSION['beers_deleted'])) {
            $_SESSION['beers_deleted'][] = $id;
        }

        $this->json(['success' => true, 'id' => $id]);
    }

    public function exportReport() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $format = $_GET['format'] ?? 'csv';
        $type = $_GET['type'] ?? 'sales';

        if ($format === 'json') {
            header('Content-Type: application/json');
            header('Content-Disposition: attachment; filename="jeff_brewery_' . $type . '_report_' . date('Y-m-d') . '.json"');
            echo json_encode([
                'generated_at' => date('Y-m-d H:i:s'),
                'report_type' => $type,
                'metrics' => [
                    'revenue' => 24500,
                    'orders' => 42,
                    'loyalty_points' => 12500,
                    'ai_recommendations' => 1284,
                    'recommendation_conversion' => '6.1%'
                ],
                'inventory' => Database::getBeers()
            ], JSON_PRETTY_PRINT);
            exit;
        }

        // CSV export
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="jeff_brewery_' . $type . '_report_' . date('Y-m-d') . '.csv"');
        
        $out = fopen('php://output', 'w');
        fputcsv($out, ['Report', 'Jeff Brewery Intelligent E-Commerce Admin Report']);
        fputcsv($out, ['Date', date('Y-m-d H:i:s')]);
        fputcsv($out, ['Type', strtoupper($type)]);
        fputcsv($out, []);

        if ($type === 'inventory') {
            fputcsv($out, ['ID', 'Product Name', 'Style', 'Price', 'ABV', 'IBU', 'Stock', 'Max Stock', 'Availability']);
            foreach (Database::getBeers() as $b) {
                fputcsv($out, [$b['id'], $b['name'], $b['style'], $b['price'], $b['abv'], $b['ibu'] ?? 30, $b['stock'] ?? 142, $b['max_stock'] ?? 200, $b['availability']]);
            }
        } else {
            fputcsv($out, ['Metric', 'Value', 'Change']);
            fputcsv($out, ['Total Revenue', '$24,500', '+12% vs last week']);
            fputcsv($out, ['Active Orders', '42', '8 pending processing']);
            fputcsv($out, ['Loyalty Points', '12,500', '18% engagement']);
            fputcsv($out, ['AI Recommendations Generated', '1,284', '+24%']);
            fputcsv($out, ['Recommendation Conversion Rate', '6.1%', '+1.4%']);
            fputcsv($out, []);
            fputcsv($out, ['Order ID', 'Customer', 'Mode', 'Status', 'Total']);
            foreach ($_SESSION['user']['order_history'] ?? [] as $o) {
                fputcsv($out, [$o['id'], $o['customer'], $o['delivery_type'] ?? 'delivery', $o['status'], '$' . number_format($o['total'], 2)]);
            }
        }

        fclose($out);
        exit;
    }

    public function updateBeerImage() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'] ?? null;
        $image = $input['image'] ?? null;

        if ($id && $image) {
            if (!isset($_SESSION['beers_overrides'])) {
                $_SESSION['beers_overrides'] = [];
            }
            $_SESSION['beers_overrides'][$id] = $image;
            $this->json(['success' => true]);
        } else {
            $this->json(['success' => false, 'error' => 'Invalid data'], 400);
        }
    }

}
