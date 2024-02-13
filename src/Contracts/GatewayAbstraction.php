<?php

namespace PaymentService\Contracts;

use PaymentService\Models\Transaction;

abstract class GatewayAbstraction
{
    public string $methodName;
    public object|null $subscription;

    public function __construct($subscription = null)
    {
        $this->subscription = $subscription;
        $this->methodName = $this->methodName();
    }

    public function initializePayment()
    {
        $transaction = Transaction::create([
            'subscription_id' => $this->subscription->id,
            'payment_method' => $this->methodName,
            'tax' => config('payment.payment.tax'),
            'discount' => array_sum([(int)$this->subscription->package->discount, (int)config('payment.payment.generalDiscount')]),
            'final_amount' => $this->calcAmount(),
            'status' => 'sent',
            'ref_code' => null,
            'description' => null,
            'time' => null,
        ]);
        return $transaction;
    }

    protected function calcAmount(): int
    {
        $packagePrice = $this->subscription->package->price;
        $packageDiscount = $this->subscription->package->discount;
        $generalDiscount = config('payment.payment.generalDiscount');
        $tax = config('payment.payment.tax');
        $amount = $packagePrice - (($packagePrice * ($packageDiscount + $generalDiscount)) / 100) + (($packagePrice * $tax) / 100);
        return $amount;
    }

    protected function methodName()
    {
        $array = explode('\\', static::class);
        return str_replace("Provider", "", end($array));
    }

    public function invoice()
    {
        //TODO: create invoice for this transaction
    }
}
