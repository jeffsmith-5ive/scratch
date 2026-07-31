<?php
$role = $role ?? 'customer';
$isAdmin = $role === 'admin';
?>

<div class="min-h-[80vh] bg-[#0A0A0A] flex items-center justify-center px-4 py-12 animate-fade-in">
    <div class="max-w-md w-full bg-[#111111] border border-white/10 rounded-3xl p-8 shadow-2xl space-y-8 relative overflow-hidden">
        <!-- Top Accent Bar -->
        <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-[var(--rust)] via-[var(--gold)] to-trini-red"></div>

        <div class="text-center space-y-2 pt-2">
            <div class="w-16 h-16 bg-neutral-900 border border-white/10 text-[var(--gold)] rounded-2xl flex items-center justify-center mx-auto shadow-lg">
                <i data-lucide="<?= $isAdmin ? 'shield-check' : 'user' ?>" class="w-8 h-8"></i>
            </div>
            <h1 class="text-3xl font-oswald font-bold uppercase text-white tracking-wide">
                <?= $isAdmin ? 'Admin Portal Access' : 'Customer Login' ?>
            </h1>
            <p class="text-xs text-neutral-400">
                <?= $isAdmin ? 'Management dashboard & customer activity monitoring' : 'Sign in to access your Krewe profile & loyalty points' ?>
            </p>
        </div>

        <!-- Role Switcher Tabs -->
        <div class="grid grid-cols-2 p-1.5 bg-black/60 rounded-2xl border border-white/10 text-xs font-bold font-oswald uppercase">
            <a href="?route=auth/login&role=customer" class="py-2.5 rounded-xl text-center transition flex items-center justify-center gap-1.5 <?= !$isAdmin ? 'bg-neutral-800 text-[var(--gold)] shadow border border-white/10' : 'text-neutral-400 hover:text-white' ?>">
                <i data-lucide="user" class="w-4 h-4"></i> Customer
            </a>
            <a href="?route=auth/login&role=admin" class="py-2.5 rounded-xl text-center transition flex items-center justify-center gap-1.5 <?= $isAdmin ? 'bg-neutral-800 text-[var(--gold)] shadow border border-white/10' : 'text-neutral-400 hover:text-white' ?>">
                <i data-lucide="shield" class="w-4 h-4"></i> Admin Portal
            </a>
        </div>

        <!-- Quick Demo One-Click Login Buttons -->
        <div class="bg-black/40 p-4 rounded-2xl border border-white/10 space-y-3">
            <p class="text-[10px] uppercase font-bold text-neutral-400 tracking-wider text-center flex items-center justify-center gap-1">
                <i data-lucide="sparkles" class="w-3.5 h-3.5 text-[var(--gold)] animate-pulse"></i> Instant Demo Testing Logins
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                <form action="?route=auth/login" method="POST">
                    <input type="hidden" name="role" value="customer">
                    <input type="hidden" name="email" value="jeff.smith@jeffbrewery.com">
                    <input type="hidden" name="password" value="customer123">
                    <button type="submit" class="w-full bg-neutral-900 hover:bg-neutral-800 text-white border border-white/10 py-2.5 px-3 rounded-xl text-xs font-bold uppercase tracking-wider flex items-center justify-center gap-2 transition group shadow">
                        <i data-lucide="user" class="w-4 h-4 text-emerald-400 group-hover:scale-110 transition"></i> Customer
                    </button>
                </form>

                <form action="?route=auth/login" method="POST">
                    <input type="hidden" name="role" value="admin">
                    <input type="hidden" name="email" value="admin@jeffbrewery.com">
                    <input type="hidden" name="password" value="admin123">
                    <button type="submit" class="w-full bg-neutral-900 hover:bg-neutral-800 text-white border border-white/10 py-2.5 px-3 rounded-xl text-xs font-bold uppercase tracking-wider flex items-center justify-center gap-2 transition group shadow">
                        <i data-lucide="shield-check" class="w-4 h-4 text-amber-400 group-hover:scale-110 transition"></i> Admin
                    </button>
                </form>
            </div>
        </div>

        <!-- Standard Form -->
        <form action="?route=auth/login" method="POST" class="space-y-5">
            <input type="hidden" name="role" value="<?= htmlspecialchars($role) ?>">

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-neutral-300 mb-2">Email Address</label>
                <div class="relative">
                    <i data-lucide="mail" class="w-5 h-5 absolute left-3.5 top-3.5 text-neutral-500"></i>
                    <input 
                        type="email" 
                        name="email" 
                        value="<?= $isAdmin ? 'admin@jeffbrewery.com' : 'jeff.smith@jeffbrewery.com' ?>" 
                        required 
                        class="w-full bg-black/60 border border-white/15 rounded-xl pl-11 pr-4 py-3 text-sm text-white focus:outline-none focus:border-[var(--gold)] transition"
                    >
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-neutral-300 mb-2">Password</label>
                <div class="relative">
                    <i data-lucide="lock" class="w-5 h-5 absolute left-3.5 top-3.5 text-neutral-500"></i>
                    <input 
                        type="password" 
                        name="password" 
                        value="password123" 
                        required 
                        class="w-full bg-black/60 border border-white/15 rounded-xl pl-11 pr-4 py-3 text-sm text-white focus:outline-none focus:border-[var(--gold)] transition"
                    >
                </div>
            </div>

            <button type="submit" class="w-full bg-[var(--gold)] text-black font-oswald font-bold uppercase tracking-widest text-base py-4 rounded-xl hover:bg-yellow-500 transition shadow-xl flex items-center justify-center gap-2">
                <span>Sign In as <?= $isAdmin ? 'Admin' : 'Customer' ?></span>
                <i data-lucide="arrow-right" class="w-5 h-5"></i>
            </button>
        </form>

        <div class="pt-4 border-t border-white/10 text-center text-xs text-neutral-400">
            Don't have an account? 
            <a href="?route=auth/register&role=<?= htmlspecialchars($role) ?>" class="text-[var(--gold)] font-bold hover:underline">
                Create <?= $isAdmin ? 'Admin' : 'Customer' ?> Account
            </a>
        </div>
    </div>
</div>
