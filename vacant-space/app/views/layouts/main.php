<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeff Brewery Industries</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&family=Rock+Salt&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'jeff-teal': '#00695C',
                        'jeff-dark': '#004D40',
                        'jeff-orange': '#FF6F00',
                        'jeff-gold': '#FFD54F',
                        'jeff-sand': '#FAF6F0',
                        'jeff-blue': '#0077B6',
                        'trini-red': '#CE1126',
                    },
                    fontFamily: {
                        'oswald': ['Oswald', 'sans-serif'],
                        'display': ['Oswald', 'sans-serif'],
                        'sans': ['"Open Sans"', 'sans-serif'],
                        'rock': ['"Rock Salt"', 'cursive'],
                    },
                    backgroundImage: {
                        'trini-flag': 'linear-gradient(to right, #CE1126, #CE1126 40%, #ffffff 40%, #ffffff 43%, #000000 43%, #000000 57%, #ffffff 57%, #ffffff 60%, #CE1126 60%)'
                    }
                }
            }
        }
    </script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/public/css/style.css">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-50 text-gray-900 font-sans flex flex-col min-h-screen">

    <!-- Age Gate Overlay (Hidden by default via JS if verified) -->
    <div id="age-gate" class="fixed inset-0 z-[100] flex items-center justify-center bg-neutral-900/95 backdrop-blur-sm p-4 hidden">
        <div class="bg-white text-center p-8 md:p-12 rounded-2xl shadow-2xl max-w-lg w-full border-t-4 border-jeff-orange">
            <h2 class="text-4xl font-display font-bold text-neutral-900 mb-2">ARE YOU 18+?</h2>
            <p class="text-neutral-500 uppercase tracking-widest text-xs mb-8">Jeff Brewery Industries</p>
            
            <p class="text-neutral-600 mb-10 text-lg leading-relaxed">
                To enter this site, please verify that you are of legal drinking age in your country of residence.
            </p>
            
            <div class="space-y-4">
                <button 
                    id="btn-yes"
                    class="w-full bg-jeff-orange text-white text-lg font-bold py-4 rounded-xl hover:bg-orange-600 transition shadow-lg"
                >
                    YES, I AM 18 OR OLDER
                </button>
                <button 
                    id="btn-no"
                    class="w-full bg-neutral-100 text-neutral-600 text-lg font-bold py-4 rounded-xl hover:bg-neutral-200 transition"
                >
                    NO, I AM UNDER 18
                </button>
            </div>
            <p class="mt-8 text-xs text-neutral-400">
                By entering, you agree to our Terms of Service and Privacy Policy.
                Please drink responsibly.
            </p>
        </div>
    </div>

    <!-- Navigation Bar -->
<?php
$cartCount = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $id => $qty) {
        $cartCount += $qty;
    }
}
$currentPage = $_GET['route'] ?? 'home';
$userPoints = $_SESSION['user']['points'] ?? 0;

$navLinks = [
    ['name' => 'Home', 'path' => '?route=home', 'route' => 'home'],
    [
        'name' => 'Shop', 
        'path' => '?route=shop', 
        'route' => 'shop',
        'subLinks' => [
            ['name' => 'All Brews', 'path' => '?route=shop', 'route' => 'shop'],
            ['name' => 'Craft Lager', 'path' => '?route=craft', 'route' => 'craft'],
            ['name' => 'Merch', 'path' => '?route=merch', 'route' => 'merch'],
            ['name' => 'Gift Cards', 'path' => '?route=giftcards', 'route' => 'giftcards'],
        ]
    ],
    ['name' => 'The Krewe', 'path' => '?route=krewe', 'route' => 'krewe'],
    [
        'name' => 'Our Story', 
        'path' => '?route=about', 
        'route' => 'about',
        'subLinks' => [
            ['name' => 'About Us', 'path' => '?route=about', 'route' => 'about'],
            ['name' => 'Drink the Vision', 'path' => '?route=vision', 'route' => 'vision'],
            ['name' => 'Brewer Guide', 'path' => '?route=brewerGuide', 'route' => 'brewerGuide'],
        ]
    ],
    ['name' => 'Blog', 'path' => '?route=blog', 'route' => 'blog'],
    ['name' => 'Admin', 'path' => '?route=admin', 'route' => 'admin'],
];
?>
    <div class="sticky top-0 z-50" id="navbar-container">
        <!-- Trini Flag Strip -->
        <div class="h-2 w-full bg-trini-flag shadow-md relative z-50"></div>

        <nav class="bg-white text-neutral-900 shadow-sm border-b border-neutral-100 relative z-40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-20">

                    <!-- Logo -->
                    <a href="?route=home" class="flex items-center cursor-pointer group shrink-0">
                        <div class="p-2 bg-neutral-900 rounded-lg mr-3 group-hover:bg-trini-red transition-colors duration-300 shadow-lg">
                            <i data-lucide="beer" class="h-6 w-6 text-white transform group-hover:-rotate-12 transition-transform"></i>
                        </div>
                        <div class="flex flex-col hidden sm:flex">
                            <span class="font-display font-bold text-xl tracking-wide leading-none text-neutral-900 uppercase">
                                Jeff Brewery
                            </span>
                            <span class="text-[10px] text-jeff-orange font-bold tracking-[0.2em] uppercase">
                                Trinidad & Tobago
                            </span>
                        </div>
                    </a>

                    <!-- Desktop Menu -->
                    <div class="hidden lg:block flex-1">
                        <div class="flex items-center justify-center space-x-6 xl:space-x-8">
                            <?php foreach ($navLinks as $link): ?>
                                <div class="relative group nav-dropdown-container">
                                    <?php if (isset($link['subLinks'])): 
                                        $isActive = ($currentPage === $link['route']) || array_reduce($link['subLinks'], function($carry, $sub) use ($currentPage) {
                                            return $carry || ($currentPage === $sub['route']);
                                        }, false);
                                    ?>
                                        <button
                                            data-dropdown="<?= htmlspecialchars($link['route']) ?>"
                                            class="nav-dropdown-toggle flex items-center text-sm font-bold uppercase tracking-wide transition-all duration-200 whitespace-nowrap focus:outline-none <?= $isActive ? 'text-trini-red' : 'text-neutral-600 hover:text-jeff-teal hover:-translate-y-0.5' ?>"
                                        >
                                            <?= htmlspecialchars($link['name']) ?>
                                            <i data-lucide="chevron-down" class="ml-1 h-4 w-4 transition-transform duration-200 dropdown-arrow"></i>
                                        </button>
                                        
                                        <!-- Desktop Dropdown Menu -->
                                        <div id="dropdown-<?= htmlspecialchars($link['route']) ?>" class="absolute top-full left-1/2 -translate-x-1/2 mt-4 w-48 bg-white border border-neutral-100 shadow-xl rounded-xl overflow-hidden py-2 z-50 hidden nav-dropdown-menu">
                                            <?php foreach ($link['subLinks'] as $subLink): ?>
                                                <a
                                                    href="<?= htmlspecialchars($subLink['path']) ?>"
                                                    class="block w-full text-left px-4 py-2 text-sm font-bold uppercase tracking-wide transition-colors <?= $currentPage === $subLink['route'] ? 'bg-neutral-50 text-trini-red' : 'text-neutral-600 hover:bg-neutral-50 hover:text-jeff-teal' ?>"
                                                >
                                                    <?= htmlspecialchars($subLink['name']) ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php else: ?>
                                        <a
                                            href="<?= htmlspecialchars($link['path']) ?>"
                                            class="text-sm font-bold uppercase tracking-wide transition-all duration-200 whitespace-nowrap <?= $currentPage === $link['route'] || (empty($_GET['route']) && $link['route'] === 'home') ? 'text-trini-red border-b-2 border-trini-red' : 'text-neutral-600 hover:text-jeff-teal hover:-translate-y-0.5' ?>"
                                        >
                                            <?= htmlspecialchars($link['name']) ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Icons & Gamification Stats -->
                    <div class="hidden md:flex items-center space-x-3 xl:space-x-4 shrink-0">
                        <!-- TriniChat Button -->
                        <button 
                            onclick="window.dispatchEvent(new CustomEvent('open-trinichat'))"
                            class="flex items-center space-x-1.5 bg-gradient-to-r from-jeff-teal to-jeff-blue text-white px-3 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider hover:shadow-lg hover:scale-105 transition-all focus:outline-none"
                        >
                            <i data-lucide="sparkles" class="h-3.5 w-3.5"></i>
                            <span>Explore with TriniChat</span>
                        </button>

                        <!-- Gamification Stats -->
                        <a href="?route=profile" class="flex flex-col items-end cursor-pointer ml-2">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Level</span>
                            <div class="flex items-center text-xs font-bold text-jeff-teal">
                                <i data-lucide="trophy" class="w-3 h-3 mr-1 text-jeff-gold fill-current"></i> <?= $userPoints ?> pts
                            </div>
                        </a>

                        <!-- Profile -->
                        <a href="?route=profile" class="p-2 rounded-full text-neutral-600 hover:text-jeff-teal hover:bg-neutral-50 transition-colors">
                            <i data-lucide="user" class="h-5 w-5"></i>
                        </a>

                        <div class="h-6 w-px bg-neutral-200 mx-1"></div>

                        <!-- Cart -->
                        <button class="cart-toggle flex items-center space-x-2 p-2 rounded-full text-neutral-900 hover:text-jeff-orange transition group focus:outline-none">
                            <div class="relative">
                                <i data-lucide="shopping-cart" class="h-5 w-5 group-hover:scale-110 transition-transform"></i>
                                <span class="cart-count absolute -top-2 -right-2 inline-flex items-center justify-center 
                                                w-4 h-4 text-[10px] font-bold text-white bg-trini-red 
                                                rounded-full border border-white <?= $cartCount > 0 ? 'animate-bounce' : 'hidden' ?>">
                                    <?= $cartCount ?>
                                </span>
                            </div>
                            <span class="font-bold text-sm hidden xl:block text-neutral-900 group-hover:text-jeff-orange">Cart</span>
                        </button>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="-mr-2 flex md:hidden items-center space-x-2">
                        <button 
                            onclick="window.dispatchEvent(new CustomEvent('open-trinichat'))"
                            class="flex items-center justify-center bg-gradient-to-r from-jeff-teal to-jeff-blue text-white p-1.5 rounded-full hover:shadow-lg transition-all focus:outline-none"
                        >
                            <i data-lucide="sparkles" class="h-4 w-4"></i>
                        </button>
                        <button
                            id="mobile-menu-toggle-btn"
                            class="inline-flex items-center justify-center p-2 rounded-md text-neutral-900 hover:text-jeff-orange focus:outline-none"
                        >
                            <i data-lucide="menu" id="mobile-menu-icon-open" class="h-6 w-6"></i>
                            <i data-lucide="x" id="mobile-menu-icon-close" class="h-6 w-6 hidden"></i>
                        </button>
                    </div>

                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-neutral-100 absolute w-full shadow-lg z-40 left-0 origin-top">
                <div class="px-4 py-4 space-y-2">
                    <?php foreach ($navLinks as $link): ?>
                        <div>
                            <?php if (isset($link['subLinks'])): ?>
                                <button
                                    data-dropdown="<?= htmlspecialchars($link['route']) ?>"
                                    class="mobile-dropdown-toggle flex items-center justify-between w-full text-left px-3 py-3 rounded-lg text-base font-bold text-neutral-700 hover:bg-neutral-50 hover:text-trini-red focus:outline-none"
                                >
                                    <?= htmlspecialchars($link['name']) ?>
                                    <i data-lucide="chevron-down" class="h-5 w-5 transition-transform duration-200 mobile-dropdown-arrow"></i>
                                </button>
                                <div id="mobile-dropdown-<?= htmlspecialchars($link['route']) ?>" class="pl-6 pr-3 py-2 space-y-2 bg-neutral-50 rounded-lg mt-1 hidden mobile-dropdown-menu">
                                    <?php foreach ($link['subLinks'] as $subLink): ?>
                                        <a
                                            href="<?= htmlspecialchars($subLink['path']) ?>"
                                            class="block w-full text-left px-3 py-2 rounded-md text-sm font-bold <?= $currentPage === $subLink['route'] ? 'text-trini-red' : 'text-neutral-600 hover:text-jeff-teal' ?>"
                                        >
                                            <?= htmlspecialchars($subLink['name']) ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <a
                                    href="<?= htmlspecialchars($link['path']) ?>"
                                    class="block w-full text-left px-3 py-3 rounded-lg text-base font-bold text-neutral-700 hover:bg-neutral-50 hover:text-trini-red"
                                >
                                    <?= htmlspecialchars($link['name']) ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>

                    <div class="border-t border-neutral-100 pt-4 mt-4 flex items-center justify-between px-3">
                        <a href="?route=profile" class="flex items-center space-x-2 text-neutral-700 font-bold">
                            <i data-lucide="user" class="h-5 w-5"></i> <span>Profile (<?= $userPoints ?> pts)</span>
                        </a>
                        <button class="cart-toggle flex items-center space-x-2 text-neutral-700 font-bold focus:outline-none">
                            <i data-lucide="shopping-cart" class="h-5 w-5"></i> 
                            <span>Cart (<span class="cart-count-text text-trini-red"><?= $cartCount ?></span>)</span>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <!-- Main Content Area -->
    <main class="flex-grow flex flex-col">
        <?php echo $content; ?>
    </main>

    <!-- Footer -->
    <footer class="bg-neutral-900 text-white mt-auto pt-16 pb-8 border-t border-neutral-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-5 gap-12 mb-12">
         <div class="col-span-1">
           <h3 class="font-oswald font-bold text-2xl mb-4 text-jeff-gold tracking-wider uppercase leading-none">JEFF<br><span class="text-white">BREWERY</span></h3>
           <p class="text-neutral-400 text-sm leading-relaxed mb-6">
             A next-generation Trinbagonian craft brewery fusing Caribbean culture, bold flavour engineering, and modern brewing science.
           </p>
           <div class="flex space-x-4 flex-wrap gap-y-2">
             <a href="#" class="w-8 h-8 flex items-center justify-center bg-neutral-800 rounded-full hover:bg-jeff-orange text-white cursor-pointer transition"><i data-lucide="instagram" class="w-4 h-4"></i></a>
             <a href="#" class="w-8 h-8 flex items-center justify-center bg-neutral-800 rounded-full hover:bg-jeff-orange text-white cursor-pointer transition"><i data-lucide="twitter" class="w-4 h-4"></i></a>
             <a href="#" class="w-8 h-8 flex items-center justify-center bg-neutral-800 rounded-full hover:bg-jeff-orange text-white cursor-pointer transition"><i data-lucide="facebook" class="w-4 h-4"></i></a>
           </div>
         </div>
         
         <div>
           <h4 class="font-bold text-lg mb-6 tracking-wide font-oswald uppercase text-white">Shop</h4>
           <ul class="text-neutral-400 space-y-3 text-sm">
             <li><a href="?route=shop" class="hover:text-jeff-gold cursor-pointer transition">All Beers</a></li>
             <li><a href="?route=craft" class="hover:text-jeff-gold cursor-pointer transition">Craft Your Own</a></li>
             <li><a href="?route=merch" class="hover:text-jeff-gold cursor-pointer transition">Merch</a></li>
             <li><a href="?route=giftcards" class="hover:text-jeff-gold cursor-pointer transition">Gift Cards</a></li>
           </ul>
         </div>

         <div>
           <h4 class="font-bold text-lg mb-6 tracking-wide font-oswald uppercase text-white">Our Brews</h4>
           <ul class="text-neutral-400 space-y-2 text-sm grid grid-cols-2 gap-x-4">
             <li><a href="?route=shop/detail&id=island-ipa" class="hover:text-jeff-gold cursor-pointer transition">Island IPA</a></li>
             <li><a href="?route=shop/detail&id=jouvert-lager" class="hover:text-jeff-gold cursor-pointer transition">J'ouvert Lager</a></li>
             <li><a href="?route=shop/detail&id=bitter-truth" class="hover:text-jeff-gold cursor-pointer transition">Bitter Truth Stout</a></li>
             <li><a href="?route=shop/detail&id=midnight-robber" class="hover:text-jeff-gold cursor-pointer transition">Midnight Robber</a></li>
             <li><a href="?route=shop/detail&id=maracas-mist" class="hover:text-jeff-gold cursor-pointer transition">Maracas Mist</a></li>
             <li><a href="?route=shop/detail&id=ocd-saison" class="hover:text-jeff-gold cursor-pointer transition">OCD Saison</a></li>
             <li><a href="?route=shop/detail&id=soca-sorrel" class="hover:text-jeff-gold cursor-pointer transition">Soca Sorrel Ale</a></li>
             <li><a href="?route=shop/detail&id=sugarcane-kolsch" class="hover:text-jeff-gold cursor-pointer transition">Sugarcane Kölsch</a></li>
             <li><a href="?route=shop/detail&id=tamarind-gose" class="hover:text-jeff-gold cursor-pointer transition">Tamarind Gose</a></li>
             <li><a href="?route=shop/detail&id=soca-starter" class="hover:text-jeff-gold cursor-pointer transition">Soca Starter</a></li>
           </ul>
         </div>

         <div>
           <h4 class="font-bold text-lg mb-6 tracking-wide font-oswald uppercase text-white">Community</h4>
           <ul class="text-neutral-400 space-y-3 text-sm">
             <li><a href="?route=blog" class="hover:text-jeff-gold cursor-pointer transition">The Blog</a></li>
             <li><a href="?route=about" class="hover:text-jeff-gold cursor-pointer transition">Our Story</a></li>
             <li><a href="?route=sustainability" class="hover:text-jeff-gold cursor-pointer transition">Sustainability</a></li>
             <li><a href="?route=krewe" class="hover:text-jeff-gold cursor-pointer transition">Join the Krewe</a></li>
             <li class="pt-4"><a href="?route=admin" class="hover:text-jeff-gold cursor-pointer transition text-neutral-600 block">Admin Access</a></li>
           </ul>
         </div>

         <div>
           <h4 class="font-bold text-lg mb-6 tracking-wide font-oswald uppercase text-white">Contact</h4>
           <ul class="text-neutral-400 space-y-3 text-sm mb-4">
             <li><span class="mr-2">📧</span> <a href="mailto:info@jeffbrewery.com" class="hover:text-jeff-gold transition">info@jeffbrewery.com</a></li>
             <li><span class="mr-2">📞</span> (868) 746-7332</li>
             <li><span class="mr-2">🌐</span> <a href="http://www.jeffbrewery.com" target="_blank" class="hover:text-jeff-gold transition">www.jeffbrewery.com</a></li>
           </ul>
           <a href="?route=contact" class="inline-block text-jeff-gold text-sm font-bold border border-jeff-gold px-4 py-2 rounded hover:bg-jeff-gold hover:text-neutral-900 transition whitespace-nowrap">
             Contact Support
           </a>
         </div>
      </div>

      <!-- Copyright & Legal -->
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-t border-neutral-800 pt-8 flex flex-col lg:flex-row justify-between items-center gap-4 text-xs text-neutral-500">
         <div class="flex flex-col md:flex-row items-center gap-2 md:gap-4 text-center md:text-left">
           <p class="whitespace-nowrap">&copy; <?= date('Y') ?> Jeff Brewery Industries · Trinidad & Tobago · All Rights Reserved</p>
           <span class="hidden md:inline text-neutral-700">|</span>
           <span class="text-jeff-gold font-bold uppercase tracking-wider font-oswald text-sm md:text-xs mt-1 md:mt-0">Drink the Vision. Live the Culture.</span>
         </div>
         <div class="flex flex-col sm:flex-row items-center gap-4 mt-4 lg:mt-0">
           <div class="flex space-x-6">
             <a href="?route=privacy" class="cursor-pointer hover:text-neutral-300 transition">Privacy Policy</a>
             <a href="?route=terms" class="cursor-pointer hover:text-neutral-300 transition font-medium">Terms of Service</a>
           </div>
           <span class="text-jeff-orange font-bold uppercase tracking-wider sm:border-l sm:border-neutral-700 sm:pl-4 text-center sm:text-left">
             Please drink responsibly. Must be 18+ to purchase.
           </span>
         </div>
      </div>
    </footer>

    <!-- Cart Slide-over Drawer -->
    <div id="cart-drawer" class="fixed inset-0 z-50 pointer-events-none hidden">
        <!-- Backdrop -->
        <div id="cart-backdrop" class="absolute inset-0 bg-black/40 backdrop-blur-sm transition-opacity opacity-0 pointer-events-auto"></div>
        
        <!-- Drawer -->
        <div id="cart-panel" class="absolute inset-y-0 right-0 w-full max-w-md bg-white shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out pointer-events-auto flex flex-col">
            <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
                <h2 class="text-xl font-oswald font-semibold text-jeff-dark tracking-wide uppercase">Your Cart</h2>
                <button id="cart-close" class="text-gray-400 hover:text-gray-600 transition-colors p-1 rounded-full hover:bg-gray-100">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>
            
            <div id="cart-items-container" class="flex-1 overflow-y-auto px-6 py-4 relative">
                <!-- Cart items will be loaded here via AJAX -->
                <div class="flex flex-col items-center justify-center h-full text-gray-500">
                    <i data-lucide="shopping-cart-outline" class="w-12 h-12 mb-4 text-gray-300"></i>
                    <p>Loading cart...</p>
                </div>
            </div>
            
            <div id="cart-footer" class="border-t border-gray-100 px-6 py-6 bg-gray-50">
                <div class="flex justify-between items-center mb-6">
                    <span class="text-gray-600 font-semibold">Subtotal</span>
                    <span id="cart-subtotal" class="text-2xl font-oswald text-jeff-dark font-bold">$0.00</span>
                </div>
                <a href="?route=checkout" class="w-full bg-jeff-teal hover:bg-jeff-dark text-white text-center font-bold py-4 rounded-xl transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                    Proceed to Checkout <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </a>
            </div>
        </div>
    </div>
    
    <!-- AI Brew Guide FAB (Floating Action Button) -->
    <div id="chatbot-fab-container" class="fixed bottom-6 right-6 z-40 flex flex-col items-end pointer-events-auto">
        <div class="relative">
            <!-- Hide completely button -->
            <button 
                id="chatbot-hide-btn"
                class="absolute -top-2 -right-2 bg-gray-800 text-white rounded-full p-1 shadow-md hover:bg-gray-600 transition-colors z-50 focus:outline-none"
                title="Hide Chatbot Completely"
            >
                <i data-lucide="x" class="w-3 h-3"></i>
            </button>
            <button 
                id="chatbot-toggle" 
                class="bg-jeff-orange hover:bg-orange-600 text-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1 focus:outline-none"
            >
                <i data-lucide="message-circle" id="chatbot-toggle-icon" class="w-7 h-7"></i>
                <i data-lucide="x" id="chatbot-toggle-close-icon" class="w-7 h-7 hidden"></i>
            </button>
        </div>
    </div>

    <!-- Chatbot Window -->
    <div id="chatbot-window" class="fixed bottom-24 right-6 w-96 h-[550px] max-h-[calc(100vh-8rem)] bg-white rounded-2xl shadow-2xl z-40 border border-gray-200 hidden flex-col overflow-hidden max-w-[calc(100vw-2rem)] transition-all duration-300 pointer-events-auto">
        <!-- Header -->
        <div class="bg-jeff-orange p-3 sm:p-4 text-white flex justify-between items-center shrink-0">
            <div class="flex items-center gap-3">
                <div class="bg-white/20 p-2 rounded-full">
                    <i data-lucide="sparkles" class="w-5 h-5 text-jeff-gold animate-pulse"></i>
                </div>
                <div>
                    <h3 class="font-display font-bold text-base sm:text-lg text-white">Brewer Guide</h3>
                    <p class="text-white/80 text-[10px] sm:text-xs">Powered by TriniChat</p>
                </div>
            </div>
            <div class="flex items-center space-x-1 sm:space-x-2">
                <!-- Return to Home (Visible when maximized) -->
                <button 
                    id="chatbot-minimize-btn" 
                    class="hidden flex items-center space-x-1 sm:space-x-2 bg-white/20 hover:bg-white/30 text-white px-3 py-1.5 sm:px-4 sm:py-2 rounded-full transition-colors text-xs sm:text-sm font-medium focus:outline-none"
                    title="Return to Home"
                >
                    <i data-lucide="minimize-2" class="h-3.5 w-3.5 sm:h-4 sm:w-4"></i>
                    <span>Return to Home</span>
                </button>
                
                <!-- Standard Controls (Visible when not maximized) -->
                <button 
                    id="chatbot-maximize-btn" 
                    class="text-white hover:bg-black/10 p-1.5 sm:p-1 rounded transition-colors focus:outline-none"
                    title="Maximize"
                >
                    <i data-lucide="maximize-2" class="h-4 w-4 sm:h-5 sm:w-5"></i>
                </button>
                <button 
                    id="chatbot-close" 
                    class="text-white hover:bg-black/10 p-1.5 sm:p-1 rounded transition-colors focus:outline-none"
                    title="Close Chat"
                >
                    <i data-lucide="x" class="h-4 w-4 sm:h-5 sm:w-5"></i>
                </button>
            </div>
        </div>
        
        <!-- Chat Messages -->
        <div id="chat-messages" class="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-50 flex flex-col">
            <div class="flex justify-start">
                <div class="bg-white border border-gray-200 text-neutral-800 rounded-2xl rounded-tl-none shadow-sm p-3 max-w-[80%] text-sm">
                    Wha gwan! I'm your Brewer Guide. I'm here to share Our Story, walk you through our meticulous brewing process, or just lime and talk about our craft beers. What's on your mind?
                </div>
            </div>
        </div>
        
        <!-- Input Area -->
        <div class="p-3 bg-white border-t border-gray-200 shrink-0">
            <div class="flex items-center space-x-2">
                <input 
                    type="text" 
                    id="chat-input" 
                    class="flex-1 border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:border-jeff-orange focus:ring-1 focus:ring-jeff-orange text-sm" 
                    placeholder="Ask the Brewer Guide..."
                >
                <button 
                    id="chat-send" 
                    class="bg-jeff-orange text-white p-2 rounded-full hover:bg-orange-600 transition-colors focus:outline-none"
                >
                    <i data-lucide="send" class="w-5 h-5"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- TriniChat Modal -->
    <div id="trinichat-modal" class="fixed inset-0 z-[70] flex items-center justify-center p-4 sm:p-6 pointer-events-none hidden">
        <!-- Backdrop -->
        <div id="trinichat-backdrop" class="absolute inset-0 bg-neutral-900/60 backdrop-blur-sm pointer-events-auto transition-opacity opacity-0"></div>
        
        <!-- Modal Window -->
        <div 
            id="trinichat-window"
            class="bg-white shadow-2xl transition-all duration-300 pointer-events-auto overflow-hidden border border-gray-200 flex flex-col relative z-10 w-full max-w-4xl h-[80vh] rounded-2xl scale-95 opacity-0"
        >
            <!-- Header -->
            <div class="bg-jeff-teal p-3 sm:p-4 flex justify-between items-center shrink-0 text-white">
                <div>
                    <h3 class="font-display font-bold text-base sm:text-lg text-white">TriniChat</h3>
                    <p class="text-jeff-gold text-[10px] sm:text-xs">Cultural AI Assistant & Brand Storytelling Engine</p>
                </div>
                <div class="flex items-center space-x-1 sm:space-x-2">
                    <button 
                        id="trinichat-maximize-btn" 
                        class="text-white hover:bg-jeff-dark p-1.5 sm:p-1 rounded transition-colors focus:outline-none"
                        title="Maximize"
                    >
                        <i data-lucide="maximize-2" id="trinichat-maximize-icon" class="h-4 w-4 sm:h-5 sm:w-5"></i>
                        <i data-lucide="minimize-2" id="trinichat-minimize-icon" class="h-4 w-4 sm:h-5 sm:w-5 hidden"></i>
                    </button>
                    <button 
                        id="trinichat-close-btn" 
                        class="text-white hover:bg-jeff-dark p-1.5 sm:p-1 rounded transition-colors focus:outline-none"
                        title="Close"
                    >
                        <i data-lucide="x" class="h-4 w-4 sm:h-5 sm:w-5"></i>
                    </button>
                </div>
            </div>

            <!-- Iframe Container -->
            <div class="flex-1 w-full bg-gray-50 relative">
                <iframe 
                    id="trinichat-iframe"
                    src="" 
                    class="absolute inset-0 w-full h-full border-none"
                    title="TriniChat Assistant"
                    allow="microphone"
                ></iframe>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/public/js/app.js"></script>
</body>
</html>
