<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeff Brewery Industries</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&family=Rock+Salt&display=swap" rel="stylesheet">
    
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
<body class="bg-[#0a0a0a] text-[#f5f0e8] font-sans flex flex-col min-h-screen">

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

<?php
$currentPage = $_GET['route'] ?? 'home';
$isCheckout = in_array($currentPage, ['checkout', 'cart/checkout']);
$cartCount = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $id => $qty) {
        $cartCount += $qty;
    }
}
$userPoints = $_SESSION['user']['points'] ?? 0;
$authRole = $_SESSION['auth_role'] ?? (isset($_SESSION['user']) ? 'customer' : 'guest');

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
<?php if ($isCheckout): ?>
    <!-- Minimalist Checkout Header (Section 1) -->
    <header class="bg-[#0A0A0A] border-b border-[#262626] py-4 px-4 sm:px-8 sticky top-0 z-50 backdrop-blur-md relative">
        <!-- Signature Jeff Brewery Trini Flag Strip -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-trini-flag shadow-sm z-10"></div>

        <div class="max-w-6xl mx-auto flex items-center justify-between pt-1">
            <!-- Left: Logo -->
            <a href="?route=home" class="premium-logo flex items-center gap-2">
                <div class="p-1.5 bg-[#141414] border border-[#2A2A2A] rounded-lg">
                    <i data-lucide="beer" class="h-4.5 w-4.5 text-[var(--gold)]"></i>
                </div>
                <span class="text-lg font-display text-white tracking-wide">JEFF<span class="text-[var(--gold)]">BREWERY</span></span>
            </a>

            <!-- Centre: Checkout Progress (Section 1) -->
            <div class="hidden md:flex items-center gap-2 text-xs font-semibold uppercase tracking-wider">
                <span class="text-white font-bold flex items-center gap-1.5">
                    <span class="w-5 h-5 rounded-full bg-[var(--gold)] text-black flex items-center justify-center text-[10px] font-bold">1</span>
                    Information
                </span>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-neutral-600"></i>
                <span class="text-neutral-400 flex items-center gap-1.5">
                    <span class="w-5 h-5 rounded-full bg-neutral-800 text-neutral-300 flex items-center justify-center text-[10px] font-bold">2</span>
                    Shipping
                </span>
                <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-neutral-600"></i>
                <span class="text-neutral-500 flex items-center gap-1.5">
                    <span class="w-5 h-5 rounded-full bg-neutral-900 text-neutral-500 flex items-center justify-center text-[10px] font-bold">3</span>
                    Payment
                </span>
            </div>

            <!-- Right: Secure Checkout -->
            <div class="flex items-center gap-1.5 text-xs text-neutral-300 font-semibold bg-neutral-900/80 px-3 py-1.5 rounded-full border border-neutral-800">
                <i data-lucide="lock" class="w-3.5 h-3.5 text-emerald-400"></i>
                <span>Secure Checkout</span>
            </div>
        </div>
    </header>
<?php else: ?>
    <header class="premium-navbar">
        <!-- Trini Flag Strip inside header -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-trini-flag shadow-md z-10"></div>

        <div class="premium-nav-container">
            <!-- Logo -->
            <a href="?route=home" class="premium-logo group shrink-0">
                <div class="p-1.5 bg-neutral-900 rounded-lg group-hover:bg-trini-red transition-colors duration-300 shadow-md">
                    <i data-lucide="beer" class="h-4.5 w-4.5 text-white transform group-hover:-rotate-12 transition-transform"></i>
                </div>
                <span>JEFF<span>BREWERY</span></span>
            </a>

            <!-- Desktop Navigation Menu (xl screens) -->
            <ul class="premium-nav-list hidden xl:flex">
                <?php foreach ($navLinks as $link): ?>
                    <li class="relative group nav-dropdown-container">
                        <?php if (isset($link['subLinks'])): 
                            $isActive = ($currentPage === $link['route']) || array_reduce($link['subLinks'], function($carry, $sub) use ($currentPage) {
                                return $carry || ($currentPage === $sub['route']);
                            }, false);
                        ?>
                            <button
                                data-dropdown="<?= htmlspecialchars($link['route']) ?>"
                                class="nav-dropdown-toggle premium-nav-link <?= $isActive ? 'active' : '' ?> focus:outline-none"
                            >
                                <?= htmlspecialchars($link['name']) ?>
                                <i data-lucide="chevron-down" class="ml-1 h-3.5 w-3.5 transition-transform duration-200 dropdown-arrow"></i>
                            </button>
                            
                            <!-- Desktop Dropdown Menu (Premium dark styling) -->
                            <div id="dropdown-<?= htmlspecialchars($link['route']) ?>" class="absolute top-full left-1/2 -translate-x-1/2 mt-4 w-48 bg-neutral-900/95 border border-neutral-800 backdrop-blur-md shadow-2xl rounded-xl overflow-hidden py-2 z-50 hidden nav-dropdown-menu">
                                <?php foreach ($link['subLinks'] as $subLink): ?>
                                    <a
                                        href="<?= htmlspecialchars($subLink['path']) ?>"
                                        class="block w-full text-left px-4 py-2.5 text-[10px] font-semibold uppercase tracking-widest transition-colors <?= $currentPage === $subLink['route'] ? 'bg-neutral-800 text-[var(--gold)]' : 'text-neutral-400 hover:bg-neutral-800 hover:text-white' ?>"
                                    >
                                        <?= htmlspecialchars($subLink['name']) ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <a
                                href="<?= htmlspecialchars($link['path']) ?>"
                                class="premium-nav-link <?= $currentPage === $link['route'] || (empty($_GET['route']) && $link['route'] === 'home') ? 'active' : '' ?>"
                            >
                                <?= htmlspecialchars($link['name']) ?>
                            </a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <!-- Header Action Items -->
            <div class="flex items-center gap-2.5 sm:gap-4 shrink-0">
                <!-- TriniChat Pill -->
                <button 
                    onclick="window.dispatchEvent(new CustomEvent('open-trinichat'))"
                    class="flex items-center space-x-1.5 bg-gradient-to-r from-teal-700 to-[var(--gold)] text-white px-2.5 py-1.5 sm:px-3 sm:py-1.5 rounded-full text-[9px] sm:text-[10px] font-bold uppercase tracking-wider hover:shadow-lg hover:scale-105 transition-all focus:outline-none"
                    title="Open TriniChat AI"
                >
                    <i data-lucide="sparkles" class="h-3 w-3 text-[var(--gold)] animate-pulse"></i>
                    <span class="hidden sm:inline">TriniChat</span>
                </button>

                <!-- Auth Badge / User Status -->
                <?php if ($authRole === 'admin'): ?>
                    <a href="?route=admin" class="hidden sm:flex items-center gap-1.5 bg-amber-500/10 border border-amber-500/30 text-amber-300 px-2.5 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-wider hover:bg-amber-500/20 transition">
                        <i data-lucide="shield-check" class="w-3.5 h-3.5 text-amber-400"></i>
                        <span>Admin</span>
                    </a>
                    <a href="?route=auth/logout" class="hidden sm:flex text-neutral-400 hover:text-red-400 text-[10px] font-bold uppercase tracking-wider transition" title="Logout">
                        <i data-lucide="log-out" class="w-4 h-4"></i>
                    </a>
                <?php else: ?>
                    <!-- Gamification Points (hidden on tiny screens) -->
                    <a href="?route=profile" class="hidden md:flex flex-col items-end cursor-pointer" title="Krewe Points">
                        <span class="text-[8px] font-bold text-neutral-500 uppercase tracking-wider">Level</span>
                        <div class="flex items-center text-[10px] font-bold text-[var(--gold)]">
                            <i data-lucide="trophy" class="w-3 h-3 mr-1 text-[var(--gold)] fill-current"></i> <?= $userPoints ?> pts
                        </div>
                    </a>

                    <!-- Profile icon -->
                    <a href="?route=profile" class="hidden sm:flex p-1.5 rounded-full text-neutral-400 hover:text-[var(--gold)] transition-colors" title="Customer Profile">
                        <i data-lucide="user" class="h-4.5 w-4.5"></i>
                    </a>

                    <a href="?route=auth/login" class="hidden sm:flex text-[10px] font-bold uppercase text-[var(--gold)] border border-[var(--gold)]/40 px-2.5 py-1 rounded-full hover:bg-[var(--gold)] hover:text-black transition">
                        Login
                    </a>
                <?php endif; ?>

                <!-- Cart Toggle -->
                <button class="cart-toggle flex items-center space-x-1.5 p-1.5 rounded-full text-neutral-300 hover:text-[var(--gold)] transition group focus:outline-none relative" title="View Cart">
                    <div class="relative">
                        <i data-lucide="shopping-cart" class="h-5 w-5 group-hover:scale-110 transition-transform"></i>
                        <span class="cart-count absolute -top-1.5 -right-1.5 inline-flex items-center justify-center 
                                        w-4 h-4 text-[9px] font-bold text-white bg-trini-red 
                                        rounded-full border border-neutral-900 <?= $cartCount > 0 ? 'animate-bounce' : 'hidden' ?>">
                            <?= $cartCount ?>
                        </span>
                    </div>
                </button>

                <!-- Mobile & Tablet Hamburger Button (visible on screens below xl) -->
                <button
                    id="mobile-menu-toggle-btn"
                    class="inline-flex xl:hidden items-center justify-center p-2 rounded-lg text-neutral-300 hover:text-[var(--gold)] hover:bg-neutral-800/80 transition focus:outline-none"
                    aria-label="Toggle Navigation Menu"
                >
                    <i data-lucide="menu" id="mobile-menu-icon-open" class="h-5 w-5"></i>
                    <i data-lucide="x" id="mobile-menu-icon-close" class="h-5 w-5 hidden"></i>
                </button>
            </div>
        </div>
    </header>
<?php endif; ?>

<?php if (!$isCheckout): ?>
    <!-- Mobile Sidebar Drawer (Slide-over from left with backdrop) -->
    <div id="mobile-sidebar" class="fixed inset-0 z-[80] pointer-events-none hidden">
        <!-- Backdrop -->
        <div id="mobile-sidebar-backdrop" class="absolute inset-0 bg-black/75 backdrop-blur-sm pointer-events-auto opacity-0 transition-opacity duration-300"></div>

        <!-- Sidebar Panel -->
        <div id="mobile-sidebar-panel" class="absolute inset-y-0 left-0 w-[85%] max-w-sm bg-[#0c0c0c] border-r border-neutral-800 shadow-2xl transform -translate-x-full transition-transform duration-300 ease-in-out pointer-events-auto flex flex-col">
            <!-- Sidebar Header with Logo and Close Button -->
            <div class="px-5 py-4 border-b border-neutral-800 flex items-center justify-between bg-neutral-900/80">
                <a href="?route=home" class="premium-logo flex items-center gap-2">
                    <div class="p-1.5 bg-neutral-800 rounded-lg">
                        <i data-lucide="beer" class="h-4 w-4 text-[var(--gold)]"></i>
                    </div>
                    <span class="text-base font-display">JEFF<span class="text-[var(--gold)]">BREWERY</span></span>
                </a>
                <button 
                    id="mobile-sidebar-close-btn" 
                    aria-label="Close Navigation" 
                    class="text-neutral-400 hover:text-white bg-neutral-800 hover:bg-neutral-700 p-2 rounded-full transition-colors focus:outline-none flex items-center justify-center"
                >
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>

            <!-- Scrollable Content -->
            <div class="flex-1 overflow-y-auto px-5 py-5 space-y-4">
                <!-- TriniChat quick launch button inside sidebar -->
                <button 
                    onclick="closeMobileSidebar(); window.dispatchEvent(new CustomEvent('open-trinichat'));"
                    class="w-full flex items-center justify-center space-x-2 bg-gradient-to-r from-teal-700 to-[var(--gold)] text-white px-4 py-3 rounded-xl text-xs font-bold uppercase tracking-wider hover:shadow-lg transition-all focus:outline-none"
                >
                    <i data-lucide="sparkles" class="h-4 w-4 text-[var(--gold)] animate-pulse"></i>
                    <span>Launch TriniChat AI</span>
                </button>

                <!-- Navigation Links List -->
                <nav class="space-y-1">
                    <?php foreach ($navLinks as $link): ?>
                        <div>
                            <?php if (isset($link['subLinks'])): ?>
                                <button
                                    data-dropdown="<?= htmlspecialchars($link['route']) ?>"
                                    class="mobile-dropdown-toggle flex items-center justify-between w-full text-left py-2.5 px-3 rounded-lg text-xs font-semibold uppercase tracking-wider text-neutral-300 hover:bg-neutral-900 hover:text-[var(--gold)] transition focus:outline-none"
                                >
                                    <span><?= htmlspecialchars($link['name']) ?></span>
                                    <i data-lucide="chevron-down" class="h-4 w-4 transition-transform duration-200 mobile-dropdown-arrow"></i>
                                </button>
                                <div id="mobile-dropdown-<?= htmlspecialchars($link['route']) ?>" class="pl-4 pr-2 py-2 space-y-1 bg-neutral-900/60 rounded-lg mt-1 hidden mobile-dropdown-menu">
                                    <?php foreach ($link['subLinks'] as $subLink): ?>
                                        <a
                                            href="<?= htmlspecialchars($subLink['path']) ?>"
                                            onclick="closeMobileSidebar()"
                                            class="block w-full text-left py-2 px-3 rounded text-[11px] font-semibold uppercase tracking-wider transition <?= $currentPage === $subLink['route'] ? 'text-[var(--gold)] bg-neutral-800' : 'text-neutral-400 hover:text-white hover:bg-neutral-800/50' ?>"
                                        >
                                            <?= htmlspecialchars($subLink['name']) ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <a
                                    href="<?= htmlspecialchars($link['path']) ?>"
                                    onclick="closeMobileSidebar()"
                                    class="block w-full text-left py-2.5 px-3 rounded-lg text-xs font-semibold uppercase tracking-wider transition <?= $currentPage === $link['route'] ? 'text-[var(--gold)] bg-neutral-900' : 'text-neutral-300 hover:bg-neutral-900 hover:text-white' ?>"
                                >
                                    <?= htmlspecialchars($link['name']) ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </nav>

                <!-- User & Cart Section at Bottom of Mobile Sidebar -->
                <div class="border-t border-neutral-800 pt-4 mt-6 space-y-3">
                    <div class="bg-neutral-900/70 p-3 rounded-xl border border-neutral-800 flex items-center justify-between">
                        <a href="?route=profile" onclick="closeMobileSidebar()" class="flex items-center space-x-2.5 text-xs text-neutral-300 hover:text-white">
                            <i data-lucide="user" class="h-4.5 w-4.5 text-[var(--gold)]"></i>
                            <div>
                                <div class="font-bold"><?= htmlspecialchars($_SESSION['user']['name'] ?? 'Guest Limers') ?></div>
                                <div class="text-[10px] text-[var(--gold)] flex items-center">
                                    <i data-lucide="trophy" class="w-3 h-3 mr-1 fill-current"></i> <?= $userPoints ?> pts
                                </div>
                            </div>
                        </a>
                        <a href="?route=profile" onclick="closeMobileSidebar()" class="text-[10px] uppercase font-bold text-[var(--gold)] px-2.5 py-1 bg-[var(--gold)]/10 rounded border border-[var(--gold)]/30 hover:bg-[var(--gold)] hover:text-black transition">
                            Profile
                        </a>
                    </div>

                    <button class="cart-toggle w-full flex items-center justify-between p-3 rounded-xl bg-neutral-900/70 border border-neutral-800 text-neutral-300 hover:text-white text-xs font-semibold uppercase tracking-wider focus:outline-none">
                        <span class="flex items-center space-x-2">
                            <i data-lucide="shopping-cart" class="h-4.5 w-4.5 text-[var(--gold)]"></i>
                            <span>View Cart</span>
                        </span>
                        <span class="cart-count-text px-2 py-0.5 rounded-full bg-trini-red text-white text-[10px] font-bold"><?= $cartCount ?></span>
                    </button>

                    <?php if ($authRole === 'admin'): ?>
                        <div class="flex gap-2 pt-2">
                            <a href="?route=admin" onclick="closeMobileSidebar()" class="flex-1 text-center py-2.5 bg-amber-500/20 border border-amber-500/40 text-amber-300 rounded-lg text-xs font-bold uppercase tracking-wider hover:bg-amber-500/30 transition">Admin Portal</a>
                            <a href="?route=auth/logout" class="py-2.5 px-3 bg-neutral-800 text-neutral-400 hover:text-red-400 rounded-lg text-xs font-bold transition flex items-center justify-center"><i data-lucide="log-out" class="w-4 h-4"></i></a>
                        </div>
                    <?php else: ?>
                        <div class="pt-2">
                            <a href="?route=auth/login" onclick="closeMobileSidebar()" class="block w-full text-center py-2.5 border border-[var(--gold)] text-[var(--gold)] rounded-lg text-xs font-bold uppercase tracking-wider hover:bg-[var(--gold)] hover:text-black transition">
                                Customer Login / Register
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

    <!-- Main Content Area -->
    <main class="flex-grow flex flex-col <?= $isCheckout ? 'pt-0 bg-[#FAF7F0] text-[#1A1A1A]' : 'pt-[76px]' ?>">
        <?php echo $content; ?>
    </main>

<?php if ($isCheckout): ?>
    <!-- Minimal Checkout Footer (Section 19) -->
    <footer class="bg-[#111111] text-neutral-400 py-8 border-t border-neutral-800 text-xs mt-auto">
        <div class="max-w-6xl mx-auto px-4 sm:px-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left">
            <div>
                <span class="font-bold text-white font-oswald uppercase tracking-wider text-sm">Jeff Brewery</span>
                <span class="text-neutral-400 ml-1">· Trinbagonian Flavour. Caribbean Story.</span>
            </div>
            <div class="flex flex-wrap items-center justify-center gap-4 text-neutral-400 text-xs">
                <a href="?route=shop" class="hover:text-[var(--gold)] transition">Shop</a>
                <a href="?route=about" class="hover:text-[var(--gold)] transition">About</a>
                <a href="?route=contact" class="hover:text-[var(--gold)] transition">Contact</a>
                <a href="?route=krewe" class="hover:text-[var(--gold)] transition">The Krewe</a>
                <a href="?route=brewerGuide" class="hover:text-[var(--gold)] transition">Brewer Guide</a>
                <a href="https://www.instagram.com/jeffbrewery?stkn=MWhjbXA5ZDJnbHNqag%3D%3D&utm_source=qr" target="_blank" rel="noopener noreferrer" class="hover:text-[var(--gold)] transition flex items-center gap-1.5 text-neutral-300 font-medium" title="Jeff Brewery on Instagram">
                    <img src="/public/images/instagram_icon.png" alt="Instagram" class="w-4 h-4 object-contain rounded-full shadow-sm">
                    <span>Instagram</span>
                </a>
                <a href="?route=privacy" class="hover:text-[var(--gold)] transition">Privacy Policy</a>
                <a href="?route=terms" class="hover:text-[var(--gold)] transition">Terms of Service</a>
            </div>
            <div class="text-neutral-500 text-xs">
                © <?= date('Y') ?> Jeff Brewery Industries
            </div>
        </div>
    </footer>
<?php else: ?>
    <!-- Footer -->
    <footer class="bg-neutral-900 text-white mt-auto pt-16 pb-8 border-t border-neutral-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-5 gap-12 mb-12">
         <div class="col-span-1">
           <h3 class="font-oswald font-bold text-2xl mb-4 text-jeff-gold tracking-wider uppercase leading-none">JEFF<br><span class="text-white">BREWERY</span></h3>
           <p class="text-neutral-400 text-sm leading-relaxed mb-6">
             A next-generation Trinbagonian craft brewery fusing Caribbean culture, bold flavour engineering, and modern brewing science.
           </p>
           <div class="flex items-center space-x-3 flex-wrap gap-y-2">
             <a href="https://www.instagram.com/jeffbrewery?stkn=MWhjbXA5ZDJnbHNqag%3D%3D&utm_source=qr" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full flex items-center justify-center hover:scale-110 transition-transform shadow-md overflow-hidden" title="Follow Jeff Brewery on Instagram">
               <img src="/public/images/instagram_icon.png" alt="Instagram" class="w-9 h-9 object-contain rounded-full shadow-sm">
             </a>
             <a href="#" class="w-9 h-9 flex items-center justify-center bg-neutral-800 hover:bg-neutral-700 text-white rounded-full transition shadow-md" title="Twitter / X">
               <svg class="w-4 h-4 fill-current text-white" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
             </a>
             <a href="#" class="w-9 h-9 flex items-center justify-center bg-[#1877F2] hover:bg-blue-600 text-white rounded-full transition shadow-md" title="Facebook">
               <svg class="w-4 h-4 fill-current text-white" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
             </a>
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
             <li><a href="?route=shop/detail&id=brechin-castle" class="hover:text-jeff-gold cursor-pointer transition">Brechin Castle</a></li>
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
           </ul>
         </div>

         <div>
           <h4 class="font-bold text-lg mb-6 tracking-wide font-oswald uppercase text-white">Account & Portal</h4>
           <ul class="text-neutral-400 space-y-2.5 text-sm">
             <li><a href="?route=auth/login&role=customer" class="hover:text-jeff-gold transition flex items-center gap-1.5"><i data-lucide="user" class="w-3.5 h-3.5 text-emerald-400"></i> Customer Login</a></li>
             <li><a href="?route=auth/register&role=customer" class="hover:text-jeff-gold transition flex items-center gap-1.5"><i data-lucide="user-plus" class="w-3.5 h-3.5 text-teal-400"></i> Customer Register</a></li>
             <li><a href="?route=auth/login&role=admin" class="hover:text-jeff-gold transition flex items-center gap-1.5"><i data-lucide="shield" class="w-3.5 h-3.5 text-amber-400"></i> Admin Portal Login</a></li>
             <li><a href="?route=admin" class="hover:text-jeff-gold transition flex items-center gap-1.5"><i data-lucide="layout-dashboard" class="w-3.5 h-3.5 text-amber-300"></i> Admin Dashboard</a></li>
             <li><a href="?route=auth/logout" class="hover:text-red-400 transition flex items-center gap-1.5 text-neutral-500"><i data-lucide="log-out" class="w-3.5 h-3.5"></i> Sign Out</a></li>
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
           <a target="_blank" href="https://www.crescentprocessing.com" class="inline-block hover:opacity-90 transition">
             <img alt="visa / mastercard processor" src="https://www.crescentprocessing.com/img/creditcards/visa-mastercard.png" height="32" class="h-8 w-auto" style="border-width: 0px" />
           </a>
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
<?php endif; ?>

<?php if (!$isCheckout): ?>
    <!-- Cart Slide-over Drawer -->
    <div id="cart-drawer" class="fixed inset-0 z-[80] pointer-events-none hidden">
        <!-- Backdrop -->
        <div id="cart-backdrop" class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity opacity-0 pointer-events-auto"></div>
        
        <!-- Drawer -->
        <div id="cart-panel" class="absolute inset-y-0 right-0 w-full max-w-md bg-white shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out pointer-events-auto flex flex-col">
            <div class="px-6 py-5 border-b border-gray-200 flex items-center justify-between bg-gray-50">
                <div class="flex items-center gap-2">
                    <i data-lucide="shopping-bag" class="w-5 h-5 text-jeff-orange"></i>
                    <h2 class="text-xl font-oswald font-semibold text-jeff-dark tracking-wide uppercase">Your Cart</h2>
                </div>
                <button id="cart-close" aria-label="Close Cart" class="text-neutral-500 hover:text-neutral-900 bg-neutral-200/70 hover:bg-neutral-300 transition-colors p-2 rounded-full focus:outline-none flex items-center justify-center">
                    <i data-lucide="x" class="w-5 h-5"></i>
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

    <!-- GLOBAL BEER SOCIAL SHARE MODAL -->
    <div id="beer-share-modal" class="fixed inset-0 z-[90] flex items-center justify-center bg-black/80 backdrop-blur-md hidden transition-all duration-300 pointer-events-auto">
        <div class="bg-neutral-900 border border-neutral-800 rounded-3xl max-w-lg w-full p-6 md:p-8 mx-4 shadow-2xl relative">
            <button id="close-beer-share-modal" aria-label="Close Share Modal" class="absolute top-4 right-4 text-neutral-400 hover:text-white transition p-2 rounded-full hover:bg-neutral-800 flex items-center justify-center">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>

            <div class="text-center mb-6">
                <div class="w-12 h-12 bg-jeff-gold/10 border border-jeff-gold/30 text-jeff-gold rounded-full flex items-center justify-center mx-auto mb-3">
                    <i data-lucide="share-2" class="w-6 h-6"></i>
                </div>
                <h3 id="beer-modal-title" class="text-2xl font-oswald font-bold text-white uppercase">Share Brew</h3>
                <p class="text-xs text-neutral-400 mt-1">Share this Trinbagonian craft beer on social media as an image card, story, or post!</p>
            </div>

            <!-- BEER PREVIEW CARD IN MODAL -->
            <div id="beer-share-preview-card" class="bg-black/90 border border-neutral-800 rounded-2xl p-4 mb-6 flex items-center gap-4 relative overflow-hidden">
                <div class="w-20 h-24 bg-neutral-900 rounded-xl p-2 flex items-center justify-center border border-neutral-800 shrink-0">
                    <img id="beer-modal-img" src="" alt="" class="max-w-full max-h-full object-contain drop-shadow-md">
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-start">
                        <h4 id="beer-modal-name" class="text-xl font-oswald font-bold text-white uppercase truncate">Beer Name</h4>
                        <span id="beer-modal-price" class="text-jeff-gold font-oswald font-bold text-lg">$0.00</span>
                    </div>
                    <p id="beer-modal-tagline" class="text-xs text-jeff-gold italic mb-1 truncate">Tagline</p>
                    <div class="flex items-center gap-2 text-[10px] uppercase font-bold text-neutral-400 mb-1">
                        <span id="beer-modal-style" class="bg-neutral-800 px-2 py-0.5 rounded">Style</span>
                        <span id="beer-modal-abv" class="bg-teal-950/40 text-teal-400 px-2 py-0.5 rounded">0.0% ABV</span>
                    </div>
                    <p id="beer-modal-flavors" class="text-[10px] text-neutral-400 truncate">Flavors...</p>
                </div>
            </div>

            <!-- SHARE OPTIONS -->
            <div class="grid grid-cols-2 gap-3 mb-6">
                <button id="beer-share-ig-story" class="flex flex-col items-center justify-center p-3.5 rounded-xl bg-gradient-to-r from-purple-900/40 via-pink-900/40 to-orange-900/40 border border-pink-700/40 text-pink-300 hover:brightness-125 transition group shadow-md">
                    <i data-lucide="instagram" class="w-6 h-6 mb-1 group-hover:scale-110 transition"></i>
                    <span class="text-xs font-bold uppercase tracking-wider">IG Story (9:16 Card)</span>
                    <span class="text-[9px] text-pink-300/80">Vertical Story Image</span>
                </button>
                <button id="beer-share-ig-post" class="flex flex-col items-center justify-center p-3.5 rounded-xl bg-pink-950/40 border border-pink-800/40 text-pink-400 hover:bg-pink-900/60 transition group shadow-md">
                    <i data-lucide="image" class="w-6 h-6 mb-1 group-hover:scale-110 transition"></i>
                    <span class="text-xs font-bold uppercase tracking-wider">IG Post (1:1 Card)</span>
                    <span class="text-[9px] text-pink-400/80">Square Feed Image</span>
                </button>
                <button id="beer-share-whatsapp" class="flex flex-col items-center justify-center p-3 rounded-xl bg-green-950/40 border border-green-800/40 text-green-400 hover:bg-green-900/60 transition group">
                    <i data-lucide="message-circle" class="w-5 h-5 mb-1 group-hover:scale-110 transition"></i>
                    <span class="text-xs font-bold uppercase tracking-wider">WhatsApp</span>
                </button>
                <button id="beer-share-facebook" class="flex flex-col items-center justify-center p-3 rounded-xl bg-blue-950/40 border border-blue-800/40 text-blue-400 hover:bg-blue-900/60 transition group">
                    <i data-lucide="facebook" class="w-5 h-5 mb-1 group-hover:scale-110 transition"></i>
                    <span class="text-xs font-bold uppercase tracking-wider">Facebook</span>
                </button>
            </div>

            <!-- COPY LINK INPUT -->
            <div class="relative flex items-center">
                <input id="beer-share-url-input" type="text" readonly class="w-full bg-black border border-neutral-800 rounded-xl py-3 pl-4 pr-24 text-xs text-neutral-300 font-mono outline-none focus:border-jeff-gold">
                <button id="copy-beer-share-url" class="absolute right-1 top-1 bottom-1 px-4 bg-jeff-gold text-black text-xs font-bold rounded-lg uppercase tracking-wider hover:bg-yellow-500 transition flex items-center gap-1">
                    <i data-lucide="copy" class="w-3.5 h-3.5"></i> Copy Link
                </button>
            </div>

            <!-- TOAST NOTIFICATION -->
            <div id="beer-share-toast" class="hidden mt-3 text-center text-xs font-bold text-emerald-400 bg-emerald-950/40 border border-emerald-800/40 py-2.5 px-3 rounded-lg transition-all animate-fade-in">
                Link copied to clipboard! 🍺
            </div>
        </div>
    </div>

    <!-- AI Brew Guide FAB (Floating Action Button) -->
    <div id="chatbot-fab-container" class="fixed bottom-5 right-5 sm:bottom-6 sm:right-6 z-40 flex flex-col items-end pointer-events-auto">
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
                class="liquid-glass-button text-white p-3.5 sm:p-4 rounded-full shadow-lg hover:shadow-xl focus:outline-none"
                aria-label="Toggle Brewer Guide Chatbot"
            >
                <i data-lucide="message-circle" id="chatbot-toggle-icon" class="w-6 h-6 sm:w-7 sm:h-7"></i>
                <i data-lucide="x" id="chatbot-toggle-close-icon" class="w-6 h-6 sm:w-7 sm:h-7 hidden"></i>
            </button>
        </div>
    </div>

    <!-- Chatbot Window -->
    <div id="chatbot-window" class="fixed bottom-20 right-3 left-3 sm:left-auto sm:right-6 sm:bottom-24 w-auto sm:w-[420px] sm:max-w-lg h-[560px] max-h-[calc(100dvh-6rem)] bg-white rounded-2xl shadow-2xl z-[85] border border-gray-200 hidden flex-col overflow-hidden transition-all duration-300 pointer-events-auto">
        <!-- Header (Section 14) -->
        <div class="bg-gradient-to-r from-neutral-900 via-neutral-900 to-black p-3.5 sm:p-4 text-white flex justify-between items-center shrink-0 border-b border-white/10 shadow-lg">
            <div class="flex items-center gap-2.5">
                <div class="bg-[var(--gold)]/15 border border-[var(--gold)]/30 p-2 rounded-xl text-[var(--gold)] shadow-inner">
                    <i data-lucide="beer" class="w-5 h-5"></i>
                </div>
                <div>
                    <div class="flex items-center gap-1.5">
                        <h3 class="font-oswald font-bold text-lg text-white leading-tight uppercase tracking-wider">Brewer Guide</h3>
                        <span class="inline-flex items-center gap-1 px-1.5 py-0.5 rounded-full text-[9px] font-bold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            AI Active
                        </span>
                    </div>
                    <p class="text-neutral-400 text-xs font-medium">Your AI Beer Advisor</p>
                </div>
            </div>
            <div class="flex items-center space-x-1 sm:space-x-2">
                <!-- Return to Home (Visible when maximized) -->
                <button 
                    id="chatbot-minimize-btn" 
                    class="hidden flex items-center space-x-1 sm:space-x-2 bg-white/10 hover:bg-white/20 text-white px-2.5 py-1 sm:px-3 sm:py-1.5 rounded-full transition-colors text-xs font-medium focus:outline-none"
                    title="Restore size"
                >
                    <i data-lucide="minimize-2" class="h-3.5 w-3.5"></i>
                    <span class="hidden sm:inline">Restore</span>
                </button>
                
                <!-- Standard Controls (Visible when not maximized) -->
                <button 
                    id="chatbot-maximize-btn" 
                    class="text-neutral-400 hover:text-white hover:bg-white/10 p-1.5 rounded-lg transition-colors focus:outline-none flex items-center justify-center"
                    title="Maximize"
                    aria-label="Maximize Chat"
                >
                    <i data-lucide="maximize-2" class="h-4 w-4 sm:h-5 sm:w-5"></i>
                </button>
                <button 
                    id="chatbot-close" 
                    class="bg-white/10 hover:bg-white/20 text-neutral-300 hover:text-white p-1.5 rounded-lg transition-colors focus:outline-none flex items-center justify-center"
                    title="Close Chat"
                    aria-label="Close Chat"
                >
                    <i data-lucide="x" class="h-4 w-4 sm:h-5 sm:w-5"></i>
                </button>
            </div>
        </div>

        <!-- Description Banner (Section 14) -->
        <div class="bg-neutral-950 px-4 py-2 border-b border-neutral-800 text-[11px] text-neutral-400 flex items-center justify-between">
            <span class="truncate">Find your next favourite brew, explore beer styles, and get personalised recommendations.</span>
            <span class="text-[var(--gold)] font-bold shrink-0 ml-2">4-Layer AI</span>
        </div>
        
        <!-- Chat Messages -->
        <div id="chat-messages" class="flex-1 overflow-y-auto p-4 space-y-4 bg-neutral-950 flex flex-col hide-scrollbar">
            <!-- Initial Greeting -->
            <div class="flex justify-start">
                <div class="bg-neutral-900 border border-white/10 text-neutral-200 rounded-2xl rounded-tl-none shadow-sm p-3.5 max-w-[85%] text-xs sm:text-sm leading-relaxed">
                    <p class="font-bold text-[var(--gold)] flex items-center gap-1.5 mb-1">
                        <i data-lucide="sparkles" class="w-3.5 h-3.5"></i> Welcome to Brewer Guide!
                    </p>
                    I'm your <strong>AI Beer Advisor</strong>. Ask me about beer styles, find personalized pairings, compare IBU/ABV, or check your <strong>Krewe points</strong>!
                </div>
            </div>
        </div>

        <!-- Starter Prompts (Section 15) -->
        <div id="chatbot-starter-chips" class="flex gap-1.5 overflow-x-auto px-3 py-2 bg-neutral-900/90 border-t border-white/10 hide-scrollbar shrink-0">
            <button onclick="sendQuickPrompt('Help me find a beer I\'ll like.')" class="prompt-chip whitespace-nowrap px-3 py-1 rounded-full bg-neutral-800 hover:bg-[var(--gold)] hover:text-black border border-white/10 text-neutral-300 text-[11px] font-semibold transition focus:outline-none flex items-center gap-1">
                <span>🍺 Find My Beer</span>
            </button>
            <button onclick="sendQuickPrompt('Find something similar to Island IPA.')" class="prompt-chip whitespace-nowrap px-3 py-1 rounded-full bg-neutral-800 hover:bg-[var(--gold)] hover:text-black border border-white/10 text-neutral-300 text-[11px] font-semibold transition focus:outline-none flex items-center gap-1">
                <span>🔍 Similar to Island IPA</span>
            </button>
            <button onclick="sendQuickPrompt('What do you recommend for me?')" class="prompt-chip whitespace-nowrap px-3 py-1 rounded-full bg-neutral-800 hover:bg-[var(--gold)] hover:text-black border border-white/10 text-neutral-300 text-[11px] font-semibold transition focus:outline-none flex items-center gap-1">
                <span>🧠 My Recommendations</span>
            </button>
            <button onclick="sendQuickPrompt('Teach me about IPAs.')" class="prompt-chip whitespace-nowrap px-3 py-1 rounded-full bg-neutral-800 hover:bg-[var(--gold)] hover:text-black border border-white/10 text-neutral-300 text-[11px] font-semibold transition focus:outline-none flex items-center gap-1">
                <span>📚 Learn About Beer</span>
            </button>
            <button onclick="sendQuickPrompt('Show me beers under $20.')" class="prompt-chip whitespace-nowrap px-3 py-1 rounded-full bg-neutral-800 hover:bg-[var(--gold)] hover:text-black border border-white/10 text-neutral-300 text-[11px] font-semibold transition focus:outline-none flex items-center gap-1">
                <span>🛒 Shop Under $20</span>
            </button>
            <button onclick="sendQuickPrompt('Check my Krewe points.')" class="prompt-chip whitespace-nowrap px-3 py-1 rounded-full bg-neutral-800 hover:bg-[var(--gold)] hover:text-black border border-white/10 text-neutral-300 text-[11px] font-semibold transition focus:outline-none flex items-center gap-1">
                <span>🏆 The Krewe</span>
            </button>
        </div>
        
        <!-- Input Area (Section 14) -->
        <div class="p-3 bg-neutral-900 border-t border-white/10 shrink-0">
            <div class="flex items-center space-x-2">
                <input 
                    type="text" 
                    id="chat-input" 
                    class="flex-1 bg-neutral-800 border border-white/10 text-white placeholder-neutral-500 rounded-full px-4 py-2.5 focus:outline-none focus:border-[var(--gold)] focus:ring-1 focus:ring-[var(--gold)] text-xs sm:text-sm" 
                    placeholder="Ask Brewer Guide about beer, find your next brew, or get a recommendation..."
                >
                <button 
                    id="chat-send" 
                    class="bg-[var(--gold)] text-black p-2.5 rounded-full hover:bg-yellow-400 transition-colors focus:outline-none flex items-center justify-center shrink-0 shadow-md font-bold"
                    title="Send Message"
                >
                    <i data-lucide="send" class="w-4 h-4"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- TriniChat Modal -->
    <div id="trinichat-modal" class="fixed inset-0 z-[90] flex items-center justify-center p-2 sm:p-6 pointer-events-none hidden">
        <!-- Backdrop -->
        <div id="trinichat-backdrop" class="absolute inset-0 bg-black/75 backdrop-blur-md pointer-events-auto transition-opacity opacity-0"></div>
        
        <!-- Modal Window -->
        <div 
            id="trinichat-window"
            class="bg-white shadow-2xl transition-all duration-300 pointer-events-auto overflow-hidden border border-gray-200 flex flex-col relative z-10 w-full max-w-4xl h-[92vh] sm:h-[80vh] rounded-2xl scale-95 opacity-0"
        >
            <!-- Header -->
            <div class="bg-jeff-teal p-3.5 sm:p-4 flex justify-between items-center shrink-0 text-white shadow-md">
                <div class="flex items-center gap-2.5">
                    <div class="p-1.5 bg-black/20 rounded-lg">
                        <i data-lucide="sparkles" class="w-4 h-4 text-jeff-gold animate-pulse"></i>
                    </div>
                    <div>
                        <h3 class="font-display font-bold text-base sm:text-lg text-white leading-tight">TriniChat</h3>
                        <p class="text-jeff-gold text-[10px] sm:text-xs">Cultural AI Assistant & Brand Storytelling</p>
                    </div>
                </div>
                <div class="flex items-center space-x-1.5 sm:space-x-2">
                    <button 
                        id="trinichat-maximize-btn" 
                        class="text-white hover:bg-black/20 p-2 rounded-lg transition-colors focus:outline-none flex items-center justify-center"
                        title="Maximize / Restore"
                        aria-label="Maximize TriniChat"
                    >
                        <i data-lucide="maximize-2" id="trinichat-maximize-icon" class="h-4 w-4 sm:h-5 sm:w-5"></i>
                        <i data-lucide="minimize-2" id="trinichat-minimize-icon" class="h-4 w-4 sm:h-5 sm:w-5 hidden"></i>
                    </button>
                    <button 
                        id="trinichat-close-btn" 
                        class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-colors focus:outline-none flex items-center justify-center shadow"
                        title="Close TriniChat"
                        aria-label="Close TriniChat"
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
<?php endif; ?>

    <!-- SVG Liquid Glass Filters -->
    <svg style="display:none; position: absolute; width: 0; height: 0;" aria-hidden="true" color-interpolation-filters="sRGB">
        <defs>
            <filter id="liquid-glass-bubble">
                <feGaussianBlur in="SourceGraphic" stdDeviation="0.5" result="blurred_source"></feGaussianBlur>
                <feImage href="/public/images/displacement-map-m6kvh9.png" x="0" y="0" width="100%" height="100%" result="displacement_map"></feImage>
                <feDisplacementMap in="blurred_source" in2="displacement_map" scale="30" xChannelSelector="R" yChannelSelector="G" result="displaced"></feDisplacementMap>
                <feColorMatrix in="displaced" type="saturate" result="displaced_saturated" values="1.5"></feColorMatrix>
                <feImage href="/public/images/specular-map-m6kvh9.png" x="0" y="0" width="100%" height="100%" result="specular_layer"></feImage>
                <feComposite in="displaced_saturated" in2="specular_layer" operator="in" result="specular_saturated"></feComposite>
                <feComponentTransfer in="specular_layer" result="specular_faded">
                    <feFuncA type="linear" slope="0.4"></feFuncA>
                </feComponentTransfer>
                <feBlend in="specular_saturated" in2="displaced" mode="normal" result="withSaturation"></feBlend>
                <feBlend in="specular_faded" in2="withSaturation" mode="normal"></feBlend>
            </filter>
        </defs>
    </svg>

    <!-- Scripts -->
    <script src="/public/js/app.js?v=<?= file_exists(__DIR__ . '/../../public/js/app.js') ? filemtime(__DIR__ . '/../../public/js/app.js') : time() ?>"></script>
</body>
</html>
