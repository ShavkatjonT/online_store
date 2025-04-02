<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignPermissionToRoleRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->user()->can('permission:assign');
    }

    public function rules(): array
    {
        return [
            'role_id' => ['required','exists:roles,id'],
            'permission_id' => ['required', 'exists:permissions,id'],
        ];
    }
}
