<?php
// connect to database

require_once('../../controller/database.php');

    $date = filter_input(INPUT_POST, 'date');
    $time = filter_input(INPUT_POST, 'time');
    $showroom = filter_input(INPUT_POST, 'showroom');
    $movieID = $_GET['id'];

    $query = "SELECT * FROM show_";
    $statement = $db->prepare($query);
    $statement->execute();

    $currShowString = 
        "showroom:" . $showroom .
        ",date:" . $date . ",time:" . $time;
    $isUniqueShowtime = true;

    while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $showToString = 
        "showroom:" . $row["showroom_id"] .
        ",date:" . $row["date"] . ",time:" . $row["time"];
        if ($showToString == $currShowString) {
            $isUniqueShowtime = false;
            break;
        } //if
    } //while

   if ($isUniqueShowtime) {
    $insertionQuery = 'INSERT INTO show_ 
    (movie_id, showroom_id, date, time)
    VALUES (:_movie_id, :_showroom_id, :_date, :_time)';
    $insertionStatement = $db->prepare($insertionQuery);
    $insertionStatement->bindValue(':_movie_id', $movieID);
    $insertionStatement->bindValue(':_showroom_id', $showroom);
    $insertionStatement->bindValue(':_date', $date);
    $insertionStatement->bindValue(':_time', $time);
    $insertionStatement->execute();
    $insertionStatement->closeCursor();
    header("Location: ../../view/adminPortal/showtime.php?id=".$movieID."&success=true");
}
else {
    header("Location: ../../view/adminPortal/showtime.php?id=".$movieID."&success=false");
}
?>