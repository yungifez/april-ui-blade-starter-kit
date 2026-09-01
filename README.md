# April UI Laravel Blade starter kit

April UI is a Laravel starter kit for server-rendered Blade applications. It includes Laravel Fortify authentication, a responsive application shell, account settings, Alpine for small browser interactions, and April UI Blade components.

## Create an application

Install it with the Laravel installer from the published GitHub repository:

```shell
laravel new my-app --using=yungifez/april-ui-blade-starter-kit
```

The installer creates the `.env` file, generates the application key, creates the SQLite database, runs migrations, and builds the frontend assets. For an existing checkout, run:

```shell
composer setup
```

Then start the local server:

```shell
composer dev
```

## Customize the UI

April UI remains a Composer dependency. Use its normal Laravel view publishing workflow when an application owns a component implementation:

```shell
php artisan april:list
php artisan april:publish button
```

Published components are copied to `resources/views/vendor/april/components`. The published view overrides the matching package component through Laravel's normal view lookup rules.

## Quality checks

```shell
composer test
npm run build
```

The starter kit keeps behavior in Laravel routes, middleware, Fortify actions, controllers, HTTP forms, and PHPUnit/Pest feature tests. April UI supplies the presentation layer without replacing Laravel's application conventions.

## License

This starter kit is open-sourced under the MIT license.
