<?php

namespace Packages\Payment\GatewayProviders\RemoteProvider;

use Packages\Payment\Contracts\GatewayAbstraction;
use Packages\Payment\Contracts\GatewayInterface;

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
