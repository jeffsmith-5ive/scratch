<?php

class KreweController extends Controller {
    public function index() {
        // Toggle simulated login State via query parameter 
        $isMember = isset($_GET['member']) && $_GET['member'] === 'true';
        $points = 1250;

        $rewards = [
            ['id' => 1, 'name' => 'Krewe Sticker Pack', 'cost' => 250, 'category' => 'Merch', 'image' => 'https://images.unsplash.com/photo-1612968393863-1e247b97d105?auto=format&fit=crop&w=400&q=80'],
            ['id' => 2, 'name' => 'Jeff Brewery Can Glass', 'cost' => 600, 'category' => 'Drinkware', 'image' => 'https://images.unsplash.com/photo-1571506538622-d3cf4eec01ae?auto=format&fit=crop&w=400&q=80'],
            ['id' => 3, 'name' => 'Krewe T-Shirt (Limited)', 'cost' => 1200, 'category' => 'Apparel', 'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=400&q=80'],
            ['id' => 4, 'name' => 'Free Beer Voucher (330ml)', 'cost' => 1500, 'category' => 'Rewards', 'image' => 'https://images.unsplash.com/photo-1608270586620-248524c67de9?auto=format&fit=crop&w=400&q=80'],
            ['id' => 5, 'name' => 'Limited Drop Early Access', 'cost' => 2000, 'category' => 'Access', 'image' => 'https://images.unsplash.com/photo-1618183479302-1e0aa382c36b?auto=format&fit=crop&w=400&q=80'],
            ['id' => 6, 'name' => 'Brewday Experience', 'cost' => 5000, 'category' => 'Prestige', 'image' => 'https://images.unsplash.com/photo-1574578161421-2e65d8363297?auto=format&fit=crop&w=400&q=80'],
        ];

        $ranks = [
            ['name' => 'Road Crew', 'range' => '0–999', 'icon' => 'music', 'color' => 'text-gray-400', 'min' => 0],
            ['name' => 'Mas Band', 'range' => '1,000–2,999', 'icon' => 'sparkles', 'color' => 'text-jeff-teal', 'min' => 1000],
            ['name' => 'Section Leader', 'range' => '3,000–6,999', 'icon' => 'zap', 'color' => 'text-jeff-orange', 'min' => 3000],
            ['name' => 'Inner Circle', 'range' => '7,000+', 'icon' => 'crown', 'color' => 'text-jeff-gold', 'min' => 7000],
        ];

        // Determine current rank
        $currentRank = $ranks[0];
        foreach (array_reverse($ranks) as $rank) {
            if ($points >= $rank['min']) {
                $currentRank = $rank;
                break;
            }
        }

        $this->render('krewe/index', [
            'isMember' => $isMember,
            'points' => $points,
            'rewards' => $rewards,
            'ranks' => $ranks,
            'currentRank' => $currentRank
        ]);
    }
}
