<?php
    session_start();

    // connect to database
    require_once('../../php/database.php');

    $i = $_SESSION['loggedin'];
 
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="../homepage.css">
    <link rel="stylesheet" href="manageMoviesStyle.css">
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
    
    <div class="split left">
      <div class="nav-buttons">
        <button class="admin-button" onclick="location.href='manageAccounts.html'">Manage Accounts</a></button>
        <button class="admin-button" onclick="location.href='manageMovies.html'">Manage Movies</button>
        <button class="admin-button" onclick="location.href='managePromotions.html'">Manage Promotions</button>
      </div>
    </div>
    
    <div class="split right">
        <div class="content">
            <?php
                $query = 'SELECT * FROM movie';

                $statement = $db->prepare($query);
                $statement->execute();
            
                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    if($row['movie_id']) {
                        echo "
                        <div class='main-container'>
                            <div class='poster-container'>
                            <img src=". $row['trailer_picture']." class='poster'/>
                            
                            <div class='ticket-container'>
                                <div class='ticket__content'>
                                    <h4 class='ticket__movie-title'>".$row['title']."</h4>
                                    <a href='../adminPortal/showtime.php?id=".$row["movie_id"]."'><button class='ticket__buy-btn'>Showtimes</button></a>
                                </div>
                            </div>
                        </div>";
                    } 
                }
            ?>
        
            
               
            </div>
        </div>
        <button class="add-movie"  onclick="location.href='addMovie.php'">Add Movie</button>
      </div>
    </div>
  </body>
</html>