<!DOCTYPE html>
<html lang="ru">
<head>

  <title><?php wp_title(); ?></title>

  <meta charset="UTF-8">
  <meta name="format-detection" content="telephone=no">
  <meta name="description" content="Новый сайт">
  <link rel="icon" type="image/png" href="img/favicons/icon256.png" sizes="256x256">
  <link rel="icon" type="image/png" href="img/favicons/icon128.png" sizes="128x128">
  <link rel="icon" type="image/png" href="img/favicons/icon64.png" sizes="64x64">
  <link rel="icon" type="image/png" href="img/favicons/icon32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="img/favicons/icon16.png" sizes="16x16">
  <link rel="icon" type="image/png" href="img/favicons/icon.svg" sizes="any">

  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

  <?php wp_head();?>  

</head>
<body>
  <div class="wrapper">  
    <!-- Подключение  модальных окон-->
    <? include "modal-win.php";?>

