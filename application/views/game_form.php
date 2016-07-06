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
                 Brand
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
          <li>
              <a href="#">Stacks</a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Works <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li class="dropdown-header">Dropdown heading</li>
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li><a href="#">Separated link</a></li>
              <li><a href="#">One more separated link</a></li>
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
        
<div class="col-xs-9">

  <h1>SCORE PAGE</h1>
            <h2><?= $my_user_info['username']; ?>
              VS. <?= $user_info[0]['username']; ?> 
            </h2>
            <!-- <h4>Current Stack: <?= $current_group['stack']. " ". $current_group['start_date']; ?> </h4> -->
            <h4>Total Wins: <?= $global_score[0]. '-' .$global_score[1]; ?>    </h4>

        <form method="post" action="/add_score_form">
      
            <?php if(isset( $invite_game)){ ?>
                <input type="hidden" value="<?=$invite_game?>" name="invite_game">
            <?php } ?>
          
              <label>
                <input type="radio" name="winner" id="gridRadios1" value="win" checked>
                <input type="hidden" name="opponent_id" value="<?= $user_info[0]['user_id']; ?>">
                <input type="hidden" name="opponent_group" value="<?= $current_group['id']; ?>">
                  I won!
              </label>
            
            
              <label>
                <input type="radio" name="winner" id="gridRadios2" value="loss">
                  <?= $user_info[0]['username']; ?> won!
              </label>
            
         
      
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
          <!-- profile -->
          </div>
      </div> <!-- end of top section -->
      
      
      
 










        
       
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
