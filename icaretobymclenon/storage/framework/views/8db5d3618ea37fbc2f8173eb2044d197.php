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
                <h1 class="col-7">Registration</h1>
            </div>

        </nav>
        <div class="col-6 offset-3">

            <?php if(!Session::has('acct_no')): ?>
            <form class="form" action="<?php echo e(route('BusRegister')); ?>" method="post" accept-charset="UTF-8">

                <?php echo e(csrf_field()); ?>


                <?php if(Session::has('success')): ?>
                <h1 class='roboto-bold mb-5' style="color: white;">You have successfully registered an account with us</h1>
                <?php elseif(Session::has('failure')): ?>
                <h1 class='roboto-bold mb-5' style="color: white;">An account with the email already exists, please log in</h1>
                <?php endif; ?>

                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="bus_name" placeholder="Business Name" required />
                </div>

                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="email" placeholder="Email Address" required />
                </div>

                <div class="form-group mt-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" required />
                </div>

                <input type="submit" name="submit" value="Register" class="btn btn-primary mt-3 mb-5">
            </form>

            <?php else: ?>

            <form class="form" action="<?php echo e(route('BusAddServices')); ?>" method="post" accept-charset="UTF-8" enctype="multipart/form-data">

                <?php echo e(csrf_field()); ?>


                <?php if(Session::has('success')): ?>
                <h1 class='roboto-bold mb-5' style="color: white;">You have successfully registered an account with us</h1>
                <?php elseif(Session::has('failure')): ?>
                <h1 class='roboto-bold mb-5' style="color: white;">An account with the email already exists, please log in</h1>
                <?php endif; ?>

                <?php if(Session::has('show_mortgage')): ?>
                <h1>MORTGAGE:</h1>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="phone_looking">
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract Required?
                    </label>
                </div>
                <div class="form-group mt-3">
                    <?php if(!empty(old('mort_cost'))): ?>
                    <input type="text" class="form-control" name="mort_cost" placeholder="Monthly Cost" value="<?php echo e(old('mort_cost')); ?>" required />
                    <?php else: ?>
                    <input type="text" class="form-control" name="mort_cost" placeholder="Monthly Cost" required />
                    <?php endif; ?>
                    <input type="submit" name="action" value="Remove Mortgage" class="btn btn-primary mt-3 mb-5" formnovalidate>
                </div>
                <?php else: ?>
                <h1>MORTGAGE:</h1>
                <div class="form-group mt-3">
                    <input type="submit" name="action" value="Add Mortgage" class="btn btn-primary mt-3 mb-5" formnovalidate>
                </div>
                <?php endif; ?>

                <?php if(Session::has('show_insurance')): ?>
                <h1>HOME OWNERS' INSURANCE:</h1>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="phone_looking">
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract Required?
                    </label>
                </div>
                <?php if(!empty(old('ins_cost'))): ?>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="ins_cost" placeholder="Monthly Cost" value="<?php echo e(old('ins_cost')); ?>" required />
                </div>
                <?php else: ?>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="ins_cost" placeholder="Monthly Cost" required />
                </div>
                <?php endif; ?>
                <input type="submit" name="action" value="Remove Insurance" class="btn btn-primary mt-3 mb-5" formnovalidate>
                <?php else: ?>
                <h1>HOME OWNERS' INSURANCE:</h1>
                <div class="form-group">
                    <input type="submit" name="action" value="Add Home Owners' Insurance" class="btn btn-primary mt-3 mb-5" formnovalidate>
                </div>
                <?php endif; ?>

                <?php if(Session::has('show_25internet')): ?>
                <h1>INTERNET:</h1>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="phone_looking">
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract Required?
                    </label>
                </div>
                <?php if(!empty(old('int25_cost'))): ?>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="int25_cost" placeholder="Monthly cost" value="<?php echo e(old('int25_cost')); ?>" required />
                </div>
                <?php else: ?>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="int25_cost" placeholder="Monthly Cost" required />
                </div>
                <?php endif; ?>
                <input type="submit" name="action" value="Remove 25GB Internet" class="btn btn-primary mt-3 mb-5" formnovalidate>
                <?php else: ?>
                <h1>INTERNET:</h1>
                <div class="form-group">
                    <input type="submit" name="action" value="Add 25GB Internet" class="btn btn-primary mt-3 mb-5" formnovalidate>
                </div>
                <?php endif; ?>
                
                <?php if(Session::has('show_50internet')): ?>
                <h1>INTERNET:</h1>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="phone_looking">
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract Required?
                    </label>
                </div>
                <?php if(!empty(old('int50_cost'))): ?>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="int50_cost" placeholder="Monthly cost" value="<?php echo e(old('int50_cost')); ?>" required />
                </div>
                <?php else: ?>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="int50_cost" placeholder="Monthly Cost" required />
                </div>
                <?php endif; ?>
                <input type="submit" name="action" value="Remove 50GB Internet" class="btn btn-primary mt-3 mb-5" formnovalidate>
                <?php else: ?>
                <h1>INTERNET:</h1>
                <div class="form-group">
                    <input type="submit" name="action" value="Add 50GB Internet" class="btn btn-primary mt-3 mb-5" formnovalidate>
                </div>
                <?php endif; ?>

                <?php if(Session::has('show_100internet')): ?>
                <h1>INTERNET:</h1>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="phone_looking">
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract Required?
                    </label>
                </div>
                <?php if(!empty(old('int100_cost'))): ?>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="int100_cost" placeholder="Monthly cost" value="<?php echo e(old('int100_cost')); ?>" required />
                </div>
                <?php else: ?>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="int100_cost" placeholder="Monthly Cost" required />
                </div>
                <?php endif; ?>
                <input type="submit" name="action" value="Remove 100GB Internet" class="btn btn-primary mt-3 mb-5" formnovalidate>
                <?php else: ?>
                <h1>INTERNET:</h1>
                <div class="form-group">
                    <input type="submit" name="action" value="Add 100GB Internet" class="btn btn-primary mt-3 mb-5" formnovalidate>
                </div>
                <?php endif; ?>

                <?php if(Session::has('show_cleaning')): ?>
                <h1>CLEANING SERVICE:</h1>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="phone_looking">
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract Required?
                    </label>
                </div>
                <div class="form-group mt-3">
                    <?php if(!empty(old('clean_cost'))): ?>
                    <input type="text" class="form-control" name="clean_cost" placeholder="Monthly Cost per sqft" value="<?php echo e(old('clean_cost')); ?>" required />
                    <?php else: ?>
                    <input type="text" class="form-control" name="clean_cost" placeholder="Monthly Cost per sqft" required />
                    <?php endif; ?>
                </div>

                <input type="submit" name="action" value="Remove Cleaning" class="btn btn-primary mt-3 mb-5" formnovalidate>
                <?php else: ?>
                <h1>CLEANING SERVICE:</h1>
                <input type="submit" name="action" value="Add Cleaning" class="btn btn-primary mt-3 mb-5" formnovalidate>
                <?php endif; ?>

                <?php if(Session::has('show_landscape')): ?>
                <h1>LANDSCAPING:</h1>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="phone_looking">
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract Required?
                    </label>
                </div>
                <div class="form-group mt-3">
                    <?php if(!empty(old('land_cost'))): ?>
                    <input type="text" class="form-control" name="land_cost" placeholder="Monthly cost per sqft" value="<?php echo e(old('land_cost')); ?>" required />
                    <?php else: ?>
                    <input type="text" class="form-control" name="land_cost" placeholder="Monthly cost per sqft" required />
                    <?php endif; ?>
                </div>

                <input type="submit" name="action" value="Remove Land" class="btn btn-primary mt-3 mb-5" formnovalidate>
                <?php else: ?>
                <h1>LANDSCAPING:</h1>
                <div class="form-group">
                    <input type="submit" name="action" value="Add Land" class="btn btn-primary mt-3 mb-5" formnovalidate>
                </div>
                <?php endif; ?>

                <?php if(Session::has('show_phone')): ?>
                <h1>PHONE SERVICE:</h1>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="phone_looking">
                    <label class="form-check-label" for="flexCheckDefault">
                        Contract Required?
                    </label>
                </div>
                <div class="form-group mt-3">
                    <?php if(!empty(old('phone_cost'))): ?>
                    <input type="text" class="form-control" name="phone_cost" placeholder="Monthly Cost Per Line" value="<?php echo e(old('phone_cost')); ?>" required />
                    <?php else: ?>
                    <input type="text" class="form-control" name="phone_cost" placeholder="Monthly Cost Per Line" required />
                    <?php endif; ?>
                </div>

                <input type="submit" name="action" value="Remove Phones" class="btn btn-primary mt-3 mb-5" formnovalidate>
                <?php else: ?>
                <h1>PHONE SERVICE:</h1>
                <input type="submit" name="action" value="Add Phones" class="btn btn-primary mt-3 mb-5" formnovalidate>
                <?php endif; ?>
                
                <div class="form-group mt-3">
                    <input type="submit" name="action" value="Register" class="btn btn-primary mt-3 mb-5">
                </div>
            </form>
            <?php endif; ?>
            
            
        </div>
        <?php if(!Session::has('acct_no')): ?>
        <p class="btn btn-success col-2 offset-5"><a href="<?php echo e(route('Dashboard')); ?>" style="color: white; text-decoration: none;">Dashboard</a></p>
        <?php endif; ?>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\icaretobymclenon\resources\views/bus_register.blade.php ENDPATH**/ ?>