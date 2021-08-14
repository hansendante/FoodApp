<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V14</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif; ?>
                <form action="/register/save" method="post">
                    <span class="login100-form-title p-b-32">
                        Account Register
                    </span>
                    <span class="txt1 p-b-11">
                        Name
                    </span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate="Name is required">
                        <input value="<?= set_value('name') ?>" class="input100" type="text" name="name" id="InputForName" >
                        <span class="focus-input100"></span>
                    </div>
                    <span class="txt1 p-b-11">
                        Email Address
                    </span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate="Email is required">
                        <input value="<?= set_value('email') ?>" class="input100" type="email" name="email" id="InputForEmail">
                        <span class="focus-input100"></span>
                    </div>
                    <span class="txt1 p-b-11">
                        Phone Number
                    </span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate="Phone is required">
                        <input value="<?= set_value('phone') ?>" class="input100" type="text" name="phone" id="InputForPhone">
                        <span class="focus-input100"></span>
                    </div>

                    <span class="txt1 p-b-11">
                        Password
                    </span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate="Password is required">
                        <span class="btn-show-pass" onclick="myFunction()">
                            <i class="fa fa-eye"></i>
                        </span>
                        <input class="input100"  type="password" name="password" id="InputForPassword">
                        <span class="focus-input100"></span>
                    </div>
                    <span class="txt1 p-b-11">
                        Confirm Password
                    </span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate="Confirm Password is required">
                        <span class="btn-show-pass" onclick="myFunction2()">
                            <i class="fa fa-eye"></i>
                        </span>
                        <input class="input100"  type="password" name="confpassword" id="ConfirmInputForPassword">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-b-48">
                        <div>
                            <a href="/login" class="txt3">
                                Already Have Account? Log In
                            </a>

                        </div>


                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Register
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor2/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor2/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor2/bootstrap/js/popper.js"></script>
    <script src="vendor2/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor2/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor2/daterangepicker/moment.min.js"></script>
    <script src="vendor2/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor2/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
<script>
        function myFunction() {
            var x = document.getElementById("InputForPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function myFunction2() {
            var x = document.getElementById("ConfirmInputForPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</html>