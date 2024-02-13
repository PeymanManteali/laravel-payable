<?php

namespace PaymentService;


class Payment
{
    public function __call($methodName, $arguments)
    {
        $providerPath = __NAMESPACE__."\GatewayProviders\\".$methodName.'Provider\\'.$methodName.'Provider';
        return new $providerPath(... $arguments);
    }
    public static function __callStatic($methodName, $arguments)
    {
        $providerPath = __NAMESPACE__."\GatewayProviders\\".$methodName.'Provider\\'.$methodName.'Provider';
        return new $providerPath(... $arguments);
    }
}
// design pattern AbstractFactory

// use App\Packages\Payment\GatewayProviders\CafebazaarProvider\CafebazaarProvider;
// use App\Packages\Payment\GatewayProviders\SamanProvider\SamanProvider;

//    public function gatewayFactory($gateway)
//    {
//        $paymentGateway=[ //we can get this from .env or DB
//            'bazaar' => bazaarProvider::class,
//            'saman' => SamanProvider::class,
//        ][$gateway];
//
//        return resolve($paymentGateway);
//    }
