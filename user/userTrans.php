<?php
    $pdo = require '../connect.php';

    if(isset($_POST['AddUserBtn'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $mi = $_POST['mi'];
        $email = $_POST['email'];
        $userType = $_POST['userType'];
        $upass = $_POST['upass'];
        $stats = $_POST['stats'];
        $regDate = date('Y-m-d H:i:s');
        $picture = $_POST['picture'];
        insertUser($pdo,$lastname,$firstname,$mi,$email,$upass,$stats,$regDate,$userType,$picture);
        
        echo '<script>window.location = "userList.php"</script>';
        unset($_POST['AddUserBtn']);  
    }
   
    function populateUser($pdo){
        try {
            $sql = 'SELECT * FROM userlist';
            $statement = $pdo->query($sql);
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($row as $r){
                $stats = '';
                $userType = '';
                if ($r["userType"]==1) {
                    $userType = 'Administrator';
                }else {
                    $userType = 'Standard Client';
                }
                if ($r["stats"]==1) {
                    $stats = 'Enabled';
                }else {
                    $stats = 'Disabled';
                }
                echo '
                    <tr>
                        <td>'.$r["userID"].'</td>
                        <td>'.$r["email"].'</td>
                        <td>'.$r["lastname"].'</td>
                        <td>'.$r["firstname"].'</td>
                        <td>'.$r["mi"].'</td>
                        <td>'.$userType.'</td>
                        <td>'.$stats.'</td>
                        <td> 
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-primary">Delete</button>
                        </div>
                        </td>
                    </tr>
              ';
            }
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
        $pdo = null;
        $sql = null;
            
    }

    function insertUser($pdo,$lastname,$firstname,$mi,$email,$upass,$stats,$regDate,$userType,$picture){
        try {
            $sql ='INSERT INTO userlist (lastname,firstname,mi,email,upass,stats,regDate,userType,picture) values (:lastname,:firstname,:mi,:email,:upass,:stats,:regDate,:userType,:picture)';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':lastname',$lastname);
            $statement->bindValue(':firstname',$firstname);
            $statement->bindValue(':mi',$mi);
            $statement->bindValue(':email',$email);
            $statement->bindValue(':upass',$upass);
            $statement->bindValue(':stats',$stats);
            $statement->bindValue(':regDate',$regDate);
            $statement->bindValue(':userType',$userType);
            $statement->bindValue(':picture',$picture);
            $statement->execute();
            echo '<script>alert("New User Added Successfully")</script>';
        }catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
        $pdo = null;
        $sql = null;
    }

    function deleteUser($pdo,$userID){
        try {
            $sql ='DELETE FROM userList WHERE userID = :userID';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':userID',$userID);
            $statement->execute();
            echo '<script>alert("User deleted successfully")</script>';
            //echo '<script>window.location="addUserForm.php"</script>';
        }catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
        $pdo = null;
        $sql = null;
    }

    function updateUser($pdo,$userID,$lastname,$firstname,$mi,$email,$upass,$stats,$regDate,$userType,$picture){
        try {
            $sql ='UPDATE userList set email=:email, upass=:upass, lastname=:lastname,firstname=:firstname,mi=:mi,userType=:userType,regDate=:regDate,stats=:stats,picture=:picture WHERE userID=:userID';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':userID',$userID);
            $statement->bindValue(':lastname',$lastname);
            $statement->bindValue(':firstname',$firstname);
            $statement->bindValue(':mi',$mi);
            $statement->bindValue(':email',$email);
            $statement->bindValue(':upass',$upass);
            $statement->bindValue(':stats',$stats);
            $statement->bindValue(':regDate',$regDate);
            $statement->bindValue(':userType',$userType);
            $statement->bindValue(':picture',$picture);
            $statement->execute();
            echo '<script>alert("User Information successfully updated")</script>';
            //echo '<script>window.location="addUserForm.php"</script>';
        }catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
        $pdo = null;
        $sql = null;
    }

?>