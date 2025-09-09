<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubscribeBenefit extends Model
{
    //
    protected $guarded = [];

    public function subscriberPackage(): BelongsTo
    {
        return $this->belongsTo(SubscribePackage::class, 'subscriber_package_id');
    }
}
