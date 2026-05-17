<!DOCTYPE html>
<html>
<head>
    <title>Add Order</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e0f7fa, #f1f8e9);
            margin: 0;
            padding: 0;
        }

        .form-container {
            width: 420px;
            margin: 80px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            transition: 0.3s;
        }

        .form-container:hover {
            transform: translateY(-3px);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-container input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .form-container input:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 6px rgba(76,175,80,0.4);
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, #4CAF50, #45a049);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .form-container button:hover {
            background: linear-gradient(90deg, #45a049, #3d8b40);
            transform: scale(1.02);
        }

    </style>

</head>

<body>

<div class="form-container">

    <h2>🛒 Add New Order</h2>

    <form method="POST" action="/ecommerce_delivery_manager/controllers/OrderController.php">

        <input type="text" name="customer_name" placeholder="Customer Name" required>

        <input type="text" name="phone" placeholder="Phone" required>

        <input type="text" name="address" placeholder="Address" required>

        <input type="number" name="total_amount" placeholder="Total Amount" required>

        <button type="submit">Add Order</button>

    </form>

</div>

</body>
</html>