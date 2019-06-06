<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sopa de letras</title>
    <!-- <link rel="stylesheet" type="text/css" href="sopa.css"> -->
    <link rel="stylesheet" href="<?php echo base_url('public/css/sopa.css'); ?>">
</head>

<body>
    <div width="100px">
        <?php echo $pregunta; ?><br>
        <?php
        $palabras = "";
        foreach ($respuestas as $key => $r) {
            $palabras .= $r['respuesta'] . ",";
        }
        $palabras_pulidas = rtrim($palabras, ",");;
        echo $palabras_pulidas;
        ?>

        <div>El juego conciste en encontrar las siguientes palabras <span id="time">01:00</span> minutes!</div>
        <div id="theGrid" width="100%" style="display: block;"></div>
        <input type="button" onclick="inicia();" value="iniciar">
    </div>
    <script>
        function startTimer(duration, display) {
            var timer = duration,
                minutes, seconds;
            setInterval(function() {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                    console.log('termino');
                }
            }, 1000);
        }

        function inicia() {
            var fiveMinutes = 60 * 1,
                display = document.querySelector('#time');
            startTimer(fiveMinutes, display);
        }

        // window.onload = function () {
        //     var fiveMinutes = 60 * 5,
        //         display = document.querySelector('#time');
        //     startTimer(fiveMinutes, display);
        // };
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('public/js/sopa.js'); ?>"></script>
    <script>
        (function(b) {
            b.support.touch = "ontouchend" in document;
            if (!b.support.touch) {
                return;
            }
            var c = b.ui.mouse.prototype,
                e = c._mouseInit,
                a;

            function d(g, h) {
                if (g.originalEvent.touches.length > 1) {
                    return;
                }
                g.preventDefault();
                var i = g.originalEvent.changedTouches[0],
                    f = document.createEvent("MouseEvents");
                f.initMouseEvent(h, true, true, window, 1, i.screenX, i.screenY, i.clientX, i.clientY, false, false, false, false, 0, null);
                g.target.dispatchEvent(f);
            }
            c._touchStart = function(g) {
                var f = this;
                if (a || !f._mouseCapture(g.originalEvent.changedTouches[0])) {
                    return;
                }
                a = true;
                f._touchMoved = false;
                d(g, "mouseover");
                d(g, "mousemove");
                d(g, "mousedown");
            };
            c._touchMove = function(f) {
                if (!a) {
                    return;
                }
                this._touchMoved = true;
                d(f, "mousemove");
            };
            c._touchEnd = function(f) {
                if (!a) {
                    return;
                }
                d(f, "mouseup");
                d(f, "mouseout");
                if (!this._touchMoved) {
                    d(f, "click");
                }
                a = false;
            };
            c._mouseInit = function() {
                var f = this;
                f.element.bind("touchstart", b.proxy(f, "_touchStart")).bind("touchmove", b.proxy(f, "_touchMove")).bind("touchend", b.proxy(f, "_touchEnd"));
                e.call(f);
            };
        })(jQuery);

        $(document).ready(function() {
            var words = "<?php echo $palabras_pulidas; ?>";
            //attach the game to a div
            $("#theGrid").wordsearchwidget({
                "wordlist": words,
                "gridsize": 12,
                // "width" : 300
            });
        });
    </script>
</body>

</html>