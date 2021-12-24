# Adopte-un-pet-s
Symfony project for bachelor.
## Get started
Be sure to **use a MySQL local server** like PHPMyAdmin (included in Wamp for example).  
**Install your environment** with the following command:
```
composer install
```
**Run** the app:
```
symfony serve
```
The app is **available at** [localhost:8000](http://localhost:8000/).
## Commands
### Setup DB
```
symfony console doctrine:database:create
```
### Migrate your local DB
```
php bin/console doctrine:migrations:migrate
```
### Add a migration task
```
php bin/console make:migration
```
### Fill the database with mocked data:
```
php bin/console doctrine:fixtures:load
```
## Fixtures progress:
AdoptionRequest: Done
Pet: Done
Cart: Created but not finished;
Category: Done
Item: Almost Done, miss insert to cart_items_id and item_category_id
User: Almost Donen miss insert to cart
CartItems: TO DO
ItemCategory: TO DO