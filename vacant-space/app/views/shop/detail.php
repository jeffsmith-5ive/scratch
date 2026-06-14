<?php
$isLimited = in_array(strtoupper($beer['availability']), ['LIMITED', 'SEASONAL']);
?>

<div class="min-h-screen py-20 bg-[#0A0A0A]">
<div class="max-w-7xl mx-auto px-6">

<a href="?route=shop" class="text-sm uppercase tracking-wider text-neutral-400 hover:text-jeff-gold flex items-center font-bold transition">
<i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i> Back to Collection
</a>

<div class="grid lg:grid-cols-2 gap-16 mt-10">

<!-- LEFT IMAGE -->
<div class="bg-neutral-900 rounded-3xl shadow-xl overflow-hidden aspect-[4/5] flex items-center justify-center p-8 border border-neutral-800 relative group">
    <img src="<?= htmlspecialchars($beer['image']) ?>"
         alt="<?= htmlspecialchars($beer['name']) ?>"
         class="max-w-full max-h-full object-contain group-hover:scale-105 transition-transform duration-700 ease-in-out drop-shadow-2xl">
</div>

<!-- RIGHT DETAILS -->
<div class="flex flex-col">

<?php if ($isLimited): ?>
<div class="bg-neutral-950 border border-neutral-850 border-l-4 border-yellow-500 text-yellow-500 p-4 rounded-r-xl mb-6 shadow-md inline-block">
    <strong class="uppercase tracking-widest text-sm">Limited Release</strong><br>
    <span class="text-xs text-neutral-400">Drops like this don’t last long.</span>
</div>
<?php endif; ?>

<h1 class="text-5xl md:text-6xl font-oswald font-extrabold uppercase mb-2 text-white tracking-tight leading-none">
    <?= htmlspecialchars($beer['name']) ?>
</h1>

<p class="text-2xl text-jeff-gold font-serif italic mb-6 font-medium">
    "<?= htmlspecialchars($beer['tagline']) ?>"
</p>

<div class="flex flex-wrap gap-4 text-sm uppercase font-bold mb-8">
    <span class="bg-neutral-900 px-3 py-1 rounded-md text-neutral-300 border border-neutral-800 tracking-wider inline-flex items-center"><i data-lucide="beer" class="w-4 h-4 mr-2 text-jeff-gold"></i><?= htmlspecialchars($beer['style']) ?></span>
    <span class="bg-teal-950/30 px-3 py-1 rounded-md text-teal-400 border border-teal-900/30 tracking-wider inline-flex items-center"><i data-lucide="percent" class="w-4 h-4 mr-1"></i><?= number_format((float)$beer['abv'], 1) ?> ABV</span>
    <span class="bg-neutral-900 px-3 py-1 rounded-md text-neutral-400 border border-neutral-800 tracking-wider inline-flex items-center"><?= $beer['ibu'] ?? '30' ?> IBU</span>
</div>

<p class="mb-8 text-lg font-light leading-relaxed text-neutral-300 blockquote pl-4 border-l-2 border-neutral-800">
    <?= htmlspecialchars($beer['description']) ?>
</p>

<!-- Flavor Profile -->
<div class="mb-8">
<h4 class="text-xs uppercase font-bold text-neutral-500 mb-3 tracking-widest">Flavor Profile</h4>
<div class="flex flex-wrap gap-2">
<?php foreach ($beer['flavorProfile'] as $flavor): ?>
    <span class="px-4 py-1.5 bg-neutral-900 border border-neutral-800 text-neutral-300 text-xs uppercase font-bold rounded-full shadow-sm hover:text-white hover:border-neutral-700 transition">
        <?= htmlspecialchars($flavor) ?>
    </span>
<?php endforeach; ?>
</div>
</div>

<!-- Pairings -->
<div class="bg-neutral-900 text-white p-8 rounded-2xl mb-8 shadow-xl border border-neutral-850 relative overflow-hidden">
<div class="absolute top-0 right-0 p-4 opacity-10">
    <i data-lucide="utensils" class="w-24 h-24"></i>
</div>
<h4 class="text-jeff-gold font-oswald font-bold text-xl mb-4 tracking-wider uppercase relative z-10">Best Served With</h4>
<ul class="space-y-3 text-sm relative z-10 font-light text-neutral-300">
<?php foreach ($beer['pairing'] as $p): ?>
    <li class="flex items-center"><i data-lucide="check-circle-2" class="w-5 h-5 text-jeff-teal mr-3"></i> <?= htmlspecialchars($p) ?></li>
<?php endforeach; ?>
</ul>
</div>

<!-- BUY CTA -->
<div class="bg-neutral-900 p-6 rounded-2xl shadow-xl border border-neutral-800 mt-auto">
<div class="flex justify-between items-end mb-6">
    <span class="text-5xl font-oswald font-bold text-white leading-none">
        <span class="text-2xl text-jeff-gold">$</span><?= number_format($beer['price'], 2) ?>
    </span>
    <span class="text-teal-400 text-xs font-bold uppercase tracking-widest flex items-center bg-teal-950/30 px-3 py-1.5 rounded-full border border-teal-900/30">
        <i data-lucide="truck" class="w-4 h-4 mr-2"></i> Island-wide Delivery
    </span>
</div>

<div class="flex gap-4">
    <button class="add-to-cart-btn flex-1 bg-jeff-orange text-white py-4 rounded-xl font-bold hover:bg-orange-600 transition shadow hover:shadow-lg flex items-center justify-center gap-3 uppercase tracking-widest font-oswald text-lg" data-id="<?= htmlspecialchars($beer['id']) ?>">
        <i data-lucide="shopping-cart" class="w-5 h-5"></i> Add to Cooler
    </button>
    <button class="toggle-wishlist-btn bg-neutral-950 border border-neutral-800 text-neutral-500 p-4 rounded-xl hover:bg-neutral-900 hover:text-white transition focus:outline-none <?= isset($wishlist) && in_array($beer['id'], $wishlist) ? 'text-trini-red border-trini-red/30 bg-red-950/20' : '' ?>" data-id="<?= htmlspecialchars($beer['id']) ?>" title="Toggle Wishlist">
        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
    </button>
</div>
</div>

</div>
</div>

<!-- RECOMMENDATIONS -->
<section class="mt-32 border-t border-neutral-800 pt-16">
<h3 class="text-3xl font-oswald font-bold uppercase mb-8 text-white">
Because you like the <?= htmlspecialchars($beer['style'] ?? 'Vibe') ?>...
</h3>

<div class="grid md:grid-cols-3 gap-8">
<?php foreach ($recommendations as $rec): ?>
    <?php $beer = $rec; include __DIR__ . '/../components/product-card.php'; ?>
<?php endforeach; ?>
</div>
</section>

<!-- REVIEWS -->
<section class="mt-24 grid md:grid-cols-2 gap-16">

<div>
<h3 class="text-3xl font-oswald font-bold uppercase mb-8 text-white border-b-2 border-jeff-teal pb-2 inline-block">Trini Talk</h3>

<?php if (!empty($beer['reviews'])): ?>
    <div class="space-y-6">
    <?php foreach ($beer['reviews'] as $review): ?>
        <div class="bg-neutral-900 p-6 rounded-2xl border border-neutral-800 relative">
            <div class="absolute -left-3 top-6 bg-jeff-teal w-6 h-6 rounded-full flex items-center justify-center text-white shadow">
                <i data-lucide="quote" class="w-3 h-3"></i>
            </div>
            <div class="flex justify-between items-center mb-2">
                <strong class="font-oswald tracking-wide text-lg text-white"><?= htmlspecialchars($review['user']) ?></strong>
                <div class="flex text-yellow-400">
                    <?php for($i=0; $i<$review['rating']; $i++): ?>
                        <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <?php endfor; ?>
                    <?php for($i=$review['rating']; $i<5; $i++): ?>
                        <i data-lucide="star" class="w-4 h-4 text-neutral-800"></i>
                    <?php endfor; ?>
                </div>
            </div>
            <p class="font-light text-neutral-300">"<?= htmlspecialchars($review['comment']) ?>"</p>
        </div>
    <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="p-12 bg-neutral-900 border-2 border-dashed border-neutral-800 rounded-3xl text-center text-neutral-500">
        <i data-lucide="message-square" class="w-12 h-12 mx-auto mb-4 opacity-50 text-neutral-600"></i>
        <p class="font-light">No talk yet. Be the first to review!</p>
    </div>
<?php endif; ?>
</div>

<!-- REVIEW FORM -->
<div class="bg-neutral-900 p-10 rounded-3xl border border-neutral-850 h-fit sticky top-24 shadow-2xl">

<div class="flex items-center gap-3 mb-8">
    <div class="bg-jeff-orange p-3 rounded-full text-white">
        <i data-lucide="pen-tool" class="w-6 h-6"></i>
    </div>
    <h4 class="text-2xl font-oswald font-bold uppercase text-white">Drop a Review</h4>
</div>

<?php if (!$hasReviewed): ?>
<form method="POST">
    <input type="hidden" name="review_submit" value="1">

    <div class="mb-6">
        <label class="block mb-2 text-xs font-bold uppercase tracking-wider text-neutral-400">Rating</label>
        <div class="relative">
            <select name="rating" class="w-full p-4 rounded-xl border border-neutral-800 bg-black appearance-none focus:ring-2 focus:ring-jeff-teal focus:border-transparent outline-none font-semibold text-neutral-300">
                <option value="5">⭐⭐⭐⭐⭐ 5 - Excellent (Big Tune)</option>
                <option value="4">⭐⭐⭐⭐ 4 - Solid (Vibes)</option>
                <option value="3">⭐⭐⭐ 3 - Good (Aight)</option>
                <option value="2">⭐⭐ 2 - Meh (Passable)</option>
                <option value="1">⭐ 1 - Nah (Doh bother)</option>
            </select>
            <i data-lucide="chevron-down" class="w-5 h-5 absolute right-4 top-4 text-neutral-500 pointer-events-none"></i>
        </div>
    </div>

    <div class="mb-8">
        <label class="block mb-2 text-xs font-bold uppercase tracking-wider text-neutral-400">Comment</label>
        <textarea name="comment" required
            class="w-full p-4 rounded-xl border border-neutral-800 bg-black text-white focus:ring-2 focus:ring-jeff-teal focus:border-transparent outline-none font-light resize-none placeholder-neutral-700"
            rows="4"
            placeholder="How was the vibe?"></textarea>
    </div>

    <button type="submit"
        class="w-full bg-black border border-neutral-800 text-white py-4 rounded-xl font-bold hover:bg-jeff-teal hover:border-jeff-teal transition shadow-lg uppercase tracking-widest font-oswald flex justify-center items-center gap-2 group">
        Submit Review <i data-lucide="send" class="w-4 h-4 transform group-hover:-translate-y-1 group-hover:translate-x-1 transition-transform"></i>
    </button>
</form>

<?php else: ?>
<div class="text-center py-12 relative overflow-hidden rounded-xl">
    <div class="absolute inset-0 bg-green-950/20 opacity-50"></div>
    <div class="relative z-10 flex flex-col items-center">
        <div class="w-16 h-16 bg-green-950/40 text-green-400 border border-green-900/30 rounded-full flex items-center justify-center mb-4 shadow-sm">
            <i data-lucide="check" class="w-8 h-8"></i>
        </div>
        <div class="text-green-400 text-2xl font-oswald font-bold mb-2 uppercase tracking-wide">
            Thanks for the feedback!
        </div>
        <span class="inline-block bg-green-900/30 border border-green-800 text-green-400 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-widest shadow-sm">
            +50 Points <i data-lucide="coins" class="w-3 h-3 inline"></i>
        </span>
    </div>
</div>
<?php endif; ?>

</div>

</section>

</div>
</div>
