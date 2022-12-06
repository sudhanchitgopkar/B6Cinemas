<?php

    session_start();

    // connect to database
    require_once('../../controller/database.php');
    $conn = DBConnect::makeConnector();
    $conn->connect();

    if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) 
    {
        header("Location: ../loginAndReg/login.php");
    }

    $showID = $_SESSION['showID'];
    $adult = $_SESSION['adult'];
    $child = $_SESSION['child'];
    $senior = $_SESSION['senior'];

    $adultPrice = 8;
    $seniorPrice = 7;
    $childPrice = 5;

    $query = 'SELECT show_.show_id, movie.title FROM show_ INNER JOIN movie ON show_.movie_id = movie.movie_id WHERE show_id = :_show_id';
    $queryStatement = $db->prepare($query);
    $queryStatement->bindValue(':_show_id', $showID);
            
    $queryStatement->execute();
    $movie = $queryStatement->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/WhiteB6.png" type="image/icon type">
    <title>Confirm Order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="confirmOrderPage.css">
</head>

<body>
    <div >
        <nav class="navbar navbar-expand-lg sticky-top navbar-light ">
            <a class="navbar-brand" href="../../index.php">
                <img src="../images/B6 Cinema (2).png" width="70" height="70" class="d-inline-block align-center" alt="B6 Cinemas logo">
               </a>
            
            <div class="nav-text navbar-nav navbar-center">
                Confirm Order
            </div>
        </nav>   
    </div>

    <div>
        <div>
            <h4 class="reminder-text">
                
                Please take a moment to review your order.
            </h4>
            <table class="order-table">
                <tbody class="order-table-body">
                    <tr>
                        <th>
                            Tickets
                        </th>
                        <th>
                            Quantity
                        </th>
                        <th>
                            Amount
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $movie[1] ?> (Adult)
                        </td>
                        <td>
                            <?php echo $adult ?>
                        </td>
                        <td>
                            $<?php echo $adult*$adultPrice?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $movie[1] ?> (Child)
                        </td>
                        <td>
                            <?php echo $child ?>
                        </td>
                        <td>
                            $<?php echo $child*$childPrice?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $movie[1] ?> (Senior) 
                        </td>
                        <td>
                            <?php echo $senior ?>
                        </td>
                        <td>
                            $<?php echo $senior*$seniorPrice?>
                        </td>
                    </tr>
                </tbody>
                <tfoot class="order-table-foot">
                    <tr>
                        <td>
                            Order Total
                        </td>
                        <td>
                        </td>
                        <td>
                            $<?php 
                                $_SESSION['orderTotal'] = $adult*$adultPrice + $child*$childPrice + $senior*$seniorPrice;
                                echo $adult*$adultPrice + $child*$childPrice + $senior*$seniorPrice;
                            ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <button class="nav-confirm-btn" onclick="location.href='./confirmPayment.php'">Confirm and Continue</button>
        <button class="nav-confirm-btn" onclick="location.href='../../index.php'">Cancel</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>