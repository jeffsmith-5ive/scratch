<style>
  .vision-page-wrapper {
    --gold: #D4A017;
    --deep-gold: #A07010;
    --black: #0A0A0A;
    --off-white: #F5F0E8;
    --rust: #C04A1A;
    --green: #1A5C2A;
    --teal: #0A7C6E;
    --cream: #FAF7F0;
    
    background: var(--black);
    color: var(--off-white);
    font-family: 'DM Sans', sans-serif;
    overflow-x: hidden;
  }

  /* ========== HERO ========== */
  .vision-page-wrapper .hero {
    width: 100%;
    min-height: 100vh;
    background: var(--black);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
    padding: 60px 40px;
  }

  .vision-page-wrapper .hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse 80% 60% at 50% 40%, rgba(212,160,23,0.12) 0%, transparent 70%);
    pointer-events: none;
  }

  .vision-page-wrapper .hero-noise {
    position: absolute;
    inset: 0;
    opacity: 0.03;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
    background-size: 200px;
  }

  .vision-page-wrapper .hero-eyebrow {
    font-family: 'DM Sans', sans-serif;
    font-size: 11px;
    font-weight: 500;
    letter-spacing: 0.4em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 24px;
    animation: fadeUp 0.8s ease both;
  }

  .vision-page-wrapper .hero-logo {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(72px, 12vw, 160px);
    line-height: 0.9;
    text-align: center;
    letter-spacing: 0.02em;
    color: var(--off-white);
    animation: fadeUp 0.8s 0.15s ease both;
  }

  .vision-page-wrapper .hero-logo span {
    color: var(--gold);
    display: block;
  }

  .vision-page-wrapper .hero-divider {
    width: 80px;
    height: 2px;
    background: var(--gold);
    margin: 32px auto;
    animation: scaleIn 0.6s 0.4s ease both;
  }

  .vision-page-wrapper .hero-tagline {
    font-family: 'Playfair Display', serif;
    font-style: italic;
    font-size: clamp(18px, 3vw, 28px);
    text-align: center;
    color: var(--off-white);
    opacity: 0.85;
    max-width: 560px;
    line-height: 1.5;
    animation: fadeUp 0.8s 0.5s ease both;
  }

  .vision-page-wrapper .hero-sub {
    margin-top: 20px;
    font-size: 13px;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--gold);
    opacity: 0.7;
    animation: fadeUp 0.8s 0.65s ease both;
  }

  .vision-page-wrapper .hero-scroll {
    margin-top: 60px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    opacity: 0.4;
    animation: fadeUp 0.8s 0.9s ease both;
  }
  .vision-page-wrapper .hero-scroll span { font-size: 10px; letter-spacing: 0.3em; text-transform: uppercase; }
  .vision-page-wrapper .scroll-line {
    width: 1px;
    height: 40px;
    background: var(--gold);
    animation: scrollPulse 2s infinite;
  }

  /* ========== ABOUT ========== */
  .vision-page-wrapper .about {
    background: var(--off-white);
    color: var(--black);
    display: grid;
    grid-template-columns: 1fr 1fr;
    min-height: 70vh;
  }

  .vision-page-wrapper .about-text {
    padding: 80px 60px;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .vision-page-wrapper .section-label {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.5em;
    text-transform: uppercase;
    color: var(--rust);
    margin-bottom: 20px;
  }

  .vision-page-wrapper .about-text h2 {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(48px, 5vw, 72px);
    line-height: 1;
    color: var(--black);
    margin-bottom: 28px;
  }

  .vision-page-wrapper .about-text p {
    font-size: 16px;
    line-height: 1.8;
    color: #333;
    max-width: 440px;
  }

  .vision-page-wrapper .about-text p + p { margin-top: 16px; }

  .vision-page-wrapper .about-stat-row {
    display: flex;
    gap: 40px;
    margin-top: 48px;
    padding-top: 40px;
    border-top: 1px solid #ddd;
  }

  .vision-page-wrapper .stat {
    display: flex;
    flex-direction: column;
    gap: 4px;
  }

  .vision-page-wrapper .stat-num {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 48px;
    line-height: 1;
    color: var(--rust);
  }

  .vision-page-wrapper .stat-label {
    font-size: 11px;
    font-weight: 500;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: #777;
  }

  .vision-page-wrapper .about-visual {
    background: var(--black);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
    padding: 40px;
  }

  .vision-page-wrapper .about-visual::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 60% 40%, rgba(212,160,23,0.15) 0%, transparent 60%);
  }

  .vision-page-wrapper .about-visual-text {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(60px, 8vw, 120px);
    line-height: 0.9;
    text-align: center;
    color: rgba(255,255,255,0.06);
    position: absolute;
    user-select: none;
    letter-spacing: 0.05em;
  }

  .vision-page-wrapper .about-icons {
    position: relative;
    z-index: 1;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    max-width: 300px;
  }

  .vision-page-wrapper .about-icon-box {
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(212,160,23,0.3);
    padding: 24px 20px;
    text-align: center;
    border-radius: 2px;
  }

  .vision-page-wrapper .about-icon-box .icon { font-size: 28px; margin-bottom: 10px; }
  .vision-page-wrapper .about-icon-box .label {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--gold);
  }

  /* ========== BREW COLLECTION ========== */
  .vision-page-wrapper .collection {
    background: var(--black);
    padding: 100px 60px;
  }

  .vision-page-wrapper .collection-header {
    text-align: center;
    margin-bottom: 80px;
  }

  .vision-page-wrapper .collection-header h2 {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(48px, 6vw, 80px);
    letter-spacing: 0.03em;
    color: var(--off-white);
  }

  .vision-page-wrapper .collection-header p {
    margin-top: 16px;
    font-size: 15px;
    color: rgba(255,255,255,0.45);
    letter-spacing: 0.15em;
    text-transform: uppercase;
  }

  .vision-page-wrapper .brew-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 2px;
    max-width: 1300px;
    margin: 0 auto;
  }

  .vision-page-wrapper .brew-card {
    position: relative;
    overflow: hidden;
    aspect-ratio: 4/3;
    cursor: pointer;
    background: #111;
    display: block;
    text-decoration: none;
  }

  .vision-page-wrapper .brew-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    filter: brightness(0.75) saturate(0.9);
  }

  .vision-page-wrapper .brew-card:hover img {
    transform: scale(1.06);
    filter: brightness(0.85) saturate(1.1);
  }

  .vision-page-wrapper .brew-card-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.2) 50%, transparent 100%);
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 24px;
    transition: all 0.4s ease;
  }

  .vision-page-wrapper .brew-style {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 0.4em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 6px;
  }

  .vision-page-wrapper .brew-name {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 28px;
    letter-spacing: 0.04em;
    line-height: 1;
    color: #fff;
  }

  .vision-page-wrapper .brew-tagline {
    font-family: 'Playfair Display', serif;
    font-style: italic;
    font-size: 12px;
    color: rgba(255,255,255,0.55);
    margin-top: 6px;
    transform: translateY(10px);
    opacity: 0;
    transition: all 0.4s ease;
  }

  .vision-page-wrapper .brew-card:hover .brew-tagline {
    transform: translateY(0);
    opacity: 1;
  }

  .vision-page-wrapper .brew-card.featured {
    grid-column: span 2;
    aspect-ratio: 16/7;
  }

  /* ========== EXPERIENCE ========== */
  .vision-page-wrapper .experience {
    background: var(--cream);
    color: var(--black);
    padding: 100px 60px;
  }

  .vision-page-wrapper .experience-inner {
    max-width: 1200px;
    margin: 0 auto;
  }

  .vision-page-wrapper .experience h2 {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(48px, 6vw, 80px);
    margin-bottom: 60px;
    line-height: 1;
  }

  .vision-page-wrapper .experience h2 em {
    font-family: 'Playfair Display', serif;
    font-style: italic;
    color: var(--rust);
  }

  .vision-page-wrapper .pillars {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 40px;
  }

  .vision-page-wrapper .pillar {
    display: flex;
    flex-direction: column;
    gap: 16px;
  }

  .vision-page-wrapper .pillar-num {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 64px;
    line-height: 1;
    color: rgba(0,0,0,0.06);
  }

  .vision-page-wrapper .pillar-icon { font-size: 32px; }

  .vision-page-wrapper .pillar h3 {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 22px;
    letter-spacing: 0.05em;
  }

  .vision-page-wrapper .pillar p {
    font-size: 14px;
    line-height: 1.7;
    color: #555;
  }

  .vision-page-wrapper .pillar-bar {
    width: 40px;
    height: 3px;
    background: var(--rust);
    margin-top: 4px;
  }

  /* ========== PARTNER SECTION ========== */
  .vision-page-wrapper .partner {
    background: var(--gold);
    color: var(--black);
    padding: 80px 60px;
    display: flex;
    align-items: center;
    gap: 80px;
    max-width: 100%;
  }

  .vision-page-wrapper .partner-text { flex: 1; }

  .vision-page-wrapper .partner-text h2 {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(40px, 5vw, 64px);
    line-height: 1;
    margin-bottom: 20px;
  }

  .vision-page-wrapper .partner-text p {
    font-size: 15px;
    line-height: 1.7;
    color: rgba(0,0,0,0.65);
    max-width: 480px;
  }

  .vision-page-wrapper .partner-list {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 0;
  }

  .vision-page-wrapper .partner-item {
    padding: 20px 0;
    border-bottom: 1px solid rgba(0,0,0,0.15);
    display: flex;
    align-items: center;
    gap: 16px;
    font-weight: 700;
    font-size: 15px;
    letter-spacing: 0.05em;
    text-transform: uppercase;
  }

  .vision-page-wrapper .partner-item:first-child { border-top: 1px solid rgba(0,0,0,0.15); }
  .vision-page-wrapper .partner-item .dot { width: 8px; height: 8px; background: var(--black); border-radius: 50%; flex-shrink: 0; }

  /* ========== ANIMATIONS ========== */
  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @keyframes scaleIn {
    from { transform: scaleX(0); }
    to { transform: scaleX(1); }
  }

  @keyframes scrollPulse {
    0%, 100% { opacity: 0.4; transform: scaleY(1); }
    50% { opacity: 1; transform: scaleY(1.2); }
  }

  /* ==============================
     CALL TO ACTION STRIP
  ============================== */
  .vision-page-wrapper .cta-strip {
    background: var(--gold);
    color: var(--black);
    padding: 64px 80px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 40px;
    flex-wrap: wrap;
  }

  .vision-page-wrapper .cta-strip h2 {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(36px, 4vw, 56px);
    line-height: 1;
    max-width: 500px;
  }

  .vision-page-wrapper .cta-strip h2 em {
    font-family: 'Playfair Display', serif;
    font-style: italic;
  }

  .vision-page-wrapper .cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 14px;
    padding: 18px 36px;
    background: var(--black);
    color: var(--gold);
    font-family: 'Bebas Neue', sans-serif;
    font-size: 18px;
    letter-spacing: 0.15em;
    text-decoration: none;
    border: none;
    cursor: pointer;
    transition: background 0.3s ease;
    flex-shrink: 0;
  }

  .vision-page-wrapper .cta-btn:hover { background: #1a1a1a; }
  .vision-page-wrapper .cta-btn .arrow { font-size: 20px; transition: transform 0.3s ease; }
  .vision-page-wrapper .cta-btn:hover .arrow { transform: translateX(4px); }

  /* ========== RESPONSIVE ========== */
  @media (max-width: 900px) {
    .vision-page-wrapper .about { grid-template-columns: 1fr; }
    .vision-page-wrapper .about-visual { min-height: 300px; }
    .vision-page-wrapper .about-text { padding: 60px 40px; }
    .vision-page-wrapper .pillars { grid-template-columns: 1fr 1fr; }
    .vision-page-wrapper .partner { flex-direction: column; gap: 40px; }
    .vision-page-wrapper .brew-card.featured { grid-column: span 1; aspect-ratio: 4/3; }
    .vision-page-wrapper .collection { padding: 80px 30px; }
  }

  @media (max-width: 600px) {
    .vision-page-wrapper .about-text { padding: 40px 24px; }
    .vision-page-wrapper .collection { padding: 60px 16px; }
    .vision-page-wrapper .brew-grid { grid-template-columns: 1fr; }
    .vision-page-wrapper .pillars { grid-template-columns: 1fr; }
    .vision-page-wrapper .partner { padding: 60px 24px; }
    .vision-page-wrapper .experience { padding: 60px 24px; }
    .vision-page-wrapper .hero-scroll { display: none; }
  }
</style>

<div class="vision-page-wrapper">
  <!-- HERO -->
  <section class="hero">
    <div class="hero-noise"></div>
    <div class="hero-eyebrow">Trinidad & Tobago · Est 2026 · Jeff Brewery Industries</div>
    <div class="hero-logo">
      JEFF<span>BREWERY</span>
    </div>
    <div class="hero-divider"></div>
    <div class="hero-tagline">Caribbean innovation in a bottle — where rhythm, identity and bold flavour engineering collide.</div>
    <div class="hero-sub">Drink the Vision. Live the Culture.</div>
    <div class="hero-scroll">
      <span>Explore</span>
      <div class="scroll-line"></div>
    </div>
  </section>

  <!-- ABOUT -->
  <section class="about">
    <div class="about-text">
      <div class="section-label">Who We Are</div>
      <h2>BORN FROM GRIT.<br>BUILT ON CULTURE.</h2>
      <p>Jeff Brewery Industries is a next-generation Trinbagonian craft brewery fusing Caribbean culture, bold flavour engineering, and modern brewing science.</p>
      <p>We don't just make beer — we design experiences rooted in rhythm, identity, and innovation. Built from vision, not privilege — this brand represents grit, culture, and legacy in the making.</p>
      <div class="about-stat-row">
        <div class="stat">
          <div class="stat-num">10</div>
          <div class="stat-label">Signature Brews</div>
        </div>
        <div class="stat">
          <div class="stat-num">TT</div>
          <div class="stat-label">Trinbagonian Soul</div>
        </div>
        <div class="stat">
          <div class="stat-num">∞</div>
          <div class="stat-label">Caribbean to Global</div>
        </div>
      </div>
    </div>
    <div class="about-visual">
      <div class="about-visual-text">JEFF<br>BREWERY</div>
      <div class="about-icons">
        <div class="about-icon-box">
          <div class="icon">🎶</div>
          <div class="label">Soca Soul</div>
        </div>
        <div class="about-icon-box">
          <div class="icon">🌴</div>
          <div class="label">Island Roots</div>
        </div>
        <div class="about-icon-box">
          <div class="icon">🧠</div>
          <div class="label">AI-Powered</div>
        </div>
        <div class="about-icon-box">
          <div class="icon">🎮</div>
          <div class="label">Krewe Loyalty</div>
        </div>
      </div>
    </div>
  </section>

  <!-- BREW COLLECTION -->
  <section class="collection">
    <div class="collection-header">
      <div class="section-label" style="color:rgba(212,160,23,0.7)">The Lineup</div>
      <h2>OUR SIGNATURE BREWS</h2>
      <p>Ten expressions. One island. Unlimited vibes.</p>
    </div>

    <div class="brew-grid">
      <?php
      $styleMap = [
          'island-ipa' => 'India Pale Ale',
          'jouvert-lager' => 'Premium Lager',
          'bitter-truth' => 'Imperial Stout',
          'ocd-saison' => 'Belgian Saison',
          'soca-sorrel' => 'Sorrel Fruit Ale',
          'sugarcane-kolsch' => 'Sugarcane Kölsch',
          'tamarind-gose' => 'Tropical Gose',
          'maracas-mist' => 'Tropical Wheat',
          'soca-starter' => 'Session IPA',
          'midnight-robber' => 'Chocolate Stout',
      ];
      ?>
      <?php foreach ($beers as $beer): ?>
        <?php 
          $isFeatured = ($beer['id'] === 'island-ipa');
          $displayStyle = $styleMap[$beer['id']] ?? ($beer['style'] . ' Ale');
        ?>
        <a href="?route=shop/detail&id=<?= urlencode($beer['id']) ?>" class="brew-card<?= $isFeatured ? ' featured' : '' ?>">
          <img src="<?= htmlspecialchars($beer['image']) ?>" alt="<?= htmlspecialchars($beer['name']) ?>" />
          <div class="brew-card-overlay">
            <div class="brew-style"><?= htmlspecialchars($displayStyle) ?> · <?= number_format((float)$beer['abv'], 1) ?>% ABV</div>
            <div class="brew-name"><?= htmlspecialchars($beer['name']) ?></div>
            <div class="brew-tagline"><?= htmlspecialchars($beer['tagline']) ?></div>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- ========== EXPERIENCE ========== -->
  <section class="experience">
    <div class="experience-inner">
      <h2>THE <em>PILLARS</em> OF OUR BRAND</h2>
      <div class="pillars">
        <div class="pillar">
          <div class="pillar-num">01</div>
          <div class="pillar-icon">🎶</div>
          <h3>Cultural Soul</h3>
          <p>We bottle the rhythm of steelpan notes, the energy of J'ouvert, and the slow lime of Woodbrook into every ferment.</p>
          <div class="pillar-bar"></div>
        </div>
        <div class="pillar">
          <div class="pillar-num">02</div>
          <div class="pillar-icon">🌴</div>
          <h3>Flavour Alchemy</h3>
          <p>By sourcing local sorrel, mango, cocoa, and ginger, we build a craft beer portfolio with authentic Trinbagonian roots.</p>
          <div class="pillar-bar"></div>
        </div>
        <div class="pillar">
          <div class="pillar-num">03</div>
          <div class="pillar-icon">🧠</div>
          <h3>AI & Precision</h3>
          <p>We use state-of-the-art brewing metrics and AI-guided flavor discovery to refine recipes to perfect consistency.</p>
          <div class="pillar-bar"></div>
        </div>
        <div class="pillar">
          <div class="pillar-num">04</div>
          <div class="pillar-icon">🎮</div>
          <h3>Krewe Community</h3>
          <p>Our gamified Krewe loyalty program rewards the community, bringing together limers, collectors, and beer lovers.</p>
          <div class="pillar-bar"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== PARTNER SECTION ========== -->
  <section class="partner">
    <div class="partner-text">
      <h2>BECOME A PARTNER.</h2>
      <p>Distribute the vision, share the vibes. We are actively expanding our retail, distribution, and export network across the region and global markets.</p>
    </div>
    <div class="partner-list">
      <div class="partner-item">
        <div class="dot"></div>
        Bars & Lounges
      </div>
      <div class="partner-item">
        <div class="dot"></div>
        Retailers & Grocers
      </div>
      <div class="partner-item">
        <div class="dot"></div>
        International Exporters
      </div>
    </div>
  </section>

    <!-- ============================
       CTA STRIP
  ============================= -->
  <div class="cta-strip">
    <h2>READY TO <em>TASTE</em> THE VISION?</h2>
    <a href="?route=shop" class="cta-btn">
      Explore Our Brews
      <span class="arrow">→</span>
    </a>
  </div>
</div>
