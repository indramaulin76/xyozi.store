<?php

declare(strict_types=1);

namespace App\Services\Providers;

/**
 * Vip Reseller — game-feature API (order, status, services, nickname).
 */
class VipResellerGateway implements ProviderGatewayInterface
{
    public const BASE_URL = 'https://vip-reseller.co.id/api/game-feature';

    public function __construct(
        private readonly array $apiRow,
        private readonly CurlHttpClient $http = new CurlHttpClient()
    ) {
    }

    public function providerKode(): string
    {
        return 'Vip';
    }

    public function signature(): string
    {
        return md5((string) $this->apiRow['api_id'] . (string) $this->apiRow['api_key']);
    }

    /**
     * @return array<string, mixed>|null Decoded JSON or null if invalid.
     */
    public function gameFeature(array $postFields): ?array
    {
        $res = $this->http->postForm(self::BASE_URL, $postFields);
        if ($res['errno'] !== 0) {
            return null;
        }
        $decoded = json_decode($res['body'], true);

        return is_array($decoded) ? $decoded : null;
    }
}
