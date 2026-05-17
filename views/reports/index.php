<!DOCTYPE html>
<html>
<head>
    <title>Reports</title>

    <style>
        body{
            font-family:Arial;
            background:#f1f5f9;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .box{
            background:white;
            padding:30px;
            border-radius:12px;
            width:320px;
            text-align:center;
            box-shadow:0 10px 25px rgba(0,0,0,0.1);
        }

        h2{
            color:#1e293b;
            margin-bottom:20px;
        }

        a{
            display:block;
            margin:10px 0;
            padding:12px;
            text-decoration:none;
            color:white;
            border-radius:8px;
            font-weight:bold;
        }

        .a1{background:#3b82f6;}
        .a2{background:#10b981;}
        .a3{background:#8b5cf6;}

        a:hover{
            opacity:0.85;
        }
    </style>
</head>

<body>

<div class="box">

    <h2> Reports Dashboard</h2>

    <!-- FIXED ABSOLUTE PATH -->
    <a class="a1" href="/ecommerce_delivery_manager/views/reports/agent_reports.php">
         Agent Report
    </a>

    <a class="a2" href="/ecommerce_delivery_manager/views/reports/summary.php">
         Summary Report
    </a>

    <a class="a3" href="/ecommerce_delivery_manager/views/reports/zone_report.php">
         Zone Report
    </a>

</div>

</body>
</html>