# chuanglan-sms
创蓝253云通信

安装扩展:

	composer require firstphp/chuanglan-sms


注册服务:

    Firstphp\ChuanglanSms\Providers\ChuanglanSmsServiceProvider::class


发布配置:

	php artisan vendor:publish
	选择: [3 ] Provider: Firstphp\ChuanglanSms\Providers\ChuanglanSmsServiceProvider


发送日志表:

    php artisan migrate


编辑.env配置：

	SMS_ACCOUNT=lafdu83d
	SMS_PSWD=db123lafdu8

示例代码：

    use Firstphp\ChuanglanSms\Facades\ChuanglanSmsFactory;

    ......

    ChuanglanSmsFactory::sendSms('158xxxx4937', '23951');
