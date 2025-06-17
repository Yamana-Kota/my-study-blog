<?php

namespace App\Http\Responders\Blog;

use App\Usecases\Payload;
use Illuminate\Routing\ResponseFactory;
use Symfony\Component\HttpFoundation\Response;

class DeleteResponder
{
    public function __construct(
        private ResponseFactory $responseFactory
    )
    {
    }

    public function handle(Payload $payload): Response
    {
        if ($payload->getStatus() === Payload::FAILED) {
            return $this->responseFactory->redirectToRoute('blog.index')->with('failed_status', '削除に失敗しました。');
        }

        return $this->responseFactory->redirectToRoute('blog.index')->with('succeed_status', '削除が完了しました。');
    }
}
