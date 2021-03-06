
<?php 
include "header.php";
?>
<body>
<div id="wrapper">
<?php 
    include "navigation.php";
    include "sidebar.php"; 
?>
 <!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <table id="report-data" class="display report" cellspacing="0" width="100%">
                    <thead class="report__header">
                        <tr>
                            <th class="report__first-cell">ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Job Title</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Date / Time</th>
                        </tr>
                    </thead>
                    <tfoot class="report__footer">
                        <tr>
                            <th class="report__first-cell">ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Job Title</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Date / Time</th>
                        </tr>
                    </tfoot>
                    <tbody>
<?php
$sql = "SELECT * FROM registration_form ORDER BY lead_insert_date DESC";
$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td class=\"report__first-cell\">" . $row["id"]. "</td>
            <td>" . $row["fname"]. "</td>
            <td>" . $row["lname"]. "</td>
            <td>" . $row["job_title"]. "</td>
            <td>" . $row["company"]. "</td>
            <td>" . $row["email"]. "</td>
            <td>" . $row["lead_insert_date"]. "</td>
        </tr>"; 
    }
} else {
    echo "
        <tr>
            <td colspan=\"7\">No results at the moment.</td>
        </tr>";
}
?>
    </tbody>
</table>
</div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php 
	include "js-include.php";
?>