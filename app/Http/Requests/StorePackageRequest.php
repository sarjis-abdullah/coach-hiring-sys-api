<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePackageRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->canCreatePackage();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => "required",
            "description" => "required",
            "price" => "required",
            "publishDate" => "required|date",
            "sessionTime" => "required|date_format:Y-m-d H:i:s",
//            "createdByUserId" => "required|exists:users"
        ];
    }
}
