# Plan: Fix Checklist Persistence Bug & Remove Underline Button

## Phase 1: Fix Checklist Persistence Bug

- [x] Task: Write tests for checklist persistence [35c8e2d]
    - [x] Write test: load existing task with checklists, save without changes, verify checklist items are preserved in output
    - [x] Write test: load existing task with checklists, change state, save, verify checklist items are preserved
    - [x] Write test: create new task with checklists, save, verify checklist items are present (regression)
    - [x] Run tests and confirm they fail (Red phase)
- [x] Task: Implement fix — re-insert checklist position markers on load [35c8e2d]
    - [x] Modify `loadTask()` in `views/task.php` to call a new `insertChecklistMarkers()` function after `parseContent()`
    - [x] Create `insertChecklistMarkers()` function that iterates `checklistItems` and appends `<checklist-pos data-ci="N">` markers into the editor DOM
    - [x] Run tests and confirm they pass (Green phase)
- [ ] Task: Conductor - User Manual Verification 'Phase 1: Fix Checklist Persistence Bug' (Protocol in workflow.md)

## Phase 2: Remove Underline Button

- [x] Task: Remove underline button from toolbar [35c8e2d]
    - [x] Remove the underline `<button>` element from the formatting toolbar in `views/task.php`
    - [x] Verify Bold and Italic buttons remain functional
    - [x] Verify existing `<u>` tags in saved content still render correctly
- [ ] Task: Conductor - User Manual Verification 'Phase 2: Remove Underline Button' (Protocol in workflow.md)
