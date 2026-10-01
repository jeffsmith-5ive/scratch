<!-- Jeff Brewery - Intelligent E-Commerce Admin Dashboard -->
<!-- Include ApexCharts Library for Interactive Vector Charting -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<div class="min-h-screen py-8 px-3 sm:px-6 lg:px-8 text-[#f5f0e8] animate-fade-in font-sans">
  <div class="max-w-[1500px] mx-auto space-y-8">
    
    <!-- 1 & 2. DASHBOARD HEADER & QUICK ACTIONS -->
    <div class="bg-[#111111]/90 backdrop-blur-xl border border-white/10 p-6 rounded-2xl shadow-2xl flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6">
      <div>
        <div class="flex items-center gap-3">
          <div class="p-2.5 bg-[var(--gold)]/10 text-[var(--gold)] border border-[var(--gold)]/20 rounded-xl shadow-inner">
            <i data-lucide="shield-check" class="w-6 h-6"></i>
          </div>
          <div>
            <div class="flex items-center gap-2">
              <h1 class="text-2xl sm:text-3xl font-oswald font-bold text-white uppercase tracking-wider">Jeff Brewery Admin Dashboard</h1>
              <span class="bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 text-[10px] font-bold uppercase px-2 py-0.5 rounded-full">AI Live v2.6</span>
            </div>
            <p class="text-neutral-400 text-xs sm:text-sm mt-0.5">Overview of sales, inventory, customer activity, AI recommendations, and gamification engagement.</p>
          </div>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="flex flex-wrap items-center gap-2.5 sm:gap-3">
        <button onclick="openExportModal()" class="bg-neutral-800 hover:bg-neutral-700 border border-white/10 text-neutral-200 px-3.5 py-2 rounded-xl font-bold text-xs shadow hover:shadow-md transition flex items-center gap-1.5 focus:outline-none">
          <i data-lucide="download" class="w-4 h-4 text-[var(--gold)]"></i>
          <span>Export Report</span>
        </button>

        <button onclick="openAddProductModal()" class="bg-[var(--gold)] hover:bg-yellow-500 text-black px-4 py-2 rounded-xl font-bold text-xs shadow-lg transition flex items-center gap-1.5 uppercase tracking-wider focus:outline-none">
          <i data-lucide="plus" class="w-4 h-4"></i>
          <span>Add Product</span>
        </button>

        <button onclick="switchAdminTab('inventory')" class="bg-neutral-900 hover:bg-neutral-800 border border-white/15 text-neutral-300 px-3.5 py-2 rounded-xl font-bold text-xs transition flex items-center gap-1.5 focus:outline-none">
          <i data-lucide="boxes" class="w-4 h-4 text-teal-400"></i>
          <span>Manage Products</span>
        </button>

        <button onclick="switchAdminTab('orders')" class="bg-neutral-900 hover:bg-neutral-800 border border-white/15 text-neutral-300 px-3.5 py-2 rounded-xl font-bold text-xs transition flex items-center gap-1.5 focus:outline-none">
          <i data-lucide="truck" class="w-4 h-4 text-amber-400"></i>
          <span>Manage Orders</span>
        </button>

        <button onclick="switchAdminTab('customer-intel')" class="bg-neutral-900 hover:bg-neutral-800 border border-white/15 text-neutral-300 px-3.5 py-2 rounded-xl font-bold text-xs transition flex items-center gap-1.5 focus:outline-none">
          <i data-lucide="user-check" class="w-4 h-4 text-purple-400"></i>
          <span>View Customers</span>
        </button>
      </div>
    </div>

    <!-- 23. ADMIN NAVIGATION TABS (Section 23) -->
    <div class="border-b border-white/10 pb-2">
      <div class="flex items-center gap-1.5 sm:gap-2 overflow-x-auto pb-2 hide-scrollbar">
        <button onclick="switchAdminTab('overview')" data-tab-btn="overview" class="admin-tab-btn active px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider transition whitespace-nowrap flex items-center gap-2 bg-[var(--gold)] text-black shadow">
          <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
          <span>Overview</span>
        </button>
        <button onclick="switchAdminTab('sales')" data-tab-btn="sales" class="admin-tab-btn px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider text-neutral-400 hover:text-white hover:bg-white/5 transition whitespace-nowrap flex items-center gap-2">
          <i data-lucide="trending-up" class="w-4 h-4"></i>
          <span>Sales Analytics</span>
        </button>
        <button onclick="switchAdminTab('product-perf')" data-tab-btn="product-perf" class="admin-tab-btn px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider text-neutral-400 hover:text-white hover:bg-white/5 transition whitespace-nowrap flex items-center gap-2">
          <i data-lucide="bar-chart-3" class="w-4 h-4"></i>
          <span>Product Performance</span>
        </button>
        <button onclick="switchAdminTab('recommendations')" data-tab-btn="recommendations" class="admin-tab-btn px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider text-neutral-400 hover:text-white hover:bg-white/5 transition whitespace-nowrap flex items-center gap-2">
          <i data-lucide="sparkles" class="w-4 h-4"></i>
          <span>AI Recommendations</span>
        </button>
        <button onclick="switchAdminTab('customer-intel')" data-tab-btn="customer-intel" class="admin-tab-btn px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider text-neutral-400 hover:text-white hover:bg-white/5 transition whitespace-nowrap flex items-center gap-2">
          <i data-lucide="brain-circuit" class="w-4 h-4"></i>
          <span>Customer Intelligence</span>
        </button>
        <button onclick="switchAdminTab('chatbot')" data-tab-btn="chatbot" class="admin-tab-btn px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider text-neutral-400 hover:text-white hover:bg-white/5 transition whitespace-nowrap flex items-center gap-2">
          <i data-lucide="message-square" class="w-4 h-4"></i>
          <span>Chatbot Analytics</span>
        </button>
        <button onclick="switchAdminTab('gamification')" data-tab-btn="gamification" class="admin-tab-btn px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider text-neutral-400 hover:text-white hover:bg-white/5 transition whitespace-nowrap flex items-center gap-2">
          <i data-lucide="trophy" class="w-4 h-4"></i>
          <span>Gamification</span>
        </button>
        <button onclick="switchAdminTab('orders')" data-tab-btn="orders" class="admin-tab-btn px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider text-neutral-400 hover:text-white hover:bg-white/5 transition whitespace-nowrap flex items-center gap-2">
          <i data-lucide="truck" class="w-4 h-4"></i>
          <span>Orders</span>
        </button>
        <button onclick="switchAdminTab('inventory')" data-tab-btn="inventory" class="admin-tab-btn px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider text-neutral-400 hover:text-white hover:bg-white/5 transition whitespace-nowrap flex items-center gap-2">
          <i data-lucide="beer" class="w-4 h-4"></i>
          <span>Inventory & Products</span>
        </button>
        <button onclick="switchAdminTab('feedback-loop')" data-tab-btn="feedback-loop" class="admin-tab-btn px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider text-neutral-400 hover:text-white hover:bg-white/5 transition whitespace-nowrap flex items-center gap-2">
          <i data-lucide="repeat" class="w-4 h-4"></i>
          <span>Feedback Loop & Events</span>
        </button>
      </div>
    </div>

    <!-- 3. KEY PERFORMANCE INDICATORS (Section 3) -->
    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-6 gap-4">
      <!-- Total Revenue -->
      <div class="bg-[#111111] border border-white/10 p-5 rounded-2xl shadow-xl flex flex-col justify-between hover:border-emerald-500/40 transition group">
        <div class="flex justify-between items-start">
          <span class="text-neutral-400 text-[10px] font-bold uppercase tracking-wider">Total Revenue</span>
          <div class="p-2 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-xl group-hover:bg-emerald-500/20 transition">
            <i data-lucide="dollar-sign" class="w-4 h-4"></i>
          </div>
        </div>
        <div class="mt-3">
          <div class="text-2xl sm:text-3xl font-bold font-oswald text-white"><?= $kpis['totalRevenue']['value'] ?></div>
          <div class="mt-1 flex items-center text-[11px] text-emerald-400 font-bold">
            <i data-lucide="arrow-up-right" class="w-3.5 h-3.5 mr-0.5"></i>
            <span><?= $kpis['totalRevenue']['change'] ?></span>
            <span class="text-neutral-500 ml-1 font-normal"><?= $kpis['totalRevenue']['period'] ?></span>
          </div>
        </div>
      </div>

      <!-- Active Orders -->
      <div class="bg-[#111111] border border-white/10 p-5 rounded-2xl shadow-xl flex flex-col justify-between hover:border-blue-500/40 transition group">
        <div class="flex justify-between items-start">
          <span class="text-neutral-400 text-[10px] font-bold uppercase tracking-wider">Active Orders</span>
          <div class="p-2 bg-blue-500/10 text-blue-400 border border-blue-500/20 rounded-xl group-hover:bg-blue-500/20 transition">
            <i data-lucide="shopping-bag" class="w-4 h-4"></i>
          </div>
        </div>
        <div class="mt-3">
          <div class="text-2xl sm:text-3xl font-bold font-oswald text-white"><?= $kpis['activeOrders']['value'] ?></div>
          <div class="mt-1 flex items-center text-[11px] text-blue-400 font-bold">
            <span><?= $kpis['activeOrders']['change'] ?></span>
            <span class="text-neutral-500 ml-1 font-normal"><?= $kpis['activeOrders']['period'] ?></span>
          </div>
        </div>
      </div>

      <!-- Loyalty Points -->
      <div class="bg-[#111111] border border-white/10 p-5 rounded-2xl shadow-xl flex flex-col justify-between hover:border-purple-500/40 transition group">
        <div class="flex justify-between items-start">
          <span class="text-neutral-400 text-[10px] font-bold uppercase tracking-wider">Loyalty Points</span>
          <div class="p-2 bg-purple-500/10 text-purple-400 border border-purple-500/20 rounded-xl group-hover:bg-purple-500/20 transition">
            <i data-lucide="award" class="w-4 h-4"></i>
          </div>
        </div>
        <div class="mt-3">
          <div class="text-2xl sm:text-3xl font-bold font-oswald text-white"><?= $kpis['loyaltyPoints']['value'] ?></div>
          <div class="mt-1 flex items-center text-[11px] text-purple-400 font-bold">
            <i data-lucide="arrow-up-right" class="w-3.5 h-3.5 mr-0.5"></i>
            <span><?= $kpis['loyaltyPoints']['change'] ?></span>
            <span class="text-neutral-500 ml-1 font-normal"><?= $kpis['loyaltyPoints']['period'] ?></span>
          </div>
        </div>
      </div>

      <!-- Inventory Alerts -->
      <div class="bg-[#111111] border border-white/10 p-5 rounded-2xl shadow-xl flex flex-col justify-between hover:border-red-500/40 transition group">
        <div class="flex justify-between items-start">
          <span class="text-neutral-400 text-[10px] font-bold uppercase tracking-wider">Inventory Alerts</span>
          <div class="p-2 bg-red-500/10 text-red-400 border border-red-500/20 rounded-xl group-hover:bg-red-500/20 transition">
            <i data-lucide="alert-triangle" class="w-4 h-4"></i>
          </div>
        </div>
        <div class="mt-3">
          <div class="text-2xl sm:text-3xl font-bold font-oswald text-red-400"><?= $kpis['inventoryAlerts']['value'] ?></div>
          <div class="mt-1 flex items-center text-[11px] text-red-400 font-bold">
            <span><?= $kpis['inventoryAlerts']['change'] ?></span>
            <span class="text-neutral-500 ml-1 font-normal"><?= $kpis['inventoryAlerts']['period'] ?></span>
          </div>
        </div>
      </div>

      <!-- AI Recommendations -->
      <div class="bg-[#111111] border border-white/10 p-5 rounded-2xl shadow-xl flex flex-col justify-between hover:border-amber-500/40 transition group">
        <div class="flex justify-between items-start">
          <span class="text-neutral-400 text-[10px] font-bold uppercase tracking-wider">AI Recommendations</span>
          <div class="p-2 bg-amber-500/10 text-amber-400 border border-amber-500/20 rounded-xl group-hover:bg-amber-500/20 transition">
            <i data-lucide="sparkles" class="w-4 h-4"></i>
          </div>
        </div>
        <div class="mt-3">
          <div class="text-2xl sm:text-3xl font-bold font-oswald text-amber-300"><?= $kpis['aiRecommendations']['value'] ?></div>
          <div class="mt-1 flex items-center text-[11px] text-amber-400 font-bold">
            <span><?= $kpis['aiRecommendations']['period'] ?></span>
          </div>
        </div>
      </div>

      <!-- Recommendation Conversion -->
      <div class="bg-[#111111] border border-white/10 p-5 rounded-2xl shadow-xl flex flex-col justify-between hover:border-teal-500/40 transition group">
        <div class="flex justify-between items-start">
          <span class="text-neutral-400 text-[10px] font-bold uppercase tracking-wider">Rec Conversion</span>
          <div class="p-2 bg-teal-500/10 text-teal-400 border border-teal-500/20 rounded-xl group-hover:bg-teal-500/20 transition">
            <i data-lucide="trending-up" class="w-4 h-4"></i>
          </div>
        </div>
        <div class="mt-3">
          <div class="text-2xl sm:text-3xl font-bold font-oswald text-teal-400"><?= $kpis['recommendationConversion']['value'] ?></div>
          <div class="mt-1 flex items-center text-[11px] text-teal-400 font-bold">
            <i data-lucide="check-circle" class="w-3.5 h-3.5 mr-0.5"></i>
            <span><?= $kpis['recommendationConversion']['period'] ?></span>
          </div>
        </div>
      </div>
    </div>

    <!-- ==================== TAB 1: OVERVIEW ==================== -->
    <div id="tab-overview" class="admin-tab-content space-y-8">
      
      <!-- 4. LIVE CUSTOMER ACTIVITY MONITOR (Section 4) -->
      <div class="bg-[#111111] border border-white/10 rounded-2xl shadow-2xl overflow-hidden">
        <div class="px-6 py-5 border-b border-white/10 bg-black/40 flex flex-col md:flex-row md:items-center justify-between gap-4">
          <div class="flex items-center gap-3">
            <div class="p-2 bg-teal-500/10 text-teal-400 border border-teal-500/20 rounded-xl">
              <i data-lucide="activity" class="w-5 h-5"></i>
            </div>
            <div>
              <div class="flex items-center gap-2">
                <h3 class="font-bold text-lg font-oswald text-white uppercase tracking-wide">Live Customer Activity Monitor</h3>
                <span class="flex h-2 w-2 relative">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                </span>
              </div>
              <p class="text-xs text-neutral-400">Displaying real-time customer actions across the platform.</p>
            </div>
          </div>

          <!-- Activity Type Filters -->
          <div class="flex flex-wrap items-center gap-1.5 text-xs">
            <button onclick="filterLiveActivity('all')" class="activity-filter-btn px-2.5 py-1 rounded-lg bg-[var(--gold)] text-black font-bold">All</button>
            <button onclick="filterLiveActivity('order')" class="activity-filter-btn px-2.5 py-1 rounded-lg bg-neutral-900 border border-white/10 text-neutral-300 hover:text-white">Orders</button>
            <button onclick="filterLiveActivity('login')" class="activity-filter-btn px-2.5 py-1 rounded-lg bg-neutral-900 border border-white/10 text-neutral-300 hover:text-white">Logins</button>
            <button onclick="filterLiveActivity('craft')" class="activity-filter-btn px-2.5 py-1 rounded-lg bg-neutral-900 border border-white/10 text-neutral-300 hover:text-white">Brew Lab</button>
            <button onclick="filterLiveActivity('points')" class="activity-filter-btn px-2.5 py-1 rounded-lg bg-neutral-900 border border-white/10 text-neutral-300 hover:text-white">Points & Reviews</button>
            <button onclick="filterLiveActivity('chatbot')" class="activity-filter-btn px-2.5 py-1 rounded-lg bg-neutral-900 border border-white/10 text-neutral-300 hover:text-white">Chatbot</button>
          </div>
        </div>

        <div class="p-6">
          <div id="live-activity-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <?php foreach ($customerActivity as $act): ?>
              <div class="activity-card bg-black/40 border border-white/10 rounded-xl p-4 flex items-start gap-3 hover:border-white/20 transition" data-type="<?= $act['type'] ?>">
                <div class="p-2.5 rounded-lg border text-sm <?= $act['badge'] ?> shrink-0">
                  <i data-lucide="<?= $act['icon'] ?>" class="w-4 h-4"></i>
                </div>
                <div class="flex-1 min-w-0">
                  <div class="flex justify-between items-start">
                    <h4 class="text-xs font-bold text-white truncate"><?= htmlspecialchars($act['user']) ?></h4>
                    <span class="text-[10px] text-neutral-500 font-mono"><?= htmlspecialchars($act['time']) ?></span>
                  </div>
                  <p class="text-xs text-neutral-300 mt-1 line-clamp-2"><?= htmlspecialchars($act['action']) ?></p>
                  <div class="mt-2.5 flex items-center justify-between text-[10px] font-semibold text-neutral-400">
                    <span class="truncate"><?= htmlspecialchars($act['detail'] ?? $act['email']) ?></span>
                    <span class="bg-neutral-900 px-2 py-0.5 rounded border border-white/5 text-[var(--gold)]"><?= htmlspecialchars($act['amount']) ?></span>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <!-- Quick Dual Charts Row -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Sales Velocity -->
        <div class="bg-[#111111] border border-white/10 p-6 rounded-2xl shadow-xl flex flex-col">
          <div class="flex justify-between items-center mb-6">
            <div>
              <h3 class="font-bold text-lg text-white font-oswald uppercase tracking-wide">Sales Performance Preview</h3>
              <p class="text-xs text-neutral-400">Revenue trend over the last 7 days.</p>
            </div>
            <button onclick="switchAdminTab('sales')" class="text-xs font-bold text-[var(--gold)] hover:underline flex items-center gap-1">
              Full Analytics <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
            </button>
          </div>
          <div id="overview-sales-chart" class="w-full"></div>
        </div>

        <!-- AI Recommendation Funnel Snapshot -->
        <div class="bg-[#111111] border border-white/10 p-6 rounded-2xl shadow-xl flex flex-col">
          <div class="flex justify-between items-center mb-6">
            <div>
              <h3 class="font-bold text-lg text-white font-oswald uppercase tracking-wide">Recommendation Funnel</h3>
              <p class="text-xs text-neutral-400">Generation to purchase conversion: 6.1%</p>
            </div>
            <button onclick="switchAdminTab('recommendations')" class="text-xs font-bold text-teal-400 hover:underline flex items-center gap-1">
              Rec Engine <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
            </button>
          </div>
          <div id="overview-funnel-chart" class="w-full"></div>
        </div>
      </div>
    </div>

    <!-- ==================== TAB 2: SALES ANALYTICS ==================== -->
    <div id="tab-sales" class="admin-tab-content hidden space-y-8">
      <div class="bg-[#111111] border border-white/10 p-6 rounded-2xl shadow-2xl">
        <div class="flex flex-col lg:flex-row justify-between lg:items-center gap-4 mb-8 pb-6 border-b border-white/10">
          <div>
            <h2 class="text-2xl font-bold font-oswald text-white uppercase tracking-wider">Sales Analytics & Trends</h2>
            <p class="text-xs text-neutral-400 mt-1">Deep analysis of revenue, volume, conversion rates, and average cart size.</p>
          </div>

          <!-- Selectable Time Periods (Section 5) -->
          <div class="flex flex-wrap items-center gap-2">
            <span class="text-xs text-neutral-400 mr-1">Period:</span>
            <button onclick="changeSalesPeriod('7d')" class="sales-period-btn active px-3 py-1.5 rounded-lg bg-[var(--gold)] text-black text-xs font-bold">Last 7 Days</button>
            <button onclick="changeSalesPeriod('30d')" class="sales-period-btn px-3 py-1.5 rounded-lg bg-neutral-900 border border-white/10 text-neutral-300 hover:text-white text-xs font-bold">Last 30 Days</button>
            <button onclick="changeSalesPeriod('90d')" class="sales-period-btn px-3 py-1.5 rounded-lg bg-neutral-900 border border-white/10 text-neutral-300 hover:text-white text-xs font-bold">Last 90 Days</button>
            <button onclick="changeSalesPeriod('year')" class="sales-period-btn px-3 py-1.5 rounded-lg bg-neutral-900 border border-white/10 text-neutral-300 hover:text-white text-xs font-bold">This Year</button>
            <button onclick="alert('Custom date range picker opened')" class="sales-period-btn px-3 py-1.5 rounded-lg bg-neutral-900 border border-white/10 text-neutral-300 hover:text-white text-xs font-bold">Custom Range</button>
          </div>
        </div>

        <!-- Period Dynamic Metrics (Section 5) -->
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-8">
          <div class="bg-black/50 border border-white/10 p-4 rounded-xl">
            <span class="text-neutral-400 text-xs uppercase font-semibold">Revenue</span>
            <div id="metric-revenue" class="text-2xl font-oswald font-bold text-white mt-1">$24,500</div>
            <span class="text-[10px] text-emerald-400 font-bold">+12% vs prior</span>
          </div>
          <div class="bg-black/50 border border-white/10 p-4 rounded-xl">
            <span class="text-neutral-400 text-xs uppercase font-semibold">Orders</span>
            <div id="metric-orders" class="text-2xl font-oswald font-bold text-white mt-1">42</div>
            <span class="text-[10px] text-blue-400 font-bold">+8 orders</span>
          </div>
          <div class="bg-black/50 border border-white/10 p-4 rounded-xl">
            <span class="text-neutral-400 text-xs uppercase font-semibold">Avg Order Value</span>
            <div id="metric-aov" class="text-2xl font-oswald font-bold text-white mt-1">$58.33</div>
            <span class="text-[10px] text-purple-400 font-bold">Strong basket</span>
          </div>
          <div class="bg-black/50 border border-white/10 p-4 rounded-xl">
            <span class="text-neutral-400 text-xs uppercase font-semibold">Units Sold</span>
            <div id="metric-units" class="text-2xl font-oswald font-bold text-white mt-1">1,240</div>
            <span class="text-[10px] text-teal-400 font-bold">Cans & Kegs</span>
          </div>
          <div class="bg-black/50 border border-white/10 p-4 rounded-xl col-span-2 md:col-span-1">
            <span class="text-neutral-400 text-xs uppercase font-semibold">Conversion Rate</span>
            <div id="metric-conversion" class="text-2xl font-oswald font-bold text-emerald-400 mt-1">3.4%</div>
            <span class="text-[10px] text-neutral-400">Sessions to Buy</span>
          </div>
        </div>

        <!-- Metric Switcher for Chart -->
        <div class="flex items-center justify-between mb-4">
          <div class="flex items-center gap-2">
            <button onclick="switchSalesMetric('revenue')" id="btn-chart-revenue" class="px-3 py-1.5 rounded-lg bg-[var(--gold)] text-black text-xs font-bold">Revenue ($)</button>
            <button onclick="switchSalesMetric('orders')" id="btn-chart-orders" class="px-3 py-1.5 rounded-lg bg-neutral-900 border border-white/10 text-neutral-300 hover:text-white text-xs font-bold">Orders (#)</button>
            <button onclick="switchSalesMetric('units')" id="btn-chart-units" class="px-3 py-1.5 rounded-lg bg-neutral-900 border border-white/10 text-neutral-300 hover:text-white text-xs font-bold">Units Sold</button>
          </div>
          <span class="text-xs text-neutral-500 hidden sm:inline">Interactive Vector Time-Series</span>
        </div>

        <div id="full-sales-chart" class="w-full"></div>
      </div>
    </div>

    <!-- ==================== TAB 3: PRODUCT PERFORMANCE ==================== -->
    <div id="tab-product-perf" class="admin-tab-content hidden space-y-8">
      <div class="bg-[#111111] border border-white/10 rounded-2xl shadow-2xl overflow-hidden">
        <div class="px-6 py-5 border-b border-white/10 bg-black/40 flex flex-col md:flex-row justify-between md:items-center gap-4">
          <div>
            <h2 class="text-2xl font-bold font-oswald text-white uppercase tracking-wider">Product Performance Analytics</h2>
            <p class="text-xs text-neutral-400">Show which products are receiving the most customer interest and converting to revenue.</p>
          </div>
          <div class="flex items-center gap-3">
            <input type="text" id="perf-search-input" placeholder="Search product..." class="bg-black/50 border border-white/15 px-3 py-1.5 rounded-xl text-xs text-white outline-none focus:border-[var(--gold)]" />
          </div>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full text-left">
            <thead class="bg-black/60 text-neutral-400 text-xs uppercase tracking-wider border-b border-white/10">
              <tr>
                <th class="px-6 py-4 font-semibold">Product</th>
                <th class="px-6 py-4 font-semibold text-right">Views</th>
                <th class="px-6 py-4 font-semibold text-right">Wishlist</th>
                <th class="px-6 py-4 font-semibold text-right">Cart Adds</th>
                <th class="px-6 py-4 font-semibold text-right">Purchases</th>
                <th class="px-6 py-4 font-semibold text-right">Revenue</th>
                <th class="px-6 py-4 font-semibold text-right">Conversion</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-white/5" id="product-perf-body">
              <?php foreach ($productPerformance as $prod): ?>
                <tr class="hover:bg-white/5 transition">
                  <td class="px-6 py-4 font-bold text-white flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-[var(--gold)]"></span>
                    <span><?= htmlspecialchars($prod['name']) ?></span>
                    <span class="text-[10px] text-neutral-500 font-normal">(<?= htmlspecialchars($prod['style']) ?>)</span>
                  </td>
                  <td class="px-6 py-4 text-right text-neutral-300 font-mono"><?= number_format($prod['views']) ?></td>
                  <td class="px-6 py-4 text-right text-pink-400 font-mono"><?= number_format($prod['wishlist']) ?></td>
                  <td class="px-6 py-4 text-right text-amber-300 font-mono"><?= number_format($prod['cartAdds']) ?></td>
                  <td class="px-6 py-4 text-right text-emerald-400 font-bold font-mono"><?= number_format($prod['purchases']) ?></td>
                  <td class="px-6 py-4 text-right font-oswald text-lg font-bold text-white">$<?= number_format($prod['revenue']) ?></td>
                  <td class="px-6 py-4 text-right">
                    <span class="bg-teal-500/10 text-teal-300 border border-teal-500/20 px-2 py-0.5 rounded-full text-xs font-bold">
                      <?= $prod['conversion'] ?>
                    </span>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- ==================== TAB 4: AI RECOMMENDATIONS ==================== -->
    <div id="tab-recommendations" class="admin-tab-content hidden space-y-8">
      
      <!-- 7. Funnel & Key Metrics (Section 7) -->
      <div class="bg-[#111111] border border-white/10 p-6 rounded-2xl shadow-2xl">
        <div class="flex justify-between items-center mb-6 pb-4 border-b border-white/10">
          <div>
            <h2 class="text-2xl font-bold font-oswald text-white uppercase tracking-wider">AI Recommendation Performance</h2>
            <p class="text-xs text-neutral-400">Measures the recommendation engine across the e-commerce store and Jeff Smith chatbot.</p>
          </div>
          <span class="text-xs font-bold text-[var(--gold)] bg-[var(--gold)]/10 px-3 py-1 rounded-full border border-[var(--gold)]/30">Conversion Rate: 6.1%</span>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-6 gap-4 mb-8">
          <div class="bg-black/40 border border-white/10 p-4 rounded-xl text-center">
            <span class="text-[10px] text-neutral-400 font-bold uppercase tracking-wider">Generated</span>
            <div class="text-2xl font-oswald font-bold text-white mt-1"><?= number_format($aiRecommendations['funnel']['generated']) ?></div>
            <span class="text-[10px] text-neutral-500">100% of impressions</span>
          </div>
          <div class="bg-black/40 border border-white/10 p-4 rounded-xl text-center">
            <span class="text-[10px] text-neutral-400 font-bold uppercase tracking-wider">Viewed</span>
            <div class="text-2xl font-oswald font-bold text-blue-400 mt-1"><?= number_format($aiRecommendations['funnel']['viewed']) ?></div>
            <span class="text-[10px] text-blue-400/80">72.2% visibility</span>
          </div>
          <div class="bg-black/40 border border-white/10 p-4 rounded-xl text-center">
            <span class="text-[10px] text-neutral-400 font-bold uppercase tracking-wider">Clicked</span>
            <div class="text-2xl font-oswald font-bold text-purple-400 mt-1"><?= number_format($aiRecommendations['funnel']['clicked']) ?></div>
            <span class="text-[10px] text-purple-400/80">37.4% CTR</span>
          </div>
          <div class="bg-black/40 border border-white/10 p-4 rounded-xl text-center">
            <span class="text-[10px] text-neutral-400 font-bold uppercase tracking-wider">Added to Cart</span>
            <div class="text-2xl font-oswald font-bold text-amber-400 mt-1"><?= number_format($aiRecommendations['funnel']['cartAdds']) ?></div>
            <span class="text-[10px] text-amber-400/80">36.3% add rate</span>
          </div>
          <div class="bg-black/40 border border-white/10 p-4 rounded-xl text-center">
            <span class="text-[10px] text-neutral-400 font-bold uppercase tracking-wider">Purchased</span>
            <div class="text-2xl font-oswald font-bold text-emerald-400 mt-1"><?= number_format($aiRecommendations['funnel']['purchased']) ?></div>
            <span class="text-[10px] text-emerald-400/80">61.9% close rate</span>
          </div>
          <div class="bg-black/40 border border-teal-500/30 p-4 rounded-xl text-center bg-teal-950/20">
            <span class="text-[10px] text-teal-400 font-bold uppercase tracking-wider">Total Conv.</span>
            <div class="text-2xl font-oswald font-bold text-teal-300 mt-1"><?= $aiRecommendations['funnel']['conversionRate'] ?></div>
            <span class="text-[10px] text-teal-400/80">Generated to Buy</span>
          </div>
        </div>

        <!-- 8. Most Recommended Products Table (Section 8) -->
        <h3 class="font-bold text-lg font-oswald text-white uppercase tracking-wide mb-4">Most Recommended Products</h3>
        <div class="overflow-x-auto mb-8">
          <table class="w-full text-left">
            <thead class="bg-black/60 text-neutral-400 text-xs uppercase tracking-wider border-b border-white/10">
              <tr>
                <th class="px-5 py-3 font-semibold">Product</th>
                <th class="px-5 py-3 font-semibold text-right">Recommendations</th>
                <th class="px-5 py-3 font-semibold text-right">Clicks</th>
                <th class="px-5 py-3 font-semibold text-right">Cart Adds</th>
                <th class="px-5 py-3 font-semibold text-right">Purchases</th>
                <th class="px-5 py-3 font-semibold text-right">Conversion</th>
                <th class="px-5 py-3 font-semibold text-right">Inventory Rule</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
              <?php foreach ($aiRecommendations['mostRecommended'] as $rec): ?>
                <tr class="hover:bg-white/5 transition">
                  <td class="px-5 py-3 font-bold text-white"><?= htmlspecialchars($rec['name']) ?></td>
                  <td class="px-5 py-3 text-right text-neutral-300 font-mono"><?= $rec['recommendations'] ?></td>
                  <td class="px-5 py-3 text-right text-blue-400 font-mono"><?= $rec['clicks'] ?></td>
                  <td class="px-5 py-3 text-right text-amber-300 font-mono"><?= $rec['cartAdds'] ?></td>
                  <td class="px-5 py-3 text-right text-emerald-400 font-mono font-bold"><?= $rec['purchases'] ?></td>
                  <td class="px-5 py-3 text-right font-bold text-teal-300"><?= $rec['conversion'] ?></td>
                  <td class="px-5 py-3 text-right">
                    <span class="text-[10px] font-bold uppercase px-2 py-0.5 rounded <?= $rec['status'] === 'Low Stock' ? 'bg-red-500/20 text-red-400 border border-red-500/30' : 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/30' ?>">
                      <?= $rec['status'] ?>
                    </span>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <!-- 9. Recommendation Engine Insights (Section 9) -->
        <h3 class="font-bold text-lg font-oswald text-white uppercase tracking-wide mb-4">AI Recommendation Insights</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <?php foreach ($aiRecommendations['insights'] as $ins): ?>
            <div class="bg-black/40 border border-white/10 p-4 rounded-xl flex flex-col justify-between">
              <div>
                <div class="flex justify-between items-start">
                  <h4 class="font-bold text-white text-base font-oswald uppercase"><?= htmlspecialchars($ins['product']) ?></h4>
                  <span class="text-[10px] font-bold uppercase px-2 py-0.5 rounded border <?= $ins['badge'] ?>"><?= htmlspecialchars($ins['match']) ?></span>
                </div>
                <p class="text-xs text-neutral-300 mt-2 leading-relaxed"><?= htmlspecialchars($ins['observation']) ?></p>
              </div>
              <div class="mt-4 pt-3 border-t border-white/5 flex justify-between items-center text-[10px] text-neutral-400">
                <span>Inventory: <strong class="text-white"><?= htmlspecialchars($ins['inventory']) ?></strong></span>
                <span>Priority: <strong class="text-[var(--gold)]"><?= htmlspecialchars($ins['priority']) ?></strong></span>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- 15 & 16. Recommendation Scoring & Inventory Rules (Section 15 & 16) -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Section 16: Recommendation Scoring Model -->
        <div class="bg-[#111111] border border-white/10 p-6 rounded-2xl shadow-xl flex flex-col justify-between">
          <div>
            <div class="flex items-center gap-2 mb-2">
              <i data-lucide="calculator" class="w-5 h-5 text-[var(--gold)]"></i>
              <h3 class="font-bold text-lg font-oswald text-white uppercase">Recommendation Scoring Model (Section 16)</h3>
            </div>
            <p class="text-xs text-neutral-400 mb-4">Multi-factor algorithmic weighting formula:</p>
            
            <div class="bg-black/60 border border-white/10 p-4 rounded-xl font-mono text-xs text-amber-300 mb-4 leading-relaxed">
              Recommendation Score =<br>
              (User Preference × 0.40) +<br>
              (Behaviour Similarity × 0.25) +<br>
              (Product Popularity × 0.15) +<br>
              (Recent Activity × 0.10) +<br>
              (Inventory Availability × 0.10)
            </div>

            <!-- Interactive Weights Viewer -->
            <div class="space-y-3">
              <div>
                <div class="flex justify-between text-xs mb-1">
                  <span class="text-neutral-300">User Preference Match</span>
                  <span class="font-bold text-[var(--gold)]">40%</span>
                </div>
                <div class="w-full bg-neutral-800 rounded-full h-2">
                  <div class="bg-[var(--gold)] h-2 rounded-full" style="width: 40%"></div>
                </div>
              </div>
              <div>
                <div class="flex justify-between text-xs mb-1">
                  <span class="text-neutral-300">Behaviour Similarity</span>
                  <span class="font-bold text-teal-400">25%</span>
                </div>
                <div class="w-full bg-neutral-800 rounded-full h-2">
                  <div class="bg-teal-400 h-2 rounded-full" style="width: 25%"></div>
                </div>
              </div>
              <div>
                <div class="flex justify-between text-xs mb-1">
                  <span class="text-neutral-300">Product Popularity</span>
                  <span class="font-bold text-blue-400">15%</span>
                </div>
                <div class="w-full bg-neutral-800 rounded-full h-2">
                  <div class="bg-blue-400 h-2 rounded-full" style="width: 15%"></div>
                </div>
              </div>
              <div>
                <div class="flex justify-between text-xs mb-1">
                  <span class="text-neutral-300">Recent Activity</span>
                  <span class="font-bold text-purple-400">10%</span>
                </div>
                <div class="w-full bg-neutral-800 rounded-full h-2">
                  <div class="bg-purple-400 h-2 rounded-full" style="width: 10%"></div>
                </div>
              </div>
              <div>
                <div class="flex justify-between text-xs mb-1">
                  <span class="text-neutral-300">Inventory Availability</span>
                  <span class="font-bold text-emerald-400">10%</span>
                </div>
                <div class="w-full bg-neutral-800 rounded-full h-2">
                  <div class="bg-emerald-400 h-2 rounded-full" style="width: 10%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Section 15: Inventory-Aware Rules Matrix -->
        <div class="bg-[#111111] border border-white/10 p-6 rounded-2xl shadow-xl">
          <div class="flex items-center gap-2 mb-2">
            <i data-lucide="shield-alert" class="w-5 h-5 text-teal-400"></i>
            <h3 class="font-bold text-lg font-oswald text-white uppercase">Inventory-Aware Rules (Section 15)</h3>
          </div>
          <p class="text-xs text-neutral-400 mb-4">Stock level controls dynamically adjust product visibility:</p>

          <div class="space-y-3">
            <div class="p-3.5 bg-black/40 border border-red-500/20 rounded-xl flex items-start gap-3">
              <div class="p-2 rounded-lg bg-red-500/10 text-red-400 shrink-0">
                <i data-lucide="ban" class="w-4 h-4"></i>
              </div>
              <div>
                <h4 class="text-xs font-bold text-red-400 uppercase">Rule 1: Out of Stock (Stock = 0)</h4>
                <p class="text-xs text-neutral-300 mt-0.5">Strictly removed from all AI recommendation carousels and chatbot responses.</p>
              </div>
            </div>

            <div class="p-3.5 bg-black/40 border border-amber-500/20 rounded-xl flex items-start gap-3">
              <div class="p-2 rounded-lg bg-amber-500/10 text-amber-400 shrink-0">
                <i data-lucide="alert-triangle" class="w-4 h-4"></i>
              </div>
              <div>
                <h4 class="text-xs font-bold text-amber-400 uppercase">Rule 2: Low Stock (Stock &lt; 20)</h4>
                <p class="text-xs text-neutral-300 mt-0.5">Recommendation priority is reduced by 30% and a 'Limited Supply' badge is appended.</p>
              </div>
            </div>

            <div class="p-3.5 bg-black/40 border border-emerald-500/20 rounded-xl flex items-start gap-3">
              <div class="p-2 rounded-lg bg-emerald-500/10 text-emerald-400 shrink-0">
                <i data-lucide="check-circle-2" class="w-4 h-4"></i>
              </div>
              <div>
                <h4 class="text-xs font-bold text-emerald-400 uppercase">Rule 3: Available Stock</h4>
                <p class="text-xs text-neutral-300 mt-0.5">Normal ranking based on user preference, style affinity, and popularity.</p>
              </div>
            </div>

            <div class="p-3.5 bg-black/40 border border-purple-500/20 rounded-xl flex items-start gap-3">
              <div class="p-2 rounded-lg bg-purple-500/10 text-purple-400 shrink-0">
                <i data-lucide="calendar" class="w-4 h-4"></i>
              </div>
              <div>
                <h4 class="text-xs font-bold text-purple-400 uppercase">Rule 4: Seasonal Boost</h4>
                <p class="text-xs text-neutral-300 mt-0.5">Seasonal beers (e.g. Soca Sorrel Ale) receive algorithmic weight boost during carnival & holiday windows.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ==================== TAB 5: CUSTOMER INTELLIGENCE ==================== -->
    <div id="tab-customer-intel" class="admin-tab-content hidden space-y-8">
      
      <!-- Section 10, 11, 12: Customer Profile Deep Dive -->
      <div class="bg-[#111111] border border-white/10 p-6 rounded-2xl shadow-2xl">
        <div class="flex flex-col lg:flex-row justify-between lg:items-center gap-4 pb-6 mb-6 border-b border-white/10">
          <div>
            <div class="flex items-center gap-2">
              <h2 class="text-2xl font-bold font-oswald text-white uppercase tracking-wider">Customer Intelligence Profile</h2>
              <span class="bg-[var(--gold)]/10 text-[var(--gold)] border border-[var(--gold)]/30 text-xs font-bold px-2.5 py-0.5 rounded-full">VIP Liming Member</span>
            </div>
            <p class="text-xs text-neutral-400 mt-1">Deep behavioral analysis, inferred taste profiles, and personalized AI recommendations.</p>
          </div>
          <div class="flex items-center gap-2">
            <span class="text-xs text-neutral-400">Viewing:</span>
            <select class="bg-black/60 border border-white/15 rounded-xl px-3 py-1.5 text-xs text-white outline-none focus:border-[var(--gold)] font-bold">
              <option>Jeff Smith (jeff.smith@jeffbrewery.com)</option>
              <option>Maria Gonzales (maria.g@gmail.com)</option>
              <option>Liam Hosein (liam.h@outlook.com)</option>
            </select>
          </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
          <!-- Col 1: Customer Info & Lifetime Value -->
          <div class="space-y-6">
            <div class="bg-black/40 border border-white/10 p-5 rounded-xl space-y-4">
              <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-full bg-[var(--gold)]/20 border border-[var(--gold)]/40 flex items-center justify-center text-xl font-oswald font-bold text-[var(--gold)]">
                  JS
                </div>
                <div>
                  <h3 class="font-bold text-white text-base"><?= htmlspecialchars($customerIntelligence['customer']['name']) ?></h3>
                  <p class="text-xs text-neutral-400"><?= htmlspecialchars($customerIntelligence['customer']['email']) ?></p>
                </div>
              </div>

              <div class="grid grid-cols-2 gap-3 pt-3 border-t border-white/10 text-xs">
                <div>
                  <span class="text-neutral-500 text-[10px] uppercase font-bold">Lifetime Orders</span>
                  <div class="text-lg font-oswald font-bold text-white"><?= $customerIntelligence['customer']['totalOrders'] ?></div>
                </div>
                <div>
                  <span class="text-neutral-500 text-[10px] uppercase font-bold">Total Spent</span>
                  <div class="text-lg font-oswald font-bold text-emerald-400"><?= $customerIntelligence['customer']['totalSpent'] ?></div>
                </div>
                <div>
                  <span class="text-neutral-500 text-[10px] uppercase font-bold">Loyalty Points</span>
                  <div class="text-lg font-oswald font-bold text-[var(--gold)]"><?= number_format($customerIntelligence['customer']['loyaltyPoints']) ?> pts</div>
                </div>
                <div>
                  <span class="text-neutral-500 text-[10px] uppercase font-bold">Customer Tier</span>
                  <div class="text-xs font-bold text-amber-300 mt-1"><?= $customerIntelligence['customer']['rank'] ?></div>
                </div>
              </div>

              <div class="pt-3 border-t border-white/10 text-xs text-neutral-400 space-y-1">
                <div>Member Since: <strong class="text-neutral-200"><?= $customerIntelligence['customer']['memberSince'] ?></strong></div>
                <div>Last Login: <strong class="text-neutral-200"><?= $customerIntelligence['customer']['lastLogin'] ?></strong></div>
              </div>
            </div>

            <!-- Customer Behavior Tracker (Section 10) -->
            <div class="bg-black/40 border border-white/10 p-5 rounded-xl">
              <h4 class="text-xs font-bold text-neutral-300 uppercase tracking-wider mb-3">Customer Behavior Counts</h4>
              <div class="grid grid-cols-2 gap-2 text-xs">
                <div class="p-2 bg-neutral-900 rounded-lg flex justify-between">
                  <span class="text-neutral-400">Products Viewed</span>
                  <strong class="text-white">48</strong>
                </div>
                <div class="p-2 bg-neutral-900 rounded-lg flex justify-between">
                  <span class="text-neutral-400">Wishlist Adds</span>
                  <strong class="text-pink-400">6</strong>
                </div>
                <div class="p-2 bg-neutral-900 rounded-lg flex justify-between">
                  <span class="text-neutral-400">Cart Adds</span>
                  <strong class="text-amber-400">18</strong>
                </div>
                <div class="p-2 bg-neutral-900 rounded-lg flex justify-between">
                  <span class="text-neutral-400">Reviews Done</span>
                  <strong class="text-yellow-400">5</strong>
                </div>
                <div class="p-2 bg-neutral-900 rounded-lg flex justify-between">
                  <span class="text-neutral-400">Chatbot Chats</span>
                  <strong class="text-teal-400">12</strong>
                </div>
                <div class="p-2 bg-neutral-900 rounded-lg flex justify-between">
                  <span class="text-neutral-400">Recs Clicked</span>
                  <strong class="text-indigo-400">9</strong>
                </div>
              </div>
            </div>
          </div>

          <!-- Col 2: Inferred Preference Profile (Section 10) -->
          <div class="space-y-6">
            <div class="bg-black/40 border border-white/10 p-5 rounded-xl space-y-4">
              <h4 class="text-xs font-bold text-neutral-300 uppercase tracking-wider flex items-center gap-1.5">
                <i data-lucide="sliders" class="w-4 h-4 text-[var(--gold)]"></i>
                <span>Style Preference Affinity</span>
              </h4>
              <div class="space-y-2.5">
                <?php foreach ($customerIntelligence['stylePreferences'] as $style): ?>
                  <div>
                    <div class="flex justify-between text-xs mb-1">
                      <span class="text-neutral-300"><?= $style['name'] ?></span>
                      <span class="font-bold text-[var(--gold)]"><?= $style['percent'] ?>%</span>
                    </div>
                    <div class="w-full bg-neutral-800 rounded-full h-1.5">
                      <div class="bg-[var(--gold)] h-1.5 rounded-full" style="width: <?= $style['percent'] ?>%"></div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>

            <div class="bg-black/40 border border-white/10 p-5 rounded-xl space-y-4">
              <h4 class="text-xs font-bold text-neutral-300 uppercase tracking-wider flex items-center gap-1.5">
                <i data-lucide="sparkle" class="w-4 h-4 text-teal-400"></i>
                <span>Taste & Strength Affinity</span>
              </h4>
              <div class="space-y-2.5">
                <?php foreach ($customerIntelligence['tastePreferences'] as $taste): ?>
                  <div>
                    <div class="flex justify-between text-xs mb-1">
                      <span class="text-neutral-300"><?= $taste['name'] ?></span>
                      <span class="font-bold text-teal-400"><?= $taste['percent'] ?>%</span>
                    </div>
                    <div class="w-full bg-neutral-800 rounded-full h-1.5">
                      <div class="bg-teal-400 h-1.5 rounded-full" style="width: <?= $taste['percent'] ?>%"></div>
                    </div>
                  </div>
                <?php endforeach; ?>
                <div>
                  <div class="flex justify-between text-xs mb-1">
                    <span class="text-neutral-300">ABV Preference (Higher ABV)</span>
                    <span class="font-bold text-purple-400">80%</span>
                  </div>
                  <div class="w-full bg-neutral-800 rounded-full h-1.5">
                    <div class="bg-purple-400 h-1.5 rounded-full" style="width: 80%"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Col 3: Personalised Recommendations & Explanations (Section 11 & 12) -->
          <div class="space-y-4">
            <h4 class="text-xs font-bold text-neutral-300 uppercase tracking-wider flex items-center gap-1.5">
              <i data-lucide="check-circle" class="w-4 h-4 text-emerald-400"></i>
              <span>Personalised Recommendations (Section 11)</span>
            </h4>

            <?php foreach ($customerIntelligence['recommendations'] as $pRec): ?>
              <div class="bg-black/50 border border-white/10 p-4 rounded-xl space-y-2 hover:border-emerald-500/30 transition">
                <div class="flex justify-between items-start">
                  <div>
                    <h5 class="font-bold text-white text-sm uppercase font-oswald"><?= htmlspecialchars($pRec['product']) ?></h5>
                    <span class="text-xs text-[var(--gold)] font-bold">$<?= number_format($pRec['price'], 2) ?></span>
                  </div>
                  <span class="bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 text-xs font-bold px-2 py-0.5 rounded-full">
                    <?= $pRec['match'] ?>% Match
                  </span>
                </div>
                <p class="text-xs text-neutral-300 leading-relaxed"><?= htmlspecialchars($pRec['reason']) ?></p>
                
                <!-- Section 12: Explainable Reason Tag -->
                <div class="pt-2 border-t border-white/5 flex items-center justify-between text-[10px]">
                  <span class="text-teal-400 bg-teal-950/40 px-2 py-0.5 rounded border border-teal-800/40">
                    💡 <?= htmlspecialchars($pRec['explanationType']) ?>
                  </span>
                  <span class="text-neutral-400"><?= $pRec['stock'] ?></span>
                </div>
              </div>
            <?php endforeach; ?>

            <!-- Explanation Reasons Taxonomy (Section 12) -->
            <div class="bg-black/30 border border-white/5 p-4 rounded-xl">
              <span class="text-[10px] text-neutral-400 font-bold uppercase tracking-wider block mb-2">Available Recommendation Reasons (Section 12):</span>
              <div class="flex flex-wrap gap-1 text-[9px] text-neutral-400">
                <span class="bg-neutral-900 px-2 py-0.5 rounded">Past Purchases</span>
                <span class="bg-neutral-900 px-2 py-0.5 rounded">Recently Viewed</span>
                <span class="bg-neutral-900 px-2 py-0.5 rounded">Taste Affinity</span>
                <span class="bg-neutral-900 px-2 py-0.5 rounded">Popular Among Similar</span>
                <span class="bg-neutral-900 px-2 py-0.5 rounded">Trending</span>
                <span class="bg-neutral-900 px-2 py-0.5 rounded">Wishlist Triggered</span>
                <span class="bg-neutral-900 px-2 py-0.5 rounded">Chatbot Triggered</span>
                <span class="bg-neutral-900 px-2 py-0.5 rounded">Inventory-Aware</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ==================== TAB 6: CHATBOT ANALYTICS ==================== -->
    <div id="tab-chatbot" class="admin-tab-content hidden space-y-8">
      <div class="bg-[#111111] border border-white/10 p-6 rounded-2xl shadow-2xl">
        <div class="flex justify-between items-center mb-6 pb-4 border-b border-white/10">
          <div>
            <h2 class="text-2xl font-bold font-oswald text-white uppercase tracking-wider">Jeff Smith Chatbot Analytics (Section 13)</h2>
            <p class="text-xs text-neutral-400">Track interactions, conversational recommendations, and query patterns in Brewer Guide.</p>
          </div>
          <button onclick="window.dispatchEvent(new CustomEvent('open-chatbot'))" class="bg-orange-500/20 text-orange-400 border border-orange-500/40 text-xs font-bold px-3 py-1.5 rounded-xl hover:bg-orange-500/30 transition flex items-center gap-1.5">
            <i data-lucide="message-circle" class="w-4 h-4"></i>
            <span>Test Brewer Guide</span>
          </button>
        </div>

        <!-- Chatbot KPIs -->
        <div class="grid grid-cols-2 md:grid-cols-6 gap-4 mb-8">
          <div class="bg-black/40 border border-white/10 p-4 rounded-xl text-center">
            <span class="text-[10px] text-neutral-400 uppercase font-bold">Conversations</span>
            <div class="text-2xl font-oswald font-bold text-white mt-1"><?= number_format($chatbotAnalytics['totalConversations']) ?></div>
          </div>
          <div class="bg-black/40 border border-white/10 p-4 rounded-xl text-center">
            <span class="text-[10px] text-neutral-400 uppercase font-bold">Questions Asked</span>
            <div class="text-2xl font-oswald font-bold text-blue-400 mt-1"><?= number_format($chatbotAnalytics['questionsAsked']) ?></div>
          </div>
          <div class="bg-black/40 border border-white/10 p-4 rounded-xl text-center">
            <span class="text-[10px] text-neutral-400 uppercase font-bold">Recommendations</span>
            <div class="text-2xl font-oswald font-bold text-amber-400 mt-1"><?= number_format($chatbotAnalytics['productRecommendations']) ?></div>
          </div>
          <div class="bg-black/40 border border-white/10 p-4 rounded-xl text-center">
            <span class="text-[10px] text-neutral-400 uppercase font-bold">Rec Clicks</span>
            <div class="text-2xl font-oswald font-bold text-purple-400 mt-1"><?= number_format($chatbotAnalytics['recommendationClicks']) ?></div>
          </div>
          <div class="bg-black/40 border border-white/10 p-4 rounded-xl text-center">
            <span class="text-[10px] text-neutral-400 uppercase font-bold">Cart Adds</span>
            <div class="text-2xl font-oswald font-bold text-teal-400 mt-1"><?= number_format($chatbotAnalytics['cartAdds']) ?></div>
          </div>
          <div class="bg-black/40 border border-emerald-500/30 p-4 rounded-xl text-center bg-emerald-950/20">
            <span class="text-[10px] text-emerald-400 uppercase font-bold">Purchases</span>
            <div class="text-2xl font-oswald font-bold text-emerald-300 mt-1"><?= number_format($chatbotAnalytics['purchases']) ?></div>
          </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
          <!-- Common Queries -->
          <div>
            <h3 class="font-bold text-lg font-oswald text-white uppercase tracking-wide mb-4">Common Customer Queries</h3>
            <div class="space-y-2.5">
              <?php foreach ($chatbotAnalytics['commonQueries'] as $q): ?>
                <div class="p-3 bg-black/40 border border-white/10 rounded-xl flex items-center justify-between text-xs hover:border-white/20 transition">
                  <div>
                    <span class="font-bold text-white">"<?= htmlspecialchars($q['query']) ?>"</span>
                    <p class="text-[11px] text-neutral-400 mt-0.5">Top recommendation: <strong class="text-[var(--gold)]"><?= htmlspecialchars($q['topMatch']) ?></strong></p>
                  </div>
                  <span class="bg-neutral-900 border border-white/10 px-2 py-1 rounded text-neutral-300 font-mono text-[10px]"><?= $q['count'] ?> asks</span>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Section 14: Chatbot Recommendation Flow Simulator -->
          <div class="bg-black/40 border border-white/10 p-5 rounded-2xl">
            <div class="flex items-center gap-2 mb-3">
              <i data-lucide="git-merge" class="w-5 h-5 text-orange-400"></i>
              <h3 class="font-bold text-lg font-oswald text-white uppercase">Chatbot Recommendation Flow (Section 14)</h3>
            </div>
            <p class="text-xs text-neutral-400 mb-4">Unified recommendation engine execution in conversation:</p>

            <div class="space-y-3 font-mono text-xs">
              <div class="p-3 bg-neutral-900 border border-neutral-800 rounded-xl">
                <span class="text-blue-400 font-bold">1. Customer Query:</span>
                <p class="text-neutral-200 mt-1">"I like Island IPA but I want to try something different."</p>
              </div>

              <div class="p-3 bg-neutral-900 border border-neutral-800 rounded-xl">
                <span class="text-purple-400 font-bold">2. System Feature Extraction:</span>
                <p class="text-neutral-400 mt-1">Analyzing previous purchases (Island IPA, Brechin Castle), high IBU affinity (90%), complex malt preference, stock availability.</p>
              </div>

              <div class="p-3 bg-neutral-900 border border-neutral-800 rounded-xl">
                <span class="text-amber-400 font-bold">3. Recommendation Engine Scoring:</span>
                <p class="text-neutral-400 mt-1">
                  1. OCD Saison: 91% Match (High complexity, Saison style)<br>
                  2. Bitter Truth Stout: 84% Match (High bitterness, roasted)<br>
                  3. Maracas Mist: 72% Match (Citrus balance)
                </p>
              </div>

              <div class="p-3 bg-emerald-950/40 border border-emerald-800/40 rounded-xl">
                <span class="text-emerald-400 font-bold">4. Conversational Delivery with Direct Cart Button:</span>
                <p class="text-emerald-200 mt-1">"If you love Island IPA's bold flavor, I recommend our <strong>OCD Saison</strong> (91% match) or <strong>Bitter Truth Stout</strong> (84% match)!"</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ==================== TAB 7: GAMIFICATION ==================== -->
    <div id="tab-gamification" class="admin-tab-content hidden space-y-8">
      <div class="bg-[#111111] border border-white/10 p-6 rounded-2xl shadow-2xl">
        <div class="flex justify-between items-center mb-6 pb-4 border-b border-white/10">
          <div>
            <h2 class="text-2xl font-bold font-oswald text-white uppercase tracking-wider">Gamification & Loyalty Analytics (Section 17)</h2>
            <p class="text-xs text-neutral-400">Track Krewe points velocity, review submissions, and reward redemptions.</p>
          </div>
          <span class="text-xs font-bold text-amber-400 bg-amber-500/10 border border-amber-500/30 px-3 py-1 rounded-full">Repeat Purchases: 64%</span>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-6 gap-4 mb-8">
          <div class="bg-black/40 border border-white/10 p-4 rounded-xl text-center">
            <span class="text-[10px] text-neutral-400 uppercase font-bold">Points Awarded</span>
            <div class="text-2xl font-oswald font-bold text-[var(--gold)] mt-1"><?= number_format($gamification['pointsAwarded']) ?></div>
          </div>
          <div class="bg-black/40 border border-white/10 p-4 rounded-xl text-center">
            <span class="text-[10px] text-neutral-400 uppercase font-bold">Points Redeemed</span>
            <div class="text-2xl font-oswald font-bold text-red-400 mt-1"><?= number_format($gamification['pointsRedeemed']) ?></div>
          </div>
          <div class="bg-black/40 border border-white/10 p-4 rounded-xl text-center">
            <span class="text-[10px] text-neutral-400 uppercase font-bold">Reviews Done</span>
            <div class="text-2xl font-oswald font-bold text-blue-400 mt-1"><?= $gamification['reviewsCompleted'] ?></div>
          </div>
          <div class="bg-black/40 border border-white/10 p-4 rounded-xl text-center">
            <span class="text-[10px] text-neutral-400 uppercase font-bold">Challenges Done</span>
            <div class="text-2xl font-oswald font-bold text-purple-400 mt-1"><?= $gamification['challengesCompleted'] ?></div>
          </div>
          <div class="bg-black/40 border border-white/10 p-4 rounded-xl text-center">
            <span class="text-[10px] text-neutral-400 uppercase font-bold">Rewards Claimed</span>
            <div class="text-2xl font-oswald font-bold text-teal-400 mt-1"><?= $gamification['rewardsClaimed'] ?></div>
          </div>
          <div class="bg-black/40 border border-white/10 p-4 rounded-xl text-center">
            <span class="text-[10px] text-neutral-400 uppercase font-bold">Repeat Purchase</span>
            <div class="text-2xl font-oswald font-bold text-emerald-400 mt-1"><?= $gamification['repeatPurchases'] ?></div>
          </div>
        </div>

        <!-- Gamification Chart over 7/30/90 Days (Section 17) -->
        <div class="flex justify-between items-center mb-4">
          <h3 class="font-bold text-lg font-oswald text-white uppercase">Engagement Trends Over Time</h3>
          <div class="flex items-center gap-1.5">
            <button class="px-2.5 py-1 rounded bg-[var(--gold)] text-black text-xs font-bold">Last 7 Days</button>
            <button class="px-2.5 py-1 rounded bg-neutral-900 border border-white/10 text-neutral-300 text-xs font-bold">Last 30 Days</button>
            <button class="px-2.5 py-1 rounded bg-neutral-900 border border-white/10 text-neutral-300 text-xs font-bold">Last 90 Days</button>
          </div>
        </div>
        <div id="full-engagement-chart" class="w-full"></div>
      </div>
    </div>

    <!-- ==================== TAB 8: ORDERS MANAGEMENT ==================== -->
    <div id="tab-orders" class="admin-tab-content hidden space-y-8">
      
      <!-- 18. Order Fulfilment & Shipping Manager (Section 18) -->
      <div class="bg-[#111111] border border-white/10 rounded-2xl shadow-2xl overflow-hidden">
        <div class="px-6 py-5 border-b border-white/10 bg-black/40 flex flex-col sm:flex-row justify-between sm:items-center gap-4">
          <div class="flex items-center gap-3">
            <div class="p-2.5 bg-amber-500/10 text-amber-400 border border-amber-500/20 rounded-xl">
              <i data-lucide="truck" class="w-5 h-5"></i>
            </div>
            <div>
              <h3 class="font-bold text-xl text-white font-oswald uppercase tracking-wide">Order Fulfilment & Shipping Manager (Section 18)</h3>
              <p class="text-xs text-neutral-400">Update order status between Brewing, Island Delivery, or Brewery Taproom Pickup in real-time.</p>
            </div>
          </div>
          <span class="text-xs font-bold text-neutral-400"><?= count($recentOrders) ?> Active Orders</span>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full text-left">
            <thead class="bg-black/60 text-neutral-400 text-xs uppercase tracking-wider border-b border-white/10">
              <tr>
                <th class="px-6 py-4 font-semibold">Order ID</th>
                <th class="px-6 py-4 font-semibold">Customer</th>
                <th class="px-6 py-4 font-semibold">Delivery Mode</th>
                <th class="px-6 py-4 font-semibold">Current Status</th>
                <th class="px-6 py-4 font-semibold">Total</th>
                <th class="px-6 py-4 font-semibold text-right">Update Order Status</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
              <?php foreach ($recentOrders as $order): 
                $isPickup = ($order['delivery_type'] ?? '') === 'pickup' || str_contains(strtolower($order['status'] ?? ''), 'collection') || str_contains(strtolower($order['status'] ?? ''), 'pickup');
                $statusColor = str_contains(strtolower($order['status'] ?? ''), 'ready') ? 'amber' : ($order['status'] === 'Delivered' || $order['status'] === 'Picked Up' ? 'emerald' : 'blue');
              ?>
                <tr class="hover:bg-white/5 transition-colors">
                  <td class="px-6 py-4 font-mono font-bold text-amber-300">#<?= htmlspecialchars($order['id']) ?></td>
                  <td class="px-6 py-4 font-bold text-white"><?= htmlspecialchars($order['customer'] ?? 'Jeff Smith') ?></td>
                  <td class="px-6 py-4 text-xs font-semibold text-neutral-300">
                    <?php if ($isPickup): ?>
                      <span class="bg-amber-950/60 text-amber-400 border border-amber-800/40 px-2.5 py-1 rounded-full inline-flex items-center gap-1">
                        <i data-lucide="store" class="w-3.5 h-3.5"></i> Taproom Pickup
                      </span>
                    <?php else: ?>
                      <span class="bg-teal-950/60 text-teal-400 border border-teal-800/40 px-2.5 py-1 rounded-full inline-flex items-center gap-1">
                        <i data-lucide="truck" class="w-3.5 h-3.5"></i> Island Delivery
                      </span>
                    <?php endif; ?>
                  </td>
                  <td class="px-6 py-4">
                    <span id="status-badge-<?= htmlspecialchars($order['id']) ?>" class="bg-<?= $statusColor ?>-950/80 text-<?= $statusColor ?>-400 border border-<?= $statusColor ?>-800/40 text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full inline-flex items-center gap-1.5 shadow">
                      <span class="w-2 h-2 rounded-full bg-<?= $statusColor ?>-400 animate-pulse"></span>
                      <?= htmlspecialchars($order['status']) ?>
                    </span>
                  </td>
                  <td class="px-6 py-4 font-oswald font-bold text-white text-lg">$<?= number_format($order['total'], 2) ?></td>
                  <td class="px-6 py-4 text-right">
                    <div class="inline-flex items-center gap-2">
                      <select id="status-select-<?= htmlspecialchars($order['id']) ?>" class="bg-black/60 border border-white/15 rounded-xl px-3 py-1.5 text-xs text-white outline-none focus:border-[var(--gold)] font-medium">
                        <option value="Order Placed" <?= $order['status'] === 'Order Placed' ? 'selected' : '' ?>>1. Order Placed</option>
                        <option value="Brewing & Bottling" <?= $order['status'] === 'Brewing & Bottling' ? 'selected' : '' ?>>2. Brewing & Bottling</option>
                        <option value="Out for Delivery" <?= $order['status'] === 'Out for Delivery' ? 'selected' : '' ?>>3. Out for Delivery 🚚</option>
                        <option value="Ready for Brewery Collection" <?= ($order['status'] === 'Ready for Brewery Collection' || $order['status'] === 'Ready for Collection') ? 'selected' : '' ?>>4. Ready for Collection 🍺</option>
                        <option value="Delivered" <?= $order['status'] === 'Delivered' ? 'selected' : '' ?>>5. Delivered ✅</option>
                        <option value="Picked Up" <?= $order['status'] === 'Picked Up' ? 'selected' : '' ?>>6. Picked Up 🎉</option>
                      </select>
                      <button onclick="adminUpdateStatus('<?= htmlspecialchars($order['id']) ?>')" class="bg-[var(--gold)] text-black hover:bg-yellow-500 font-bold uppercase text-[10px] px-3 py-1.5 rounded-xl transition shadow flex items-center gap-1">
                        <i data-lucide="refresh-cw" class="w-3 h-3"></i> Save
                      </button>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- ==================== TAB 9: INVENTORY & PRODUCTS ==================== -->
    <div id="tab-inventory" class="admin-tab-content hidden space-y-8">
      
      <!-- 19 & 20. Inventory & Product Management (Section 19 & 20) -->
      <div class="bg-[#111111] border border-white/10 rounded-2xl shadow-2xl overflow-hidden">
        <div class="px-6 py-5 border-b border-white/10 bg-black/40 flex flex-col md:flex-row justify-between md:items-center gap-4">
          <div>
            <h2 class="text-2xl font-bold font-oswald text-white uppercase tracking-wider">Current Inventory Management (Section 19)</h2>
            <p class="text-xs text-neutral-400">Manage stock levels, edit product attributes, generate AI artwork, or upload custom imagery.</p>
          </div>
          <div class="flex flex-wrap items-center gap-2.5">
            <div class="relative w-48 sm:w-64">
              <input 
                type="text" 
                id="inventory-search"
                placeholder="Search inventory..." 
                class="w-full pl-9 pr-4 py-2 border border-white/15 bg-black/50 rounded-xl text-xs focus:outline-none focus:border-[var(--gold)] text-white placeholder-neutral-500 transition"
              />
              <i data-lucide="search" class="absolute left-3 top-2.5 h-4 w-4 text-neutral-500"></i>
            </div>
            <button onclick="openAddProductModal()" class="bg-[var(--gold)] text-black px-3.5 py-2 rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-yellow-500 transition flex items-center gap-1">
              <i data-lucide="plus" class="w-4 h-4"></i> Add Product
            </button>
          </div>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full text-left">
            <thead class="bg-black/60 text-neutral-400 text-xs uppercase tracking-wider border-b border-white/10">
              <tr>
                <th class="px-6 py-4 font-semibold">Product</th>
                <th class="px-6 py-4 font-semibold">Style</th>
                <th class="px-6 py-4 font-semibold">Price</th>
                <th class="px-6 py-4 font-semibold">Status</th>
                <th class="px-6 py-4 font-semibold">Stock Level</th>
                <th class="px-6 py-4 font-semibold text-right">Actions (Section 20)</th>
              </tr>
            </thead>
            <tbody id="inventory-table-body" class="divide-y divide-white/5">
              <?php foreach ($inventory as $beer): 
                $stock = $beer['stock'] ?? ($beer['availability'] === 'LIMITED' ? 12 : 142);
                $maxStock = $beer['max_stock'] ?? ($beer['availability'] === 'LIMITED' ? 50 : 200);
                $pct = min(100, round(($stock / $maxStock) * 100));
                $isLow = ($stock <= 20) || ($beer['availability'] === 'LIMITED');
              ?>
                <tr class="hover:bg-white/5 transition-colors inventory-row" data-name="<?= htmlspecialchars(strtolower($beer['name'])) ?>" data-style="<?= htmlspecialchars(strtolower($beer['style'])) ?>">
                  <td class="px-6 py-4">
                    <div class="flex items-center">
                      <div class="h-11 w-11 rounded-lg bg-neutral-900 overflow-hidden mr-3 relative shadow border border-white/10 shrink-0">
                        <img src="<?= htmlspecialchars($beer['image']) ?>" alt="<?= htmlspecialchars($beer['name']) ?>" class="h-full w-full object-cover" />
                      </div>
                      <div>
                        <div class="font-bold text-white"><?= htmlspecialchars($beer['name']) ?></div>
                        <div class="text-[10px] text-neutral-400 font-mono"><?= $beer['abv'] ?? 5.0 ?>% ABV · <?= $beer['ibu'] ?? 30 ?> IBU</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 text-neutral-300 text-xs font-semibold"><?= htmlspecialchars($beer['style']) ?></td>
                  <td class="px-6 py-4 font-bold text-white font-oswald text-base">$<?= number_format($beer['price'], 2) ?></td>
                  <td class="px-6 py-4">
                    <span class="px-2.5 py-1 text-[10px] font-bold rounded-full uppercase tracking-wider border <?= $isLow ? 'bg-red-500/10 text-red-400 border-red-500/30' : ($beer['availability'] === 'SEASONAL' ? 'bg-purple-500/10 text-purple-400 border-purple-500/30' : 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30') ?>">
                      <?= $isLow ? 'Low Stock' : ($beer['availability'] === 'SEASONAL' ? 'Seasonal' : 'In Stock') ?>
                    </span>
                  </td>
                  <td class="px-6 py-4">
                    <div class="w-36">
                      <div class="flex justify-between text-[11px] mb-1">
                        <span class="<?= $isLow ? 'text-red-400 font-bold' : 'text-neutral-400' ?>"><?= $stock ?>/<?= $maxStock ?></span>
                        <span class="text-neutral-500"><?= $pct ?>%</span>
                      </div>
                      <div class="w-full bg-neutral-800 rounded-full h-1.5">
                        <div class="h-1.5 rounded-full <?= $isLow ? 'bg-red-500' : 'bg-teal-500' ?>" style="width: <?= $pct ?>%"></div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 text-right">
                    <div class="inline-flex items-center gap-2">
                      <button 
                        onclick="openEditProductModal(<?= htmlspecialchars(json_encode($beer)) ?>)" 
                        class="text-neutral-300 hover:text-white bg-neutral-800 hover:bg-neutral-700 px-3 py-1.5 rounded-lg text-xs font-bold transition focus:outline-none"
                      >
                        Edit
                      </button>
                      <button 
                        onclick="deleteBeerProduct('<?= htmlspecialchars($beer['id']) ?>', '<?= htmlspecialchars(addslashes($beer['name'])) ?>')" 
                        class="text-red-400 hover:text-red-300 p-1.5 hover:bg-red-500/20 rounded-lg transition focus:outline-none"
                        title="Delete Product"
                      >
                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
              
              <tr id="no-inventory-msg" style="display: none;">
                <td colspan="6" class="px-6 py-8 text-center text-neutral-400 italic">
                  No products found matching your search.
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- ==================== TAB 10: FEEDBACK LOOP & EVENT STREAM ==================== -->
    <div id="tab-feedback-loop" class="admin-tab-content hidden space-y-8">
      
      <!-- 22. Intelligent E-Commerce Feedback Loop (Section 22) -->
      <div class="bg-[#111111] border border-white/10 p-6 rounded-2xl shadow-2xl">
        <div class="flex items-center gap-3 mb-2">
          <div class="p-2.5 bg-[var(--gold)]/10 text-[var(--gold)] border border-[var(--gold)]/20 rounded-xl">
            <i data-lucide="repeat" class="w-6 h-6"></i>
          </div>
          <div>
            <h2 class="text-2xl font-bold font-oswald text-white uppercase tracking-wider">Intelligent E-Commerce Feedback Loop (Section 22)</h2>
            <p class="text-xs text-neutral-400">The complete system operates as a continuous, closed-loop machine intelligence architecture.</p>
          </div>
        </div>

        <!-- Visual Loop Steps -->
        <div class="grid grid-cols-2 md:grid-cols-5 gap-3 my-6">
          <div class="p-3 bg-black/50 border border-white/10 rounded-xl text-center">
            <div class="w-7 h-7 rounded-full bg-blue-500/20 text-blue-400 font-bold mx-auto mb-2 flex items-center justify-center text-xs">1</div>
            <h4 class="text-xs font-bold text-white uppercase">Customer Activity</h4>
            <p class="text-[10px] text-neutral-400 mt-1">Clicks, views, cart, chat</p>
          </div>
          <div class="p-3 bg-black/50 border border-white/10 rounded-xl text-center">
            <div class="w-7 h-7 rounded-full bg-teal-500/20 text-teal-400 font-bold mx-auto mb-2 flex items-center justify-center text-xs">2</div>
            <h4 class="text-xs font-bold text-white uppercase">Data Collection</h4>
            <p class="text-[10px] text-neutral-400 mt-1">Structured telemetry events</p>
          </div>
          <div class="p-3 bg-black/50 border border-white/10 rounded-xl text-center">
            <div class="w-7 h-7 rounded-full bg-purple-500/20 text-purple-400 font-bold mx-auto mb-2 flex items-center justify-center text-xs">3</div>
            <h4 class="text-xs font-bold text-white uppercase">Customer Profile</h4>
            <p class="text-[10px] text-neutral-400 mt-1">Inferred styles, IBU/ABV taste</p>
          </div>
          <div class="p-3 bg-black/50 border border-white/10 rounded-xl text-center">
            <div class="w-7 h-7 rounded-full bg-amber-500/20 text-amber-400 font-bold mx-auto mb-2 flex items-center justify-center text-xs">4</div>
            <h4 class="text-xs font-bold text-white uppercase">Rec Engine</h4>
            <p class="text-[10px] text-neutral-400 mt-1">40/25/15/10/10 weighting</p>
          </div>
          <div class="p-3 bg-black/50 border border-white/10 rounded-xl text-center col-span-2 md:col-span-1">
            <div class="w-7 h-7 rounded-full bg-emerald-500/20 text-emerald-400 font-bold mx-auto mb-2 flex items-center justify-center text-xs">5</div>
            <h4 class="text-xs font-bold text-white uppercase">Shop & Chatbot</h4>
            <p class="text-[10px] text-neutral-400 mt-1">Transparent rec delivery</p>
          </div>
        </div>

        <!-- 21. Data Collection Event Stream Table (Section 21) -->
        <h3 class="font-bold text-lg font-oswald text-white uppercase tracking-wide mb-4">Real-Time Data Collection Event Stream (Section 21)</h3>
        <div class="overflow-x-auto">
          <table class="w-full text-left font-mono text-xs">
            <thead class="bg-black/60 text-neutral-400 text-[10px] uppercase tracking-wider border-b border-white/10">
              <tr>
                <th class="px-5 py-3 font-semibold">Event Type</th>
                <th class="px-5 py-3 font-semibold">Customer</th>
                <th class="px-5 py-3 font-semibold">Product / Detail</th>
                <th class="px-5 py-3 font-semibold">Source</th>
                <th class="px-5 py-3 font-semibold">Rec ID</th>
                <th class="px-5 py-3 font-semibold text-right">Time</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
              <?php foreach ($dataEvents as $ev): ?>
                <tr class="hover:bg-white/5 transition">
                  <td class="px-5 py-3 font-bold text-amber-300">
                    <span class="bg-neutral-900 border border-white/10 px-2 py-0.5 rounded text-[10px]"><?= htmlspecialchars($ev['event']) ?></span>
                  </td>
                  <td class="px-5 py-3 text-white"><?= htmlspecialchars($ev['customer']) ?></td>
                  <td class="px-5 py-3 text-neutral-300"><?= htmlspecialchars($ev['product']) ?></td>
                  <td class="px-5 py-3 text-teal-400"><?= htmlspecialchars($ev['source']) ?></td>
                  <td class="px-5 py-3 text-neutral-400"><?= htmlspecialchars($ev['recId']) ?></td>
                  <td class="px-5 py-3 text-right text-neutral-500"><?= htmlspecialchars($ev['time']) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- ==================== MODALS ==================== -->

<!-- 1. EXPORT REPORT MODAL -->
<div id="export-report-modal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/80 backdrop-blur-md hidden pointer-events-auto">
  <div class="bg-[#111111] border border-white/15 rounded-2xl max-w-md w-full p-6 shadow-2xl relative">
    <button onclick="closeExportModal()" class="absolute top-4 right-4 text-neutral-400 hover:text-white p-2 rounded-full hover:bg-neutral-800">
      <i data-lucide="x" class="w-5 h-5"></i>
    </button>
    <div class="flex items-center gap-3 mb-4">
      <div class="p-2.5 bg-[var(--gold)]/10 text-[var(--gold)] rounded-xl border border-[var(--gold)]/30">
        <i data-lucide="download" class="w-5 h-5"></i>
      </div>
      <div>
        <h3 class="font-bold text-lg font-oswald text-white uppercase">Export Intelligence Report</h3>
        <p class="text-xs text-neutral-400">Download executive reports in CSV or JSON.</p>
      </div>
    </div>
    
    <div class="space-y-3 my-6">
      <a href="?route=admin/exportReport&type=sales&format=csv" target="_blank" class="w-full flex items-center justify-between p-3.5 bg-neutral-900 border border-white/10 rounded-xl hover:border-[var(--gold)] transition group">
        <div class="flex items-center gap-3">
          <i data-lucide="file-spreadsheet" class="w-5 h-5 text-emerald-400"></i>
          <div>
            <div class="font-bold text-xs text-white">Sales & Orders Report (CSV)</div>
            <div class="text-[10px] text-neutral-400">Revenue, Orders, KPIs</div>
          </div>
        </div>
        <i data-lucide="arrow-down-to-line" class="w-4 h-4 text-neutral-400 group-hover:text-white"></i>
      </a>

      <a href="?route=admin/exportReport&type=inventory&format=csv" target="_blank" class="w-full flex items-center justify-between p-3.5 bg-neutral-900 border border-white/10 rounded-xl hover:border-[var(--gold)] transition group">
        <div class="flex items-center gap-3">
          <i data-lucide="boxes" class="w-5 h-5 text-teal-400"></i>
          <div>
            <div class="font-bold text-xs text-white">Inventory & Stock Levels (CSV)</div>
            <div class="text-[10px] text-neutral-400">Current Stock, ABV, IBU, Pricing</div>
          </div>
        </div>
        <i data-lucide="arrow-down-to-line" class="w-4 h-4 text-neutral-400 group-hover:text-white"></i>
      </a>

      <a href="?route=admin/exportReport&type=full&format=json" target="_blank" class="w-full flex items-center justify-between p-3.5 bg-neutral-900 border border-white/10 rounded-xl hover:border-[var(--gold)] transition group">
        <div class="flex items-center gap-3">
          <i data-lucide="code" class="w-5 h-5 text-amber-400"></i>
          <div>
            <div class="font-bold text-xs text-white">Full Intelligence Dump (JSON)</div>
            <div class="text-[10px] text-neutral-400">Complete AI & telemetry bundle</div>
          </div>
        </div>
        <i data-lucide="arrow-down-to-line" class="w-4 h-4 text-neutral-400 group-hover:text-white"></i>
      </a>
    </div>

    <button onclick="closeExportModal()" class="w-full py-2.5 bg-neutral-800 text-neutral-300 font-bold text-xs rounded-xl hover:bg-neutral-700 transition">
      Close
    </button>
  </div>
</div>

<!-- 2. ADD PRODUCT MODAL (Section 20) -->
<div id="add-product-modal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/80 backdrop-blur-md hidden pointer-events-auto">
  <div class="bg-[#111111] border border-white/15 rounded-2xl max-w-xl w-full p-6 shadow-2xl relative max-h-[90vh] overflow-y-auto">
    <button onclick="closeAddProductModal()" class="absolute top-4 right-4 text-neutral-400 hover:text-white p-2 rounded-full hover:bg-neutral-800">
      <i data-lucide="x" class="w-5 h-5"></i>
    </button>
    <div class="flex items-center gap-3 mb-4">
      <div class="p-2.5 bg-[var(--gold)] text-black rounded-xl">
        <i data-lucide="plus" class="w-5 h-5"></i>
      </div>
      <div>
        <h3 class="font-bold text-xl font-oswald text-white uppercase">Add New Craft Beer Product</h3>
        <p class="text-xs text-neutral-400">Enter product specifications for catalog and AI recommendation indexing.</p>
      </div>
    </div>

    <form id="add-product-form" onsubmit="submitAddProduct(event)" class="space-y-4">
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-bold uppercase text-neutral-400 mb-1">Beer Name *</label>
          <input type="text" id="add-name" required placeholder="e.g. Couva Copper Ale" class="w-full bg-black/50 border border-white/15 rounded-xl px-3 py-2 text-xs text-white outline-none focus:border-[var(--gold)]" />
        </div>
        <div>
          <label class="block text-xs font-bold uppercase text-neutral-400 mb-1">Beer Style *</label>
          <input type="text" id="add-style" required placeholder="e.g. Amber Ale, IPA, Stout" class="w-full bg-black/50 border border-white/15 rounded-xl px-3 py-2 text-xs text-white outline-none focus:border-[var(--gold)]" />
        </div>
      </div>

      <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
        <div>
          <label class="block text-xs font-bold uppercase text-neutral-400 mb-1">Price ($TT) *</label>
          <input type="number" step="0.5" id="add-price" required value="18.00" class="w-full bg-black/50 border border-white/15 rounded-xl px-3 py-2 text-xs text-white outline-none focus:border-[var(--gold)]" />
        </div>
        <div>
          <label class="block text-xs font-bold uppercase text-neutral-400 mb-1">Stock Level *</label>
          <input type="number" id="add-stock" required value="142" class="w-full bg-black/50 border border-white/15 rounded-xl px-3 py-2 text-xs text-white outline-none focus:border-[var(--gold)]" />
        </div>
        <div>
          <label class="block text-xs font-bold uppercase text-neutral-400 mb-1">ABV (%)</label>
          <input type="number" step="0.1" id="add-abv" value="5.8" class="w-full bg-black/50 border border-white/15 rounded-xl px-3 py-2 text-xs text-white outline-none focus:border-[var(--gold)]" />
        </div>
        <div>
          <label class="block text-xs font-bold uppercase text-neutral-400 mb-1">IBU</label>
          <input type="number" id="add-ibu" value="38" class="w-full bg-black/50 border border-white/15 rounded-xl px-3 py-2 text-xs text-white outline-none focus:border-[var(--gold)]" />
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-bold uppercase text-neutral-400 mb-1">Availability Status</label>
          <select id="add-availability" class="w-full bg-black/50 border border-white/15 rounded-xl px-3 py-2 text-xs text-white outline-none focus:border-[var(--gold)]">
            <option value="CORE">CORE (Standard Lineup)</option>
            <option value="LIMITED">LIMITED (Small Batch / Low Stock)</option>
            <option value="SEASONAL">SEASONAL (Carnival / Holiday Special)</option>
          </select>
        </div>
        <div>
          <label class="block text-xs font-bold uppercase text-neutral-400 mb-1">Image URL / Path</label>
          <input type="text" id="add-image" value="/public/images/Island IPA.png" class="w-full bg-black/50 border border-white/15 rounded-xl px-3 py-2 text-xs text-white outline-none focus:border-[var(--gold)]" />
        </div>
      </div>

      <div>
        <label class="block text-xs font-bold uppercase text-neutral-400 mb-1">Product Description</label>
        <textarea id="add-description" rows="3" class="w-full bg-black/50 border border-white/15 rounded-xl px-3 py-2 text-xs text-white outline-none focus:border-[var(--gold)]" placeholder="Craft beer brewed with local Trinidadian ingredients..."></textarea>
      </div>

      <div class="flex justify-end gap-3 pt-3 border-t border-white/10">
        <button type="button" onclick="closeAddProductModal()" class="px-4 py-2 bg-neutral-800 text-neutral-300 rounded-xl text-xs font-bold hover:bg-neutral-700 transition">Cancel</button>
        <button type="submit" class="px-5 py-2 bg-[var(--gold)] text-black rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-yellow-500 transition">Create Product</button>
      </div>
    </form>
  </div>
</div>

<!-- 3. EDIT PRODUCT MODAL (Section 20) -->
<div id="edit-product-modal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/80 backdrop-blur-md hidden pointer-events-auto">
  <div class="bg-[#111111] border border-white/15 rounded-2xl max-w-xl w-full p-6 shadow-2xl relative max-h-[90vh] overflow-y-auto">
    <button onclick="closeEditProductModal()" class="absolute top-4 right-4 text-neutral-400 hover:text-white p-2 rounded-full hover:bg-neutral-800">
      <i data-lucide="x" class="w-5 h-5"></i>
    </button>
    <div class="flex items-center gap-3 mb-4">
      <div class="p-2.5 bg-teal-500 text-white rounded-xl">
        <i data-lucide="edit-3" class="w-5 h-5"></i>
      </div>
      <div>
        <h3 id="edit-modal-title" class="font-bold text-xl font-oswald text-white uppercase">Edit Product</h3>
        <p class="text-xs text-neutral-400">Update price, stock levels, ABV, and availability status.</p>
      </div>
    </div>

    <form id="edit-product-form" onsubmit="submitEditProduct(event)" class="space-y-4">
      <input type="hidden" id="edit-id" />

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-bold uppercase text-neutral-400 mb-1">Beer Style</label>
          <input type="text" id="edit-style" class="w-full bg-black/50 border border-white/15 rounded-xl px-3 py-2 text-xs text-white outline-none focus:border-[var(--gold)]" />
        </div>
        <div>
          <label class="block text-xs font-bold uppercase text-neutral-400 mb-1">Price ($TT)</label>
          <input type="number" step="0.5" id="edit-price" required class="w-full bg-black/50 border border-white/15 rounded-xl px-3 py-2 text-xs text-white outline-none focus:border-[var(--gold)]" />
        </div>
      </div>

      <div class="grid grid-cols-3 gap-3">
        <div>
          <label class="block text-xs font-bold uppercase text-neutral-400 mb-1">Stock</label>
          <input type="number" id="edit-stock" required class="w-full bg-black/50 border border-white/15 rounded-xl px-3 py-2 text-xs text-white outline-none focus:border-[var(--gold)]" />
        </div>
        <div>
          <label class="block text-xs font-bold uppercase text-neutral-400 mb-1">ABV (%)</label>
          <input type="number" step="0.1" id="edit-abv" class="w-full bg-black/50 border border-white/15 rounded-xl px-3 py-2 text-xs text-white outline-none focus:border-[var(--gold)]" />
        </div>
        <div>
          <label class="block text-xs font-bold uppercase text-neutral-400 mb-1">IBU</label>
          <input type="number" id="edit-ibu" class="w-full bg-black/50 border border-white/15 rounded-xl px-3 py-2 text-xs text-white outline-none focus:border-[var(--gold)]" />
        </div>
      </div>

      <div>
        <label class="block text-xs font-bold uppercase text-neutral-400 mb-1">Availability Status</label>
        <select id="edit-availability" class="w-full bg-black/50 border border-white/15 rounded-xl px-3 py-2 text-xs text-white outline-none focus:border-[var(--gold)]">
          <option value="CORE">CORE (In Stock / Standard)</option>
          <option value="LIMITED">LIMITED (Low Stock Alert)</option>
          <option value="SEASONAL">SEASONAL (Special Release)</option>
        </select>
      </div>

      <div>
        <label class="block text-xs font-bold uppercase text-neutral-400 mb-1">Product Description</label>
        <textarea id="edit-description" rows="3" class="w-full bg-black/50 border border-white/15 rounded-xl px-3 py-2 text-xs text-white outline-none focus:border-[var(--gold)]"></textarea>
      </div>

      <div class="flex justify-end gap-3 pt-3 border-t border-white/10">
        <button type="button" onclick="closeEditProductModal()" class="px-4 py-2 bg-neutral-800 text-neutral-300 rounded-xl text-xs font-bold hover:bg-neutral-700 transition">Cancel</button>
        <button type="submit" class="px-5 py-2 bg-teal-500 text-white rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-teal-600 transition">Save Changes</button>
      </div>
    </form>
  </div>
</div>

<!-- Hidden File Input for Image Upload -->
<input type="file" id="admin-file-uploader" class="hidden" accept="image/*" />

<!-- ==================== JAVASCRIPT CONTROLLERS ==================== -->
<script>
// Data store passed from PHP
const salesDataStore = <?= json_encode($salesAnalytics['periods']) ?>;
let currentMetric = 'revenue';
let currentPeriod = '7d';
let salesChartInstance = null;
let funnelChartInstance = null;
let engagementChartInstance = null;

// TAB SWITCHING
function switchAdminTab(tabKey) {
  document.querySelectorAll('.admin-tab-content').forEach(el => el.classList.add('hidden'));
  document.querySelectorAll('.admin-tab-btn').forEach(btn => {
    btn.classList.remove('bg-[var(--gold)]', 'text-black', 'shadow');
    btn.classList.add('text-neutral-400');
  });

  const activeContent = document.getElementById('tab-' + tabKey);
  const activeBtn = document.querySelector(`.admin-tab-btn[data-tab-btn="${tabKey}"]`);

  if (activeContent) activeContent.classList.remove('hidden');
  if (activeBtn) {
    activeBtn.classList.remove('text-neutral-400');
    activeBtn.classList.add('bg-[var(--gold)]', 'text-black', 'shadow');
  }

  // Trigger ApexCharts recalculation on tab reveal
  setTimeout(() => {
    window.dispatchEvent(new Event('resize'));
  }, 100);
}

// LIVE ACTIVITY FILTER
function filterLiveActivity(type) {
  document.querySelectorAll('.activity-filter-btn').forEach(b => {
    b.classList.remove('bg-[var(--gold)]', 'text-black');
    b.classList.add('bg-neutral-900', 'text-neutral-300');
  });
  event.target.classList.remove('bg-neutral-900', 'text-neutral-300');
  event.target.classList.add('bg-[var(--gold)]', 'text-black');

  const cards = document.querySelectorAll('.activity-card');
  cards.forEach(card => {
    if (type === 'all' || card.dataset.type === type) {
      card.style.display = '';
    } else {
      card.style.display = 'none';
    }
  });
}

// SALES ANALYTICS PERIOD CHANGING
function changeSalesPeriod(periodKey) {
  currentPeriod = periodKey;
  document.querySelectorAll('.sales-period-btn').forEach(b => {
    b.classList.remove('bg-[var(--gold)]', 'text-black');
    b.classList.add('bg-neutral-900', 'text-neutral-300');
  });
  event.target.classList.remove('bg-neutral-900', 'text-neutral-300');
  event.target.classList.add('bg-[var(--gold)]', 'text-black');

  const data = salesDataStore[periodKey];
  if (data) {
    document.getElementById('metric-revenue').innerText = '$' + data.revenue.toLocaleString();
    document.getElementById('metric-orders').innerText = data.orders.toLocaleString();
    document.getElementById('metric-aov').innerText = '$' + data.aov.toFixed(2);
    document.getElementById('metric-units').innerText = data.unitsSold.toLocaleString();
    document.getElementById('metric-conversion').innerText = data.conversionRate;
  }
  updateSalesChart();
}

function switchSalesMetric(metric) {
  currentMetric = metric;
  ['revenue', 'orders', 'units'].forEach(m => {
    const btn = document.getElementById('btn-chart-' + m);
    if (m === metric) {
      btn.className = "px-3 py-1.5 rounded-lg bg-[var(--gold)] text-black text-xs font-bold";
    } else {
      btn.className = "px-3 py-1.5 rounded-lg bg-neutral-900 border border-white/10 text-neutral-300 hover:text-white text-xs font-bold";
    }
  });
  updateSalesChart();
}

function updateSalesChart() {
  if (!salesChartInstance) return;

  let seriesName = 'Revenue';
  let seriesData = [4200, 3100, 2400, 3900, 4800, 5200, 6100];
  let categories = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

  if (currentMetric === 'orders') {
    seriesName = 'Orders';
    seriesData = [5, 4, 3, 6, 8, 9, 11];
  } else if (currentMetric === 'units') {
    seriesName = 'Units Sold';
    seriesData = [180, 140, 110, 190, 240, 280, 340];
  }

  salesChartInstance.updateOptions({
    xaxis: { categories: categories },
    series: [{ name: seriesName, data: seriesData }]
  });
}

// ORDER STATUS UPDATING
function adminUpdateStatus(orderId) {
  const select = document.getElementById('status-select-' + orderId);
  if (!select) return;
  const newStatus = select.value;

  fetch('?route=admin/updateOrderStatus', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ orderId: orderId, status: newStatus })
  })
  .then(r => r.json())
  .then(data => {
    if (data.success) {
      alert('Order #' + orderId + ' status successfully updated to: ' + newStatus);
      window.location.reload();
    } else {
      alert('Failed to update status: ' + (data.error || 'Unknown error'));
    }
  })
  .catch(err => {
    console.error(err);
    alert('Error updating status.');
  });
}

// MODAL TOGGLES
function openExportModal() { document.getElementById('export-report-modal').classList.remove('hidden'); }
function closeExportModal() { document.getElementById('export-report-modal').classList.add('hidden'); }
function openAddProductModal() { document.getElementById('add-product-modal').classList.remove('hidden'); }
function closeAddProductModal() { document.getElementById('add-product-modal').classList.add('hidden'); }

function openEditProductModal(beer) {
  document.getElementById('edit-id').value = beer.id || '';
  document.getElementById('edit-modal-title').innerText = 'Edit ' + (beer.name || 'Product');
  document.getElementById('edit-style').value = beer.style || '';
  document.getElementById('edit-price').value = beer.price || 15;
  document.getElementById('edit-stock').value = beer.stock || 142;
  document.getElementById('edit-abv').value = beer.abv || 5.0;
  document.getElementById('edit-ibu').value = beer.ibu || 30;
  document.getElementById('edit-availability').value = beer.availability || 'CORE';
  document.getElementById('edit-description').value = beer.description || '';
  document.getElementById('edit-product-modal').classList.remove('hidden');
}
function closeEditProductModal() { document.getElementById('edit-product-modal').classList.add('hidden'); }

// SUBMIT ADD PRODUCT
function submitAddProduct(e) {
  e.preventDefault();
  const payload = {
    name: document.getElementById('add-name').value,
    style: document.getElementById('add-style').value,
    price: document.getElementById('add-price').value,
    stock: document.getElementById('add-stock').value,
    abv: document.getElementById('add-abv').value,
    ibu: document.getElementById('add-ibu').value,
    availability: document.getElementById('add-availability').value,
    image: document.getElementById('add-image').value,
    description: document.getElementById('add-description').value,
  };

  fetch('?route=admin/addProduct', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(payload)
  })
  .then(r => r.json())
  .then(data => {
    if (data.success) {
      alert('Product created successfully!');
      window.location.reload();
    } else {
      alert('Error adding product: ' + (data.error || 'Failed'));
    }
  });
}

// SUBMIT EDIT PRODUCT
function submitEditProduct(e) {
  e.preventDefault();
  const id = document.getElementById('edit-id').value;
  const payload = {
    id: id,
    style: document.getElementById('edit-style').value,
    price: parseFloat(document.getElementById('edit-price').value),
    stock: parseInt(document.getElementById('edit-stock').value),
    abv: parseFloat(document.getElementById('edit-abv').value),
    ibu: parseInt(document.getElementById('edit-ibu').value),
    availability: document.getElementById('edit-availability').value,
    description: document.getElementById('edit-description').value,
  };

  fetch('?route=admin/updateProduct', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(payload)
  })
  .then(r => r.json())
  .then(data => {
    if (data.success) {
      alert('Product updated successfully!');
      window.location.reload();
    } else {
      alert('Error updating product: ' + (data.error || 'Failed'));
    }
  });
}

function deleteBeerProduct(id, name) {
  if (confirm('Are you sure you want to delete "' + name + '"?')) {
    fetch('?route=admin/deleteProduct', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ id: id })
    })
    .then(r => r.json())
    .then(data => {
      if (data.success) {
        alert('Product deleted.');
        window.location.reload();
      }
    });
  }
}

// DOM LOADED EVENT
document.addEventListener('DOMContentLoaded', () => {
  // Inventory Search filter
  const searchInput = document.getElementById('inventory-search');
  if (searchInput) {
    searchInput.addEventListener('input', (e) => {
      const term = e.target.value.toLowerCase();
      let visible = 0;
      document.querySelectorAll('.inventory-row').forEach(row => {
        const name = row.getAttribute('data-name');
        const style = row.getAttribute('data-style');
        if (name.includes(term) || style.includes(term)) {
          row.style.display = '';
          visible++;
        } else {
          row.style.display = 'none';
        }
      });
      const noMsg = document.getElementById('no-inventory-msg');
      if (noMsg) noMsg.style.display = (visible === 0) ? '' : 'none';
    });
  }

  // Render ApexCharts
  if (window.ApexCharts) {
    // 1. Overview Sales Bar Chart
    const overviewSalesEl = document.querySelector("#overview-sales-chart");
    if (overviewSalesEl) {
      new ApexCharts(overviewSalesEl, {
        chart: { type: 'bar', height: 280, fontFamily: 'DM Sans, sans-serif', toolbar: { show: false } },
        series: [{ name: 'Sales ($)', data: [4200, 3100, 2400, 3900, 4800, 5200, 6100] }],
        xaxis: { categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'], labels: { style: { colors: '#a3a3a3' } } },
        yaxis: { labels: { formatter: (v) => '$' + v, style: { colors: '#a3a3a3' } } },
        colors: ['#D4A017'],
        plotOptions: { bar: { borderRadius: 4, columnWidth: '45%' } },
        dataLabels: { enabled: false },
        tooltip: { theme: 'dark', y: { formatter: (v) => '$' + v } }
      }).render();
    }

    // 2. Overview Funnel Bar Chart
    const funnelEl = document.querySelector("#overview-funnel-chart");
    if (funnelEl) {
      funnelChartInstance = new ApexCharts(funnelEl, {
        chart: { type: 'bar', height: 280, fontFamily: 'DM Sans, sans-serif', toolbar: { show: false } },
        plotOptions: { bar: { horizontal: true, barHeight: '55%', borderRadius: 4 } },
        series: [{ name: 'Count', data: [1284, 927, 347, 126, 78] }],
        xaxis: { categories: ['1. Generated', '2. Viewed', '3. Clicked', '4. Cart Adds', '5. Purchased'], labels: { style: { colors: '#a3a3a3' } } },
        yaxis: { labels: { style: { colors: '#f5f0e8', fontWeight: 600 } } },
        colors: ['#0A7C6E'],
        dataLabels: { enabled: true, formatter: (val) => val.toLocaleString() },
        tooltip: { theme: 'dark' }
      });
      funnelChartInstance.render();
    }

    // 3. Full Sales Line Chart
    const fullSalesEl = document.querySelector("#full-sales-chart");
    if (fullSalesEl) {
      salesChartInstance = new ApexCharts(fullSalesEl, {
        chart: { type: 'area', height: 350, fontFamily: 'DM Sans, sans-serif', toolbar: { show: false } },
        series: [{ name: 'Revenue', data: [4200, 3100, 2400, 3900, 4800, 5200, 6100] }],
        xaxis: { categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'], labels: { style: { colors: '#a3a3a3' } } },
        yaxis: { labels: { formatter: (v) => '$' + v, style: { colors: '#a3a3a3' } } },
        colors: ['#D4A017'],
        stroke: { curve: 'smooth', width: 3 },
        fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.45, opacityTo: 0.05, stops: [0, 95, 100] } },
        tooltip: { theme: 'dark', y: { formatter: (v) => '$' + v } }
      });
      salesChartInstance.render();
    }

    // 4. Gamification Multi-Series Chart
    const fullEngagementEl = document.querySelector("#full-engagement-chart");
    if (fullEngagementEl) {
      engagementChartInstance = new ApexCharts(fullEngagementEl, {
        chart: { type: 'line', height: 320, fontFamily: 'DM Sans, sans-serif', toolbar: { show: false } },
        series: [
          { name: 'Reviews Completed', data: [12, 18, 14, 28, 22, 34, 40] },
          { name: 'Points Awarded (x100)', data: [45, 60, 52, 85, 90, 110, 140] },
          { name: 'Rewards Claimed', data: [4, 7, 5, 12, 10, 15, 18] }
        ],
        xaxis: { categories: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'], labels: { style: { colors: '#a3a3a3' } } },
        yaxis: { labels: { style: { colors: '#a3a3a3' } } },
        colors: ['#C04A1A', '#D4A017', '#0A7C6E'],
        stroke: { curve: 'smooth', width: 3 },
        legend: { position: 'bottom', labels: { colors: '#f5f0e8' } },
        tooltip: { theme: 'dark' }
      });
      engagementChartInstance.render();
    }
  }

  // Re-run Lucide Icons
  if (typeof lucide !== 'undefined') {
    lucide.createIcons();
  }
});
</script>
