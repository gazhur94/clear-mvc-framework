<div class="row justify-content-center">
    <div class="col-4">
        <div class="card card-block mt-5">
            <form method="post" action="<?php echo route('signin') ;?>">
                <?php echo @$errors['attempt'];?>
                <?php input_field('login','text', false, 'Username', @$errors, true, ['danger']);?>
                <?php input_field('password', 'password', false, 'Password', @$errors, true, ['danger']);?>
                <div class="col mb-3">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Remember me</span>
                    </label>
                </div>
                <?php csrf_generate(); ?>
                <div class="col">
                    <button class="btn btn-primary col mb-3">Sign In</button>
                </div>
            </form>
        </div>
    </div>
</div>