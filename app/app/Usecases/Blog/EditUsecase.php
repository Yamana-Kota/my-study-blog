<?php

namespace App\Usecases\Blog;

use App\Models\Blog;
use App\Usecases\Payload;

class EditUsecase
{
    public function run(Blog $blog): Payload
    {

        return(new Payload())
            ->setStatus(Payload::SUCCEED)
            ->setOutput(compact('blog'));
    }
}
