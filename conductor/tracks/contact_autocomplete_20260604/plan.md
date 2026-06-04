# Plan: Contact Auto-Complete from Saved Contacts

## Phase 1: Backend — Search API & Duplicate Check

- [ ] Task: Create search contacts API endpoint
    - [ ] Add `search` parameter handling to `api/tasks/contacts.php` (GET)
    - [ ] Query `task_contacts` with LIKE on `name` WHERE `user_id` = current user
    - [ ] Limit results to 10, return `{id, name, phone}` array
    - [ ] Test search returns correct results
- [ ] Task: Add duplicate phone validation to save contact endpoint
    - [ ] Before INSERT in `api/tasks/contacts.php` (POST), check if phone already exists for this user
    - [ ] If duplicate, return error response with message "No HP sudah ada"
    - [ ] Test duplicate rejection
- [ ] Task: Conductor - User Manual Verification 'Phase 1: Backend API' (Protocol in workflow.md)

## Phase 2: Frontend — Autocomplete & Validation

- [ ] Task: Add autocomplete dropdown to contact modal
    - [ ] Add Alpine.js state for search results, debounce timer, dropdown visibility
    - [ ] Add `x-on:input` with debounce (300ms) to fetch search API
    - [ ] Render dropdown below input nama with clickable items
    - [ ] Click item → fill name + phone inputs, hide dropdown
    - [ ] Hide dropdown on click outside / ESC / empty input
- [ ] Task: Add duplicate phone validation before save
    - [ ] Before calling POST API, check if phone already exists in fetched contacts list
    - [ ] If duplicate, show toast "No HP sudah ada" and cancel save
    - [ ] Test duplicate rejection flow
- [ ] Task: Conductor - User Manual Verification 'Phase 2: Frontend' (Protocol in workflow.md)
