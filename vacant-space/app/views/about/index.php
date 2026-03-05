<div class="bg-white min-h-screen pb-20">
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
      <h1 class="font-oswald font-bold text-6xl mb-4 drop-shadow-lg uppercase tracking-wide">Our Story</h1>
      <p class="text-2xl font-light max-w-2xl mx-auto drop-shadow-md">From a backyard in Port of Spain to the world.</p>
    </div>
  </div>

  <!-- Content -->
  <div class="max-w-5xl mx-auto px-4 py-20 space-y-20">
    <section>
      <h2 class="text-4xl font-oswald font-bold text-neutral-900 mb-6 uppercase border-b-2 border-jeff-teal inline-block pb-2">The Beginning</h2>
      <p class="text-gray-600 leading-relaxed text-xl font-light">
        Jeff Brewery Industries started in 2026 when our founder, Jeff, decided that the Caribbean heat needed more than just the standard commercial lagers. Inspired by the rich culinary history of Trinidad & Tobago—the spices, the fruits, the rhythm—he began experimenting with home brewing kits in his garage in Woodbrook.
      </p>
    </section>
    
    <section class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div>
             <img src="https://picsum.photos/600/400?random=brewing" alt="Brewing Process" class="rounded-2xl shadow-xl w-full" />
        </div>
        <div>
            <h2 class="text-4xl font-oswald font-bold text-neutral-900 mb-6 uppercase border-b-2 border-jeff-teal inline-block pb-2">Our Philosophy</h2>
            <p class="text-gray-600 leading-relaxed text-lg font-light">
                We believe beer is a storyteller. Every sip should transport you to a moment: a lime on the avenue, a quiet evening on the beach, or the chaotic joy of J'ouvert. We use local ingredients like sorrel, passion fruit, and cocoa to ensure every batch has a true Trinbagonian soul.
            </p>
        </div>
    </section>

    <section class="bg-gray-50 p-12 rounded-3xl border border-gray-100 shadow-sm relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-jeff-teal via-jeff-orange to-jeff-gold"></div>
        <h2 class="text-4xl font-oswald font-bold text-neutral-900 mb-12 text-center uppercase tracking-wide">Meet the Team</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-10 text-center relative z-10">
            <?php
            $team = [
                ['name' => 'Jeff', 'role' => 'Head Brewer', 'img' => 'https://picsum.photos/150/150?random=jeff'],
                ['name' => 'Maria', 'role' => 'Flavor Alchemist', 'img' => 'https://picsum.photos/150/150?random=maria'],
                ['name' => 'Marcus', 'role' => 'Vibes Manager', 'img' => 'https://picsum.photos/150/150?random=marcus'],
            ];
            foreach ($team as $member):
            ?>
                <div class="flex flex-col items-center group">
                    <div class="w-32 h-32 rounded-full mb-6 relative">
                        <div class="absolute inset-0 bg-jeff-teal rounded-full transform scale-105 group-hover:scale-110 transition-transform duration-300 opacity-50"></div>
                        <img src="<?= htmlspecialchars($member['img']) ?>" alt="<?= htmlspecialchars($member['name']) ?>" class="w-full h-full rounded-full object-cover border-4 border-white relative z-10 shadow-lg" />
                    </div>
                    <h3 class="font-bold text-2xl text-neutral-900 font-oswald uppercase"><?= htmlspecialchars($member['name']) ?></h3>
                    <p class="text-jeff-orange font-bold text-sm uppercase tracking-widest mt-1"><?= htmlspecialchars($member['role']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
  </div>
</div>
