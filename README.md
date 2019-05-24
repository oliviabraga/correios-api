# 📨 Correios API

API para obter informações de CEP e localização de pacotes dos Correios do Brasil.

## Setup 

- Após clonar/baixar o projeto, instale as dependências com o [composer](https://getcomposer.org/):

`composer install`

- Sirva a aplicação em desenvolvimento:

`php -S localhost:8080 -t public`

## Como usar 
_(com [cURL](https://curl.haxx.se/))_

### CEP

Para procurar por CEP, endereço ou bairro basta realizar uma requisição `GET` ao endpoint de CEP:

`curl http://localhost:8080/api/v0/cep/12345678`

ou

`http://localhost:8080/api/v0/cep/Rua%20Alguma%20Coisa`

Onde a pesquisa pode ser feita por CEP ou logradouro.

Então você terá um array de:

```json
{
  "Logradouro/Nome:": "Rua Alguma Coisa",
  "Bairro/Distrito:": "Bairro Qualquer",
  "Localidade/UF:": "Alguma Cidade",
  "CEP:": "00000-000"
}
```

### Rastreamento

Para obter o histórico de um pacote dos Correios, basta realizar uma requisição `GET` ao endpoint de rastreio:

`curl http://localhost:8080/api/v0/track/BR123123`

Onde `BR123123` é o código de rastreio do objeto.

Então você terá um array de:

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

- [Slim](http://www.slimframework.com)
- [Goutte](https://github.com/FriendsOfPHP/Goutte)

## Considerações

> Esse projeto não possui qualquer associação com a Empresa Brasileira de Correios e Telégrafos, comumente chamada de Correios do Brasil, no sentido de que não é feito, mantido ou auxiliado pela empresa nem por qualquer pessoa associada à mesma. Esse projeto visa apenas facilitar, automatizar e acelerar a disponibilização de informações encontradas no site dos [correios](http://www.correios.com.br/). 
