# Vinarija Varkulja – Vineyard & Winery Management App

This is a Laravel-based full-stack web application enhanced with Angular (imported via CDNs) for dynamic client-side behavior. It helps manage vineyard operations, wine products, receipts, and user interactions for small wine businesses.

## 🍇 Overview

The app provides features for:
- Grape and wine production tracking
- Wine inventory and bottle stock control
- Sales and receipts management
- A basic online storefront
- Multi-role user access

## 🧰 Tech Stack

- **Backend:** Laravel (PHP)
- **Frontend:** AngularJS (via CDN), Bootstrap, Blade templating
- **Database:** MySQL (schema in `vinarija_varkulja.sql`)
- **Tooling:** Composer (PHP), Vite/NPM (optional asset bundling)

## ✨ Key Features

- 🍇 **Grape Management:** Add and track grape varieties and harvests
- 🍷 **Wine Bottling:** Monitor production, aging, and bottled stock
- 🧾 **Receipts & Sales:** Create and archive wine sales receipts
- 🛒 **Shop Interface:** Allow orders through a basic web storefront
- 👥 **User Management:** Registration, login, and role-based access

## 🗄️ Database Setup

```sql
CREATE DATABASE vinarija_varkulja;
-- Then import `vinarija_varkulja.sql`
