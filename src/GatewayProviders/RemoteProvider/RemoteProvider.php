<?php

namespace Services\Payment\GatewayProviders\RemoteProvider;

use Services\Payment\Contracts\GatewayAbstraction;
use Services\Payment\Contracts\GatewayInterface;

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
