<?php

class CheckoutController extends Controller {
    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $sessionCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
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
                    'image' => $beer['image'],
                    'style' => $beer['style'],
                    'totalPrice' => $itemTotal
                ];
            }
        }

        $shippingCost = $cartTotal > 100 ? 0 : 15;
        $finalTotal = $cartTotal + $shippingCost;

        $step = 'details';
        $formData = [
            'firstName' => '',
            'address' => '',
            'city' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $step = 'success';
            $formData = [
                'firstName' => $_POST['firstName'] ?? '',
                'address' => $_POST['address'] ?? '',
                'city' => $_POST['city'] ?? ''
            ];
            
            // Clear cart
            $_SESSION['cart'] = [];
        }

        $data = [
            'cart' => $cart,
            'cartTotal' => $cartTotal,
            'shippingCost' => $shippingCost,
            'finalTotal' => $finalTotal,
            'step' => $step,
            'formData' => $formData
        ];

        $this->render('checkout/index', $data);
    }
}
