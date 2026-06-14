<div class="min-h-screen text-[#f5f0e8] animate-fade-in">
  <!-- HERO SECTION -->
  <section class="relative h-64 md:h-80 flex items-center justify-center overflow-hidden border-b border-white/5 bg-gradient-to-b from-black to-neutral-950">
     <div class="absolute inset-0 opacity-15">
        <img src="https://images.unsplash.com/photo-1555652615-585a9756184a?auto=format&fit=crop&w=1600&q=80" class="w-full h-full object-cover" alt="Taproom" loading="lazy" />
     </div>
     <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/60"></div>
     
     <div class="relative z-10 text-center px-4 max-w-4xl mx-auto text-white">
        <h1 class="text-4xl md:text-6xl font-oswald font-bold mb-4 drop-shadow-xl uppercase tracking-wide">
           Hol' a Lime with Us
        </h1>
        <p class="text-xl font-light text-neutral-300">
           Questions? Collabs? Just want to talk beer? We dey.
        </p>
     </div>
  </section>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20">
      
      <!-- LEFT: CONTACT FORM -->
      <div>
         <div class="bg-[#111111] border border-white/10 p-8 rounded-3xl shadow-2xl">
            <?php if (!$submitted): ?>
              <h2 class="text-3xl font-oswald font-bold text-white mb-6 flex items-center uppercase tracking-wide">
                 Send a Message <i data-lucide="message-square" class="ml-3 w-6 h-6 text-[var(--gold)]"></i>
              </h2>
              <form method="POST" action="?route=contact" id="contact-form" class="space-y-6">
                 <div>
                    <label class="block text-xs font-bold uppercase text-neutral-400 mb-2">Your Name</label>
                    <input 
                      required
                      type="text" 
                      name="name"
                      class="w-full px-4 py-3 border border-white/10 rounded-xl focus:ring-2 focus:ring-[var(--gold)] focus:outline-none bg-white/5 text-white font-light focus:bg-white/10 transition"
                      placeholder="e.g. Jeff B."
                    />
                 </div>
                 
                 <div>
                    <label class="block text-xs font-bold uppercase text-neutral-400 mb-2">Email Address</label>
                    <input 
                      required
                      type="email" 
                      name="email"
                      class="w-full px-4 py-3 border border-white/10 rounded-xl focus:ring-2 focus:ring-[var(--gold)] focus:outline-none bg-white/5 text-white font-light focus:bg-white/10 transition"
                      placeholder="you@example.com"
                    />
                 </div>

                 <div>
                    <label class="block text-xs font-bold uppercase text-neutral-400 mb-2">Subject</label>
                    <div class="relative">
                      <select 
                         name="subject"
                         class="w-full px-4 py-3 border border-white/10 rounded-xl focus:ring-2 focus:ring-[var(--gold)] focus:outline-none bg-white/5 text-white font-light appearance-none focus:bg-white/10 transition"
                      >
                         <option class="bg-neutral-900 text-white">General Inquiry</option>
                         <option class="bg-neutral-900 text-white">Order Support</option>
                         <option class="bg-neutral-900 text-white">Wholesale / Stocking</option>
                         <option class="bg-neutral-900 text-white">Press & Media</option>
                         <option class="bg-neutral-900 text-white">Just wanted to say cheers</option>
                      </select>
                      <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-neutral-400">
                        <i data-lucide="chevron-down" class="w-4 h-4"></i>
                      </div>
                    </div>
                 </div>

                 <div>
                    <label class="block text-xs font-bold uppercase text-neutral-400 mb-2">Message</label>
                    <textarea 
                      required
                      name="message"
                      rows="5"
                      class="w-full px-4 py-3 border border-white/10 rounded-xl focus:ring-2 focus:ring-[var(--gold)] focus:outline-none bg-white/5 text-white font-light resize-none focus:bg-white/10 transition"
                      placeholder="What's on your mind?"
                    ></textarea>
                 </div>

                 <button 
                   type="submit" 
                   id="submit-contact-btn"
                   class="w-full bg-[var(--gold)] text-black font-bold py-4 rounded-xl hover:bg-[var(--gold)]/80 transition shadow-[0_0_20px_rgba(212,160,23,0.2)] flex items-center justify-center uppercase tracking-wide relative overflow-hidden group"
                 >
                   <span id="contact-btn-text" class="flex items-center">Send Message <i data-lucide="send" class="ml-2 w-4 h-4 transform group-hover:translate-x-1 group-hover:-translate-y-1 transition"></i></span>
                   <i data-lucide="loader-2" id="contact-btn-spinner" class="w-6 h-6 animate-spin absolute hidden"></i>
                 </button>
              </form>
            <?php else: ?>
              <div class="text-center py-20 animate-fade-in">
                 <div class="w-20 h-20 bg-green-500/10 border border-green-500/20 rounded-full flex items-center justify-center mx-auto mb-6 animate-pulse">
                    <i data-lucide="check-circle" class="h-10 w-10 text-green-400"></i>
                 </div>
                 <h2 class="text-3xl font-oswald uppercase text-white mb-4 font-bold tracking-wide">Message Sent!</h2>
                 <p class="text-lg text-neutral-300 mb-8 font-light">
                    Thanks for reaching out. We'll get back to you faster than a blue devil at J'ouvert.
                 </p>
                 <a 
                    href="?route=contact"
                    class="text-[var(--gold)] font-bold hover:text-white transition uppercase tracking-widest text-sm flex items-center justify-center group"
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
            <h3 class="text-2xl font-oswald font-bold text-white mb-6 uppercase tracking-wide">Contact Info</h3>
            <div class="space-y-6">
               <div class="flex items-start group">
                  <div class="w-12 h-12 bg-white/5 border border-white/10 rounded-full flex items-center justify-center mr-4 flex-shrink-0 group-hover:scale-110 transition duration-300">
                     <i data-lucide="map-pin" class="w-6 h-6 text-[var(--rust)]"></i>
                  </div>
                  <div>
                     <p class="font-bold text-white uppercase tracking-wide text-sm mb-1">Headquarters & Taproom</p>
                     <p class="text-neutral-400 font-light leading-relaxed">
                        123 Ariapita Avenue,<br/>
                        Woodbrook, Port of Spain,<br/>
                        Trinidad & Tobago
                     </p>
                  </div>
               </div>

               <div class="flex items-start group">
                  <div class="w-12 h-12 bg-white/5 border border-white/10 rounded-full flex items-center justify-center mr-4 flex-shrink-0 group-hover:scale-110 transition duration-300">
                     <i data-lucide="mail" class="w-6 h-6 text-[var(--teal)]"></i>
                  </div>
                  <div>
                     <p class="font-bold text-white uppercase tracking-wide text-sm mb-1">Email Us</p>
                     <a href="mailto:hello@jeffbrewery.com" class="text-neutral-400 font-light hover:text-[var(--gold)] transition block">
                        hello@jeffbrewery.com
                     </a>
                  </div>
               </div>

               <div class="flex items-start group">
                  <div class="w-12 h-12 bg-white/5 border border-white/10 rounded-full flex items-center justify-center mr-4 flex-shrink-0 group-hover:scale-110 transition duration-300">
                     <i data-lucide="phone" class="w-6 h-6 text-[var(--gold)]"></i>
                  </div>
                  <div>
                     <p class="font-bold text-white uppercase tracking-wide text-sm mb-1">Call Us</p>
                     <p class="text-neutral-400 font-light">
                        +1 (868) 555-BREW (2739)
                     </p>
                     <p class="text-xs text-neutral-500 mt-1 font-bold tracking-wider">MON-FRI: 9AM - 6PM</p>
                  </div>
               </div>
            </div>
         </div>

         <!-- GOOGLE MAPS EMBED -->
         <div class="bg-[#111111] border border-white/10 rounded-3xl overflow-hidden shadow-2xl w-full h-[300px] md:h-[450px]">
             <iframe 
                 src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7841.754657685689!2d-61.532609947563984!3d10.666628740644978!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c3608138f3a2e35%3A0x1d965d5b540e262d!2s123%20Ariapita%20Ave%2C%20Port%20of%20Spain!5e0!3m2!1sen!2stt!4v1781461513564!5m2!1sen!2stt" 
                 class="contact-map-iframe"
                 allowfullscreen="" 
                 loading="lazy" 
                 referrerpolicy="no-referrer-when-downgrade"
             ></iframe>
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
