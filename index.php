<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="assets/stylesheets/app.css">
        <script src="js/vendor/modernizr-2.7.1.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <header>
            <h1>Assembly Watch</h1>
        </header>
        <main>
            <?php
                error_reporting(E_ALL);

                $raw = file_get_contents('http://www.richmondsunlight.com/downloads/law-changes.json');
                $data = json_decode($raw, true);

                function clean_json($source, $property) {
                    $cleaned = [];
                    $duplicates = [];

                    foreach($source as $item) {
                        if(!in_array($item[$property], $exists)) {
                            $cleaned[] = $item;
                            $exists[] = $item[$property];
                        }
                    }

                    return $cleaned;
                }

                $data = clean_json($data, 'bill_catch_line');
            ?>
            <pre><?php // var_dump($data[0]); ?></pre>
            <table>
                <thead>
                    <tr>
                        <th>Number</th>
                        <th>Description</th>
                        <th>Law</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $item) { ?>
                    <tr class="bill">
                        <td class="number"><?php echo $item['bill_number']; ?></td>
                        <td class="description"><a href="<?php echo $item['url']; ?>" target="_blank"><?php echo $item['bill_catch_line']; ?></a></td>
                        <td class="law"><?php echo $item['law']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
        <footer>&nbsp;</footer>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
