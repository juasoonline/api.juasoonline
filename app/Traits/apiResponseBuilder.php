<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait apiResponseBuilder
{
    /**
     * @param $data
     * @param $status_message
     * @param $message
     * @param $status_code
     * @return JsonResponse
     */
    public function successResponse( $data, $status_message, $message, $status_code )
    {
        return response() -> json([ 'status' => $status_message, 'code' => $status_code, 'message' => $message, 'data' => $data ] );
    }

    /**
     * @param $data
     * @param $status_message
     * @param $message
     * @param $status_code
     * @return JsonResponse
     */
    public function errorResponse( $data, $status_message, $message, $status_code )
    {
        if ( $status_code === 422 ){ return response() -> json([ 'status' => $status_message, 'code' => $status_code, 'message' => $message, 'error(s)' => $data, ] ); }
        return response() -> json([ 'status' => $status_message, 'code' => $status_code, 'message' => $message, 'data' => $data, ] );
    }
}
