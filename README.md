# EnvVault

A multi-tenant environment variable management platform. Store, manage, import, and export `.env` file key-value pairs organized by project and environment.

## Features

- **Multi-Tenant Organizations** — each org owns projects, teams, and environments with Filament-based tenant switching
- **Team-Based Access Control** — teams are assigned to projects with roles (admin, editor, viewer); users see only what their team allows
- **Role Hierarchy** — organization-level roles (owner, admin, user) and project-team roles enforce granular permissions
- **Encrypted Storage** — environment values are encrypted at rest using Laravel's `encrypted` cast
- **Import & Export** — paste raw `.env` content to import key-value pairs, or export environments back to `.env` format with preserved formatting
- **Activity Logging** — audit trail of created, updated, and deleted events on environments and values
- **Invitation System** — invite users by email with expiring, single-use tokens; supports existing users and new signups
- **Dual Admin Panels** — `/app` for regular users, `/admin` for administrators with log viewer and user management
- **User Profile Management** — edit profile and organization details directly in the Filament panel

## Tech Stack

| Layer | Details |
|---|---|
| PHP | `^8.3` |
| Laravel | `^13.17` |
| Filament | `^5.0` |
| Database | SQLite (default), MySQL/PostgreSQL supported |
| Frontend | Tailwind CSS 4, Alpine.js, Vite 8 |
| Testing | Pest `^4.7` |

## Installation

### Prerequisites

- PHP 8.3+
- Composer
- SQLite (or MySQL/PostgreSQL)
- Node.js & npm (for frontend assets)

### Setup

```bash
# Clone the repository
git clone <repository-url>
cd envvault

# Install dependencies
composer install
npm install

# Copy environment file and generate app key
cp .env.example .env
php artisan key:generate

# Run database migrations
php artisan migrate

# Build frontend assets
npm run build

# Start the development server
composer run dev
```

The app will be available at `http://localhost:8000`.

### Default Admin Access

Run seeder to create a default admin user.
```bash
php artisan db:seed
```

You will get a magic login link on the local environment for both admin and app panel.

### Composer Scripts

| Command | Description |
|---|---|
| `composer run setup` | Full project setup (install, key, migrate, build) |
| `composer run dev` | Start the Vite dev server |
| `composer run test` | Run the Pest test suite |

## Docker

EnvVault ships with a Docker Compose setup for quick local development and self-hosting.

### Quick Start

```bash
# Clone the repository
git clone <repository-url>
cd envvault

# Copy the Docker environment file
cp .env.docker .env

# Start all services (app, MySQL, Redis)
docker compose up -d

# Generate the application key
docker compose exec app php artisan key:generate

# Run migrations and seed the database
docker compose exec app php artisan migrate --seed
```

The app will be available at `http://localhost:8000`.

### Services

| Service | Container | Port | Purpose |
|---|---|---|---|
| App | `envvault-app` | `8000` | Laravel application (FrankenPHP) |
| MySQL | `envvault-mysql` | `3307` (host) / `3306` (container) | Database |
| Redis | `envvault-redis` | `6379` | Cache & sessions |

### Configuration

The Docker environment is configured via `.env.docker`. Key settings:

```env
# Database
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=envvault
DB_USERNAME=dipesh
DB_PASSWORD=dipesh

# Redis
REDIS_HOST=redis
REDIS_PORT=6379

# Application
APP_URL=http://localhost:8000
APP_DEBUG=true
```

**Changing MySQL credentials:** Update `MYSQL_USER`, `MYSQL_PASSWORD`, and `MYSQL_ROOT_PASSWORD` in `docker-compose.yml`, then match them in `.env.docker`.

**Changing ports:** Edit the `ports` mapping in `docker-compose.yml`. For example, to use port `8080` for the app:
```yaml
ports:
  - "8080:8000"
```

### Production Deployment

For production, create a production `.env` based on `.env.docker` with these changes:

```env
APP_ENV=production
APP_DEBUG=false
APP_KEY=<your-generated-key>
APP_URL=https://your-domain.com

# Use strong database credentials
DB_PASSWORD=<strong-password>
```

Generate a real application key:
```bash
docker compose exec app php artisan key:generate
```

Run migrations without seeding:
```bash
docker compose exec app php artisan migrate --force
```

### Common Commands

```bash
# View logs
docker compose logs -f app

# Stop all services
docker compose down

# Stop and remove volumes (fresh start)
docker compose down -v

# Rebuild after code changes
docker compose up -d --build

# Run Artisan commands
docker compose exec app php artisan <command>

# Open a shell in the app container
docker compose exec app bash

# Run tests
docker compose exec app php artisan test
```

### Troubleshooting

**Port already in use:**
If `3307` or `6379` are taken, change the host port in `docker-compose.yml`:
```yaml
mysql:
  ports:
    - "3308:3306"  # Use 3308 instead
```

**Permission errors on storage:**
```bash
docker compose exec app chown -R www-data:www-data storage bootstrap/cache
```

**Database connection refused:**
Ensure MySQL is healthy before the app starts:
```bash
docker compose ps  # Check mysql health status
docker compose up -d  # Restart services
```

**Reset everything:**
```bash
docker compose down -v  # Remove containers and volumes
docker compose up -d --build  # Rebuild from scratch
docker compose exec app php artisan migrate --seed
```

## Project Structure

```
app/
├── Enums/           # OrganizationUserRole, ProjectTeamRole, EnvironmentTag
├── Models/          # User, Organization, Team, Project, Environment, EnvironmentValue, Invitation, ActivityLog
├── Actions/         # Filament action classes (ImportEnvVariable, etc.)
├── Observers/       # InvitationObserver (sends email on invite)
├── Services/        # ParseEnvFile service for .env parsing
├── helpers.php      # Global authorization helper functions
└── Filament/
    ├── App/         # User-facing panel (resources, pages, widgets)
    └── Admin/       # Admin panel (log viewer, user/org management)

database/migrations/ # 13 migrations covering users, orgs, teams, projects, environments, invitations, activity logs
routes/
├── web.php          # Welcome page and invitation routes
```

## Usage

1. **Create an organization** — sign up or accept an invitation
2. **Invite team members** — add users by email with a chosen role
3. **Create projects and teams** — assign teams to projects with access roles
4. **Manage environments** — create environments (production, staging, etc.) under each project
5. **Import variables** — paste `.env` content and EnvVault parses and stores the key-value pairs securely
6. **Export** — generate `.env` formatted output for any environment

## Contributing

Contributions are welcome. Please follow the existing code conventions and run tests before submitting:

```bash
composer run test
vendor/bin/pint --dirty --format agent
```

## License
[MIT license](https://opensource.org/licenses/MIT).
