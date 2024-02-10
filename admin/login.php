<?php
session_start();


if(isset($_SESSION['user_id'])){
    header("Location: ./dashboard.php");
    exit();
}else{
 
?>

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css" rel="stylesheet" />



<section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <h3 class="mb-5">Sign in</h3>

                        <form action="./controller/process.php" method="post">
                            <div class="form-outline mb-4">
                                <input type="text" id="username" class="form-control form-control-lg" name="username"
                                    required />
                                <label class="form-label" for="username">Username</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="password" class="form-control form-control-lg"
                                    name="password" required />
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit" name="loginAdmin">Login</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.umd.min.js"></script>

<?php   
}
?>