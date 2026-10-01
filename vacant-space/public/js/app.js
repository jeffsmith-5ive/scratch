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

    // --- Navigation Dropdown & Mobile Sidebar Logic ---
    const dropdownToggles = document.querySelectorAll('.nav-dropdown-toggle');
    const dropdownMenus = document.querySelectorAll('.nav-dropdown-menu');
    const mobileDropdownToggles = document.querySelectorAll('.mobile-dropdown-toggle');
    const mobileMenuToggleBtn = document.getElementById('mobile-menu-toggle-btn');
    const mobileSidebar = document.getElementById('mobile-sidebar');
    const mobileSidebarPanel = document.getElementById('mobile-sidebar-panel');
    const mobileSidebarBackdrop = document.getElementById('mobile-sidebar-backdrop');
    const mobileSidebarCloseBtn = document.getElementById('mobile-sidebar-close-btn');
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

    // Mobile Dropdowns inside Sidebar
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

    // Mobile Sidebar Open / Close Functions
    function openMobileSidebar() {
        if (!mobileSidebar) return;
        mobileSidebar.classList.remove('hidden');
        setTimeout(() => {
            if (mobileSidebarBackdrop) {
                mobileSidebarBackdrop.classList.remove('opacity-0');
                mobileSidebarBackdrop.classList.add('opacity-100');
            }
            if (mobileSidebarPanel) {
                mobileSidebarPanel.classList.remove('-translate-x-full');
                mobileSidebarPanel.classList.add('translate-x-0');
            }
        }, 10);
        if (mobileMenuIconOpen) mobileMenuIconOpen.classList.add('hidden');
        if (mobileMenuIconClose) mobileMenuIconClose.classList.remove('hidden');
    }

    function closeMobileSidebar() {
        if (!mobileSidebar) return;
        if (mobileSidebarBackdrop) {
            mobileSidebarBackdrop.classList.remove('opacity-100');
            mobileSidebarBackdrop.classList.add('opacity-0');
        }
        if (mobileSidebarPanel) {
            mobileSidebarPanel.classList.remove('translate-x-0');
            mobileSidebarPanel.classList.add('-translate-x-full');
        }
        if (mobileMenuIconOpen) mobileMenuIconOpen.classList.remove('hidden');
        if (mobileMenuIconClose) mobileMenuIconClose.classList.add('hidden');
        setTimeout(() => {
            mobileSidebar.classList.add('hidden');
        }, 300);
    }
    window.closeMobileSidebar = closeMobileSidebar;

    if (mobileMenuToggleBtn) {
        mobileMenuToggleBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            if (mobileSidebar && !mobileSidebar.classList.contains('hidden')) {
                closeMobileSidebar();
            } else {
                openMobileSidebar();
            }
        });
    }

    if (mobileSidebarCloseBtn) {
        mobileSidebarCloseBtn.addEventListener('click', closeMobileSidebar);
    }
    if (mobileSidebarBackdrop) {
        mobileSidebarBackdrop.addEventListener('click', closeMobileSidebar);
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
                chatbotWindow.className = "fixed inset-2 sm:inset-6 bg-white shadow-2xl transition-all duration-300 z-[85] border border-gray-200 flex flex-col overflow-hidden pointer-events-auto rounded-2xl";
                if (chatbotMaximizeBtn) chatbotMaximizeBtn.classList.add('hidden');
                if (chatbotMinimizeBtn) chatbotMinimizeBtn.classList.remove('hidden');
                if (chatbotFabContainer) chatbotFabContainer.classList.add('hidden');
            });
        }

        if (chatbotMinimizeBtn) {
            chatbotMinimizeBtn.addEventListener('click', () => {
                isChatbotMaximized = false;
                chatbotWindow.className = "fixed bottom-20 right-3 left-3 sm:left-auto sm:right-6 sm:bottom-24 w-auto sm:w-96 sm:max-w-md h-[520px] max-h-[calc(100dvh-6rem)] bg-white rounded-2xl shadow-2xl z-[85] border border-gray-200 flex flex-col overflow-hidden transition-all duration-300 pointer-events-auto";
                if (chatbotMaximizeBtn) chatbotMaximizeBtn.classList.remove('hidden');
                if (chatbotMinimizeBtn) chatbotMinimizeBtn.classList.add('hidden');
                if (chatbotFabContainer) chatbotFabContainer.classList.remove('hidden');
            });
        }

        function addMessage(text, isBot = false, recommendations = [], chips = []) {
            const div = document.createElement('div');
            div.className = `flex ${isBot ? 'justify-start' : 'justify-end'} w-full animate-fade-in`;
            
            // Format bold text, bullet points, and linebreaks for the bot
            let formattedText = text;
            if (isBot) {
                formattedText = text
                    .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
                    .replace(/\*(.*?)\*/g, '<em>$1</em>')
                    .replace(/\n\n/g, '<br><br>')
                    .replace(/\n/g, '<br>');
            } else {
                const temp = document.createElement('div');
                temp.textContent = text;
                formattedText = temp.innerHTML;
            }

            let html = `
                <div class="max-w-[90%] sm:max-w-[85%] p-3.5 rounded-2xl ${
                    isBot 
                      ? 'bg-neutral-900 border border-white/10 text-neutral-200 rounded-tl-none shadow-md' 
                      : 'bg-[var(--gold)] text-black font-medium rounded-tr-none shadow-md'
                } text-xs sm:text-sm leading-relaxed">
                    <div>${formattedText}</div>
            `;

            // If bot returned product recommendations (Section 4, 11, 14, 18)
            if (isBot && recommendations && recommendations.length > 0) {
                html += `<div class="mt-3.5 pt-3 border-t border-white/10 space-y-2.5">`;
                recommendations.forEach(rec => {
                    const price = parseFloat(rec.price || 15).toFixed(2);
                    const match = rec.matchPct || 85;
                    const isLow = rec.isLowStock || (rec.stock <= 20);
                    
                    html += `
                        <div class="bg-black/60 border border-white/10 rounded-xl p-2.5 hover:border-[var(--gold)]/40 transition-colors">
                            <div class="flex items-center gap-2.5">
                                <img src="${rec.image || '/public/images/brechin_castle.jpg'}" alt="${rec.name}" class="w-12 h-12 rounded-lg object-cover bg-neutral-900 shrink-0 border border-white/10" />
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between gap-1">
                                        <div class="font-bold text-white text-xs truncate">${rec.name}</div>
                                        <span class="px-1.5 py-0.5 rounded text-[10px] font-bold bg-[var(--gold)]/20 text-[var(--gold)] border border-[var(--gold)]/30 shrink-0">${match}% Match</span>
                                    </div>
                                    <div class="text-[10px] text-neutral-400 font-mono">${rec.style || 'Craft Brew'} · ${rec.abv || '5.0'}% ABV · $${price}</div>
                                </div>
                            </div>
                            
                            ${rec.reason ? `
                                <div class="mt-2 text-[10px] text-neutral-300 italic bg-white/5 p-1.5 rounded-lg border border-white/5">
                                    "${rec.reason}"
                                </div>
                            ` : ''}

                            ${isLow ? `
                                <div class="mt-1 text-[10px] text-red-400 font-bold flex items-center gap-1">
                                    <span>⚠️ Low Stock (${rec.stock || 12} left)</span>
                                </div>
                            ` : ''}

                            <div class="mt-2.5 pt-2 border-t border-white/5 flex items-center justify-between gap-2">
                                <a href="?route=shop/detail&id=${encodeURIComponent(rec.id)}" class="text-[10px] font-bold text-neutral-300 hover:text-white px-2.5 py-1 rounded bg-neutral-800 hover:bg-neutral-700 transition">
                                    View Details
                                </a>
                                <button onclick="addBeerFromChatbot('${rec.id}', '${rec.name}', ${price}, '${rec.image}')" class="text-[10px] font-bold text-black px-2.5 py-1 rounded bg-[var(--gold)] hover:bg-yellow-400 transition flex items-center gap-1">
                                    <i data-lucide="plus" class="w-3 h-3"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    `;
                });
                html += `</div>`;
            }

            // If bot returned follow-up suggested chips
            if (isBot && chips && chips.length > 0) {
                html += `<div class="mt-3 pt-2.5 border-t border-white/10 flex flex-wrap gap-1.5">`;
                chips.forEach(chip => {
                    html += `
                        <button onclick="sendQuickPrompt('${chip.replace(/'/g, "\\'")}')" class="text-[10px] font-medium px-2.5 py-1 rounded-full bg-neutral-800 hover:bg-[var(--gold)] hover:text-black text-neutral-300 border border-white/10 transition">
                            ${chip}
                        </button>
                    `;
                });
                html += `</div>`;
            }

            html += `</div>`;
            div.innerHTML = html;
            chatMessages.appendChild(div);
            
            const typing = document.getElementById('typing-indicator');
            if (typing) typing.remove();

            if (window.lucide) {
                lucide.createIcons();
            }

            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function showTyping() {
            const div = document.createElement('div');
            div.id = 'typing-indicator';
            div.className = 'flex justify-start';
            div.innerHTML = `
                <div class="bg-neutral-900 border border-white/10 text-neutral-300 rounded-2xl rounded-tl-none shadow-sm p-3">
                    <div class="flex items-center gap-1.5">
                        <span class="text-[10px] text-neutral-400 mr-1 font-mono">Brewer Guide typing</span>
                        <div class="w-1.5 h-1.5 bg-[var(--gold)] rounded-full animate-bounce"></div>
                        <div class="w-1.5 h-1.5 bg-[var(--gold)] rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                        <div class="w-1.5 h-1.5 bg-[var(--gold)] rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
                    </div>
                </div>
            `;
            chatMessages.appendChild(div);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function sendMessage(customText = null) {
            const text = (customText || chatInput.value).trim();
            if (!text) return;

            addMessage(text, false);
            if (!customText) chatInput.value = '';
            showTyping();

            fetch('?route=chatbot/ask', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message: text })
            })
                .then(res => res.json())
                .then(data => {
                    if (data.reply) {
                        addMessage(data.reply, true, data.recommendations || [], data.suggestedChips || []);
                    } else if (data.error) {
                        addMessage("Oops: " + data.error, true);
                    }
                })
                .catch(err => {
                    addMessage("I'm having trouble connecting to the brewery right now. Please try again shortly!", true);
                });
        }

        window.sendQuickPrompt = function(promptText) {
            sendMessage(promptText);
        };

        window.addBeerFromChatbot = function(id, name, price, image) {
            // Track analytics event: recommendation_added_to_cart (Layer 4 & Section 21)
            fetch('?route=chatbot/trackEvent', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ 
                    event: 'recommendation_added_to_cart', 
                    data: { beer_id: id, beer_name: name, price: price }
                })
            }).catch(() => {});

            // Add item to cart via existing cart API
            fetch('?route=cart/add', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: id, name: name, price: price, image: image, quantity: 1 })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // Update cart badge
                    document.querySelectorAll('.cart-count-text').forEach(el => el.textContent = data.count);
                    // Open cart drawer
                    const cartDrawer = document.getElementById('cart-drawer');
                    if (cartDrawer) {
                        cartDrawer.classList.remove('translate-x-full');
                        if (typeof loadCartItems === 'function') loadCartItems();
                    }
                }
            })
            .catch(() => {
                window.location.href = `?route=shop/detail&id=${encodeURIComponent(id)}`;
            });
        };

        chatSend.addEventListener('click', () => sendMessage());
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
                        const cartDrawer = document.getElementById('cart-drawer');
                        if (cartDrawer) {
                            cartDrawer.classList.remove('hidden');
                            loadCartItems();
                        }
                    }
                })
                .catch(err => console.error('Error adding to cart:', err));
        });
    });

    window.addToCart = function(id, qty = 1) {
        fetch('?route=cart/add', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id: id, qty: qty })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                updateCartCountUI(data.count);
                const cartDrawer = document.getElementById('cart-drawer');
                if (cartDrawer) {
                    cartDrawer.classList.remove('hidden');
                    loadCartItems();
                }
            } else {
                alert(data.error || 'Failed to add item to cart');
            }
        })
        .catch(err => console.error('Error adding to cart:', err));
    };

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
            trinichatWindow.className = "bg-white shadow-2xl transition-all duration-300 pointer-events-auto overflow-hidden border border-gray-200 flex flex-col relative z-10 w-full h-full rounded-none sm:rounded-2xl border-0 scale-100 opacity-100";
            if (trinichatMaximizeIcon) trinichatMaximizeIcon.classList.add('hidden');
            if (trinichatMinimizeIcon) trinichatMinimizeIcon.classList.remove('hidden');
        } else {
            trinichatWindow.className = "bg-white shadow-2xl transition-all duration-300 pointer-events-auto overflow-hidden border border-gray-200 flex flex-col relative z-10 w-full max-w-4xl h-[92vh] sm:h-[80vh] rounded-2xl scale-100 opacity-100";
            if (trinichatMaximizeIcon) trinichatMaximizeIcon.classList.remove('hidden');
            if (trinichatMinimizeIcon) trinichatMinimizeIcon.classList.add('hidden');
        }
    }

    if (trinichatCloseBtn) trinichatCloseBtn.addEventListener('click', closeTriniChat);
    if (trinichatBackdrop) trinichatBackdrop.addEventListener('click', closeTriniChat);
    if (trinichatMaximizeBtn) trinichatMaximizeBtn.addEventListener('click', toggleMaximize);

    // Global ESC key listener to close mobile menu, cart, TriniChat, or chatbot
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeMobileSidebar();
            if (typeof closeCart === 'function') closeCart();
            if (typeof closeTriniChat === 'function') closeTriniChat();
            if (chatbotWindow && !chatbotWindow.classList.contains('hidden')) {
                chatbotWindow.classList.add('hidden');
                chatbotWindow.classList.remove('flex');
                if (typeof updateChatbotUIState === 'function') updateChatbotUIState();
            }
        }
    });

    // Listen for custom open-trinichat event
    window.addEventListener('open-trinichat', openTriniChat);

    // --- Global Beer Social Share Modal Logic ---
    let currentShareBeer = null;
    const beerShareModal = document.getElementById('beer-share-modal');
    const closeBeerShareBtn = document.getElementById('close-beer-share-modal');
    const beerModalTitle = document.getElementById('beer-modal-title');
    const beerModalName = document.getElementById('beer-modal-name');
    const beerModalPrice = document.getElementById('beer-modal-price');
    const beerModalTagline = document.getElementById('beer-modal-tagline');
    const beerModalStyle = document.getElementById('beer-modal-style');
    const beerModalAbv = document.getElementById('beer-modal-abv');
    const beerModalFlavors = document.getElementById('beer-modal-flavors');
    const beerModalImg = document.getElementById('beer-modal-img');
    const beerShareUrlInput = document.getElementById('beer-share-url-input');
    const copyBeerShareUrlBtn = document.getElementById('copy-beer-share-url');
    const beerShareToast = document.getElementById('beer-share-toast');

    const beerIgStoryBtn = document.getElementById('beer-share-ig-story');
    const beerIgPostBtn = document.getElementById('beer-share-ig-post');
    const beerWhatsappBtn = document.getElementById('beer-share-whatsapp');
    const beerFacebookBtn = document.getElementById('beer-share-facebook');

    function getBeerShareUrl(beer) {
        const url = new URL(window.location.origin + window.location.pathname);
        url.searchParams.set('route', 'shop/detail');
        url.searchParams.set('id', beer.id);
        return url.toString();
    }

    function getBeerShareCaption(beer) {
        const flavors = beer.flavorProfile ? beer.flavorProfile.join(', ') : 'Great Taste';
        return `🍺 Check out "${beer.name}" by @JeffBrewery! (${beer.style || 'Craft Brew'}, ${beer.abv || '5.0'}% ABV).\nTagline: "${beer.tagline || ''}"\nFlavor Notes: ${flavors}\nTry it at ${getBeerShareUrl(beer)} #JeffBrewery #CraftBeer #TriniCraft #DrinkTheVision`;
    }

    function populateBeerShareModal(beer) {
        currentShareBeer = beer;
        if (!beer) return;

        if (beerModalTitle) beerModalTitle.textContent = `Share ${beer.name}`;
        if (beerModalName) beerModalName.textContent = beer.name;
        if (beerModalPrice) beerModalPrice.textContent = `$${parseFloat(beer.price || 0).toFixed(2)}`;
        if (beerModalTagline) beerModalTagline.textContent = beer.tagline ? `"${beer.tagline}"` : '';
        if (beerModalStyle) beerModalStyle.textContent = beer.style || 'Craft Brew';
        if (beerModalAbv) beerModalAbv.textContent = `${parseFloat(beer.abv || 0).toFixed(1)}% ABV`;
        
        const flavors = beer.flavorProfile ? beer.flavorProfile.join(' • ') : 'Crafted with Trinbagonian soul';
        if (beerModalFlavors) beerModalFlavors.textContent = flavors;

        if (beerModalImg) {
            beerModalImg.src = beer.image || '/public/images/island_ipa.jpg';
        }

        if (beerShareUrlInput) beerShareUrlInput.value = getBeerShareUrl(beer);
    }

    function openBeerShareModal(beer, autoTarget) {
        populateBeerShareModal(beer);
        if (!beerShareModal) return;
        beerShareModal.classList.remove('hidden');
        if (window.lucide) lucide.createIcons();

        if (autoTarget === 'ig-story') {
            generateAndShareBeerImage(true);
        } else if (autoTarget === 'ig-post') {
            generateAndShareBeerImage(false);
        } else if (autoTarget === 'wa') {
            shareBeerToWhatsApp();
        }
    }

    function closeBeerShareModal() {
        if (!beerShareModal) return;
        beerShareModal.classList.add('hidden');
        if (beerShareToast) beerShareToast.classList.add('hidden');
    }

    function loadCanvasImage(src) {
        return new Promise((resolve) => {
            if (!src) return resolve(null);
            const img = new Image();
            // Only set crossOrigin for external http/https URLs to prevent local same-origin canvas CORS blocking
            if (src.startsWith('http://') || src.startsWith('https://')) {
                if (!src.includes(window.location.hostname)) {
                    img.crossOrigin = 'anonymous';
                }
            }
            img.onload = () => resolve(img);
            img.onerror = (e) => {
                console.warn('Canvas image load warning:', src, e);
                resolve(null);
            };
            img.src = src;
        });
    }

    // Canvas Image Generator for ANY Beer
    async function createBeerCardCanvasAsync(beer, isStory = false) {
        const width = 1080;
        const height = isStory ? 1920 : 1080;
        const canvas = document.createElement('canvas');
        canvas.width = width;
        canvas.height = height;
        const ctx = canvas.getContext('2d');

        // Background Gradient
        const bgGrad = ctx.createLinearGradient(0, 0, width, height);
        bgGrad.addColorStop(0, '#0a0a0a');
        bgGrad.addColorStop(0.5, '#141414');
        bgGrad.addColorStop(1, '#050505');
        ctx.fillStyle = bgGrad;
        ctx.fillRect(0, 0, width, height);

        // Gold Radial Glow behind bottle
        const glowY = isStory ? 680 : 490;
        const radGrad = ctx.createRadialGradient(width/2, glowY, 50, width/2, glowY, isStory ? 480 : 320);
        radGrad.addColorStop(0, 'rgba(212, 160, 23, 0.28)');
        radGrad.addColorStop(1, 'rgba(0, 0, 0, 0)');
        ctx.fillStyle = radGrad;
        ctx.fillRect(0, 0, width, height);

        // Top Trini Flag Strip
        ctx.fillStyle = '#CE1126'; ctx.fillRect(0, 0, width, 16);
        ctx.fillStyle = '#FFFFFF'; ctx.fillRect(0, 16, width, 4);
        ctx.fillStyle = '#000000'; ctx.fillRect(0, 20, width, 8);
        ctx.fillStyle = '#FFFFFF'; ctx.fillRect(0, 28, width, 4);
        ctx.fillStyle = '#CE1126'; ctx.fillRect(0, 32, width, 16);

        // Border Frame
        ctx.strokeStyle = 'rgba(212, 160, 23, 0.4)';
        ctx.lineWidth = 12;
        ctx.strokeRect(40, 70, width - 80, height - 110);

        // Header Title
        ctx.fillStyle = '#D4A017';
        ctx.font = 'bold 28px "Oswald", sans-serif';
        ctx.textAlign = 'center';
        ctx.fillText('JEFF BREWERY • TRINBAGONIAN CRAFT BEER', width/2, 135);

        // Beer Title & Style Badge
        const nameUpper = (beer.name || 'CRAFT BEER').toUpperCase();
        ctx.fillStyle = '#FFFFFF';
        ctx.font = 'bold 58px "Oswald", sans-serif';
        ctx.fillText(nameUpper, width/2, 215);

        ctx.fillStyle = '#FF6F00';
        ctx.font = 'bold 32px "Oswald", sans-serif';
        ctx.fillText(`${(beer.style || 'CRAFT BREW').toUpperCase()} • ${parseFloat(beer.abv || 0).toFixed(1)}% ABV`, width/2, 265);

        if (beer.tagline) {
            ctx.fillStyle = '#D4A017';
            ctx.font = 'italic 28px Georgia, serif';
            ctx.fillText(`"${beer.tagline}"`, width/2, 310);
        }

        // --- DRAW ACTUAL BEER PREVIEW IMAGE ---
        const beerImg = await loadCanvasImage(beer.image || '/public/images/island_ipa.jpg');
        if (beerImg) {
            const maxImgHeight = isStory ? 640 : 340;
            const maxImgWidth = isStory ? 750 : 500;
            let drawW = beerImg.width;
            let drawH = beerImg.height;

            const scale = Math.min(maxImgWidth / drawW, maxImgHeight / drawH);
            drawW *= scale;
            drawH *= scale;

            const imgX = (width - drawW) / 2;
            const imgYCenter = isStory ? 390 + (640 - drawH)/2 : 330 + (340 - drawH)/2;

            // Draw soft bottle glow / pedestal shadow
            ctx.fillStyle = 'rgba(0, 0, 0, 0.5)';
            ctx.beginPath();
            ctx.ellipse(width/2, imgYCenter + drawH - 12, drawW * 0.45, 18, 0, 0, Math.PI * 2);
            ctx.fill();

            // Render Actual Beer Product Image!
            ctx.drawImage(beerImg, imgX, imgYCenter, drawW, drawH);
        }

        // Details Box Y Offset
        const boxY = isStory ? 1080 : 700;
        const boxHeight = isStory ? 650 : 250;

        ctx.fillStyle = 'rgba(255, 255, 255, 0.05)';
        ctx.beginPath();
        if (ctx.roundRect) ctx.roundRect(100, boxY, width - 200, boxHeight, 24);
        else ctx.rect(100, boxY, width - 200, boxHeight);
        ctx.fill();
        ctx.strokeStyle = 'rgba(255, 255, 255, 0.15)';
        ctx.stroke();

        // Details Content
        ctx.textAlign = 'left';
        ctx.fillStyle = '#A3A3A3';
        ctx.font = 'bold 24px sans-serif';
        ctx.fillText('FLAVOR PROFILE:', 140, boxY + 55);

        const flavorsStr = beer.flavorProfile ? beer.flavorProfile.join(' • ') : 'Crafted with passion';
        ctx.fillStyle = '#D4A017';
        ctx.font = 'bold 26px sans-serif';
        ctx.fillText(flavorsStr, 380, boxY + 55);

        if (beer.pairing && beer.pairing.length > 0) {
            ctx.fillStyle = '#A3A3A3';
            ctx.font = 'bold 24px sans-serif';
            ctx.fillText('BEST SERVED WITH:', 140, boxY + 120);

            ctx.fillStyle = '#FFFFFF';
            ctx.font = 'bold 26px sans-serif';
            ctx.fillText(beer.pairing.join(' • '), 420, boxY + 120);
        }

        if (isStory && beer.description) {
            ctx.fillStyle = '#E5E5E5';
            ctx.font = 'italic 25px Georgia, serif';
            let words = beer.description.split(' ');
            let line = '';
            let curY = boxY + 200;
            for (let n = 0; n < words.length; n++) {
                let testLine = line + words[n] + ' ';
                let metrics = ctx.measureText(testLine);
                if (metrics.width > 800 && n > 0) {
                    ctx.fillText(line, 140, curY);
                    line = words[n] + ' ';
                    curY += 36;
                } else line = testLine;
            }
            ctx.fillText(line, 140, curY);
        }

        // Call To Action Footer
        ctx.textAlign = 'center';
        ctx.fillStyle = '#FF6F00';
        ctx.font = 'bold 34px "Oswald", sans-serif';
        ctx.fillText('ISLAND-WIDE DELIVERY • JEFFBREWERY.COM', width/2, height - 100);

        ctx.fillStyle = '#D4A017';
        ctx.font = 'bold 22px sans-serif';
        ctx.fillText('DRINK THE VISION • LIVE THE CULTURE', width/2, height - 55);

        return canvas;
    }

    async function generateAndShareBeerImage(isStory = false) {
        if (!currentShareBeer) return;

        if (beerShareToast) {
            beerShareToast.innerHTML = '🎨 Generating High-Res Image with Beer Photo...';
            beerShareToast.className = 'mt-3 text-center text-xs font-bold text-yellow-400 bg-yellow-950/40 border border-yellow-800/40 py-2.5 px-3 rounded-lg transition-all animate-fade-in block';
        }

        const canvas = await createBeerCardCanvasAsync(currentShareBeer, isStory);
        canvas.toBlob((blob) => {
            const cleanName = (currentShareBeer.name || 'JeffBrewery_Beer').replace(/\s+/g, '_');
            const typeLabel = isStory ? 'IG_Story' : 'IG_Post';
            const fileName = `${cleanName}_${typeLabel}.png`;

            const link = document.createElement('a');
            link.download = fileName;
            link.href = URL.createObjectURL(blob);
            link.click();
            URL.revokeObjectURL(link.href);

            const caption = getBeerShareCaption(currentShareBeer);
            navigator.clipboard.writeText(caption).catch(() => {});

            if (beerShareToast) {
                beerShareToast.innerHTML = `📸 ${isStory ? 'Instagram Story' : 'Instagram Feed'} Image Card Downloaded! Caption copied to clipboard. Ready to post!`;
                beerShareToast.className = 'mt-3 text-center text-xs font-bold text-pink-400 bg-pink-950/40 border border-pink-800/40 py-2.5 px-3 rounded-lg transition-all animate-fade-in block';
            }

            setTimeout(() => {
                window.open('https://www.instagram.com/jeffbrewery?stkn=MWhjbXA5ZDJnbHNqag%3D%3D&utm_source=qr', '_blank');
            }, 1200);
        }, 'image/png');
    }

    function shareBeerToWhatsApp() {
        if (!currentShareBeer) return;
        const caption = getBeerShareCaption(currentShareBeer);
        window.open(`https://api.whatsapp.com/send?text=${encodeURIComponent(caption)}`, '_blank');
    }

    function shareBeerToFacebook() {
        if (!currentShareBeer) return;
        const url = getBeerShareUrl(currentShareBeer);
        window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`, '_blank');
    }

    // Attach click listeners to open-beer-share-btn elements
    document.addEventListener('click', (e) => {
        const btn = e.target.closest('.open-beer-share-btn');
        if (btn) {
            e.preventDefault();
            e.stopPropagation();
            try {
                let beerData = null;

                if (btn.dataset.beer) {
                    try {
                        let jsonStr = btn.dataset.beer;
                        beerData = JSON.parse(jsonStr);
                    } catch (pErr) {
                        console.warn('dataset.beer JSON parse fallback triggered', pErr);
                    }
                }

                if (!beerData && btn.dataset.id) {
                    beerData = {
                        id: btn.dataset.id,
                        name: btn.dataset.name || 'Craft Beer',
                        tagline: btn.dataset.tagline || '',
                        style: btn.dataset.style || 'Craft Brew',
                        abv: parseFloat(btn.dataset.abv || 5.0),
                        price: parseFloat(btn.dataset.price || 15),
                        image: btn.dataset.image || '/public/images/island_ipa.jpg',
                        flavorProfile: btn.dataset.flavors ? btn.dataset.flavors.split(',') : [],
                        pairing: btn.dataset.pairing ? btn.dataset.pairing.split(',') : []
                    };
                }

                if (beerData) {
                    const target = btn.dataset.target || null;
                    openBeerShareModal(beerData, target);
                } else {
                    console.error('No beer data found on button:', btn);
                }
            } catch (err) {
                console.error('Error opening beer share modal:', err);
            }
        }
    });

    if (closeBeerShareBtn) closeBeerShareBtn.addEventListener('click', closeBeerShareModal);
    if (beerShareModal) {
        beerShareModal.addEventListener('click', (e) => {
            if (e.target === beerShareModal) closeBeerShareModal();
        });
    }

    if (beerIgStoryBtn) beerIgStoryBtn.addEventListener('click', () => generateAndShareBeerImage(true));
    if (beerIgPostBtn) beerIgPostBtn.addEventListener('click', () => generateAndShareBeerImage(false));
    if (beerWhatsappBtn) beerWhatsappBtn.addEventListener('click', shareBeerToWhatsApp);
    if (beerFacebookBtn) beerFacebookBtn.addEventListener('click', shareBeerToFacebook);

    if (copyBeerShareUrlBtn && beerShareUrlInput) {
        copyBeerShareUrlBtn.addEventListener('click', () => {
            navigator.clipboard.writeText(beerShareUrlInput.value).then(() => {
                beerShareToast.innerHTML = 'Link copied to clipboard! 🍺';
                beerShareToast.className = 'mt-3 text-center text-xs font-bold text-emerald-400 bg-emerald-950/40 border border-emerald-800/40 py-2.5 px-3 rounded-lg transition-all animate-fade-in block';
                setTimeout(() => beerShareToast.classList.add('hidden'), 3000);
            });
        });
    }
});
