<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/assets/user/components.chunk.css?v={{$verison}}">
    <link rel="stylesheet" href="/assets/user/umi.css?v={{$verison}}">
    <link rel="stylesheet" href="/assets/user/custom.css?v={{$verison}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no">
    <title>{{$title}}</title>
    <script>window.routerBase = "/";</script>
    <script>
        window.settings = {
            title: '{{$title}}',
            theme: {
                sidebar: '{{$theme_sidebar}}',
                header: '{{$theme_header}}',
                color: '{{$theme_color}}',
            },
            verison: '{{$verison}}',
            background_url: '{{$background_url}}',
            description: '{{$description}}',
            crisp_id: '{{$crisp_id}}'
        }
    </script>
</head>

<body>
<div id="root"></div>
<script src="/assets/user/vendors.async.js?v={{$verison}}"></script>
<script src="/assets/user/components.async.js?v={{$verison}}"></script>
<script src="/assets/user/umi.js?v={{$verison}}"></script>

</body>

</html>
