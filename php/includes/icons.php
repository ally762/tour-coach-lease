<?php
// Minimal inline SVG icon set (stroke icons, 24x24)
function icon($name) {
  $p = [
    'check'   => '<path d="M5 12.5l4.5 4.5L19 7.5"/>',
    'shield'  => '<path d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6l7-3z"/><path d="M9 12l2 2 4-4"/>',
    'clock'   => '<circle cx="12" cy="12" r="8.5"/><path d="M12 7.5V12l3 2"/>',
    'list'    => '<path d="M7 8h10M7 12h10M7 16h6"/>',
    'pin'     => '<path d="M12 21s-6.5-6-6.5-11a6.5 6.5 0 0113 0c0 5-6.5 11-6.5 11z"/><circle cx="12" cy="10" r="2.3"/>',
    'phone'   => '<path d="M5 4h3.5l1.7 4.3-2.2 1.4a11 11 0 005.3 5.3l1.4-2.2L19 14.5V18a2 2 0 01-2 2A14 14 0 013 6a2 2 0 012-2z"/>',
    'mail'    => '<rect x="3.5" y="5.5" width="17" height="13" rx="2"/><path d="M4 7l8 6 8-6"/>',
    'bed'     => '<path d="M3 18V7M3 14h18v4M21 14v-2a3 3 0 00-3-3h-7v5"/><circle cx="7" cy="11" r="1.6"/>',
    'tv'      => '<rect x="3.5" y="5" width="17" height="11.5" rx="2"/><path d="M9 20h6"/>',
    'wifi'    => '<path d="M4.5 10a11 11 0 0115 0M7.5 13.2a6.5 6.5 0 019 0"/><circle cx="12" cy="17" r="1.1"/>',
    'bolt'    => '<path d="M13 3L5 13.5h6L10 21l8-10.5h-6L13 3z"/>',
    'fridge'  => '<rect x="6" y="3" width="12" height="18" rx="2"/><path d="M6 10h12M9 6v1.5M9 13v2"/>',
    'bath'    => '<path d="M4 12h16v2a5 5 0 01-5 5H9a5 5 0 01-5-5v-2zM7 12V6a2 2 0 014 0"/>',
    'box'     => '<rect x="4" y="7" width="16" height="12" rx="1.6"/><path d="M9 7V5h6v2M4 11h16"/>',
    'snow'    => '<path d="M12 3v18M4.2 7.5l15.6 9M4.2 16.5l15.6-9"/>',
    'trailer' => '<rect x="2.5" y="6" width="12" height="9" rx="1.3"/><path d="M14.5 9h4l2.5 3v3h-7"/><circle cx="7" cy="17" r="1.8"/><circle cx="17.5" cy="17" r="1.8"/>',
    'truck'   => '<rect x="2.5" y="6.5" width="11" height="8.5" rx="1.2"/><path d="M13.5 9.5h4.5l3 3v2.5h-7.5"/><circle cx="7" cy="17" r="1.8"/><circle cx="17" cy="17" r="1.8"/>',
    'pulse'   => '<path d="M3 12h4l2.5-6 4 12 2.5-6H21"/>',
  ];
  return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . ($p[$name] ?? '') . '</svg>';
}
function tick_ico() { return '<span class="tick__ico">' . icon('check') . '</span>'; }
