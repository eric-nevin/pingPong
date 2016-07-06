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
           <div class="col-xs-6">
                <h2>Confirmation</h2>
              <?php foreach($potential_games as $games){
                if($games['wins'] == 1){ ?>
                  <h3>You lost to <?= $games['username']; ?>! Confirm?</h3>
                <?php } else { ?>
                  <h3>You beat <?= $games['username']; ?>! Confirm?</h3>
                <?php } ?>
                <form action='/confirmation' method='post'>
                  <label>Did it happen?</label>
                  <input type='hidden' name='potential' value="<?= $games['potential_id']; ?>">
                  <button type="submit" name='confirm' class="btn btn-success">Confirm</button>
                  <button type="submit" name='remove' class="btn btn-danger">Remove</button>

                </form>
                <br>
               <?php } ?>

            </div>

            <div class="col-xs-6">
                <h2>Awaiting Challenges</h2>
                

                <?php foreach($invites as $invite){ ?>
                    <h3><a href="/view_profile/<?= $invite['user_id']?>"><?=$invite['username']?></a> has challenged you!</h3>
                   
                        
                       
                        <a href="/accept_game/<?= $invite['user_id']?>/<?= $invite['id']?>"><button class="btn btn-success">Accept</button></a>
                      
                        
                        
                        <a href="/decline/<?= $invite['id']?>">
                            <button class="btn btn-danger">Decline</button>
                        </a>
                        
                    
                    <hr>
                 <?php } ?>   
            </div>
        </div>     
     
        
        
        

      
    </div> <!-- end of container -->
  </div> <!-- #page-content-wrapper -->
    






  </div>
       <!-- /#wrapper -->
</body>
</html>