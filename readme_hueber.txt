findOneByidentifiant():

les mécanismes php permettant d'utiliser cette méthode sont :
- la connexion à la base de données avec dbconnection
- ensuite on récupère la table avec getRepository('table')
- puis nous récuperons une valeur de la colonne identifiant(colonne critère) qui est égale au paramètre passé en argument dans findOneByidentifiant('paramètre')
