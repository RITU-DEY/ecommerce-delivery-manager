<?php
require_once '../../config/db.php';

if(!isset($_GET['id']) || empty($_GET['id'])){
    die("Invalid ID");
}

$id = (int)$_GET['id'];

/* GET DATA */
$result = $conn->query("SELECT * FROM agents WHERE id=$id");

if(!$result || $result->num_rows == 0){
    die("Agent Not Found");
}

$agent = $result->fetch_assoc();

/* UPDATE */
if(isset($_POST['update'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("
        UPDATE agents
        SET name=?, email=?, phone=?, address=?, status=?
        WHERE id=?
    ");

    $stmt->bind_param(
        "sssssi",
        $name,
        $email,
        $phone,
        $address,
        $status,
        $id
    );

    if($stmt->execute()){
        header("Location: index.php");
        exit();
    } else {
        die("Update Failed: " . $stmt->error);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Agent</title>

    <style>
        body{
            margin:0;
            font-family:Arial;
            background:#f1f5f9;
        }

        .main-content{
            margin-left:220px;
            padding:40px;
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
        }

        .form-wrapper{
            width:420px;
            background:white;
            padding:30px;
            border-radius:12px;
            box-shadow:0 10px 25px rgba(0,0,0,0.1);
        }

        .form-wrapper h1{
            text-align:center;
            margin-bottom:20px;
            color:#1e293b;
        }

        .input-group{
            margin-bottom:15px;
        }

        .input-group label{
            display:block;
            margin-bottom:6px;
            font-weight:bold;
            color:#334155;
        }

        .input-group input,
        .input-group select{
            width:100%;
            padding:10px;
            border:1px solid #cbd5e1;
            border-radius:8px;
            outline:none;
        }

        button{
            width:100%;
            padding:12px;
            background:#3b82f6;
            color:white;
            border:none;
            border-radius:8px;
            font-weight:bold;
            cursor:pointer;
        }

        button:hover{
            background:#1d4ed8;
        }
    </style>
</head>

<body>

<div class="main-content">

    <div class="form-wrapper">

        <h1>Edit Agent</h1>

        <form method="POST">

            <div class="input-group">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo $agent['name']; ?>" required>
            </div>

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $agent['email']; ?>" required>
            </div>

            <div class="input-group">
                <label>Phone</label>
                <input type="text" name="phone" value="<?php echo $agent['phone']; ?>" required>
            </div>

            <div class="input-group">
                <label>Address</label>
                <input type="text" name="address" value="<?php echo $agent['address']; ?>" required>
            </div>

            <div class="input-group">
                <label>Status</label>
                <select name="status">
                    <option value="Active" <?php if($agent['status']=="Active") echo "selected"; ?>>
                        Active
                    </option>
                    <option value="Inactive" <?php if($agent['status']=="Inactive") echo "selected"; ?>>
                        Inactive
                    </option>
                </select>
            </div>

            <button type="submit" name="update">
                Update Agent
            </button>

        </form>

    </div>

</div>

</body>
</html>