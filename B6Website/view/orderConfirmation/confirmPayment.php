<?php
    session_start();

    // connect to database
    require_once('../../controller/database.php');
    $conn = DBConnect::makeConnector();
    $conn->connect();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/WhiteB6.png" type="image/icon type">
    <title>Confirm Payment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="confirmPayment.css">
</head>

<body>
    <div >
        <nav class="navbar navbar-expand-lg sticky-top navbar-light ">
            <a class="navbar-brand" href="../../index.php">
                <img src="../images/B6 Cinema (2).png" width="70" height="70" class="d-inline-block align-center" alt="B6 Cinemas logo">
               </a>
            
            <div class="nav-text navbar-nav navbar-center">
                Confirm Payment
            </div>
        </nav>   
    </div>

    <div>
        <div class="card-div">
            <form class="addTempCard" id="addTempCard" action="../../model/orderConfirmation/finalizeCheckout.php" method="post">
            <div>
                <h4 class="card-header">
                    Enter credit card information:
                </h4>

                <br><br>
                <label for="creditCardName">Name on Card:</label>
                <input type="text" id="creditCardName" name="creditCardName"><br>
                <label for="creditCardNumber">Card Number:</label>
                <input type="text" id="creditCardNumber" name="creditCardNumber"><br>
                <label for="expirationDate">Expiration Date (MM/YY):</label>
                <input type="text" id="expirationDate" name="expirationDate"><br>
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv"><br>
                <label for="billingAddress">Billing Address:</label>
                <input type="text" id="billingAddress" name="billingAddress"><br>

                 <br>
                 <?php
                    $ccQuery = "SELECT COUNT(3) as total FROM payment_card WHERE owner_id=:_owner_id";
                    $statement = $db->prepare($ccQuery);

                    $statement->bindValue(":_owner_id", $_SESSION['userID']);
                    $statement->execute();

                    if($statement->fetch(PDO::FETCH_ASSOC)['total'] < 3) {
                        echo "<label for='saveCardCheck'>Save Card</label> <input type='checkbox' id='saveCardCheck' name='saveCardCheck' value='Yes'>";
                    }
                 ?>
                </div>
                <div>
                    <h4 class="card-header">
                        Use a saved card:
                    </h4>

                <br><br>
                <label for="savedcards">Saved Cards:</label>
                    <select name="savedcards" id="savedcards">
                        <option value="none">Use Temp Card</option>
                        <?php
                            $cQuery = "SELECT * FROM payment_card WHERE owner_id=:_owner_id";
                            $statement = $db->prepare($cQuery);

                            $statement->bindValue(":_owner_id", $_SESSION['userID']);
                            $statement->execute();

                            while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option>****" . $row['card_last_four'] . "</option>";
                            }
                        ?>
                    </select>
                </div>

                <br>
                <input class="nav-confirm-btn" type="submit" value="Confirm and Continue">
                <input class="nav-confirm-btn" value="Cancel" onclick="location.href='../../index.php'">
            </form>
        </div>
        <br><br>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>