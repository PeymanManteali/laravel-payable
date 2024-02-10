<?php

namespace Services\Payment\Models;

use Services\Subscription\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'subscription_id',
        'payment_method',
        'tax',
        'discount',
        'final_amount',
        'status',
        'ref_code',
        'description',
        'time'
        ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
