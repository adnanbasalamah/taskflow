# Plan: Build core authentication & task CRUD backend

## Phase 1: Database & Configuration [checkpoint: d75b1b5]

- [x] Task: Create project structure and config [f60ee23]
    - [x] Create project directory structure (api/, assets/, config/)
    - [x] Create config/database.php with MySQL connection
    - [x] Create config/app.php with app constants
    - [x] Create .htaccess for URL routing
- [x] Task: Create database migration [d246c83]
    - [x] Copy database.sql to migration file
    - [x] Create install.php to run migration
- [x] Task: Create base helper functions [f8420c0]
    - [x] Create helpers/response.php (json_response, error_response)
    - [x] Create helpers/auth.php (is_logged_in, require_login)
    - [x] Create helpers/validate.php (input validation)
- [x] Task: Conductor - User Manual Verification 'Phase 1: Database & Configuration' (Protocol in workflow.md)

## Phase 2: Authentication [checkpoint: 88edee3]

- [x] Task: Create auth API endpoints [a295b1a]
    - [x] Create api/register.php (POST — username + password, bcrypt)
    - [x] Create api/login.php (POST — verify credentials, start session)
    - [x] Create api/logout.php (POST — destroy session)
    - [x] Create api/session.php (GET — check current session)
- [x] Task: Create login page [8a19d27]
    - [x] Create login.html with Tailwind + Alpine.js
    - [x] Wire form to api/login.php via fetch
    - [x] Show validation errors inline
- [x] Task: Create register page [8a19d27]
    - [x] Create register.html with Tailwind + Alpine.js
    - [x] Wire form to api/register.php via fetch
    - [x] Auto-redirect to login after success
- [x] Task: Conductor - User Manual Verification 'Phase 2: Authentication' (Protocol in workflow.md)

## Phase 3: Task CRUD [checkpoint: a46a354]

- [x] Task: Create task API endpoints [84b5175]
    - [x] Create api/tasks/create.php (POST)
    - [x] Create api/tasks/list.php (GET)
    - [x] Create api/tasks/update.php (PUT)
    - [x] Create api/tasks/delete.php (DELETE)
    - [x] Add input validation and SQL injection protection
- [x] Task: Create task detail/edit page [0484b08]
    - [x] Create task.html with Alpine.js data binding
    - [x] Implement title + content editing
    - [x] Implement toolbar (Bold, Italic, Underline)
    - [x] Implement checklist items (add, toggle, strikethrough)
- [x] Task: Create task creation flow [d4d560f]
    - [x] Inline "Buat catatan baru..." card on dashboard
    - [x] Expand to full editor on click → task.html
    - [x] Save via POST API on blur/submit
- [x] Task: Conductor - User Manual Verification 'Phase 3: Task CRUD' (Protocol in workflow.md)

## Phase 4: Dashboard & Filtering [checkpoint: a46a354]

- [x] Task: Create dashboard page [d4d560f]
    - [x] Create dashboard.html with Alpine.js
    - [x] Fetch all tasks via GET api/tasks/list.php
    - [x] Render task cards color-coded by state
    - [x] Implement filter pills (Semua, Todo, Doing, Delegate, Done)
- [x] Task: Implement state transition buttons [d4d560f]
    - [x] Add Todo/Doing/Delegate/Done buttons in each card
    - [x] Wire to PUT api/tasks/update.php
    - [x] Re-render cards on state change
- [x] Task: Implement Done → Delete popup [d4d560f]
    - [x] Show confirmation popup when state changes to Done
    - [x] "Ya, Hapus" → DELETE via API
    - [x] "Tidak" → keep task in Done state
- [x] Task: Add contact & WhatsApp delegate UI [d4d560f]
    - [x] Add contact modal (nama + no HP)
    - [x] Web Contact API integration button
    - [x] "Kirim via WhatsApp" button on delegate cards
    - [x] WhatsApp link generation (wa.me)
- [x] Task: Conductor - User Manual Verification 'Phase 4: Dashboard & Filtering' (Protocol in workflow.md)
