<?php
    session_start();

    // connect to database
    require_once('../../controller/database.php');

    $i = $_SESSION['loggedin'];

    $showID = filter_input(INPUT_POST, 'showId');
    $adult = filter_input(INPUT_POST, 'adult');
    $child = filter_input(INPUT_POST, 'child');
    $senior = filter_input(INPUT_POST, 'senior');

    $numTickets = $adult + $child + $senior;
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
            </div>
        </nav>  
    </div> 
      
    <!--Main section-->

    <h1>Select Seats</h1>
    <div class="theater-seats">
        <form name="seatForm" class="seatForm" action="../orderConfirmation/confirmOrderPage.php" method="POST">
            <ol class="theater">
                <div class="top-seats">
                    <li class="row row1">
                        <ol class="seats">
                            <li class="seat">
                                <input type="checkbox" name="seat" id="11" />
                                <label for="A1"></label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" name="seat" id="12" />
                                <label for="A2"></label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" name="seat" id="13" />
                                <label for="A3"></label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" name="seat" id="14" />
                                <label for="A4"></label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" name="seat" id="15" />
                                <label for="A5"></label>
                            </li>
                        </ol>
                    </li>
                    <li class="row row2">
                        <ol class="seats">
                            <li class="seat">
                                <input type="checkbox" name="seat" id="21" />
                                <label for="B1"></label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" name="seat" id="22" />
                                <label for="B2"></label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" name="seat" id="23" />
                                <label for="B3"></label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" name="seat" id="24" />
                                <label for="B4"></label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" name="seat" id="25" />
                                <label for="B5"></label>
                            </li>
                        </ol>
                    </li>
                    <li class="row row3">
                        <ol class="seats">
                            <li class="seat">
                                <input type="checkbox" name="seat" id="31" />
                                <label for="C1"></label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" name="seat" id="32" />
                                <label for="C2"></label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" name="seat" id="33" />
                                <label for="C3"></label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" name="seat" id="34" />
                                <label for="C4"></label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" name="seat" id="35" />
                                <label for="C5"></label>
                            </li>
                        </ol>
                    </li>
                    <li class="row row4">
                        <ol class="seats">
                            <li class="seat">
                                <input type="checkbox" name="seat" id="41" />
                                <label for="D1"></label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" name="seat" id="42" />
                                <label for="D2"></label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" name="seat" id="43" />
                                <label for="D3"></label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" name="seat" id="44" />
                                <label for="D4"></label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" name="seat" id="45" />
                                <label for="D5"></label>
                            </li>
                        </ol>
                    </li>
                    <li class="row row5">
                        <ol class="seats">
                            <li class="seat">
                                <input type="checkbox" name="seat" id="51" />
                                <label for="E1"></label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" name="seat" id="52" />
                                <label for="E2"></label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" name="seat" id="53" />
                                <label for="E3"></label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" name="seat" id="54" />
                                <label for="E4"></label>
                            </li>
                            <li class="seat">
                                <input type="checkbox" name="seat" id="55" />
                                <label for="E5"></label>
                            </li>
                        </ol>
                    </li>
                </div>
            </ol>
        </form>
        
    </div>

    <p class="screen">screen</p>

    <div class="select-container">
        <button type="submit" class="checkout-button" onclick="location.href='../orderConfirmation/confirmOrderPage.php'">Checkout</button>
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
<script type="text/javascript">
        document.onclick = function() {
            var checkBoxGroup = document.forms['seatForm']['seat'];
            var limit = <?php echo $numTickets ?>;
            
            for (var i = 0; i < checkBoxGroup.length; i++) {
                var checkedcount = 0;
                for (var i = 0; i < checkBoxGroup.length; i++) {
                    checkedcount += (checkBoxGroup[i].checked) ? 1 : 0;
                }   
            }
        }
</script>