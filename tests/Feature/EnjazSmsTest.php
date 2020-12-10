<?php

namespace Hsmfawaz\EnjazSms\Tests\Feature;

use Hsmfawaz\EnjazSms\EnjazSms;
use Hsmfawaz\EnjazSms\Tests\TestCase;

class EnjazSmsTest extends TestCase
{
    public function testSendSuccessfully()
    {
        $instance = new EnjazSms();
        $result = $instance->to('+966540845818')->send('test sending successfully');
        self::assertTrue(isset($result['code']));
        self::assertEquals('100', $result['code']);
    }
}
