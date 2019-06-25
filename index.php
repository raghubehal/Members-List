<!DOCTYPE html>
<html lang="en">
<head>
  <title>Members List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Members List</h2>  
  <?php
     $mysqli = new mysqli("localhost", "root", "1357", "members_task");
	 $result = $mysqli->query("SELECT users.first_name,users.last_name,
	 						   GROUP_CONCAT(teams.name ORDER BY teams.name SEPARATOR ',') as team_names
	 				 		   FROM users LEFT JOIN teams_users 
							   ON teams_users.user_id = users.id LEFT JOIN teams ON teams.id = teams_users.team_id 
							   GROUP BY users.first_name");
	
  ?>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Teams</th>
      </tr>
    </thead>
    <tbody>
    <?php
	 while($row = $result->fetch_assoc()){?>
      <tr>
        <td><?php echo $row['first_name'];?></td>
        <td><?php echo $row['last_name'];?></td>
        <td><?php echo $row['team_names'];?></td>
      </tr>     
      <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>
