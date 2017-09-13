    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card card-block mt-5">
                <form method="post" action="<?php echo route('signup') ;?>">
                    <?php input_field('username', false, 'Username', @$errors, true, ['danger', 'success']);?>
                    <?php input_field('email', false, 'Email', @$errors, true, ['danger', 'success']);?>
                    <?php input_field('password', false, 'Password', @$errors, false, ['danger']);?>
                    <?php input_field('repassword', false, 'Password Again', @$errors, false, ['danger']);?>
                    <?php csrf_generate(); ?>
                    <div class="col">
                        <button class="btn btn-primary col mb-3">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>