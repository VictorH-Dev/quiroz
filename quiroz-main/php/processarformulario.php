<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";
$dbname = "Agenda"; 
// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

// Função para limpar os dados do usuário
function limpar_dado($dado) {
  $dado = trim($dado);
  $dado = stripslashes($dado);
  $dado = htmlspecialchars($dado);
  return $dado;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // coletar valores do formulário e limpar os dados
    $nome = limpar_dado($_POST['nome']);
    $telefone = limpar_dado($_POST['telefone']);
    $servico = limpar_dado($_POST['servico']);
    $doutor = limpar_dado($_POST['doutor']);
    $data = limpar_dado($_POST['data']); // Certifique-se de que esses campos existam no seu formulário
  
    // preparar e executar a consulta SQL
    $sql = "INSERT INTO Consultas (nome, telefone, servico, doutor, data) VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nome, $telefone, $servico, $doutor, $data);
    
    if ($stmt->execute()) {
      echo "Novo registro criado com sucesso";
    } else {
      echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    
    $stmt->close();
}
  
$conn->close();
?>