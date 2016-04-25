<?php
call(function($title){
  if($title !== null)
    $title = " - ".$title;
?>
<head>
  <meta charset="utf-8" />
  <title>CEFU<?=$title?></title>
  <link rel="stylesheet" type="text/css" href="<?=Router::fileRoute("css/main.css")?>" />
</head>
<?php
}, isset($viewbag->title)?$viewbag->title:null);
?>