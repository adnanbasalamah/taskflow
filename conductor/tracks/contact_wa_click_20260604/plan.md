# Plan: Click Contact to Open WhatsApp in Task Editor

## Phase 1: Contact Avatar & WhatsApp Integration

- [ ] Task: Add avatar circle display for contacts in task editor
    - [ ] Add colored avatar circle with first initial next to contact name
    - [ ] Assign consistent color based on contact name hash
    - [ ] Style avatar circle (Google Keep aesthetic, 44x44px min tap target)
    - [ ] Responsive layout on mobile and desktop
- [ ] Task: Wire click-to-WhatsApp on contact avatar and name
    - [ ] Add click handler on avatar circle to open wa.me/{phone} in new tab
    - [ ] Add click handler on contact name to open wa.me/{phone} in new tab
    - [ ] Ensure links open with target="_blank" or window.open
- [ ] Task: Conductor - User Manual Verification 'Phase 1: Contact Avatar & WhatsApp Integration' (Protocol in workflow.md)
