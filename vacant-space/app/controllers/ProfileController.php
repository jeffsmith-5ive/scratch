<?php

class ProfileController extends Controller {
    public function index() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $user = $_SESSION['user'] ?? [];
        
        // Populate wishlist details
        $wishlistItems = [];
        if (!empty($user['wishlist'])) {
            foreach ($user['wishlist'] as $id) {
                $item = Database::getBeerById($id);
                if ($item) {
                    $wishlistItems[] = $item;
                }
            }
        }

        $flashMessage = $_SESSION['flash_message'] ?? null;
        unset($_SESSION['flash_message']);

        $this->render('profile/index', [
            'user' => $user,
            'wishlistItems' => $wishlistItems,
            'flashMessage' => $flashMessage
        ]);
    }

    public function update() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_SESSION['user']['name'] = trim($_POST['name'] ?? $_SESSION['user']['name']);
            $_SESSION['user']['email'] = trim($_POST['email'] ?? $_SESSION['user']['email']);
            $_SESSION['user']['phone'] = trim($_POST['phone'] ?? $_SESSION['user']['phone']);
            $_SESSION['user']['location'] = trim($_POST['location'] ?? $_SESSION['user']['location']);
            $_SESSION['user']['favorite_style'] = trim($_POST['favorite_style'] ?? $_SESSION['user']['favorite_style']);
            $_SESSION['user']['bio'] = trim($_POST['bio'] ?? $_SESSION['user']['bio']);

            $_SESSION['flash_message'] = "Profile details updated successfully!";
        }
        header('Location: ?route=profile');
        exit;
    }

    public function deleteRecipe() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $recipeId = $_POST['recipe_id'] ?? null;
            if ($recipeId && isset($_SESSION['user']['saved_recipes'])) {
                $_SESSION['user']['saved_recipes'] = array_values(array_filter(
                    $_SESSION['user']['saved_recipes'],
                    function($recipe) use ($recipeId) {
                        return $recipe['id'] !== $recipeId;
                    }
                ));
                $_SESSION['flash_message'] = "Recipe removed from your lab.";
            }
        }
        header('Location: ?route=profile');
        exit;
    }
}

