<?php
$merchItems = Database::$MERCH_ITEMS;
$categories = ['All'];
foreach ($merchItems as $item) {
    if (!in_array($item['category'], $categories)) {
        $categories[] = $item['category'];
    }
}
?>

<div class="min-h-screen bg-[#0A0A0A] py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center mb-16">
           <h1 class="text-5xl md:text-7xl font-display font-bold text-white mb-4 uppercase">
              Provisions
           </h1>
           <p class="text-xl text-neutral-400 max-w-2xl mx-auto font-serif italic">
              "Wear the vibes. Represent the culture."
           </p>
        </div>

        <!-- Filters -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-6">
           <!-- Category Chips -->
           <div class="flex flex-wrap gap-2 justify-center md:justify-start">
              <?php foreach ($categories as $cat): ?>
                 <button
                   data-category="<?= htmlspecialchars($cat) ?>"
                   class="category-chip px-4 py-2 rounded-full text-sm font-bold transition border <?= $cat === 'All' ? 'bg-jeff-orange text-white border-jeff-orange' : 'bg-black text-neutral-400 border border-neutral-800 hover:border-neutral-700 hover:text-white' ?>"
                 >
                    <?= htmlspecialchars($cat) ?>
                 </button>
              <?php endforeach; ?>
           </div>

           <!-- Search -->
           <div class="relative w-full md:w-64">
              <input 
                 type="text" 
                 id="merch-search"
                 placeholder="Search merch..." 
                 class="w-full pl-10 pr-4 py-2 rounded-full border border-neutral-800 bg-black text-white focus:outline-none focus:ring-2 focus:ring-jeff-orange"
              />
              <i data-lucide="search" class="absolute left-3 top-2.5 w-4 h-4 text-neutral-500"></i>
           </div>
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8" id="merch-grid">
           <?php foreach ($merchItems as $id => $item): ?>
              <div 
                 data-item-id="<?= htmlspecialchars($id) ?>"
                 data-category="<?= htmlspecialchars($item['category']) ?>"
                 data-name="<?= htmlspecialchars(strtolower($item['name'])) ?>"
                 class="merch-card bg-neutral-900 rounded-xl border border-neutral-800 hover:shadow-2xl hover:border-neutral-700 transition-all duration-300 overflow-hidden flex flex-col group relative"
              >
                 
                 <!-- Image -->
                 <div class="aspect-[4/5] overflow-hidden bg-black relative">
                    <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="w-full h-full object-cover transition duration-700 group-hover:scale-105 <?= isset($item['soldOut']) && $item['soldOut'] ? 'grayscale opacity-50' : '' ?>" />
                    
                    <!-- Badges -->
                    <div class="absolute top-3 left-3 flex flex-col gap-2">
                       <?php if (isset($item['soldOut']) && $item['soldOut']): ?>
                          <span class="bg-black/80 backdrop-blur border border-neutral-800 text-white text-[10px] font-bold px-2 py-1 rounded uppercase tracking-wider">
                             Sold Out
                          </span>
                       <?php endif; ?>
                       <?php if (isset($item['originalPrice']) && (!isset($item['soldOut']) || !$item['soldOut'])): ?>
                          <span class="bg-trini-red text-white text-[10px] font-bold px-2 py-1 rounded uppercase tracking-wider flex items-center shadow-sm">
                             <i data-lucide="tag" class="w-3 h-3 mr-1"></i> Sale
                          </span>
                       <?php endif; ?>
                    </div>

                    <!-- Quick Add Overlay (Desktop) -->
                    <?php if (!isset($item['soldOut']) || !$item['soldOut']): ?>
                       <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition duration-300 bg-gradient-to-t from-black/80 to-transparent">
                          <button 
                             class="quick-add-btn w-full bg-white text-neutral-900 font-bold py-3 rounded-lg hover:bg-jeff-orange hover:text-white transition shadow-lg flex items-center justify-center uppercase tracking-wide text-xs focus:outline-none"
                             data-id="<?= htmlspecialchars($id) ?>"
                          >
                             <i data-lucide="shopping-bag" class="w-3 h-3 mr-2"></i> Quick Add
                          </button>
                       </div>
                    <?php endif; ?>
                 </div>

                 <!-- Info -->
                 <div class="p-5 flex-1 flex flex-col">
                    <p class="text-xs text-neutral-500 font-bold uppercase tracking-wider mb-1"><?= htmlspecialchars($item['category']) ?></p>
                    <h3 class="font-bold text-white text-lg leading-tight mb-2 group-hover:text-jeff-teal transition-colors">
                       <?= htmlspecialchars($item['name']) ?>
                    </h3>
                    
                    <div class="mt-auto pt-4 border-t border-neutral-800 flex items-center justify-between">
                       <div>
                          <?php if (isset($item['originalPrice'])): ?>
                             <div class="flex items-baseline space-x-2">
                                 <span class="font-bold text-trini-red text-lg">TTD$<?= htmlspecialchars($item['price']) ?></span>
                                 <span class="text-xs text-neutral-500 line-through">TTD$<?= htmlspecialchars($item['originalPrice']) ?></span>
                              </div>
                          <?php else: ?>
                             <span class="font-bold text-white text-lg">TTD$<?= htmlspecialchars($item['price']) ?></span>
                          <?php endif; ?>
                       </div>
                       
                       <!-- Mobile Add Button / Sold out icon -->
                       <?php if (!isset($item['soldOut']) || !$item['soldOut']): ?>
                            <button 
                               class="quick-add-btn md:hidden w-8 h-8 bg-black border border-neutral-800 rounded-full flex items-center justify-center text-white hover:bg-jeff-orange hover:border-jeff-orange hover:text-white transition focus:outline-none"
                               data-id="<?= htmlspecialchars($id) ?>"
                            >
                               <i data-lucide="shopping-bag" class="w-4 h-4"></i>
                            </button>
                       <?php else: ?>
                            <i data-lucide="x-circle" class="w-5 h-5 text-neutral-600"></i>
                       <?php endif; ?>
                    </div>
                 </div>
              </div>
           <?php endforeach; ?>
        </div>
        
        <!-- Empty State -->
        <div id="no-results" class="text-center py-20 hidden">
           <i data-lucide="filter" class="w-12 h-12 text-neutral-700 mx-auto mb-4"></i>
           <p class="text-neutral-400 text-lg">No provisions found matching your search.</p>
           <button id="clear-filters-btn" class="mt-4 text-jeff-gold font-bold hover:underline transition">
              Clear Filters
           </button>
        </div>

     </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Search and Filtering Logic
    const searchInput = document.getElementById('merch-search');
    const categoryChips = document.querySelectorAll('.category-chip');
    const merchCards = document.querySelectorAll('.merch-card');
    const noResults = document.getElementById('no-results');
    const clearFiltersBtn = document.getElementById('clear-filters-btn');
    
    let activeCategory = 'All';
    let searchTerm = '';
    
    function filterItems() {
        let visibleCount = 0;
        
        merchCards.forEach(card => {
            const cardCategory = card.dataset.category;
            const cardName = card.dataset.name;
            
            const matchesCategory = activeCategory === 'All' || cardCategory === activeCategory;
            const matchesSearch = cardName.includes(searchTerm.toLowerCase());
            
            if (matchesCategory && matchesSearch) {
                card.classList.remove('hidden');
                visibleCount++;
            } else {
                card.classList.add('hidden');
            }
        });
        
        if (visibleCount === 0) {
            noResults.classList.remove('hidden');
        } else {
            noResults.classList.add('hidden');
        }
    }
    
    categoryChips.forEach(chip => {
        chip.addEventListener('click', () => {
            categoryChips.forEach(c => {
                c.className = "category-chip px-4 py-2 rounded-full text-sm font-bold transition border bg-black text-neutral-400 border border-neutral-800 hover:border-neutral-700 hover:text-white";
            });
            chip.className = "category-chip px-4 py-2 rounded-full text-sm font-bold transition border bg-jeff-orange text-white border-jeff-orange";
            
            activeCategory = chip.dataset.category;
            filterItems();
        });
    });
    
    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            searchTerm = e.target.value;
            filterItems();
        });
    }
    
    if (clearFiltersBtn) {
        clearFiltersBtn.addEventListener('click', () => {
            activeCategory = 'All';
            searchTerm = '';
            if (searchInput) searchInput.value = '';
            
            categoryChips.forEach(chip => {
                if (chip.dataset.category === 'All') {
                    chip.className = "category-chip px-4 py-2 rounded-full text-sm font-bold transition border bg-jeff-orange text-white border-jeff-orange";
                } else {
                    chip.className = "category-chip px-4 py-2 rounded-full text-sm font-bold transition border bg-black text-neutral-400 border border-neutral-800 hover:border-neutral-700 hover:text-white";
                }
            });
            
            filterItems();
        });
    }

    // Quick Add to Cart Handler
    const quickAddBtns = document.querySelectorAll('.quick-add-btn');
    quickAddBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.dataset.id;
            
            // Visual feedback on the button
            const originalHTML = this.innerHTML;
            this.setAttribute('disabled', 'true');
            this.innerHTML = '<i data-lucide="check" class="w-4 h-4 mr-2 inline-block"></i> Added';
            this.classList.add('bg-jeff-dark', 'text-white', 'scale-95');
            if (window.lucide) {
                window.lucide.createIcons();
            }
            
            fetch('?route=cart/add', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: id, qty: 1 })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // Update header badges
                    document.querySelectorAll('.cart-count').forEach(badge => {
                        badge.innerText = data.count;
                        badge.classList.remove('hidden');
                        badge.classList.add('animate-bounce');
                    });
                    document.querySelectorAll('.cart-count-text').forEach(txt => {
                        txt.innerText = data.count;
                    });
                    
                    // Programmatically open the cart drawer by clicking .cart-toggle
                    setTimeout(() => {
                        this.removeAttribute('disabled');
                        this.innerHTML = originalHTML;
                        this.classList.remove('bg-jeff-dark', 'text-white', 'scale-95');
                        if (window.lucide) {
                            window.lucide.createIcons();
                        }
                        
                        const cartToggle = document.querySelector('.cart-toggle');
                        if (cartToggle) {
                            cartToggle.click();
                        }
                    }, 500);
                } else {
                    alert('Error adding to cart: ' + (data.error || 'Unknown error'));
                    this.removeAttribute('disabled');
                    this.innerHTML = originalHTML;
                    this.classList.remove('bg-jeff-dark', 'text-white', 'scale-95');
                    if (window.lucide) {
                        window.lucide.createIcons();
                    }
                }
            })
            .catch(err => {
                console.error('Error adding to cart:', err);
                this.removeAttribute('disabled');
                this.innerHTML = originalHTML;
                this.classList.remove('bg-jeff-dark', 'text-white', 'scale-95');
                if (window.lucide) {
                    window.lucide.createIcons();
                }
            });
        });
    });

    if (window.lucide) {
        window.lucide.createIcons();
    }
});
</script>
