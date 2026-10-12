# context.md — Site do CliDoc

> Contexto completo para geração do site institucional/landing page do **CliDoc**.
> Destino: site em **PHP/Laravel** hospedado no **Render** (Web Service) com **CI/CD** (deploy automático a cada push no GitHub).

---

## 1. O que é o CliDoc

**CliDoc** é um utilitário de linha de comando (CLI), escrito em **Go**, que analisa o código-fonte de projetos Go e gera documentação de API **OpenAPI 3.0 (Swagger)** de forma automática. Suporte a outras linguagens, como Python e Node.js, pode ser desenvolvido futuramente.

**Tagline sugerida:** *"Documentação de API sem escrever documentação."*

**Sub-tagline:** *"Uma CLI em Go que lê comentários no seu código e gera OpenAPI sozinha."*

### Premissa central

Em vez de manter um `.yaml` separado que envelhece junto com o código (e passa a mentir), a **fonte da verdade vira o próprio código**: um bloco de comentários anotados acima da função já é suficiente para gerar um `openapi.json` válido.

### URL do site (placeholder)

- `https://clidoc.onrender.com` (ou domínio próprio apontando ao serviço)

### Repositório e downloads

- **Repositório oficial:** https://github.com/lukasalmeida/clidoc
- **Downloads:** as versões para download estão na aba **Releases** do repositório → https://github.com/lukasalmeida/clidoc/releases
- O site DEVE exibir link/CTA de download apontando para a página de Releases (binários estáticos por plataforma).

---

## 2. Problema que resolve (copy de vendas)

- Documentação de API é tarefa de "depois" — sempre adiável, sempre desatualizada.
- Documentação velha é pior que documentação nenhuma: gera confiança falsa e chamadas erradas.
- Swagger/Redoc resolvem a renderização, mas ainda exigem alguém sincronizando o `.yaml` manualmente.
- **CliDoc inverte a lógica:** o código é documentado, o arquivo é derivado.

**Público-alvo:** desenvolvedores de API (backend), times que mantêm APIs REST, contribuidores open source, pessoas que consomem DX boa.

---

## 3. Funcionalidades a apresentar no site

Estas são as features que o site DEVE comunicar:

### 3.1 Comandos da CLI

| Comando | Descrição | Status |
| --- | --- | --- |
| `clidoc init` | Inicializa a configuração (`clidoc.yaml`) no projeto | Disponível |
| `clidoc generate` | Analisa o código e gera `openapi.json` | Disponível |
| `clidoc serve` | Sobe servidor local com Swagger UI/Redoc e hot reload | Disponível |

### 3.2 Pipeline linear (mostrar como diagrama)

```
[Código-Fonte] → [AST / Comment Parser] → [IR] → [OpenAPI / Markdown Generator] → [Arquivo / Web Server]
```

Cinco componentes:

1. **CLI Core** — oferece os comandos `init`, `generate` e `serve`, processa argumentos e carrega `clidoc.yaml`.
2. **Parsers** — leem o código via AST ou comentários e produzem estrutura neutra.
3. **IR (Intermediate Representation)** — rotas, métodos, parâmetros e respostas, independente da linguagem de origem. É o coração da arquitetura: adicionar Python/Node.js = escrever um parser novo, sem tocar nos generators.
4. **Generators** — convertem a IR em OpenAPI 3.0 (JSON).
5. **Server/UI** — servidor local com Swagger UI ou Redoc e hot reload.

### 3.3 Padrão de anotações (destaque principal do site)

```go
// @Summary Criar Novo Usuário
// @Description Cadastra um novo usuário no sistema
// @Route POST /api/v1/users
// @Tag Usuários
// @Param body json UserRequest true "Dados do usuário"
// @Success 201 json UserResponse "Usuário criado com sucesso"
// @Failure 400 json ErrorResponse "Dados inválidos"
```

Quem já usou anotações Swagger se sente em casa. Sintaxe legível por humanos e por máquinas.

### 3.4 Download e exemplo de uso

O download é feito pelo repositório oficial — as versões publicadas ficam na aba **Releases**:

- Repo: https://github.com/lukasalmeida/clidoc
- Releases: https://github.com/lukasalmeida/clidoc/releases (binários estáticos; escolher o da plataforma)

Depois de baixar o binário e colocá-lo no `PATH`:

```bash
# gerar documentação
clidoc generate ./meu-projeto

# visualizar no navegador
clidoc serve
```

> O site deve guiar o usuário: **Baixar na Releases → colocar no PATH → `clidoc generate`**.

### 3.5 Diferenciais (seção "Por que CliDoc")

- **Binário estático em Go** — sem runtime, sem dependências, downloads rápidos nas releases.
- **Zero reflection / zero execução do código alvo** — só AST e comentários.
- **IR neutra entre linguagens** — arquitetura plugável de parsers.
- **Open source com boa DX** — portas de entrada claras para contribuidores.
- **OpenAPI 3.0** — especificações JSON para ferramentas compatíveis, incluindo Swagger UI.

### 3.7 Chamadas para contribuição (CTA)

- "Contribua no GitHub" — issues marcadas `good first issue`.
- Portas de entrada: suporte a múltiplas linguagens, leitura de structs/DTOs, hot reload server, Markdown generator, validação.

---

## 4. Estrutura sugerida do site (landing page única)

1. **Hero** — tagline + sub-tagline + CTAs (`Baixar` (→ Releases) / `Ver no GitHub`) + snippet de terminal animado mostrando `clidoc generate`.
2. **Download** — como obter: link para https://github.com/lukasalmeida/clidoc/releases (aba Releases), instrução de colocar o binário no `PATH`.
3. **O problema** — documentação desatualizada (copy da seção 2).
4. **Como funciona** — diagrama do pipeline linear + os 5 componentes.
5. **Sintaxe de anotações** — bloco de código com destaque de sintaxe + "antes/depois" (código → `openapi.json`).
6. **Funcionalidades** — grade de cards (comandos, saída OpenAPI/Markdown, serve/hot reload, IR plugável).
7. **Contribua** — CTA open source (GitHub, good first issue).
8. **Footer** — links (Releases/Downloads, GitHub, Substack, licença MIT), crédito do autor.

### Conteúdo secundário (opcional, páginas internas)

- `/docs` — quickstart e referência de anotações.
- `/changelog` — releases via GitHub.
- Blog/artigo: linkar o artigo do Substack *"Documentação de API sem escrever documentação"*.

---

## 5. Identidade visual (sugestão)

- **Temas:** dark mode por padrão (público dev), com toggle claro.
- **Paleta:** fundo escuro (#0B0F14/#0D1117), destaque verde-água/teal ou âmbar (alemão de terminal), texto neutro claro.
- **Tipografia:** fonte mono para código (JetBrains Mono / Fira Code), sans-serif moderna para texto (Inter / Geist).
- **Elementos:** estética de terminal, cursor piscando, badges de release, ícone de documento + CLI.
- **Tom de voz:** direto, técnico, leve humor de dev ("documentação é tarefa de depois").
- **Idioma do site:** Português (BR) como principal; considerar `en` no futuro.

---

## 6. Stack técnica do site

**Stack escolhida: PHP com Laravel.**

| Camada | Tecnologia |
| --- | --- |
| Framework | Laravel (latest stable, ex.: 11.x/12.x) |
| Linguagem | PHP 8.3+ |
| View engine | Blade |
| Assets/bundler | Vite (incluso no Laravel) + Tailwind CSS |
| Code highlighting | Prism.js ou Shiki (via CDN/asset) para sintaxe `@Route`/`@Summary` |
| Testes | PHPUnit / Pest |
| Hospedagem | Render — PHP Web Service |

### Estrutura do projeto do site

```
clidoc-site/
├── app/Http/Controllers/     # HomeController (opcional, se houver lógica)
├── resources/views/          # Blade: layout, hero, problema, pipeline, syntax, features, contribute
├── routes/web.php            # Rotas: "/", "/docs", "/changelog" (futuro)
├── public/                   # index.php, assets buildados, favicon
├── vite.config.js            # Build de CSS/JS (Tailwind)
├── composer.json
├── render.yaml
└── .github/workflows/        # CI: lint + testes (opcional, antes do deploy)
```

### Observações de arquitetura

- **Página majoritariamente server-rendered (Blade)** — SEO nativo, sem necessidade de SPA. JS só onde necessário (toggle de tema, cópia de código).
- **Vite + Tailwind** para estilização dark mode e componentes.
- Landing page única com as seções da seção 4; conteúdo das views pode vir de config ou constants para facilitar edição.

---

## 7. CI/CD + Render (requisito do deploy)

- **Repositório:** GitHub (ex.: `github.com/<user>/clidoc-site`).
- **Tipo de serviço no Render:** **PHP Web Service** (o Laravel precisa de PHP rodando; não é Static Site).
- **Deploy automático:** conectar o repo; a cada `push` na branch principal o Render faz build e publica.
- **PR previews (opcional):** ativar previews de pull request no Render.

### Exemplo de `render.yaml` (Blueprint — infra como código)

```yaml
services:
  - type: web
    name: clidoc-site
    env: php
    plan: free
    repo: https://github.com/<user>/clidoc-site
    branch: main
    buildCommand: >
      composer install --no-dev --optimize-autoloader &&
      npm ci &&
      npm run build &&
      php artisan route:cache &&
      php artisan view:cache
    startCommand: php artisan serve --host=0.0.0.0 --port=$PORT
    autoDeploy: true
    envVars:
      - key: APP_URL
        value: https://clidoc.onrender.com
      - key: APP_ENV
        value: production
      - key: APP_DEBUG
        value: "false"
      - key: SESSION_DRIVER
        value: file
```

### Configuração manual (dashboard do Render)

| Campo | Valor |
| --- | --- |
| Type | Web Service |
| Runtime | PHP |
| Build Command | `composer install --no-dev --optimize-autoloader && npm ci && npm run build` |
| Start Command | `php artisan serve --host=0.0.0.0 --port=$PORT` |
| Auto Deploy | On |

### Checklist de pipeline

- [ ] Repo no GitHub com o site Laravel.
- [ ] `render.yaml` na raiz (ou config manual no painel).
- [ ] `APP_KEY` gerado (variável de ambiente; `php artisan key:generate --show`).
- [ ] `.env` de produção (não commitar `.env` real; usar env vars do Render).
- [ ] `composer.lock` e `package-lock.json` commitados (build determinístico).
- [ ] Assets Vite buildados no build command.
- [ ] Deploy automático na branch `main` ativo.
- [ ] Domínio customizado (opcional) apontado ao serviço.

---

## 8. SEO e metadados

- `title`: **CliDoc — Documentação de API sem escrever documentação**
- `description`: CLI em Go que lê comentários no seu código e gera OpenAPI 3.0 automaticamente.
- Open Graph + Twitter card com imagem de preview (1200×630).
- Favicon/logo (sugestão: monograma `>_` ou doc dobrado).
- Sitemap + `robots.txt`.
- JSON-LD SoftwareApplication.

---

## 10. Fora de escopo (por enquanto)

- Sem login, banco de dados ou CRUD — o site é um showcase server-rendered em Blade; backend mínimo (sem models/migrations).
- Executar a CLI no navegador (demo interativa pode ser simulada com GIF/ vídeo).
- Página de docs completa (futuro `/docs`).

---

## Resumo em uma frase

> Site em **PHP com Laravel** (Blade + Vite + Tailwind) em português, landing page única que apresenta o CliDoc — CLI em Go que gera OpenAPI a partir de comentários no código — com seções de problema, pipeline, sintaxe, features e CTA de contribuição, hospedado no Render como Web Service PHP com deploy automático via CI/CD a cada push no GitHub.
