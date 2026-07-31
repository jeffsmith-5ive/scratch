<?php

class CraftController extends Controller {
    public function index() {
        // Render the craft lager page
        $this->render('craft/index');
    }

    public function timeline($params = []) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $id = $params['id'] ?? 'rec_101';
        $savedRecipes = $_SESSION['user']['saved_recipes'] ?? [];
        $selectedRecipe = null;

        foreach ($savedRecipes as $recipe) {
            if (($recipe['id'] ?? '') === $id || ($recipe['batch_id'] ?? '') === $id) {
                $selectedRecipe = $recipe;
                break;
            }
        }

        if (!$selectedRecipe && !empty($savedRecipes)) {
            $selectedRecipe = $savedRecipes[0];
        }

        $this->render('craft/timeline', [
            'recipe' => $selectedRecipe,
            'allRecipes' => $savedRecipes
        ]);
    }

    public function addCustomToCart() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $input = json_decode(file_get_contents('php://input'), true);
        $name = !empty($input['name']) ? trim($input['name']) : 'My Custom Lager';
        $malt = $input['malt'] ?? 'Pilsner';
        $hops = $input['hops'] ?? 'Cascade';
        $abv = floatval($input['abv'] ?? 5.0);
        $notes = is_array($input['notes']) ? implode(' & ', $input['notes']) : ($input['notes'] ?? 'Clean finish');
        $qty = intval($input['qty'] ?? 1);
        $isPilot = !empty($input['isPilotBatch']);

        $recipeId = 'custom_' . time();
        $batchId = 'BATCH-CRAFT-' . rand(1000, 9999);

        $newRecipe = [
            'id' => $recipeId,
            'batch_id' => $batchId,
            'name' => $name,
            'base' => $malt . ' Malt Lager',
            'infusion' => $hops . ' Hops & ' . ($notes ?: 'Citrus Notes'),
            'abv' => number_format($abv, 1) . '%',
            'ibu' => 35,
            'created_at' => date('F d, Y'),
            'notes' => "Custom $malt base lager hopped with $hops.",
            'status' => 'Order Placed',
            'progress_percent' => 10,
            'current_stage_index' => 1,
            'temp' => '18.0 °C',
            'gravity' => '1.048 SG',
            'est_completion' => date('F d, Y', strtotime('+7 days')),
            'brewer_notes' => 'Custom batch queued for mashing & milling in tank #F-08.',
            'timeline' => [
                ['stage' => 'Mashing & Milling', 'desc' => "Crushed $malt malt queued for mash infusion.", 'date' => date('M d, Y') . ' - Queued', 'status' => 'in_progress', 'icon' => 'wheat'],
                ['stage' => 'Kettle Boil & Hop Infusion', 'desc' => "60-min boil with $hops hops.", 'date' => 'Scheduled', 'status' => 'upcoming', 'icon' => 'flame'],
                ['stage' => 'Primary Fermentation', 'desc' => 'Conical tank fermentation.', 'date' => 'Scheduled', 'status' => 'upcoming', 'icon' => 'flask-conical'],
                ['stage' => 'Cold Conditioning & Lagering', 'desc' => 'Chilling to 2°C for crisp smoothness.', 'date' => 'Scheduled', 'status' => 'upcoming', 'icon' => 'snowflake'],
                ['stage' => 'Carbonation & Nitro Canning', 'desc' => 'Custom label printing & canning.', 'date' => 'Scheduled', 'status' => 'upcoming', 'icon' => 'package']
            ]
        ];

        if (!isset($_SESSION['user']['saved_recipes'])) {
            $_SESSION['user']['saved_recipes'] = [];
        }
        array_unshift($_SESSION['user']['saved_recipes'], $newRecipe);

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $_SESSION['cart'][$recipeId] = isset($_SESSION['cart'][$recipeId]) ? $_SESSION['cart'][$recipeId] + $qty : $qty;

        $this->json([
            'success' => true,
            'recipeId' => $recipeId,
            'count' => array_sum($_SESSION['cart'])
        ]);
    }
}
