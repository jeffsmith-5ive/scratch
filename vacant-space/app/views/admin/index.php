<div class="min-h-screen bg-neutral-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-7xl mx-auto">
    
    <!-- Header -->
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between">
      <div>
        <h1 class="text-4xl font-oswald font-bold text-neutral-900 uppercase tracking-wide">Admin Dashboard</h1>
        <p class="text-neutral-500 mt-2">Overview of sales, inventory, and user activity.</p>
      </div>
      <div class="mt-4 md:mt-0 flex space-x-3">
         <button class="bg-white border border-neutral-200 text-neutral-600 px-4 py-2 rounded-lg font-bold text-sm shadow-sm hover:bg-neutral-50">
           Export Report
         </button>
         <button class="bg-neutral-900 text-white px-4 py-2 rounded-lg font-bold text-sm shadow-lg hover:bg-jeff-orange transition uppercase tracking-wider">
           <i data-lucide="plus" class="w-4 h-4 inline-block -mt-1 mr-1"></i> Add Product
         </button>
      </div>
    </div>

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

    <!-- Charts Row (Mocked visually for now) -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
       <!-- Weekly Sales -->
       <div class="bg-white p-6 rounded-xl shadow-sm border border-neutral-200 min-w-0 flex flex-col">
         <div class="flex justify-between items-center mb-6">
            <h3 class="font-bold text-lg text-neutral-900 font-oswald uppercase">Weekly Sales Performance</h3>
            <select class="bg-neutral-50 border border-neutral-200 rounded text-xs py-1 px-2 text-neutral-600 outline-none">
               <option>Last 7 Days</option>
               <option>Last 30 Days</option>
            </select>
         </div>
         <div class="flex-1 w-full bg-gray-50 border border-dashed border-gray-200 rounded flex items-center justify-center text-gray-400 flex-col py-12">
            <i data-lucide="bar-chart-2" class="w-10 h-10 mb-2"></i>
            <span class="uppercase tracking-widest text-xs font-bold">Sales Chart Data Rendered Here</span>
         </div>
       </div>

       <!-- Engagement Metrics -->
       <div class="bg-white p-6 rounded-xl shadow-sm border border-neutral-200 min-w-0 flex flex-col">
         <h3 class="font-bold text-lg mb-6 text-neutral-900 font-oswald uppercase">Gamification Engagement</h3>
         <div class="flex-1 w-full bg-gray-50 border border-dashed border-gray-200 rounded flex items-center justify-center text-gray-400 flex-col py-12">
            <i data-lucide="trending-up" class="w-10 h-10 mb-2"></i>
            <span class="uppercase tracking-widest text-xs font-bold">Engagement Line Chart Here</span>
         </div>
       </div>
    </div>

    <!-- Inventory List -->
    <div class="bg-white rounded-xl shadow-sm border border-neutral-200 overflow-hidden">
       <div class="px-6 py-5 border-b border-neutral-200 flex flex-col md:flex-row justify-between md:items-center gap-4">
         <h3 class="font-bold text-lg text-neutral-900 font-oswald uppercase">Current Inventory</h3>
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
            <button class="px-3 py-2 border border-neutral-200 rounded-lg hover:bg-neutral-50 text-neutral-600">
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
                        <div class="h-10 w-10 rounded-md bg-neutral-100 overflow-hidden mr-3 relative">
                            <img src="<?= htmlspecialchars($beer['image']) ?>" alt="" class="h-full w-full object-cover" />
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
                      class="text-neutral-400 hover:text-neutral-900 transition text-sm font-bold p-2 hover:bg-neutral-100 rounded-lg upload-img-btn"
                      title="Upload Image"
                    >
                      <i data-lucide="upload" class="h-4 w-4"></i>
                    </button>
                    <button 
                      class="text-jeff-teal hover:text-jeff-dark transition text-sm font-bold flex items-center p-2 hover:bg-neutral-100 rounded-lg gen-img-btn"
                      title="Generate AI Image"
                    >
                      <i data-lucide="image" class="h-4 w-4"></i>
                    </button>
                    <button class="text-neutral-400 hover:text-neutral-900 transition text-sm font-bold p-2 hover:bg-neutral-100 rounded-lg">Edit</button>
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

    // Initialize Lucide icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});
</script>
