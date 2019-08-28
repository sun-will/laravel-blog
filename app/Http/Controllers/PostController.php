<?php

namespace App\Http\Controllers;

use App\Post;
use App\Library\Services\ImageService;
use App\Http\Requests\PostRequest;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * @var ImageService
     */
    private $imageService;

    /**
     * @param ImageService $ImageService
     */
    public function __construct(ImageService $ImageService)
    {
        $this->imageService = $ImageService;
    }
    /**
    *
    * Get all Post
    *
    * @return JsonResponse
    */
    public function all(): JsonResponse
    {
        $posts = Post::with('user', 'category')->orderBy('id', 'desc')->get();

        return response()->json(
            [
               'posts' => $posts
           ],
            200
        );
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function save(PostRequest $request)
    {
        $request->validated();

        // call image service save
        $this->imageService->save($request);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        // Service call delete
        $this->imageService->delete($id);
    }

    /**
    * @return JsonResponse
    */
    public function get($id): JsonResponse
    {
        $post = Post::find($id);

        return response()->json(
            [
                'post' => $post
           ],
            200
        );
    }

    /**
     * @param Request $request
     * @param $id
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(PostRequest $request, $id)
    {
        $request->validated();

        // call image service update
        $this->imageService->update($request, $id);
    }
}
