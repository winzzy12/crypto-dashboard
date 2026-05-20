<x-app-layout>
    <x-slot name="header">
        <h1>Edit Airdrop 🎁</h1>
        <p>Update airdrop project details</p>
    </x-slot>

    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-section {
            background: var(--card-light);
            border: 1px solid var(--border-light);
            border-radius: 12px;
            padding: 2rem;
            transition: all 0.3s ease;
        }

        body.dark-mode .form-section {
            background: var(--card-dark);
            border-color: var(--border-dark);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-light);
            font-weight: 600;
            font-size: 14px;
        }

        body.dark-mode .form-group label {
            color: var(--text-dark);
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border: 2px solid var(--border-light);
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: var(--card-light);
            color: var(--text-light);
            font-family: inherit;
            box-sizing: border-box;
        }

        .form-group select {
            width: 100%;
            padding: 10px 12px;
            border: 2px solid var(--border-light);
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: var(--card-light);
            color: var(--text-light);
            font-family: inherit;
            cursor: pointer;
            box-sizing: border-box;
        }

        body.dark-mode .form-group input,
        body.dark-mode .form-group textarea,
        body.dark-mode .form-group select {
            background: #0f1419;
            border-color: var(--border-dark);
            color: var(--text-dark);
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-helper {
            font-size: 12px;
            color: #999;
            margin-top: 4px;
        }

        .error-text {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 4px;
        }

        .file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .file-upload input[type="file"] {
            display: none;
        }

        .file-upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            border: 2px dashed var(--border-light);
            border-radius: 8px;
            background: rgba(102, 126, 234, 0.05);
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        body.dark-mode .file-upload-label {
            border-color: var(--border-dark);
            background: rgba(102, 126, 234, 0.1);
        }

        .file-upload-label:hover {
            border-color: var(--primary);
            background: rgba(102, 126, 234, 0.1);
        }

        .file-upload-icon {
            font-size: 32px;
            margin-right: 1rem;
        }

        .file-upload-text h4 {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: var(--text-light);
        }

        body.dark-mode .file-upload-text h4 {
            color: var(--text-dark);
        }

        .file-upload-text p {
            font-size: 12px;
            color: #999;
        }

        .preview-image {
            margin-top: 1rem;
            max-width: 150px;
            border-radius: 8px;
        }

        .current-logo {
            margin-bottom: 1rem;
        }

        .current-logo img {
            max-width: 150px;
            border-radius: 8px;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            flex: 1;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-secondary {
            background: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            background: #7f8c8d;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 14px;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        @media (max-width: 768px) {
            .form-section {
                padding: 1.5rem;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                flex: none;
            }
        }
    </style>

    <div class="form-container">
        <!-- Error Messages -->
        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Error:</strong>
                <ul style="margin-top: 0.5rem; margin-left: 1.5rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <div class="form-section">
            <form action="{{ route('airdrop.update', $airdrop->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Project Name -->
                <div class="form-group">
                    <label for="name">Project Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $airdrop->name) }}" required placeholder="e.g., Ethereum Airdrop">
                    @error('name')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Project Link -->
                <div class="form-group">
                    <label for="link">Project Link *</label>
                    <input type="url" id="link" name="link" value="{{ old('link', $airdrop->link) }}" required placeholder="https://example.com">
                    <div class="form-helper">Full URL to the project website</div>
                    @error('link')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Chain -->
                <div class="form-group">
                    <label for="chain">Blockchain Chain *</label>
                    <input type="text" id="chain" name="chain" value="{{ old('chain', $airdrop->chain) }}" required placeholder="e.g., Ethereum, Polygon, Arbitrum">
                    @error('chain')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Task Type -->
                <div class="form-group">
                    <label for="task_type">Task Type</label>
                    <select id="task_type" name="task_type">
                        <option value="">-- Select Task Type --</option>
                        <option value="testnet" {{ old('task_type', $airdrop->task_type) === 'testnet' ? 'selected' : '' }}>🧪 Testnet</option>
                        <option value="retro" {{ old('task_type', $airdrop->task_type) === 'retro' ? 'selected' : '' }}>⏮️ Retro</option>
                        <option value="node" {{ old('task_type', $airdrop->task_type) === 'node' ? 'selected' : '' }}>🖥️ Node</option>
                        <option value="mining" {{ old('task_type', $airdrop->task_type) === 'mining' ? 'selected' : '' }}>⛏️ Mining</option>
                        <option value="social_task" {{ old('task_type', $airdrop->task_type) === 'social_task' ? 'selected' : '' }}>📱 Social Task</option>
                    </select>
                    <div class="form-helper">Optional: Select the type of task for this airdrop</div>
                    @error('task_type')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                <!-- Description -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Describe the airdrop project...">{{ old('description', $airdrop->description) }}</textarea>
                    <div class="form-helper">Optional: Add details about the airdrop</div>
                    @error('description')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Social Media Links Section -->
                <div style="border-top: 2px solid var(--border-light); padding-top: 1.5rem; margin-top: 1.5rem;">
                    <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 1rem; color: var(--text-light);">Social Media Links (Optional)</h3>

                    <!-- Discord Link -->
                    <div class="form-group">
                        <label for="discord_link">Discord</label>
                        <input type="url" id="discord_link" name="discord_link" value="{{ old('discord_link', $airdrop->discord_link) }}" placeholder="https://discord.gg/...">
                        <div class="form-helper">Discord server invite link</div>
                        @error('discord_link')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Twitter/X Link -->
                    <div class="form-group">
                        <label for="twitter_link">X (Twitter)</label>
                        <input type="url" id="twitter_link" name="twitter_link" value="{{ old('twitter_link', $airdrop->twitter_link) }}" placeholder="https://x.com/...">
                        <div class="form-helper">X/Twitter profile or page link</div>
                        @error('twitter_link')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Telegram Link -->
                    <div class="form-group">
                        <label for="telegram_link">Telegram</label>
                        <input type="url" id="telegram_link" name="telegram_link" value="{{ old('telegram_link', $airdrop->telegram_link) }}" placeholder="https://t.me/...">
                        <div class="form-helper">Telegram group or channel link</div>
                        @error('telegram_link')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Wallet Section -->
                <div style="border-top: 2px solid var(--border-light); padding-top: 1.5rem; margin-top: 1.5rem;">
                    <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 1rem; color: var(--text-light);">Wallet Information (Optional)</h3>

                    <!-- Wallet Address -->
                    <div class="form-group">
                        <label for="wallet_address">Wallet Address</label>
                        <input type="text" id="wallet_address" name="wallet_address" value="{{ old('wallet_address', $airdrop->wallet_address) }}" placeholder="0x...">
                        <div class="form-helper">Wallet address for this airdrop</div>
                        @error('wallet_address')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Private Key -->
                    <div class="form-group">
                        <label for="private_key">Private Key</label>
                        <textarea id="private_key" name="private_key" placeholder="Enter private key..." style="font-family: monospace; font-size: 12px;">{{ old('private_key', $airdrop->private_key) }}</textarea>
                        <div class="form-helper">⚠️ Keep this secure! Only admins can view this</div>
                        @error('private_key')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Progress Notes Section -->
                <div style="border-top: 2px solid var(--border-light); padding-top: 1.5rem; margin-top: 1.5rem;">
                    <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 1rem; color: var(--text-light);">Progress Notes (Optional)</h3>

                    <!-- Notes -->
                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <textarea id="notes" name="notes" placeholder="Add progress notes, tasks completed, issues encountered, etc..." style="min-height: 150px;">{{ old('notes', $airdrop->notes) }}</textarea>
                        <div class="form-helper">Track progress and important information about this airdrop</div>
                        @error('notes')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Logo Upload -->
                <div class="form-group">
                    <label>Project Logo</label>
                    
                    @if ($airdrop->logo)
                        <div class="current-logo">
                            <p style="font-size: 12px; color: #999; margin-bottom: 0.5rem;">Current Logo:</p>
                            <img src="{{ asset('storage/' . $airdrop->logo) }}" alt="{{ $airdrop->name }}">
                        </div>
                    @endif

                    <div class="file-upload">
                        <input type="file" id="logo" name="logo" accept="image/png,image/jpeg,image/jpg" onchange="previewImage(event)">
                        <label for="logo" class="file-upload-label">
                            <div class="file-upload-icon">📸</div>
                            <div class="file-upload-text">
                                <h4>Click to upload or drag and drop</h4>
                                <p>PNG or JPG (max 2MB)</p>
                            </div>
                        </label>
                    </div>
                    <div id="preview"></div>
                    @error('logo')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <a href="{{ route('airdrop.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Airdrop</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="Preview" class="preview-image">`;
                };
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = '';
            }
        }
    </script>
</x-app-layout>
