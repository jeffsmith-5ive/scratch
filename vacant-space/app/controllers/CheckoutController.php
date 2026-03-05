<?php

class CheckoutController extends Controller {
    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        $cartTotal = 0;
        
        foreach ($cart as $item) {
            $cartTotal += $item['price'] * $item['quantity'];
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
            // Simulate processing
            $step = 'success';
            $formData = [
                'firstName' => $_POST['firstName'] ?? '',
                'address' => $_POST['address'] ?? '',
                'city' => $_POST['city'] ?? ''
            ];
            
            // Clear cart
            if (isset($_SESSION['cart'])) {
                unset($_SESSION['cart']);
            }
            
            // Re-calculate after clearing so the view doesn't break, though we don't need it on success
            $cart = []; 
            $cartTotal = 0;
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
