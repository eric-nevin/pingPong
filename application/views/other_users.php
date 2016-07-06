<!DOCTYPE html>
<html lang='en-US'>
<head>
    <title>Ping Pong</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/home.css">
    <link rel="stylesheet" href="/assets/css/SideBar.css">
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
              <a href="#">About</a>
          </li>
          <li>
              <a href="#">Tournaments</a>
          </li>
        
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Stacks <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              
              
              <li><a href="#">PHP</a></li>
              <li><a href="#">iOS</a></li>
              <li><a href="#">MEAN</a></li>
              <li><a href="#">Ruby on Rails</a></li>
              <li><a href="#">Web Fundamentals</a></li>
            </ul>
          </li>
          <li>
              <a href="/notifications">Notifications</a>
          </li>
          <li>
              <a href="#">Contact</a>
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



    <div class='container' id="groupback">  <!-- center of webpage info -->
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
          <div class="col-xs-9">
            <h2>Name: <?= $user_info[0]['first_name']. " " .$user_info[0]['last_name']; ?></h2>
            <h4>Current Stack: <?= $current_group['stack']. " ". $current_group['start_date']; ?> </h4>
            <h4>Total Wins: <?= $global_score[0]. '-' .$global_score[1]; ?>    </h4>
              <a href="/invite/<?= $user_info[0]['user_id'] ?>"><button class="btn btn-warning">Invite to game</button></a>

          <!-- profile -->
          </div>
      </div> <!-- end of top section -->
      <div class="row">
        <div class="col-xs-3">
        </div>
        <div class="col-xs-6">
          <a href="/add_game/<?= $user_info[0]['user_id'] ?>">Add wins and losses with <?= $user_info[0]['username']; ?></a>
          <p style="color: green;"><?= $this->session->flashdata('add_game_success'); ?></p>
          <?= $this->session->flashdata('invite'); ?>
        </div>
        
        <div class="col-xs-3">
        </div>

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
                      <td><a href="#"><?=$values['username']?></a></td>
<?php } ?>
                  </tr>
              </tbody>
          </table>
      </div> <!-- leaderboard div -->





  </div>
       <!-- /#wrapper -->
</body>
</html>