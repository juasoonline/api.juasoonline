<?php

namespace App\Http\Requests\Administrator;

use Illuminate\Foundation\Http\FormRequest;

class AdministratorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ( in_array( $this -> getMethod (), [ 'PUT', 'PATCH' ] ) )
        {
            return $rules =
            [
                'data'                                                  => [ 'required' ],
                'data.id'                                               => [ 'required', 'string' ],
                'data.type'                                             => [ 'required', 'string', 'in:Administrator' ],
            ];
        }

        return
        [
            'data'                                                      => [ 'required' ],
            'data.type'                                                 => [ 'required', 'string', 'in:Administrator' ],

            'data.attributes.first_name'                                => [ 'required', 'string' ],
            'data.attributes.other_names'                               => [ 'sometimes', 'string' ],
            'data.attributes.last_name'                                 => [ 'required', 'string' ],

            'data.attributes.designation'                               => [ 'required', 'string' ],

            'data.attributes.email'                                     => [ 'required', 'email' ],
            'data.attributes.mobile_phone'                              => [ 'required', 'min:10', 'numeric' ],
            'data.attributes.other_phone'                               => [ 'min:10', 'numeric' ],

            'data.relationships.shop.shop_id'                           => [ 'required', 'string' ],
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return
        [
            'data.required'                                             => "The data field is invalid",

            'data.type.required'                                        => "The type is required",
            'data.type.string'                                          => "The type must be of a string",
            'data.type.in'                                              => "The type is invalid",

            'data.attributes.first_name.required'                       => "The first name is required",
            'data.attributes.first_name.string'                         => "The first name must be of a string type",

            'data.attributes.other_names.string'                        => "The other name must be of a string type",

            'data.attributes.last_name.required'                        => "The last name is required",
            'data.attributes.last_name.string'                          => "The last name must be of a string type",

            'data.attributes.designation.required'                      => "The designation is required",
            'data.attributes.designation.string'                        => "The designation must be of a string type",

            'data.attributes.email.required'                            => "The email is required",
            'data.attributes.email.email'                               => "The email address is invalid",

            'data.attributes.mobile_phone.required'                     => "The mobile phone number is required",
            'data.attributes.mobile_phone.min'                          => "The mobile phone number must have a minimum of 10 digits",
            'data.attributes.mobile_phone.numeric'                      => "The mobile phone number must only contain numbers",

            'data.attributes.other_phone.min'                           => "The other phone number must have a minimum of 10 digits",
            'data.attributes.other_phone.numeric'                       => "The other phone number must only contain numbers",

            'data.relationships.shop.shop_id.required'                  => "The shop id is required",
        ];
    }
}
