# bedflix

To start
- Run `composer install`
- Open WampServer
- Change configuration of Database if needeed in [.env](<.env>).
- Run `symfony console doctrine:database:create`
- Run `symfony console doctrine:migrations:migrate` -> Yes
- Run `symfony console doctrine:fixtures:load` -> Yes
- Run `symfony server:start` to launch the local web server