<?php

// FUNCTION  FOR GETTING ALL POSTS IN DATA BASE

function getPosts (){

  $bdd = dbConnect();
  $req = $bdd->query('SELECT id, title, images, alt, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr
  FROM posts ORDER BY date_creation DESC LIMIT 0, 5');

return $req;
}


function getPost($postId)

{

    $bdd = dbConnect();
    $req = $bdd->prepare('SELECT id, title, images, alt, content, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr
                          FROM posts WHERE id = ? ORDER BY date_creation DESC LIMIT 0, 5');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;

}

function getComments($postId)
{
    $bdd = dbConnect();
    $comments = $bdd->prepare('SELECT id, author, comment FROM comments WHERE id_post = ?');
    $comments->execute(array($postId));
    return $comments;

}

function postComment($postId, $author, $comment)
{
    $bdd = dbConnect();
    $comments = $bdd->prepare('INSERT INTO comments(id_post, author, comment) VALUES(?, ?, ?)');
    $affectedLines = $comments->execute(array($postId, $author, $comment));

    return $affectedLines;
}






function dbConnect () {
  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=blogMVC;charset=utf8', 'root', 'Younes0802');
      return $bdd;
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
