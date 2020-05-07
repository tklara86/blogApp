<!-- HEADER -->
<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="uk-container uk-container-xsmall uk-margin-medium-top">
  <a href="<?php echo URLROOT; ?>posts" class="uk-margin uk-button uk-button-primary uk-button-large">Back</a>
</div>
<div class="uk-container uk-container-xsmall uk-margin-medium-top uk-background-muted uk-padding-large">

  <h1>Add Post</h1>
  <p>Create a new post</p>
  <form class="uk-form-stacked" action="<?php echo URLROOT; ?>/posts/add" method="post">
    <!-- Title -->
    <div class="uk-margin">
      <label class="uk-form-label" for="title">Title:</label>
      <div class="uk-form-controls">
        <?php if (!empty($data['title_error'])) { ?>
          <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?php echo $data['title_error']; ?></p>
          </div>
        <?php } ?>
        <input class="uk-input uk-form-large <?php echo (!empty($data['title_error'])) ? 'uk-form-danger' : ''; ?>" name="title" type="text" placeholder="Title" value="<?php echo $data['title']; ?>">
      </div>

    </div>

    <!-- Body -->
    <div class="uk-margin">
      <label class="uk-form-label" for="password">Body:</label>
      <div class="uk-form-controls">
        <?php if (!empty($data['body_error'])) { ?>
          <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?php echo $data['body_error']; ?></p>
          </div>
        <?php } ?>
        <textarea class="uk-textarea <?php echo (!empty($data['password_error'])) ? 'uk-form-danger' : ''; ?>" name="body" rows="5" type="textarea" placeholder="Body"><?php echo $data['body']; ?></textarea>
      </div>

    </div>


    <input type="submit" value="Submit" class="uk-margin uk-button uk-button-primary uk-button-large">


</div>
</form>
</div>
<!-- FOOTER -->
<?php require APPROOT . '/views/inc/footer.php'; ?>