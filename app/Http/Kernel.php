<?php

namespace Muserpol\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \Muserpol\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \Muserpol\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Muserpol\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \Muserpol\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'administrador' => \Muserpol\Http\Middleware\AdminMiddleware::class,
        'ec_repeccion' => \Muserpol\Http\Middleware\EconomicComplementMiddleware\Recepcion::class,
        'ec_revision' => \Muserpol\Http\Middleware\EconomicComplementMiddleware\Revision::class,
        'ec_calificacion' => \Muserpol\Http\Middleware\EconomicComplementMiddleware\Calificacion::class,
        'ec_aprobacion' => \Muserpol\Http\Middleware\EconomicComplementMiddleware\Aprobacion::class,
        'ec_legal' => \Muserpol\Http\Middleware\EconomicComplementMiddleware\Aprobacion::class,
        'rf_recepccion' => \Muserpol\Http\Middleware\RetirementFundMiddleware\Recepcion::class,
        'rf_revision' => \Muserpol\Http\Middleware\RetirementFundMiddleware\Revision::class,
        'rf_aprobacion' => \Muserpol\Http\Middleware\RetirementFundMiddleware\Aprobacion::class,
        'rf_calificacion' => \Muserpol\Http\Middleware\RetirementFundMiddleware\Calificacion::class,
        'rf_legal' => \Muserpol\Http\Middleware\RetirementFundMiddleware\Legal::class,
        'rf_archivo' => \Muserpol\Http\Middleware\RetirementFundMiddleware\Archivo::class,

        'l_prestamo' => \Muserpol\Http\Middleware\LoanMiddleware\Prestamo::class,
        'j_juridica' => \Muserpol\Http\Middleware\JuridicalMiddleware\Juridica::class,

        'a_contabilidad' => \Muserpol\Http\Middleware\AccountancyMiddleware\Contabilidad::class,
        'b_presupuesto' => \Muserpol\Http\Middleware\BudgetMiddleware\Presupuesto::class,
        't_tesoreria' => \Muserpol\Http\Middleware\TreasuryMiddleware\Tesoreria::class,
    ];
}
