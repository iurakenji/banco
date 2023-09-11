<?php
error_reporting(E_ALL ^ E_NOTICE);
$dir = getcwd();
require_once $dir . '\controller\ValidAuth.php';


if ($_POST){
  if (isset($_FILES["fileToUpload"]["name"])) {
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "Imagem válida - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "Aqruivo inválido.";
    $uploadOk = 0;
  }
}
/*
// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}*/

if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Tamanho máximo do arquivo excedido.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Somente arquivos nos formatos JPG, JPEG, PNG & GIF são permitidos.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Erro ao carregar imagem.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "Imagem ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " carregada com sucesso.";
  } else {
    echo "Erro ao carregar arquivo.";
  }
}
}
}
require_once 'controller/PessoaController.php';
?>