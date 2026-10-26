<?php
require_once __DIR__ . '/navigation.php';

$page = $page ?? 'home';
$nav = is_array($config['nav'] ?? null) ? $config['nav'] : [];

$footer_variant = (string) ($config['footer'] ?? 'columns');
if (!in_array($footer_variant, ['columns', 'compact', 'statement'], true)) {
    $footer_variant = 'columns';
}
?>
</main>
<?php require __DIR__ . '/footers/' . $footer_variant . '.php'; ?>
</body>
</html>
