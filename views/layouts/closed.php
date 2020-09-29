<?php
header('HTTP/1.1 503 Service Temporarily Unavailable');
header('Retry-After: 3600');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>503 Service Temporarily Unavailable</title>
    <style>
        html, body {
            width: 100%;
            height: 100%;
        }

        body {
            font-family: arial;
            background: linear-gradient(135deg, rgba(254, 255, 255, 1) 0%, rgba(238, 238, 238, 1) 37%, rgba(221, 221, 221, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#feffff', endColorstr='#dddddd', GradientType=1);
        }

        h1 {
            font-size: 160%;
            text-align: center;
            text-shadow: 0 1px 0 #e61b05, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 4px 0 #b9b9b9, 0 5px 0 #aaa, 0 6px 1px rgba(0, 0, 0, .1), 0 0 5px rgba(0, 0, 0, .1), 0 1px 3px rgba(0, 0, 0, .3), 0 3px 5px rgba(0, 0, 0, .2), 0 5px 10px rgba(0, 0, 0, .25), 0 10px 10px rgba(0, 0, 0, .2), 0 20px 20px rgba(0, 0, 0, .15);
            color: #000;
            margin: 2em;
        }

        div {
            width: 20em;
            margin: 0 auto;
            font-size: 110%;
        }
    </style>
</head>
<body>
<h1>К сожалению, сайт сейчас находиться на техобслуживании !</h1>
<div><span style="opacity:.5">Причина: </span><br/>
    <span style="font-weight:bold">
    	Идёт смена дизайна. В ближайшее время мы вновь возобновим свою работу. Оставайтесь с нами =)
    </span></div>
</body>
</html>