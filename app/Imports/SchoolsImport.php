<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SchoolsImport implements ToCollection, WithHeadingRow, WithValidation, WithChunkReading, SkipsOnError, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $user = User::create([
                'name'      => $row['head_first_name'] . ' ' . $row['head_last_name'],
                'email'     => $row['main_email'],
                'password'  => Hash::make('password' . $row['urn'])
            ]);

            $user->school()->create([
                'urn'       => $row['urn'],
                'name'      => $row['school_name'],
                'type'      => implode('-', explode(' ', strtolower($row['school_type']))),
                'phone'     => $row['phone_number'],
                'fax'       => $row['fax_number'],
                'post_code' => $row['post_code'],
                'street'    => $row['street'],
                'locality'  => $row['locality'],
                'town'      => $row['town'],
                'address_3' => $row['address_3'],
                'website'   => $row['school_website']
            ]);
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function rules(): array
    {
        return [
            '*.urn'               => 'required|unique:schools,urn',
            '*.school_name'       => 'required|unique:schools,name|min:2|max:255',
            '*.school_type'       => 'required',
            '*.phone_number'      => 'required|unique:schools,phone',
            '*.fax_number'        => 'sometimes|max:20',
            '*.post_code'         => 'required|max:255',
            '*.street'            => 'required|max:255',
            '*.locality'          => 'sometimes|max:255',
            '*.town'              => 'required|min:2|max:255',
            '*.address_3'         => 'sometimes|max:255',
            '*.school_website'    => 'sometimes|url|nullable',
            '*.head_first_name'   => 'required|max:126',
            '*.head_last_name'    => 'required|max:127',
            '*.main_email'        => 'required|email|unique:users,email' 
        ];
    }
}