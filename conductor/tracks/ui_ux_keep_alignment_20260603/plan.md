# Plan: UI/UX Google Keep Alignment

## Phase 1: Typography & Colors

- [ ] Task: Update typography to match Google Keep
    - [ ] Update card title: 14px font-medium #202124
    - [ ] Update card content: 13px #3c4043 line-height 1.43
    - [ ] Update editor title: 22px font-normal #202124
    - [ ] Update editor content: 14px #3c4043
    - [ ] Update all text colors across dashboard and task editor
- [ ] Task: Update card shadows and border radius
    - [ ] Set border-radius to 8px on task cards
    - [ ] Set shadow style matching Keep
    - [ ] Update card padding and spacing
- [ ] Task: Conductor - User Manual Verification 'Phase 1: Typography & Colors' (Protocol in workflow.md)

## Phase 2: Grid Layout & Minimal Header

- [ ] Task: Implement grid layout on dashboard
    - [ ] 2 columns on desktop (min-width: 768px)
    - [ ] 1 column on mobile
    - [ ] Adjust card width, gap, and padding per column
- [ ] Task: Simplify header
    - [ ] Remove logout text button
    - [ ] Make avatar clickable for logout only
    - [ ] Reduce header height and padding
- [ ] Task: Conductor - User Manual Verification 'Phase 2: Grid Layout & Header' (Protocol in workflow.md)

## Phase 3: Toast Notifications

- [ ] Task: Build toast notification component
    - [ ] Create reusable toast Alpine.js component
    - [ ] Add slide-in/out animation
    - [ ] Auto-hide after 3 seconds
    - [ ] Position: bottom center above floating button
- [ ] Task: Wire toast to all user actions
    - [ ] Show toast on save task
    - [ ] Show toast on copy to clipboard
    - [ ] Show toast on delete task
    - [ ] Show toast on label toggle
    - [ ] Use green for success, red for errors
- [ ] Task: Conductor - User Manual Verification 'Phase 3: Toast Notifications' (Protocol in workflow.md)

## Phase 4: Animations & Final Polish

- [ ] Task: Add card hover animations
    - [ ] translateY(-2px) on hover
    - [ ] Shadow transition on hover
- [ ] Task: Add floating button animation
    - [ ] Scale animation on tap/click
- [ ] Task: Add modal transition
    - [ ] Ensure bottom-sheet has slide-up transition
- [ ] Task: Final visual review and consistency check
    - [ ] Verify all states match Keep style
    - [ ] Test mobile responsiveness
    - [ ] Test all interactions
- [ ] Task: Conductor - User Manual Verification 'Phase 4: Animations & Final Polish' (Protocol in workflow.md)
