<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreElectionResultRequest extends FormRequest
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
            'number_votes' => 'required|integer|min:0',
            'percentage_votes' => 'required|numeric|min:0|max:100',
            'election_id' => 'required|exists:elections,id',
            'party_id' => 'required|exists:parties,id',
        ];
    }
}
