<?php 

$roomname = $_POST['room'];

if(strlen($roomname)>20 or strlen($roomname)<2)
{
    $message = "Please choose a name betweem 2 to 20 characters";
    echo '<script language="javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location= "http://localhost/Chat%20System";';
    echo '</script>';

}

else if(!ctype_alnum($roomname))
{
    $message= "Please enter a alphanumeric room name";
    echo '<script language="javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location= "http://localhost/Chat%20System";';
    echo '</script>';
}

else{
    // connect to the database
    include 'db_connect.php';
}

// checking if room already exits

$sql = "SELECT * FROM `rooms` where roomname='$roomname'";
$result = mysqli_query($conn,$sql);

if($result)
{
    if(mysqli_num_rows($result) > 0)
    {
        {
            $message= "Please choose a different room with different name";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location= "http://localhost/Chat%20System";';
            echo '</script>';
        }

    }

        else
        {
            $sql = "INSERT INTO `rooms` (`roomname`, `stime`) VALUES ('$roomname', current_timestamp())";

            if(mysqli_query($conn, $sql))
            {
                $message= "You can chat now in your own room";
                echo '<script language="javascript">';
                echo 'alert("'.$message.'");';
                echo 'window.location= "http://localhost/Chat%20System/rooms.php?roomname='. $roomname.'";';
                echo '</script>';
            }
        }
    
      
}

else
{
    echo "erro :".mysqli_error($conn);
}
?>