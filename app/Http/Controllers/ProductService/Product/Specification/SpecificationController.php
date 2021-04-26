<?php

namespace App\Http\Controllers\ProductService\Product\Specification;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductService\Product\Specification\SpecificationRequest;
use App\Repositories\ProductService\Product\Specification\SpecificationRepositoryInterface;

class SpecificationController extends Controller
{
    private $theRepository;

    /**
     * SpecificationController constructor.
     * @param SpecificationRepositoryInterface $specificationRepository
     */
    public function __construct( SpecificationRepositoryInterface $specificationRepository )
    {
        $this -> theRepository = $specificationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $theProduct
     * @return array|mixed
     */
    public function index( $theProduct ) : array
    {
        return $this -> theRepository -> index( $theProduct );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $theProduct
     * @param SpecificationRequest $specificationRequest
     * @return array|mixed
     */
    public function store( $theProduct, SpecificationRequest $specificationRequest ) : array
    {
        return $this -> theRepository -> store( $theProduct, $specificationRequest );
    }

    /**
     * Display the specified resource.
     *
     * @param $theProduct
     * @param $theSpecification
     * @return array|mixed
     */
    public function show( $theProduct, $theSpecification ) : array
    {
        return $this -> theRepository -> show( $theProduct, $theSpecification );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $theProduct
     * @param SpecificationRequest $specificationRequest
     * @param $theSpecification
     * @return array|mixed
     */
    public function update( $theProduct, SpecificationRequest $specificationRequest, $theSpecification ) : array
    {
        return $this -> theRepository -> update( $theProduct, $specificationRequest, $theSpecification );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $theProduct
     * @param $theSpecification
     * @return array|mixed
     */
    public function destroy( $theProduct, $theSpecification ) : array
    {
        return $this -> theRepository -> destroy( $theProduct, $theSpecification );
    }
}
