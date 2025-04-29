<?php

namespace App\Http\Requests\Admin;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class SetForwardingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('setForwarding', $this->route("attendance"));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'description' => ['required', 'string']
        ];
    }
}
