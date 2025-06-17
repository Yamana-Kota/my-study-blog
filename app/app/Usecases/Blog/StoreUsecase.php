<?php

namespace App\Usecases\Blog;

use App\Usecases\Payload;
use App\Http\Requests\Blog\StoreRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class StoreUsecase
{
    public function run(StoreRequest $request): Payload
    {
        try {
            \DB::beginTransaction();


            $imageUrl = $this->uploadImage($request);
            $blog = new Blog();

            $blog->fill([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'img_url' => $imageUrl
            ]);

            $blog->save();

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error($e);

            return (new Payload())
                ->setStatus(Payload::FAILED);
        }

        return (new Payload())
            ->setStatus(Payload::SUCCEED);
    }

    private function uploadImage(StoreRequest $request): string
    {
        if ($request->file('image') === null) {
            return '';
        }

        $storage = Storage::disk('public');
        $path = $storage->putFile('/image', $request->file('image'));

        return $storage->url($path);
    }
}
