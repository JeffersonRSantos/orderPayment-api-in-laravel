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
#Rotas e collect

1. POST /api/order-payment  *created new order payment*
    1. {
        "invoice": "126",
        "name": "teste",
        "cod_bank": "987",
        "number_account": "6547845",
        "number_agency": "0660",
        "payment_value": "55.50"
    }

2. GET /api/list-payment  *lista all payments*
3. GET /api/search?id=123  *search by od_wepayout*

-------------------------------------------------------------------------------------

1. design patterns utilizados:
    1. Strategy
    2. Builders
    3. Requests (getters e setters)
