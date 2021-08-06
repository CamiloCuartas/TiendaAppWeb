<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @method static find(mixed $get)
 */
class Item extends Model
{
    use HasFactory;

    public static function getAllData(): array
    {
        return self::all()->toArray();
    }
}
