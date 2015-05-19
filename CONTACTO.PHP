 <?php
//ESTE ARCHIVO RECIBE LA INFORMACION DESDE EL METODO POST DEL FORMULAIO
//VERIFICA QUE SE HA DIGILENCIADO LA INFORMACION
//DE SER ASI AGREGA INFORMACION A UN ARCHIVO DE TEXTO Y ENVIA LA INFORMACION POR CORREO ELECTRONICO

 if(!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['phone']) AND !empty($_POST['subjet']) ){
      
      //VERIFICA SI EL USUARIO PINCHO LOS CHECKBOX
      if ($_POST['terminos'] = "terminos") {
       $mensaje = "Usuario acepto terminos y condiciones";
      }else{
       $mensaje= "Usuario no acepto terminos y condiciones";
      }

      if ($_POST['politica'] = "politica") {
       $mensaje2 = "Usuario acepto politica de privacidad";
      }else{
        $mensaje2 = "Usuario no acepto politica de privacidad";
      }

      /*GUARDA INFORMACION DEL USUARIO EN ARCHIVO PLANO .TXT*/
      $file = fopen("archivo.txt", "a"); //RUTA DEL ARCHIVO EN EL SERVIDOR DONDE SE ENCUENTRA LA PAGINA WEB
      fwrite($file, $_POST['name']. PHP_EOL);
      fclose($file);

      /*ESTRUTURA DEL MENSAJE ENVIADO A lA EMPRESA*/
      $to ="sergiosegovia@elpuerto80.com";
      $headers = "Content-Type: text/html; charset=iso-8859-1\n"; 
      $headers .= "From:".$_POST['name']."\r\n";            
      $tema="Contacto desde el Sitio Web";
      $mensaje="
      <table border='0' cellspacing='2' cellpadding='2'>
        <tr>
          <td width='20%' align='center' bgcolor='#FFFFCC'><strong>Nombre:</strong></td>
          <td width='80%' align='left'>$_POST[name]</td>
        </tr>
        <tr>
          <td align='center' bgcolor='#FFFFCC'><strong>E-mail:</strong></td>
          <td align='left'>$_POST[email]</td>
        </tr>
         <tr>
          <td width='20%' align='center' bgcolor='#FFFFCC'><strong>Telefono</strong></td>
          <td width='80%' align='left'>$_POST[phone]</td>
        </tr>
        <tr>
          <td align='center' bgcolor='#FFFFCC'><strong>Titulo:</strong></td>
          <td align='left'>$_POST[subjet]</td>
        </tr>
        <tr>
          <td align='center' bgcolor='#FFFFCC'><strong>Comentario:</strong></td>
          <td align='left'>$_POST[mensaje]</td>
        </tr>
      </table>
      ";

      //ESTA FUNCION ENVIA EL CORREO ELECTRONICO DESDE EL SERVIDOR DONDE SE ENCUENTRA LA PAGINA WEB AL CORREO DEL USUAARIO
      @mail($to,$tema,$mensaje,$headers);
           echo "Su mensaje ha sido enviado";


      //ESTRUCTURA DEL MENSAJE ENVIADO AL USUARIO
      $to ="sergiosegovia@elpuerto80.com";
      $headers = "Content-Type: text/html; charset=iso-8859-1\n"; 
      $headers .= "From:".$_POST['name']."\r\n";            
      $tema="Contacto desde el Sitio Web";
      $mensaje="Gracias por comunicarte con nosotros, pronto estaremos en contacto contigo";

      //ESTA FUNCION ENVIA EL CORREO ELECTRONICO DESDE EL SERVIDOR DONDE SE ENCUENTRA LA PAGINA WEB AL CORREO DEL USUAARIO
      @mail($to,$tema,$mensaje,$headers);
           echo "Su mensaje ha sido enviado";
} else {
    echo "No se puede enviar el formulario, verifica los campos";
}
?>