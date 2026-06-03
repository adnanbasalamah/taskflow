# Spec: Build core authentication & task CRUD backend

## Overview
Build the complete backend (PHP) + frontend (Alpine.js) for authentication and basic task management. This track covers database setup, auth flow, task CRUD, and dashboard.

## Phases

### Phase 1: Database & Configuration
- Setup database connection config
- Create SQL migration for users, tasks, task_contacts tables
- Create PHP config and helper files

### Phase 2: Authentication
- Register endpoint (username + password, bcrypt hash)
- Login endpoint (verify credentials, start session)
- Logout endpoint (destroy session)
- Session check endpoint
- Login page (HTML + Alpine.js)
- Register page (HTML + Alpine.js)

### Phase 3: Task CRUD
- Create task endpoint (POST /api/tasks)
- Read tasks endpoint (GET /api/tasks)
- Update task endpoint (PUT /api/tasks/{id})
- Delete task endpoint (DELETE /api/tasks/{id})
- Task card component (Alpine.js)
- Rich text editing (bold, italic, underline)
- Checklist item support

### Phase 4: Dashboard & Filtering
- Filter tasks by state (Todo, Doing, Delegate, Done)
- Dashboard page (grid layout, color-coded cards)
- State transition buttons
- Done → Delete confirmation popup
- Delegate → WhatsApp button (placeholder)
