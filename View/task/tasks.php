<!DOCTYPE html>
<!--
Tasks.
-->
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tasks</title>
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
            <li class="active">
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
            <table class="table">
              <thead>
                <tr>
                  <th>Task</th>
                  <th id="name">Name</th>
                  <th id="email">Email</th>
                  <th id="status">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($items as $item){ ?>
                <tr>
                  <td>
                    <a href="/task/<?php echo $item->id; ?>"><?php echo $item->id; ?></a>
                  </td>
                  <td><?php echo $item->name; ?></td>
                  <td><?php echo $item->email; ?></td>
                  <td>
                    <?php 
                      if ($item->status == 0) {
                        echo 'open';
                      } else {
                        echo 'closed';
                      }
                    ?>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <ul class="pagination">
              <?php 
                for ($page = 1; $page <= $pages; $page++) {
                  echo '<li ';
                  if ($page == $thisPage) {
                    echo 'class="active"';
                  }
                  echo '><a href="/tasks/';
                  echo $page;
                  echo '">';
                  echo $page;
                  echo '</a></li>';             
                }
              ?>
            </ul>
          </div>
      </div>
    </div>
    <script type="text/javascript" src="/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/tasks.js"></script>
  </body>
</html>
