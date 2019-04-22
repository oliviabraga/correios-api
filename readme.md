# 📨 Correios API

API para obter informações de CEP e localização de pacotes dos correios do Brasil.

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

### Rastreamento

Para obter o histórico de um pacote dos correios (rastreamento), basta realizar uma requisição `GET` ao endpoint de rastreio:

`curl http://localhost:8989/api/track/?busca=CODIGO`

Onde `CODIGO` é o código de rastreio do objeto.

Caso haja resultados, você terá um array de informações no formato:

```json
{   
  "date": "dd/mm/yyyy",
  "time": "hh:mm",
  "location": "CIDADE[ / UF]",
  "title": "Evento ocorreu",
  "description": "Descrição do evento vai aqui"
}
```

## Contribuições

Serão sempre bem vindas, desde que venham PR de outro branch criado a partir de `master`

## Créditos

Esse projeto é possível graças ao [Lumen](https://lumen.laravel.com/)

## Considerações

> Esse projeto não possui qualquer associação com a Empresa Brasileira de Correios e Telégrafos, comumente chamada de Correios do Brasil, no sentido de que não é feito, mantido ou auxiliado pela empresa nem por qualquer pessoa associada à mesma. Esse projeto visa apenas facilitar, automatizar e acelerar a disponibilização de informações encontradas no site dos [correios](http://www.correios.com.br/). 
