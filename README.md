# CliDoc Site

Landing page institucional do CliDoc, feita com Laravel, Blade, Vite e Tailwind CSS. O site é server-rendered e não precisa de banco de dados.

## Desenvolvimento com Docker

Requisitos: Docker Engine e Docker Compose.

```bash
docker compose up --build
```

Acesse <http://localhost:8081>. O container escuta internamente na porta 8000, mas o Compose publica a aplicação em 8081 para evitar conflitos com serviços locais. Para escolher outra porta, defina `APP_PORT`, por exemplo: `APP_PORT=8082 docker compose up --build` e acesse <http://localhost:8082>.

Para encerrar, use `Ctrl+C`; para remover o container, execute `docker compose down`.

O `APP_KEY` definido pelo Compose é apenas uma chave local de desenvolvimento. Não a reutilize em produção.

## Desenvolvimento local

Requisitos: PHP 8.3+, Composer e Node.js 22+.

```bash
cp .env.example .env
composer install
php artisan key:generate
npm ci
npm run dev
```

Em outro terminal, inicie a aplicação:

```bash
php artisan serve
```

Para validar a aplicação e compilar os assets:

```bash
php artisan test
npm run build
```

## Deploy no Render

O `render.yaml` configura um Web Service usando o Dockerfile da raiz e ativa deploy automático. Gere uma chave compatível com o Laravel usando `php artisan key:generate --show` e configure o resultado como `APP_KEY` no ambiente do serviço Render. O Blueprint não sincroniza esse segredo. Não publique nem compartilhe a chave; depois de configurada, evite trocá-la para não invalidar dados criptografados. A URL `https://clidoc.onrender.com` é um placeholder e deve ser ajustada caso o serviço ou domínio tenha outro endereço.

## Estrutura

- `resources/views/welcome.blade.php`: landing page.
- `resources/css/app.css` e `resources/js/app.js`: assets processados pelo Vite.
- `routes/web.php`: rota única da landing page.
- `Dockerfile` e `compose.yaml`: imagem e ambiente de desenvolvimento.
- `render.yaml`: configuração de deploy no Render.
