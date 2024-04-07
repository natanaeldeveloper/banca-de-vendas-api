<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductOfferedRequest extends FormRequest
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
        $notebookId = $this->route('notebook');

        return [
            'count_offered' => ['required', 'integer'],
            'product_id' => [
                'required',
                Rule::exists('products', 'id'),
                Rule::unique('products_offered')->where(function ($query) use ($notebookId) {
                    return $query->where('product_id', $this->product_id)->where('notebook_id', $notebookId);
                })
            ],
        ];
    }
}