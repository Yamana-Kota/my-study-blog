<?php

namespace App\Usecases\Blog;

use App\Usecases\Payload;
use App\Http\Requests\Blog\UpdateRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class UpdateUsecase
{
    public function run(UpdateRequest $request, Blog $blog): Payload
    {
        try {
            \DB::beginTransaction();

            $param = [
                'title' => $request->get('title'),
                'content' => $request->get('content'),
            ];

            if($request->has('image')){
                $param['img_url'] = $this->updateImage($request, $blog);
            }

            $blog->update($param);

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            return (new Payload())
                ->setStatus(Payload::FAILED);
        }
        return (new Payload())
            ->setStatus(Payload::SUCCEED);
    }

    private function updateImage(UpdateRequest $request, Blog $blog): ?string
    {
        $storage = Storage::disk('public');
        $storage->delete('/image/' . pathinfo($blog->img_url, PATHINFO_BASENAME));
        $imageUrl = $storage->putFile('/image', $request->file('image'));

        return $storage->url($imageUrl);
    }
}
