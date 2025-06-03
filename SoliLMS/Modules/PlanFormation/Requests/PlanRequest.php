<?php

namespace Modules\PlanFormation\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    protected function prepareForValidation()
    {
        // Merge the authenticated user's ID into the request data.
        $this->merge([
            'user_id' => auth()->id(),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'module' => 'required|exists:modules,id',
            'brief' => 'required|exists:briefs,id',
            'competence' => 'required|exists:competences,id',
            'briefs' => 'array',
            'briefs.*' => 'exists:briefs,id',
        ];
    }
}
