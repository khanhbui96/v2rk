<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no"
    />

    <title>{{$title}}</title>
    <link rel="shortcut icon" href="/assets/admin/favicons/favicon-32x32.png"/>
    <link
        rel="icon"
        type="image/png"
        sizes="192x192"
        href="/assets/admin/favicons/android-icon-192x192.png"
    />
    <link
        rel="apple-touch-icon"
        sizes="180x180"
        href="/assets/admin/favicons/apple-touch-icon-180x180.png"
    />
    <link rel="stylesheet" href="/assets/admin/vendors.chunk.css?v={{$version}}"/>
    <link rel="stylesheet" href="/assets/admin/compoments.chunk.css?v={{$version}}"/>
    <link rel="stylesheet" href="/assets/admin/custom.css?v={{$version}}">
    <script>window.routerBase = "/";</script>
    <script>
        window.settings = {
            title: '{{$title}}',
            theme: {
                sidebar: '{{$theme_sidebar}}',
                header: '{{$theme_header}}',
                color: '{{$theme_color}}',
            },
            description:"管理后台",
            version: '{{$version}}',
            background_url: '{{$background_url}}'
        }
    </script>
</head>


<body>
<div id="root"></div>
<script src="/assets/admin/vendors.js?v={{$version}}"></script>
<script src="/assets/admin/compoments.js?v={{$version}}"></script>
<script src="/assets/admin/umi.js?v={{$version}}"></script>
</body>
</html>
