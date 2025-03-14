<?php

namespace App\Providers;

use App\Repositories\Interfaces\PaginaRepositoryInterface;
use App\Repositories\PaginaRepository;
use App\Services\Interfaces\PaginaServiceInterface;
use App\Services\PaginaService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Este array se puede ampliar manualmente a medida que creas nuevos repositorios
        $this->registerRepositories([
            'Pagina',
        ]);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    private function registerRepositories(array $repositories): void
    {
        $this->app->bind(
            PaginaRepositoryInterface::class,
            PaginaRepository::class
        );

        $this->app->bind(
            PaginaServiceInterface::class,
            PaginaService::class
        );
    }
}
