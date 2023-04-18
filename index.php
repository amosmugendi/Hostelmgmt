<?php
include_once 'db/conn.php';
include_once 'includes/header.php';
//include_once 'includes/header.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = strtolower(trim($_POST['email']));
    $password = $_POST['password'];
    $new_password = md5($password . $email);

    $result = $users->getUser($email, $new_password);
    if (!$result) {
        echo '<div>Email or password is incorrect! please try again.</div>';
    } else {      
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $result['id'];

        if($result['role']=='admin'){
            header("Location: admin.php");
        }
        elseif($result['role']=='web_user'){
            header("Location: student.php");
        }
      
      //  header("Location: student.php");
    }
}
?>


</br>
</br>
</br>

<div class="wrapper">
    <span class="icon-close">
        <i class="fa-solid fa-xmark"></i>
    </span>
    <div class="form-box-login">
        <h2>Login</h2>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="input-box">
                <span class="icon">
                    <input type="email" name="email" id="email" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['email']; ?>" required>
                    <label for="email">Email</label>
                </span>
            </div>
            <div class="input-box">
                <span class="icon">
                    <input type="Password" name="password" id="password" required>
                    <label>Password</label>
                </span>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="login-register">
                <p>Don't have an account?<a href="#" class="register-link"> Register</a></p>
            </div>
        </form>
    </div>
    <div class="form-box-register">
        <h2>Regitration</h2>
        <form method="post" action="sucess.php">
            <div class="input-box">
                <span class="icon">
                    <input type="Email" name="email" id="email" required>
                    <label>Email</label>
                </span>
            </div>
            <div class="input-box">
                <span class="icon">
                    <input type="password" name="password" id="password" #required>
                    <label>Password</label>
                </span>
            </div>
            <div class="input-box">
                <span class="icon">
                    <input type="password" required>
                    <label>Confirm Password</label>
                </span>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> I agree to Terms and Conditions</label>
            </div>
            <button type="submit " name="submit" class="btn">Register</button>
            <div class="login-register">
                <p>Already have an account?<a href="#" class="login-link"> Login</a></p>
            </div>
        </form>
    </div>
</div>

</br>
</br>
</br>
<?php
include_once 'includes/footer.php'
?>