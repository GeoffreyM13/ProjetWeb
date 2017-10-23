findOneByidentifiant():

les mécanismes php permettant d'utiliser cette méthode sont :
- Les méthodes magiques
Dans notre cas la méthode magique est:__call() qui émule des méthodes. 
Ces méthodes n'existent pas dans la classe.
Ces méthodes émulées sont prises en charge par __call() qui va exécuter du code en fonction du nom de la méthode.
