<?php

namespace App\Usecases\Blog;

use App\Usecases\Payload;
use App\Models\Blog;

class DeleteUsecase
{
    public function run(Blog $blog): Payload
    {
        try {
            \DB::beginTransaction();
            $blog->delete();

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();

            return (new Payload())
                ->setStatus(Payload::FAILED);
        }

        return (new Payload())
            ->setStatus(Payload::SUCCEED);
    }
}


