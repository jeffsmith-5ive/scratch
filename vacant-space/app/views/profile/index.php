<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h1 class="text-4xl font-oswald font-bold text-jeff-dark uppercase tracking-tight mb-8">User Profile</h1>
    
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <div class="bg-jeff-dark p-8 text-white flex justify-between items-center relative overflow-hidden">
            <div class="absolute -right-10 -top-10 opacity-10">
                <i data-lucide="crown" class="w-48 h-48"></i>
            </div>
            <div class="relative z-10 flex items-center gap-6">
                <div class="w-24 h-24 bg-jeff-orange rounded-full flex items-center justify-center text-3xl font-bold font-oswald border-4 border-white/20">
                    J
                </div>
                <div>
                    <h2 class="text-3xl font-oswald font-bold tracking-wide">Jeff User</h2>
                    <p class="text-jeff-teal-100 text-lg flex items-center gap-2">
                        <i data-lucide="award" class="w-5 h-5 text-jeff-gold"></i>
                        Rank: <span class="font-bold text-white"><?= htmlspecialchars($user['rank']) ?></span>
                    </p>
                </div>
            </div>
            <div class="relative z-10 text-right">
                <p class="text-sm font-semibold uppercase tracking-widest text-gray-400 mb-1">Krewe Points</p>
                <p class="text-5xl font-oswald font-bold text-jeff-gold"><?= $user['points'] ?></p>
            </div>
        </div>
        
        <div class="p-8">
            <h3 class="text-xl font-oswald font-bold mb-4 uppercase tracking-wide text-gray-800 border-b border-gray-100 pb-2 border-l-4 border-jeff-orange pl-3">Order History</h3>
            <?php if (empty($user['order_history'])): ?>
                <div class="text-center py-10 bg-gray-50 rounded-xl">
                    <i data-lucide="package" class="w-12 h-12 text-gray-300 mx-auto mb-3"></i>
                    <p class="text-gray-500">You haven't placed any orders yet.</p>
                    <a href="?route=shop" class="text-jeff-teal font-bold hover:underline mt-2 inline-block">Start Shopping</a>
                </div>
            <?php else: ?>
                <!-- Render orders here... -->
            <?php endif; ?>
        </div>
    </div>
</div>
