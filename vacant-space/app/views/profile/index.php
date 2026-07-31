<?php
$user = $user ?? [];
$wishlistItems = $wishlistItems ?? [];
$flashMessage = $flashMessage ?? null;

$userPoints = $user['points'] ?? 0;
$nextRankPoints = $user['next_rank_points'] ?? 2000;
$progressPercent = min(100, max(0, round(($userPoints / $nextRankPoints) * 100)));
?>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 text-[#f5f0e8] animate-fade-in space-y-8">
    
    <!-- Flash Notification Toast -->
    <?php if ($flashMessage): ?>
        <div class="bg-emerald-950/80 border border-emerald-500/30 text-emerald-300 p-4 rounded-xl shadow-lg flex items-center justify-between animate-bounce-once">
            <div class="flex items-center gap-3">
                <i data-lucide="check-circle" class="w-5 h-5 text-emerald-400"></i>
                <span class="text-sm font-semibold"><?= htmlspecialchars($flashMessage) ?></span>
            </div>
            <button onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-white transition">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        </div>
    <?php endif; ?>

    <!-- User Profile Header Card -->
    <div class="bg-gradient-to-r from-neutral-900 via-[#141414] to-neutral-900 border border-white/10 rounded-3xl shadow-2xl overflow-hidden relative">
        <!-- Accent Top Bar -->
        <div class="h-2 bg-gradient-to-r from-[var(--rust)] via-[var(--gold)] to-trini-red"></div>

        <div class="p-6 md:p-10 relative">
            <div class="absolute right-6 top-6 opacity-5 pointer-events-none hidden md:block">
                <i data-lucide="crown" class="w-64 h-64 text-[var(--gold)]"></i>
            </div>

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-8 relative z-10">
                <!-- User Basic Info & Avatar -->
                <div class="flex items-center gap-6">
                    <div class="relative">
                        <div class="w-24 h-24 sm:w-28 sm:h-28 bg-gradient-to-br from-[var(--rust)] to-amber-700 rounded-2xl flex items-center justify-center text-4xl font-bold font-oswald border-2 border-white/20 text-white shadow-xl shadow-[var(--rust)]/20 uppercase tracking-widest">
                            <?= strtoupper(substr($user['name'] ?? 'J', 0, 1)) ?>
                        </div>
                        <span class="absolute -bottom-2 -right-2 bg-[var(--gold)] text-black text-[10px] font-black uppercase px-2 py-0.5 rounded-full border border-black shadow">
                            VIP
                        </span>
                    </div>

                    <div class="space-y-1">
                        <div class="flex items-center gap-3 flex-wrap">
                            <h1 class="text-3xl sm:text-4xl font-oswald font-bold tracking-wide text-white">
                                <?= htmlspecialchars($user['name'] ?? 'Jeff Smith') ?>
                            </h1>
                            <span class="bg-neutral-800 text-neutral-300 text-xs font-semibold px-3 py-1 rounded-full border border-white/10 flex items-center gap-1.5">
                                <i data-lucide="map-pin" class="w-3.5 h-3.5 text-[var(--gold)]"></i>
                                <?= htmlspecialchars($user['location'] ?? 'Port of Spain, Trinidad') ?>
                            </span>
                        </div>

                        <p class="text-neutral-400 text-sm flex items-center gap-2">
                            <i data-lucide="mail" class="w-4 h-4 text-neutral-500"></i>
                            <?= htmlspecialchars($user['email'] ?? 'jeff@jeffbrewery.com') ?>
                            <span class="text-neutral-600">•</span>
                            <i data-lucide="calendar" class="w-4 h-4 text-neutral-500"></i>
                            Member since <?= htmlspecialchars($user['member_since'] ?? 'March 2024') ?>
                        </p>

                        <div class="pt-1 flex items-center gap-2 text-xs text-neutral-300 font-medium">
                            <span class="text-[var(--gold)] font-bold">Favorite Brew Style:</span>
                            <span class="bg-neutral-950 px-2.5 py-0.5 rounded border border-white/5 text-amber-200">
                                <?= htmlspecialchars($user['favorite_style'] ?? 'Maracas Mist & Soca Starter') ?>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Loyalty Level & Rank Progress -->
                <div class="bg-black/60 border border-white/10 p-5 rounded-2xl md:w-80 space-y-3 backdrop-blur-md">
                    <div class="flex justify-between items-end border-b border-white/10 pb-2">
                        <div>
                            <span class="text-[10px] uppercase font-bold tracking-widest text-neutral-400 block">Krewe Rank</span>
                            <span class="text-lg font-oswald font-bold text-[var(--gold)] flex items-center gap-1.5">
                                <i data-lucide="award" class="w-5 h-5 text-[var(--gold)]"></i>
                                <?= htmlspecialchars($user['rank'] ?? 'Master Brew Limer') ?>
                            </span>
                        </div>
                        <div class="text-right">
                            <span class="text-[10px] uppercase font-bold tracking-widest text-neutral-400 block">Balance</span>
                            <span class="text-3xl font-oswald font-bold text-[var(--gold)]"><?= number_format($userPoints) ?> <span class="text-xs text-neutral-400">pts</span></span>
                        </div>
                    </div>

                    <!-- Progress bar to next rank -->
                    <div class="space-y-1.5">
                        <div class="flex justify-between text-[11px] text-neutral-400">
                            <span>Next Tier: <strong class="text-white"><?= htmlspecialchars($user['next_rank'] ?? 'Legendary Brewmaster') ?></strong></span>
                            <span><?= $userPoints ?> / <?= $nextRankPoints ?> pts</span>
                        </div>
                        <div class="w-full bg-neutral-800 rounded-full h-2 overflow-hidden p-0.5 border border-white/5">
                            <div class="bg-gradient-to-r from-[var(--rust)] to-[var(--gold)] h-full rounded-full transition-all duration-500" style="width: <?= $progressPercent ?>%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bio snippet -->
            <?php if (!empty($user['bio'])): ?>
                <div class="mt-6 pt-6 border-t border-white/10 text-neutral-300 text-sm italic flex items-start gap-2">
                    <i data-lucide="quote" class="w-5 h-5 text-[var(--gold)] shrink-0 opacity-60"></i>
                    <p><?= htmlspecialchars($user['bio']) ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Quick Stats Grid -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-[#111] border border-white/10 p-5 rounded-2xl flex items-center gap-4 hover:border-[var(--gold)]/40 transition">
            <div class="w-12 h-12 bg-amber-500/10 text-amber-400 rounded-xl flex items-center justify-center shrink-0 border border-amber-500/20">
                <i data-lucide="package" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-2xl font-oswald font-bold text-white"><?= count($user['order_history'] ?? []) ?></p>
                <p class="text-xs text-neutral-400 uppercase tracking-wider font-semibold">Orders Placed</p>
            </div>
        </div>

        <div class="bg-[#111] border border-white/10 p-5 rounded-2xl flex items-center gap-4 hover:border-[var(--gold)]/40 transition">
            <div class="w-12 h-12 bg-yellow-500/10 text-[var(--gold)] rounded-xl flex items-center justify-center shrink-0 border border-yellow-500/20">
                <i data-lucide="trophy" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-2xl font-oswald font-bold text-white"><?= count($user['badges'] ?? []) ?></p>
                <p class="text-xs text-neutral-400 uppercase tracking-wider font-semibold">Badges Unlocked</p>
            </div>
        </div>

        <div class="bg-[#111] border border-white/10 p-5 rounded-2xl flex items-center gap-4 hover:border-[var(--gold)]/40 transition">
            <div class="w-12 h-12 bg-teal-500/10 text-teal-400 rounded-xl flex items-center justify-center shrink-0 border border-teal-500/20">
                <i data-lucide="flask-conical" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-2xl font-oswald font-bold text-white"><?= count($user['saved_recipes'] ?? []) ?></p>
                <p class="text-xs text-neutral-400 uppercase tracking-wider font-semibold">Brew Lab Recipes</p>
            </div>
        </div>

        <div class="bg-[#111] border border-white/10 p-5 rounded-2xl flex items-center gap-4 hover:border-[var(--gold)]/40 transition">
            <div class="w-12 h-12 bg-red-500/10 text-red-400 rounded-xl flex items-center justify-center shrink-0 border border-red-500/20">
                <i data-lucide="heart" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-2xl font-oswald font-bold text-white"><?= count($user['wishlist'] ?? []) ?></p>
                <p class="text-xs text-neutral-400 uppercase tracking-wider font-semibold">Wishlist Items</p>
            </div>
        </div>
    </div>

    <!-- Main Navigation Tabs -->
    <div class="bg-[#111] border border-white/10 rounded-3xl overflow-hidden shadow-2xl">
        <!-- Tab Bar -->
        <div class="border-b border-white/10 bg-black/40 px-4 pt-4 flex gap-2 overflow-x-auto no-scrollbar">
            <button onclick="switchTab('orders')" id="tab-btn-orders" class="profile-tab-btn active px-6 py-3 font-oswald uppercase tracking-wider text-sm font-bold rounded-t-xl transition flex items-center gap-2 border-b-2 border-[var(--gold)] text-white bg-white/5">
                <i data-lucide="shopping-bag" class="w-4 h-4 text-[var(--gold)]"></i>
                Order History (<?= count($user['order_history'] ?? []) ?>)
            </button>
            <button onclick="switchTab('recipes')" id="tab-btn-recipes" class="profile-tab-btn px-6 py-3 font-oswald uppercase tracking-wider text-sm font-bold rounded-t-xl transition flex items-center gap-2 text-neutral-400 hover:text-white border-b-2 border-transparent">
                <i data-lucide="flask-conical" class="w-4 h-4 text-teal-400"></i>
                Brew Lab Recipes (<?= count($user['saved_recipes'] ?? []) ?>)
            </button>
            <button onclick="switchTab('badges')" id="tab-btn-badges" class="profile-tab-btn px-6 py-3 font-oswald uppercase tracking-wider text-sm font-bold rounded-t-xl transition flex items-center gap-2 text-neutral-400 hover:text-white border-b-2 border-transparent">
                <i data-lucide="award" class="w-4 h-4 text-amber-400"></i>
                Badges & Achievements (<?= count($user['badges'] ?? []) ?>)
            </button>
            <button onclick="switchTab('wishlist')" id="tab-btn-wishlist" class="profile-tab-btn px-6 py-3 font-oswald uppercase tracking-wider text-sm font-bold rounded-t-xl transition flex items-center gap-2 text-neutral-400 hover:text-white border-b-2 border-transparent">
                <i data-lucide="heart" class="w-4 h-4 text-red-400"></i>
                Wishlist (<?= count($wishlistItems) ?>)
            </button>
            <button onclick="switchTab('settings')" id="tab-btn-settings" class="profile-tab-btn px-6 py-3 font-oswald uppercase tracking-wider text-sm font-bold rounded-t-xl transition flex items-center gap-2 text-neutral-400 hover:text-white border-b-2 border-transparent">
                <i data-lucide="settings" class="w-4 h-4 text-neutral-400"></i>
                Edit Profile
            </button>
        </div>

        <!-- Tab Contents -->
        <div class="p-6 md:p-8">
            
            <!-- Tab 1: Order History -->
            <div id="tab-content-orders" class="profile-tab-content space-y-6">
                <div class="flex justify-between items-center border-b border-white/10 pb-4">
                    <h2 class="text-2xl font-oswald font-bold uppercase tracking-wide text-white border-l-4 border-[var(--gold)] pl-3">
                        Recent Purchases
                    </h2>
                    <a href="?route=shop" class="text-xs font-bold uppercase text-[var(--gold)] hover:underline flex items-center gap-1">
                        Browse Shop <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </a>
                </div>

                <?php if (empty($user['order_history'])): ?>
                    <div class="text-center py-16 bg-black/40 border border-white/10 rounded-2xl">
                        <i data-lucide="package" class="w-16 h-16 text-neutral-600 mx-auto mb-4"></i>
                        <h3 class="text-xl font-oswald font-bold text-white uppercase">No Orders Yet</h3>
                        <p class="text-neutral-400 text-sm mt-1 mb-6">Explore our craft beers and merchandise to place your first order!</p>
                        <a href="?route=shop" class="bg-[var(--gold)] text-black font-bold uppercase px-6 py-3 rounded-xl hover:bg-yellow-500 transition text-xs tracking-wider inline-block">
                            Start Shopping Now
                        </a>
                    </div>
                <?php else: ?>
                    <div class="space-y-6">
                        <?php foreach ($user['order_history'] as $order): 
                            $step = $order['step'] ?? ($order['status'] === 'Delivered' || $order['status'] === 'Picked Up' ? 4 : 3);
                            $isPickup = ($order['delivery_type'] ?? '') === 'pickup' || str_contains(strtolower($order['status'] ?? ''), 'collection') || str_contains(strtolower($order['status'] ?? ''), 'pickup');
                            $statusColor = str_contains(strtolower($order['status'] ?? ''), 'ready') ? 'amber' : ($order['status'] === 'Delivered' || $order['status'] === 'Picked Up' ? 'emerald' : 'blue');
                        ?>
                            <div class="bg-black/60 border border-white/10 rounded-3xl p-6 hover:border-white/20 transition space-y-6 shadow-xl">
                                <!-- Order Header -->
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-white/10 pb-4">
                                    <div class="flex items-center gap-4">
                                        <div class="p-3.5 bg-neutral-900 rounded-2xl border border-white/10 text-[var(--gold)]">
                                            <i data-lucide="<?= $isPickup ? 'store' : 'truck' ?>" class="w-7 h-7"></i>
                                        </div>
                                        <div>
                                            <div class="flex items-center gap-3 flex-wrap">
                                                <h3 class="text-xl font-oswald font-bold text-white tracking-wider">
                                                    Order #<?= htmlspecialchars($order['id']) ?>
                                                </h3>
                                                <span class="bg-<?= $statusColor ?>-950/80 text-<?= $statusColor ?>-400 border border-<?= $statusColor ?>-800/40 text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full flex items-center gap-1.5 shadow">
                                                    <span class="w-2 h-2 rounded-full bg-<?= $statusColor ?>-400 animate-pulse"></span>
                                                    <?= htmlspecialchars($order['status']) ?>
                                                </span>
                                            </div>
                                            <p class="text-xs text-neutral-400 mt-1 flex items-center gap-2">
                                                <span>Placed on <?= htmlspecialchars($order['date']) ?></span>
                                                <span>•</span>
                                                <span class="text-neutral-300 font-semibold"><?= $isPickup ? '🍺 Taproom Pickup' : '🚚 Island Delivery' ?></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="text-right sm:border-l sm:border-white/10 sm:pl-6">
                                        <p class="text-xs text-neutral-400 uppercase tracking-widest font-semibold">Total Amount</p>
                                        <p class="text-3xl font-oswald font-bold text-[var(--gold)]">$<?= number_format($order['total'], 2) ?></p>
                                    </div>
                                </div>

                                <!-- Progress Stepper -->
                                <div class="bg-neutral-900/60 p-5 rounded-2xl border border-white/5 space-y-3">
                                    <div class="flex justify-between items-center text-xs font-bold font-oswald uppercase tracking-wider text-neutral-400">
                                        <span class="text-white">Order Progress Tracker</span>
                                        <span class="text-[var(--gold)]">Step <?= $step ?> of 4</span>
                                    </div>
                                    
                                    <!-- Stepper Bar -->
                                    <div class="relative flex items-center justify-between pt-2">
                                        <div class="absolute left-0 right-0 top-1/2 -translate-y-1/2 h-1 bg-neutral-800 z-0"></div>
                                        <div class="absolute left-0 top-1/2 -translate-y-1/2 h-1 bg-gradient-to-r from-[var(--rust)] to-[var(--gold)] z-0 transition-all duration-500" style="width: <?= (($step - 1) / 3) * 100 ?>%"></div>

                                        <!-- Step 1 -->
                                        <div class="relative z-10 flex flex-col items-center gap-1">
                                            <div class="w-8 h-8 rounded-full border-2 flex items-center justify-center text-xs font-bold transition <?= $step >= 1 ? 'bg-[var(--gold)] border-[var(--gold)] text-black' : 'bg-neutral-900 border-neutral-700 text-neutral-500' ?>">
                                                <i data-lucide="check" class="w-4 h-4"></i>
                                            </div>
                                            <span class="text-[10px] uppercase font-semibold text-neutral-300">Placed</span>
                                        </div>

                                        <!-- Step 2 -->
                                        <div class="relative z-10 flex flex-col items-center gap-1">
                                            <div class="w-8 h-8 rounded-full border-2 flex items-center justify-center text-xs font-bold transition <?= $step >= 2 ? 'bg-[var(--gold)] border-[var(--gold)] text-black' : 'bg-neutral-900 border-neutral-700 text-neutral-500' ?>">
                                                <i data-lucide="flask-conical" class="w-4 h-4"></i>
                                            </div>
                                            <span class="text-[10px] uppercase font-semibold text-neutral-300">Brewing</span>
                                        </div>

                                        <!-- Step 3 -->
                                        <div class="relative z-10 flex flex-col items-center gap-1">
                                            <div class="w-8 h-8 rounded-full border-2 flex items-center justify-center text-xs font-bold transition <?= $step >= 3 ? 'bg-[var(--gold)] border-[var(--gold)] text-black' : 'bg-neutral-900 border-neutral-700 text-neutral-500' ?>">
                                                <i data-lucide="<?= $isPickup ? 'store' : 'truck' ?>" class="w-4 h-4"></i>
                                            </div>
                                            <span class="text-[10px] uppercase font-semibold text-neutral-300"><?= $isPickup ? 'Ready Pickup' : 'In Transit' ?></span>
                                        </div>

                                        <!-- Step 4 -->
                                        <div class="relative z-10 flex flex-col items-center gap-1">
                                            <div class="w-8 h-8 rounded-full border-2 flex items-center justify-center text-xs font-bold transition <?= $step >= 4 ? 'bg-emerald-500 border-emerald-500 text-black' : 'bg-neutral-900 border-neutral-700 text-neutral-500' ?>">
                                                <i data-lucide="check-circle-2" class="w-4 h-4"></i>
                                            </div>
                                            <span class="text-[10px] uppercase font-semibold text-neutral-300"><?= $isPickup ? 'Picked Up' : 'Delivered' ?></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pickup Alert or Courier Details Card -->
                                <?php if ($isPickup): ?>
                                    <div class="bg-gradient-to-r from-amber-950/70 via-black to-amber-950/70 border border-amber-500/40 p-5 rounded-2xl space-y-3 shadow-lg">
                                        <div class="flex justify-between items-start">
                                            <div class="flex items-center gap-2 text-amber-300 font-oswald font-bold uppercase tracking-wider text-sm">
                                                <i data-lucide="beer" class="w-5 h-5 text-[var(--gold)]"></i>
                                                Brewery Taproom Collection Info
                                            </div>
                                            <span class="bg-amber-500 text-black font-black text-xs px-3 py-1 rounded-full uppercase tracking-wider font-mono shadow">
                                                CODE: <?= htmlspecialchars($order['pickup_code'] ?? 'PICKUP-8719-VIP') ?>
                                            </span>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-xs text-neutral-300 pt-1">
                                            <div class="flex items-start gap-2">
                                                <i data-lucide="map-pin" class="w-4 h-4 text-[var(--gold)] shrink-0 mt-0.5"></i>
                                                <div>
                                                    <strong class="text-white block"><?= htmlspecialchars($order['location'] ?? 'Jeff Brewery Taproom & Brewpub') ?></strong>
                                                    <span class="text-neutral-400"><?= htmlspecialchars($order['pickup_address'] ?? 'Estate Road 4, Couva Industrial Estate, Trinidad') ?></span>
                                                </div>
                                            </div>
                                            <div class="flex items-start gap-2">
                                                <i data-lucide="clock" class="w-4 h-4 text-[var(--gold)] shrink-0 mt-0.5"></i>
                                                <div>
                                                    <strong class="text-white block">Collection Hours</strong>
                                                    <span class="text-neutral-400"><?= htmlspecialchars($order['hours'] ?? 'Mon - Sat: 10:00 AM - 9:00 PM') ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="bg-gradient-to-r from-teal-950/70 via-black to-teal-950/70 border border-teal-500/40 p-5 rounded-2xl space-y-3 shadow-lg">
                                        <div class="flex justify-between items-start">
                                            <div class="flex items-center gap-2 text-teal-300 font-oswald font-bold uppercase tracking-wider text-sm">
                                                <i data-lucide="truck" class="w-5 h-5 text-teal-400"></i>
                                                Carrier & Live Courier Tracking
                                            </div>
                                            <code class="bg-neutral-900 border border-teal-500/30 text-amber-300 text-xs px-3 py-1 rounded-lg font-mono">
                                                <?= htmlspecialchars($order['tracking'] ?? 'TT-POST-9842011') ?>
                                            </code>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-xs text-neutral-300 pt-1">
                                            <div>
                                                <span class="text-neutral-400 block uppercase font-bold text-[10px]">Carrier</span>
                                                <strong class="text-white"><?= htmlspecialchars($order['carrier'] ?? 'TT-Post Express Courier') ?></strong>
                                            </div>
                                            <div>
                                                <span class="text-neutral-400 block uppercase font-bold text-[10px]">Estimated Arrival</span>
                                                <strong class="text-teal-300"><?= htmlspecialchars($order['eta'] ?? 'Today by 4:00 PM') ?></strong>
                                            </div>
                                            <div>
                                                <span class="text-neutral-400 block uppercase font-bold text-[10px]">Destination</span>
                                                <strong class="text-white truncate block"><?= htmlspecialchars($order['address'] ?? 'Port of Spain, Trinidad') ?></strong>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <!-- Items List -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <?php foreach ($order['items'] as $item): ?>
                                        <div class="flex items-center gap-4 bg-neutral-900/60 p-3 rounded-xl border border-white/5">
                                            <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="w-14 h-14 object-contain rounded-lg bg-black/40 p-1 border border-white/5">
                                            <div class="flex-1 min-w-0">
                                                <h4 class="text-sm font-bold text-white truncate"><?= htmlspecialchars($item['name']) ?></h4>
                                                <p class="text-xs text-neutral-400">Qty: <?= $item['qty'] ?> × $<?= number_format($item['price'], 2) ?></p>
                                            </div>
                                            <span class="text-sm font-oswald font-bold text-white">$<?= number_format($item['qty'] * $item['price'], 2) ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Tab 2: Saved Brew Lab Recipes -->
            <div id="tab-content-recipes" class="profile-tab-content hidden space-y-6">
                <div class="flex justify-between items-center border-b border-white/10 pb-4">
                    <div>
                        <h2 class="text-2xl font-oswald font-bold uppercase tracking-wide text-white border-l-4 border-teal-500 pl-3">
                            Custom Brew Recipes
                        </h2>
                        <p class="text-xs text-neutral-400 mt-1">Your custom recipes saved from the Craft Your Own lab.</p>
                    </div>
                    <a href="?route=craft" class="bg-teal-600 hover:bg-teal-500 text-white font-bold uppercase px-4 py-2 rounded-xl transition text-xs flex items-center gap-2">
                        <i data-lucide="plus" class="w-4 h-4"></i> Create New Brew
                    </a>
                </div>

                <?php if (empty($user['saved_recipes'])): ?>
                    <div class="text-center py-16 bg-black/40 border border-white/10 rounded-2xl">
                        <i data-lucide="flask-conical" class="w-16 h-16 text-neutral-600 mx-auto mb-4"></i>
                        <h3 class="text-xl font-oswald font-bold text-white uppercase">No Saved Recipes</h3>
                        <p class="text-neutral-400 text-sm mt-1 mb-6">Head over to the Craft Your Own page to mix malts, hops, and tropical flavors!</p>
                        <a href="?route=craft" class="bg-teal-600 text-white font-bold uppercase px-6 py-3 rounded-xl hover:bg-teal-500 transition text-xs tracking-wider inline-block">
                            Launch Craft Lab
                        </a>
                    </div>
                <?php else: ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php foreach ($user['saved_recipes'] as $recipe): ?>
                            <div class="bg-black/50 border border-teal-900/40 rounded-2xl p-6 relative overflow-hidden flex flex-col justify-between hover:border-teal-500/50 transition shadow-xl">
                                <div class="absolute -right-8 -top-8 text-teal-500/5 pointer-events-none">
                                    <i data-lucide="beaker" class="w-40 h-40"></i>
                                </div>

                                <div class="space-y-4 relative z-10">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <span class="text-[10px] font-bold uppercase tracking-widest text-teal-400 bg-teal-950/60 px-2.5 py-0.5 rounded border border-teal-800/40">
                                                <?= htmlspecialchars($recipe['base']) ?>
                                            </span>
                                            <h3 class="text-2xl font-oswald font-bold text-white mt-1">
                                                <?= htmlspecialchars($recipe['name']) ?>
                                            </h3>
                                        </div>
                                        <form action="?route=profile/deleteRecipe" method="POST" onsubmit="return confirm('Delete this recipe?')">
                                            <input type="hidden" name="recipe_id" value="<?= htmlspecialchars($recipe['id']) ?>">
                                            <button type="submit" class="text-neutral-500 hover:text-red-400 transition p-1" title="Delete Recipe">
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </form>
                                    </div>

                                    <div class="space-y-2 text-xs">
                                        <div class="flex items-center gap-2 text-neutral-300">
                                            <i data-lucide="sparkles" class="w-4 h-4 text-amber-400 shrink-0"></i>
                                            <span>Infusion: <strong class="text-white"><?= htmlspecialchars($recipe['infusion']) ?></strong></span>
                                        </div>
                                        <div class="flex items-center gap-4 text-neutral-400 pt-1">
                                            <span>ABV: <strong class="text-teal-300 font-mono"><?= htmlspecialchars($recipe['abv']) ?></strong></span>
                                            <?php if (isset($recipe['ibu'])): ?>
                                                <span>•</span>
                                                <span>IBU: <strong class="text-teal-300 font-mono"><?= $recipe['ibu'] ?></strong></span>
                                            <?php endif; ?>
                                            <span>•</span>
                                            <span>Created: <?= htmlspecialchars($recipe['created_at']) ?></span>
                                        </div>
                                        <?php if (!empty($recipe['notes'])): ?>
                                            <p class="text-neutral-400 italic bg-neutral-900/80 p-3 rounded-xl border border-white/5 mt-2">
                                                "<?= htmlspecialchars($recipe['notes']) ?>"
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="pt-4 mt-4 border-t border-white/10 flex flex-wrap justify-between items-center gap-2 relative z-10">
                                    <a href="?route=craft/timeline&id=<?= htmlspecialchars($recipe['id']) ?>" class="bg-gradient-to-r from-teal-700 to-[var(--gold)] text-white font-bold uppercase text-[10px] px-3.5 py-1.5 rounded-lg transition shadow flex items-center gap-1.5 hover:scale-105">
                                        <i data-lucide="activity" class="w-3.5 h-3.5 animate-pulse"></i> Live Brew Tracker
                                    </a>
                                    <div class="flex items-center gap-2">
                                        <a href="?route=craft" class="text-xs font-bold uppercase text-teal-400 hover:text-teal-300 flex items-center gap-1">
                                            <i data-lucide="rotate-cw" class="w-3 h-3"></i> Re-mix
                                        </a>
                                        <button onclick="addToCart('<?= htmlspecialchars($recipe['id']) ?>')" class="bg-teal-600 hover:bg-teal-500 text-white font-bold uppercase text-[10px] px-3.5 py-1.5 rounded-lg transition shadow flex items-center gap-1">
                                            <i data-lucide="shopping-cart" class="w-3 h-3"></i> Order Batch
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Tab 3: Badges & Achievements -->
            <div id="tab-content-badges" class="profile-tab-content hidden space-y-6">
                <div class="border-b border-white/10 pb-4">
                    <h2 class="text-2xl font-oswald font-bold uppercase tracking-wide text-white border-l-4 border-amber-500 pl-3">
                        Krewe Achievements
                    </h2>
                    <p class="text-xs text-neutral-400 mt-1">Unlock badges by tasting brews, submitting reviews, and participating in Krewe activities!</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <?php foreach ($user['badges'] ?? [] as $badge): ?>
                        <div class="bg-black/50 border border-amber-500/20 rounded-2xl p-5 flex items-start gap-4 hover:border-amber-500/50 transition shadow-lg group">
                            <div class="w-14 h-14 bg-gradient-to-br from-amber-500/20 to-yellow-600/20 border border-amber-500/40 rounded-2xl flex items-center justify-center shrink-0 text-amber-400 shadow-md group-hover:scale-110 transition-transform">
                                <i data-lucide="<?= htmlspecialchars($badge['icon'] ?? 'award') ?>" class="w-7 h-7"></i>
                            </div>
                            <div class="space-y-1">
                                <div class="flex items-center justify-between">
                                    <h3 class="font-oswald font-bold text-lg text-white group-hover:text-[var(--gold)] transition">
                                        <?= htmlspecialchars($badge['name']) ?>
                                    </h3>
                                </div>
                                <p class="text-xs text-neutral-400 leading-relaxed"><?= htmlspecialchars($badge['description']) ?></p>
                                <span class="text-[10px] text-amber-400/80 font-semibold block pt-1">Unlocked: <?= htmlspecialchars($badge['unlocked_at']) ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Tab 4: Wishlist -->
            <div id="tab-content-wishlist" class="profile-tab-content hidden space-y-6">
                <div class="flex justify-between items-center border-b border-white/10 pb-4">
                    <h2 class="text-2xl font-oswald font-bold uppercase tracking-wide text-white border-l-4 border-red-500 pl-3">
                        Saved Items
                    </h2>
                    <a href="?route=shop" class="text-xs font-bold uppercase text-[var(--gold)] hover:underline flex items-center gap-1">
                        Explore All Brews <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </a>
                </div>

                <?php if (empty($wishlistItems)): ?>
                    <div class="text-center py-16 bg-black/40 border border-white/10 rounded-2xl">
                        <i data-lucide="heart-off" class="w-16 h-16 text-neutral-600 mx-auto mb-4"></i>
                        <h3 class="text-xl font-oswald font-bold text-white uppercase">Wishlist is Empty</h3>
                        <p class="text-neutral-400 text-sm mt-1 mb-6">Heart items while browsing the shop to save them for later!</p>
                        <a href="?route=shop" class="bg-red-600 text-white font-bold uppercase px-6 py-3 rounded-xl hover:bg-red-500 transition text-xs tracking-wider inline-block">
                            Browse Shop
                        </a>
                    </div>
                <?php else: ?>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        <?php foreach ($wishlistItems as $item): ?>
                            <div class="bg-black/50 border border-white/10 rounded-2xl p-5 flex flex-col justify-between hover:border-white/30 transition group">
                                <div class="space-y-4">
                                    <div class="h-44 bg-neutral-900/80 rounded-xl p-3 flex items-center justify-center border border-white/5 relative overflow-hidden">
                                        <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="max-h-full object-contain group-hover:scale-105 transition-transform duration-300">
                                        <span class="absolute top-2 left-2 bg-neutral-950 text-neutral-300 text-[10px] uppercase font-bold px-2 py-0.5 rounded border border-white/10">
                                            <?= htmlspecialchars($item['style']) ?>
                                        </span>
                                    </div>
                                    <div>
                                        <h3 class="font-oswald font-bold text-xl text-white group-hover:text-[var(--gold)] transition">
                                            <?= htmlspecialchars($item['name']) ?>
                                        </h3>
                                        <p class="text-xs text-neutral-400 truncate mt-0.5"><?= htmlspecialchars($item['tagline'] ?? '') ?></p>
                                    </div>
                                </div>

                                <div class="pt-4 mt-4 border-t border-white/10 flex items-center justify-between">
                                    <span class="text-xl font-oswald font-bold text-[var(--gold)]">$<?= number_format($item['price'], 2) ?></span>
                                    <div class="flex items-center gap-2">
                                        <button onclick="toggleWishlist('<?= htmlspecialchars($item['id']) ?>', this)" class="p-2 text-red-400 hover:text-white transition rounded-lg hover:bg-neutral-800" title="Remove from wishlist">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                        <a href="?route=shop/detail&id=<?= htmlspecialchars($item['id']) ?>" class="bg-[var(--rust)] hover:bg-amber-700 text-white font-bold uppercase text-xs px-3 py-1.5 rounded-lg transition">
                                            View Brew
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Tab 5: Edit Profile Settings -->
            <div id="tab-content-settings" class="profile-tab-content hidden space-y-6">
                <div class="border-b border-white/10 pb-4">
                    <h2 class="text-2xl font-oswald font-bold uppercase tracking-wide text-white border-l-4 border-neutral-400 pl-3">
                        Edit Profile Details
                    </h2>
                    <p class="text-xs text-neutral-400 mt-1">Update your contact details, shipping location, and personal brew preferences.</p>
                </div>

                <form action="?route=profile/update" method="POST" class="space-y-6 max-w-3xl">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-neutral-300 mb-2">Full Name</label>
                            <input type="text" name="name" value="<?= htmlspecialchars($user['name'] ?? '') ?>" required class="w-full bg-black/60 border border-white/15 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[var(--gold)] transition">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-neutral-300 mb-2">Email Address</label>
                            <input type="email" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" required class="w-full bg-black/60 border border-white/15 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[var(--gold)] transition">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-neutral-300 mb-2">Phone Number</label>
                            <input type="text" name="phone" value="<?= htmlspecialchars($user['phone'] ?? '') ?>" class="w-full bg-black/60 border border-white/15 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[var(--gold)] transition">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-neutral-300 mb-2">Location / Island</label>
                            <input type="text" name="location" value="<?= htmlspecialchars($user['location'] ?? '') ?>" class="w-full bg-black/60 border border-white/15 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[var(--gold)] transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-neutral-300 mb-2">Favorite Craft Beer Style</label>
                        <input type="text" name="favorite_style" value="<?= htmlspecialchars($user['favorite_style'] ?? '') ?>" placeholder="e.g. West Coast IPA, Sorrel Ale, Chocolate Stout" class="w-full bg-black/60 border border-white/15 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[var(--gold)] transition">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-neutral-300 mb-2">Bio / Limer Statement</label>
                        <textarea name="bio" rows="3" class="w-full bg-black/60 border border-white/15 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-[var(--gold)] transition" placeholder="Share a few words about your craft beer passion..."><?= htmlspecialchars($user['bio'] ?? '') ?></textarea>
                    </div>

                    <div class="pt-4 flex items-center gap-4">
                        <button type="submit" class="bg-[var(--gold)] text-black font-bold uppercase px-8 py-3.5 rounded-xl hover:bg-yellow-500 transition text-xs tracking-wider shadow-lg">
                            Save Changes
                        </button>
                        <button type="button" onclick="switchTab('orders')" class="text-neutral-400 hover:text-white transition text-xs font-bold uppercase">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
function switchTab(tabName) {
    // Hide all tab contents
    document.querySelectorAll('.profile-tab-content').forEach(el => el.classList.add('hidden'));
    
    // Deactivate all tab buttons
    document.querySelectorAll('.profile-tab-btn').forEach(btn => {
        btn.classList.remove('active', 'border-b-2', 'border-[var(--gold)]', 'text-white', 'bg-white/5');
        btn.classList.add('text-neutral-400', 'border-transparent');
    });

    // Show target content
    const targetContent = document.getElementById('tab-content-' + tabName);
    if (targetContent) {
        targetContent.classList.remove('hidden');
    }

    // Activate target button
    const targetBtn = document.getElementById('tab-btn-' + tabName);
    if (targetBtn) {
        targetBtn.classList.add('active', 'border-b-2', 'border-[var(--gold)]', 'text-white', 'bg-white/5');
        targetBtn.classList.remove('text-neutral-400', 'border-transparent');
    }
}

function toggleWishlist(id, btn) {
    fetch('?route=user/toggleWishlist', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id: id })
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            window.location.reload();
        }
    });
}
</script>
