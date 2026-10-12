<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_landing_page_is_served_in_brazilian_portuguese(): void
    {
        $this->withoutVite();

        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('lang="pt-BR"', false)
            ->assertSee('Documentação de API')
            ->assertSee('rel="icon" type="image/png" href="'.asset('images/icon.png').'"', false)
            ->assertSee('src="'.asset('images/icon.png').'"', false)
            ->assertSee('https://github.com/lukasalmeida/clidoc/releases')
            ->assertSee('clidoc generate ./meu-projeto')
            ->assertSee('"@context":"https://schema.org"', false)
            ->assertSee('clidoc init')
            ->assertSee('clidoc serve')
            ->assertSee('Disponível')
            ->assertDontSee('Roadmap de Desenvolvimento')
            ->assertDontSee('Fase 2 • Em Breve');

        $this->assertSame(3, substr_count($response->getContent(), 'Disponível'));
    }

    public function test_sitemap_lists_the_home_page(): void
    {
        $response = $this->get('/sitemap.xml');

        $response
            ->assertOk()
            ->assertHeader('content-type', 'application/xml; charset=UTF-8')
            ->assertSee('<loc>http://localhost:8000</loc>', false);
    }
}
