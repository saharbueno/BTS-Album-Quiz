<!doctype html>
<html>
    <head>
        <title>BTS Quiz Results</title>
        <style>
            body {
                background-color: #FFE9F1;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
            div {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            h1 {
                font-family: 'Georgia';
                border-style: groove;
                border-color: black;
                width: 500px;
                height: auto;
                border-radius: 15px;
                margin: auto;
                text-align: center;
                padding: 10px;
                margin-top: 25px;
                background-color: rgba(244, 183, 204, 0.5);
            }
            h1:hover {
                background-color: rgba(244, 183, 204, 0.25);
            }
            hr {
                background-color: black;
                color: black;
                width: 70%;
                border-width: 2px;
                margin-top: 20px;
                border-style: solid;
            }
            a {
                margin: auto;
                color: black;
                display: flex;
                justify-content: center;
            }
            a:hover {
                color:  #F277A1;
            }
            .block {
                height: 60px;
                margin: 5px;
                color: white;
                font-size: 80%;
            }
            p {
                margin: 5px;
            }
        </style>
    </head>
    <body>
<?php

    print "<h1>BTS Album Quiz Results</h1>";

    // start by opening the text file
    $filename = getcwd() . '/data/results.txt';

    $data = file_get_contents($filename);

    // turn data into array
    $albumNames = explode("\n", $data);

    // set up variables to count albums
    $ynwa = 0;
    $lya = 0;
    $dw = 0;
    $yf = 0;
    $total = 0;

    // count the number of characters
    for ($i = 0; $i < sizeof($albumNames); $i++) {
        if ($albumNames[$i] == "Dark & Wild") {
            $total += 1;
            $dw += 1;
        } else if ($albumNames[$i] == "Love Yourself: Answer") {
            $total += 1;
            $lya += 1;
        } else if ($albumNames[$i] == "Young Forever") {
            $total += 1;
            $yf += 1;
        } else if ($albumNames[$i] == "You Never Walk Alone") {
            $total += 1;
            $ynwa += 1;
        }
    }
    
    // provide results to the user
    $widthdw = floor($dw / $total * 100);
    $widthyf = floor($yf / $total * 100);
    $widthynwa = floor($ynwa / $total * 100);
    $widthlya = floor($lya / $total * 100);
    if ($widthdw == 0) {
        $widthdw = 5;
    }
    if ($widthyf == 0) {
        $widthyf = 5;
    }
    if ($widthlya == 0) {
        $widthlya = 5;
    }
    if ($widthynwa == 0) {
        $widthynwa = 5;
    }

    print "<p>In total there have been " . $total . " quiz submissions.<p>";
    print '<div class="block" style="width:' . $widthynwa .'%;background-color:#EE96BF;">You Never Walk Alone ' . floor($ynwa / $total * 100) . '%</div>';
    print '<div class="block" style="width:' . $widthyf .'%;background-color:#B3718F;">Young Forever ' . floor($yf / $total * 100) . '%</div>';
    print '<div class="block" style="width:' . $widthdw .'%;background-color:#593848;">Dark & Wild ' . floor($dw / $total * 100) . '%</div>';
    print '<div class="block" style="width:' . $widthlya .'%;background-color:#1E1318;">Love Yourself: Answer ' . floor($lya / $total * 100) . '%</div>';
    print "<hr>";
    print '<a href=clear.php>Back to Quiz</a>';
?>
    </body>
</html>

