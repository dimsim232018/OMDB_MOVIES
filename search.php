<?php

include 'session.php';
require_once 'dbconnect.php';

 global $mysql;


$output = '';
if($_POST["genre"] != "All")
{
 $search = $_POST["genre"];
 $query = "SELECT * FROM movie WHERE user_id=".$uid." AND genre LIKE '%".$search."%'";
 }
else
{
 $query = "select id,title,genre from movie where user_id=".$uid;
}
$result = mysqli_query($mysql, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
<table class="table bg-dark" id="data-table" style="">  
				<thead>
				<tr>
				
				</tr>
					<tr class="table-no-border" style="border-radius:15px 15px 0px 0px;font-weight:bold;border-bottom:2px solid;border-color:lightgray">  
                              <td>Title</td>  
						<td>Genre</td>
						<td></td>   
               		</tr>  
				</thead>
';
 while($row1 = mysqli_fetch_array($result))
 {
  $output .= '
  <tr>
    <td>'.$row1['title'].'</td>
    <td>'.$row1['genre'].'</td>
    <td><button class="btn btn-profile" id="button_delete" onclick="deletemovie(this)">Delete</button></td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Record Not Found';
}
?>
