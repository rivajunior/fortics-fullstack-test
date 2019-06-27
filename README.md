# Fortics - Teste Full-Stack

> Para rodar o projeto é necessário ter o Docker instalado em sua máquina.

Esse projeto utiliza [Laradock](https://laradock.io/) como configuração de
containers docker.

Execute os seguintes passos para testar a aplicação.

```bash
cd laradock
cp .env-example .env
docker-compose up -d nginx mysql
docker-compose workspace bash
cp .env.example .env
php artisan key:generate
composer install
yarn install
exit
```

Agora você deve preencher as variáveis ALGOLIA_APP_ID e ALGOLIA_SECRET com seus
devidos valores.

```bash
docker-compose restart nginx
docker-compose workspace bash
php artisan migrate --seed
```

## Possíveis Problemas

### The server requested authentication method unknown to the client

Se houver problema ao conectar ao banco de dados, tente modifcar a varival
MYSQL_VERSION no env do Laradock e recriar os containers. Isso pode ocorrer pela
incompatibilidade do Laravel com o novo sistema de senha do MySQL.
Solução: <https://github.com/laradock/laradock/issues/1392#issuecomment-368320353>

### Tive minha conexão MySQL recusada

Solução: <https://laradock.io/documentation/#i-get-mysql-connection-refused>

## Desenvolvimento

Execute o comando `yarn watch-poll` dentro do container para vigiar as
modificações do assets.

Visualize o sistema no seu navegador através do url `http://localhost`.

Durante o desenvolvimento sourcemaps são gerados inline por questão de
performance.

### Dica

Utilize o plugin [EdidorConfig](https://editorconfig.org/) para pegar os
padrões de codificação no projeto, como caractere de final de linha, tamanho de
tabulação e conjunto de caracteres (_charset_).

## Produção

`yarn build` faz o build do projeto para produção.

## [Git Hooks](https://git-scm.com/book/pt-br/v1/Customizando-o-Git-Hooks-do-Git)

O projeto está configurado para executar hooks (ganchos, gatilhos) em alguns
eventos do git, como o comando `lint-staged` que é executado no evento
`pre-commit`.

Todos os scripts que não executarem com sucesso, causarão o cancelamento do
evento que o acionou.

Para pular esses gatilhos, adicione o parâmetro `--no-verify` no comando git.
**Atenção** essa ação não é recomendada. Se o hooks estão aí, têm motivo.

O plugin utilizado para executar scripts pelo node é o
[Husky](https://github.com/typicode/husky).

No entanto, também estão sendo executados alguns scripts diretamento nos hooks
do git.

### Eventos configurados

#### pre-commit

Este evento é acionado ao executar um comando de commit do git.

##### Scripts executados

* [lint-staged](https://github.com/okonet/lint-staged) é um plugin
[node](http://nodejs.org) para o uso de
[linters](https://en.wikipedia.org/wiki/Lint_(software)) em arquivos _stageds_
(marcados para commit).

Os linters utilizados são:

* [Eslint](https://eslint.org/) + [Prettier](https://prettier.io/)

* [Stylelint](https://stylelint.io/)

Eles servem para evitar 💩.
