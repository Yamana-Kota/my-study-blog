<?php

namespace App\Usecases\Blog;

use App\Models\Blog;
use App\Usecases\Payload;

class IndexUsecase
{
    public function run(): Payload
    {
        $blogs = Blog::all();

        return(new Payload())
            ->setStatus(Payload::SUCCEED)
            ->setOutput(compact('blogs'));
    }
}
