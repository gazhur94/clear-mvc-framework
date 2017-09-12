<div class="row h-100 justify-content-center align-items-center">
    <div class="col-4">
        <div class="card card-block">
            <form method="post" action="<?php echo route('signin') ;?>">
<?php echo @$errors['attempt'];?>
<?php input_field('login', false, 'Username', 4, @$errors, true, ['danger']);?>
<?php input_field('password', false, 'Password', 4, @$errors, true, ['danger']);?>

                <div class="col mb-3">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Remember me</span>
                    </label>
                </div>
                <div class="col">
                    <button class="btn btn-success col mb-3">Sing In</button>
                </div>
                <div class="col">
                    <a href="<?php echo route('signup');?>" class="btn btn-primary col">Sing up</a>
                </div>
            </form>
        </div>
    </div>
</div>