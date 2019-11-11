<?php
class Pessoa{
  private $nome, $email, $dataNascimento;
  public function setDataNascimento($dataNascimento){
    $this->dataNascimento = $dataNascimento;
  }
  public function getdataNascimento(){
    return $this->dataNascimento;
}
  public function setNome($nome){
    $this->nome = $nome;
  }
  public function setEmail($email){
    $this->email = $email;
  }
  public function getNome(){
    return $this->nome;
  }
  public function getEmail(){
    return $this->email;
  }
  public function cadastrar($nome, $email, $dataNascimento){
    $this->setNome($nome);
    $this->setEmail($email);
    $this->setDataNascimento($dataNascimento);
    //query de consulta para inclusão
    echo $sqlInsert = "insert into pessoa
    (nome, email,dataNascimento)
    values
    ('{$this->getNome()}','{$this->getEmail()}','{$this->getDataNascimento()}')";
    //executar a query
    include("Conexao.php");

    $conectar = new Conexao();

    if($retornoInsert = $conectar->getConectar()->query($sqlInsert)){
      return 1;//retorna 1 caso seja gravado
    }else {
      return 0;//retorna 0 caso não seja gravado
    }
  }
  public function listar(){
    $lista = "select * from pessoa";
    include ("Conexao.php");
    $objetoListar = new Conexao();

    $retornoBanco = $objetoListar->getConectar()->query($lista);
    $dados = array();

    while($temp = $retornoBanco->fetch_array()) {
      $dados[]=$temp;
    }
    echo "Foram encontrados " . count($dados) . " registros.";//verifica quantos registros tem no vetor
    if (count($dados) > 0){
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
        foreach ($dados as $key => $value) {
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
  }
}
?>
