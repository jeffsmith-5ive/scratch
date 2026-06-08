<!-- Include ApexCharts Library for Interactive Vector Charting -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<div class="min-h-screen bg-neutral-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-7xl mx-auto">
    
    <!-- Header -->
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between">
      <div>
        <h1 class="text-4xl font-display font-bold text-neutral-900 uppercase tracking-wide">Admin Dashboard</h1>
        <p class="text-neutral-500 mt-2">Overview of sales, inventory, and user activity.</p>
      </div>
      <div class="mt-4 md:mt-0 flex space-x-3">
         <button class="bg-white border border-neutral-200 text-neutral-600 px-4 py-2 rounded-lg font-bold text-sm shadow-sm hover:bg-neutral-50 focus:outline-none">
           Export Report
         </button>
         <button class="bg-neutral-900 text-white px-4 py-2 rounded-lg font-bold text-sm shadow-lg hover:bg-jeff-orange transition uppercase tracking-wider focus:outline-none">
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
       <div class="bg-white p-6 rounded-xl shadow-sm border border-neutral-200 flex flex-col justify-between group hover:shadow-md transition">
         <div class="flex justify-between items-start">
           <div>
              <h3 class="text-neutral-500 text-xs font-bold uppercase tracking-wider">Total Revenue</h3>
              <p class="text-3xl font-bold text-neutral-900 mt-2">$24,500</p>
           </div>
           <div class="p-2 bg-green-50 rounded-lg text-green-600 group-hover:bg-green-100 transition">
             <i data-lucide="activity" class="h-5 w-5"></i>
           </div>
         </div>
         <div class="mt-4 flex items-center text-sm">
            <span class="text-green-600 font-bold flex items-center mr-2">
              <i data-lucide="arrow-up-right" class="h-4 w-4 mr-1"></i> 12%
            </span>
            <span class="text-neutral-400">vs last week</span>
         </div>
       </div>

       <div class="bg-white p-6 rounded-xl shadow-sm border border-neutral-200 flex flex-col justify-between group hover:shadow-md transition">
         <div class="flex justify-between items-start">
           <div>
              <h3 class="text-neutral-500 text-xs font-bold uppercase tracking-wider">Active Orders</h3>
              <p class="text-3xl font-bold text-neutral-900 mt-2">42</p>
         </div>
           <div class="p-2 bg-blue-50 rounded-lg text-blue-600 group-hover:bg-blue-100 transition">
             <i data-lucide="shopping-bag" class="h-5 w-5"></i>
           </div>
         </div>
         <div class="mt-4 flex items-center text-sm">
            <span class="text-blue-600 font-bold flex items-center mr-2">
               8 pending
            </span>
            <span class="text-neutral-400">processing</span>
         </div>
       </div>

       <div class="bg-white p-6 rounded-xl shadow-sm border border-neutral-200 flex flex-col justify-between group hover:shadow-md transition">
         <div class="flex justify-between items-start">
           <div>
              <h3 class="text-neutral-500 text-xs font-bold uppercase tracking-wider">Loyalty Points</h3>
              <p class="text-3xl font-bold text-neutral-900 mt-2">12,500</p>
           </div>
           <div class="p-2 bg-purple-50 rounded-lg text-purple-600 group-hover:bg-purple-100 transition">
             <i data-lucide="users" class="h-5 w-5"></i>
           </div>
         </div>
         <div class="mt-4 flex items-center text-sm">
            <span class="text-green-600 font-bold flex items-center mr-2">
              <i data-lucide="arrow-up-right" class="h-4 w-4 mr-1"></i> 18%
            </span>
            <span class="text-neutral-400">engagement</span>
         </div>
       </div>

       <div class="bg-white p-6 rounded-xl shadow-sm border border-neutral-200 flex flex-col justify-between group hover:shadow-md transition">
         <div class="flex justify-between items-start">
           <div>
              <h3 class="text-neutral-500 text-xs font-bold uppercase tracking-wider">Inventory Alert</h3>
              <p class="text-3xl font-bold text-red-600 mt-2">2</p>
           </div>
           <div class="p-2 bg-red-50 rounded-lg text-red-600 group-hover:bg-red-100 transition">
             <i data-lucide="alert-triangle" class="h-5 w-5"></i>
           </div>
         </div>
         <div class="mt-4 flex items-center text-sm">
            <span class="text-red-600 font-bold flex items-center mr-2">
               Low Stock
            </span>
            <span class="text-neutral-400">needs reorder</span>
         </div>
       </div>
    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
       <!-- Weekly Sales -->
       <div class="bg-white p-6 rounded-xl shadow-sm border border-neutral-200 min-w-0 flex flex-col">
         <div class="flex justify-between items-center mb-6">
            <h3 class="font-bold text-lg text-neutral-900 font-display uppercase">Weekly Sales Performance</h3>
            <select class="bg-neutral-50 border border-neutral-200 rounded text-xs py-1 px-2 text-neutral-600 outline-none">
               <option>Last 7 Days</option>
               <option>Last 30 Days</option>
            </select>
         </div>
         <div id="sales-chart" class="w-full"></div>
       </div>

       <!-- Engagement Metrics -->
       <div class="bg-white p-6 rounded-xl shadow-sm border border-neutral-200 min-w-0 flex flex-col">
         <h3 class="font-bold text-lg mb-6 text-neutral-900 font-display uppercase">Gamification Engagement</h3>
         <div id="engagement-chart" class="w-full"></div>
       </div>
    </div>

    <!-- Inventory List -->
    <div class="bg-white rounded-xl shadow-sm border border-neutral-200 overflow-hidden">
       <div class="px-6 py-5 border-b border-neutral-200 flex flex-col md:flex-row justify-between md:items-center gap-4">
         <h3 class="font-bold text-lg text-neutral-900 font-display uppercase">Current Inventory</h3>
         <div class="flex space-x-2 w-full md:w-auto">
            <div class="relative flex-1 md:w-64">
               <input 
                 type="text" 
                 id="inventory-search"
                 placeholder="Search inventory..." 
                 class="w-full pl-10 pr-4 py-2 border border-neutral-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-jeff-teal"
               />
               <i data-lucide="search" class="absolute left-3 top-2.5 h-4 w-4 text-neutral-400"></i>
            </div>
            <button class="px-3 py-2 border border-neutral-200 rounded-lg hover:bg-neutral-50 text-neutral-600 focus:outline-none">
               <i data-lucide="filter" class="h-4 w-4"></i>
            </button>
         </div>
       </div>
       <div class="overflow-x-auto">
         <table class="w-full text-left">
           <thead class="bg-neutral-50 text-neutral-500 text-xs uppercase tracking-wider">
             <tr>
               <th class="px-6 py-4 font-semibold">Product</th>
               <th class="px-6 py-4 font-semibold">Style</th>
               <th class="px-6 py-4 font-semibold">Price</th>
               <th class="px-6 py-4 font-semibold">Status</th>
               <th class="px-6 py-4 font-semibold">Stock Level</th>
               <th class="px-6 py-4 font-semibold text-right">Actions</th>
             </tr>
           </thead>
           <tbody id="inventory-table-body" class="divide-y divide-neutral-100">
             <?php foreach ($inventory as $beer): ?>
               <tr class="hover:bg-neutral-50 transition-colors inventory-row" data-name="<?= htmlspecialchars(strtolower($beer['name'])) ?>" data-style="<?= htmlspecialchars(strtolower($beer['style'])) ?>">
                 <td class="px-6 py-4">
                    <div class="flex items-center">
                        <!-- Product image frame with loader overlay -->
                        <div class="h-10 w-10 rounded-md bg-neutral-100 overflow-hidden mr-3 relative shadow-sm border border-neutral-200">
                            <img src="<?= htmlspecialchars($beer['image']) ?>" alt="" class="beer-img-preview h-full w-full object-cover" />
                            <div class="beer-loader absolute inset-0 bg-white/80 items-center justify-center hidden">
                                <i data-lucide="loader-2" class="h-4 w-4 animate-spin text-jeff-teal"></i>
                            </div>
                        </div>
                        <span class="font-bold text-neutral-900"><?= htmlspecialchars($beer['name']) ?></span>
                    </div>
                 </td>
                 <td class="px-6 py-4 text-neutral-500 text-sm"><?= htmlspecialchars($beer['style']) ?></td>
                 <td class="px-6 py-4 font-medium text-neutral-900">$<?= number_format($beer['price'], 2) ?></td>
                 <td class="px-6 py-4">
                   <span class="px-2 py-1 text-xs font-bold rounded-full uppercase tracking-wide 
                     <?php if($beer['availability'] === 'CORE') echo 'bg-green-100 text-green-800'; 
                           else if($beer['availability'] === 'LIMITED') echo 'bg-red-100 text-red-800';
                           else echo 'bg-amber-100 text-amber-800'; ?>">
                     <?php if($beer['availability'] === 'CORE') echo 'In Stock'; 
                           else if($beer['availability'] === 'LIMITED') echo 'Low Stock';
                           else echo 'Seasonal'; ?>
                   </span>
                 </td>
                 <td class="px-6 py-4">
                    <div class="w-full max-w-xs">
                        <div class="flex justify-between text-xs mb-1">
                            <span class="text-neutral-500">
                                <?= $beer['availability'] === 'LIMITED' ? '12/50' : '142/200' ?>
                            </span>
                        </div>
                        <div class="w-24 bg-neutral-200 rounded-full h-1.5">
                           <div 
                                class="h-1.5 rounded-full <?= $beer['availability'] === 'LIMITED' ? 'bg-red-500' : 'bg-jeff-teal' ?>" 
                                style="width: <?= $beer['availability'] === 'LIMITED' ? '24%' : '71%' ?>"
                            ></div>
                        </div>
                    </div>
                 </td>
                  <td class="px-6 py-4 text-right flex items-center justify-end space-x-2">
                    <button 
                      class="text-neutral-400 hover:text-neutral-900 transition text-sm font-bold p-2 hover:bg-neutral-100 rounded-lg upload-img-btn focus:outline-none"
                      data-id="<?= htmlspecialchars($beer['id']) ?>"
                      title="Upload Image"
                    >
                      <i data-lucide="upload" class="h-4 w-4"></i>
                    </button>
                    <button 
                      class="text-jeff-teal hover:text-jeff-dark transition text-sm font-bold flex items-center p-2 hover:bg-neutral-100 rounded-lg gen-img-btn focus:outline-none"
                      data-id="<?= htmlspecialchars($beer['id']) ?>"
                      title="Generate AI Image"
                    >
                      <i data-lucide="image" class="h-4 w-4"></i>
                    </button>
                    <button 
                      class="text-red-400 hover:text-red-600 hover:bg-red-50 transition p-2 rounded-lg reset-img-btn focus:outline-none <?= isset($_SESSION['beers_overrides'][$beer['id']]) ? '' : 'hidden' ?>"
                      data-id="<?= htmlspecialchars($beer['id']) ?>"
                      title="Reset Image"
                    >
                      <i data-lucide="rotate-ccw" class="h-4 w-4"></i>
                    </button>
                    <button class="text-neutral-400 hover:text-neutral-900 transition text-sm font-bold p-2 hover:bg-neutral-100 rounded-lg focus:outline-none">Edit</button>
                  </td>
               </tr>
             <?php endforeach; ?>
             
             <tr id="no-inventory-msg" style="display: none;">
                 <td colspan="6" class="px-6 py-8 text-center text-neutral-500 italic">
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
                fontFamily: 'Open Sans, sans-serif',
                toolbar: { show: false }
            },
            series: [{
                name: 'Sales',
                data: [4000, 3000, 2000, 2780, 1890, 2390, 3490]
            }],
            xaxis: {
                categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                labels: { style: { colors: '#737373', fontSize: '12px' } },
                axisBorder: { show: false },
                axisTicks: { show: false }
            },
            yaxis: {
                labels: {
                    formatter: (value) => '$' + value,
                    style: { colors: '#737373', fontSize: '12px' }
                }
            },
            grid: {
                borderColor: '#f5f5f5',
                xaxis: { lines: { show: false } },
                yaxis: { lines: { show: true } }
            },
            colors: ['#171717'],
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
                fontFamily: 'Open Sans, sans-serif',
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
                labels: { style: { colors: '#737373', fontSize: '12px' } },
                axisBorder: { show: false },
                axisTicks: { show: false }
            },
            yaxis: [
                {
                    seriesName: 'Reviews',
                    axisTicks: { show: false },
                    axisBorder: { show: false },
                    labels: { style: { colors: '#737373', fontSize: '12px' } }
                },
                {
                    seriesName: 'Points Awarded',
                    opposite: true,
                    axisTicks: { show: false },
                    axisBorder: { show: false },
                    labels: { style: { colors: '#737373', fontSize: '12px' } }
                }
            ],
            grid: {
                borderColor: '#f5f5f5',
                xaxis: { lines: { show: false } },
                yaxis: { lines: { show: true } }
            },
            colors: ['#FF6F00', '#00695C'],
            stroke: {
                width: 3,
                curve: 'smooth'
            },
            tooltip: {
                theme: 'dark'
            },
            legend: {
                position: 'bottom',
                fontFamily: 'Open Sans'
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
</script>
