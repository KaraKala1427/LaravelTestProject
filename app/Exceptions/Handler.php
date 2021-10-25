<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Throwable;
use Symfony\Component\Debug\ExceptionHandler as SymfonyExceptionHandler;
use App\Mail\ExceptionOccured;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Emails.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Throwable $e)
    {
        if ($this->shouldReport($e)) {
            $this->sendEmail($e); // sends an email
        }
        return parent::report($e);
    }
    /**
     * Sends an email to the developer about the exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function sendEmail(Exception $exception)
    {
        try {
            $e = FlattenException::create($exception);
            $handler = new ExceptionHandler();
            $html = $handler->getHtml($e);
            Mail::to('developer@gmail.com')->send(new ExceptionOccured($html));
        } catch (Exception $ex) {
            dd($ex);
        }
    }

}
