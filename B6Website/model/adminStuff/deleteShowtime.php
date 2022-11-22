<?php
// connect to database
require_once('../../controller/database.php');

try {
    $showID = $_GET["id"];

    $movieQuery = 'SELECT * FROM show_ WHERE show_id = :_show_id';
    $movieStatement = $db->prepare($movieQuery);
    $movieStatement->bindValue(':_show_id', $showID);
    $movieStatement->execute();
    $info = $movieStatement->fetch();
    $movieStatement->closeCursor();

    // Querying the database
    $query = 'DELETE FROM show_ WHERE show_id = :_show_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':_show_id', $showID);
    $statement->execute();
    $statement->closeCursor();

    // Redirecting to the promotions page
    header("Location: ../../view/adminPortal/showtime.php?id=".$info['movie_id']);

} catch(PDOException $e) {
    echo 'Error!';
    echo $e;
}

?>