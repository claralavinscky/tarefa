<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa::Inserir</title>
    <?php 
    include "referencias.php";
   ?>
</head>
<body>

    <?php 
    // operação de insert
    // 1° passo: capturar cada registro que deve ser inserido na tabela
    // insert into() values()
        
    $descricao = $_POST["txtDescricao"];
    $data_entrega = $_POST["txtData"];
    $prioridade = $_POST["txtPrioridade"];
    $responsavel = $_POST["txtResponsavel"];
    
    //2° preparar o comando SQL que será executado
    // criamos uma variavél e passamos os parametros como (?)
    // cada parametro ficará com interrogação (?)
    $sql = "INSERT INTO tarefa(descricao,data_entrega,prioridade,responsavel) VALUES(?,?,?,?)" ;
    //3°VINCULAR ONDE O COMANDO SQL SERA EXECUTADO 
    $comando = $conexao->prepare($sql);
    //4° associar cada(?) com seus valores respectivos
    $comando->bind_param("ssss",$descricao,$data_entrega,$prioridade,$responsavel);
    //5° executar comando na conexão de dados 
    if ($comando->execute())
    {
        echo "<h1>tarefa marcada!</h1>";
    }
    else{
        echo"<h1>Erro! Confira os dados! </h1>";
    }

    ?>
</body>
</html>