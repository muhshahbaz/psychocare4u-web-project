<?php
session_start();
include("../include/connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthCare Patients Report</title>
    <!-- library css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">

</head>
<body>
    <?php  include("../include/patientHeader.php");?>
    <div class="container">
        <div class="row">
            <div class="col-md-2" style="margin-left: -120px;">

                <?php include("sidebar.php");
                $patient=$_SESSION['patient'];

                $date=date('Y-m-d');
                //$doct="kamran";?>
            </div>
            <div class="col-md-10" >

                <center><h3 style="color: #2BDCEE" class="titulo-tabla">Patient Record</h3></center>

                <?php

                $q="SELECT * FROM pat_med,doct_detail,patient WHERE pat_med.pat_username ='$patient' AND doct_detail.username=pat_med.checked_by AND patient.username='$patient'";

                $res=mysqli_query($conn,$q);
                if($res)
                {?>
                    <table id="ejemplo" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                         <tr>
                            <th>Doctor Name</th>
                            <!--<th>Blood Group</th>-->
                            <!--<th>Blood Pressor</th>-->
                            <!--<th>Weight</th>-->
                            <th>Disease</th>
                            <th>Medican</th>
                            <th>Next Appointment</th>
                           

                        </tr>
                    </thead>
                    <tbody>

                    <?php

                    while($row=mysqli_fetch_assoc($res))
                    {
                        ?>

                        
                        <tr>
                            <td><?php echo $row['firstname'];?></td>
                            <td><?php echo $row['diases'];?></td>
                            <td><?php echo $row['medician'];?></td>
                            <td><?php echo $row['next_app_date'];?></td>
                        </tr>
                    

                        <?php
                    } 
                    ?>
                </tbody>
            </table>

                    <?php

                }
                else
                {
                    echo "fail";
                }

                ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
   <script>
        var idioma=
        {
            "sProcessing":     "Processing...",
            "sLengthMenu":     "Show _MENU_ Records",
            "sZeroRecords":    "No results found",
            "sEmptyTable":     "No data available in this table",
            "sInfo":           "Showing Records from _START_ to _END_ out of Total  _TOTAL_ Records",
            "sInfoEmpty":      "Showing records from 0 to 0 out of Total 0 Records",
            "sInfoFiltered":   "(Filtered from a Total of _MAX_ Records)",
            "sInfoPostFix":    "",
            "sSearch":         "Search:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Loading...",
            "oPaginate": {
                "sFirst":    "First",
                "sLast":     "Last",
                "sNext":     "Next",
                "sPrevious": "Previous"
            },
            "oAria": {
                "sSortAscending":  ": Enable to sort the column in ascending order",
                "sSortDescending": ": Activate to sort the column in descending order"
            },
            "buttons": {
                "copyTitle": 'Information Copied',
                "copyKeys": 'Use your keyboard or menu to select the copy command',
                "copySuccess": {
                    "_": '%d Rows Copied to Clipboard',
                    "1": '1 row copied to clipboard'
                },

                "pageLength": {
                "_": "Show %d Files",
                "-1": "Show All Files"
                }
            }
        };
        
   </script>
</body>
</html>