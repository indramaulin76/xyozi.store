<?php

declare(strict_types=1);

namespace App\Services\Providers;

/**
 * Small HTTP helper to keep curl details in one place.
 */
class CurlHttpClient
{
    /**
     * @return array{body:string, errno:int, error:string, http_code:int}
     */
    public function postForm(string $url, array $fields, array $headers = []): array
    {
        return $this->request('POST', $url, [
            CURLOPT_POSTFIELDS => $fields,
        ], $headers, false);
    }

    /**
     * @return array{body:string, errno:int, error:string, http_code:int}
     */
    public function postJson(string $url, array $payload, array $headers = []): array
    {
        $headers[] = 'Content-Type: application/json';

        return $this->request('POST', $url, [
            CURLOPT_POSTFIELDS => json_encode($payload, JSON_THROW_ON_ERROR),
        ], $headers, false);
    }

    /**
     * @return array{body:string, errno:int, error:string, http_code:int}
     */
    public function postUrlEncoded(string $url, array $fields, array $headers = []): array
    {
        return $this->request('POST', $url, [
            CURLOPT_POSTFIELDS => http_build_query($fields),
        ], $headers, false);
    }

    /**
     * @param array<int, string> $headers
     * @return array{body:string, errno:int, error:string, http_code:int}
     */
    private function request(string $method, string $url, array $curlExtra, array $headers, bool $customRequestOnly): array
    {
        $ch = curl_init($url);
        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 60,
        ];
        if ($customRequestOnly) {
            $options[CURLOPT_CUSTOMREQUEST] = $method;
        } else {
            $options[CURLOPT_POST] = true;
        }
        if ($headers !== []) {
            $options[CURLOPT_HTTPHEADER] = $headers;
        }
        $options = $curlExtra + $options;
        curl_setopt_array($ch, $options);
        $body = curl_exec($ch);
        $errno = curl_errno($ch);
        $error = curl_error($ch);
        $httpCode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return [
            'body'       => $body === false ? '' : (string) $body,
            'errno'      => $errno,
            'error'      => $error,
            'http_code'  => $httpCode,
        ];
    }
}
