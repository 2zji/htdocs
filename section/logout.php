<?php
setcookie('userid', time()-1);
setcookie('userpass', time()-1);

echo"<meta http-equiv = 'refresh' content = '1; url=index.php'>";


?>