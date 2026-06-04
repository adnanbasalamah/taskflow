# Plan: Autosave Task Editor

## Phase 1: Autosave Engine & UI Indicator

- [ ] Task: Add debounced watchers for title, content, state, and checklistItems
    - [ ] Add $watch on title, state, and checklistItems to trigger autosave
    - [ ] Add content change detection via @input on contentEditor
    - [ ] Implement 1.5s debounce mechanism (_autosaveTimer)
    - [ ] Handle new tasks: first change creates task via POST, redirects to edit page with taskId, then autosave for subsequent changes
- [ ] Task: Wire contacts and labels changes to autosave
    - [ ] Trigger autosave after addContact() and removeContact()
    - [ ] Trigger autosave after toggleLabel()
    - [ ] Integrate with existing debounce mechanism
- [ ] Task: Replace "Simpan Task" button with save status indicator
    - [ ] Add saveStatus state: 'idle', 'saving', 'saved', 'error'
    - [ ] Replace button HTML with inline status indicator
    - [ ] Show "Menyimpan..." (gray text) during save, "Tersimpan" (green) on success, "Gagal" (red) on error
    - [ ] Auto-reset to 'idle' after 3 detik
- [ ] Task: Conductor - User Manual Verification 'Phase 1: Autosave Engine & UI Indicator' (Protocol in workflow.md)
