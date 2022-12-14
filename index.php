<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
    <style>
        body {
            background: #1690A7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        *{
            font-family: sans-serif;
            box-sizing: border-box;
        }

        form {
            width: 500px;
            border: 2px solid #ccc;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
        }

        h2 {
            text-align: center;
            margin-bottom: 40px;
        }

        input {
            display: block;
            border: 2px solid #ccc;
            width: 95%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 5px;
        }
        label {
            color: #888;
            font-size: 18px;
            padding: 10px;
        }

        button {
            float: right;
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            border: none;
        }
        button:hover{
            opacity: .7;
        }
        .error {
        background: #F2DEDE;
        color: #A94442;
        padding: 10px;
        width: 95%;
        border-radius: 5px;
        margin: 20px auto;
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        a {
            float: right;
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            border: none;
            text-decoration: none;
        }
        a:hover{
            opacity: .7;
        }
    </style>
</head>
<body>
     <form action="cek_login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "gagal"){
                    echo "<script>
                        alert('Login gagal! username dan password salah!!');
                        window.location='index.php';
                    </script>";
                }else if($_GET['pesan'] == "logout"){
                    echo "<script>
                        alert('Anda telah berhasil logout!!');
                        window.location='index.php';
                    </script>";
                }else if($_GET['pesan'] == "belum_login"){
                    echo "<script>
                        alert('Anda harus login untuk mengakses halaman admin!!');
                        window.location='index.php';
                    </script>";
                }
            }
        ?> 
        <br>
     	<label>Username</label>
     	<input type="text" name="username" placeholder="Your Username..."><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Your Password..."><br>

     	<button type="submit">Login</button>
     </form>
</body>
</html>