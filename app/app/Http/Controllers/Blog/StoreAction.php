<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Usecases\Blog\StoreUsecase;
use App\Http\Responders\Blog\StoreResponder;

class StoreAction extends Controller
{
    public function __construct(
        private StoreUsecase $usecase,
        private StoreResponder $responder)
    {
    }

    public function __invoke(StoreRequest $request): Response
    {
        return $this->responder->handle($this->usecase->run($request));
    }
}
