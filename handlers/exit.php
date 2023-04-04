<?php
setcookie('user', $user->id, time() - 3600 * 24 * 7, '/');
header('Location: /');
?>