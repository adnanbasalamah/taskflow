# Plan: Autosave Task Editor

## Phase 1: Autosave Engine & UI Indicator [checkpoint: c64b602]

- [x] Task: Add debounced watchers for title, content, state, and checklistItems [6e35df3]
    - [x] Add $watch on title, state, and checklistItems to trigger autosave
    - [x] Add content change detection via @input on contentEditor
    - [x] Implement 1.5s debounce mechanism (_autosaveTimer)
    - [x] Handle new tasks: first change creates task via POST, redirects to edit page with taskId, then autosave for subsequent changes
- [x] Task: Wire contacts and labels changes to autosave [6e35df3]
    - [x] Trigger autosave after addContact() and removeContact()
    - [x] Trigger autosave after toggleLabel()
    - [x] Integrate with existing debounce mechanism
- [x] Task: Replace "Simpan Task" button with save status indicator [6e35df3]
    - [x] Add saveStatus state: 'idle', 'saving', 'saved', 'error'
    - [x] Replace button HTML with inline status indicator
    - [x] Show "Menyimpan..." (gray text) during save, "Tersimpan" (green) on success, "Gagal" (red) on error
    - [x] Auto-reset to 'idle' after 3 detik
- [x] Task: Conductor - User Manual Verification 'Phase 1: Autosave Engine & UI Indicator' (Protocol in workflow.md)
