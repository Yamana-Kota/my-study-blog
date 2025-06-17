<?php

namespace App\Usecases\Blog;

use App\Models\Blog;
use App\Usecases\Payload;


class CreateUsecase
{
    public function run(): Payload
    {
        $payload = new Payload();

        $payload->setStatus('success');

        return $payload;
    }
}
