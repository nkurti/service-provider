# Service Provider Directory

A simple Laravel 10 + Vue 3 module that lists service providers, allows filtering by category, and displays provider details.

## Design Decisions

- Laravel API with a Vue 3 frontend.
- Eloquent ORM with `with('category')` to avoid N+1 queries.
- One main Vue component (`ProviderList.vue`) handles listing and filtering.

## Performance Optimizations

- Lazy loading for images (`loading="lazy"`).
- Eager loading of category relations.
- Small JS/CSS bundle using Vite.

## Future Enhancements

- Add pagination and name search.
- Admin panel for managing providers.
- Logo upload and storage integration.
- Caching for categories.

## Testing

Run the test with:

```bash
php artisan test
```


# How to run
Backend (Laravel 10, PHP 8.4+)

1. Create a new .env file

```bash
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
```

# How to run
Frontend (Vue 3 via Vite)

```bash
npm install
npm run build
npm run serve
```
