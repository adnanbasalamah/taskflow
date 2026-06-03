# Technology Stack

## Frontend
| Technology | Usage | Version |
|-----------|-------|---------|
| **Tailwind CSS** | Utility-first CSS framework via CDN | Latest (CDN) |
| **Alpine.js** | Frontend interactivity & state management via CDN | 3.x (CDN) |
| **Inter (Google Fonts)** | Typography | - |

## Backend
| Technology | Usage |
|-----------|-------|
| **PHP** | Server-side logic & API endpoints (plain, no framework) |
| **MySQL** | Relational database (3 tables: users, tasks, task_contacts) |

## Authentication
| Technology | Usage |
|-----------|-------|
| **Username + Password** | Login & register with bcrypt hashing (`password_hash()`) |
| **PHP Sessions** | User session management |

## Architecture
- **Single Page App (SPA)** — frontend (Alpine.js) communicates with PHP backend via fetch/JSON API
- **No build step** — Tailwind + Alpine via CDN
- **No JavaScript framework** (React/Vue) — Alpine.js is sufficient for this scope

## Database
- **Engine:** InnoDB
- **Charset:** utf8mb4
- **Tables:** users, tasks, task_contacts
- **Indexes:** user_id, state, task_id

## Development Tools
- **Version Control:** Git
- **Deployment:** LAMP stack (Linux, Apache, MySQL, PHP)
