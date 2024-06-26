Loading Fen: <?php
session_save_path('/mnt/disks/sessions');
session_start();
if (isset($_GET['restart'])) {
    session_destroy();
    header("Location: ". "/");
}

if (isset($_POST['diff'])) {
   $diff = $_POST['diff'];
   $diff = (int) $diff;
   if ($diff >= 1 && $diff <= 3) {
	$_SESSION['diff'] = $diff;
   }
}
//var_dump($_SESSION);
?>
<html>
<head>
	<title>Hackerchess v2</title>
        <style>
select,
select::before,
select::after {
  box-sizing: border-box;
}

select {
  background-color: transparent;
  display: grid;
  border: none;
  padding: 0 1em 0 0;
  margin: 0;
  width: 100%;
  font-family: 'Press Start 2P', cursive;
  font-size: small;
  cursor: inherit;
  line-height: inherit;
}
		body {
			background: black;
			color:  green;
			padding:  30px;
			margin:  30px;
			font-family: 'Press Start 2P', cursive;
		}

		table {
			background: url('./assets/BG_Dot_Black.svg');
			width: 500px;
			height: 500px;
		}
		#boardwrapper {
		}
		table td {
			border: solid green 1px;
		}
		tr:nth-child(2n+1):not(:last-child) > td:nth-child(2n):not(:first-child) {background: green}
		tr:nth-child(2n):not(:last-child) > td:nth-child(2n+1):not(:first-child) {background: green}
		
a.bp {
                        background: url('./assets/Black_Pawn.svg');
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: 25px;
                        display:block;
                        width:100%;
                        height:100%;
}


td.target {
		border: solid white 2px;
	}
td.target > a {
	display: block;
	width: 100%;
	height: 100%;
}

a.wp {
                        background: url('./assets/White_Pawn.svg');
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: 25px;
                        display:block;
                        width:100%;
                        height:100%;
}


a.bb {
                        background: url('./assets/Black_Bishop.svg');
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: 25px;
                        display:block;
                        width:100%;
                        height:100%;
}


a.wb {
                        background: url('./assets/White_Bishop.svg');
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: 25px;
                        display:block;
                        width:100%;
                        height:100%;
}


a.br {
                        background: url('./assets/Black_Rook.svg');
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: 25px;
                        display:block;
                        width:100%;
                        height:100%;
}


a.wr {
                        background: url('./assets/White_Rook.svg');
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: 25px;
                        display:block;
                        width:100%;
                        height:100%;
}


a.bn {
                        background: url('./assets/Black_Knight.svg');
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: 25px;
                        display:block;
                        width:100%;
                        height:100%;
}


a.wn {
                        background: url('./assets/White_Knight.svg');
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: 25px;
                        display:block;
                        width:100%;
                        height:100%;
}


a.bq {
                        background: url('./assets/Black_Queen.svg');
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: 25px;
                        display:block;
                        width:100%;
                        height:100%;
}


a.wq {
                        background: url('./assets/White_Queen.svg');
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: 25px;
                        display:block;
                        width:100%;
                        height:100%;
}


a.bk {
                        background: url('./assets/Black_King.svg');
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: 25px;
                        display:block;
                        width:100%;
                        height:100%;
}


a.wk {
                        background: url('./assets/White_King.svg');
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: 25px;
                        display:block;
                        width:100%;
                        height:100%;
}

		
		
		.rank {
			color: green;
			background: black;
			border: 0;
			vertical-align: top;
	}
		td.file {
			color: green;
			background: black;
			border: 0;
			text-align: right;
		}
		#header {
			color: grey;

		}
		#title {
			color: white;
		}
		#timer h1 {
			color: white;
			font-size: 1em;
		}
		#start {
			background: url('./assets/Start.svg');
			width: 200px;
			height: 50px;	
		}
		#movehistory {
                        overflow: scroll;
                        min-width: 303px;
		}

		#movehistory h3 {
			color: white;
			text-align: left;
			margin-left: 2em;
		}
		h3 {
			padding: 0;
			margin: 0;
			font-weight: 300;

		}
		ul {
			  list-style-type: none; /* Remove bullets */
			  color: white;	
		}
		ul > li {
			height: 1.8em;
			margin: 0;
		}
		#moveno, #frommove, #tomove {
			display: inline-block;
		}
		#moveno {
			margin-right: 3em;

		}
		#mainarea {
			height: 31em;
			display: flex;
			justify-content: center;
		}
		.custom-select > select {
			background: black;
			color: white;
			width: 100%;
		} 
		#tomove, #frommove {
			margin-left: 1em;
			margin-right: 1em;
		}
		#row1 {
			padding: 0;
		}
		#row1 > #title {
			font-size: 1em;
		}
		#row1 > * {
			width: 33%;
		}
		#start {
			margin: 4em;
		}
		#timer {
			top: 0;
		}
		#row1 > #lvl {
			width: 9.3%;
		}
		#header, #row1 {
			display: flex;
			justify-content: space-between;
			width: 100%;

		}
		#header {
			display: flex;
			justify-content: center;
			flex-direction: column;
		}
		#row2 {
			display: flex;
			justify-content: center;
			width: 100%;
		}
		#boardwrapper {
			padding: 0em;
		}
		
::-webkit-scrollbar {
  -webkit-appearance: none;
  width: 7px;
}
::-webkit-scrollbar-thumb {
  border-radius: 4px;
  background-color: rgba(0, 255, 0, .5);
  -webkit-box-shadow: 0 0 1px rgba(255, 255, 255, .5);
}
	

        </style>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=VT323&display=swap" rel="stylesheet">
<script
    data-autoload-cookie-consent-bar="true"
    data-autoload-cookie-consent-bar-intl-code=""
    src="https://www.gstatic.com/brandstudio/kato/cookie_choice_component/cookie_consent_bar.v3.js">
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-06YS0MVC8B"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-06YS0MVC8B', { anonymize_ip: true, referrer: document.referrer.split('?')[0] });
      </script>

<script>
let seconds = 0;
let mins = 0;
const timerId = setInterval(() => {
    seconds++;
    if (seconds === 60) {
        seconds = 0;
        mins++;
    }
    document.getElementById("timerh1").innerHTML = String(mins).padStart(2, '0') + ":" + String(seconds).padStart(2, '0')

}, 1000); // Execute event every second (1000 milliseconds = 1 second).
</script>
</head>
<body>
<div id="header">
	<div id="row1">
	<div id="title">
		HACKER CHESS
	</div>
	<div id="timer">
		<h1 id="timerh1">00:00</h1>
	</div>
	<div id="lvl">
  <form method="POST">

		<div class="custom-select">
  <select name="diff" onchange='if(this.value != 0) { this.form.submit(); }'>
    <option value="0">DIFFICULTY</option>
    <option value="1" <?php if ($_SESSION['diff'] == 1) { echo "selected"; }?>>Impossible</option>
    <option value="2" <?php if ($_SESSION['diff'] == 2) { echo "selected"; }?>>Unbeatable</option>
    <option value="3" <?php if ($_SESSION['diff'] == 3) { echo "selected"; }?>>Invincible</option>
 </select>

		</div>
 </form>
	</div>

	</div>
	<div id="row2">
	<button id="start"  onclick="load_baseboard()"/>
	</div>
	
</div>

<center>
<div id="mainarea">
<div id="boardwrapper">
<?php

use PChess\Chess\Piece;

require 'vendor/autoload.php';
use PChess\Chess\Chess;
use PChess\Chess\Output\UnicodeOutput;
use PChess\Chess\Output\HtmlOutput;
use PChess\Chess\Board;
use PChess\Chess\Output\Link;

class Stockfish
{
    public $cwd = "./";
    public $binary = "/usr/games/stockfish";
    public $other_options = array('bypass_shell' => 'true');
    public $descriptorspec = array(
        0 => array("pipe","r"),
                1 => array("pipe","w"),
    );
    private $process;
    private $pipes;
    private $thinking_time;

    public function __construct()
    {
        $other_options = array('bypass_shell' => 'true');
        //echo "Stockfish options" . $_SESSION['thinking_time'];
        if (isset($_SESSION['thinking_time']) && is_numeric($_SESSION['thinking_time'])) {
            $this->thinking_time = $_SESSION['thinking_time'];
        } else {
            $this->thinking_time = 10;
        }
        $this->process = proc_open($this->binary, $this->descriptorspec, $this->pipes, $this->cwd, null, $this->other_options) ;
    }
    public function passUci()
    {
        if (is_resource($this->process)) {
            fwrite($this->pipes[0], "uci\n");
            fwrite($this->pipes[0], "ucinewgame\n");
            fwrite($this->pipes[0], "isready\n");
        }
    }

    public function passPosition(string $fen)
    {
        fwrite($this->pipes[0], "position fen $fen\n");
        fwrite($this->pipes[0], "go movetime $this->thinking_time\n");
    }

    public function readOutput()
    {
        while (true) {
            usleep(100);
            $s = fgets($this->pipes[1], 4096);
            $str .= $s;
            if (strpos(' '.$s, 'bestmove')) {
                break;
            }
        }
        return $s;
    }

    public function __toString()
    {
        return fgets($this->pipes[1], 4096);
    }

    public function __wakeup()
    {
        $this->process = proc_open($this->binary, $this->descriptorspec, $this->pipes, $this->cwd, null, $this->other_options) ;
        echo '<!--'.'wakeupcalled'.fgets($this->pipes[1], 4096).'-->';
    }
}

function applyCheatsAI(Chess $chess)
{
    $firstSquare = Board::SQUARES['a8'];
    $lastSquare  = Board::SQUARES['h1'];
    for ($i = $firstSquare; $i <= $lastSquare; ++$i) {
        if ($i & 0x88) {
            $i += 7;
            continue;
        }
        $piece = $chess->board[$i];
        if ($piece == null) {
            continue;
        }
        if ($piece->isPawn() && $piece->getColor() !== Piece::WHITE) {
            $chess->board[$i] = new Piece(Piece::QUEEN, Piece::BLACK);
        }
    }
}

final class MyHtmlOutput extends HtmlOutput
{
    /**
     * @return array<string, array<int, string>>
     */
    private static function getAllowedMoves(Chess $chess, ?string $from = null): array
    {
        $moves = $chess->moves($from ? Board::SQUARES[$from] : null);
        $return = [];
        foreach ($moves as $move) {
            $return[$move->from][] = (string) $move->san;
        }

        return $return;
    }

    private static function isTurn(Chess $chess, Piece $piece): bool
    {
        return $piece->getColor() === $chess->turn;
    }

    /**
     * @param array<string, array> $allowedMoves Moves resulting from self::getAllowedMoves()
     */
    private static function canMove(string $from, int $to, array $allowedMoves): bool
    {
        $toSan = Board::algebraic($to);
        if (!isset($allowedMoves[$from])) {
            return false;
        }
        $cleanMoves = \array_map(static function (string $san) use ($from): string {
            $check = \substr($san, -1);
            $equalsPos = \strpos($san, '=');
            if ('+' === $check || '#' === $check) {
                $san = \substr($san, 0, -1);
            } elseif ('O-O-O' === $san) {
                $san = 'e1' === $from ? 'c1' : 'c8';
            } elseif ('O-O' === $san) {
                $san = 'e1' === $from ? 'g1' : 'g8';
            } elseif (false !== $equalsPos) {
                $san = \substr($san, 0, $equalsPos);
            }

            return \substr($san, -2);
        }, $allowedMoves[$from]);

        return \in_array($toSan, $cleanMoves, true);
    }

    public function generateLinks(Chess $chess, ?string $from = null, $identifier = null): array
    {
        $links = [];
        $allowedMoves = self::getAllowedMoves($chess, $from);
        /** @var int $i */
        foreach ($chess->board as $i => $piece) {
            $url = null;
            $class = null;
            $san = Board::algebraic($i);
            if (null === $from) {
                // move not started
                if (null !== $piece && isset($allowedMoves[$san]) && self::isTurn($chess, $piece)) {
                    $url = $this->getStartUrl($san, $identifier);
                }
            } elseif ($from !== $san) {
                // move started
                if (self::canMove($from, $i, $allowedMoves)) {
                    if (null !== $movingPiece = $chess->board[Board::SQUARES[$from]]) {
                        if ('p' === $movingPiece->getType() && (0 === Board::rank($i) || 7 === Board::rank($i))) {
                            $url = $this->getPromotionUrl($from, $san, $identifier);
                        } else {
                            $url = $this->getEndUrl($from, $san, $identifier);
                        }
                    }
                    $class = 'target';
                }
            } else {
                // restart move
                $url = $this->getCancelUrl($identifier);
                $class = 'current';
            }
            $links[$i] = new Link($class, $url);
        }

        return $links;
    }
    public function getStartUrl(string $from, $identifier = null): string
    {
        return '?move_start='.$from;
    }

    public function getEndUrl(string $from, string $to, $identifier = null): string
    {
        $data = base64_encode(serialize(array($from, $to)));
        return '?move_end='.$data;
    }

    public function getCancelUrl($identifier = null): string
    {
        return '?cancel';
    }

    public function getPromotionUrl(string $from, string $to, $identifier = null): string
    {
        return '?promotion='.$from.'/'.$to;
    }
}

function init_chess()
{
    $chess = new Chess();
    return $chess;
}

function list_moves_square(string $square, Chess $chess_state)
{
    $moves = $chess_state->moves();
    $valid_moves = array();
    foreach ($moves as $move) {
        #print ($move->from . " " . $square . "\n");
        if ($move->from == $square) {
            #print_r($move);
            array_push($valid_moves, $move);
        }
    }
    return $valid_moves;
}



if (isset($_SESSION['board']) && $_SESSION['board'] !== "") {
    //echo "Board already set?\n";
    //echo $_SESSION['board'];
    $chess = unserialize($_SESSION['board']);
} else {
    $chess = init_chess();
}

$output = new MyHtmlOutput();
if (isset($_GET['move_start'])) {
    echo $output->render($chess, $_GET['move_start']);
} elseif (isset($_GET['move_end'])) {
    $movei = unserialize(base64_decode($_GET['move_end']));
    if ($chess->turn == "b") {
      #XXX: this should never happen.
      $chess = init_chess();
      $_SESSION['board'] = serialize($chess);
      die('Invalid Board state. Refresh the page');
    }
    echo "<!-- XXX : Debug remove this ".$movei. "-->";
    $valid_moves = list_moves_square($movei[0], $chess);
    $invalid_move = True;

    foreach ($valid_moves as $move) {
        if ($move->to == $movei[1]) {
          $chess->move($move->san);
          $invalid_move = False;
        }
    }

    if (!$invalid_move) {
      $stockf = new Stockfish();
      $stockf->passUci();
      $stockf->passPosition($chess->fen());
      $move_s = $stockf->readOutput();
      $move_s = explode(" ", $move_s);
      $move_best = $move_s[1];
      //echo $move_best;;
      $bm_from = substr($move_best, 0, 2);
      $bm_to = substr($move_best, 2, 2);
      $chess->move(['from' => $bm_from, "to" => $bm_to]);
    }

    echo $output->render($chess);
    if ($chess->inCheckmate()) {
        if ($chess->turn != "b") {
            echo '<h1>You lost! Game Over!</h1>';
        } else {
            echo "<h1>Winning against me won't help anymore. You need to get the flag from my envs." . "</h1>";
        }
    }
} else {
    echo $output->render($chess);
}
$_SESSION["board"] = serialize($chess);
//echo $_SESSION['board'];
?>
</div>
<div id="movehistory">
<?php
$entries = $chess->getHistory()->getEntries();
?>
<h3>MOVES</h3>
<ul>
<?php
foreach ($entries as $entry) {
    echo '<li>';
    if ($entry->moveNumber == 7 && $_SESSION['cheats_enabled'] !== "0") {
        applyCheatsAI($chess);
        $_SESSION["board"] = serialize($chess);
    }
    echo  '<p id="moveno">'.$entry->moveNumber;
    echo '<p id="frommove">'. ' _ ' . $entry->move->from.'</p>';
    echo '<p id="tomove">'. ' _ ' .$entry->move->to.'</p>';
    //var_dump( $entry);
    echo "</li>";
}
?>
</ul>
</div>
</div>
</center>
<script>
function load_baseboard() {
  const url = "load_board.php"
  let xhr = new XMLHttpRequest()
  const formData = new FormData();
  formData.append('filename', 'baseboard.fen')

  xhr.open('POST', url, true)
  xhr.send(formData);
  window.location.href = "index.php";
}
</script>
<br/>
<div style="text-color: white; display: flex;"><div style="display: flex; width: 50%; justify-content: left;"><a style="color: white;" href="https://policies.google.com/">PRIVACY & TERMS</a></div><div style="display: flex; width: 50%; justify-content: right;"></div></div>
</body>