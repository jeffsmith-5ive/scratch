<div class="bg-[#0A0A0A] min-h-screen py-16 px-4 sm:px-6 lg:px-8" id="gift-cards-container">
   <div class="max-w-7xl mx-auto">
      <div class="bg-neutral-900 rounded-3xl border border-neutral-800 shadow-2xl overflow-hidden grid grid-cols-1 lg:grid-cols-2 min-h-[600px]">
         
         <!-- Left: Image/Visual -->
         <div class="relative bg-neutral-950 flex items-center justify-center p-12 overflow-hidden">
            <div class="absolute inset-0 opacity-40">
               <img 
                 src="https://images.unsplash.com/photo-1556742049-0cfed4f7a07d?auto=format&fit=crop&w=800&q=80" 
                 alt="Cheers" 
                 class="w-full h-full object-cover" 
               />
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-neutral-950/40 to-transparent"></div>
            
            <div class="relative z-10 text-center">
               <div class="w-24 h-24 bg-jeff-gold/20 backdrop-blur-md rounded-full flex items-center justify-center mx-auto mb-8 border border-jeff-gold/50 shadow-[0_0_30px_rgba(255,213,79,0.3)]">
                  <i data-lucide="gift" class="w-10 h-10 text-jeff-gold"></i>
               </div>
               <h1 class="text-4xl md:text-5xl font-display font-bold text-white mb-4 uppercase tracking-wide">Give the Gift of Vibes</h1>
               <p class="text-neutral-350 text-lg max-w-sm mx-auto font-light">
                  Not sure what they drink? Let them decide. 
                  Delivered instantly via email.
               </p>
            </div>
         </div>

         <!-- Right: Selection -->
         <div class="p-8 md:p-12 flex flex-col justify-center text-white">
            <h2 class="text-3xl font-display font-bold text-white mb-2 uppercase">Digital Gift Card</h2>
            <p class="text-neutral-450 mb-8 font-light">Select an amount to load onto the card.</p>

            <!-- Amounts Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-10" id="amounts-grid">
               <?php 
               $amounts = [25, 50, 100, 250, 500, 1000];
               foreach ($amounts as $amount):
                   $isDefault = ($amount === 50);
               ?>
                  <button
                    data-amount="<?= $amount ?>"
                    class="amount-btn py-4 px-2 rounded-xl font-display font-bold text-xl border-2 transition-all duration-200 relative focus:outline-none <?= $isDefault ? 'border-jeff-orange bg-jeff-orange/5 text-jeff-orange shadow-md scale-105' : 'border-neutral-800 bg-black text-neutral-450 hover:border-neutral-700 hover:bg-neutral-900 hover:text-white' ?>"
                  >
                     $<?= $amount ?>
                     <div class="check-indicator absolute -top-2 -right-2 bg-jeff-orange text-white rounded-full p-1 shadow-sm <?= $isDefault ? '' : 'hidden' ?>">
                        <i data-lucide="check" class="w-3 h-3"></i>
                     </div>
                  </button>
               <?php endforeach; ?>
            </div>

            <div class="bg-black/60 border border-neutral-850 p-6 rounded-xl mb-8">
               <h3 class="font-bold text-white text-sm uppercase tracking-wide mb-4 flex items-center">
                  <i data-lucide="sparkles" class="w-4 h-4 mr-2 text-jeff-gold fill-current"></i> What they get
               </h3>
               <ul class="space-y-3 text-sm text-neutral-300 font-light">
                  <li class="flex items-start">
                     <i data-lucide="check" class="w-4 h-4 text-green-400 mr-2 mt-0.5 shrink-0"></i> 
                     Instant delivery to email
                  </li>
                  <li class="flex items-start">
                     <i data-lucide="check" class="w-4 h-4 text-green-400 mr-2 mt-0.5 shrink-0"></i> 
                     No expiration date
                  </li>
                  <li class="flex items-start">
                     <i data-lucide="check" class="w-4 h-4 text-green-400 mr-2 mt-0.5 shrink-0"></i> 
                     Valid for all beers, merch, and experiences
                  </li>
               </ul>
            </div>

            <div class="mt-auto">
               <div class="flex justify-between items-center mb-6">
                  <span class="text-neutral-400 font-bold uppercase tracking-wider text-sm">Total</span>
                  <span class="text-3xl font-display font-bold text-white" id="total-display">$50</span>
               </div>
               <button 
                 id="add-giftcard-btn"
                 class="w-full bg-jeff-orange text-white font-bold py-5 rounded-xl hover:bg-orange-600 transition shadow-xl text-lg flex justify-center items-center uppercase tracking-wide group focus:outline-none"
               >
                 Add to Cart <i data-lucide="shopping-cart" class="ml-2 w-5 h-5 transform group-hover:scale-110 transition"></i>
               </button>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    let selectedAmount = 50;
    const amountBtns = document.querySelectorAll('.amount-btn');
    const totalDisplay = document.getElementById('total-display');
    const addBtn = document.getElementById('add-giftcard-btn');

    amountBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            selectedAmount = parseInt(btn.dataset.amount, 10);
            totalDisplay.textContent = `$${selectedAmount}`;

            // Reset all buttons
            amountBtns.forEach(b => {
                b.className = "amount-btn py-4 px-2 rounded-xl font-display font-bold text-xl border-2 transition-all duration-200 relative focus:outline-none border-neutral-800 bg-black text-neutral-450 hover:border-neutral-700 hover:bg-neutral-900 hover:text-white";
                b.querySelector('.check-indicator').classList.add('hidden');
            });

            // Set active button
            btn.className = "amount-btn py-4 px-2 rounded-xl font-display font-bold text-xl border-2 transition-all duration-200 relative focus:outline-none border-jeff-orange bg-jeff-orange/5 text-jeff-orange shadow-md scale-105";
            btn.querySelector('.check-indicator').classList.remove('hidden');
        });
    });

    addBtn.addEventListener('click', () => {
        // Create unique gift card ID
        const giftCardId = `gift-card-${selectedAmount}-${Date.now()}`;

        // Disable button and show loader
        const originalText = addBtn.innerHTML;
        addBtn.setAttribute('disabled', 'true');
        addBtn.innerHTML = '<i data-lucide="loader-2" class="w-5 h-5 mr-2 animate-spin"></i> Adding...';
        lucide.createIcons();

        // Send AJAX add to cart
        fetch('?route=cart/add', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id: giftCardId, qty: 1 })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // Success feedback
                addBtn.innerHTML = '<i data-lucide="check" class="w-5 h-5 mr-2"></i> Added!';
                lucide.createIcons();

                // Update cart count badge
                document.querySelectorAll('.cart-count').forEach(badge => {
                    badge.innerText = data.count;
                    badge.classList.remove('hidden');
                    badge.classList.add('animate-bounce');
                });
                document.querySelectorAll('.cart-count-text').forEach(badge => {
                    badge.innerText = data.count;
                });

                // Programmatically trigger cart drawer open
                setTimeout(() => {
                    addBtn.removeAttribute('disabled');
                    addBtn.innerHTML = originalText;
                    lucide.createIcons();

                    const cartToggle = document.querySelector('.cart-toggle');
                    if (cartToggle) {
                        cartToggle.click();
                    }
                }, 800);
            } else {
                alert('Failed to add gift card: ' + (data.error || 'Unknown error'));
                addBtn.removeAttribute('disabled');
                addBtn.innerHTML = originalText;
                lucide.createIcons();
            }
        })
        .catch(err => {
            console.error('Error adding gift card:', err);
            alert('Failed to add gift card.');
            addBtn.removeAttribute('disabled');
            addBtn.innerHTML = originalText;
            lucide.createIcons();
        });
    });

    // Initialize lucide icons for indicators
    if (window.lucide) {
        window.lucide.createIcons();
    }
});
</script>
