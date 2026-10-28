
<?php

final class Db {

    private static ?PDO $pdo = null;

    public static function conn(): PDO {

        if (self::$pdo instanceof PDO) {
            return self::$pdo;
        }

        $host = getenv('DB_HOST') ?: 'mysql';
        $port = getenv('DB_PORT') ?: '3306';
        $dbname = getenv('DB_NAME') ?: 'killofsun';
        $user = getenv('DB_USER');
        $pass = getenv('DB_PASSWORD');

        if ($user === false || $pass === false) {
            throw new RuntimeException(
                'Credenciais do banco não configuradas.'
            );
        }

        $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8mb4";

        try {
            self::$pdo = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);

            return self::$pdo;

        } catch (PDOException $e) {
            error_log('[DB ERROR] ' . $e->getMessage());
            http_response_code(500);
            exit('Erro interno ao conectar ao banco.');
        }
    }
}
