<?php
  function curPageName()
  {
   return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
  }
  $my_page= substr(curPageName(), 0 , -4);
?>