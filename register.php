<?php include "includes/header.php";?>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-4 mt-5">

            <form method="post" action="includes/functions.php">
                <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger" role="alert">
                    <strong>
                        <?php
echo $_SESSION['error'];
unset($_SESSION['error']);
?>
                    </strong>
                </div>
                <?php endif?>
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating">
                    <input name="username" type="text" class="form-control" id="floatingInput" placeholder="Username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mt-3">
                    <input name="email" type="email" class="form-control" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mt-3">
                <select class="form-control" name="user_type" id="user_type">
                        <option value="">Select User Type</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <div class="form-floating mt-3">
                    <input name="password" type="password" class="form-control"
                        placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mt-3">
                    <input name="confirm_password" type="password" class="form-control" 
                        placeholder="Password">
                    <label for="floatingPassword">Confirm Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" name="register_btn" type="submit">Sign in</button>
                <p>
                    Already a member? <a href="./login.php"> Login</a>
                </p>
                <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
            </form>

        </div>
    </div>
</div>

<?php include "includes/footer.php";?>