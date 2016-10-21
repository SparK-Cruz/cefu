<?php
call(function($title) use ($url){
  if($title !== null)
    $title = " - ".$title;
?>
<head>
  <meta charset="utf-8" />
  <title>CEFU<?=$title?></title>
  <link rel="stylesheet" type="text/css" href="<?=$url::file("public/css/main.css")?>" />
</head>
<?php
}, isset($viewbag->title)?$viewbag->title:null);
?>