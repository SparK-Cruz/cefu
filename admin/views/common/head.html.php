<?php
  call(function($viewbag){
    $title = "";
    if(isset($viewbag->title))
      $title = " - ".$viewbag->title;
?>
<head>
  <meta charset="utf-8" />
  <title>Painel<?=$title?></title>
  <link rel="stylesheet" type="text/css" href="<?=Router::fileRoute("css/admin.css")?>" />
</head>
<?php
  }, $viewbag);
?>