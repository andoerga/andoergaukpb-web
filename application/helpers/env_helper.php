<?php
/**
 * CodeIgniter 3 DotEnv & Environment Helper
 *
 * Memuat konfigurasi dari file .env ke dalam environment variabel
 * (putenv, $_ENV, $_SERVER) dan menyediakan fungsi helper env().
 */

if (!function_exists('load_dotenv')) {
    /**
     * Membaca dan mem-parsing file .env
     *
     * @param string|null $path Path ke file .env
     * @param bool $override Apakah menimpa variabel yang sudah ada
     * @return bool
     */
    function load_dotenv($path = null, $override = false)
    {
        static $already_loaded = false;

        if ($already_loaded && !$override && $path === null) {
            return true;
        }

        if ($path === null) {
            if (defined('FCPATH')) {
                $base_dir = FCPATH;
            } elseif (defined('APPPATH')) {
                $base_dir = dirname(rtrim(APPPATH, '/\\')) . DIRECTORY_SEPARATOR;
            } else {
                $base_dir = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR;
            }
            $path = $base_dir . '.env';
        }

        if (!file_exists($path)) {
            return false;
        }

        $lines = @file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false) {
            return false;
        }

        foreach ($lines as $line) {
            $line = trim($line);

            // Lewati baris kosong atau komentar
            if ($line === '' || strpos($line, '#') === 0 || strpos($line, ';') === 0) {
                continue;
            }

            // Hilangkan awalan 'export ' jika ada
            if (stripos($line, 'export ') === 0) {
                $line = trim(substr($line, 7));
            }

            // Pisahkan key dan value berdasarkan tanda '=' pertama
            if (strpos($line, '=') === false) {
                continue;
            }

            list($key, $value) = explode('=', $line, 2);
            $key   = trim($key);
            $value = trim($value);

            if ($key === '') {
                continue;
            }

            // Bersihkan tanda kutip jika value diapit tanda kutip ganda atau tunggal
            $len = strlen($value);
            if ($len >= 2) {
                $first = $value[0];
                $last  = $value[$len - 1];

                if (($first === '"' && $last === '"') || ($first === "'" && $last === "'")) {
                    $value = substr($value, 1, -1);
                    if ($first === '"') {
                        $value = str_replace(
                            array('\\"', '\\n', '\\r', '\\t'),
                            array('"', "\n", "\r", "\t"),
                            $value
                        );
                    }
                } else {
                    // Hapus komentar inline jika tidak diapit kutip
                    $comment_pos = strpos($value, ' #');
                    if ($comment_pos !== false) {
                        $value = trim(substr($value, 0, $comment_pos));
                    }
                }
            } else {
                $comment_pos = strpos($value, ' #');
                if ($comment_pos !== false) {
                    $value = trim(substr($value, 0, $comment_pos));
                }
            }

            // Set ke environment variabel
            if ($override || getenv($key) === false) {
                putenv("{$key}={$value}");
            }
            if ($override || !isset($_ENV[$key])) {
                $_ENV[$key] = $value;
            }
            if ($override || !isset($_SERVER[$key])) {
                $_SERVER[$key] = $value;
            }
        }

        $already_loaded = true;
        return true;
    }
}

if (!function_exists('env')) {
    /**
     * Mengambil nilai environment variable dengan default fallback dan konversi tipe data.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        // Pastikan .env sudah dibaca
        load_dotenv();

        $value = getenv($key);
        if ($value === false) {
            $value = isset($_ENV[$key]) ? $_ENV[$key] : (isset($_SERVER[$key]) ? $_SERVER[$key] : false);
        }

        if ($value === false || $value === null) {
            return $default;
        }

        switch (strtolower(trim($value))) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return null;
        }

        return $value;
    }
}

// Otomatis memuat .env saat file helper ini di-include
load_dotenv();
