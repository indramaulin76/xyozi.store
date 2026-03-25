<?php

declare(strict_types=1);

namespace App\Services\Providers;

/**
 * Digiflazz prepaid API (price-list, transaction).
 */
class DigiflazzGateway implements ProviderGatewayInterface
{
    public const URL_PRICE_LIST = 'https://api.digiflazz.com/v1/price-list';

    public const URL_TRANSACTION = 'https://api.digiflazz.com/v1/transaction';

    public function __construct(
        private readonly array $apiRow,
        private readonly CurlHttpClient $http = new CurlHttpClient()
    ) {
    }

    public function providerKode(): string
    {
        return 'DF';
    }

    public function priceListSign(): string
    {
        $u = (string) $this->apiRow['api_id'];
        $k = (string) $this->apiRow['api_key'];

        return md5($u . $k . 'pricelist');
    }

    public function transactionSign(string $refId): string
    {
        $u = (string) $this->apiRow['api_id'];
        $k = (string) $this->apiRow['api_key'];

        return md5($u . $k . $refId);
    }

    /**
     * @return array<string, mixed>|null
     */
    public function fetchPriceListPrepaid(): ?array
    {
        $payload = [
            'cmd'      => 'prepaid',
            'username' => (string) $this->apiRow['api_id'],
            'sign'     => $this->priceListSign(),
        ];
        $res = $this->http->postJson(self::URL_PRICE_LIST, $payload);
        if ($res['errno'] !== 0) {
            return null;
        }
        $decoded = json_decode($res['body'], true);

        return is_array($decoded) ? $decoded : null;
    }

    /**
     * @param array<string, mixed> $postData username, buyer_sku_code, customer_no, ref_id, sign
     * @return array<string, mixed>|null
     */
    public function transaction(array $postData): ?array
    {
        $res = $this->http->postJson(self::URL_TRANSACTION, $postData);
        if ($res['errno'] !== 0) {
            return null;
        }
        $decoded = json_decode($res['body'], true);

        return is_array($decoded) ? $decoded : null;
    }
}
