# General Help #
...

# Apache #
## Vhosts ##
Le fichier du virtual host pour timenote:
```
usr@pc:/var/www/timenote$ more /etc/apache2/vhosts/timenote.conf 
```
```
<VirtualHost *:80>
	ServerName timenote
	ServerAlias timenote
        ServerAdmin usr@pc.ch
      	
	DocumentRoot "/var/www/timenote/web"
      	DirectoryIndex index.php
      	
	#Alias /sf /usr/share/php/data/symfony/web/sf
	Alias /sf /var/www/timenote/lib/vendor/symfony/data/web/sf
 
	#<Directory "/usr/share/php/data/symfony/web/sf">
	<Directory "/var/www/timenote/lib/vendor/symfony/data/web/sf">
		AllowOverride All
		Allow from All
	</Directory>
	<Directory "/var/www/timenote/web">
		AllowOverride All
		Allow from All
	</Directory>
</VirtualHost>
```
également ajouter
```
usr@pc::/var/www/timenote$ more /etc/hosts
```
```
127.0.0.1	localhost.localdomain	localhost
127.0.0.X	timenote timenote.localdomain
```

## Utiliser aisément le répertoire contenant les sites ##
Source: http://doc.ubuntu-fr.org/lamp#changer_le_repertoire_www_contenant_mes_sites_web

Le répertoire contenant les sites lus par Apache est par défaut /var/www/ Ses droits par défaut sont : propriétaire=root, group=root droits rwXr-Xr-X (X signifie droit x pour les répertoires, mais pas pour les fichiers). L'utilisateur Apache est 'www-data'.
Pour accéder aux fichiers qu'il doit lire, Apache utilise donc en standard le droit 'r' de others, mais seul root peut modifier ces fichiers, ce qui n'est pas pratique.
Un ajustement de la politique des droits permet de mieux utiliser ce répertoire

Il faut commencer par s'ajouter au groupe de apache le 'www-data':
```
sudo addgroup $USER www-data
```

Puis modifier les droits
```
sudo chown -R www-data:www-data /var/www  
sudo chmod -R 770 /var/www
```

il faudra peut être redémarrer votre session ou actualiser l'explorateur pour que cela soit pris en compte.

  * permettra à apache de lire le répertoire pour produire les pages
  * permettra à tous les utilisateurs membres du groupe www-data de travailler sur les fichiers (en général, il faut créer ce groupe "www-data" et se mettre comme membre)
  * permettra à tous les fichiers et répertoires créés dans ce répertoire d'avoir les mêmes propriétés au travers du groupe (GIG activé par g=s)
  * les autres utilisateurs n'ont droit à rien (correct dans un environnement avec de nombreux utilisateurs)


# Google Project #
## Adding Image ##
// See http://code.google.com/p/support/wiki/WikiSyntax

For all of you who want to add images to your wiki using the wiki repo here is how you do it.

```
svn checkout https://project-name-here.googlecode.com/svn/wiki/ project-name-here-wiki --username your-username

cd project-name-here-wiki

# suggested good practice is to create a directory
# for attachments for each wiki page
mkdir WikiPageName.attach

cp ~/image_name.png WikiPageName.attach/

svn add WikiPageName.attach
```

Edit your wiki page to add the image links

```
vi WikiPageName.wiki

# Add the link to your image    
http://project-name-here.googlecode.com/svn/wiki/WikiPageName.attach/imagename.png

svn commit -m "Adding images and links for WikiPageName" WikiPageName
```

Go check your wiki page out, the updated page with the images should be there.

Any new images can be added just as easily.

```
svn add WikiPageName.attach/newimage.png
vi WikiPageName.wiki
svn commit -m "Adding newimage.png to WikiPageName" WikiPageName.attach/newimage.png 
```