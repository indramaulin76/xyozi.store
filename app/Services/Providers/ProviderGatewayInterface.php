<?php

declare(strict_types=1);

namespace App\Services\Providers;

/**
 * Marker for gateways that map to a row in api_provider (kode).
 */
interface ProviderGatewayInterface
{
    /**
     * Provider code as stored in api_provider.kode (e.g. Vip, DF, RG).
     */
    public function providerKode(): string;
}
