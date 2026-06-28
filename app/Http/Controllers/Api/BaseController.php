<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
class BaseController extends Controller 
{
    /**
     * Response Wrapper untuk kondisi sukses
     */
    // Contoh isi fungsi success di BaseController
public function success($data, $message = "Success", $code = 200) {
    return response()->json([
        'status' => true, // Pastikan key ini ada
        'message' => $message,
        'data' => $data
    ], $code);
}
    /**
     * Response Wrapper untuk kondisi error
     */
    protected function error($message = null, $code = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $code);
    }
}