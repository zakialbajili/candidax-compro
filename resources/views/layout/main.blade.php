<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/assets/images/web/logo_candidax.png">
    <title>@yield('title', 'Candidax')</title>
    <meta name="description" content="@yield('description', 'Candidax sebagai solusi pengelolaan dan pengembangan Sumber Daya Manusia di Indonesia. Ambil peran dalam mendukung kebutuhan perusahaan maupun individu pencari kerja dalam membangun karir dan masa depannya.')">
    <meta property="og:title" content="@yield('title', 'Candidax')">
    <meta property="og:description" content="@yield('description', 'Candidax sebagai solusi pengelolaan dan pengembangan Sumber Daya Manusia di Indonesia. Ambil peran dalam mendukung kebutuhan perusahaan maupun individu pencari kerja dalam membangun karir dan masa depannya.')">
    <meta property="og:image" content="/assets/images/web/logo_candidax.png">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Candidax')">
    <meta name="twitter:description" content="@yield('description', 'Candidax sebagai solusi pengelolaan dan pengembangan Sumber Daya Manusia di Indonesia. Ambil peran dalam mendukung kebutuhan perusahaan maupun individu pencari kerja dalam membangun karir dan masa depannya.')">
    <meta name="twitter:image" content="/assets/images/web/logo_candidax.png">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-nav.navbar />
    @yield('content')
    <x-footer.footer />
</body>

</html>