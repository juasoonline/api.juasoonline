<?php

namespace App\Http\Controllers\ProductService\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductService\Store\StoreRequest;
use App\Repositories\ProductService\Store\StoreRepositoryInterface;

class StoreController extends Controller
{
    private $theRepository;

    /**
     * StoreController constructor.
     * @param StoreRepositoryInterface $shopRepository
     */
    public function __construct( StoreRepositoryInterface $shopRepository )
    {
        $this -> theRepository = $shopRepository;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this -> theRepository -> index();
    }

    /**
     * @param StoreRequest $shopRequest
     * @return array|mixed
     */
    public function store( StoreRequest $shopRequest ) : array
    {
        return $this -> theRepository -> store( $shopRequest );
    }

    /**
     * @param $theShop
     * @return mixed
     */
    public function show( $theShop )
    {
        return $this -> theRepository -> show( $theShop );
    }

    /**
     * @param StoreRequest $shopRequest
     * @param $theShop
     * @return mixed
     */
    public function update( StoreRequest $shopRequest, $theShop )
    {
        return $this -> theRepository -> update( $shopRequest, $theShop );
    }

    /**
     * @param $theShop
     * @return mixed
     */
    public function destroy( $theShop )
    {
        return $this -> theRepository -> destroy( $theShop );
    }
}
