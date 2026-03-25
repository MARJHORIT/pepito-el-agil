protected $routeMiddleware = [
    // ... otros middlewares
    'auth' => \App\Http\Middleware\Authenticate::class,
    'checkRol' => \App\Http\Middleware\CheckRol::class, // ← Asegúrate que esté
];