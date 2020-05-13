<nav class="uk-navbar-container uk-navbar-container-small" uk-navbar>

  <div class="uk-navbar-left">
    <ul class="uk-navbar-nav">
      <li><a href="<?php echo URLROOT; ?>">Home</a></li>
      <li><a href="<?php echo URLROOT; ?>pages/about">About</a></li>
    </ul>
  </div>
  <div class="uk-navbar-right">

    <ul class="uk-navbar-nav">
      <?php if (isset($_SESSION['user_id'])) { ?>
        <?php
        $user_name = explode(' ', $_SESSION['user_name']);
        $user_first_name = $user_name[0];

        $email = $_SESSION['user_email'];
        $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email)))

        ?>

        <li><a href="#">Welcome back, <?php echo $user_name[0]; ?></a></li>
        <div class="avatar_img" style="display: flex; align-items: center;">
          <img class="uk-border-circle" width="40" height="40" src="<?php echo  $grav_url; ?>">
        </div>
      <?php } ?>

      <li>
        <?php if (isset($_SESSION['user_id'])) { ?>
          <a href="<?php echo URLROOT; ?>users/logout"><span class="uk-margin-small-right" uk-icon="sign-out"></span>Log Out</a>
        <?php } else { ?>
          <a href="#"><span class="uk-margin-small-right" uk-icon="user"></span>Account</a>
          <div class="uk-navbar-dropdown">
            <ul class="uk-nav uk-navbar-dropdown-nav">
              <li><a href="<?php echo URLROOT; ?>users/login">Login</a></li>
              <li><a href="<?php echo URLROOT; ?>users/register">Register</a></li>
            </ul>
          </div>

        <?php } ?>

      </li>
    </ul>

  </div>
</nav>