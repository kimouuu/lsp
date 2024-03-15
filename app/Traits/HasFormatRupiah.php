<?php

namespace App\Traits;

use Faker\Core\Number;

trait HasFormatRupiah

{

    function formatRupiah($field, $prefix = null)
    {
        $prefix = $prefix ? $prefix : 'Rp. ';
        $nominal = $this->attributes($field);
        return $prefix . number_format($nominal, 0, ',', ',');
    }
}
