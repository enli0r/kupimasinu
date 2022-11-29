<?php

namespace App\Imports;

use App\Models\Naselja;
use Maatwebsite\Excel\Concerns\ToModel;

class NaseljaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }
    
        return new Naselja([
            'naziv' => $row[0],
            'maticni_broj' => $row[1]
        ]);
    }
}
