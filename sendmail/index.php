<?php
/*
//Paramètre encodage
ini_set("SMTP","smpt_gmail.com");
ini_set("smtp_port","587");
$header="MIME-Version: 1.0\r\n";
$header.='From:"PrimFX.com"<support@primfx.com>'."\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';

$message='<html><body>Bonjour avec PHP</body></html>';
$p = mail("omnesscolaire2022@gmail.com","Test mail",$message,$header);
var_dump($p);
*/
?>


<?php

  $dest = "omnesscolaire2022@gmail.com";
  $sujet = "Email de test";
  $corp = "Salut ceci est un email de test envoyer par un script PHP";
  $headers = "From: VotreGmailId@gmail.com";
  if (mail($dest, $sujet, $corp, $headers)) {
    echo "Email envoyé avec succès à $dest ...";
  } else {
    echo "Échec de l'envoi de l'email...";
  }
?>