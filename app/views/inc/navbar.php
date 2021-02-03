<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo URLROOT ?>"><?php echo SITENAME ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link" href="<?php echo URLROOT ?>">Home </a>
            <a class="nav-link" href="<?php echo URLROOT ?>/pages/about">About</a>
        </div>
        <?php if (isset($_SESSION['user_id'])) : ?>
        <div class="navbar-nav ml-auto">
            <a class="nav-link" href="<?php echo URLROOT ?>/game/balance">My Balance</a>
            <a class="nav-link" href="<?php echo URLROOT ?>/game/gameplay">Let's Play!</a>
            <a class="nav-link" href="<?php echo URLROOT ?>/users/logout">Logout</a>
        </div>
        <?php else : ?>
        <div class="navbar-nav ml-auto">
            <a class="nav-link" href="<?php echo URLROOT ?>/users/register">Register</a>
            <a class="nav-link" href="<?php echo URLROOT ?>/users/login">Login</a>
        </div>
        <?php endif; ?>
    </div>
</nav>