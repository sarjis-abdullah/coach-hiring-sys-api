<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePackageRequest extends FormRequest
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
            "title" => "sometimes|required",
            "description" => "sometimes|required",
            "price" => "sometimes|required",
            "publishDate" => "sometimes|required|date",
            "sessionTime" => "sometimes|required",
        ];
    }
}
