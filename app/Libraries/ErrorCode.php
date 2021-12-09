<?php

namespace App\Libraries;

use Illuminate\Support\Arr;

/**
 * Class    ErrorCode
 * @package App\Libraries
 * @desc    返回状态码(业务代码)
 * @author  panjunda@heyuedi.net <2021-12-09 15:17>
 */
class ErrorCode
{
    // 错误代码
    const SUCCESS = 200;
    const ERROR   = 500;

    const PARAM_ERROR = 422;

    /**
     * @desc    错误信息
     * @return string[]
     * @author  panjunda@heyuedi.net <2021-12-09 15:17>
     */
    public function messages(): array
    {
        return __("error") ?? [];
    }

    /**
     * @desc    获取错误信息
     * @param int $code
     * @return string
     * @author  panjunda@heyuedi.net <2021-12-09 15:17>
     */
    public static function getMessage(int $code): string
    {
        $messages = (new self())->messages();

        return Arr::get($messages, $code, 'network error');
    }
}
