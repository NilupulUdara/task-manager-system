<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if ($this->routeIs('tasks.index')) {
            return [
                'search' => ['nullable', 'string'],
                'status' => [
                    'nullable',
                    Rule::in(['pending', 'in_progress', 'completed']),
                ],
            ];
        }

        if ($this->routeIs('tasks.updateStatus')) {
            return [
                'status' => [
                    'required',
                    Rule::in(['pending', 'in_progress', 'completed']),
                ],
            ];
        }

        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'due_date' => ['nullable', 'date'],
            'status' => [
                'required',
                Rule::in(['pending', 'in_progress', 'completed']),
            ],
        ];
    }
}
