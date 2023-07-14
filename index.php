<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row d-flex flex-column">
            <!-- Nav pills -->
            <ul class="nav nav-pills justify-content-center mt-3 mb-2" role="tablist">
                <li class="nav-item">
                <a class="nav-link active py-2 px-5 mr-4" data-toggle="pill" href="#logIn">Login</a>
                </li>
                <li class="nav-item">
                <a class="nav-link py-2 px-5 ml-4" data-toggle="pill" href="#signUp">Sign up</a>
                </li>   
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" style="height: 0px;">
                <div id="logIn" class="container tab-pane active"><br>
                    <h2 class="text-center text-uppercase mb-4">Login to your account</h2>
                    <div class="row d-flex flex-row justify-content-center">
                        
                        
                        
                        <form class="col-md-4" action="reg.php" method="post">
                            
                            <?php if (isset($_GET['error'])) {
                                $error = $_GET['error'];
                                if ($error > 0) { ?>
                                    <div class="alert alert-danger">
                                        <strong>Warning:</strong> 
                                        <?php 
                                            if ($error == 1) echo "Don't left any field(s) empty!";
                                            if ($error == 2) echo "Wrong username or password!";

                                        ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            
                            
                            <div class="form-group input-group-sm">
                                <label for="uname1">Username:</label>
                                <input type="text" class="form-control" id="uname1" name="uname">
                            </div>
                
                            <div class="form-group input-group-sm">
                                <label for="passw1">Password:</label>
                                <input type="password" class="form-control" id="passw1" name="passw">
                            </div>               

                            <p class="text-center mt-3" style="font-size:14px;">Don't have an account yet? <a href="#signUp" id="logIn-link" class="btn-link">Sign up</a> instead!</p>

                            <button type="submit" class="btn btn-primary btn-block mt-4" name="logInBtn">Login</button>
                        </form>

                    </div>
                </div>


                <div id="signUp" class="container tab-pane fade"><br>
                <h2 class="text-center text-uppercase mb-4">Create new account</h2>
                    <div class="row d-flex flex-row justify-content-center">
                        <form class="col-md-4" action="reg.php" method="post">
                            
                            <?php if (isset($_GET['signUp'])) { ?>
                            <script>
                                $(document).ready(function() {
                                    $('.nav-pills a[href="#signUp"]').tab('show');
                                });
                            </script>    
                            <?php
                                $value = $_GET['signUp'];
                                if ($value == 1) { ?>
                                    <div class="alert alert-success">
                                        Account created successfully! 
                                    </div>
                                <?php } else if ($value == 0) { ?>
                                    <div class="alert alert-danger">
                                        <strong>Warning:</strong> Username already existed!
                                    </div>
                                <?php } ?>
                                
                            <?php } ?>

                        
                            <div class="form-group input-group-sm">
                                <label for="fname">Full name:</label>
                                <input type="text" class="form-control" id="fname" name="fname">
                            </div>
                
                            <div class="form-group input-group-sm">
                                <label for="uname">Username:</label>
                                <input type="text" class="form-control" id="uname" name="uname" onkeyup="checkUsername()">
                            </div>
                
                            <div class="form-group input-group-sm">
                                <label for="passw">Password:</label>
                                <input type="password" class="form-control" id="passw" name="passw">
                            </div>
                
                            <div class="form-group form-check-inline py-1">
                                <label class="form-check-label"><input class="form-check-input" type="radio" name="gender" value="male" checked>Male</label>
                                <label class="form-check-label"><input class="form-check-input ml-5" type="radio" name="gender" value="female">Female</label>
                            </div>
                
                            <div class="form-group input-group-sm">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            
                            <p class="text-center mt-3" style="font-size:14px;">Already have an account? <a href="#logIn" id="signUp-link" class="btn-link" role="button">Log in</a> instead!</p>

                            <button type="submit" class="btn btn-primary btn-block mt-4" name="signUpBtn">Sign up</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.nav-pills a').on('shown.bs.tab', function(event) {
                var target = $(event.target).attr('href');
                $(target).tab('show');
            });
    
            $('#logIn-link').on('click', function() {
                $('.nav-pills a[href="#signUp"]').tab('show');
            });
    
            $('#signUp-link').on('click', function() {
                $('.nav-pills a[href="#logIn"]').tab('show');
            });
        });
    </script>
</body>
</html>