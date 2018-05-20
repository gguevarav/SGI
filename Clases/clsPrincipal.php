<?php
  class SesionValida{
    public function is_session_started(){
      // Chequear que no esté ejecutándole
      // desde la línea de comandos:
      if(php_sapi_name() !== 'cli'){
        if(version_compare(phpversion(), '5.4.0', '>=')){
          return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        }
        else{
          return session_id === '' ? FALSE : TRUE;
        }
      }
      return FALSE;
    }
  }
?>
