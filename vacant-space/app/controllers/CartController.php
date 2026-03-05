<?php

class CartController extends Controller {

    public function checkout() {
        $this->render('cart/checkout', [
            'cart' => $_SESSION['cart']
        ]);
    }

    // AJAX Endpoint: GET /?route=cart/get
    public function get() {
        $cart = $_SESSION['cart'];
        $items = [];
        $subtotal = 0;

        foreach ($cart as $id => $qty) {
            $beer = Database::getBeerById($id);
            if ($beer) {
                $total = $beer['price'] * $qty;
                $subtotal += $total;
                $items[] = [
                    'id' => $id,
                    'name' => $beer['name'],
                    'price' => $beer['price'],
                    'qty' => $qty,
                    'image' => $beer['image'],
                    'totalPrice' => number_format($total, 2)
                ];
            }
        }

        $this->json([
            'items' => $items,
            'subtotal' => number_format($subtotal, 2),
            'count' => array_sum($cart)
        ]);
    }

    // AJAX Endpoint: POST /?route=cart/add
    public function add() {
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'] ?? null;
        $qty = $input['qty'] ?? 1;

        if ($id && Database::getBeerById($id)) {
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id] += $qty;
            } else {
                $_SESSION['cart'][$id] = $qty;
            }
            $this->json(['success' => true, 'count' => array_sum($_SESSION['cart'])]);
        } else {
            $this->json(['success' => false, 'error' => 'Invalid item'], 400);
        }
    }

    // AJAX Endpoint: POST /?route=cart/remove
    public function remove() {
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'] ?? null;

        if ($id && isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
            $this->json(['success' => true, 'count' => array_sum($_SESSION['cart'])]);
        } else {
            $this->json(['success' => false, 'error' => 'Item not in cart'], 400);
        }
    }

    // AJAX Endpoint: POST /?route=cart/update
    public function update() {
        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'] ?? null;
        $qty = $input['qty'] ?? 1;

        if ($id && isset($_SESSION['cart'][$id])) {
            if ($qty > 0) {
                $_SESSION['cart'][$id] = $qty;
                $this->json(['success' => true, 'count' => array_sum($_SESSION['cart'])]);
            } else {
                // If qty is 0, remove it
                unset($_SESSION['cart'][$id]);
                $this->json(['success' => true, 'count' => array_sum($_SESSION['cart'])]);
            }
        } else {
            $this->json(['success' => false, 'error' => 'Item not in cart'], 400);
        }
    }

    // AJAX Endpoint: POST /?route=cart/clear
    public function clear() {
        // Here we could calculate points earned before clearing if this was a purchase
        // But gamification hook will handle points differently 
        $_SESSION['cart'] = [];
        $this->json(['success' => true, 'count' => 0]);
    }
}
