<?php

namespace App\Http\Requests;

use App\Models\Setting;
use App\Rules\CheckboxValidationOnOffRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
{
    const DEFAULTFILLABLE = [
        'custom_auth_field'             => null,
        'custom_auth_field_password'    => null,
        'enable_registration'           => false,
        'enable_forgot_password'        => false,
        'enable_reset_password'         => false,
        'enable_change_password'        => false
    ];

    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $setting = Setting::findName($this->request->get('settings'));
        return $this->user()->can('update', $setting);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'custom_auth_field'             => 'required|string',
            'custom_auth_field_password'    => 'required|string',
            'enable_registration'           => new CheckboxValidationOnOffRule,
            'enable_forgot_password'        => new CheckboxValidationOnOffRule,
            'enable_reset_password'         => new CheckboxValidationOnOffRule,
            'enable_change_password'        => new CheckboxValidationOnOffRule
        ];
    }
}
