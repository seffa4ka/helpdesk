<!DOCTYPE html>
<!--
Login.
-->
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
  </head>
  <body>
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
            <li>
              <a href="/create">Create task</a>
            </li>
            <li>
              <a href="/tasks">All tasks</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active">
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
          if (isset($error)) {
            echo 
            '<div class="alert alert-warning fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Warning!</strong> '. $error .
            '</div>';
          }
          ?>
          <form role="form" action="" method="POST">
            <div class="form-group">
              <label for="inputLogin">Login</label>
              <input required type="text" class="form-control" id="inputLogin" placeholder="Enter Login" name="login">
            </div>
            <div class="form-group">
              <label for="inputPassword">Password</label>
              <input required type="password" class="form-control" id="inputPassword" placeholder="Enter Password" name="password">
            </div>
            <button type="submit" class="btn btn-default">Sign in</button>
          </form>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
  </body>
</html>
