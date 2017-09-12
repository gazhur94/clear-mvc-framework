    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-4">
            <div class="card card-block">
                <form method="post" action="<?php echo route('signup') ;?>">
<?php input_field('username', false, 'Username', 5, @$errors, true, ['danger', 'success']);?>
<?php input_field('email', false, 'Email', 5, @$errors, true, ['danger', 'success']);?>
<?php input_field('password', false, 'Password', 5, @$errors, false, ['danger']);?>
<?php input_field('repassword', false, 'Password Again', 5, @$errors, false, ['danger']);?>
                    <?php csrf_generate(); ?>

                    <div class="col">
                        <input type="submit" name="signup" class="btn btn-success col mb-3" value="Sign Up">
                    </div>
                    <div class="col">
                        <a href="<?php echo route('signin');?>" class="btn btn-primary col">Sing In</a>
                    </div>
                </form>
            </div>
        </div>
    </div>