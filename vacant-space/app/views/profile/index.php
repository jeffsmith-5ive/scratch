<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-[#f5f0e8] animate-fade-in">
    <h1 class="text-4xl font-oswald font-bold text-white uppercase tracking-tight mb-8">User Profile</h1>
    
    <div class="bg-[#111111] border border-white/10 rounded-2xl shadow-2xl overflow-hidden">
        <div class="p-8 text-white flex justify-between items-center relative overflow-hidden bg-gradient-to-r from-black to-neutral-900 border-b border-white/5">
            <div class="absolute -right-10 -top-10 opacity-5">
                <i data-lucide="crown" class="w-48 h-48"></i>
            </div>
            <div class="relative z-10 flex items-center gap-6">
                <div class="w-24 h-24 bg-[var(--rust)] rounded-full flex items-center justify-center text-3xl font-bold font-oswald border-4 border-white/10 text-white shadow-lg shadow-[var(--rust)]/20">
                    J
                </div>
                <div>
                    <h2 class="text-3xl font-oswald font-bold tracking-wide">Jeff User</h2>
                    <p class="text-neutral-400 text-lg flex items-center gap-2">
                        <i data-lucide="award" class="w-5 h-5 text-[var(--gold)]"></i>
                        Rank: <span class="font-bold text-white"><?= htmlspecialchars($user['rank']) ?></span>
                    </p>
                </div>
            </div>
            <div class="relative z-10 text-right">
                <p class="text-sm font-semibold uppercase tracking-widest text-neutral-400 mb-1">Krewe Points</p>
                <p class="text-5xl font-oswald font-bold text-[var(--gold)]"><?= $user['points'] ?></p>
            </div>
        </div>
        
        <div class="p-8">
            <h3 class="text-xl font-oswald font-bold mb-4 uppercase tracking-wide text-white border-b border-white/10 pb-2 border-l-4 border-[var(--gold)] pl-3">Order History</h3>
            <?php if (empty($user['order_history'])): ?>
                <div class="text-center py-10 bg-black/40 border border-white/10 rounded-xl">
                    <i data-lucide="package" class="w-12 h-12 text-neutral-600 mx-auto mb-3"></i>
                    <p class="text-neutral-400">You haven't placed any orders yet.</p>
                    <a href="?route=shop" class="text-[var(--gold)] font-bold hover:text-white transition mt-2 inline-block">Start Shopping</a>
                </div>
            <?php else: ?>
                <!-- Render orders here... -->
            <?php endif; ?>
        </div>
    </div>
</div>

