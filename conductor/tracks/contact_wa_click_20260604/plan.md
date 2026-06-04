# Plan: Click Contact to Open WhatsApp in Task Editor

## Phase 1: Contact Avatar & WhatsApp Integration [checkpoint: 399b850]

- [x] Task: Add avatar circle display for contacts in task editor [db20ea3]
    - [x] Add colored avatar circle with first initial next to contact name
    - [x] Assign consistent color based on contact name hash
    - [x] Style avatar circle (Google Keep aesthetic, 44x44px min tap target)
    - [x] Responsive layout on mobile and desktop
- [x] Task: Wire click-to-WhatsApp on contact avatar and name [db20ea3]
    - [x] Add click handler on avatar circle to open wa.me/{phone} in new tab
    - [x] Add click handler on contact name to open wa.me/{phone} in new tab
    - [x] Ensure links open with target="_blank" or window.open
- [x] Task: Conductor - User Manual Verification 'Phase 1: Contact Avatar & WhatsApp Integration' (Protocol in workflow.md)
