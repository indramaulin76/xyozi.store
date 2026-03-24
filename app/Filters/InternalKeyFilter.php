<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class InternalKeyFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $expectedKey = trim((string) getenv('internal.systemKey'));
        $headerKey = trim((string) ($request->getHeaderLine('X-Internal-Key') ?? ''));
        $queryKey = trim((string) ($request->getGet('key') ?? ''));
        $providedKey = $headerKey !== '' ? $headerKey : $queryKey;

        // Block access when key is missing, unset, or invalid.
        if ($expectedKey === '' || $providedKey === '' || ! hash_equals($expectedKey, $providedKey)) {
            return service('response')
                ->setStatusCode(403)
                ->setJSON([
                    'success' => false,
                    'message' => 'Forbidden',
                ]);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No-op.
    }
}
