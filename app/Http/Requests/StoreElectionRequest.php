<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreElectionRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'year' => 'required|integer|min:1900|max:2100',
            'number_participant_voters' => 'required|integer|min:0',
            'number_registered_voters' => 'required|integer|min:0',
            'number_blank_votes' => 'required|integer|min:0',
            'number_null_votes' => 'required|integer|min:0',
            'number_absentee_votes' => 'required|integer|min:0',
            'freguesia_pt_entry_id' => 'required|exists:freguesias_pt_entries,id',
        ];
    }
}