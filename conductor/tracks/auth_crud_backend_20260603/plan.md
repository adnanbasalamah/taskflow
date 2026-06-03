# Plan: Build core authentication & task CRUD backend

## Phase 1: Database & Configuration

- [ ] Task: Create project structure and config
    - [ ] Create project directory structure (api/, assets/, config/)
    - [ ] Create config/database.php with MySQL connection
    - [ ] Create config/app.php with app constants
    - [ ] Create .htaccess for URL routing
- [ ] Task: Create database migration
    - [ ] Copy database.sql to migration file
    - [ ] Create install.php to run migration
- [ ] Task: Create base helper functions
    - [ ] Create helpers/response.php (json_response, error_response)
    - [ ] Create helpers/auth.php (is_logged_in, require_login)
    - [ ] Create helpers/validate.php (input validation)
- [ ] Task: Conductor - User Manual Verification 'Phase 1: Database & Configuration' (Protocol in workflow.md)

## Phase 2: Authentication

- [ ] Task: Create auth API endpoints
    - [ ] Create api/register.php (POST — username + password, bcrypt)
    - [ ] Create api/login.php (POST — verify credentials, start session)
    - [ ] Create api/logout.php (POST — destroy session)
    - [ ] Create api/session.php (GET — check current session)
- [ ] Task: Create login page
    - [ ] Create login.html with Tailwind + Alpine.js
    - [ ] Wire form to api/login.php via fetch
    - [ ] Show validation errors inline
- [ ] Task: Create register page
    - [ ] Create register.html with Tailwind + Alpine.js
    - [ ] Wire form to api/register.php via fetch
    - [ ] Auto-redirect to login after success
- [ ] Task: Conductor - User Manual Verification 'Phase 2: Authentication' (Protocol in workflow.md)

## Phase 3: Task CRUD

- [ ] Task: Create task API endpoints
    - [ ] Create api/tasks/create.php (POST)
    - [ ] Create api/tasks/list.php (GET)
    - [ ] Create api/tasks/update.php (PUT)
    - [ ] Create api/tasks/delete.php (DELETE)
    - [ ] Add input validation and SQL injection protection
- [ ] Task: Create task detail/edit page
    - [ ] Create task.html with Alpine.js data binding
    - [ ] Implement title + content editing
    - [ ] Implement toolbar (Bold, Italic, Underline)
    - [ ] Implement checklist items (add, toggle, strikethrough)
- [ ] Task: Create task creation flow
    - [ ] Inline "Buat catatan baru..." card on dashboard
    - [ ] Expand to full editor on click
    - [ ] Save via POST API on blur/submit
- [ ] Task: Conductor - User Manual Verification 'Phase 3: Task CRUD' (Protocol in workflow.md)

## Phase 4: Dashboard & Filtering

- [ ] Task: Create dashboard page
    - [ ] Create dashboard.html with Alpine.js
    - [ ] Fetch all tasks via GET api/tasks/list.php
    - [ ] Render task cards color-coded by state
    - [ ] Implement filter pills (Semua, Todo, Doing, Delegate, Done)
- [ ] Task: Implement state transition buttons
    - [ ] Add Todo/Doing/Delegate/Done buttons in each card
    - [ ] Wire to PUT api/tasks/update.php
    - [ ] Re-render cards on state change
- [ ] Task: Implement Done → Delete popup
    - [ ] Show confirmation popup when state changes to Done
    - [ ] "Ya, Hapus" → DELETE via API
    - [ ] "Tidak" → keep task in Done state
- [ ] Task: Add contact & WhatsApp delegate UI
    - [ ] Add contact modal (nama + no HP)
    - [ ] Web Contact API integration button
    - [ ] "Kirim via WhatsApp" button on delegate cards
    - [ ] WhatsApp link generation (wa.me)
- [ ] Task: Conductor - User Manual Verification 'Phase 4: Dashboard & Filtering' (Protocol in workflow.md)
