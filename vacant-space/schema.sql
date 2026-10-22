-- =====================================================================
-- Jeff Brewery Industries - Complete Relational Database Schema (ERD DDL)
-- Target DBMS: MySQL 8.0+ / MariaDB 10.5+ / PostgreSQL (ANSI Standard)
-- Region: Couva & Port of Spain, Trinidad & Tobago
-- =====================================================================

SET FOREIGN_KEY_CHECKS = 0; 

DROP TABLE IF EXISTS ai_recommendations;
DROP TABLE IF EXISTS activity_events;
DROP TABLE IF EXISTS blog_posts;
DROP TABLE IF EXISTS wishlist_items;
DROP TABLE IF EXISTS reward_redemptions;
DROP TABLE IF EXISTS krewe_rewards;
DROP TABLE IF EXISTS reviews;
DROP TABLE IF EXISTS recipe_timeline_stages;
DROP TABLE IF EXISTS custom_recipes;
DROP TABLE IF EXISTS order_items;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS merch_items;
DROP TABLE IF EXISTS beer_food_pairings;
DROP TABLE IF EXISTS beer_flavor_tags;
DROP TABLE IF EXISTS beers;
DROP TABLE IF EXISTS user_badges;
DROP TABLE IF EXISTS badges;
DROP TABLE IF EXISTS krewe_profiles;
DROP TABLE IF EXISTS users;

SET FOREIGN_KEY_CHECKS = 1;

-- =====================================================================
-- 1. IDENTITY & USER DOMAIN
-- =====================================================================

CREATE TABLE users (
    id VARCHAR(36) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('customer', 'admin', 'brewer') NOT NULL DEFAULT 'customer',
    phone VARCHAR(30) NULL,
    location VARCHAR(150) DEFAULT 'Port of Spain, Trinidad & Tobago',
    favorite_style VARCHAR(100) NULL,
    bio TEXT NULL,
    avatar_url VARCHAR(255) NULL,
    member_since VARCHAR(50) DEFAULT 'March 2024',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_users_email (email),
    INDEX idx_users_role (role)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE krewe_profiles (
    user_id VARCHAR(36) PRIMARY KEY,
    points INT NOT NULL DEFAULT 100,
    current_rank VARCHAR(50) NOT NULL DEFAULT 'Freshman Liming',
    next_rank VARCHAR(50) NOT NULL DEFAULT 'Taste Explorer',
    next_rank_points INT NOT NULL DEFAULT 500,
    lifetime_points INT NOT NULL DEFAULT 100,
    tier ENUM('Road Crew', 'Mas Band', 'Section Leader', 'Inner Circle') DEFAULT 'Road Crew',
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_krewe_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE badges (
    id VARCHAR(50) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255) NOT NULL,
    icon VARCHAR(50) NOT NULL,
    required_points INT NOT NULL DEFAULT 0,
    category VARCHAR(50) DEFAULT 'Milestone'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE user_badges (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(36) NOT NULL,
    badge_id VARCHAR(50) NOT NULL,
    unlocked_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY uq_user_badge (user_id, badge_id),
    CONSTRAINT fk_ub_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT fk_ub_badge FOREIGN KEY (badge_id) REFERENCES badges(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================================
-- 2. CATALOG & INVENTORY DOMAIN (BEERS & MERCHANDISE)
-- =====================================================================

CREATE TABLE beers (
    id VARCHAR(64) PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    tagline VARCHAR(255) NULL,
    style VARCHAR(80) NOT NULL,
    abv DECIMAL(4,2) NOT NULL,
    ibu INT NOT NULL DEFAULT 20,
    price DECIMAL(8,2) NOT NULL,
    description TEXT NOT NULL,
    vibe VARCHAR(100) NULL,
    availability ENUM('CORE', 'LIMITED', 'SEASONAL', 'CUSTOM') NOT NULL DEFAULT 'CORE',
    stock INT NOT NULL DEFAULT 142,
    max_stock INT NOT NULL DEFAULT 200,
    image_url VARCHAR(255) NOT NULL,
    is_new BOOLEAN NOT NULL DEFAULT FALSE,
    is_bestseller BOOLEAN NOT NULL DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_beers_style (style),
    INDEX idx_beers_availability (availability)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE beer_flavor_tags (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    beer_id VARCHAR(64) NOT NULL,
    tag VARCHAR(60) NOT NULL,
    INDEX idx_bft_tag (tag),
    CONSTRAINT fk_bft_beer FOREIGN KEY (beer_id) REFERENCES beers(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE beer_food_pairings (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    beer_id VARCHAR(64) NOT NULL,
    dish VARCHAR(120) NOT NULL,
    CONSTRAINT fk_bfp_beer FOREIGN KEY (beer_id) REFERENCES beers(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE merch_items (
    id VARCHAR(32) PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    price DECIMAL(8,2) NOT NULL,
    original_price DECIMAL(8,2) NULL,
    category ENUM('Apparel', 'Glassware', 'Accessories') NOT NULL,
    sold_out BOOLEAN NOT NULL DEFAULT FALSE,
    image_url VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_merch_category (category)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================================
-- 3. ORDERS & COMMERCE FULFILLMENT DOMAIN
-- =====================================================================

CREATE TABLE orders (
    id VARCHAR(32) PRIMARY KEY, -- e.g. JB-9842
    user_id VARCHAR(36) NULL,
    status ENUM('Order Placed', 'Brewing & Bottling', 'Out for Delivery', 'Ready for Brewery Collection', 'Delivered', 'Cancelled') NOT NULL DEFAULT 'Order Placed',
    delivery_method ENUM('delivery', 'pickup') NOT NULL DEFAULT 'delivery',
    carrier VARCHAR(100) DEFAULT 'TT-Post Express Courier',
    tracking_number VARCHAR(100) NULL,
    eta VARCHAR(100) NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    shipping_cost DECIMAL(8,2) NOT NULL DEFAULT 15.00,
    discount DECIMAL(8,2) NOT NULL DEFAULT 0.00,
    final_total DECIMAL(10,2) NOT NULL,
    points_earned INT NOT NULL DEFAULT 50,
    payment_method VARCHAR(50) NOT NULL DEFAULT 'card',
    recipient_first_name VARCHAR(50) NOT NULL,
    recipient_last_name VARCHAR(50) NOT NULL,
    recipient_email VARCHAR(150) NOT NULL,
    recipient_phone VARCHAR(30) NOT NULL,
    delivery_address VARCHAR(255) NOT NULL,
    delivery_apartment VARCHAR(50) NULL,
    delivery_city VARCHAR(100) NOT NULL DEFAULT 'Port of Spain',
    delivery_postal_code VARCHAR(20) NULL,
    delivery_step INT NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_orders_user (user_id),
    INDEX idx_orders_status (status),
    CONSTRAINT fk_orders_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE order_items (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    order_id VARCHAR(32) NOT NULL,
    item_type ENUM('beer', 'merch', 'custom_recipe', 'gift_card') NOT NULL,
    product_id VARCHAR(64) NOT NULL,
    product_name VARCHAR(150) NOT NULL,
    unit_price DECIMAL(8,2) NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    total_price DECIMAL(10,2) NOT NULL,
    CONSTRAINT fk_oi_order FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================================
-- 4. CRAFT YOUR OWN BREW LAB DOMAIN
-- =====================================================================

CREATE TABLE custom_recipes (
    id VARCHAR(64) PRIMARY KEY, -- rec_101 or custom_169...
    batch_id VARCHAR(64) NOT NULL UNIQUE, -- BATCH-MNG-9842
    user_id VARCHAR(36) NOT NULL,
    name VARCHAR(150) NOT NULL,
    base_malt VARCHAR(100) NOT NULL,
    hops VARCHAR(100) NOT NULL,
    infusion VARCHAR(150) NOT NULL,
    abv DECIMAL(4,2) NOT NULL DEFAULT 6.50,
    ibu INT NOT NULL DEFAULT 35,
    price DECIMAL(8,2) NOT NULL DEFAULT 25.00,
    status VARCHAR(60) NOT NULL DEFAULT 'Primary Fermentation',
    progress_percent INT NOT NULL DEFAULT 10,
    current_stage_index INT NOT NULL DEFAULT 1,
    temperature VARCHAR(20) DEFAULT '18.5 °C',
    gravity VARCHAR(40) DEFAULT '1.014 SG',
    est_completion VARCHAR(80) NULL,
    brewer_notes TEXT NULL,
    notes TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_custom_batch (batch_id),
    CONSTRAINT fk_cr_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE recipe_timeline_stages (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    recipe_id VARCHAR(64) NOT NULL,
    step_order INT NOT NULL,
    stage_name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    scheduled_date VARCHAR(60) NOT NULL,
    status ENUM('completed', 'in_progress', 'upcoming') NOT NULL DEFAULT 'upcoming',
    icon VARCHAR(50) DEFAULT 'flask-conical',
    CONSTRAINT fk_rts_recipe FOREIGN KEY (recipe_id) REFERENCES custom_recipes(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================================
-- 5. REVIEWS, ENGAGEMENT & KREWE REWARDS DOMAIN
-- =====================================================================

CREATE TABLE reviews (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    beer_id VARCHAR(64) NOT NULL,
    user_id VARCHAR(36) NULL,
    user_display_name VARCHAR(100) NOT NULL,
    rating INT NOT NULL CHECK (rating BETWEEN 1 AND 5),
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_rev_beer FOREIGN KEY (beer_id) REFERENCES beers(id) ON DELETE CASCADE,
    CONSTRAINT fk_rev_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE krewe_rewards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    cost_points INT NOT NULL,
    category VARCHAR(50) NOT NULL,
    image_url VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE reward_redemptions (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(36) NOT NULL,
    reward_id INT NOT NULL,
    points_spent INT NOT NULL,
    redemption_code VARCHAR(64) NOT NULL UNIQUE,
    status ENUM('active', 'used', 'expired') NOT NULL DEFAULT 'active',
    redeemed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_rr_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT fk_rr_reward FOREIGN KEY (reward_id) REFERENCES krewe_rewards(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE wishlist_items (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(36) NOT NULL,
    product_id VARCHAR(64) NOT NULL,
    product_type ENUM('beer', 'merch') NOT NULL DEFAULT 'beer',
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY uq_user_product_wishlist (user_id, product_id),
    CONSTRAINT fk_wl_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slug VARCHAR(150) NOT NULL UNIQUE,
    title VARCHAR(200) NOT NULL,
    excerpt TEXT NOT NULL,
    content LONGTEXT NOT NULL,
    author VARCHAR(100) NOT NULL,
    category VARCHAR(80) NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    published_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================================
-- 6. AUDIT, EVENT STREAM & AI RECOMMENDATION DOMAIN
-- =====================================================================

CREATE TABLE activity_events (
    id VARCHAR(64) PRIMARY KEY, -- e.g. EVT-39F8A1
    user_id VARCHAR(36) NULL,
    event_type ENUM('order', 'pickup', 'login', 'craft', 'points', 'wishlist', 'chatbot', 'recommendation', 'purchase') NOT NULL,
    customer_name VARCHAR(100) NOT NULL,
    description VARCHAR(255) NOT NULL,
    amount VARCHAR(50) NULL,
    source_component VARCHAR(80) NOT NULL,
    rec_id VARCHAR(64) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_ae_type (event_type),
    CONSTRAINT fk_ae_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE ai_recommendations (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    source_beer_id VARCHAR(64) NOT NULL,
    target_beer_id VARCHAR(64) NOT NULL,
    match_quality ENUM('High', 'Moderate', 'Popularity-Based') NOT NULL DEFAULT 'High',
    recommendations_count INT NOT NULL DEFAULT 0,
    clicks_count INT NOT NULL DEFAULT 0,
    cart_adds_count INT NOT NULL DEFAULT 0,
    purchases_count INT NOT NULL DEFAULT 0,
    conversion_rate DECIMAL(5,2) NOT NULL DEFAULT 0.00,
    insights_note TEXT NULL,
    CONSTRAINT fk_air_source FOREIGN KEY (source_beer_id) REFERENCES beers(id) ON DELETE CASCADE,
    CONSTRAINT fk_air_target FOREIGN KEY (target_beer_id) REFERENCES beers(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
