<?php
ob_start();
session_start();
include 'conn.php';

$sql = "SELECT students.first_name,
        students.last_name,
        courses.course_name,
        majors.major_name,
        exams.exam_name,
        exams.date,
        grades.grade_value

    FROM grades
    RIGHT JOIN exams ON exams.exam_id = grades.exam_id
    RIGHT JOIN students ON students.student_id = grades.student_id
    RIGHT JOIN courses ON courses.course_id = students.course_id
    RIGHT JOIN majors ON majors.major_id = students.major_id";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Join 3 Tables</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
	
</head>
<body>


    <h3 align="center">3rd Level Join Tables</h3>
    <div class="table-responsive"><div class="container">
       <table id="student_data" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Course Name</th>
                <th>Major Name</th>
                <th>Exam Name</th>
                <th>Date</th>
                <th>Grade Value</th> 
              </tr>
            </thead>
              
           <?php  
		
                while ($row = mysqli_fetch_array($result)) 
                {
                    echo '
                    <tr >
                        <td> '.$row["first_name"].' </td>
                        <td> '.$row["last_name"].' </td>
                        <td> '.$row["course_name"].' </td>
                        <td> '.$row["major_name"].' </td>
                        <td> '.$row["exam_name"].' </td>
                        <td> '.$row["date"].' </td>
                        <td> '.$row["grade_value"].' </td>

                    </tr>
                    ';
                }

		  ?>
       </table>
       </div>
    
    
</div>  
    
    

	

<!--
		<a href="index2.php">Insert Data Here</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="search_filter_print.php">Search Data Here</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="update.php">Update Data Here</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="index.php">Go to Home</a>&nbsp;&nbsp;&nbsp;&nbsp;
-->


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

</body>
</html>

<script>
    $(document).ready(function() {
    $('#student_data').DataTable();
} );
</script>