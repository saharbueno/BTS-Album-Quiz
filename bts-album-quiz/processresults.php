<?php

    // grab the incoming data
    $genre = $_POST['genre'];
    $color = $_POST['color'];
    $words = $_POST['words'];
    $sign = $_POST['sign'];

    // validate the data
    if ((!$genre || !$color) || (!$words || !$sign)) {
        // send them back to the form and tell them
        // to fill it out
        header("Location: quiz.php?error=forgot");
        exit();
    }

    // create variables that count for each album
    $ynwa = 0;
    $lya = 0;
    $dw = 0;
    $yf = 0;
    
    // diagnose which album the user should listen to 

    // add point to album based on genre
    if ($genre == 'rb') {
        $yf = $yf + 1;
    }
    else if ($genre == 'rap') {
        $dw = $dw + 1;
    }
    else if ($genre == 'pop') {
        $ynwa = $ynwa + 1;
    } else {
        $lya = $lya + 1;
    }

    // add point to album based on color
    if ($color == 'yellow') {
        $yf = $yf + 1;
    }
    else if ($color == 'black') {
        $dw = $dw + 1;
    }
    else if ($color == 'blue') {
        $ynwa = $ynwa + 1;
    } else {
        $lya = $lya + 1;
    }

    // add point to album based on words
    if ($words == 'sg') {
        $yf = $yf + 1;
    }
    else if ($words == 'sp') {
        $dw = $dw + 1;
    }
    else if ($words == 'ep') {
        $ynwa = $ynwa + 1;
    } else {
        $lya = $lya + 1;
    }

    // add point to album based on genre
    if ($sign == 'air') {
        $yf = $yf + 1;
    }
    else if ($sign == 'fire') {
        $dw = $dw + 1;
    }
    else if ($sign == 'water') {
        $ynwa = $ynwa + 1;
    } else {
        $lya = $lya + 1;
    }

    if (($yf > $dw && $yf > $ynwa) && ($yf > $lya)) {
        $album = "Young Forever";
    } else if (($dw > $yf && $dw > $ynwa) && ($dw > $lya)) {
        $album = "Dark & Wild";
    } else if (($ynwa > $yf && $ynwa > $dw) && ($ynwa > $lya)) {
        $album = "You Never Walk Alone";
    } else if (($lya > $yf && $lya > $dw) && ($lya > $ynwa)) {
        $album = "Love Yourself: Answer";
    } else {
        if (($yf == $dw) || ($yf == $ynwa) || ($yf == $lya)) {
            $album = "Young Forever";
        } else if (($dw == $ynwa) or ($dw == $lya)) {
            $album = "Dark & Wild";
        } else if ($ynwa == $lya) {
            $album = "You Never Walk Alone";
        } else {
            $album = "Love Yourself: Answer";
        }
    }

    // save the data to a file on the server
    $filename = getcwd() . '/data/results.txt';
    file_put_contents($filename, $album . "\n", FILE_APPEND);

    // set cookie
    setcookie('album', $album);

    // send them back so they can see their result
    header("Location: quiz.php");
    exit();

?>