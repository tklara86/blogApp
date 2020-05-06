<!-- HEADER -->
<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="uk-container uk-container-xsmall uk-margin-medium-top uk-background-muted uk-padding-large">
  <h1>Login</h1>
  <p>Please fill in your credentials to login</p>
  <form class="uk-form-stacked" action="<?php echo URLROOT; ?>/users/login" method="post">
    <!-- EMAIL -->
    <div class="uk-margin">
      <label class="uk-form-label" for="email">Email:</label>
      <div class="uk-form-controls">
        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
          <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?php echo $data['email_error']; ?></p>
          </div>
        <?php } ?>
        <input class="uk-input uk-form-large <?php echo (!empty($data['email_error'])) ? 'uk-form-danger' : ''; ?>" name="email" type="email" placeholder="Email" value="<?php echo $data['email']; ?>">
      </div>

    </div>

    <!-- PASSWORD -->
    <div class="uk-margin">
      <label class="uk-form-label" for="password">Password:</label>
      <div class="uk-form-controls">
        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
          <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?php echo $data['password_error']; ?></p>
          </div>
        <?php } ?>
        <input class="uk-input uk-form-large <?php echo (!empty($data['password_error'])) ? 'uk-form-danger' : ''; ?>" name="password" type="password" placeholder="Password" value="<?php echo $data['password']; ?>">
      </div>

    </div>


    <input type="submit" value="Login" class="uk-margin uk-button uk-button-primary uk-button-large">
    <a href="<?php echo URLROOT; ?>/users/register" class="uk-margin uk-button uk-button-large">No account? Register</a>


</div>
</form>
</div>
<!-- FOOTER -->
<?php require APPROOT . '/views/inc/footer.php'; ?>