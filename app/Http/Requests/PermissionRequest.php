<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'prefix' => 'required|string|max:255',
        ];
        ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    public function attributes(){
        return [
            'name' => 'Permission Name',
            'prefix' => 'Permission Prefix',
        ];
    }
    protected function store(){
        return[
            'name' => "unique:permissions,name",
        ];
    }
    protected function update(){
        return[
            'name' => 'unique:permissions,name,id,'.$id,
        ];
    }
}
