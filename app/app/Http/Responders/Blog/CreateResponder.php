<?php

namespace App\Http\Responders\Blog;

use App\Usecases\Payload;
use Illuminate\Routing\ResponseFactory;
use Symfony\Component\HttpFoundation\Response;

class CreateResponder
{
    public function __construct(
        private ResponseFactory $responseFactory
    )
    {
    }

    public function handle(Payload $payload): Response
    {
        return $this->responseFactory->view('blog.create');
    }
}
