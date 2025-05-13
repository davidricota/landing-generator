# Landing Generator – WordPress Headless Plugin

**Landing Generator** is a modern WordPress plugin designed to be used in **headless CMS environments**. It allows you to manage customizable landing pages with WordPress as a backend, using **Advanced Custom Fields (ACF)** for layout building and exposing a clean **REST API endpoint** to retrieve landing data by slug.

Built for developers who want to decouple their frontend (Next.js, Astro, React, etc.) and still benefit from the powerful content management of WordPress.

---

## ✨ Features

- ✅ Registers a custom post type: `landing`
- 🧩 Flexible content sections via **ACF** (blocks, repeaters, flexible content)
- 🔌 Custom REST API endpoint to retrieve landing page content by `slug`
- 💎 Designed for **headless architecture** (WordPress as a backend only)
- 🧠 Organized using **namespaces** and **autoloading with Composer**
- ⚙️ Includes activation hooks and support for custom field definition via code

---

## 📦 Installation

### 1. Clone the Plugin

Clone or download this plugin into your `wp-content/plugins` directory:

```bash
cd wp-content/plugins
git clone https://github.com/your-user/landing-generator.git
cd landing-generator
composer install
2. Activate the Plugin
From the WordPress admin panel:

Plugins > Installed Plugins > Landing Generator > Activate

3. Setup ACF Fields
You can define fields in two ways:

Admin UI: Go to Custom Fields > Add New and link your field group to the landing post type.

Programmatically: Define your ACF field groups inside acf/fields.php. This file is automatically loaded via acf/init.

🧪 REST API Endpoint
The plugin exposes a custom endpoint to access landing page data by slug:

Endpoint
http
Copiar
Editar
GET /wp-json/landing-generator/v1/landing/{slug}
Example
http
Copiar
Editar
GET /wp-json/landing-generator/v1/landing/summer-sale-2025
Response
json
Copiar
Editar
{
  "title": "Summer Sale 2025",
  "content": "<p>HTML formatted editor content...</p>",
  "acf": {
    "hero": {
      "title": "Hot Deals All Season",
      "image": "https://example.com/banner.jpg"
    },
    "features": [
      { "title": "Fast Delivery", "icon": "🚚" },
      { "title": "Safe Payment", "icon": "🔒" }
    ]
  }
}
This structure allows you to build dynamic frontend pages based on backend-managed content.

🧰 Technology Stack
PHP 8.0+

WordPress 6+

ACF Pro (or Free, depending on field complexity)

Composer for autoloading

PSR-4 compliant namespaces

Plugin logic organized under src/

Folder structure:

bash
Copiar
Editar
landing-generator/
│
├── acf/                  # ACF fields defined via code
├── src/                 
│   ├── Plugin.php        # Main plugin initializer
│   ├── PostTypes/        # Custom post type registration
│   └── Api/              # REST API controller
├── composer.json
├── landing-generator.php # Plugin entry point
🔧 Plugin Development
Make sure Composer dependencies are installed and autoloading is configured:

bash
Copiar
Editar
composer install
The plugin uses namespaced classes (Landing\Generator) and autoloads via Composer PSR-4 mapping.

You can manually flush rewrite rules after first activation, but the plugin also registers an activation hook for it automatically.

🚀 Build for Production
To generate a production-ready .zip:

bash
Copiar
Editar
composer dump-autoload --optimize
zip -r landing-generator.zip landing-generator/ -x "*.git*" "*.DS_Store" "node_modules/*" "tests/*"
Ensure the archive includes:

landing-generator.php

src/

acf/

vendor/

composer.json, composer.lock

🔭 Future Improvements
Admin preview for ACF sections

Gutenberg block support for visual editing

WP-CLI commands to scaffold new landings

Custom templates for frontend rendering

📄 License
MIT License. Use freely, modify as needed.