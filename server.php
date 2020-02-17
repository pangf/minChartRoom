<?php

//fetch value from last-chat-ID
$data=$_REQUEST;
$last_chat_ID=$data['last_chat_ID'];

//connect mysql DB
$con=mysqli_connect('localhost','root','','group_chart');
$select="SELECT * FROM chats
    WHERE chats_id>'$last_chat_ID'
";
$result=mysqli_query($con,$select);
$arr=array();
$row_count=mysqli_num_rows($result);
 
if($row_count>0){
    while($row=mysqli_fetch_array($result)){
        array_push($arr,$row)
    }
}

// close mysql connection
mysqli_close($con);

//return response in JSON
echo json_decode($arr);


?>