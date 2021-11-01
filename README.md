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

![Page de contact avec des champs simple. Une fois les différentes information renseigné, l'utilisateur reçoit un mail à l‘adresse qu‘il à renseigné.](https://prnt.sc/1y2rfpo)

## Back office

L'url pour accéder à l'administration est : http://localhost:8000/admin

Si vous n'êtes pas connecté, automatiquement vous allez être redirigé vers la page de connexion. 

Les identifiants par défaut sont : 

**Email** : demo@demo.com	
**Password** : demodemo

![**Page de connexion**](https://prnt.sc/1y2s9nm)


## Consultation des messages

![Liste des Emails](https://prnt.sc/1y2smlf)
Les messages sont regroupés par adresses mail. 
Une liste de l'ensemble des adresses mail utilisé au sein du formulaire de contact est affichée.

Pour voir en détail les messages regroupés à une adresse mail, veuillez cliquer ici : 
![](https://prnt.sc/1y2sob9)


L'ensemble des messages envoyés par l'adresse e-mail sélectionné précédemment sont regroupés. 

Nous retrouvons des informations comme le nom/prénom de l'expéditeur du message, son adresse mail, son message, et le statut du message. 

![](https://prnt.sc/1y2t2ab)

Information : 
*Les messages en vert = Message consulté 
Les messages en rouge = Message non consulté
Pour changer le statut d'un message, il suffit de cliquer sur le bouton "change statut" du message concerné.* 

Pour voir un message, il suffit de cliquer sur le bouton **"view message"**

## Ajouter/supprimer des utilisateurs admin

![Pour supprimer des messages, vous devez les sélectionner puis cliquer sur supprimer. ](https://prnt.sc/1y2u0wn)


![Pour ajouter des utilisateurs, cliquez sur "add admin user"](https://prnt.sc/1y2u4us)
