<?php

class AdminController extends Controller {
    public function index() {
        // Mock data for the dashboard
        $data = [
            'recentOrders' => [
                ['id' => 'ORD-1023', 'customer' => 'John Doe', 'total' => 45.00, 'status' => 'Shipped'],
                ['id' => 'ORD-1024', 'customer' => 'Jane Smith', 'total' => 120.00, 'status' => 'Pending'],
                ['id' => 'ORD-1025', 'customer' => 'Bob Miller', 'total' => 18.00, 'status' => 'Delivered'],
            ],
            'inventory' => Database::getBeers()
        ];

        $this->render('admin/index', $data);
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
