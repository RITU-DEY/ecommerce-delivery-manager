<!DOCTYPE html>
<html>
<head>
    <title>Add Agent</title>

    <style>
        body{
            margin:0;
            font-family:Arial;
            background:#f1f5f9;
        }

        /* MAIN CONTENT */
        .main-content{
            margin-left:220px;
            padding:40px;
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
        }

        /* FORM BOX */
        .form-wrapper{
            width:420px;
            background:white;
            padding:30px;
            border-radius:12px;
            box-shadow:0 10px 25px rgba(0,0,0,0.1);
        }

        /* TITLE */
        .form-wrapper h1{
            text-align:center;
            margin-bottom:20px;
            color:#1e293b;
        }

        /* INPUT GROUP */
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
            transition:0.3s;
        }

        .input-group input:focus,
        .input-group select:focus{
            border-color:#3b82f6;
            box-shadow:0 0 5px rgba(59,130,246,0.3);
        }

        /* BUTTON */
        button{
            width:100%;
            padding:12px;
            background:#10b981;
            color:white;
            border:none;
            border-radius:8px;
            font-weight:bold;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover{
            background:#059669;
        }

        /* RESPONSIVE */
        @media(max-width:768px){
            .main-content{
                margin-left:0;
                padding:20px;
            }

            .form-wrapper{
                width:100%;
            }
        }
    </style>
</head>

<body>

<div class="main-content">

    <div class="form-wrapper">

        <h1>Add Agent</h1>

        <form method="POST" action="../../controllers/AgentController.php">

            <div class="input-group">
                <label>Name</label>
                <input type="text" name="name" required>
            </div>

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="input-group">
                <label>Phone</label>
                <input type="text" name="phone" required>
            </div>

            <div class="input-group">
    <label>Address</label>
    <input type="text" name="address" required>
</div>
            <div class="input-group">
                <label>Vehicle</label>
                <select name="vehicle" required>
                    <option value="Bike">Bike</option>
                    <option value="Cycle">Cycle</option>
                    <option value="Car">Car</option>
                </select>
            </div>

            <div class="input-group">
    <label>Status</label>
    <select name="status" required>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select>
</div>
            <button type="submit" name="addAgent">Add Agent</button>

        </form>

    </div>

</div>

</body>
</html>