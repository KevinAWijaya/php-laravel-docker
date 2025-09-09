<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubscribeTransaction extends Model
{
    //
    protected $guarded = [];

    protected $casts = [
        'started_at' => 'date',
        'ended_at' => 'date',
    ];


    public function subscribePackage(): BelongsTo
    {
        return $this->belongsTo(SubscribePackage::class, 'subscribe_package_id');
    }


    public static function generateUniqueTrxId()
    {
        $prefix =  'FITBWA';
        do {
            $randomString = $prefix . mt_rand(1000, 9999);
        } while (self::where('booking_trx_id', $randomString)->exists());

        return $randomString;
    }
}
