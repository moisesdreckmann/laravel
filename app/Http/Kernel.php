<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     * These middleware run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // Bloqueia requisições enquanto o app estiver em modo de manutenção
        \Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance::class,
        
        // Limita o tamanho da requisição POST para evitar abusos
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        
        // Converte strings vazias para null
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            // Adiciona cookies enfileirados na resposta
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            
            // Inicializa a sessão
            \Illuminate\Session\Middleware\StartSession::class,
            
            // Compartilha os erros da sessão com as views
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            
            // Substitui as bindings nas rotas
            \Illuminate\Routing\Middleware\SubstituteBindings::class,

            \App\Http\Middleware\ForceJsonResponse::class, 
        ],

        'api' => [
            // Aplica throttle na API (limitação de requisições)
            'throttle:api',
            
            // Substitui as bindings nas rotas
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware aliases.
     * Esses middleware podem ser atribuídos às rotas usando seus nomes (aliases).
     *
     * @var array<string, class-string|string>
     */
    protected $middlewareAliases = [
        'force.json' => \App\Http\Middleware\ForceJsonResponse::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        
    ];
}
