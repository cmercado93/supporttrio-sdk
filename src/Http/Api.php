<?php

namespace Cmercado93\SupporttrioSdk\Http;

use Curl\Curl;
use Cmercado93\SupporttrioSdk\Config;

class Api
{
    protected static $instance;

    protected $curl;

    protected $baseParams = [];

    protected function __construct()
    {
        $this->curl = new Curl;
        $this->curl->setFollowLocation();
    }

    public function __destruct()
    {
        $this->curl->close();
    }

    /**
     * @return Cmercado93\SupporttrioSdk\Http\Api
     */
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * @return string
     */
    protected function getUrl() : string
    {
        $url = Config::getUrl();

        if (!$url) {
            throw new \Exception("configuration data is missing");
        }

        return $url;
    }

    /**
     * @return array
     */
    protected function getBaseParams() : array
    {
        $userPassword = Config::getUserPassword();

        if (!$userPassword) {
            throw new \Exception("configuration data is missing");
        }

        return [
            'api_user' => $userPassword['user'],
            'api_pass' => $userPassword['password'],
            'api_output' => 'json',
        ];
    }

    /**
     * @param  string $action
     * @param  array  $params
     * @throws \Exception
     * @return array
     */
    public function get(string $action, array $params = [])
    {
        $params = array_merge($params, $this->getBaseParams());
        $params['api_action'] = $action;

        $response = $this->curl->get($this->getUrl(), $params);

        if ($this->curl->error) {
            throw new \Exception($this->curl->errorMessage, $this->curl->httpStatusCode ?? 0);
        } else {
            return json_decode($response, 1) ?? [];
        }
    }

    /**
     * @param  string $action
     * @param  array  $params
     * @throws \Exception
     * @return array
     */
    public function post(string $action, array $params = [])
    {
        $params = array_merge($params, $this->getBaseParams());
        $params['api_action'] = $action;

        $response = $this->curl->post($this->getUrl(), $params);

        if ($this->curl->error) {
            throw new \Exception($this->curl->errorMessage, $this->curl->httpStatusCode ?? 0);
        } else {
            return json_decode($response, 1) ?? [];
        }
    }
}
