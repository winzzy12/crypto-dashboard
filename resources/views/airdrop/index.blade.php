<x-app-layout>
    <x-slot name="header">
        <h1>Airdrop 🎁</h1>
        <p>Claim your tokens from active airdrops</p>
    </x-slot>

    <style>
        .airdrop-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
        }

        @media (min-width: 768px) {
            .airdrop-container {
                padding: 2rem;
            }
        }

        .airdrop-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1.25rem 2rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2rem;
        }

        .airdrop-header-content h2 {
            font-size: 22px;
            margin-bottom: 0.2rem;
        }

        .airdrop-header-content p {
            font-size: 12px;
            opacity: 0.85;
        }

        .airdrop-stats {
            display: flex;
            gap: 1.5rem;
            align-items: center;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        @media (max-width: 1400px) {
            .airdrop-stats {
                gap: 1rem;
            }

            .stat {
                padding: 0.4rem 0.6rem;
                min-width: 65px;
            }

            .stat-value {
                font-size: 14px;
            }

            .stat-label {
                font-size: 9px;
            }
        }

        .stat {
            text-align: center;
            padding: 0.5rem 0.75rem;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 5px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            white-space: nowrap;
            min-width: 70px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .stat-value {
            font-size: 15px;
            font-weight: 700;
            line-height: 1.2;
        }

        .stat-label {
            font-size: 10px;
            opacity: 0.8;
            font-weight: 500;
            margin-top: 0.1rem;
        }

        @media (max-width: 1200px) {
            .airdrop-header {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .airdrop-stats {
                width: 100%;
                justify-content: center;
                gap: 0.75rem;
                flex-wrap: wrap;
            }

            .stat {
                padding: 0.5rem 0.75rem;
            }

            .stat-value {
                font-size: 15px;
            }

            .stat-label {
                font-size: 10px;
            }
        }

        @media (max-width: 768px) {
            .airdrop-header {
                padding: 1rem 1.5rem;
            }

            .airdrop-header-content h2 {
                font-size: 18px;
            }

            .airdrop-stats {
                gap: 0.5rem;
            }

            .stat {
                padding: 0.4rem 0.6rem;
                border-radius: 4px;
            }

            .stat-value {
                font-size: 13px;
                margin-bottom: 0.1rem;
            }

            .stat-label {
                font-size: 9px;
                margin-top: 0;
            }
        }

        @media (max-width: 480px) {
            .airdrop-header {
                padding: 0.75rem 1rem;
                gap: 0.75rem;
            }

            .airdrop-header-content h2 {
                font-size: 16px;
                margin-bottom: 0.1rem;
            }

            .airdrop-header-content p {
                font-size: 11px;
            }

            .airdrop-stats {
                gap: 0.4rem;
            }

            .stat {
                padding: 0.3rem 0.5rem;
            }

            .stat-value {
                font-size: 12px;
            }

            .stat-label {
                font-size: 8px;
            }
        }

        .filter-section {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            align-items: center;
        }

        .search-input {
            padding: 10px 16px;
            border: 2px solid var(--border-light);
            background: var(--card-light);
            color: var(--text-light);
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            flex: 1;
            min-width: 250px;
        }

        body.dark-mode .search-input {
            background: #1a1f2e;
            border-color: #2a3142;
            color: #e0e0e0;
        }

        .search-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .search-input::placeholder {
            color: #999;
        }

        body.dark-mode .search-input::placeholder {
            color: #666;
        }

        .filter-btn {
            padding: 10px 20px;
            border: 2px solid var(--border-light);
            background: var(--card-light);
            color: var(--text-light);
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        body.dark-mode .filter-btn {
            background: #1a1f2e;
            border-color: #2a3142;
            color: #e0e0e0;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-color: transparent;
        }

        .airdrop-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .airdrop-card {
            background: var(--card-light);
            border: 1px solid var(--border-light);
            border-radius: 12px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        body.dark-mode .airdrop-card {
            background: #1a1f2e;
            border-color: #2a3142;
        }

        .airdrop-card.daily-done {
            background: linear-gradient(135deg, rgba(39, 174, 96, 0.1) 0%, rgba(39, 174, 96, 0.05) 100%);
            border-color: #27ae60;
            box-shadow: 0 0 20px rgba(39, 174, 96, 0.2);
        }

        body.dark-mode .airdrop-card.daily-done {
            background: linear-gradient(135deg, rgba(39, 174, 96, 0.15) 0%, rgba(39, 174, 96, 0.08) 100%);
            border-color: #27ae60;
            box-shadow: 0 0 20px rgba(39, 174, 96, 0.3);
        }

        .airdrop-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.2);
            border-color: var(--primary);
        }

        body.dark-mode .airdrop-card:hover {
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.3);
        }

        .airdrop-card::before {
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
            gap: 0.5rem;
        }

        .card-logo {
            width: 48px;
            height: 48px;
            border-radius: 8px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .card-badges {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 16px;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
            border: 1px solid;
        }

        .badge-status {
            background: rgba(102, 126, 234, 0.15);
            color: #667eea;
            border-color: rgba(102, 126, 234, 0.3);
        }

        body.dark-mode .badge-status {
            background: rgba(102, 126, 234, 0.2);
            border-color: rgba(102, 126, 234, 0.4);
        }

        .badge-task {
            background: rgba(52, 152, 219, 0.15);
            color: #3498db;
            border-color: rgba(52, 152, 219, 0.3);
        }

        body.dark-mode .badge-task {
            background: rgba(52, 152, 219, 0.2);
            border-color: rgba(52, 152, 219, 0.4);
        }

        .badge-completed {
            background: rgba(39, 174, 96, 0.15);
            color: #27ae60;
            border-color: rgba(39, 174, 96, 0.3);
        }

        body.dark-mode .badge-completed {
            background: rgba(39, 174, 96, 0.2);
            border-color: rgba(39, 174, 96, 0.4);
        }

        .badge-pending {
            background: rgba(241, 196, 15, 0.15);
            color: #f39c12;
            border-color: rgba(241, 196, 15, 0.3);
        }

        body.dark-mode .badge-pending {
            background: rgba(241, 196, 15, 0.2);
            border-color: rgba(241, 196, 15, 0.4);
        }

        .badge-daily-done {
            background: rgba(39, 174, 96, 0.15);
            color: #27ae60;
            border-color: rgba(39, 174, 96, 0.3);
        }

        body.dark-mode .badge-daily-done {
            background: rgba(39, 174, 96, 0.2);
            border-color: rgba(39, 174, 96, 0.4);
        }

        .daily-checklist-btn {
            padding: 8px 12px;
            background: var(--card-light);
            border: 2px solid var(--border-light);
            color: var(--text-light);
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 0.75rem;
        }

        body.dark-mode .daily-checklist-btn {
            background: #1a1f2e;
            border-color: #2a3142;
            color: #e0e0e0;
        }

        .daily-checklist-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.2);
        }

        .daily-checklist-btn.done {
            background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
            border-color: transparent;
            color: white;
        }

        .daily-checklist-btn.done:hover {
            box-shadow: 0 4px 12px rgba(39, 174, 96, 0.3);
        }

        .airdrop-name {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--text-light);
        }

        body.dark-mode .airdrop-name {
            color: #ffffff;
        }

        .airdrop-description {
            font-size: 13px;
            color: #999;
            margin-bottom: 0.5rem;
        }

        .airdrop-amount {
            font-size: 14px;
            font-weight: 600;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
        }

        .earnings-box {
            padding: 0.75rem;
            background: rgba(39, 174, 96, 0.1);
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 13px;
            color: #27ae60;
            font-weight: 600;
            border-left: 3px solid #27ae60;
        }

        body.dark-mode .earnings-box {
            background: rgba(39, 174, 96, 0.15);
        }

        .airdrop-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid var(--border-light);
            margin-top: auto;
        }

        body.dark-mode .airdrop-footer {
            border-top-color: #2a3142;
        }

        .airdrop-link {
            font-size: 12px;
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .airdrop-link:hover {
            text-decoration: underline;
        }

        .claim-btn {
            padding: 10px 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            margin-top: 1rem;
        }

        .claim-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #999;
            grid-column: 1 / -1;
        }

        .empty-state-icon {
            font-size: 64px;
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            font-size: 20px;
            margin-bottom: 0.5rem;
            color: var(--text-light);
        }

        body.dark-mode .empty-state h3 {
            color: #ffffff;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 14px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        @media (max-width: 768px) {
            .airdrop-header {
                flex-direction: column;
                text-align: center;
            }

            .airdrop-stats {
                justify-content: center;
                width: 100%;
            }

            .airdrop-grid {
                grid-template-columns: 1fr;
            }

            .filter-section {
                justify-content: center;
            }
        }
    </style>

    <div class="airdrop-container">
        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        <!-- Header -->
        <div class="airdrop-header">
            <div class="airdrop-header-content">
                <h2>Active Airdrops</h2>
                <p>Claim your tokens and earn rewards</p>
            </div>
            <div class="airdrop-stats">
                <div class="stat">
                    <div class="stat-value">{{ count(array_filter($airdrops->toArray(), fn($a) => $a['status'] === 'daily')) }}</div>
                    <div class="stat-label">Daily</div>
                </div>
                <div class="stat">
                    <div class="stat-value">{{ count(array_filter($airdrops->toArray(), fn($a) => $a['status'] === 'active')) }}</div>
                    <div class="stat-label">Active</div>
                </div>
                <div class="stat">
                    <div class="stat-value">{{ count(array_filter($airdrops->toArray(), fn($a) => $a['status'] === 'not_eligible')) }}</div>
                    <div class="stat-label">Not Eligible</div>
                </div>
                <div class="stat">
                    <div class="stat-value">{{ count(array_filter($airdrops->toArray(), fn($a) => $a['status'] === 'hold')) }}</div>
                    <div class="stat-label">Hold</div>
                </div>
                <div class="stat">
                    <div class="stat-value">{{ count(array_filter($airdrops->toArray(), fn($a) => $a['status'] === 'waitlist')) }}</div>
                    <div class="stat-label">Waitlist</div>
                </div>
                <div class="stat">
                    <div class="stat-value">{{ count(array_filter($airdrops->toArray(), fn($a) => $a['is_completed'])) }}</div>
                    <div class="stat-label">Completed</div>
                </div>
                <div class="stat">
                    <div class="stat-value">${{ number_format(array_sum(array_map(fn($a) => $a['is_completed'] ? $a['earnings'] : 0, $airdrops->toArray())), 2) }}</div>
                    <div class="stat-label">Total Earned</div>
                </div>
            </div>
        </div>

        <!-- Add Airdrop Button & Search (Top Row) -->
        <div style="display: flex; gap: 1rem; margin-bottom: 2rem; align-items: center; flex-wrap: wrap;">
            @if (Auth::user()->role === 'admin')
                <a href="{{ route('airdrop.create') }}" class="claim-btn" style="display: inline-block; padding: 10px 20px; width: auto; margin-top: 0;">
                    + Add Airdrop
                </a>
            @endif
            
            <input type="text" id="searchInput" placeholder="Search by project name or task type..." class="search-input" onkeyup="searchAirdrops()" style="flex: 1; min-width: 250px; margin: 0;">
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <button class="filter-btn {{ $defaultFilter === 'daily' ? 'active' : '' }}" onclick="filterAirdrops('daily', this)">📅 Daily</button>
            <button class="filter-btn" onclick="filterAirdrops('active', this)">✅ Active</button>
            <button class="filter-btn" onclick="filterAirdrops('eligible', this)">🎯 Eligible</button>
            <button class="filter-btn" onclick="filterAirdrops('not_eligible', this)">❌ Not Eligible</button>
            <button class="filter-btn" onclick="filterAirdrops('hold', this)">⏸️ Hold</button>
            <button class="filter-btn" onclick="filterAirdrops('waitlist', this)">⏳ Waitlist</button>
            <button class="filter-btn" onclick="filterAirdrops('completed', this)">✓ Completed</button>
            <button class="filter-btn" onclick="filterAirdrops('all', this)">All</button>
        </div>

        <!-- Airdrop Grid -->
        <div class="airdrop-grid" id="airdropGrid">
            @forelse ($airdrops as $airdrop)
                @php
                    $todayChecklist = $airdrop->dailyChecklists()
                        ->whereDate('completed_at', today())
                        ->first();
                    $isDailyDone = $todayChecklist && $todayChecklist->is_completed;
                @endphp
                <div class="airdrop-card {{ $isDailyDone ? 'daily-done' : '' }}" data-status="{{ $airdrop->status }}" data-completed="{{ $airdrop->is_completed ? 'completed' : 'active' }}" data-task-type="{{ $airdrop->task_type ?? '' }}" data-airdrop-id="{{ $airdrop->id }}" data-daily-done="{{ $isDailyDone ? 'true' : 'false' }}">
                    <div class="card-header">
                        @if ($airdrop->logo)
                            <img src="{{ asset('storage/' . $airdrop->logo) }}" alt="{{ $airdrop->name }}" class="card-logo">
                        @else
                            <div style="width: 48px; height: 48px; background: var(--border-light); border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 24px; flex-shrink: 0;">🎁</div>
                        @endif
                        
                        <div class="card-badges">
                            <!-- Status Badge -->
                            <span class="badge badge-status">
                                @switch($airdrop->status)
                                    @case('daily') 📅 Daily @break
                                    @case('active') ✅ Active @break
                                    @case('eligible') 🎯 Eligible @break
                                    @case('not_eligible') ❌ Not Eligible @break
                                    @case('hold') ⏸️ Hold @break
                                    @case('waitlist') ⏳ Waitlist @break
                                @endswitch
                            </span>
                            
                            <!-- Task Type Badge -->
                            @if ($airdrop->task_type)
                                <span class="badge badge-task">
                                    @switch($airdrop->task_type)
                                        @case('testnet') 🧪 Testnet @break
                                        @case('retro') ⏮️ Retro @break
                                        @case('node') 🖥️ Node @break
                                        @case('mining') ⛏️ Mining @break
                                        @case('social_task') 📱 Social @break
                                    @endswitch
                                </span>
                            @endif
                            
                            <!-- Completion Badge -->
                            @if ($airdrop->is_completed)
                                <span class="badge badge-completed">✓ Completed</span>
                            @else
                                <span class="badge badge-pending">⏳ Pending</span>
                            @endif

                            <!-- Daily Checklist Badge -->
                            @php
                                $todayChecklist = $airdrop->dailyChecklists()
                                    ->whereDate('completed_at', today())
                                    ->first();
                            @endphp
                            @if ($todayChecklist && $todayChecklist->is_completed)
                                <span class="badge badge-daily-done">📋 Done Today</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="airdrop-name">{{ $airdrop->name }}</div>
                    <div class="airdrop-description">⛓️ {{ $airdrop->chain }}</div>
                    @if ($airdrop->description)
                        <div class="airdrop-amount">{{ $airdrop->description }}</div>
                    @endif
                    
                    @if ($airdrop->is_completed)
                        <div class="earnings-box">
                            💰 Earned: ${{ number_format($airdrop->earnings, 2) }}
                        </div>
                    @endif
                    
                    <div class="airdrop-footer">
                        <a href="{{ $airdrop->link }}" target="_blank" class="airdrop-link">Visit →</a>
                    </div>

                    <!-- Daily Checklist Button -->
                    @php
                        $todayChecklist = $airdrop->dailyChecklists()
                            ->whereDate('completed_at', today())
                            ->first();
                        $isDone = $todayChecklist && $todayChecklist->is_completed;
                    @endphp
                    <button class="daily-checklist-btn {{ $isDone ? 'done' : '' }}" onclick="toggleDailyChecklist({{ $airdrop->id }}, this)">
                        {{ $isDone ? '✓ Daily Done' : '📋 Mark Daily' }}
                    </button>

                    <a href="{{ route('airdrop.show', $airdrop->id) }}" class="claim-btn">
                        View Details →
                    </a>
                </div>
            @empty
                <div class="empty-state">
                    <div class="empty-state-icon">🎁</div>
                    <h3>No Airdrops Available</h3>
                    <p>Check back later for new airdrop opportunities</p>
                </div>
            @endforelse
        </div>
    </div>

    <script>
        // Auto-filter to daily on page load
        document.addEventListener('DOMContentLoaded', function() {
            filterAirdrops('daily');
        });

        function searchAirdrops() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const cards = document.querySelectorAll('.airdrop-card');

            cards.forEach(card => {
                const projectName = card.querySelector('.airdrop-name').textContent.toLowerCase();
                const taskType = card.dataset.taskType ? card.dataset.taskType.toLowerCase() : '';
                
                const matches = projectName.includes(searchInput) || taskType.includes(searchInput);
                card.style.display = matches ? 'block' : 'none';
            });
        }

        function filterAirdrops(status, button) {
            const cards = document.querySelectorAll('.airdrop-card');
            const buttons = document.querySelectorAll('.filter-btn');

            // Update active button
            buttons.forEach(btn => btn.classList.remove('active'));
            if (button) {
                button.classList.add('active');
            } else {
                // Find button by status if not passed
                buttons.forEach(btn => {
                    if (btn.textContent.toLowerCase().includes(status === 'daily' ? 'daily' : 
                        status === 'active' ? 'active' : 
                        status === 'eligible' ? 'eligible' : 
                        status === 'not_eligible' ? 'not eligible' : 
                        status === 'hold' ? 'hold' : 
                        status === 'completed' ? 'completed' : 'all')) {
                        btn.classList.add('active');
                    }
                });
            }

            // Clear search input
            document.getElementById('searchInput').value = '';

            // Filter cards
            cards.forEach(card => {
                let show = false;
                const cardStatus = card.dataset.status;
                const cardCompleted = card.dataset.completed;
                
                if (status === 'all') {
                    show = true;
                } else if (status === 'completed') {
                    show = cardCompleted === 'completed';
                } else if (status === 'daily' || status === 'active' || status === 'eligible' || status === 'not_eligible' || status === 'hold' || status === 'waitlist') {
                    show = cardStatus === status;
                }
                
                card.style.display = show ? 'block' : 'none';
            });
        }

        function toggleDailyChecklist(airdropId, button) {
            fetch(`/airdrop/${airdropId}/daily-checklist`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update button
                    button.classList.toggle('done');
                    button.textContent = data.is_completed ? '✓ Daily Done' : '📋 Mark Daily';
                    
                    // Update card styling
                    const card = button.closest('.airdrop-card');
                    if (data.is_completed) {
                        card.classList.add('daily-done');
                        card.dataset.dailyDone = 'true';
                    } else {
                        card.classList.remove('daily-done');
                        card.dataset.dailyDone = 'false';
                    }
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</x-app-layout>
