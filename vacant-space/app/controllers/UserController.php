<?php

class UserController extends Controller {

    // AJAX Endpoint: POST /?route=user/toggleWishlist
    public function toggleWishlist() {
        if (!isset($_SESSION['user'])) {
            $this->json(['success' => false, 'error' => 'Not logged in'], 401);
            return;
        }

        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'] ?? null;

        if ($id) {
            $wishlist = $_SESSION['user']['wishlist'] ?? [];
            if (in_array($id, $wishlist)) {
                // Remove
                $wishlist = array_diff($wishlist, [$id]);
                $message = 'Removed from wishlist';
            } else {
                // Add
                $wishlist[] = $id;
                $message = 'Added to wishlist';
            }
            $_SESSION['user']['wishlist'] = array_values($wishlist); // Re-index
            $this->json(['success' => true, 'message' => $message, 'wishlist' => $_SESSION['user']['wishlist']]);
        } else {
            $this->json(['success' => false, 'error' => 'Invalid item'], 400);
        }
    }

    // AJAX Endpoint: POST /?route=user/addPoints
    // Used for gamification hooks like submitting a review
    public function addPoints() {
        if (!isset($_SESSION['user'])) {
            $this->json(['success' => false, 'error' => 'Not logged in'], 401);
            return;
        }

        $input = json_decode(file_get_contents('php://input'), true);
        $points = $input['points'] ?? 0;
        $reason = $input['reason'] ?? 'Action';

        if ($points > 0) {
            $_SESSION['user']['points'] += $points;
            $this->json(['success' => true, 'newTotal' => $_SESSION['user']['points'], 'message' => "Earned $points points for $reason"]);
        } else {
             $this->json(['success' => false, 'error' => 'Invalid points'], 400);
        }
    }
}
