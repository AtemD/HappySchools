<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportSchoolsData extends FormRequest
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
        return [
            'import' => 'bail|required|mimes:xlsx,csv'
        ];
    }

    /**
     * Set custom validation error messages
     *
     * @return array
     **/
    public function messages()
    {
        return [
            'import.required'   => 'To Import Data a .xslx or .csv file must be specified',
            'import.mimes'      => 'To Import Data only .xlsx and .csv files are allowed'
        ];
    }
}
