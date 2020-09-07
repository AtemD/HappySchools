<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolData extends FormRequest
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
        $validationRules = [
            'urn'           => 'required|unique:schools,urn',
            'name'          => 'required|unique:schools,name|min:2|max:255',
            'type'          => 'required',
            'phone'         => 'required|unique:schools,phone',
            'fax'           => 'sometimes|max:20',
            'post_code'     => 'required|max:255',
            'street'        => 'required|max:255',
            'image'         => 'sometimes|bail|mimes:png,jpeg,jpg|dimensions:min_width=250,min_height=250,max_width=550,max_height=550,ratio=1/1',
            'locality'      => 'sometimes|max:255',
            'town'          => 'required|min:2|max:255',
            'address_3'     => 'sometimes|max:255',
            'website'       => 'sometimes|url|nullable',
            'longitude'     => 'required_with_all:latitude|numeric|nullable',
            'latitude'      => 'required_with_all:longitude|numeric|nullable',
            'principalName' => 'required|min:2|max:255',
            'email'         => 'required|email|unique:users,email'
        ];

        return $validationRules;
    }

    /**
     * Define custom attribute names
     *
     * @return array
     **/
    // public function attributes()
    // {
    //     # code...
    // }

    /**
     * Defines custom error messages
     * 
     * @return type
     **/
    public function messages()
    {
        $validationMessages = [
            'urn.required'                  => 'URN number must be specified.',
            'urn.unique'                    => 'A School has been already registered with specified URN number.',
            'name.required'                 => 'School Name must be specified.',
            'name.unique'                   => 'School Name must be Unique.',
            'name.min'                      => 'School Name must not be below 2 characters.',
            'name.max'                      => 'School Name must not exceed 255 characters.',
            'type.required'                 => 'School Type is required.',
            'phone.required'                => 'School Phone Number is required.',
            'image.mimes'                   => 'For logo allowed extensions are .jpeg, .jpg, and .png',
            'image.dimensions'              => 'Logo dimension must be between 250px and 550px for both width and height, and their ratio must be 1:1 [Squares].',
            'fax.max'                       => 'Fax Number length must not exceed 20 characters.',
            'post_code.required'            => 'Postal Code is required.',
            'post_code.max'                 => 'Postal Code must not exceed 255 characters.',
            'street.required'               => 'Street Name is required.',
            'street.max'                    => 'Street Name must not exceed 255 characters.',
            'locality.max'                  => 'Locality must not exceed 255 characters.',
            'town.required'                 => 'Town is required.',
            'town.min'                      => 'Town Name must not be below 2 characters.',
            'town.max'                      => 'Town Name must not exceed 255 characters.',
            'address_3.max'                 => 'Address 3 must not exceed 255 characters.',
            'website.url'                   => 'Website must be a valid URL address.',
            'longitude.numeric'             => 'Longitude must be a valid number.',
            'longitude.required_with_all'   => 'Longitude must be set if latitude is set.',
            'latitude.required_with_all'    => 'Latitude must be set if longitude is set.',
            'latitude.numeric'              => 'Latitude  must be a valid number.',
            'principalName.required'        => 'Principal\'s Full Name is required.',
            'principalName.min'             => 'Principal\'s Full Name must not be below 2 characters.',
            'principalName.max'             => 'Principal\'s Full Name must not exceed 255 characters.',
            'email.required'                => 'Main Email Address is required.',
            'email.email'                   => 'Main Email Address must be a valid Email Address.'
        ];

        return $validationMessages;
    }
}
