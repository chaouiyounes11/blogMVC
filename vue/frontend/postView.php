<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
    <a href="index.php">Back to posts</a>
    <section>


    <article>
      <h3><?= htmlspecialchars($post['title']); ?></h3>
      <img src="<?=$post['images']; ?>" alt="<?=$post['alt'];?>">
      <p><?= htmlspecialchars($post['content']);?></p>
      <em>Créé le : <?= $post['date_creation_fr'];?></em>

      <h4>Comments</h4>

      <form class="" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">

          <div class="">
          <label for="author">Votre pseudo</label><br>
          <input type="text" name="author" value="" placeholder="Votre pseudo">
          </div>
          <div class="">
          <label for="comment">Votre commentaire</label>

            <textarea name="comment" id="comment" rows="8" cols="30" placeholder="Votre message"></textarea>

          </div>
          <input type="submit" name="" value="Validez !">


      </form>

      <?php

      while($comment = $comments-> fetch()) {
        ?>
        <strong><?= htmlspecialchars($comment['author']);  ?></strong>
        <p><?= htmlspecialchars($comment['comment']); ?></p>

        <?php
        }
        ?>
        </article>
        </section>
        <?php $content = ob_get_clean(); ?>

        <?php require('template.php'); ?>
