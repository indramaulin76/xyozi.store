<?php

declare(strict_types=1);

namespace App\Services\Providers;

/**
 * Fonnte WhatsApp send API.
 */
class FonnteGateway implements ProviderGatewayInterface
{
    public const URL_SEND = 'https://api.fonnte.com/send';

    public function __construct(
        private readonly array $apiRow,
        private readonly CurlHttpClient $http = new CurlHttpClient()
    ) {
    }

    public function providerKode(): string
    {
        return 'Ft';
    }

    public function sendMessage(string $target, string $message): string|false
    {
        $apiKey = (string) $this->apiRow['api_key'];
        $res    = $this->http->postForm(self::URL_SEND, [
            'target'  => $target,
            'message' => $message,
        ], ['Authorization: ' . $apiKey]);

        if ($res['errno'] !== 0) {
            return false;
        }

        return $res['body'];
    }
}
