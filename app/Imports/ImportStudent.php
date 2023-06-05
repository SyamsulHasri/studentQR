<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;


class ImportStudent implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   
        // convert name format to Laravel Title format
        $name = Str::title($row['name']);

        // Make a hash value for every input
        $hash = md5($name.'-'.$row['class'].'-'.$row['level'].'-'.$row['parent_contact']);

        if(Student::where('hash_value', '=', $hash)->exists())
        {
            //SKIP
        }else{
            return new Student([
                "name" => $name,
                "class" => $row['class'],
                "level" => $row['level'],
                "parent_contact" => $row['parent_contact'],
                "hash_value" => $hash,
            ]);
        }
        
    }
}
