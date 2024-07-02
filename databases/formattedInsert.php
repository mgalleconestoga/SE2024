<?php
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=elevator', // Data source name
    'michael',                              // Username
    'ese'                                   // Password
);
// Return arrays with keys that are the name of the fields
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Insert static data (Keep changing time (UNIQUE) - Removed nodeID since it is set to AUTO_INCREMENT
$query = 'INSERT INTO elevatorNetwork 
          ( date,       time, status,  currentFloor, requestedFloor,  otherInfo) VALUES 
          (:date,      :time,:status, :currentFloor,:requestedFloor, :otherInfo)';  // ':' identified parameters
$statement = $db->prepare($query);    

$params = [ // This data can come from the $_GET or $_POST array
    'date' => '2030-06-08',
    'time' => '11:11:30',   // Unique so need to change every time reload
    'status' => 1,
    'currentFloor' => 1,
    'requestedFloor' => 1,
    'otherInfo' => 'na'
];
$result = $statement->execute($params);

$rows = $db->query('SELECT * FROM elevatorNetwork');
foreach($rows as $row) {
    var_dump($row);
    echo "<br/><br/>";
}
?>