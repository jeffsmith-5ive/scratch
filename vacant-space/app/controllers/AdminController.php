<?php

class AdminController extends Controller {
    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $userOrders = $_SESSION['user']['order_history'] ?? [
            ['id' => 'JB-9842', 'customer' => 'Jeff Smith', 'total' => 58.00, 'status' => 'Out for Delivery', 'date' => 'Today 12:35 PM', 'delivery_type' => 'delivery'],
            ['id' => 'JB-8719', 'customer' => 'Jane Doe', 'total' => 449.00, 'status' => 'Ready for Brewery Collection', 'date' => 'July 28, 2026', 'delivery_type' => 'pickup'],
            ['id' => 'JB-7430', 'customer' => 'Bob Miller', 'total' => 76.00, 'status' => 'Delivered', 'date' => 'Feb 12, 2026', 'delivery_type' => 'delivery'],
        ];

        $data = [
            'recentOrders' => $userOrders,
            'customerActivity' => [
                ['user' => 'Jeff Smith', 'email' => 'jeff.smith@jeffbrewery.com', 'action' => 'Placed Order #JB-9842 (Out for Delivery)', 'type' => 'order', 'amount' => '$58.00', 'time' => '10 mins ago', 'icon' => 'truck', 'badge' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20'],
                ['user' => 'Jeff Smith', 'email' => 'jeff.smith@jeffbrewery.com', 'action' => 'Order #JB-8719 is Ready for Taproom Collection', 'type' => 'pickup', 'amount' => 'PICKUP-8719', 'time' => '25 mins ago', 'icon' => 'package-check', 'badge' => 'bg-amber-500/10 text-amber-400 border-amber-500/20'],
                ['user' => 'Jeff Smith', 'email' => 'jeff.smith@jeffbrewery.com', 'action' => 'Logged into Customer Portal', 'type' => 'login', 'amount' => 'IP: 190.213.4.12', 'time' => '30 mins ago', 'icon' => 'log-in', 'badge' => 'bg-blue-500/10 text-blue-400 border-blue-500/20'],
                ['user' => 'Jeff Smith', 'email' => 'jeff.smith@jeffbrewery.com', 'action' => 'Saved Custom Brew: "Jeff\'s Spicy Mango Haze"', 'type' => 'craft', 'amount' => '6.8% ABV', 'time' => '1 hour ago', 'icon' => 'flask-conical', 'badge' => 'bg-teal-500/10 text-teal-400 border-teal-500/20'],
                ['user' => 'Jeff Smith', 'email' => 'jeff.smith@jeffbrewery.com', 'action' => 'Earned 50 Loyalty Points for Brew Review', 'type' => 'points', 'amount' => '+50 pts', 'time' => '2 hours ago', 'icon' => 'coins', 'badge' => 'bg-yellow-500/10 text-yellow-400 border-yellow-500/20'],
                ['user' => 'Jeff Smith', 'email' => 'jeff.smith@jeffbrewery.com', 'action' => 'Added Island IPA to Wishlist', 'type' => 'wishlist', 'amount' => 'Wishlist', 'time' => '3 hours ago', 'icon' => 'heart', 'badge' => 'bg-red-500/10 text-red-400 border-red-500/20']
            ],
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
                        if ($newStatus === 'Ready for Brewery Collection') {
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

    public function updateBeerImage() {
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

    public function generateBeerImage() {
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'] ?? null;

        if (!$id) {
            $this->json(['success' => false, 'error' => 'ID is missing'], 400);
            return;
        }

        $beer = Database::getBeerById($id);
        if (!$beer) {
            $this->json(['success' => false, 'error' => 'Beer not found'], 404);
            return;
        }

        // Map styles to premium Unsplash mock generative images
        $styleLower = strtolower($beer['style'] ?? '');
        $imageUrl = 'https://images.unsplash.com/photo-1566633806327-68e152aaf26d?auto=format&fit=crop&w=600&q=80'; // fallback IPA/ale

        if (str_contains($styleLower, 'lager') || str_contains($styleLower, 'kolsch')) {
            $imageUrl = 'https://images.unsplash.com/photo-1532635224-cf024e66d122?auto=format&fit=crop&w=600&q=80';
        } elseif (str_contains($styleLower, 'stout')) {
            $imageUrl = 'https://images.unsplash.com/photo-1571613316887-6f8d5cbf7ef7?auto=format&fit=crop&w=600&q=80';
        } elseif (str_contains($styleLower, 'sour') || str_contains($styleLower, 'gose') || str_contains($styleLower, 'saison')) {
            $imageUrl = 'https://images.unsplash.com/photo-1608270586620-248524c67de9?auto=format&fit=crop&w=600&q=80';
        }

        if (!isset($_SESSION['beers_overrides'])) {
            $_SESSION['beers_overrides'] = [];
        }
        $_SESSION['beers_overrides'][$id] = $imageUrl;

        $this->json([
            'success' => true,
            'image' => $imageUrl
        ]);
    }

    public function resetBeerImage() {
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'] ?? null;

        if ($id) {
            if (isset($_SESSION['beers_overrides'][$id])) {
                unset($_SESSION['beers_overrides'][$id]);
            }
            // Get original beer image from Database by temporarily bypassing session overrides
            $overrides = $_SESSION['beers_overrides'] ?? [];
            unset($_SESSION['beers_overrides']);
            $originalBeer = Database::getBeerById($id);
            $_SESSION['beers_overrides'] = $overrides;
            
            $originalImage = $originalBeer['image'] ?? '';
            $this->json(['success' => true, 'image' => $originalImage]);
        } else {
            $this->json(['success' => false, 'error' => 'Invalid data'], 400);
        }
    }
}
