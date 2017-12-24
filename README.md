# ProjetWeb 
    -Binome MARTINEZ GEOFFREY - HUEBER DIMITRI
Site Web M1-IL

Lien vers le site  -->

https://pedago.univ-avignon.fr/~uapv1403760/ProjetWeb/BlackManba.php?action=login

#Installation

    ouvrir un terminal dans public_html :
    
	-git clone https://github.com/GeoffreyM13/ProjetWeb.git
	va crée un répertoire ProjetWeb, toutes les modifs sont a faire dans ce repertoire.
	-git config --global user.name "blabla"
	-git config --global user.email "blabla"
	
#Mettre a jour

    -git add "filename"
    -git commit -m "message"
    -git push origin master
    
    -- mettre a jour le repertoire local --
    
    -git pull origin master 
    
#Ce qui a été fait dans ce tp

    -le site web est pratiquement responsive sur tous les points
	-de l'ajax a été mis en place lors d'envoie de message, sur le chat, sur le changement de statut, le changement d'avatar et l'ajout de like.
	-possibilités de modifier l'avatar avec l'url d'une image, cependant problème pour mettre le rafraichissement de la page en ajax.
	
	voici une image pour test -> https://static.highsnobiety.com/wp-content/uploads/2016/09/17115238/homer-simpsons-jobs-salaries-0-320x192.jpg
	
	-du javascript a été utilisé pour la liste d'amis ainsi que la page utilisateur afin de faire des recherches, changer le nombre d'utilisateur par page et changer de page.
	-beaucoup de css a été mis en place pour le design des pages.
	-une petite fonction javascript a été mise en place pour changer l'affichage entre les messages recu et ceux envoyés
	-une petite fonction dans le controller a été mise en place afin de rediriger l'utilisateur vers l'écran de connexion si celui essaye d'accéder à une page par l'url sans être connecté.
	-l'ajout de like fonctionne mais il faut cliquer 2 fois sur le bouton je ne sais pas pourquoi il ne prend pas en compte la redirection la première fois .
	
	-le chat est présent sur toutes les pages , on peux envoyer les chats il est dragabble et responsive.
	-des notifications apparaissent pour confirmer l'envoie de message, le changement de pseudo, l'actualisation du chat et l'envoie de message sur le chat.
	
	-sécurisation de l'affichage des post grace aux balies HTMLENTITIES et autres ...
	
#Répartition des tâches

    -Les tâches n'ont pas été attribués à chaque personne du binome, celui-ci pouvait travailler sur les mêmes taches suivant le besoin de l'un ou de l'autre, c'est à dire que par moment, une personne du binome pouvait avoir besoin d'aide car il ne trouvait pas de solutions au problème et donc l'autre personne composant le binome agissait et vice-versa, ce système a permis au binome de voir toutes les parties du projet tout en comprenant l'intégrité de celui-ci. 
    -Certes certaines tâches ont été partagés, cependant vu que nous touchions a la totalité du projet et par seulement à certaines partie, des modifications pouvait être apportés par une personne du binome qui n'avait pas écrit le code de base.
    
