<?php
$imageError = empty($beer['image']);
$isAvailable = isset($beer['availability']) && $beer['availability'] !== 'CORE';
$inWishlist = isset($wishlist) && in_array($beer['id'], $wishlist);
?>

<div class="bg-neutral-900/40 border border-neutral-800 backdrop-blur-sm rounded-xl shadow-lg hover:shadow-2xl hover:border-neutral-700/80 transition-all duration-300 flex flex-col overflow-hidden group h-full relative">

  <div 
    class="h-64 overflow-hidden relative cursor-pointer bg-black/40 flex items-center justify-center p-4"
    onclick="window.location.href='?route=shop/detail&id=<?php echo urlencode($beer['id']); ?>'"
  >

    <?php if (!$imageError): ?>
      <img
        src="<?php echo htmlspecialchars($beer['image']); ?>"
        alt="<?php echo htmlspecialchars($beer['name']); ?>"
        class="w-full h-full object-contain group-hover:scale-105 transition duration-700 ease-in-out drop-shadow-md"
        loading="lazy"
      />
    <?php else: ?>
      <div class="text-neutral-500 flex flex-col items-center">
        <span class="text-xs uppercase font-bold tracking-wider">Image Unavailable</span>
      </div>
    <?php endif; ?>

    <!-- Availability Badge -->
    <?php if ($isAvailable): ?>
      <span class="absolute top-3 left-3 bg-red-700 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-md transform -rotate-2 z-10">
        <?php echo htmlspecialchars($beer['availability']); ?>
      </span>
    <?php endif; ?>

  </div>

  <div class="p-6 flex-1 flex flex-col relative">

    <h4 
      class="text-2xl font-bold text-[#f5f0e8] cursor-pointer hover:text-[var(--gold)] transition-colors mb-1 uppercase tracking-wide font-oswald"
      onclick="window.location.href='?route=shop/detail&id=<?php echo urlencode($beer['id']); ?>'"
    >
      <?php echo htmlspecialchars($beer['name']); ?>
    </h4>

    <p class="italic text-sm text-[var(--gold)] mb-3 font-medium flex-grow">
      "<?php echo htmlspecialchars(isset($beer['tagline']) ? $beer['tagline'] : $beer['description'] ?? ''); ?>"
    </p>

    <div class="mb-4">
      <span class="inline-block px-2.5 py-1 bg-neutral-800 border border-neutral-700/50 text-neutral-400 text-xs font-bold rounded uppercase tracking-wide">
        <?php echo htmlspecialchars($beer['style'] ?? 'Ale'); ?> • <?php echo htmlspecialchars($beer['abv'] ?? '5.0'); ?>%
      </span>
    </div>

    <div class="mt-auto pt-4 border-t border-neutral-800 flex items-center justify-between">

      <span class="text-2xl font-bold text-[#f5f0e8] font-oswald">
        <?php 
        echo "$" . number_format($beer['price'], 2); 
        ?>
      </span>

      <div class="flex items-center gap-2">
        <button 
          class="add-to-cart-btn bg-neutral-800 hover:bg-[var(--gold)] hover:text-neutral-900 border border-neutral-700 text-[#f5f0e8] px-5 py-2.5 rounded-full text-sm font-bold transition-all flex items-center gap-2 shadow-md active:scale-95"
          data-id="<?php echo htmlspecialchars($beer['id']); ?>"
        >
          Add 🛒
        </button>

        <button class="toggle-wishlist-btn p-2 rounded-full hover:bg-neutral-800 transition focus:outline-none <?= $inWishlist ? 'text-trini-red' : 'text-neutral-600 hover:text-neutral-400' ?>" data-id="<?= htmlspecialchars($beer['id']) ?>" title="Toggle Wishlist">
            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
        </button>
      </div>

    </div>

  </div>
</div>
