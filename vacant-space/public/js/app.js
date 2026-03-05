document.addEventListener('DOMContentLoaded', () => {
    // Initialize Lucide Icons
    lucide.createIcons();

    // --- Age Gate Logic ---
    const ageGate = document.getElementById('age-gate');
    const btnYes = document.getElementById('btn-yes');
    const btnNo = document.getElementById('btn-no');
    const ageError = document.getElementById('age-error');

    // Check session storage first (simulating short-term trust for demo)
    if (!sessionStorage.getItem('ageVerified')) {
        ageGate.classList.remove('hidden');
    }

    if (btnYes) {
        btnYes.addEventListener('click', () => {
            sessionStorage.setItem('ageVerified', 'true');
            ageGate.classList.add('hidden');
            ageError.classList.add('hidden');
        });
    }

    if (btnNo) {
        btnNo.addEventListener('click', () => {
            ageError.classList.remove('hidden');
            // Usually we'd redirect to google.com or something here
        });
    }

    // --- Cart Drawer Logic ---
    const cartToggles = document.querySelectorAll('.cart-toggle');
    const cartClose = document.getElementById('cart-close');
    const cartDrawer = document.getElementById('cart-drawer');
    const cartPanel = document.getElementById('cart-panel');
    const cartBackdrop = document.getElementById('cart-backdrop');

    function updateCartCountUI(count) {
        document.querySelectorAll('.cart-count').forEach(badge => {
            badge.innerText = count;
            if (count > 0) {
                badge.classList.remove('hidden');
                badge.classList.add('animate-bounce');
                // Remove animation class after a bit so it can bounce again on next add if needed
                setTimeout(() => badge.classList.remove('animate-bounce'), 1000);
            } else {
                badge.classList.add('hidden');
            }
        });
        document.querySelectorAll('.cart-count-text').forEach(txt => {
            txt.innerText = count;
        });
    }

    function openCart() {
        cartDrawer.classList.remove('hidden');
        // Small delay to allow display:block to apply before animating transform
        setTimeout(() => {
            cartBackdrop.classList.remove('opacity-0');
            cartBackdrop.classList.add('opacity-100');
            cartPanel.classList.remove('translate-x-full');
            cartPanel.classList.add('translate-x-0');
        }, 10);
        // Load cart items (to be implemented via AJAX)
        loadCartItems();
    }

    function closeCart() {
        cartBackdrop.classList.remove('opacity-100');
        cartBackdrop.classList.add('opacity-0');
        cartPanel.classList.remove('translate-x-0');
        cartPanel.classList.add('translate-x-full');

        // Wait for animation to finish before hiding
        setTimeout(() => {
            cartDrawer.classList.add('hidden');
        }, 300);
    }

    cartToggles.forEach(toggle => {
        toggle.addEventListener('click', openCart);
    });
    if (cartClose) cartClose.addEventListener('click', closeCart);
    if (cartBackdrop) cartBackdrop.addEventListener('click', closeCart);

    // --- Chatbot Logic ---
    const chatbotToggle = document.getElementById('chatbot-toggle');
    const chatbotClose = document.getElementById('chatbot-close');
    const chatbotWindow = document.getElementById('chatbot-window');
    const chatInput = document.getElementById('chat-input');
    const chatSend = document.getElementById('chat-send');
    const chatMessages = document.getElementById('chat-messages');

    if (chatbotToggle && chatbotWindow && chatbotClose) {
        chatbotToggle.addEventListener('click', () => {
            chatbotWindow.classList.toggle('hidden');
            chatbotWindow.classList.toggle('flex');
            if (!chatbotWindow.classList.contains('hidden')) {
                chatInput.focus();
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
        });

        chatbotClose.addEventListener('click', () => {
            chatbotWindow.classList.add('hidden');
            chatbotWindow.classList.remove('flex');
        });

        function addMessage(text, isBot = false) {
            const div = document.createElement('div');
            div.className = `flex gap-2 max-w-[85%] ${isBot ? '' : 'self-end'}`;
            div.innerHTML = `
                <div class="${isBot ? 'bg-gray-200 text-gray-800 rounded-tl-sm' : 'bg-jeff-teal text-white rounded-tr-sm'} py-2 px-4 rounded-2xl text-sm shadow-sm inline-block">
                    ${text}
                </div>
            `;
            chatMessages.appendChild(div);
            // Hide typing indicator if passing bot message
            const typing = document.getElementById('typing-indicator');
            if (typing) typing.remove();

            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function showTyping() {
            const div = document.createElement('div');
            div.id = 'typing-indicator';
            div.className = 'flex gap-2 max-w-[85%]';
            div.innerHTML = `
                <div class="bg-gray-200 text-gray-800 py-2 px-4 rounded-2xl rounded-tl-sm text-sm shadow-sm flex items-center gap-1">
                    <div class="w-1.5 h-1.5 bg-gray-500 rounded-full animate-bounce"></div>
                    <div class="w-1.5 h-1.5 bg-gray-500 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                    <div class="w-1.5 h-1.5 bg-gray-500 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
                </div>
            `;
            chatMessages.appendChild(div);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function sendMessage() {
            const text = chatInput.value.trim();
            if (!text) return;

            addMessage(text, false);
            chatInput.value = '';
            showTyping();

            fetch('?route=chatbot/ask', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message: text })
            })
                .then(res => res.json())
                .then(data => {
                    if (data.reply) {
                        addMessage(data.reply, true);
                    } else if (data.error) {
                        addMessage("Oops: " + data.error, true);
                    }
                })
                .catch(err => {
                    addMessage("I'm having trouble connecting right now.", true);
                });
        }

        chatSend.addEventListener('click', sendMessage);
        chatInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') sendMessage();
        });
    }

    // --- AJAX Cart Logic ---
    function loadCartItems() {
        const container = document.getElementById('cart-items-container');
        const subtotalEl = document.getElementById('cart-subtotal');
        const cartFooter = document.getElementById('cart-footer');

        if (!container) return;

        container.innerHTML = '<div class="flex items-center justify-center p-8"><div class="animate-spin rounded-full h-8 w-8 border-b-2 border-jeff-teal"></div></div>';

        fetch('?route=cart/get')
            .then(res => res.json())
            .then(data => {
                if (data.count === 0) {
                    if (cartFooter) cartFooter.classList.add('hidden');
                    container.innerHTML = `
                        <div class="flex flex-col items-center justify-center h-full text-gray-500 py-12">
                            <i data-lucide="shopping-cart" class="w-16 h-16 mb-4 text-gray-300"></i>
                            <p class="font-light text-lg">Your cart looks thirsty.</p>
                            <a href="?route=shop" class="mt-4 text-jeff-orange font-bold hover:underline" onclick="closeCart()">Start Shopping</a>
                        </div>
                    `;
                    subtotalEl.innerText = '$0.00';
                    updateCartCountUI(0);
                } else {
                    if (cartFooter) cartFooter.classList.remove('hidden');
                    let html = '<ul class="divide-y divide-gray-100">';
                    data.items.forEach(item => {
                        html += `
                            <li class="py-6 flex">
                                <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-lg border border-gray-100 p-2 bg-gray-50 flex items-center justify-center">
                                    <img src="${item.image}" alt="${item.name}" class="h-full w-full object-contain filter drop-shadow-md" />
                                </div>
                                <div class="ml-4 flex-1 flex flex-col">
                                    <div>
                                        <div class="flex justify-between text-base font-bold text-neutral-900">
                                            <h3 class="font-oswald uppercase text-lg">${item.name}</h3>
                                            <p class="ml-4 text-jeff-orange">$${item.totalPrice}</p>
                                        </div>
                                    </div>
                                    <div class="flex-1 flex items-end justify-between text-sm mt-4">
                                        <div class="flex items-center border border-gray-200 rounded-md">
                                            <button class="update-qty-btn p-2 hover:bg-gray-100 transition-colors" data-id="${item.id}" data-action="decrease" data-qty="${item.qty}">
                                                <i data-lucide="minus" class="h-3 w-3"></i>
                                            </button>
                                            <span class="px-3 font-semibold text-neutral-900">${item.qty}</span>
                                            <button class="update-qty-btn p-2 hover:bg-gray-100 transition-colors" data-id="${item.id}" data-action="increase" data-qty="${item.qty}">
                                                <i data-lucide="plus" class="h-3 w-3"></i>
                                            </button>
                                        </div>
                                        <button type="button" class="font-medium text-red-500 hover:text-red-700 flex items-center transition remove-from-cart-btn" data-id="${item.id}">
                                            <i data-lucide="trash-2" class="h-4 w-4 mr-1"></i> Remove
                                        </button>
                                    </div>
                                </div>
                            </li>
                        `;
                    });
                    html += '</ul>';
                    container.innerHTML = html;
                    subtotalEl.innerText = '$' + data.subtotal;

                    updateCartCountUI(data.count);
                }
                lucide.createIcons();
                attachCartListeners();
            })
            .catch(err => {
                console.error('Error loading cart:', err);
                container.innerHTML = '<p class="text-trini-red text-center py-8 font-semibold">Failed to load cart.</p>';
            });
    }

    function attachCartListeners() {
        // Remove functionality
        document.querySelectorAll('.remove-from-cart-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.dataset.id;
                fetch('?route=cart/remove', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ id: id })
                })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            loadCartItems();
                        }
                    });
            });
        });

        // Quantity functionality
        document.querySelectorAll('.update-qty-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.dataset.id;
                const action = this.dataset.action;
                let currentQty = parseInt(this.dataset.qty, 10);

                let newQty = action === 'increase' ? currentQty + 1 : currentQty - 1;

                if (newQty < 1) newQty = 0; // The backend handles removing if 0

                fetch('?route=cart/update', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ id: id, qty: newQty })
                })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            loadCartItems();
                        }
                    });
            });
        });
    }

    // Add to cart buttons everywhere
    document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            const id = this.dataset.id;
            const qtyStr = this.dataset.qty || "1";
            const qty = parseInt(qtyStr, 10);

            // Visual feedback
            const originalText = this.innerHTML;
            this.innerHTML = '<i data-lucide="check" class="w-4 h-4"></i> Added';
            this.classList.add('bg-jeff-dark', 'scale-95');
            setTimeout(() => {
                this.innerHTML = originalText;
                this.classList.remove('bg-jeff-dark', 'scale-95');
                lucide.createIcons();
            }, 1000);

            fetch('?route=cart/add', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: id, qty: qty })
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        updateCartCountUI(data.count);
                    }
                })
                .catch(err => console.error('Error adding to cart:', err));
        });
    });

    // Toggle wishlist buttons everywhere
    document.querySelectorAll('.toggle-wishlist-btn').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            const id = this.dataset.id;

            // Visual bounce feedback
            this.classList.add('animate-bounce');
            setTimeout(() => this.classList.remove('animate-bounce'), 500);

            fetch('?route=user/toggleWishlist', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ item_id: id })
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        if (data.status === 'added') {
                            this.classList.remove('text-gray-300', 'hover:text-gray-400');
                            this.classList.add('text-trini-red');
                        } else {
                            this.classList.remove('text-trini-red');
                            this.classList.add('text-gray-300', 'hover:text-gray-400');
                        }
                    }
                })
                .catch(err => console.error('Error toggling wishlist:', err));
        });
    });
});
