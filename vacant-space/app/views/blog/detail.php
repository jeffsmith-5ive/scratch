<div class="min-h-screen pb-20 pt-10 animate-fade-in text-[#f5f0e8] relative z-0">
  <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Back Button -->
    <a 
      href="?route=blog"
      class="group inline-flex items-center text-neutral-400 hover:text-[var(--gold)] mb-8 transition font-bold text-sm uppercase tracking-wide"
    >
      <i data-lucide="arrow-left" class="h-4 w-4 mr-2 transform group-hover:-translate-x-1 transition"></i> Back to Blog
    </a>

    <!-- Header -->
    <header class="mb-10 text-center max-w-3xl mx-auto">
      <div class="flex items-center justify-center space-x-4 text-xs md:text-sm text-neutral-400 mb-6 font-bold uppercase tracking-wider">
         <span class="flex items-center"><i data-lucide="calendar" class="w-4 h-4 mr-2 text-[var(--gold)]"></i> <?= htmlspecialchars($post['date']) ?></span>
         <span class="w-1 h-1 bg-white/10 rounded-full"></span>
         <span class="flex items-center"><i data-lucide="user" class="w-4 h-4 mr-2 text-[var(--gold)]"></i> <?= htmlspecialchars($post['author']) ?></span>
         <span class="w-1 h-1 bg-white/10 rounded-full"></span>
         <span class="flex items-center"><i data-lucide="clock" class="w-4 h-4 mr-2 text-[var(--gold)]"></i> 5 min read</span>
      </div>
      <h1 class="text-4xl md:text-6xl font-oswald uppercase tracking-wide font-bold text-white mb-6 leading-tight">
          <?= htmlspecialchars($post['title']) ?>
      </h1>
    </header>

    <!-- Hero Image -->
    <div class="rounded-2xl overflow-hidden shadow-2xl mb-12 aspect-[16/9] relative group">
       <div class="absolute inset-0 bg-neutral-900/40 group-hover:bg-transparent transition duration-700 z-10"></div>
       <img src="<?= htmlspecialchars($post['image']) ?>" alt="<?= htmlspecialchars($post['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-1000 relative z-0" loading="lazy" />
    </div>

    <!-- Content -->
    <div class="prose prose-lg prose-invert max-w-none mx-auto text-neutral-300 leading-relaxed font-light">
       <p class="font-bold text-xl mb-8 leading-8 text-white border-l-4 border-[var(--gold)] pl-6">
          <?= htmlspecialchars($post['excerpt']) ?>
       </p>
       
       <div class="mb-6 space-y-6">
         <?php if ($post['content'] !== 'Full content placeholder...'): ?>
             <?= nl2br(htmlspecialchars($post['content'])) ?>
         <?php else: ?>
             <p>
                 Sitting on the veranda, watching the sun dip below the horizon, there's nothing quite like cracking open a cold one. But not just any beer—something that speaks to the soul of the island.
             </p>
             <p>
                 The history of brewing in the Caribbean is as rich and complex as a well-aged stout. It dates back to the colonial era, but it has evolved into something entirely unique. Local ingredients like cassava, sorrel, and ginger have found their way into the mash tun, creating flavor profiles you simply can't find anywhere else in the world.
             </p>
          <?php endif; ?>
       </div>
       
       <h3 class="text-3xl font-oswald uppercase font-bold text-white mt-12 mb-6 tracking-wide">The Caribbean Connection</h3>
       <p class="mb-6">
         Why do we love stouts in 30-degree weather? It's a question often asked by visitors. The answer lies in tradition and the belief in the "fortifying" properties of a good dark beer. It's not just a drink; it's a meal, a tonic, a vibe.
       </p>

       <blockquote class="text-2xl italic font-serif text-center text-[var(--gold)] my-16 px-8 leading-relaxed border-none">
          "Brewing is not just science, it's soul. It's the rhythm of the island captured in a bottle."
       </blockquote>

       <h3 class="text-3xl font-oswald uppercase font-bold text-white mt-12 mb-6 tracking-wide">Looking Forward</h3>
       <p class="mb-6">
         At Jeff Brewery, we are taking these traditions and remixing them for the modern palate. We respect the old school, but we aren't afraid to throw some new hops into the mix. Whether it's a Double IPA with mango or a Lager that tastes like a J'ouvert morning feels, we are pushing the boundaries of what Caribbean craft beer can be.
       </p>
       <p>
         So next time you take a sip, remember: you're tasting history, culture, and a little bit of rebellion. Cheers to that.
       </p>
    </div>

    <!-- Footer / Share -->
    <div class="border-t border-white/10 mt-16 pt-10 flex flex-col md:flex-row justify-between items-center gap-6">
       <div class="flex items-center space-x-4">
          <span class="font-bold text-white uppercase tracking-wide text-sm">Share this story</span>
          <div class="h-px w-12 bg-white/10"></div>
       </div>
       <div class="flex space-x-4">
          <button class="p-3 bg-white/5 border border-white/10 text-neutral-400 rounded-full hover:bg-[#1877F2] hover:text-white transition duration-300 group shadow-sm">
            <i data-lucide="facebook" class="w-5 h-5 fill-current"></i>
          </button>
          <button class="p-3 bg-white/5 border border-white/10 text-neutral-400 rounded-full hover:bg-[#1DA1F2] hover:text-white transition duration-300 group shadow-sm">
            <i data-lucide="twitter" class="w-5 h-5 fill-current"></i>
          </button>
          <button class="p-3 bg-white/5 border border-white/10 text-neutral-400 rounded-full hover:bg-[#0A66C2] hover:text-white transition duration-300 group shadow-sm">
            <i data-lucide="linkedin" class="w-5 h-5 fill-current"></i>
          </button>
     </div>
  </article>
</div>
