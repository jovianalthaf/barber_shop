<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCapsterRequest extends FormRequest
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
        // dd($this->method()); // panggil method, jangan property
        $capster = $this->route('capster'); // Ini harusnya instance Capster saat update

        $capsterId = $capster ? $capster->id : null;
        return [
            'name' => 'required|string|max:255',
            'tempat_tinggal' => 'required|string|max:255',
            'phone' => [
                'required',
                'string',
                'min:12',
                'max:13',
                // Kalau update, abaikan nomor phone milik capster ini sendiri
                Rule::unique('capsters', 'phone')->ignore($capsterId),
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                // Sama untuk email
                Rule::unique('capsters', 'email')->ignore($capsterId),
            ],
            'experience' => 'nullable|string|max:1000',
            'specialization' => 'nullable|string|max:255',
            'available' => 'nullable|boolean',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama capster wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',

            'tempat_tinggal.required' => 'Tempat tinggal wajib diisi.',
            'tempat_tinggal.string' => 'Tempat tinggal harus berupa teks.',
            'tempat_tinggal.max' => 'Tempat tinggal tidak boleh lebih dari 255 karakter.',

            'phone.required' => 'Nomor telepon wajib diisi.',
            'phone.string' => 'Nomor telepon harus berupa teks.',
            'phone.min' => 'Nomor telepon minimal 12 karakter.',
            'phone.max' => 'Nomor telepon maksimal 13 karakter.',
            'phone.unique' => 'Nomor telepon sudah digunakan.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'email.unique' => 'Email sudah digunakan.',

            'experience.string' => 'Pengalaman harus berupa teks.',
            'experience.max' => 'Pengalaman tidak boleh lebih dari 1000 karakter.',

            'specialization.string' => 'Spesialisasi harus berupa teks.',
            'specialization.max' => 'Spesialisasi tidak boleh lebih dari 255 karakter.',

            'available.boolean' => 'Ketersediaan harus berupa true atau false.',

            'foto.image' => 'File foto harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat jpg, jpeg, atau png.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ];
    }
}
