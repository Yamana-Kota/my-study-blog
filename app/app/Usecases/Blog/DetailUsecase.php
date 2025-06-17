<?php

namespace App\Usecases\Blog;

use App\Usecases\Payload;
use App\Models\Blog;

class DetailUsecase
{
    public function run(Blog $blog): Payload
    {
        return (new Payload())
            ->setStatus(Payload::SUCCEED)
            ->setOutput(compact('blog'));
    }
}
