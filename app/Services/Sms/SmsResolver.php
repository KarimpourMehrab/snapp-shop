<?php

namespace App\Services\Sms;

use App\Services\Sms\Exceptions\SmsGateWayNotFoundException;
use Exception;
use Illuminate\Support\Str;

class SmsResolver
{
    protected $smsService;


    /**
     * @throws Exception
     */
    public function __construct(string $notificationService = null)
    {
        $this->make($notificationService);
    }

    /**
     * @throws Exception
     */
    public function __call(string $name, array $arguments)
    {
        if (in_array(Str::lower($name), $this->getActiveServices())) {
            return $this->make($name);
        }
        return call_user_func_array([$this->smsService, $name], $arguments);
    }

    /**
     * @throws Exception
     */
    public function make($smsService = null): SmsResolver
    {

        if (!$smsService) $smsService = $this->getActiveServices()[0];

        if (!$smsService instanceof SmsAbstract) {

            if (!in_array($smsService, $this->getActiveServices())) {
                throw new SmsGateWayNotFoundException();
            }
            $smsService = Str::studly(strtolower($smsService));
            $class = 'App\\Services\\' . $smsService . '\\' . $smsService;
            $smsService = new $class();
        }

        $this->smsService = $smsService;

        return $this;
    }

    private function getActiveServices()
    {
        return config('notification.active_services');
    }
}
