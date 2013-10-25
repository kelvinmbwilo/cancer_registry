<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="jqueryui/css/start/jquery-ui-1.10.3.custom.min.css" type="text/css" />
        <link rel="stylesheet" href="css/tooltipster.css" type="text/css" />
        <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" />
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        
        <title>POPULATION CANCER REGISTRY</title>
    </head>
    <body>
        <div class="container" style="padding-top: 100px">
            <div class="panel panel-warning col-md-6 col-md-offset-3">
                <div class="panel-heading">
                    <h3 class="panel-title text-right text-primary"><b>CANCER REGISTRY</b></h3>
                </div>
                <div class="panel-body">
                    <h3 class="text-center headd"> Login </h3>
                    <!--login form-->
                    <form class="form-horizontal" role="form" id="loginForm">
                        <div class="form-group">
                          <label for="email" class="col-lg-2 control-label">Email</label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control validate[required]" id="email" placeholder="Email">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="pass" class="col-lg-2 control-label">Password</label>
                          <div class="col-lg-10">
                            <input type="password" class="form-control validate[required]" id="pass" placeholder="Password">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox"> Remember me
                                 <a href="#" class="col-md-offset-1">Forget password?</a>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                              <button type="button" class="btn btn-info" id="loginbtn">Sign in</button>
                          </div>
                        </div>
                      </form>

                </div>
                <div class="panel-footer text-center text-primary">&COPY; <?php echo date("Y") ?> Population Cancer Registry</div>
              </div>
        </div>
        
        <!--putting script bellow so that page load slow-->
        <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="jqueryui/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="js/jquery.tooltipster.min.js"></script>
        <script type="text/javascript" src="js/jquery.validationEngine-en.js"></script> 
        <script type="text/javascript" src="js/jquery.validationEngine.js"></script>
        <script type="text/javascript" src="js/jquery.form.js"></script>
        <script type="text/javascript" src="js/login.js"></script>
    </body>
</html>
