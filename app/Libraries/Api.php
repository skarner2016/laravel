<?php

namespace App\Libraries;

use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * 统一返回
 * Class Api
 * @package App\Libraries
 */
class Api
{
    /**
     * @desc    请求成功返回
     * @param array $data
     * @return \Illuminate\Http\JsonResponse|JsonResponse
     * @author  panjunda@heyuedi.net <2021-12-09 15:18>
     */
    public static function success(array $data = [])
    {
        $response = [
            'code'    => ErrorCode::SUCCESS,
            'message' => ErrorCode::getMessage(ErrorCode::SUCCESS),
            'data'    => $data,
        ];

        // collection paginate
        if ($data instanceof ResourceCollection && $data->resource instanceof LengthAwarePaginator) {
            $resource         = $data->resource;
            $response['meta'] = [
                'page'      => $resource->currentPage(),
                'per_page'  => $resource->perPage(),
                'total'     => $resource->total(),
                'last_page' => $resource->lastPage(),
            ];
        }

        // paginate
        if ($data instanceof LengthAwarePaginator) {
            $response['data'] = $data->items();
            $response['meta'] = [
                'page'      => $data->currentPage(),
                'per_page'  => $data->currentPage(),
                'total'     => $data->total(),
                'last_page' => $data->lastPage(),
            ];
        }

        return self::responseJson($response);
    }

    /**
     * @desc    统一返回
     * @param array $response
     * @return \Illuminate\Http\JsonResponse
     * @author  panjunda@heyuedi.net <2021-12-09 15:18>
     */
    public static function responseJson(array $response)
    {
        return response()->json($response)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    /**
     * @desc    请求失败返回
     * @param null $code
     * @param null $message
     * @return \Illuminate\Http\JsonResponse
     * @author  panjunda@heyuedi.net <2021-12-09 15:20>
     */
    public static function fail($code = null, $message = null)
    {
        $code     = $code ?: ErrorCode::ERROR;
        $response = [
            'code'    => $code,
            'message' => $message ?: ErrorCode::getMessage($code),
        ];

        return self::responseJson($response);
    }
}
