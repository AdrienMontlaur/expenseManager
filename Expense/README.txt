READ ME partie gestionnaire

Le projet est réparti en modèle MVC.

Les vues font appel à un template et y intègre leurs contenus, c'est elles qui sont appelées.

Les données sont stockées dans une BDD (en local, le DUMP est disponible dans le fichier source).
La gestion à la BDD est assurée par la classe Database.php
La classe Formulaire permet de créer rapidement des formulaire en php sans concaténation.
Le reste des classe est séparé en 2 familles. Le manager et la classe associée.
Les classes regroupent les variables et méthodes rattachés à un regroupement de données (tables du MCD).
Les managers font la gestions des données relatives à la classe et agisse en lien avec la DB (CRUD).

