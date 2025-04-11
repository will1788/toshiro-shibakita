<html>

  <head>
    <title>Exemplo PHP</title>
  </head>

  <body>

    <?php
      ini_set("display_errors", 1);
      header('Content-Type: text/html; charset=iso-8859-1');



      echo 'Versao Atual do PHP: ' . phpversion() . '<br>';

      // Modificação para usar variáveis de ambiente

      $servername = getenv('DB_HOST') ?: 'localhost';
      $username = getenv('DB_USER') ?: 'root';
      $password = getenv('DB_PASSWORD') ?: 'Senha123';
      $database = getenv('DB_NAME') ?: 'meubanco';

      // Criar conexão


      $link = new mysqli($servername, $username, $password, $database);

      /* check connection */
      if ($link->connect_error) { // Sugestão de versão mais fácil ler
        die("Falha na conexão: " . $link->connect_error);
      }

      $valor_rand1 =  rand(1, 999);
      $valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 1));
      $host_name = gethostname();

      /* Atualização dos nomes segundo as informações alteradas no banco.sql */
      $query = "INSERT INTO dados (CaixaID, NomeCaixa, Operador, Localizacao, Setor, Host) VALUES ('$valor_rand1' , '$valor_rand2', '$valor_rand2', '$valor_rand2', '$valor_rand2','$host_name')";


      if ($link->query($query) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $link->error;
      }

    ?>
  </body>
</html>
