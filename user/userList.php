<?php
  include 'userTrans.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
      .head{
         padding-top:20px; 
         padding-bottom:20px;
         background-color:#f5e42a;
      }
      .details{
        width:80%;
        padding-top:20px; 
      }
      .addUser{
        float:right;
      }
    </style>
 </head>
  <body>
    <!-- HEADER -->
    <div class="container head">
        <h1>Dalubhasaan ng Lungsod ng Lucena</h1>
        <p> Bachelor of Science in Information Technology</p>
    </div>

    <!-- BODY -->
    <div class="container details">
        <h3> User  Information List </h3>
        <div class="row">
          <!-- Search Bar -->
          <div class="col-9">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Please enter last name or first name" aria-label="Recipient's username" aria-describedby="button-addon2">
              <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search User</button>
            </div>
          </div>
          <!-- Add Button -->
          <div class="col-3">
            <button type="button" class="btn btn-primary addUser">Add User</button>
          </div>
        </div>
        
        <table class="table table-striped table-hover">
          <thead>
              <tr>
                <th>User ID</th>
                <th>Email</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Initial</th>
                <th>User Type</th>
                <th>User Status</th>
                <th>Actions</th>
              </tr>
          </thead>
          <tbody>
            <?php
                populateUser($pdo);
            ?>
          </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>