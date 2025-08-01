<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     */
    public function render($request, Throwable $exception)
    {
        $code = 500;
        $message = 'Terjadi kesalahan pada sistem.';
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
            $code = $exception->getStatusCode();
        }
        if ($code == 404) {
            $message = 'Halaman tidak ditemukan.';
        } elseif ($code == 403) {
            $message = 'Akses ditolak.';
        } elseif ($code == 419) {
            $message = 'Sesi Anda telah berakhir. Silakan login ulang.';
        } elseif ($code == 500) {
            $message = 'Terjadi kesalahan server.';
        } else {
            $message = $exception->getMessage() ?: $message;
        }
        return response()->view('errors.error', compact('code', 'message'), $code);
    }
}