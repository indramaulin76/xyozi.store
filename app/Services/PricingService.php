<?php

declare(strict_types=1);

namespace App\Services;

/**
 * Central place for profit / tier price fields from provider base cost and api_provider margins.
 */
class PricingService
{
    /**
     * Raw profit amounts per tier (not selling prices).
     *
     * @param array{profit?:numeric, profit_basic?:numeric, profit_gold?:numeric, profit_platinum?:numeric} $apiRow
     * @return array{profit:float, profit_basic:float, profit_gold:float, profit_platinum:float}
     */
    public function profitAmounts(float $hargaProvider, array $apiRow): array
    {
        $p  = (float) ($apiRow['profit'] ?? 0);
        $pb = (float) ($apiRow['profit_basic'] ?? 0);
        $pg = (float) ($apiRow['profit_gold'] ?? 0);
        $pp = (float) ($apiRow['profit_platinum'] ?? 0);

        return [
            'profit'            => $hargaProvider * $p / 100,
            'profit_basic'      => $hargaProvider * $pb / 100,
            'profit_gold'       => $hargaProvider * $pg / 100,
            'profit_platinum'   => $hargaProvider * $pp / 100,
        ];
    }

    /**
     * Full produk-style price fields for sync/import.
     *
     * @param array{profit?:numeric, profit_basic?:numeric, profit_gold?:numeric, profit_platinum?:numeric} $apiRow
     * @return array<string, float>
     */
    public function tierPricingFromProviderCost(float $hargaProvider, array $apiRow): array
    {
        $a = $this->profitAmounts($hargaProvider, $apiRow);

        return [
            'harga_provider'      => $hargaProvider,
            'harga_jual'          => $hargaProvider + $a['profit'],
            'harga_basic'       => $hargaProvider + $a['profit_basic'],
            'harga_gold'          => $hargaProvider + $a['profit_gold'],
            'harga_platinum'      => $hargaProvider + $a['profit_platinum'],
            'keuntungan'          => $a['profit'],
            'keuntungan_basic'    => $a['profit_basic'],
            'keuntungan_gold'     => $a['profit_gold'],
            'keuntungan_platinum' => $a['profit_platinum'],
        ];
    }

    /**
     * Resolve displayed/charged price from posted productPrice against stored tier prices.
     *
     * @param array{harga_jual?:numeric, harga_basic?:numeric, harga_gold?:numeric, harga_platinum?:numeric} $produkRow
     */
    public function resolveSellingPrice(string|float|int $postedPrice, array $produkRow): float
    {
        // Loose equality matches string vs float harga from JSON seperti perilaku lama.
        $posted = $postedPrice;
        $hj     = $produkRow['harga_jual'] ?? 0;
        $hb     = $produkRow['harga_basic'] ?? 0;
        $hg     = $produkRow['harga_gold'] ?? 0;
        $hp     = $produkRow['harga_platinum'] ?? 0;

        if ($posted == $hj) {
            return (float) $hj;
        }
        if ($posted == $hb) {
            return (float) $hb;
        }
        if ($posted == $hg) {
            return (float) $hg;
        }
        if ($posted == $hp) {
            return (float) $hp;
        }

        return (float) $hj;
    }
}
