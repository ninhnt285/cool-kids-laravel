## Quick start

- Install vendor: `composer install`
- Create .env file: `copy .env.example .env`
- Configure .env: `vim .env`
- Generate keys: `php artisan key:generate`
- Link storage directory: `php artisan storage:link`
- Migrate database: `php artisan migrate:fresh --seed`
