# Projeto Teste E2E — Laravel + Cypress

Aplicação web desenvolvida em **Laravel 12** com a finalidade de servir como **alvo (SUT — System Under Test)** para testes automatizados End-to-End com **Cypress**. O projeto implementa um sistema de gerenciamento de **Pessoas** e **Produtos** com autenticação completa, servindo de base prática para aprendizado e demonstração de testes E2E em aplicações reais.

---

## Objetivo

O objetivo principal deste projeto é fornecer uma aplicação funcional e realista sobre a qual testes End-to-End possam ser escritos e executados. Ele cobre cenários comuns em sistemas web:

- Autenticação de usuários (login, logout, registro, recuperação de senha)
- Operações CRUD completas (criar, listar, editar, excluir)
- Navegação entre telas e validação de fluxos de usuário

O projeto irmão com os testes Cypress se encontra no diretório `testes-cypress-e2e/`.

---

## Funcionalidades

- **Autenticação** — Registro, login, logout e gerenciamento de perfil (via Laravel Breeze)
- **Dashboard** — Painel inicial com acesso rápido aos módulos
- **Cadastro de Pessoas** — CRUD completo com campos: nome, CPF, e-mail e telefone
- **Cadastro de Produtos** — CRUD completo com campos: nome, descrição, preço e estoque

---

## Stack Tecnológica

| Camada | Tecnologia |
|---|---|
| Backend | PHP 8.2+ / Laravel 12 |
| Autenticação | Laravel Breeze |
| Banco de Dados | MySQL 8.4 |
| Frontend | Bootstrap 5.3 + TailwindCSS + Alpine.js |
| Build | Vite |
| Testes unitários/feature | PHPUnit 11 |
| Testes E2E | Cypress 14 + Allure Reports |
| Containerização | Docker (Laravel Sail) |

---

## Pré-requisitos

Antes de iniciar, certifique-se de ter instalado:

- **PHP** >= 8.2
- **Composer** >= 2.x
- **Node.js** >= 20.x e **npm**
- **MySQL** >= 8.0
  _ou_ **Docker** (para uso com Laravel Sail)

---

## Instalação e Execução

### Opção 1 — Ambiente Local (sem Docker)

**1. Clone o repositório e acesse o diretório da aplicação:**

```bash
git clone <url-do-repositório>
cd Teste-Laravel-E2E/projeto-teste-e2e
```

**2. Instale as dependências PHP:**

```bash
composer install
```

**3. Configure as variáveis de ambiente:**

```bash
cp .env.example .env
php artisan key:generate
```

Edite o arquivo `.env` e configure a conexão com o banco de dados:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=projeto_teste_e2e
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

**4. Execute as migrations para criar as tabelas:**

```bash
php artisan migrate
```

**5. (Opcional) Popule o banco com dados de exemplo:**

```bash
php artisan db:seed
```

**6. Instale as dependências JavaScript e compile os assets:**

```bash
npm install
npm run build
```

**7. Inicie o servidor de desenvolvimento:**

```bash
php artisan serve
```

A aplicação estará disponível em: `http://localhost:8000`

---

### Opção 2 — Docker com Laravel Sail

**1. Clone o repositório:**

```bash
git clone <url-do-repositório>
cd Teste-Laravel-E2E/projeto-teste-e2e
```

**2. Instale as dependências PHP (sem Docker ainda):**

```bash
composer install
```

**3. Configure o ambiente:**

```bash
cp .env.example .env
```

**4. Suba os containers:**

```bash
./vendor/bin/sail up -d
```

**5. Gere a chave da aplicação e rode as migrations:**

```bash
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate
```

**6. Instale as dependências JS e compile os assets:**

```bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run build
```

A aplicação estará disponível em: `http://localhost`

---

## Usuário de Teste (Seeder)

O seeder padrão cria um usuário para acesso imediato:

| Campo | Valor |
|---|---|
| E-mail | `test@example.com` |
| Senha | `password` |

Para criá-lo, execute:

```bash
php artisan db:seed
# ou com Sail:
./vendor/bin/sail artisan db:seed
```

---

## Executando os Testes

### Testes unitários e de feature (PHPUnit)

```bash
php artisan test
# ou com Sail:
./vendor/bin/sail artisan test
```

### Testes E2E com Cypress

Os testes E2E estão no diretório `../testes-cypress-e2e/`. Com a aplicação Laravel rodando, execute:

```bash
cd ../testes-cypress-e2e
npm install

# Abrir o Cypress em modo interativo
npx cypress open

# Executar testes por módulo (modo headless)
npm run test:login
npm run test:pessoas
npm run test:produtos
```

**Gerar e visualizar o relatório Allure:**

```bash
npm run allure:generate
npm run allure:open
```

---

## Estrutura do Projeto

```
projeto-teste-e2e/
├── app/
│   ├── Http/Controllers/   # Controllers de Pessoa, Produto, Profile e Auth
│   └── Models/             # Modelos: Pessoa, Produto, User
├── database/
│   ├── migrations/         # Criação das tabelas pessoas, produtos e users
│   └── seeders/            # Dados iniciais para testes
├── resources/views/
│   ├── pessoas/            # Views CRUD de Pessoas
│   ├── produtos/           # Views CRUD de Produtos
│   ├── auth/               # Views de autenticação
│   └── layouts/            # Layout principal e navegação
├── routes/
│   └── web.php             # Rotas da aplicação
└── tests/                  # Testes unitários e de feature (PHPUnit)
```

---

## Licença

Este projeto é distribuído sob a licença [MIT](https://opensource.org/licenses/MIT).
