<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pessoas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            padding: 8px 12px;
            margin: 5px;
            cursor: pointer;
        }

        
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto; 
            background-color: rgba(0,0,0,0.4); 
            
        }
  
        .modal-content {
            background-color: #fefefe;
            margin: 10% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 50%; 
            border-radius: 10px;
        }
  
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
  
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
 
    <button id="myBtn">Cadastrar</button>

    <div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Cadastrar Pessoa</h2>
          <form id="cadastroForm"  >
            @csrf
           <div class="input">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br>
           </div>
            <div class="input">
                <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            </div>
            <div class="input">
                <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone"><br>
            </div>
           <div class="input">
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento"><br>
           </div>
            <button type="submit">Cadastrar</button>
          </form>
        </div>
      </div>

    <!-- Tabela para listar pessoas -->
    <table>
        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Data de Nascimento</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($people as $person)
            <tr>

                <td>{{ $person->nome }}</td>
                <td>{{ $person->email }}</td>
                <td>{{ $person->telefone }}</td>
                <td>{{ $person->data_nascimento }}</td>
                <td>
                    <button>Editar</button>
                    <button>Excluir</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if($people->isEmpty())
        <p>Nenhuma pessoa cadastrada.</p>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Pega o modal
        var modal = document.getElementById('myModal');
        
        // Pega o botão que abre o modal
        var btn = document.getElementById("myBtn");
        
        // Pega o elemento <span> que fecha o modal
        var span = document.getElementsByClassName("close")[0];
        
        // Quando o usuário clica no botão, abre o modal
        btn.onclick = function() {
          modal.style.display = "block";
        }
        
        // Quando o usuário clica no <span> (x), fecha o modal
        span.onclick = function() {
          modal.style.display = "none";
        }
        
        // Quando o usuário clica fora do modal, fecha-o
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
    });
</script>

</body>
</html>
