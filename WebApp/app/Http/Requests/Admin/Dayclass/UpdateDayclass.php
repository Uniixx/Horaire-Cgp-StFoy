<?php

namespace App\Http\Requests\Admin\Dayclass;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateDayclass extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.dayclass.edit', $this->dayclass);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'horaireID' => ['nullable', 'integer'],
            'name' => ['nullable', 'string'],
            'teacher' => ['nullable', 'string'],
            'room' => ['nullable', 'string'],
            'startingTime' => ['nullable', 'date'],
            'endingTime' => ['nullable', 'date'],
            'suffix' => ['nullable', 'string'],
            
        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
