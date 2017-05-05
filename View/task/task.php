<!DOCTYPE html>
<!--
Task.
-->
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Task</title>
    <script type="text/javascript" src="/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <img src='<?php echo $item->image; ?>' alt='<?php echo 'task:' . $item->id; ?>' />
        </div>
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-12"><?php echo $item->name; ?></div>
          </div>
          <div class="row">
            <div class="col-sm-12"><?php echo $item->email; ?></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12"><?php echo $item->text; ?></div>
      </div>
    </div>
  </body>
</html>
