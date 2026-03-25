<?php

declare(strict_types=1);

namespace App\Services\Providers;

use App\Models\ApiProviderModel;
use InvalidArgumentException;
use RuntimeException;

class ProviderGatewayFactory
{
    public function __construct(
        private readonly ApiProviderModel $apiProviderModel = new ApiProviderModel(),
        private readonly CurlHttpClient $http = new CurlHttpClient()
    ) {
    }

    /**
     * @throws RuntimeException when api row missing
     */
    private function row(string $kode): array
    {
        $row = $this->apiProviderModel->where('kode', $kode)->first();
        if ($row === null) {
            throw new RuntimeException('API provider not configured: ' . $kode);
        }

        return $row;
    }

    public function vip(): VipResellerGateway
    {
        return new VipResellerGateway($this->row('Vip'), $this->http);
    }

    public function digiflazz(): DigiflazzGateway
    {
        return new DigiflazzGateway($this->row('DF'), $this->http);
    }

    public function rg(): RgServerGateway
    {
        return new RgServerGateway($this->row('RG'), $this->http);
    }

    public function sakurupiah(): SakurupiahGateway
    {
        return new SakurupiahGateway($this->row('Sp'), $this->http);
    }

    public function fonnte(): FonnteGateway
    {
        return new FonnteGateway($this->row('Ft'), $this->http);
    }

    /**
     * @param 'Vip'|'DF'|'RG'|'Sp'|'Ft' $kode
     */
    public function byKode(string $kode): ProviderGatewayInterface
    {
        return match ($kode) {
            'Vip' => $this->vip(),
            'DF'  => $this->digiflazz(),
            'RG'  => $this->rg(),
            'Sp'  => $this->sakurupiah(),
            'Ft'  => $this->fonnte(),
            default => throw new InvalidArgumentException('Unknown provider kode: ' . $kode),
        };
    }
}
