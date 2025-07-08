<!DOCTYPE html>
<html>
<head>
  <title>View All Employees</title>
  <style>
    body {
      margin: 0px;
    }

    .container {
      width: 80%;
      margin: 20px auto;
      padding: 5px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      background-color: #F1F3F4;
    }

    .banner {
      width: 100%;
      height: 120px;
      background-color: navy;
      border-bottom: 1px solid #ccc;
      text-align: center;
      padding: 5px;
      box-sizing: border-box;
    }

    #brainware {
      color: yellow;
      font-size: 44px;
      font-family: bookman old style;
      padding-top: 15px;
    }

    .body {
      width: 100%;
      margin: 0px 0;
      display: flex;
      justify-content: space-between;
    }

    .left-column {
      width: 30%;
      background-color: #D9DDE1;
      padding: 10px;
      height: 540px;
      box-sizing: border-box;
    }

    .right-column {
      width: 70%;
      background-color: #F1F3F4;
      padding: 10px;
      height: 540px;
      box-sizing: border-box;
    }

    .footer {
      width: 100%;
      height: 40px;
      background-color: #f2f2f2;
      border-top: 1px solid #ccc;
      text-align: center;
      box-sizing: border-box;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th{
        background-color : navy;
        color: yellow;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }

    .record-count {
      color: blue;
      font-size: 16px;
      font-weight: bold;
      margin-top: 10px;
      text-align: center;
    }

    h1 {
      text-align: center;
      color: orange;
    }

    ul li {
      list-style-type: none;
    }

    li {
      padding: 15px 5px;
    }

    a {
      font-size: 18px;
      color: navy;
      text-decoration: none;
      font-family: tahoma;
    }

    a:hover {
      font-size: 18px;
      color: magenta;
      text-decoration: underline;
      font-family: tahoma;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="banner">
      <div id="brainware">Brainware University EMS</div>
    </div>
    <div class="body">
      <div class="left-column">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="AddEmp.php">Add Emp</a></li>
          <li> <a href="AddStudent.php"> Add Student </a> </li>
          <li> <a href="viewStudent.php"> View Student </a> </li>
          <li><a href="#">View All</a></li>
          <li><a href="#">Search</a></li>
          <li><a href="#">Modify</a></li>
          <li><a href="#">Reports</a></li>
          <li><a href="#">Feedback</a></li>
          <li><a href="home.html">Logout</a></li>
        </ul>
      </div>
      <div class="right-column">
        <h1>SEARCH BY DEPARTMENT - VIEW</h1>
        <?php
        $conn = new mysqli('localhost', 'root', '', 'mydb');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $departmentColors = [
          'IT' => '#FCF55F',     
          'HR' => '#FFDEAD',     
          'Finance' => '#EEDC82',
          'Sales' => '#FFFF8F',
          'Marketing' => '#FAD5A5',
        ];

        $sql = "SELECT eid, NAME, email, phone, job_title, department FROM employees";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Job Title</th><th>Department</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $department = htmlspecialchars($row['department']);
                $rowColor = isset($departmentColors[$department]) ? $departmentColors[$department] : '#FFFFFF'; // Default to white
      
                echo "<tr style='background-color: $rowColor;'>";
                echo "<td>" . htmlspecialchars($row['eid']) . "</td>";
                echo "<td>" . htmlspecialchars($row['NAME']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                echo "<td>" . htmlspecialchars($row['job_title']) . "</td>";
                echo "<td>" . htmlspecialchars($row['department']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";

            echo "<br/>";

            echo "<div class='record-count'>Count data found = " . $result->num_rows . "</div>";
        } else {
            echo "<p>No records found in the database.</p>";
        }

        $conn->close();
        ?>
      </div>
    </div>
    <div class="footer">
      <p>All copyright reserved with saugata @ 2025</p>
    </div>
  </div>
</body>
</html>
