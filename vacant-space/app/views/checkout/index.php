<?php
/**
 * Jeff Brewery — Traditional, Clean E-Commerce Checkout Experience
 * Inspired by established retailers (Shopify style) with authentic Jeff Brewery brand identity:
 * - Primary: Near-black #111111 / #0A0A0A
 * - Secondary / Gold: #D4A017 / var(--gold)
 * - Accent / Rust: #C04A1A / var(--rust)
 * - Background: Warm Cream #FAF7F0 / var(--cream)
 * - Text: Dark charcoal #1A1A1A
 * - Borders: Subtle warm light grey #E8E2D5
 */

$cartTotal = $cartTotal ?? 0;
$totalQty = 0;
foreach ($cart as $item) {
    $totalQty += $item['quantity'];
}

$userPoints = $user['points'] ?? 1450;
$userName = $user['name'] ?? 'Jeff Smith';
$userEmail = $user['email'] ?? 'jeff.smith@jeffbrewery.com';
$userPhone = $user['phone'] ?? '+1 (868) 746-7332';
$nameParts = explode(' ', $userName, 2);
$firstName = $nameParts[0] ?? 'Jeff';
$lastName = $nameParts[1] ?? 'Smith';

$defaultShipping = $defaultShipping ?? 15.00;
?>

<?php if ($step === 'success' && !empty($orderData)): ?>
    <!-- ========================================== -->
    <!-- ORDER CONFIRMATION / SUCCESS STATE -->
    <!-- ========================================== -->
    <div class="min-h-[85vh] bg-[#FAF7F0] py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <!-- Print Media Stylesheet -->
            <style>
            @media print {
                body, html {
                    background-color: #ffffff !important;
                    color: #000000 !important;
                }
                header, footer, nav, .print-hidden, #mobile-sidebar, #cart-drawer, #chatbot-window, #chatbot-fab-container, #trinichat-modal, .breadcrumb-bar {
                    display: none !important;
                }
                main {
                    padding: 0 !important;
                    margin: 0 !important;
                    background: transparent !important;
                }
                #invoice-receipt-card {
                    border: 1px solid #ddd !important;
                    box-shadow: none !important;
                    padding: 24px !important;
                    max-width: 100% !important;
                }
            }
            </style>

            <!-- Breadcrumb / Return -->
            <div class="mb-6 breadcrumb-bar print-hidden">
                <a href="?route=shop" class="inline-flex items-center text-xs font-semibold uppercase tracking-wider text-neutral-600 hover:text-[var(--rust)] transition">
                    <i data-lucide="arrow-left" class="w-4 h-4 mr-1.5"></i> Return to Shop
                </a>
            </div>

            <!-- Confirmation Card (Invoice printable element) -->
            <div id="invoice-receipt-card" class="bg-white border border-[#E8E2D5] rounded-xl p-8 sm:p-10 shadow-sm relative">
                <!-- Checkmark & Header -->
                <div class="flex items-center gap-4 pb-6 border-b border-[#E8E2D5]">
                    <div class="w-14 h-14 rounded-full bg-[#FAF3E0] border border-[var(--gold)]/50 text-[var(--gold)] flex items-center justify-center shrink-0">
                        <i data-lucide="check-circle-2" class="w-8 h-8 text-[var(--gold)]"></i>
                    </div>
                    <div>
                        <span class="text-xs uppercase tracking-wider text-[var(--rust)] font-bold">Order Confirmed · #<?= htmlspecialchars($orderData['id']) ?></span>
                        <h1 class="text-2xl sm:text-3xl font-bold font-oswald text-[#111111] uppercase tracking-wide">
                            Thank You, <?= htmlspecialchars($orderData['firstName']) ?>!
                        </h1>
                        <p class="text-xs sm:text-sm text-neutral-600 mt-0.5">
                            A confirmation receipt has been sent to <strong class="text-neutral-900"><?= htmlspecialchars($orderData['email']) ?></strong>.
                        </p>
                    </div>
                </div>

                <!-- Invoice Quick Action Bar (Print & Download Options) -->
                <div class="mt-6 p-4 rounded-lg bg-[#FAF7F0] border border-[#E8E2D5] flex flex-col sm:flex-row items-center justify-between gap-3 print-hidden">
                    <div class="flex items-center gap-2.5">
                        <div class="p-2 bg-white rounded-md border border-[#E8E2D5]">
                            <i data-lucide="file-text" class="w-5 h-5 text-[var(--gold)]"></i>
                        </div>
                        <div>
                            <span class="text-xs font-bold text-neutral-900 block font-oswald uppercase tracking-wider">Official Invoice #INV-<?= htmlspecialchars($orderData['id']) ?></span>
                            <span class="text-[11px] text-neutral-500">VAT registered proof of purchase ready for download or printing.</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 w-full sm:w-auto">
                        <button 
                            type="button" 
                            onclick="window.print()" 
                            class="flex-1 sm:flex-initial inline-flex items-center justify-center gap-1.5 px-3.5 py-2.5 bg-white hover:bg-neutral-50 text-neutral-800 border border-[#DDD6C8] rounded-lg text-xs font-bold uppercase tracking-wider transition shadow-sm font-oswald cursor-pointer"
                            title="Print Official Invoice"
                        >
                            <i data-lucide="printer" class="w-3.5 h-3.5 text-neutral-600"></i>
                            Print Invoice
                        </button>
                        <button 
                            type="button" 
                            onclick="downloadOfficialInvoice()" 
                            class="flex-1 sm:flex-initial inline-flex items-center justify-center gap-1.5 px-3.5 py-2.5 bg-[#111111] hover:bg-black text-[var(--gold)] border border-[var(--gold)]/40 rounded-lg text-xs font-bold uppercase tracking-wider transition shadow-sm font-oswald cursor-pointer"
                            title="Download Invoice as PNG Image"
                        >
                            <i data-lucide="image" class="w-3.5 h-3.5 text-[var(--gold)]"></i>
                            Download Invoice (Image)
                        </button>
                    </div>
                </div>

                <!-- Loyalty Points Earned Banner (Section 15) -->
                <div class="mt-6 p-4 rounded-lg bg-[#FFF9EE] border border-[#E8D7B0] flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">🏆</span>
                        <div>
                            <h4 class="text-xs font-bold text-[#805500] uppercase tracking-wider font-oswald">The Krewe Loyalty Reward</h4>
                            <p class="text-xs text-[#946200]">You earned <strong>+50 Krewe Points</strong> with this purchase!</p>
                        </div>
                    </div>
                    <span class="text-xs font-bold px-2.5 py-1 bg-[#FAF0D4] text-[#805500] rounded-full border border-[#E5CA85]">
                        Total: <?= number_format($userPoints) ?> pts
                    </span>
                </div>

                <!-- Order Details Grid -->
                <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-6 text-xs text-neutral-600">
                    <div class="bg-[#FAF7F0] p-4 rounded-lg border border-[#E8E2D5]">
                        <span class="font-bold text-[#111111] uppercase tracking-wider text-[11px] block mb-2 font-oswald">Contact Information</span>
                        <p class="text-neutral-900 font-semibold"><?= htmlspecialchars($orderData['firstName'] . ' ' . $orderData['lastName']) ?></p>
                        <p class="text-neutral-600"><?= htmlspecialchars($orderData['email']) ?></p>
                        <p class="text-neutral-600"><?= htmlspecialchars($orderData['phone']) ?></p>
                    </div>

                    <div class="bg-[#FAF7F0] p-4 rounded-lg border border-[#E8E2D5]">
                        <span class="font-bold text-[#111111] uppercase tracking-wider text-[11px] block mb-2 font-oswald">
                            <?= $orderData['deliveryMethod'] === 'pickup' ? 'Collection Point' : 'Delivery Address' ?>
                        </span>
                        <?php if ($orderData['deliveryMethod'] === 'pickup'): ?>
                            <p class="text-neutral-900 font-semibold">Jeff Brewery Taproom</p>
                            <p class="text-neutral-600">Point Lisas Industrial Estate, Couva</p>
                            <p class="text-neutral-600">Trinidad & Tobago</p>
                            <p class="text-[#805500] font-semibold mt-1">Ready for collection Wed–Sun 12pm–10pm</p>
                        <?php else: ?>
                            <p class="text-neutral-900 font-semibold"><?= htmlspecialchars($orderData['address']) ?></p>
                            <?php if (!empty($orderData['apt'])): ?>
                                <p class="text-neutral-600"><?= htmlspecialchars($orderData['apt']) ?></p>
                            <?php endif; ?>
                            <p class="text-neutral-600"><?= htmlspecialchars($orderData['city']) ?>, Trinidad & Tobago</p>
                            <p class="text-neutral-500 mt-1">Method: Island Courier (2-3 Business Days)</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Order Summary Items -->
                <div class="mt-8 pt-6 border-t border-[#E8E2D5]">
                    <h3 class="font-bold text-[#111111] uppercase tracking-wider text-xs font-oswald mb-4">Summary of Items</h3>
                    <div class="space-y-3">
                        <?php foreach ($orderData['items'] as $item): 
                            $itemQty = $item['quantity'] ?? $item['qty'] ?? 1;
                        ?>
                            <div class="flex items-center justify-between py-2 border-b border-neutral-100 last:border-0 text-xs">
                                <div class="flex items-center gap-3">
                                    <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="w-12 h-12 object-contain bg-[#FAF7F0] border border-[#E8E2D5] rounded p-1">
                                    <div>
                                        <p class="font-bold text-neutral-900"><?= htmlspecialchars($item['name']) ?></p>
                                        <p class="text-[var(--rust)] font-semibold text-[11px]"><?= htmlspecialchars($item['style']) ?> · Qty: <?= $itemQty ?></p>
                                    </div>
                                </div>
                                <span class="font-bold text-neutral-900 font-oswald">$<?= number_format($item['totalPrice'] ?? ($itemQty * $item['price']), 2) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Final Total Row -->
                    <div class="mt-6 pt-4 border-t border-[#E8E2D5] space-y-1.5 text-xs text-neutral-600">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span class="text-neutral-900 font-medium">$<?= number_format($cartTotal, 2) ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span>Shipping</span>
                            <span class="text-neutral-900 font-medium">
                                <?= $orderData['shippingCost'] == 0 ? 'Free' : '$' . number_format($orderData['shippingCost'], 2) ?>
                            </span>
                        </div>
                        <?php if ($orderData['discount'] > 0): ?>
                            <div class="flex justify-between text-[#805500] font-semibold">
                                <span>Discount / Krewe Points</span>
                                <span>-$<?= number_format($orderData['discount'], 2) ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="flex justify-between text-base font-bold text-neutral-900 pt-3 border-t border-[#E8E2D5]">
                            <span>Total Paid</span>
                            <span class="text-lg font-oswald text-[#111111]">$<?= number_format($orderData['finalTotal'], 2) ?> TTD</span>
                        </div>
                    </div>
                </div>

                <!-- Action CTA & Print/Download Bar -->
                <div class="mt-8 pt-6 border-t border-[#E8E2D5] space-y-3 print-hidden">
                    <div class="flex flex-col sm:flex-row gap-3">
                        <button 
                            type="button" 
                            onclick="window.print()" 
                            class="flex-1 bg-white hover:bg-neutral-50 text-neutral-800 border border-[#DDD6C8] text-center py-3.5 px-6 rounded-lg text-xs font-bold uppercase tracking-wider transition shadow-sm font-oswald flex items-center justify-center gap-2 cursor-pointer"
                        >
                            <i data-lucide="printer" class="w-4 h-4 text-neutral-700"></i>
                            Print Receipt / Invoice
                        </button>
                        <button 
                            type="button" 
                            onclick="downloadOfficialInvoice()" 
                            class="flex-1 bg-[#111111] hover:bg-black text-[var(--gold)] border-2 border-[var(--gold)]/60 text-center py-3.5 px-6 rounded-lg text-xs font-bold uppercase tracking-wider transition shadow-sm font-oswald flex items-center justify-center gap-2 cursor-pointer"
                        >
                            <i data-lucide="image" class="w-4 h-4 text-[var(--gold)]"></i>
                            Download Invoice (Image)
                        </button>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3 pt-1">
                        <a href="?route=shop" class="flex-1 bg-[#1C1917] hover:bg-black text-neutral-200 text-center py-3 px-6 rounded-lg text-xs font-bold uppercase tracking-wider transition font-oswald">
                            Continue Shopping
                        </a>
                        <a href="?route=profile" class="flex-1 bg-[#FAF7F0] hover:bg-[#F5F0E8] text-neutral-700 border border-[#E8E2D5] text-center py-3 px-6 rounded-lg text-xs font-bold uppercase tracking-wider transition font-oswald">
                            View in My Account
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- INVOICE DOWNLOAD HELPER SCRIPT (Image / PNG Generator) -->
    <script>
    function downloadOfficialInvoice() {
        const orderId = <?= json_encode($orderData['id']) ?>;
        const orderDate = <?= json_encode($orderData['date']) ?>;
        const customerName = <?= json_encode($orderData['firstName'] . ' ' . $orderData['lastName']) ?>;
        const customerEmail = <?= json_encode($orderData['email']) ?>;
        const customerPhone = <?= json_encode($orderData['phone']) ?>;
        const customerAddress = <?= json_encode($orderData['address'] . (!empty($orderData['apt']) ? ', ' . $orderData['apt'] : '') . ', ' . $orderData['city'] . ', Trinidad & Tobago') ?>;
        const deliveryMethod = <?= json_encode($orderData['deliveryMethod'] === 'pickup' ? 'Brewery Taproom Pickup (Couva)' : 'Island Delivery (Express Courier)') ?>;
        const subtotal = <?= json_encode(number_format($cartTotal, 2)) ?>;
        const shippingCost = <?= json_encode($orderData['shippingCost'] == 0 ? 'Free' : '$' . number_format($orderData['shippingCost'], 2)) ?>;
        const discount = <?= json_encode(number_format($orderData['discount'], 2)) ?>;
        const finalTotal = <?= json_encode(number_format($orderData['finalTotal'], 2)) ?>;
        const items = <?= json_encode($orderData['items']) ?>;

        // Create high-res canvas (1200px width for crystal clarity)
        const canvas = document.createElement('canvas');
        const width = 1200;
        const baseHeight = 1380 + (items.length * 85);
        canvas.width = width;
        canvas.height = baseHeight;
        const ctx = canvas.getContext('2d');

        // Background
        ctx.fillStyle = '#FAF7F0';
        ctx.fillRect(0, 0, width, baseHeight);

        // Receipt Card Container
        const margin = 45;
        const cardWidth = width - (margin * 2);
        const cardHeight = baseHeight - (margin * 2);
        ctx.fillStyle = '#FFFFFF';
        ctx.strokeStyle = '#E8E2D5';
        ctx.lineWidth = 2;
        ctx.beginPath();
        ctx.roundRect(margin, margin, cardWidth, cardHeight, 20);
        ctx.fill();
        ctx.stroke();

        // Trini flag strip at top of card
        ctx.fillStyle = '#CE1126';
        ctx.fillRect(margin, margin, cardWidth, 8);
        ctx.fillStyle = '#000000';
        ctx.fillRect(margin, margin + 8, cardWidth, 4);

        // Header Title
        let y = margin + 65;
        ctx.font = '900 40px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillStyle = '#111111';
        ctx.fillText('JEFF ', margin + 50, y);
        const jeffWidth = ctx.measureText('JEFF ').width;
        ctx.fillStyle = '#D4A017';
        ctx.fillText('BREWERY', margin + 50 + jeffWidth, y);

        // Subtitle
        ctx.font = '700 13px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillStyle = '#C04A1A';
        ctx.fillText('TRINBAGONIAN FLAVOUR · CARIBBEAN STORY', margin + 50, y + 25);

        // Address & Company Info
        ctx.font = '400 13px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillStyle = '#666666';
        ctx.fillText('Point Lisas Industrial Estate, Couva, Trinidad & Tobago', margin + 50, y + 47);
        ctx.fillText('Tel: +1 (868) 746-7332 · VAT Reg: #1048291 · info@jeffbrewery.com', margin + 50, y + 68);

        // Tax Invoice Badge on Right
        ctx.fillStyle = '#111111';
        ctx.beginPath();
        ctx.roundRect(margin + cardWidth - 270, margin + 45, 220, 42, 8);
        ctx.fill();
        ctx.font = 'bold 15px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillStyle = '#D4A017';
        ctx.textAlign = 'center';
        ctx.fillText('TAX INVOICE', margin + cardWidth - 160, margin + 71);
        ctx.textAlign = 'left';

        ctx.font = 'bold 15px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillStyle = '#111111';
        ctx.fillText('Invoice: INV-' + orderId, margin + cardWidth - 270, margin + 115);
        ctx.font = '400 13px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillStyle = '#666666';
        ctx.fillText('Date: ' + orderDate, margin + cardWidth - 270, margin + 138);
        ctx.font = 'bold 13px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillStyle = '#15803D';
        ctx.fillText('Status: Paid & Confirmed ✓', margin + cardWidth - 270, margin + 162);

        // Horizontal Brewery Gold divider
        y += 115;
        ctx.strokeStyle = '#D4A017';
        ctx.lineWidth = 2.5;
        ctx.beginPath();
        ctx.moveTo(margin + 50, y);
        ctx.lineTo(margin + cardWidth - 50, y);
        ctx.stroke();

        // Customer & Fulfillment details
        y += 28;
        const boxWidth = (cardWidth - 130) / 2;
        const boxHeight = 165;

        // Box 1: Billed / Shipped To
        ctx.fillStyle = '#FAF7F0';
        ctx.strokeStyle = '#E8E2D5';
        ctx.lineWidth = 1;
        ctx.beginPath();
        ctx.roundRect(margin + 50, y, boxWidth, boxHeight, 10);
        ctx.fill();
        ctx.stroke();

        ctx.font = 'bold 12px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillStyle = '#111111';
        ctx.fillText('BILLED & SHIPPED TO:', margin + 68, y + 28);
        ctx.font = 'bold 16px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillText(customerName, margin + 68, y + 54);
        ctx.font = '400 13px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillStyle = '#555555';
        ctx.fillText(customerAddress, margin + 68, y + 78);
        ctx.fillText(customerEmail, margin + 68, y + 102);
        ctx.fillText(customerPhone, margin + 68, y + 126);

        // Box 2: Fulfillment & Payment
        ctx.fillStyle = '#FAF7F0';
        ctx.beginPath();
        ctx.roundRect(margin + 70 + boxWidth, y, boxWidth, boxHeight, 10);
        ctx.fill();
        ctx.stroke();

        ctx.font = 'bold 12px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillStyle = '#111111';
        ctx.fillText('FULFILLMENT & PAYMENT:', margin + 88 + boxWidth, y + 28);
        ctx.font = '400 13px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillStyle = '#333333';
        ctx.fillText('Method: ' + deliveryMethod, margin + 88 + boxWidth, y + 54);
        ctx.fillText('Payment: Credit / Debit Card (256-Bit SSL)', margin + 88 + boxWidth, y + 78);
        ctx.fillText('Currency: Trinidad & Tobago Dollars (TTD)', margin + 88 + boxWidth, y + 102);
        ctx.fillStyle = '#B45309';
        ctx.font = 'bold 13px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillText('Loyalty: +50 Krewe Points Earned 🏆', margin + 88 + boxWidth, y + 128);

        // Table Header
        y += boxHeight + 35;
        ctx.fillStyle = '#111111';
        ctx.beginPath();
        ctx.roundRect(margin + 50, y, cardWidth - 100, 38, 8);
        ctx.fill();

        ctx.font = 'bold 12px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillStyle = '#FFFFFF';
        ctx.fillText('ITEM DESCRIPTION', margin + 68, y + 24);
        ctx.textAlign = 'center';
        ctx.fillText('QTY', margin + cardWidth - 320, y + 24);
        ctx.textAlign = 'right';
        ctx.fillText('UNIT PRICE', margin + cardWidth - 180, y + 24);
        ctx.fillText('TOTAL', margin + cardWidth - 68, y + 24);
        ctx.textAlign = 'left';

        // Table Rows
        y += 38;
        items.forEach((item) => {
            y += 18;
            const qty = item.quantity || item.qty || 1;
            const price = parseFloat(item.price || 0).toFixed(2);
            const lineTotal = (qty * parseFloat(item.price || 0)).toFixed(2);

            ctx.font = 'bold 15px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
            ctx.fillStyle = '#111111';
            ctx.fillText(item.name, margin + 68, y + 18);

            ctx.font = '600 12px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
            ctx.fillStyle = '#C04A1A';
            ctx.fillText(item.style || 'Craft Brew', margin + 68, y + 36);

            ctx.font = 'bold 14px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
            ctx.fillStyle = '#333333';
            ctx.textAlign = 'center';
            ctx.fillText(qty.toString(), margin + cardWidth - 320, y + 24);

            ctx.textAlign = 'right';
            ctx.font = '400 14px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
            ctx.fillText('$' + price, margin + cardWidth - 180, y + 24);
            ctx.font = 'bold 15px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
            ctx.fillStyle = '#111111';
            ctx.fillText('$' + lineTotal, margin + cardWidth - 68, y + 24);
            ctx.textAlign = 'left';

            y += 42;
            ctx.strokeStyle = '#E8E2D5';
            ctx.lineWidth = 1;
            ctx.beginPath();
            ctx.moveTo(margin + 50, y);
            ctx.lineTo(margin + cardWidth - 50, y);
            ctx.stroke();
        });

        // Totals Box
        y += 26;
        const totalsWidth = 340;
        const totalsX = margin + cardWidth - 50 - totalsWidth;
        
        ctx.font = '400 14px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillStyle = '#555555';
        ctx.fillText('Subtotal:', totalsX, y);
        ctx.textAlign = 'right';
        ctx.fillStyle = '#111111';
        ctx.font = '600 14px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillText('$' + subtotal, totalsX + totalsWidth, y);
        ctx.textAlign = 'left';

        y += 26;
        ctx.font = '400 14px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillStyle = '#555555';
        ctx.fillText('Shipping & Handling:', totalsX, y);
        ctx.textAlign = 'right';
        ctx.fillStyle = '#111111';
        ctx.font = '600 14px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillText(shippingCost, totalsX + totalsWidth, y);
        ctx.textAlign = 'left';

        if (parseFloat(discount) > 0) {
            y += 26;
            ctx.font = 'bold 14px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
            ctx.fillStyle = '#C04A1A';
            ctx.fillText('Discount / Krewe Points:', totalsX, y);
            ctx.textAlign = 'right';
            ctx.fillText('-$' + discount, totalsX + totalsWidth, y);
            ctx.textAlign = 'left';
        }

        y += 34;
        // Total Paid Box
        ctx.fillStyle = '#111111';
        ctx.beginPath();
        ctx.roundRect(totalsX - 12, y - 24, totalsWidth + 24, 44, 8);
        ctx.fill();

        ctx.font = 'bold 15px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillStyle = '#FFFFFF';
        ctx.fillText('TOTAL PAID (TTD):', totalsX, y + 4);
        ctx.textAlign = 'right';
        ctx.font = '900 20px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillStyle = '#D4A017';
        ctx.fillText('$' + finalTotal, totalsX + totalsWidth, y + 5);
        ctx.textAlign = 'left';

        // Digital Receipt Stamp
        y += 70;
        ctx.fillStyle = '#FAF7F0';
        ctx.strokeStyle = '#E8E2D5';
        ctx.lineWidth = 1;
        ctx.beginPath();
        ctx.roundRect(margin + 50, y, cardWidth - 100, 65, 8);
        ctx.fill();
        ctx.stroke();

        ctx.font = 'bold 12px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillStyle = '#15803D';
        ctx.fillText('🔒 OFFICIAL DIGITAL INVOICE RECEIPT', margin + 68, y + 26);
        ctx.font = '400 12px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillStyle = '#666666';
        ctx.fillText('Verified transaction #INV-' + orderId + '. Generated on ' + orderDate + '. No physical signature required.', margin + 68, y + 46);

        // Footer Brand Signoff
        y += 95;
        ctx.textAlign = 'center';
        ctx.font = 'bold 13px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillStyle = '#111111';
        ctx.fillText('Drink the Vision. Live the Culture. · www.jeffbrewery.com', margin + (cardWidth / 2), y);
        ctx.font = '400 12px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
        ctx.fillStyle = '#777777';
        ctx.fillText('Thank you for supporting authentic Trinbagonian craft brewing!', margin + (cardWidth / 2), y + 20);

        // Convert canvas to PNG and trigger instant file download
        canvas.toBlob(function(blob) {
            if (!blob) return;
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'Jeff-Brewery-Invoice-' + orderId + '.png';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }, 'image/png');
    }
    </script>

<?php elseif (empty($cart)): ?>
    <!-- ========================================== -->
    <!-- EMPTY CART STATE -->
    <!-- ========================================== -->
    <div class="min-h-[70vh] bg-[#FAF7F0] flex items-center justify-center px-4 py-16">
        <div class="max-w-md w-full text-center">
            <div class="w-16 h-16 bg-white border border-[#E8E2D5] rounded-full flex items-center justify-center mx-auto mb-4 text-neutral-400">
                <i data-lucide="shopping-bag" class="w-8 h-8 text-[var(--gold)]"></i>
            </div>
            <h2 class="text-2xl font-bold font-oswald text-[#111111] uppercase tracking-wide">Your Cart is Empty</h2>
            <p class="text-xs sm:text-sm text-neutral-600 mt-2 mb-6">
                Looks like you haven't added any authentic Trinbagonian craft brews to your basket yet.
            </p>
            <a href="?route=shop" class="inline-flex items-center justify-center bg-[#111111] hover:bg-black text-[var(--gold)] border border-[var(--gold)]/40 text-xs font-bold uppercase tracking-wider py-3.5 px-8 rounded-lg transition shadow-sm font-oswald">
                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i> Explore Our Beers
            </a>
        </div>
    </div>

<?php else: ?>
    <!-- ========================================== -->
    <!-- MAIN CHECKOUT EXPERIENCE (SECTIONS 1 - 24) -->
    <!-- ========================================== -->
    <div class="min-h-screen bg-[#FAF7F0] text-[#1A1A1A]">
        
        <!-- MOBILE COLLAPSIBLE ORDER SUMMARY (Section 21) -->
        <div class="lg:hidden bg-[#F5F0E8] border-b border-[#E8E2D5] sticky top-0 z-30 shadow-sm">
            <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
                <button 
                    type="button" 
                    id="mobile-summary-toggle" 
                    class="flex items-center gap-2 text-xs font-semibold text-neutral-800 hover:text-black transition"
                    aria-expanded="false"
                >
                    <i data-lucide="shopping-bag" class="w-4 h-4 text-[var(--gold)]"></i>
                    <span id="mobile-summary-label">Show Order Summary (<?= $totalQty ?>)</span>
                    <i data-lucide="chevron-down" id="mobile-summary-arrow" class="w-3.5 h-3.5 transition-transform duration-200"></i>
                </button>
                <div class="text-right">
                    <span id="mobile-sticky-total" class="font-bold text-sm font-oswald text-[#111111]">
                        $<?= number_format($cartTotal + $defaultShipping, 2) ?> TTD
                    </span>
                </div>
            </div>

            <!-- Mobile Collapsible Content -->
            <div id="mobile-summary-content" class="hidden px-4 pb-4 border-t border-[#E8E2D5] bg-[#FAF7F0] text-xs">
                <div class="pt-3 space-y-3">
                    <?php foreach ($cart as $item): ?>
                        <div class="flex items-center justify-between py-1.5">
                            <div class="flex items-center gap-3">
                                <div class="relative w-12 h-12 bg-white border border-[#E8E2D5] rounded p-1 shrink-0">
                                    <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="w-full h-full object-contain">
                                    <span class="absolute -top-1.5 -right-1.5 bg-[#111111] text-[var(--gold)] border border-[var(--gold)]/40 rounded-full w-4 h-4 text-[9px] font-bold flex items-center justify-center">
                                        <?= $item['quantity'] ?>
                                    </span>
                                </div>
                                <div>
                                    <p class="font-bold text-neutral-900"><?= htmlspecialchars($item['name']) ?></p>
                                    <p class="text-[var(--rust)] font-semibold text-[10px]"><?= htmlspecialchars($item['style']) ?></p>
                                </div>
                            </div>
                            <span class="font-bold text-neutral-900 font-oswald">$<?= number_format($item['totalPrice'], 2) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Subtotals -->
                <div class="mt-4 pt-3 border-t border-[#E8E2D5] space-y-1.5 text-neutral-600">
                    <div class="flex justify-between">
                        <span>Subtotal</span>
                        <span class="text-neutral-900 font-medium">$<?= number_format($cartTotal, 2) ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span>Shipping</span>
                        <span id="mobile-shipping-display" class="text-neutral-900 font-medium">$<?= number_format($defaultShipping, 2) ?></span>
                    </div>
                    <div id="mobile-discount-row" class="flex justify-between text-[#805500] font-semibold hidden">
                        <span>Discount</span>
                        <span id="mobile-discount-display">-$0.00</span>
                    </div>
                    <div class="flex justify-between text-sm font-bold text-neutral-900 pt-2 border-t border-[#E8E2D5]">
                        <span>Total</span>
                        <span id="mobile-total-display" class="font-oswald">$<?= number_format($cartTotal + $defaultShipping, 2) ?> TTD</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- MAIN CHECKOUT CONTAINER -->
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
            
            <!-- SECTION 2: CONTINUE SHOPPING -->
            <div class="mb-6">
                <a href="?route=shop" class="inline-flex items-center text-xs font-semibold text-neutral-600 hover:text-[var(--rust)] transition tracking-wide group">
                    <i data-lucide="arrow-left" class="w-3.5 h-3.5 mr-1.5 transform group-hover:-translate-x-1 transition-transform"></i>
                    Continue Shopping
                </a>
            </div>

            <!-- TWO-COLUMN LAYOUT (Section 3 & 20: 60% Left Checkout / 40% Right Order Summary) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
                
                <!-- ============================================== -->
                <!-- LEFT COLUMN: CHECKOUT FORM (60% -> col-span-7) -->
                <!-- ============================================== -->
                <div class="lg:col-span-7 space-y-8">
                    
                    <!-- ============================================== -->
                    <!-- SECTION 4: EXPRESS CHECKOUT                    -->
                    <!-- ============================================== -->
                    <div class="bg-white border border-[#E8E2D5] rounded-xl p-5 sm:p-6 shadow-sm">
                        <div class="text-center mb-3">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-neutral-500 font-oswald">Express Checkout</span>
                        </div>
                        
                        <!-- Express Payment Buttons -->
                        <div class="grid grid-cols-3 gap-2 sm:gap-3">
                            <!-- Apple Pay -->
                            <button 
                                type="button" 
                                onclick="simulateExpressPay('Apple Pay')" 
                                class="h-11 bg-black text-white hover:bg-neutral-800 transition rounded-md flex items-center justify-center gap-1 shadow-sm focus:outline-none cursor-pointer"
                                title="Pay with Apple Pay"
                            >
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 170 170">
                                    <path d="M150.37 130.25c-2.45 5.66-5.35 10.87-8.71 15.66-4.58 6.53-8.33 11.05-11.22 13.56-4.48 4.12-9.28 6.23-14.42 6.35-3.69 0-8.14-1.05-13.32-3.18-5.19-2.12-9.97-3.17-14.34-3.17-4.58 0-9.49 1.05-14.75 3.17-5.26 2.13-9.5 3.24-12.74 3.35-4.35.13-9.16-1.9-14.42-6.08-3.69-3.04-7.67-7.81-11.94-14.3-5.99-9.13-10.74-19.46-14.25-30.98-3.51-11.52-5.27-22.38-5.27-32.6 0-14.35 3.42-26.23 10.26-35.63 6.84-9.4 15.69-14.2 26.54-14.4 5.23 0 10.86 1.41 16.9 4.23 6.03 2.82 9.94 4.3 11.72 4.45 1.52-.15 5.54-1.68 12.06-4.58 6.52-2.9 12.06-4.25 16.62-4.04 12.61.65 22.84 5.48 30.68 14.51-11.09 6.74-16.52 16.09-16.3 28.05.22 9.57 3.91 17.51 11.09 23.81 7.17 6.31 15.76 10.01 25.76 11.09-2.17 6.74-4.78 13.7-7.82 20.87zM119.22 33.15c0-7.17 2.61-13.91 7.83-20.22 5.22-6.3 11.74-10.43 19.57-12.39.22 1.09.33 2.07.33 2.93 0 7.17-2.72 14.02-8.15 20.54-5.43 6.52-11.96 10.54-19.58 12.07-.22-1.09-.33-2.07-.33-2.93z"/>
                                </svg>
                                <span class="font-medium text-xs tracking-tight">Pay</span>
                            </button>

                            <!-- Google Pay -->
                            <button 
                                type="button" 
                                onclick="simulateExpressPay('Google Pay')" 
                                class="h-11 bg-white hover:bg-neutral-50 text-neutral-800 border border-neutral-300 transition rounded-md flex items-center justify-center gap-1 shadow-sm focus:outline-none cursor-pointer"
                                title="Pay with Google Pay"
                            >
                                <span class="font-bold text-[#4285F4] text-xs">G</span>
                                <span class="font-medium text-xs text-neutral-700 tracking-tight">Pay</span>
                            </button>

                            <!-- PayPal -->
                            <button 
                                type="button" 
                                onclick="simulateExpressPay('PayPal')" 
                                class="h-11 bg-[#FFC439] hover:bg-[#F4B400] transition rounded-md flex items-center justify-center gap-1 shadow-sm focus:outline-none cursor-pointer"
                                title="Pay with PayPal"
                            >
                                <span class="font-bold italic text-[#003087] text-xs">Pay</span><span class="font-bold italic text-[#0079C1] text-xs">Pal</span>
                            </button>
                        </div>

                        <!-- OR PAY WITH CARD DIVIDER -->
                        <div class="relative my-5">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-[#E8E2D5]"></div>
                            </div>
                            <div class="relative flex justify-center text-[10px] uppercase font-bold tracking-widest font-oswald">
                                <span class="bg-white px-3 text-neutral-400">OR PAY WITH CARD</span>
                            </div>
                        </div>
                    </div>

                    <!-- MAIN CHECKOUT FORM -->
                    <form method="POST" action="?route=checkout" id="checkout-form" class="space-y-8">
                        <input type="hidden" name="deliveryMethod" id="form-delivery-method" value="delivery">
                        <input type="hidden" name="paymentMethod" id="form-payment-method" value="card">
                        <input type="hidden" name="appliedDiscount" id="form-applied-discount" value="0">

                        <!-- ============================================== -->
                        <!-- SECTION 5: 1. CONTACT INFORMATION              -->
                        <!-- ============================================== -->
                        <div class="bg-white border border-[#E8E2D5] rounded-xl p-6 shadow-sm">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-base font-bold font-oswald text-[#111111] uppercase tracking-wide flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-full bg-[#111111] text-[var(--gold)] border border-[var(--gold)]/40 text-xs flex items-center justify-center font-bold">1</span>
                                    Contact Information
                                </h2>
                                <span class="text-[11px] text-neutral-500">
                                    Signed in as <strong class="text-neutral-800"><?= htmlspecialchars($userEmail) ?></strong>
                                </span>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label for="email" class="block text-xs font-semibold text-neutral-700 mb-1">
                                        Email Address <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        type="email" 
                                        id="email" 
                                        name="email" 
                                        required 
                                        value="<?= htmlspecialchars($userEmail) ?>" 
                                        placeholder="you@email.com" 
                                        class="w-full bg-white border border-[#DDD6C8] rounded-lg px-3.5 py-2.5 text-xs text-neutral-900 focus:outline-none focus:ring-1 focus:ring-[var(--gold)] focus:border-[var(--gold)] transition"
                                    >
                                </div>

                                <div class="flex items-center gap-2 pt-1">
                                    <input 
                                        type="checkbox" 
                                        id="news_offers" 
                                        name="news_offers" 
                                        class="w-4 h-4 rounded text-black border-[#DDD6C8] focus:ring-0 focus:ring-offset-0 cursor-pointer accent-[var(--gold)]"
                                    >
                                    <label for="news_offers" class="text-xs text-neutral-600 cursor-pointer select-none">
                                        Email me with news, seasonal brew releases, and exclusive Krewe offers
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- ============================================== -->
                        <!-- SECTION 6: 2. SHIPPING INFORMATION             -->
                        <!-- ============================================== -->
                        <div class="bg-white border border-[#E8E2D5] rounded-xl p-6 shadow-sm">
                            <h2 class="text-base font-bold font-oswald text-[#111111] uppercase tracking-wide flex items-center gap-2 mb-4">
                                <span class="w-6 h-6 rounded-full bg-[#111111] text-[var(--gold)] border border-[var(--gold)]/40 text-xs flex items-center justify-center font-bold">2</span>
                                Shipping Information
                            </h2>

                            <div class="space-y-4">
                                <!-- Country / Region Dropdown -->
                                <div>
                                    <label for="country" class="block text-xs font-semibold text-neutral-700 mb-1">
                                        Country / Region <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <select 
                                            id="country" 
                                            name="country" 
                                            required
                                            class="w-full bg-white border border-[#DDD6C8] rounded-lg px-3.5 py-2.5 text-xs text-neutral-900 appearance-none focus:outline-none focus:ring-1 focus:ring-[var(--gold)] focus:border-[var(--gold)] transition cursor-pointer"
                                        >
                                            <option value="TT" selected>Trinidad & Tobago 🇹🇹</option>
                                            <option value="BB">Barbados 🇧🇧</option>
                                            <option value="JM">Jamaica 🇯🇲</option>
                                            <option value="GY">Guyana 🇬🇾</option>
                                            <option value="GD">Grenada 🇬🇩</option>
                                            <option value="US">United States 🇺🇸</option>
                                            <option value="CA">Canada 🇨🇦</option>
                                            <option value="GB">United Kingdom 🇬🇧</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-neutral-500">
                                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- First Name / Last Name -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label for="firstName" class="block text-xs font-semibold text-neutral-700 mb-1">
                                            First Name <span class="text-red-500">*</span>
                                        </label>
                                        <input 
                                            type="text" 
                                            id="firstName" 
                                            name="firstName" 
                                            required 
                                            value="<?= htmlspecialchars($firstName) ?>" 
                                            placeholder="First Name" 
                                            class="w-full bg-white border border-[#DDD6C8] rounded-lg px-3.5 py-2.5 text-xs text-neutral-900 focus:outline-none focus:ring-1 focus:ring-[var(--gold)] focus:border-[var(--gold)] transition"
                                        >
                                    </div>
                                    <div>
                                        <label for="lastName" class="block text-xs font-semibold text-neutral-700 mb-1">
                                            Last Name <span class="text-red-500">*</span>
                                        </label>
                                        <input 
                                            type="text" 
                                            id="lastName" 
                                            name="lastName" 
                                            required 
                                            value="<?= htmlspecialchars($lastName) ?>" 
                                            placeholder="Last Name" 
                                            class="w-full bg-white border border-[#DDD6C8] rounded-lg px-3.5 py-2.5 text-xs text-neutral-900 focus:outline-none focus:ring-1 focus:ring-[var(--gold)] focus:border-[var(--gold)] transition"
                                        >
                                    </div>
                                </div>

                                <!-- Street Address -->
                                <div>
                                    <label for="address" class="block text-xs font-semibold text-neutral-700 mb-1">
                                        Street Address <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        id="address" 
                                        name="address" 
                                        required 
                                        value="14 Maraval Road" 
                                        placeholder="Street Address, House/Building Number" 
                                        class="w-full bg-white border border-[#DDD6C8] rounded-lg px-3.5 py-2.5 text-xs text-neutral-900 focus:outline-none focus:ring-1 focus:ring-[var(--gold)] focus:border-[var(--gold)] transition"
                                    >
                                </div>

                                <!-- Apartment / Suite / Building -->
                                <div>
                                    <label for="apt" class="block text-xs font-semibold text-neutral-700 mb-1">
                                        Apartment, Unit, Building <span class="text-neutral-400 font-normal">(optional)</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        id="apt" 
                                        name="apt" 
                                        placeholder="Apartment, suite, unit, floor, etc." 
                                        class="w-full bg-white border border-[#DDD6C8] rounded-lg px-3.5 py-2.5 text-xs text-neutral-900 focus:outline-none focus:ring-1 focus:ring-[var(--gold)] focus:border-[var(--gold)] transition"
                                    >
                                </div>

                                <!-- City / Town & Postal Code -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label for="city" class="block text-xs font-semibold text-neutral-700 mb-1">
                                            City / Town <span class="text-red-500">*</span>
                                        </label>
                                        <input 
                                            type="text" 
                                            id="city" 
                                            name="city" 
                                            required 
                                            value="Port of Spain" 
                                            placeholder="City or Town" 
                                            class="w-full bg-white border border-[#DDD6C8] rounded-lg px-3.5 py-2.5 text-xs text-neutral-900 focus:outline-none focus:ring-1 focus:ring-[var(--gold)] focus:border-[var(--gold)] transition"
                                        >
                                    </div>
                                    <div>
                                        <label for="postalCode" class="block text-xs font-semibold text-neutral-700 mb-1">
                                            Postal Code <span class="text-neutral-400 font-normal">(optional)</span>
                                        </label>
                                        <input 
                                            type="text" 
                                            id="postalCode" 
                                            name="postalCode" 
                                            placeholder="Postal Code" 
                                            class="w-full bg-white border border-[#DDD6C8] rounded-lg px-3.5 py-2.5 text-xs text-neutral-900 focus:outline-none focus:ring-1 focus:ring-[var(--gold)] focus:border-[var(--gold)] transition"
                                        >
                                    </div>
                                </div>

                                <!-- Phone Number -->
                                <div>
                                    <label for="phone" class="block text-xs font-semibold text-neutral-700 mb-1">
                                        Phone Number <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        type="tel" 
                                        id="phone" 
                                        name="phone" 
                                        required 
                                        value="<?= htmlspecialchars($userPhone) ?>" 
                                        placeholder="(868) 000-0000" 
                                        class="w-full bg-white border border-[#DDD6C8] rounded-lg px-3.5 py-2.5 text-xs text-neutral-900 focus:outline-none focus:ring-1 focus:ring-[var(--gold)] focus:border-[var(--gold)] transition"
                                    >
                                    <p class="text-[11px] text-neutral-500 mt-1">
                                        Phone number will be used for delivery communication and courier dispatch.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- ============================================== -->
                        <!-- SECTION 7: 3. DELIVERY METHOD                  -->
                        <!-- ============================================== -->
                        <div class="bg-white border border-[#E8E2D5] rounded-xl p-6 shadow-sm">
                            <h2 class="text-base font-bold font-oswald text-[#111111] uppercase tracking-wide flex items-center gap-2 mb-4">
                                <span class="w-6 h-6 rounded-full bg-[#111111] text-[var(--gold)] border border-[var(--gold)]/40 text-xs flex items-center justify-center font-bold">3</span>
                                Delivery Method
                            </h2>

                            <div class="space-y-3">
                                <!-- Island Delivery Option -->
                                <label 
                                    id="option-delivery" 
                                    class="delivery-radio-card flex items-center justify-between p-4 border-2 border-[var(--gold)] rounded-lg bg-[#FFFDF7] cursor-pointer transition select-none shadow-sm"
                                >
                                    <div class="flex items-center gap-3">
                                        <input 
                                            type="radio" 
                                            name="delivery_selection" 
                                            value="delivery" 
                                            checked 
                                            class="w-4 h-4 text-[var(--gold)] accent-[var(--gold)] focus:ring-[var(--gold)]"
                                            onchange="setDeliveryMethod('delivery')"
                                        >
                                        <div>
                                            <span class="block text-xs font-bold text-neutral-900">Island Delivery</span>
                                            <span class="block text-[11px] text-neutral-600">Standard courier delivery within Trinidad & Tobago (2-3 business days).</span>
                                        </div>
                                    </div>
                                    <span class="text-xs font-bold text-neutral-900 font-oswald">$15.00</span>
                                </label>

                                <!-- Brewery Taproom Pickup Option -->
                                <label 
                                    id="option-pickup" 
                                    class="delivery-radio-card flex items-center justify-between p-4 border border-[#E8E2D5] rounded-lg hover:border-neutral-400 cursor-pointer transition select-none"
                                >
                                    <div class="flex items-center gap-3">
                                        <input 
                                            type="radio" 
                                            name="delivery_selection" 
                                            value="pickup" 
                                            class="w-4 h-4 text-[var(--gold)] accent-[var(--gold)] focus:ring-[var(--gold)]"
                                            onchange="setDeliveryMethod('pickup')"
                                        >
                                        <div>
                                            <span class="block text-xs font-bold text-neutral-900">Brewery Taproom Pickup</span>
                                            <span class="block text-[11px] text-neutral-600">Collect your order directly from the brewery / taproom in Couva.</span>
                                        </div>
                                    </div>
                                    <span class="text-xs font-bold text-[#805500] font-oswald uppercase">Free</span>
                                </label>
                            </div>

                            <!-- Pickup Details Box (conditionally displayed) -->
                            <div id="pickup-details-box" class="hidden mt-4 p-4 rounded-lg bg-[#FAF7F0] border border-[#E8E2D5] text-xs">
                                <div class="flex items-start gap-2.5">
                                    <i data-lucide="map-pin" class="w-4 h-4 text-[var(--gold)] shrink-0 mt-0.5"></i>
                                    <div>
                                        <h4 class="font-bold text-neutral-900 uppercase font-oswald text-[11px] tracking-wide">Pickup Location</h4>
                                        <p class="text-neutral-900 font-semibold">Jeff Brewery Taproom</p>
                                        <p class="text-neutral-600 text-[11px]">Point Lisas Industrial Estate, Couva, Trinidad</p>
                                    </div>
                                </div>
                                <div class="mt-3 pt-3 border-t border-[#E8E2D5] text-[11px] text-neutral-600">
                                    <span class="font-bold text-neutral-900 block mb-0.5">Pickup Instructions:</span>
                                    Your order will be fresh-chilled and marked ready for collection. Taproom collection hours: Wednesday through Sunday, 12:00 PM – 10:00 PM. Please present your Order ID at the liming counter.
                                </div>
                            </div>
                        </div>

                        <!-- ============================================== -->
                        <!-- SECTION 8 & 9: 4. PAYMENT                      -->
                        <!-- ============================================== -->
                        <div class="bg-white border border-[#E8E2D5] rounded-xl p-6 shadow-sm">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-4">
                                <h2 class="text-base font-bold font-oswald text-[#111111] uppercase tracking-wide flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-full bg-[#111111] text-[var(--gold)] border border-[var(--gold)]/40 text-xs flex items-center justify-center font-bold">4</span>
                                    Payment
                                </h2>
                                <div class="flex items-center gap-2 text-neutral-500 text-xs">
                                    <span class="text-[11px] font-semibold text-neutral-600">Accepted:</span>
                                    <span class="font-bold text-[10px] px-1.5 py-0.5 bg-neutral-100 rounded border border-[#E8E2D5] text-neutral-800">VISA</span>
                                    <span class="font-bold text-[10px] px-1.5 py-0.5 bg-neutral-100 rounded border border-[#E8E2D5] text-neutral-800">MC</span>
                                    <span class="font-bold text-[10px] px-1.5 py-0.5 bg-neutral-100 rounded border border-[#E8E2D5] text-neutral-800">AMEX</span>
                                </div>
                            </div>

                            <p class="text-xs text-neutral-500 mb-4">
                                All transactions are secure, encrypted, and processed in Trinidad & Tobago Dollars (TTD).
                            </p>

                            <!-- Payment Method Selection Tabs -->
                            <div class="space-y-3 mb-5">
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 text-xs">
                                    <label class="pay-method-tab flex items-center justify-center p-2.5 border-2 border-[var(--gold)] rounded-lg bg-[#FFFDF7] cursor-pointer font-bold text-neutral-900 text-center select-none shadow-sm" onclick="setPaymentMethod('card')">
                                        <input type="radio" name="pay_type" value="card" checked class="sr-only">
                                        <span>💳 Credit Card</span>
                                    </label>
                                    <label class="pay-method-tab flex items-center justify-center p-2.5 border border-[#E8E2D5] rounded-lg hover:border-neutral-400 cursor-pointer font-medium text-neutral-700 text-center select-none" onclick="setPaymentMethod('apple')">
                                        <input type="radio" name="pay_type" value="apple" class="sr-only">
                                        <span> Apple Pay</span>
                                    </label>
                                    <label class="pay-method-tab flex items-center justify-center p-2.5 border border-[#E8E2D5] rounded-lg hover:border-neutral-400 cursor-pointer font-medium text-neutral-700 text-center select-none" onclick="setPaymentMethod('google')">
                                        <input type="radio" name="pay_type" value="google" class="sr-only">
                                        <span>G Pay</span>
                                    </label>
                                    <label class="pay-method-tab flex items-center justify-center p-2.5 border border-[#E8E2D5] rounded-lg hover:border-neutral-400 cursor-pointer font-medium text-neutral-700 text-center select-none" onclick="setPaymentMethod('paypal')">
                                        <input type="radio" name="pay_type" value="paypal" class="sr-only">
                                        <span>PayPal</span>
                                    </label>
                                </div>
                            </div>

                            <!-- CARD FIELDS (Section 9) -->
                            <div id="card-fields-container" class="space-y-4 bg-[#FAF7F0] p-4 sm:p-5 rounded-lg border border-[#E8E2D5]">
                                <div>
                                    <label for="cardNumber" class="block text-xs font-semibold text-neutral-700 mb-1">
                                        Card Number <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <input 
                                            type="text" 
                                            id="cardNumber" 
                                            name="cardNumber" 
                                            required 
                                            maxlength="19" 
                                            value="4242 •••• •••• 4242" 
                                            placeholder="Card number" 
                                            class="w-full bg-white border border-[#DDD6C8] rounded-lg pl-9 pr-3.5 py-2.5 text-xs text-neutral-900 focus:outline-none focus:ring-1 focus:ring-[var(--gold)] focus:border-[var(--gold)] font-mono transition"
                                        >
                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-neutral-400">
                                            <i data-lucide="credit-card" class="w-4 h-4"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="cardExpiry" class="block text-xs font-semibold text-neutral-700 mb-1">
                                            Expiration Date <span class="text-red-500">*</span>
                                        </label>
                                        <input 
                                            type="text" 
                                            id="cardExpiry" 
                                            name="cardExpiry" 
                                            required 
                                            maxlength="5" 
                                            value="12/28" 
                                            placeholder="MM / YY" 
                                            class="w-full bg-white border border-[#DDD6C8] rounded-lg px-3.5 py-2.5 text-xs text-neutral-900 focus:outline-none focus:ring-1 focus:ring-[var(--gold)] focus:border-[var(--gold)] font-mono transition text-center"
                                        >
                                    </div>
                                    <div>
                                        <label for="cardCvc" class="block text-xs font-semibold text-neutral-700 mb-1 flex items-center justify-between">
                                            <span>Security Code <span class="text-red-500">*</span></span>
                                            <span class="text-[10px] text-neutral-400 font-normal">CVC / CVV</span>
                                        </label>
                                        <div class="relative">
                                            <input 
                                                type="text" 
                                                id="cardCvc" 
                                                name="cardCvc" 
                                                required 
                                                maxlength="4" 
                                                value="868" 
                                                placeholder="CVC" 
                                                class="w-full bg-white border border-[#DDD6C8] rounded-lg px-3.5 py-2.5 text-xs text-neutral-900 focus:outline-none focus:ring-1 focus:ring-[var(--gold)] focus:border-[var(--gold)] font-mono transition text-center"
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label for="cardName" class="block text-xs font-semibold text-neutral-700 mb-1">
                                        Name on Card <span class="text-red-500">*</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        id="cardName" 
                                        name="cardName" 
                                        required 
                                        value="<?= htmlspecialchars($userName) ?>" 
                                        placeholder="Full name as shown on card" 
                                        class="w-full bg-white border border-[#DDD6C8] rounded-lg px-3.5 py-2.5 text-xs text-neutral-900 focus:outline-none focus:ring-1 focus:ring-[var(--gold)] focus:border-[var(--gold)] transition"
                                    >
                                </div>
                            </div>

                            <!-- ALT PAYMENT NOTICE (for Apple / Google / PayPal) -->
                            <div id="alt-payment-notice" class="hidden p-4 rounded-lg bg-[#FAF7F0] border border-[#E8E2D5] text-xs text-neutral-700">
                                <p>You will be redirected to complete your payment securely with <span id="alt-pay-provider" class="font-bold">Apple Pay</span> upon placing the order.</p>
                            </div>

                            <!-- SECTION 10: PAYMENT SECURITY -->
                            <div class="mt-4 pt-3 flex items-start gap-2 text-[11px] text-neutral-500">
                                <i data-lucide="lock" class="w-3.5 h-3.5 text-emerald-600 shrink-0 mt-0.5"></i>
                                <div>
                                    <strong class="text-neutral-800 font-semibold">Secure Payment:</strong>
                                    Your payment information is encrypted with bank-grade 256-bit SSL and securely processed. Jeff Brewery does not store complete card details on its servers.
                                </div>
                            </div>
                        </div>

                        <!-- ============================================== -->
                        <!-- SECTION 16: PLACE ORDER CTA                    -->
                        <!-- ============================================== -->
                        <div class="space-y-3 pt-2">
                            <button 
                                type="submit" 
                                id="btn-place-order" 
                                class="w-full bg-[#111111] hover:bg-black text-[var(--gold)] border-2 border-[var(--gold)]/60 hover:border-[var(--gold)] font-bold py-4 px-6 rounded-lg text-sm uppercase tracking-wider font-oswald shadow-md hover:shadow-xl transition-all flex items-center justify-center gap-2 cursor-pointer"
                            >
                                <i data-lucide="shield-check" class="w-4 h-4 text-[var(--gold)]"></i>
                                <span id="place-order-text">PLACE ORDER — $<?= number_format($cartTotal + $defaultShipping, 2) ?> TTD</span>
                            </button>

                            <!-- SECTION 17: LEGAL / PROTECTION NOTICE -->
                            <p class="text-[11px] text-neutral-500 text-center leading-relaxed">
                                By placing your order, you agree to the Jeff Brewery 
                                <a href="?route=terms" target="_blank" class="underline hover:text-[var(--rust)]">Terms of Service</a> 
                                and acknowledge the applicable 
                                <a href="?route=refund" target="_blank" class="underline hover:text-[var(--rust)]">Refund Policy</a> 
                                and 
                                <a href="?route=privacy" target="_blank" class="underline hover:text-[var(--rust)]">Privacy Policy</a>.
                            </p>
                        </div>

                        <!-- SECTION 18: CHECKOUT TRUST INDICATORS -->
                        <div class="pt-6 border-t border-[#E8E2D5]">
                            <div class="flex flex-wrap items-center justify-center gap-4 sm:gap-8 text-neutral-500 text-xs">
                                <div class="flex items-center gap-1.5">
                                    <i data-lucide="lock" class="w-3.5 h-3.5 text-[var(--gold)]"></i>
                                    <span class="font-medium text-neutral-800">Secure Checkout</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <i data-lucide="shield" class="w-3.5 h-3.5 text-blue-600"></i>
                                    <span class="font-medium text-neutral-800">Encrypted Payment</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <i data-lucide="check-circle-2" class="w-3.5 h-3.5 text-[var(--rust)]"></i>
                                    <span class="font-medium text-neutral-800">Safe &amp; Secure Processing</span>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

                <!-- ============================================== -->
                <!-- RIGHT COLUMN: STICKY ORDER SUMMARY (Section 11)-->
                <!-- Desktop 40% -> col-span-5                      -->
                <!-- ============================================== -->
                <div class="lg:col-span-5 hidden lg:block sticky top-24">
                    <div class="bg-white border border-[#E8E2D5] rounded-xl p-6 shadow-sm space-y-6">
                        
                        <!-- Header -->
                        <div class="flex items-center justify-between pb-4 border-b border-[#E8E2D5]">
                            <h3 class="font-bold text-sm uppercase tracking-wider text-[#111111] font-oswald">Your Order</h3>
                            <span class="text-xs text-neutral-500"><?= $totalQty ?> <?= $totalQty === 1 ? 'item' : 'items' ?></span>
                        </div>

                        <!-- SECTION 11: PRODUCT LIST -->
                        <div class="space-y-4 max-h-[340px] overflow-y-auto pr-1">
                            <?php foreach ($cart as $item): ?>
                                <div class="flex items-center justify-between gap-3 text-xs">
                                    <div class="flex items-center gap-3">
                                        <div class="relative w-14 h-14 bg-[#FAF7F0] border border-[#E8E2D5] rounded-lg p-1 shrink-0 flex items-center justify-center">
                                            <img 
                                                src="<?= htmlspecialchars($item['image']) ?>" 
                                                alt="<?= htmlspecialchars($item['name']) ?>" 
                                                class="max-w-full max-h-full object-contain"
                                            >
                                            <span class="absolute -top-1.5 -right-1.5 bg-[#111111] text-[var(--gold)] border border-[var(--gold)]/40 rounded-full w-5 h-5 text-[10px] font-bold flex items-center justify-center shadow">
                                                <?= $item['quantity'] ?>
                                            </span>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-neutral-900 leading-snug"><?= htmlspecialchars($item['name']) ?></h4>
                                            <p class="text-[var(--rust)] font-semibold text-[11px]"><?= htmlspecialchars($item['style']) ?></p>
                                            <p class="text-neutral-400 text-[10px]">Qty: <?= $item['quantity'] ?> × $<?= number_format($item['price'], 2) ?></p>
                                        </div>
                                    </div>
                                    <span class="font-bold text-neutral-900 font-oswald text-sm">$<?= number_format($item['totalPrice'], 2) ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- SECTION 12: DISCOUNT / GIFT CARD -->
                        <div class="pt-4 border-t border-[#E8E2D5]">
                            <div class="flex gap-2">
                                <input 
                                    type="text" 
                                    id="discount-code-input" 
                                    placeholder="Discount or gift card" 
                                    class="flex-1 bg-white border border-[#DDD6C8] rounded-lg px-3.5 py-2 text-xs uppercase text-neutral-900 focus:outline-none focus:ring-1 focus:ring-[var(--gold)] focus:border-[var(--gold)] transition"
                                >
                                <button 
                                    type="button" 
                                    onclick="applyPromoCode()" 
                                    class="bg-[#111111] hover:bg-black text-[var(--gold)] text-xs font-bold uppercase tracking-wider px-4 py-2 rounded-lg border border-[var(--gold)]/30 hover:border-[var(--gold)] transition shadow-sm font-oswald cursor-pointer"
                                >
                                    Apply
                                </button>
                            </div>
                            <div id="discount-feedback" class="text-[11px] mt-1.5 hidden"></div>
                        </div>

                        <!-- SECTION 14: KREWE INTEGRATION -->
                        <div class="p-4 rounded-lg bg-[#FFF9EE] border border-[#E8D7B0] text-xs">
                            <div class="flex items-center justify-between mb-1.5">
                                <div class="flex items-center gap-1.5 font-bold text-[#805500] font-oswald uppercase tracking-wider text-[11px]">
                                    <span>👑</span>
                                    <span>The Krewe</span>
                                </div>
                                <span class="text-[11px] font-semibold text-[#805500] bg-[#FAF0D4] px-2 py-0.5 rounded border border-[#E5CA85]">
                                    <span id="display-krewe-points"><?= number_format($userPoints) ?></span> pts available
                                </span>
                            </div>
                            <p class="text-[11px] text-[#946200] mb-3">
                                Redeem 500 Krewe points to receive <strong>$5.00 off</strong> this order.
                            </p>
                            <button 
                                type="button" 
                                id="btn-krewe-redeem" 
                                onclick="toggleKrewePoints()" 
                                class="w-full py-2 px-3 bg-[var(--gold)] hover:bg-[#B8860B] text-black border border-[var(--gold)] rounded-lg font-bold text-xs uppercase tracking-wider transition shadow-sm font-oswald cursor-pointer"
                            >
                                Apply 500 Points
                            </button>
                        </div>

                        <!-- SECTION 13: PRICE BREAKDOWN -->
                        <div class="pt-4 border-t border-[#E8E2D5] space-y-2 text-xs text-neutral-600">
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span class="text-neutral-900 font-medium">$<?= number_format($cartTotal, 2) ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span>Shipping</span>
                                <span id="desktop-shipping-display" class="text-neutral-900 font-medium">$<?= number_format($defaultShipping, 2) ?></span>
                            </div>
                            
                            <!-- Promo Discount Row -->
                            <div id="desktop-promo-row" class="flex justify-between text-[#805500] font-semibold hidden">
                                <span id="desktop-promo-label">Discount Code</span>
                                <span id="desktop-promo-amount">-$0.00</span>
                            </div>

                            <!-- Krewe Discount Row -->
                            <div id="desktop-krewe-row" class="flex justify-between text-[#805500] font-semibold hidden">
                                <span>Krewe Points Discount</span>
                                <span>-$5.00</span>
                            </div>

                            <!-- Total -->
                            <div class="pt-3 border-t border-[#E8E2D5] flex justify-between items-baseline">
                                <div>
                                    <span class="text-sm font-bold text-neutral-900 uppercase font-oswald tracking-wide">Total</span>
                                    <span class="text-[10px] text-neutral-400 block">Including local VAT</span>
                                </div>
                                <div class="text-right">
                                    <span class="text-xs text-neutral-500 mr-1">TTD</span>
                                    <span id="desktop-total-display" class="text-2xl font-bold font-oswald text-[#111111]">
                                        $<?= number_format($cartTotal + $defaultShipping, 2) ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- SECTION 15: LOYALTY REWARD NOTICE -->
                        <div class="pt-2 border-t border-[#E8E2D5] flex items-center justify-between text-[11px] text-neutral-600">
                            <div class="flex items-center gap-1.5">
                                <span>🏆</span>
                                <span class="font-medium text-neutral-800">The Krewe</span>
                            </div>
                            <span class="text-[#805500] font-bold">Earn +50 Points from this order</span>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ============================================== -->
    <!-- INTERACTIVE CHECKOUT SCRIPT (JS)               -->
    <!-- ============================================== -->
    <script>
        const CART_SUBTOTAL = <?= (float)$cartTotal ?>;
        let shippingFee = <?= (float)$defaultShipping ?>;
        let promoDiscount = 0;
        let kreweDiscount = 0;
        let isKreweApplied = false;
        let initialUserPoints = <?= (int)$userPoints ?>;

        function calculateTotal() {
            const total = Math.max(0, CART_SUBTOTAL + shippingFee - promoDiscount - kreweDiscount);
            return total;
        }

        function updateCheckoutUI() {
            const total = calculateTotal();
            const totalFormatted = '$' + total.toFixed(2);
            const totalWithCurrency = totalFormatted + ' TTD';

            // Place Order Button text (Section 16)
            const btnPlaceOrderText = document.getElementById('place-order-text');
            if (btnPlaceOrderText) {
                btnPlaceOrderText.innerText = 'PLACE ORDER — ' + totalWithCurrency;
            }

            // Desktop Total
            const desktopTotal = document.getElementById('desktop-total-display');
            if (desktopTotal) {
                desktopTotal.innerText = totalFormatted;
            }

            // Desktop Shipping
            const desktopShipping = document.getElementById('desktop-shipping-display');
            if (desktopShipping) {
                desktopShipping.innerText = shippingFee === 0 ? 'Free' : '$' + shippingFee.toFixed(2);
            }

            // Mobile Header Total & sticky
            const mobileStickyTotal = document.getElementById('mobile-sticky-total');
            if (mobileStickyTotal) {
                mobileStickyTotal.innerText = totalWithCurrency;
            }
            const mobileTotal = document.getElementById('mobile-total-display');
            if (mobileTotal) {
                mobileTotal.innerText = totalWithCurrency;
            }
            const mobileShipping = document.getElementById('mobile-shipping-display');
            if (mobileShipping) {
                mobileShipping.innerText = shippingFee === 0 ? 'Free' : '$' + shippingFee.toFixed(2);
            }

            // Mobile Discount Row
            const mobileDiscountRow = document.getElementById('mobile-discount-row');
            const mobileDiscountDisplay = document.getElementById('mobile-discount-display');
            const totalDiscount = promoDiscount + kreweDiscount;
            if (mobileDiscountRow && mobileDiscountDisplay) {
                if (totalDiscount > 0) {
                    mobileDiscountRow.classList.remove('hidden');
                    mobileDiscountDisplay.innerText = '-$' + totalDiscount.toFixed(2);
                } else {
                    mobileDiscountRow.classList.add('hidden');
                }
            }

            // Form hidden field
            const formDiscount = document.getElementById('form-applied-discount');
            if (formDiscount) {
                formDiscount.value = totalDiscount.toFixed(2);
            }
        }

        // Section 7: Delivery Method Switcher
        function setDeliveryMethod(method) {
            const formDelivery = document.getElementById('form-delivery-method');
            const cardDelivery = document.getElementById('option-delivery');
            const cardPickup = document.getElementById('option-pickup');
            const pickupBox = document.getElementById('pickup-details-box');

            if (method === 'pickup') {
                shippingFee = 0;
                if (formDelivery) formDelivery.value = 'pickup';
                
                if (cardPickup) {
                    cardPickup.classList.add('border-2', 'border-[var(--gold)]', 'bg-[#FFFDF7]', 'shadow-sm');
                    cardPickup.classList.remove('border-[#E8E2D5]');
                }
                if (cardDelivery) {
                    cardDelivery.classList.remove('border-2', 'border-[var(--gold)]', 'bg-[#FFFDF7]', 'shadow-sm');
                    cardDelivery.classList.add('border-[#E8E2D5]');
                }
                if (pickupBox) pickupBox.classList.remove('hidden');
            } else {
                shippingFee = 15.00;
                if (formDelivery) formDelivery.value = 'delivery';
                
                if (cardDelivery) {
                    cardDelivery.classList.add('border-2', 'border-[var(--gold)]', 'bg-[#FFFDF7]', 'shadow-sm');
                    cardDelivery.classList.remove('border-[#E8E2D5]');
                }
                if (cardPickup) {
                    cardPickup.classList.remove('border-2', 'border-[var(--gold)]', 'bg-[#FFFDF7]', 'shadow-sm');
                    cardPickup.classList.add('border-[#E8E2D5]');
                }
                if (pickupBox) pickupBox.classList.add('hidden');
            }

            updateCheckoutUI();
        }

        // Section 8: Payment Method Switcher
        function setPaymentMethod(method) {
            const formPayment = document.getElementById('form-payment-method');
            if (formPayment) formPayment.value = method;

            const cardFields = document.getElementById('card-fields-container');
            const altNotice = document.getElementById('alt-payment-notice');
            const altProvider = document.getElementById('alt-pay-provider');

            // Update tab styles
            document.querySelectorAll('.pay-method-tab').forEach(tab => {
                const radio = tab.querySelector('input[type="radio"]');
                if (radio && radio.value === method) {
                    tab.classList.add('border-2', 'border-[var(--gold)]', 'bg-[#FFFDF7]', 'font-bold', 'text-neutral-900', 'shadow-sm');
                    tab.classList.remove('border-[#E8E2D5]', 'text-neutral-700');
                } else {
                    tab.classList.remove('border-2', 'border-[var(--gold)]', 'bg-[#FFFDF7]', 'font-bold', 'text-neutral-900', 'shadow-sm');
                    tab.classList.add('border-[#E8E2D5]', 'text-neutral-700');
                }
            });

            if (method === 'card') {
                if (cardFields) cardFields.classList.remove('hidden');
                if (altNotice) altNotice.classList.add('hidden');
            } else {
                if (cardFields) cardFields.classList.add('hidden');
                if (altNotice) {
                    altNotice.classList.remove('hidden');
                    if (altProvider) {
                        if (method === 'apple') altProvider.innerText = 'Apple Pay';
                        else if (method === 'google') altProvider.innerText = 'Google Pay';
                        else if (method === 'paypal') altProvider.innerText = 'PayPal';
                    }
                }
            }
        }

        // Section 4: Simulate Express Pay
        function simulateExpressPay(provider) {
            setPaymentMethod(provider.toLowerCase().replace(' ', ''));
            const placeOrderBtn = document.getElementById('btn-place-order');
            if (placeOrderBtn) {
                placeOrderBtn.scrollIntoView({ behavior: 'smooth' });
                placeOrderBtn.classList.add('ring-4', 'ring-[var(--gold)]');
                setTimeout(() => placeOrderBtn.classList.remove('ring-4', 'ring-[var(--gold)]'), 1500);
            }
        }

        // Section 12: Promo Code Application
        function applyPromoCode() {
            const input = document.getElementById('discount-code-input');
            const feedback = document.getElementById('discount-feedback');
            const promoRow = document.getElementById('desktop-promo-row');
            const promoLabel = document.getElementById('desktop-promo-label');
            const promoAmount = document.getElementById('desktop-promo-amount');

            if (!input || !feedback) return;
            const code = input.value.trim().toUpperCase();

            if (!code) {
                feedback.className = 'text-[11px] mt-1.5 text-red-600 block';
                feedback.innerText = 'Please enter a valid discount code.';
                return;
            }

            if (code === 'LIME10') {
                promoDiscount = Number((CART_SUBTOTAL * 0.10).toFixed(2));
                feedback.className = 'text-[11px] mt-1.5 text-[#805500] font-bold block';
                feedback.innerText = '✓ Promo code LIME10 applied! 10% off entire order.';
                if (promoRow) promoRow.classList.remove('hidden');
                if (promoLabel) promoLabel.innerText = 'Promo (LIME10)';
                if (promoAmount) promoAmount.innerText = '-$' + promoDiscount.toFixed(2);
            } else if (code === 'KREWE5') {
                promoDiscount = 5.00;
                feedback.className = 'text-[11px] mt-1.5 text-[#805500] font-bold block';
                feedback.innerText = '✓ Promo code KREWE5 applied! $5.00 discount.';
                if (promoRow) promoRow.classList.remove('hidden');
                if (promoLabel) promoLabel.innerText = 'Promo (KREWE5)';
                if (promoAmount) promoAmount.innerText = '-$5.00';
            } else if (code === 'CARIBBEAN') {
                promoDiscount = 10.00;
                feedback.className = 'text-[11px] mt-1.5 text-[#805500] font-bold block';
                feedback.innerText = '✓ Promo code CARIBBEAN applied! $10.00 discount.';
                if (promoRow) promoRow.classList.remove('hidden');
                if (promoLabel) promoLabel.innerText = 'Promo (CARIBBEAN)';
                if (promoAmount) promoAmount.innerText = '-$10.00';
            } else {
                promoDiscount = 0;
                feedback.className = 'text-[11px] mt-1.5 text-red-600 block';
                feedback.innerText = 'Invalid discount or gift card code.';
                if (promoRow) promoRow.classList.add('hidden');
            }

            updateCheckoutUI();
        }

        // Section 14: Krewe Points Redemption
        function toggleKrewePoints() {
            const btn = document.getElementById('btn-krewe-redeem');
            const pointsDisplay = document.getElementById('display-krewe-points');
            const kreweRow = document.getElementById('desktop-krewe-row');

            if (!isKreweApplied) {
                if (initialUserPoints < 500) {
                    alert('You need at least 500 Krewe Points to redeem a discount.');
                    return;
                }
                kreweDiscount = 5.00;
                isKreweApplied = true;
                if (btn) {
                    btn.innerText = 'Remove 500 Points';
                    btn.classList.add('bg-neutral-800', 'text-[var(--gold)]');
                    btn.classList.remove('bg-[var(--gold)]', 'text-black');
                }
                if (pointsDisplay) {
                    pointsDisplay.innerText = (initialUserPoints - 500).toLocaleString();
                }
                if (kreweRow) kreweRow.classList.remove('hidden');
            } else {
                kreweDiscount = 0;
                isKreweApplied = false;
                if (btn) {
                    btn.innerText = 'Apply 500 Points';
                    btn.classList.remove('bg-neutral-800', 'text-[var(--gold)]');
                    btn.classList.add('bg-[var(--gold)]', 'text-black');
                }
                if (pointsDisplay) {
                    pointsDisplay.innerText = initialUserPoints.toLocaleString();
                }
                if (kreweRow) kreweRow.classList.add('hidden');
            }

            updateCheckoutUI();
        }

        // Section 21: Mobile Collapsible Summary
        document.addEventListener('DOMContentLoaded', () => {
            const mobileToggle = document.getElementById('mobile-summary-toggle');
            const mobileContent = document.getElementById('mobile-summary-content');
            const mobileArrow = document.getElementById('mobile-summary-arrow');
            const mobileLabel = document.getElementById('mobile-summary-label');

            if (mobileToggle && mobileContent) {
                mobileToggle.addEventListener('click', () => {
                    const isHidden = mobileContent.classList.contains('hidden');
                    if (isHidden) {
                        mobileContent.classList.remove('hidden');
                        if (mobileArrow) mobileArrow.classList.add('rotate-180');
                        if (mobileLabel) mobileLabel.innerText = 'Hide Order Summary';
                    } else {
                        mobileContent.classList.add('hidden');
                        if (mobileArrow) mobileArrow.classList.remove('rotate-180');
                        if (mobileLabel) mobileLabel.innerText = 'Show Order Summary (<?= $totalQty ?>)';
                    }
                });
            }

            // Ensure Lucide icons render
            if (window.lucide) {
                lucide.createIcons();
            }
        });
    </script>
<?php endif; ?>
