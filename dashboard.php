<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: admin-login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "eventdb");
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}

$sql = "SELECT * FROM tickets ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .dashboard-container {
            max-width: 1000px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #ff6600;
        }
        .logout-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background: #ff6600;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            transition: background 0.3s;
        }
        .logout-btn:hover {
            background: #e65c00;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table th, table td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
        table th {
            background: #ff6600;
            color: #fff;
        }
        table tr:nth-child(even) {
            background: #f2f2f2;
        }
        @media screen and (max-width: 768px) {
            table, table th, table td {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Tickets Dashboard</h2>
        <a href="logout.php" class="logout-btn">Logout</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>City</th>
            </tr>
            <?php
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>
                            <td>".$row['id']."</td>
                            <td>".$row['name']."</td>
                            <td>".$row['phone']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['city']."</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5' style='text-align:center;'>No tickets purchased yet</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
