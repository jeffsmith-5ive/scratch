<div class="min-h-screen bg-gray-50 py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Header & Controls -->
    <div class="flex flex-col md:flex-row justify-between items-end mb-12 space-y-6 md:space-y-0">
      <div>
        <h1 class="text-5xl font-oswald font-extrabold text-jeff-dark mb-2 uppercase tracking-wide">The Cellar</h1>
        <p class="text-gray-500 text-lg font-light">Explore our full range of island-inspired brews.</p>
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
            class="pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-jeff-teal w-full sm:w-64 bg-white shadow-sm font-light text-sm"
          />
          <i data-lucide="search" class="w-5 h-5 text-gray-400 absolute left-3 top-3.5"></i>
        </div>

        <!-- Filter -->
        <select 
          name="style"
          class="py-3 px-4 pr-10 border border-gray-200 bg-white rounded-xl focus:ring-2 focus:ring-jeff-teal cursor-pointer shadow-sm font-semibold text-sm text-gray-700"
        >
          <?php foreach ($styles as $style): ?>
            <option value="<?= htmlspecialchars($style) ?>" <?= $selectedStyle === $style ? 'selected' : '' ?>>
              <?= htmlspecialchars($style) ?>
            </option>
          <?php endforeach; ?>
        </select>

        <button type="submit" class="bg-jeff-dark hover:bg-jeff-teal text-white px-6 py-3 rounded-xl font-bold transition shadow-md whitespace-nowrap">
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

        <div class="col-span-full text-center py-24 bg-white rounded-3xl shadow-sm border border-gray-100">
          <i data-lucide="beer-off" class="w-16 h-16 mx-auto mb-4 text-gray-300"></i>
          <p class="text-xl text-gray-500 font-light">No beers found matching your vibe.</p>
          <a href="?route=shop" class="mt-6 inline-flex text-jeff-orange font-bold font-oswald uppercase tracking-wider hover:text-jeff-gold hover:-translate-y-0.5 transition items-center gap-2">
             <i data-lucide="rotate-ccw" class="w-4 h-4"></i> Clear Filters
          </a>
        </div>

      <?php endif; ?>

    </div>

    <!-- Join the Krewe CTA -->
    <div class="bg-jeff-dark rounded-3xl p-8 md:p-12 relative overflow-hidden group hover:shadow-2xl transition duration-500 border border-jeff-teal/20">
      <div class="absolute inset-0 bg-gradient-to-r from-jeff-dark via-jeff-teal/80 to-jeff-dark opacity-50"></div>
      
      <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
        <div class="text-center md:text-left">
          <h2 class="text-4xl font-oswald font-bold text-white mb-3 uppercase tracking-wide decoration-jeff-gold decoration-4 underline-offset-4 underline">Not ready to commit?</h2>
          <p class="text-jeff-teal-100 max-w-xl text-lg font-light leading-relaxed">
            Join the <span class="text-jeff-gold font-semibold tracking-wide uppercase font-oswald">Jeff Brewery Krewe</span>. 
            Exclusive drops, members-only tastings, and endless Carnival vibes await.
          </p>
        </div>

        <a href="?route=krewe" class="bg-jeff-gold text-jeff-dark font-oswald font-bold uppercase tracking-widest px-10 py-5 rounded-xl hover:bg-white transition-all transform hover:scale-105 shadow-xl whitespace-nowrap animate-pulse">
          Join the Krewe <i data-lucide="arrow-right" class="w-5 h-5 inline mb-1"></i>
        </a>
      </div>
    </div>

  </div>
</div>
