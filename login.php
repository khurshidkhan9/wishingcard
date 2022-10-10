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
                <h1 class="h3 mb-3 fw-normal">Please Login in</h1>

                <div class="form-floating">
                    <input type="text" name="username" class="form-control" id="floatingInput"
                        placeholder="username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mt-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword"
                        placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-success" name="login_btn" type="submit">Login</button>
                <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
            </form>

        </div>
    </div>
</div>

<?php include "includes/footer.php";?>