# Plan: WhatsApp-Style Formatting on Copy

## Phase 1: Create HTML to WhatsApp Converter

- [x] Task: Create `htmlToWhatsApp()` conversion function [7404d95]
    - [x] Parse HTML string into DOM
    - [x] Walk child nodes recursively
    - [x] Convert `<b>`/`<strong>` → `*text*`
    - [x] Convert `<i>`/`<em>` → `_text_`
    - [x] Convert `<s>`/`<del>`/`<strike>` → `~text~`
    - [x] Convert `<u>` → plain text (strip tag, keep content)
    - [x] Handle nested formatting (e.g., `<b><i>text</i></b>` → `*_text_*`)
    - [x] Convert `<br>` → newline
- [x] Task: Handle checklist & list conversion [7404d95]
    - [x] Convert `<li data-checklist="true" data-checked="true">` → `- [x] item text`
    - [x] Convert `<li data-checklist="true" data-checked="false">` → `- [ ] item text`
    - [x] Convert `<ol>`/`<ul>` items → each `<li>` as `- item text`
    - [x] Ensure checklist items appear after inline content (not mixed)
- [x] Task: Integrate converter into `copyCurrentTask()` [7404d95]
    - [x] Replace `stripChecklist()` call with `htmlToWhatsApp()` in the copy flow
    - [x] Ensure title is still prepended as plain text
    - [x] Verify clipboard output for both `navigator.clipboard` and fallback methods
- [x] Task: Conductor - User Manual Verification 'Phase 1: Create HTML to WhatsApp Converter' (Protocol in workflow.md) [ec61aab]

## Phase 2: Testing & Edge Cases

- [x] Task: Verify formatting edge cases
    - [x] Test empty content
    - [x] Test mixed formatting (bold + italic + strikethrough)
    - [x] Test nested tags (`<b><i>bold+italic</i></b>`)
    - [x] Test checklist with inline formatting inside
    - [x] Test content with no formatting (plain text unaffected)
- [x] Task: Conductor - User Manual Verification 'Phase 2: Testing & Edge Cases' (Protocol in workflow.md) [ec61aab]
