<style>
  .home-page-wrapper {
    --gold: #D4A017;
    --deep-gold: #A07010;
    --black: #0A0A0A;
    --off-white: #F5F0E8;
    --rust: #C04A1A;
    --teal: #0A7C6E;
    --cream: #FAF7F0;
    --dark-panel: #111111;
    
    background: var(--black);
    color: var(--off-white);
    font-family: 'DM Sans', sans-serif;
    overflow-x: hidden;
  }

  .home-page-wrapper .hero-section {
    position: relative;
    padding: 120px 40px;
    background: 
      radial-gradient(ellipse 60% 50% at 50% 30%, rgba(212,160,23,0.12) 0%, transparent 60%),
      radial-gradient(ellipse 80% 60% at 20% 70%, rgba(192,74,26,0.06) 0%, transparent 55%),
      var(--black);
    overflow: hidden;
  }

  .home-page-wrapper .hero-noise {
    position: absolute;
    inset: 0;
    opacity: 0.02;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
    background-size: 200px;
    pointer-events: none;
  }

  .home-page-wrapper .section-title {
    font-family: 'Bebas Neue', sans-serif;
    letter-spacing: 0.03em;
    text-transform: uppercase;
  }

  .home-page-wrapper .premium-btn-gold {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 16px 32px;
    background: var(--gold);
    color: var(--black);
    font-family: 'Bebas Neue', sans-serif;
    font-size: 16px;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    transition: all 0.3s ease;
    border-radius: 2px;
    text-decoration: none;
  }

  .home-page-wrapper .premium-btn-gold:hover {
    background: var(--off-white);
    transform: translateY(-2px);
  }

  .home-page-wrapper .premium-btn-outline {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 16px 32px;
    border: 1px solid rgba(245, 240, 232, 0.3);
    color: var(--off-white);
    font-family: 'Bebas Neue', sans-serif;
    font-size: 16px;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    transition: all 0.3s ease;
    border-radius: 2px;
    text-decoration: none;
  }

  .home-page-wrapper .premium-btn-outline:hover {
    border-color: var(--gold);
    color: var(--gold);
    transform: translateY(-2px);
  }

  .home-page-wrapper .featured-brews {
    background: var(--black);
    border-top: 1px solid rgba(255, 255, 255, 0.05);
  }

  .home-page-wrapper .krewe-signup-section {
    background: var(--dark-panel);
    border-top: 1px solid rgba(255, 255, 255, 0.05);
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
  }

  .home-page-wrapper .form-input {
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(212, 160, 23, 0.2);
    color: var(--off-white);
    transition: all 0.3s ease;
  }

  .home-page-wrapper .form-input:focus {
    border-color: var(--gold);
    outline: none;
    box-shadow: 0 0 0 1px var(--gold);
  }
</style>

<div class="home-page-wrapper flex flex-col">

<!-- WELCOME ANIMATION -->
<div 
    id="welcome-animation"
    class="hidden fixed inset-0 z-[100] bg-neutral-900 flex flex-col items-center justify-center transition-opacity duration-500 ease-in-out opacity-100"
>
    <div class="mt-8 text-center overflow-hidden">
        <h1 
            id="welcome-title"
            class="font-display text-5xl font-bold text-white uppercase tracking-widest transform transition-all duration-700 translate-y-full opacity-0 font-oswald"
            style="transition-delay: 200ms;"
        >
            Jeff Brewery
        </h1>
        <div 
            id="welcome-bar"
            class="h-1 w-0 bg-jeff-orange mx-auto mt-4 rounded-full transform transition-all duration-700 opacity-0"
            style="transition-delay: 500ms;"
        ></div>
        <p 
            id="welcome-sub"
            class="mt-4 text-jeff-gold font-bold tracking-[0.3em] text-sm uppercase transform transition-all duration-700 translate-y-4 opacity-0"
            style="transition-delay: 300ms;"
        >
            Trinidad &amp; Tobago
        </p>
    </div>
</div>

<!-- HERO SECTION -->
<section class="hero-section text-center py-36 px-4 relative overflow-hidden">
  <div class="hero-noise"></div>
  <div class="relative z-10 max-w-5xl mx-auto">
    <span class="inline-block py-1 px-3 border border-[var(--gold)] text-[var(--gold)] text-[10px] font-bold uppercase tracking-[0.2em] mb-6 rounded-full font-sans">
      Est. 2026 • Port of Spain
    </span>

    <h2 class="text-6xl md:text-8xl font-bold mb-6 tracking-tight leading-none section-title">
      REAL ISLAND <span class="text-[var(--gold)]">VIBES.</span>
    </h2>

    <p class="text-lg md:text-xl font-light max-w-2xl mx-auto mb-10 text-neutral-400">
      Craft beers built from the soil of Trinidad. <br/>
      <span class="italic text-[var(--gold)] font-serif">Sip slow, lime hard.</span>
    </p>

    <div class="flex flex-col sm:flex-row justify-center gap-4">
      <a href="?route=shop" class="premium-btn-gold">
        Shop de Vibes
      </a>

      <a href="#krewe-signup" class="premium-btn-outline">
        Join the Krewe
      </a>
    </div>
  </div>
</section>

<!-- FEATURED BEERS -->
<section class="featured-brews py-24 px-4">
  <div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
      <div>
        <span class="text-[var(--gold)] font-bold uppercase text-[10px] tracking-[0.3em] mb-2 block">Our Lineup</span>
        <h3 class="text-4xl font-bold flex items-center section-title">
          <i data-lucide="music" class="w-8 h-8 mr-3 text-[var(--gold)]"></i>
          Core Brews & Big Tunes
        </h3>
      </div>

      <a href="?route=shop" class="text-[var(--gold)] hover:text-[var(--off-white)] font-bold uppercase text-xs tracking-wider transition flex items-center gap-1">
        See All Brews <i data-lucide="arrow-right" class="w-4 h-4"></i>
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
<section class="py-24 px-4 bg-neutral-950 border-t border-neutral-900">
  <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

    <div>
      <span class="text-[var(--gold)] font-bold uppercase text-[10px] tracking-[0.3em] mb-2 block">
        Our Philosophy
      </span>

      <h3 class="text-4xl md:text-6xl font-bold mb-6 section-title leading-tight">
        More Than Beer.<br/> It’s <span class="text-[var(--gold)]">Culture</span>.
      </h3>

      <p class="text-neutral-400 text-lg mb-8 border-l-4 border-[var(--rust)] pl-6 italic font-light font-serif">
        "We doh just brew beer; we bottling the feeling of J'ouvert morning."
      </p>

      <a href="?route=about" class="inline-flex items-center text-[var(--gold)] hover:text-white font-bold uppercase text-xs tracking-widest transition group">
        <span class="border-b border-[var(--gold)] group-hover:border-white pb-1 mr-2">Read Our Story</span>
        <i data-lucide="arrow-right" class="w-4 h-4 transform group-hover:translate-x-1 transition-transform"></i>
      </a>
    </div>

    <div class="relative h-96 rounded-2xl overflow-hidden shadow-2xl transform rotate-1 hover:rotate-0 transition duration-700 border border-neutral-800 group">
      <!-- Woodbrook Image -->
      <img 
        src="/public/images/woodbrook.jpg" 
        alt="Brewing Culture - Straight outta Woodbrook" 
        class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition duration-700"
      />
      <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-transparent to-transparent opacity-90"></div>
      <div class="absolute bottom-6 left-6 right-6">
         <!-- Glassmorphism effect on text container -->
         <div class="backdrop-blur-md bg-black/40 border border-white/10 p-4 rounded-xl inline-block">
            <p class="font-hand text-2xl text-white transform -rotate-1">Straight outta Woodbrook</p>
         </div>
      </div>
    </div>

  </div>
</section>

<!-- JOIN KREWE -->
<section id="krewe-signup" class="krewe-signup-section py-24 text-center px-4 relative overflow-hidden">
  <div class="relative z-10 max-w-3xl mx-auto">
    <i data-lucide="star" class="w-10 h-10 text-[var(--gold)] mx-auto mb-6 animate-pulse"></i>

    <h2 class="text-4xl font-bold mb-2 uppercase section-title tracking-wider text-[#f5f0e8]">
      Join de JeffBrew Krewe
    </h2>

    <p class="text-neutral-400 mb-10 text-base font-light">
      Early drops &bull; Limited releases &bull; Members-only access
    </p>

    <div class="flex flex-col sm:flex-row justify-center gap-4 max-w-md mx-auto">
      <input type="email"
             placeholder="Enter your email"
             class="flex-1 px-6 py-4 rounded-full form-input focus:outline-none text-sm">
      <button class="px-8 py-4 bg-[var(--gold)] text-black font-bold rounded-full hover:bg-[var(--off-white)] transition shadow-lg whitespace-nowrap uppercase font-sans tracking-widest text-xs">
        Sign Me Up
      </button>
    </div>
  </div>
</section>

</div>

<!-- WELCOME ANIMATION SCRIPT -->
<script>
document.addEventListener("DOMContentLoaded", function() {
  if (window.location.search.includes("clear_welcome")) {
    sessionStorage.removeItem("jeff_welcome_shown");
  }

  if (!sessionStorage.getItem("jeff_welcome_shown")) {
    var el = document.getElementById('welcome-animation');
    if (el) el.classList.remove('hidden');

    // Stage 1 — Reveal (100ms)
    var t1 = setTimeout(function() {
        var title = document.getElementById('welcome-title');
        if (title) {
            title.classList.remove('translate-y-full', 'opacity-0');
            title.classList.add('translate-y-0', 'opacity-100');
        }
        
        var bar = document.getElementById('welcome-bar');
        if (bar) {
            bar.classList.remove('w-0', 'opacity-0');
            bar.classList.add('w-24', 'opacity-100');
        }
        
        var sub = document.getElementById('welcome-sub');
        if (sub) {
            sub.classList.remove('translate-y-4', 'opacity-0');
            sub.classList.add('translate-y-0', 'opacity-100');
        }
    }, 100);
    
    // Stage 2 — Fade out (2000ms)
    var t2 = setTimeout(function() {
        var el = document.getElementById('welcome-animation');
        if (el) {
            el.classList.remove('opacity-100');
            el.classList.add('opacity-0', 'pointer-events-none');
        }
    }, 2000);
    
    // Stage 3 — Remove from DOM (2500ms)
    var t3 = setTimeout(function() {
        var el = document.getElementById('welcome-animation');
        if (el) el.remove();
    }, 2500);

    sessionStorage.setItem("jeff_welcome_shown", "true");
  }
});
</script>
