<?php
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevator', // Data source name
    'michael',                              // Username
    'ese'                                   // Password
);
// Return arrays with keys that are the name of the fields
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Insert static data (Keep changing nodeID and time (PRIMARY and UNIQUE) they must be unique)
$query = 'INSERT INTO elevatorNetwork 
          (date,        time,       nodeID, status, currentFloor, requestedFloor, otherInfo) VALUES 
          ("2029-05-05","12:01:01", 5,      1,      1,             1,             "na")';  
$result = $db->exec($query);    

if($result === false) {
    $error = $db->errorInfo();
    echo "Error: " . $error[2];
} else {
    var_dump($result);
}

$rows = $db->query('SELECT * FROM elevatorNetwork');
foreach($rows as $row) {
    var_dump($row);
    echo "<br/><br/>";
}
?>

