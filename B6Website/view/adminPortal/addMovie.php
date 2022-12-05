<?php
    require_once('../../controller/database.php');
    $conn = DBConnect::makeConnector();
  $conn->connect();
    session_start();


?>
<!doctype html>
<html lang="en">
  <head>
    <title>B6 Cinemas</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="../homepage.css">
    <link rel="stylesheet" href="addPromoStyle.css">
  </head>

  <body>

  <div id="navBar">
      <nav class="navbar navbar-expand-lg sticky-top navbar-light ">
          <a class="navbar-brand" href="adminIndex.html">
              <img src="../images/B6 Cinema (2).png" width="70" height="70" class="d-inline-block align-center" alt="B6 Cinemas logo">
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
        <button class="admin-button" onclick="location.href='manageMovies.php'">Manage Movies</button>
        <button class="admin-button" onclick="location.href='managePromotions.php'">Manage Promotions</button>
      </div>
    </div>
    
    <div class="split right">
      <div class="content">
        <h1>Add a Movie</h1>
        <br>
        <div class="text-forms">
          <form action="../../model/adminStuff/newMovie.php" method="post">
              <label for="name">Title:</label>
              <input type="text" name="title" id="title" required><br>
              <label for="genre">Genre:</label>
              <select id="genre" name="genre">
                <option value="comedy">Comedy</option>
                <option value="drama">Drama</option>
                <option value="adventure">Adventure</option>
                <option value="war">War</option>
              </select><br>
              <label for="cast">Cast:</label>
              <input type="text" name="cast" id="cast" required><br>
              <label for="director">Director:</label>
              <input type="text" name="director" id="director" required><br>
              <label for="producer">Producer:</label>
              <input type="text" name="producer" id="producer" required><br>
              <label for="review">Review:</label>
              <input type="text" name="review" id="review" required><br>
              <label for="rating">Rating:</label>
              <select id="rating" name="rating">
                <option value="E">E</option>
                <option value="pg">PG</option>
                <option value="pg13">PG-13</option>
                <option value="R">R</option>
              </select><br>
              <label for="trailerPic">Trailer Image:</label>
              <input type="text" name="trailerPic" id="trailerPic" required><br>
              <label for="trailerVid">Trailer Video:</label>
              <input type="text" name="trailerVid" id="trailerVid" required><br>
              <label class="desc-label" for="synopsis">Synopsis:</label>
              <textarea id="synopsis" name="synopsis" rows="4" cols="50" required></textarea><br>
              <button class = "add-button" id = "btn" href="./manageMovies.php">Add Movie</button>
          </form>
        </div>
        <br>
      </div>
    </div>
  </body>
</html>