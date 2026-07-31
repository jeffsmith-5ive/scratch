<!-- Include ApexCharts Library for Interactive Vector Charting -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 text-[#f5f0e8] animate-fade-in">
  <div class="max-w-7xl mx-auto">
    
    <!-- Header -->
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between">
      <div>
        <h1 class="text-4xl font-oswald font-bold text-white uppercase tracking-wide">Admin Dashboard</h1>
        <p class="text-neutral-400 mt-2">Overview of sales, inventory, and user activity.</p>
      </div>
      <div class="mt-4 md:mt-0 flex space-x-3">
         <button class="bg-white/5 border border-white/10 text-neutral-300 px-4 py-2 rounded-lg font-bold text-sm shadow-sm hover:bg-white/10 focus:outline-none transition">
           Export Report
         </button>
         <button class="bg-[var(--gold)] text-black px-4 py-2 rounded-lg font-bold text-sm shadow-lg hover:bg-[var(--gold)]/80 transition uppercase tracking-wider focus:outline-none">
           <i data-lucide="plus" class="w-4 h-4 inline-block -mt-1 mr-1"></i> Add Product
         </button>
      </div>
    </div>

    <!-- Hidden File Input for Image Upload -->
    <input 
      type="file" 
      id="admin-file-uploader" 
      class="hidden" 
      accept="image/*"
    />

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
       <div class="bg-[#111111] border border-white/10 p-6 rounded-xl shadow-2xl flex flex-col justify-between group transition">
         <div class="flex justify-between items-start">
            <div>
               <h3 class="text-neutral-400 text-xs font-bold uppercase tracking-wider">Total Revenue</h3>
               <p class="text-3xl font-bold text-white mt-2">$24,500</p>
            </div>
            <div class="p-2 bg-green-500/10 text-green-400 border border-green-500/20 rounded-lg group-hover:bg-green-500/20 transition">
              <i data-lucide="activity" class="h-5 w-5"></i>
            </div>
         </div>
         <div class="mt-4 flex items-center text-sm">
            <span class="text-green-400 font-bold flex items-center mr-2">
              <i data-lucide="arrow-up-right" class="h-4 w-4 mr-1"></i> 12%
            </span>
            <span class="text-neutral-500">vs last week</span>
         </div>
       </div>

       <div class="bg-[#111111] border border-white/10 p-6 rounded-xl shadow-2xl flex flex-col justify-between group transition">
         <div class="flex justify-between items-start">
            <div>
               <h3 class="text-neutral-400 text-xs font-bold uppercase tracking-wider">Active Orders</h3>
               <p class="text-3xl font-bold text-white mt-2">42</p>
            </div>
            <div class="p-2 bg-blue-500/10 text-blue-400 border border-blue-500/20 rounded-lg group-hover:bg-blue-500/20 transition">
              <i data-lucide="shopping-bag" class="h-5 w-5"></i>
            </div>
         </div>
         <div class="mt-4 flex items-center text-sm">
            <span class="text-blue-400 font-bold flex items-center mr-2">
               8 pending
            </span>
            <span class="text-neutral-500">processing</span>
         </div>
       </div>

       <div class="bg-[#111111] border border-white/10 p-6 rounded-xl shadow-2xl flex flex-col justify-between group transition">
         <div class="flex justify-between items-start">
            <div>
               <h3 class="text-neutral-400 text-xs font-bold uppercase tracking-wider">Loyalty Points</h3>
               <p class="text-3xl font-bold text-white mt-2">12,500</p>
            </div>
            <div class="p-2 bg-purple-500/10 text-purple-400 border border-purple-500/20 rounded-lg group-hover:bg-purple-500/20 transition">
              <i data-lucide="users" class="h-5 w-5"></i>
            </div>
         </div>
         <div class="mt-4 flex items-center text-sm">
            <span class="text-green-400 font-bold flex items-center mr-2">
              <i data-lucide="arrow-up-right" class="h-4 w-4 mr-1"></i> 18%
            </span>
            <span class="text-neutral-500">engagement</span>
         </div>
       </div>

       <div class="bg-[#111111] border border-white/10 p-6 rounded-xl shadow-2xl flex flex-col justify-between group transition">
         <div class="flex justify-between items-start">
            <div>
               <h3 class="text-neutral-400 text-xs font-bold uppercase tracking-wider">Inventory Alert</h3>
               <p class="text-3xl font-bold text-red-500 mt-2">2</p>
            </div>
            <div class="p-2 bg-red-500/10 text-red-400 border border-red-500/20 rounded-lg group-hover:bg-red-500/20 transition">
              <i data-lucide="alert-triangle" class="h-5 w-5"></i>
            </div>
         </div>
         <div class="mt-4 flex items-center text-sm">
            <span class="text-red-400 font-bold flex items-center mr-2">
               Low Stock
            </span>
            <span class="text-neutral-500">needs reorder</span>
         </div>
       </div>
    </div>

    <!-- Customer Activity & Live Monitor Section -->
    <div class="bg-[#111111] border border-white/10 rounded-2xl shadow-2xl overflow-hidden mb-8">
       <div class="px-6 py-5 border-b border-white/10 bg-black/40 flex flex-col sm:flex-row justify-between sm:items-center gap-4">
          <div class="flex items-center gap-3">
             <div class="p-2.5 bg-[var(--gold)]/10 text-[var(--gold)] border border-[var(--gold)]/20 rounded-xl">
                <i data-lucide="eye" class="w-5 h-5"></i>
             </div>
             <div>
                <h3 class="font-bold text-xl text-white font-oswald uppercase tracking-wide">Live Customer Activity Monitor</h3>
                <p class="text-xs text-neutral-400">Real-time actions, orders, logins, and custom brew lab activity from customers.</p>
             </div>
          </div>
          <a href="?route=profile" class="text-xs font-bold uppercase text-[var(--gold)] hover:underline flex items-center gap-1">
             View Customer Profile <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
          </a>
       </div>

       <div class="p-6">
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
             <?php foreach ($customerActivity ?? [] as $act): ?>
                <div class="bg-black/50 border border-white/10 rounded-xl p-4 flex items-start gap-3 hover:border-white/20 transition">
                   <div class="p-2.5 rounded-lg border text-sm <?= $act['badge'] ?> shrink-0">
                      <i data-lucide="<?= $act['icon'] ?>" class="w-4 h-4"></i>
                   </div>
                   <div class="flex-1 min-w-0">
                      <div class="flex justify-between items-start">
                         <h4 class="text-sm font-bold text-white truncate"><?= htmlspecialchars($act['user']) ?></h4>
                         <span class="text-[10px] text-neutral-500 font-mono"><?= htmlspecialchars($act['time']) ?></span>
                      </div>
                      <p class="text-xs text-neutral-300 mt-0.5 truncate"><?= htmlspecialchars($act['action']) ?></p>
                      <div class="mt-2 flex items-center justify-between text-[10px] font-semibold text-neutral-400">
                         <span class="truncate"><?= htmlspecialchars($act['email']) ?></span>
                         <span class="bg-neutral-900 px-2 py-0.5 rounded border border-white/5 text-amber-300"><?= htmlspecialchars($act['amount']) ?></span>
                      </div>
                   </div>
                </div>
             <?php endforeach; ?>
          </div>
       </div>
    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
       <!-- Weekly Sales -->
       <div class="bg-[#111111] border border-white/10 p-6 rounded-xl shadow-2xl min-w-0 flex flex-col">
         <div class="flex justify-between items-center mb-6">
            <h3 class="font-bold text-lg text-white font-oswald uppercase">Weekly Sales Performance</h3>
            <select class="bg-black/40 border border-white/10 rounded text-xs py-1.5 px-3 text-neutral-300 outline-none focus:ring-1 focus:ring-[var(--gold)]">
               <option class="bg-neutral-900">Last 7 Days</option>
               <option class="bg-neutral-900">Last 30 Days</option>
            </select>
         </div>
         <div id="sales-chart" class="w-full"></div>
       </div>

       <!-- Engagement Metrics -->
       <div class="bg-[#111111] border border-white/10 p-6 rounded-xl shadow-2xl min-w-0 flex flex-col">
         <h3 class="font-bold text-lg mb-6 text-white font-oswald uppercase">Gamification Engagement</h3>
         <div id="engagement-chart" class="w-full"></div>
       </div>
    </div>

    <!-- Admin Order Fulfillment & Shipping Manager -->
    <div class="bg-[#111111] border border-white/10 rounded-2xl shadow-2xl overflow-hidden mb-8">
       <div class="px-6 py-5 border-b border-white/10 bg-black/40 flex flex-col sm:flex-row justify-between sm:items-center gap-4">
          <div class="flex items-center gap-3">
             <div class="p-2.5 bg-amber-500/10 text-amber-400 border border-amber-500/20 rounded-xl">
                <i data-lucide="truck" class="w-5 h-5"></i>
             </div>
             <div>
                <h3 class="font-bold text-xl text-white font-oswald uppercase tracking-wide">Order Fulfillment & Shipping Manager</h3>
                <p class="text-xs text-neutral-400">Update order status between Brewing, Island Delivery, or Brewery Taproom Pickup in real-time.</p>
             </div>
          </div>
       </div>

       <div class="overflow-x-auto">
          <table class="w-full text-left">
             <thead class="bg-black/60 text-neutral-400 text-xs uppercase tracking-wider border-b border-white/10">
                <tr>
                   <th class="px-6 py-4 font-semibold">Order ID</th>
                   <th class="px-6 py-4 font-semibold">Customer</th>
                   <th class="px-6 py-4 font-semibold">Mode</th>
                   <th class="px-6 py-4 font-semibold">Current Status</th>
                   <th class="px-6 py-4 font-semibold">Total</th>
                   <th class="px-6 py-4 font-semibold text-right">Update Order Status</th>
                </tr>
             </thead>
             <tbody class="divide-y divide-white/5">
                <?php foreach ($recentOrders ?? [] as $order): 
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
                               <option value="Order Placed" <?= $order['status'] === 'Order Placed' ? 'selected' : '' ?>>Order Placed</option>
                               <option value="Brewing & Bottling" <?= $order['status'] === 'Brewing & Bottling' ? 'selected' : '' ?>>Brewing & Bottling</option>
                               <option value="Out for Delivery" <?= $order['status'] === 'Out for Delivery' ? 'selected' : '' ?>>Out for Delivery 🚚</option>
                               <option value="Ready for Brewery Collection" <?= $order['status'] === 'Ready for Brewery Collection' ? 'selected' : '' ?>>Ready for Collection 🍺</option>
                               <option value="Delivered" <?= $order['status'] === 'Delivered' ? 'selected' : '' ?>>Delivered ✅</option>
                               <option value="Picked Up" <?= $order['status'] === 'Picked Up' ? 'selected' : '' ?>>Picked Up 🎉</option>
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

    <!-- Inventory List -->
    <div class="bg-[#111111] border border-white/10 rounded-xl shadow-2xl overflow-hidden">
       <div class="px-6 py-5 border-b border-white/10 bg-black/20 flex flex-col md:flex-row justify-between md:items-center gap-4">
         <h3 class="font-bold text-lg text-white font-oswald uppercase">Current Inventory</h3>
         <div class="flex space-x-2 w-full md:w-auto">
            <div class="relative flex-1 md:w-64">
               <input 
                 type="text" 
                 id="inventory-search"
                 placeholder="Search inventory..." 
                 class="w-full pl-10 pr-4 py-2 border border-white/10 bg-white/5 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[var(--gold)] text-white placeholder-neutral-500 focus:bg-white/10 transition"
               />
               <i data-lucide="search" class="absolute left-3 top-2.5 h-4 w-4 text-neutral-500"></i>
            </div>
            <button class="px-3 py-2 border border-white/10 rounded-lg hover:bg-white/10 text-neutral-300 focus:outline-none transition">
               <i data-lucide="filter" class="h-4 w-4"></i>
            </button>
         </div>
       </div>
       <div class="overflow-x-auto">
         <table class="w-full text-left">
            <thead class="bg-black/40 text-neutral-400 text-xs uppercase tracking-wider">
              <tr>
                <th class="px-6 py-4 font-semibold">Product</th>
                <th class="px-6 py-4 font-semibold">Style</th>
                <th class="px-6 py-4 font-semibold">Price</th>
                <th class="px-6 py-4 font-semibold">Status</th>
                <th class="px-6 py-4 font-semibold">Stock Level</th>
                <th class="px-6 py-4 font-semibold text-right">Actions</th>
              </tr>
            </thead>
            <tbody id="inventory-table-body" class="divide-y divide-white/5">
              <?php foreach ($inventory as $beer): ?>
                <tr class="hover:bg-white/5 transition-colors inventory-row" data-name="<?= htmlspecialchars(strtolower($beer['name'])) ?>" data-style="<?= htmlspecialchars(strtolower($beer['style'])) ?>">
                  <td class="px-6 py-4">
                     <div class="flex items-center">
                         <!-- Product image frame with loader overlay -->
                         <div class="h-10 w-10 rounded-md bg-neutral-900 overflow-hidden mr-3 relative shadow-sm border border-white/10">
                             <img src="<?= htmlspecialchars($beer['image']) ?>" alt="" class="beer-img-preview h-full w-full object-cover" />
                             <div class="beer-loader absolute inset-0 bg-black/80 items-center justify-center hidden">
                                 <i data-lucide="loader-2" class="h-4 w-4 animate-spin text-[var(--gold)]"></i>
                             </div>
                         </div>
                         <span class="font-bold text-white"><?= htmlspecialchars($beer['name']) ?></span>
                     </div>
                  </td>
                  <td class="px-6 py-4 text-neutral-400 text-sm"><?= htmlspecialchars($beer['style']) ?></td>
                  <td class="px-6 py-4 font-medium text-white">$<?= number_format($beer['price'], 2) ?></td>
                  <td class="px-6 py-4">
                    <span class="px-2 py-1 text-xs font-bold rounded-full uppercase tracking-wide 
                      <?php if($beer['availability'] === 'CORE') echo 'bg-green-500/10 text-green-400 border border-green-500/20'; 
                            else if($beer['availability'] === 'LIMITED') echo 'bg-red-500/10 text-red-400 border border-red-500/20';
                            else echo 'bg-amber-500/10 text-amber-400 border border-amber-500/20'; ?>">
                      <?php if($beer['availability'] === 'CORE') echo 'In Stock'; 
                            else if($beer['availability'] === 'LIMITED') echo 'Low Stock';
                            else echo 'Seasonal'; ?>
                    </span>
                  </td>
                  <td class="px-6 py-4">
                     <div class="w-full max-w-xs">
                         <div class="flex justify-between text-xs mb-1">
                             <span class="text-neutral-400">
                                 <?= $beer['availability'] === 'LIMITED' ? '12/50' : '142/200' ?>
                             </span>
                         </div>
                         <div class="w-24 bg-white/10 rounded-full h-1.5">
                            <div 
                                 class="h-1.5 rounded-full <?= $beer['availability'] === 'LIMITED' ? 'bg-red-500' : 'bg-[var(--teal)]' ?>" 
                                 style="width: <?= $beer['availability'] === 'LIMITED' ? '24%' : '71%' ?>"
                             ></div>
                         </div>
                     </div>
                  </td>
                  <td class="px-6 py-4 text-right flex items-center justify-end space-x-2">
                    <button 
                      class="text-neutral-400 hover:text-white transition text-sm font-bold p-2 hover:bg-white/10 rounded-lg upload-img-btn focus:outline-none"
                      data-id="<?= htmlspecialchars($beer['id']) ?>"
                      title="Upload Image"
                    >
                      <i data-lucide="upload" class="h-4 w-4"></i>
                    </button>
                    <button 
                      class="text-[var(--gold)] hover:text-white transition text-sm font-bold flex items-center p-2 hover:bg-white/10 rounded-lg gen-img-btn focus:outline-none"
                      data-id="<?= htmlspecialchars($beer['id']) ?>"
                      title="Generate AI Image"
                    >
                      <i data-lucide="image" class="h-4 w-4"></i>
                    </button>
                    <button 
                      class="text-red-400 hover:text-red-300 hover:bg-red-500/10 transition p-2 rounded-lg reset-img-btn focus:outline-none <?= isset($_SESSION['beers_overrides'][$beer['id']]) ? '' : 'hidden' ?>"
                      data-id="<?= htmlspecialchars($beer['id']) ?>"
                      title="Reset Image"
                    >
                      <i data-lucide="rotate-ccw" class="h-4 w-4"></i>
                    </button>
                    <button class="text-neutral-400 hover:text-white transition text-sm font-bold p-2 hover:bg-white/10 rounded-lg focus:outline-none">Edit</button>
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
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Render Vector Charts
    const renderCharts = () => {
        // 1. Weekly Sales Chart
        const salesOptions = {
            chart: {
                type: 'bar',
                height: 320,
                fontFamily: 'DM Sans, sans-serif',
                toolbar: { show: false }
            },
            series: [{
                name: 'Sales',
                data: [4000, 3000, 2000, 2780, 1890, 2390, 3490]
            }],
            xaxis: {
                categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                labels: { style: { colors: '#a3a3a3', fontSize: '12px' } },
                axisBorder: { show: false },
                axisTicks: { show: false }
            },
            yaxis: {
                labels: {
                    formatter: (value) => '$' + value,
                    style: { colors: '#a3a3a3', fontSize: '12px' }
                }
            },
            grid: {
                borderColor: 'rgba(255,255,255,0.05)',
                xaxis: { lines: { show: false } },
                yaxis: { lines: { show: true } }
            },
            colors: ['#D4A017'],
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    columnWidth: '50%'
                }
            },
            dataLabels: { enabled: false },
            tooltip: {
                theme: 'dark',
                y: {
                    formatter: (value) => '$' + value
                }
            }
        };
        const salesChart = new ApexCharts(document.querySelector("#sales-chart"), salesOptions);
        salesChart.render();

        // 2. Gamification Engagement Chart
        const engagementOptions = {
            chart: {
                type: 'line',
                height: 320,
                fontFamily: 'DM Sans, sans-serif',
                toolbar: { show: false }
            },
            series: [{
                name: 'Reviews',
                data: [10, 15, 8, 25]
            }, {
                name: 'Points Awarded',
                data: [500, 750, 400, 1250]
            }],
            xaxis: {
                categories: ['Wk 1', 'Wk 2', 'Wk 3', 'Wk 4'],
                labels: { style: { colors: '#a3a3a3', fontSize: '12px' } },
                axisBorder: { show: false },
                axisTicks: { show: false }
            },
            yaxis: [
                {
                    seriesName: 'Reviews',
                    axisTicks: { show: false },
                    axisBorder: { show: false },
                    labels: { style: { colors: '#a3a3a3', fontSize: '12px' } }
                },
                {
                    seriesName: 'Points Awarded',
                    opposite: true,
                    axisTicks: { show: false },
                    axisBorder: { show: false },
                    labels: { style: { colors: '#a3a3a3', fontSize: '12px' } }
                }
            ],
            grid: {
                borderColor: 'rgba(255,255,255,0.05)',
                xaxis: { lines: { show: false } },
                yaxis: { lines: { show: true } }
            },
            colors: ['#C04A1A', '#0A7C6E'],
            stroke: {
                width: 3,
                curve: 'smooth'
            },
            tooltip: {
                theme: 'dark'
            },
            legend: {
                position: 'bottom',
                fontFamily: 'DM Sans',
                labels: {
                    colors: '#f5f0e8'
                }
            }
        };
        const engagementChart = new ApexCharts(document.querySelector("#engagement-chart"), engagementOptions);
        engagementChart.render();
    };

    if (window.ApexCharts) {
        renderCharts();
    }

    // Inventory Filtering / Searching
    const searchInput = document.getElementById('inventory-search');
    const rows = document.querySelectorAll('.inventory-row');
    const noMsg = document.getElementById('no-inventory-msg');

    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const term = e.target.value.toLowerCase();
            let visibleCount = 0;
            
            rows.forEach(row => {
                const name = row.getAttribute('data-name');
                const style = row.getAttribute('data-style');
                if (name.includes(term) || style.includes(term)) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            if (visibleCount === 0) {
                noMsg.style.display = '';
            } else {
                noMsg.style.display = 'none';
            }
        });
    }

    // Upload & Generate AI Image Handlers
    const fileUploader = document.getElementById('admin-file-uploader');
    let activeUploadBeerId = null;

    document.querySelectorAll('.upload-img-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            activeUploadBeerId = btn.dataset.id;
            if (fileUploader) {
                fileUploader.click();
            }
        });
    });

    if (fileUploader) {
        fileUploader.addEventListener('change', (e) => {
            const file = e.target.files?.[0];
            if (file && activeUploadBeerId) {
                const reader = new FileReader();
                reader.onloadend = () => {
                    const row = document.querySelector(`.upload-img-btn[data-id="${activeUploadBeerId}"]`).closest('.inventory-row');
                    const loader = row.querySelector('.beer-loader');
                    const img = row.querySelector('.beer-img-preview');
                    
                    if (loader) {
                        loader.classList.remove('hidden');
                        loader.classList.add('flex');
                    }

                    fetch('?route=admin/updateBeerImage', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ id: activeUploadBeerId, image: reader.result })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            if (img) img.src = reader.result;
                            const resetBtn = row.querySelector('.reset-img-btn');
                            if (resetBtn) resetBtn.classList.remove('hidden');
                        } else {
                            alert('Failed to upload image: ' + (data.error || 'Unknown error'));
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Failed to upload image.');
                    })
                    .finally(() => {
                        if (loader) {
                            loader.classList.add('hidden');
                            loader.classList.remove('flex');
                        }
                        fileUploader.value = '';
                        activeUploadBeerId = null;
                    });
                };
                reader.readAsDataURL(file);
            }
        });
    }

    document.querySelectorAll('.gen-img-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.id;
            const row = btn.closest('.inventory-row');
            const loader = row.querySelector('.beer-loader');
            const img = row.querySelector('.beer-img-preview');

            btn.setAttribute('disabled', 'true');
            if (loader) {
                loader.classList.remove('hidden');
                loader.classList.add('flex');
            }

            fetch('?route=admin/generateBeerImage', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: id })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success && data.image) {
                    if (img) img.src = data.image;
                    const resetBtn = row.querySelector('.reset-img-btn');
                    if (resetBtn) resetBtn.classList.remove('hidden');
                } else {
                    alert('Failed to generate image: ' + (data.error || 'Unknown error'));
                }
            })
            .catch(err => {
                console.error(err);
                alert('Error generating image.');
            })
            .finally(() => {
                btn.removeAttribute('disabled');
                if (loader) {
                    loader.classList.add('hidden');
                    loader.classList.remove('flex');
                }
            });
        });
    });

    document.querySelectorAll('.reset-img-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.id;
            const row = btn.closest('.inventory-row');
            const loader = row.querySelector('.beer-loader');
            const img = row.querySelector('.beer-img-preview');

            btn.setAttribute('disabled', 'true');
            if (loader) {
                loader.classList.remove('hidden');
                loader.classList.add('flex');
            }

            fetch('?route=admin/resetBeerImage', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: id })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success && data.image) {
                    if (img) img.src = data.image;
                    btn.classList.add('hidden');
                } else {
                    alert('Failed to reset image: ' + (data.error || 'Unknown error'));
                }
            })
            .catch(err => {
                console.error(err);
                alert('Error resetting image.');
            })
            .finally(() => {
                btn.removeAttribute('disabled');
                if (loader) {
                    loader.classList.add('hidden');
                    loader.classList.remove('flex');
                }
            });
        });
    });

    // Initialize Lucide icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});

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
            alert('Order #' + orderId + ' status updated to: ' + newStatus);
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
</script>
