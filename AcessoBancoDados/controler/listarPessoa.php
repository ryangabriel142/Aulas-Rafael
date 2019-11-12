<?php
  include("../model/Pessoa.php");
  $listarPessoa = new Pessoa();
  //$listarPessoa->listar();
  $retornoDados = $listarPessoa->listar();

  echo "Foram encontrados " . count($retornoDados) . " registros.";//verifica quantos registros tem no vetor
  if (count($retornoDados) > 0){
    ?>
    <table border=1>
      <tr>
        <td>Id</td>
        <td>Nome</td>
        <td>E-mail</td>
        <td> Data Nascimento </td>
        <td> Data Cadastro </td>
      </tr>
      <?php
      foreach ($retornoDados as $key => $value) {
        echo "<tr><td>" . $value["id"];
        echo "</td><td>" . $value["nome"];
        echo "</td><td>" . $value["email"];
        echo "</td><td>" . $value["dataNascimento"];
        echo "</td><td>" . $value["dataCadastro"];
        echo "</td></tr>";
      }
      ?>
    </table>
    <?php
  }
?>
