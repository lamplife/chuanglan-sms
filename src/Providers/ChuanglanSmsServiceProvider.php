<?php
namespace Firstphp\ChuanglanSms\Providers;

use Illuminate\Support\ServiceProvider;
use Firstphp\ChuanglanSms\Services\ChuanglanSmsService;
use Illuminate\Support\Facades\Config;

class ChuanglanSmsServiceProvider extends ServiceProvider
{

    protected $defer = false;

    protected $migrations = [
        'CreateSmsLog' => '2018_04_23_174241_create_sms_log_table',
    ];


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../Config/chuanglanSms.php' => config_path('chuanglanSms.php')
        ], 'config');

        $this->publishes([
            __DIR__ . '/../migrations/' => database_path('migrations')
        ], 'migrations');
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ChuanglanSmsService', function () {
            $config = Config::get('chuanglanSms');
            return new ChuanglanSmsService($config['account'], $config['pswd']);
        });
    }


    /**
     * Publish migration files.
     *
     * @return void
     */
    protected function migration()
    {
        foreach ($this->migrations as $class => $file) {
            if (!class_exists($class)) {
                $this->publishMigration($file);
            }
        }
    }


    /**
     * Publish a single migration file.
     *
     * @param string $filename
     * @return void
     */
    protected function publishMigration($filename)
    {
        $extension = '.php';
        $filename = trim($filename, $extension) . $extension;
        $stub = __DIR__ . '/../migrations/' . $filename;
        $target = $this->getMigrationFilepath($filename);
        $this->publishes([$stub => $target], 'migrations');
    }


    /**
     * Get the migration file path.
     *
     * @param string $filename
     * @return string
     */
    protected function getMigrationFilepath($filename)
    {
        if (function_exists('database_path')) {
            return database_path('/migrations/' . $filename);
        }
        return base_path('/database/migrations/' . $filename); // @codeCoverageIgnore
    }

}
