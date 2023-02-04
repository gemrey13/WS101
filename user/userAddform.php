<?php include 'userTrans.php';?>

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
        margin-right:10px;
      }
      .inputRow{
          padding:10px;
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
        <form action="#" method="POST">
            <h3 class="text-center"> Add User Form </h3>
            <h5> Personal Information<h5>
            <div class="row inputRow">
                <div class="col-4">
                    <input type="text" class="form-control"  placeholder="Last Name" name="lastname">
                </div>
                <div class="col-4">
                    <input type="text" class="form-control"  placeholder="First Name" name="firstname">
                </div>
                <div class="col-4">
                    <input type="text" class="form-control"  placeholder="Middle Initial" name="mi">
                </div>
            </div>
            <div class="row inputRow">
                <div class="col-12">
                    <input type="text" class="form-control"  placeholder="Picture" name="picture">
                </div>
            </div>
            <h5> User Information<h5>
            <div class="row inputRow">
                <div class="col-6">
                    <input type="text" class="form-control"  placeholder="Email" name="email">
                </div>
                <div class="col-6">
                    <input type="password" class="form-control"  placeholder="Password" name="upass">
                </div>
            </div>
            <div class="row inputRow">
                <div class="col-6">
                    <select class="form-select" aria-label="Default select example" name="userType">
                        <option value="1">Administrator</option>
                        <option value="2">Standard User</option>
                    </select>
                </div>
                <div class="col-6">
                    <select class="form-select" aria-label="Default select example" name="stats">
                        <option value="1">Enabled</option>
                        <option value="0">Disabled</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="button" class="btn btn-primary addUser">Cancel</button>
                    <button type="submit" class="btn btn-primary addUser" name="AddUserBtn">Add User</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>