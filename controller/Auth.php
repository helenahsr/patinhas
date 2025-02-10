<?php

require_once "../bd/conexao.php";

class Auth
{
    private $db;

    public function __construct()
    {
        $this->db = ClasseConexao::Conexao();
    }

    public function login($email, $senha)
    {
        if (empty($email) || empty($senha)) {
            $this->redirectWithMessage('../view/login/login.php', 'Nem todos os campos foram preenchidos!');
        }

        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            error_log("Senha fornecida: " . $senha);
            error_log("Hash armazenado: " . $user['senha']);

            if (password_verify($senha, $user['senha'])) {
                session_start();
                $_SESSION['uid'] = $user['id'];
                $_SESSION['uname'] = $user['nome'];

                header("Location: ../view/dashboard/dashboard.php");
                exit();
            } else {
                $this->redirectWithMessage('../view/login/login.php', 'Senha incorreta!');
            }
        } else {
            $this->redirectWithMessage('../view/login/login.php', 'Usuário inexistente!');
        }
    }

    private function redirectWithMessage($url, $message)
    {
        echo "<script>alert('$message'); window.location.href='$url';</script>";
        exit();
    }

    public function logout()
    {
        session_start();

        $_SESSION = [];
        
        session_unset();
        session_destroy();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        header('Location: ../view/index.php');
        exit();
    }
}
?>
