# Plan: WhatsApp-Style Formatting on Copy

## Phase 1: Create HTML to WhatsApp Converter

- [ ] Task: Create `htmlToWhatsApp()` conversion function
    - [ ] Parse HTML string into DOM
    - [ ] Walk child nodes recursively
    - [ ] Convert `<b>`/`<strong>` → `*text*`
    - [ ] Convert `<i>`/`<em>` → `_text_`
    - [ ] Convert `<s>`/`<del>`/`<strike>` → `~text~`
    - [ ] Convert `<u>` → plain text (strip tag, keep content)
    - [ ] Handle nested formatting (e.g., `<b><i>text</i></b>` → `*_text_*`)
    - [ ] Convert `<br>` → newline
- [ ] Task: Handle checklist & list conversion
    - [ ] Convert `<li data-checklist="true" data-checked="true">` → `- [x] item text`
    - [ ] Convert `<li data-checklist="true" data-checked="false">` → `- [ ] item text`
    - [ ] Convert `<ol>`/`<ul>` items → each `<li>` as `- item text`
    - [ ] Ensure checklist items appear after inline content (not mixed)
- [ ] Task: Integrate converter into `copyCurrentTask()`
    - [ ] Replace `stripChecklist()` call with `htmlToWhatsApp()` in the copy flow
    - [ ] Ensure title is still prepended as plain text
    - [ ] Verify clipboard output for both `navigator.clipboard` and fallback methods
- [ ] Task: Conductor - User Manual Verification 'Phase 1: Create HTML to WhatsApp Converter' (Protocol in workflow.md)

## Phase 2: Testing & Edge Cases

- [ ] Task: Verify formatting edge cases
    - [ ] Test empty content
    - [ ] Test mixed formatting (bold + italic + strikethrough)
    - [ ] Test nested tags (`<b><i>bold+italic</i></b>`)
    - [ ] Test checklist with inline formatting inside
    - [ ] Test content with no formatting (plain text unaffected)
- [ ] Task: Conductor - User Manual Verification 'Phase 2: Testing & Edge Cases' (Protocol in workflow.md)
