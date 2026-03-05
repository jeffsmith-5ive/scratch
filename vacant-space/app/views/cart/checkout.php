<div class="bg-gray-50 flex-grow py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-oswald font-bold text-jeff-dark uppercase mb-8 border-l-4 border-jeff-teal pl-4">Checkout</h1>
        
        <?php if (empty($cart)): ?>
            <div class="bg-white p-12 text-center rounded-2xl shadow-md border border-gray-100">
                <i data-lucide="shopping-cart" class="w-16 h-16 text-gray-300 mx-auto mb-4"></i>
                <h2 class="text-2xl font-oswald font-bold text-gray-600 mb-4 uppercase">Your cart is empty</h2>
                <a href="?route=shop" class="inline-flex items-center px-6 py-3 bg-jeff-teal text-white font-bold rounded-xl hover:bg-jeff-dark transition-colors shadow-md">
                    Return to Shop
                </a>
            </div>
        <?php else: ?>
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <h3 class="text-xl font-oswald font-bold mb-6 text-jeff-dark uppercase border-b border-gray-100 pb-4">Order Summary</h3>
                    
                    <div class="space-y-6">
                        <?php 
                        $subtotal = 0;
                        foreach ($cart as $id => $qty): 
                            $beer = Database::getBeerById($id);
                            if($beer):
                                $total = $beer['price'] * $qty;
                                $subtotal += $total;
                        ?>
                            <div class="flex items-center gap-6">
                                <div class="w-20 h-20 bg-gray-50 rounded-xl overflow-hidden flex-shrink-0 border border-gray-100">
                                    <img src="<?= htmlspecialchars($beer['image']) ?>" class="w-full h-full object-contain p-2" />
                                </div>
                                <div class="flex-grow">
                                    <h4 class="font-bold text-jeff-dark text-lg uppercase font-oswald tracking-wide"><?= htmlspecialchars($beer['name']) ?></h4>
                                    <p class="text-sm text-gray-500 font-light">Qty: <?= $qty ?> × $<?= number_format($beer['price'], 2) ?></p>
                                </div>
                                <div class="text-right">
                                    <span class="font-bold text-jeff-orange text-lg">$<?= number_format($total, 2) ?></span>
                                </div>
                            </div>
                        <?php 
                            endif;
                        endforeach; 
                        ?>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-8 border-t border-gray-100">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-500 font-light">Subtotal</span>
                        <span class="font-bold text-gray-800">$<?= number_format($subtotal, 2) ?></span>
                    </div>
                    <div class="flex justify-between items-center mb-6">
                        <span class="text-gray-500 font-light">Shipping</span>
                        <span class="font-bold text-green-600">Free</span>
                    </div>
                    
                    <div class="border-t border-gray-200 pt-6 mb-8 flex justify-between items-center">
                        <span class="text-xl font-oswald font-bold text-jeff-dark uppercase">Total</span>
                        <span class="text-3xl font-oswald font-bold text-jeff-orange">$<?= number_format($subtotal, 2) ?></span>
                    </div>
                    
                    <button class="w-full bg-jeff-teal hover:bg-jeff-dark text-white text-xl font-bold py-4 rounded-xl shadow-lg transition-all transform hover:-translate-y-1" onclick="alert('Mock Payment Processed! Thanks for joining the Krewe.')">
                        Complete Order
                    </button>
                    <p class="text-center text-xs text-gray-400 mt-4"><i data-lucide="lock" class="w-3 h-3 inline"></i> Secure Mock Checkout</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
