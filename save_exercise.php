<?php
// MySQL 데이터베이스 연결 설정
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "healthdate";

//데이터베이스 연결 설정
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    die("데이터베이스 연결 실패" . $conn->connect_error);
}


//POST로 전달된 운동 기록 데이터 가져오기
$exerciseDate = $_POST['exercise_date'];
$exerciseName = $_POST['exercise_name'];

//운동 기록 데이터 데이이터베이스에 저장
$sql = "INSERT INTO exercise_records (exercise_date, exercise_name) VALUES ('$exerciseDate', '$exerciseName')";
if ($conn->query($sql) ===TRUE){
    echo "운동 기록이 성공적으로 저장되었습니다";
    echo "<script>
        setTimeout(function() {
            window.location.href = 'input_exercise.html';
        }, 1000); // 1초 후에 exercise.html 페이지로 이동
    </script>";
}else{
    echo "운동 기록 저장 실패:". $conn->error;
}

//데이터베이스 연결 닫기
$conn->close();
?>

