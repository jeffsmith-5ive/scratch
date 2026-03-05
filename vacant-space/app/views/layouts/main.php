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
                        'trini-red': '#CE1126',
                    },
                    fontFamily: {
                        'oswald': ['Oswald', 'sans-serif'],
                        'sans': ['"Open Sans"', 'sans-serif'],
                        'rock': ['"Rock Salt"', 'cursive'],
                    }
                }
            }
        }
    </script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="public/css/style.css">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-50 text-gray-900 font-sans flex flex-col min-h-screen">

    <!-- Age Gate Overlay (Hidden by default via JS if verified) -->
    <div id="age-gate" class="fixed inset-0 z-[100] bg-black/90 flex items-center justify-center backdrop-blur-md hidden">
        <div class="bg-white p-8 md:p-12 rounded-2xl shadow-2xl max-w-lg w-full text-center transform transition-all shadow-jeff-teal/20 mx-4 border border-jeff-teal/10">
            <h2 class="text-4xl font-oswald text-jeff-dark mb-4 uppercase tracking-wide">Age Verification</h2>
            <p class="text-lg text-gray-600 mb-8 font-light">You must be 18 years or older to enter this site. Please verify your age.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button id="btn-yes" class="px-8 py-4 bg-jeff-teal text-white font-bold rounded-full hover:bg-jeff-dark transition-all duration-300 transform hover:scale-105 shadow-md">I am 18 or older</button>
                <button id="btn-no" class="px-8 py-4 bg-gray-200 text-gray-700 font-bold rounded-full hover:bg-gray-300 transition-all duration-300">I am under 18</button>
            </div>
            <p id="age-error" class="text-trini-red mt-4 hidden text-sm font-semibold">You must be 18+ to enter.</p>
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
    ['name' => 'Shop', 'path' => '?route=shop', 'route' => 'shop'],
    ['name' => 'The Krewe', 'path' => '?route=krewe', 'route' => 'krewe'],
    ['name' => 'Our Story', 'path' => '?route=about', 'route' => 'about'],
    ['name' => 'Craft Lager', 'path' => '?route=craft', 'route' => 'craft'],
    ['name' => 'Blog', 'path' => '?route=blog', 'route' => 'blog'],
    ['name' => 'Admin', 'path' => '?route=admin', 'route' => 'admin'],
];
?>
    <div class="sticky top-0 z-50">
        <!-- Trini Flag Strip -->
        <div class="h-2 w-full bg-gradient-to-r from-trini-red via-white to-black shadow-md relative z-50"></div>

        <nav class="bg-white text-neutral-900 shadow-sm border-b border-neutral-100 relative z-40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-20">

                    <!-- Logo -->
                    <a href="?route=home" class="flex items-center cursor-pointer group">
                        
                        <div class="p-2 bg-neutral-900 rounded-lg mr-3 group-hover:bg-trini-red transition-colors duration-300 shadow-lg">
                            <!-- Beer Icon SVG (replace with your actual SVG if different) -->
                            <svg class="h-6 w-6 text-white transform group-hover:-rotate-12 transition-transform"
                                 xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M8 2h8v2a4 4 0 01-4 4 4 4 0 01-4-4V2zM6 10h12v10a2 2 0 01-2 2H8a2 2 0 01-2-2V10z"/>
                            </svg>
                        </div>

                        <div class="flex flex-col">
                            <span class="font-display font-bold text-xl tracking-wide leading-none text-neutral-900 uppercase">
                                Jeff Brewery
                            </span>
                            <span class="text-[10px] text-jeff-orange font-bold tracking-[0.2em] uppercase">
                                Trinidad & Tobago
                            </span>
                        </div>

                    </a>

                    <!-- Desktop Menu -->
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-6">
                            <?php foreach ($navLinks as $link): ?>
                                <a href="<?= $link['path'] ?>"
                                   class="text-sm font-bold uppercase tracking-wide transition-all duration-200
                                   <?= $currentPage === $link['route'] || (empty($_GET['route']) && $link['route'] === 'home')
                                       ? 'text-trini-red border-b-2 border-trini-red'
                                       : 'text-gray-600 hover:text-jeff-teal hover:-translate-y-0.5' ?>">
                                    <?= $link['name'] ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Icons & Stats -->
                    <div class="hidden md:flex items-center space-x-4">

                        <!-- Gamification -->
                        <a href="?route=profile" class="flex flex-col items-end mr-2 cursor-pointer border-b-2 border-transparent hover:border-jeff-teal transition-all">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">
                                Level
                            </span>
                            <div class="flex items-center text-xs font-bold text-jeff-teal">
                                <i data-lucide="award" class="w-3 h-3 mr-1"></i> <?= $userPoints ?> pts
                            </div>
                        </a>

                        <!-- Profile -->
                        <a href="?route=profile" class="p-2 rounded-full text-gray-500 hover:text-jeff-teal transition-colors">
                            <i data-lucide="user" class="w-5 h-5"></i>
                        </a>

                        <div class="h-6 w-px bg-gray-200 mx-2"></div>

                        <!-- Cart -->
                        <button class="cart-toggle flex items-center space-x-2 p-2 rounded-full text-gray-500 hover:text-jeff-orange transition group focus:outline-none">
                            <div class="relative">
                                <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                                <span class="cart-count absolute -top-2 -right-2 inline-flex items-center justify-center 
                                                w-4 h-4 text-[10px] font-bold text-white bg-trini-red 
                                                rounded-full border border-white <?= $cartCount > 0 ? 'animate-bounce' : 'hidden' ?>">
                                    <?= $cartCount ?>
                                </span>
                            </div>
                            <span class="font-bold text-sm hidden lg:block text-neutral-900 group-hover:text-jeff-orange">Cart</span>
                        </button>

                    </div>

                    <!-- Mobile Menu Toggle -->
                    <div class="md:hidden">
                        <button onclick="document.getElementById('mobileMenu').classList.toggle('hidden')" 
                            class="p-2 text-neutral-900 hover:text-jeff-orange focus:outline-none">
                            <i data-lucide="menu" class="w-6 h-6"></i>
                        </button>
                    </div>

                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-lg absolute w-full left-0 origin-top">
                <div class="px-4 py-4 space-y-2">

                    <?php foreach ($navLinks as $link): ?>
                        <a href="<?= $link['path'] ?>"
                           class="block w-full text-left px-3 py-3 rounded-lg text-base font-bold 
                                  text-gray-700 hover:bg-gray-50 hover:text-trini-red">
                            <?= $link['name'] ?>
                        </a>
                    <?php endforeach; ?>

                    <div class="border-t border-gray-100 pt-4 mt-4 flex items-center justify-between px-3">
                        <a href="?route=profile" class="font-bold text-gray-700 flex items-center">
                            <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile (<?= $userPoints ?> pts)
                        </a>
                        <button class="cart-toggle font-bold text-gray-700 flex items-center gap-2 focus:outline-none">
                            <i data-lucide="shopping-cart" class="w-4 h-4"></i> Cart (<span class="cart-count-text text-trini-red"><?= $cartCount ?></span>)
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
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
         <div class="col-span-1 md:col-span-1">
           <h3 class="font-oswald font-bold text-2xl mb-6 text-jeff-gold tracking-wider uppercase">JEFF BREWERY</h3>
           <p class="text-neutral-400 text-sm leading-relaxed mb-6">
             Brewing stories from the Caribbean since 2026. Merging modern brewing techniques with the rhythm of Trinidad.
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
           <p class="text-neutral-400 text-sm mb-2">hello@jeffbrewery.com</p>
           <p class="text-neutral-400 text-sm mb-4">Port of Spain, Trinidad</p>
           <a href="?route=contact" class="inline-block text-jeff-gold text-sm font-bold border border-jeff-gold px-4 py-2 rounded hover:bg-jeff-gold hover:text-neutral-900 transition mb-2 whitespace-nowrap">
             Contact Support
           </a>
         </div>
      </div>

      <!-- Copyright & Legal -->
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-t border-neutral-800 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-neutral-500">
         <p>&copy; <?= date('Y') ?> Jeff Brewery Industries. All rights reserved.</p>
         <div class="flex space-x-6 mt-4 md:mt-0 flex-wrap gap-y-2 items-center">
           <a href="?route=privacy" class="cursor-pointer hover:text-neutral-300 transition">Privacy Policy</a>
           <a href="?route=terms" class="cursor-pointer hover:text-neutral-300 transition">Terms of Service</a>
           <span class="text-jeff-orange font-bold uppercase tracking-wider ml-4 border-l border-neutral-700 pl-4">Please drink responsibly. Must be 18+ to purchase.</span>
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
                <a href="?route=cart/checkout" class="w-full bg-jeff-teal hover:bg-jeff-dark text-white text-center font-bold py-4 rounded-xl transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                    Proceed to Checkout <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </a>
            </div>
        </div>
    </div>
    
    <!-- AI Brew Guide FAB (Floating Action Button) -->
    <div class="fixed bottom-6 right-6 z-40">
        <button id="chatbot-toggle" class="bg-jeff-orange hover:bg-jeff-gold text-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1">
            <i data-lucide="bot" class="w-7 h-7"></i>
        </button>
    </div>

    <!-- Chatbot Window -->
    <div id="chatbot-window" class="fixed bottom-24 right-6 w-96 bg-white rounded-2xl shadow-2xl z-40 border border-gray-100 hidden flex-col overflow-hidden max-w-[calc(100vw-3rem)]">
        <div class="bg-jeff-teal p-4 text-white flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="bg-white/20 p-2 rounded-full">
                    <i data-lucide="sparkles" class="w-5 h-5 text-jeff-gold"></i>
                </div>
                <h3 class="font-oswald font-semibold uppercase tracking-wide">AI Brew Guide</h3>
            </div>
            <button id="chatbot-close" class="text-white/70 hover:text-white transition-colors">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>
        <div id="chat-messages" class="h-80 overflow-y-auto p-4 space-y-4 bg-gray-50 flex flex-col">
            <div class="flex gap-2 max-w-[85%]">
                <div class="bg-gray-200 text-gray-800 py-2 px-4 rounded-2xl rounded-tl-sm text-sm">
                    Hey there! I'm your AI Brew Guide. Need help picking a beer or want to know more about The Krewe?
                </div>
            </div>
        </div>
        <div class="p-3 border-t border-gray-100 bg-white flex gap-2">
            <input type="text" id="chat-input" class="flex-1 bg-gray-100 border-transparent focus:bg-white focus:border-jeff-teal focus:ring-0 rounded-full py-2 px-4 text-sm" placeholder="Ask a question...">
            <button id="chat-send" class="bg-jeff-teal text-white p-2 text-sm font-semibold rounded-full hover:bg-jeff-dark transition-colors shrink-0">
                <i data-lucide="send" class="w-5 h-5"></i>
            </button>
        </div>
    </div>

    <!-- Scripts -->
    <script src="public/js/app.js"></script>
</body>
</html>
