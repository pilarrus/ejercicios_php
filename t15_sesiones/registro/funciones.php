<?php

   function obtener_usuarios_registrados() {
      $usuarios_json = file_get_contents("./usuarios.json", true);
      $usuarios_array = json_decode($usuarios_json, true);
      $nick_usuarios = [];

      foreach ($usuarios_array as $usuario_num => $array) {
         foreach ($array as $key => $value) {
            if($key == 'usuario') {
               array_push($nick_usuarios, $value);
            }
         }
      }
      return $nick_usuarios;
   }


   function establecer_variables_session($campos) {
      foreach ($campos as $campo) {
         (!empty($_POST[$campo]))
         ? $_SESSION[$campo] = $_POST[$campo]
         : $_SESSION[$campo] = "";
      }
   }

   
   function validar_cadena($cadena, $campo='cadena', $error='error_cadena') {
      $cadena = trim($cadena);
      if($cadena === "") {
         $_SESSION[$error] = "<p class='warning'>Introduce $campo</p>";
         return false;
      }
      if(preg_match("/^[a-zñÑáéíóúÁÉÍÓÚÜü]{2,}$/i", $cadena) == 0){
         $_SESSION[$error] = "<p class='warning'>" . $campo . " no válido</p>";
         return false;
      }
      return true;
   }

   function validar_idiomas($idiomas) {
      if(is_string($idiomas)) {
         $_SESSION['error_idiomas'] = "<p class='warning'>Selecciona al menos un idioma</p>";
         return false;
     }
     return true;
   }

   function validar_sexo($sexo) {
      if($sexo === "") {
         $_SESSION['error_sexo'] = "<p class='warning'>Elige sexo</p>";
         return false;
      }
      return true;
   }


   function validar_usuario($nuevo_usuario, $usuario_registrado) {
      if($nuevo_usuario === "") {
         $_SESSION['error_usuario'] = "<p class='warning'>Introduce usuario</p>";
         return false;
      }
      if(strtolower($nuevo_usuario) === strtolower($usuario_registrado)) {
         $_SESSION['error_usuario'] = "<p class='warning'>Elige otro nombre de usuario</p>";
         return false;
      }
      return true;
   }


   function validar_email($email) {
      if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
         $_SESSION['error_email'] = "<p class='warning'>El email no es válido</p>";
         return false;
      }
      return true;
   }


   function validar_contrasenia($contrasenia) {
      if(strlen($contrasenia) < 6){
         $_SESSION['error_contrasenia'] = "<p class='warning'>La contraseña debe tener al menos 6 caracteres</p>";
         return false;
      }
      if(strlen($contrasenia) > 16){
         $_SESSION['error_contrasenia'] = "<p class='warning'>La contraseña no puede tener más de 16 caracteres</p>";
         return false;
      }
      if (!preg_match('`[a-z]`', $contrasenia)){
         $_SESSION['error_contrasenia'] = "<p class='warning'>La contraseña debe tener al menos una letra minúscula</p>";
         return false;
      }
      if (!preg_match('`[A-Z]`', $contrasenia)){
         $_SESSION['error_contrasenia'] = "<p class='warning'>La contraseña debe tener al menos una letra mayúscula</p>";
         return false;
      }
      if (!preg_match('`[0-9]`', $contrasenia)){
         $_SESSION['error_contrasenia'] = "<p class='warning'>La contraseña debe tener al menos un caracter numérico</p>";
         return false;
      }
      return true;
   }

   function validar_titulaciones($titulaciones) {
      if(is_string($titulaciones)) {
         $_SESSION['error_titulaciones'] = "<p class='warning'>Selecciona al menos una titulación</p>";
         return false;
     }
     return true;
   }

?>