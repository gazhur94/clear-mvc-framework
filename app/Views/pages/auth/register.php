    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card card-block mt-5">
                <form method="post" action="<?php echo route('signup') ;?>">
                    <?php input_field('username', 'text', false, 'Username', @$errors, true, ['danger', 'success']);?>
                    <?php input_field('email', 'text', false, 'Email', @$errors, true, ['danger', 'success']);?>
                    <?php input_field('password', 'password', false, 'Password', @$errors, false, ['danger']);?>
                    <?php input_field('repassword', 'password', false, 'Password Again', @$errors, false, ['danger']);?>
                    <?php csrf_generate(); ?>
                    <div class="col">
                        <button class="btn btn-success col mb-3">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>