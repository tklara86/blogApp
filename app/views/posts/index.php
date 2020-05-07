<!-- HEADER -->
<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="uk-container uk-container-xsmall uk-margin-medium-top">
  <?php flash('post_message'); ?>
  <a href="<?php echo URLROOT; ?>posts/add" class="uk-margin uk-button uk-button-primary uk-button-large"><span class="uk-margin-small-right" uk-icon="file-edit"></span>Add Post</a>
  <h1>Posts</h1>
  <hr>
  <?php foreach ($data['posts'] as $post) { ?>

    <article class="uk-article">

      <h1 class="uk-article-title"><a class="uk-link-reset" href="<?php URLROOT; ?>posts/show/<?php echo $post['post_id']; ?>"><?php echo $post['title']; ?></a></h1>

      <p class="uk-article-meta">Written by <?php echo $post['name']; ?>. Created on <?php echo $post['created_at']; ?></p>

      <p><?php echo $post['body']; ?></p>

      <div class="uk-grid-small uk-child-width-auto" uk-grid>
        <div>
          <a class="uk-button uk-button-text" href="<?php URLROOT; ?>posts/show/<?php echo $post['post_id']; ?>">Read more</a>
        </div>
      </div>

    </article>
  <?php } ?>
</div>

<!-- FOOTER -->
<?php require APPROOT . '/views/inc/footer.php'; ?>