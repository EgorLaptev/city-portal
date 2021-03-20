<?php

if(isset($_POST['new'])) {

  session_start();

  $error = '';

  $allowed_types = ['image/jpg', 'image/jpeg', 'image/png', 'image/bmp'];
  $author = $_SESSION['login'];

  if(isset($_POST['title']) && !empty(trim($_POST['title']))) $title = trim($_POST['title']);
  else $error = 'Please, enter title!';

  if(isset($_POST['description']) && !empty(trim($_POST['description']))) $description = trim($_POST['description']);
  else $error = 'Please, enter description!';

  if(isset($_POST['category']) && !empty(trim($_POST['category']))) $category = trim($_POST['category']);
  else $error = 'Please, choose category!';

  if(isset($_FILES['photo'])) $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
  else $error = 'Please, add photo!';

  if(isset($_FILES['photo']) && (!in_array($_FILES['photo']['type'], $allowed_types))) $error = 'Allowed formats: ' . implode(', ', $allowed_types);

  if(isset($_FILES['photo']) && filesize($_FILES['photo']['tmp_name']) > (1024*1024*10)) $error = 'Your photo is very large!';

  if(isset($_POST['date']) && !empty(trim($_POST['date']))) $date = trim($_POST['date']);
  else $error = 'Please, choose date!';

  if(empty($error)) {



    require_once 'connect.php';

    $resp = $pdo->query("INSERT INTO `applications` (`id`, `title`, `description`, `category`, `date`, `photo`, `author`, `status`) VALUES (NULL, '$title', '$description', '$category', '$date', '$photo', '$author', '0')");

    if($resp) {
      $_SESSION['new_error'] = '';
      header('Location: ' . 'http://city-portal/');
    } else $error = 'Something went wrong!';

  }

  if(!empty($error)) {
    $_SESSION['new_error'] = $error;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }


}


?>
