<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <script>
    tailwind.config = { darkMode: 'class' }
  </script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    (function() {
      const theme = localStorage.getItem('theme') || 'light';
      if (theme === 'dark') document.documentElement.classList.add('dark');
    })();
  </script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link rel="manifest" href="/manifest.json">
  <meta name="theme-color" content="#6366f1">
  <link rel="icon" type="image/png" href="/assets/favicon.png">
  <link rel="apple-touch-icon" href="/assets/icon-192.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Roboto', Arial, sans-serif; }
    html.dark { background-color: #202124 !important; }
    html.dark body { background-color: #202124 !important; }
    .dark .text-gray-400 { color: #9aa0a6 !important; }
    .dark .text-gray-500 { color: #9aa0a6 !important; }
    .dark .text-gray-700 { color: #e8eaed !important; }
    .dark .text-gray-600 { color: #e0e0e0 !important; }
    .dark .text-gray-800 { color: #e8eaed !important; }
    .dark .text-gray-900 { color: #fff !important; }
  </style>
  <?php if ($page === 'dashboard'): ?>
  <style>
    .task-card { transition: all 0.2s ease; }
    .task-card:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
    @keyframes fab-enter { 0% { transform: scale(0); opacity: 0; } 60% { transform: scale(1.1); } 100% { transform: scale(1); opacity: 1; } }
    .fab { animation: fab-enter 0.3s ease-out; }
    .filter-pill { padding: 6px 16px; border-radius: 999px; font-size: 13px; font-weight: 500; cursor: pointer; transition: all 0.2s; border: none; white-space: nowrap; }
    .filter-pill.active { background: #6366f1; color: white; }
    .filter-pill:not(.active) { background: #f3f4f6; color: #4b5563; }
    .filter-pill:not(.active):hover { background: #e5e7eb; }
    .checked-item { text-decoration: line-through; color: #9ca3af; }
    .card-content { display: -webkit-box; -webkit-line-clamp: 6; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.43; }
    .dark .sticky.top-0 { background-color: #202124 !important; border-bottom-color: #3c4043 !important; }
    .dark .task-card { background: #333 !important; border-color: #444 !important; }
    .dark .task-card h3 { color: #fff !important; }
    .dark .card-content { color: #e0e0e0 !important; }
    .dark .filter-pill:not(.active) { background: #3c4043; color: #e0e0e0; }
    .dark .filter-pill:not(.active):hover { background: #4a4d52; }
    .dark input.bg-gray-100 { background: #3c4043; color: #e0e0e0; }
    .dark input.bg-gray-100:focus { background: #3c4043; }
  </style>
  <?php elseif ($page === 'task'): ?>
  <style>
    .checked-item { text-decoration: line-through; color: #9ca3af; }
    [contenteditable]:focus { outline: none; }
    .dark .sticky.top-0 { background-color: #202124 !important; border-bottom-color: #3c4043 !important; }
    .dark .border-gray-100 { border-color: #3c4043 !important; }
    .dark .border-gray-200 { border-color: #3c4043 !important; }
    .dark .bg-white { background-color: #202124 !important; }
    .dark input.bg-transparent { color: #e8eaed; }
    .dark [contenteditable] { color: #e0e0e0; }
    .dark .rounded-\[8px\].border { background: #333 !important; }
  </style>
  <?php endif; ?>
</head>
<body class="bg-gray-50 min-h-screen">
  <?php require $viewFile; ?>
  <script>
  if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/sw.js');
  }
  </script>
</body>
</html>
