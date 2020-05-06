<!-- HEADER -->
<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="uk-container uk-container-xsmall uk-margin-medium-top uk-background-muted uk-padding-large">
  <h1>Create An Account</h1>
  <p>Please fill out this form to register with us</p>
  <form class="uk-form-stacked" action="<?php echo URLROOT; ?>/users/register" method="post">
    <!-- NAME -->
    <div class="uk-margin">
      <label class="uk-form-label" for="name">Name:</label>
      <div class="uk-form-controls">
        <?php if (!empty($data['name_error'])) { ?>
          <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?php echo $data['name_error']; ?></p>
          </div>
        <?php } ?>
        <input class="uk-input uk-form-large <?php echo (!empty($data['name_error'])) ? 'uk-form-danger' : ''; ?>" name="name" type="text" placeholder="Name" value="<?php echo $data['name']; ?>">

      </div>

      <!-- EMAIL -->
      <div class="uk-margin">
        <label class="uk-form-label" for="email">Email:</label>
        <div class="uk-form-controls">
          <?php if (!empty($data['email_error'])) { ?>
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
          <?php if (!empty($data['password_error'])) { ?>
            <div class="uk-alert-danger" uk-alert>
              <a class="uk-alert-close" uk-close></a>
              <p><?php echo $data['password_error']; ?></p>
            </div>
          <?php } ?>
          <input class="uk-input uk-form-large <?php echo (!empty($data['password_error'])) ? 'uk-form-danger' : ''; ?>" name="password" type="password" placeholder="Password" value="<?php echo $data['password']; ?>">
        </div>

      </div>


      <!-- CONFIRM PASSWORD -->
      <div class="uk-margin">
        <label class="uk-form-label" for="confirm_password">Confirm password:</label>
        <div class="uk-form-controls">
          <?php if (!empty($data['confirm_password_error'])) { ?>
            <div class="uk-alert-danger" uk-alert>
              <a class="uk-alert-close" uk-close></a>
              <p><?php echo $data['confirm_password_error']; ?></p>
            </div>
          <?php } ?>
          <input class="uk-input uk-form-large <?php echo (!empty($data['confirm_password_error'])) ? 'uk-form-danger' : ''; ?>" name="confirm_password" type="password" placeholder="Confirm password" value="<?php echo $data['confirm_password']; ?>">
        </div>

      </div>

      <input type="submit" value="Register" class="uk-margin uk-button uk-button-primary uk-button-large">
      <a href="<?php echo URLROOT; ?>/users/login" class="uk-margin uk-button uk-button-large">Have an account? Login</a>


    </div>
  </form>
</div>
<!-- FOOTER -->
<?php require APPROOT . '/views/inc/footer.php'; ?>