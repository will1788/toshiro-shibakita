#   Docker e Microsserviços – Exemplo Prático

##   Créditos

Este projeto foi originalmente concebido por Denilson Bonatti, Instrutor da DIO. A presente versão expande e adapta o trabalho original para uma utilização genérica e mais flexível, focada no entendimento prático de microsserviços com Docker.

##   Introdução

O conceito de containers, e o Docker em particular, revolucionou o desenvolvimento de software, especialmente no contexto de microsserviços. Este projeto visa demonstrar a aplicação prática do Docker em um cenário de microsserviços, com foco em exemplos práticos e aplicáveis ao dia a dia. A intenção é fornecer uma base sólida para o entendimento e a utilização do ambiente, sem a necessidade de uma infraestrutura específica como a AWS, como era o foco original.

##   Descrição do Projeto

Este projeto demonstra uma estrutura simplificada de microsserviços utilizando Docker. Ele foi desenvolvido para facilitar o entendimento e a utilização genérica do ambiente. O projeto contém os seguintes componentes:

<div style="background-color: #1e293b; padding: 16px; border-radius: 8px; margin-bottom: 16px; border: 1px solid #334155;">
    <h3 style="color: #94a3b8; margin-bottom: 8px;"> Banco de Dados e Tabela (<code>banco.sql</code>) </h3>
    <p style="color: #d1d5db;">
        Define uma tabela <code>dados</code> com colunas para registrar informações de um "caixa". A tabela utiliza <code>AUTO_INCREMENT</code> para a coluna <code>CaixaID</code> e contém campos como <em>NomeCaixa</em>, <em>Operador</em>, <em>Localizacao</em>, <em>Setor</em> e <em>Host</em>.
    </p>
</div>

<div style="background-color: #1e293b; padding: 16px; border-radius: 8px; margin-bottom: 16px; border: 1px solid #334155;">
    <h3 style="color: #94a3b8; margin-bottom: 8px;"> Servidor Web com Nginx (<code>Dockerfile</code> e <code>nginx.conf</code>) </h3>
    <p style="color: #d1d5db;">
        A imagem utilizada é uma versão específica do Nginx (1.26.3-alpine) para garantir estabilidade.
    </p>
    <ul style="list-style-type: disc; padding-left: 20px; color: #d1d5db;">
        <li> O <code>Dockerfile</code> copia o arquivo <code>nginx.conf</code> para dentro do container. </li>
        <li> O <code>nginx.conf</code> define um <em>upstream</em> genérico (com placeholders para nomes ou IPs dos containers de aplicação) e configura o proxy para repassar as requisições à porta 4500. </li>
    </ul>
</div>

<div style="background-color: #1e293b; padding: 16px; border-radius: 8px; margin-bottom: 16px; border: 1px solid #334155;">
    <h3 style="color: #94a3b8; margin-bottom: 8px;"> Aplicação PHP (<code>index.php</code>) </h3>
    <p style="color: #d1d5db;">
        Um exemplo de aplicação PHP que:
    </p>
    <ul style="list-style-type: disc; padding-left: 20px; color: #d1d5db;">
        <li> Mostra a versão do PHP. </li>
        <li> Estabelece conexão com o banco de dados utilizando variáveis de ambiente. </li>
        <li> Insere registros na tabela <code>dados</code> com valores aleatórios e informações do host. </li>
    </ul>
</div>

##   Como Utilizar

1.  <span style="font-weight: bold; color: #6ee7b7;"> Pré-requisitos </span>
    <ul style="list-style-type: disc; padding-left: 20px; color: #d1d5db;">
        <li> Docker e Docker Compose instalados. </li>
        <li> Configuração de um ambiente para rodar containers localmente. </li>
    </ul>

2.  <span style="font-weight: bold; color: #6ee7b7;"> Configuração </span>
    <ul style="list-style-type: disc; padding-left: 20px; color: #d1d5db;">
        <li> Ajuste as variáveis de ambiente (crie um arquivo <code>.env</code> na raiz do projeto): </li>
    </ul>

    <pre style="background-color: #0f172a; padding: 12px; border-radius: 6px; overflow-x: auto; margin-left: 20px; margin-bottom: 16px; border: 1px solid #334155;">
        <code style="color: #e2e8f0;">
        DB_HOST=localhost<br>
        DB_USER=root<br>
        DB_PASSWORD=Senha123<br>
        DB_NAME=meubanco
        </code>
    </pre>

    <ul style="list-style-type: disc; padding-left: 20px; color: #d1d5db;">
        <li> No <code>nginx.conf</code>, substitua os placeholders pelos nomes dos serviços definidos no seu arquivo <code>docker-compose.yml</code>. </li>
    </ul>

3.  <span style="font-weight: bold; color: #6ee7b7;"> Execução com Docker Compose </span>
    <ul style="list-style-type: disc; padding-left: 20px; color: #d1d5db;">
        <li> Crie um <code>docker-compose.yml</code> para orquestrar os containers: </li>
    </ul>

    <pre style="background-color: #0f172a; padding: 12px; border-radius: 6px; overflow-x: auto; margin-left: 20px; margin-bottom: 16px; border: 1px solid #334155;">
        <code style="color: #e2e8f0;">
        version: '3'<br>
        services:<br>
          web:<br>
            build: .<br>
            ports:<br>
              - "4500:4500"<br>
            environment:<br>
              - DB_HOST=${DB_HOST}<br>
              - DB_USER=${DB_USER}<br>
              - DB_PASSWORD=${DB_PASSWORD}<br>
              - DB_NAME=${DB_NAME}
        </code>
    </pre>

    <ul style="list-style-type: disc; padding-left: 20px; color: #d1d5db;">
         <li> Execute: </li>
    </ul>
    <pre style="background-color: #0f172a; padding: 12px; border-radius: 6px; overflow-x: auto; margin-left: 20px; margin-bottom: 16px; border: 1px solid #334155;">
        <code style="color: #e2e8f0;">docker-compose up --build</code>
    </pre>

4.  <span style="font-weight: bold; color: #6ee7b7;"> Notas </span>
     <ul style="list-style-type: disc; padding-left: 20px; color: #d1d5db;">
        <li> Este projeto é um ponto de partida. Personalize-o e expanda-o conforme necessário. </li>
    </ul>

<hr style="border: 1px solid #4a5568; margin: 24px 0;">

##   Estrutura do Projeto

<div style="background-color: #0f172a; padding: 16px; border-radius: 8px; border: 1px solid #334155;">
    <ul style="list-style-type: none; padding-left: 0; color: #d1d5db;">
        <li><span style="font-weight: bold; color: #94a3b8;">banco.sql</span>: Script SQL para criação da tabela <code>dados</code>.</li>
        <li><span style="font-weight: bold; color: #94a3b8;">Dockerfile</span>: Instruções para construir a imagem do Nginx.</li>
        <li><span style="font-weight: bold; color: #94a3b8;">nginx.conf</span>: Configuração do Nginx com upstreams para balanceamento de carga.</li>
        <li><span style="font-weight: bold; color: #94a3b8;">index.php</span>: Aplicação PHP de exemplo que interage com o banco de dados.</li>
    </ul>
</div>

<hr style="border: 1px solid #4a5568; margin: 24px 0;">

<p style="font-weight: bold; color: #6ee7b7;">
    Bom trabalho e divirta-se explorando essa estrutura!
</p>
