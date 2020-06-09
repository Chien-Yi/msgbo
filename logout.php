<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

//將session清空

session_destroy();

echo '登出中......';

echo '<meta http-equiv=REFRESH CONTENT=1;url=login_view.html>';

?>