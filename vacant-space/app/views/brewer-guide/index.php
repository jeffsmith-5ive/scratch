<div class="min-h-screen bg-neutral-50 font-sans text-neutral-900 selection:bg-jeff-orange/20 pb-20">
  <!-- Header -->
  <header class="bg-neutral-900 text-white py-16 px-6 text-center border-b-4 border-jeff-orange relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://images.unsplash.com/photo-1505075933665-af84038281ce?q=80&w=2000&auto=format&fit=crop')] bg-cover bg-center"></div>
    <div class="max-w-3xl mx-auto relative z-10">
      <div class="inline-block p-4 bg-neutral-800 rounded-full mb-6 shadow-xl border border-neutral-700">
        <i data-lucide="beer" class="w-12 h-12 text-jeff-orange"></i>
      </div>
      <h1 class="text-4xl md:text-6xl font-display font-extrabold mb-6 tracking-tight text-white uppercase">
        The Brewer Guide
      </h1>
      <p class="text-lg md:text-xl text-neutral-300 max-w-2xl mx-auto font-medium leading-relaxed">
        The ultimate philosophy and flowchart for brewing high-quality craft beer. Precision, patience, and the perfect fermentation.
      </p>
    </div>
  </header>

  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 grid grid-cols-1 lg:grid-cols-12 gap-12">
    <!-- Explanation Section -->
    <section class="lg:col-span-4 space-y-8">
      <div class="bg-white p-8 rounded-3xl shadow-xl shadow-neutral-200/50 border border-neutral-200">
        <h2 class="text-3xl font-display font-bold mb-6 flex items-center gap-3 text-neutral-900 uppercase">
          <i data-lucide="info" class="text-jeff-teal w-8 h-8"></i>
          What is the Brewer Guide?
        </h2>
        <div class="space-y-4 text-neutral-600 text-lg leading-relaxed">
          <p>
            The <strong>Brewer Guide</strong> is an interactive digital persona and expert representing the meticulous art of craft beer brewing. The craft beer brewing process involves a series of precise steps—including mashing, boiling, fermenting, conditioning, and packaging—to produce complex flavors and high-quality beer.
          </p>
          <p>
            Craft breweries focus on small-batch production, unique recipes, and flavor experimentation. This allows for diverse beer styles like IPAs, stouts, sours, and saisons. Attention to ingredient quality, water chemistry, and fermentation control is critical to achieving signature flavors.
          </p>
          <div class="pt-4">
            <button 
              onclick="window.dispatchEvent(new CustomEvent('open-trinichat'))"
              class="w-full flex items-center justify-center gap-2 bg-jeff-teal hover:bg-teal-700 text-white py-3 px-6 rounded-xl font-bold transition-colors shadow-md focus:outline-none"
            >
              <i data-lucide="info" class="w-5 h-5"></i>
              Ask the Brewer Guide a Question
            </button>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 gap-4">
        <div class="bg-white p-6 rounded-2xl border-l-4 border-red-500 shadow-sm hover:shadow-md transition-shadow cursor-pointer filter-btn" data-stage="red">
          <h3 class="font-bold text-neutral-900 mb-2 text-lg">Hot Processes</h3>
          <p class="text-neutral-600 text-sm">Malting, mashing, lautering, and boiling. These steps extract sugars and sterilize the wort.</p>
        </div>
        <div class="bg-white p-6 rounded-2xl border-l-4 border-blue-500 shadow-sm hover:shadow-md transition-shadow cursor-pointer filter-btn" data-stage="blue">
          <h3 class="font-bold text-neutral-900 mb-2 text-lg">Cold Processes</h3>
          <p class="text-neutral-600 text-sm">Cooling and conditioning. Temperature control is vital for clarity and flavor mellowing.</p>
        </div>
        <div class="bg-white p-6 rounded-2xl border-l-4 border-green-500 shadow-sm hover:shadow-md transition-shadow cursor-pointer filter-btn" data-stage="green">
          <h3 class="font-bold text-neutral-900 mb-2 text-lg">Biological Processes</h3>
          <p class="text-neutral-600 text-sm">Yeast pitching and fermentation. This is where sugars become alcohol and CO₂.</p>
        </div>
        <div class="bg-white p-6 rounded-2xl border-l-4 border-yellow-500 shadow-sm hover:shadow-md transition-shadow cursor-pointer filter-btn" data-stage="yellow">
          <h3 class="font-bold text-neutral-900 mb-2 text-lg">Packaging & QC</h3>
          <p class="text-neutral-600 text-sm">Quality checks, carbonation, and final packaging into kegs, cans, or bottles.</p>
        </div>
      </div>
    </section>

    <!-- Flowchart Section -->
    <section class="lg:col-span-8 bg-white rounded-3xl shadow-2xl shadow-neutral-200/50 border border-neutral-200 overflow-hidden flex flex-col">
      <div class="p-6 border-b border-neutral-100 bg-neutral-50 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
          <h2 class="text-2xl font-display font-bold text-neutral-900 uppercase">The Brewing Flowchart</h2>
          <p class="text-neutral-500 mt-1">Interactive step-by-step process. Click stages on the left or filter below.</p>
        </div>
        <!-- Active Filter Badge -->
        <div class="flex items-center gap-2">
            <button id="reset-filter-btn" class="hidden text-xs font-bold text-trini-red hover:underline focus:outline-none">Clear Filter</button>
            <span id="active-filter-badge" class="hidden text-xs font-bold px-3 py-1 bg-jeff-teal/10 text-jeff-teal rounded-full uppercase"></span>
        </div>
      </div>
      
      <!-- Flowchart Container -->
      <div class="p-8 bg-neutral-50/50 overflow-y-auto max-h-[900px] flex flex-col items-center select-none" id="flowchart-list">
         
         <!-- Start: Raw Grain -->
         <div class="flowchart-node flex flex-col items-center w-full transition duration-300" data-color="red">
             <div class="px-6 py-4 shadow-lg rounded-[3rem] bg-white border-2 border-red-500 min-w-[200px] text-center transform transition duration-300 hover:scale-105">
                 <div class="font-bold text-neutral-900 text-lg uppercase tracking-wide">Raw Grain</div>
             </div>
             <div class="h-10 w-0.5 bg-red-500 flowchart-line"></div>
         </div>

         <!-- 1. Malting -->
         <div class="flowchart-node flex flex-col items-center w-full transition duration-300" data-color="red">
             <div class="px-5 py-4 shadow-xl rounded-xl bg-white border-2 border-red-500 w-80 transform transition duration-300 hover:scale-105 text-left">
                 <div class="flex items-center gap-3 mb-3">
                     <div class="p-2.5 rounded-xl bg-red-50 text-red-600">
                         <i data-lucide="wheat" class="w-5 h-5"></i>
                     </div>
                     <div class="font-bold text-neutral-900 text-lg">1. Malting</div>
                 </div>
                 <div class="text-sm text-neutral-600 leading-relaxed font-light whitespace-pre-line">
                     Convert raw grain starches into fermentable sugars.
                     • Steeping (2-3 days)
                     • Germination (4-6 days)
                     • Kilning/Roasting
                 </div>
             </div>
             <div class="h-10 w-0.5 bg-red-500 flowchart-line"></div>
         </div>

         <!-- 2. Milling -->
         <div class="flowchart-node flex flex-col items-center w-full transition duration-300" data-color="red">
             <div class="px-5 py-4 shadow-xl rounded-xl bg-white border-2 border-red-500 w-80 transform transition duration-300 hover:scale-105 text-left">
                 <div class="flex items-center gap-3 mb-3">
                     <div class="p-2.5 rounded-xl bg-red-50 text-red-600">
                         <i data-lucide="settings" class="w-5 h-5"></i>
                     </div>
                     <div class="font-bold text-neutral-900 text-lg">2. Milling</div>
                 </div>
                 <div class="text-sm text-neutral-600 leading-relaxed font-light whitespace-pre-line">
                     Break open grain husks to expose starches for mashing.
                     • Adjust mill rollers
                     • Collect grist
                 </div>
             </div>
             <div class="h-10 w-0.5 bg-red-500 flowchart-line"></div>
         </div>

         <!-- 3. Mashing -->
         <div class="flowchart-node flex flex-col items-center w-full transition duration-300" data-color="red">
             <div class="px-5 py-4 shadow-xl rounded-xl bg-white border-2 border-red-500 w-80 transform transition duration-300 hover:scale-105 text-left">
                 <div class="flex items-center gap-3 mb-3">
                     <div class="p-2.5 rounded-xl bg-red-50 text-red-600">
                         <i data-lucide="thermometer" class="w-5 h-5"></i>
                     </div>
                     <div class="font-bold text-neutral-900 text-lg">3. Mashing</div>
                 </div>
                 <div class="text-sm text-neutral-600 leading-relaxed font-light whitespace-pre-line">
                     Extract fermentable sugars from grains.
                     • Temp: 60–70°C (140–158°F)
                     • Saccharification
                     • Resting
                 </div>
             </div>
             <div class="h-10 w-0.5 bg-red-500 flowchart-line"></div>
         </div>

         <!-- 4. Lautering -->
         <div class="flowchart-node flex flex-col items-center w-full transition duration-300" data-color="red">
             <div class="px-5 py-4 shadow-xl rounded-xl bg-white border-2 border-red-500 w-80 transform transition duration-300 hover:scale-105 text-left">
                 <div class="flex items-center gap-3 mb-3">
                     <div class="p-2.5 rounded-xl bg-red-50 text-red-600">
                         <i data-lucide="droplets" class="w-5 h-5"></i>
                     </div>
                     <div class="font-bold text-neutral-900 text-lg">4. Lautering</div>
                 </div>
                 <div class="text-sm text-neutral-600 leading-relaxed font-light whitespace-pre-line">
                     Separate wort from spent grains.
                     • Vorlauf recirculation
                     • Sparging with hot water
                     • Collect wort
                 </div>
             </div>
             <div class="h-10 w-0.5 bg-red-500 flowchart-line"></div>
         </div>

         <!-- 5. Boiling & Hopping -->
         <div class="flowchart-node flex flex-col items-center w-full transition duration-300" data-color="red">
             <div class="px-5 py-4 shadow-xl rounded-xl bg-white border-2 border-red-500 w-80 transform transition duration-300 hover:scale-105 text-left">
                 <div class="flex items-center gap-3 mb-3">
                     <div class="p-2.5 rounded-xl bg-red-50 text-red-600">
                         <i data-lucide="flask-conical" class="w-5 h-5"></i>
                     </div>
                     <div class="font-bold text-neutral-900 text-lg">5. Boiling & Hopping</div>
                 </div>
                 <div class="text-sm text-neutral-600 leading-relaxed font-light whitespace-pre-line">
                     Sterilize wort, extract hop bitterness/aroma.
                     • Boil 60–90 mins
                     • Early hops (bitterness)
                     • Late hops (aroma)
                 </div>
             </div>
             <div class="h-10 w-0.5 bg-red-500 flowchart-line"></div>
         </div>

         <!-- 6. Whirlpooling -->
         <div class="flowchart-node flex flex-col items-center w-full transition duration-300" data-color="red">
             <div class="px-5 py-4 shadow-xl rounded-xl bg-white border-2 border-red-500 w-80 transform transition duration-300 hover:scale-105 text-left">
                 <div class="flex items-center gap-3 mb-3">
                     <div class="p-2.5 rounded-xl bg-red-50 text-red-600">
                         <i data-lucide="wind" class="w-5 h-5"></i>
                     </div>
                     <div class="font-bold text-neutral-900 text-lg">6. Whirlpooling</div>
                 </div>
                 <div class="text-sm text-neutral-600 leading-relaxed font-light whitespace-pre-line">
                     Clarify wort by separating hop/trub solids.
                     • Circulate at high speed
                     • Pump clear wort
                 </div>
             </div>
             <div class="h-10 w-0.5 bg-red-500 flowchart-line"></div>
         </div>

         <!-- 7. Wort Cooling -->
         <div class="flowchart-node flex flex-col items-center w-full transition duration-300" data-color="blue">
             <div class="px-5 py-4 shadow-xl rounded-xl bg-white border-2 border-blue-500 w-80 transform transition duration-300 hover:scale-105 text-left">
                 <div class="flex items-center gap-3 mb-3">
                     <div class="p-2.5 rounded-xl bg-blue-50 text-blue-600">
                         <i data-lucide="snowflake" class="w-5 h-5"></i>
                     </div>
                     <div class="font-bold text-neutral-900 text-lg">7. Wort Cooling</div>
                 </div>
                 <div class="text-sm text-neutral-600 leading-relaxed font-light whitespace-pre-line">
                     Rapidly cool wort to yeast pitching temp.
                     • Ale: 20–22°C (68–72°F)
                     • Lager: 9–15°C (48–59°F)
                 </div>
             </div>
             <div class="h-10 w-0.5 bg-blue-500 flowchart-line"></div>
         </div>

         <!-- 8. Yeast Pitching -->
         <div class="flowchart-node flex flex-col items-center w-full transition duration-300" data-color="green">
             <div class="px-5 py-4 shadow-xl rounded-xl bg-white border-2 border-green-500 w-80 transform transition duration-300 hover:scale-105 text-left">
                 <div class="flex items-center gap-3 mb-3">
                     <div class="p-2.5 rounded-xl bg-green-50 text-green-600">
                         <i data-lucide="beaker" class="w-5 h-5"></i>
                     </div>
                     <div class="font-bold text-neutral-900 text-lg">8. Yeast Pitching</div>
                 </div>
                 <div class="text-sm text-neutral-600 leading-relaxed font-light whitespace-pre-line">
                     Begin fermentation.
                     • Add active yeast
                     • Aerate oxygen (~5 mins)
                     • Maintain sanitation
                 </div>
             </div>
             <div class="h-10 w-0.5 bg-green-500 flowchart-line"></div>
         </div>

         <!-- 9. Fermentation -->
         <div class="flowchart-node flex flex-col items-center w-full transition duration-300" data-color="green">
             <div class="px-5 py-4 shadow-xl rounded-xl bg-white border-2 border-green-500 w-80 transform transition duration-300 hover:scale-105 text-left" id="node-fermentation">
                 <div class="flex items-center gap-3 mb-3">
                     <div class="p-2.5 rounded-xl bg-green-50 text-green-600">
                         <i data-lucide="timer" class="w-5 h-5"></i>
                     </div>
                     <div class="font-bold text-neutral-900 text-lg">9. Fermentation</div>
                 </div>
                 <div class="text-sm text-neutral-600 leading-relaxed font-light whitespace-pre-line">
                     Convert sugars into alcohol and CO₂.
                     • Duration: 5–14 days
                     • Gravity monitoring
                     • Sediment settles
                 </div>
             </div>
             <div class="h-10 w-0.5 bg-green-500 flowchart-line"></div>
         </div>

         <!-- Decision 1: Gravity Check? -->
         <div class="flowchart-node flex flex-col items-center w-full transition duration-300 py-4" data-color="green">
             <div class="relative w-48 h-48 flex items-center justify-center transform transition duration-300 hover:scale-105">
                 <div class="absolute inset-0 transform rotate-45 border-2 shadow-xl bg-white border-green-500 rounded-xl"></div>
                 <div class="relative z-10 text-center p-4">
                     <div class="font-bold text-neutral-900 text-md mb-1">Gravity Check?</div>
                     <div class="text-xs text-neutral-600 font-light">Is fermentation complete?</div>
                 </div>
             </div>
             
             <!-- Yes/No Pathways -->
             <div class="relative flex items-center justify-center w-full h-16">
                 <!-- Main flow line (Yes) -->
                 <div class="absolute inset-y-0 w-0.5 bg-green-500"></div>
                 <div class="absolute -top-1 font-bold text-xs bg-white text-green-600 px-2 rounded-full border border-green-200">Yes</div>
                 
                 <!-- Loopback indicator (No) -->
                 <button onclick="document.getElementById('node-fermentation').scrollIntoView({ behavior: 'smooth' })" class="absolute left-1/2 ml-28 flex items-center gap-1.5 px-3 py-1.5 bg-green-50 text-green-700 border border-green-200 rounded-full text-xs font-bold shadow-sm hover:bg-green-100 transition focus:outline-none">
                     <i data-lucide="refresh-cw" class="w-3.5 h-3.5 animate-spin-slow"></i>
                     <span>No: Wait & Monitor</span>
                 </button>
             </div>
         </div>

         <!-- 10. Maturation / Conditioning -->
         <div class="flowchart-node flex flex-col items-center w-full transition duration-300" data-color="blue">
             <div class="px-5 py-4 shadow-xl rounded-xl bg-white border-2 border-blue-500 w-80 transform transition duration-300 hover:scale-105 text-left" id="node-maturation">
                 <div class="flex items-center gap-3 mb-3">
                     <div class="p-2.5 rounded-xl bg-blue-50 text-blue-600">
                         <i data-lucide="snowflake" class="w-5 h-5"></i>
                     </div>
                     <div class="font-bold text-neutral-900 text-lg">10. Maturation / Conditioning</div>
                 </div>
                 <div class="text-sm text-neutral-600 leading-relaxed font-light whitespace-pre-line">
                     Clarify beer, develop flavor.
                     • Cold storage (0–4°C)
                     • Optional dry hopping
                     • Clarification
                 </div>
             </div>
             <div class="h-10 w-0.5 bg-blue-500 flowchart-line"></div>
         </div>

         <!-- Decision 2: Quality Pass? -->
         <div class="flowchart-node flex flex-col items-center w-full transition duration-300 py-4" data-color="yellow">
             <div class="relative w-48 h-48 flex items-center justify-center transform transition duration-300 hover:scale-105">
                 <div class="absolute inset-0 transform rotate-45 border-2 shadow-xl bg-white border-yellow-500 rounded-xl"></div>
                 <div class="relative z-10 text-center p-4">
                     <div class="font-bold text-neutral-900 text-md mb-1">Quality Pass?</div>
                     <div class="text-xs text-neutral-600 font-light">DO, CO₂, color, bitterness OK?</div>
                 </div>
             </div>
             
             <!-- Yes/No Pathways -->
             <div class="relative flex items-center justify-center w-full h-16">
                 <!-- Main flow line (Yes) -->
                 <div class="absolute inset-y-0 w-0.5 bg-yellow-500"></div>
                 <div class="absolute -top-1 font-bold text-xs bg-white text-yellow-600 px-2 rounded-full border border-yellow-200">Yes</div>
                 
                 <!-- Loopback indicator (No) -->
                 <button onclick="document.getElementById('node-maturation').scrollIntoView({ behavior: 'smooth' })" class="absolute left-1/2 ml-28 flex items-center gap-1.5 px-3 py-1.5 bg-yellow-50 text-yellow-700 border border-yellow-200 rounded-full text-xs font-bold shadow-sm hover:bg-yellow-100 transition focus:outline-none">
                     <i data-lucide="alert-triangle" class="w-3.5 h-3.5"></i>
                     <span>No: Adjust & Age</span>
                 </button>
             </div>
         </div>

         <!-- 11. Packaging -->
         <div class="flowchart-node flex flex-col items-center w-full transition duration-300" data-color="yellow">
             <div class="px-5 py-4 shadow-xl rounded-xl bg-white border-2 border-yellow-500 w-80 transform transition duration-300 hover:scale-105 text-left">
                 <div class="flex items-center gap-3 mb-3">
                     <div class="p-2.5 rounded-xl bg-yellow-50 text-yellow-600">
                         <i data-lucide="package" class="w-5 h-5"></i>
                     </div>
                     <div class="font-bold text-neutral-900 text-lg">11. Packaging</div>
                 </div>
                 <div class="text-sm text-neutral-600 leading-relaxed font-light whitespace-pre-line">
                     Prepare beer for distribution.
                     • Carbonation adjustment
                     • Sealing & labeling
                     • Cans, bottles, kegs
                 </div>
             </div>
             <div class="h-10 w-0.5 bg-yellow-500 flowchart-line"></div>
         </div>

         <!-- End: Packaged Beer -->
         <div class="flowchart-node flex flex-col items-center w-full transition duration-300" data-color="yellow">
             <div class="px-6 py-4 shadow-lg rounded-[3rem] bg-white border-2 border-yellow-500 min-w-[200px] text-center transform transition duration-300 hover:scale-105">
                 <div class="font-bold text-neutral-900 text-lg uppercase tracking-wide">Packaged Beer</div>
             </div>
         </div>

      </div>
    </section>
  </main>

  <!-- TIPS & FUN FACTS SECTION -->
  <section class="py-16 px-4 bg-white border-t border-neutral-200">
    <div class="max-w-7xl mx-auto relative z-10">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
        
        <!-- Tips Column -->
        <div>
          <h3 class="text-3xl font-display font-bold text-neutral-900 mb-8 flex items-center uppercase">
            <i data-lucide="thermometer" class="w-8 h-8 mr-3 text-jeff-orange"></i>
            Tips for Brewing Craft Beer
          </h3>
          <div class="space-y-6">
            <div class="flex gap-4">
              <div class="flex-shrink-0 w-8 h-8 rounded-full bg-jeff-teal text-white flex items-center justify-center font-bold">1</div>
              <div>
                <h4 class="font-bold text-lg text-neutral-900">Start with clean equipment</h4>
                <p class="text-neutral-600 text-sm">Sanitation is crucial; even a tiny contamination can spoil a batch, so always clean and sanitize your brewing tools before use.</p>
              </div>
            </div>
            <div class="flex gap-4">
              <div class="flex-shrink-0 w-8 h-8 rounded-full bg-jeff-teal text-white flex items-center justify-center font-bold">2</div>
              <div>
                <h4 class="font-bold text-lg text-neutral-900">Choose the right yeast</h4>
                <p class="text-neutral-600 text-sm">Different yeast strains dramatically affect flavor profiles. Ale yeasts tend to be fruity and aromatic, while lager yeasts produce a clean, crisp taste.</p>
              </div>
            </div>
            <div class="flex gap-4">
              <div class="flex-shrink-0 w-8 h-8 rounded-full bg-jeff-teal text-white flex items-center justify-center font-bold">3</div>
              <div>
                <h4 class="font-bold text-lg text-neutral-900">Pay attention to water</h4>
                <p class="text-neutral-600 text-sm">Water chemistry influences beer flavor. Some breweries adjust mineral content to mimic famous beer regions, like the soft water used in Pilsners or hard water for IPAs.</p>
              </div>
            </div>
            <div class="flex gap-4">
              <div class="flex-shrink-0 w-8 h-8 rounded-full bg-jeff-teal text-white flex items-center justify-center font-bold">4</div>
              <div>
                <h4 class="font-bold text-lg text-neutral-900">Control fermentation temperature</h4>
                <p class="text-neutral-600 text-sm">Keeping your beer at proper temperatures helps the yeast work efficiently and avoids off-flavors. For ales, this is generally warmer (18–22°C), while lagers require cooler temperatures (7–13°C).</p>
              </div>
            </div>
            <div class="flex gap-4">
              <div class="flex-shrink-0 w-8 h-8 rounded-full bg-jeff-teal text-white flex items-center justify-center font-bold">5</div>
              <div>
                <h4 class="font-bold text-lg text-neutral-900">Experiment with ingredients</h4>
                <p class="text-neutral-600 text-sm">Hops, spices, fruits, or even coffee and chocolate can be added to create unique flavors, making craft brewing a playground for creativity.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Fun Facts Column -->
        <div class="bg-neutral-50 p-8 rounded-3xl border border-neutral-200 shadow-lg">
          <h3 class="text-3xl font-display font-bold text-neutral-900 mb-8 flex items-center uppercase">
            <i data-lucide="beer" class="w-8 h-8 mr-3 text-jeff-gold"></i>
            Fun Facts About Craft Beer
          </h3>
          <ul class="space-y-5">
            <li class="flex items-start">
              <span class="text-jeff-orange mr-3 mt-1 text-xl">•</span>
              <p class="text-neutral-700 text-sm"><strong class="text-neutral-900">Beer is ancient:</strong> Brewing dates back over 7,000 years, with evidence from ancient Mesopotamia showing that beer was often safer to drink than water.</p>
            </li>
            <li class="flex items-start">
              <span class="text-jeff-orange mr-3 mt-1 text-xl">•</span>
              <p class="text-neutral-700 text-sm"><strong class="text-neutral-900">Yeast diversity matters:</strong> There are hundreds of brewing yeast strains, each giving different aromas and tastes; some wild yeasts create sour or funky beers.</p>
            </li>
            <li class="flex items-start">
              <span class="text-jeff-orange mr-3 mt-1 text-xl">•</span>
              <p class="text-neutral-700 text-sm"><strong class="text-neutral-900">Malt color affects flavor and beer color:</strong> Roasting malts darker adds caramel, chocolate, or toasted flavors, while pale malts keep beer lighter in color and body.</p>
            </li>
            <li class="flex items-start">
              <span class="text-jeff-orange mr-3 mt-1 text-xl">•</span>
              <p class="text-neutral-700 text-sm"><strong class="text-neutral-900">Hops as natural preservatives:</strong> Hops not only add bitterness and aroma but historically helped preserve beer. The word “hoppiness” reflects this aromatic addition.</p>
            </li>
            <li class="flex items-start">
              <span class="text-jeff-orange mr-3 mt-1 text-xl">•</span>
              <p class="text-neutral-700 text-sm"><strong class="text-neutral-900">Small batches, big creativity:</strong> Craft brewers often experiment with microbatches before scaling up, allowing for seasonal or limited-edition beers that push flavor boundaries.</p>
            </li>
            <li class="flex items-start">
              <span class="text-jeff-orange mr-3 mt-1 text-xl">•</span>
              <p class="text-neutral-700 text-sm"><strong class="text-neutral-900">Beer can age like wine:</strong> Some strong ales, stouts, and sours improve with time, developing complex flavors as they mature in bottles or barrels.</p>
            </li>
          </ul>
          <div class="mt-8 p-4 bg-jeff-teal/10 rounded-xl border border-jeff-teal/20">
            <p class="text-jeff-teal font-bold italic text-center text-sm">
              Whether you’re a beginner or an enthusiast, the craft beer world offers endless opportunities to explore flavors and techniques, turning brewing into a fun, experimental hobby.
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const nodes = document.querySelectorAll('.flowchart-node');
    const resetFilterBtn = document.getElementById('reset-filter-btn');
    const activeFilterBadge = document.getElementById('active-filter-badge');

    // Stage labels mapping
    const stageLabels = {
        red: 'Hot Processes',
        blue: 'Cold Processes',
        green: 'Biological Processes',
        yellow: 'Packaging & QC'
    };

    const applyFilter = (color) => {
        // Update UI Badges
        activeFilterBadge.textContent = stageLabels[color];
        activeFilterBadge.classList.remove('hidden');
        resetFilterBtn.classList.remove('hidden');

        // Apply filter classes
        nodes.forEach(node => {
            const nodeColor = node.dataset.color;
            const line = node.querySelector('.flowchart-line');
            if (nodeColor === color) {
                node.classList.remove('opacity-25', 'scale-95');
                node.classList.add('opacity-100', 'scale-100');
                if (line) line.classList.remove('opacity-25');
            } else {
                node.classList.remove('opacity-100', 'scale-100');
                node.classList.add('opacity-25', 'scale-95');
                if (line) line.classList.add('opacity-25');
            }
        });
    };

    const resetFilter = () => {
        activeFilterBadge.classList.add('hidden');
        resetFilterBtn.classList.add('hidden');

        nodes.forEach(node => {
            const line = node.querySelector('.flowchart-line');
            node.classList.remove('opacity-25', 'scale-95');
            node.classList.add('opacity-100', 'scale-100');
            if (line) line.classList.remove('opacity-25');
        });
    };

    // Attach click events to the filter panels on the left
    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const stage = btn.dataset.stage;
            applyFilter(stage);
        });
    });

    // Reset button
    resetFilterBtn.addEventListener('click', resetFilter);

    // Initialize Lucide icons
    if (window.lucide) {
        window.lucide.createIcons();
    }
});
</script>
