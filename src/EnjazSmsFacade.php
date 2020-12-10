<?php

namespace Hsmfawaz\EnjazSms;

use Illuminate\Support\Facades\Facade;

class EnjazSmsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'enjaz-sms';
    }
}
