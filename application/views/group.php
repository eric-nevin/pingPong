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
        border: 1px solid gray;*/
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
      .profile{
        height: 30px;
        width: 100%;
        background-color: silver; 
        margin-bottom: 5px;
        border: 1px solid black;
        text-align: center;
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
      </div>
    </div>

    <div class='container'>
      <div class="row">
        <h2><?= $group_info['stack']. " ".$group_info['start_date']; ?></h2>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <h1>Cohort Players</h1>
          <?php foreach($group_users as $values){ ?>
            <a href="/view_profile/<?= $values['id']; ?>"><div class="profile"><?= $values['username']; ?></div></a>
         <?php } ?>
        </div>
        <div class="col-xs-6">
        <h1>Cohort Leaders</h1>
        <?php foreach($group_ladder as $values){ ?>
          <a href="/view_profile/<?= $values['id']; ?>"><div class="profile"><?= $values['rank']. " " .$values['username']; ?></div></a>
        <?php } ?>
        </div>
        <a href="/chat/<?= $group_info['id']; ?>">Chat</a>
      </div>
      <?php var_dump($group_info); ?>
      
      </div>
  </body>
</html>