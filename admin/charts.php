<?php
require __DIR__ . '/_admin.php';
$site = load_site_for_admin();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $decoded = json_decode($_POST['charts_json'] ?? '', true);
    if (is_array($decoded)) {
        $site['charts'] = $decoded;
        save_site_for_admin($site);
        admin_flash('Charts saved.');
    } else {
        admin_flash('Chart JSON was not valid.');
    }
    header('Location: charts.php');
    exit;
}
admin_header('Manage Charts');
?>
<p>Advanced editor for chart data. Keep the JSON structure valid.</p>
<form method="post" class="admin-form">
    <label>Charts JSON <textarea name="charts_json" rows="24"><?= e(json_encode($site['charts'] ?? [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?></textarea></label>
    <button class="btn primary" type="submit">Save charts</button>
</form>
<?php admin_footer(); ?>
