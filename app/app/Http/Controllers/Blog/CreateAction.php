<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Usecases\Blog\CreateUsecase;
use App\Http\Responders\Blog\CreateResponder;

class CreateAction extends Controller
{

    public function __construct(
        private CreateUsecase $usecase,
        private CreateResponder $responder
    )
    {
    }

    public function __invoke(): Response
    {
        return $this->responder->handle($this->usecase->run());
    }
}
