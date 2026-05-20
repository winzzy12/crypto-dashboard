<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

        <title>{{ config('app.name', 'Dashboard') }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            :root {
                --primary: #667eea;
                --primary-dark: #764ba2;
                --bg-light: #f8f9fa;
                --bg-dark: #1a1a2e;
                --card-light: #ffffff;
                --card-dark: #16213e;
                --text-light: #333333;
                --text-dark: #e0e0e0;
                --border-light: #e0e0e0;
                --border-dark: #2d3561;
                --sidebar-width: 260px;
            }

            html, body {
                width: 100%;
                height: 100%;
                overflow-x: hidden;
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                transition: background-color 0.3s ease, color 0.3s ease;
                display: flex;
            }

            body.light-mode {
                background-color: var(--bg-light);
                color: var(--text-light);
            }

            body.dark-mode {
                background-color: var(--bg-dark);
                color: var(--text-dark);
            }

            /* Mobile Menu Toggle */
            .mobile-menu-toggle {
                display: none;
                background: none;
                border: none;
                font-size: 24px;
                cursor: pointer;
                color: var(--text-light);
                padding: 8px;
            }

            body.dark-mode .mobile-menu-toggle {
                color: var(--text-dark);
            }

            /* Sidebar */
            .sidebar {
                width: var(--sidebar-width);
                background: var(--card-light);
                border-right: 1px solid var(--border-light);
                padding: 2rem 0;
                height: 100vh;
                position: fixed;
                left: 0;
                top: 0;
                overflow-y: auto;
                transition: all 0.3s ease;
                z-index: 1000;
            }

            body.dark-mode .sidebar {
                background: var(--card-dark);
                border-right-color: var(--border-dark);
            }

            .sidebar-brand {
                padding: 0 1.5rem;
                margin-bottom: 2rem;
                font-size: 24px;
                font-weight: 700;
                background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .sidebar-menu {
                list-style: none;
            }

            .sidebar-menu li {
                margin: 0.5rem 0;
            }

            .sidebar-menu a {
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 12px 1.5rem;
                color: var(--text-light);
                text-decoration: none;
                transition: all 0.3s ease;
                font-size: 14px;
                font-weight: 500;
            }

            body.dark-mode .sidebar-menu a {
                color: var(--text-dark);
            }

            .sidebar-menu a:hover {
                background: rgba(102, 126, 234, 0.1);
                color: var(--primary);
                padding-left: 2rem;
            }

            .sidebar-menu a.active {
                background: linear-gradient(135deg, rgba(102, 126, 234, 0.2) 0%, rgba(118, 75, 162, 0.2) 100%);
                color: var(--primary);
                border-left: 3px solid var(--primary);
                padding-left: calc(1.5rem - 3px);
            }

            .sidebar-menu-icon {
                font-size: 18px;
                min-width: 20px;
            }

            .sidebar-divider {
                height: 1px;
                background: var(--border-light);
                margin: 1rem 0;
            }

            body.dark-mode .sidebar-divider {
                background: var(--border-dark);
            }

            /* Main Container */
            .main-wrapper {
                margin-left: var(--sidebar-width);
                width: calc(100% - var(--sidebar-width));
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }

            /* Navbar */
            .navbar {
                background: var(--card-light);
                border-bottom: 1px solid var(--border-light);
                padding: 1rem 1.5rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
                transition: all 0.3s ease;
            }

            body.dark-mode .navbar {
                background: var(--card-dark);
                border-bottom-color: var(--border-dark);
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            }

            .navbar-title {
                font-size: 18px;
                font-weight: 600;
            }

            .navbar-right {
                display: flex;
                align-items: center;
                gap: 15px;
            }

            .theme-toggle {
                background: none;
                border: none;
                cursor: pointer;
                font-size: 20px;
                transition: transform 0.3s ease;
                color: var(--text-light);
                padding: 4px;
            }

            body.dark-mode .theme-toggle {
                color: var(--text-dark);
            }

            .theme-toggle:hover {
                transform: rotate(20deg);
            }

            .user-menu {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .user-name {
                font-weight: 600;
                font-size: 13px;
            }

            .logout-btn {
                background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
                color: white;
                border: none;
                padding: 6px 12px;
                border-radius: 6px;
                cursor: pointer;
                font-size: 12px;
                font-weight: 600;
                transition: all 0.3s ease;
            }

            .logout-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
            }

            /* Page Header */
            .page-header {
                background: var(--card-light);
                border-bottom: 1px solid var(--border-light);
                padding: 1.5rem;
                transition: all 0.3s ease;
            }

            body.dark-mode .page-header {
                background: var(--card-dark);
                border-bottom-color: var(--border-dark);
            }

            .page-header h1 {
                font-size: 28px;
                font-weight: 700;
                margin-bottom: 0.5rem;
            }

            .page-header p {
                color: #999;
                font-size: 13px;
            }

            /* Main Content */
            .main-content {
                flex: 1;
                width: 100%;
                max-width: 1200px;
                margin: 0 auto;
                padding: 1.5rem;
            }

            .dashboard-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 1.5rem;
                margin-bottom: 1.5rem;
            }

            .card {
                background: var(--card-light);
                border: 1px solid var(--border-light);
                border-radius: 12px;
                padding: 1.5rem;
                transition: all 0.3s ease;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            }

            body.dark-mode .card {
                background: var(--card-dark);
                border-color: var(--border-dark);
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            }

            body.dark-mode .card:hover {
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
            }

            .card-icon {
                font-size: 36px;
                margin-bottom: 1rem;
            }

            .card-title {
                font-size: 16px;
                font-weight: 600;
                margin-bottom: 0.5rem;
            }

            .card-value {
                font-size: 24px;
                font-weight: 700;
                background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                margin-bottom: 0.5rem;
            }

            .card-description {
                color: #999;
                font-size: 12px;
            }

            .welcome-card {
                background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
                color: white;
                padding: 2rem;
                border-radius: 12px;
                margin-bottom: 1.5rem;
                box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            }

            .welcome-card h2 {
                font-size: 24px;
                margin-bottom: 0.5rem;
            }

            .welcome-card p {
                font-size: 13px;
                opacity: 0.9;
            }

            .stats-section {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1rem;
                margin-bottom: 1.5rem;
            }

            .stat-item {
                background: var(--card-light);
                border: 1px solid var(--border-light);
                border-radius: 12px;
                padding: 1.2rem;
                transition: all 0.3s ease;
            }

            body.dark-mode .stat-item {
                background: var(--card-dark);
                border-color: var(--border-dark);
            }

            .stat-label {
                color: #999;
                font-size: 12px;
                margin-bottom: 0.5rem;
            }

            .stat-value {
                font-size: 20px;
                font-weight: 700;
                color: var(--primary);
            }

            /* Scrollbar */
            .sidebar::-webkit-scrollbar {
                width: 6px;
            }

            .sidebar::-webkit-scrollbar-track {
                background: transparent;
            }

            .sidebar::-webkit-scrollbar-thumb {
                background: rgba(102, 126, 234, 0.3);
                border-radius: 3px;
            }

            .sidebar::-webkit-scrollbar-thumb:hover {
                background: rgba(102, 126, 234, 0.5);
            }

            /* Tablet (768px - 1024px) */
            @media (max-width: 1024px) {
                .main-content {
                    padding: 1.2rem;
                }

                .dashboard-grid {
                    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                    gap: 1.2rem;
                }

                .page-header h1 {
                    font-size: 24px;
                }

                .navbar-title {
                    font-size: 16px;
                }

                .user-name {
                    display: none;
                }
            }

            /* Mobile (< 768px) */
            @media (max-width: 768px) {
                :root {
                    --sidebar-width: 0;
                }

                body {
                    flex-direction: column;
                }

                .mobile-menu-toggle {
                    display: block;
                }

                .sidebar {
                    width: 260px;
                    left: -260px;
                    height: auto;
                    max-height: 100vh;
                    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
                }

                .sidebar.active {
                    left: 0;
                }

                .sidebar-overlay {
                    display: none;
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0, 0, 0, 0.5);
                    z-index: 999;
                }

                .sidebar-overlay.active {
                    display: block;
                }

                .main-wrapper {
                    margin-left: 0;
                    width: 100%;
                }

                .navbar {
                    padding: 0.8rem 1rem;
                }

                .navbar-title {
                    font-size: 14px;
                }

                .navbar-right {
                    gap: 10px;
                }

                .user-menu {
                    gap: 8px;
                }

                .user-name {
                    display: none;
                }

                .logout-btn {
                    padding: 5px 10px;
                    font-size: 11px;
                }

                .page-header {
                    padding: 1rem;
                }

                .page-header h1 {
                    font-size: 20px;
                }

                .page-header p {
                    font-size: 12px;
                }

                .main-content {
                    padding: 1rem;
                }

                .welcome-card {
                    padding: 1.5rem;
                }

                .welcome-card h2 {
                    font-size: 20px;
                }

                .welcome-card p {
                    font-size: 12px;
                }

                .dashboard-grid {
                    grid-template-columns: 1fr;
                    gap: 1rem;
                }

                .card {
                    padding: 1.2rem;
                }

                .card-icon {
                    font-size: 32px;
                }

                .card-title {
                    font-size: 14px;
                }

                .card-value {
                    font-size: 20px;
                }

                .card-description {
                    font-size: 11px;
                }

                .stats-section {
                    grid-template-columns: 1fr;
                    gap: 0.8rem;
                }

                .stat-item {
                    padding: 1rem;
                }

                .stat-label {
                    font-size: 11px;
                }

                .stat-value {
                    font-size: 18px;
                }
            }

            /* Small Mobile (< 480px) */
            @media (max-width: 480px) {
                .navbar {
                    padding: 0.6rem 0.8rem;
                }

                .navbar-title {
                    font-size: 12px;
                }

                .theme-toggle {
                    font-size: 18px;
                }

                .page-header {
                    padding: 0.8rem;
                }

                .page-header h1 {
                    font-size: 18px;
                }

                .main-content {
                    padding: 0.8rem;
                }

                .welcome-card {
                    padding: 1.2rem;
                }

                .welcome-card h2 {
                    font-size: 18px;
                }

                .card {
                    padding: 1rem;
                }

                .card-icon {
                    font-size: 28px;
                }

                .card-title {
                    font-size: 13px;
                }

                .card-value {
                    font-size: 18px;
                }

                .sidebar-brand {
                    font-size: 20px;
                    padding: 0 1rem;
                    margin-bottom: 1.5rem;
                }

                .sidebar-menu a {
                    padding: 10px 1rem;
                    font-size: 13px;
                }
            }
        </style>
    </head>
    <body class="light-mode font-sans antialiased">
        <!-- Sidebar Overlay (Mobile) -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">Crypto Dashboard</div>
            
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <span class="sidebar-menu-icon">📊</span>
                        <span>Crypto Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('airdrop.index') }}" class="{{ request()->routeIs('airdrop.*') ? 'active' : '' }}">
                        <span class="sidebar-menu-icon">🎁</span>
                        <span>Airdrop</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('settings') }}" class="{{ request()->routeIs('settings') ? 'active' : '' }}">
                        <span class="sidebar-menu-icon">⚙️</span>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-divider"></div>

            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                        <span class="sidebar-menu-icon">👤</span>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display: contents;">
                        @csrf
                        <li>
                            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                <span class="sidebar-menu-icon">🚪</span>
                                <span>Logout</span>
                            </a>
                        </li>
                    </form>
                </li>
            </ul>
        </aside>

        <!-- Main Wrapper -->
        <div class="main-wrapper">
            <!-- Navbar -->
            <nav class="navbar">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <button class="mobile-menu-toggle" id="mobileMenuToggle" title="Toggle Menu">☰</button>
                    <div class="navbar-title">Welcome back!</div>
                </div>
                <div class="navbar-right">
                    <button class="theme-toggle" id="themeToggle" title="Toggle Dark Mode">
                        <span id="themeIcon">🌙</span>
                    </button>
                    <div class="user-menu">
                        <span class="user-name">{{ Auth::user()->name }}</span>
                    </div>
                </div>
            </nav>

            <!-- Page Header -->
            @if (isset($header))
                <header class="page-header">
                    {{ $header }}
                </header>
            @endif

            <!-- Main Content -->
            <main class="main-content">
                {{ $slot }}
            </main>
        </div>

        <script>
            // Mobile Menu Toggle
            const mobileMenuToggle = document.getElementById('mobileMenuToggle');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');

            mobileMenuToggle.addEventListener('click', () => {
                sidebar.classList.toggle('active');
                sidebarOverlay.classList.toggle('active');
            });

            sidebarOverlay.addEventListener('click', () => {
                sidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
            });

            // Close sidebar when clicking a link
            document.querySelectorAll('.sidebar-menu a').forEach(link => {
                link.addEventListener('click', () => {
                    sidebar.classList.remove('active');
                    sidebarOverlay.classList.remove('active');
                });
            });

            // Dark Mode Toggle
            const themeToggle = document.getElementById('themeToggle');
            const themeIcon = document.getElementById('themeIcon');
            const body = document.body;

            // Load saved theme preference
            const savedTheme = localStorage.getItem('theme') || 'light-mode';
            body.classList.remove('light-mode', 'dark-mode');
            body.classList.add(savedTheme);
            updateThemeIcon();

            themeToggle.addEventListener('click', () => {
                const isLightMode = body.classList.contains('light-mode');
                
                if (isLightMode) {
                    body.classList.remove('light-mode');
                    body.classList.add('dark-mode');
                    localStorage.setItem('theme', 'dark-mode');
                } else {
                    body.classList.remove('dark-mode');
                    body.classList.add('light-mode');
                    localStorage.setItem('theme', 'light-mode');
                }
                
                updateThemeIcon();
            });

            function updateThemeIcon() {
                const isDarkMode = body.classList.contains('dark-mode');
                themeIcon.textContent = isDarkMode ? '☀️' : '🌙';
            }

            // Prevent body scroll when sidebar is open
            const sidebarMenu = document.querySelector('.sidebar-menu');
            if (sidebarMenu) {
                sidebarMenu.addEventListener('touchmove', (e) => {
                    if (sidebar.classList.contains('active')) {
                        e.stopPropagation();
                    }
                });
            }
        </script>
    </body>
</html>
