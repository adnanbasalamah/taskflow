# Plan: Add Dark Mode Toggle

## Phase 1: Tailwind Dark Mode Configuration

- [x] Task: Enable Tailwind `class` dark mode strategy [1df1fb0]
    - [x] Add `darkMode: 'class'` to Tailwind config block before CDN script
    - [x] Verify that adding `class="dark"` to `<html>` element triggers dark variants
- [x] Task: Add FOUC prevention script to Dashboard & Task pages [1df1fb0]
    - [x] Add inline `<script>` in `<head>` that reads localStorage and applies `dark` class before page renders
    - [x] Ensure script runs synchronously before any CSS is painted
- [x] Task: Create localStorage theme utility helper [1df1fb0]
    - [x] Add `getTheme()` and `setTheme()` helper functions in the Alpine component
    - [x] Default to `'light'` if no preference saved
- [x] Task: Conductor - User Manual Verification 'Phase 1: Tailwind Dark Mode Configuration' (Protocol in workflow.md) [a82dd3d]

## Phase 2: Dark Mode Toggle UI

- [x] Task: Add theme toggle button to header (dashboard.html & task.html) [1df1fb0]
    - [x] Add sun/moon icon button (SVG inline) in the right side of the header
    - [x] Style as an icon-only button with hover effect
    - [x] Toggle `dark` class on `<html>` on click
    - [x] Update icon to reflect current mode (sun for light, moon for dark)
- [x] Task: Wire toggle to Alpine.js state [1df1fb0]
    - [x] Add `theme` property to existing Alpine.js component
    - [x] Initialize `theme` from localStorage on mount
    - [x] Sync Alpine state ↔ DOM class ↔ localStorage on changes
- [x] Task: Conductor - User Manual Verification 'Phase 2: Dark Mode Toggle UI' (Protocol in workflow.md) [a82dd3d]

## Phase 3: Dark Mode Styling Implementation

- [x] Task: Apply dark mode styles to Dashboard (dashboard.html) [1df1fb0]
    - [x] Add `dark:bg-[#202124]` to page background & header
    - [x] Add `#333` background, white text to task cards via CSS
    - [x] Update filter pills, search input with `dark:` variants
    - [x] Adjust header background for dark mode
    - [x] Verify Google Keep color consistency
- [x] Task: Apply dark mode styles to Task Editor (task.html) [1df1fb0]
    - [x] Add `dark:bg-[#202124]` to page background
    - [x] Add `#333` background to editor card via CSS
    - [x] Update toolbar, input fields, checklist items with `dark:` variants
    - [x] Adjust buttons, menus, modals for dark mode
- [x] Task: Ensure Login & Register pages remain light-only (no changes) [1df1fb0]
- [x] Task: Conductor - User Manual Verification 'Phase 3: Dark Mode Styling Implementation' (Protocol in workflow.md) [a82dd3d]
