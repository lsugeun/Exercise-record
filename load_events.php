<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "healthdate";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}

$sql = "SELECT exercise_date, exercise_name FROM exercise_records";
$result = $conn->query($sql);

$events = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $event = array(
            'title' => $row['exercise_name'],
            'start' => $row['exercise_date']
        );
        array_push($events, $event);
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($events);
?>
