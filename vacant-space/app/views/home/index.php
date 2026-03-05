<div class="flex flex-col bg-carnival-pattern">

<!-- WELCOME ANIMATION -->
<div id="welcome-screen" class="hidden fixed inset-0 z-[100] bg-neutral-900 flex flex-col items-center justify-center transition-opacity duration-500">

  <div class="relative">
    <div id="welcome-circle" class="absolute inset-0 bg-orange-500 rounded-full opacity-20 blur-xl scale-50 transition-all duration-1000"></div>
    <i data-lucide="beer" class="relative z-10 w-24 h-24 text-white scale-50 opacity-0 transition-all duration-700"></i>
  </div>

  <div class="mt-8 text-center">
    <h1 id="welcome-title" class="font-bold text-5xl text-white uppercase tracking-widest translate-y-full opacity-0 transition-all duration-700 font-oswald">
      JeffBrew
    </h1>
    <p id="welcome-sub" class="mt-4 text-yellow-400 font-bold tracking-[0.3em] text-sm uppercase translate-y-4 opacity-0 transition-all duration-700">
      Trinidad & Tobago
    </p>
  </div>
</div>

<!-- HERO SECTION -->
<section class="bg-gradient-to-br from-teal-700 via-neutral-900 to-red-700 text-white text-center py-36 px-4 relative overflow-hidden">

  <div class="relative z-10 max-w-5xl mx-auto">
    <span class="inline-block py-1 px-3 border border-yellow-400 text-yellow-400 text-xs font-bold uppercase mb-4 rounded-full">
      Est. 2026 • Port of Spain
    </span>

    <h2 class="text-6xl md:text-8xl font-extrabold mb-6 tracking-tight leading-none font-oswald uppercase">
      REAL <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-500">ISLAND</span> VIBES.
    </h2>

    <p class="text-xl md:text-2xl font-light max-w-2xl mx-auto mb-10">
      Craft beers built from the soil of Trinidad. <br/>
      <span class="italic text-yellow-400">Sip slow, lime hard.</span>
    </p>

    <div class="flex flex-col sm:flex-row justify-center gap-4">
      <a href="?route=shop" class="px-10 py-4 bg-orange-500 text-white font-bold text-lg rounded-full hover:bg-orange-600 transition shadow-xl uppercase font-oswald tracking-wide">
        Shop de Vibes
      </a>

      <a href="#krewe-signup" class="px-10 py-4 border-2 border-white text-white font-bold text-lg rounded-full hover:bg-white hover:text-neutral-900 transition uppercase font-oswald tracking-wide">
        Join the Krewe
      </a>
    </div>
  </div>
</section>

<!-- FEATURED BEERS -->
<section class="py-24 px-4 bg-gray-50">
  <div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
      <h3 class="text-4xl font-bold text-neutral-900 flex items-center font-oswald uppercase">
        <i data-lucide="music" class="w-8 h-8 mr-3 text-orange-500"></i>
        Core Brews & Big Tunes
      </h3>

      <a href="?route=shop" class="text-orange-500 font-bold uppercase text-sm hover:text-orange-600 transition flex items-center">
        See All Brews <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
      </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php foreach ($featuredBeers as $beer): ?>
        <?php include __DIR__ . '/../components/product-card.php'; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- BRAND STORY -->
<section class="bg-neutral-900 text-white py-24 px-4 border-t-8 border-yellow-400">
  <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

    <div>
      <span class="text-orange-500 font-bold uppercase text-sm mb-2 block tracking-widest">
        Our Philosophy
      </span>

      <h3 class="text-4xl md:text-6xl font-bold mb-6 font-oswald uppercase leading-tight">
        More Than Beer.<br/> It’s <span class="text-yellow-400">Culture</span>.
      </h3>

      <p class="text-neutral-300 text-lg mb-8 border-l-4 border-red-600 pl-6 italic font-light">
        "We doh just brew beer; we bottling the feeling of J'ouvert morning."
      </p>

      <a href="?route=about" class="inline-flex items-center text-orange-500 font-bold uppercase text-sm hover:text-yellow-400 transition group">
        <span class="border-b-2 border-orange-500 group-hover:border-yellow-400 pb-1 mr-2">Read Our Story</span>
        <i data-lucide="arrow-right" class="w-4 h-4 transform group-hover:translate-x-1 transition-transform"></i>
      </a>
    </div>

    <div class="relative h-96 rounded-2xl overflow-hidden shadow-2xl transform rotate-2 hover:rotate-0 transition duration-700 border-4 border-white/10 group">
      <!-- Woodbrook Image - removed grayscale, improved transition -->
      <img 
        src="/public/images/woodbrook.jpg" 
        alt="Brewing Culture - Straight outta Woodbrook" 
        class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-110 transition duration-700"
      />
      <div class="absolute inset-0 bg-gradient-to-t from-neutral-900 via-transparent to-transparent opacity-80"></div>
      <div class="absolute bottom-6 left-6 right-6">
         <!-- Glassmorphism effect on text container -->
         <div class="backdrop-blur-md bg-white/10 border border-white/20 p-4 rounded-xl inline-block">
            <p class="font-hand text-2xl text-white transform -rotate-2">Straight outta Woodbrook</p>
         </div>
      </div>
    </div>

  </div>
</section>

<!-- JOIN KREWE -->
<section id="krewe-signup" class="py-24 bg-yellow-100 text-center px-4">
  <div class="max-w-3xl mx-auto">
    <i data-lucide="star" class="w-12 h-12 text-yellow-500 mx-auto mb-6"></i>

    <h2 class="text-4xl font-bold text-neutral-900 mb-2 uppercase font-oswald tracking-wide">
      Join de JeffBrew Krewe
    </h2>

    <p class="text-neutral-600 mb-10 text-lg font-light">
      Early drops &bull; Limited releases &bull; Members-only access
    </p>

    <div class="flex flex-col sm:flex-row justify-center gap-4 max-w-md mx-auto">
      <input type="email"
             placeholder="Enter your email"
             class="flex-1 px-6 py-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
      <button class="px-8 py-4 bg-neutral-900 text-white font-bold rounded-full hover:bg-orange-500 transition shadow-lg whitespace-nowrap uppercase font-oswald tracking-wide">
        Sign Me Up
      </button>
    </div>
  </div>
</section>

</div>

<!-- WELCOME ANIMATION SCRIPT -->
<script>
document.addEventListener("DOMContentLoaded", function() {

  if (!sessionStorage.getItem("jeff_welcome_shown")) {

    const screen = document.getElementById("welcome-screen");
    const circle = document.getElementById("welcome-circle");
    const icon = screen.querySelector('[data-lucide="beer"]');
    const title = document.getElementById("welcome-title");
    const sub = document.getElementById("welcome-sub");

    screen.classList.remove("hidden");

    setTimeout(() => {
      circle.classList.replace("scale-50","scale-150");
      icon.classList.remove("scale-50","opacity-0");
      icon.classList.add("scale-100","opacity-100");
      title.classList.remove("translate-y-full","opacity-0");
      sub.classList.remove("translate-y-4","opacity-0");
    }, 100);

    setTimeout(() => {
      screen.classList.add("opacity-0");
    }, 2000);

    setTimeout(() => {
      screen.remove();
    }, 2500);

    sessionStorage.setItem("jeff_welcome_shown","true");
  }

  lucide.createIcons();
});
</script>
