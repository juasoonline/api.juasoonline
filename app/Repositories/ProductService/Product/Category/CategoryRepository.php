<?php

namespace App\Repositories\ProductService\Product\Category;

use App\Services\ProductService\Product\Category\CategoryService;

class CategoryRepository implements CategoryRepositoryInterface
{
    private $categoryService;

    /**
     * CategoryRepository constructor.
     * @param CategoryService $categoryService
     */
    public function __construct( CategoryService $categoryService )
    {
        $this -> categoryService = $categoryService;
    }

    /**
     * @return array|mixed
     */
    public function index() : array
    {
        return $this -> categoryService -> getAll();
    }

    /**
     * @param $theCategory
     * @return array|mixed
     */
    public function show( $theCategory ) : array
    {
        return $this -> categoryService -> getRequest( $theCategory );
    }
}
