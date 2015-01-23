<style>
    .column-qrcode { width: 40px; }
</style>

<a href="<?= plugins_url('/../qrcode?data=' . get_permalink($post_id) . '&size=big', __FILE__); ?>" download="<?= get_the_title($post_id); ?>.png">
    <img src="<?= plugins_url('/../qrcode/index.php?data=' . get_permalink($post_id) . '&size=small', __FILE__); ?>" />
</a>