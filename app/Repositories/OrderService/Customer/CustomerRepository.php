<?php

namespace App\Repositories\OrderService\Customer;

use App\Http\Requests\OrderService\Customer\CustomerRegistrationRequest;
use App\Http\Requests\OrderService\Customer\CustomerRequest;
use App\Jobs\OrderService\Customer\CreateCustomer;
use App\Models\OrderService\Customer\Customer;
use App\Services\OrderService\Customer\CustomerService;
use App\Traits\apiResponseBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CustomerRepository implements CustomerRepositoryInterface
{
    use apiResponseBuilder; private $theCustomerService;

    /**
     * CustomerRepository constructor.
     * @param CustomerService $customerService
     */
    public function __construct( CustomerService $customerService )
    {
        $this -> theCustomerService = $customerService;
    }

    /**
     * @return array
     */
    public function index() : array
    {
        return $this -> theCustomerService -> getAll();
    }

    /**
     * @param CustomerRequest $customerRequest
     * @return array|mixed
     */
    public function store( CustomerRequest $customerRequest  ) : array
    {
        return $this -> theCustomerService -> createCustomer( $customerRequest );
    }

    /**
     * @param $theCustomer
     * @return array|mixed
     */
    public function show( $theCustomer ) : array
    {
        return $this -> theCustomerService -> getCustomer( $theCustomer );
    }

    /**
     * @param $theCustomer
     * @param CustomerRequest $customerRequest
     * @return array|mixed
     */
    public function update( $theCustomer, CustomerRequest $customerRequest  ) : array
    {
        return $this -> theCustomerService -> updateCustomer( $theCustomer, $customerRequest );
    }

    /**
     * @param $theCustomer
     * @return array|mixed
     */
    public function destroy( $theCustomer ) : array
    {
        return $this -> theCustomerService -> deleteCustomer( $theCustomer );
    }

    /**
     * @param CustomerRegistrationRequest $customerRegistrationRequest
     * @return JsonResponse
     */
    public function registration( CustomerRegistrationRequest $customerRegistrationRequest ) : JsonResponse
    {
        return $this -> successResponse( ( new CreateCustomer( $customerRegistrationRequest ) ) -> handle(), "Success", "Registration successful", Response::HTTP_CREATED );
    }
}
