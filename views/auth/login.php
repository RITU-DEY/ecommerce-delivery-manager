<!DOCTYPE html>
<html>
<head>
    <title>Login - Delivery Manager</title>

    <style>
        *{
            box-sizing:border-box;
            font-family:Arial;
        }

        body{
            margin:0;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:linear-gradient(135deg,#0f172a,#3b82f6);
        }

        /* LOGIN BOX */
        .box{
            width:380px;
            background:white;
            padding:35px;
            border-radius:15px;
            box-shadow:0 15px 30px rgba(0,0,0,0.3);
            text-align:center;
        }

        /* TITLE */
        .box h2{
            margin:0;
            color:#1e293b;
        }

        .box p{
            margin:5px 0 20px;
            font-size:13px;
            color:gray;
        }

        /* INPUT */
        .box input{
            width:100%;
            padding:12px;
            margin:10px 0;
            border:1px solid #ddd;
            border-radius:8px;
            outline:none;
            transition:0.3s;
        }

        .box input:focus{
            border-color:#3b82f6;
            box-shadow:0 0 6px rgba(59,130,246,0.3);
        }

        /* BUTTON */
        .box button{
            width:100%;
            padding:12px;
            margin-top:10px;
            background:#3b82f6;
            border:none;
            color:white;
            font-weight:bold;
            border-radius:8px;
            cursor:pointer;
            transition:0.3s;
        }

        .box button:hover{
            background:#1e40af;
        }

        /* FOOTER TEXT */
        .box small{
            display:block;
            margin-top:15px;
            color:gray;
        }
    </style>
</head>

<body>

<div class="box">

    <h2> Delivery Manager</h2>
    <p>Welcome back! Please login</p>

    <form method="POST" action="../../controllers/AuthController.php">

        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" name="login">Login</button>

    </form>

    <small>© 2026 Delivery System</small>

</div>
<script src="../../assets/js/login.js"></script>

</body>
</html>