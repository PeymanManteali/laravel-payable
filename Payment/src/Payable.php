<?php

namespace Packages\Payment;

use Packages\Payment\Models\Transaction;
use Packages\Subscription\Models\Subscription;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Throwable;

trait Payable
{
    public function transaction(): HasOne
    {
        return $this->hasOne(Transaction::class);
    }

    /**
     * @throws Exception
     */
    public function initializePayment($method): static
    {
        $transaction = Payment::$method($this)->initializePayment();
        if (!$transaction) {
            $this->forceDelete();
            throw new Exception("payment: error in creating transaction!");
        }
        return $this;
    }

    public function executePayment($method = null): array|bool
    {
        try {
            if (!$this->transaction) {
                $this->initializePayment($method);
            }
            if (!$method) $method = $this->method;
            return Payment::$method($this)->executePayment();
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }

    /**
     * @throws Exception
     */
    public function confirmPayment($purchaseToken): bool|Subscription
    {
        $method = $this->method;
        $response = Payment::$method($this)->confirmPayment($purchaseToken);
        if($response){
            $this->verifyPurchase($response);
            return $this;
        }
        return false;
    }

    public function getTransactionAttribute(): object|null
    {
        return $this->transaction()->first() ?? null;
    }

    /**
     * @throws Exception
     */
    public function getMethodAttribute(): null|string
    {
        $method = $this->transaction->payment_method ?? null;
        if (!$method) {
            throw new Exception("PaymentService: Method not found. first initialize payment");
        }
        return $method;
    }

    /**
     * @throws Exception
     */
    public function verifyPurchase($array): object
    {
        $transaction = $this->transaction;
        $transaction->update($array);
        $this->status = 'verified';
        $this->expired_at = Carbon::parse($array['time'])->addDays($this->package->duration)->toDateTime();
        if(!$this->save()) throw new Exception("PaymentService: Verification Failed");
        return $this;
    }
}
