<!DOCTYPE html>
<!--
Main.
-->
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main</title>
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
            <li class="active">
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
            <li>
              <a href="/login">Sign in</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="jumbotron">
          <h1>HelpDesk</h1>
          <p>You can create new task.</p>
          <p>
            <a href="/create" class="btn btn-lg btn-success">Create task</a>
          </p>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
  </body>
</html>
