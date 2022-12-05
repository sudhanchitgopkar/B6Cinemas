<?php
    session_start();

    // connect to database
    require_once('../../controller/database.php');
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
    <?php
        $movieID = $_GET["id"];
        $query = 'SELECT * FROM show_';
        $statement = $db->prepare($query);
        $statement->execute();

        echo "<div class='showtime-buttons'>";
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            if ($row["movie_id"] == $movieID) {
                echo " <button class='time-buttons'>" . $row["date"] . ", " .
                $row["time"] % 12 . "PM" . "</button>";
            } //if
        } //while
        echo "</div>";
    ?>
    <!--
    <div>
        <p class="showtime-dates">Friday, September 30th, 2022</p>
        <div class="showtime-buttons">
            <button class="time-buttons">10:30 PM</button>
            <button class="time-buttons">8:30 PM</button>
            <button class="time-buttons">5:00 PM</button>
        </div>
        <br>
        <p class="showtime-dates">Saturday, October 1st, 2022</p>
        <div class="showtime-buttons">
            <button class="time-buttons">10:30 PM</button>
            <button class="time-buttons">8:30 PM</button>
            <button class="time-buttons">5:00 PM</button>
        </div>
    </div>
    -->

    <h1>Select Seats</h1>
    <div class="theater-seats">
        <ol class="theater">
            <div class="top-seats">
                <li class="row row1">
                    <ol class="seats">
                        <li class="seat">
                            <input type="checkbox" id="A1" />
                            <label for="A1"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="A2" />
                            <label for="A2"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="A3" />
                            <label for="A3"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="A4" />
                            <label for="A4"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="A5" />
                            <label for="A5"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="A6" />
                            <label for="A6"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="A7" />
                            <label for="A7"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="A8" />
                            <label for="A8"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="A9" />
                            <label for="A9"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="A10" />
                            <label for="A10"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="A11" />
                            <label for="A11"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="A12" />
                            <label for="A12"></label>
                        </li>
                    </ol>
                </li>
                <li class="row row2">
                    <ol class="seats">
                        <li class="seat">
                            <input type="checkbox" id="B1" />
                            <label for="B1"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="B2" />
                            <label for="B2"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="B3" />
                            <label for="B3"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="B4" />
                            <label for="B4"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="B5" />
                            <label for="B5"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="B6" />
                            <label for="B6"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="B7" />
                            <label for="B7"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="B8" />
                            <label for="B8"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="B9" />
                            <label for="B9"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="B10" />
                            <label for="B10"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="B11" />
                            <label for="B11"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="B12" />
                            <label for="B12"></label>
                        </li>
                    </ol>
                </li>
                <li class="row row2">
                    <ol class="seats">
                        <li class="seat">
                            <input type="checkbox" id="C1" />
                            <label for="C1"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="C2" />
                            <label for="C2"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="C3" />
                            <label for="C3"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="C4" />
                            <label for="C4"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="C5" />
                            <label for="C5"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="C6" />
                            <label for="C6"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="C7" />
                            <label for="C7"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="C8" />
                            <label for="C8"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="C9" />
                            <label for="C9"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="C10" />
                            <label for="C10"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="C11" />
                            <label for="C11"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="C12" />
                            <label for="C12"></label>
                        </li>
                    </ol>
                </li>
                <li class="row row2">
                    <ol class="seats">
                        <li class="seat">
                            <input type="checkbox" id="D1" />
                            <label for="D1"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="D2" />
                            <label for="D2"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="D3" />
                            <label for="D3"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="D4" />
                            <label for="D4"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="D5" />
                            <label for="D5"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="D6" />
                            <label for="D6"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="D7" />
                            <label for="D7"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="D8" />
                            <label for="D8"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="D9" />
                            <label for="D9"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="D10" />
                            <label for="D10"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="D11" />
                            <label for="D11"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="D12" />
                            <label for="D12"></label>
                        </li>
                    </ol>
                </li>
                <li class="row row2">
                    <ol class="seats">
                        <li class="seat">
                            <input type="checkbox" id="E1" />
                            <label for="E1"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="E2" />
                            <label for="E2"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="E3" />
                            <label for="E3"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="E4" />
                            <label for="E4"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="E5" />
                            <label for="E5"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="E6" />
                            <label for="E6"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="E7" />
                            <label for="E7"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="E8" />
                            <label for="E8"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="E9" />
                            <label for="E9"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="E10" />
                            <label for="E10"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="E11" />
                            <label for="E11"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="E12" />
                            <label for="E12"></label>
                        </li>
                    </ol>
                </li>
                <li class="row row2">
                    <ol class="seats">
                        <li class="seat">
                            <input type="checkbox" id="F1" />
                            <label for="F1"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="F2" />
                            <label for="F2"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="F3" />
                            <label for="F3"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="F4" />
                            <label for="F4"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="F5" />
                            <label for="F5"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="F6" />
                            <label for="F6"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="F7" />
                            <label for="F7"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="F8" />
                            <label for="F8"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="F9" />
                            <label for="F9"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="F10" />
                            <label for="F10"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="F11" />
                            <label for="F11"></label>
                        </li>
                        <li class="seat">
                            <input type="checkbox" id="F12" />
                            <label for="F12"></label>
                        </li>
                    </ol>
                </li>
            </ol>
        </div>
    </div>

    <p class="screen">screen</p>

    <div>
        <h1>Select Ticket Type</h1>

        <div class="select-container">
            <form>
                <label for="adult">Adult Ticket(s):</label>
                <input type="text" size="3" id="adult"><br>
                <label for="child">Child Ticket(s):</label>
                <input type="text" size="3" id="child"><br>
                <label for="senior">Senior Ticket(s):</label>
                <input type="text" size="3" id="senior"><br>
                
            </form>

            <br>
            <button class="checkout-button" onclick="location.href='../orderConfirmation/confirmOrderPage.php'">Checkout</button>
        </div>
    </div>
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


