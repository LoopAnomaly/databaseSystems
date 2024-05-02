<!DOCTYPE html>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <title>iCare</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Protest+Strike&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body style="background-color: darkkhaki;">

        <nav class="navbar navbar-expand-lg navbar-light " style="background-color: beige;">
            <div class="container-fluid">
                <a class="navbar-brand roboto-bold" href="<?php echo e(route('Welcome')); ?>" style='font-size: 2rem'>iCare</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php if(!Session::has('acct_no')): ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo e(route('CustRegisterPage')); ?>" style="text-decoration: underline">Customer Registration</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo e(route('BusRegisterPage')); ?>" style="text-decoration: underline">Business Registration</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <?php if(Session::has('acct_no')): ?>
                    <form class="form d-flex" method="post" action="<?php echo e(route('DashboardReturn')); ?>" accept-charset="UTF-8">

                        <?php echo e(csrf_field()); ?>


                        <div class="align-middle">
                            <button type="submit" class="btn btn-primary ms-5 pt-1" style="margin-top: 33px">Dashboard</button>
                        </div>
                    </form>


                    <?php else: ?>
                    
                    <?php if(Session::has('loginFailure')): ?>
                    <h5 class="pe-5 pt-4" style="color: red">The provided credentials do not match our records</h5>
                    <?php endif; ?>
                    <form class="form d-flex" method="post" action="<?php echo e(route('Authenticate')); ?>" accept-charset="UTF-8">

                        <?php echo e(csrf_field()); ?>


                        <div>
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control me-5" name="email" id="email" aria-describedby="email" required />
                        </div>
                        <div>
                            <label for="password" class="form-label ms-3">Password:</label>
                            <input type="password" name="password" class="form-control ms-3" id="password" required />
                        </div>
                        <div class="align-middle">
                            <button type="submit" class="btn btn-primary ms-5 pt-1" style="margin-top: 33px">Login</button>
                        </div>
                    </form>

                    <?php endif; ?>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row mt-5">
                <h1 class="roboto-bold" style="text-align: center;">WELCOME TO ICARE</h1>
            </div>
            <?php if(Session::has('acct_no')): ?>
            <div class="row mt-5" style="text-align: center;">
                <h2>To see your dashboard, please click the dashboard button in the navigation bar or down below</h2>
            </div>

            <form class="form d-flex" method="post" action="<?php echo e(route('DashboardReturn')); ?>" accept-charset="UTF-8">

                <?php echo e(csrf_field()); ?>


                <div class="align-middle col-6 offset-3">
                    <button type="submit" class="btn btn-primary pt-1 col-12" style="margin-top: 33px">Dashboard</button>
                </div>

            </div>
            <?php else: ?>
            <div class="row mt-5">
                <p class="roboto-medium" style="text-align: center; font-size: 20px">Please login in the navigation bar or down below</p>
                <p class="roboto-medium" style="text-align: center; font-size: 20px">If you don't yet have an account, please use the navigation bar to register for one</p>
            </div>
            <div class="row mt-5">
                <div class="col-md-6 offset-md-3">
                    <form class="form" action="<?php echo e(route('Authenticate')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
                        </div>
                        <div class="mb-3">
                            <label for="password"  class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>

                </div>
            </div>
        </div>
        <?php endif; ?>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\icaretobymclenon\resources\views/welcome.blade.php ENDPATH**/ ?>