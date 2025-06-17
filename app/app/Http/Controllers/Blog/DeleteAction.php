<?php

namespace App\Http\Controllers\Blog;

use App\Http\Responders\Blog\DeleteResponder;
use App\Models\Blog;
use App\Usecases\Blog\DeleteUsecase;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

class DeleteAction extends Controller
{
    public function __construct(
        private DeleteUsecase $usecase,
        private DeleteResponder $responder)
    {
    }

    public function __invoke(Blog $blog): Response
    {
        return $this->responder->handle($this->usecase->run($blog));
    }
}
