<!doctype html>
<html lang="en">
  <head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="../homepage.css">
    <link rel="stylesheet" href="managePromoStyle.css">
  </head>

  <body>

    <div id="navBar">
      <nav class="navbar navbar-expand-lg sticky-top navbar-light ">
          <a class="navbar-brand" href="../../index.php">
              <img src="../../images/B6 Cinema (2).png" width="70" height="70" class="d-inline-block align-center" alt="B6 Cinemas logo">
             </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                      <button>
                          <a class="nav-link" href="../loginAndReg/login.html">Login</a>
                      </button>
                  </li>
                  
              </ul>
          </div>
      </nav>  
  </div>
    
    <div class="split left">
      <div class="nav-buttons">
        <button class="admin-button" onclick="location.href='manageAccounts.html'">Manage Accounts</a></button>
        <button class="admin-button" onclick="location.href='manageMovies.html'">Manage Movies</button>
        <button class="admin-button" onclick="location.href='managePromotions.php'">Manage Promotions</button>
      </div>
    </div>
    
    <div class="split right">
      <div class="content">
        <h1>Promotions</h1>
        <table class="fancy-table">
          <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Start</th>
                <th>End</th>
                <th>Active</th>
                <th>Send Promo</th>
                <th>Delete Promo</th>
            </tr>
          </thead>
          <?php
              require_once('../database.php');
              $query = 'SELECT * FROM promotion';
              $statement = $db->prepare($query);
              $statement->execute();

             while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                   echo "<tr>" . 
                   " <td>" . $row['promotion_id'] . " </td>" . 
                   " <td>" . $row['promotion_key'] . " </td>" . 
                   " <td>" . $row['start_'] . " </td>" . 
                   " <td>" . $row['end_'] . " </td>" . 
                   " <td>" . $row['promotion_amount'] . " </td>" . 
                   " <td> <form method='post' action = '../../php/adminStuff/sendPromo.php?id=" . $row['promotion_id'] .
                   "'> <button> Send </button> </form></td>" . 
                   " <td> ";
                   if($row['sent_status'] == 0) {
                     echo "<form method='post' action = '../../php/adminStuff/deletePromo.php?id=" . $row['promotion_id'] .
                     "'> <button> Delete </button> </form>";
                   } else {
                     echo "N/A";
                   }
                   echo "</td></tr>";
               }
              ?>
      </table>
          <br>
          <button class="add-button" onclick="location.href='addPromotion.html'">Add Promotion</button>
      </div>
    </div>
  </body>
</html>

