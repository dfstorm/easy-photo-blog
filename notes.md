# Notes

## Markeur d'installation

Fichier INSTALL_MARKER.

## Structure

gestion
- login
- list of post
- creating step 1 : upload.
- creating step 2 : add title and descriptions (optionnal)
- Edit blog data
Public
- posts
- About me
- Post page.

Revient le problème de la base de donnée. Je ne veux pas utiliser un gros
truc. PHP est deja installer sur le système... donc un petit moteur ?

Secu : ne répondre qu'au appel locaux.




damn-small-database-egine ?
Petit projet cool : un système de base de donnée perso?



Concept:

On post un article qui peu avoir plus d'une photos.

Le concept:

1- Mon amour drop les photos qu'elle vient de prendre dans une boite.
2- La boite est un article.


On utilise dsm (Damn small memory) et dsfr (Damn small file registery)
utilisable via des requete POST/GET en json.



====

donc,

Posts
iNoPost
sTitle
sContent

Albums
iNoAlbum
sTitle
CSVMedia

Medias
iNoMedia
sTitle
sDescription

php ini

allow_url_include = On

.htaccess example

```
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /easy-photo-blog/
```
