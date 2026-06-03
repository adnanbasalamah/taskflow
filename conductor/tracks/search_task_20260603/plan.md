# Plan: Search / Cari Task

## Phase 1: Backend Search API

- [x] Task: Add keyword search parameter to task list API
    - [x] Add `q` query parameter to `api/tasks/list.php`
    - [x] Implement LIKE search on title, content
    - [x] Implement JOIN with task_labels + labels for label name search
    - [x] Ensure combination with state filter works
    - [x] Keep SQL injection protection (prepared statements)
- [x] Task: Conductor - User Manual Verification 'Phase 1: Backend Search API' (Protocol in workflow.md)

## Phase 2: Frontend Search Bar

- [x] Task: Add search bar to dashboard header
    - [x] Add search input with magnifier icon at left in header
    - [x] Add clear (x) button when input has text
    - [x] Style consistent with Google Keep
    - [x] Responsive: full width on mobile, compact on desktop
- [x] Task: Wire search to Alpine.js with debounce
    - [x] Add `searchQuery` state to dashboardApp
    - [x] Debounce fetch on input (300ms)
    - [x] Pass `q` parameter to fetchTasks()
    - [x] Reset to unfiltered when query empty
    - [x] Clear search on filter pill change (optional)
- [x] Task: Conductor - User Manual Verification 'Phase 2: Frontend Search Bar' (Protocol in workflow.md)

## Phase 3: Integration & Polish

- [x] Task: Test search + state filter combination
    - [x] Verify search + state filter works together
    - [x] Verify clear button resets search
    - [x] Test on mobile viewport
- [x] Task: Conductor - User Manual Verification 'Phase 3: Integration' (Protocol in workflow.md)
