<?php
// 1. Laptop MySQL (Port 3306) Connection with Password
//  password 'mysql@123' add kela aahe

$conn = mysqli_connect("localhost", "root", "mysql@123", "student_db", 3306);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$msg = "";

// 2. if Form Submit then Data Inserted

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];

    $sql = "INSERT INTO students (name, age) VALUES ('$name', '$age')";
    
    if (mysqli_query($conn, $sql)) {
        $msg = "Data successfully saved to Database!";
    } else {
        $msg = "Error: " . mysqli_error($conn);
    }
}

// 3. Database Madhun Live Data Fetch Kara
$result = mysqli_query($conn, "SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Information</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f4f6f9; 
            padding: 20px; 
            display: flex; 
            flex-direction: column; 
            align-items: center; 
        }
        .card { 
            background: white; 
            padding: 20px; 
            border-radius: 8px; 
            box-shadow: 0 2px 8px rgba(0,0,0,0.1); 
            width: 340px; 
            margin-bottom: 20px; 
        }
        h2, h3 { 
            text-align: center; 
            color: #333; 
        }
        label { 
            font-weight: bold; 
        }
        input[type="text"], input[type="number"] { 
            width: 100%; 
            padding: 8px; 
            margin: 8px 0 15px 0; 
            box-sizing: border-box; 
            border: 1px solid #ccc; 
            border-radius: 4px; 
        }
        input[type="submit"] { 
            width: 100%; 
            background-color: #28a745; 
            color: white; 
            padding: 10px; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
            font-size: 16px; 
        }
        input[type="submit"]:hover { 
            background-color: #218838; 
        }
        .msg { 
            color: green; 
            font-weight: bold; 
            text-align: center; 
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 10px; 
        }
        table, th, td { 
            border: 1px solid #ddd; 
            padding: 8px; 
            text-align: center; 
        }
        th { 
            background-color: #007bff; 
            color: white; 
        }
    </style>
</head>
<body>

    <!-- Student Form -->
    <div class="card">
        <h2>Student Form</h2>
        
        <?php if($msg != ""): ?>
            <p class="msg"><?php echo $msg; ?></p>
        <?php endif; ?>

        <form action="" method="POST">
            <label>Name:</label>
            <input type="text" name="name" placeholder="Enter Name" required>

            <label>Age:</label>
            <input type="number" name="age" placeholder="Enter Age" required>

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

    <!-- Live Records Table -->
    <div class="card" style="width: 420px;">
        <h3>Live Database Records</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
            </tr>
            <?php 
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['age'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No Data Found</td></tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>