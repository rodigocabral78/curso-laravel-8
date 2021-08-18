# Additional: Container Docker & Laravel Artisan

## Configs

```bash
sed -i "s/'timezone'.*/'timezone' => env('APP_TZ', 'UTC'),/" config/app.php
sed -i "s/'locale'.*/'locale' => env('APP_LOCALE', 'en'),/" config/app.php
sed -i "s/'fallback_locale'.*/'fallback_locale' => env('APP_FALLBACK', 'en'),/" config/app.php
sed -i "s/'faker_locale'.*/'faker_locale' => env('APP_FAKER', 'en_US'),/" config/app.php
sed -i "s/.*APP_URL.*/&\\n\nAPP_TZ=America\/Manaus\nAPP_LOCALE=pt_BR\nAPP_FALLBACK=pt_BR\nAPP_FAKER=pt_BR/;s/mysql/pgsql/;s/3306/5432/;s/127.0.0.1/docker/" .env.example
cp -rfv .env.example .env
./artisan key:generate --verbose --ansi
touch database/database.sqlite
```

## Artisan

```bash
./artisan clear-compiled -vvv && ./artisan cache:clear -vvv && ./artisan config:clear -vvv && ./artisan event:clear -vvv && ./artisan optimize:clear -vvv && ./artisan route:clear -vvv && ./artisan view:clear -vvv

./artisan optimize -vvv

./artisan clear-compiled --verbose && ./artisan cache:clear --verbose && ./artisan config:clear --verbose && ./artisan route:clear --verbose && ./artisan view:clear --verbose && ./artisan serve --verbose --no-interaction --host=localhost --port=8081
```

## PHP Development Server

```bash
./artisan serve -vvv --ansi --no-interaction --host=localhost --port=8081
```

## Storage - Create the symbolic link using relative paths

```bash
cd public
ln -sfv ../storage/app/public storage
cd -

composer require symfony/filesystem
./artisan storage:link -vvv --relative
```

## Crie um novo arquivo de migração, um novo controlador de recursos para o modelo

## laravel ^5.6 --all Generate a migration, factory, and resource controller for the model

```bash
./artisan make:model -vvv --force --migration -- App\\Models\\Role
./artisan make:model -vvv --force --migration -- App\\Models\\Permission
./artisan make:model -vvv --force --migration -- App\\Models\\PermissionRole
./artisan make:model -vvv --force --migration -- App\\Models\\RoleUser
./artisan make:model -vvv --force --migration -- App\\Models\\PermissionUser


./artisan make:model -vvv --force --all -- App\\Models\\Intern
./artisan make:model -vvv --force --migration --seed --factory --controller --resource -- App\\Models\\Intern
./artisan make:model -vvv --force --migration --seed --factory --controller --api -- App\\Models\\Intern
```

## Migrations & Seeders

```bash
composer require doctrine/dbal

DB_HOST=docker ./artisan migrate:fresh -vvv --force --seed

./artisan migrate:fresh -vvv --force --seed
./artisan migrate:fresh -vvv --drop-views --force --seed
./artisan migrate:fresh -vvv --force && ./artisan db:seed -vvv --force

./artisan migrate:refresh -vvv --force --seed
./artisan migrate:refresh -vvv --force && ./artisan db:seed -vvv --force
DB_HOST=docker ./artisan migrate:rollback -vvv && DB_HOST=docker ./artisan migrate -vvv --pretend > .docker/mysql/mysql.sql

./artisan make:migration create_people_table
./artisan make:migration create_groups_table --table=groups --create=groups
./artisan make:migration create_groups_table

./artisan make:seeder -vvv UserSeeder
```

## Authorized & Validation Request

```bash
./artisan make:request -vvv UserRequest
./artisan make:request -vvv UserStoreUpdate
```
