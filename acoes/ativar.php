<?php
include '../CRUD/contato.class.php';
$contato = new Contato();

if(!empty($_GET['id'])){
    $id = $_GET['id'];

    $contato->ativarStatus($id);
}

header("Location: ../index.php");