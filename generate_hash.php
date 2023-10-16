<?php
$new_password = '1234'; // Remplacez 'votre_nouveau_mot_de_passe' par le mot de passe que vous souhaitez utiliser.

// Générer un hachage MD5 pour le nouveau mot de passe
$hashed_password = md5($new_password);

echo 'Nouveau mot de passe : ' . $new_password . '<br>';
echo 'Hachage MD5 : ' . $hashed_password;
?>
