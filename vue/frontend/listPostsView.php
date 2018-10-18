<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <section>
<?php
    while ($data = $posts->fetch())

    {
    ?>



    <article>
      <h3><?= htmlspecialchars($data['title']); ?></h3>
      <img src="<?= $data['images']?>" alt="<?= $data['alt'] ?>">
      <p><?= htmlspecialchars($data['content']); ?></p>
      <a href="index.php?action=post&amp;id=<?= $data['id']; ?>">Link to comments</a><br>
      <em>Créé le : <?= $data['date_creation_fr'];?></em>
    </article>

    <?php
  }
  $posts->closeCursor();
  ?>

  <?php $content = ob_get_clean(); ?>
</section>
  <?php require('template.php'); ?>
