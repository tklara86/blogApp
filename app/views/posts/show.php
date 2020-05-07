<!-- HEADER -->
<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="uk-container uk-container-xsmall uk-margin-medium-top">
  <a href="<?php echo URLROOT; ?>posts" class="uk-margin uk-button uk-button-primary uk-button-large">Back</a>
</div>

<div class="uk-container uk-container-xsmall uk-margin-medium-top">

  <article class="uk-article">

    <h1 class="uk-article-title"><?php echo $data['post']['title']; ?></h1>
    <p class="uk-article-meta">Written by <?php echo $data['user']['name']; ?> on <?php echo $data['post']['created_at']; ?></p>
    <p><?php echo $data['post']['body']; ?></p>

    <?php if ($data['post']['user_id'] == $_SESSION['user_id']) { ?>
      <hr>
      <a href="<?php echo URLROOT; ?>posts/edit/<?php echo $data['post']['id']; ?>" class="uk-margin uk-button uk-button-primary uk-button-large">Edit</a>
      <form action="<?php echo URLROOT; ?>posts/delete/<?php echo $data['post']['id']; ?>" method="post">
        <input type="submit" value="Delete" class="uk-margin uk-button uk-button-danger uk-button-large">

      </form>
    <?php } ?>
  </article>

</div>
<!-- FOOTER -->
<?php require APPROOT . '/views/inc/footer.php'; ?>