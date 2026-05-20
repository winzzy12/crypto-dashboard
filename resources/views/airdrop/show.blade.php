<x-app-layout>
    <x-slot name="header">
        <h1>{{ $airdrop->name }} 🎁</h1>
        <p>Airdrop Details</p>
    </x-slot>

    <style>
        .detail-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 1rem;
        }

        @media (min-width: 768px) {
            .detail-container {
                padding: 2rem;
            }
        }

        .action-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        @media (min-width: 768px) {
            .action-buttons {
                grid-template-columns: 1fr 1fr 1fr 1fr;
            }
        }

        .btn {
            padding: 12px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            width: 100%;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            opacity: 0.9;
        }

        .btn-secondary {
            background: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            opacity: 0.9;
        }

        .btn-danger {
            background: #e74c3c;
            color: white;
        }

        .btn-danger:hover {
            opacity: 0.9;
        }

        .detail-section {
            background: var(--card-light);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid var(--border-light);
        }

        body.dark-mode .detail-section {
            background: #1a1f2e;
            border-color: #2a3142;
        }

        .detail-section h3 {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-light);
            margin-bottom: 1rem;
        }

        body.dark-mode .detail-section h3 {
            color: #ffffff;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--border-light);
            flex-wrap: wrap;
            gap: 1rem;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: #999;
            font-size: 14px;
            min-width: 120px;
        }

        .detail-value {
            color: var(--text-light);
            font-size: 14px;
            word-break: break-all;
            flex: 1;
        }

        body.dark-mode .detail-value {
            color: #e0e0e0;
        }

        .header-info {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        @media (max-width: 640px) {
            .header-info {
                flex-direction: column;
            }
        }

        .header-info h2 {
            margin: 0 0 0.5rem 0;
            color: var(--text-light);
            font-size: 24px;
        }

        .header-info img {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            object-fit: cover;
        }

        .status-selector {
            display: inline-block;
        }

        .status-selector select {
            padding: 6px 12px;
            border: 2px solid var(--primary);
            border-radius: 6px;
            background: var(--card-light);
            color: var(--text-light);
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
        }

        body.dark-mode .status-selector select {
            background: #0f1419;
            color: #e0e0e0;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .status-badge-daily {
            background: #fff3cd;
            color: #856404;
        }

        .status-badge-active {
            background: #d4edda;
            color: #155724;
        }

        .status-badge-eligible {
            background: #d1ecf1;
            color: #0c5460;
        }

        .status-badge-not_eligible {
            background: #f8d7da;
            color: #721c24;
        }

        .status-badge-hold {
            background: #e2e3e5;
            color: #383d41;
        }

        .notes-display {
            color: #333333;
            text-align: left;
            padding: 1rem;
            background: rgba(102, 126, 234, 0.05);
            border-radius: 8px;
            border-left: 4px solid var(--primary);
            white-space: pre-wrap;
            word-wrap: break-word;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 1rem;
            font-family: inherit;
        }

        body.dark-mode .notes-display {
            color: #e0e0e0;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-light);
            font-size: 14px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px 12px;
            border: 2px solid var(--border-light);
            border-radius: 8px;
            background: var(--card-light);
            color: var(--text-light);
            font-size: 14px;
            font-family: inherit;
            box-sizing: border-box;
        }

        body.dark-mode .form-group input,
        body.dark-mode .form-group textarea,
        body.dark-mode .form-group select {
            background: #0f1419;
            color: #e0e0e0;
            border-color: #2a3142;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        @media (max-width: 640px) {
            .grid-2 {
                grid-template-columns: 1fr;
            }
        }

        .grid-3 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 1rem;
        }

        @media (max-width: 768px) {
            .grid-3 {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 640px) {
            .grid-3 {
                grid-template-columns: 1fr;
            }
        }

        .info-card {
            padding: 1rem;
            border-radius: 8px;
            border-left: 4px solid;
        }

        .info-card-label {
            font-size: 12px;
            color: #999;
            margin-bottom: 0.5rem;
        }

        .info-card-value {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-light);
        }

        .info-card-green {
            background: rgba(39, 174, 96, 0.1);
            border-color: #27ae60;
        }

        .info-card-green .info-card-value {
            color: #27ae60;
        }

        .info-card-blue {
            background: rgba(52, 152, 219, 0.1);
            border-color: #3498db;
        }

        .info-card-blue .info-card-value {
            color: #3498db;
        }

        .info-card-purple {
            background: rgba(155, 89, 182, 0.1);
            border-color: #9b59b6;
        }

        .info-card-purple .info-card-value {
            color: #9b59b6;
        }

        .private-key-row {
            display: flex;
            gap: 0.5rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .private-key-row button {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .private-key-row button:hover {
            opacity: 0.9;
        }
    </style>

    <div class="detail-container">
        <!-- Action Buttons (Top) -->
        <div class="action-buttons">
            <a href="{{ $airdrop->link }}" target="_blank" class="btn btn-primary">
                🔗 Visit
            </a>
            
            @if (Auth::user()->role === 'admin')
                <a href="{{ route('airdrop.edit', $airdrop->id) }}" class="btn btn-primary">
                    ✏️ Edit
                </a>
                <form action="{{ route('airdrop.destroy', $airdrop->id) }}" method="POST" style="width: 100%;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" style="width: 100%;" onclick="return confirm('Delete this airdrop?')">
                        🗑️ Delete
                    </button>
                </form>
            @endif
            <a href="{{ route('airdrop.index') }}" class="btn btn-secondary">
                ← Back
            </a>
        </div>

        <!-- Header Info -->
        <div class="detail-section">
            <div class="header-info">
                <div>
                    <h2>{{ $airdrop->name }}</h2>
                    <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
                        <span>⛓️ {{ $airdrop->chain }}</span>
                        @if (Auth::user()->role === 'admin')
                            <form action="{{ route('airdrop.updateStatus', $airdrop->id) }}" method="POST" class="status-selector">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()">
                                    <option value="daily" {{ $airdrop->status === 'daily' ? 'selected' : '' }}>📅 Daily</option>
                                    <option value="active" {{ $airdrop->status === 'active' ? 'selected' : '' }}>✅ Active</option>
                                    <option value="eligible" {{ $airdrop->status === 'eligible' ? 'selected' : '' }}>🎯 Eligible</option>
                                    <option value="not_eligible" {{ $airdrop->status === 'not_eligible' ? 'selected' : '' }}>❌ Not Eligible</option>
                                    <option value="hold" {{ $airdrop->status === 'hold' ? 'selected' : '' }}>⏸️ Hold</option>
                                    <option value="waitlist" {{ $airdrop->status === 'waitlist' ? 'selected' : '' }}>⏳ Waitlist</option>
                                </select>
                            </form>
                        @else
                            <span class="status-badge status-badge-{{ $airdrop->status }}">
                                @switch($airdrop->status)
                                    @case('daily') 📅 Daily @break
                                    @case('active') ✅ Active @break
                                    @case('eligible') 🎯 Eligible @break
                                    @case('not_eligible') ❌ Not Eligible @break
                                    @case('hold') ⏸️ Hold @break
                                @endswitch
                            </span>
                        @endif
                    </div>
                </div>
                @if ($airdrop->logo)
                    <img src="{{ asset('storage/' . $airdrop->logo) }}" alt="{{ $airdrop->name }}">
                @else
                    <div style="width: 80px; height: 80px; background: var(--border-light); border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 32px; flex-shrink: 0;">🎁</div>
                @endif
            </div>

            @if ($airdrop->description)
                <div class="detail-row">
                    <span class="detail-label">Description</span>
                    <span class="detail-value">{{ $airdrop->description }}</span>
                </div>
            @endif

            <div class="detail-row">
                <span class="detail-label">Blockchain</span>
                <span class="detail-value">{{ $airdrop->chain }}</span>
            </div>

            @if ($airdrop->task_type)
                <div class="detail-row">
                    <span class="detail-label">Task Type</span>
                    <span class="detail-value">
                        @switch($airdrop->task_type)
                            @case('testnet') 🧪 Testnet @break
                            @case('retro') ⏮️ Retro @break
                            @case('node') 🖥️ Node @break
                            @case('mining') ⛏️ Mining @break
                            @case('social_task') 📱 Social Task @break
                        @endswitch
                    </span>
                </div>
            @endif

            <div class="detail-row">
                <span class="detail-label">Project Link</span>
                <span class="detail-value"><a href="{{ $airdrop->link }}" target="_blank" style="color: var(--primary); text-decoration: none;">{{ $airdrop->link }}</a></span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Created</span>
                <span class="detail-value">{{ $airdrop->created_at->format('M d, Y H:i') }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Updated</span>
                <span class="detail-value">{{ $airdrop->updated_at->format('M d, Y H:i') }}</span>
            </div>
        </div>

        <!-- Social Media Links -->
        @if ($airdrop->discord_link || $airdrop->twitter_link || $airdrop->telegram_link)
            <div class="detail-section">
                <h3>🔗 Social Media</h3>
                @if ($airdrop->discord_link)
                    <div class="detail-row">
                        <span class="detail-label"><i class="bi bi-discord"></i> Discord</span>
                        <span class="detail-value"><a href="{{ $airdrop->discord_link }}" target="_blank" style="color: var(--primary);">Join Discord ↗</a></span>
                    </div>
                @endif
                @if ($airdrop->twitter_link)
                    <div class="detail-row">
                        <span class="detail-label"><i class="bi bi-twitter-x"></i> X</span>
                        <span class="detail-value"><a href="{{ $airdrop->twitter_link }}" target="_blank" style="color: var(--primary);">Follow X ↗</a></span>
                    </div>
                @endif
                @if ($airdrop->telegram_link)
                    <div class="detail-row">
                        <span class="detail-label"><i class="bi bi-telegram"></i> Telegram</span>
                        <span class="detail-value"><a href="{{ $airdrop->telegram_link }}" target="_blank" style="color: var(--primary);">Join Telegram ↗</a></span>
                    </div>
                @endif
            </div>
        @endif

        <!-- Wallet Info -->
        @if ($airdrop->wallet_address || $airdrop->private_key)
            <div class="detail-section">
                <h3>💰 Wallet Information</h3>
                @if ($airdrop->wallet_address)
                    <div class="detail-row">
                        <span class="detail-label">Wallet Address</span>
                        <span class="detail-value" style="font-family: monospace; font-size: 12px;">{{ $airdrop->wallet_address }}</span>
                    </div>
                @endif
                @if ($airdrop->private_key && Auth::user()->role === 'admin')
                    <div class="detail-row">
                        <span class="detail-label">Private Key</span>
                        <div class="private-key-row">
                            <span class="detail-value" id="privateKeyDisplay" style="font-family: monospace; font-size: 12px;">••••••••••••••••</span>
                            <button type="button" onclick="togglePrivateKey()" style="background: var(--primary); color: white;">
                                <i class="bi bi-eye"></i> Show
                            </button>
                            <button type="button" onclick="copyToClipboard(document.getElementById('privateKeyDisplay').textContent)" style="background: #95a5a6; color: white;">
                                <i class="bi bi-clipboard"></i> Copy
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        @endif

        <!-- Progress Notes -->
        <div class="detail-section">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; flex-wrap: wrap; gap: 1rem;">
                <h3 style="margin: 0;">📝 {{ $airdrop->notes ? 'Progress Notes' : 'Add Progress Notes' }}</h3>
                @if (Auth::user()->role === 'admin')
                    <button onclick="toggleNotesForm()" style="padding: 8px 16px; background: var(--primary); color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 13px; font-weight: 600;">
                        <i class="bi bi-{{ $airdrop->notes ? 'pencil' : 'plus-circle' }}"></i> {{ $airdrop->notes ? 'Edit' : 'Add' }}
                    </button>
                @endif
            </div>

            @if ($airdrop->notes)
                <div class="notes-display">{{ $airdrop->notes }}</div>
            @endif

            @if (Auth::user()->role === 'admin')
                <form id="notesForm" action="{{ route('airdrop.updateNotes', $airdrop->id) }}" method="POST" style="{{ $airdrop->notes ? 'display: none;' : '' }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <textarea name="notes" placeholder="Add progress notes..." style="min-height: 120px;">{{ $airdrop->notes }}</textarea>
                    </div>
                    <div style="display: flex; gap: 0.5rem;">
                        <button type="submit" style="flex: 1; padding: 10px 16px; background: var(--primary); color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 600;">Save Notes</button>
                        @if ($airdrop->notes)
                            <button type="button" onclick="toggleNotesForm()" style="flex: 1; padding: 10px 16px; background: #95a5a6; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 600;">Cancel</button>
                        @endif
                    </div>
                </form>
            @endif
        </div>

        <!-- Project Completion -->
        @if (Auth::user()->role === 'admin')
            @if (!$airdrop->is_completed)
                <div class="detail-section">
                    <h3>✅ Mark Project Completed</h3>
                    <form action="{{ route('airdrop.markCompleted', $airdrop->id) }}" method="POST">
                        @csrf
                        <div class="grid-2">
                            <div class="form-group">
                                <label>Earnings ($)</label>
                                <input type="number" name="earnings" placeholder="0.00" step="0.01" min="0" required>
                            </div>
                            <div class="form-group">
                                <label>End Date</label>
                                <input type="date" name="end_date" required>
                            </div>
                        </div>
                        <div style="padding: 1rem; background: rgba(52, 152, 219, 0.1); border-radius: 8px; border-left: 4px solid #3498db; margin-bottom: 1rem; font-size: 13px;">
                            Start Date: {{ $airdrop->created_at->format('M d, Y') }} (auto-set)
                        </div>
                        <button type="submit" style="width: 100%; padding: 12px 16px; background: #27ae60; color: white; border: none; border-radius: 8px; font-weight: 600; cursor: pointer;">Mark as Completed</button>
                    </form>
                </div>
            @else
                <div class="detail-section">
                    <h3>✅ Project Completed</h3>
                    <div class="grid-3">
                        <div class="info-card info-card-green">
                            <div class="info-card-label">💰 Earnings</div>
                            <div class="info-card-value">${{ number_format($airdrop->earnings, 2) }}</div>
                        </div>
                        <div class="info-card info-card-blue">
                            <div class="info-card-label">📅 Start</div>
                            <div class="info-card-value">
                                @if ($airdrop->start_date)
                                    {{ \Carbon\Carbon::parse($airdrop->start_date)->format('M d, Y') }}
                                @else
                                    N/A
                                @endif
                            </div>
                        </div>
                        <div class="info-card info-card-purple">
                            <div class="info-card-label">📅 End</div>
                            <div class="info-card-value">
                                @if ($airdrop->end_date)
                                    {{ \Carbon\Carbon::parse($airdrop->end_date)->format('M d, Y') }}
                                @else
                                    N/A
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>

    <script>
        let privateKeyVisible = false;
        const privateKeyValue = '{{ $airdrop->private_key ?? "" }}';

        function togglePrivateKey() {
            const display = document.getElementById('privateKeyDisplay');
            const button = event.target.closest('button');
            
            if (privateKeyVisible) {
                display.textContent = '••••••••••••••••';
                button.innerHTML = '<i class="bi bi-eye"></i> Show';
                privateKeyVisible = false;
            } else {
                display.textContent = privateKeyValue;
                button.innerHTML = '<i class="bi bi-eye-slash"></i> Hide';
                privateKeyVisible = true;
            }
        }

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('Copied to clipboard!');
            }).catch(err => {
                console.error('Failed to copy:', err);
            });
        }

        function toggleNotesForm() {
            const form = document.getElementById('notesForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</x-app-layout>
