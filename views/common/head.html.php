<?php
call(function($title){
  if($title !== null)
    $title = " - ".$title;
?>
<head>
  <meta charset="utf-8" />
  <title>CEFU<?=$title?></title>
</head>
<?php
}, isset($viewbag->title)?$viewbag->title:null);
?>