# Boutique de meuble
TP - PHP

TP PHP initiation

Réaliser une page qui permet de créer les produits d’une boutique de meubles et de les insérer en base de
données. Puis vous afficherez les produits dans la boutique.

Exercice 1 : Création de la BDD
Créer la base de données "meubles" de la boutique. Elle contient la table "produit" avec les champs suivants :
id_produit INT PK AI
titre VARCHAR(255)
prix FLOAT
description TEXT
photo VARCHAR(255)

Exercice 2 : Création d'un formulaire HTML d'ajout d'un produit
Vous créez un fichier ajout_produit.php. Il contient un formulaire HTML qui doit permettre d'ajouter un nouveau
produit en BDD (en exercice 3) et l'upload d'une photo de celui-ci (en exercice 4).

Exercice 3 : Enregistrement d'un nouveau produit en BDD
Dans ajout_produit.php, quand le formulaire de création de produit est envoyé, insérer le produit en BDD et afficher
un message de réussite ou d'échec.

Exercice 4 : Upload de la photo
Dans ajout_produit.php, enregistrer le chemin de la photo en BDD et copier son fichier dans un dossier que vous aurez
créé.

Exercice 5 : affichage des produits dans la boutique
Vous créez un fichier boutique.php.
Vous sélectionnez tous les produits de la BDD et vous les affichez dans la boutique dans des blocs (4 par lignes) en y
mettant le titre, le prix, la photo et la description du produit.


------------------------------------------------

Create a page that allows you to create the products of a furniture store and insert them in the database.
database. Then you will display the products in the store.

Exercise 1 : Creation of the database
Create the database "furniture" of the store. It contains the table "product" with the following fields:
id_product INT PK AI
title VARCHAR(255)
price FLOAT
description TEXT
photo VARCHAR(255)

Exercise 2: Creating an HTML form to add a product
You create a file add_product.php. It contains an HTML form that should allow you to add a new
product in the DB (in exercise 3) and upload a picture of it (in exercise 4).

Exercise 3: Registering a new product in the DB
In ajout_produit.php, when the product creation form is sent, insert the product in the DB and display
a success or failure message.

Exercise 4 : Upload of the photo
In ajout_produit.php, save the path of the photo in the DB and copy its file in a folder that you will have
created.

Exercise 5 : Displaying products in the store
You create a file store.php.
You select all the products in the DB and you display them in the store in blocks (4 per line) by
putting the title, the price, the picture and the description of the product.
