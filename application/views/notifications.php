<!DOCTYPE html>
<html lang='en-US'>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <title>Friends</title>
    <style>
      body,html {
        height: 100%;
      }
      body {
        padding-top: 50px;
      }
      .text-center a {
        margin-right: 10px;
        margin-left: 10px;
        font-size: 20px;
      }
      table {
        width: 90%;
        border: 3px solid silver;
      }
      .table-container {
        margin-top: 50px;
      }
      th {
        border: 1px solid gray;
      }
      .th-1 {
        width: 45%;
      }
     .th-2 {
        width: 35%;
      }
      .th-3 {
        width: 25%;
      }
      .th-4 {
        width: 20%;
      }

     

    </style>
  </head>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/home">Ping Pong</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="/notifications">Notifications</a></li>
            <li><a href="/groups">Groups</a></li>
            <li><a href="/leaderboard">Leaderboard</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/loginnreg/logoff">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>

    
    <div class='container'>

      <div class="row">
          <div class="col-xs-3">
          </div> <!-- end of top section -->
          <div class="row">
              <div class="col-xs-3">
              </div>
              <div class="col-xs-6">
              <?php foreach($potential_games as $games){
                if($games['wins'] == 1){ ?>
                  You lost to <?= $games['username']; ?>! Confirm?
                <?php } else { ?>
                  You beat <?= $games['username']; ?>! Confirm?
                <?php } ?>
                <form action='/confirmation' method='post'>
                  <label>Did it happen?</label>
                  <input type='hidden' name='potential' value="<?= $games['potential_id']; ?>">
                  <button type="submit" name='confirm' class="btn btn-primary">Confirm</button>
                  <button type="submit" name='remove' class="btn btn-primary">Remove</button>

                </form>
                <br>
               <?php } ?>

              </div>
              <div class="col-xs-3">
              </div>
          </div>
          <div class="row">
          </div>
      </div>
  </body>
</html>
