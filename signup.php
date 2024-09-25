<!DOCTYPE html>
<html>
<head>
    <title>SIGN UP</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>
<header>
    <nav>
        <div class="logo">
            <a href="home.html"><img class="logoimg" src="logo.PNG"></a>
        </div>
        <ul class="nav-links">
            <li><a href="home.html">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="contactform.html">Contact Us</a></li>
            <li><a href="faqs.html">FAQs</a></li>
        </ul>
    </nav>
</header>
<form action="signup-check.php" method="post">
    <h2>SIGN UP</h2>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>

    <?php if (isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
    <?php } ?>

    <div class="row">
        <div class="col">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" <?php if (isset($_GET['name'])) echo "value='" . $_GET['name'] . "'"; ?>>
        </div>
        <div class="col">
            <label>User Name</label>
            <input type="text" name="uname" placeholder="User Name" <?php if (isset($_GET['uname'])) echo "value='" . $_GET['uname'] . "'"; ?>>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label>Mobile Number</label>
            <input type="text" name="mobile" placeholder="Mobile Number" <?php if (isset($_GET['mobile'])) echo "value='" . $_GET['mobile'] . "'"; ?>>
        </div>
        <div class="col">
            <label>Email</label>
            <input type="email" name="email" placeholder="Email" <?php if (isset($_GET['email'])) echo "value='" . $_GET['email'] . "'"; ?>>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password">
        </div>
        <div class="col">
            <label>Re-enter Password</label>
            <input type="password" name="re_password" placeholder="Re_Password">
        </div>
    </div>

    <button type="submit">Sign Up</button>
    <a href="loginindex.php" class="ca">Already have an account?</a>
</form>
</body>
</html>
