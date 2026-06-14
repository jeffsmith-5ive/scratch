<?php if ($step === 'success'): ?>
  <div class="min-h-screen bg-[#0A0A0A] flex items-center justify-center px-4 py-12">
    <div class="bg-neutral-900 p-8 md:p-12 rounded-2xl shadow-xl max-w-lg w-full text-center border border-neutral-800 border-t-8 border-jeff-teal">
      <div class="w-20 h-20 bg-green-950/45 border border-green-900/30 rounded-full flex items-center justify-center mx-auto mb-6">
        <i data-lucide="check-circle" class="h-10 w-10 text-green-400"></i>
      </div>
      <h2 class="text-4xl font-display font-bold text-white mb-4 uppercase tracking-wide">Order Confirmed!</h2>
      <p class="text-lg text-neutral-300 mb-8 font-light">
        Thanks for the vibes, <span class="font-bold text-white"><?= htmlspecialchars($formData['firstName']) ?></span>. 
        We've received your order <span class="font-mono bg-black border border-neutral-800 px-2 py-1 rounded text-neutral-300">#JEFF-<?= rand(1000, 9999) ?></span>.
      </p>
      
      <div class="bg-black rounded-xl p-6 mb-8 text-left border border-neutral-800 shadow-inner">
         <h3 class="font-bold text-white mb-2 text-sm uppercase tracking-wide">Shipping To:</h3>
         <p class="text-neutral-350 font-light"><?= htmlspecialchars($formData['address']) ?></p>
         <p class="text-neutral-350 font-light"><?= htmlspecialchars($formData['city']) ?>, Trinidad & Tobago</p>
         <p class="text-green-400 mt-4 text-sm font-bold flex items-center"><i data-lucide="truck" class="inline w-4 h-4 mr-2"></i> Estimated delivery: 2-3 days</p>
      </div>

      <a 
        href="?route=home"
        class="block w-full bg-jeff-orange text-white font-bold py-4 rounded-xl hover:bg-orange-600 transition shadow-lg uppercase tracking-wide cursor-pointer text-center"
      >
        Back to Home
      </a>
    </div>
  </div>

<?php elseif (count($cart) === 0): ?>
  <div class="min-h-screen flex flex-col items-center justify-center bg-[#0A0A0A] px-4">
    <i data-lucide="shopping-cart" class="h-16 w-16 text-neutral-800 mb-6"></i>
    <h2 class="text-3xl font-display font-bold text-white mb-4 uppercase tracking-widest text-center">Your cart is empty.</h2>
    <a href="?route=shop" class="text-jeff-gold font-bold uppercase tracking-wider hover:underline flex items-center group transition">
       <i data-lucide="arrow-left" class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition"></i> Return to Shop
    </a>
  </div>

<?php else: ?>
  <div class="min-h-screen bg-[#0A0A0A] py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <a 
        href="?route=shop"
        class="inline-flex items-center text-neutral-400 hover:text-jeff-gold mb-8 transition font-bold uppercase tracking-wide text-sm group"
      >
        <i data-lucide="arrow-left" class="h-4 w-4 mr-2 transform group-hover:-translate-x-1 transition"></i> Continue Shopping
      </a>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        
        <!-- LEFT COLUMN: FORM -->
        <div>
          <form method="POST" action="?route=checkout" id="checkout-form" class="space-y-8">
            <!-- Contact -->
            <div class="bg-neutral-900 p-6 rounded-2xl border border-neutral-800 shadow-xl">
              <h3 class="text-xl font-display font-bold text-white mb-4 flex items-center uppercase tracking-wide">
                1. Contact Information
              </h3>
              <input 
                required
                type="email" 
                name="email"
                placeholder="Email Address" 
                class="w-full px-4 py-3 border border-neutral-800 bg-black text-white placeholder-neutral-600 rounded-lg focus:ring-2 focus:ring-jeff-teal focus:outline-none font-light"
              />
            </div>

            <!-- Shipping -->
            <div class="bg-neutral-900 p-6 rounded-2xl border border-neutral-800 shadow-xl">
              <h3 class="text-xl font-display font-bold text-white mb-4 flex items-center uppercase tracking-wide">
                2. Shipping Details <i data-lucide="truck" class="ml-3 h-5 w-5 text-neutral-500"></i>
              </h3>
              <div class="grid grid-cols-2 gap-4 mb-4">
                <input 
                  required
                  type="text" 
                  name="firstName"
                  placeholder="First Name" 
                  class="w-full px-4 py-3 border border-neutral-800 bg-black text-white placeholder-neutral-600 rounded-lg focus:ring-2 focus:ring-jeff-teal focus:outline-none font-light"
                />
                <input 
                  required
                  type="text" 
                  name="lastName"
                  placeholder="Last Name" 
                  class="w-full px-4 py-3 border border-neutral-800 bg-black text-white placeholder-neutral-600 rounded-lg focus:ring-2 focus:ring-jeff-teal focus:outline-none font-light"
                />
              </div>
              <input 
                required
                type="text" 
                name="address"
                placeholder="Street Address" 
                class="w-full px-4 py-3 border border-neutral-800 bg-black text-white placeholder-neutral-600 rounded-lg focus:ring-2 focus:ring-jeff-teal focus:outline-none mb-4 font-light"
              />
              <div class="grid grid-cols-2 gap-4">
                <input 
                  required
                  type="text" 
                  name="city"
                  placeholder="City / Town" 
                  class="w-full px-4 py-3 border border-neutral-800 bg-black text-white placeholder-neutral-600 rounded-lg focus:ring-2 focus:ring-jeff-teal focus:outline-none font-light"
                />
                <input 
                  required
                  type="text" 
                  name="zip"
                  placeholder="Postal Code (Optional)" 
                  class="w-full px-4 py-3 border border-neutral-800 bg-black text-white placeholder-neutral-600 rounded-lg focus:ring-2 focus:ring-jeff-teal focus:outline-none font-light"
                />
              </div>
              <div class="mt-4 flex items-center text-sm text-neutral-450 bg-black p-3 rounded-lg border border-neutral-800">
                 <i data-lucide="map-pin" class="h-4 w-4 mr-2 flex-shrink-0 text-jeff-gold"></i> Shipping currently available in Trinidad & Tobago only.
              </div>
            </div>

            <!-- Payment -->
            <div class="bg-neutral-900 p-6 rounded-2xl border border-neutral-800 shadow-xl">
              <h3 class="text-xl font-display font-bold text-white mb-4 flex items-center uppercase tracking-wide">
                3. Payment <i data-lucide="lock" class="ml-3 h-4 w-4 text-green-400"></i>
              </h3>
              <div class="mb-4">
                 <div class="relative">
                    <i data-lucide="credit-card" class="absolute left-4 top-3.5 h-5 w-5 text-neutral-500"></i>
                    <input 
                      required
                      type="text" 
                      name="cardNumber"
                      placeholder="Card Number" 
                      class="w-full pl-12 pr-4 py-3 border border-neutral-800 bg-black text-white placeholder-neutral-600 rounded-lg focus:ring-2 focus:ring-jeff-teal focus:outline-none font-mono"
                      maxlength="19"
                    />
                 </div>
              </div>
              <div class="grid grid-cols-2 gap-4">
                <input 
                  required
                  type="text" 
                  name="expiry"
                  placeholder="MM / YY" 
                  class="w-full px-4 py-3 border border-neutral-800 bg-black text-white placeholder-neutral-600 rounded-lg focus:ring-2 focus:ring-jeff-teal focus:outline-none font-mono"
                  maxlength="5"
                />
                <input 
                  required
                  type="text" 
                  name="cvc"
                  placeholder="CVC" 
                  class="w-full px-4 py-3 border border-neutral-800 bg-black text-white placeholder-neutral-600 rounded-lg focus:ring-2 focus:ring-jeff-teal focus:outline-none font-mono"
                  maxlength="4"
                />
              </div>
            </div>

            <button 
              type="submit" 
              id="submit-pay-btn"
              class="w-full bg-neutral-900 text-white font-bold py-5 rounded-xl hover:bg-jeff-orange transition shadow-xl text-lg flex justify-center items-center font-display uppercase tracking-widest relative overflow-hidden"
            >
              <span id="btn-text">Pay $<?= number_format($finalTotal, 2) ?></span>
              <i data-lucide="loader-2" id="btn-spinner" class="w-6 h-6 animate-spin absolute hidden"></i>
            </button>
          </form>
        </div>

        <!-- RIGHT COLUMN: SUMMARY -->
        <div class="lg:pl-8">
           <div class="bg-neutral-900 p-6 rounded-2xl border border-neutral-800 sticky top-24 shadow-2xl">
              <h3 class="text-xl font-display font-bold text-white mb-6 uppercase tracking-wide">Order Summary</h3>
              
              <div class="max-h-80 overflow-y-auto mb-6 pr-2 scrollbar-hide space-y-4">
                <?php foreach ($cart as $item): ?>
                  <div class="flex pb-4 border-b border-neutral-800 last:border-0 last:pb-0">
                     <div class="h-16 w-16 rounded-lg bg-black overflow-hidden flex-shrink-0 border border-neutral-800 p-1 flex items-center justify-center">
                        <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="max-w-full max-h-full object-contain">
                      </div>
                     <div class="ml-4 flex-1">
                        <div class="flex justify-between font-bold text-white text-sm font-display uppercase tracking-wide">
                           <h4><?= htmlspecialchars($item['name']) ?></h4>
                           <span class="text-jeff-gold">$<?= number_format($item['price'] * $item['quantity'], 2) ?></span>
                        </div>
                        <p class="text-xs text-jeff-orange font-bold uppercase tracking-widest mt-1"><?= htmlspecialchars($item['style']) ?></p>
                        <p class="text-xs text-neutral-450 font-bold mt-1">Qty: <?= $item['quantity'] ?></p>
                     </div>
                  </div>
                <?php endforeach; ?>
              </div>

              <div class="space-y-3 pt-6 border-t border-neutral-800">
                 <div class="flex justify-between text-neutral-400 text-sm font-bold uppercase tracking-wider">
                    <span>Subtotal</span>
                    <span class="text-white">$<?= number_format($cartTotal, 2) ?></span>
                 </div>
                 <div class="flex justify-between text-neutral-400 text-sm font-bold uppercase tracking-wider">
                    <span>Shipping</span>
                    <span>
                      <?php if ($shippingCost == 0): ?>
                          <span class="text-green-400 font-bold">FREE</span>
                      <?php else: ?>
                          <span class="text-white">$<?= number_format($shippingCost, 2) ?></span>
                      <?php endif; ?>
                    </span>
                 </div>
                 <div class="flex justify-between text-2xl font-display font-bold text-white pt-6 border-t border-neutral-800 mt-4 leading-none">
                    <span>Total</span>
                    <span class="text-jeff-gold">$<?= number_format($finalTotal, 2) ?></span>
                 </div>
              </div>

              <div class="mt-8 bg-black p-4 rounded-xl flex items-start border border-neutral-800 shadow-inner">
                 <i data-lucide="shield-check" class="w-5 h-5 text-jeff-teal mt-0.5 flex-shrink-0"></i>
                 <p class="text-xs text-neutral-400 ml-3 leading-relaxed">
                   Your payment information is encrypted and secure. We do not store your credit card details on our servers.
                 </p>
              </div>
           </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('checkout-form').addEventListener('submit', function() {
        const btnText = document.getElementById('btn-text');
        const spinner = document.getElementById('btn-spinner');
        const submitBtn = document.getElementById('submit-pay-btn');
        
        btnText.style.opacity = '0';
        spinner.classList.remove('hidden');
        submitBtn.setAttribute('disabled', 'true');
        submitBtn.classList.add('opacity-80', 'cursor-not-allowed');
    });
  </script>
<?php endif; ?>
