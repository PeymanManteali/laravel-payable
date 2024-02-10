<?php

namespace Packages\Payment\Contracts;

interface GatewayInterface
{
    const TRANSACTION_FAILED = 'transaction failed';
    const TRANSACTION_SUCCESS = 'transaction success';

    public function initializePayment();
    public function executePayment();
    public function confirmPayment($purchaseToken);
    public function refundPayment();
}
