<?php
  call(function($viewbag) use ($url) {
    $title = "";
    if(isset($viewbag->title))
      $title = " - ".$viewbag->title;
?>
<head>
  <meta charset="utf-8" />
  <title>Painel<?=$title?></title>
  <link rel="stylesheet" type="text/css" href="<?=$url::file("public/css/admin.css")?>" />
</head>
<?php
  }, $viewbag);
?>