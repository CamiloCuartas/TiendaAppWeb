<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed name
 * @property mixed size
 * @property mixed observations
 * @property mixed providerId
 * @property mixed onHand
 * @property mixed shippingDate
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
