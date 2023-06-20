<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // common validations
        return [
            'name' => 'required|string|max:255',
            'email' => 'required',
            'role_id' => 'required',
            'password' => 'required|string|max:255',
        ];
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    public function attributes(){
        return [
            'name' => 'User Name',
            'email' => 'User Email',
            'role_id' => 'User Role',
            'password' => 'User Password',
        ];
    }
    protected function store(){
        return[
            'email' => 'unique:users,email',
        ];
    }
    protected function update(){
        return[
            'email' => 'unique:users,email,'.$request->id.',id,deleted_at,NULL',
        ];
    }
}
