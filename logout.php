<?php
session_start();
session_destroy();
header('Location: ./?msg=' . urlencode(base64_encode("You have been successfully logged out!")));
?>