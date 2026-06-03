# Spec: Add Dark Mode Toggle

## Overview
Add a toggleable dark mode theme to the TaskFlow application, allowing users to switch between light mode (existing) and dark mode via a toggle switch in the header. The dark mode palette follows Google Keep's dark theme style. The preference is persisted in localStorage.

## Functional Requirements

### FR1: Dark Mode Toggle
- Add a sun/moon icon toggle button in the header (right side) on Dashboard and Task Editor pages.
- Clicking the toggle switches between light and dark themes.
- The toggle icon reflects the current mode (sun for light, moon for dark).

### FR2: Theme Persistence
- Theme preference is saved to `localStorage` under a key (e.g., `theme`).
- On page load, check `localStorage` for saved preference and apply the correct theme.
- Default to light mode if no preference is saved.

### FR3: Dark Mode Styling
- Use Tailwind `dark:` prefix variant with a `dark` CSS class on the `<html>` element.
- Colors follow Google Keep dark mode:
  - Page background: `#202124`
  - Card background: `#333333`
  - Text: white (`#ffffff`)
  - Inputs, buttons, and UI elements adjusted accordingly for contrast.

### FR4: Scope
- Dark mode applies to **Dashboard** (`dashboard.html`) and **Task Editor** (`task.html`).
- Login (`login.html`) and Register (`register.html`) pages remain in light mode.

## Non-Functional Requirements
- No FOUC (Flash of Unstyled Content) — apply theme from localStorage before page render (inline script in `<head>`).
- Toggle animation should be smooth.
- Must work alongside existing Alpine.js state management.

## Acceptance Criteria
- [ ] Toggle icon is visible in the header on Dashboard and Task pages.
- [ ] Clicking toggle switches theme and updates icon.
- [ ] Theme persists across page reload (localStorage).
- [ ] Dark mode colors match the Google Keep palette specified.
- [ ] No FOUC on page load.
- [ ] Login/Register pages are unaffected (light only).

## Out of Scope
- Server-side theme preference storage.
- Dark mode for Login/Register pages.
- AMOLED pure black theme option.
