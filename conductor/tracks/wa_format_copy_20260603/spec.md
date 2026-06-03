# Spec: WhatsApp-Style Formatting on Copy

## Overview
When copying a task's content via the "Salin" button in the 3-dot menu on the task editor page, convert the HTML formatting to WhatsApp-compatible markdown before placing it in the clipboard. This ensures bold, italic, strikethrough, and checklist items render correctly when pasted into WhatsApp.

## Functional Requirements

### FR1: HTML to WhatsApp Markdown Conversion
- `<b>`, `<strong>` → `*text*`
- `<i>`, `<em>` → `_text_`
- `<s>`, `<del>`, `<strike>` → `~text~`
- `<u>` → left as plain text (no WhatsApp equivalent)
- Nested formatting should be handled (e.g., `<b><i>bold+italic</i></b>` → `*_bold+italic_*`)

### FR2: Checklist Conversion
- Checklist item `<li data-checklist="true" data-checked="true">` → `- [x] item text`
- Checklist item `<li data-checklist="true" data-checked="false">` → `- [ ] item text`

### FR3: List Conversion
- `<ol>` / `<ul>` items → each `<li>` becomes a line starting with `- ` (dash + space)

### FR4: Scope
- Only affects the **"Salin" (Copy)** action in the 3-dot menu on `task.html`.
- The `copyCurrentTask()` function in `taskApp()` must be modified.
- Does NOT affect the save/display functionality — only clipboard output.

### FR5: Title
- Task title is prepended as-is (no formatting conversion needed for title).

## Non-Functional Requirements
- Must work with `navigator.clipboard.writeText()` (or fallback).
- Conversion must run synchronously before clipboard write.

## Acceptance Criteria
- [ ] Copying bold text results in `*text*` in clipboard
- [ ] Copying italic text results in `_text_` in clipboard
- [ ] Copying strikethrough text results in `~text~` in clipboard
- [ ] Checked checklist items appear as `- [x] item`
- [ ] Unchecked checklist items appear as `- [ ] item`
- [ ] Nested formatting is preserved
- [ ] Task title is included in the output

## Out of Scope
- WhatsApp API integration (only clipboard formatting)
- Server-side changes
- Changes to dashboard copy functionality
