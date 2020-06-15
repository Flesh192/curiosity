<?php

/**
 * @copyright Copyright (c) 2020
 * @author Vladymyr Drohovoz flesh192@gmail.com
 */

namespace App\Service;


use App\Gateway\CuriositystreamCategoriesGateway;
use App\Models\Category;

/**
 * Class CategoryService
 * @package App\Service
 */
class CategoryService
{

    /**
     * @var CuriositystreamCategoriesGateway
     */
    private $curiosityCategories;

    /**
     * CategoryService constructor.
     * @param CuriositystreamCategoriesGateway $curiosityCategories
     */
    public function __construct(CuriositystreamCategoriesGateway $curiosityCategories)
    {
        $this->curiosityCategories = $curiosityCategories;
    }

    /**
     * @return Category[]
     */
    public function getCategories(): array
    {
        $categories = [];
        foreach ($this->curiosityCategories->getCategories()->data as $category)
        {
            $categories[] = $this->buildCategories($category);
        }
        return $categories;
    }


    /**
     * Recursively get list of categories
     *
     * @param \stdClass $cat
     * @return Category
     */
    private function buildCategories(\stdClass $cat): Category
    {
        $subcategories = [];
        if(property_exists($cat, 'subcategories')) {
            foreach ($cat->subcategories as $subcategory) {
                $subcategories[] = $this->buildCategories($subcategory);
            }
        }
        return new Category(
            $cat->id,
            $cat->name,
            $cat->label,
            $cat->image_label,
            $cat->image_url,
            $cat->header_url,
            $cat->background_url,
            $subcategories
        );
    }
}
