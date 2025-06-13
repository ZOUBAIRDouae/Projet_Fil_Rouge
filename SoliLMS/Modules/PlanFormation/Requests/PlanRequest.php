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
            'formateur_id' => auth()->id(),
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
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'filiere' => 'required|string|max:255',
            'formateur_id' => 'required|exists:users,id',
            'modules' => 'required|array|min:1',
            'modules.*' => 'exists:modules,id',
            'briefs' => 'required|array|min:1',
            'briefs.*' => 'exists:brief_projets,id',
            'competences' => 'required|array|min:1',
            'competences.*' => 'exists:competences,id',
        ];
    }
}
