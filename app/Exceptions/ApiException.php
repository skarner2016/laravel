<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use App\Libraries\Api;

/**
 * Class    ApiException
 * @package App\Exceptions
 * @desc    自定义Api异常（用于全局捕获异常，统一处理）
 * @author  panjunda@heyuedi.net <2021-12-09 17:08>
 */
class ApiException extends Exception
{
    public function __construct($code = 0, $message = "", Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render()
    {
        return Api::fail($this->getCode(), $this->getMessage());
    }
}
