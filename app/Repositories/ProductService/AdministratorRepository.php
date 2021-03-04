<?php

namespace App\Repositories\ProductService;

use App\Http\Requests\ProductService\AdministratorRequest;
use App\Services\ProductService\AdministratorService;

class AdministratorRepository implements AdministratorRepositoryInterface
{
    private $administratorService;

    /**
     * StoreRepository constructor.
     * @param AdministratorService $administratorService
     */
    public function __construct( AdministratorService $administratorService )
    {
        $this -> administratorService = $administratorService;
    }

    /**
     * @return array|mixed
     */
    public function index()
    {
        return $this -> administratorService -> getAll();
    }

    /**
     * @param AdministratorRequest $administratorRequest
     * @return array|mixed
     */
    public function store( AdministratorRequest $administratorRequest )
    {
        return $this -> administratorService -> createAdministrator( $administratorRequest );
    }

    /**
     * @param $theAdministrator
     * @return array|mixed
     */
    public function show( $theAdministrator )
    {
        return $this -> administratorService -> getAdministrator( $theAdministrator );
    }

    /**
     * @param AdministratorRequest $administratorRequest
     * @param $theAdministrator
     * @return array|mixed
     */
    public function update( AdministratorRequest $administratorRequest, $theAdministrator )
    {
        return $this -> administratorService -> updateAdministrator( $administratorRequest, $theAdministrator );
    }

    /**
     * @param $theAdministrator
     * @return array|mixed
     */
    public function destroy( $theAdministrator )
    {
        return $this -> administratorService -> deleteAdministrator( $theAdministrator );
    }
}