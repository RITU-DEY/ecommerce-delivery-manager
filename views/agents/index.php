<?php
require_once '../../config/session.php';
require_once '../../config/db.php';

require_once '../../models/AgentModel.php';

$model = new AgentModel($conn);
$agents = $model->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agents Management</title>

    <style>
        body{
            margin:0;
            font-family:Arial;
            background:#f1f5f9;
        }

        /* MAIN */
        .main-content{
            margin-left:220px;
            padding:40px;
        }

        .page-container{
            max-width:1000px;
            margin:auto;
        }

        /* TITLE */
        .title{
            text-align:center;
            color:#1e293b;
            margin-bottom:20px;
            font-size:28px;
        }

        /* ADD BUTTON */
        .btn.add{
            display:inline-block;
            background:#10b981;
            color:white;
            padding:10px 15px;
            border-radius:8px;
            text-decoration:none;
            font-weight:bold;
            margin-bottom:15px;
        }

        .btn.add:hover{
            background:#059669;
        }

        /* TABLE BOX */
        .table-card{
            background:white;
            padding:20px;
            border-radius:12px;
            box-shadow:0 10px 25px rgba(0,0,0,0.08);
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th, td{
            padding:12px;
            text-align:center;
            border-bottom:1px solid #eee;
        }

        th{
            background:#1e293b;
            color:white;
        }

        tr:hover{
            background:#f9fafb;
        }

        /* STATUS */
        .status{
            padding:5px 10px;
            border-radius:6px;
            font-size:12px;
            color:white;
            font-weight:bold;
        }

        .status.active{
            background:#10b981;
        }

        /* BUTTONS */
        .btn{
            padding:6px 10px;
            border-radius:6px;
            text-decoration:none;
            font-size:12px;
            font-weight:bold;
            margin:0 3px;
            display:inline-block;
        }

        .btn.edit{
            background:#3b82f6;
            color:white;
        }

        .btn.edit:hover{
            background:#1e40af;
        }

        .btn.delete{
            background:#ef4444;
            color:white;
        }

        .btn.delete:hover{
            background:#b91c1c;
        }

        /* RESPONSIVE */
        @media(max-width:768px){
            .main-content{
                margin-left:0;
                padding:20px;
            }

            table{
                font-size:12px;
            }
        }
    </style>
</head>

<body>

<div class="main-content">

    <div class="page-container">

        <h1 class="title">Agents Management</h1>

        <a href="add.php" class="btn add">+ ADD AGENT</a>

        <div class="table-card">

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while($row = $agents->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['phone']; ?></td>

                        <td>
                            <span class="status active">
                                <?php echo $row['status'] ?? 'Active'; ?>
                            </span>
                        </td>

                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn edit">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn delete">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>