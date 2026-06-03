# Plan: Search / Cari Task

## Phase 1: Backend Search API

- [ ] Task: Add keyword search parameter to task list API
    - [ ] Add `q` query parameter to `api/tasks/list.php`
    - [ ] Implement LIKE search on title, content
    - [ ] Implement JOIN with task_labels + labels for label name search
    - [ ] Ensure combination with state filter works
    - [ ] Keep SQL injection protection (prepared statements)
- [ ] Task: Conductor - User Manual Verification 'Phase 1: Backend Search API' (Protocol in workflow.md)

## Phase 2: Frontend Search Bar

- [ ] Task: Add search bar to dashboard header
    - [ ] Add search input with magnifier icon at left in header
    - [ ] Add clear (x) button when input has text
    - [ ] Style consistent with Google Keep
    - [ ] Responsive: full width on mobile, compact on desktop
- [ ] Task: Wire search to Alpine.js with debounce
    - [ ] Add `searchQuery` state to dashboardApp
    - [ ] Debounce fetch on input (300ms)
    - [ ] Pass `q` parameter to fetchTasks()
    - [ ] Reset to unfiltered when query empty
    - [ ] Clear search on filter pill change (optional)
- [ ] Task: Conductor - User Manual Verification 'Phase 2: Frontend Search Bar' (Protocol in workflow.md)

## Phase 3: Integration & Polish

- [ ] Task: Test search + state filter combination
    - [ ] Verify search + state filter works together
    - [ ] Verify clear button resets search
    - [ ] Test on mobile viewport
- [ ] Task: Conductor - User Manual Verification 'Phase 3: Integration' (Protocol in workflow.md)
