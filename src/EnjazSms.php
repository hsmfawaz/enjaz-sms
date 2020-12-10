<?php

namespace Hsmfawaz\EnjazSms;

use Illuminate\Support\Facades\Http;

class EnjazSms
{
    public $phoneList;

    private $config;

    /**
     * EnjazSms constructor.
     *
     * @throws \Throwable
     */
    public function __construct()
    {
        $this->loadConfig();
    }

    /**
     * @param  array|string  $phone
     * @return $this
     */
    public function to($phone): EnjazSms
    {
        $this->phoneList = is_array($phone) ? $phone : func_get_args();

        return $this;
    }

    /**
     * @throws \Throwable
     */
    private function loadConfig(): void
    {
        $this->config = config('enjaz_sms');
        throw_if($this->config === null, new \Exception('config/enjaz_sms.php is missing'));
    }

    public function send(string $message)
    {
        $endpoint = $this->config['endpoint'];
        unset($this->config['endpoint']);
        $this->config['numbers'] = $this->getPreparedNumbers();
        $this->config['message'] = $message;
        $client = Http::get($endpoint, $this->config);

        return $this->parseBody($client->body());
    }

    public function getPreparedNumbers(): string
    {
        return str_replace(['+', ' '], '', implode(',', $this->phoneList));
    }

    private function parseBody($body)
    {
        $lines = preg_split("/\r\n|\n|\r/", $body);
        $result = [];
        foreach ($lines as $line) {
            $split = explode(':', $line);
            $key = strtolower(trim($split[0]));
            $value = trim($split[count($split) - 1]);
            $result[$key] = $value;
        }

        return $result;
    }
}