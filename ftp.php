<?php
// FTP server details

$conn_id = ftp_connect('120.0.0.1'); // ip to connnect

// login with username and password
$login_result = ftp_login($conn_id, 'username', 'password');

if (!$login_result)
{
    exit();
}

// get contents of the current directory
$contents = ftp_nlist($conn_id, "");

$files = [];

foreach ($contents AS $content)
{
    $ignoreArray = ['.','..'];
    if ( ! in_array( $content , $ignoreArray) )
    {
        $files[] = $content;
        print_r($files);
    }

}

$res = $files['0'];

if (ftp_get($conn_id,'local.txt',$res,FTP_BINARY)) {
    echo "Successfully written\n";
} else {
    echo "There was a problem\n";
}


?>
