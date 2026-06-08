<div class="bg-white min-h-screen">
  <!-- Hero -->
  <div class="relative h-96 flex items-center justify-center overflow-hidden">
    <img 
      src="public/images/portofspain.jpg" 
      alt="Port of Spain Skyline" 
      class="absolute inset-0 w-full h-full object-cover" 
    />
    <!-- Reduced opacity to ensure the image is visible -->
    <div class="absolute inset-0 bg-neutral-900/50"></div>
    <div class="relative z-10 text-center text-white px-4">
      <h1 class="font-display font-bold text-5xl mb-4 drop-shadow-lg uppercase tracking-wide">Our Story</h1>
      <p class="text-xl font-light max-w-2xl mx-auto drop-shadow-md">From a backyard in Port of Spain to the world.</p>
    </div>
  </div>

  <!-- Content -->
  <div class="max-w-4xl mx-auto px-4 py-16 space-y-12">
    <section>
      <h2 class="text-3xl font-display font-bold text-jeff-dark mb-4">The Beginning</h2>
      <p class="text-gray-600 leading-relaxed text-lg">
        Jeff Brewery Industries started in 2026 when our founder, Jeff, decided that the Caribbean heat needed more than just the standard commercial lagers. Inspired by the rich culinary history of Trinidad & Tobago—the spices, the fruits, the rhythm—he began experimenting with home brewing kits in his garage in Woodbrook.
      </p>
    </section>
    
    <section class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <div>
             <img src="https://picsum.photos/600/400?random=brewing" alt="Brewing Process" class="rounded-xl shadow-lg w-full" />
        </div>
        <div>
            <h2 class="text-3xl font-display font-bold text-jeff-dark mb-4">Our Philosophy</h2>
            <p class="text-gray-600 leading-relaxed text-lg">
                We believe beer is a storyteller. Every sip should transport you to a moment: a lime on the avenue, a quiet evening on the beach, or the chaotic joy of J'ouvert. We use local ingredients like sorrel, passion fruit, and cocoa to ensure every batch has a true Trinbagonian soul.
            </p>
        </div>
    </section>

    <section class="bg-gradient-to-br from-jeff-orange/10 to-jeff-teal/10 p-8 rounded-2xl border border-jeff-orange/20">
        <h2 class="text-3xl font-display font-bold text-jeff-dark mb-4">Brewer Jeff: The Digital Guide</h2>
        <p class="text-gray-600 leading-relaxed text-lg mb-6">
            As our community grew, so did the questions about our meticulous brewing process. To share our knowledge, we created <strong>Brewer Jeff</strong>—an interactive, AI-powered extension of our founder. Powered by TriniChat, Brewer Jeff lives right here on our website to guide you through our craft, recommend the perfect pint, and share the secrets of the <a href="?route=brewerGuide" class="text-jeff-orange font-bold hover:underline">Brewer Guide</a>.
        </p>
        <div class="flex flex-wrap gap-4">
            <a href="?route=brewerGuide" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-bold rounded-xl text-white bg-jeff-orange hover:bg-orange-600 transition-colors shadow-md">
                Explore the Brewer Guide
            </a>
            <button onclick="window.dispatchEvent(new CustomEvent('open-trinichat'))" class="inline-flex items-center justify-center px-6 py-3 border-2 border-jeff-teal text-base font-bold rounded-xl text-jeff-teal hover:bg-jeff-teal hover:text-white transition-colors shadow-sm">
                Chat with Brewer Jeff
            </button>
        </div>
    </section>

    <section class="bg-jeff-sand p-8 rounded-2xl">
        <h2 class="text-3xl font-display font-bold text-jeff-dark mb-6 text-center">Meet the Team</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
            <?php
            $team = [
                ['name' => 'Jeff', 'role' => 'Head Brewer', 'img' => 'https://picsum.photos/150/150?random=jeff'],
                ['name' => 'Maria', 'role' => 'Flavor Alchemist', 'img' => 'https://picsum.photos/150/150?random=maria'],
                ['name' => 'Marcus', 'role' => 'Vibes Manager', 'img' => 'https://picsum.photos/150/150?random=marcus'],
            ];
            foreach ($team as $member):
            ?>
                <div class="flex flex-col items-center">
                    <img src="<?= htmlspecialchars($member['img']) ?>" alt="<?= htmlspecialchars($member['name']) ?>" class="w-24 h-24 rounded-full mb-4 object-cover border-4 border-jeff-teal shadow-md" />
                    <h3 class="font-bold text-lg"><?= htmlspecialchars($member['name']) ?></h3>
                    <p class="text-jeff-orange text-sm uppercase tracking-wide"><?= htmlspecialchars($member['role']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
  </div>
</div>
