<?php

namespace App\Http\Controllers\Blog;

use App\Http\Requests\Blog\UpdateRequest;
use App\Http\Responders\Blog\UpdateResponder;
use App\Models\Blog;
use App\Usecases\Blog\UpdateUsecase;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;


class UpdateAction extends Controller
{
    public function __construct(
        private UpdateUsecase $usecase,
        private UpdateResponder $responder
    )
    {
    }

    public function __invoke(UpdateRequest $request, Blog $blog): Response
    {
        return $this->responder->handle($this->usecase->run($request, $blog));
    }
}
