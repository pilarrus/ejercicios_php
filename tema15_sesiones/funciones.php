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

   function comprobar_campos($campos) {
      foreach ($campos as $key => $campo) {
         establecer_variables_sesion($campo);
      }
   }

   function establecer_variables_sesion($x) {
      if(!empty($_POST[$x])) {
         $_SESSION[$x] = $_POST[$x];
      } else {
         $_SESSION[$x] = "";
      }
   }

   function validar_cadena($cadena) {
      $cadena = trim($cadena);
      if($cadena === "") {
         $_SESSION['error_cadena'] = "Introduce una cadena";
         return false;
      }
      if(preg_match("/^[a-zñÑáéíóúÁÉÍÓÚÜü]{2,}$/i", $cadena) == 0){
         $_SESSION['error_cadena'] = "La cadena no es válida";
         return false;
      }
      return true;
   }

   function validar_usuario($nuevo_usuario, $usuario_registrado) {
      if($nuevo_usuario === "") {
         $_SESSION['error_usuario'] = "Introduce usuario";
         return false;
      }
      if(strtolower($nuevo_usuario) === strtolower($usuario_registrado)) {
         $_SESSION['error_usuario'] = "Elige otro nombre de usuario";
         return false;
      }
      return true;
   }

   function validar_email($email) {
      if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
         $_SESSION['error_email'] = "El email no es válido";
         return false;
      }
      return true;
   }

   function validar_contrasenia($contrasenia){
      if(strlen($contrasenia) < 6){
         $_SESSION['error_contrasenia'] = "La contraseña debe tener al menos 6 caracteres";
         return false;
      }
      if(strlen($contrasenia) > 16){
         $_SESSION['error_contrasenia'] = "La contraseña no puede tener más de 16 caracteres";
         return false;
      }
      if (!preg_match('`[a-z]`', $contrasenia)){
         $_SESSION['error_contrasenia'] = "La contraseña debe tener al menos una letra minúscula";
         return false;
      }
      if (!preg_match('`[A-Z]`', $contrasenia)){
         $_SESSION['error_contrasenia'] = "La contraseña debe tener al menos una letra mayúscula";
         return false;
      }
      if (!preg_match('`[0-9]`', $contrasenia)){
         $_SESSION['error_contrasenia'] = "La contraseña debe tener al menos un caracter numérico";
         return false;
      }
      return true;
   }

?>