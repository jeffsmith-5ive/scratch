document.addEventListener('DOMContentLoaded', () => {
    // Initialize Lucide Icons
    lucide.createIcons();

    // --- Age Gate Logic ---
    const ageGate = document.getElementById('age-gate');
    const btnYes = document.getElementById('btn-yes');
    const btnNo = document.getElementById('btn-no');

    // Check if user has already verified age using localStorage
    if (!localStorage.getItem('jeff-brewery-age-verified')) {
        ageGate.classList.remove('hidden');
    }

    if (btnYes) {
        btnYes.addEventListener('click', () => {
            localStorage.setItem('jeff-brewery-age-verified', 'true');
            ageGate.classList.add('hidden');
        });
    }

    if (btnNo) {
        btnNo.addEventListener('click', () => {
            window.location.href = 'https://www.google.com';
        });
    }

    // --- Navigation Dropdown & Mobile Menu Logic ---
    const dropdownToggles = document.querySelectorAll('.nav-dropdown-toggle');
    const dropdownMenus = document.querySelectorAll('.nav-dropdown-menu');
    const mobileDropdownToggles = document.querySelectorAll('.mobile-dropdown-toggle');
    const mobileMenuToggleBtn = document.getElementById('mobile-menu-toggle-btn');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileMenuIconOpen = document.getElementById('mobile-menu-icon-open');
    const mobileMenuIconClose = document.getElementById('mobile-menu-icon-close');

    // Desktop Dropdowns
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', (e) => {
            e.stopPropagation();
            const dropdownId = 'dropdown-' + toggle.dataset.dropdown;
            const targetMenu = document.getElementById(dropdownId);
            const arrow = toggle.querySelector('.dropdown-arrow');

            // Close other desktop dropdowns
            dropdownMenus.forEach(menu => {
                if (menu.id !== dropdownId) {
                    menu.classList.add('hidden');
                    const otherToggle = document.querySelector(`[data-dropdown="${menu.id.replace('dropdown-', '')}"]`);
                    if (otherToggle) {
                        const otherArrow = otherToggle.querySelector('.dropdown-arrow');
                        if (otherArrow) otherArrow.classList.remove('rotate-180');
                    }
                }
            });

            // Toggle target
            if (targetMenu) {
                const isHidden = targetMenu.classList.contains('hidden');
                if (isHidden) {
                    targetMenu.classList.remove('hidden');
                    if (arrow) arrow.classList.add('rotate-180');
                } else {
                    targetMenu.classList.add('hidden');
                    if (arrow) arrow.classList.remove('rotate-180');
                }
            }
        });
    });

    // Mobile Dropdowns
    mobileDropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', (e) => {
            e.stopPropagation();
            const dropdownId = 'mobile-dropdown-' + toggle.dataset.dropdown;
            const targetMenu = document.getElementById(dropdownId);
            const arrow = toggle.querySelector('.mobile-dropdown-arrow');

            if (targetMenu) {
                const isHidden = targetMenu.classList.contains('hidden');
                if (isHidden) {
                    targetMenu.classList.remove('hidden');
                    if (arrow) arrow.classList.add('rotate-180');
                } else {
                    targetMenu.classList.add('hidden');
                    if (arrow) arrow.classList.remove('rotate-180');
                }
            }
        });
    });

    // Close desktop dropdowns when clicking anywhere else
    document.addEventListener('click', () => {
        dropdownMenus.forEach(menu => {
            menu.classList.add('hidden');
        });
        document.querySelectorAll('.dropdown-arrow').forEach(arrow => {
            arrow.classList.remove('rotate-180');
        });
    });

    // Mobile Menu Toggle
    if (mobileMenuToggleBtn && mobileMenu) {
        mobileMenuToggleBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            const isOpen = mobileMenu.classList.contains('hidden');
            if (isOpen) {
                mobileMenu.classList.remove('hidden');
                mobileMenuIconOpen.classList.add('hidden');
                mobileMenuIconClose.classList.remove('hidden');
            } else {
                mobileMenu.classList.add('hidden');
                mobileMenuIconOpen.classList.remove('hidden');
                mobileMenuIconClose.classList.add('hidden');
            }
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
    
    const chatbotFabContainer = document.getElementById('chatbot-fab-container');
    const chatbotHideBtn = document.getElementById('chatbot-hide-btn');
    const chatbotToggleIcon = document.getElementById('chatbot-toggle-icon');
    const chatbotToggleCloseIcon = document.getElementById('chatbot-toggle-close-icon');
    const chatbotMaximizeBtn = document.getElementById('chatbot-maximize-btn');
    const chatbotMinimizeBtn = document.getElementById('chatbot-minimize-btn');

    let isChatbotMaximized = false;

    if (chatbotToggle && chatbotWindow) {
        function updateChatbotUIState() {
            const isOpen = !chatbotWindow.classList.contains('hidden');
            
            // Toggle icons inside FAB
            if (isOpen) {
                if (chatbotToggleIcon) chatbotToggleIcon.classList.add('hidden');
                if (chatbotToggleCloseIcon) chatbotToggleCloseIcon.classList.remove('hidden');
                if (chatbotHideBtn) chatbotHideBtn.classList.add('hidden');
                if (chatbotToggle) chatbotToggle.classList.add('rotate-90');
            } else {
                if (chatbotToggleIcon) chatbotToggleIcon.classList.remove('hidden');
                if (chatbotToggleCloseIcon) chatbotToggleCloseIcon.classList.add('hidden');
                if (chatbotHideBtn) chatbotHideBtn.classList.remove('hidden');
                if (chatbotToggle) chatbotToggle.classList.remove('rotate-90');
            }
        }

        function toggleChatbot() {
            chatbotWindow.classList.toggle('hidden');
            chatbotWindow.classList.toggle('flex');
            updateChatbotUIState();
            
            if (!chatbotWindow.classList.contains('hidden')) {
                chatInput.focus();
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
        }

        chatbotToggle.addEventListener('click', toggleChatbot);

        // Listen for custom open-chatbot event
        window.addEventListener('open-chatbot', () => {
            chatbotWindow.classList.remove('hidden');
            chatbotWindow.classList.add('flex');
            updateChatbotUIState();
            chatInput.focus();
            chatMessages.scrollTop = chatMessages.scrollHeight;
        });

        if (chatbotClose) {
            chatbotClose.addEventListener('click', () => {
                chatbotWindow.classList.add('hidden');
                chatbotWindow.classList.remove('flex');
                updateChatbotUIState();
            });
        }

        if (chatbotHideBtn && chatbotFabContainer) {
            chatbotHideBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                chatbotFabContainer.classList.add('hidden');
                chatbotWindow.classList.add('hidden');
                chatbotWindow.classList.remove('flex');
            });
        }

        // Maximize/Minimize functionality
        if (chatbotMaximizeBtn) {
            chatbotMaximizeBtn.addEventListener('click', () => {
                isChatbotMaximized = true;
                chatbotWindow.className = "fixed top-[88px] right-0 bottom-0 left-0 w-full h-[calc(100vh-88px)] bg-white shadow-2xl transition-all duration-300 z-40 border-0 flex flex-col overflow-hidden pointer-events-auto";
                if (chatbotMaximizeBtn) chatbotMaximizeBtn.classList.add('hidden');
                if (chatbotClose) chatbotClose.classList.add('hidden');
                if (chatbotMinimizeBtn) chatbotMinimizeBtn.classList.remove('hidden');
                if (chatbotFabContainer) chatbotFabContainer.classList.add('hidden');
            });
        }

        if (chatbotMinimizeBtn) {
            chatbotMinimizeBtn.addEventListener('click', () => {
                isChatbotMaximized = false;
                chatbotWindow.className = "fixed bottom-24 right-6 w-96 h-[550px] max-h-[calc(100vh-8rem)] bg-white rounded-2xl shadow-2xl z-40 border border-gray-200 flex flex-col overflow-hidden max-w-[calc(100vw-2rem)] transition-all duration-300 pointer-events-auto";
                if (chatbotMaximizeBtn) chatbotMaximizeBtn.classList.remove('hidden');
                if (chatbotClose) chatbotClose.classList.remove('hidden');
                if (chatbotMinimizeBtn) chatbotMinimizeBtn.classList.add('hidden');
                if (chatbotFabContainer) chatbotFabContainer.classList.remove('hidden');
            });
        }

        function addMessage(text, isBot = false) {
            const div = document.createElement('div');
            div.className = `flex ${isBot ? 'justify-start' : 'justify-end'}`;
            
            // Format bold text and linebreaks for the bot
            let formattedText = text;
            if (isBot) {
                formattedText = text
                    .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
                    .replace(/\*(.*?)\*/g, '<em>$1</em>')
                    .replace(/\n/g, '<br>');
            } else {
                const temp = document.createElement('div');
                temp.textContent = text;
                formattedText = temp.innerHTML;
            }

            div.innerHTML = `
                <div class="max-w-[80%] p-3 rounded-2xl ${
                    isBot 
                      ? 'bg-white border border-gray-200 text-neutral-800 rounded-tl-none shadow-sm' 
                      : 'bg-jeff-orange text-white rounded-tr-none'
                } text-sm">
                    ${formattedText}
                </div>
            `;
            chatMessages.appendChild(div);
            
            const typing = document.getElementById('typing-indicator');
            if (typing) typing.remove();

            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function showTyping() {
            const div = document.createElement('div');
            div.id = 'typing-indicator';
            div.className = 'flex justify-start';
            div.innerHTML = `
                <div class="bg-white border border-gray-200 text-neutral-800 rounded-2xl rounded-tl-none shadow-sm p-3">
                    <div class="flex items-center gap-1">
                        <div class="w-1.5 h-1.5 bg-jeff-orange rounded-full animate-bounce"></div>
                        <div class="w-1.5 h-1.5 bg-jeff-orange rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                        <div class="w-1.5 h-1.5 bg-jeff-orange rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
                    </div>
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

    // --- TriniChat Modal Logic ---
    const trinichatModal = document.getElementById('trinichat-modal');
    const trinichatBackdrop = document.getElementById('trinichat-backdrop');
    const trinichatWindow = document.getElementById('trinichat-window');
    const trinichatIframe = document.getElementById('trinichat-iframe');
    const trinichatMaximizeBtn = document.getElementById('trinichat-maximize-btn');
    const trinichatCloseBtn = document.getElementById('trinichat-close-btn');
    const trinichatMaximizeIcon = document.getElementById('trinichat-maximize-icon');
    const trinichatMinimizeIcon = document.getElementById('trinichat-minimize-icon');

    let isTriniMaximized = false;

    function openTriniChat() {
        if (!trinichatModal) return;
        
        // Load the iframe if not already loaded
        if (!trinichatIframe.src || trinichatIframe.src === window.location.href) {
            trinichatIframe.src = 'https://trinichat.me';
        }
        
        trinichatModal.classList.remove('hidden');
        
        // Animate open
        setTimeout(() => {
            trinichatBackdrop.classList.remove('opacity-0');
            trinichatBackdrop.classList.add('opacity-100');
            
            trinichatWindow.classList.remove('scale-95', 'opacity-0');
            trinichatWindow.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeTriniChat() {
        if (!trinichatModal) return;
        
        trinichatBackdrop.classList.remove('opacity-100');
        trinichatBackdrop.classList.add('opacity-0');
        
        trinichatWindow.classList.remove('scale-100', 'opacity-100');
        trinichatWindow.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            trinichatModal.classList.add('hidden');
        }, 300);
    }

    function toggleMaximize() {
        isTriniMaximized = !isTriniMaximized;
        if (isTriniMaximized) {
            trinichatWindow.className = "bg-white shadow-2xl transition-all duration-300 pointer-events-auto overflow-hidden border border-gray-200 flex flex-col relative z-10 w-full h-full rounded-none border-0 scale-100 opacity-100";
            if (trinichatMaximizeIcon) trinichatMaximizeIcon.classList.add('hidden');
            if (trinichatMinimizeIcon) trinichatMinimizeIcon.classList.remove('hidden');
        } else {
            trinichatWindow.className = "bg-white shadow-2xl transition-all duration-300 pointer-events-auto overflow-hidden border border-gray-200 flex flex-col relative z-10 w-full max-w-4xl h-[80vh] rounded-2xl scale-100 opacity-100";
            if (trinichatMaximizeIcon) trinichatMaximizeIcon.classList.remove('hidden');
            if (trinichatMinimizeIcon) trinichatMinimizeIcon.classList.add('hidden');
        }
    }

    if (trinichatCloseBtn) trinichatCloseBtn.addEventListener('click', closeTriniChat);
    if (trinichatBackdrop) trinichatBackdrop.addEventListener('click', closeTriniChat);
    if (trinichatMaximizeBtn) trinichatMaximizeBtn.addEventListener('click', toggleMaximize);

    // Listen for custom open-trinichat event
    window.addEventListener('open-trinichat', openTriniChat);
});
