<p align="center">
  <img src="assets/icon-192.png" alt="TaskFlow" width="96" height="96">
</p>

<h1 align="center">TaskFlow</h1>

<p align="center">
  <strong>A Google Keep-inspired Task Management SPA</strong>
  <br>
  Built with PHP + Alpine.js + Tailwind CSS
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/Alpine.js-8BC0D0?logo=alpinedotjs&logoColor=black" alt="Alpine.js">
  <img src="https://img.shields.io/badge/Tailwind_CSS-06B6D4?logo=tailwindcss&logoColor=white" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/MySQL-4479A1?logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/license-MIT-green" alt="License">
</p>

---

## Overview

TaskFlow is a single-page application for personal task management. It combines the familiar look of Google Keep with practical features for freelancers and individual users — task tracking, rich text editing, color labels, contact delegation, and direct WhatsApp sharing.

## Features

<details open>
<summary><strong>Task Management</strong></summary>

- Create, edit, and delete tasks
- 4 workflow states: **Todo**, **Doing**, **Delegate**, **Done**
- Color-coded cards per state (amber, blue, purple, emerald)
- Filter by state on the dashboard
- Grid layout — 2 columns on desktop, 1 on mobile
</details>

<details open>
<summary><strong>Rich Text Editor</strong></summary>

- Bold, italic, underline formatting
- Checklist items with checkboxes
- Checked items → automatic strikethrough
- Convert plain text to checklist items
- Copy formatted text as WhatsApp-style (\*bold\*, _italic_, ~strikethrough~, - [x])
</details>

<details open>
<summary><strong>Delegation & WhatsApp Integration</strong></summary>

- Add contacts via Web Contact API (name + phone number)
- Display delegated contacts below task content
- One-tap WhatsApp button to share task with contact
</details>

<details open>
<summary><strong>Labels & Quick Actions</strong></summary>

- Toggle color labels on any task
- 3-dot menu: set label, copy content (WhatsApp-formatted), delete task
- Toast notifications for save, copy, and label actions
</details>

<details open>
<summary><strong>Authentication</strong></summary>

- Register and login with username + password
- bcrypt password hashing
- PHP session-based auth
- Combined login/register view with smooth toggle

</details>

<details open>
<summary><strong>Dark Mode</strong></summary>

- Toggle light/dark mode via sun/moon icon
- Google Keep-inspired dark palette (#202124 background)
- Preference persisted in localStorage
- Login/register stays light

</details>

## Tech Stack

| Layer | Technology |
|-------|-----------|
| **Frontend** | Alpine.js 3.x (CDN) |
| **Styling** | Tailwind CSS (CDN) |
| **Typography** | Google Fonts — Roboto |
| **Backend** | PHP (plain, no framework) |
| **Database** | MySQL with InnoDB |
| **Architecture** | SPA — `index.php` single entry point |

## Project Structure

```
.
├── api/            # REST API endpoints (JSON)
├── assets/         # Static assets (icons, images)
├── config/         # Application configuration
├── helpers/        # Utility functions
├── migrations/     # Database migration SQL files
├── views/          # PHP view templates
│   ├── layout.php  # Shared HTML skeleton
│   ├── login.php   # Combined login/register view
│   ├── dashboard.php
│   ├── task.php    # Task editor
│   └── 404.php
├── index.php       # Single entry point (router)
├── .htaccess       # Apache rewrite rules
├── install.php     # Database installer
├── seed.php        # Sample data seeder
├── sw.js           # Service worker (passthrough)
└── manifest.json   # PWA manifest
```

## Installation

### Prerequisites

- PHP 8.0+
- MySQL 5.7+
- Apache with `mod_rewrite` enabled

### Steps

1. **Clone the repository**

```bash
git clone https://github.com/adnanbasalamah/taskflow.git
cd taskflow
```

2. **Set up the database**

Edit environment variables or update `install.php` directly:

```bash
php install.php
```

This creates the `taskflow` database and all required tables.

3. **(Optional) Seed sample data**

```bash
php seed.php
```

4. **Configure Apache**

Point your document root to the project directory. The `.htaccess` file handles routing automatically.

5. **Access the app**

Open `http://localhost/taskflow` in your browser. Register a new account and start managing tasks.

## Database Schema

<details>
<summary><strong>5 tables</strong></summary>

| Table | Purpose |
|-------|---------|
| `users` | User accounts (bcrypt-hashed passwords) |
| `tasks` | Task content, state, timestamps |
| `task_contacts` | Delegated contacts per task |
| `labels` | Available color labels |
| `task_labels` | Many-to-many: tasks ↔ labels |

</details>

## Color Coding

| State | Color |
|-------|-------|
| Todo | Amber |
| Doing | Blue |
| Delegate | Purple |
| Done | Emerald |

## Screenshots

<!-- TODO: Add screenshots -->

## License

MIT
