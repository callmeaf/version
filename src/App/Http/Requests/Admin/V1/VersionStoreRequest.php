<?php

namespace Callmeaf\Version\App\Http\Requests\Admin\V1;

use Callmeaf\Version\App\Repo\Contracts\VersionRepoInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VersionStoreRequest extends FormRequest
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
    public function rules(VersionRepoInterface $versionRepo): array
    {
        return [
            'id' => ['required','string',Rule::unique($versionRepo->getModel()::class,$versionRepo->getModel()->getKeyName())],
            'content' => ['required','string']
        ];
    }
}
