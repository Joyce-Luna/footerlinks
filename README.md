################################ Readme Englisch / German ################################

# phpBB 3.2 Extension - Footerlinks
- License [GPLv2](license.txt)

footer_links created 2016 Joyce&Luna by phpBB-Style-Design.de ( https://phpbb-style-design.de )

### Requirements
- phpBB 3.1 < 3.2 or higher
- PHP 5.4 < 7.0 or higher

#### Languages supported
- English
- German 

##### installation
1. Download the archive, unpack.
2. Copy the contents from the unzipped folder in the file path "phpBB / ext / joyce luna / footer_links"
3. Open the folder: joyce luna / footer_links / styles / prosilver / template / event / overall_footer_after.html and adjust the link list.
4. Go to the "ACP"> "Customize"> "Extensions" and activate the extension "footer_links".
5. Clearing the Cache

###### Example, HTML
Note: Edit the thoroughly overall_footer_after.html.
Please change the placeholder #link and write after a small link text.

The titles of the boxes can be changed with language variables.
```html
		<li><h2>{L_FRIENDSLINK}</h2></li>
		<li><h2>{L_ADVERTISINGLINK}</h2></li>
		<li><h2>{L_SURFTIPPLINK}</h2></li>
```

specifications:
```php
	'SURFTIPPLINK'					 => 'Usefull links',
	'ADVERTISINGLINK'				 => 'Advertising',
	'OFFERLINK'						 => 'Specials',
	'SHOPLINK'						 => 'Store',
	'ARTICLELINK'					 => 'Products',
	'INFORMATIONLINK'				 => 'Information',
	'FRIENDSLINK'					 => 'Friends',
```

Own language variables can be added under language/en/main.php added.

HTML dump: The links are examples.
Note: Please change the overall_footer_after.html carefully.

==========================================================

<!-- footerlinks created 2016 Joyce&Luna by phpBB-Style-Design.de ( https://phpbb-style-design.de ) -->
```html
<br>
<div class="footer-links">
	<div class="panel bg3">
		<ul>
		<li><h2>{L_FRIENDSLINK}</h2></li>
		<li><a href="#link">Link</a></li>
		<li><a href="#link">Link</a></li>
		<li><a href="#link">Link</a></li>
		<li><a href="#link">Link</a></li>
		<li><a href="#link">Link</a></li>
		</ul>
	</div>
<div class="panel bg3">
	<ul>
		<li><h2>{L_ADVERTISINGLINK}</h2></li>
		<li><a href="#link">Link</a></li>
		<li><a href="#link">Link</a></li>
		<li><a href="#link">Link</a></li>
		<li><a href="#link">Link</a></li>
		<li><a href="https://phpbb-style-design.de">phpBB Style Design</a></li>
	</ul>
	</div>
<div class="panel bg3">
	<ul>
		<li><h2>{L_SURFTIPPLINK}</h2></li>
		<li><a href="#link">Link</a></li>
		<li><a href="#link">Link</a></li>
		<li><a href="https://www.phpbb.de/community/">phpBB Support German</a></li>
		<li><a href="#link">Link</a></li>
		<li><a href="#link">Link</a></li>
	</ul>
</div>
</div>
<br>
```

===========================================================================================
Note: created 2016 Joyce&Luna by phpBB-Style-Design.de ( https://phpbb-style-design.de )


# PhpBB 3.2 Extension - Footerlinks
- Lizenz [GPLv2] (license.txt)

Footer_links erstellt 2016 Joyce&Luna von phpBB-Style-Design.de ( https://phpbb-style-design.de )

### Bedarf
- PhpBB 3.1 < 3.2 
- PHP 5.4 < 7.0 

#### Languages 
- English
- German 

##### Einbau
1. das Archiv herunterladen, entpacken.
2. Kopieren Sie den Inhalt aus dem entpackten Ordner, in den Dateipfad "phpBB / ext / joyceluna / footer_links"
3. Öffnen sie den Ordner: joyceLuna/footer_links/styles/prosilver/template/event/overall_footer_after.html und passen die Linkliste an.
4. Gehen Sie ins "ACP"> "Anpassen"> "Erweiterungen" und aktivieren Sie die Erweiterung "Footerlinks".
5. Danach löschen Sie den Cache.

###### Beispiel, HTML
Hinweis: Bearbeiten Sie die gründlich overall_footer_after.html.
Bitte ändern Sie den Platzhalter #link und schreiben Sie danach einen kleinen Link Text.

Die Überschriften der Boxen können beliebig mit Sprachvariablen geändert werden.
```html
		<li><h2>{L_FRIENDSLINK}</h2></li>
		<li><h2>{L_ADVERTISINGLINK}</h2></li>
		<li><h2>{L_SURFTIPPLINK}</h2></li>
```

Vorgaben:
```php
	'SURFTIPPLINK'					 => 'Nützliche Links',
	'ADVERTISINGLINK'				 => 'Werbung',
	'OFFERLINK'						 => 'Angebote',
	'SHOPLINK'						 => 'Shop',
	'ARTICLELINK'					 => 'Artikel',
	'INFORMATIONLINK'				 => 'Informationen',
	'FRIENDSLINK'					 => 'Freunde',
```
Eigene Sprachvariablen können unter language/de/main.php hinzu gefügt werden.

HTML-Dump: Die Links sind Beispiele.
Hinweis: Bitte ändern Sie die overall_footer_after.html sorgfältig.

==========================================================

<!-- footerlinks created 2016 Joyce&Luna by phpBB-Style-Design.de ( https://phpbb-style-design.de ) -->
```html
<br>
<div class="footer-links">
	<div class="panel bg3">
		<ul>
		<li><h2>{L_FRIENDSLINK}</h2></li>
		<li><a href="#link">Link</a></li>
		<li><a href="#link">Link</a></li>
		<li><a href="#link">Link</a></li>
		<li><a href="#link">Link</a></li>
		<li><a href="#link">Link</a></li>
		</ul>
	</div>
<div class="panel bg3">
	<ul>
		<li><h2>{L_ADVERTISINGLINK}</h2></li>
		<li><a href="#link">Link</a></li>
		<li><a href="#link">Link</a></li>
		<li><a href="#link">Link</a></li>
		<li><a href="#link">Link</a></li>
		<li><a href="https://phpbb-style-design.de">phpBB Style Design</a></li>
	</ul>
	</div>
<div class="panel bg3">
	<ul>
		<li><h2>{L_SURFTIPPLINK}</h2></li>
		<li><a href="#link">Link</a></li>
		<li><a href="#link">Link</a></li>
		<li><a href="https://www.phpbb.de/community/">phpBB Support German</a></li>
		<li><a href="#link">Link</a></li>
		<li><a href="#link">Link</a></li>
	</ul>
</div>
</div>
<br>
```
===============================================================================
Hinweis: erstellt 2016 Joyce & Luna von phpBB-Style-Design.de ( https://phpbb-style-design.de )

