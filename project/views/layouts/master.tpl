<!doctype html>
<html lang="en">
<head>
    {block name="meta"}
        <title>Cowin-Alternate</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    {/block}
    {block name="styles"}
        <link rel="icon" href="favicon.ico" sizes="16x16">
        <link href="{asset name="css/main.css"}" rel="stylesheet">
        <style>
            p {
                margin-bottom: 0;
            }
        </style>
    {/block}
</head>
<body>

    <nav class="navbar bg-primary" style="margin-bottom: 0px">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" style="color: white; font-weight: 700" href="#">Cowin-Alternate</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid" style="padding: 0">
        <img class="img-responsive" src="/images/banner.jpeg" style="width: 100%">
    </div>
    <div class="container" style="margin-top: 30px">
        {block name="body"}{/block}
    </div>

    <script src="{asset name="js/main.js"}"></script>
</body>
</html>
