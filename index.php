<?php

# CRUD (Create, Read, Update, Delete)


include 'crud/contato.class.php';

$contato = new Contato();

# Create
// $contato->adicionar('teste2@suporte.com.br', 'teste2');
// $contato->adicionar('teste2@suporte.com.br');

// # Read
// $nome = $contato->getNome('teste@suporte.com.br');
// echo "Nome: ".$nome;
//
// $lista = $contato->getAll();
// print_r($lista);

// # Update
// $contato->editar('teste2', 'teste2@suporte.com.br');

// # Delete
// $excluir = $contato->excluir('teste2@suporte.com.br');
// if($excluir == true){
//     echo 'Foi excluido';
// } else {
//     echo 'Não foi excluido';
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - OO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
    <div class="h1 text-center my-5">Contatos</div>

        <table class="table text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $lista = $contato->getAll();
                foreach($lista as $item):
                ?>
                <tr>
                    <th scope="row"><?php echo $item['id']; ?></th>
                    <td><?php echo $item['nome']; ?></td>
                    <td><?php echo $item['email']; ?></td>
                    <td>
                        <button type="button" class="btn btn-dark btn-sm "><a href="acoes/editar.php?id=<?php echo $item['id']; ?>" style="text-decoration:none; color:#FFF">EDITAR</a></button>
                        <button type="button" class="btn btn-dark btn-sm "><a href="acoes/excluir.php?id=<?php echo $item['id']; ?>" style="text-decoration:none; color:#FFF">EXCLUIR</a></button>
                        <button type="button" class="btn btn-dark btn-sm "><a href="acoes/desativar.php?id=<?php echo $item['id']; ?>" style="text-decoration:none; color:#FFF">DESATIVAR</a></button>
                    </td>
                </tr>
                <?php endforeach?>
                <tr class="table-dark">
                    <td colspan="4"><a href="acoes/adicionar.php">Adicionar novo contato</a></td>
                </tr>
            </tbody>
        </table>

        <br><br><br>
        <div class="h4 text-center">Contatos desativados</div>

        <table class="table table-sm text-center">
            
            <tbody>
                <?php
                $lista = $contato->getAllDesativados();
                foreach($lista as $item):
                ?>
                <tr class="">
                    <td><?php echo $item['nome']; ?></td>
                    <td><?php echo $item['email']; ?></td>
                    <td>
                        <button type="button" class="btn btn-dark btn-sm "><a href="acoes/ativar.php?id=<?php echo $item['id']; ?>" style="text-decoration:none; color:#FFF">ATIVAR</a></button>
                    </td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
        <br><br><br>
    </div>
</body>
</html>