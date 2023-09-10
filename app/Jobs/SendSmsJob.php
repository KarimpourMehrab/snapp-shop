<?php

namespace App\Jobs;


use App\Services\Sms\Sms;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendSmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 1;


    public function __construct(
        private readonly string  $pattern,
        private readonly array   $params,
        private readonly string  $mobile,
        private readonly ?string $service
    )
    {
        $this->onQueue('sms');
        $this->tries = count(config('notification.sms.active_services'));
    }

    public function handle(): void
    {
        try {

            $smsService = Sms::make($this->getSmsService());
            $smsService->send($this->prepareMessage(), $this->mobile);

        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    /**
     * @return string
     * set try loop after any exception
     */
    private function getSmsService(): string
    {
        $attempts = $this->attempts() - 1;
        $activeServices = config('notification.sms.active_services');

        if ($attempts == 0 && $this->service) {
            return $this->service;
        }
        if (!isset($activeServices[$attempts])) {
            $this->fail();
        }
        return $activeServices[$attempts];

    }

    public function prepareMessage(): string
    {
        return trans('notifications.' . $this->pattern, $this->params);
    }
}
