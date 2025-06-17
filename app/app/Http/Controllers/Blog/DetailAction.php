<?php

namespace App\Http\Controllers\Blog;

use App\Http\Responders\Blog\DetailResponder;
use App\Models\Blog;
use App\Usecases\Blog\DetailUsecase;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;

class DetailAction extends Controller
{
    public function __construct(
        private DetailUsecase $usecase,
        private DetailResponder $responder
    )
    {
    }

    public function __invoke(Blog $blog): Response
    {
        return $this->responder->handle($this->usecase->run($blog));
    }
}
