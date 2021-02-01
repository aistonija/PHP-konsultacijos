<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URLROOT ?>"><?php echo SITENAME ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT ?>">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (is_logged_in()) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT ?>/game.php">Play!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT ?>/add.php">My Balance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT ?>/logout.php">Logout</a>
                </li>
                <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT ?>/register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT ?>/login.php">Login</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>