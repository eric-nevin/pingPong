<!DOCTYPE html>
<html lang='en-US'>
<head>
    <title>Ping Pong</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/SideBar.css">
    <script type="text/javascript">
      $(document).ready(function () {
        
        $('[data-toggle="offcanvas"]').click(function () {
              $('#wrapper').toggleClass('toggled');
        });  
      });

    </script>
</head>
<body>
<div id="wrapper">
  <div class="overlay"></div>
  <!-- Sidebar -->
  <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
      <ul class="nav sidebar-nav">
          <li class="sidebar-brand">
              <a href="#">
                 Coding Dojo
              </a>
          </li>
          <li>
              <a href="/home">Home</a>
          </li>
          <li>
              <a href="#">Chat</a>

          </li>
          <li>
              <a href="#">Tournaments</a>
          </li>
          <li>
              <a href="/all_users">Active Users</a>
          </li>
           <li>
              <a href="/chat/<?= $user_info['id']; ?>">Group Chat</a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Stacks <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">

              <?php foreach($groups as $values){ ?>
              
              <li><a href="/group/<?= $values['id']; ?>"><?= $values['stack']?></a></li>
              

              <?php } ?>
            </ul>
          </li>
          <li>
              <a href="/notifications">Notifications</a>
          </li>
          <li>
              <a href="/settings">Settings</a>
          </li>
          <li>
              <a href="/logoff">Logout</a>
          </li>
      </ul>
  </nav>
  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->
  <div id="page-content-wrapper">
      <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
          <span class="hamb-top"></span>
          <span class="hamb-middle"></span>
          <span class="hamb-bottom"></span>
      </button>
    <div class='container' id="homeback">  <!-- center of webpage info -->
        <div class="row">
            <div class="col-xs-3" id="ninja">  
            <?php if($global_score[0] > 100) { ?>
                <img src="/assets/images/green.png" alt="ninja">
            <?php } elseif($global_score[0] > 50) { ?>
                <img src="/assets/images/black.png" alt="ninja">
            <?php } elseif($global_score[0] > 25) { ?>
                <img src="/assets/images/red.png" alt="ninja">
            <?php } elseif ($global_score[0] < 25) { ?>
                <img src="/assets/images/yellow.png" alt="ninja">
            <?php } ?>
            </div>
            <div class="col-xs-6">
                <h3>Name: <?= $user_info['first_name']. " " .$user_info['last_name']; ?></h3>
                <h3>Current Stack: <?= $user_info['stack']. " ". $user_info['start_date']; ?> </h3>
                <h3>Total Wins: <?= $global_score[0]. '-' .$global_score[1]; ?>    </h3>
            </div>
        </div> <!-- end of top section -->
        <div class="row">
            <div class="col-xs-9  text-center" id="whitebackground">
                <h3>Challenge Current Stacks</h3>

                <?php foreach($groups as $values){ ?>
                  <div class="col-xs-3" id="stacks">
                  <br>
                  <a href= "/group/<?= $values['id']; ?>">  
                  <?php if($values['stack'] == "php"){ ?>
                        <img src="/assets/images/code.png" alt="php">
                      <?php } elseif ($values['stack'] == "ios"){ ?>
                        <img src="/assets/images/swift.png" alt="ios">
                      <?php } elseif ($values['stack'] == "mean") { ?>
                        <img src="/assets/images/angular.png" alt="mean">
                      <?php } elseif ($values['stack'] == "web fundamental") { ?>
                        <img src="/assets/images/html.png" alt="html">
                        <?php } ?>
                        </a>
                <?= "<br>"; ?>
                </div>
                <?php } ?>
            </div>
              <!-- stacks stacks stacks -->
        </div>
    </div> <!-- end of container -->
  </div> <!-- #page-content-wrapper -->

 
    <div class="col-xs-3" id="leaderboard"> <!-- fixed leaderboard to the rightside not in grid system -->
          <h3 class="text-center">LeaderBoard</h3>
          <table class="table table-hover">
              <thead>
                  <tr>
                      <th>Rank</th>
                      <th>Name</th>
                      <th>Stack</th>
                  </tr>
              </thead>
              <tbody>
<?php foreach($global_ladder as $values){ ?>
                  <tr>
                      <td><?=$values['rank']?></td>
                      <td><a href="/view_profile/<?= $values['user_id']?>"><?=$values['username']?></a></td>
                      <td><a href="/group/<?=$values['group_id']?>"><?= $values['stack']?></a></td>
<?php } ?>
                  </tr>
              </tbody>
          </table>
      </div> <!-- leaderboard div -->
  </div>

       <!-- /#wrapper -->
</body>
</html>
