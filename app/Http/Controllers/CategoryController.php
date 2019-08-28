<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
    * Save the category
    *
    * @return array
    */
    public function save(CategoryRequest $request): array
    {
        $requestValidated = $request->validated();
        $category = new Category();
        $category->cat_name = $requestValidated['cat_name'];
        $category->save();
    
        return ['message' => 'OK'];
    }

    /**
    * Get all the category
    *
    * @return JsonResponse
    */
    public function all(): JsonResponse
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
    * Delete a category
    */
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
    }

    /**
    *
    * Get category by id
    *
    * @return JsonResponse
    */
    public function get($id): JsonResponse
    {
        $category = Category::find($id);

        return response()->json(
            [
                'category'=>$category
            ],
            200
        );
    }

    /**
     * @param CategoryRequest $request
     * @param $id
     */
    public function update(CategoryRequest $request, $id)
    {
        $requestValidated = $request->validated();
        $category = Category::find($id);
        $category->cat_name = $requestValidated['cat_name'];
        $category->save();
    }

    /**
     * Select by mutiple ids and delete
     * @param $ids
     */
    public function selectIds($ids)
    {
        $allIds = explode(',', $ids);
    
        foreach ($allIds as $id) {
            $category = Category::find($id);
            $category->delete();
        }
    }
}
