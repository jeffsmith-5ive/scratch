<?php

class AuthController extends Controller {

    public function login() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $role = $_GET['role'] ?? 'customer';
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');
            $selectedRole = $_POST['role'] ?? 'customer';

            if ($selectedRole === 'admin' || str_contains(strtolower($email), 'admin')) {
                // Admin login
                $_SESSION['auth_role'] = 'admin';
                $_SESSION['admin_user'] = [
                    'name' => 'Brewmaster Admin',
                    'email' => $email ?: 'admin@jeffbrewery.com',
                    'role' => 'Administrator'
                ];
                $_SESSION['flash_message'] = "Logged in successfully as Administrator!";
                header('Location: ?route=admin');
                exit;
            } else {
                // Customer login
                $_SESSION['auth_role'] = 'customer';
                if (!isset($_SESSION['user']) || empty($_SESSION['user']['name'])) {
                    $_SESSION['user'] = [
                        'name' => 'Jeff Smith',
                        'email' => $email ?: 'jeff.smith@jeffbrewery.com',
                        'phone' => '+1 (868) 746-7332',
                        'location' => 'Port of Spain, Trinidad & Tobago',
                        'member_since' => 'March 2024',
                        'points' => 1450,
                        'rank' => 'Master Brew Limer',
                        'next_rank' => 'Legendary Brewmaster',
                        'next_rank_points' => 2000,
                        'favorite_style' => 'Maracas Mist & Soca Starter',
                        'bio' => 'Passionate Trinbagonian craft beer enthusiast, hophead, and home-brew experimenter.',
                        'wishlist' => ['brechin-castle', 'island-ipa', 'm12'],
                        'badges' => [
                            ['id' => 'first_sip', 'name' => 'First Sip', 'icon' => 'beer', 'description' => 'Purchased your first craft beer', 'unlocked_at' => 'Mar 2024'],
                            ['id' => 'island_explorer', 'name' => 'Island Explorer', 'icon' => 'compass', 'description' => 'Tried 5+ unique Caribbean brew styles', 'unlocked_at' => 'Apr 2024'],
                            ['id' => 'krewe_vip', 'name' => 'Krewe VIP', 'icon' => 'crown', 'description' => 'Accumulated over 1,000 Krewe Points', 'unlocked_at' => 'Jun 2024']
                        ],
                        'saved_recipes' => [
                            ['id' => 'rec_101', 'name' => "Jeff's Spicy Mango Haze", 'base' => 'Hazy IPA', 'infusion' => 'Trinidad Moruga Scorpion & Mango Zest', 'abv' => '6.8%', 'ibu' => 45, 'created_at' => 'July 12, 2026', 'notes' => 'Crisp citrus aroma with a subtle spicy kick.']
                        ],
                        'order_history' => [
                            ['id' => 'JB-9842', 'date' => 'July 15, 2026', 'status' => 'Delivered', 'items' => [['name' => 'Brechin Castle Historic Blonde Ale', 'qty' => 2, 'price' => 15.00, 'image' => '/public/images/brechin_castle.jpg']], 'total' => 58.00, 'shipping' => 'Free', 'tracking' => 'TT-POST-9842011']
                        ]
                    ];
                } else if ($email) {
                    $_SESSION['user']['email'] = $email;
                }
                $_SESSION['flash_message'] = "Welcome back, " . htmlspecialchars($_SESSION['user']['name']) . "!";
                header('Location: ?route=profile');
                exit;
            }
        }

        $this->render('auth/login', [
            'role' => $role,
            'error' => $error
        ]);
    }

    public function register() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $role = $_GET['role'] ?? 'customer';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $selectedRole = $_POST['role'] ?? 'customer';

            if ($selectedRole === 'admin') {
                $_SESSION['auth_role'] = 'admin';
                $_SESSION['admin_user'] = [
                    'name' => $name ?: 'New Admin',
                    'email' => $email ?: 'admin@jeffbrewery.com',
                    'role' => 'Administrator'
                ];
                $_SESSION['flash_message'] = "Admin account created and logged in!";
                header('Location: ?route=admin');
                exit;
            } else {
                $_SESSION['auth_role'] = 'customer';
                $_SESSION['user'] = [
                    'name' => $name ?: 'New Krewe Member',
                    'email' => $email ?: 'member@jeffbrewery.com',
                    'phone' => '+1 (868) 555-0199',
                    'location' => 'Trinidad & Tobago',
                    'member_since' => date('F Y'),
                    'points' => 100,
                    'rank' => 'Freshman Liming',
                    'next_rank' => 'Taste Explorer',
                    'next_rank_points' => 500,
                    'favorite_style' => 'Craft Lager',
                    'bio' => 'Newly joined craft beer enthusiast.',
                    'wishlist' => [],
                    'badges' => [
                        ['id' => 'newbie', 'name' => 'Freshman Liming', 'icon' => 'palm-tree', 'description' => 'Joined the Krewe', 'unlocked_at' => date('M Y')]
                    ],
                    'saved_recipes' => [],
                    'order_history' => []
                ];
                $_SESSION['flash_message'] = "Welcome to the Krewe, " . htmlspecialchars($_SESSION['user']['name']) . "! You earned 100 welcome points!";
                header('Location: ?route=profile');
                exit;
            }
        }

        $this->render('auth/register', [
            'role' => $role
        ]);
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        unset($_SESSION['auth_role']);
        unset($_SESSION['admin_user']);
        $_SESSION['flash_message'] = "You have been logged out.";
        header('Location: ?route=auth/login');
        exit;
    }
}
