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
User: Almost Done, miss insert to cart
CartItems: TO DO
ItemCategory: TO DO

## Front progress:
TO DO : Afficher uniquement le détail lors d'un click sur le bouton d'un card ( retirer le reste de la page home )
Dans la page de détail, ajouter un bouton clickable pour permettre d'acceder à une page de demande d'adoption
depuis laquelle l'utilisateur si il est connecté pourra fournir les éléments nécessaire à la demande.
Une fois la demande posté, elle sera créer en db et un mail sera envoyé à l'utilisateur
Si l'utilisateur n'est pas connecté alors il y sera redirigé lors du click de redirection vers la page de demande d'adoption

```