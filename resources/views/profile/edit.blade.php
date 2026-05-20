<x-app-layout>
    <x-slot name="header">
        <h1>Profile 👤</h1>
        <p>Manage your profile information</p>
    </x-slot>

    <style>
        .profile-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .profile-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 2rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            text-align: center;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            margin: 0 auto 1rem;
            border: 3px solid rgba(255, 255, 255, 0.3);
        }

        .profile-header h2 {
            font-size: 28px;
            margin-bottom: 0.5rem;
        }

        .profile-header p {
            font-size: 14px;
            opacity: 0.9;
        }

        .profile-section {
            background: var(--card-light);
            border: 1px solid var(--border-light);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }

        body.dark-mode .profile-section {
            background: var(--card-dark);
            border-color: var(--border-dark);
        }

        .profile-section h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
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
        }

        body.dark-mode .form-group input,
        body.dark-mode .form-group textarea {
            background: #0f1419;
            border-color: var(--border-dark);
            color: var(--text-dark);
        }

        .form-group input:focus,
        .form-group textarea:focus {
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

        .success-text {
            color: #27ae60;
            font-size: 12px;
            margin-top: 4px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-danger {
            background: #e74c3c;
            color: white;
        }

        .btn-danger:hover {
            background: #c0392b;
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

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .profile-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .info-card {
            background: rgba(102, 126, 234, 0.05);
            border: 1px solid var(--border-light);
            border-radius: 8px;
            padding: 1.2rem;
        }

        body.dark-mode .info-card {
            background: rgba(102, 126, 234, 0.1);
            border-color: var(--border-dark);
        }

        .info-label {
            font-size: 12px;
            color: #999;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            font-size: 16px;
            font-weight: 600;
            color: var(--text-light);
        }

        body.dark-mode .info-value {
            color: var(--text-dark);
        }

        .divider {
            height: 1px;
            background: var(--border-light);
            margin: 2rem 0;
        }

        body.dark-mode .divider {
            background: var(--border-dark);
        }

        .danger-zone {
            background: rgba(231, 76, 60, 0.05);
            border: 2px solid #e74c3c;
            border-radius: 8px;
            padding: 1.5rem;
            margin-top: 2rem;
        }

        body.dark-mode .danger-zone {
            background: rgba(231, 76, 60, 0.1);
        }

        .danger-zone h4 {
            color: #e74c3c;
            margin-bottom: 0.5rem;
        }

        .danger-zone p {
            font-size: 13px;
            color: #999;
            margin-bottom: 1rem;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: var(--card-light);
            border-radius: 12px;
            padding: 2rem;
            max-width: 400px;
            width: 90%;
        }

        body.dark-mode .modal-content {
            background: var(--card-dark);
        }

        .modal-header {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #e74c3c;
        }

        .modal-body {
            font-size: 14px;
            color: #666;
            margin-bottom: 1.5rem;
        }

        body.dark-mode .modal-body {
            color: #999;
        }

        .modal-footer {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        @media (max-width: 768px) {
            .profile-header {
                padding: 1.5rem;
            }

            .profile-header h2 {
                font-size: 22px;
            }

            .profile-section {
                padding: 1.5rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .profile-info {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="profile-container">
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="profile-avatar">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <h2>{{ Auth::user()->name }}</h2>
            <p>{{ Auth::user()->email }}</p>
        </div>

        <!-- Success/Error Messages -->
        @if (session('status') === 'profile-updated')
            <div class="alert alert-success">
                ✓ Profile updated successfully!
            </div>
        @endif

        @if (session('status') === 'password-updated')
            <div class="alert alert-success">
                ✓ Password updated successfully!
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                ✗ {{ $errors->first() }}
            </div>
        @endif

        <!-- Profile Information -->
        <div class="profile-info">
            <div class="info-card">
                <div class="info-label">Email</div>
                <div class="info-value">{{ Auth::user()->email }}</div>
            </div>
            <div class="info-card">
                <div class="info-label">Role</div>
                <div class="info-value">{{ ucfirst(Auth::user()->role) }}</div>
            </div>
            <div class="info-card">
                <div class="info-label">Member Since</div>
                <div class="info-value">{{ Auth::user()->created_at->format('M d, Y') }}</div>
            </div>
        </div>

        <!-- Update Profile Section -->
        <div class="profile-section">
            <h3>📝 Update Profile</h3>
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                        @error('name')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                        @error('email')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>

        <!-- Update Password Section -->
        <div class="profile-section">
            <h3>🔐 Change Password</h3>
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" id="current_password" name="current_password" required>
                    @error('current_password')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" id="password" name="password" required>
                        <div class="form-helper">At least 8 characters</div>
                        @error('password')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required>
                        @error('password_confirmation')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Password</button>
            </form>
        </div>

        <!-- Danger Zone -->
        <div class="profile-section">
            <div class="danger-zone">
                <h4>⚠️ Danger Zone</h4>
                <p>Delete your account and all associated data. This action cannot be undone.</p>
                <button class="btn btn-danger" onclick="openDeleteModal()">Delete Account</button>
            </div>
        </div>
    </div>

    <!-- Delete Account Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <div class="modal-header">Delete Account?</div>
            <div class="modal-body">
                Are you sure you want to delete your account? This action cannot be undone. All your data will be permanently deleted.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" onclick="closeDeleteModal()">Cancel</button>
                <form action="{{ route('profile.destroy') }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Account</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal() {
            document.getElementById('deleteModal').classList.add('active');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('active');
        }

        window.onclick = function(event) {
            const modal = document.getElementById('deleteModal');
            if (event.target === modal) {
                closeDeleteModal();
            }
        }
    </script>
</x-app-layout>
