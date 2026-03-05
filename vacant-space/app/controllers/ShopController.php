<?php

class ShopController extends Controller {
    public function index() {
        $searchTerm = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
        $selectedStyle = isset($_GET['style']) ? $_GET['style'] : 'All';
        $wishlist = isset($_SESSION['user']['wishlist']) ? $_SESSION['user']['wishlist'] : [];

        $beers = Database::getBeers();

        // Filter based on search and style
        $filteredBeers = array_filter($beers, function ($beer) use ($searchTerm, $selectedStyle) {
            $matchesSearch = empty($searchTerm) || 
                strpos(strtolower($beer['name']), $searchTerm) !== false ||
                strpos(strtolower($beer['tagline']), $searchTerm) !== false;

            $matchesStyle = ($selectedStyle === 'All' || $beer['style'] === $selectedStyle);

            return $matchesSearch && $matchesStyle;
        });

        // Get unique styles
        $styles = ['All'];
        foreach ($beers as $beer) {
            if (!in_array($beer['style'], $styles)) {
                $styles[] = $beer['style'];
            }
        }

        $this->render('shop/index', [
            'beers' => array_values($filteredBeers),
            'searchTerm' => $searchTerm,
            'selectedStyle' => $selectedStyle,
            'styles' => $styles,
            'wishlist' => $wishlist
        ]);
    }

    public function detail($params) {
        $id = isset($params['id']) ? $params['id'] : null;
        if (!$id) {
            header('Location: ?route=shop');
            exit;
        }

        $beer = Database::getBeerById($id);
        if (!$beer) {
            http_response_code(404);
            $this->render('home/index', ['error' => 'Beer not found']);
            return;
        }

        /* Handle Review Submission */
        $hasReviewed = false;
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['review_submit'])) {
            $rating = (int)$_POST['rating'];
            $comment = trim($_POST['comment']);
            if ($rating >= 1 && $rating <= 5 && !empty($comment)) {
                $hasReviewed = true;
            }
        }

        /* Recommendations */
        $recommendations = [];
        $allBeers = Database::getBeers();
        foreach ($allBeers as $b) {
            if ($b['id'] !== $beer['id']) {
                $bProfile = isset($b['flavorProfile']) ? $b['flavorProfile'] : [];
                $beerProfile = isset($beer['flavorProfile']) ? $beer['flavorProfile'] : [];
                if ($b['style'] === $beer['style'] || count(array_intersect($bProfile, $beerProfile)) > 0) {
                    $recommendations[] = $b;
                }
            }
        }
        $recommendations = array_slice($recommendations, 0, 3);
        
        $wishlist = isset($_SESSION['user']['wishlist']) ? $_SESSION['user']['wishlist'] : [];

        $this->render('shop/detail', [
            'beer' => $beer,
            'recommendations' => $recommendations,
            'hasReviewed' => $hasReviewed,
            'wishlist' => $wishlist
        ]);
    }
}
