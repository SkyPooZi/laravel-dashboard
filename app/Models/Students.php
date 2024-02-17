<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students
{
    private static $students = [
        [
            "id"=> 1,
            "nis"=> "05013",
            "tanggal_lahir"=> 2007-05-27,
            "nama"=> "Abid",
            "kelas"=> "11 PPLG 2",
            "alamat"=> "Jln. Cendana 461 Kudus",
        ],
        [
            "id"=> 2,
            "nis"=> "04996",
            "tanggal_lahir"=> 2007-09-04,
            "nama"=> "Arvia",
            "kelas"=> "11 PPLG 2",
            "alamat"=> "Jln. Sungging 14 Kudus",
        ],
        [
            "id"=> 3,
            "nis"=> "05015",
            "tanggal_lahir"=> 2007-09-28,
            "nama"=> "Faris",
            "kelas"=> "11 PPLG 2",
            "alamat"=> "Jln. Jati Negara 32Rembang",
        ],
        [
            "id"=> 4,
            "nis"=> "05027",
            "tanggal_lahir"=> 2007-02-21,
            "nama"=> "Vicko",
            "kelas"=> "11 PPLG 2",
            "alamat"=> "Jln. Pramuka 1 Kudus",
        ],
        [
            "id"=> 5,
            "nis"=> "05010",
            "tanggal_lahir"=> 2007-02-14,
            "nama"=> "Joseph",
            "kelas"=> "11 PPLG 2",
            "alamat"=> "Jln. Kafe 2 Kudus",
        ]
    ];

    public static function all()
    {
        return self::$students;
    }
}
