<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;


class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
        if ($result) {

            $response = [
                'success' => true,
                'data'    => $result,
                'message' => $message,
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'success' => false,
                'data'    => $result,
                'message' => 'not found',
            ];

            return response()->json($response, 404);
        }
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
