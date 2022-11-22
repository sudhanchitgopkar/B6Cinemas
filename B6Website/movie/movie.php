<?php
    session_start();

    // connect to database
    require_once('../controller/database.php');

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
    
    <!--Tab Logo-->
    <link rel="icon" href="../view/images/WhiteB6.png" type="image/icon type">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../view/main.css">
    <link rel="stylesheet" href="../.view/homepage.css">
    <link rel="stylesheet" href="movie.css">
    <title>B6 Cinemas</title>
</head>

<body>
<div id="navBar">
    <nav class="navbar navbar-expand-lg sticky-top navbar-light ">
        <a class="navbar-brand" href="../index.php">
            <img src="../view/images/B6 Cinema (2).png" width="70" height="70" class="d-inline-block align-center" alt="B6 Cinemas logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <div id="loginToggle">
                        <button class="btn">
                            <a class="nav-link" href="../view/loginAndReg/login.php">Login</a>
                        </button>
                    </div>
                </li>
            </ul>

            <h1 class="form-inline">
                <button class="show_button">
                    <a href="../view/buyTickFlow/selectShowtime.php?id=<?php echo $id;?>">Book Movie</a>
                </button>
            </h1>
        </div>
    </nav>
</div>

<div class="mainMovie">
    <h1><?php echo $movie['title']?></h1>
    <br>
    <div class="media">
        <img src=<?php echo $movie['trailer_picture']?>></img>
    </div>
    <br>
    <div class = "info">
    <h2>Cast: <?php echo $movie['cast']?></h2>
    <h2>Director: <?php echo $movie['director']?></h2>
    <h2>Producer: <?php echo $movie['producer']?></h2>
    <h2>Reviews: <?php echo $movie['reviews']?></h2>
    <h2>MPAA Rating: <?php echo $movie['mpaa_rating']?></h2>
    <br>
    <h2> <b>Synopsis:</b>  <?php echo $movie['synopsis']?></h2>
    </div>
    <br>
    <div class="media">
        <iframe width=500px height=300px src=<?php echo $movie['trailer_video']?>></iframe>
    </div>
    <br>
</div>

    
</body>
</html>