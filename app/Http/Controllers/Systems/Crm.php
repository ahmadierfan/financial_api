<?php
namespace App\Http\Controllers\Systems;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Crm extends Controller
{
    function createUser($user)
    {
        $userArray = $user->toArray();

        $userArray['created_at'] = \Carbon\Carbon::parse($userArray['created_at'])->format('Y-m-d H:i:s');
        $userArray['updated_at'] = \Carbon\Carbon::parse($userArray['updated_at'])->format('Y-m-d H:i:s');

        DB::connection('mysqlcrm')->table('users')->insert($userArray);
    }
    function updateUser($user, $id)
    {
        DB::connection('mysqlcrm')->table('users')->where('id', $id)->update($user);
    }
    public function forwardRequest(Request $request, $any)
    {
        $fullPath = $request->path();

        $targetUrl = rtrim(env('CRM_SERVICE')) . $fullPath;

        try {
            $headers = collect($request->headers->all())->except(['host', 'content-length'])->toArray();
            $options = ['query' => $request->query(), 'timeout' => 10];

            if ($request->isMethod('post') || $request->isMethod('put') || $request->isMethod('patch')) {
                $contentType = $request->header('Content-Type');
                if ($contentType == 'application/json') {
                    $options['json'] = $request->all();
                } elseif (str_starts_with($contentType, 'multipart/form-data')) {
                    $data = $request->all();
                    $token = $request->bearerToken();
                    $files = $request->allFiles();
                    $multiData = [];
                    $multiFile = [];
                    foreach ($data as $key => $value) {
                        $multiData[$key] = $value;
                    }
                    foreach ($files as $key => $file) {
                        $multiFile[] = [
                            'name' => $key,
                            'contents' => fopen($file->getPathname(), 'r'),
                            'filename' => $file->getClientOriginalName()
                        ];
                    }
                    $response = Http::withToken($token)
                        ->withHeaders(['Accept-Language' => 'fa'])
                        ->attach($multiFile)
                        ->post($targetUrl, $multiData);
                    return response($response->body(), $response->status())->withHeaders($response->headers());

                } else {
                    $options['form_params'] = $request->all();
                }
            }
            $response = Http::withHeaders($headers)->send($request->method(), $targetUrl, $options);
            return response($response->body(), $response->status())->withHeaders($response->headers());
        } catch (\Exception $e) {
            Log::error('Error forwarding request', ['error' => $e->getMessage(), 'url' => $targetUrl]);
            return response()->json(['message' => 'CRM Service unavailable'], 503);
        }
    }
}