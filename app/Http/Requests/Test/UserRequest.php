<?php

namespace App\Http\Requests\Test;


use Dingo\Api\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'username' => 'required|unique:users',
                    'nickname' => 'required|unique:users',
                    'email' => 'unique:users',
                    'telephone' => 'unique:users',
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'username' => 'unique:users',
                    'nickname' => 'unique:users',
                    'email' => 'unique:users',
                    'telephone' => 'unique:users',
                ];
            default:
                return [];
        }
    }
}
