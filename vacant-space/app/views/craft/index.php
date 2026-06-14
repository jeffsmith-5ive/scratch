<!-- Include Chart.js for the Radar Chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="min-h-screen bg-[#0A0A0A]" id="craft-app">
   
   <!-- 1. HERO SECTION -->
   <section class="relative h-[80vh] flex items-center justify-center overflow-hidden bg-neutral-950">
      <div class="absolute inset-0 opacity-30">
         <img src="https://images.unsplash.com/photo-1532635241-17e820acc59f?auto=format&fit=crop&w=1600&q=80" class="w-full h-full object-cover" alt="Brewing" />
      </div>
      <div class="absolute inset-0 bg-gradient-to-t from-[#0A0A0A] via-transparent to-black/80"></div>
      
      <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
         <div class="inline-block border border-jeff-gold text-jeff-gold px-4 py-1 rounded-full text-xs font-bold uppercase tracking-[0.2em] mb-6 animate-fade-in-up">
            Jeff Brewery Lab
         </div>
         <h1 class="text-5xl md:text-7xl font-oswald font-bold text-white mb-6 leading-tight drop-shadow-xl uppercase">
            Become the <span class="text-transparent bg-clip-text bg-gradient-to-r from-jeff-orange to-jeff-gold">Brewmaster</span>.
         </h1>
         <p class="text-xl md:text-2xl text-neutral-300 font-light mb-10 max-w-2xl mx-auto">
            Craft your own Trinbagonian Lager from scratch. We brew it, bottle it, and deliver the vibes to your door.
         </p>
         <button 
            onclick="document.getElementById('builder-section').scrollIntoView({ behavior: 'smooth' })"
            class="bg-jeff-orange text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-orange-600 transition shadow-[0_0_30px_rgba(255,111,0,0.4)] flex items-center mx-auto uppercase tracking-wide group"
         >
            Start Brewing <i data-lucide="arrow-down" class="ml-2 w-5 h-5 group-hover:animate-bounce"></i>
         </button>
      </div>
   </section>

   <!-- 2. RECIPE BUILDER -->
   <div id="builder-section" class="py-20 px-4 md:px-8 max-w-7xl mx-auto">
     <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        
        <!-- LEFT PANE: CONTROLS -->
        <div class="lg:col-span-7 space-y-8">
           <div class="bg-neutral-900 p-8 rounded-3xl border border-neutral-800 shadow-2xl">
              <div class="flex items-center justify-between mb-8">
                 <h2 class="text-3xl font-oswald font-bold text-white uppercase tracking-wide">The Recipe</h2>
                 <i data-lucide="beaker" class="w-8 h-8 text-jeff-teal"></i>
              </div>

              <div class="space-y-8">
                 <!-- Name -->
                 <div>
                    <label class="block text-sm font-bold text-neutral-500 uppercase tracking-wider mb-2">Name Your Brew</label>
                    <input 
                      type="text" 
                      id="config-name"
                      placeholder="e.g. My Sunday Sip"
                      class="w-full text-2xl font-bold font-oswald border-b-2 border-neutral-800 focus:border-jeff-orange outline-none py-2 bg-transparent text-white placeholder-neutral-700 transition-colors"
                    />
                 </div>

                 <!-- Base Malt -->
                 <div>
                    <label class="block text-sm font-bold text-neutral-500 uppercase tracking-wider mb-3">Base Malt</label>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3" id="malt-options">
                       <button data-malt="Pilsner" class="config-btn malt-btn py-3 px-2 rounded-xl text-sm font-bold border-2 transition border-jeff-teal bg-jeff-teal/10 text-jeff-teal">Pilsner</button>
                       <button data-malt="Pale Ale" class="config-btn malt-btn py-3 px-2 rounded-xl text-sm font-bold border-2 transition border-neutral-800 bg-black text-neutral-400 hover:border-neutral-700">Pale Ale</button>
                       <button data-malt="Munich" class="config-btn malt-btn py-3 px-2 rounded-xl text-sm font-bold border-2 transition border-neutral-800 bg-black text-neutral-400 hover:border-neutral-700">Munich</button>
                       <button data-malt="Vienna" class="config-btn malt-btn py-3 px-2 rounded-xl text-sm font-bold border-2 transition border-neutral-800 bg-black text-neutral-400 hover:border-neutral-700">Vienna</button>
                    </div>
                 </div>

                 <!-- Hops -->
                 <div>
                    <label class="block text-sm font-bold text-neutral-500 uppercase tracking-wider mb-3">Hops Selection</label>
                    <div class="flex flex-wrap gap-2" id="hops-options">
                       <button data-hops="Cascade" class="config-btn hops-btn py-2 px-4 rounded-full text-sm font-bold transition bg-jeff-orange border border-jeff-orange text-white shadow-lg">Cascade</button>
                       <button data-hops="Saaz" class="config-btn hops-btn py-2 px-4 rounded-full text-sm font-bold transition bg-black border border-neutral-800 text-neutral-400 hover:border-neutral-700">Saaz</button>
                       <button data-hops="Citra" class="config-btn hops-btn py-2 px-4 rounded-full text-sm font-bold transition bg-black border border-neutral-800 text-neutral-400 hover:border-neutral-700">Citra</button>
                       <button data-hops="Goldings" class="config-btn hops-btn py-2 px-4 rounded-full text-sm font-bold transition bg-black border border-neutral-800 text-neutral-400 hover:border-neutral-700">Goldings</button>
                       <button data-hops="Mosaic" class="config-btn hops-btn py-2 px-4 rounded-full text-sm font-bold transition bg-black border border-neutral-800 text-neutral-400 hover:border-neutral-700">Mosaic</button>
                    </div>
                 </div>

                 <!-- ABV -->
                 <div>
                    <div class="flex justify-between items-center mb-4">
                       <label class="text-sm font-bold text-neutral-500 uppercase tracking-wider">Target ABV</label>
                       <span class="text-2xl font-oswald font-bold text-jeff-orange" id="abv-display">5.0%</span>
                    </div>
                    <input 
                      type="range" 
                      id="config-abv"
                      min="3.0" 
                      max="9.0" 
                      step="0.1" 
                      value="5.0"
                      class="w-full h-3 bg-neutral-800 rounded-lg appearance-none cursor-pointer accent-jeff-orange"
                    />
                 </div>

                 <!-- Flavors -->
                 <div>
                    <label class="block text-sm font-bold text-neutral-500 uppercase tracking-wider mb-3">Flavor Profile (Max 3)</label>
                    <div class="flex flex-wrap gap-2" id="flavor-options">
                       <button data-note="Citrus" class="config-btn note-btn py-2 px-4 flex items-center rounded-full text-xs font-bold border transition bg-black border-neutral-800 text-neutral-450 hover:bg-neutral-900"><i data-lucide="check" class="w-3 h-3 mr-1 hidden check-icon"></i> Citrus</button>
                       <button data-note="Spicy" class="config-btn note-btn py-2 px-4 flex items-center rounded-full text-xs font-bold border transition bg-black border-neutral-800 text-neutral-450 hover:bg-neutral-900"><i data-lucide="check" class="w-3 h-3 mr-1 hidden check-icon"></i> Spicy</button>
                       <button data-note="Floral" class="config-btn note-btn py-2 px-4 flex items-center rounded-full text-xs font-bold border transition bg-black border-neutral-800 text-neutral-450 hover:bg-neutral-900"><i data-lucide="check" class="w-3 h-3 mr-1 hidden check-icon"></i> Floral</button>
                       <button data-note="Herbal" class="config-btn note-btn py-2 px-4 flex items-center rounded-full text-xs font-bold border transition bg-black border-neutral-800 text-neutral-450 hover:bg-neutral-900"><i data-lucide="check" class="w-3 h-3 mr-1 hidden check-icon"></i> Herbal</button>
                       <button data-note="Tropical" class="config-btn note-btn py-2 px-4 flex items-center rounded-full text-xs font-bold border transition bg-black border-neutral-800 text-neutral-450 hover:bg-neutral-900"><i data-lucide="check" class="w-3 h-3 mr-1 hidden check-icon"></i> Tropical</button>
                       <button data-note="Caramel" class="config-btn note-btn py-2 px-4 flex items-center rounded-full text-xs font-bold border transition bg-black border-neutral-800 text-neutral-450 hover:bg-neutral-900"><i data-lucide="check" class="w-3 h-3 mr-1 hidden check-icon"></i> Caramel</button>
                       <button data-note="Piney" class="config-btn note-btn py-2 px-4 flex items-center rounded-full text-xs font-bold border transition bg-black border-neutral-800 text-neutral-450 hover:bg-neutral-900"><i data-lucide="check" class="w-3 h-3 mr-1 hidden check-icon"></i> Piney</button>
                       <button data-note="Earthy" class="config-btn note-btn py-2 px-4 flex items-center rounded-full text-xs font-bold border transition bg-black border-neutral-800 text-neutral-450 hover:bg-neutral-900"><i data-lucide="check" class="w-3 h-3 mr-1 hidden check-icon"></i> Earthy</button>
                    </div>
                 </div>
              </div>
           </div>

           <!-- 4. DESCRIPTION & CULTURE -->
           <div class="bg-neutral-900 p-8 rounded-3xl border border-neutral-800 shadow-xl">
              <h3 class="font-oswald font-bold uppercase tracking-wide text-xl text-white mb-3">Brewer's Notes</h3>
              <p id="dynamic-description" class="text-neutral-300 italic text-lg leading-relaxed border-l-4 border-jeff-gold pl-4">
                 "A unique Pilsner malt base lager hopped with Cascade. Balanced. Clean finish. Brewed with Trinbagonian soul."
              </p>
              <div class="mt-6 pt-6 border-t border-neutral-800 flex items-start">
                 <i data-lucide="info" class="w-5 h-5 text-jeff-teal mr-3 mt-1 flex-shrink-0"></i>
                 <p class="text-sm text-neutral-400 leading-relaxed font-light">
                    <span class="font-bold text-jeff-teal uppercase tracking-wider block mb-1 text-xs">Food Pairing</span> <span id="pairing-text">We recommend pairing this specific blend with Spicy Geera Pork or a classic Shark & Bake to cut through the Pilsner malt sweetness.</span>
                 </p>
              </div>
           </div>
        </div>

        <!-- RIGHT PANE: PREVIEW & PURCHASE -->
        <div class="lg:col-span-5">
           <div class="sticky top-24 space-y-8">
           
           <!-- PREVIEW CARD -->
           <div class="bg-neutral-900 text-white rounded-3xl p-1 overflow-hidden shadow-2xl border border-neutral-850">
              <div class="bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] bg-neutral-900 p-8 rounded-[22px] relative z-10">
                 
                 <div class="absolute top-4 right-4">
                    <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center backdrop-blur-md">
                       <i data-lucide="award" class="w-6 h-6 text-jeff-gold"></i>
                    </div>
                 </div>

                 <div class="text-center mb-8">
                    <p class="text-jeff-gold text-xs font-bold tracking-[0.3em] uppercase mb-2">Jeff Brewery Custom</p>
                    <h2 id="preview-title" class="text-4xl font-oswald font-bold tracking-wide uppercase leading-tight break-words text-white">Untitled</h2>
                 </div>

                 <!-- RADAR CHART FLAVOR WHEEL -->
                 <div class="h-64 w-full relative mb-8">
                    <canvas id="flavorRadiusChart"></canvas>
                    
                    <!-- 3D Bottle Approximation -->
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none opacity-20">
                       <img src="https://images.unsplash.com/photo-1600093463592-8e36ae95ef56?auto=format&fit=crop&w=400&q=80" class="h-full object-contain mix-blend-overlay" alt="" />
                    </div>
                 </div>

                 <!-- AI TIP BOX -->
                 <div class="bg-white/5 backdrop-blur-md rounded-xl p-4 mb-8 flex items-start border border-white/10">
                    <i data-lucide="zap" class="w-5 h-5 text-jeff-gold mr-3 flex-shrink-0"></i>
                    <div>
                       <p class="text-[10px] font-bold text-jeff-gold uppercase mb-1 tracking-wider">Brewmaster AI Tip</p>
                       <p id="ai-tip" class="text-sm text-gray-300 font-light leading-relaxed">Great balance so far. This recipe looks ready for the road.</p>
                    </div>
                 </div>

                 <!-- 5. PRICING & PURCHASE -->
                 <div class="bg-[#111] border border-neutral-850 rounded-2xl p-6 text-white">
                    <div class="flex justify-between items-center mb-4 border-b border-neutral-800 pb-4">
                       <span class="font-bold text-neutral-400 uppercase tracking-widest text-xs">Price per 6-Pack</span>
                       <span class="text-2xl font-bold font-oswald text-jeff-gold">$25.00</span>
                    </div>
                    
                    <div class="mb-6 flex items-center justify-between">
                       <span class="font-bold text-neutral-400 text-xs uppercase tracking-widest">Quantity</span>
                       <div class="flex items-center space-x-4 bg-black border border-neutral-800 rounded-lg px-2 text-white">
                          <button id="qty-minus" class="p-2 text-xl font-bold hover:text-jeff-orange transition">-</button>
                          <span id="qty-display" class="font-bold">1</span>
                          <button id="qty-plus" class="p-2 text-xl font-bold hover:text-jeff-orange transition">+</button>
                       </div>
                    </div>

                    <!-- Pilot Batch Upsell -->
                    <div id="pilot-batch-toggle" class="mb-6 border border-neutral-800 bg-black hover:bg-neutral-900 rounded-xl p-4 cursor-pointer transition select-none group">
                       <div class="flex items-start">
                          <div id="pilot-batch-checkbox" class="mt-1 w-5 h-5 rounded border border-neutral-700 bg-black flex items-center justify-center mr-3 transition group-hover:border-jeff-teal">
                             <i data-lucide="check" id="pilot-batch-icon" class="w-3 h-3 text-white hidden"></i>
                          </div>
                          <div>
                             <h4 class="font-bold text-white text-sm uppercase tracking-wide">Pilot Batch Experience (+$150)</h4>
                             <p class="text-xs text-neutral-400 mt-1 font-light leading-relaxed">Get a full 5-gallon keg brewed, invitation to brew day, and custom labels.</p>
                          </div>
                       </div>
                    </div>

                    <div class="border-t border-neutral-800 pt-4 mb-4 flex justify-between items-end">
                       <div>
                          <p class="text-xs text-neutral-400 uppercase tracking-wider font-bold">Total</p>
                          <p id="total-price" class="text-3xl font-bold text-jeff-gold font-oswald">$25.00</p>
                       </div>
                    </div>

                    <button 
                       id="add-to-craft-cart"
                       class="w-full bg-jeff-orange text-white font-bold py-4 rounded-xl hover:bg-orange-600 transition shadow-lg flex items-center justify-center uppercase tracking-wide group"
                    >
                       <i data-lucide="shopping-cart" class="w-5 h-5 mr-2 transform group-hover:scale-110 transition"></i> Add to Order
                    </button>
                 </div>

                 <!-- 6. SOCIAL -->
                 <div class="mt-6 flex justify-center space-x-4">
                    <button class="text-neutral-400 hover:text-white flex items-center text-xs font-bold uppercase tracking-wider transition group">
                       <i data-lucide="share-2" class="w-4 h-4 mr-2 group-hover:scale-110 transition"></i> Share Recipe
                    </button>
                 </div>

              </div>
           </div>
           
           <!-- 3. GAMIFICATION PANEL -->
           <div class="bg-neutral-900 p-6 rounded-2xl border border-neutral-800 border-l-4 border-jeff-orange relative overflow-hidden group shadow-2xl">
              <div class="absolute -right-4 -top-4 text-jeff-orange opacity-10 transform group-hover:rotate-12 transition duration-500">
                  <i data-lucide="award" class="w-24 h-24"></i>
              </div>
              <div class="relative z-10">
                  <div class="flex items-center justify-between mb-4">
                     <h3 class="font-bold text-white flex items-center uppercase tracking-wider text-sm">
                        <i data-lucide="star" class="w-5 h-5 text-jeff-gold fill-current mr-2"></i> Rewards
                     </h3>
                     <span class="text-xs font-bold bg-green-950/40 text-green-400 border border-green-900/30 px-2 py-1 rounded">+10 Pts Pending</span>
                  </div>
                  <p class="text-sm text-neutral-300 mb-4 font-light leading-relaxed">
                     Crafting this beer gets you closer to the <span class="font-bold text-white uppercase">Master Brewer</span> badge.
                  </p>
                  <div class="w-full bg-black rounded-full h-2 mb-2 overflow-hidden">
                     <div class="bg-gradient-to-r from-jeff-orange to-jeff-gold h-2 rounded-full relative overflow-hidden" style="width: 60%">
                         <div class="absolute inset-0 bg-white/20 animate-pulse"></div>
                     </div>
                  </div>
                  <p class="text-[10px] uppercase font-bold text-neutral-500 text-right tracking-widest">2/5 Custom Brews</p>
              </div>
           </div>
           
           </div> <!-- End sticky wrapper -->
        </div>
     </div>

     <!-- 8. BOTTOM RELATED -->
     <section class="mt-24 pt-12 border-t border-neutral-800">
        <h3 class="text-2xl font-oswald font-bold text-white mb-8 text-center uppercase tracking-widest">Community Creations</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 opacity-60 filter blur-[1px] hover:blur-0 hover:opacity-100 transition duration-500 cursor-not-allowed">
           <?php for($i=0; $i<3; $i++): ?>
              <div class="bg-neutral-900 p-6 rounded-xl border border-neutral-800 shadow-sm relative overflow-hidden group">
                 <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-neutral-850 rounded-full mr-3 group-hover:bg-jeff-teal/10 transition"></div>
                    <div>
                       <div class="h-4 bg-neutral-850 rounded w-24 mb-1 group-hover:bg-jeff-teal/20 transition"></div>
                       <div class="h-3 bg-black border border-neutral-800 rounded w-16 group-hover:bg-jeff-teal/10 transition"></div>
                    </div>
                 </div>
                 <div class="h-32 bg-black rounded-lg flex items-center justify-center text-neutral-500 font-bold tracking-widest uppercase group-hover:bg-neutral-950 group-hover:text-jeff-teal transition">
                    COMING SOON
                 </div>
              </div>
           <?php endfor; ?>
        </div>
        <p class="text-center text-xs font-bold uppercase tracking-widest text-neutral-550 mt-8">Community Leaderboard launching next season.</p>
     </section>
   </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // --- State ---
    let config = {
        name: '',
        malt: 'Pilsner',
        hops: 'Cascade',
        abv: 5.0,
        notes: []
    };
    let quantity = 1;
    let isPilotBatch = false;

    // --- DOM Elements ---
    const nameInput = document.getElementById('config-name');
    const previewTitle = document.getElementById('preview-title');
    const maltBtns = document.querySelectorAll('.malt-btn');
    const hopsBtns = document.querySelectorAll('.hops-btn');
    const abvInput = document.getElementById('config-abv');
    const abvDisplay = document.getElementById('abv-display');
    const noteBtns = document.querySelectorAll('.note-btn');
    const dynamicDesc = document.getElementById('dynamic-description');
    const pairingText = document.getElementById('pairing-text');
    const aiTip = document.getElementById('ai-tip');
    const qtyMinus = document.getElementById('qty-minus');
    const qtyPlus = document.getElementById('qty-plus');
    const qtyDisplay = document.getElementById('qty-display');
    const pilotToggle = document.getElementById('pilot-batch-toggle');
    const pilotCheckbox = document.getElementById('pilot-batch-checkbox');
    const pilotIcon = document.getElementById('pilot-batch-icon');
    const totalPrice = document.getElementById('total-price');
    const addToCartBtn = document.getElementById('add-to-craft-cart');

    // --- Chart.js Setup ---
    const ctx = document.getElementById('flavorRadiusChart').getContext('2d');
    Chart.defaults.color = '#fff';
    Chart.defaults.font.family = '"Open Sans", sans-serif';
    Chart.defaults.font.weight = 'bold';
    Chart.defaults.font.size = 10;
    
    const chart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ['Bitterness', 'Sweetness', 'Aroma', 'Body', 'Funk/Spice'],
            datasets: [{
                label: 'Flavor Profile',
                data: [0, 0, 0, 0, 0],
                backgroundColor: 'rgba(212, 160, 23, 0.6)', // gold/orange accent
                borderColor: '#D4A017',
                pointBackgroundColor: '#fff',
                pointBorderColor: '#D4A017',
                pointHoverBackgroundColor: '#D4A017',
                pointHoverBorderColor: '#fff',
                borderWidth: 3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                r: {
                    angleLines: { color: '#444' },
                    grid: { color: '#444' },
                    pointLabels: {
                        color: '#fff',
                        font: { size: 10, weight: 'bold', family: '"Oswald", sans-serif' }
                    },
                    ticks: { display: false, min: 0, max: 100 }
                }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });

    // --- Update Functions ---
    const updateUI = () => {
        // Name
        previewTitle.textContent = config.name || 'Untitled';
        
        // Buttons Selection State
        maltBtns.forEach(btn => {
            if(btn.dataset.malt === config.malt) {
                btn.className = "config-btn malt-btn py-3 px-2 rounded-xl text-sm font-bold border-2 transition border-jeff-teal bg-jeff-teal/10 text-jeff-teal shadow-md transform scale-105";
            } else {
                btn.className = "config-btn malt-btn py-3 px-2 rounded-xl text-sm font-bold border-2 transition border-neutral-800 bg-black text-neutral-450 hover:border-neutral-700";
            }
        });

        hopsBtns.forEach(btn => {
            if(btn.dataset.hops === config.hops) {
                btn.className = "config-btn hops-btn py-2 px-4 rounded-full text-sm font-bold transition bg-jeff-orange border border-jeff-orange text-white shadow-lg transform scale-105";
            } else {
                btn.className = "config-btn hops-btn py-2 px-4 rounded-full text-sm font-bold transition bg-black border border-neutral-800 text-neutral-450 hover:border-neutral-700";
            }
        });

        noteBtns.forEach(btn => {
            const note = btn.dataset.note;
            const icon = btn.querySelector('.check-icon');
            if(config.notes.includes(note)) {
                btn.className = "config-btn note-btn py-2 px-4 flex items-center rounded-full text-xs font-bold border transition bg-jeff-orange border-jeff-orange text-white shadow-md transform scale-105";
                icon.classList.remove('hidden');
            } else {
                btn.className = "config-btn note-btn py-2 px-4 flex items-center rounded-full text-xs font-bold border transition bg-black border-neutral-800 text-neutral-450 hover:bg-neutral-900";
                icon.classList.add('hidden');
            }
        });

        // Descriptions & Dynamic Text
        const base = `A unique ${config.malt} malt base lager hopped with ${config.hops}.`;
        const abvDesc = config.abv > 6.5 ? "A heavy hitter" : config.abv < 4.5 ? "A light session drinker" : "Balanced";
        const noteDesc = config.notes.length > 0 ? `Features distinct notes of ${config.notes.join(', ')}.` : "Clean finish.";
        dynamicDesc.textContent = `"${base} ${abvDesc}. ${noteDesc} Brewed with Trinbagonian soul."`;

        pairingText.textContent = `We recommend pairing this specific blend with Spicy Geera Pork or a classic Shark & Bake to cut through the ${config.malt} malt sweetness.`;

        // AI Tip
        let tip = "Great balance so far. This recipe looks ready for the road.";
        if (config.abv > 7) tip = "Strong! Consider 'Caramel' notes to balance the alcohol burn.";
        else if (config.hops === 'Citra' && !config.notes.includes('Citrus')) tip = "Citra hops pair perfectly with 'Citrus' flavor notes.";
        else if (config.malt === 'Munich') tip = "Munich malt adds a rich, bready backbone. Good for darker lagers.";
        aiTip.textContent = tip;

        // Pricing & Quantity
        qtyDisplay.textContent = quantity;
        if(isPilotBatch) {
            pilotCheckbox.className = "mt-1 w-5 h-5 rounded border flex items-center justify-center mr-3 transition bg-jeff-teal border-jeff-teal scale-110 shadow-sm";
            pilotIcon.classList.remove('hidden');
            pilotToggle.className = "mb-6 border border-jeff-teal/30 bg-jeff-teal/5 rounded-xl p-4 cursor-pointer transition select-none group shadow-inner";
        } else {
            pilotCheckbox.className = "mt-1 w-5 h-5 rounded border border-neutral-700 bg-black flex items-center justify-center mr-3 transition group-hover:border-jeff-teal";
            pilotIcon.classList.add('hidden');
            pilotToggle.className = "mb-6 border border-neutral-800 bg-black hover:bg-neutral-900 rounded-xl p-4 cursor-pointer transition select-none group";
        }

        const price = (25 * quantity) + (isPilotBatch ? 150 : 0);
        totalPrice.textContent = `$${price.toFixed(2)}`;

        // Chart Data Calculation
        let bitterness = 40;
        let sweetness = 30;
        let aroma = 50;
        let body = 40;
        let funk = 10;

        if (config.malt === 'Munich' || config.malt === 'Vienna') { sweetness += 30; body += 20; }
        if (config.hops === 'Saaz') { bitterness += 10; aroma += 10; }
        if (config.hops === 'Citra' || config.hops === 'Mosaic') { aroma += 40; bitterness += 20; }
        body += (config.abv - 5) * 10;
        if (config.notes.includes('Spicy')) funk += 30;
        if (config.notes.includes('Tropical')) { sweetness += 10; aroma += 20; }
        if (config.notes.includes('Caramel')) { sweetness += 20; body += 10; }

        chart.data.datasets[0].data = [
            Math.min(bitterness, 100),
            Math.min(sweetness, 100),
            Math.min(aroma, 100),
            Math.min(body, 100),
            Math.min(funk, 100)
        ];
        chart.update();
    };

    // --- Event Listeners ---
    nameInput.addEventListener('input', (e) => { config.name = e.target.value; updateUI(); });
    
    maltBtns.forEach(btn => btn.addEventListener('click', (e) => {
        config.malt = e.currentTarget.dataset.malt;
        updateUI();
    }));

    hopsBtns.forEach(btn => btn.addEventListener('click', (e) => {
        config.hops = e.currentTarget.dataset.hops;
        updateUI();
    }));

    abvInput.addEventListener('input', (e) => {
        config.abv = parseFloat(e.target.value);
        abvDisplay.textContent = `${config.abv.toFixed(1)}%`;
        updateUI();
    });

    noteBtns.forEach(btn => btn.addEventListener('click', (e) => {
        const note = e.currentTarget.dataset.note;
        if (config.notes.includes(note)) {
            config.notes = config.notes.filter(n => n !== note);
        } else {
            if (config.notes.length < 3) {
                config.notes.push(note);
            } else {
                const section = document.getElementById('flavor-options');
                section.classList.add('animate-pulse');
                setTimeout(() => section.classList.remove('animate-pulse'), 500);
            }
        }
        updateUI();
    }));

    qtyMinus.addEventListener('click', () => {
        if (quantity > 1) { quantity--; updateUI(); }
    });

    qtyPlus.addEventListener('click', () => {
        quantity++; updateUI();
    });

    pilotToggle.addEventListener('click', () => {
        isPilotBatch = !isPilotBatch;
        updateUI();
    });

    addToCartBtn.addEventListener('click', () => {
        if (!config.name) {
            nameInput.classList.add('border-trini-red', 'bg-red-950/20');
            setTimeout(() => nameInput.classList.remove('border-trini-red', 'bg-red-950/20'), 1000);
            nameInput.focus();
            return;
        }

        const btnIcon = addToCartBtn.querySelector('i');
        const oldClass = btnIcon.className;
        btnIcon.className = 'w-5 h-5 mr-2 animate-spin';
        btnIcon.setAttribute('data-lucide', 'loader-2');
        lucide.createIcons();
        
        setTimeout(() => {
            alert('Custom brew added to cart successfully!');
            window.location.href = '?route=shop';
        }, 800);
    });

    // Initial render
    updateUI();
});
</script>
