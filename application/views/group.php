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
              <a href="#">Chat</a>

          </li>
          <li>
              <a href="#">Tournaments</a>
          </li>
          <li>
              <a href="/all_users">Active Users</a>
          </li>
           <li>
              <a href="">Group Chat</a>
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
        


    <div class='container' id="groupback">  <!-- center of webpage info -->
       <div class="row">
            <h1 class="text-center"><?= $group_info['stack']. " ".$group_info['start_date']; ?></h1>
        </div>

        <div class="row">
            <div class="col-xs-5">
                <h3 class="text-center">Cohort Players</h3>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Name </th>
                      <th>Username </th>
                      <th>Rank </th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach($group_users as $values){ ?>
                    <tr>
                      <td><?= $values['first_name']. " " .$values['last_name']?></td>
                      <td><a href="/view_profile/<?= $values['id']; ?>"><?= $values['username']; ?></a></td>
                      <td><?= $values['rank']?></td>
                    </tr>
                <?php } ?>
                  </tbody>
                </table>
            </div>

            <div class="col-xs-4 col-xs-offset-2">
                <h3 class="text-center">Cohort Leaders</h3>
                  <ul>
            <?php foreach($group_ladder as $values){ ?>
                <li><a href="/view_profile/<?= $values['id']; ?>"><?= $values['rank']. " " .$values['username']; ?></a></li>
            <?php } ?>
                  </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
              <a href="/chat/<?= $group_info['id']; ?>"><button class="btn btn-primary">Chat Room</button></a> 
            </div>
        </div>
    </div> <!-- end of container -->
  </div> <!-- #page-content-wrapper -->
    


  </div>
       <!-- /#wrapper -->
</body>
</html>