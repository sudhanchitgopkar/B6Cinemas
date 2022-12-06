<?php
    session_start();

    // connect to database
    require_once('../../controller/database.php');
    $conn = DBConnect::makeConnector();
    $conn->connect();

    $i = $_SESSION['loggedin'];
    if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) 
    {
        header("Location: ../loginAndReg/login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Tab Logo-->
    <link rel="icon" href="../images/WhiteB6.png" type="image/icon type">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="../homepage.css">
    <link rel="stylesheet" href="./showtimeStyle.css">
    <title>B6 Cinemas</title>
</head>

<body>
    <div id="navBar">
        <nav class="navbar navbar-expand-lg sticky-top navbar-light ">
            <a class="navbar-brand" href="../../index.php">
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
                                <a class="nav-link" href="../loginAndReg/login.php">Login</a>
                            </button>
                        </div>
                    </li>
                    
                </ul>
                <form class="form-inline">
                    <input class="form-control" type="search" placeholder="Search Movies" aria-label="Search">
                    <button class="btn" type="submit">Search</button>
                </form>
            </div>
        </nav>  
    </div> 
      
    <!--Main section-->

    <br><br>
    <h1>Select Showtime</h1>
    
    <form name="showtimeForm" method="POST" action="selectSeats.php">
        <?php
            $movieID = $_GET["id"];
            $query = 'SELECT * FROM show_';
            $statement = $db->prepare($query);
            $statement->execute();

            echo "<div class='showtime-buttons'>";
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                if ($row["movie_id"] == $movieID) {
                    echo " <input type='radio' name='showId' value='" . $row["show_id"] . "' required >" . $row["date"] . ", " .
                    $row["time"] % 12 . "PM" . "<br>";
                } //if
            } //while
            echo "</div>";
        ?>

        <div>
            <h1>Select Ticket Type</h1>

            <div class="select-container">
                <label for="adult">Adult Ticket(s):</label>
                <input type="text" size="3" name="adult" id="adult" required><br>
                <label for="child">Child Ticket(s):</label>
                <input type="text" size="3" name="child" id="child" required><br>
                <label for="senior">Senior Ticket(s):</label>
                <input type="text" size="3" name="senior" id="senior" required><br>
                <button type="submit" class="checkout-button1" href='selectSeats.php'">Select Seats</button>
            </div>
        </div>
        
       
    </form>



</body>
</html>
<script type="text/javascript">
    window.addEventListener('load', (event) => {
        var log = <?php echo $i ?>;

        if (log) {
            document.getElementById("loginToggle").innerHTML = '<button class="btn"><a class="nav-link" href="../loginAndReg/logout.php">Logout</a></button><button class="btn"><a class="nav-link" href="../profile/editprofile.php">Edit Profile</a></button>';
        }
    });
</script>


