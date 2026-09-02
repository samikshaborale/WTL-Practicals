<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration Form</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f4f9; }
        .form-container { background: #fff; padding: 20px 30px; border-radius: 8px; max-width: 400px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #333; margin-bottom: 20px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input[type="text"], input[type="email"], select { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        input[type="submit"] { margin-top: 20px; background-color: #007bff; color: white; border: none; padding: 10px 15px; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px; }
        input[type="submit"]:hover { background-color: #0056b3; }
        .result { margin-top: 20px; padding: 15px; background: #e2e3e5; border-radius: 5px; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Student Registration</h2>

    <!-- HTML Form -->
    <form action="student.php" method="POST">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="student_name" required placeholder="Enter full name">

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="student_email" required placeholder="Enter email">

        <label for="year">Academic Year:</label>
        <select id="year" name="academic_year">
            <option value="FY">First Year (FY)</option>
            <option value="SY">Second Year (SY)</option>
            <option value="TY">Third Year (TY)</option>
            <option value="BTech">Final Year</option>
        </select>

        <input type="submit" name="submit" value="Register Student">
    </form>

    <!-- PHP Processing Block -->
    <?php
    if (isset($_POST['submit'])) {
        // Collect and sanitize user input
        $name = htmlspecialchars($_POST['student_name']);
        $email = htmlspecialchars($_POST['student_email']);
        $year = htmlspecialchars($_POST['academic_year']);

        echo "<div class='result'>";
        echo "<h3>Form Submitted Successfully!</h3>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Year:</strong> $year</p>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>