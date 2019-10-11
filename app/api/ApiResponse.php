<?php

namespace app\api;


trait ApiResponse
{
    /**
     * 返回成功消息
     * @param $message
     * @param int $code
     */
    public function success($message = 'success',$code = 0)
    {
        $result = [
            'code' => $code,
            'status' => true,
            'message' => $message,
        ];
        return json($result,200);
    }


    /**
     * 返回失败消息
     * @param $message
     * @param int $code
     */
    public function failed($message = 'failed',$code = -1)
    {
        $result = [
            'code' => $code,
            'status' => false,
            'message' => $message,
        ];
        return json($result);
    }

    /**
     * 返回数据
     * @param array $data
     * @param string $message
     * @param int $code
     */
    public function data($data = array(),$message = 'success',$code = 0)
    {
        $result = [
            'code' => $code,
            'status' => true,
            'message' => $message,
            'data' => $data,
        ];
        return json($result);
    }


}
