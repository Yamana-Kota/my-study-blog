<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Symfony\Component\HttpFoundation\Response;
use App\Usecases\Blog\EditUsecase;
use App\Http\Responders\Blog\EditResponder;

class EditAction extends Controller
{

    public function __construct(
        private EditUsecase $usecase,
        private EditResponder $responder
    )
    {
    }

    public function __invoke(Blog $blog): Response
    {
        return $this->responder->handle($this->usecase->run($blog));
    }
}
