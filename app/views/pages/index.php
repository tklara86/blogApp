<?php require APPROOT . '/views/inc/header.php'; ?>
<ul>
  <?php foreach ($data['posts'] as $post) { ?>
    <li><?php echo $post->title ?></li>
  <?php } ?>
</ul>

<?php require APPROOT . '/views/inc/footer.php'; ?>