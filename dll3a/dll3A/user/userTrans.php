<?php
    $pdo = require '../connect.php';

    if (isset($_POST['AddUserBtn'])) {
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $mi = $_POST['mi'];
        $userType = $_POST['userType'];
        $stats = $_POST['stats'];
        $email = $_POST['email'];
        $upass = $_POST['upass'];
        $picture = $_POST['picture'];
        date_default_timezone_set('Asia/Manila');
        $regDate = date('Y-m-d H:i:s');

        if (checkEmailAdd($pdo,$email)==TRUE){
            echo '<script>alert("Email Address already exist!")</script>';
            echo '<script>window.location="userAddForm.php"</script>';
        }else{
            insertUser($pdo,$lastname,$firstname,$mi,$email,$upass,$stats,$regDate,$userType,$picture);
            echo '<script>window.location="userList.php"</script>';
        }
        unset($_POST['AddUserBtn']);  
    }

    function checkEmailAdd($pdo,$email){
        try {
            $sql = 'SELECT count(email) as rowCount FROM userList where email=:email';
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':email',$email);
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            if ($row['rowCount']>0){
                return True;
            }else{
                return False;
            }
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    function populateUser($pdo){
        try {
            $sql = 'SELECT * FROM userList';
            $statement = $pdo->query($sql);
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($row as $r){
                $userType = "";
                $stats = "";

                if ($r['userType']==1){
                    $userType = 'Administrator';
                }else{
                    $userType = 'Standard User';
                }

                if ($r['stats']==1){
                    $stats = 'Enabled';
                }else{
                    $stats = 'Disabled';
                }
                echo '
                    <tr>
                        <td>'.$r['userID'].'</td>
                        <td>'.$r['email'].'</td>
                        <td>'.$r['lastname'].'</td>
                        <td>'.$r['firstname'].'</td>
                        <td>'.$r['mi'].'</td>
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
            $sql ='INSERT INTO userList (lastname,firstname,mi,email,upass,stats,regDate,userType,picture) values (:lastname,:firstname,:mi,:email,:upass,:stats,:regDate,:userType,:picture)';
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