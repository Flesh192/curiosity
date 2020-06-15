<?php

/**
 * @copyright Copyright (c) 2020
 * @author Vladymyr Drohovoz flesh192@gmail.com
 */

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Service\CategoryService;

/**
 * Class CategoriesController
 * @package App\Http\Controllers\API
 */
class CategoriesController extends Controller
{

    /**
     * Display a listing of the categories.
     * Just for example I show how to use this functions
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(CategoryService $categoryService)
    {
        $categories = $categoryService->getCategories();
        foreach ($categories as $category)
        {
            if ($category->hasSubcategories())
            {
                /** @var Category $subcategory */
                foreach ($category->getSubcategories() as $subcategory)
                {
                    var_dump($subcategory->getName());
                }
            }
        }
        return response()->json($categoryService->getCategories());
    }
}
