<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    protected $table = 'get_exchange_rates';

    protected $fillable = ['currency', 'value', 'date'];

    public const CURRENCIES = [
        'EUR' => 'Euro',
        'USD' => 'US Dollar',
        'RUB' => 'Russian Ruble',

    ];

    public static function getCurrencyForToday($currency, $value)
    {
        return self::updateOrCreate(
            ['currency' => $currency, 'date' => now()->toDateString()],
            ['value' => $value]
        );

    }

}



