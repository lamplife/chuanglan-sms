<?php
/**
 * Created by PhpStorm.
 * User: 狂奔的螞蟻 <www.firstphp.com>
 * Date: 2019/4/26
 * Time: 下午13:28
 */

namespace Firstphp\ChuanglanSms\Services;

use Firstphp\ChuanglanSms\Bridge\Http;

class ChuanglanSmsService
{

    protected $account;
    protected $pswd;

    public function __construct($account = '', $pswd = '')
    {
        $this->account = $account;
        $this->pswd = $pswd;
        $this->http = new Http($this->account, $this->pswd);
    }



    /**
     * 发送短信
     *
     * @param string $mobile 手机号码
     * @param string $msg 短信内容
     * @param string $needstatus 是否需要状态报告
     */
    public function sendSms($mobile, $msg, $needstatus = 'true')
    {
        return $this->http->post('msg/HttpBatchSendSM', [
            'form_params' => [
                'msg' => $msg,
                'mobile' => $mobile,
                'needstatus' => $needstatus
            ]
        ]);
    }


}