<!DOCTYPE html>
<html>
<head>
  <title>Add Student</title>
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

    .login-container {
      width: 300px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #3e8e41;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: #3e8e41;
      font-size: 18px;
    }

    input[type="text"], input[type="number"] , input[type="file"]{
      width: 100%;
      height: 20px;
      padding: 5px;
      border: 1px solid #ccc;
    }

    select {
      width: 100%;
      height: 30px;
      padding: 5px;
      border: 1px solid #ccc;
    }

    button[type="submit"] {
      width: 100%;
      height: 30px;
      background-color: #4CAF50;
      color: #fff;
      padding: 5px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button[type="submit"]:hover {
      background-color: #3e8e41;
    }

    #txt2 {
      color: orange;
      font-size: 20px;
      font-weight: bold;
      text-transform: capitalize;
      margin-bottom: 10px;
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#studentForm').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this);

        // AJAX request
        $.ajax({
          url: 'insert_student_ajax.php',
          type: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            alert(response);
            $('#studentForm')[0].reset();
          },
          error: function () {
            alert('Error occurred while submitting the form.');
          },
        });
      });
    });
  </script>
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
          <li><a href="#">Add Student</a></li>
          <li><a href="viewStudent.php">View Student</a></li>
          <li><a href="viewall.php">View All</a></li>
          <li><a href="#">Search</a></li>
          <li><a href="#">Modify</a></li>
          <li><a href="#">Reports</a></li>
          <li><a href="#">Feedback</a></li>
          <li><a href="home.html">Logout</a></li>
        </ul>
      </div>
      <div class="right-column">
        <div class="login-container">
          <div id="txt2">Add Student Info</div>
          <form id="studentForm">
            <div class="form-group">
              <label for="profile">Profile Image:</label>
              <input type="file" id="profile" name="profile" required>
            </div>
            <div class="form-group">
              <label for="roll">Roll:</label>
              <input type="number" id="roll" name="roll" required>
            </div>
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
              <label for="department">Department:</label>
              <select id="department" name="department" required>
                <option value="Sales">Sales</option>
                <option value="Marketing">Marketing</option>
                <option value="IT">IT</option>
                <option value="Finance">Finance</option>
                <option value="HR">HR</option>
              </select>
            </div>
            <div class="form-group">
              <label for="year">Year:</label>
              <input type="number" id="year" name="year" required>
            </div>
            <button type="submit">Add Student</button>
          </form>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>All copyright reserved with saugata @ 2025</p>
    </div>
  </div>
</body>
</html>
