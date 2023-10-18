#!/bin/bash

# Définit le chemin du répertoire de déploiement sur le serveur
GIT_WORK_TREE=/home/ycvn0392/reveriesetpetitsplis.fr/wp-content/themes/reveries

# Spécifie la branche du dépôt Git que vous souhaitez déployer
BRANCHE=reveriesV2

# Se déplace vers le répertoire de travail
cd $GIT_WORK_TREE

# Met à jour le dépôt Git sur le serveur
git fetch origin $BRANCHE
git reset --hard FETCH_HEAD

# Exécute d'autres commandes de post-traitement si nécessaire
# Par exemple, exécutez une commande pour mettre à jour WordPress, composer, npm, etc.

# Assurez-vous que les autorisations des fichiers sont correctes
# Par exemple, définissez les autorisations de manière appropriée pour les fichiers et les dossiers

# Redémarrez le serveur web ou effectuez d'autres actions nécessaires

# Sortie
echo "Déploiement terminé avec succès."
