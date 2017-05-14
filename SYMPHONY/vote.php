<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="static/css/bootstrap.css" rel="stylesheet">
<link href="static/css/MainStyles.css" rel="stylesheet">
</head>

<body>
<div class="container">
<div id="hello">
    <?php
	$vote = $_REQUEST['vote'];
	
	$filename = "poll.txt";
	$content = file($filename);
	
	$array = explode("||", $content[0]);
	$seba = $array[0];
	$zedd = $array[1];
	$martin = $array[2];
	$tiesto = $array[3];
	
	if($vote==0){
		$seba = $seba + 1;
	}
	if($vote==1){
		$zedd = $zedd + 1;
	}
	if($vote==2){
		$martin = $martin +1;
	}
	if($vote==3){
		$tiesto = $tiesto + 1;
	}
	
	$insertvote = $seba."||".$zedd."||".$martin."||".$tiesto;
	$fp = fopen($filename, "w");
	fputs($fp, $insertvote);
	fclose($fp);
	?>
    
    <h4 class="intro-text01 text-center"> Results </h>
    <table align="center">
    <tr>
    <td>Jason Derulo</td>
    <td>:</td>
    <td>
        <img src="static/images/blue.png"
    width='<?php echo(100*round($seba/($seba+$zedd+$martin+$tiesto),2)); ?>'
    height="20">
    <?php echo(100*round($seba/($seba+$zedd+$martin+$tiesto),2));?>%
    </td>
    </tr>
    <tr><br></tr>
    <tr>
    <td>Chris Brown</td>
    <td>:</td>
    <td>
     <img src="static/images/blue.png"
    width='<?php echo(100*round($zedd/($seba+$zedd+$martin+$tiesto),2)); ?>'
    height="20">
    <?php echo(100*round($zedd/($seba+$zedd+$martin+$tiesto),2));?>%
    </td>
    </tr>
    <tr><br></tr>
    <tr>
    <td>Charlie Puth</td>
    <td>:</td>
    <td>
    <img src="static/images/blue.png"
    width='<?php echo(100*round($martin/($seba+$zedd+$martin+$tiesto),2)); ?>'
    height="20">
    <?php echo(100*round($martin/($seba+$zedd+$martin+$tiesto),2));?>%
    </td>
    </tr>
    <tr><br></tr>
    <tr>
    <td>Pitbull</td>
    <td>:</td>
    <td>
    <img src="static/images/blue.png"
    width='<?php echo(100*round($tiesto/($seba+$zedd+$martin+$tiesto),2)); ?>'
    height="20">
    <?php echo(100*round($tiesto/($seba+$zedd+$martin+$tiesto),2));?>%
    </td>
    </tr>
    </table>
    </div>
</div>
</body>
</html>