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

    /*
    $RemindMsg  = array(
         '0' =>'发送成功',
        '101'=>'无此用户',
        '102'=>'密码错',
        '103'=>'提交过快',
        '104'=>'系统忙',
        '105'=>'敏感短信',
        '106'=>'消息长度错',
        '107'=>'错误的手机号码',
        '108'=>'手机号码个数错',
        '109'=>'无发送额度',
        '110'=>'不在发送时间内',
        '111'=>'超出该账户当月发送额度限制',
        '112'=>'无此产品',
        '113'=>'extno格式错',
        '115'=>'自动审核驳回',
        '116'=>'签名不合法，未带签名',
        '117'=>'IP地址认证错',
        '118'=>'用户没有相应的发送权限',
        '119'=>'用户已过期',
        '120'=>'内容不是白名单',
    );
     */
    
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
     * @param string $mobile 手机号码,批量发送,多个号码","隔开
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