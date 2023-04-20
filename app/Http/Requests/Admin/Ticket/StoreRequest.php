<?php

namespace App\Http\Requests\Admin\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'message' => 'required|string',
            'category_ids' => 'required|array',
            'category_ids.*' => 'required|exists:categories,id',
            'label_ids' => 'required|array',
            'label_ids.*' => 'required|exists:labels,id',
            'agent_id' => 'required|exists:users,id',
            'status' => 'nullable',
            'priority_id' => 'required|exists:priority,id',
        ];
    }
}
