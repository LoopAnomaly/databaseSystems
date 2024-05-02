<!DOCTYPE html>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link href="css/stylesheet.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title></title>
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

                    <form class="form d-flex" method="get" action="<?php echo e(route('UpdateInfoPage')); ?>" accept-charset="UTF-8">

                        <?php echo e(csrf_field()); ?>


                        <div class="align-middle">
                            <button type="submit" class="btn btn-primary ms-5 pt-1" style="margin-top: 33px">Update Information</button>
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
        <div class="row container-fluid">
            <?php if(Session::has('matches')): ?>
            <table class="table mt-5" style='background-color: whitesmoke'>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Service</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Has Contract</th>
                        <th scope="col">Notify</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $matches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row" class="table-active"><?php echo e($match->service_type); ?></th>
                        <td class="table-active"><?php echo e($match->name); ?></td>
                        <td class="table-active"><?php echo e($match->service_cost); ?></td>
                        <td class="table-active"><?php echo e(($match->has_contract == 0) ? "No" : "Yes"); ?></td>
                        <?php if(Session::has('button_' . $loop->iteration)): ?>
                        <td class="table-active"><a class="btn btn-success disabled" href="http://localhost/icaretobymclenon/public/dashboard/<?=$match->name?>/<?=$match->service_type?>/<?=$match->has_contract?>/<?=$loop->iteration?>" role="button">Business Notified</a></td>
                        <?php else: ?>
                        <td class="table-active"><a class="btn btn-success " href="http://localhost/icaretobymclenon/public/dashboard/<?=$match->name?>/<?=$match->service_type?>/<?=$match->has_contract?>/<?=$loop->iteration?>" role="button">I'm Interested</a></td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php else: ?>
            <h1 class="text-center mt-5">You currently have no new notifications. <br> Make sure your service preferences are up to date.</h1>
            <?php endif; ?>
            <div class="col-6 offset-3">
                <form class="form d-flex" method="get" action="<?php echo e(route('Preferences')); ?>" accept-charset="UTF-8">

                    <?php echo e(csrf_field()); ?>


                    <div class="align-middle col-12">
                        <button type="submit" class="btn btn-primary pt-1 col-12" style="margin-top: 33px">Preferences</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\icaretobymclenon\resources\views/cust_dashboard.blade.php ENDPATH**/ ?>