<nav class="uk-navbar-container uk-navbar-container-small" uk-navbar>
  <div class="uk-navbar-right">

    <ul class="uk-navbar-nav">
      <li><a href="<?php echo URLROOT; ?>">Home</a></li>
      <li><a href="<?php echo URLROOT; ?>pages/about">About</a></li>
      <li>
        <a href="#"><span class="uk-margin-small-right" uk-icon="user"></span>Account</a>
        <div class="uk-navbar-dropdown">
          <ul class="uk-nav uk-navbar-dropdown-nav">
            <li><a href="<?php echo URLROOT; ?>users/login">Login</a></li>
            <li><a href="<?php echo URLROOT; ?>users/register">Register</a></li>
          </ul>
        </div>
      </li>
    </ul>

  </div>
</nav>