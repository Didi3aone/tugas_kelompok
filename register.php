<?php
    session_start();
    ob_start(); //ditambahkan untuk mengabaikan pengiriman header, berlaku juga untuk mengabaikan pesan error header
    $host="localhost";
    $user="root";
    $pass="";
    $db="db_inventory";
    $koneksi=mysqli_connect($host,$user,$pass,$db);

if(isset($_POST['btn-signup']))
{
    $uname = mysqli_real_escape_string($koneksi, $_POST['uname']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $upass = sha1(mysqli_real_escape_string($koneksi, $_POST['pass']));

    if(mysqli_query($koneksi, "INSERT INTO user(username,email,password,status) VALUES('".$uname."','".$email."','".$upass."','1')"))
    {
        $msg = 'Congratulation you have successfully registered.';
    }
    else
    {
        $msg = 'Error while registering you...';
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login & Registration System</title>
    <style type="text/css" media="screen">
        body{overflow: hidden;animation-name: muncul;animation-duration: 2s}
        .both{clear: both;}
        .loginpage{position: fixed;background:url("assets/img/wp.jpg");height: 99%;width: 90%;background-size: 20%;}
            .padding{padding:80px 25px;}
            .login{float: right;width: 400px;background:#fff;height: 100%;}
            .login input,.login select,.login button{width: 100%;box-sizing: border-box;margin-bottom: 20px;border: 0px;padding: 10px;border-bottom: 1px solid #e4e7ea;outline: 0;color: #565656;font-size: 14px;}
            .login input:focus,.login select:focus{border-bottom: 1px solid #707cd2;transition: 0.2s}
            .login select{cursor: pointer;}
            .login button{cursor: pointer;background: #41b3f9;color: #fff;font-size: 20px;border-radius: 3px;}
            .login button:hover{background: #5bc0de}
            form{margin-top: 70px;}
            h3{text-align: center;}
            #status{width: 100%;color: #565656;font-size: 15px;display: none;box-sizing: border-box;border-radius: 3px}
            .red{color: #c7254e;background: #f9f2f4;padding: 10px;border-radius: 3px;}
            .green{color: rgb(1,186,56);background: rgb(230,255,230);padding: 10px;border-radius: 3px;}
            .link-forgot{color: #565656;padding: 0px 0px 20px 0px;display: inline-block;}
        }
        input:focus,.login select:focus{border-bottom: 1px solid #707cd2;transition: 0.2s}
    </style>
</head>
<body>
    <center>
        <div class="loginpage">
            <div class="login">
        
            <div class="padding">
                <form method="post" id="loginapp">
                    <?php echo @$msg;?>
                    <table align="center" width="30%" border="0">
                        <tr>
                            <td><input type="text" name="uname" placeholder="User Name" required /></td>
                        </tr>
                        <tr>
                            <td><input type="email" name="email" placeholder="Your Email" required /></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="pass" placeholder="Your Password" required /></td>
                        </tr>
                        <tr>
                            <td><button type="submit" name="btn-signup">Sign Me Up</button></td>
                        </tr>
                        <tr>
                            <td><a href="index.php">Sign In Here</a></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        </div>
    </center>
</body>
</html>
