<div class="banner">
    <div class="welcome_msg">
        <h1>Our Inspiration </h1>
        <p>
          NOUS, C’EST LE GOÛT <br>
            <br>
            <span>~ STI-3A</span>
        </p>
        <a href="register.php" class="btn">Join us!</a>
    </div>
    <div class="login_div">
        <form action="index.php" method="post">
            <h2>Login</h2>
            <?php
            if(isset($msg)){
                echo $msg;
            }
            ?>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button class="btn" type="submit" name="login_btn">Sign in</button>
        </form>
    </div>
</div>