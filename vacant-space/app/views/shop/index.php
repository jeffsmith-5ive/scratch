<div class="min-h-screen py-16 bg-black/20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Header & Controls -->
    <div class="flex flex-col md:flex-row justify-between items-end mb-12 space-y-6 md:space-y-0">
      <div>
        <span class="text-[var(--gold)] font-bold uppercase text-[10px] tracking-[0.3em] mb-2 block">Jeff Brewery</span>
        <h1 class="text-5xl font-display font-bold text-[#f5f0e8] mb-2 uppercase tracking-wide">The Cellar</h1>
        <p class="text-neutral-400 text-lg font-light">Explore our full range of island-inspired brews.</p>
      </div>

      <!-- Search & Filter Form -->
      <form method="GET" class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 w-full md:w-auto">
        
        <input type="hidden" name="route" value="shop">

        <!-- Search -->
        <div class="relative">
          <input 
            type="text" 
            name="search"
            placeholder="Search brews..."
            value="<?= htmlspecialchars($searchTerm) ?>"
            class="pl-10 pr-4 py-3 border border-neutral-800 rounded-xl focus:ring-1 focus:ring-[var(--gold)] focus:border-[var(--gold)] w-full sm:w-64 bg-neutral-900 text-[#f5f0e8] shadow-md font-light text-sm placeholder-neutral-500"
          />
          <i data-lucide="search" class="w-4.5 h-4.5 text-neutral-500 absolute left-3.5 top-3.5"></i>
        </div>

        <!-- Filter -->
        <select 
          name="style"
          class="py-3 px-4 pr-10 border border-neutral-800 bg-neutral-900 text-neutral-300 rounded-xl focus:ring-1 focus:ring-[var(--gold)] focus:border-[var(--gold)] cursor-pointer shadow-md font-semibold text-sm"
        >
          <?php foreach ($styles as $style): ?>
            <option value="<?= htmlspecialchars($style) ?>" <?= $selectedStyle === $style ? 'selected' : '' ?>>
              <?= htmlspecialchars($style) ?>
            </option>
          <?php endforeach; ?>
        </select>

        <button type="submit" class="bg-neutral-800 hover:bg-[var(--gold)] hover:text-black border border-neutral-700 text-white px-6 py-3 rounded-xl font-bold font-sans text-xs uppercase tracking-widest transition shadow-md whitespace-nowrap">
          Apply Filters
        </button>
      </form>
    </div>

    <!-- Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mb-16">

      <?php if (count($beers) > 0): ?>
        
        <?php foreach ($beers as $beer): ?>
          
          <?php include __DIR__ . '/../components/product-card.php'; ?>

        <?php endforeach; ?>

      <?php else: ?>

        <div class="col-span-full text-center py-24 bg-neutral-900/40 rounded-3xl shadow-sm border border-neutral-800 backdrop-blur-sm">
          <i data-lucide="beer-off" class="w-16 h-16 mx-auto mb-4 text-neutral-600"></i>
          <p class="text-xl text-neutral-400 font-light">No beers found matching your vibe.</p>
          <a href="?route=shop" class="mt-6 inline-flex text-[var(--gold)] font-sans uppercase tracking-widest text-xs hover:text-white hover:-translate-y-0.5 transition items-center gap-2">
             <i data-lucide="rotate-ccw" class="w-4 h-4"></i> Clear Filters
          </a>
        </div>

      <?php endif; ?>

    </div>

    <!-- Join the Krewe CTA -->
    <div class="bg-neutral-900/60 backdrop-blur-sm rounded-3xl p-8 md:p-12 relative overflow-hidden group hover:shadow-2xl transition duration-500 border border-neutral-800">
      <div class="absolute inset-0 bg-gradient-to-r from-neutral-900/50 via-[var(--teal)]/10 to-neutral-900/50 opacity-50"></div>
      
      <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
        <div class="text-center md:text-left">
          <h2 class="text-4xl font-display font-bold text-[#f5f0e8] mb-3 uppercase tracking-wide">Not ready to commit?</h2>
          <p class="text-neutral-400 max-w-xl text-lg font-light leading-relaxed">
            Join the <span class="text-[var(--gold)] font-semibold tracking-wide uppercase font-display">Jeff Brewery Krewe</span>. 
            Exclusive drops, members-only tastings, and endless Carnival vibes await.
          </p>
        </div>

        <a href="?route=krewe" class="bg-[var(--gold)] text-black font-sans font-bold uppercase tracking-widest text-xs px-10 py-5 rounded-xl hover:bg-[var(--off-white)] transition-all transform hover:scale-105 shadow-xl whitespace-nowrap">
          Join the Krewe <i data-lucide="arrow-right" class="w-4 h-4 inline mb-0.5 ml-1"></i>
        </a>
      </div>
    </div>

  </div>
</div>
