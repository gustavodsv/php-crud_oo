<?php
    include '../CRUD/contato.class.php';
    $contato = new Contato();

    if(!empty($_GET['id'])) {
        $id = $_GET['id'];

        $info = $contato->getInfo($id);

        if(empty($info['email'])){
            header("Location: ../index.php");
            exit;
        }
    } else { 
        header("Location: ../index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contato</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.(3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <div class="h1 text-center my-4">Alterar nome cadastrado</div>           

        <?php 
            if(!empty($_POST['id']) && isset($_POST['check'])){
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                 
                $contato->editar($nome, $id);
                ?>
                    <div class="container">
                        <div class="alert alert-success mb-3" role="alert">
                            Nome de usuário alterado com sucesso! <b><?php echo $nome; ?></b>. 
                        </div>
                    </div>
                <?php
            }
        ?>

        <form method="POST" >
            <input type="hidden" name="id" value="<?php echo $info['id']; ?>">

            <div class="form-group">
                <label for="exampleInputPassword1">Nome</label>
                <input type="text" class="form-control" name="nome" value="<?php echo $info['nome']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Endereço de email</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="<?php echo $info['email']; ?>" disabled>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="check">
                <label class="form-check-label" for="exampleCheck1">Clique em mim</label>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a type="submit" class="btn btn-secondary ml-1" href="../index.php" style="color:#FFF;">Voltar para a lista</a>
        </form>
    </div>
</body>
</html>

