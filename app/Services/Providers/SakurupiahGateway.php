<?php

declare(strict_types=1);

namespace App\Services\Providers;

/**
 * Sakurupiah payment create API.
 */
class SakurupiahGateway implements ProviderGatewayInterface
{
    public const URL_CREATE = 'https://sakurupiah.id/api/create.php';

    public function __construct(
        private readonly array $apiRow,
        private readonly CurlHttpClient $http = new CurlHttpClient()
    ) {
    }

    public function providerKode(): string
    {
        return 'Sp';
    }

    public function buildCreateSignature(string $apiId, string $method, string $merchantRef, string|float|int $amount): string
    {
        $apiKey = (string) $this->apiRow['api_key'];

        return hash_hmac('sha256', $apiId . $method . $merchantRef . $amount, $apiKey);
    }

    /**
     * @param array<string, mixed> $dataPOST body fields including signature
     * @return array<string, mixed>|null decoded JSON
     */
    public function createTransaction(array $dataPOST): ?array
    {
        $apiKey = (string) $this->apiRow['api_key'];
        $headers = ['Authorization: Bearer ' . $apiKey];
        $res     = $this->http->postUrlEncoded(self::URL_CREATE, $dataPOST, $headers);
        if ($res['errno'] !== 0) {
            return null;
        }
        $decoded = json_decode($res['body'], true);

        return is_array($decoded) ? $decoded : null;
    }

    /**
     * Verify webhook body (raw string) using X-Callback-Signature.
     */
    public function verifyCallbackSignature(string $rawBody, string $headerSignature): bool
    {
        $apiKey    = (string) $this->apiRow['api_key'];
        $expected  = hash_hmac('sha256', $rawBody, $apiKey);
        $headerSig = trim($headerSignature);

        return $headerSig !== '' && hash_equals($expected, $headerSig);
    }
}
