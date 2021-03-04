<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait ExternalService
{
    /**
     * @param $url
     * @param null $theResource
     * @return array|mixed
     */
    public function getRequest( $url, $theResource = null )
    {
        $response = Http::withHeaders([
            'Content-Type'  => 'application/vnd.api+json',
            'Accept'        => 'application/vnd.api+json'
        ]) -> get( $url . $theResource, [ 'include' => request() ->include ] );

        return $response -> json();
    }

    /**
     * @param $url
     * @param $data
     * @return array|mixed
     */
    public function postRequest( $url, $data )
    {
        $response = Http::withHeaders([
            'Content-Type'  => 'application/vnd.api+json',
            'Accept'        => 'application/vnd.api+json'
        ]) -> post( $url, [ 'data' => $data -> data ] );

        return $response -> json();
    }

    /**
     * @param $url
     * @param $data
     * @param $theResource
     * @return array|mixed
     */
    public function putRequest( $url, $data, $theResource )
    {
        $response = Http::withHeaders([
            'Content-Type'  => 'application/vnd.api+json',
            'Accept'        => 'application/vnd.api+json'
        ]) -> put( $url . $theResource, [ 'data' => $data -> data ] );

        return $response -> json();
    }

    /**
     * @param $theUrl
     * @param $theResource
     * @return array|mixed
     */
    public function deleteRequest( $theUrl, $theResource )
    {
        $response = Http::withHeaders([
            'Content-Type'  => 'application/vnd.api+json',
            'Accept'        => 'application/vnd.api+json'
        ]) -> delete( $theUrl . $theResource );

        return $response -> json();
    }
}