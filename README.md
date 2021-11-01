# Contact Form Symfony
*Merci de lire de Readme afin de comprendre comment utiliser le projet.* 

Projet réalisé sur le framework Symfony 5. L'objectif de ce projet est la mise en place d'un formulaire de contact couplé à un back-office. 
Le projet intervient dans le cadre du recrutement réalisé par l'entreprise **Asceo**

# Installation

- composer install 
- php bin/console doctrine:database:create
- php bin/console doctrine:migrations:migrate
- `php` `-S` `localhost:8000` `-t` `public`

Le site est ensuite visible à l'adresse suivante : http://localhost:8000

# Utilisation

Le projet est composé essentiellement de 6 pages. 

## Page de contact
Page de contact avec des champs simple. Une fois les différentes informations renseignées, l'utilisateur reçoit un mail à l‘adresse qu‘il a renseignée. 
![](http://image.noelshack.com/fichiers/2021/44/1/1635792050-index.png)

## Back office

L'url pour accéder à l'administration est : http://localhost:8000/admin

Si vous n'êtes pas connecté, automatiquement vous allez être redirigé vers la page de connexion. 

Les identifiants par défaut sont : 

**Email** : demo@demo.com	
**Password** : demodemo

![**Page de connexion**](http://image.noelshack.com/fichiers/2021/44/1/1635792012-index.png)


## Consultation des messages

![Liste des Emails](http://image.noelshack.com/fichiers/2021/44/1/1635791988-index.png)
Les messages sont regroupés par adresses mail. 
Une liste de l'ensemble des adresses mail utilisé au sein du formulaire de contact est affichée.

Pour voir en détail les messages regroupés à une adresse mail, veuillez cliquer ici : 
![](http://image.noelshack.com/fichiers/2021/44/1/1635791966-index.png)


L'ensemble des messages envoyés par l'adresse e-mail sélectionné précédemment sont regroupés. 

Nous retrouvons des informations comme le nom/prénom de l'expéditeur du message, son adresse mail, son message, et le statut du message. 

![](http://image.noelshack.com/fichiers/2021/44/1/1635791947-index.png)

Information : 
*Les messages en vert = Message consulté 
Les messages en rouge = Message non consulté
Pour changer le statut d'un message, il suffit de cliquer sur le bouton "change statut" du message concerné.* 

Pour voir un message, il suffit de cliquer sur le bouton **"view message"**

## Ajouter/supprimer des utilisateurs admin
Pour supprimer des messages, vous devez les sélectionner puis cliquer sur supprimer. 
![](http://image.noelshack.com/fichiers/2021/44/1/1635791924-index.png)

Pour ajouter des utilisateurs, cliquez sur "add admin user"
![](http://image.noelshack.com/fichiers/2021/44/1/1635791815-test.png)
