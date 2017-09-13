<header class="mb-3">
    <div class="container">
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="<?php echo route('home');?>"><?php echo $appName;?></a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <?php if ($isLoggedIn):?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $username;?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?php echo route('signout');?>">Sign Out</a>
                        </div>
                    </li>
                    <?php else:?>
                    <li class="nav-item">
                        <a class="btn btn-success" href="<?php echo route('signup');?>">Sing Up</a>
                    </li>
                    <li class="nav-item ml-3">
                        <a class="btn btn-outline-primary" href="<?php echo route('signin');?>">Sing In</a>
                    </li>
                    <?php endif;?>
                </ul>
            </div>
        </nav>
    </div>
</header>