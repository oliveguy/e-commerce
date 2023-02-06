<?php
// ID: collin
// password: password123 /
// digest= 
// bed4efa1d4fdbd954bd3705d6a2a78270ec9a52ecfbfb010c61862af5c76af1761ffeb1aef6aca1bf5d02b3781aa854fabd2b69c790de74e17ecfec3cb6ac4bf

// ID: jenny
// password: password321 /
// digest= 743e849368d890e56817cbc957590ac7381a246dfd141256a3c8d42c4839bbb3849daa79fb7f35acd2f3917d5f46c44294636f4ab35181647dfa750156b600c0

    session_start();    
    include("DB_connection.php");
    
    // function str_trimmer($data){
    //     filter_var($data, FILTER_SANITIZE_STRING);
    //     trim($data);
    //     strtolower($data);
    // }

    $userid = $_POST["login_id"]; 

    $user_pwd_trimmed = $_POST["login_pwd"];   
    $user_pwd = hash('sha512', $user_pwd_trimmed);

    $query = "SELECT user_id, user_pwd, user_fname, user_lname FROM user";
    $sql = mysqli_query($connection, $query);
    
    while($user_info_DB = mysqli_fetch_array($sql)){
        if($user_info_DB['user_id'] == $userid && $user_info_DB['user_pwd'] == $user_pwd){
            $_SESSION['login'] = "login_ok";
            $_SESSION['user_id_string'] = $user_info_DB['user_id'];
            $_SESSION['user_name'] = $user_info_DB['user_fname']." ".$user_info_DB['user_lname'];
            
            // Login_log
            $log_validity = "valid";
            $log_id = $_SESSION['user_id_string'];
            $log_username =$_SESSION['user_name'];
            $log_session = session_id();
            $log_date  = date('Y/m/d H:i:s');
            $_SESSION['logdate'] = $log_date;
            $log_ip = $_SERVER['REMOTE_ADDR'];

                // INTO DB
                $query_login = "INSERT INTO login_log(user_validity, user_id, user_name, session_id, date_time, ip)
                VALUES('$log_validity','$log_id','$log_username','$log_session','$log_date','$log_ip')";
                mysqli_query($connection, $query_login);
                    // Store date&time data into session
                    $_SESSION['login_datetime'] = date('F. j, l / A h:i');

            $query = "SELECT id FROM login_log WHERE date_time = '$log_date'";
            $sql = mysqli_query($connection, $query);
            $log = mysqli_fetch_array($sql);
            $_SESSION['last_id'] = $log['id'];
        } elseif(!isset($_SESSION['login'])) {
            $_SESSION['login_fail'] = "login_fail";
            
            $log_validity = "fail";
            $log_id = "invalid_id";
            $log_username = "invalid_user";
            $log_session = session_id();
            $log_date  = date('Y/m/d H:i:s');
            $log_ip = $_SERVER['REMOTE_ADDR'];
            
            // INTO DB
            
            $query_login = "INSERT INTO login_log(user_validity, user_id, user_name, session_id, date_time, ip)
                VALUES('$log_validity','$log_id','$log_username','$log_session','$log_date','$log_ip')";
                mysqli_query($connection, $query_login);
            }
            
        }
        // header('Location:../index.php');
        echo"<script>
        alert('Welcome back! ".$_SESSION['user_name']."');
        location.replace('../index.php');
        </script>
        ";
?>