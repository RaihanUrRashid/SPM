<?php
    include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Question Bank</title>
        <?php 
            include 'C:\xampp\htdocs\Database\MenuBar.php';
        ?>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    </head>
    <body>
        <div class = "questionAddBox">
            <form action="processing.php" method="POST">

                    <label for="sem">Semester:</label>
                    <select name="sem" id="sem" required>
                        <option value="Summer">Summer</option>
                        <option value="Spring">Spring</option>
                        <option value="Autumn">Autumn</option>
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <label>Year:</label>
                    <input id = "year" name = "year" type="text" size="4" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                    <label for="assessment">Assessment: </label>
                    <input id = "assessment" name = "assessment" type="text" size="7" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                

                <?php
                    session_start();
                    $queryID =  $_SESSION["username"];
                    $sql ="SELECT COURSE_CODE FROM faculty_course WHERE FACULTY_ID = '$queryID' GROUP BY COURSE_CODE;";
                    $course_list = mysqli_query($conn, $sql);
                ?>

                <label for="course">Course Code:</label>

                <select name="course" id="course" required>

                    <?php
                        while ($CL = mysqli_fetch_array($course_list,MYSQLI_ASSOC)):;
                    ?>

                    <option>
                        <?php echo $CL["COURSE_CODE"];?>
                    </option>
                    <?php
                        endwhile;
                    ?>

                </select>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label>Section:</label>
                <input id = "section" name = "section" type="text" size="2" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <br>
       
                <div id = "questionDiv" class = "questionAdd">
                    <br>

                    <label>Input Question 1: </label><br>
                    <textarea id = "question1" name = "question[]" rows="10" cols="100" required>
                    </textarea><br><br>

                    <label>Select CO:</label>
                    <input id = "COquestion1" name = "COquestion[]" type="text" size="3" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <label>Enter Marks:</label>
                    <input id = "Qmarks1" name = "Qmarks[]" type="text" size="3" required><br> <br>
                </div>

                <button id="addQuestion" class="question">+ Add question</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button id="removeQuestion" class="question">- Remove question</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <button class = "submitButt" type = submit>Save data</button>

            </form>
            <a href="homepage.php"> Back </a>
        </div>
        <script type="text/javascript">

            $(document).ready(function(){

                var counter = 2;
                    
                $("#addQuestion").click(function () {
                            
                    var newTextBoxDiv = $(document.createElement('div'))
                        .attr("id", 'TextBoxDiv' + counter);
                                
                    newTextBoxDiv.after().html(
                        '<label>Input Question #'+ counter + ' : </label><br>' + 
                        '<textarea name = "question[]" id = "question' + counter +
                         '"rows="10" cols="100" required></textarea><br><br>');

                    var newCOBoxDiv = $(document.createElement('div'))
                        .attr("id", 'COBox' + counter);
                    
                    newCOBoxDiv.after().html(
                        '<label>Select CO: </label>' +
                        '<input name = "COquestion[]" id = "COquestion' + counter + '" type="text" size="3" required> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
                        '<label>Enter Marks : </label>' +
                        '<input name = "Qmarks[]" id = "Qmarks' + counter + '" type="text" size="3" required><br><br>');

                    /*var newMarksBox = $(document.createElement('div'))
                        .attr("id", 'QMarks' + counter);
                    
                    newMarksBox.after().html(
                        '<label>Enter Marks : </label>' +
                        '<input name = "Qmarks[]" id = "Qmarks' + counter + '" type="text" size="3" required><br><br>');

                    /*'<input type="text" name="textbox' + counter + 
                    '" id="textbox' + counter + '" value="" >');*/
                            
                    newTextBoxDiv.appendTo("#questionDiv");
                    newCOBoxDiv.appendTo("#questionDiv");
                    //newMarksBox.appendTo("#questionDiv");

                    counter++;
                });

                $("#removeQuestion").click(function () {
                    /*if(counter==1){
                        alert("No more textbox to remove");
                        return false;
                    }*/  
                        
                    counter--;
                            
                    $("#TextBoxDiv" + counter).remove();
                    $("#COBox" + counter).remove();
                            
                });
                        
                /*$("#getButtonValue").click(function () {
                        
                    var msg = '';
                    for(i=1; i<counter; i++){
                    msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
                    }
                        alert(msg);
                });*/
            });//for entire document thing or whatever
        </script>
    </body>
</html>