#Etapas para executar o projeto

- Obs: O projeto está 100% back-end, ou seja, os teste precisaram ser feitos com software de requisições HTTP, como por exemplo: POSTMAN

1. Após baixar o projeto, duplique o arquivo *.env-example* e renomeie para *.env*, em seguida execute esses comandos :
    1. composer install
    2. npm install
    3. php artisan key:generate

2. Existe algumas migrations, configure um banco local no arquivo *.env* . Após configurar execute:
    1. php artisan migrate

3. Recomenda-se instalar o Horizon para visualizar com mais clareza a execução dos processos. Execute
    1. composer require laravel/horizon
    2. php artisan horizon:install
    3. abra o navegador em http://localhost/horizon

4. Precimos colocar as filas para trabalhar, execute:
    1. php artisan queue:work

5. As filas estão configuradas para serem executadas via Redis, certifique-se que já tenha o redis instalado e sendo executado.


-------------------------------------------------------------------------------------

1. design patterns utilizados:
    1. Strategy
    2. Builders
    3. Requests (getters e setters)