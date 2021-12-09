<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

/**
 * Class    LogMiddleware
 * @package App\Http\Middleware
 * @desc    记录请求/返回日志
 * @author  panjunda@heyuedi.net <2021-12-09 17:24>
 */
class ApiLog
{
    /**
     * @desc    记录请求/返回日志
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @author  panjunda@heyuedi.net <2021-12-09 17:54>
     */
    public function handle(Request $request, Closure $next)
    {
        if (!app()->environment('local')) {
            return $next($request);
        }

        if (!config("app.log")) {
            return $next($request);
        }

        // 处理请求
        $response = $next($request);

        // 记录日志
        $this->sendLog($request, $response);

        return $response;
    }

    private function sendLog(Request $request, $response)
    {
        $log = $request->url();

        // 请求参数
        if (!empty($request->all())) {
            $log .= '?' . http_build_query($request->all());
            $log = rtrim($log, '?');
        }

        // 返回参数
        if ($response instanceof JsonResponse) {
            $log .= PHP_EOL . $response->content();
        }

        Log::channel('request')->debug($log . PHP_EOL);
    }
}
