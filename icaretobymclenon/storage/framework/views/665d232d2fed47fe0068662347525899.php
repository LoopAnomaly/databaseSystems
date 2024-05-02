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
            <form class="form" action="<?php echo e(route('CustRegister')); ?>" method="post" accept-charset="UTF-8">

                <?php echo e(csrf_field()); ?>


                <?php if(Session::has('success')): ?>
                <h1 class='roboto-bold mb-5' style="color: white;">You have successfully registered an account with us</h1>
                <?php elseif(Session::has('failure')): ?>
                <h1 class='roboto-bold mb-5' style="color: white;">An account with the email already exists, please log in</h1>
                <?php endif; ?>

                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="first_name" placeholder="First Name" required />
                </div>

                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" required />
                </div>

                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="address" placeholder="Address" required />
                </div>

                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="email" placeholder="Email Address" required />
                </div>

                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="phone_no" placeholder="Phone Number" required />
                </div>

                <div class="form-group mt-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" required />
                </div>

                <input type="submit" name="submit" value="Register" class="btn btn-primary mt-3 mb-5">
            </form>

            <?php else: ?>

            <form class="form" action="<?php echo e(route('AddServices')); ?>" method="post" accept-charset="UTF-8" enctype="multipart/form-data">

                <?php echo e(csrf_field()); ?>


                <?php if(Session::has('success')): ?>
                <h1 class='roboto-bold mb-5' style="color: white;">You have successfully registered an account with us</h1>
                <?php elseif(Session::has('failure')): ?>
                <h1 class='roboto-bold mb-5' style="color: white;">An account with the email already exists, please log in</h1>
                <?php endif; ?>

                <?php if(Session::has('show_mortgage')): ?>
                <h1>MORTGAGE:</h1>
                <div class="form-group mt-3">
                    <?php if(!empty(old('mort_cost'))): ?>
                    <input type="text" class="form-control" name="mort_cost" placeholder="Monthly Payment" value="<?php echo e(old('mort_cost')); ?>" required />
                    <?php else: ?>
                    <input type="text" class="form-control" name="mort_cost" placeholder="Monthly Payment" required />
                    <?php endif; ?>
                    <label for="Month" class="form-label">Expiration Date:</label>
                    <select class="form-select" aria-label="Default select example" name="mort_month" required />
                    <option value="">Month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                    </select>
                    <select class="form-select mt-1" aria-label="Default select example" name="mort_year" required />
                    <option value="">Year</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                    <option value="2031">2031</option>
                    <option value="2032">2032</option>
                    <option value="2033">2033</option>
                    <option value="2034">2034</option>
                    <option value="2035">2035</option>
                    </select>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="mort_looking">
                        <label class="form-check-label" for="flexCheckDefault">
                            Actively looking for new provider?
                        </label>
                    </div>
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
                <?php if(!empty(old('ins_cost'))): ?>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="ins_cost" placeholder="Monthly Payment" value="<?php echo e(old('ins_cost')); ?>" required />
                </div>
                <?php else: ?>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="ins_cost" placeholder="Monthly Payment" required />
                </div>
                <?php endif; ?>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="ins_looking">
                    <label class="form-check-label" for="flexCheckDefault">
                        Actively looking for new provider?
                    </label>
                </div>
                <input type="submit" name="action" value="Remove Insurance" class="btn btn-primary mt-3 mb-5" formnovalidate>
                <?php else: ?>
                <h1>HOME OWNERS' INSURANCE:</h1>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="ins_looking">
                        <label class="form-check-label" for="flexCheckDefault">
                            No service, but looking for a provider?
                        </label>
                    </div>
                    <input type="submit" name="action" value="Add Home Owners' Insurance" class="btn btn-primary mt-3 mb-5" formnovalidate>
                </div>
                <?php endif; ?>

                <?php if(Session::has('show_internet')): ?>
                <h1>INTERNET:</h1>
                <?php if(!empty(old('int_cost'))): ?>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="int_cost" placeholder="Monthly Payment" value="<?php echo e(old('int_cost')); ?>" required />
                </div>
                <?php else: ?>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="int_cost" placeholder="Monthly Payment" required />
                </div>
                <?php endif; ?>
                <label for="Speed" class="form-label mt-2">Internet Speed:</label>
                <select class="form-select" aria-label="Default select example" name="speed" required />
                <option value="">Download Speed</option>
                <option value="25GB">25GB</option>
                <option value="50GB">50GB</option>
                <option value="100GB">100GB</option>
                </select>
                <div class="form-group">
                    <a href="https://www.consumerreports.org/electronics/internet/how-much-internet-speed-do-you-need-a1714131782/" target="_blank">If you are unsure what speed you need, please click here to find out.</a>
                </div>
                <label for="Month" class="form-label mt-2">Expiration Date (if applicable):</label>
                <select class="form-select" aria-label="Default select example" name="int_month">
                    <option value="">Month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
                <select class="form-select mt-1" aria-label="Default select example" name="int_year">
                    <option value="">Year</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                    <option value="2031">2031</option>
                    <option value="2032">2032</option>
                    <option value="2033">2033</option>
                    <option value="2034">2034</option>
                    <option value="2035">2035</option>
                </select>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="int_looking">
                    <label class="form-check-label" for="flexCheckDefault">
                        Actively looking for new provider?
                    </label>
                </div>

                <input type="submit" name="action" value="Remove Internet" class="btn btn-primary mt-3 mb-5" formnovalidate>
                <?php else: ?>
                <h1>INTERNET:</h1>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="int_looking">
                        <label class="form-check-label" for="flexCheckDefault">
                            No service, but looking for a provider?
                        </label>
                    </div>
                    <label for="Speed" class="form-label mt-2">Desired Internet Speed (If looking):</label>
                    <select class="form-select" aria-label="Default select example" name="speed"
                            <option value="">Download Speed</option>
                        <option value="25GB">25GB</option>
                        <option value="50GB">50GB</option>
                        <option value="100GB">100GB</option>
                    </select>
                    <div class="form-group">
                        <a href="https://www.consumerreports.org/electronics/internet/how-much-internet-speed-do-you-need-a1714131782/" target="_blank">If you are unsure what speed you need, please click here to find out.</a>
                    </div>
                    <input type="submit" name="action" value="Add Internet" class="btn btn-primary mt-3 mb-5" formnovalidate>

                </div>
                <?php endif; ?>

                <?php if(Session::has('show_cleaning')): ?>
                <h1>CLEANING SERVICE:</h1>
                <div class="form-group mt-3">
                    <?php if(!empty(old('clean_cost'))): ?>
                    <input type="text" class="form-control" name="clean_cost" placeholder="Cost" value="<?php echo e(old('clean_cost')); ?>" required />
                    <?php else: ?>
                    <input type="text" class="form-control" name="clean_cost" placeholder="Cost" required />
                    <?php endif; ?>

                    <?php if(!empty(old('sq_ft'))): ?>
                    <input type="text" class="form-control mt-2" name="sq_ft" placeholder="Square Footage" value="<?php echo e(old('sq_ft')); ?>" required />
                    <?php else: ?>
                    <input type="text" class="form-control mt-2" name="sq_ft" placeholder="Square Footage" required />
                    <?php endif; ?>

                    <?php if(!empty(old('beds'))): ?>
                    <input type="text" class="form-control mt-2" name="beds" placeholder="Number of bedrooms" value="<?php echo e(old('beds')); ?>" required />
                    <?php else: ?>
                    <input type="text" class="form-control mt-2" name="beds" placeholder="Number of bedrooms" required />
                    <?php endif; ?>

                    <?php if(!empty(old('baths'))): ?>
                    <input type="text" class="form-control mt-2" name="baths" placeholder="Number of bathrooms" value="<?php echo e(old('baths')); ?>" required />
                    <?php else: ?>
                    <input type="text" class="form-control mt-2" name="baths" placeholder="Number of bathrooms" required />
                    <?php endif; ?>

                    <label for="Month" class="form-label mt-2">Expiration Date (if applicable):</label>
                    <select class="form-select" aria-label="Default select example" name="clean_month">
                        <option value="">Month</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                    <select class="form-select mt-1" aria-label="Default select example" name="clean_year">
                        <option value="">Year</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                        <option value="2031">2031</option>
                        <option value="2032">2032</option>
                        <option value="2033">2033</option>
                        <option value="2034">2034</option>
                        <option value="2035">2035</option>
                    </select>
                    <div class="mb-3">
                        <label for="formFile" class="form-label mt-5">Floor Plan: </label>
                        <input class="form-control" type="file" id="formFile" name="floor_plan" required />
                    </div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="clean_looking">
                    <label class="form-check-label" for="flexCheckDefault">
                        Actively looking for new provider?
                    </label>
                </div>

                <input type="submit" name="action" value="Remove Cleaning" class="btn btn-primary mt-3 mb-5" formnovalidate>
                <?php else: ?>
                <h1>CLEANING SERVICE:</h1>
                <?php if(!empty(old('sq_ft'))): ?>
                <input type="text" class="form-control mt-2" name="sq_ft" placeholder="Square Footage" value="<?php echo e(old('sq_ft')); ?>" required />
                <?php else: ?>
                <input type="text" class="form-control mt-2" name="sq_ft" placeholder="Square Footage" required />
                <?php endif; ?>

                <?php if(!empty(old('beds'))): ?>
                <input type="text" class="form-control mt-2" name="beds" placeholder="Number of bedrooms" value="<?php echo e(old('beds')); ?>" required />
                <?php else: ?>
                <input type="text" class="form-control mt-2" name="beds" placeholder="Number of bedrooms" required />
                <?php endif; ?>

                <?php if(!empty(old('baths'))): ?>
                <input type="text" class="form-control mt-2" name="baths" placeholder="Number of bathrooms" value="<?php echo e(old('baths')); ?>" required />
                <?php else: ?>
                <input type="text" class="form-control mt-2" name="baths" placeholder="Number of bathrooms" required />
                <?php endif; ?>
                <div class="mb-3">
                    <label for="formFile" class="form-label mt-5">Floor Plan: </label>
                    <input class="form-control" type="file" id="formFile" name="floor_plan" id="formFile" required />
                </div>

                <div class="form-group">

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="clean_looking">
                        <label class="form-check-label" for="flexCheckDefault">
                            No service, but looking for a provider?
                        </label>
                    </div>
                    <input type="submit" name="action" value="Add Cleaning" class="btn btn-primary mt-3 mb-5" formnovalidate>

                </div>
                <?php endif; ?>

                <?php if(Session::has('show_landscape')): ?>
                <h1>LANDSCAPING:</h1>
                <div class="form-group mt-3">
                    <?php if(!empty(old('land_cost'))): ?>
                    <input type="text" class="form-control" name="land_cost" placeholder="Cost" value="<?php echo e(old('land_cost')); ?>" required />
                    <?php else: ?>
                    <input type="text" class="form-control" name="land_cost" placeholder="Cost" required />
                    <?php endif; ?>

                    <?php if(!empty(old('land_sq_ft'))): ?>
                    <input type="text" class="form-control mt-2" name="land_sq_ft" placeholder="Square Footage" value="<?php echo e(old('land_sq_ft')); ?>" required />
                    <?php else: ?>
                    <input type="text" class="form-control mt-2" name="land_sq_ft" placeholder="Square Footage" required />
                    <?php endif; ?>
                    <div class="form-group">
                        <a href="https://www.measuremylawn.com/" target="_blank">If you are unsure of the square footage of your yard, please click here to find out.</a>
                    </div>


                    <label for="Month" class="form-label mt-2">Expiration Date (if applicable):</label>
                    <select class="form-select" aria-label="Default select example" name="land_month">
                        <option value="">Month</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                    <select class="form-select mt-1" aria-label="Default select example" name="land_year">
                        <option value="">Year</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                        <option value="2031">2031</option>
                        <option value="2032">2032</option>
                        <option value="2033">2033</option>
                        <option value="2034">2034</option>
                        <option value="2035">2035</option>
                    </select>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="land_looking">
                    <label class="form-check-label" for="flexCheckDefault">
                        Actively looking for new provider?
                    </label>
                </div>

                <input type="submit" name="action" value="Remove Land" class="btn btn-primary mt-3 mb-5" formnovalidate>
                <?php else: ?>
                <h1>LANDSCAPING:</h1>

                <?php if(!empty(old('land_sq_ft'))): ?>
                <input type="text" class="form-control mt-2" name="land_sq_ft" placeholder="Square Footage" value="<?php echo e(old('land_sq_ft')); ?>" required />
                <?php else: ?>
                <input type="text" class="form-control mt-2" name="land_sq_ft" placeholder="Square Footage" required />
                <?php endif; ?>
                <div class="form-group">
                    <a href="https://www.measuremylawn.com/" target="_blank">If you are unsure of the square footage of your yard, please click here to find out.</a>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="land_looking">
                        <label class="form-check-label" for="flexCheckDefault">
                            No service, but looking for a provider?
                        </label>
                    </div>
                    <input type="submit" name="action" value="Add Land" class="btn btn-primary mt-3 mb-5" formnovalidate>
                </div>
                <?php endif; ?>

                <?php if(Session::has('show_phone')): ?>
                <h1>PHONE SERVICE:</h1>
                <div class="form-group mt-3">
                    <?php if(!empty(old('phone_cost'))): ?>
                    <input type="text" class="form-control" name="phone_cost" placeholder="Monthly Payment" value="<?php echo e(old('phone_cost')); ?>" required />
                    <?php else: ?>
                    <input type="text" class="form-control" name="phone_cost" placeholder="Monthly Payment" required />
                    <?php endif; ?>

                    <?php if(!empty(old('num_phones'))): ?>
                    <input type="text" class="form-control mt-2" name="num_phones" placeholder="Total number of Phones" value="<?php echo e(old('num_phones')); ?>" required />
                    <?php else: ?>
                    <input type="text" class="form-control mt-2" name="num_phones" placeholder="Total number of Phones" required />
                    <?php endif; ?>

                    <?php if(!empty(old('num_service'))): ?>
                    <input type="text" class="form-control mt-2" name="num_service" placeholder="Number of phones with service" value="<?php echo e(old('num_service')); ?>" required />
                    <?php else: ?>
                    <input type="text" class="form-control mt-2" name="num_service" placeholder="Number of phones with service" required />
                    <?php endif; ?>
                </div>
                <label for="Month" class="form-label mt-2">Expiration Date (if applicable):</label>
                <select class="form-select" aria-label="Default select example" name="phone_month">
                    <option value="">Month</option>
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
                <select class="form-select mt-1" aria-label="Default select example" name="phone_year">
                    <option value="">Year</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                    <option value="2031">2031</option>
                    <option value="2032">2032</option>
                    <option value="2033">2033</option>
                    <option value="2034">2034</option>
                    <option value="2035">2035</option>
                </select>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="phone_looking">
                    <label class="form-check-label" for="flexCheckDefault">
                        Actively looking for new provider?
                    </label>
                </div>

                <input type="submit" name="action" value="Remove Phones" class="btn btn-primary mt-3 mb-5" formnovalidate>
                <?php else: ?>
                <h1>PHONE SERVICE:</h1>

                <?php if(!empty(old('num_phones'))): ?>
                <input type="text" class="form-control mt-2" name="num_phones" placeholder="Total number of Phones" value="<?php echo e(old('num_phones')); ?>" required />
                <?php else: ?>
                <input type="text" class="form-control mt-2" name="num_phones" placeholder="Total number of Phones" required />
                <?php endif; ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="looking" id="flexCheckDefault" name="phone_looking">
                    <label class="form-check-label" for="flexCheckDefault">
                        No service, but looking for a provider?
                    </label>
                </div>

                <input type="submit" name="action" value="Add Phones" class="btn btn-primary mt-3 mb-5" formnovalidate>

                <h1>Device Description:</h1>
                <div class="form-group">
                    <label for="devices">Device Description</label>
                    <textarea class="form-control" id="devices" name="devices" rows="3" placeholder="Please enter type and number of devices (i.e. 2 phones, 1 computer, 1 laptop, etc.)" ></textarea>
                </div>
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
<?php /**PATH C:\xampp\htdocs\icaretobymclenon\resources\views/register.blade.php ENDPATH**/ ?>