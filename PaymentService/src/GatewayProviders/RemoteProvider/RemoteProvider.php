<?php

namespace PaymentService\GatewayProviders\RemoteProvider;

use PaymentService\Contracts\GatewayAbstraction;
use PaymentService\Contracts\GatewayInterface;

class RemoteProvider extends GatewayAbstraction implements GatewayInterface
{
    public function executePayment()
    {
        // TODO: Implement executePayment() method.
    }
    public function confirmPayment($purchaseToken)
    {
        // TODO: Implement confirmPayment() method.
    }
    public function refundPayment()
    {
        // TODO: Implement refundPayment() method.
    }
}
