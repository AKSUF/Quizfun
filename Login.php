<link rel="stylesheet" href="./Css/Login.css">


<div class="row">
    <!-- Form for login -->
    <div class="col-7">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <h4 id="Tag">Welcome back! </h4>
                <h4> Please Sign In to your account. </h4>
                <!-- Form for login -->
                <span>
                    <form action="" id="loginuser" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" id="exampleFormControlInput1" placeholder="Password">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary mb-3" id="exampleFormSubmit">Login</button>
                        </div>
                    </form>
                    <p>Don't have an account? <a href="openpage.php?register" class="" id="signuplogin">Sign Up</a></p>
                </span>
                <!-- Success and error messages -->
                <div id="success-message" class="d-none alert alert-success" role="alert">
                    Login successfully
                </div>
                <div id="error-message" class="d-none alert alert-danger" role="alert">
                    Login was not successful
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>

    <!-- For image -->
    <div class="col-4">
        <img src="./image/_9b89a72c-4b80-498d-b3a3-2a09aff76e83.jpeg" alt="" style="height: 100%; width: 100%; margin-top: 20px;">
    </div>
</div>
