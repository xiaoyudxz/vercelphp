<?php
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "文件名称: " . $_FILES["file"]["name"] . "<br />";
    echo "文件类型: " . $_FILES["file"]["type"] . "<br />";
    echo "文件大小: " . ($_FILES["file"]["size"]) / 1024 / 1024 . "MB<br />";
    if (file_exists("./" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . "已经存在. ";
    echo("<input type=button value=\"打开文件\" onclick=\"location.href='./" . $_FILES["file"]["name"] ."'\">");
      }
    else
      {
 $upload_file = iconv("UTF-8", "GB2312", $_FILES["file"]["name"]);
if (move_uploaded_file($_FILES["file"]["tmp_name"], $upload_file)) {
        $res_file = iconv("GBK", "UTF-8", $upload_file);    // 再从 GBK 转为 UTF-8
                rename($upload_file, $res_file);   // 重命名一下文件
                echo "<strong>上传成功</strong>";
    echo("<input type=button value=\"打开文件\" onclick=\"location.href='./" . $_FILES["file"]["name"] ."'\">");
        } else {
                echo "上传失败";
        }
      }
    }
?>