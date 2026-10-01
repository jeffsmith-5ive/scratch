<div class="min-h-screen font-sans text-[#f5f0e8] selection:bg-[var(--gold)]/20 pb-20 animate-fade-in">
  <!-- Header -->
  <header class="border-b border-white/5 bg-gradient-to-b from-black to-neutral-950 py-16 px-6 text-center relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://images.unsplash.com/photo-1505075933665-af84038281ce?q=80&w=2000&auto=format&fit=crop')] bg-cover bg-center"></div>
    <div class="max-w-3xl mx-auto relative z-10">
      <div class="inline-block p-4 bg-neutral-900 rounded-full mb-6 shadow-xl border border-white/10">
        <i data-lucide="beer" class="w-12 h-12 text-[var(--gold)]"></i>
      </div>
      <h1 class="text-4xl md:text-6xl font-oswald font-extrabold mb-6 tracking-tight text-white uppercase">
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
      <div class="bg-[#111111] border border-white/10 p-8 rounded-3xl shadow-2xl">
        <h2 class="text-3xl font-oswald font-bold mb-6 flex items-center gap-3 text-white uppercase">
          <i data-lucide="info" class="text-[var(--teal)] w-8 h-8"></i>
          What is the Brewer Guide?
        </h2>
        <div class="space-y-4 text-neutral-300 text-lg leading-relaxed">
          <p>
            The <strong>Brewer Guide</strong> is an interactive digital persona and expert representing the meticulous art of craft beer brewing. The craft beer brewing process involves a series of precise steps—including mashing, boiling, fermenting, conditioning, and packaging—to produce complex flavors and high-quality beer.
          </p>
          <p>
            Craft breweries focus on small-batch production, unique recipes, and flavor experimentation. This allows for diverse beer styles like IPAs, stouts, sours, and saisons. Attention to ingredient quality, water chemistry, and fermentation control is critical to achieving signature flavors.
          </p>
          <div class="pt-4 space-y-2.5">
            <button 
              onclick="const chatToggle = document.getElementById('chatbot-toggle'); if (chatToggle) { if (document.getElementById('chatbot-window').classList.contains('hidden')) chatToggle.click(); document.getElementById('chat-input')?.focus(); }"
              class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-[var(--teal)] to-[var(--gold)] hover:opacity-95 text-white py-3.5 px-6 rounded-xl font-bold transition-all shadow-lg hover:shadow-xl focus:outline-none uppercase tracking-wider text-xs"
            >
              <i data-lucide="sparkles" class="w-4 h-4 text-white"></i>
              Ask Brewer Guide AI Advisor
            </button>
            <p class="text-[11px] text-neutral-400 text-center">Powered by 4-Layer Beer Intelligence & Live Inventory</p>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 gap-4">
        <div class="bg-[#111111] border border-white/10 hover:border-red-500/50 p-6 rounded-2xl border-l-4 border-l-red-500 shadow-sm hover:shadow-md transition duration-300 cursor-pointer filter-btn" data-stage="red">
          <h3 class="font-bold text-white mb-2 text-lg">Hot Processes</h3>
          <p class="text-neutral-400 text-sm">Malting, mashing, lautering, and boiling. These steps extract sugars and sterilize the wort.</p>
        </div>
        <div class="bg-[#111111] border border-white/10 hover:border-blue-500/50 p-6 rounded-2xl border-l-4 border-l-blue-500 shadow-sm hover:shadow-md transition duration-300 cursor-pointer filter-btn" data-stage="blue">
          <h3 class="font-bold text-white mb-2 text-lg">Cold Processes</h3>
          <p class="text-neutral-400 text-sm">Cooling and conditioning. Temperature control is vital for clarity and flavor mellowing.</p>
        </div>
        <div class="bg-[#111111] border border-white/10 hover:border-green-500/50 p-6 rounded-2xl border-l-4 border-l-green-500 shadow-sm hover:shadow-md transition duration-300 cursor-pointer filter-btn" data-stage="green">
          <h3 class="font-bold text-white mb-2 text-lg">Biological Processes</h3>
          <p class="text-neutral-400 text-sm">Yeast pitching and fermentation. This is where sugars become alcohol and CO₂.</p>
        </div>
        <div class="bg-[#111111] border border-white/10 hover:border-yellow-500/50 p-6 rounded-2xl border-l-4 border-l-yellow-500 shadow-sm hover:shadow-md transition duration-300 cursor-pointer filter-btn" data-stage="yellow">
          <h3 class="font-bold text-white mb-2 text-lg">Packaging & QC</h3>
          <p class="text-neutral-400 text-sm">Quality checks, carbonation, and final packaging into kegs, cans, or bottles.</p>
        </div>
      </div>
    </section>

    <!-- Flowchart Section -->
    <section class="lg:col-span-8 bg-[#111111] border border-white/10 rounded-3xl shadow-2xl overflow-hidden flex flex-col">
      <div class="p-6 border-b border-white/10 bg-black/40 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
          <h2 class="text-2xl font-oswald font-bold text-white uppercase">The Brewing Flowchart</h2>
          <p class="text-neutral-400 mt-1 text-sm">Interactive step-by-step process. Drag to pan, scroll to zoom. Use controls or left panels to filter.</p>
        </div>
        <!-- Active Filter Badge -->
        <div class="flex items-center gap-2">
            <button id="reset-filter-btn" class="hidden text-xs font-bold text-[var(--rust)] hover:text-red-400 hover:underline focus:outline-none">Clear Filter</button>
            <span id="active-filter-badge" class="hidden text-xs font-bold px-3 py-1 bg-[var(--teal)]/20 text-[var(--teal)] border border-[var(--teal)]/20 rounded-full uppercase"></span>
        </div>
      </div>
      
      <!-- Flowchart Container -->
      <div class="relative flex-1 w-full h-[650px] bg-black/60 overflow-hidden select-none cursor-grab" id="flowchart-viewer">
          <!-- Pannable Content Canvas -->
          <div class="absolute origin-top-left transition-transform duration-75 ease-out" id="flowchart-canvas" style="width: 800px; height: 3250px;">
              <!-- Grid & Edges SVG -->
              <svg class="absolute inset-0 w-full h-full pointer-events-none" xmlns="http://www.w3.org/2000/svg">
                  <defs>
                      <pattern id="grid" width="30" height="30" patternUnits="userSpaceOnUse">
                          <rect width="30" height="30" fill="none" />
                          <circle cx="15" cy="15" r="1" fill="rgba(255,255,255,0.07)" />
                      </pattern>
                      
                      <!-- Arrow Markers -->
                      <marker id="arrow-red" viewBox="0 0 10 10" refX="6" refY="5" markerWidth="6" markerHeight="6" orient="auto-start-reverse">
                          <path d="M 0 0 L 10 5 L 0 10 z" fill="#ef4444" />
                      </marker>
                      <marker id="arrow-blue" viewBox="0 0 10 10" refX="6" refY="5" markerWidth="6" markerHeight="6" orient="auto-start-reverse">
                          <path d="M 0 0 L 10 5 L 0 10 z" fill="#3b82f6" />
                      </marker>
                      <marker id="arrow-green" viewBox="0 0 10 10" refX="6" refY="5" markerWidth="6" markerHeight="6" orient="auto-start-reverse">
                          <path d="M 0 0 L 10 5 L 0 10 z" fill="#22c55e" />
                      </marker>
                      <marker id="arrow-yellow" viewBox="0 0 10 10" refX="6" refY="5" markerWidth="6" markerHeight="6" orient="auto-start-reverse">
                          <path d="M 0 0 L 10 5 L 0 10 z" fill="#eab308" />
                      </marker>
                  </defs>
                  
                  <rect width="100%" height="100%" fill="url(#grid)" />
                  
                  <!-- Edges (Connecting Paths) -->
                  <!-- Start -> 1 -->
                  <path d="M 400 110 L 400 180" stroke="#ef4444" stroke-width="3" fill="none" marker-end="url(#arrow-red)" class="flowchart-line transition duration-300" data-color="red" />
                  <!-- 1 -> 2 -->
                  <path d="M 400 320 L 400 380" stroke="#ef4444" stroke-width="3" fill="none" marker-end="url(#arrow-red)" class="flowchart-line transition duration-300" data-color="red" />
                  <!-- 2 -> 3 -->
                  <path d="M 400 520 L 400 580" stroke="#ef4444" stroke-width="3" fill="none" marker-end="url(#arrow-red)" class="flowchart-line transition duration-300" data-color="red" />
                  <!-- 3 -> 4 -->
                  <path d="M 400 720 L 400 780" stroke="#ef4444" stroke-width="3" fill="none" marker-end="url(#arrow-red)" class="flowchart-line transition duration-300" data-color="red" />
                  <!-- 4 -> 5 -->
                  <path d="M 400 920 L 400 980" stroke="#ef4444" stroke-width="3" fill="none" marker-end="url(#arrow-red)" class="flowchart-line transition duration-300" data-color="red" />
                  <!-- 5 -> 6 -->
                  <path d="M 400 1120 L 400 1180" stroke="#ef4444" stroke-width="3" fill="none" marker-end="url(#arrow-red)" class="flowchart-line transition duration-300" data-color="red" />
                  <!-- 6 -> 7 -->
                  <path d="M 400 1320 L 400 1380" stroke="#ef4444" stroke-width="3" fill="none" marker-end="url(#arrow-red)" class="flowchart-line transition duration-300" data-color="red" />
                  <!-- 7 -> 8 -->
                  <path d="M 400 1520 L 400 1580" stroke="#3b82f6" stroke-width="3" fill="none" marker-end="url(#arrow-blue)" class="flowchart-line transition duration-300" data-color="blue" />
                  <!-- 8 -> 9 -->
                  <path d="M 400 1720 L 400 1780" stroke="#22c55e" stroke-width="3" fill="none" marker-end="url(#arrow-green)" class="flowchart-line transition duration-300" data-color="green" />
                  <!-- 9 -> d1 -->
                  <path d="M 400 1920 L 400 2020" stroke="#22c55e" stroke-width="3" fill="none" marker-end="url(#arrow-green)" class="flowchart-line transition duration-300" data-color="green" />
                  
                  <!-- d1 -> 10 (Yes) -->
                  <path d="M 400 2212 L 400 2280" stroke="#22c55e" stroke-width="3" fill="none" marker-end="url(#arrow-green)" class="flowchart-line transition duration-300" data-color="green" />
                  <!-- d1 -> 9 (No loopback) -->
                  <path d="M 496 2116 L 620 2116 L 620 1850 L 560 1850" stroke="#22c55e" stroke-dasharray="5,5" stroke-width="3" fill="none" marker-end="url(#arrow-green)" class="flowchart-line transition duration-300" data-color="green" />
                  
                  <!-- 10 -> d2 -->
                  <path d="M 400 2420 L 400 2520" stroke="#3b82f6" stroke-width="3" fill="none" marker-end="url(#arrow-blue)" class="flowchart-line transition duration-300" data-color="blue" />
                  <!-- d2 -> 11 (Yes) -->
                  <path d="M 400 2712 L 400 2780" stroke="#eab308" stroke-width="3" fill="none" marker-end="url(#arrow-yellow)" class="flowchart-line transition duration-300" data-color="yellow" />
                  <!-- d2 -> 10 (No loopback) -->
                  <path d="M 496 2616 L 620 2616 L 620 2350 L 560 2350" stroke="#eab308" stroke-dasharray="5,5" stroke-width="3" fill="none" marker-end="url(#arrow-yellow)" class="flowchart-line transition duration-300" data-color="yellow" />
                  
                  <!-- 11 -> end -->
                  <path d="M 400 2920 L 400 2980" stroke="#eab308" stroke-width="3" fill="none" marker-end="url(#arrow-yellow)" class="flowchart-line transition duration-300" data-color="yellow" />
              </svg>
              
              <!-- HTML Nodes positioned absolute -->
              <!-- Start: Raw Grain -->
              <div class="absolute flowchart-node transition duration-300" style="left: 300px; top: 50px; width: 200px;" data-color="red">
                  <div class="px-6 py-4 shadow-xl rounded-[3rem] bg-black/90 backdrop-blur border-2 border-red-500 text-center transform transition duration-300 hover:scale-105">
                      <div class="font-bold text-white text-lg uppercase tracking-wide">Raw Grain</div>
                  </div>
              </div>
              
              <!-- 1. Malting -->
              <div class="absolute flowchart-node transition duration-300" style="left: 240px; top: 180px; width: 320px;" data-color="red">
                  <div class="px-5 py-4 shadow-xl rounded-xl bg-black/90 backdrop-blur border-2 border-red-500/80 transform transition duration-300 hover:scale-105">
                      <div class="flex items-center gap-3 mb-3">
                          <div class="p-2.5 rounded-xl bg-red-500/10 text-red-400">
                              <i data-lucide="wheat" class="w-5 h-5"></i>
                          </div>
                          <div class="font-bold text-white text-lg">1. Malting</div>
                      </div>
                      <div class="text-sm text-neutral-300 leading-relaxed font-light">
                          Convert raw grain starches into fermentable sugars.<br>
                          • Steeping (2-3 days)<br>
                          • Germination (4-6 days)<br>
                          • Kilning/Roasting
                      </div>
                  </div>
              </div>
              
              <!-- 2. Milling -->
              <div class="absolute flowchart-node transition duration-300" style="left: 240px; top: 380px; width: 320px;" data-color="red">
                  <div class="px-5 py-4 shadow-xl rounded-xl bg-black/90 backdrop-blur border-2 border-red-500/80 transform transition duration-300 hover:scale-105">
                      <div class="flex items-center gap-3 mb-3">
                          <div class="p-2.5 rounded-xl bg-red-500/10 text-red-400">
                              <i data-lucide="settings" class="w-5 h-5"></i>
                          </div>
                          <div class="font-bold text-white text-lg">2. Milling</div>
                      </div>
                      <div class="text-sm text-neutral-300 leading-relaxed font-light">
                          Break open grain husks to expose starches for mashing.<br>
                          • Adjust mill rollers<br>
                          • Collect grist
                      </div>
                  </div>
              </div>
              
              <!-- 3. Mashing -->
              <div class="absolute flowchart-node transition duration-300" style="left: 240px; top: 580px; width: 320px;" data-color="red">
                  <div class="px-5 py-4 shadow-xl rounded-xl bg-black/90 backdrop-blur border-2 border-red-500/80 transform transition duration-300 hover:scale-105">
                      <div class="flex items-center gap-3 mb-3">
                          <div class="p-2.5 rounded-xl bg-red-500/10 text-red-400">
                              <i data-lucide="thermometer" class="w-5 h-5"></i>
                          </div>
                          <div class="font-bold text-white text-lg">3. Mashing</div>
                      </div>
                      <div class="text-sm text-neutral-300 leading-relaxed font-light">
                          Extract fermentable sugars from grains.<br>
                          • Temp: 60–70°C (140–158°F)<br>
                          • Saccharification<br>
                          • Resting
                      </div>
                  </div>
              </div>
              
              <!-- 4. Lautering -->
              <div class="absolute flowchart-node transition duration-300" style="left: 240px; top: 780px; width: 320px;" data-color="red">
                  <div class="px-5 py-4 shadow-xl rounded-xl bg-black/90 backdrop-blur border-2 border-red-500/80 transform transition duration-300 hover:scale-105">
                      <div class="flex items-center gap-3 mb-3">
                          <div class="p-2.5 rounded-xl bg-red-500/10 text-red-400">
                              <i data-lucide="droplets" class="w-5 h-5"></i>
                          </div>
                          <div class="font-bold text-white text-lg">4. Lautering</div>
                      </div>
                      <div class="text-sm text-neutral-300 leading-relaxed font-light">
                          Separate wort from spent grains.<br>
                          • Vorlauf recirculation<br>
                          • Sparging with hot water<br>
                          • Collect wort
                      </div>
                  </div>
              </div>
              
              <!-- 5. Boiling & Hopping -->
              <div class="absolute flowchart-node transition duration-300" style="left: 240px; top: 980px; width: 320px;" data-color="red">
                  <div class="px-5 py-4 shadow-xl rounded-xl bg-black/90 backdrop-blur border-2 border-red-500/80 transform transition duration-300 hover:scale-105">
                      <div class="flex items-center gap-3 mb-3">
                          <div class="p-2.5 rounded-xl bg-red-500/10 text-red-400">
                              <i data-lucide="flask-conical" class="w-5 h-5"></i>
                          </div>
                          <div class="font-bold text-white text-lg">5. Boiling & Hopping</div>
                      </div>
                      <div class="text-sm text-neutral-300 leading-relaxed font-light">
                          Sterilize wort, extract hop bitterness/aroma.<br>
                          • Boil 60–90 mins<br>
                          • Early hops (bitterness)<br>
                          • Late hops (aroma)
                      </div>
                  </div>
              </div>
              
              <!-- 6. Whirlpooling -->
              <div class="absolute flowchart-node transition duration-300" style="left: 240px; top: 1180px; width: 320px;" data-color="red">
                  <div class="px-5 py-4 shadow-xl rounded-xl bg-black/90 backdrop-blur border-2 border-red-500/80 transform transition duration-300 hover:scale-105">
                      <div class="flex items-center gap-3 mb-3">
                          <div class="p-2.5 rounded-xl bg-red-500/10 text-red-400">
                              <i data-lucide="wind" class="w-5 h-5"></i>
                          </div>
                          <div class="font-bold text-white text-lg">6. Whirlpooling</div>
                      </div>
                      <div class="text-sm text-neutral-300 leading-relaxed font-light">
                          Clarify wort by separating hop/trub solids.<br>
                          • Circulate at high speed<br>
                          • Pump clear wort
                      </div>
                  </div>
              </div>
              
              <!-- 7. Wort Cooling -->
              <div class="absolute flowchart-node transition duration-300" style="left: 240px; top: 1380px; width: 320px;" data-color="blue">
                  <div class="px-5 py-4 shadow-xl rounded-xl bg-black/90 backdrop-blur border-2 border-blue-500/80 transform transition duration-300 hover:scale-105">
                      <div class="flex items-center gap-3 mb-3">
                          <div class="p-2.5 rounded-xl bg-blue-500/10 text-blue-400">
                              <i data-lucide="snowflake" class="w-5 h-5"></i>
                          </div>
                          <div class="font-bold text-white text-lg">7. Wort Cooling</div>
                      </div>
                      <div class="text-sm text-neutral-300 leading-relaxed font-light">
                          Rapidly cool wort to yeast pitching temp.<br>
                          • Ale: 20–22°C (68–72°F)<br>
                          • Lager: 9–15°C (48–59°F)
                      </div>
                  </div>
              </div>
              
              <!-- 8. Yeast Pitching -->
              <div class="absolute flowchart-node transition duration-300" style="left: 240px; top: 1580px; width: 320px;" data-color="green">
                  <div class="px-5 py-4 shadow-xl rounded-xl bg-black/90 backdrop-blur border-2 border-green-500/80 transform transition duration-300 hover:scale-105">
                      <div class="flex items-center gap-3 mb-3">
                          <div class="p-2.5 rounded-xl bg-green-500/10 text-green-400">
                              <i data-lucide="beaker" class="w-5 h-5"></i>
                          </div>
                          <div class="font-bold text-white text-lg">8. Yeast Pitching</div>
                      </div>
                      <div class="text-sm text-neutral-300 leading-relaxed font-light">
                          Begin fermentation.<br>
                          • Add active yeast<br>
                          • Aerate oxygen (~5 mins)<br>
                          • Maintain sanitation
                      </div>
                  </div>
              </div>
              
              <!-- 9. Fermentation -->
              <div class="absolute flowchart-node transition duration-300" style="left: 240px; top: 1780px; width: 320px;" data-color="green" id="node-fermentation">
                  <div class="px-5 py-4 shadow-xl rounded-xl bg-black/90 backdrop-blur border-2 border-green-500/80 transform transition duration-300 hover:scale-105">
                      <div class="flex items-center gap-3 mb-3">
                          <div class="p-2.5 rounded-xl bg-green-500/10 text-green-400">
                              <i data-lucide="timer" class="w-5 h-5"></i>
                          </div>
                          <div class="font-bold text-white text-lg">9. Fermentation</div>
                      </div>
                      <div class="text-sm text-neutral-300 leading-relaxed font-light">
                          Convert sugars into alcohol and CO₂.<br>
                          • Duration: 5–14 days<br>
                          • Gravity monitoring<br>
                          • Sediment settles
                      </div>
                  </div>
              </div>
              
              <!-- Decision 1: Gravity Check? -->
              <div class="absolute flowchart-node transition duration-300" style="left: 304px; top: 2020px; width: 192px; height: 192px;" data-color="green" id="node-gravity-check">
                  <div class="relative w-full h-full flex items-center justify-center transform transition duration-300 hover:scale-105">
                      <div class="absolute inset-0 transform rotate-45 border-2 shadow-xl bg-black/90 backdrop-blur border-green-500/80 rounded-xl"></div>
                      <div class="relative z-10 text-center p-4">
                          <div class="font-bold text-white text-sm mb-1 uppercase tracking-wide">Gravity Check?</div>
                          <div class="text-[10px] text-neutral-400 leading-tight">Is fermentation complete?</div>
                      </div>
                  </div>
                  
                  <!-- Yes/No Labels -->
                  <div class="absolute top-[200px] left-1/2 -translate-x-1/2 font-bold text-xs bg-neutral-900 text-green-400 px-2 py-0.5 rounded-full border border-green-500/30 z-20">Yes</div>
                  <div class="absolute top-[80px] left-[200px] font-bold text-xs bg-neutral-900 text-green-400 px-2 py-0.5 rounded-full border border-green-500/30 z-20 whitespace-nowrap">No (Wait)</div>
              </div>
              
              <!-- 10. Maturation / Conditioning -->
              <div class="absolute flowchart-node transition duration-300" style="left: 240px; top: 2280px; width: 320px;" data-color="blue" id="node-maturation">
                  <div class="px-5 py-4 shadow-xl rounded-xl bg-black/90 backdrop-blur border-2 border-blue-500/80 transform transition duration-300 hover:scale-105">
                      <div class="flex items-center gap-3 mb-3">
                          <div class="p-2.5 rounded-xl bg-blue-500/10 text-blue-400">
                              <i data-lucide="snowflake" class="w-5 h-5"></i>
                          </div>
                          <div class="font-bold text-white text-lg">10. Maturation / Conditioning</div>
                      </div>
                      <div class="text-sm text-neutral-300 leading-relaxed font-light">
                          Clarify beer, develop flavor.<br>
                          • Cold storage (0–4°C)<br>
                          • Optional dry hopping<br>
                          • Clarification
                      </div>
                  </div>
              </div>
              
              <!-- Decision 2: Quality Pass? -->
              <div class="absolute flowchart-node transition duration-300" style="left: 304px; top: 2520px; width: 192px; height: 192px;" data-color="yellow" id="node-quality-pass">
                  <div class="relative w-full h-full flex items-center justify-center transform transition duration-300 hover:scale-105">
                      <div class="absolute inset-0 transform rotate-45 border-2 shadow-xl bg-black/90 backdrop-blur border-yellow-500/80 rounded-xl"></div>
                      <div class="relative z-10 text-center p-4">
                          <div class="font-bold text-white text-sm mb-1 uppercase tracking-wide">Quality Pass?</div>
                          <div class="text-[10px] text-neutral-400 leading-tight">DO, CO₂, color, bitterness OK?</div>
                      </div>
                  </div>
                  
                  <!-- Yes/No Labels -->
                  <div class="absolute top-[200px] left-1/2 -translate-x-1/2 font-bold text-xs bg-neutral-900 text-yellow-400 px-2 py-0.5 rounded-full border border-yellow-500/30 z-20">Yes</div>
                  <div class="absolute top-[80px] left-[200px] font-bold text-xs bg-neutral-900 text-yellow-400 px-2 py-0.5 rounded-full border border-yellow-500/30 z-20 whitespace-nowrap">No (Adjust)</div>
              </div>
              
              <!-- 11. Packaging -->
              <div class="absolute flowchart-node transition duration-300" style="left: 240px; top: 2780px; width: 320px;" data-color="yellow">
                  <div class="px-5 py-4 shadow-xl rounded-xl bg-black/90 backdrop-blur border-2 border-yellow-500/80 transform transition duration-300 hover:scale-105">
                      <div class="flex items-center gap-3 mb-3">
                          <div class="p-2.5 rounded-xl bg-yellow-500/10 text-yellow-400">
                              <i data-lucide="package" class="w-5 h-5"></i>
                          </div>
                          <div class="font-bold text-white text-lg">11. Packaging</div>
                      </div>
                      <div class="text-sm text-neutral-300 leading-relaxed font-light">
                          Prepare beer for distribution.<br>
                          • Carbonation adjustment<br>
                          • Sealing & labeling<br>
                          • Cans, bottles, kegs
                      </div>
                  </div>
              </div>
              
              <!-- End: Packaged Beer -->
              <div class="absolute flowchart-node transition duration-300" style="left: 300px; top: 2980px; width: 200px;" data-color="yellow">
                  <div class="px-6 py-4 shadow-xl rounded-[3rem] bg-black/90 backdrop-blur border-2 border-yellow-500 text-center transform transition duration-300 hover:scale-105">
                      <div class="font-bold text-white text-lg uppercase tracking-wide">Packaged Beer</div>
                  </div>
              </div>
          </div>
          
          <!-- Zoom & Pan Control Panel Overlay -->
          <div class="absolute bottom-6 left-6 z-20 flex flex-col gap-2 bg-neutral-900/90 backdrop-blur p-2 rounded-xl shadow-2xl border border-white/10">
              <button id="zoom-in-btn" class="p-2 hover:bg-white/10 rounded-lg text-neutral-300 transition focus:outline-none" title="Zoom In">
                  <i data-lucide="plus" class="w-5 h-5"></i>
              </button>
              <button id="zoom-out-btn" class="p-2 hover:bg-white/10 rounded-lg text-neutral-300 transition focus:outline-none" title="Zoom Out">
                  <i data-lucide="minus" class="w-5 h-5"></i>
              </button>
              <button id="zoom-reset-btn" class="p-2 hover:bg-white/10 rounded-lg text-neutral-300 transition focus:outline-none" title="Fit View">
                  <i data-lucide="maximize" class="w-5 h-5"></i>
              </button>
          </div>
      </div>
    </section>
  </main>

  <!-- TIPS & FUN FACTS SECTION -->
  <section class="py-16 px-4 border-t border-white/5 bg-black/20">
    <div class="max-w-7xl mx-auto relative z-10">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
        
        <!-- Tips Column -->
        <div>
          <h3 class="text-3xl font-oswald font-bold text-white mb-8 flex items-center uppercase">
            <i data-lucide="thermometer" class="w-8 h-8 mr-3 text-[var(--gold)]"></i>
            Tips for Brewing Craft Beer
          </h3>
          <div class="space-y-6">
            <div class="flex gap-4">
              <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[var(--teal)] text-white border border-[var(--teal)]/20 flex items-center justify-center font-bold">1</div>
              <div>
                <h4 class="font-bold text-lg text-white">Start with clean equipment</h4>
                <p class="text-neutral-400 text-sm">Sanitation is crucial; even a tiny contamination can spoil a batch, so always clean and sanitize your brewing tools before use.</p>
              </div>
            </div>
            <div class="flex gap-4">
              <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[var(--teal)] text-white border border-[var(--teal)]/20 flex items-center justify-center font-bold">2</div>
              <div>
                <h4 class="font-bold text-lg text-white">Choose the right yeast</h4>
                <p class="text-neutral-400 text-sm">Different yeast strains dramatically affect flavor profiles. Ale yeasts tend to be fruity and aromatic, while lager yeasts produce a clean, crisp taste.</p>
              </div>
            </div>
            <div class="flex gap-4">
              <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[var(--teal)] text-white border border-[var(--teal)]/20 flex items-center justify-center font-bold">3</div>
              <div>
                <h4 class="font-bold text-lg text-white">Pay attention to water</h4>
                <p class="text-neutral-400 text-sm">Water chemistry influences beer flavor. Some breweries adjust mineral content to mimic famous beer regions, like the soft water used in Pilsners or hard water for IPAs.</p>
              </div>
            </div>
            <div class="flex gap-4">
              <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[var(--teal)] text-white border border-[var(--teal)]/20 flex items-center justify-center font-bold">4</div>
              <div>
                <h4 class="font-bold text-lg text-white">Control fermentation temperature</h4>
                <p class="text-neutral-400 text-sm">Keeping your beer at proper temperatures helps the yeast work efficiently and avoids off-flavors. For ales, this is generally warmer (18–22°C), while lagers require cooler temperatures (7–13°C).</p>
              </div>
            </div>
            <div class="flex gap-4">
              <div class="flex-shrink-0 w-8 h-8 rounded-full bg-[var(--teal)] text-white border border-[var(--teal)]/20 flex items-center justify-center font-bold">5</div>
              <div>
                <h4 class="font-bold text-lg text-white">Experiment with ingredients</h4>
                <p class="text-neutral-400 text-sm">Hops, spices, fruits, or even coffee and chocolate can be added to create unique flavors, making craft brewing a playground for creativity.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Fun Facts Column -->
        <div class="bg-[#111111] p-8 rounded-3xl border border-white/10 shadow-2xl">
          <h3 class="text-3xl font-oswald font-bold text-white mb-8 flex items-center uppercase">
            <i data-lucide="beer" class="w-8 h-8 mr-3 text-[var(--gold)]"></i>
            Fun Facts About Craft Beer
          </h3>
          <ul class="space-y-5">
            <li class="flex items-start">
              <span class="text-[var(--rust)] mr-3 mt-1 text-xl">•</span>
              <p class="text-neutral-300 text-sm"><strong class="text-white">Beer is ancient:</strong> Brewing dates back over 7,000 years, with evidence from ancient Mesopotamia showing that beer was often safer to drink than water.</p>
            </li>
            <li class="flex items-start">
              <span class="text-[var(--rust)] mr-3 mt-1 text-xl">•</span>
              <p class="text-neutral-300 text-sm"><strong class="text-white">Yeast diversity matters:</strong> There are hundreds of brewing yeast strains, each giving different aromas and tastes; some wild yeasts create sour or funky beers.</p>
            </li>
            <li class="flex items-start">
              <span class="text-[var(--rust)] mr-3 mt-1 text-xl">•</span>
              <p class="text-neutral-300 text-sm"><strong class="text-white">Malt color affects flavor and beer color:</strong> Roasting malts darker adds caramel, chocolate, or toasted flavors, while pale malts keep beer lighter in color and body.</p>
            </li>
            <li class="flex items-start">
              <span class="text-[var(--rust)] mr-3 mt-1 text-xl">•</span>
              <p class="text-neutral-300 text-sm"><strong class="text-white">Hops as natural preservatives:</strong> Hops not only add bitterness and aroma but historically helped preserve beer. The word “hoppiness” reflects this aromatic addition.</p>
            </li>
            <li class="flex items-start">
              <span class="text-[var(--rust)] mr-3 mt-1 text-xl">•</span>
              <p class="text-neutral-300 text-sm"><strong class="text-white">Small batches, big creativity:</strong> Craft brewers often experiment with microbatches before scaling up, allowing for seasonal or limited-edition beers that push flavor boundaries.</p>
            </li>
            <li class="flex items-start">
              <span class="text-[var(--rust)] mr-3 mt-1 text-xl">•</span>
              <p class="text-neutral-300 text-sm"><strong class="text-white">Beer can age like wine:</strong> Some strong ales, stouts, and sours improve with time, developing complex flavors as they mature in bottles or barrels.</p>
            </li>
          </ul>
          <div class="mt-8 p-5 bg-[var(--teal)]/10 rounded-xl border border-[var(--teal)]/25">
            <p class="text-[var(--teal)] font-bold italic text-center text-sm">
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

        // Apply filter classes to nodes
        nodes.forEach(node => {
            const nodeColor = node.dataset.color;
            if (nodeColor === color) {
                node.classList.remove('opacity-25', 'scale-95');
                node.classList.add('opacity-100', 'scale-100');
            } else {
                node.classList.remove('opacity-100', 'scale-100');
                node.classList.add('opacity-25', 'scale-95');
            }
        });

        // Apply filter to SVG lines/paths
        document.querySelectorAll('svg .flowchart-line').forEach(line => {
            if (line.dataset.color === color) {
                line.style.opacity = '1';
            } else {
                line.style.opacity = '0.15';
            }
        });
    };

    const resetFilter = () => {
        activeFilterBadge.classList.add('hidden');
        resetFilterBtn.classList.add('hidden');

        nodes.forEach(node => {
            node.classList.remove('opacity-25', 'scale-95');
            node.classList.add('opacity-100', 'scale-100');
        });

        document.querySelectorAll('svg .flowchart-line').forEach(line => {
            line.style.opacity = '1';
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

    // --- Interactive Flowchart Pan and Zoom Logic ---
    const viewer = document.getElementById('flowchart-viewer');
    const canvas = document.getElementById('flowchart-canvas');
    const zoomInBtn = document.getElementById('zoom-in-btn');
    const zoomOutBtn = document.getElementById('zoom-out-btn');
    const zoomResetBtn = document.getElementById('zoom-reset-btn');

    let scale = 0.55;
    let panX = 40;
    let panY = 20;
    let isDragging = false;
    let startX = 0;
    let startY = 0;

    const updateTransform = () => {
        canvas.style.transform = `translate(${panX}px, ${panY}px) scale(${scale})`;
    };

    // Initialize transform
    updateTransform();

    // Mouse Drag to Pan
    viewer.addEventListener('mousedown', (e) => {
        if (e.button !== 0) return; // Only left click drags
        isDragging = true;
        viewer.classList.remove('cursor-grab');
        viewer.classList.add('cursor-grabbing');
        startX = e.clientX - panX;
        startY = e.clientY - panY;
    });

    window.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        panX = e.clientX - startX;
        panY = e.clientY - startY;
        updateTransform();
    });

    window.addEventListener('mouseup', () => {
        if (isDragging) {
            isDragging = false;
            viewer.classList.remove('cursor-grabbing');
            viewer.classList.add('cursor-grab');
        }
    });

    // Touch events for mobile panning
    viewer.addEventListener('touchstart', (e) => {
        if (e.touches.length === 1) {
            isDragging = true;
            startX = e.touches[0].clientX - panX;
            startY = e.touches[0].clientY - panY;
        }
    });

    viewer.addEventListener('touchmove', (e) => {
        if (isDragging && e.touches.length === 1) {
            panX = e.touches[0].clientX - startX;
            panY = e.touches[0].clientY - startY;
            updateTransform();
        }
    });

    viewer.addEventListener('touchend', () => {
        isDragging = false;
    });

    // Scroll wheel zoom
    viewer.addEventListener('wheel', (e) => {
        e.preventDefault();
        const zoomIntensity = 0.03;
        const rect = viewer.getBoundingClientRect();
        const mouseX = e.clientX - rect.left;
        const mouseY = e.clientY - rect.top;

        // Calculate mouse position relative to canvas before zoom
        const canvasMouseX = (mouseX - panX) / scale;
        const canvasMouseY = (mouseY - panY) / scale;

        // Zoom direction
        if (e.deltaY < 0) {
            scale = Math.min(scale + zoomIntensity, 1.2);
        } else {
            scale = Math.max(scale - zoomIntensity, 0.25);
        }

        // Adjust pan so zoom is centered on mouse
        panX = mouseX - canvasMouseX * scale;
        panY = mouseY - canvasMouseY * scale;

        updateTransform();
    }, { passive: false });

    // Control buttons
    zoomInBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        scale = Math.min(scale + 0.1, 1.2);
        updateTransform();
    });

    // Control buttons
    zoomOutBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        scale = Math.max(scale - 0.1, 0.25);
        updateTransform();
    });

    zoomResetBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        scale = 0.55;
        // Center the view roughly
        const viewerWidth = viewer.clientWidth;
        panX = (viewerWidth - 800 * scale) / 2;
        panY = 20;
        updateTransform();
    });

    // Center view initially based on container width
    setTimeout(() => {
        const viewerWidth = viewer.clientWidth;
        panX = (viewerWidth - 800 * scale) / 2;
        updateTransform();
    }, 100);

    // Initialize Lucide icons
    if (window.lucide) {
        window.lucide.createIcons();
    }
});
</script>
