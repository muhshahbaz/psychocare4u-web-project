<?php
session_start();
include("../include/connection.php");
date_default_timezone_set('Asia/Kolkata');
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
    <style>
        :after, :before {
            box-sizing: border-box;
        }
        a {
            color: #337ab7;
            text-decoration: none;
        }
        i{
        margin-bottom:4px;
        }
        .btn {
            display: inline-block;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .btn-app {
            color: white;
            box-shadow: none;
            border-radius: 3px;
            position: relative;
            padding: 10px 15px;
            margin: 0;
            min-width: 60px;
            max-width: 80px;
            text-align: center;
            border: 1px solid #ddd;
            background-color: #f4f4f4;
            font-size: 12px;
            transition: all .2s;
            background-color: steelblue !important;
        }
        .btn-app > .fa, .btn-app > .glyphicon, .btn-app > .ion {
            font-size: 30px;
            display: block;
        }
        .btn-app:hover {
            border-color: #aaa;
            transform: scale(1.1);
        }
        .pdf {
        background-color: #dc2f2f !important;
        }
        .excel {
            background-color: #3ca23c !important;
        }
        .csv {
            background-color: #e86c3a !important;
        }
        .Print {
            background-color: #8766b1 !important;
        }
        /*
        Esto es opcional pero sirve para que todos los botones de exportacion se distribuyan de manera equitativa usando flexbox
        .flexcontent {
            display: flex;
            justify-content: space-around;
        }
        */
        .selectTable{
        height:40px;
        float:right;
        }

        div.dataTables_wrapper div.dataTables_filter {
            text-align: left;
            margin-top: 15px;
        }

        .btn-secondary {
            color: #fff;
            background-color: #4682b4;
            border-color: #4682b4;
        }
        .btn-secondary:hover {
            color: #fff;
            background-color: #315f86;
            border-color: #545b62;
        }
        .titulo-tabla{
        color:#606263;
        text-align:center;
        margin-top:15px;
        margin-bottom:15px;
        font-weight:bold;
        }
        .inline{
        display:inline-block;
        padding:0;
        }

    </style>
    <?php  include("../include/topbarDoc.php");?>
    <div class="container">
        <div class="row">
            <div class="col-md-2" style="margin-left: -120px;">

                <?php include("sidebar.php");
                $doct=$_SESSION['doct'];

                $date=date('Y-m-d');
                //$doct="kamran";?>
            </div>
            <div class="col-md-10" >

                <h3 style="color: #2BDCEE" class="titulo-tabla">Today Patients Record</h3>

                <?php

                $q="SELECT * FROM appointment,patient WHERE appointment.pat_username=patient.username AND appointment.doct_username='$doct' AND appointment.status='checked' AND app_date='$date'";

                $res=mysqli_query($conn,$q);
                if($res)
                {?>
                    <table id="ejemplo" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                       <tr>
                            <th>P_ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Contact</th>
                            <th>Age</th>
                            <th>Blood</th>
                            <th>Weight</th>
                            <th>Disease</th>
                            <th>Date</th>
                           

                        </tr>
                    </thead>
                    <tbody>

                    <?php

                    while($row=mysqli_fetch_assoc($res))
                    {
                        ?>

                        
                        <tr>
                            <td><?php echo $row['pat_username'];?></td>
                            <td><?php echo $row['fname'];?></td>
                            <td><?php echo $row['gender'];?></td>
                            <td><?php echo $row['phone'];?></td>
                            <td><?php echo $row['age'];?></td>
                            <td><?php echo $row['blood'];?></td>
                            <td><?php echo $row['weight'];?></td>
                            <td><?php echo $row['diases'];?></td>
                            <td><?php echo $row['app_date'];?></td>
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
        $(document).ready(function() {
        var table = $('#ejemplo').DataTable( {
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "language": idioma,
        "lengthMenu": [[10,50 ,100, -1],[10,50,100,"Show All Files"]],
        dom: 'Bfrt<"col-md-6 inline"i> <"col-md-6 inline"p>',
        buttons: {
        dom: {
        container:{
        tag:'div',
        className:'flexcontent'
        },
        buttonLiner: {
        tag: null
        }
        },
        buttons: [
                {
                    extend:    'copyHtml5',
                    text:      '<i class="fa fa-clipboard"></i>Copy',
                    title:'Psychocare4u-patient-record',
                    titleAttr: 'Copy',
                    className: 'btn btn-app export barras',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4]
                    }
                },

                {
                    extend:    'pdfHtml5',
                    text:      '<i class="fa fa-file-pdf-o"></i>PDF',
                    title:'Psychocare4u-patient-record',
                    titleAttr: 'PDF',
                    className: 'btn btn-app export pdf',
                    exportOptions: {
                        columns: [ 0, 1, 3, 4 ]
                    },
                    customize:function(doc) {

                        doc.styles.title = {
                            color: '#4c8aa0',
                            fontSize: '30',
                            alignment: 'center'
                        }
                        doc.styles['td:nth-child(2)'] = { 
                            width: '100px',
                            'max-width': '100px'
                        },
                        doc.styles.tableHeader = {
                            fillColor:'#4c8aa0',
                            color:'white',
                            alignment:'center'
                        },
                        doc.content[1].margin = [ 100, 0, 100, 0 ]
                    }
                },

                {
                    extend:    'excelHtml5',
                    text:      '<i class="fa fa-file-excel-o"></i>Excel',
                    title:'Psychocare4u-patient-record',
                    titleAttr: 'Excel',
                    className: 'btn btn-app export excel',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4  ]
                    },
                },
                {
                    extend:    'csvHtml5',
                    text:      '<i class="fa fa-file-text-o"></i>CSV',
                    title:'Psychocare4u-patient-record',
                    titleAttr: 'CSV',
                    className: 'btn btn-app export csv',
                    exportOptions: {
                        columns: [ 0, 1, 3, 4 ]
                    }
                },
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i>Print',
                    title:'Psychocare4u-patient-record',
                    titleAttr: 'Print',
                    className: 'btn btn-app export Print',
                    exportOptions: {
                        columns: [ 0, 1, 3, 4 ]
                    }
                },
                {
                    extend:    'pageLength',
                    titleAttr: 'Records Showing',
                    className: 'selectTable'
                }
            ]
        }
        });
        } );
   </script>
</body>
</html>