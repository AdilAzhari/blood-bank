<?php

use App\Http\Middleware\AlwaysAcceptJson;
use App\Http\Middleware\RedirectIfUnauthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            'always-accept-json' => AlwaysAcceptJson::class,
            'check-permission' => \App\Http\Middleware\CheckPermission::class,
            'auth:client' => \App\Http\Middleware\ClientAuthenticate::class,
            'AdminAuthIfUnauthenticated' => RedirectIfUnauthenticated::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (NotFoundHttpException $e, Request $request) {
            if ($request->wantsJson()) {
                return response()->json(['message' => 'Object not found'], 404);
            }
        });
    })->create();
