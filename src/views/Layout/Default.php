<!DOCTYPE html>
<html lang="en" id="element" class="dark antialiased [--scrollbar-size:theme(width.4)] motion-safe:scroll-smooth">

<head>
    <!-- META -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width" />
    <link href="https://VoxelCraft.ru/" rel="canonical">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="VoxelCraft">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:title" content="Приватный Minecraft сервер — VoxelCraft title1">
    <meta
        content="Это приватный сервер созданный для динамичной и cплoчённой игры людей. На нашем сервере отсутствуют лишние плагины вроде /sethome или /tpa. meta1"
        name="description">
    <meta
        content="Это приватный сервер созданный для динамичной и cплoчённой игры людей. На нашем сервере отсутствуют лишние плагины вроде /sethome или /tpa. meta2"
        name="og:description">
    <meta itemprop="description"
        content="Это приватный сервер созданный для динамичной и cплoчённой игры людей. На нашем сервере отсутствуют лишние плагины вроде /sethome или /tpa. meta3">
    <meta property="og:image" content="https://VoxelCraft.ru/og-image.jpg">
    <meta content="911" property="og:image:width">
    <meta content="364" property="og:image:height">
    <meta name="twitter:image" content="https://VoxelCraft.ru/og-image.jpg">
    <meta content="summary_large_image" name="twitter:card">
    <meta content="max-snippet:-1, max-image-preview:large, max-video-preview:-1" name="robots">
    <meta http-equiv="Expires" content="Tue, 01 Jan 1995 12:12:12 GMT">
    <meta http-equiv="Pragma" content="no-cache">
    
    <!-- CSS -->
    <?=$css?>

    <!-- FAVICON -->
    <link rel="icon" href="public\images\favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="public\images\favicon.ico" type="image/x-icon">

    <!-- TAILWIND -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/public/js/Tailwind.js"></script>
    <link rel="stylesheet" href="/public/css/Index.css">

    <!-- CHART -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.js"></script>


    

    <title><?= $title ?></title>
</head>

<body>

    <div class="root">
        <?= $view ?>
    </div>


    <?=$js?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>


</html>