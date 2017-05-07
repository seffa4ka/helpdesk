<!DOCTYPE html>
<!--
Create.
-->
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/create.css" rel="stylesheet">
  </head>
  <body>
    <div id="wrapper">
      <div id="mask"></div>
      <div id="window">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <img class="img-rounded" id="previewImage" src='#' alt='task:preview' width="320" height="240"/>
            </div>
            <div class="col-sm-6">
              <p id="previewName"></p>
              <p id="previewEmail"></p>
              <p>Status: Open</p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <p id="previewText"></p>
            </div>
          </div>
          <button type="button" class="btn btn-default" id="ok">Ok</button>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarToggler" aria-expanded="false"><span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">helpdesk</a>
        </div>
        <div class="collapse navbar-collapse" id="navbarToggler">
          <ul class="nav navbar-nav">
            <li>
              <a href="/">Home</a>
            </li>
            <li class="active">
              <a href="/create">Create task</a>
            </li>
            <li>
              <a href="/tasks">All tasks</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <?php if (isset($_SESSION['auth'])) { ?>
              <a href="/logout">Sign out</a>
              <?php } else { ?>
              <a href="/login">Sign in</a>
              <?php } ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <?php 
          if (isset($item)) {
            echo 
            '<div class="alert alert-success fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> '. $item . ' <a href=/task/' . $id . ' class="alert-link">Task №' . $id . '.</a>' .
            '</div>';
          }
          ?>
          <form role="form" enctype="multipart/form-data" action="" method="POST">
            <div class="form-group">
              <label for="inputName">Name</label>
              <input required type="text" class="form-control" id="inputName" placeholder="Enter Name" name="name">
            </div>
            <div class="form-group">
              <label for="inputEmail">Email</label>
              <input required type="email" class="form-control" id="inputEmail" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
              <label for="inputText">Task</label>
              <textarea required class="form-control" rows="5" id="inputText" name="text"></textarea>
            </div>
            <div class="form-group">
              <label for="inputFile">File input</label>
              <input required type="file" id="inputFile" name="image" accept="image/jpeg,image/png,image/gif">
              <p class="help-block">Select an image.</p>
            </div>
            <button type="button" class="btn btn-default" id="preview">Preview</button>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
  </body>
</html>
