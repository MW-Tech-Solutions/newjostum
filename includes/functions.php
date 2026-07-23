<?php
declare(strict_types=1);

const DATA_DIR = __DIR__ . '/../data';

function data_path(string $file): string
{
    return DATA_DIR . '/' . $file;
}

function read_json(string $file, array $fallback = []): array
{
    $path = data_path($file);
    if (!is_file($path)) {
        return $fallback;
    }
    $json = file_get_contents($path);
    $data = json_decode($json ?: '', true);
    return is_array($data) ? $data : $fallback;
}

function write_json(string $file, array $data): void
{
    if (!is_dir(DATA_DIR)) {
        mkdir(DATA_DIR, 0775, true);
    }
    file_put_contents(data_path($file), json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
}

function site_data(): array
{
    return read_json('site.json', []);
}

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function page_by_slug(string $slug): ?array
{
    $site = site_data();
    foreach (($site['pages'] ?? []) as $page) {
        if (($page['slug'] ?? '') === $slug) {
            return $page;
        }
    }
    return null;
}

function pages_by_group(string $group): array
{
    $site = site_data();
    return array_values(array_filter($site['pages'] ?? [], static fn($page) => ($page['group'] ?? '') === $group));
}

function current_admin(): bool
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        $sessionDir = __DIR__ . '/../data/sessions';
        if (!is_dir($sessionDir)) {
            mkdir($sessionDir, 0775, true);
        }
        session_save_path($sessionDir);
        session_start();
    }
    return !empty($_SESSION['admin_logged_in']);
}

function require_admin(): void
{
    if (!current_admin()) {
        header('Location: login.php');
        exit;
    }
}

function admin_flash(?string $message = null): ?string
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        $sessionDir = __DIR__ . '/../data/sessions';
        if (!is_dir($sessionDir)) {
            mkdir($sessionDir, 0775, true);
        }
        session_save_path($sessionDir);
        session_start();
    }
    if ($message !== null) {
        $_SESSION['flash'] = $message;
        return null;
    }
    $flash = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);
    return $flash;
}

function render_blocks(array $blocks): void
{
    foreach ($blocks as $block) {
        $type = $block['type'] ?? 'text';
        if ($type === 'text') {
            echo '<div class="content-block">';
            foreach (($block['paragraphs'] ?? []) as $paragraph) {
                echo '<p>' . e($paragraph) . '</p>';
            }
            echo '</div>';
        } elseif ($type === 'list') {
            echo '<ul class="feature-list">';
            foreach (($block['items'] ?? []) as $item) {
                echo '<li>' . e($item) . '</li>';
            }
            echo '</ul>';
        } elseif ($type === 'table') {
            echo '<div class="table-wrap"><table><thead><tr>';
            foreach (($block['headers'] ?? []) as $header) {
                echo '<th>' . e($header) . '</th>';
            }
            echo '</tr></thead><tbody>';
            foreach (($block['rows'] ?? []) as $row) {
                echo '<tr>';
                foreach ($row as $cell) {
                    echo '<td>' . e((string) $cell) . '</td>';
                }
                echo '</tr>';
            }
            echo '</tbody></table></div>';
        } elseif ($type === 'cards') {
            echo '<div class="card-grid">';
            foreach (($block['items'] ?? []) as $item) {
                echo '<article class="info-card"><span>' . e($item['label'] ?? '') . '</span><strong>' . e($item['value'] ?? '') . '</strong>';
                if (!empty($item['text'])) {
                    echo '<p>' . e($item['text']) . '</p>';
                }
                echo '</article>';
            }
            echo '</div>';
        } elseif ($type === 'image') {
            echo '<figure class="page-figure"><img src="' . e($block['src'] ?? '') . '" alt="' . e($block['caption'] ?? '') . '"><figcaption>' . e($block['caption'] ?? '') . '</figcaption></figure>';
        } elseif ($type === 'chart') {
            echo '<div class="chart-panel"><canvas class="portal-chart" height="290" data-chart="' . e(json_encode($block['chart'] ?? [], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)) . '"></canvas></div>';
        }
    }
}
function ensure_upload_dir(): string
{
    $dir = __DIR__ . '/../images/uploads';
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
    return $dir;
}

function handle_upload(string $inputName, string $targetDir = 'images/uploads'): ?string
{
    if (!isset($_FILES[$inputName]) || $_FILES[$inputName]['error'] !== UPLOAD_ERR_OK) {
        return null;
    }
    $file = $_FILES[$inputName];
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed, true)) {
        return null;
    }
    $maxSize = 10 * 1024 * 1024; // 10MB
    if ($file['size'] > $maxSize) {
        return null;
    }
    ensure_upload_dir();
    $unique = uniqid('img_', true);
    $filename = $unique . '.' . $ext;
    $dest = __DIR__ . '/../' . $targetDir . '/' . $filename;
    if (move_uploaded_file($file['tmp_name'], $dest)) {
        return $targetDir . '/' . $filename;
    }
    return null;
}
?>
