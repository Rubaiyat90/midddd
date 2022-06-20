<!DOCTYPE html>
<html>
    <head>
        <title>Login page</title>
    </head>
    <?php
    session_start();

    
     
        $username="";
        $password="";
        $u_msg="";
        $p_msg="";
        $data="";
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            function test_input($data) {
                $data = htmlspecialchars($data);
                return $data;
            }
            if(filesize("regidata.json")>0){
                $f = fopen("regidata.json","r");
            $fr = fread($f,filesize("regidata.json"));
            $data = json_decode($fr);
            fclose($f);
            }            

            $username = test_input($_POST['username']);
            $password = test_input($_POST['password']);

            if(empty($username)){
                $u_msg .= "Username is empty ";
            }
            else{
                foreach($data as $user){
                    if($user -> username==$username){
                        $u_msg="valid";
                    }
                }
            }
            if(empty($password)){
                $p_msg .= "Password is empty";
            }
            else{
                foreach($data as $user){
                    if($user -> password==$password){
                        $p_msg="valid";
                    }
                }
            }

            if ($u_msg == "valid" && $p_msg=="valid" && $data!="") {
                echo "Login Successful";
                
            }
        }
    ?>
    <body>
    <form method="post"  novalidate>
        <fieldset>
            <legend>Login Page</legend>
            <label for="uname">Username</label>
            <input type="text" name="username" id="uname">
            <span><?php echo $u_msg; ?></span>
            <br><br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <span><?php echo $p_msg; ?></span>
             <br><br>
            <label for="remme">Remember Me</label>
            <input type="checkbox" name="remme" id="remme">
            
        </fieldset>
        <input type="submit" name="submit" value="Login">
    </form>
    </body>
</html>