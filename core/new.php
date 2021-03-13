<?php

if(isset($_POST['new'])) {

  session_start();

  $error = '';

  if(isset($_POST['title']) && !empty(trim($_POST['title']))) $title = trim($_POST['title']);
  else $error = 'Please, enter title!';

  if(isset($_POST['description']) && !empty(trim($_POST['description']))) $description = trim($_POST['description']);
  else $error = 'Please, enter description!';

  if(isset($_POST['category']) && !empty(trim($_POST['category']))) $category = trim($_POST['category']);
  else $error = 'Please, choose category!';

  if(isset($_FILES['photo'])) $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
  else $error = 'Please, add photo!';

  if(isset($_POST['date']) && !empty(trim($_POST['date']))) $date = trim($_POST['date']);
  else $error = 'Please, choose date!';

  $author = $_SESSION['login'];

  if(empty($error)) {

    require_once 'connect.php';

    $resp = $pdo->query("INSERT INTO `applications` (`id`, `title`, `description`, `category`, `date`, `photo`, `author`, `status`) VALUES (NULL, '$title', '$description', '$category', '$date', '$photo', '$author', 'new')");

    if($resp) {
      $_SESSION['new_error'] = '';
      header('Location: ' . 'http://wsrq/');
    } else $error = 'Something went wrong!';

  }

  if(!empty($error)) {
    $_SESSION['new_error'] = $error;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }


}


?>
