# 📨 Correios API

API para obter informações de CEP e localização de pacotes do dos correios do Brasil.

## Instalação 

- Após clonar/baixar o projeto, gere o arquivo .env:

`php -r "file_exists('.env') || copy('.env.example', '.env');"`

- Edite o arquivo `.env` e coloque os dados de acesso ao banco nas vars que começam com `DB_`

- Em seguida instale as dependências com o [composer](https://getcomposer.org/):

`composer install`

- Sirva a aplicação em desenvolvimento:

`php -S localhost:8080 -t public`

## Como usar 
_(com [cURL](https://curl.haxx.se/))_

### CEP

Para procurar por CEP, endereço ou bairro basta realizar uma requisição `GET` ao endpoint de CEP:

`curl http://localhost:8989/api/cep/?busca=00000000`

ou
 
`curl http://localhost:8989/api/cep/?busca=Rua%20Alguma%20Coisa`

Caso haja resultados, você terá um array de informações no formato:

```json
{
    "Logradouro/Nome:": "Rua Alguma Coisa",
    "Bairro/Distrito:": "Bairro Qualquer",
    "Localidade/UF:": "Alguma Cidade",
    "CEP:": "00000-000"
}
```

## Contribuições

Serão sempre bem vindas, desde que venham PR de outro branch criado a partir de `master`
