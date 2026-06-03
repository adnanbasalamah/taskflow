# Plan: Add Dark Mode Toggle

## Phase 1: Tailwind Dark Mode Configuration

- [ ] Task: Enable Tailwind `class` dark mode strategy
    - [ ] Add `darkMode: 'class'` to Tailwind config (either via `tailwind.config.js` or CDN config block)
    - [ ] Verify that adding `class="dark"` to `<html>` element triggers dark variants
- [ ] Task: Add FOUC prevention script to Dashboard & Task pages
    - [ ] Add inline `<script>` in `<head>` that reads localStorage and applies `dark` class before page renders
    - [ ] Ensure script runs synchronously before any CSS is painted
- [ ] Task: Create localStorage theme utility helper
    - [ ] Add `getTheme()` and `setTheme()` helper functions in an inline `<script>` or shared utility
    - [ ] Default to `'light'` if no preference saved
- [ ] Task: Conductor - User Manual Verification 'Phase 1: Tailwind Dark Mode Configuration' (Protocol in workflow.md)

## Phase 2: Dark Mode Toggle UI

- [ ] Task: Add theme toggle button to header (dashboard.html & task.html)
    - [ ] Add sun/moon icon button (SVG inline) in the right side of the header
    - [ ] Style as an icon-only button with hover effect
    - [ ] Toggle `dark` class on `<html>` on click
    - [ ] Update icon to reflect current mode (sun for light, moon for dark)
- [ ] Task: Wire toggle to Alpine.js state
    - [ ] Add `theme` property to existing Alpine.js component (dashboardApp or taskApp)
    - [ ] Initialize `theme` from localStorage on mount
    - [ ] Sync Alpine state ↔ DOM class ↔ localStorage on changes
- [ ] Task: Conductor - User Manual Verification 'Phase 2: Dark Mode Toggle UI' (Protocol in workflow.md)

## Phase 3: Dark Mode Styling Implementation

- [ ] Task: Apply dark mode styles to Dashboard (dashboard.html)
    - [ ] Add `dark:bg-[#202124]` to page background
    - [ ] Add `dark:bg-[#333] dark:text-white` to task cards
    - [ ] Update filter pills, buttons, inputs with `dark:` variants
    - [ ] Adjust header background for dark mode
    - [ ] Verify Google Keep color consistency
- [ ] Task: Apply dark mode styles to Task Editor (task.html)
    - [ ] Add `dark:bg-[#202124]` to page background
    - [ ] Add `dark:bg-[#333] dark:text-white` to editor card
    - [ ] Update toolbar, input fields, checklist items with `dark:` variants
    - [ ] Adjust save/delete buttons for dark mode
- [ ] Task: Ensure Login & Register pages remain light-only (no changes)
- [ ] Task: Conductor - User Manual Verification 'Phase 3: Dark Mode Styling Implementation' (Protocol in workflow.md)
