# Spec: Click Contact to Open WhatsApp in Task Editor

## Overview
In the task editor page, delegated contacts are displayed below the task content. This feature enhances the contact display with an avatar circle (colored circle with the contact's first initial) and makes clicking either the avatar or the contact name directly open WhatsApp (wa.me link) in a new tab, without confirmation.

## Functional Requirements
- Display each delegated contact as a colored avatar circle with the first letter of their name, followed by their full name
- Assign a consistent color to each avatar based on the contact name (hash-based)
- Clicking the avatar circle OR the contact name opens `https://wa.me/{phone_number}` in a new browser tab
- No confirmation step — opens immediately
- Only applies to the task editor page (`?page=task&id=N`)
- Existing contact list positioning below task content is unchanged

## Non-Functional Requirements
- Matches Google Keep card aesthetic (rounded avatar, subtle shadow)
- Touch-friendly tap target (44x44px minimum for avatar)
- Responsive on mobile and desktop

## Acceptance Criteria
1. Contact is rendered as `[circle with initial] Contact Name` below task content
2. Clicking the avatar circle opens WhatsApp to that contact's number
3. Clicking the name text also opens WhatsApp to that contact's number
4. Link opens in a new tab (`target="_blank"` or `window.open`)
5. Existing contacts display area is unaffected

## Out of Scope
- Dashboard card changes — task editor only
- Confirmation dialogs or tooltips
- Contact management (add/edit/delete contacts)
