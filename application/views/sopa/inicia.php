<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sopa de letras</title>
    <!-- <link rel="stylesheet" type="text/css" href="sopa.css"> -->
    <link rel="stylesheet" href="<?php echo base_url('public/css/sopa.css'); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Handlee&display=swap" rel="stylesheet">
    <style type="text/css">
        body {
          background: url("<?php echo base_url("/public/img/fnd_nsopa.jpeg"); ?>") repeat; 
        } 
        .titulo{
            font-family: 'Luckiest Guy', cursive;
            /*font-size: 50px;*/
            /*color: #ff0000;*/
            color: #FFF;
              /*font-family: "Kanit";*/
              font-size: 36px;
              line-height: 1em;
              margin: 0;
              /*position: absolute;*/
              text-align: center;
              top: 50%;
              /*transform: translateY(-50%);*/
              /*width: 100%;*/
              text-shadow: 0 1px 0 #e4adad, 0 2px 0 #e1a6a6, 0 3px 0 #df9e9e, 0 4px 0 #dc9696, 0 5px 0 #da8f8f, 0 6px 0 #d78787, 0 7px 0 #d58080, 0 8px 0 #d27878, 0 0 5px rgba(237, 154, 154, 0.05), 0 -1px 3px rgba(237, 154, 154, 0.2), 0 9px 9px rgba(237, 154, 154, 0.5), 0 12px 12px rgba(237, 154, 154, 0.5), 0 15px 15px rgba(237, 154, 154, 0.5);
        }
        .contenidos{
            font-family: 'Handlee', cursive;
            font-size: 20px;
            /*color: #ff0000;*/
            font-weight: bolder;
        }
        #txt_tutorial {
          position: absolute;
          left: 0px;
          top: 0px;
          z-index: +1;
          /*background: #ff0000;*/
        }
    </style>
</head>

<body>
<?php //echo date("Y-m-d H:i:s"); ?>

    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
 -->

<div class="container-fluid">

    <!-- Modal -->
    <div class="modal fade" id="modalInicial" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalInicialLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title contenidos" id="modalInicialLabel" style="color: #ff0000">SOPA DE LETRAS</h5>
    <!--         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
     -->      </div>
          <div class="modal-body">
            <p class="contenidos">
                El juego conciste en encontrar las palabras dentro
                de la sopa de letras, tienes 2 minutos para poder
                superar esta prueba.
                Si consigues encontrar todas las palabras tendras
                10 puntos ganados.
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success btn-lg btn-block" onclick="cierra_modal_inicio();">JUGAR</button>
            <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Jugar</button> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Modal 2 -->

    <!-- Modal cierre de tiempo -->
    <div class="modal fade" id="modalTiempo" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalTiempoLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title contenidos" id="modalTiempoLabel" style="color: #ff0000">SOPA DE LETRAS</h5>
    <!--         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
     -->      </div>
          <div class="modal-body">
            <p class="contenidos">
                TU TIEMPO HA FINALIZADO!!!
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning btn-lg btn-block" onclick="reinicia_juego();">JUGAR</button>
            <button type="button" class="btn btn-primary btn-lg btn-block" onclick="ir_menu();">MENU</button>
            <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Jugar</button> -->
            <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Jugar</button> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Fin modal cierre de tiempo -->

    <!-- Modal ganaste -->
    <div class="modal fade" id="modalGano" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalGanoLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title contenidos" id="modalGanoLabel" style="color: #ff0000">SOPA DE LETRAS</h5>
    <!--         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
     -->      </div>
          <div class="modal-body">
            <p class="contenidos">
                FELICIDADES LO LOGRASTE!!!
            </p>
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Jugar</button> -->
            <button type="button" class="btn btn-warning btn-lg btn-block" onclick="reinicia_juego();">JUGAR</button>
            <button type="button" class="btn btn-primary btn-lg btn-block" onclick="ir_menu();">MENU</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin modal ganaste -->

  <div class="d-flex justify-content-center">
    <div class="col-12">
    <br>
    <p class="titulo">SOPA DE LETRAS</p>
    <p id="time" class="titulo">02:00</p>
    <div id="txt_tutorial">
        <p>&nbsp;</p>

<!--             <center>
            <div id="BOTjugar" onclick="inicia();" class="contenidos">JUGAR</div>
        </center>
-->        </div>
    <div id="sopa_contenidos" style="text-align: center;">
        <p class="contenidos" style="color: #f4df42;"><?php echo $pregunta; ?></p>
        <p class="contenidos" style="color: #ffffff;">
        <?php
            $palabras = "";
            foreach ($respuestas as $key => $r) {
                // echo $r['respuesta']." ";
                $palabras .= $r['respuesta'] . ",";
            }
            $palabras_pulidas = rtrim($palabras, ",");
            // echo $palabras_pulidas;
        ?>
        </p>
        <!-- <p class="contenidos" style="color: #ffffff;"><?php //echo $palabras_pulidas; ?></p> -->
        <!-- <div>El juego conciste en encontrar las siguientes palabras <span id="time">01:00</span> minutes!</div> -->
        <!-- <input type="button" onclick="inicia();" value="iniciar"> -->
        
    </div>


    </div>
  </div>

  <div class="d-flex justify-content-center">
    <div id="theGrid"></div>
  </div>
  <p></p>

  <div class="d-flex justify-content-center contenidos" style="color: #ffffff; font-size: 9pt;">
    <?php
        $palabras = "";
        foreach ($respuestas as $key => $r) {
            end($respuestas);
            echo $r['respuesta'];
            // echo ", ";
            if ($key != key($respuestas))
                // echo $r['respuesta'];
                echo ", ";
                // echo 'LAST ELEMENT!';
            // $palabras .= $r['respuesta'] . ",";
        }
        // echo $ret;
        // $palabras_pulidas = rtrim($palabras, ",");
        // echo $palabras_pulidas;
    ?>

  </div>  

</div>


<!-- </center> -->

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
                    $("#modalTiempo").modal('show');
                    $.ajax({
                         type: "POST",
                         url: '<?php echo base_url('sopa/guarda_puntaje'); ?>',
                         data: {"persona_id": "56", 'puntaje': '0'},
                         success: function(response){
                             // alert(response);
                         }
                    });

                    // console.log('termino');

                }
            }, 1000);
        }

        function inicia() {
            // $("#sopa_contenidos").toggle('slow');
            // $("#txt_tutorial").toggle('slow');
            // $("#time").toggle('slow');
            var fiveMinutes = 60 * 2,
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
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url('public/js/sopa.js'); ?>"></script> -->
    <script type="text/javascript">
        /*!
         * The Word Search Game Widget
         *
         * Copyright 2011, Ryan Fernandes (https://code.google.com/u/@VBFTRFJWDxFDXgJ4/)
         * Licensed under The MIT License.
         * see license.txt
         *
         */

        //==============================================================================
        //------------------------------------------------------------------------------
        //The Word Search Game Widget
        //------------------------------------------------------------------------------
        //
        //  ------
        //  Usage:
        //  ------
        //      $(document).ready( function () {
        //      var words = "earth,mars,mercury,neptune,pluto,saturn,jupiter,one,two,
        //              three,four,five,six,seven,eight,mozart,bach,meyer,rose,mahler";
        //      $("#theGrid").wordsearchwidget({"wordlist" : words,"gridsize" : 12});
        //  });
        //
        //  -------
        //  Inputs:
        //  -------
        //  gridsize - Size of grid to generate (this will be a square)
        //  wordlist - Comma separated list of words to place on the grid
        //
        //  -------------
        //  What it does:
        //  -------------
        //  Creates a grid of letters with words from the wordlist
        //  These words are randomly placed in the following directions
        //  1. Horizontal
        //  2. Vertical
        //  3. Left-Diagonal
        //  4. Right-Diagonal
        //  In addition, the letters are placed in forward or reverse order, randomly
        //  Provision is made to overlap words
        //
        //  The User is expected to click on a letter and drag to the last letter of the
        //  word. If the selected letters form a word that is in the word list the UI
        //  will indicate that by crossing it out from the wordlist
        //
        //  If the user cannot find a word, she has to click on that word in the
        //  wordlist and the UI will hightlight the word in the grid and cross it out
        //
        //  ------------------
        //  Technical Details:
        //  ------------------
        //
        //      Contains 3 areas:
        //          a) main game grid (#rf-searchgamecontainer)
        //          b) list of words to be found (#rf-wordcontainer)
        //          c) list of words that have been found (#rf-foundwordcontainer)
        //
        //      Data Structures used:
        //      ---------------------
        //          Objects related to the Data Model
        //          0) Model
        //              a) Grid
        //                  1) Cell
        //                  2) HorizontalPopulator
        //                  3) VerticalPopulator
        //                  4) LeftDiagonalPopulator
        //                  5) RightDiagonalPopulator
        //
        //              b) WordList
        //                  1) Word
        //
        //          Objects related to View
        //          1) Root
        //          2) Hotzone
        //          3) Arms
        //          4) Visualizer
        //
        //          Objects related to the controller
        //          1) GameWidgetHelper
        //
        //
        //==============================================================================
        var contador = 0;
        var cantidad_palabras=0;
        // console.log(this.model.wordList.words);
        (function ($, undefined) {

            $.widget("ryanf.wordsearchwidget", $.ui.mouse, {

                options: {
                    wordlist: null,
                    gridsize: 10
                },
                _mapEventToCell: function (event) {
                    var currentColumn = Math.ceil((event.pageX - this._cellX) / this._cellWidth);
                    var currentRow = Math.ceil((event.pageY - this._cellY) / this._cellHeight);
                    var el = $('#rf-tablegrid tr:nth-child(' + currentRow + ') td:nth-child(' + currentColumn + ')');
                    return el;
                },

                _create: function () {
                    //member variables
                    this.model = GameWidgetHelper.prepGrid(this.options.gridsize, this.options.wordlist)
                    this.startedAt = new Root();
                    this.hotzone = new Hotzone();
                    this.arms = new Arms();

                    GameWidgetHelper.renderGame(this.element[0], this.model);

                    this.options.distance = 0; // set mouse option property
                    this._mouseInit();

                    var cell = $('#rf-tablegrid tr:first td:first');
                    this._cellWidth = cell.outerWidth();
                    this._cellHeight = cell.outerHeight();
                    this._cellX = cell.offset().left;
                    this._cellY = cell.offset().top;
                },//_create

                destroy: function () {
                    this.hotzone.clean();
                    this.arms.clean();
                    this.startedAt.clean();
                    this._mouseDestroy();
                    return this;
                },

                //mouse callbacks
                _mouseStart: function (event) {

                    var panel = $(event.target).parents("div").attr("id");
                    if (panel == 'rf-searchgamecontainer') {
                        this.startedAt.setRoot(event.target);
                        this.hotzone.createZone(event.target)
                    }
                    else if (panel == 'rf-wordcontainer') {
                        //User has requested help. Identify the word on the grid
                        //We have a reference to the td in the cells that make up this word
                        var idx = $(event.target).parent().children().index(event.target);

                        var selectedWord = this.model.wordList.get(idx);
                        $(selectedWord.cellsUsed).each(function () {
                            Visualizer.highlight($(this.td));
                        });

                    }

                },

                _mouseDrag: function (event) {
                    event.target = this._mapEventToCell(event);
                    //if this.root - clear out everything and return to orignal clicked state
                    if (this.startedAt.isSameCell(event.target)) {
                        this.arms.returnToNormal();
                        this.hotzone.setChosen(-1);
                        return;
                    }
                    //if event is on an armed cell
                    if ($(event.target).hasClass("rf-armed") || $(event.target).hasClass("rf-glowing")) { //CHANGE!
                        //if in hotzone
                        var chosenOne = this.hotzone.index(event.target);
                        if (chosenOne != -1) {
                            //set target to glowing; set rest of hotzone to armed
                            this.hotzone.setChosen(chosenOne);
                            //calculate arms and set to armed
                            this.arms.deduceArm(this.startedAt.root, chosenOne);
                        } else { //in arms
                            //set glowing from target to root
                            this.arms.glowTo(event.target)
                        }
                    }

                },

                _mouseStop: function (event) {

                    //get word
                    var selectedword = '';
                    $('.rf-glowing, .rf-highlight', this.element[0]).each(function () {
                        var u = $.data(this, "cell");
                        selectedword += u.value;
                        // console.log(selectedword);
                    });

                    var wordIndex = this.model.wordList.isWordPresent(selectedword)
                    var cantidad_palabras = this.model.wordList.words.length;
                    console.log(cantidad_palabras);
                    if (wordIndex != -1) {
                        $('.rf-glowing, .rf-highlight', this.element[0]).each(function () {
                            Visualizer.select(this);
                            $.data(this, "selected", "true");

                        });
                        GameWidgetHelper.signalWordFound(wordIndex);
                        contador += 1;

                        // console.log(contador + ' si lo lograste');
                        if(cantidad_palabras == contador){
                            // console.log('lo lograste carajo!!!')
                            $.ajax({
                                 type: "POST",
                                 url: '<?php echo base_url('sopa/guarda_puntaje'); ?>',
                                 data: {"persona_id": "56", 'puntaje': '10'},
                                 success: function(response){
                                     // alert(response);
                                 }
                            });
                            $("#modalGano").modal('show');
                        }
                    }

                    this.hotzone.returnToNormal();
                    this.startedAt.returnToNormal();
                    this.arms.returnToNormal();
                }

            }
            ); //widget


            $.extend($.ryanf.wordsearchwidget, {
                version: "0.0.1"
            });

            //------------------------------------------------------------------------------
            // VIEW OBJECTS
            //------------------------------------------------------------------------------
            /*
                * The Arms represent the cells that are selectable once the hotzone has been
                * exited/passed
                */
            function Arms() {
                this.arms = null;

                //deduces the arm based on the cell from which it exited the hotzone.
                this.deduceArm = function (root, idx) {

                    this.returnToNormal(); //clear old arm
                    var ix = $(root).parent().children().index(root);

                    //create the new nominees
                    this.arms = new Array();

                    //create surrounding nominees
                    switch (idx) {
                        case 0: //horizontal left
                            this.arms = $(root).prevAll();
                            break;

                        case 1: //horizontal right
                            this.arms = $(root).nextAll();
                            break;

                        case 2: //vertical top
                            var $n = this.arms;
                            $(root).parent().prevAll().each(function () {
                                $n.push($(this).children().get(ix));
                            });

                            break;

                        case 3: //vertical bottom
                            var $o = this.arms;
                            $(root).parent().nextAll().each(function () {
                                $o.push($(this).children().get(ix));
                            });
                            break;

                        case 4: //right diagonal up

                            var $p = this.arms;

                            //for all prevAll rows
                            var currix = ix;
                            $(root).parent().prevAll().each(function () {
                                $p.push($(this).children().get(++currix));
                            });
                            break;

                        case 5: //left diagonal up
                            var $q = this.arms;

                            //for all prevAll rows
                            var currixq = ix;
                            $(root).parent().prevAll().each(function () {
                                $q.push($(this).children().get(--currixq));
                            });
                            break;

                        case 6: //left diagonal down
                            var $r = this.arms;
                            //for all nextAll rows
                            var currixr = ix;
                            $(root).parent().nextAll().each(function () {
                                $r.push($(this).children().get(++currixr));
                            });
                            break;

                        case 7: //right diagonal down
                            var $s = this.arms;
                            //for all nextAll rows
                            var currixs = ix;
                            $(root).parent().nextAll().each(function () {
                                $s.push($(this).children().get(--currixs));
                            });
                            break;


                    }
                    for (var x = 1; x < this.arms.length; x++) {
                        Visualizer.arm(this.arms[x]);
                    }
                }

                //lights up the cells that from the root cell tothe current one
                this.glowTo = function (upto) {
                    var to = $(this.arms).index(upto);

                    for (var x = 1; x < this.arms.length; x++) {

                        if (x <= to) {
                            Visualizer.glow(this.arms[x]);
                        }
                        else {
                            Visualizer.arm(this.arms[x]);

                        }
                    }
                }

                //clear out the arms
                this.returnToNormal = function () {
                    if (!this.arms) return;

                    for (var t = 1; t < this.arms.length; t++) { //don't clear the hotzone
                        Visualizer.restore(this.arms[t]);
                    }
                }


                this.clean = function () {
                    $(this.arms).each(function () {
                        Visualizer.clean(this);
                    });
                }

            }

            /*
                * Object that represents the cells that are selectable around the root cell
                */
            function Hotzone() {

                this.elems = null;

                //define the hotzone
                //select all neighboring cells as nominees
                this.createZone = function (root) {
                    this.elems = new Array();

                    var $tgt = $(root);
                    var ix = $tgt.parent().children().index($tgt);

                    var above = $tgt.parent().prev().children().get(ix); // above
                    var below = $tgt.parent().next().children().get(ix); // below

                    //nominatedCells.push(event.target); // self
                    this.elems.push($tgt.prev()[0], $tgt.next()[0]); //horizontal
                    this.elems.push(above, below,
                        $(above).next()[0], $(above).prev()[0], //diagonal
                        $(below).next()[0], $(below).prev()[0] //diagonal
                    );


                    $(this.elems).each(function () {
                        if ($(this) != null) {
                            Visualizer.arm(this);
                        }
                    });

                }
                //give the hotzone some intelligence
                this.index = function (elm) {
                    return $(this.elems).index(elm);
                }

                this.setChosen = function (chosenOne) {
                    for (var x = 0; x < this.elems.length; x++) {
                        Visualizer.arm(this.elems[x]);
                    }
                    if (chosenOne != -1) {
                        Visualizer.glow(this.elems[chosenOne]);
                    }

                }

                this.returnToNormal = function () {

                    for (var t = 0; t < this.elems.length; t++) {
                        Visualizer.restore(this.elems[t]);
                    }
                }

                this.clean = function () {
                    $(this.elems).each(function () {
                        Visualizer.clean(this);
                    });
                }

            }

            /*
                * Object that represents the first cell clicked
                */
            function Root() {
                this.root = null;

                this.setRoot = function (root) {
                    this.root = root;
                    Visualizer.glow(this.root);
                }

                this.returnToNormal = function () {
                    Visualizer.restore(this.root);
                }

                this.isSameCell = function (t) {
                    return $(this.root).is($(t));
                }

                this.clean = function () {
                    Visualizer.clean(this.root);
                }

            }

            /*
                * A utility object that manipulates the cell display based on the methods called.
                */
            var Visualizer = {

                glow: function (c) {
                    $(c).removeClass("rf-armed")
                        .removeClass("rf-selected")
                        .addClass("rf-glowing");
                },

                arm: function (c) {
                    $(c)//.removeClass("rf-selected")
                        .removeClass("rf-glowing")
                        .addClass("rf-armed");

                },

                restore: function (c) {
                    $(c).removeClass("rf-armed")
                        .removeClass("rf-glowing");

                    if (c != null && $.data(c, "selected") == "true") {
                        $(c).addClass("rf-selected");
                    }
                },

                select: function (c) {
                    $(c).removeClass("rf-armed")
                        .removeClass("rf-glowing")
                        .animate({ 'opacity': '20' }, 500, "linear", function () {
                            $(c).removeClass("rf-highlight").addClass("rf-selected")
                                .animate({ 'opacity': 'show' }, 500, "linear")
                        })


                },

                highlight: function (c) {
                    $(c).removeClass("rf-armed")
                        .removeClass("rf-selected")
                        .addClass("rf-highlight");
                },

                signalWordFound: function (w) {

                    $(w).css("background", 'yellow').animate({ "opacity": 'hide' }, 1000, "linear",
                        function () {
                            $(w).css("background", 'white')
                            $(w).addClass('rf-foundword').animate({ "opacity": 'show' }, 1000, "linear")
                        });
                },




                clean: function (c) {
                    $(c).removeClass("rf-armed")
                        .removeClass("rf-glowing")
                        .removeClass("rf-selected");

                    $.removeData($(c), "selected");

                }
            }

            //--------------------------------------------------------
            // OBJECTS RELATED TO THE MODEL
            //------------------------------------------------------------------------------

            /*
                * Represents the individual cell on the grid
                */
            function Cell() {
                this.DEFAULT = "-";
                this.isHighlighted = false;
                this.value = this.DEFAULT;
                this.parentGrid = null;
                this.isUnwritten = function () {
                    return (this.value == this.DEFAULT);
                };
                this.isSelected = false;
                this.isSelecting = true;
                this.td = null; // reference to UI component


            }//Cell

            /*
                * Represents the Grid
                */
            function Grid() {
                this.cells = null;

                this.directions = [
                    "LeftDiagonal",
                    "Horizontal",
                    "RightDiagonal",
                    "Vertical"
                ];

                this.initializeGrid = function (size) {
                    this.cells = new Array(size);
                    for (var i = 0; i < size; i++) {
                        this.cells[i] = new Array(size);
                        for (var j = 0; j < size; j++) {
                            var c = new Cell();
                            c.parentgrid = this;
                            this.cells[i][j] = c;
                        }
                    }
                }


                this.getCell = function (row, col) {
                    return this.cells[row][col];
                }

                this.createHotZone = function (uic) {
                    var $tgt = uic;

                    var hzCells = new Array();
                    var ix = $tgt.parent().children().index($tgt);

                }

                this.size = function () {
                    return this.cells.length;
                }

                //place word on grid at suggested location
                this.put = function (row, col, word) {
                    //Pick the right Strategy to place the word on the grid
                    var populator = eval("new " + eval("this.directions[" + Math.floor(Math.random() * 4) + "]") + "Populator(row,col,word, this)");
                    var isPlaced = populator.populate();

                    //Didn't get placed.. brute force-fit (if possible)
                    if (!isPlaced) {
                        for (var x = 0; x < this.directions.length; x++) {
                            var populator2 = eval("new " + eval("this.directions[" + x + "]") + "Populator(row,col,word, this)");
                            var isPlaced2 = populator2.populate();
                            if (isPlaced2) break;

                        }

                    }
                }

                this.fillGrid = function () {

                    for (var i = 0; i < this.size(); i++) {
                        for (var j = 0; j < this.size(); j++) {
                            if (this.cells[i][j].isUnwritten()) {
                                this.cells[i][j].value = String.fromCharCode(Math.floor(65 + Math.random() * 26));
                            }
                        }
                    }

                }

            }//Grid

            /*
                * Set of strategies to populate the grid.
                */
            //Create a Horizontal Populator Strategy
            function HorizontalPopulator(row, col, word, grid) {

                this.grid = grid;
                this.row = row;
                this.col = col;
                this.word = word;
                this.size = this.grid.size();
                this.cells = this.grid.cells;

                //populate the word
                this.populate = function () {


                    // try and place word in this row

                    // check if this row has a contigous block free
                    // 1. starting at col (honour the input)
                    if (this.willWordFit()) {
                        this.writeWord();
                    }
                    else {

                        // for every row - try to fit this
                        for (var i = 0; i < this.size; i++) {

                            var xRow = (this.row + i) % this.size; // loop through all rows starting at current;

                            // 2. try starting anywhere on line
                            var startingPoint = this.findContigousSpace(xRow, word);

                            if (startingPoint == -1) {
                                // if not, then try to see if we can overlap this word only any existing alphabets
                                var overlapPoint = this.isWordOverlapPossible(xRow, word);
                                if (overlapPoint == -1) {
                                    // if not, then try another row and repeat process,
                                    continue;
                                }
                                else {
                                    this.row = xRow;
                                    this.col = overlapPoint;
                                    this.writeWord();
                                    break;
                                }
                            }
                            else {
                                this.row = xRow;
                                this.col = startingPoint;
                                this.writeWord();
                                break;
                            }
                        }//for each row
                    }
                    // if still not, then return false (i.e. not placed. we need to try another direction
                    return (word.isPlaced);


                }//populate


                //write word on grid at given location
                //also remember which cells were used for displaying the word
                this.writeWord = function () {

                    var chars = word.chars;
                    for (var i = 0; i < word.size; i++) {
                        var c = new Cell();
                        c.value = chars[i];
                        this.cells[this.row][this.col + i] = c;
                        word.containedIn(c);
                        word.isPlaced = true;
                    }

                }

                //try even harder, check if this word can be placed by overlapping cells with same content
                this.isWordOverlapPossible = function (row, word) {
                    return -1; //TODO: implement
                }

                //check if word will fit at the chosen location
                this.willWordFit = function () {
                    var isFree = false;
                    var freeCounter = 0;
                    var chars = this.word.chars;
                    for (var i = col; i < this.size; i++) {
                        if (this.cells[row][i].isUnwritten() || this.cells[row][i] == chars[i]) {
                            freeCounter++;
                            if (freeCounter == word.size) {
                                isFree = true;
                                break;
                            }
                        }
                        else {
                            break;
                        }
                    }
                    return isFree;
                }

                //try harder, check if there is contigous space anywhere on this line.
                this.findContigousSpace = function (row, word) {
                    var freeLocation = -1;
                    var freeCounter = 0;
                    var chars = word.chars;
                    for (var i = 0; i < this.size; i++) {
                        if (this.cells[row][i].isUnwritten() || this.cells[row][i] == chars[i]) {
                            freeCounter++;
                            if (freeCounter == word.size) {
                                freeLocation = (i - (word.size - 1));
                                break;
                            }
                        }
                        else {
                            freeCounter = 0;
                        }
                    }
                    return freeLocation;

                }
            }//HorizontalPopulator


            //Create a Vertical Populator Strategy
            function VerticalPopulator(row, col, word, grid) {

                this.grid = grid;
                this.row = row;
                this.col = col;
                this.word = word;
                this.size = this.grid.size();
                this.cells = this.grid.cells;

                //populate the word
                this.populate = function () {


                    // try and place word in this row

                    // check if this row has a contigous block free
                    // 1. starting at col (honour the input)
                    if (this.willWordFit()) {
                        this.writeWord();
                    }
                    else {

                        // for every row - try to fit this
                        for (var i = 0; i < this.size; i++) {

                            var xCol = (this.col + i) % this.size; // loop through all rows starting at current;

                            // 2. try starting anywhere on line
                            var startingPoint = this.findContigousSpace(xCol, word);

                            if (startingPoint == -1) {
                                // if not, then try to see if we can overlap this word only any existing alphabets
                                var overlapPoint = this.isWordOverlapPossible(xCol, word);
                                if (overlapPoint == -1) {
                                    // if not, then try another row and repeat process,
                                    continue;
                                }
                                else {
                                    this.row = overlapPoint;
                                    this.col = xCol;
                                    this.writeWord();
                                    break;
                                }
                            }
                            else {
                                this.row = startingPoint;
                                this.col = xCol;
                                this.writeWord();
                                break;
                            }
                        }//for each row
                    }
                    // if still not, then return false (i.e. not placed. we need to try another direction
                    return (word.isPlaced);


                }//populate


                //write word on grid at given location
                this.writeWord = function () {

                    var chars = word.chars;
                    for (var i = 0; i < word.size; i++) {
                        var c = new Cell();
                        c.value = chars[i];
                        this.cells[this.row + i][this.col] = c; //CHANGED
                        word.containedIn(c);
                        word.isPlaced = true;
                    }

                }

                //try even harder, check if this word can be placed by overlapping cells with same content
                this.isWordOverlapPossible = function (col, word) {
                    return -1; //TODO: implement
                }

                //check if word will fit at the chosen location
                this.willWordFit = function () {
                    var isFree = false;
                    var freeCounter = 0;
                    var chars = this.word.chars;
                    for (var i = row; i < this.size; i++) { // CHANGED
                        if (this.cells[i][col].isUnwritten() || chars[i] == this.cells[i][col].value) { //CHANGED
                            freeCounter++;
                            if (freeCounter == word.size) {
                                isFree = true;
                                break;
                            }
                        }
                        else {
                            break;
                        }
                    }
                    return isFree;
                }

                //try harder, check if there is contigous space anywhere on this line.
                this.findContigousSpace = function (col, word) {
                    var freeLocation = -1;
                    var freeCounter = 0;
                    var chars = word.chars;
                    for (var i = 0; i < this.size; i++) {
                        if (this.cells[i][col].isUnwritten() || chars[i] == this.cells[i][col].value) { //CHANGED
                            freeCounter++;
                            if (freeCounter == word.size) {
                                freeLocation = (i - (word.size - 1));
                                break;
                            }
                        }
                        else {
                            freeCounter = 0;
                        }
                    }
                    return freeLocation;

                }
            }//VerticalPopulator


            //Create a LeftDiagonal Populator Strategy
            function LeftDiagonalPopulator(row, col, word, grid) {

                this.grid = grid;
                this.row = row;
                this.col = col;
                this.word = word;
                this.size = this.grid.size();
                this.cells = this.grid.cells;

                //populate the word
                this.populate = function () {


                    // try and place word in this row

                    // check if this row has a contigous block free
                    // 1. starting at col (honour the input)
                    if (this.willWordFit()) {
                        this.writeWord();
                    }
                    else {

                        var output = this.findContigousSpace(this.row, this.col, word);

                        if (output[0] != true) {

                            // for every row - try to fit this
                            OUTER: for (var col = 0, row = (this.size - word.size); row >= 0; row--) {
                                for (var j = 0; j < 2; j++) {

                                    var op = this.findContigousSpace((j == 0) ? row : col, (j == 0) ? col : row, word);

                                    if (op[0] == true) {
                                        this.row = op[1];
                                        this.col = op[2];
                                        this.writeWord();
                                        break OUTER;
                                    }
                                }

                            }
                        }
                        else {
                            this.row = output[1];
                            this.col = output[2];
                            this.writeWord();
                        }


                    }
                    // if still not, then return false (i.e. not placed. we need to try another direction
                    return (word.isPlaced);


                }//populate


                //write word on grid at given location
                //also remember which cells were used for displaying the word
                this.writeWord = function () {

                    var chars = word.chars;
                    var lrow = this.row;
                    var lcol = this.col;
                    for (var i = 0; i < word.size; i++) {
                        var c = new Cell();
                        c.value = chars[i];
                        this.cells[lrow++][lcol++] = c;
                        word.containedIn(c);
                        word.isPlaced = true;
                    }

                }

                //try even harder, check if this word can be placed by overlapping cells with same content
                this.isWordOverlapPossible = function (row, word) {
                    return -1; //TODO: implement
                }

                //check if word will fit at the chosen location
                this.willWordFit = function () {
                    var isFree = false;
                    var freeCounter = 0;
                    var chars = this.word.chars;
                    var lrow = this.row;
                    var lcol = this.col;
                    var i = 0;
                    while (lcol < this.grid.size() && lrow < this.grid.size()) {
                        if (this.cells[lrow][lcol].isUnwritten() || this.cells[lrow][lcol] == chars[i++]) {
                            freeCounter++;
                            if (freeCounter == word.size) {
                                isFree = true;
                                break;
                            }
                        }
                        else {
                            break;
                        }
                        lrow++;
                        lcol++;

                    }
                    return isFree;
                }

                //try harder, check if there is contigous space anywhere on this line.
                this.findContigousSpace = function (xrow, xcol, word) {
                    var freeLocation = false;
                    var freeCounter = 0;
                    var chars = word.chars;
                    var lrow = xrow;
                    var lcol = xcol;

                    while (lrow > 0 && lcol > 0) {
                        lrow--;
                        lcol--;
                    }
                    var i = 0;
                    while (true) {
                        if (this.cells[lrow][lcol].isUnwritten() || this.cells[lrow][lcol] == chars[i++]) {
                            freeCounter++;
                            if (freeCounter == word.size) {
                                freeLocation = true;
                                break;
                            }
                        }
                        else {
                            freeCounter = 0;
                        }
                        lcol++;
                        lrow++;

                        if (lcol >= this.size || lrow >= this.size) {
                            break;
                        }
                    }
                    if (freeLocation) {
                        lrow = lrow - word.size + 1;
                        lcol = lcol - word.size + 1;
                    }
                    return [freeLocation, lrow, lcol];

                }
            }//LeftDiagonalPopulator


            //Create a RightDiagonal Populator Strategy
            function RightDiagonalPopulator(row, col, word, grid) {

                this.grid = grid;
                this.row = row;
                this.col = col;
                this.word = word;
                this.size = this.grid.size();
                this.cells = this.grid.cells;

                //populate the word
                this.populate = function () {


                    // try and place word in this row

                    // check if this row has a contigous block free
                    // 1. starting at col (honour the input)
                    var rr = 0;
                    if (this.willWordFit()) {
                        this.writeWord();
                    }
                    else {

                        var output = this.findContigousSpace(this.row, this.col, word);

                        if (output[0] != true) {

                            // for every row - try to fit this
                            OUTER: for (var col = this.size - 1, row = (this.size - word.size); row >= 0; row--) {
                                for (var j = 0; j < 2; j++) {

                                    var op = this.findContigousSpace((j == 0) ? row : (this.size - 1 - col), (j == 0) ? col : (this.size - 1 - row), word);

                                    if (op[0] == true) {
                                        this.row = op[1];
                                        this.col = op[2];
                                        this.writeWord();
                                        break OUTER;
                                    }
                                }

                            }
                        }
                        else {
                            this.row = output[1];
                            this.col = output[2];
                            this.writeWord();
                        }


                    }
                    // if still not, then return false (i.e. not placed. we need to try another direction
                    return (word.isPlaced);


                }//populate


                //write word on grid at given location
                //also remember which cells were used for displaying the word
                this.writeWord = function () {

                    var chars = word.chars;
                    var lrow = this.row;
                    var lcol = this.col;
                    for (var i = 0; i < word.size; i++) {
                        var c = new Cell();
                        c.value = chars[i];
                        this.cells[lrow++][lcol--] = c;
                        word.containedIn(c);
                        word.isPlaced = true;
                    }

                }

                //try even harder, check if this word can be placed by overlapping cells with same content
                this.isWordOverlapPossible = function (row, word) {
                    return -1; //TODO: implement
                }

                //check if word will fit at the chosen location
                this.willWordFit = function () {
                    var isFree = false;
                    var freeCounter = 0;
                    var chars = this.word.chars;
                    var lrow = this.row;
                    var lcol = this.col;
                    var i = 0;
                    while (lcol >= 0 && lrow < this.grid.size()) {
                        if (this.cells[lrow][lcol].isUnwritten() || this.cells[lrow][lcol] == chars[i++]) {
                            freeCounter++;
                            if (freeCounter == word.size) {
                                isFree = true;
                                break;
                            }
                        }
                        else {
                            break;
                        }
                        lrow++;
                        lcol--;

                    }
                    return isFree;
                }

                //try harder, check if there is contigous space anywhere on this line.
                this.findContigousSpace = function (xrow, xcol, word) {
                    var freeLocation = false;
                    var freeCounter = 0;
                    var chars = word.chars;
                    var lrow = xrow;
                    var lcol = xcol;

                    while (lrow > 0 && lcol < this.size - 1) {
                        lrow--;
                        lcol++;
                    }
                    var i = 0;
                    while (lcol >= 0 && lrow < this.grid.size()) {
                        if (this.cells[lrow][lcol].isUnwritten() || this.cells[lrow][lcol] == chars[i++]) {
                            freeCounter++;
                            if (freeCounter == word.size) {
                                freeLocation = true;
                                break;
                            }
                        }
                        else {
                            freeCounter = 0;
                        }
                        lrow++;
                        lcol--;
                        //            if (lcol <= 0 || lrow > this.size-1) {
                        //                break;
                        //            }
                    }
                    if (freeLocation) {
                        lrow = lrow - word.size + 1;
                        lcol = lcol + word.size - 1;
                    }
                    return [freeLocation, lrow, lcol];

                }
            }//RightDiagonalPopulator

            /*
                * Container for the Entire Model
                */
            function Model() {
                this.grid = null;
                this.wordList = null;

                this.init = function (grid, list) {
                    this.grid = grid;
                    this.wordList = list;

                    for (var i = 0; i < this.wordList.size(); i++) {
                        grid.put(Util.random(this.grid.size()), Util.random(this.grid.size()), this.wordList.get(i));
                    }

                }

            }//Model

            /*
                * Represents a word on the grid
                */
            function Word(val) {
                this.value = val.toUpperCase();
                this.originalValue = this.value;
                this.isFound = false;
                this.cellsUsed = new Array();

                this.isPlaced = false;
                this.row = -1;
                this.col = -1;
                this.size = -1;
                this.chars = null;

                this.init = function () {
                    this.chars = this.value.split("");
                    this.size = this.chars.length;
                }
                this.init();

                this.containedIn = function (cell) {
                    this.cellsUsed.push(cell);
                }



                this.checkIfSimilar = function (w) {
                    if (this.originalValue == w || this.value == w) {
                        this.isFound = true;
                        return true;
                        // console.log('Acerto');
                    }
                    return false;
                }


            }

            /*
                * Represents the list of words to display
                */
            function WordList() {
                this.words = new Array();

                this.loadWords = function (csvwords) {
                    var $n = this.words;
                    $(csvwords.split(",")).each(function () {
                        $n.push(new Word(this));
                    });

                }

                this.add = function (word) {
                    //here's where we reverse the letters randomly
                    if (Math.random() * 10 > 5) {
                        var s = "";
                        for (var i = word.size - 1; i >= 0; i--) {
                            s = s + word.value.charAt(i);
                        }
                        word.value = s;
                        word.init();
                    }
                    this.words[this.words.length] = word;
                }

                this.size = function () {
                    return this.words.length;
                }

                this.get = function (index) {
                    return this.words[index];
                }

                this.isWordPresent = function (word2check) {
                    for (var x = 0; x < this.words.length; x++) {
                        if (this.words[x].checkIfSimilar(word2check)) return x;
                    }
                    return -1;
                }
            }

            /*
                * Utility class
                */
            var Util = {
                random: function (max) {
                    return Math.floor(Math.random() * max);
                },

                log: function (msg) {
                    $("#logger").append(msg);
                }
            }


            //------------------------------------------------------------------------------
            // OBJECTS RELATED TO THE CONTROLLER
            //------------------------------------------------------------------------------
            /*
                * Main controller that interacts with the Models and View Helpers to render and
                * control the game
                */
            var GameWidgetHelper = {
                prepGrid: function (size, words) {
                    var grid = new Grid();
                    grid.initializeGrid(size);

                    var wordList = new WordList();
                    wordList.loadWords(words);

                    var model = new Model();
                    model.init(grid, wordList);
                    grid.fillGrid();
                    return model;

                },

                renderGame: function (container, model) {
                    var grid = model.grid;
                    var cells = grid.cells;


                    var puzzleGrid = "<div id='rf-searchgamecontainer'><table id='rf-tablegrid' cellspacing=0 cellpadding=0 class='rf-tablestyle'>";
                    for (var i = 0; i < grid.size(); i++) {
                        puzzleGrid += "<tr>";
                        for (var j = 0; j < grid.size(); j++) {
                            puzzleGrid += "<td  class='rf-tgrid'>" + cells[i][j].value + "</td>";
                        }
                        puzzleGrid += "</tr>";
                    }
                    puzzleGrid += "</table></div>";
                    $(container).append(puzzleGrid);

                    var x = 0;
                    var y = 0;
                    $("tr", "#rf-tablegrid").each(function () {
                        $("td", this).each(function (col) {
                            var c = cells[x][y++];
                            $.data(this, "cell", c);
                            c.td = this;
                        })
                        y = 0;
                        x++;
                    });

                    var words = "<div id='rf-wordcontainer'><ul>"
                    $(model.wordList.words).each(function () {
                        words += '<li class=rf-p' + this.isPlaced + '>' + this.originalValue + '</li>';
                    });
                    words += "</ul></div>";

                    // $(container).append(words);

                },

                signalWordFound: function (idx) {
                    var w = $("li").get(idx);
                    Visualizer.signalWordFound(w);
                }

            }


        })(jQuery);


            /*
             * jQuery UI Touch Punch 0.2.2
             *
             * Copyright 2011, Dave Furfero
             * Dual licensed under the MIT or GPL Version 2 licenses.
             *
             * Depends:
             *  jquery.ui.widget.js
             *  jquery.ui.mouse.js
             */

    </script>
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
            $("#modalInicial").modal('show');
            //attach the game to a div
            $("#theGrid").wordsearchwidget({
                "wordlist": words,
                "gridsize": 12,
                // "width" : 300
            });

            // $("#modalInicial").on("hidden.bs.modal", function () {
            //    inicia();
            // });
        });

        function cierra_modal_inicio(){
            // alert('hizo click');
            $("#modalInicial").modal('hide');
            inicia();
        }

        function reinicia_juego(){
            // alert('reinicia juego');
            window.location.href = "<?php echo base_url('/sopa/inicia/') ?>";
        }

        function ir_menu(){
            // alert('ir menu');
            window.location.href = "<?php echo base_url('/') ?>";
        }

    </script>
</body>

</html>
