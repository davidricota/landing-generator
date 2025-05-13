# Changelog

## Landing Generator Plugin

Landing Generator is a custom WordPress plugin built for headless use. It allows you to define and manage **Landing Pages** as a custom post type, associate custom fields via ACF, and expose this content through a custom REST API endpoint — ready for consumption by front-end frameworks like React, Next.js, Astro, or any JAMstack setup.

---

### 🆕 Version 1.0.0 – Initial Release

#### Features
- ✅ **Custom Post Type**: Registers a new `landing` post type in WordPress for managing landing pages.
- 🧩 **Custom Fields with ACF**: Dynamically structure each landing page with customizable sections using Advanced Custom Fields (ACF).
- 🌐 **REST API Endpoint**: Exposes a custom route:
GET /wp-json/landing-generator/v1/landing/{slug}

markdown
Copiar
Editar
This returns:
- Title
- Rendered content
- All ACF fields associated with that landing

- ⚙️ **Plugin Architecture**:
- Uses **Composer autoloading**
- Organized with **PHP namespaces**
- Splits logic into components: `PostTypes`, `Api`, and `Plugin` core
- Uses `plugin_dir_path()` safely for relative paths
- Includes activation hook to **flush rewrite rules** (future-proofing for permalinks if extended)

---

### 🔧 Tech Stack

- PHP 8+
- WordPress 6.0+
- [Advanced Custom Fields (ACF)](https://www.advancedcustomfields.com/)
- Composer (PSR-4 autoloading)
- WordPress REST API

---

### 🚀 Installation

1. Clone or download the plugin inside your WordPress installation:
wp-content/plugins/landing-generator/

css
Copiar
Editar

2. Run Composer to load classes:
```bash
composer install
Activate the plugin via the WordPress admin.

(Optional) Create ACF field groups under acf/fields.php or using the ACF UI.

📦 Exporting for Production
To generate a distributable version of the plugin:

Export or commit all ACF field groups via acf/fields.php.

Run:

bash
Copiar
Editar
composer dump-autoload --optimize
Zip the landing-generator/ directory including:

landing-generator.php

src/

acf/

vendor/

composer.json & composer.lock

Make sure the production server has ACF Pro installed or bundled.

🧪 Future Improvements (Planned)
Route-friendly frontend rendering via rewrite rules

Template preview in admin

Gutenberg block support for live previews

WP-CLI commands to scaffold new landing sections

🧠 Notes
This plugin is designed for headless WordPress usage. It assumes the frontend will be built separately and consume the REST API for rendering landing pages dynamically.