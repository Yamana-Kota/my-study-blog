<?php

namespace App\Http\Controllers\Blog;

use App\Http\Responders\Blog\IndexResponder;
use App\Usecases\Blog\IndexUsecase;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

class IndexAction extends Controller
{
    public function __construct(
        private IndexUsecase $usecase,
        private IndexResponder $responder
    )
    {
    }

    public function __invoke(Request $request): Response
    {
        return $this->responder->handle($this->usecase->run($request));
    }
}
