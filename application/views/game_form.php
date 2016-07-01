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
        /*border: 1px solid gray;*/
      }
      .th-1 {
        width: 45%;
      }
     /* .th-2 {
        width: 35%;
      }*/
      .th-3 {
        width: 25%;
      }
      .th-4 {
        width: 20%;
      }
      .button_box{
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
    <?php var_dump($user_info); ?>
    <div class='container'>
      <div class="row">
          <div class="col-xs-3">
        <!-- icon -->
          </div>
          <div class="col-xs-9">
            <h2>Name: <?= $user_info[0]['first_name']. " " .$user_info[0]['last_name']; ?></h2>
            <h4>Current Stack: <?= $current_group['stack']. " ". $current_group['start_date']; ?> </h4>
            <h4>Total Wins: <?= $global_score[0]. '-' .$global_score[1]; ?>    </h4>

          <!-- profile -->
          </div>
      </div> <!-- end of top section -->
      <div class="row">
      <div class="col-xs-3">
      </div>
      <div class="col-xs-6">
        <form method="post" action="/add_score_form">
  		  <div class="form-group row">
  		    <div class="col-sm-10">
  		      <div class="radio">
  		        <label>
  		          <input type="radio" name="winner" id="gridRadios1" value="win" checked>
  		          <input type="hidden" name="opponent_id" value="<?= $user_info[0]['user_id']; ?>">
  		          <input type="hidden" name="opponent_group" value="<?= $current_group['id']; ?>">
  		          	I won!
  		        </label>
  		      </div>
  		      <div class="radio">
  		        <label>
  		          <input type="radio" name="winner" id="gridRadios2" value="loss">
  			          <?= $user_info[0]['username']; ?> won!
  		        </label>
  		      </div>
  		    </div>
  		  </div>
  		  <button type="submit" class="btn btn-primary">Submit</button>
  		</form>
		</div>
		<div class="col-xs-3">
		</div>
      </div>
    </div>
  </body>
</html>