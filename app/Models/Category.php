<?php

/**
 * @copyright Copyright (c) 2020
 * @author Vladymyr Drohovoz flesh192@gmail.com
 */

namespace App\Models;

/**
 * Class Category
 * @package App\Models
 */
class Category
{
    private int $id;
    private string $name;
    private string $label;
    private string $imageLabel;
    private string $imageUrl;
    private string $headerUrl;
    private string $backgroundUrl;
    private string $subcategories;

    /**
     * Category constructor.
     * @param $id
     * @param $name
     * @param $label
     * @param $imageLabel
     * @param $imageUrl
     * @param $headerUrl
     * @param $backgroundUrl
     * @param $subcategories
     */
    public function __construct($id, $name, $label, $imageLabel, $imageUrl, $headerUrl, $backgroundUrl, $subcategories)
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->imageLabel = $imageLabel;
        $this->imageUrl = $imageUrl;
        $this->headerUrl = $headerUrl;
        $this->backgroundUrl = $backgroundUrl;
        $this->subcategories = $subcategories;
    }

    /**
     * @return mixed
     * @codecoverageignore
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     * @codecoverageignore
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     * @codecoverageignore
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return mixed
     * @codecoverageignore
     */
    public function getImageLabel()
    {
        return $this->imageLabel;
    }

    /**
     * @return mixed
     * @codecoverageignore
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @return mixed
     * @codecoverageignore
     */
    public function getHeaderUrl()
    {
        return $this->headerUrl;
    }

    /**
     * @return mixed
     * @codecoverageignore
     */
    public function getBackgroundUrl()
    {
        return $this->backgroundUrl;
    }

    /**
     * @return mixed
     * @codecoverageignore
     */
    public function getSubcategories()
    {
        return $this->subcategories;
    }

    /**
     * Return true if category has subcategories
     *
     * @return bool
     * @codecoverageignore
     */
    public function hasSubcategories()
    {
        return !empty($this->subcategories);
    }

}
