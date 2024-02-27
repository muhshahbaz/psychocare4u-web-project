<?php
include("../include/connection.php");

if(isset($_POST['data']))
{
	$user=$_POST['data'];


	$query="SELECT * FROM pat_med WHERE pat_username='$user'";

	$result=mysqli_query($conn,$query);
    $print="";
	if(mysqli_num_rows($result)>=1)
	{
		$print="
		<table class='table table-hover'>
           <thead>
                <tr>
                    <th scope='col'>Patient ID</th>
                    <th scope='col'>Diases</th>
                    <th scope='col'>Medicine</th>
                    <th scope='col'>Remarks</th>

                </tr>
            </thead>";
        while($row=mysqli_fetch_assoc($result))
        {
        	$print.="  
                <tbody>
                    <tr>
                        <th scope='row'>".$row['pat_username']."</th>
                            <td>".$row['diases']."</td>
                            <td>".$row['medician']."</td>
                            <td>".$row['remarks']."</td>
                    </tr>
                </tbody>
                ";		
        }
        $print.="</table>";
        echo $print;
    }

   else
	{
		echo "This is new patient ";
	}

}

?>