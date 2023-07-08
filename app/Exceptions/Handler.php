<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            // return
        });

        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->wantsJson()) {
                return response()->json(['message' => 'Votre requête n\'a pas été comprise par le serveur, vérifiez que les données saisies correspondent à celles attendues par le serveur. Pour plus d\'informations, vous pouvez consulter la documentation de l\'api à elements.sebdev.ca'], 400)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
            }
        });
    }
}
