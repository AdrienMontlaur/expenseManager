READ ME partie gestionnaire

Le projet est r�parti en mod�le MVC.

Les vues font appel � un template et y int�gre leurs contenus, c'est elles qui sont appel�es.

Les donn�es sont stock�es dans une BDD (en local, le DUMP est disponible dans le fichier source).
La gestion � la BDD est assur�e par la classe Database.php
La classe Formulaire permet de cr�er rapidement des formulaire en php sans concat�nation.
Le reste des classe est s�par� en 2 familles. Le manager et la classe associ�e.
Les classes regroupent les variables et m�thodes rattach�s � un regroupement de donn�es (tables du MCD).
Les managers font la gestions des donn�es relatives � la classe et agisse en lien avec la DB (CRUD).

