# Adopte-un-pet-s
Symfony project for bachelor.

## Get started
Be sure to use a MySQL local server like PHPMyAdmin (included in Wamp for example).

## Commands
### Setup DB
```
symfony console doctrine:database:create
```

### Add a migration task
```
php bin/console doctrine:migrations:migrate
```

### Migrate your local DB
```
php bin/console make:migration
```