<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed providerName
 */

class Brand extends Model
{
    use HasFactory;

    public static function getAllBrands(): array
    {
        return self::all()->toArray();
    }
}
