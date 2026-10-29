<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'POS Foundations' }} | Laravel</title>
    <style>
        :root{--ink:#172033;--muted:#667085;--line:#e7eaf0;--bg:#f6f8fb;--brand:#4f46e5;--brand-dark:#3730a3;--green:#0f9f6e;}
        *{box-sizing:border-box} body{margin:0;font-family:Inter,ui-sans-serif,system-ui,-apple-system,"Segoe UI",sans-serif;background:var(--bg);color:var(--ink)}
        a{color:inherit;text-decoration:none}.nav{height:72px;background:#fff;border-bottom:1px solid var(--line);display:flex;align-items:center;justify-content:space-between;padding:0 clamp(20px,5vw,72px);position:sticky;top:0;z-index:2}.brand{font-weight:800;letter-spacing:-.03em;font-size:20px}.brand span{color:var(--brand)}.links{display:flex;gap:8px;align-items:center}.links a{padding:10px 14px;border-radius:10px;color:#596275;font-size:14px;font-weight:650}.links a:hover,.links a.active{background:#eef0ff;color:var(--brand-dark)}
        .wrap{max-width:1120px;margin:0 auto;padding:64px 24px}.hero{display:grid;grid-template-columns:1.1fr .9fr;gap:42px;align-items:center;padding:34px 0 68px}.eyebrow{text-transform:uppercase;letter-spacing:.14em;color:var(--brand);font-weight:800;font-size:12px}.hero h1{font-size:clamp(38px,6vw,68px);line-height:1.03;letter-spacing:-.06em;margin:16px 0}.hero p{font-size:18px;line-height:1.7;color:var(--muted);max-width:620px}.button{display:inline-block;background:var(--brand);color:#fff;padding:13px 18px;border-radius:11px;font-weight:750;margin-top:12px}.button:hover{background:var(--brand-dark)}.hero-card{background:linear-gradient(145deg,#1f2a54,#4f46e5);border-radius:24px;color:#fff;padding:30px;box-shadow:0 20px 50px #3741a82b}.hero-card .mini{color:#c9d0ff;font-size:13px}.metric{font-size:54px;font-weight:850;letter-spacing:-.07em;margin:18px 0 4px}.metric-label{color:#dce0ff}.grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}.card{background:#fff;border:1px solid var(--line);border-radius:18px;padding:24px}.card h3{margin:0 0 8px;font-size:17px}.card p{color:var(--muted);line-height:1.6;margin:0}.page-head{margin-bottom:26px}.page-head h1{font-size:40px;letter-spacing:-.05em;margin:0 0 8px}.page-head p{color:var(--muted);margin:0}.table-wrap{overflow:auto;background:#fff;border:1px solid var(--line);border-radius:16px}.data{border-collapse:collapse;width:100%;min-width:700px}.data th,.data td{text-align:left;padding:16px 18px;border-bottom:1px solid var(--line);font-size:14px}.data th{font-size:12px;text-transform:uppercase;letter-spacing:.08em;color:#7a8498;background:#fbfcfe}.data tr:last-child td{border-bottom:0}.id{font-weight:750;color:var(--brand-dark)}.badge{display:inline-block;border-radius:999px;padding:5px 10px;font-size:12px;font-weight:750;background:#e9f8f1;color:var(--green)}.badge.off{background:#f1f2f5;color:#7a8498}.about-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px}.footer{color:#8a93a5;text-align:center;padding:28px 24px 42px;font-size:13px}
        @media(max-width:760px){.links a{padding:8px;font-size:12px}.hero,.about-grid{grid-template-columns:1fr}.hero{padding-top:12px}.grid{grid-template-columns:1fr}.nav{padding:0 14px}.brand{font-size:17px}.links{gap:0}.wrap{padding:42px 18px}}
    </style>
</head>
<body>
    <nav class="nav">
        <a class="brand" href="{{ url('/') }}">POS <span>Foundations</span></a>
        <div class="links">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/about') }}">About</a>
            <a href="{{ url('/customers') }}">Customers</a>
            <a href="{{ url('/users') }}">Users</a>
        </div>
    </nav>
    <main class="wrap">@yield('content')</main>
    <footer class="footer">IT0049 Web System Technologies · Laravel MVC Foundations</footer>
</body>
</html>
