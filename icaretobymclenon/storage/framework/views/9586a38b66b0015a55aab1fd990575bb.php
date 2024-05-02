<!DOCTYPE html>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Protest+Strike&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
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

                    </ul>

                    <form class="form d-flex" method="post" action="<?php echo e(route('Dashboard')); ?>" accept-charset="UTF-8">

                        <?php echo e(csrf_field()); ?>


                        <div class="align-middle">
                            <button type="submit" class="btn btn-primary ms-5 pt-1" style="margin-top: 33px">Dashboard</button>
                        </div>
                    </form>

                    <form class="form d-flex" method="post" action="<?php echo e(route('Logout')); ?>" accept-charset="UTF-8">

                        <?php echo e(csrf_field()); ?>


                        <div class="align-middle">
                            <button type="submit" class="btn btn-primary ms-5 pt-1" style="margin-top: 33px">Logout</button>
                        </div>
                    </form>
                </div>
            </div>

        </nav>
        <div class="col-6 offset-3">

            <?php if(Session::has('acct_no')): ?>
            <form class="form" action="<?php echo e(route('UpdatePreferences')); ?>" method="post" accept-charset="UTF-8">

                <?php echo e(csrf_field()); ?>


                <h1 class="roboto-bold"> MORTGAGE:</h1>
                <div class="form-group mt-3">
                    <h5 class="roboto-bold">Desired Mortgage Price:</h5>
                    <?php if(Session::has('mort_price')): ?>
                    <input type="text" class="form-control" name="mort_price" placeholder="Desired Mortgage Payment" value="<?php echo e(Session::get('mort_price')); ?>">
                    <?php else: ?>
                    <input type="text" class="form-control" name="mort_price" placeholder="Desired Mortgage Payment">
                    <?php endif; ?>
                </div>

                <?php if(Session::has('mort_contract')): ?>
                <?php if(Session::get('mort_contract') == 1): ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="mort_contract" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract OK?
                    </label>
                </div>
                <?php else: ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="mort_contract">
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract OK?
                    </label>
                </div>
                <?php endif; ?>
                <?php else: ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="mort_contract">
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract OK?
                    </label>
                </div>
                <?php endif; ?>



                <h1 class="roboto-bold mt-5"> INSURANCE:</h1>
                <div class="form-group mt-3">
                    <h5 class="roboto-bold">Desired Insurance Price:</h5>
                    <?php if(Session::has('ins_price')): ?>
                    <input type="text" class="form-control" name="ins_price" placeholder="Desired Insurance Payment" value="<?php echo e(Session::get('ins_price')); ?>">
                    <?php else: ?>
                    <input type="text" class="form-control" name="ins_price" placeholder="Desired Insurance Payment">
                    <?php endif; ?>
                </div>


                <?php if(Session::has('ins_contract')): ?>
                <?php if(Session::get('ins_contract') == 1): ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="ins_contract" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract OK?
                    </label>
                </div>
                <?php else: ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="ins_contract">
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract OK?
                    </label>
                </div>
                <?php endif; ?>
                <?php else: ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="ins_contract">
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract OK?
                    </label>
                </div>
                <?php endif; ?>



                <h1 class="roboto-bold mt-5"> INTERNET:</h1>

                <?php if(Session::has('speed')): ?>
                
                
                <?php if(Session::get('speed') == "25GB"): ?>
                <div class="form-group mt-3">
                    <h5 class="roboto-bold">Desired Internet Speed:</h5>
                    <select class="form-select" aria-label="Default select example" name="speed">
                        <option value="">Download Speed</option>
                        <option value="25GB" selected>25GB</option>
                        <option value="50GB">50GB</option>
                        <option value="100GB">100GB</option>
                    </select>
                </div>
                <?php elseif(Session::get('speed') == "50GB"): ?>
                <div class="form-group mt-3">
                    <h5 class="roboto-bold">Desired Internet Speed:</h5>
                    <select class="form-select" aria-label="Default select example" name="speed">
                        <option value="">Download Speed</option>
                        <option value="25GB">25GB</option>
                        <option value="50GB" selected>50GB</option>
                        <option value="100GB">100GB</option>
                    </select>
                </div>
                <?php elseif(Session::get('speed') == "100GB"): ?>
                <div class="form-group mt-3">
                    <h5 class="roboto-bold">Desired Internet Speed:</h5>
                    <select class="form-select" aria-label="Default select example" name="speed">
                        <option value="">Download Speed</option>
                        <option value="25GB">25GB</option>
                        <option value="50GB">50GB</option>
                        <option value="100GB" selected>100GB</option>
                    </select>
                </div>
                <?php endif; ?>
                
                
                <?php else: ?>
                <div class="form-group mt-3">
                    <h5 class="roboto-bold">Desired Internet Speed:</h5>
                    <select class="form-select" aria-label="Default select example" name="speed">
                        <option value="">Download Speed</option>
                        <option value="25GB">25GB</option>
                        <option value="50GB">50GB</option>
                        <option value="100GB">100GB</option>
                    </select>
                </div>
                <?php endif; ?>

                
                <?php if(Session::has('int_price')): ?>
                <div class="form-group mt-3">
                    <h5 class="roboto-bold">Desired Internet Price:</h5>
                    <input type="text" class="form-control" name="int_price" placeholder="Desired Internet Payment" value="<?php echo e(Session::get('int_price')); ?>">
                </div>
                <?php else: ?>
                <div class="form-group mt-3">
                    <h5 class="roboto-bold">Desired Internet Price:</h5>
                    <input type="text" class="form-control" name="int_price" placeholder="Desired Internet Payment">
                </div>
                <?php endif; ?>


                <?php if(Session::has('int_contract')): ?>
                <?php if(Session::get('int_contract') == 1): ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="int_contract" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract OK?
                    </label>
                </div>
                <?php else: ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="int_contract">
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract OK?
                    </label>
                </div>
                <?php endif; ?>
                <?php else: ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="int_contract">
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract OK?
                    </label>
                </div>
                <?php endif; ?>



                <h1 class="roboto-bold mt-5"> CLEANING:</h1>
                <div class="form-group mt-3">     
                    <h5 class="roboto-bold">Desired Cleaning Price:</h5>
                    <?php if(Session::has('clean_price')): ?>
                    <input type="text" class="form-control" name="clean_price" placeholder="Desired Cleaning Payment" value="<?php echo e(Session::get('clean_price')); ?>">
                    <?php else: ?>
                    <input type="text" class="form-control" name="clean_price" placeholder="Desired Cleaning Payment">
                    <?php endif; ?>
                </div>

                <?php if(Session::has('clean_contract')): ?>
                <?php if(Session::get('clean_contract') == 1): ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="clean_contract" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract OK?
                    </label>
                </div>
                <?php else: ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="clean_contract">
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract OK?
                    </label>
                </div>
                <?php endif; ?>
                <?php else: ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="clean_contract">
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract OK?
                    </label>
                </div>
                <?php endif; ?>




                <h1 class="roboto-bold mt-5"> LANDSCAPING:</h1>
                <div class="form-group mt-3">
                    <h5 class="roboto-bold">Desired Landscaping Price:</h5>
                    <?php if(Session::has('land_price')): ?>
                    <input type="text" class="form-control" name="land_price" placeholder="Desired Landscaping Payment" value="<?php echo e(Session::get('land_price')); ?>">
                    <?php else: ?>
                    <input type="text" class="form-control" name="land_price" placeholder="Desired Landscaping Payment">
                    <?php endif; ?>
                </div>

                <?php if(Session::has('land_contract')): ?>
                <?php if(Session::get('land_contract') == 1): ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="land_contract" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract OK?
                    </label>
                </div>
                <?php else: ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="land_contract">
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract OK?
                    </label>
                </div>
                <?php endif; ?>
                <?php else: ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="land_contract">
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract OK?
                    </label>
                </div>
                <?php endif; ?>

                <h1 class="roboto-bold mt-5"> PHONE SERVICE:</h1>
                <div class="form-group mt-3">
                    <h5 class="roboto-bold">Desired Phone Price:</h5>
                    <?php if(Session::has('phone_price')): ?>
                    <input type="text" class="form-control" name="phone_price" placeholder="Desired Phone Payment (Per Line)" value="<?php echo e(Session::get('phone_price')); ?>">
                    <?php else: ?>
                    <input type="text" class="form-control" name="phone_price" placeholder="Desired Phone Payment (Per Line)">
                    <?php endif; ?>
                </div>

                <?php if(Session::has('phone_contract')): ?>
                <?php if(Session::get('phone_contract') == 1): ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="phone_contract" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract OK?
                    </label>
                </div>
                <?php else: ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="phone_contract">
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract OK?
                    </label>
                </div>
                <?php endif; ?>
                <?php else: ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="phone_contract">
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract OK?
                    </label>
                </div>
                <?php endif; ?>

                <input type="submit" name="submit" value="Update Preferences" class="btn btn-primary mt-3 mb-5">
            </form>

            <?php else: ?>
        </div>
        <p class="btn btn-success col-2 offset-5"><a href="<?php echo e(route('Welcome')); ?>" style="color: white; text-decoration: none;">Home</a></p>
        <?php endif; ?>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\icaretobymclenon\resources\views/update_preferences.blade.php ENDPATH**/ ?>