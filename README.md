# Crypto Dashboard

Modern Laravel dashboard untuk manajemen airdrop dengan fitur daily checklist, role-based access control, dan dark mode support.

## 🚀 Quick Start

### Prerequisites
- PHP 8.1+
- Composer
- Node.js & npm
- Git

### Setup dari Awal

#### 1. Clone Repository
```bash
git clone https://github.com/winzzy12/crypto-dashboard.git
cd crypto-dashboard
```

#### 2. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

#### 3. Setup Environment
```bash
# Copy .env.example ke .env
cp .env.example .env

# Generate application key
php artisan key:generate
```

#### 4. Database Setup
```bash
# Run migrations
php artisan migrate

# Seed database dengan user default (optional)
php artisan db:seed
```

#### 5. Build Assets
```bash
# Development
npm run dev

# Production
npm run build
```

#### 6. Start Server
```bash
# Development server
php artisan serve

# Server akan berjalan di http://localhost:8000
```

## 📋 Default Credentials

Setelah menjalankan `php artisan db:seed`:

**Admin User:**
- Email: `wanz@example.com`
- Password: `wanz2026`
- Role: `admin` (full access)

**View User:**
- Email: `john@example.com`
- Password: `password`
- Role: `view` (read-only + password change)

## 🎯 Fitur Utama

### 1. **Airdrop Management**
- ✅ Create, Read, Update, Delete airdrop projects
- ✅ Upload logo (PNG/JPG)
- ✅ Track status: Daily, Active, Eligible, Not Eligible, Hold, Waitlist, Completed
- ✅ Social media links (Discord, Twitter/X, Telegram)
- ✅ Wallet address & private key (admin-only visibility)
- ✅ Progress notes dengan inline editing
- ✅ Project completion tracking (earnings + dates)

### 2. **Daily Checklist**
- ✅ Per-user per-airdrop daily task tracking
- ✅ Auto-reset setelah 24 jam
- ✅ Visual indicator pada card (green highlight saat completed)
- ✅ Toggle button di card untuk mark as done

### 3. **Role-Based Access Control**
- **Admin:** Full access (create, edit, delete, view private keys)
- **View:** Read-only + password change

### 4. **Advanced Filtering & Search**
- 8 status filters (Daily, Active, Eligible, Not Eligible, Hold, Waitlist, Completed, All)
- Real-time search by project name atau task type
- Default filter: Daily

### 5. **Dark Mode**
- Toggle button di navbar
- Preference disimpan di localStorage
- Responsive design untuk semua screen sizes

### 6. **Dashboard**
- Welcome section
- 6 metric cards (Airdrop Overview, Active Projects, Completed Projects, Total Earnings, Quick Actions, Account Info)
- Header stats (7 metrics dalam single row)

## 📁 Project Structure

```
crypto-dashboard/
├── app/
│   ├── Http/Controllers/
│   │   ├── DashboardController.php
│   │   ├── AirdropController.php
│   │   └── ...
│   ├── Models/
│   │   ├── User.php
│   │   ├── Airdrop.php
│   │   └── DailyChecklist.php
│   └── ...
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── database.sqlite
├── resources/
│   ├── views/
│   │   ├── layouts/app.blade.php
│   │   ├── dashboard.blade.php
│   │   ├── airdrop/
│   │   │   ├── index.blade.php
│   │   │   ├── create.blade.php
│   │   │   ├── edit.blade.php
│   │   │   └── show.blade.php
│   │   ├── profile/
│   │   ├── settings/
│   │   └── auth/
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php
│   └── auth.php
├── public/
│   ├── favicon.ico
│   └── ...
└── ...
```

## 🔧 Configuration

### Environment Variables (.env)

```env
APP_NAME="Crypto Dashboard"
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=sqlite
DB_DATABASE=/path/to/database.sqlite

MAIL_MAILER=log
```

### Database (SQLite)

Database file tersimpan di `database/database.sqlite`. Untuk production, gunakan MySQL atau PostgreSQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crypto_dashboard
DB_USERNAME=root
DB_PASSWORD=
```

## 📊 Database Schema

### Airdrops Table
```sql
- id (primary key)
- name (string)
- link (string)
- chain (string)
- task_type (enum: testnet, retro, node, mining, social_task)
- discord_link (nullable string)
- twitter_link (nullable string)
- telegram_link (nullable string)
- wallet_address (string)
- private_key (string, admin-only)
- notes (text, nullable)
- logo (string, nullable)
- description (text, nullable)
- status (enum: daily, active, eligible, not_eligible, hold, waitlist)
- is_completed (boolean)
- earnings (decimal, nullable)
- start_date (timestamp)
- end_date (timestamp, nullable)
- created_by (foreign key to users)
- created_at, updated_at
```

### Daily Checklists Table
```sql
- id (primary key)
- user_id (foreign key to users)
- airdrop_id (foreign key to airdrops)
- is_completed (boolean)
- completed_at (timestamp, nullable)
- reset_at (timestamp, nullable)
- created_at, updated_at
```

## 🛣️ API Routes

### Authentication
- `POST /login` - Login
- `POST /logout` - Logout

### Dashboard
- `GET /dashboard` - Dashboard page

### Airdrop Management
- `GET /airdrop` - List airdrops (dengan filtering & search)
- `GET /airdrop/create` - Create form
- `POST /airdrop` - Store airdrop
- `GET /airdrop/{id}` - Show detail
- `GET /airdrop/{id}/edit` - Edit form
- `PUT /airdrop/{id}` - Update airdrop
- `DELETE /airdrop/{id}` - Delete airdrop
- `PATCH /airdrop/{id}/status` - Update status
- `PATCH /airdrop/{id}/notes` - Update notes
- `POST /airdrop/{id}/mark-completed` - Mark as completed
- `POST /airdrop/{id}/toggle-daily-checklist` - Toggle daily checklist

### Profile & Settings
- `GET /profile` - Profile page
- `PUT /profile` - Update profile
- `GET /settings` - Settings page
- `PUT /settings` - Update settings

## 🧪 Testing

```bash
# Run tests
php artisan test

# Run tests dengan coverage
php artisan test --coverage
```

## 🚀 Deployment

### Production Setup

1. **Clone repository**
   ```bash
   git clone https://github.com/winzzy12/crypto-dashboard.git
   cd crypto-dashboard
   ```

2. **Install dependencies**
   ```bash
   composer install --no-dev
   npm install
   npm run build
   ```

3. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database** (gunakan MySQL/PostgreSQL untuk production)
   ```bash
   php artisan migrate --force
   ```

5. **Setup web server** (Nginx/Apache)
   - Point document root ke `public/` folder
   - Setup SSL certificate
   - Configure domain

6. **Start application**
   ```bash
   php artisan serve --host=0.0.0.0 --port=8000
   ```

   Atau gunakan supervisor untuk long-running process:
   ```bash
   [program:crypto-dashboard]
   process_name=%(program_name)s_%(process_num)02d
   command=php /path/to/crypto-dashboard/artisan serve --host=0.0.0.0 --port=8000
   autostart=true
   autorestart=true
   numprocs=1
   redirect_stderr=true
   stdout_logfile=/var/log/crypto-dashboard.log
   ```

## 🔐 Security

- ✅ CSRF protection enabled
- ✅ SQL injection prevention (Eloquent ORM)
- ✅ XSS protection (Blade escaping)
- ✅ Password hashing (bcrypt)
- ✅ Private key visibility restricted to admin users
- ✅ Role-based access control

### Best Practices
1. Jangan commit `.env` file ke repository
2. Gunakan strong password untuk admin account
3. Setup HTTPS untuk production
4. Regular backup database
5. Keep Laravel & dependencies updated

## 📝 Common Tasks

### Add New Airdrop
1. Login sebagai admin
2. Klik "Add Airdrop" button
3. Fill form dengan details
4. Upload logo (PNG/JPG)
5. Submit

### Update Airdrop Status
1. Buka airdrop detail
2. Pilih status dari dropdown
3. Status akan auto-update

### Mark Daily Checklist
1. Di airdrop list, klik toggle button pada card
2. Card akan highlight green saat completed
3. Auto-reset setelah 24 jam

### View Private Key (Admin Only)
1. Buka airdrop detail
2. Scroll ke wallet section
3. Klik "Show" button untuk reveal private key
4. Klik "Copy" untuk copy ke clipboard

## 🐛 Troubleshooting

### Database Error
```bash
# Reset database
php artisan migrate:refresh --seed
```

### Asset not loading
```bash
# Rebuild assets
npm run build

# Clear cache
php artisan cache:clear
php artisan config:clear
```

### Permission denied
```bash
# Fix permissions
chmod -R 775 storage bootstrap/cache
```

### Port already in use
```bash
# Use different port
php artisan serve --port=8001
```

## 📚 Documentation

- [Laravel Documentation](https://laravel.com/docs)
- [Laravel Breeze](https://laravel.com/docs/breeze)
- [Blade Templates](https://laravel.com/docs/blade)

## 📄 License

MIT License - see LICENSE file for details

## 👤 Author

Wanz (Jawir)

## 🤝 Contributing

Contributions welcome! Please feel free to submit a Pull Request.

---

**Last Updated:** May 20, 2026
**Version:** 1.0.0
