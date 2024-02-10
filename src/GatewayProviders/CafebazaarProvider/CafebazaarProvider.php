<?php

namespace Services\Payment\GatewayProviders\CafebazaarProvider;

use Services\Payment\Contracts\GatewayAbstraction;
use Services\Payment\Contracts\GatewayInterface;

class CafebazaarProvider extends GatewayAbstraction implements GatewayInterface
{

    public function executePayment()
    {
        return array('bazaarCode' => $this->subscription->package->bazaar_code);
    }

    public function confirmPayment($purchaseToken)
    {
        $cafebazaar_id = $this->subscription->package->bazaar_code;
        $cafebazaar = new Cafebazaar();
        $purchase = $cafebazaar->verifyPurchase($cafebazaar_id, $purchaseToken);
        if ($purchase->isValid()) {
            return [
                'status' => 'success',
                'time' => $purchase->getTime(),
                'ref_code' => $purchaseToken,
            ];
        }
        return [
            'status' => ' failed',
            'time' => $purchase->getTime(),
            'ref_code' => $purchaseToken,
            'description'=>'state: '.$purchase->getPurchaseState(),
        ];
    }

    public function refundPayment()
    {
        // TODO: Implement refundPayment() method.
    }
}
