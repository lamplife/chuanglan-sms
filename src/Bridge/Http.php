<?php
/**
 * Created by PhpStorm.
 * User: 狂奔的螞蟻 <www.firstphp.com>
 * Date: 2019/4/26
 * Time: 下午14:07
 */
namespace Firstphp\ChuanglanSms\Bridge;

use GuzzleHttp\Client;

class Http
{

    /**
     * base uri
     */
    const BASE_URI = 'http://222.73.117.158/';

    protected $account;
    protected $pswd;


    public function __construct($account, $pswd, $baseUri = '')
    {
        $this->account = $account;
        $this->pswd = $pswd;

        $this->client = new Client([
            'base_uri' => $baseUri ? $baseUri : static::BASE_URI,
            'timeout' => 200,
            'verify' => false,
        ]);
    }


    public function setAccount($account)
    {
        $this->account = $account;
    }


    public function setPswd($pswd)
    {
        $this->pswd = $pswd;
    }


    public function __call($name, $arguments)
    {
        if ($this->account) {
            $arguments[0] .= (stripos($arguments[0], '?') ? '&' : '?') . 'account=' . $this->account;
        }
        if ($this->pswd) {
            $arguments[0] .= (stripos($arguments[0], '?') ? '&' : '?') . 'pswd=' . $this->pswd;
        }

        $response = $this->client->$name($arguments[0], $arguments[1])->getBody()->getContents();
        return $this->execResult($response);
    }


    /**
     * 处理返回值
     */
    public function execResult($result){
        $result=preg_split("/[,\r\n]/",$result);
        return $result;
    }


}