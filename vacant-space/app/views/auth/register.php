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
                <i data-lucide="<?= $isAdmin ? 'user-plus' : 'beer' ?>" class="w-8 h-8"></i>
            </div>
            <h1 class="text-3xl font-oswald font-bold uppercase text-white tracking-wide">
                <?= $isAdmin ? 'Admin Registration' : 'Join the Krewe' ?>
            </h1>
            <p class="text-xs text-neutral-400">
                <?= $isAdmin ? 'Register a new administrative account' : 'Unlock VIP rewards, custom brew recipes & loyalty points' ?>
            </p>
        </div>

        <!-- Role Switcher Tabs -->
        <div class="grid grid-cols-2 p-1.5 bg-black/60 rounded-2xl border border-white/10 text-xs font-bold font-oswald uppercase">
            <a href="?route=auth/register&role=customer" class="py-2.5 rounded-xl text-center transition flex items-center justify-center gap-1.5 <?= !$isAdmin ? 'bg-neutral-800 text-[var(--gold)] shadow border border-white/10' : 'text-neutral-400 hover:text-white' ?>">
                <i data-lucide="user" class="w-4 h-4"></i> Customer
            </a>
            <a href="?route=auth/register&role=admin" class="py-2.5 rounded-xl text-center transition flex items-center justify-center gap-1.5 <?= $isAdmin ? 'bg-neutral-800 text-[var(--gold)] shadow border border-white/10' : 'text-neutral-400 hover:text-white' ?>">
                <i data-lucide="shield" class="w-4 h-4"></i> Admin
            </a>
        </div>

        <!-- Registration Form -->
        <form action="?route=auth/register" method="POST" class="space-y-5">
            <input type="hidden" name="role" value="<?= htmlspecialchars($role) ?>">

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-neutral-300 mb-2">Full Name</label>
                <div class="relative">
                    <i data-lucide="user" class="w-5 h-5 absolute left-3.5 top-3.5 text-neutral-500"></i>
                    <input 
                        type="text" 
                        name="name" 
                        placeholder="<?= $isAdmin ? 'Admin Name' : 'Jeff Smith' ?>" 
                        required 
                        class="w-full bg-black/60 border border-white/15 rounded-xl pl-11 pr-4 py-3 text-sm text-white focus:outline-none focus:border-[var(--gold)] transition"
                    >
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-neutral-300 mb-2">Email Address</label>
                <div class="relative">
                    <i data-lucide="mail" class="w-5 h-5 absolute left-3.5 top-3.5 text-neutral-500"></i>
                    <input 
                        type="email" 
                        name="email" 
                        placeholder="<?= $isAdmin ? 'admin@jeffbrewery.com' : 'jeff@jeffbrewery.com' ?>" 
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
                        placeholder="••••••••" 
                        required 
                        class="w-full bg-black/60 border border-white/15 rounded-xl pl-11 pr-4 py-3 text-sm text-white focus:outline-none focus:border-[var(--gold)] transition"
                    >
                </div>
            </div>

            <button type="submit" class="w-full bg-[var(--rust)] text-white font-oswald font-bold uppercase tracking-widest text-base py-4 rounded-xl hover:bg-amber-700 transition shadow-xl flex items-center justify-center gap-2">
                <span>Create <?= $isAdmin ? 'Admin' : 'Customer' ?> Account</span>
                <i data-lucide="check-circle" class="w-5 h-5"></i>
            </button>
        </form>

        <div class="pt-4 border-t border-white/10 text-center text-xs text-neutral-400">
            Already registered? 
            <a href="?route=auth/login&role=<?= htmlspecialchars($role) ?>" class="text-[var(--gold)] font-bold hover:underline">
                Sign In Here
            </a>
        </div>
    </div>
</div>
