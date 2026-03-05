<div class="min-h-screen bg-gray-50">
  <!-- HERO SECTION -->
  <section class="relative h-64 md:h-80 flex items-center justify-center overflow-hidden bg-neutral-900">
     <div class="absolute inset-0 opacity-40">
        <img src="https://images.unsplash.com/photo-1555652615-585a9756184a?auto=format&fit=crop&w=1600&q=80" class="w-full h-full object-cover" alt="Taproom" loading="lazy" />
     </div>
     <div class="absolute inset-0 bg-gradient-to-t from-neutral-900 via-transparent to-black/60"></div>
     
     <div class="relative z-10 text-center px-4 max-w-4xl mx-auto text-white">
        <h1 class="text-4xl md:text-6xl font-oswald font-bold mb-4 drop-shadow-xl uppercase tracking-wide">
           Hol' a Lime with Us
        </h1>
        <p class="text-xl font-light text-gray-200">
           Questions? Collabs? Just want to talk beer? We dey.
        </p>
     </div>
  </section>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20">
      
      <!-- LEFT: CONTACT FORM -->
      <div>
         <div class="bg-white p-8 rounded-3xl shadow-lg border border-gray-100">
            <?php if (!$submitted): ?>
              <h2 class="text-3xl font-oswald font-bold text-neutral-900 mb-6 flex items-center uppercase tracking-wide">
                 Send a Message <i data-lucide="message-square" class="ml-3 w-6 h-6 text-jeff-orange"></i>
              </h2>
              <form method="POST" action="?route=contact" id="contact-form" class="space-y-6">
                 <div>
                    <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Your Name</label>
                    <input 
                      required
                      type="text" 
                      name="name"
                      class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-jeff-teal focus:outline-none bg-gray-50 font-light"
                      placeholder="e.g. Jeff B."
                    />
                 </div>
                 
                 <div>
                    <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Email Address</label>
                    <input 
                      required
                      type="email" 
                      name="email"
                      class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-jeff-teal focus:outline-none bg-gray-50 font-light"
                      placeholder="you@example.com"
                    />
                 </div>

                 <div>
                    <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Subject</label>
                    <select 
                       name="subject"
                       class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-jeff-teal focus:outline-none bg-gray-50 font-light appearance-none"
                    >
                       <option>General Inquiry</option>
                       <option>Order Support</option>
                       <option>Wholesale / Stocking</option>
                       <option>Press & Media</option>
                       <option>Just wanted to say cheers</option>
                    </select>
                 </div>

                 <div>
                    <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Message</label>
                    <textarea 
                      required
                      name="message"
                      rows="5"
                      class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-jeff-teal focus:outline-none bg-gray-50 font-light resize-none"
                      placeholder="What's on your mind?"
                    ></textarea>
                 </div>

                 <button 
                   type="submit" 
                   id="submit-contact-btn"
                   class="w-full bg-neutral-900 text-white font-bold py-4 rounded-xl hover:bg-jeff-orange transition shadow-lg flex items-center justify-center uppercase tracking-wide relative overflow-hidden group"
                 >
                   <span id="contact-btn-text" class="flex items-center">Send Message <i data-lucide="send" class="ml-2 w-4 h-4 transform group-hover:translate-x-1 group-hover:-translate-y-1 transition"></i></span>
                   <i data-lucide="loader-2" id="contact-btn-spinner" class="w-6 h-6 animate-spin absolute hidden"></i>
                 </button>
              </form>
            <?php else: ?>
              <div class="text-center py-20 animate-fade-in">
                 <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce">
                    <i data-lucide="check-circle" class="h-10 w-10 text-green-600"></i>
                 </div>
                 <h2 class="text-3xl font-oswald uppercase text-neutral-900 mb-4 font-bold tracking-wide">Message Sent!</h2>
                 <p class="text-lg text-gray-600 mb-8 font-light">
                    Thanks for reaching out. We'll get back to you faster than a blue devil at J'ouvert.
                 </p>
                 <a 
                    href="?route=contact"
                    class="text-jeff-teal font-bold hover:text-jeff-dark transition uppercase tracking-widest text-sm flex items-center justify-center group"
                 >
                    <i data-lucide="arrow-left" class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition"></i> Send another message
                 </a>
              </div>
            <?php endif; ?>
         </div>
      </div>

      <!-- RIGHT: CONTACT INFO -->
      <div class="space-y-10">
         <div>
            <h3 class="text-2xl font-oswald font-bold text-neutral-900 mb-6 uppercase tracking-wide">Contact Info</h3>
            <div class="space-y-6">
               <div class="flex items-start group">
                  <div class="w-12 h-12 bg-jeff-sand rounded-full flex items-center justify-center mr-4 flex-shrink-0 group-hover:scale-110 transition duration-300">
                     <i data-lucide="map-pin" class="w-6 h-6 text-jeff-orange line-clamp-1"></i>
                  </div>
                  <div>
                     <p class="font-bold text-neutral-900 uppercase tracking-wide text-sm mb-1">Headquarters & Taproom</p>
                     <p class="text-gray-600 font-light leading-relaxed">
                        123 Ariapita Avenue,<br/>
                        Woodbrook, Port of Spain,<br/>
                        Trinidad & Tobago
                     </p>
                  </div>
               </div>

               <div class="flex items-start group">
                  <div class="w-12 h-12 bg-jeff-sand rounded-full flex items-center justify-center mr-4 flex-shrink-0 group-hover:scale-110 transition duration-300">
                     <i data-lucide="mail" class="w-6 h-6 text-jeff-teal"></i>
                  </div>
                  <div>
                     <p class="font-bold text-neutral-900 uppercase tracking-wide text-sm mb-1">Email Us</p>
                     <a href="mailto:hello@jeffbrewery.com" class="text-gray-600 font-light hover:text-jeff-orange transition block">
                        hello@jeffbrewery.com
                     </a>
                  </div>
               </div>

               <div class="flex items-start group">
                  <div class="w-12 h-12 bg-jeff-sand rounded-full flex items-center justify-center mr-4 flex-shrink-0 group-hover:scale-110 transition duration-300">
                     <i data-lucide="phone" class="w-6 h-6 text-jeff-gold"></i>
                  </div>
                  <div>
                     <p class="font-bold text-neutral-900 uppercase tracking-wide text-sm mb-1">Call Us</p>
                     <p class="text-gray-600 font-light">
                        +1 (868) 555-BREW (2739)
                     </p>
                     <p class="text-xs text-gray-400 mt-1 font-bold tracking-wider">MON-FRI: 9AM - 6PM</p>
                  </div>
               </div>
            </div>
         </div>

         <!-- MAP PLACEHOLDER -->
         <div class="bg-neutral-800 rounded-3xl h-64 w-full relative overflow-hidden group shadow-lg">
             <div class="absolute inset-0 flex items-center justify-center opacity-30">
                 <!-- Simple placeholder pattern for the map -->
                <div class="w-full h-full bg-[radial-gradient(#404040_1px,transparent_1px)] [background-size:16px_16px]"></div>
             </div>
             
             <!-- Note: I replaced the google maps img with a stylized placeholder since it requires an API key in the real world -->
             <div class="absolute inset-0 flex flex-col items-center justify-center z-10">
                <i data-lucide="map-pin" class="w-10 h-10 text-trini-red mb-2 animate-bounce"></i>
                <div class="bg-white/90 backdrop-blur-sm px-5 py-3 rounded-xl shadow-xl border border-white/20">
                    <span class="font-oswald font-bold text-neutral-900 flex items-center text-lg uppercase tracking-widest">
                        Woodbrook, POS
                    </span>
                </div>
             </div>
         </div>
      </div>

    </div>
  </div>
</div>

<script>
  // Add loading animation to button on submit
  <?php if (!$submitted): ?>
  document.getElementById('contact-form').addEventListener('submit', function() {
      const btnText = document.getElementById('contact-btn-text');
      const spinner = document.getElementById('contact-btn-spinner');
      const submitBtn = document.getElementById('submit-contact-btn');
      
      btnText.style.opacity = '0';
      spinner.classList.remove('hidden');
      submitBtn.setAttribute('disabled', 'true');
      submitBtn.classList.add('opacity-80', 'cursor-not-allowed');
  });
  <?php endif; ?>
</script>
