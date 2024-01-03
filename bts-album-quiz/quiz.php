<!doctype html>
<html>
    <head>
        <title>BTS Quiz</title>
        <style>
            #error {
                background-color: #E14278;
                color: white;
                padding: 10px;
                font-size: 100%;
                width: 500px;
                height: 15px;
                text-align: center;
                margin: auto;
                margin-top: 10px;
                margin-bottom: 10px;
                border-radius: 15px;
            }
            select {
                margin-bottom: 20px;
            }
            body {
                background-color: #FFE9F1;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
            form {
                text-align: center;
                display: flex; 
                flex-direction: column;
                justify-content: center;
                margin-top: 30px;
            }
            #submit {
                width: 100px;
                height: auto;
                background-color: white;
                text-transform: uppercase;
                text-align: center;
                margin: auto;
            }
            #submit:hover {
                background-color: #F4B7CC;
                border-width: 4px;
                border-color: black;
            }
            div {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            select {
                font-family: 'Georgia';
                background-color: #F4B7CC;
                border-color: black;
                color: black;
                border-width: 3px;
                text-align: center;
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
            button {
                width: 150px;
                height: auto;
                text-align: center;
                margin: auto;
                background-color: #F4B7CC;
                border-width: 4px;
                border-color: black;
                margin-top: 25px;
            }
            #result {
                width: 400px;
                height: auto;
                text-align: center;
                margin: auto;
                background-color: #F4B7CC;
                border-width: 4px;
                border-color: black;
                margin-top: 25px;

            }
            #img {
                width: 400px;
                height: auto;
                border-style: solid;
                border-color: black;
                border-width: 5px;
                margin: auto;
                margin-top: 30px;
            }
        </style>
    </head>
    <body>
        <h1>Which BTS Album Should You Listen To?</h1>

        <?php

            if ($_COOKIE['album']) {
                print "<hr>";
                print '<div id="result">You should listen to <strong>' . $_COOKIE['album'] . '</strong></div>';
                if ($_COOKIE['album'] == "You Never Walk Alone") {
                    print'<img id="img" src="ynwa.jpg">';
                } else if ($_COOKIE['album'] == "Dark & Wild") {
                    print'<img id="img" src="dw.jpg">';
                } else if ($_COOKIE['album'] == "Love Yourself: Answer") {
                    print'<img id="img" src="lya.jpg">';
                } else {
                    print'<img id="img" src="yf.jpg">';
                }
                print "<a href=clear.php><button>Take Again?</button></a>";
                print "<hr>";
                print "<a href=results.php>See Aggregate Results</a>";
            }

            else {

        ?>

        <?php
            if ($_GET['error'] == 'forgot') {
        ?>

            <div id="error">You forgot a value! Please complete all of the questions.</div>

        <?php
            }
        ?>
        
            <form action="processresults.php" method="POST">
            <div>
                What is your favorite music genre?
                <select name="genre" id="genre">
                    <option value="">Select an answer</option>
                    <option value="rap">Rap</option>
                    <option value="rb">R&B</option>
                    <option value="pop">Pop</option>
                    <option value="edm">EDM</option>
                </select>
            </div>
                
            <div>
                Which color do you like the most?
                <select name="color" id="color">
                    <option value="">Select an answer</option>
                    <option value="pink">Pink</option>
                    <option value="blue">Blue</option>
                    <option value="yellow">Yellow</option>
                    <option value="black">Black</option>
                </select>
            </div>
                
            <div>
                Which word pairs describes your personality the most?
                <select name="words" id="words">
                    <option value="">Select an answer</option>
                    <option value="ef">Energetic/Fun</option>
                    <option value="ep">Emotional/Passionate</option>
                    <option value="sg">Shy/Gentle</option>
                    <option value="sp">Smart/Perceptive</option>
                </select>
            </div>
                
            <div>
                Which sign group are you part of?
                <select name="sign" id="sign">
                    <option value="">Select an answer</option>
                    <option value="air">Air (aquarius, gemini, libra)</option>
                    <option value="water">Water (pisces, cancer, scorpio)</option>
                    <option value="earth">Earth (taurus, virgo, capricorn)</option>
                    <option value="fire">Fire (aries, leo, sagittarius)</option>
                </select>
            </div>
               
                <input id="submit" type="submit">
            </form>

            <hr>

        <?php
                print "<a href=results.php>See Aggregate Results</a>";
            }
        ?>

    </body>
</html>

