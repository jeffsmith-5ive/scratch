<?php 
// Variables available from controller: $isMember, $points, $rewards, $ranks, $currentRank
?>

<?php if (!$isMember): ?>
<!-- --- GUEST VIEW (LANDING PAGE) --- -->
<div class="bg-neutral-900 min-h-screen text-white relative">
    <!-- DEV TOOL: Simulate Login -->
    <a 
        href="?route=krewe&member=true" 
        class="fixed top-24 right-4 z-50 bg-white/10 text-xs px-2 py-1 rounded backdrop-blur border border-white/20 hover:bg-white hover:text-black transition"
    >
        Dev: View as Member
    </a>

    <!-- 1. HERO SECTION -->
    <section class="relative py-24 md:py-36 px-4 overflow-hidden flex flex-col items-center text-center">
        <!-- Background Images - J'ouvert / Carnival Vibe -->
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1567365601293-10d510c4d291?auto=format&fit=crop&w=1600&q=80')] bg-cover bg-center opacity-30 mix-blend-overlay"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-neutral-900 via-transparent to-neutral-900"></div>
        
        <div class="absolute top-0 left-0 w-64 h-64 bg-jeff-teal/30 rounded-full filter blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-trini-red/20 rounded-full filter blur-3xl transform translate-x-1/2 translate-y-1/2"></div>

        <div class="relative z-10 max-w-4xl mx-auto">
        <div class="inline-flex items-center justify-center p-3 bg-white/5 rounded-full mb-8 border border-white/10 backdrop-blur-sm animate-pulse">
            <i data-lucide="crown" class="w-5 h-5 text-jeff-gold mr-2"></i>
            <span class="text-xs font-bold tracking-[0.2em] uppercase text-jeff-gold">Inner Circle Access</span>
        </div>
        
        <h1 class="text-6xl md:text-8xl font-oswald font-extrabold uppercase tracking-tight mb-6 leading-none drop-shadow-2xl">
            Join the <span class="text-transparent bg-clip-text bg-gradient-to-r from-jeff-gold to-jeff-orange">Krewe</span>
        </h1>
        
        <h2 class="text-xl md:text-2xl font-light text-neutral-300 mb-10 max-w-2xl mx-auto drop-shadow-md">
            Not just a list. It's a movement. <br/>
            <span class="text-white font-medium border-b-2 border-jeff-orange pb-1">Early drops • Limited releases • Road Access</span>
        </h2>

        <form action="?route=krewe&member=true" method="POST" class="flex flex-col sm:flex-row gap-4 w-full max-w-md mx-auto">
            <div class="relative flex-1">
            <i data-lucide="mail" class="absolute left-4 top-4 text-gray-400 w-5 h-5"></i>
            <input 
                type="email" 
                name="email"
                placeholder="Enter your email" 
                class="w-full pl-12 pr-4 py-4 rounded-full bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-jeff-gold transition backdrop-blur-sm"
                required
            />
            </div>
            <button type="submit" class="px-8 py-4 bg-jeff-gold text-neutral-900 font-bold rounded-full hover:bg-white transition shadow-[0_0_20px_rgba(255,213,79,0.3)] uppercase tracking-wide">
            Join the Krewe
            </button>
        </form>
        </div>
    </section>

    <!-- 2. TEASER KREWE SHOP (LOCKED) -->
    <section class="py-24 px-4 bg-neutral-900 border-t border-white/5 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?auto=format&fit=crop&w=1600&q=80')] bg-cover bg-center opacity-10"></div>
        <div class="max-w-7xl mx-auto text-center relative z-10">
            <h3 class="text-3xl font-oswald font-bold uppercase tracking-wide mb-4 flex items-center justify-center">
                <i data-lucide="lock" class="w-6 h-6 mr-3 text-jeff-gold"></i> Krewe Shop Rewards
            </h3>
            <p class="text-neutral-400 mb-12">Earn points. Redeem culture. Join to unlock.</p>
            
            <!-- Blurred Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 opacity-30 filter blur-sm pointer-events-none select-none">
                <?php for($i=1; $i<=4; $i++): ?>
                <div class="bg-white/5 p-4 rounded-xl aspect-[4/5] flex flex-col justify-end border border-white/10">
                    <div class="h-4 bg-white/20 rounded w-3/4 mb-2"></div>
                    <div class="h-3 bg-white/10 rounded w-1/2"></div>
                </div>
                <?php endfor; ?>
            </div>

            <div class="absolute inset-0 flex items-center justify-center z-20">
                <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="bg-black/80 backdrop-blur-md border border-jeff-gold text-jeff-gold px-10 py-4 rounded-full font-bold uppercase tracking-wide hover:bg-jeff-gold hover:text-neutral-900 transition shadow-2xl transform hover:scale-105">
                Join to Unlock Rewards
                </button>
            </div>
        </div>
    </section>
</div>

<?php else: ?>
<!-- --- MEMBER VIEW (LOYALTY DASHBOARD) --- -->
<div class="bg-neutral-50 min-h-screen pb-24">
    
    <!-- DEV TOOL: Simulate Logout -->
    <a 
        href="?route=krewe" 
        class="fixed top-24 right-4 z-50 bg-black/50 text-white text-xs px-3 py-1.5 rounded-full backdrop-blur border border-white/20 hover:bg-neutral-900 transition flex items-center gap-2"
    >
        <i data-lucide="log-out" class="w-3 h-3"></i> Log Out
    </a>

    <!-- 1. HERO: STATUS & POWER -->
    <section class="bg-neutral-900 text-white pt-36 pb-20 px-4 rounded-b-[3rem] relative overflow-hidden shadow-2xl">
        <!-- Background Elements - Premium Brewery Vibe -->
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1559526323-cb2f2fe2591b?auto=format&fit=crop&w=1600&q=80')] bg-cover bg-center opacity-20 mix-blend-overlay"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-neutral-900 to-transparent opacity-90"></div>
        
        <div class="absolute top-0 right-0 w-96 h-96 bg-jeff-teal/20 rounded-full filter blur-3xl transform translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-trini-red/20 rounded-full filter blur-3xl transform -translate-x-1/2 translate-y-1/2"></div>

        <div class="max-w-7xl mx-auto relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-end gap-8">
            <div>
                <div class="flex items-center space-x-2 mb-2">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                    <span class="text-xs font-bold uppercase tracking-widest text-neutral-400">Welcome Back, Member</span>
                </div>
                <h1 class="text-4xl md:text-6xl font-oswald font-extrabold uppercase mb-2 leading-none">Krewe Shop</h1>
                <p class="text-xl text-neutral-300 font-light">Earn points. Redeem culture.</p>
            </div>
            
            <!-- Member Status Card -->
            <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl flex items-center gap-6 min-w-[300px] hover:bg-white/15 transition shadow-xl">
                <div class="w-16 h-16 bg-gradient-to-br from-jeff-gold to-jeff-orange rounded-full flex items-center justify-center shadow-lg relative group">
                    <i data-lucide="<?= htmlspecialchars($currentRank['icon']) ?>" class="w-8 h-8 text-white relative z-10"></i>
                    <div class="absolute inset-0 bg-white rounded-full opacity-0 group-hover:opacity-20 animate-ping"></div>
                </div>
                <div>
                    <p class="text-xs uppercase tracking-widest text-jeff-gold font-bold mb-1">Current Rank</p>
                    <p class="text-2xl font-bold font-oswald leading-none mb-1"><?= htmlspecialchars($currentRank['name']) ?></p>
                    <p class="text-sm text-white font-bold"><?= number_format($points) ?> <span class="text-neutral-400 font-normal">pts</span></p>
                </div>
            </div>
        </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 -mt-10 relative z-20">
        
        <!-- 2. HOW POINTS WORK -->
        <section class="bg-white rounded-2xl shadow-xl p-8 mb-12 border-b-4 border-jeff-gold relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-gray-50 rounded-full -mr-16 -mt-16 z-0"></div>
        <div class="relative z-10">
            <h3 class="font-oswald font-bold text-2xl text-neutral-900 mb-8 flex items-center uppercase tracking-wide">
                <i data-lucide="zap" class="w-6 h-6 mr-2 text-jeff-orange fill-current"></i> How You Earn Krewe Points
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="flex flex-col items-center text-center group cursor-pointer">
                    <div class="w-16 h-16 bg-neutral-50 rounded-full flex items-center justify-center text-jeff-dark mb-4 group-hover:bg-jeff-teal group-hover:text-white transition-all duration-300 shadow-sm group-hover:shadow-md group-hover:scale-110">
                        <i data-lucide="shopping-bag" class="w-8 h-8"></i>
                    </div>
                    <h4 class="font-bold text-lg mb-2">Buy Beer</h4>
                    <p class="text-sm text-gray-500">Earn 10 pts for every $1 spent in the shop.</p>
                </div>
                <div class="flex flex-col items-center text-center group cursor-pointer">
                    <div class="w-16 h-16 bg-neutral-50 rounded-full flex items-center justify-center text-jeff-dark mb-4 group-hover:bg-jeff-teal group-hover:text-white transition-all duration-300 shadow-sm group-hover:shadow-md group-hover:scale-110">
                        <i data-lucide="star" class="w-8 h-8"></i>
                    </div>
                    <h4 class="font-bold text-lg mb-2">Join Drops</h4>
                    <p class="text-sm text-gray-500">Bonus 50 pts for buying Limited Releases.</p>
                </div>
                <div class="flex flex-col items-center text-center group cursor-pointer">
                    <div class="w-16 h-16 bg-neutral-50 rounded-full flex items-center justify-center text-jeff-dark mb-4 group-hover:bg-jeff-teal group-hover:text-white transition-all duration-300 shadow-sm group-hover:shadow-md group-hover:scale-110">
                        <i data-lucide="calendar" class="w-8 h-8"></i>
                    </div>
                    <h4 class="font-bold text-lg mb-2">Seasonal</h4>
                    <p class="text-sm text-gray-500">2x Multiplier during Carnival & Christmas.</p>
                </div>
                <div class="flex flex-col items-center text-center group cursor-pointer">
                    <div class="w-16 h-16 bg-neutral-50 rounded-full flex items-center justify-center text-jeff-dark mb-4 group-hover:bg-jeff-teal group-hover:text-white transition-all duration-300 shadow-sm group-hover:shadow-md group-hover:scale-110">
                        <i data-lucide="mail" class="w-8 h-8"></i>
                    </div>
                    <h4 class="font-bold text-lg mb-2">Connect</h4>
                    <p class="text-sm text-gray-500">+100 pts for referrals and reviews.</p>
                </div>
            </div>
            <p class="text-[10px] text-gray-400 text-center mt-8 uppercase tracking-wider">Points have no cash value. Redeemable in Krewe Shop only.</p>
        </div>
        </section>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- 3. KREWE SHOP ITEMS -->
        <div class="lg:col-span-2 space-y-8">
            <div class="flex justify-between items-end border-b border-gray-200 pb-4">
                <h3 class="font-oswald font-bold text-3xl text-neutral-900 uppercase tracking-wide">Redeem Your Points</h3>
                <span class="text-sm font-bold bg-jeff-teal/10 text-jeff-teal px-3 py-1 rounded-full">Balance: <?= number_format($points) ?> pts</span>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <?php foreach ($rewards as $item): ?>
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-xl transition duration-300 flex flex-col">
                    <div class="h-48 overflow-hidden relative">
                        <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-700" />
                        <span class="absolute top-3 left-3 bg-neutral-900/90 backdrop-blur text-white text-[10px] font-bold uppercase tracking-widest px-2 py-1 rounded">
                            <?= htmlspecialchars($item['category']) ?>
                        </span>
                        <?php if ($item['cost'] > $points): ?>
                        <div class="absolute inset-0 bg-white/60 backdrop-blur-[2px] flex items-center justify-center">
                                <span class="bg-neutral-900 text-white px-4 py-2 rounded-full text-xs font-bold flex items-center shadow-lg">
                                <i data-lucide="lock" class="w-3 h-3 mr-2"></i> Need <?= number_format($item['cost'] - $points) ?> more pts
                                </span>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-5 flex-1 flex flex-col">
                        <div class="mb-2">
                            <h4 class="font-bold text-neutral-900 text-lg leading-tight mb-1"><?= htmlspecialchars($item['name']) ?></h4>
                        </div>
                        <div class="mt-auto flex justify-between items-center pt-4">
                            <span class="text-jeff-gold font-bold text-sm bg-neutral-900 px-2 py-1 rounded">
                                <?= number_format($item['cost']) ?> pts
                            </span>
                            <button 
                                <?= $item['cost'] > $points ? 'disabled' : '' ?>
                                class="px-4 py-2 rounded-lg font-bold text-xs uppercase tracking-wide transition <?= $item['cost'] <= $points ? 'bg-jeff-teal text-white hover:bg-jeff-dark shadow-md' : 'bg-gray-100 text-gray-400 cursor-not-allowed' ?>"
                            >
                                <?= $item['cost'] <= $points ? 'Redeem' : 'Locked' ?>
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- SIDEBAR: FEATURED & RANKS -->
        <div class="space-y-8">
            
            <!-- 4. FEATURED REWARD -->
            <div class="bg-neutral-900 rounded-2xl p-1 overflow-hidden shadow-2xl relative group">
                <!-- Background Texture - Dark Steel Pan / Industrial -->
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/dark-matter.png')] opacity-50"></div>
                
                <div class="relative bg-neutral-900/95 rounded-xl p-6 border border-white/10 backdrop-blur-sm">
                    <div class="flex justify-between items-start mb-4">
                    <span class="bg-jeff-gold text-neutral-900 text-[10px] font-bold px-2 py-1 rounded uppercase tracking-wider animate-pulse">
                        Featured Reward
                    </span>
                    <i data-lucide="lock" class="text-jeff-gold w-5 h-5"></i>
                    </div>
                    
                    <h3 class="font-oswald font-bold text-2xl text-white mb-2 tracking-wide uppercase">Midnight Robber</h3>
                    <p class="text-jeff-gold text-sm font-bold uppercase tracking-wide mb-4">Early Access Drop</p>
                    
                    <p class="text-neutral-400 text-sm mb-6 leading-relaxed">
                    Krewe members pour first. Secure your 6-pack of our Imperial Stout before the public release.
                    </p>

                    <div class="flex items-center justify-between border-t border-white/10 pt-4">
                    <span class="text-2xl font-bold text-white">2,000 <span class="text-sm text-neutral-500 font-normal">pts</span></span>
                    <button class="text-jeff-gold font-bold hover:text-white transition text-sm flex items-center uppercase tracking-wider">
                        View Details <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
                    </button>
                    </div>
                </div>
            </div>

            <!-- 5. KREWE RANKS -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-jeff-sand rounded-full -mr-10 -mt-10 z-0"></div>
                <div class="relative z-10">
                    <h3 class="font-oswald font-bold text-xl uppercase tracking-wide text-neutral-900 mb-6 drop-shadow-sm">Krewe Ranks</h3>
                    <div class="space-y-6">
                    <?php foreach ($ranks as $idx => $rank): ?>
                        <?php 
                        $isCurrent = $rank['name'] === $currentRank['name'];
                        $isPast = $points >= $rank['min'];
                        ?>
                        <div class="flex items-center relative <?= ($isPast || $isCurrent) ? 'opacity-100' : 'opacity-40' ?>">
                            <?php if ($idx !== count($ranks) - 1): ?>
                                <div class="absolute left-5 top-10 w-0.5 h-6 bg-gray-200"></div>
                            <?php endif; ?>
                            
                            <div class="w-10 h-10 rounded-full flex items-center justify-center border-2 z-10 transition-all duration-300 <?= $isCurrent ? 'bg-white border-jeff-teal text-jeff-teal shadow-md scale-110' : ($isPast ? 'bg-jeff-teal border-jeff-teal text-white' : 'bg-gray-50 border-gray-200 text-gray-300') ?>">
                                <i data-lucide="<?= htmlspecialchars($rank['icon']) ?>" class="w-5 h-5"></i>
                            </div>
                            <div class="ml-4 flex-1">
                                <div class="flex justify-between items-center">
                                    <h4 class="font-bold text-sm <?= $isCurrent ? 'text-jeff-teal uppercase tracking-wider' : 'text-neutral-900 uppercase tracking-wider' ?>"><?= htmlspecialchars($rank['name']) ?></h4>
                                    <?php if ($isCurrent): ?>
                                        <span class="text-[10px] bg-jeff-teal text-white px-2 py-0.5 rounded-full font-bold tracking-widest uppercase">YOU</span>
                                    <?php endif; ?>
                                </div>
                                <p class="text-xs text-gray-500"><?= htmlspecialchars($rank['range']) ?> pts</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- 6. FINAL CTA -->
        <div class="mt-20 text-center bg-jeff-sand rounded-2xl p-12 relative overflow-hidden group shadow-inner">
        <!-- Background Image - Beach Vibes / Relaxed -->
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1596529837776-5975e533c3a6?auto=format&fit=crop&w=1600&q=80')] bg-cover bg-center opacity-10 transition duration-700 group-hover:scale-110"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-jeff-sand via-transparent to-jeff-sand opacity-60"></div>
        
        <div class="relative z-10">
            <h2 class="text-3xl md:text-4xl font-oswald font-extrabold uppercase tracking-wide text-neutral-900 mb-4 drop-shadow-sm">More points. More culture. More access.</h2>
            <p class="text-neutral-700 mb-8 max-w-xl mx-auto font-medium">Keep sipping and climbing the ranks. The Inner Circle awaits.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="?route=shop" class="px-8 py-4 bg-neutral-900 text-white font-bold rounded-full hover:bg-trini-red transition shadow-lg flex items-center justify-center uppercase tracking-wide">
                    <i data-lucide="shopping-bag" class="w-5 h-5 mr-2"></i> Shop Beers
                </a>
                <button onclick="window.scrollTo({top:0, behavior:'smooth'})" class="px-8 py-4 bg-white text-neutral-900 border border-neutral-300 font-bold rounded-full hover:bg-gray-50 transition flex items-center justify-center uppercase tracking-wide">
                    <i data-lucide="user" class="w-5 h-5 mr-2"></i> View Profile
                </button>
            </div>
        </div>
        </div>
    </div>
</div>
<?php endif; ?>
