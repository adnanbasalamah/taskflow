# Plan: UI/UX Google Keep Alignment

## Phase 1: Typography & Colors

- [x] Task: Update typography to match Google Keep
    - [x] Update card title: 14px font-medium #202124
    - [x] Update card content: 13px #3c4043 line-height 1.43
    - [x] Update editor title: 22px font-normal #202124
    - [x] Update editor content: 14px #3c4043
    - [x] Update all text colors across dashboard and task editor
- [x] Task: Update card shadows and border radius
    - [x] Set border-radius to 8px on task cards
    - [x] Set shadow style matching Keep
    - [x] Update card padding and spacing
- [x] Task: Conductor - User Manual Verification 'Phase 1: Typography & Colors' (Protocol in workflow.md)

## Phase 2: Grid Layout & Minimal Header

- [x] Task: Implement grid layout on dashboard
    - [x] 2 columns on desktop (min-width: 768px)
    - [x] 1 column on mobile
    - [x] Adjust card width, gap, and padding per column
- [x] Task: Simplify header
    - [x] Remove logout text button
    - [x] Make avatar clickable for logout only
    - [x] Reduce header height and padding
- [x] Task: Conductor - User Manual Verification 'Phase 2: Grid Layout & Header' (Protocol in workflow.md)

## Phase 3: Toast Notifications

- [x] Task: Build toast notification component
    - [x] Create reusable toast Alpine.js component
    - [x] Add slide-in/out animation
    - [x] Auto-hide after 3 seconds
    - [x] Position: bottom center above floating button
- [x] Task: Wire toast to all user actions
    - [x] Show toast on save task
    - [x] Show toast on copy to clipboard
    - [x] Show toast on delete task
    - [x] Show toast on label toggle
    - [x] Use green for success, red for errors
- [x] Task: Conductor - User Manual Verification 'Phase 3: Toast Notifications' (Protocol in workflow.md)

## Phase 4: Animations & Final Polish

- [x] Task: Add card hover animations
    - [x] translateY(-2px) on hover
    - [x] Shadow transition on hover
- [x] Task: Add floating button animation
    - [x] Scale animation on tap/click
- [x] Task: Add modal transition
    - [x] Ensure bottom-sheet has slide-up transition
- [x] Task: Final visual review and consistency check
    - [x] Verify all states match Keep style
    - [x] Test mobile responsiveness
    - [x] Test all interactions
- [x] Task: Conductor - User Manual Verification 'Phase 4: Animations & Final Polish' (Protocol in workflow.md)
