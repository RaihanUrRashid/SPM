<?php
    include 'connect.php';
    include 'MenuBar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question View</title>
    <link rel = stylesheet href= global_bg.css?parameter=3>
</head>
<body>
    <div class='questionView'>
    <?php
        session_start();
        $assessID = $_SESSION["assessmentID"];

        $assessDetails = mysqli_query($conn, "SELECT AssessmentName, Semester, Year FROM assessment WHERE AssessmentID = '$assessID'");
        while ($row = mysqli_fetch_array($assessDetails)){
            echo "Assessment Type: ", $row['AssessmentName'], "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Semester: ", 
                $row['Semester'], "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Year:", $row['Year'], "<br><br>";
        }

        $qarray = mysqli_query($conn, "SELECT COID, Question, QuestionMarks, DifficultyLevel FROM question WHERE AssessmentID = '$assessID'");

        while ($row1 = mysqli_fetch_array($qarray)){
            echo "Question:<br><textarea rows=\"10\" cols=\"100\">", $row1['Question'], "</textarea><br>", 
                "<br>CO: CO", $row1['COID'], "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Question Marks:", $row1['QuestionMarks'], 
                "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Difficulty Level:",$row1['DifficultyLevel'], "<br><br>";
        }

        
    ?>
</div>


</body>
</html>