<?php include('init.php')  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi user login system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
<?php if (isset($_SESSION['success'])): ?>
                <div id="top-message" class="alert-success text-center" role="alert">
                    <strong>
                        <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                            ?>
                    </strong>
                </div>
                <?php endif?>
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="./" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
          <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
          <li><a href="#" class="nav-link px-2 text-white">About</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>
        
        <?php  if (isset($_SESSION['user'])) : ?>
        <div class="dropdown text-end">
          <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
            <strong><?php echo $_SESSION['user']['username']; ?></strong>
            <i>(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a href="includes/functions.php?logout='1'" class="dropdown-item">Sign out</a></li>
          </ul>
        </div>
				<?php else : ?>
          <div class="text-end">
          <button id="login" type="button" class="btn btn-outline-light me-2">Login</button>
          <button id="signup" type="button" class="btn btn-warning">Sign-up</button>
        </div>
          <?php endif ?>
      </div>
    </div>

<script type="text/javascript">
    document.getElementById("login").onclick = function () {
        location.href = "./login.php";
    };
    document.getElementById("signup").onclick = function () {
        location.href = "./register.php";
    };
</script>
  </header>
