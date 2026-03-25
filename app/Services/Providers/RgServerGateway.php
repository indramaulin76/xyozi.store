<?php

declare(strict_types=1);

namespace App\Services\Providers;

/**
 * RG Moba server API.
 */
class RgServerGateway implements ProviderGatewayInterface
{
    public const URL_GAMES = 'https://server.rgmoba.com/api/get/games';

    public const URL_DURASI = 'https://server.rgmoba.com/api/get/durasi';

    public const URL_REGISTER = 'https://server.rgmoba.com/api/order/register';

    public function __construct(
        private readonly array $apiRow,
        private readonly CurlHttpClient $http = new CurlHttpClient()
    ) {
    }

    public function providerKode(): string
    {
        return 'RG';
    }

    public function apiKey(): string
    {
        return (string) $this->apiRow['api_key'];
    }

    /**
     * @return array<string, mixed>|null
     */
    public function listGames(): ?array
    {
        $res = $this->http->postForm(self::URL_GAMES, ['api_key' => $this->apiKey()]);
        if ($res['errno'] !== 0) {
            return null;
        }
        $decoded = json_decode($res['body'], true);

        return is_array($decoded) ? $decoded : null;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function listDurasi(string $gameCode): ?array
    {
        $res = $this->http->postForm(self::URL_DURASI, [
            'api_key' => $this->apiKey(),
            'game'    => $gameCode,
        ]);
        if ($res['errno'] !== 0) {
            return null;
        }
        $decoded = json_decode($res['body'], true);

        return is_array($decoded) ? $decoded : null;
    }

    /**
     * @param array<string, mixed> $dataPost api_key, nama, durasi, game, max_devices
     * @return array<string, mixed>|null
     */
    public function registerOrder(array $dataPost): ?array
    {
        $res = $this->http->postForm(self::URL_REGISTER, $dataPost);
        if ($res['errno'] !== 0) {
            return null;
        }
        $decoded = json_decode($res['body'], true);

        return is_array($decoded) ? $decoded : null;
    }
}
