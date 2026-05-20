<x-app-layout>
    <x-slot name="header">
        <h1>Settings ⚙️</h1>
        <p>Manage your account and users</p>
    </x-slot>

    <style>
        .settings-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .settings-section {
            background: var(--card-light);
            border: 1px solid var(--border-light);
            border-radius: 12px;
            padding: 2rem;
            transition: all 0.3s ease;
        }

        body.dark-mode .settings-section {
            background: var(--card-dark);
            border-color: var(--border-dark);
        }

        .settings-section h2 {
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
        .form-group select {
            width: 100%;
            padding: 10px 12px;
            border: 2px solid var(--border-light);
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: var(--card-light);
            color: var(--text-light);
        }

        body.dark-mode .form-group input,
        body.dark-mode .form-group select {
            background: #0f1419;
            border-color: var(--border-dark);
            color: var(--text-dark);
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-group input:disabled {
            background: #f0f0f0;
            cursor: not-allowed;
            opacity: 0.6;
        }

        body.dark-mode .form-group input:disabled {
            background: #0a0e1a;
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

        .btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
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

        .alert-info {
            background: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }

        .error-text {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 4px;
        }

        .users-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .users-table th {
            background: rgba(102, 126, 234, 0.1);
            padding: 12px;
            text-align: left;
            font-weight: 600;
            border-bottom: 2px solid var(--border-light);
        }

        body.dark-mode .users-table th {
            border-bottom-color: var(--border-dark);
        }

        .users-table td {
            padding: 12px;
            border-bottom: 1px solid var(--border-light);
        }

        body.dark-mode .users-table td {
            border-bottom-color: var(--border-dark);
        }

        .users-table tr:hover {
            background: rgba(102, 126, 234, 0.05);
        }

        .role-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .role-admin {
            background: rgba(102, 126, 234, 0.2);
            color: var(--primary);
        }

        .role-view {
            background: rgba(149, 165, 166, 0.2);
            color: #7f8c8d;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .action-buttons button {
            padding: 6px 12px;
            font-size: 12px;
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
            max-width: 500px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
        }

        body.dark-mode .modal-content {
            background: var(--card-dark);
        }

        .modal-header {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--text-light);
        }

        body.dark-mode .modal-close {
            color: var(--text-dark);
        }

        .modal-footer {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 1.5rem;
        }

        .restricted-notice {
            background: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .settings-container {
                grid-template-columns: 1fr;
            }

            .users-table {
                font-size: 12px;
            }

            .users-table th,
            .users-table td {
                padding: 8px;
            }
        }
    </style>

    <!-- Success/Error Messages -->
    @if (session('success'))
        <div class="alert alert-success">
            ✓ {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error">
            ✗ {{ $errors->first() }}
        </div>
    @endif

    <!-- Role-based Content -->
    @if (Auth::user()->role === 'admin')
        <!-- ADMIN VIEW -->
        <div class="settings-container">
            <!-- Change Username -->
            <div class="settings-section">
                <h2>👤 Change Username</h2>
                <form action="{{ route('settings.profile') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">New Username</label>
                        <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" required>
                        @error('name')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update Username</button>
                </form>
            </div>

            <!-- Change Password -->
            <div class="settings-section">
                <h2>🔐 Change Password</h2>
                <form action="{{ route('settings.password') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" id="current_password" name="current_password" required>
                        @error('current_password')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" id="password" name="password" required>
                        @error('password')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </form>
            </div>
        </div>

        <!-- Manage Users Section -->
        <div class="settings-section" style="margin-bottom: 2rem;">
            <h2>👥 Manage Users</h2>
            
            <button class="btn btn-primary" onclick="openAddUserModal()">+ Add New User</button>

            <table class="users-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="role-badge role-{{ $user->role }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-secondary" onclick="openEditUserModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}')">Edit</button>
                                    @if ($user->id !== Auth::id())
                                        <form action="{{ route('settings.users.delete', $user->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @else
        <!-- VIEW ROLE - LIMITED ACCESS -->
        <div class="restricted-notice">
            ℹ️ Your account has limited access. You can only change your password.
        </div>

        <div class="settings-container">
            <!-- View Profile (Read-only) -->
            <div class="settings-section">
                <h2>👤 Profile Information</h2>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" value="{{ Auth::user()->name }}" disabled>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" value="{{ Auth::user()->email }}" disabled>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <input type="text" value="{{ ucfirst(Auth::user()->role) }}" disabled>
                </div>
                <p style="color: #999; font-size: 12px; margin-top: 1rem;">
                    Contact an administrator to change your profile information.
                </p>
            </div>

            <!-- Change Password -->
            <div class="settings-section">
                <h2>🔐 Change Password</h2>
                <form action="{{ route('settings.password') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" id="current_password" name="current_password" required>
                        @error('current_password')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" id="password" name="password" required>
                        @error('password')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </form>
            </div>
        </div>
    @endif

    <!-- Add User Modal (Admin Only) -->
    @if (Auth::user()->role === 'admin')
        <div class="modal" id="addUserModal">
            <div class="modal-content">
                <div class="modal-header">
                    <span>Add New User</span>
                    <button class="modal-close" onclick="closeAddUserModal()">×</button>
                </div>
                <form action="{{ route('settings.users.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="add_name">Name</label>
                        <input type="text" id="add_name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="add_email">Email</label>
                        <input type="email" id="add_email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="add_password">Password</label>
                        <input type="password" id="add_password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="add_role">Role</label>
                        <select id="add_role" name="role" required>
                            <option value="view">View</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="closeAddUserModal()">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit User Modal (Admin Only) -->
        <div class="modal" id="editUserModal">
            <div class="modal-content">
                <div class="modal-header">
                    <span>Edit User</span>
                    <button class="modal-close" onclick="closeEditUserModal()">×</button>
                </div>
                <form id="editUserForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit_name">Name</label>
                        <input type="text" id="edit_name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_email">Email</label>
                        <input type="email" id="edit_email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_role">Role</label>
                        <select id="edit_role" name="role" required>
                            <option value="view">View</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="closeEditUserModal()">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <script>
        function openAddUserModal() {
            document.getElementById('addUserModal').classList.add('active');
        }

        function closeAddUserModal() {
            document.getElementById('addUserModal').classList.remove('active');
        }

        function openEditUserModal(userId, name, email, role) {
            document.getElementById('editUserForm').action = `/settings/users/${userId}`;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_role').value = role;
            document.getElementById('editUserModal').classList.add('active');
        }

        function closeEditUserModal() {
            document.getElementById('editUserModal').classList.remove('active');
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const addModal = document.getElementById('addUserModal');
            const editModal = document.getElementById('editUserModal');
            if (event.target === addModal) {
                closeAddUserModal();
            }
            if (event.target === editModal) {
                closeEditUserModal();
            }
        }
    </script>
</x-app-layout>
