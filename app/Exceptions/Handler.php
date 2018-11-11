<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Auth;

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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        //----- my error handler-----------
        if($this->isHttpException($exception)) {
            $statusCode = $exception->getStatusCode();

            //dd($request->url());//"http://lte55.loc/admin/shareds1" несуществующ роут...
            //dd($request->path());//почти то что надо: "admin/erderw" или "ddfsfd"
            /*  Метод is() позволяет проверить, соответствует ли URI входящего запроса
                заданному шаблону. Можно использовать символ * при использовании метода:
                if ($request->is('admin/*')) {
                    //
                }
                Это выяснили откуда пришел неверный роут.
                Надо сделать по комбинации $statusCode(404,500...) и $request->path()
                (откуда пришел роут). Так как щас - и if() и switch() путано и некрасиво
                !!! как щас (получается) неавторизов дает роут /admin/werqwer и попадает
                в админку..., а с Auth::check() ломается вся вестка...
             */

            if ($request->is('admin/*') && $statusCode == '404') {
                $title = '404 Page';
                $template = 'admin.errors.404_content';

                return response()->view('admin.errors.404', [
                    'title' => $title, 'template' => $template
                ]);
            }

            switch($statusCode) {
                case '404' :
                    $active = [];
                    for($i=0; $i<=7; $i++) $active[$i] = false;
                    $active[4] = true;

                    $breadCrumb = '404 Page';
                    $template = 'site.errors.404_content';

                    return response()->view('site.errors.404', [
                        'active'=>$active, 'breadCrumb'=>$breadCrumb,'template' => $template
                    ]);
                break;
            }
        }
        //---------------------------------
        return parent::render($request, $exception);
    }
}
