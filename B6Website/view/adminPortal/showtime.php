<?php
    session_start();

    // connect to database
    require_once('../../php/database.php');

    $id = $_GET['id'];
    $query = 'SELECT * FROM movie WHERE movie_id=:_movie_id';
        
    $queryStatement = $db->prepare($query);
    $queryStatement->bindValue(':_movie_id', $id);
            
    $queryStatement->execute();
    $movie = $queryStatement->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="showtime.css">
    <title>Showtimes</title>
</head>
<body>
    <div id="navBar">
            <nav class="navbar navbar-expand-lg sticky-top navbar-light ">
                <a class="navbar-brand" href="adminIndex.html">
                    <img src="../../images/B6 Cinema (2).png" width="70" height="70" class="d-inline-block align-center" alt="B6 Cinemas logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <div id="loginToggle">
                                <button class="btn">
                                    <a class="nav-link" href="../loginAndReg/logout.php">Logout</a>
                                </button>
                            </div>
                        </li>    
                    </ul>
                </div>
            </nav>  
    </div> 

    <div>
        <h1><b><?php echo $movie['title']?></b></h1>
    </div>

    <h1>Showtimes</h1>
        <table class="fancy-table">
          <thead>
            <tr>
                <th>Show Date</th>
                <th>Show Time</th>
                <th>Show Room</th>
                <th>Delete Show</th>
            </tr>
          </thead>
          <?php
              require_once('../database.php');
              $query = 'SELECT * FROM show_';
              $statement = $db->prepare($query);
              $statement->execute();

             while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                if($row['movie_id'] == $movie['movie_id']) {
                   echo "<tr>" . 
                   " <td>" . $row['date'] . " </td>" . 
                   " <td>" . $row['time'] . " pm </td>" . 
                   " <td>" . $row['showroom_id'] . " </td>" .  
                   " <td>" . "<form method='post' action = '../../php/adminStuff/deleteShowtime.php?id=" . $row['show_id'] .
                   "'> <button> Delete </button> </form></td>" .
                   " </tr>";
               }
            }
              ?>
      </table>
      <br>
    <div class="newShow">
        <form action="../../php/adminStuff/scheduleMovie.php?id=<?php echo $_GET["id"];?>" method="post">
            <label for="date">Show Date: </label>
            <input type="date" name="date" id="date">
            <br>

            <label for="time">Show Time: </label>
            <select name="time" id="time">
                <option>2</option>
                <option>4</option>
                <option>6</option>
                <option>8</option>
            </select>
            <br>

            <label for="showroom">Show Room</label>
            <select name="showroom" id="showroom">
            <?php
              require_once('../database.php');
              $query = 'SELECT * FROM showroom';
              $statement = $db->prepare($query);
              $statement->execute();

             while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                   echo "<option>" . $row['showroom_id'] . " </option>";
             }
              ?>
              </select>
              <br>
                <button class='add_showtime_button'>Add Showtime</button>
        </form>

        
    </div>


</body>
</html>