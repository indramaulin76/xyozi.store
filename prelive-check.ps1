param(
    [Parameter(Mandatory = $true)]
    [string]$BaseUrl,

    [Parameter(Mandatory = $false)]
    [string]$InternalKey = ""
)

Set-StrictMode -Version Latest
$ErrorActionPreference = "Stop"

function Invoke-Check {
    param(
        [string]$Name,
        [string]$Url,
        [string]$Method = "GET",
        [hashtable]$Headers = @{},
        [int[]]$ExpectedStatus = @(200)
    )

    $statusCode = -1
    $ok = $false
    $note = ""

    try {
        if ($Method -eq "POST") {
            $resp = Invoke-WebRequest -Uri $Url -Method Post -Headers $Headers -UseBasicParsing -TimeoutSec 20
        } else {
            $resp = Invoke-WebRequest -Uri $Url -Method Get -Headers $Headers -UseBasicParsing -TimeoutSec 20
        }
        $statusCode = [int]$resp.StatusCode
    } catch {
        if ($_.Exception.Response) {
            $statusCode = [int]$_.Exception.Response.StatusCode.value__
        } else {
            $note = $_.Exception.Message
        }
    }

    if ($ExpectedStatus -contains $statusCode) {
        $ok = $true
    } elseif ($note -eq "") {
        $note = "Expected: $($ExpectedStatus -join ', ')"
    }

    return [PSCustomObject]@{
        Check  = $Name
        Method = $Method
        Url    = $Url
        Status = $statusCode
        Result = if ($ok) { "PASS" } else { "FAIL" }
        Note   = $note
    }
}

function Join-Url {
    param(
        [string]$Base,
        [string]$Path
    )
    $cleanBase = $Base.TrimEnd('/')
    $cleanPath = $Path.TrimStart('/')
    return "$cleanBase/$cleanPath"
}

$checks = @()

# Public pages
$checks += Invoke-Check -Name "Homepage" -Url (Join-Url $BaseUrl "/") -ExpectedStatus @(200)
$checks += Invoke-Check -Name "Login page" -Url (Join-Url $BaseUrl "/masuk") -ExpectedStatus @(200)
$checks += Invoke-Check -Name "Register page" -Url (Join-Url $BaseUrl "/daftar") -ExpectedStatus @(200)
$checks += Invoke-Check -Name "Service page" -Url (Join-Url $BaseUrl "/service") -ExpectedStatus @(200)
$checks += Invoke-Check -Name "API docs page" -Url (Join-Url $BaseUrl "/api/docs") -ExpectedStatus @(200)

# Static assets
$checks += Invoke-Check -Name "Main CSS" -Url (Join-Url $BaseUrl "/css/main.min.css") -ExpectedStatus @(200)
$checks += Invoke-Check -Name "Main JS" -Url (Join-Url $BaseUrl "/js/main.min.js") -ExpectedStatus @(200)
$checks += Invoke-Check -Name "Swiper CSS" -Url (Join-Url $BaseUrl "/new/assets/css/swiper.min.css") -ExpectedStatus @(200)

# Unknown route must be 404
$checks += Invoke-Check -Name "Unknown route returns 404" -Url (Join-Url $BaseUrl "/halaman-tidak-ada-prelive") -ExpectedStatus @(404)

# Internal route locked without key
$checks += Invoke-Check -Name "Internal route blocked without key" -Url (Join-Url $BaseUrl "/sistem/get-produkVip") -ExpectedStatus @(403)

# Internal route with key (optional)
if ($InternalKey -ne "") {
    $checks += Invoke-Check `
        -Name "Internal route with key" `
        -Url (Join-Url $BaseUrl "/sistem/get-produkVip") `
        -Headers @{ "X-Internal-Key" = $InternalKey } `
        -ExpectedStatus @(200, 500)
}

# API method restriction
$checks += Invoke-Check -Name "API profile GET blocked" -Url (Join-Url $BaseUrl "/api/profile") -Method "GET" -ExpectedStatus @(404)
$checks += Invoke-Check -Name "API profile POST routed" -Url (Join-Url $BaseUrl "/api/profile") -Method "POST" -ExpectedStatus @(200, 400, 401, 403, 422, 500)

Write-Host ""
Write-Host "=== Prelive Check Result ===" -ForegroundColor Cyan
$checks | Format-Table -AutoSize

$failCount = @($checks | Where-Object { $_.Result -eq "FAIL" }).Count
$passCount = @($checks | Where-Object { $_.Result -eq "PASS" }).Count

Write-Host ""
Write-Host "PASS: $passCount" -ForegroundColor Green
Write-Host "FAIL: $failCount" -ForegroundColor Red

if ($failCount -gt 0) {
    exit 1
}

exit 0
