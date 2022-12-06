<?php

    include 'connect.php';

    $sem = $_POST["sem"];
    $year = $_POST["year"];
    $assessment = $_POST["assessment"];
    $course = $_POST["course"];
    $section = $_POST["section"];

    $cquery = mysqli_query($conn, "SELECT CourseID FROM course_list WHERE CourseCode = '$course';");
    $courseID = mysqli_fetch_array($cquery);

    mysqli_query($conn, "INSERT INTO `assessment` (`AssessmentID`, `AssessmentName`, `Semester`, `Year`, CourseID) 
                            VALUES ('', '$assessment', '$sem', '$year', '$courseID[0]');");

    $query = mysqli_query($conn, "SELECT `AssessmentID` 
                                    FROM `assessment` 
                                    WHERE `AssessmentName` = '$assessment' AND 
                                    `Semester`= '$sem' AND `Year` = '$year' AND '$courseID[0]';");

    $assessmentID =  mysqli_fetch_array($query);

    /*if(mysqli_num_rows(mysqli_query($conn, $query)) == 0){
        
        mysqli_query($conn, $insertsql);
        echo "<h1>ADDED</h1>";
    }

    $assessmentID = mysqli_query($conn, $query);
    $assessmentID = $assessmentID->fetch_array();*/

    $Q = $_POST['question'];
    $Qmarks = $_POST['Qmarks'];
    $COquestion = $_POST['COquestion'];

    foreach($Q as $key => $question){
        if(mysqli_query($conn, "INSERT INTO `question` (`QuestionID`, `AssessmentID`, COID, `Question`, `QuestionMarks`, DifficultyLevel) 
                    VALUES ('', '$assessmentID[0]', '$COquestion[$key]', '$question', '$Qmarks[$key]', '3');")){
            header("location: TaskDone.php");
        }
    }


    $qarray = mysqli_query($conn, "SELECT QuestionID FROM question WHERE AssessmentID = '$assessmentID[0]'");

    session_start();
    $_SESSION["qarray"] = $qarray;
    $_SESSION["assessmentID"] = $assessmentID[0];



?>