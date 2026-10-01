<?php

class CheckoutController extends Controller {
    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // If cart is empty, provide default mock items so the checkout is immediately testable and beautiful
        if (empty($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
            $_SESSION['cart'] = [
                'island-ipa' => 1,
                'brechin-castle' => 1
            ];
        }

        $sessionCart = $_SESSION['cart'];
        $cart = [];
        $cartTotal = 0;
        
        foreach ($sessionCart as $id => $qty) {
            $beer = Database::getBeerById($id);
            if ($beer) {
                $itemTotal = $beer['price'] * $qty;
                $cartTotal += $itemTotal;
                $cart[] = [
                    'id' => $id,
                    'name' => $beer['name'],
                    'price' => $beer['price'],
                    'quantity' => $qty,
                    'qty' => $qty,
                    'image' => $beer['image'],
                    'style' => $beer['style'],
                    'totalPrice' => $itemTotal
                ];
            }
        }

        // User info from session
        $user = $_SESSION['user'] ?? [
            'name' => 'Jeff Smith',
            'email' => 'jeff.smith@jeffbrewery.com',
            'phone' => '+1 (868) 746-7332',
            'points' => 1450,
            'rank' => 'Master Brew Limer'
        ];

        $step = 'details';
        $orderData = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $step = 'success';
            
            $deliveryMethod = $_POST['deliveryMethod'] ?? 'delivery';
            $shippingCost = ($deliveryMethod === 'pickup') ? 0 : 15.00;
            $discount = floatval($_POST['appliedDiscount'] ?? 0);
            $finalTotal = max(0, $cartTotal + $shippingCost - $discount);
            $orderId = 'JB-' . rand(8000, 9999);

            $orderData = [
                'id' => $orderId,
                'date' => date('F j, Y'),
                'email' => $_POST['email'] ?? $user['email'],
                'firstName' => $_POST['firstName'] ?? 'Jeff',
                'lastName' => $_POST['lastName'] ?? 'Smith',
                'address' => $_POST['address'] ?? '14 Maraval Road',
                'apt' => $_POST['apt'] ?? '',
                'city' => $_POST['city'] ?? 'Port of Spain',
                'postalCode' => $_POST['postalCode'] ?? '',
                'phone' => $_POST['phone'] ?? '+1 (868) 746-7332',
                'deliveryMethod' => $deliveryMethod,
                'shippingCost' => $shippingCost,
                'discount' => $discount,
                'finalTotal' => $finalTotal,
                'pointsEarned' => 50,
                'paymentMethod' => $_POST['paymentMethod'] ?? 'card',
                'items' => $cart
            ];

            // Record in session user order history
            if (!isset($_SESSION['user']['order_history']) || !is_array($_SESSION['user']['order_history'])) {
                $_SESSION['user']['order_history'] = [];
            }
            array_unshift($_SESSION['user']['order_history'], [
                'id' => $orderId,
                'date' => date('F j, Y'),
                'status' => ($deliveryMethod === 'pickup') ? 'Ready for Taproom Collection' : 'Brewing & Bottling',
                'delivery_type' => ($deliveryMethod === 'pickup') ? 'pickup' : 'delivery',
                'carrier' => ($deliveryMethod === 'pickup') ? 'Couva Taproom' : 'TT-Post Express Courier',
                'tracking' => 'TT-POST-' . rand(1000000, 9999999),
                'eta' => '2-3 Business Days',
                'step' => 1,
                'address' => $orderData['address'] . ', ' . $orderData['city'] . ', Trinidad',
                'items' => $cart,
                'total' => $finalTotal,
                'shipping' => ($shippingCost === 0) ? 'Free Taproom Pickup' : '$15.00 Island Delivery'
            ]);

            // Award 50 Krewe points
            if (isset($_SESSION['user'])) {
                $_SESSION['user']['points'] = ($_SESSION['user']['points'] ?? 1450) + 50;
                // If points were redeemed, subtract 500
                if ($discount > 0) {
                    $_SESSION['user']['points'] = max(0, $_SESSION['user']['points'] - 500);
                }
            }

            // Record analytics purchase event for Admin Dashboard (Section 21)
            if (!isset($_SESSION['data_events'])) {
                $_SESSION['data_events'] = [];
            }
            $itemNames = array_map(fn($i) => $i['name'] . ' (x' . $i['quantity'] . ')', $cart);
            array_unshift($_SESSION['data_events'], [
                'id' => 'EVT-' . strtoupper(substr(uniqid(), -6)),
                'type' => 'purchase',
                'customer' => $orderData['firstName'] . ' ' . $orderData['lastName'],
                'product' => implode(', ', $itemNames),
                'source' => 'Checkout Page',
                'recId' => 'REC-ORD-' . $orderId,
                'time' => 'Just now',
                'timestamp' => time()
            ]);

            // Clear cart after checkout
            $_SESSION['cart'] = [];
        }

        $data = [
            'cart' => $cart,
            'cartTotal' => $cartTotal,
            'defaultShipping' => 15.00,
            'user' => $user,
            'step' => $step,
            'orderData' => $orderData
        ];

        $this->render('checkout/index', $data);
    }
}
