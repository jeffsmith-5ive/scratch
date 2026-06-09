<style>
  .about-page-wrapper {
    --gold: #D4A017;
    --deep-gold: #A07010;
    --black: #0A0A0A;
    --off-white: #F5F0E8;
    --rust: #C04A1A;
    --teal: #0A7C6E;
    --cream: #FAF7F0;
    --dark-panel: #111111;
    
    background: var(--black);
    color: var(--off-white);
    font-family: 'DM Sans', sans-serif;
    overflow-x: hidden;
  }

  /* ==============================
     HERO — PORT OF SPAIN
  ============================== */
  .about-page-wrapper .story-hero {
    width: 100%;
    height: 100vh;
    min-height: 600px;
    position: relative;
    display: flex;
    align-items: flex-end;
    overflow: hidden;
  }

  /* Background: rich dark gradient simulating Port of Spain at dusk */
  .about-page-wrapper .story-hero-bg {
    position: absolute;
    inset: 0;
    background:
      radial-gradient(ellipse 60% 50% at 70% 30%, rgba(212,160,23,0.18) 0%, transparent 60%),
      radial-gradient(ellipse 80% 60% at 20% 70%, rgba(192,74,26,0.10) 0%, transparent 55%),
      linear-gradient(160deg, #1a0f00 0%, #0A0A0A 60%, #050505 100%);
  }

  /* Cityscape SVG silhouette */
  .about-page-wrapper .story-hero-city {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 55%;
  }

  .about-page-wrapper .story-hero-glow {
    position: absolute;
    bottom: 30%;
    left: 0; right: 0;
    height: 2px;
    background: linear-gradient(to right, transparent, rgba(212,160,23,0.3), rgba(192,74,26,0.2), transparent);
    filter: blur(6px);
  }

  .about-page-wrapper .story-hero-content {
    position: relative;
    z-index: 10;
    padding: 0 80px 100px;
    max-width: 820px;
  }

  .about-page-wrapper .story-hero-eyebrow {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.5em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 20px;
    animation: fadeUp 0.8s ease both;
  }

  .about-page-wrapper .story-hero-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(72px, 10vw, 140px);
    line-height: 0.9;
    letter-spacing: 0.02em;
    color: var(--off-white);
    animation: fadeUp 0.8s 0.15s ease both;
  }

  .about-page-wrapper .story-hero-title em {
    font-family: 'Playfair Display', serif;
    font-style: italic;
    color: var(--gold);
    font-size: 0.7em;
    display: block;
    letter-spacing: 0;
    margin-top: 8px;
  }

  .about-page-wrapper .story-hero-sub {
    margin-top: 28px;
    font-size: 17px;
    font-weight: 300;
    line-height: 1.6;
    color: rgba(245,240,232,0.6);
    max-width: 420px;
    animation: fadeUp 0.8s 0.35s ease both;
  }

  .about-page-wrapper .hero-scroll-line {
    position: absolute;
    right: 60px;
    bottom: 60px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    opacity: 0.4;
  }
  .about-page-wrapper .hero-scroll-line span {
    font-size: 9px;
    letter-spacing: 0.4em;
    text-transform: uppercase;
    writing-mode: vertical-rl;
    color: var(--gold);
  }
  .about-page-wrapper .scroll-bar {
    width: 1px;
    height: 60px;
    background: var(--gold);
    animation: scrollPulse 2s infinite;
  }

  /* ==============================
     BEGINNING SECTION
  ============================== */
  .about-page-wrapper .beginning {
    background: var(--cream);
    color: var(--black);
    display: grid;
    grid-template-columns: 1fr 1fr;
    min-height: 80vh;
  }

  .about-page-wrapper .beginning-text {
    padding: 100px 80px;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .about-page-wrapper .section-label {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.5em;
    text-transform: uppercase;
    color: var(--rust);
    margin-bottom: 20px;
  }

  .about-page-wrapper .section-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(40px, 4.5vw, 64px);
    line-height: 1;
    color: var(--black);
    margin-bottom: 32px;
  }

  .about-page-wrapper .section-body {
    font-size: 17px;
    font-weight: 300;
    line-height: 1.85;
    color: #3a3a3a;
    max-width: 440px;
  }

  .about-page-wrapper .section-body strong {
    font-weight: 700;
    color: var(--black);
  }

  .about-page-wrapper .year-badge {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    margin-top: 40px;
    padding: 14px 24px;
    background: var(--black);
    color: var(--gold);
    font-family: 'Bebas Neue', sans-serif;
    font-size: 22px;
    letter-spacing: 0.15em;
    border-radius: 2px;
  }
  .about-page-wrapper .year-badge .dot { width: 6px; height: 6px; background: var(--gold); border-radius: 50%; }

  /* Photo side of Beginning */
  .about-page-wrapper .beginning-visual {
    position: relative;
    overflow: hidden;
    background: var(--dark-panel);
  }

  .about-page-wrapper .beginning-visual-inner {
    position: absolute;
    inset: 0;
    background:
      linear-gradient(135deg, rgba(212,160,23,0.08) 0%, transparent 50%),
      var(--dark-panel);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    gap: 0;
  }

  /* Stacked frames design */
  .about-page-wrapper .photo-stack {
    position: relative;
    width: 280px;
    height: 340px;
  }

  .about-page-wrapper .photo-frame {
    position: absolute;
    border: 1px solid rgba(212,160,23,0.3);
    background: rgba(255,255,255,0.03);
  }

  .about-page-wrapper .photo-frame:nth-child(1) {
    inset: 0;
    transform: rotate(-4deg);
  }
  .about-page-wrapper .photo-frame:nth-child(2) {
    inset: 16px;
    transform: rotate(2deg);
    border-color: rgba(192,74,26,0.3);
  }
  .about-page-wrapper .photo-frame:nth-child(3) {
    inset: 32px;
    transform: rotate(-1deg);
    background: rgba(212,160,23,0.05);
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .about-page-wrapper .photo-frame-text {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 48px;
    color: rgba(212,160,23,0.4);
    text-align: center;
    line-height: 1.1;
    letter-spacing: 0.05em;
    padding: 20px;
  }

  .about-page-wrapper .beginning-location {
    position: absolute;
    bottom: 40px;
    left: 40px;
    right: 40px;
    padding: 20px 24px;
    background: rgba(212,160,23,0.08);
    border-left: 2px solid var(--gold);
  }

  .about-page-wrapper .beginning-location .loc-label {
    font-size: 9px;
    letter-spacing: 0.4em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 6px;
  }
  .about-page-wrapper .beginning-location .loc-name {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 24px;
    letter-spacing: 0.05em;
    color: var(--off-white);
  }
  .about-page-wrapper .beginning-location .loc-sub {
    font-size: 12px;
    color: rgba(245,240,232,0.4);
    margin-top: 2px;
  }

  /* ==============================
     PHILOSOPHY SECTION
  ============================== */
  .about-page-wrapper .philosophy {
    background: var(--black);
    padding: 120px 80px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 100px;
    align-items: center;
    max-width: 1400px;
    margin: 0 auto;
  }

  .about-page-wrapper .philosophy-visual {
    position: relative;
  }

  .about-page-wrapper .philosophy-quote-block {
    position: relative;
    padding: 60px 48px;
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(212,160,23,0.15);
    overflow: hidden;
  }

  .about-page-wrapper .philosophy-quote-block::before {
    content: '"';
    position: absolute;
    top: -20px;
    left: 24px;
    font-family: 'Playfair Display', serif;
    font-size: 180px;
    color: rgba(212,160,23,0.08);
    line-height: 1;
    pointer-events: none;
  }

  .about-page-wrapper .philosophy-quote-block blockquote {
    font-family: 'Playfair Display', serif;
    font-style: italic;
    font-size: clamp(20px, 2.5vw, 28px);
    line-height: 1.6;
    color: var(--off-white);
    position: relative;
    z-index: 1;
  }

  .about-page-wrapper .philosophy-quote-block cite {
    display: block;
    margin-top: 24px;
    font-family: 'DM Sans', sans-serif;
    font-style: normal;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.3em;
    text-transform: uppercase;
    color: var(--gold);
  }

  .about-page-wrapper .philosophy-accent {
    position: absolute;
    bottom: -20px;
    right: -20px;
    width: 80px;
    height: 80px;
    background: var(--rust);
    opacity: 0.6;
    mix-blend-mode: screen;
  }

  .about-page-wrapper .philosophy-ingredients {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 32px;
  }

  .about-page-wrapper .ingredient-chip {
    padding: 8px 16px;
    border: 1px solid rgba(212,160,23,0.3);
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--gold);
    border-radius: 1px;
    background: rgba(212,160,23,0.05);
  }

  /* ==============================
     TIMELINE
  ============================== */
  .about-page-wrapper .timeline-section {
    background: var(--cream);
    color: var(--black);
    padding: 100px 80px;
    overflow: hidden;
  }

  .about-page-wrapper .timeline-header {
    margin-bottom: 72px;
  }

  .about-page-wrapper .timeline-header h2 {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(48px, 6vw, 80px);
    line-height: 1;
    color: var(--black);
  }

  .about-page-wrapper .timeline {
    position: relative;
    max-width: 900px;
  }

  .about-page-wrapper .timeline::before {
    content: '';
    position: absolute;
    left: 0;
    top: 8px;
    bottom: 8px;
    width: 1px;
    background: linear-gradient(to bottom, var(--rust), var(--gold), var(--teal));
  }

  .about-page-wrapper .timeline-item {
    position: relative;
    padding: 0 0 56px 56px;
  }

  .about-page-wrapper .timeline-item:last-child { padding-bottom: 0; }

  .about-page-wrapper .timeline-dot {
    position: absolute;
    left: -6px;
    top: 6px;
    width: 13px;
    height: 13px;
    background: var(--rust);
    border: 2px solid var(--cream);
    border-radius: 50%;
  }

  .about-page-wrapper .timeline-year {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 13px;
    letter-spacing: 0.3em;
    color: var(--rust);
    margin-bottom: 8px;
  }

  .about-page-wrapper .timeline-event {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 26px;
    letter-spacing: 0.03em;
    color: var(--black);
    margin-bottom: 10px;
  }

  .about-page-wrapper .timeline-desc {
    font-size: 15px;
    font-weight: 300;
    line-height: 1.7;
    color: #555;
    max-width: 560px;
  }

  /* ==============================
     TEAM SECTION
  ============================== */
  .about-page-wrapper .team {
    background: var(--black);
    padding: 120px 80px;
    position: relative;
    overflow: hidden;
  }

  .about-page-wrapper .team::before {
    content: 'CREW';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(120px, 18vw, 260px);
    color: rgba(255,255,255,0.025);
    white-space: nowrap;
    pointer-events: none;
    letter-spacing: 0.1em;
  }

  .about-page-wrapper .team-header {
    text-align: center;
    margin-bottom: 80px;
    position: relative;
  }

  .about-page-wrapper .team-header h2 {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(48px, 6vw, 80px);
    letter-spacing: 0.04em;
    color: var(--off-white);
    margin-bottom: 12px;
  }

  .about-page-wrapper .team-header p {
    font-family: 'Playfair Display', serif;
    font-style: italic;
    font-size: 18px;
    color: rgba(245,240,232,0.4);
  }

  .about-page-wrapper .team-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2px;
    max-width: 1100px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
  }

  .about-page-wrapper .team-card {
    background: var(--dark-panel);
    padding: 56px 40px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    position: relative;
    overflow: hidden;
    transition: background 0.4s ease;
  }

  .about-page-wrapper .team-card:hover { background: #161616; }

  .about-page-wrapper .team-card::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; right: 0;
    height: 2px;
    background: linear-gradient(to right, var(--rust), var(--gold));
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  }

  .about-page-wrapper .team-card:hover::after { transform: scaleX(1); }

  .about-page-wrapper .team-avatar {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: rgba(212,160,23,0.1);
    border: 1px solid rgba(212,160,23,0.25);
    margin-bottom: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Bebas Neue', sans-serif;
    font-size: 32px;
    color: var(--gold);
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
  }

  .about-page-wrapper .team-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
    display: block;
  }

  .about-page-wrapper .team-name {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 32px;
    letter-spacing: 0.04em;
    color: var(--off-white);
    margin-bottom: 6px;
  }

  .about-page-wrapper .team-role {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.4em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 20px;
  }

  .about-page-wrapper .team-bio {
    font-size: 14px;
    font-weight: 300;
    line-height: 1.75;
    color: rgba(245,240,232,0.4);
  }

  /* ==============================
     CALL TO ACTION STRIP
  ============================== */
  .about-page-wrapper .cta-strip {
    background: var(--gold);
    color: var(--black);
    padding: 64px 80px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 40px;
    flex-wrap: wrap;
  }

  .about-page-wrapper .cta-strip h2 {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(36px, 4vw, 56px);
    line-height: 1;
    max-width: 500px;
  }

  .about-page-wrapper .cta-strip h2 em {
    font-family: 'Playfair Display', serif;
    font-style: italic;
  }

  .about-page-wrapper .cta-btn {
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

  .about-page-wrapper .cta-btn:hover { background: #1a1a1a; }
  .about-page-wrapper .cta-btn .arrow { font-size: 20px; transition: transform 0.3s ease; }
  .about-page-wrapper .cta-btn:hover .arrow { transform: translateX(4px); }

  /* ==============================
     ANIMATIONS
  ============================== */
  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(28px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @keyframes scrollPulse {
    0%, 100% { opacity: 0.5; transform: scaleY(1); }
    50% { opacity: 1; transform: scaleY(1.15); }
  }

  /* Scroll-triggered reveals */
  .about-page-wrapper .reveal {
    opacity: 0;
    transform: translateY(32px);
    transition: opacity 0.7s ease, transform 0.7s ease;
  }
  .about-page-wrapper .reveal.visible {
    opacity: 1;
    transform: translateY(0);
  }
  .about-page-wrapper .reveal-delay-1 { transition-delay: 0.1s; }
  .about-page-wrapper .reveal-delay-2 { transition-delay: 0.2s; }
  .about-page-wrapper .reveal-delay-3 { transition-delay: 0.3s; }

  /* ==============================
     RESPONSIVE
  ============================== */
  @media (max-width: 960px) {
    .about-page-wrapper .beginning { grid-template-columns: 1fr; }
    .about-page-wrapper .beginning-visual { min-height: 400px; }
    .about-page-wrapper .beginning-text { padding: 70px 40px; }
    .about-page-wrapper .philosophy { grid-template-columns: 1fr; padding: 80px 40px; gap: 56px; }
    .about-page-wrapper .timeline-section { padding: 80px 40px; }
    .about-page-wrapper .team { padding: 80px 40px; }
    .about-page-wrapper .team-grid { grid-template-columns: 1fr 1fr; }
    .about-page-wrapper .cta-strip { padding: 56px 40px; }
    .about-page-wrapper .story-hero-content { padding: 0 40px 80px; }
  }

  @media (max-width: 600px) {
    .about-page-wrapper .story-hero-content { padding: 0 24px 60px; }
    .about-page-wrapper .beginning-text { padding: 56px 24px; }
    .about-page-wrapper .philosophy { padding: 60px 24px; }
    .about-page-wrapper .timeline-section { padding: 60px 24px; }
    .about-page-wrapper .team { padding: 60px 24px; }
    .about-page-wrapper .team-grid { grid-template-columns: 1fr; }
    .about-page-wrapper .cta-strip { padding: 48px 24px; flex-direction: column; align-items: flex-start; }
    .about-page-wrapper .hero-scroll-line { display: none; }
  }
</style>

<div class="about-page-wrapper">
  <!-- ============================
       HERO
  ============================= -->
  <section class="story-hero">
    <div class="story-hero-bg"></div>

    <!-- Port of Spain cityscape SVG silhouette -->
    <svg class="story-hero-city" viewBox="0 0 1440 400" preserveAspectRatio="xMidYMax meet" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <linearGradient id="skyGrad" x1="0" y1="0" x2="0" y2="1">
          <stop offset="0%" stop-color="#D4A017" stop-opacity="0.18"/>
          <stop offset="60%" stop-color="#C04A1A" stop-opacity="0.08"/>
          <stop offset="100%" stop-color="#0A0A0A" stop-opacity="0"/>
        </linearGradient>
        <linearGradient id="cityGrad" x1="0" y1="0" x2="0" y2="1">
          <stop offset="0%" stop-color="#1a1208" stop-opacity="0.9"/>
          <stop offset="100%" stop-color="#0A0A0A" stop-opacity="1"/>
        </linearGradient>
      </defs>
      <!-- Sky glow -->
      <ellipse cx="720" cy="250" rx="500" ry="120" fill="url(#skyGrad)"/>
      <!-- Cityscape silhouette - Port of Spain inspired -->
      <g fill="url(#cityGrad)">
        <!-- Left hills / greenery -->
        <path d="M0 400 Q80 280 160 300 Q240 280 320 300 L320 400Z"/>
        <!-- Northern Range hills in BG -->
        <path d="M200 400 Q350 220 500 240 Q650 220 800 250 Q950 220 1100 240 Q1250 220 1440 260 L1440 400Z" opacity="0.5"/>
        <!-- Buildings left cluster -->
        <rect x="60" y="310" width="28" height="90" rx="1"/>
        <rect x="92" y="295" width="20" height="105" rx="1"/>
        <rect x="116" y="320" width="16" height="80" rx="1"/>
        <rect x="136" y="305" width="24" height="95" rx="1"/>
        <!-- Central towers - Twin Towers of POS inspired -->
        <rect x="560" y="240" width="38" height="160" rx="1"/>
        <rect x="602" y="260" width="36" height="140" rx="1"/>
        <!-- Antenna on towers -->
        <rect x="576" y="228" width="3" height="16" rx="1" fill="#D4A017" opacity="0.5"/>
        <rect x="616" y="246" width="3" height="16" rx="1" fill="#D4A017" opacity="0.5"/>
        <!-- Mid buildings -->
        <rect x="650" y="290" width="30" height="110" rx="1"/>
        <rect x="684" y="275" width="24" height="125" rx="1"/>
        <rect x="712" y="300" width="20" height="100" rx="1"/>
        <!-- Eric Williams Financial Complex inspired -->
        <rect x="740" y="255" width="55" height="145" rx="1"/>
        <rect x="799" y="270" width="40" height="130" rx="1"/>
        <rect x="843" y="290" width="28" height="110" rx="1"/>
        <!-- Right cluster -->
        <rect x="900" y="310" width="22" height="90" rx="1"/>
        <rect x="926" y="295" width="30" height="105" rx="1"/>
        <rect x="960" y="320" width="18" height="80" rx="1"/>
        <rect x="982" y="305" width="26" height="95" rx="1"/>
        <rect x="1012" y="330" width="20" height="70" rx="1"/>
        <!-- Far right -->
        <rect x="1100" y="315" width="24" height="85" rx="1"/>
        <rect x="1128" y="300" width="18" height="100" rx="1"/>
        <rect x="1150" y="325" width="22" height="75" rx="1"/>
        <!-- Ground fill -->
        <rect x="0" y="380" width="1440" height="20"/>
        <!-- Water reflection at bottom -->
        <path d="M0 390 Q360 375 720 385 Q1080 395 1440 380 L1440 400 L0 400Z" fill="#0A0A0A"/>
      </g>
      <!-- Windows / lights in buildings -->
      <g fill="#D4A017" opacity="0.15">
        <rect x="567" y="250" width="4" height="4"/>
        <rect x="575" y="250" width="4" height="4"/>
        <rect x="567" y="260" width="4" height="4"/>
        <rect x="575" y="268" width="4" height="4"/>
        <rect x="608" y="268" width="4" height="4"/>
        <rect x="616" y="275" width="4" height="4"/>
        <rect x="750" y="265" width="5" height="5"/>
        <rect x="762" y="272" width="5" height="5"/>
        <rect x="774" y="265" width="5" height="5"/>
        <rect x="750" y="282" width="5" height="5"/>
        <rect x="762" y="290" width="5" height="5"/>
        <rect x="806" y="278" width="4" height="4"/>
        <rect x="816" y="284" width="4" height="4"/>
      </g>
    </svg>

    <div class="story-hero-glow"></div>

    <div class="story-hero-content">
      <div class="story-hero-eyebrow">Jeff Brewery Industries · Est. 2026</div>
      <div class="story-hero-title">
        OUR
        <em>Story.</em>
      </div>
      <p class="story-hero-sub">From a backyard in <strong style="color:var(--gold)">Woodbrook</strong> to the world — how one island's flavour, rhythm and grit became a brewery.</p>
    </div>

    <div class="hero-scroll-line">
      <span>Scroll</span>
      <div class="scroll-bar"></div>
    </div>
  </section>

  <!-- ============================
       THE BEGINNING
  ============================= -->
  <section class="beginning">
    <div class="beginning-text">
      <div class="section-label reveal">The Beginning</div>
      <h2 class="section-title reveal reveal-delay-1">FROM A GARAGE IN WOODBROOK.</h2>
      <p class="section-body reveal reveal-delay-2">
        Jeff Brewery Industries started in <strong>2026</strong> when our founder, Jeff, decided that the Caribbean heat needed more than just the standard commercial lagers.
        <br><br>
        Inspired by the rich culinary history of Trinidad & Tobago — the spices, the fruits, the rhythm — he began experimenting with home brewing kits in his garage in Woodbrook, chasing a taste that felt <strong>truly Trinbagonian</strong>.
      </p>
      <div class="year-badge reveal reveal-delay-3">
        <div class="dot"></div>
        WOODBROOK, POS · 2026
      </div>
    </div>

    <div class="beginning-visual">
      <div class="beginning-visual-inner">
        <div class="photo-stack">
          <div class="photo-frame"></div>
          <div class="photo-frame"></div>
          <div class="photo-frame">
            <div class="photo-frame-text">WHERE<br>IT ALL<br>BEGAN</div>
          </div>
        </div>
        <div class="beginning-location">
          <div class="loc-label">Origin</div>
          <div class="loc-name">Port of Spain, T&T</div>
          <div class="loc-sub">Woodbrook · The garage that started it all</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================
       PHILOSOPHY
  ============================= -->
  <section style="background:var(--black); padding: 20px 0;">
    <div class="philosophy">
      <div class="philosophy-visual">
        <div class="philosophy-quote-block reveal">
          <blockquote>
            "Every sip should transport you — a lime on the avenue, a quiet evening on the beach, or the chaotic joy of J'ouvert."
          </blockquote>
          <cite>— Jeff, Head Brewer & Founder</cite>
        </div>
        <div class="philosophy-accent"></div>

        <div class="philosophy-ingredients reveal reveal-delay-1">
          <div class="ingredient-chip">Sorrel</div>
          <div class="ingredient-chip">Passion Fruit</div>
          <div class="ingredient-chip">Tamarind</div>
          <div class="ingredient-chip">Cocoa</div>
          <div class="ingredient-chip">Sugarcane</div>
          <div class="ingredient-chip">Sea Salt</div>
          <div class="ingredient-chip">Orange</div>
          <div class="ingredient-chip">Lime</div>
        </div>
      </div>

      <div class="philosophy-text">
        <div class="section-label reveal" style="color:rgba(212,160,23,0.7)">Our Philosophy</div>
        <h2 class="section-title reveal reveal-delay-1" style="color:var(--off-white)">BEER IS A STORYTELLER.</h2>
        <p class="section-body reveal reveal-delay-2" style="color:rgba(245,240,232,0.55); max-width:100%;">
          We believe beer is more than a beverage — it's a narrative. We use local ingredients like sorrel, passion fruit, and cocoa to ensure every batch has a <strong style="color:var(--off-white)">true Trinbagonian soul.</strong>
          <br><br>
          Every brew in our lineup is engineered around a moment, a character, a place from our culture. From the pre-dawn roads of J'ouvert to the salty breeze at Maracas Bay — we brew the island into every bottle.
        </p>
      </div>
    </div>
  </section>

  <!-- ============================
       TIMELINE
  ============================= -->
  <section class="timeline-section">
    <div class="timeline-header">
      <div class="section-label">The Journey</div>
      <h2 class="section-title">HOW WE GOT HERE.</h2>
    </div>

    <div class="timeline">
      <div class="timeline-item reveal">
        <div class="timeline-dot"></div>
        <div class="timeline-year">2026 — Year One</div>
        <div class="timeline-event">THE GARAGE BEGINS</div>
        <p class="timeline-desc">Jeff starts home brewing in Woodbrook, experimenting with Caribbean ingredients and European techniques. The first batch of what would become the Island IPA is poured.</p>
      </div>

      <div class="timeline-item reveal reveal-delay-1">
        <div class="timeline-dot" style="background:var(--gold)"></div>
        <div class="timeline-year">2026 — Mid Year</div>
        <div class="timeline-event">THE LINEUP TAKES SHAPE</div>
        <p class="timeline-desc">Ten signature brews are conceptualized — each named after a cultural touchstone of Trinbagonian life. The Midnight Robber, Maracas Mist, and Soca Sorrel Ale are born.</p>
      </div>

      <div class="timeline-item reveal reveal-delay-2">
        <div class="timeline-dot" style="background:var(--teal)"></div>
        <div class="timeline-year">2026 — Present</div>
        <div class="timeline-event">JEFF BREWERY INDUSTRIES</div>
        <p class="timeline-desc">The brand launches with a full product lineup, a gamified Krewe loyalty system, and an AI-powered engagement platform. Caribbean craft beer is now a global conversation.</p>
      </div>

      <div class="timeline-item reveal reveal-delay-3">
        <div class="timeline-dot" style="background:var(--gold); border-color:var(--cream);"></div>
        <div class="timeline-year">Next Chapter</div>
        <div class="timeline-event">CARIBBEAN → GLOBAL MARKETS</div>
        <p class="timeline-desc">With distribution partners and investors onboard, Jeff Brewery is expanding beyond T&T — carrying the island's grit, rhythm, and flavour to the world stage.</p>
      </div>
    </div>
  </section>

  <!-- ============================
       TEAM
  ============================= -->
  <section class="team">
    <div class="team-header">
      <div class="section-label" style="color:rgba(212,160,23,0.7); text-align:center;">Meet The Crew</div>
      <h2>THE PEOPLE BEHIND THE PINT.</h2>
      <p>Built from vision, not privilege.</p>
    </div>

    <div class="team-grid">

      <div class="team-card reveal">
        <div class="team-avatar">J</div>
        <div class="team-name">JEFF</div>
        <div class="team-role">Head Brewer & Founder</div>
        <p class="team-bio">The man behind the vision. Started brewing in a Woodbrook garage and never looked back. Obsessed with capturing Trinbagonian soul in every ferment.</p>
      </div>

      <div class="team-card reveal reveal-delay-1">
        <div class="team-avatar" style="background:rgba(192,74,26,0.12); border-color:rgba(192,74,26,0.3); color:var(--rust);">M</div>
        <div class="team-name">MARIA</div>
        <div class="team-role">Flavour Alchemist</div>
        <p class="team-bio">Where science meets sorcery. Maria's work with local spices and tropical fruit adjuncts is what makes every Jeff Brewery beer unmistakably ours.</p>
      </div>

      <div class="team-card reveal reveal-delay-2">
        <div class="team-avatar" style="background:rgba(10,124,110,0.12); border-color:rgba(10,124,110,0.3); color:var(--teal);">M</div>
        <div class="team-name">MARCUS</div>
        <div class="team-role">Vibes Manager</div>
        <p class="team-bio">Responsible for the energy, the events, and the Krewe. If you've ever had a good time at a Jeff Brewery activation, that was Marcus's doing.</p>
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

<script>
  // Scroll reveal
  document.addEventListener("DOMContentLoaded", () => {
    const reveals = document.querySelectorAll('.about-page-wrapper .reveal');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });
    reveals.forEach(el => observer.observe(el));
  });
</script>
