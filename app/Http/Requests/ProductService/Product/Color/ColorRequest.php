<?php

namespace App\Http\Requests\ProductService\Product\Color;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class ColorRequest extends FormRequest
{
    /**
     * @param Validator $validator
     */
    protected function failedValidation( Validator $validator )
    {
        throw new HttpResponseException(
            response() -> json([ 'status' => 'Error', 'code' => Response::HTTP_UNPROCESSABLE_ENTITY, 'errors' => $validator -> errors() -> all() ])
        );
    }

    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules() : array
    {
        if ( in_array( $this -> getMethod (), [ 'PUT', 'PATCH' ] ) )
        {
            return $rules =
            [
                'data'                              => [ 'required' ],
                'data.type'                         => [ 'required', 'string', 'in:Color' ],
            ];
        }
        return
        [
            'data'                                  => [ 'required' ],
            'data.type'                             => [ 'required', 'string', 'in:Color' ],
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return
        [
        ];
    }
}
