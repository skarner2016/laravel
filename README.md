## laravel-api-starter
便于新项目快速启动，避免每次新项目花费时间做大量重复工作。

## 功能
* laravel-ide-helper
* barryvdh/laravel-cors
* beyondcode/laravel-self-diagnosis
* composer script (production、local)，开发&上线只需运行一个Artisan命令
* Api Exception异常类（\App\Exceptions\ApiException::class）
* 封装统一返回类 (\App\Libraries\Api::class)
* 封装统一业务代码类 (\App\Libraries\Code::class)
* 封装统一枚举类 (\App\Libraries\Enums::class）
* 记录请求&返回日志（\App\Http\Middleware\ApiLog::class）
