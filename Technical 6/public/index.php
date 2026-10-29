<?php

// InfinityFree fallback entry point. A normal Laravel deployment uses this file
// through Laravel's vendor/autoload.php. This fallback keeps the four required
// pages working when shared hosting cannot run Composer during upload.

require_once __DIR__ . '/../app/Data/POSData.php';

use App\Data\POSData;

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$path = rtrim($path, '/') ?: '/';
$base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
if ($base !== '' && $base !== '/' && str_starts_with($path, $base)) {
    $path = substr($path, strlen($base)) ?: '/';
}

$nav = '<nav class="nav"><a class="brand" href="/">POS <span>Foundations</span></a><div class="links"><a href="/">Home</a><a href="/about">About</a><a href="/customers">Customers</a><a href="/users">Users</a></div></nav>';
$css = '<style>:root{--ink:#172033;--muted:#667085;--line:#e7eaf0;--bg:#f6f8fb;--brand:#4f46e5;--brand-dark:#3730a3;--green:#0f9f6e}*{box-sizing:border-box}body{margin:0;font-family:Inter,Arial,sans-serif;background:var(--bg);color:var(--ink)}a{color:inherit;text-decoration:none}.nav{height:72px;background:#fff;border-bottom:1px solid var(--line);display:flex;align-items:center;justify-content:space-between;padding:0 6%;position:sticky;top:0}.brand{font-weight:800;font-size:20px}.brand span{color:var(--brand)}.links{display:flex;gap:8px}.links a{padding:10px 14px;border-radius:10px;color:#596275;font-size:14px;font-weight:650}.links a:hover{background:#eef0ff;color:var(--brand-dark)}.wrap{max-width:1120px;margin:0 auto;padding:64px 24px}.hero{display:grid;grid-template-columns:1.1fr .9fr;gap:42px;align-items:center;padding:34px 0 68px}.eyebrow{text-transform:uppercase;letter-spacing:.14em;color:var(--brand);font-weight:800;font-size:12px}.hero h1,.page-head h1{letter-spacing:-.06em}.hero h1{font-size:clamp(38px,6vw,68px);line-height:1.03;margin:16px 0}.hero p,.page-head p,.card p{color:var(--muted);line-height:1.7}.button{display:inline-block;background:var(--brand);color:#fff;padding:13px 18px;border-radius:11px;font-weight:750}.hero-card{background:linear-gradient(145deg,#1f2a54,#4f46e5);border-radius:24px;color:#fff;padding:30px}.metric{font-size:54px;font-weight:850;margin:18px 0 4px}.grid,.about-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}.about-grid{grid-template-columns:1fr 1fr}.card{background:#fff;border:1px solid var(--line);border-radius:18px;padding:24px}.card h3{margin:0 0 8px}.page-head{margin-bottom:26px}.page-head h1{font-size:40px;margin:0 0 8px}.table-wrap{overflow:auto;background:#fff;border:1px solid var(--line);border-radius:16px}.data{border-collapse:collapse;width:100%;min-width:700px}.data th,.data td{text-align:left;padding:16px 18px;border-bottom:1px solid var(--line);font-size:14px}.data th{font-size:12px;text-transform:uppercase;color:#7a8498;background:#fbfcfe}.id{font-weight:750;color:var(--brand-dark)}.badge{display:inline-block;border-radius:999px;padding:5px 10px;font-size:12px;font-weight:750;background:#e9f8f1;color:var(--green)}.off{background:#f1f2f5;color:#7a8498}.footer{color:#8a93a5;text-align:center;padding:28px 24px 42px;font-size:13px}@media(max-width:760px){.hero,.about-grid,.grid{grid-template-columns:1fr}.links{gap:0}.links a{padding:8px;font-size:12px}.wrap{padding:42px 18px}}</style>';
$title = 'POS Foundations';
$content = '';
if ($path === '/') {
    $title = 'Home';
    $content = '<section class="hero"><div><div class="eyebrow">Laravel point of sale foundations</div><h1>Simple pages. Clear MVC structure.</h1><p>A four-page POS foundation built with Laravel routes, controllers, Blade views, and temporary static PHP arrays.</p><a class="button" href="/customers">View customer accounts</a></div><div class="hero-card"><div> SYSTEM STATUS</div><div class="metric">04</div><div>connected application pages</div></div></section><section class="grid"><div class="card"><h3>Route driven</h3><p>Every page is connected through a named route in routes/web.php.</p></div><div class="card"><h3>Controller ready</h3><p>Controllers prepare the page response and pass data to Blade views.</p></div><div class="card"><h3>Easy to extend</h3><p>Static records can later be replaced with models and database queries.</p></div></section>';
} elseif ($path === '/about') {
    $title = 'About';
    $content = '<div class="page-head"><div class="eyebrow">Project overview</div><h1>About the application</h1><p>This page explains the purpose and structure of the Laravel POS foundation.</p></div><div class="about-grid"><div class="card"><h3>What this demonstrates</h3><p>The application transfers MVC responsibilities learned in CodeIgniter into Laravel.</p></div><div class="card"><h3>Temporary data source</h3><p>Customer and user records are stored as PHP arrays while the project is being built.</p></div><div class="card"><h3>Application pages</h3><p>Use the navigation to open all four required pages.</p></div><div class="card"><h3>Technology</h3><p>Laravel, PHP, Blade templates, named routes, controllers, migrations, and a seeder.</p></div></div>';
} elseif ($path === '/customers' || $path === '/users') {
    $isCustomers = $path === '/customers';
    $title = $isCustomers ? 'Customer Accounts' : 'User Accounts';
    $records = $isCustomers ? POSData::customers() : POSData::users();
    $headers = $isCustomers ? ['ID','Full Name','Email','Phone'] : ['ID','Username','Full Name'];
    $content = '<div class="page-head"><div class="eyebrow">Account management</div><h1>'.$title.'</h1><p>Sample records supplied by the application controller.</p></div><div class="table-wrap"><table class="data"><thead><tr>';
    foreach ($headers as $header) { $content .= '<th>'.htmlspecialchars($header).'</th>'; }
    $content .= '</tr></thead><tbody>';
    foreach ($records as $record) {
        $content .= '<tr><td class="id">'.htmlspecialchars((string) $record['id']).'</td>';
        if ($isCustomers) {
            $content .= '<td>'.htmlspecialchars($record['full_name']).'</td><td>'.htmlspecialchars($record['email']).'</td><td>'.htmlspecialchars($record['phone']).'</td>';
        } else {
            $content .= '<td>'.htmlspecialchars($record['username']).'</td><td>'.htmlspecialchars($record['full_name']).'</td>';
        }
        $content .= '</tr>';
    }
    $content .= '</tbody></table></div>';
} else {
    http_response_code(404);
    $title = 'Page not found';
    $content = '<div class="page-head"><h1>404</h1><p>The requested page could not be found.</p></div>';
}
echo '<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>'.htmlspecialchars($title).' | POS Foundations</title>'.$css.'</head><body>'.$nav.'<main class="wrap">'.$content.'</main><footer class="footer">IT0049 Web System Technologies · Laravel MVC Foundations</footer></body></html>';
