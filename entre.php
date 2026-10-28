<?php
session_start();

require_once __DIR__ . '/conexao.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    $pdo = Db::conn();

    $stmt = $pdo->prepare(
        "SELECT * FROM usuarios WHERE email = ?"
    );

    $stmt->execute([$email]);

    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha_hash'])) {

        session_regenerate_id(true);

        $_SESSION['user_id'] = $usuario['id'];
        $_SESSION['user_name'] = $usuario['nome'];

        header('Location: jogar.php');
        exit;

    } else {
        $erro = 'Email ou senha invalidos.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KILL THE SUN</title>
    <link rel="icon" href="Imagem/icono_assustado.png">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<<<<<<< HEAD
    <header>
        <a href="index.php" class="HOME">
            <img
                src="Imagem/soldorock-removebg-preview.png"
                alt="Logo KILL THE SUN"
                class="soldorock5"
            >
        </a>
=======
  <header>
    <a href="index.php" class="HOME">
      <img src="Imagem/soldorock-removebg-preview.png" alt="Logo da KILL THE SUN" class="soldorock5" />
    </a>
    <div class="menu-toggle" id="menu-toggle">☰</div>
    <nav>
      <ul id="menu" class="menu">
        <li><a href="index.php">HOME</a></li>
        <li><a href="sobrejogo.php">SOBRE</a></li>
        <li><a href="galeriadejogos.php">GALERIA DE JOGOS</a></li>
        <li><a href="Jogosatuaisefuturos.php"> NOSSOS JOGOS </a></li>
        <li><a href="contato.php">CONTATO</a></li>
        <li><a href="jogar.php">JOGAR</a></li>
        <li><a href="cadastro.php">CADASTRO</a></li>
        <li><a href="entre.php">ENTRAR</a></li>
      </ul>
    </nav>
  </header>
<?php
session_start();                       
require_once __DIR__ . '/conexao.php'; 

$pdo = Db::conn();                    

$stmt = $pdo->query("SELECT * FROM usuarios");
$usuarios = $stmt->fetchAll();

foreach ($usuarios as $u) {
    echo $u['nome'] . "<br>";
}

>>>>>>> cfcbe5c718776f38bee1747443688ece4a24a3a3

        <div class="menu-toggle" id="menu-toggle">☰</div>

        <nav>
            <ul id="menu" class="menu">
                <li><a href="index.php">HOME</a></li>
                <li><a href="sobrejogo.php">SOBRE</a></li>
                <li><a href="galeriadejogos.php">GALERIA DE JOGOS</a></li>
                <li><a href="Jogosatuaisefuturos.php">NOSSOS JOGOS</a></li>
                <li><a href="contato.php">CONTATO</a></li>
                <li><a href="jogar.php">JOGAR</a></li>
                <li><a href="cadastro.php">CADASTRO</a></li>
                <li><a href="entre.php">ENTRAR</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="contato">
            <form method="POST">
                <h2>Login</h2>

                <input
                    type="email"
                    name="email"
                    placeholder="E-mail"
                    required
                >
                <br>

                <input
                    type="password"
                    name="senha"
                    placeholder="Senha"
                    required
                >
                <br>

                <button type="submit">Entrar</button>

                <?php if ($erro !== ''): ?>
                    <p>
                        <?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?>
                    </p>
                <?php endif; ?>

                <a href="cadastro.php">Criar conta</a>
            </form>
        </div>
    </main>

    <footer>
        <img
            src="Imagem/soldorock2.png"
            alt="Solpagina"
            class="SIRIUS"
        >
        <p>Desenvolvido por João Mateus Alcantara Dos Santos</p>
    </footer>

    <script>
        document.getElementById("menu-toggle")
            .addEventListener("click", function () {
                document.getElementById("menu")
                    .classList.toggle("active");
            });
    </script>
</body>
</html>
