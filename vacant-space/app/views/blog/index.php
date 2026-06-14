<div class="min-h-screen py-16 text-[#f5f0e8] animate-fade-in">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <h1 class="text-4xl md:text-5xl font-oswald font-bold text-white mb-4 uppercase tracking-wide">Brewery Stories</h1>
      <p class="text-xl text-neutral-400 max-w-2xl mx-auto font-light">
        Deep dives into Caribbean culture, brewing techniques, and the people behind the pints.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
      <?php foreach ($posts as $post): ?>
        <div 
            class="flex flex-col rounded-2xl overflow-hidden shadow-2xl transition duration-500 cursor-pointer group bg-[#111111] border border-white/10 hover:border-[var(--gold)]/30 backdrop-blur-sm"
            onclick="window.location.href='?route=blog/detail&id=<?= urlencode($post['id']) ?>'"
        >
          <div class="h-72 overflow-hidden relative">
            <img src="<?= htmlspecialchars($post['image']) ?>" alt="<?= htmlspecialchars($post['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700" loading="lazy" />
            <div class="absolute inset-0 bg-neutral-900/40 group-hover:bg-neutral-900/10 transition duration-500"></div>
            <div class="absolute bottom-4 left-4 right-4 flex justify-between items-end opacity-0 group-hover:opacity-100 transition duration-500 translate-y-2 group-hover:translate-y-0">
               <span class="bg-[var(--gold)] text-black text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">Read Story</span>
            </div>
          </div>
          <div class="p-8 flex-1 flex flex-col">
            <div class="flex items-center text-xs text-neutral-400 mb-4 uppercase tracking-wider font-bold">
              <span class="text-[var(--gold)] flex items-center"><i data-lucide="user" class="w-3 h-3 mr-1"></i> <?= htmlspecialchars($post['author']) ?></span>
              <span class="mx-2 text-white/10">•</span>
              <span><?= htmlspecialchars($post['date']) ?></span>
            </div>
            <h2 class="text-2xl font-bold text-white mb-4 font-oswald uppercase tracking-tight group-hover:text-[var(--gold)] transition-colors leading-tight"><?= htmlspecialchars($post['title']) ?></h2>
            <p class="text-neutral-300 mb-8 flex-1 leading-relaxed line-clamp-3 font-light"><?= htmlspecialchars($post['excerpt']) ?></p>
            
            <div class="mt-auto pt-6 border-t border-white/10 flex items-center justify-between">
              <span class="text-[var(--gold)] font-bold transition flex items-center uppercase text-xs tracking-widest group-hover:text-white">
                Read Full Story <i data-lucide="arrow-right" class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition"></i>
              </span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

