<!DOCTYPE html>

<html class="dark" lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta name="description"
    content="CliDoc é uma CLI em Go que lê comentários no seu código e gera documentação OpenAPI 3.0 automaticamente." />
  <meta property="og:title" content="CliDoc — Documentação de API sem escrever documentação" />
  <meta property="og:description"
    content="Gere documentação OpenAPI 3.0 a partir dos comentários no seu código Go." />
  <meta property="og:type" content="website" />
  <meta name="twitter:card" content="summary" />
  <link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}" />
  <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=JetBrains+Mono:wght@100..900&display=swap"
    rel="stylesheet" />
  <title>CliDoc — Documentação de API sem escrever documentação</title>
  <script type="application/ld+json">{"@@context":"https://schema.org","@type":"SoftwareApplication","name":"CliDoc","applicationCategory":"DeveloperApplication","operatingSystem":"Linux, macOS, Windows","description":"CLI em Go que gera documentação OpenAPI 3.0 a partir de comentários no código-fonte.","url":"https://github.com/lukasalmeida/clidoc"}</script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body id="top" class="bg-background font-body-md text-on-surface antialiased">
  <header class="fixed top-0 left-0 w-full z-50 bg-surface-base/85 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.4)]">
    <div class="h-16 max-w-[1240px] mx-auto px-margin flex items-center justify-between gap-space-md">
      <div class="flex items-center gap-space-sm"><img alt="CliDoc Logo" class="h-8 w-auto object-contain"
          src="{{ asset('images/icon.png') }}" /><a
          class="font-label-md text-label-md uppercase tracking-wider text-text-primary hover:text-primary transition-colors flex items-center gap-space-xs"
          data-path="landing" href="#top">CliDoc <span
            class="font-code-sm text-code-sm text-accent-orange-bright bg-surface-raised px-space-xs py-0.5 rounded">v0.1.0</span></a>
      </div>
      <nav class="hidden lg:flex items-center gap-space-lg" data-active-classes="text-primary font-bold"><a
          aria-current="page" class="transition-colors text-primary font-bold" data-path="landing"
          href="#problema">Problema</a><a
          class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors"
          data-path="pipeline" href="#pipeline">Pipeline</a><a
          class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors"
          data-path="sintaxe" href="#sintaxe">Sintaxe</a><a
          class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors"
          data-path="features" href="#features">Features</a><a
          class="font-body-sm text-body-sm text-on-surface-variant hover:text-on-surface transition-colors"
          data-path="contribua" href="#contribua">Contribua</a></nav>
      <div class="flex items-center gap-space-md"><a
          class="hidden sm:flex items-center gap-space-xs px-space-sm py-1.5 rounded-lg bg-surface-raised text-on-surface-variant hover:text-on-surface transition-colors"
          href="https://github.com/lukasalmeida/clidoc" rel="noopener noreferrer" target="_blank"><span
            class="material-symbols-outlined text-[16px]">code</span><span
            class="font-label-sm text-label-sm">GitHub</span><span
            class="flex items-center gap-0.5 font-code-sm text-code-sm bg-surface-container px-1 py-0.5 rounded text-accent-orange-bright"><span
              class="material-symbols-outlined text-[12px]">star</span>★</span></a><a
          class="inline-flex items-center justify-center px-space-md py-2 rounded-lg bg-primary-container text-on-primary-container font-headline-sm text-label-md hover:bg-accent-orange-bright transition-all shadow-[0_0_20px_-3px_rgba(249,115,22,0.45)]"
          href="https://github.com/lukasalmeida/clidoc/releases" rel="noopener noreferrer" target="_blank">Baixar
          v0.1.0</a>
        <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center" aria-hidden="true"><span
            class="material-symbols-outlined text-on-primary text-[18px]">terminal</span></div>
      </div>
    </div>
  </header>
  <main class="w-full pt-16 bg-background">
    <div class="flex flex-col w-full">
      <!-- HERO SECTION -->
      <section class="relative w-full overflow-hidden bg-surface-base py-space-2xl lg:py-space-3xl">
        <!-- Ambient glowing grid backdrop -->
        <div class="absolute inset-0 pointer-events-none opacity-20">
          <div class="w-full h-full bg-[radial-gradient(#f97316_1px,transparent_1px)] [background-size:24px_24px]">
          </div>
        </div>
        <div
          class="absolute -top-32 left-1/2 -translate-x-1/2 w-[720px] h-[340px] bg-primary-container/15 blur-[120px] rounded-full pointer-events-none">
        </div>
        <div class="max-w-[1240px] mx-auto px-margin relative z-10">
          <div class="flex flex-col items-center text-center max-w-4xl mx-auto">
            <!-- Release Badge -->
            <div
              class="inline-flex items-center gap-space-xs px-space-md py-1 rounded-full bg-surface-raised border border-border-subtle shadow-sm mb-space-lg hover:border-accent-orange-bright/50 transition-all">
              <span class="w-2 h-2 rounded-full bg-status-success animate-pulse"></span>
              <span class="font-code-sm text-code-sm text-accent-orange-bright">v0.1.0 MVP disponível</span>
              <span class="text-text-muted font-label-sm">•</span>
              <span class="font-code-sm text-code-sm text-text-secondary">Open Source em Go</span>
            </div>
            <!-- Headline -->
            <h1 class="font-display-xl text-display-xl tracking-tight text-text-primary mb-space-md">
              Documentação de API <br class="hidden sm:inline" />
              <span
                class="text-transparent bg-clip-text bg-gradient-to-r from-accent-orange-bright via-primary-container to-accent-orange-deep">sem
                escrever documentação.</span>
            </h1>
            <!-- Subtagline -->
            <p class="font-body-lg text-body-lg text-text-secondary max-w-2xl mb-space-xl">
              Uma CLI em Go que lê anotações no seu código-fonte e gera especificações
              <span class="text-text-primary font-medium">OpenAPI 3.0</span> automaticamente.
            </p>
            <!-- Main CTAs -->
            <div
              class="flex flex-col sm:flex-row items-center justify-center gap-space-md w-full sm:w-auto mb-space-2xl">
              <a class="w-full sm:w-auto inline-flex items-center justify-center gap-space-xs px-space-xl py-3 rounded-lg bg-primary-container text-on-primary-container font-headline-sm text-label-md hover:bg-accent-orange-bright transition-all shadow-[0_0_28px_-4px_rgba(249,115,22,0.55)]"
                href="https://github.com/lukasalmeida/clidoc/releases" rel="noopener noreferrer" target="_blank">
                <span class="material-symbols-outlined text-[18px]">download</span>
                <span>Baixar Releases (v0.1.0)</span>
              </a>
              <a class="w-full sm:w-auto inline-flex items-center justify-center gap-space-xs px-space-xl py-3 rounded-lg bg-surface-raised border border-border-subtle text-text-primary hover:border-text-secondary hover:bg-surface-overlay transition-all shadow-sm"
                href="https://github.com/lukasalmeida/clidoc" rel="noopener noreferrer" target="_blank">
                <span class="material-symbols-outlined text-[18px]">code</span>
                <span class="font-headline-sm text-label-md">Ver no GitHub</span>
                <span
                  class="font-code-sm text-code-sm bg-surface-container px-1.5 py-0.5 rounded text-accent-orange-bright ml-1">★
                  100+</span>
              </a>
            </div>
          </div>
          <!-- Hero Terminal Mockup -->
          <div
            class="w-full max-w-3xl mx-auto rounded-xl bg-surface-deep border border-border-highlight shadow-[0_20px_50px_rgba(0,0,0,0.8),0_0_30px_rgba(249,115,22,0.08)] overflow-hidden">
            <!-- Titlebar -->
            <div
              class="flex items-center justify-between px-space-md py-space-sm bg-surface-base border-b border-border-subtle">
              <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-full bg-status-error/80"></div>
                <div class="w-3 h-3 rounded-full bg-status-warning/80"></div>
                <div class="w-3 h-3 rounded-full bg-status-success/80"></div>
              </div>
              <span class="font-code-sm text-code-sm text-text-muted flex items-center gap-1">
                <span class="material-symbols-outlined text-[14px]">terminal</span> clidoc-shell — zsh
              </span>
              <button
                class="flex items-center gap-1 text-text-muted hover:text-accent-orange-bright font-code-sm text-code-sm transition-colors cursor-pointer"
                id="heroCopyBtn"
                aria-label="Copiar comando de geração" aria-live="polite"
                data-copy="clidoc generate ./meu-projeto">
                <span class="material-symbols-outlined text-[14px]">content_copy</span>
                <span data-copy-label>Copiar</span>
              </button>
            </div>
            <!-- Terminal Body -->
            <div class="p-space-lg font-code-md text-code-md space-y-space-sm text-on-surface select-all">
              <div class="flex items-center gap-2">
                <span class="text-accent-orange-bright select-none">$</span>
                <span class="text-text-primary"># Baixe o binário na página Releases e adicione ao PATH</span>
              </div>
              <div class="flex items-center gap-2 pt-1">
                <span class="text-accent-orange-bright select-none">$</span>
                <span class="text-text-primary">clidoc generate ./meu-projeto</span>
              </div>
              <div class="text-status-success font-code-sm flex items-center gap-1.5 pl-4">
                <span class="material-symbols-outlined text-[16px]">check_circle</span> Anotações analisadas via AST
              </div>
              <div class="text-status-success font-code-sm flex items-center gap-1.5 pl-4">
                <span class="material-symbols-outlined text-[16px]">check_circle</span> openapi.json gerado (OpenAPI 3.0)
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- QUICK START / DOWNLOAD SECTION -->
      <section class="w-full bg-surface-raised border-y border-border-subtle py-space-2xl">
        <div class="max-w-[1240px] mx-auto px-margin">
          <div class="text-center max-w-xl mx-auto mb-space-xl">
            <span
              class="font-code-sm text-code-sm uppercase tracking-widest text-accent-orange-bright bg-surface-overlay px-space-sm py-1 rounded">Quick
              Start</span>
            <h2 class="font-headline-lg text-headline-lg text-text-primary mt-space-sm">Três passos para a documentação
            </h2>
            <p class="font-body-md text-body-md text-text-secondary mt-1">Binário único compilado em Go. Sem Node, sem
              Python, sem containers.</p>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-space-lg">
            <!-- Step 1 -->
            <div
              class="bg-surface-deep border border-border-subtle rounded-xl p-space-lg relative flex flex-col justify-between hover:border-accent-orange-bright/40 transition-all">
              <div>
                <div class="flex items-center justify-between mb-space-md">
                  <span
                    class="font-code-sm text-code-sm px-2 py-0.5 rounded bg-surface-overlay text-accent-orange-bright">01</span>
                  <span class="material-symbols-outlined text-text-muted">download_for_offline</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-text-primary mb-space-xs">Baixar Binário</h3>
                <p class="font-body-sm text-body-sm text-text-secondary">
                  Acesse a página de Releases oficiais no GitHub e escolha a versão para macOS, Linux ou Windows (AMD64
                  / ARM64).
                </p>
              </div>
              <div class="mt-space-md pt-space-md border-t border-border-subtle">
                <a class="inline-flex items-center gap-1 font-code-sm text-code-sm text-accent-orange-bright hover:underline"
                  href="https://github.com/lukasalmeida/clidoc/releases" rel="noopener noreferrer" target="_blank">
                  Ir para Releases GitHub <span class="material-symbols-outlined text-[14px]">arrow_outward</span>
                </a>
              </div>
            </div>
            <!-- Step 2 -->
            <div
              class="bg-surface-deep border border-border-subtle rounded-xl p-space-lg relative flex flex-col justify-between hover:border-accent-orange-bright/40 transition-all">
              <div>
                <div class="flex items-center justify-between mb-space-md">
                  <span
                    class="font-code-sm text-code-sm px-2 py-0.5 rounded bg-surface-overlay text-accent-orange-bright">02</span>
                  <span class="material-symbols-outlined text-text-muted">folder_zip</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-text-primary mb-space-xs">Adicionar ao PATH</h3>
                <p class="font-body-sm text-body-sm text-text-secondary">
                  Mova o executável compilado diretamente para o seu diretório global de binários para acessá-lo em
                  qualquer terminal.
                </p>
              </div>
              <div class="mt-space-md pt-space-md border-t border-border-subtle">
                <code
                  class="block font-code-sm text-code-sm bg-surface-base px-2 py-1.5 rounded text-text-primary border border-border-subtle">mv clidoc /usr/local/bin/</code>
              </div>
            </div>
            <!-- Step 3 -->
            <div
              class="bg-surface-deep border border-border-subtle rounded-xl p-space-lg relative flex flex-col justify-between hover:border-accent-orange-bright/40 transition-all">
              <div>
                <div class="flex items-center justify-between mb-space-md">
                  <span
                    class="font-code-sm text-code-sm px-2 py-0.5 rounded bg-surface-overlay text-accent-orange-bright">03</span>
                  <span class="material-symbols-outlined text-text-muted">play_arrow</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-text-primary mb-space-xs">Rodar no Projeto</h3>
                <p class="font-body-sm text-body-sm text-text-secondary">
                  Navegue até o diretório do seu código e dispare a análise AST. Em milissegundos sua especificação
                  OpenAPI estará pronta.
                </p>
              </div>
              <div class="mt-space-md pt-space-md border-t border-border-subtle">
                <code
                  class="block font-code-sm text-code-sm bg-surface-base px-2 py-1.5 rounded text-text-primary border border-border-subtle">clidoc generate ./src</code>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- O PROBLEMA (Copy de Vendas) -->
      <section class="w-full bg-surface-base py-space-3xl" id="problema">
        <div class="max-w-[1240px] mx-auto px-margin">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-center">
            <div class="lg:col-span-5">
              <span
                class="font-code-sm text-code-sm uppercase tracking-widest text-status-warning bg-surface-raised px-space-sm py-1 rounded">A
                Realidade das APIs</span>
              <h2 class="font-headline-lg text-headline-lg text-text-primary mt-space-sm leading-tight">
                Documentação de API sempre foi tarefa de "depois".
              </h2>
              <p class="font-body-lg text-body-lg text-text-secondary mt-space-md leading-relaxed">
                Adiada sprint após sprint, negligenciada em code reviews e, no fim do dia, quase sempre mentirosa.
                Documentação desatualizada é muito pior que nenhuma: gera falsa sensação de segurança e quebra
                integrações em produção.
              </p>
              <div class="mt-space-lg flex items-center gap-space-md text-status-error font-code-sm text-code-sm">
                <span class="material-symbols-outlined">warning</span>
                <span>YAMLs manuais envelhecem e mentem. O código não mente.</span>
              </div>
            </div>
            <div class="lg:col-span-7 space-y-space-md">
              <!-- Problem card 1 -->
              <div
                class="bg-surface-raised border border-border-subtle rounded-xl p-space-lg hover:border-status-error/40 transition-all flex gap-space-md">
                <div
                  class="w-10 h-10 rounded-lg bg-surface-deep flex items-center justify-center shrink-0 text-status-error border border-border-subtle">
                  <span class="material-symbols-outlined">sync_disabled</span>
                </div>
                <div>
                  <h4 class="font-headline-sm text-title-md text-text-primary mb-1">YAMLs e JSONs manuais desatualizados
                  </h4>
                  <p class="font-body-sm text-body-sm text-text-secondary">
                    Manter um arquivo Swagger de 2.000 linhas separado do código é um convite a erros. Alguém renomeia
                    um campo na struct e esquece de atualizar a documentação.
                  </p>
                </div>
              </div>
              <!-- Problem card 2 (Solution) -->
              <div
                class="bg-surface-raised border border-border-subtle rounded-xl p-space-lg hover:border-status-success/40 transition-all flex gap-space-md">
                <div
                  class="w-10 h-10 rounded-lg bg-surface-deep flex items-center justify-center shrink-0 text-status-success border border-border-subtle">
                  <span class="material-symbols-outlined">code_blocks</span>
                </div>
                <div>
                  <h4 class="font-headline-sm text-title-md text-text-primary mb-1">O código como a Única Fonte da
                    Verdade</h4>
                  <p class="font-body-sm text-body-sm text-text-secondary">
                    O CliDoc inverte essa lógica. A rota é documentada logo acima da função handler onde você já passa o
                    dia trabalhando. O arquivo OpenAPI é apenas um artefato derivado da compilação.
                  </p>
                </div>
              </div>
              <!-- Problem card 3 (Tech edge) -->
              <div
                class="bg-surface-raised border border-border-subtle rounded-xl p-space-lg hover:border-accent-orange-bright/40 transition-all flex gap-space-md">
                <div
                  class="w-10 h-10 rounded-lg bg-surface-deep flex items-center justify-center shrink-0 text-accent-orange-bright border border-border-subtle">
                  <span class="material-symbols-outlined">bolt</span>
                </div>
                <div>
                  <h4 class="font-headline-sm text-title-md text-text-primary mb-1">Zero Reflection • Zero Execução em
                    Runtime</h4>
                  <p class="font-body-sm text-body-sm text-text-secondary">
                    O CliDoc nunca inicializa o seu servidor nem executa código de aplicação. Ele analisa estritamente a
                    árvore sintática (AST) e blocos de comentários, garantindo segurança e execução instantânea.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- PIPELINE LINEAR (Como Funciona) -->
      <section class="w-full bg-surface-raised border-y border-border-subtle py-space-3xl" id="pipeline">
        <div class="max-w-[1240px] mx-auto px-margin">
          <div class="text-center max-w-2xl mx-auto mb-space-2xl">
            <span
              class="font-code-sm text-code-sm uppercase tracking-widest text-accent-orange-bright bg-surface-overlay px-space-sm py-1 rounded">Arquitetura
              de Engine</span>
            <h2 class="font-headline-lg text-headline-lg text-text-primary mt-space-sm">Pipeline Linear em 5 Camadas
            </h2>
            <p class="font-body-md text-body-md text-text-secondary mt-1">Da AST do código até o arquivo final OpenAPI
              em milissegundos.</p>
          </div>
          <!-- Pipeline Diagram Visual Cards -->
          <div class="grid grid-cols-1 md:grid-cols-5 gap-space-sm relative mb-space-2xl">
            <!-- Step 1 -->
            <div
              class="bg-surface-deep border border-border-subtle rounded-lg p-space-md flex flex-col justify-between">
              <div>
                <div
                  class="w-7 h-7 rounded bg-surface-overlay flex items-center justify-center font-code-sm text-code-sm text-accent-orange-bright mb-space-sm">
                  1</div>
                <h4 class="font-headline-sm text-title-md text-text-primary mb-1">CLI Core</h4>
                <p class="font-body-sm text-body-sm text-text-secondary">Carrega flags, valida paths e interpreta
                  configurações opcionais em <code class="font-code-sm text-accent-orange-bright">clidoc.yaml</code>.
                </p>
              </div>
              <span class="mt-space-md font-code-sm text-code-sm text-text-muted">Engine Flag Loader</span>
            </div>
            <!-- Step 2 -->
            <div
              class="bg-surface-deep border border-border-subtle rounded-lg p-space-md flex flex-col justify-between">
              <div>
                <div
                  class="w-7 h-7 rounded bg-surface-overlay flex items-center justify-center font-code-sm text-code-sm text-accent-orange-bright mb-space-sm">
                  2</div>
                <h4 class="font-headline-sm text-title-md text-text-primary mb-1">AST Parsers</h4>
                <p class="font-body-sm text-body-sm text-text-secondary">Lê tokens e comentários via parser sintático
                  oficial de Go, extraindo anotações sem invocar o runtime.</p>
              </div>
              <span class="mt-space-md font-code-sm text-code-sm text-text-muted">Static AST Walk</span>
            </div>
            <!-- Step 3 (Core highlight) -->
            <div
              class="bg-surface-overlay border border-accent-orange-bright/40 rounded-lg p-space-md flex flex-col justify-between shadow-[0_0_20px_rgba(249,115,22,0.1)]">
              <div>
                <div
                  class="w-7 h-7 rounded bg-primary-container text-on-primary-container flex items-center justify-center font-code-sm text-code-sm font-bold mb-space-sm">
                  3</div>
                <h4 class="font-headline-sm text-title-md text-text-primary mb-1">IR Neutra</h4>
                <p class="font-body-sm text-body-sm text-text-secondary">Representação intermediária que abstrai rotas,
                  payloads e status, desacoplando linguagens de geradores.</p>
              </div>
              <span class="mt-space-md font-code-sm text-code-sm text-accent-orange-bright font-bold">Coração
                Plugável</span>
            </div>
            <!-- Step 4 -->
            <div
              class="bg-surface-deep border border-border-subtle rounded-lg p-space-md flex flex-col justify-between">
              <div>
                <div
                  class="w-7 h-7 rounded bg-surface-overlay flex items-center justify-center font-code-sm text-code-sm text-accent-orange-bright mb-space-sm">
                  4</div>
                <h4 class="font-headline-sm text-title-md text-text-primary mb-1">Generators</h4>
                <p class="font-body-sm text-body-sm text-text-secondary">Compila a IR em especificações OpenAPI 3.0
                  (JSON).</p>
              </div>
              <span class="mt-space-md font-code-sm text-code-sm text-text-muted">OpenAPI 3.0 • JSON</span>
            </div>
            <!-- Step 5 -->
            <div
              class="bg-surface-deep border border-border-subtle rounded-lg p-space-md flex flex-col justify-between">
              <div>
                <div
                  class="w-7 h-7 rounded bg-surface-overlay flex items-center justify-center font-code-sm text-code-sm text-accent-orange-bright mb-space-sm">
                  5</div>
                <h4 class="font-headline-sm text-title-md text-text-primary mb-1">Server & UI</h4>
                <p class="font-body-sm text-body-sm text-text-secondary">Servidor HTTP interno que monta o Swagger UI /
                  Redoc interativo com hot-reload a cada alteração de arquivo.</p>
              </div>
              <span class="mt-space-md font-code-sm text-code-sm text-text-muted">Live Preview</span>
            </div>
          </div>
          <!-- Linear visual schematic bar -->
          <div
            class="hidden lg:flex items-center justify-between p-space-md bg-surface-deep rounded-lg border border-border-subtle font-code-sm text-code-sm text-text-secondary">
            <span class="text-text-primary flex items-center gap-1"><span
                class="w-2 h-2 rounded-full bg-accent-orange-bright"></span> Código-Fonte (.go)</span>
            <span class="text-text-muted font-bold">──▶</span>
            <span>AST & Comment Parser</span>
            <span class="text-text-muted font-bold">──▶</span>
            <span class="text-accent-orange-bright font-medium">IR Abstraction</span>
            <span class="text-text-muted font-bold">──▶</span>
            <span>OpenAPI / MD Generators</span>
            <span class="text-text-muted font-bold">──▶</span>
            <span class="text-status-success flex items-center gap-1"><span
                class="w-2 h-2 rounded-full bg-status-success"></span> openapi.json & UI</span>
          </div>
        </div>
      </section>
      <!-- PADRÃO DE ANOTAÇÕES & CODE SHOWCASE -->
      <section class="w-full bg-surface-base py-space-3xl" id="sintaxe">
        <div class="max-w-[1240px] mx-auto px-margin">
          <div class="flex flex-col md:flex-row md:items-end justify-between mb-space-2xl gap-space-md">
            <div>
              <span
                class="font-code-sm text-code-sm uppercase tracking-widest text-accent-orange-bright bg-surface-raised px-space-sm py-1 rounded">Sintaxe
                Padrão</span>
              <h2 class="font-headline-lg text-headline-lg text-text-primary mt-space-sm">Familiar para devs, legível
                para máquinas</h2>
            </div>
            <p class="font-body-md text-body-md text-text-secondary max-w-md">
              Se você já viu anotações Swagger/Go-Swagger, está em casa. A sintaxe é simples, intuitiva e não polui seus
              arquivos.
            </p>
          </div>
          <!-- Split Screen: Annotated Code vs Generated OpenAPI Preview -->
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-space-lg">
            <!-- Left: Go Code -->
            <div class="bg-surface-deep rounded-xl border border-border-subtle overflow-hidden flex flex-col shadow-xl">
              <div
                class="px-space-md py-space-sm bg-surface-base border-b border-border-subtle flex items-center justify-between">
                <div class="flex items-center gap-2">
                  <span class="font-code-sm text-code-sm text-accent-orange-bright font-bold">handlers/user.go</span>
                </div>
                <span class="font-code-sm text-code-sm text-text-muted">Anotações CliDoc</span>
              </div>
              <div class="p-space-lg font-code-sm text-code-sm overflow-x-auto leading-relaxed bg-surface-deep">
                <span class="text-text-muted">// CreateUser lida com o registro de novas contas</span><br />
                <span class="text-accent-orange-bright font-semibold">// @Summary Criar Novo Usuário</span><br />
                <span class="text-accent-orange-bright font-semibold">// @Description Cadastra um novo usuário no
                  sistema</span><br />
                <span class="text-accent-orange-bright font-semibold">// @Route POST /api/v1/users</span><br />
                <span class="text-accent-orange-bright font-semibold">// @Tag Usuários</span><br />
                <span class="text-accent-orange-bright font-semibold">// @Param body json UserRequest true "Dados do
                  usuário"</span><br />
                <span class="text-accent-orange-bright font-semibold">// @Success 201 json UserResponse "Usuário criado
                  com sucesso"</span><br />
                <span class="text-accent-orange-bright font-semibold">// @Failure 400 json ErrorResponse "Dados
                  inválidos"</span><br />
                <span class="text-secondary">func</span> <span class="text-status-warning">CreateUser</span>(w
                http.ResponseWriter, r *http.Request) {<br />
                  <span class="text-text-muted">// Sua lógica de negócio real aqui...</span><br />
                  var req UserRequest<br />
                  json.NewDecoder(r.Body).Decode(&req)<br />
                  <span class="text-text-muted">// Retorna status 201 Created</span><br />
                  w.WriteHeader(http.StatusCreated)<br />
                }
              </div>
            </div>
            <!-- Right: OpenAPI Generated JSON / Swagger Preview -->
            <div class="bg-surface-deep rounded-xl border border-border-subtle overflow-hidden flex flex-col shadow-xl">
              <div
                class="px-space-md py-space-sm bg-surface-base border-b border-border-subtle flex items-center justify-between">
                <div class="flex items-center gap-2">
                  <span class="w-2 h-2 rounded-full bg-status-success"></span>
                  <span class="font-code-sm text-code-sm text-status-success font-bold">dist/openapi.json (OpenAPI
                    3.0)</span>
                </div>
                <span class="font-code-sm text-code-sm text-text-muted">Exemplo de saída</span>
              </div>
              <div
                class="p-space-lg font-code-sm text-code-sm overflow-x-auto leading-relaxed bg-surface-deep text-text-secondary">
                {<br />
                  <span class="text-status-info">"openapi"</span>: <span
                  class="text-status-success">"3.0.3"</span>,<br />
                  <span class="text-status-info">"paths"</span>: {<br />
                    <span class="text-status-info">"/api/v1/users"</span>: {<br />
                      <span class="text-accent-orange-bright">"post"</span>: {<br />
                        <span class="text-status-info">"summary"</span>: <span class="text-on-surface">"Criar Novo
                  Usuário"</span>,<br />
                        <span class="text-status-info">"tags"</span>: [<span
                  class="text-on-surface">"Usuários"</span>],<br />
                        <span class="text-status-info">"responses"</span>: {<br />
                          <span class="text-accent-orange-bright">"201"</span>: {<br />
                            <span class="text-status-info">"description"</span>: <span class="text-on-surface">"Usuário
                  criado com sucesso"</span><br />
                          },<br />
                          <span class="text-status-error">"400"</span>: {<br />
                            <span class="text-status-info">"description"</span>: <span class="text-on-surface">"Dados
                  inválidos"</span><br />
                          }<br />
                        }<br />
                      }<br />
                    }<br />
                  }<br />
                }
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- FEATURES & COMANDOS DA CLI -->
      <section class="w-full bg-surface-raised border-y border-border-subtle py-space-3xl" id="features">
        <div class="max-w-[1240px] mx-auto px-margin">
          <div class="text-center max-w-xl mx-auto mb-space-2xl">
            <span
              class="font-code-sm text-code-sm uppercase tracking-widest text-accent-orange-bright bg-surface-overlay px-space-sm py-1 rounded">Arsenal
              de Produtividade</span>
            <h2 class="font-headline-lg text-headline-lg text-text-primary mt-space-sm">Comandos diretos, DX implacável
            </h2>
          </div>
          <!-- Commands Grid -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-space-lg mb-space-2xl">
            <!-- Command 1: Generate -->
            <div
              class="bg-surface-deep border border-border-subtle rounded-xl p-space-lg flex flex-col justify-between">
              <div>
                <div class="flex items-center justify-between mb-space-md">
                  <span
                    class="font-code-sm text-code-sm bg-status-success/10 text-status-success px-2 py-0.5 rounded border border-status-success/20">MVP
                    Disponível</span>
                  <span class="material-symbols-outlined text-text-muted">build</span>
                </div>
                <code
                  class="font-headline-sm text-headline-sm text-accent-orange-bright block mb-space-xs">clidoc generate</code>
                <p class="font-body-sm text-body-sm text-text-secondary mt-space-sm">
                  Varre o diretório do seu projeto via AST, compila a IR e gera o arquivo <code
                    class="font-code-sm text-text-primary">dist/openapi.json</code> em tempo recorde sem travar seu
                  terminal.
                </p>
              </div>
              <div
                class="mt-space-lg pt-space-md border-t border-border-subtle font-code-sm text-code-sm text-text-muted">
                Saída: <span class="text-text-primary">OpenAPI 3.0 (JSON)</span>
              </div>
            </div>
            <!-- Command 2: Init -->
            <div
              class="bg-surface-deep border border-border-subtle rounded-xl p-space-lg flex flex-col justify-between">
              <div>
                <div class="flex items-center justify-between mb-space-md">
                  <span
                    class="font-code-sm text-code-sm bg-status-success/10 text-status-success px-2 py-0.5 rounded border border-status-success/20">Disponível
                    nesta versão</span>
                  <span class="material-symbols-outlined text-text-muted">tune</span>
                </div>
                <code class="font-headline-sm text-headline-sm text-text-primary block mb-space-xs">clidoc init</code>
                <p class="font-body-sm text-body-sm text-text-secondary mt-space-sm">
                  Cria interativamente um arquivo de configuração <code
                    class="font-code-sm text-text-primary">clidoc.yaml</code> contendo metadados gerais da API,
                  servidores, licença e filtros de exclusão.
                </p>
              </div>
              <div
                class="mt-space-lg pt-space-md border-t border-border-subtle font-code-sm text-code-sm text-text-muted">
                Config: <span class="text-text-primary">Info, Servers, Tags, IgnoredDirs</span>
              </div>
            </div>
            <!-- Command 3: Serve -->
            <div
              class="bg-surface-deep border border-border-subtle rounded-xl p-space-lg flex flex-col justify-between">
              <div>
                <div class="flex items-center justify-between mb-space-md">
                  <span
                    class="font-code-sm text-code-sm bg-status-success/10 text-status-success px-2 py-0.5 rounded border border-status-success/20">Disponível
                    nesta versão</span>
                  <span class="material-symbols-outlined text-text-muted">public</span>
                </div>
                <code class="font-headline-sm text-headline-sm text-text-primary block mb-space-xs">clidoc serve</code>
                <p class="font-body-sm text-body-sm text-text-secondary mt-space-sm">
                  Inicia um servidor local embutido fornecendo uma interface Swagger UI ou Redoc com Hot Reload
                  automático sempre que um arquivo for salvo.
                </p>
              </div>
              <div
                class="mt-space-lg pt-space-md border-t border-border-subtle font-code-sm text-code-sm text-text-muted">
                <span class="text-text-primary">Servidor local • Swagger UI • Hot Reload</span>
              </div>
            </div>
          </div>
          <!-- Feature Highlights Strip -->
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-space-md">
            <div class="bg-surface-deep p-space-md rounded-lg border border-border-subtle">
              <div class="text-accent-orange-bright font-headline-sm mb-1 flex items-center gap-1">
                <span class="material-symbols-outlined text-[18px]">memory</span> Binário Estático
              </div>
              <p class="font-body-sm text-body-sm text-text-secondary">Zero runtime, zero dependências externas. Só
                baixar e rodar em qualquer máquina.</p>
            </div>
            <div class="bg-surface-deep p-space-md rounded-lg border border-border-subtle">
              <div class="text-accent-orange-bright font-headline-sm mb-1 flex items-center gap-1">
                <span class="material-symbols-outlined text-[18px]">device_hub</span> IR Neutra
              </div>
              <p class="font-body-sm text-body-sm text-text-secondary">Arquitetura agnóstica preparada para receber
                novos parsers de linguagem sem tocar nos exportadores.</p>
            </div>
            <div class="bg-surface-deep p-space-md rounded-lg border border-border-subtle">
              <div class="text-accent-orange-bright font-headline-sm mb-1 flex items-center gap-1">
                <span class="material-symbols-outlined text-[18px]">description</span> OpenAPI 3.0
              </div>
              <p class="font-body-sm text-body-sm text-text-secondary">Gere especificações OpenAPI 3.0 em JSON para
                ferramentas compatíveis.</p>
            </div>
            <div class="bg-surface-deep p-space-md rounded-lg border border-border-subtle">
              <div class="text-accent-orange-bright font-headline-sm mb-1 flex items-center gap-1">
                <span class="material-symbols-outlined text-[18px]">verified</span> CI/CD Friendly
              </div>
              <p class="font-body-sm text-body-sm text-text-secondary">Inclua a geração da documentação no pipeline de
                CI para mantê-la junto ao código.</p>
            </div>
          </div>
        </div>
      </section>
      <!-- CTA DE CONTRIBUIÇÃO (Open Source) -->
      <section class="w-full bg-surface-raised border-t border-border-subtle py-space-3xl relative overflow-hidden"
        id="contribua">
        <!-- Subtle amber glow -->
        <div
          class="absolute bottom-0 right-1/4 w-[400px] h-[250px] bg-primary-container/10 blur-[100px] rounded-full pointer-events-none">
        </div>
        <div class="max-w-[1240px] mx-auto px-margin relative z-10">
          <div
            class="bg-surface-deep border border-border-subtle rounded-2xl p-space-xl lg:p-space-2xl flex flex-col lg:flex-row items-center justify-between gap-space-xl">
            <div class="max-w-2xl">
              <div
                class="inline-flex items-center gap-space-xs px-2.5 py-1 rounded-md bg-surface-overlay border border-border-subtle text-accent-orange-bright font-code-sm text-code-sm mb-space-md">
                <span class="material-symbols-outlined text-[16px]">favorite</span> Feito por devs, para devs
              </div>
              <h2 class="font-headline-lg text-headline-lg text-text-primary mb-space-sm">
                Contribua com o futuro da CLI.
              </h2>
              <p class="font-body-lg text-body-lg text-text-secondary mb-space-md leading-relaxed">
                O CliDoc é 100% gratuito e open source sob licença Apache 2.0. Quer implementar parsers para novas linguagens,
                adicionar validação de rotas ou otimizar nossa AST? O repositório está aberto para PRs.
              </p>
              <div class="flex flex-wrap items-center gap-2 font-code-sm text-code-sm text-text-muted">
                <span class="px-2 py-1 rounded bg-surface-base border border-border-subtle text-text-secondary">good
                  first issue</span>
                <span
                  class="px-2 py-1 rounded bg-surface-base border border-border-subtle text-text-secondary">python-parser</span>
                <span
                  class="px-2 py-1 rounded bg-surface-base border border-border-subtle text-text-secondary">hot-reload-server</span>
                <span
                  class="px-2 py-1 rounded bg-surface-base border border-border-subtle text-text-secondary">markdown-generator</span>
              </div>
            </div>
            <div class="flex flex-col sm:flex-row lg:flex-col gap-space-md w-full lg:w-auto shrink-0">
              <a class="inline-flex items-center justify-center gap-space-xs px-space-xl py-3 rounded-lg bg-text-primary text-surface-deep font-headline-sm text-label-md hover:bg-white transition-all shadow-md"
                href="https://github.com/lukasalmeida/clidoc" rel="noopener noreferrer" target="_blank">
                <span class="material-symbols-outlined text-[18px]">terminal</span>
                <span>Acessar Repositório</span>
              </a>
              <a class="inline-flex items-center justify-center gap-space-xs px-space-xl py-3 rounded-lg bg-surface-overlay border border-border-subtle text-text-primary font-headline-sm text-label-md hover:border-accent-orange-bright transition-all"
                href="https://github.com/lukasalmeida/clidoc/issues" rel="noopener noreferrer" target="_blank">
                <span class="material-symbols-outlined text-[18px]">bug_report</span>
                <span>Ver Issues Abertas</span>
              </a>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  <footer class="w-full bg-surface-deep">
    <div class="max-w-[1240px] mx-auto px-margin py-space-2xl">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-space-xl mb-space-xl">
        <div class="md:col-span-1">
          <div class="flex items-center gap-space-sm mb-space-sm"><img alt="CliDoc Logo"
              class="h-7 w-auto object-contain"
              src="{{ asset('images/icon.png') }}" /><span
              class="font-headline-sm text-headline-sm text-text-primary">CliDoc</span></div>
          <p class="font-body-sm text-body-sm text-text-secondary leading-relaxed mb-space-md">Gerador de documentação
            OpenAPI/Swagger ultrarrápido em Go a partir de anotações e comentários no código-fonte.</p>
          <div class="flex items-center gap-space-xs font-code-sm text-code-sm text-text-muted"><span
              class="w-2 h-2 rounded-full bg-status-success inline-block"></span>Engine CLI pronta para CI/CD</div>
        </div>
        <div>
          <h4 class="font-label-md text-label-md uppercase tracking-wider text-text-muted mb-space-md">Ecossistema</h4>
          <ul class="space-y-space-sm font-body-sm text-body-sm">
            <li><a class="text-on-surface-variant hover:text-on-surface transition-colors"
                href="https://github.com/lukasalmeida/clidoc/releases">GitHub Releases</a></li>
            <li><a class="text-on-surface-variant hover:text-on-surface transition-colors" data-path="sintaxe"
                href="#sintaxe">Especificação de Tags</a></li>
            <li><a class="text-on-surface-variant hover:text-on-surface transition-colors" data-path="pipeline"
                href="#pipeline">Pipeline de Geração</a></li>
            <li><a class="text-on-surface-variant hover:text-on-surface transition-colors"
                href="https://github.com/lukasalmeida/clidoc/blob/main/LICENSE">Licença Apache 2.0</a></li>
          </ul>
        </div>
        <div>
          <h4 class="font-label-md text-label-md uppercase tracking-wider text-text-muted mb-space-md">Comunidade</h4>
          <ul class="space-y-space-sm font-body-sm text-body-sm">
            <li><a class="text-on-surface-variant hover:text-on-surface transition-colors"
                href="https://github.com/lukasalmeida/clidoc">Repositório GitHub</a></li>
            <li><a class="text-on-surface-variant hover:text-on-surface transition-colors" href="https://substack.com"
                rel="noopener noreferrer" target="_blank">Substack Técnico</a></li>
            <li><a class="text-on-surface-variant hover:text-on-surface transition-colors"
                href="https://github.com/lukasalmeida/clidoc/issues">Reportar Issue</a></li>
          </ul>
        </div>
        <div>
          <h4 class="font-label-md text-label-md uppercase tracking-wider text-text-muted mb-space-md">Instalação Rápida
          </h4>
          <div
            class="p-space-sm rounded bg-surface-base font-code-sm text-code-sm text-text-secondary select-all mb-space-sm">
            clidoc generate ./meu-projeto</div>
          <p class="font-code-sm text-code-sm text-text-muted">Baixe nas Releases e adicione o binário ao PATH.</p>
        </div>
      </div>
      <div
        class="pt-space-lg flex flex-col sm:flex-row items-center justify-between gap-space-md font-body-sm text-body-sm text-text-muted">
        <p>© {{ date('Y') }} CliDoc CLI. Open source sob licença Apache 2.0. Criado por <a
            class="text-primary hover:text-accent-orange-bright transition-colors"
            href="https://github.com/lukasalmeida">Lukas Almeida</a>.</p>
        <div class="flex items-center gap-space-lg font-code-sm text-code-sm"><span>Go Toolchain</span><span>OpenAPI
            3.0</span><span>Zero Overhead</span></div>
      </div>
    </div>
  </footer>
</body>

</html>