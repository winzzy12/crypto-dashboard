<x-app-layout>
    <x-slot name="header">
        <h1>Welcome, {{ Auth::user()->name }}! 👋</h1>
        <p>Here's your dashboard overview</p>
    </x-slot>

    <style>
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
        }

        @media (min-width: 768px) {
            .dashboard-container {
                padding: 2rem;
            }
        }

        .welcome-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .welcome-content h2 {
            font-size: 24px;
            margin-bottom: 0.5rem;
        }

        .welcome-content p {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 1rem;
        }

        .welcome-btn {
            display: inline-block;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .welcome-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .welcome-stats {
            display: flex;
            gap: 2rem;
        }

        .welcome-stat {
            text-align: center;
        }

        .welcome-stat-value {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .welcome-stat-label {
            font-size: 12px;
            opacity: 0.85;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .dashboard-card {
            background: var(--card-light);
            border: 1px solid var(--border-light);
            border-radius: 12px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        body.dark-mode .dashboard-card {
            background: #1a1f2e;
            border-color: #2a3142;
        }

        .dashboard-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.2);
            border-color: var(--primary);
        }

        body.dark-mode .dashboard-card:hover {
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.3);
        }

        .dashboard-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
        }

        .card-icon {
            font-size: 32px;
        }

        .card-badge {
            display: inline-block;
            padding: 4px 12px;
            background: rgba(102, 126, 234, 0.15);
            color: #667eea;
            border-radius: 16px;
            font-size: 11px;
            font-weight: 600;
            border: 1px solid rgba(102, 126, 234, 0.3);
        }

        body.dark-mode .card-badge {
            background: rgba(102, 126, 234, 0.2);
            border-color: rgba(102, 126, 234, 0.4);
        }

        .card-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-light);
            margin-bottom: 0.5rem;
        }

        body.dark-mode .card-title {
            color: #ffffff;
        }

        .card-value {
            font-size: 28px;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .card-description {
            font-size: 13px;
            color: #999;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid var(--border-light);
            margin-top: 1rem;
        }

        body.dark-mode .card-footer {
            border-top-color: #2a3142;
        }

        .card-link {
            font-size: 12px;
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .card-link:hover {
            text-decoration: underline;
        }

        .card-status {
            font-size: 11px;
            padding: 4px 8px;
            background: rgba(39, 174, 96, 0.15);
            color: #27ae60;
            border-radius: 4px;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .welcome-section {
                flex-direction: column;
                text-align: center;
            }

            .welcome-stats {
                justify-content: center;
                width: 100%;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="dashboard-container">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <div class="welcome-content">
                <h2>Welcome back! 🚀</h2>
                <p>You're all set and ready to manage your airdrops</p>
                <a href="{{ route('airdrop.index') }}" class="welcome-btn">Go to Airdrops →</a>
            </div>
            <div class="welcome-stats">
                <div class="welcome-stat">
                    <div class="welcome-stat-value">{{ $totalAirdrops ?? 0 }}</div>
                    <div class="welcome-stat-label">Total Airdrops</div>
                </div>
                <div class="welcome-stat">
                    <div class="welcome-stat-value">{{ $activeAirdrops ?? 0 }}</div>
                    <div class="welcome-stat-label">Active</div>
                </div>
                <div class="welcome-stat">
                    <div class="welcome-stat-value">{{ $completedAirdrops ?? 0 }}</div>
                    <div class="welcome-stat-label">Completed</div>
                </div>
            </div>
        </div>

        <!-- Dashboard Grid -->
        <div class="dashboard-grid">
            <!-- Airdrop Overview Card -->
            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-icon">🎁</div>
                    <span class="card-badge">Overview</span>
                </div>
                <div class="card-title">Airdrop Overview</div>
                <div class="card-value">{{ $totalAirdrops ?? 0 }}</div>
                <div class="card-description">Total airdrop projects</div>
                <div class="card-footer">
                    <a href="{{ route('airdrop.index') }}" class="card-link">View All →</a>
                    <span class="card-status">Active</span>
                </div>
            </div>

            <!-- Active Projects Card -->
            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-icon">✅</div>
                    <span class="card-badge">Status</span>
                </div>
                <div class="card-title">Active Projects</div>
                <div class="card-value">{{ $activeAirdrops ?? 0 }}</div>
                <div class="card-description">Currently running airdrops</div>
                <div class="card-footer">
                    <a href="{{ route('airdrop.index') }}" class="card-link">Manage →</a>
                    <span class="card-status">Live</span>
                </div>
            </div>

            <!-- Completed Projects Card -->
            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-icon">🏆</div>
                    <span class="card-badge">Achievement</span>
                </div>
                <div class="card-title">Completed Projects</div>
                <div class="card-value">{{ $completedAirdrops ?? 0 }}</div>
                <div class="card-description">Successfully finished airdrops</div>
                <div class="card-footer">
                    <a href="{{ route('airdrop.index') }}" class="card-link">Review →</a>
                    <span class="card-status">Done</span>
                </div>
            </div>

            <!-- Total Earnings Card -->
            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-icon">💰</div>
                    <span class="card-badge">Earnings</span>
                </div>
                <div class="card-title">Total Earnings</div>
                <div class="card-value">${{ number_format($totalEarnings ?? 0, 2) }}</div>
                <div class="card-description">From completed projects</div>
                <div class="card-footer">
                    <a href="{{ route('airdrop.index') }}" class="card-link">Details →</a>
                    <span class="card-status">Updated</span>
                </div>
            </div>

            <!-- Quick Actions Card -->
            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-icon">⚡</div>
                    <span class="card-badge">Actions</span>
                </div>
                <div class="card-title">Quick Actions</div>
                <div class="card-value">3</div>
                <div class="card-description">Available actions</div>
                <div class="card-footer">
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('airdrop.create') }}" class="card-link">Create New →</a>
                    @else
                        <a href="{{ route('airdrop.index') }}" class="card-link">Browse →</a>
                    @endif
                    <span class="card-status">Ready</span>
                </div>
            </div>

            <!-- Account Info Card -->
            <div class="dashboard-card">
                <div class="card-header">
                    <div class="card-icon">👤</div>
                    <span class="card-badge">Profile</span>
                </div>
                <div class="card-title">Account Info</div>
                <div class="card-value">{{ Auth::user()->role === 'admin' ? 'Admin' : 'Viewer' }}</div>
                <div class="card-description">{{ Auth::user()->email }}</div>
                <div class="card-footer">
                    <a href="{{ route('profile.edit') }}" class="card-link">Edit Profile →</a>
                    <span class="card-status">{{ Auth::user()->role === 'admin' ? 'Full' : 'View' }}</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize dashboard stats from airdrop data
        document.addEventListener('DOMContentLoaded', function() {
            // Stats are passed from controller
        });
    </script>
</x-app-layout>
