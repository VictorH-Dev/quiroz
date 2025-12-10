<?php
// Exemplo de Script PHP para Processar o Formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['nome'];
  $assunto = $_POST['assunto'];
  $mensagem = $_POST['mensagem'];
  $email = $_POST['email'];

  // Processamento dos dados aqui
  // Por exemplo, salvar em um banco de dados ou enviar um email
}
?>