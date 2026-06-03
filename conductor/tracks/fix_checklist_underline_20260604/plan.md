# Plan: Fix Checklist Persistence Bug & Remove Underline Button

## Phase 1: Fix Checklist Persistence Bug

- [ ] Task: Write tests for checklist persistence
    - [ ] Write test: load existing task with checklists, save without changes, verify checklist items are preserved in output
    - [ ] Write test: load existing task with checklists, change state, save, verify checklist items are preserved
    - [ ] Write test: create new task with checklists, save, verify checklist items are present (regression)
    - [ ] Run tests and confirm they fail (Red phase)
- [ ] Task: Implement fix — re-insert checklist position markers on load
    - [ ] Modify `loadTask()` in `views/task.php` to call a new `insertChecklistMarkers()` function after `parseContent()`
    - [ ] Create `insertChecklistMarkers()` function that iterates `checklistItems` and appends `<checklist-pos data-ci="N">` markers into the editor DOM
    - [ ] Run tests and confirm they pass (Green phase)
- [ ] Task: Conductor - User Manual Verification 'Phase 1: Fix Checklist Persistence Bug' (Protocol in workflow.md)

## Phase 2: Remove Underline Button

- [ ] Task: Remove underline button from toolbar
    - [ ] Remove the underline `<button>` element from the formatting toolbar in `views/task.php`
    - [ ] Verify Bold and Italic buttons remain functional
    - [ ] Verify existing `<u>` tags in saved content still render correctly
- [ ] Task: Conductor - User Manual Verification 'Phase 2: Remove Underline Button' (Protocol in workflow.md)
