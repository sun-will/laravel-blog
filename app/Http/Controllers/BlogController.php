<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BlogController extends Controller
{
    /**
    *
    * Get all blog post
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
    *
    * Get blog post by id
    *
    * @return JsonResponse
    */
    public function postById($id): JsonResponse
    {
        $post = Post::with('user', 'category')->where('id', $id)->first();
        
        return response()->json(
            [
                'post' => $post
            ],
            200
        );
    }

    /**
    *
    * Get all category
    *
    * @return JsonResponse
    */
    public function allCategory(): JsonResponse
    {
        $categories = Category::all();
        
        return response()->json(
            [
                'categories' => $categories
            ],
            200
        );
    }
    
    /**
    *
    * Get all post by category id
    *
    * @return JsonResponse
    */
    public function allPostByCatId($id): JsonResponse
    {
        $posts = Post::with('user', 'category')
            ->where('cat_id', $id)
            ->orderBy('id', 'desc')
            ->get();
     
        return response()->json(
            [
                'posts' => $posts
            ],
            200
        );
    }

    /**
    *
    * Search the title/description
    *
    * @return JsonResponse
    */
    public function search(): JsonResponse
    {
        $search = \Request::get('s');

        if ($search!=null) {
            $posts = Post::with('user', 'category')
                ->where('title', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%")
                ->get();

            return response()->json(
                [
                    'posts'=>$posts
                ],
                200
            );
        } else {
            return $this->getAllBlog();
        }
    }

    /**
    *
    * Get the latest post
    *
    * @return JsonResponse
    */
    public function latest(): JsonResponse
    {
        $posts = Post::with('user', 'category')
            ->orderBy('id', 'desc')->get();
        
        return response()->json(
            [
                'posts'=>$posts
            ],
            200
        );
    }
}
