<?php
    session_start();

    // connect to database
    require_once('./controller/database.php');
    $conn = DBConnect::makeConnector();
    $conn->connect();

    $i = $_SESSION['loggedin'];
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Tab Logo-->
    <link rel="icon" href="./view/images/WhiteB6.png" type="image/icon type">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="view/main.css">
    <link rel="stylesheet" href="view/homepage.css">
    <title>B6 Cinemas</title>
</head>

<body>
<div id="navBar">
    <nav class="navbar navbar-expand-lg sticky-top navbar-light ">
        <a class="navbar-brand" href="#">
            <img src="./view/images/B6 Cinema (2).png" width="70" height="70" class="d-inline-block align-center" alt="B6 Cinemas logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <div id="loginToggle">
                        <button class="btn">
                            <a class="nav-link" href="view/loginAndReg/login.php">Login</a>
                        </button>
                    </div>
                </li>

            </ul>
            
            <form class="form-inline">
            <input 
                placeholder="Search Movies"
                class="form-control"
                ype="search" 
                oninput="liveSearch()" 
                id="searchbox" 
            >
               <!--<button class="btn" type="submit">Search</button>-->
            </form>
        </div>
    </nav>
</div>

<!--Fun logo-->
<div class="funLogo">
    <h1><b>Welcome To</b></h1>
    <img src="./view/images/B6CinemaBigLogo.png">
    <h1><b>B6 Cinemas</b></h1>
</div>
<br>


<!--Main section-->
<div>
    <h1>Now Playing</h1><br>

    <div class="hero-container first" >
        <?php   
            $query = 'SELECT * FROM movie';

            $statement = $db->prepare($query);
            $statement->execute();
           
            while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                if($row['movie_id'] < 7) {
                    echo "
                    <div class='main-container' id='box'>
                    <movie-card 
                        rating=".$row["mpaa_rating"].
                        " movie='".$row["title"] . 
                        "' page= ../B6Website/movie/movie.php?id=".$row["movie_id"].
                        " genre=".$row["genre"].
                        " poster=".$row["trailer_picture"].">
                    </movie-card>  
                </div>";
                }
                
            }
        ?>
            
    </div> 


    <h1 id="soon">Coming Soon</h1>
    <div class="hero-container second" >
           
            
    <?php
            $conn = DBConnect::makeConnector();
            $conn->connect();
            $query = 'SELECT * FROM movie';

            $statement = $db->prepare($query);
            $statement->execute();
           
            while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                if($row['movie_id'] >= 7) {
                    echo "
                    <div class='main-container' id='box'>
                    <movie-card 
                        rating=".$row["mpaa_rating"].
                        " movie='".$row["title"] . 
                        "' page= ../B6Website/movie/movie.php?id=".$row["movie_id"].
                        " genre=".$row["genre"].
                        " poster=".$row["trailer_picture"].">
                    </movie-card>  
                </div>";
                }
                
            }
        ?>

    </div>

    <br>
    <div class="space"></div>
</div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="movie-card.js"></script>
    
    <script type="text/javascript">
        window.addEventListener('load', (event) => {
            var log = <?php echo $i ?>;

            if (log) {
                document.getElementById("loginToggle").innerHTML = '<button class="btn"><a class="nav-link" href="view/loginAndReg/logout.php">Logout</a></button><button class="btn"><a class="nav-link" href="view/profile/editprofile.php">Edit Profile</a></button>';
            }
        });
    </script> 
    
   </body> 
</html>