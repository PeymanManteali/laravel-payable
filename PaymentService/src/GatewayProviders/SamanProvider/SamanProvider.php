<?php

namespace PaymentService\GatewayProviders\SamanProvider;

use PaymentService\Contracts\GatewayAbstraction;
use PaymentService\Contracts\GatewayInterface;

class SamanProvider extends GatewayAbstraction implements GatewayInterface
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
