# bedflix

To start
- Run `composer install`
- Open WampServer
- Change configuration of Database if needeed in [.env](<.env>).
- Run `symfony console doctrine:database:create`
- Run `symfony console doctrine:migrations:migrate` -> Yes
- Run `symfony console doctrine:fixtures:load` -> Yes
- Run `symfony server:start` to launch the local web server

**Créez un utilisateur en BDD, pensez à hacher le MDP**
- Lancez Postman
- En mode POST sur ` https://localhost:8000/api/register `, passez les paramètres suivants dans un form-data (via le Body):
    - email: l'email utilisée en BDD
    - password: MDP utilisé pour le compte en BDD
- En mode GET sur ` https://localhost:8000/api/testToken `, partez dans Authorization et sélectionner *Bearer Token*, placez la chaîne récupérée dans la précédente requête