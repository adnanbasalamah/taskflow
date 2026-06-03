# Specification: Fix Checklist Persistence Bug & Remove Underline Button

## Overview

This track addresses two issues in the task editor (`views/task.php`):
1. **Bug Fix:** Checklist items disappear when a task's state is changed (e.g., Todo → Doing) and saved.
2. **Feature Removal:** Remove the underline formatting button from the editor toolbar.

## Functional Requirements

### 1. Fix Checklist Persistence Bug

**Root Cause:** When a task is loaded for editing, `stripChecklist()` removes both `<li data-checklist>` elements and `<checklist-pos>` markers from the editor DOM. `parseContent()` extracts checklist items into the Alpine.js array with their `_idx` values. However, the `<checklist-pos>` markers are never re-inserted into the editor DOM. When `buildContent()` runs on the next save (e.g., after a state change), it searches for `<checklist-pos data-ci="N">` markers in the editor innerHTML to replace with `<li>` elements. Since no markers exist, the checklist items are silently dropped.

**Fix Strategy:** After loading a task and parsing its checklist items, re-insert `<checklist-pos data-ci="N">` markers into the editor DOM at the appropriate positions, so that `buildContent()` can correctly serialize them on save.

**Requirements:**
- When an existing task with checklist items is loaded into the editor, `<checklist-pos>` markers must be present in the editor DOM.
- Saving the task after a state change (without modifying content or checklists) must preserve all checklist items exactly as they were.
- The fix must not break the existing task creation flow (new tasks with checklists).
- Checklist position ordering must be maintained.

### 2. Remove Underline Button

**Requirements:**
- Remove the underline button (`<u>`) from the formatting toolbar in the task editor.
- Existing underline formatting (`<u>` tags) in previously saved task content must remain untouched (no stripping).
- Bold and Italic buttons must remain functional.

## Non-Functional Requirements

- No changes to the database schema.
- No changes to the API endpoints.
- No changes to the server-side sanitization logic (`helpers/validate.php`).

## Acceptance Criteria

1. Open an existing task that has checklist items → change state from Todo to Doing → save → reopen the task → all checklist items are still present.
2. Create a new task → add checklist items → save → reopen → checklist items are present → change state → save → reopen → checklist items still present.
3. The underline button is no longer visible in the task editor toolbar.
4. Bold and Italic buttons still work correctly.
5. Existing tasks with `<u>` formatted content still display that formatting when opened.

## Out of Scope

- Stripping existing `<u>` tags from saved content.
- Adding new formatting options.
- Changes to the WhatsApp export format.
- Changes to the dashboard or any other views.
