<?php

namespace Packages\Payment\GatewayProviders\CafebazaarProvider;

use Packages\Payment\Contracts\GatewayAbstraction;
use Packages\Payment\Contracts\GatewayInterface;

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
