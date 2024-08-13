<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class CarsRequest extends FormRequest
{
    protected const DATE_INPUT_FORMAT = 'd.m.Y H:i';

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth('sanctum')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'start_time' => sprintf('required|date_format:%s', config('database.date_format')),
            'end_time' => sprintf('required|date_format:%s', config('database.date_format')),
            'car' => 'integer|gt:0',
            'comfort_class' => 'integer|gt:0',
        ];
    }

    public function prepareForValidation()
    {
        foreach (['start_time', 'end_time'] as $code) {
            try {
                $this->merge([
                    $code => Carbon::createFromFormat(self::DATE_INPUT_FORMAT, $this->input($code))
                        ->format(config('database.date_format'))
                ]);
            } catch (\Exception $exception) {
                $this->merge([
                    $code => $this->input($code)
                ]);
            }
        }
    }
}
