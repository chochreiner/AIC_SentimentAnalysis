SENTIMENT ANALYSIS
==================

Short install instructions
--------------------------

 - Copy the file __sentiments/app/config/database.php.default__ to __sentiments/app/config/database.php__ and change the username and pw values for your environment  
 - Create a database as defined in the database.php  
 - Run in the shell __Console/cake schema create/update__ to build the database tables  
 - Optionally: Run the __sentiments/app/config/Schema/test_data.sql__  




Wie starte ich die Applikation?
-------------------------------

Anmerkungen: Die "wie setze ich den Apache auf" sind aus Sicht von Ubuntu/Debian geschrieben.
			 Ihr werdet ein wenig nachforschen muessen, wie ihr das auf Eurem OS einstellt.
			 	Alternative ist natuerlich Virtual Box eine Option :)
			 	Mir ist klar, dass nicht alle Deb/Ubu verwenden, solltet ihr Hilfe brauchen, bin ich natuerlich gern bereit
			 	zu unterstuetzen, einfach melden @ e0725887@student.tuwien.ac.at - werde ASAP zurueckschreiben :) 

1. Sicherstellen, dass Apache, PHP, MySQL vorhanden sind, wenn nicht installieren!
	a. Windows: XAMPP
	b. Deb/Ubu/... Linux: 
		apt-get install apache2 mysql-server phpmyadmin
	c. OSX: uff.. sorry, nie verwendet :) mWn gibt's XAMPP eh auch dafuer
2. Checkoute das Projekt
	a. Lege einen vhost an.
		Mein vhost File sieht so aus:
		
		In: /etc/apache2/vhost
		cp default sentiments # sentiments ist wichtig, damit ihr spaeter einen befehl mit diesem namen ausfuehren koennt, zumindest unter deb/ubu/...
		 
		
		LoadModule rewrite_module libexec/apache2/mod_rewrite.so # find / -name mod_rewrite.so || sollte libexec/apache2/mod_rewrite.so nicht funktionieren (symlink)
		<VirtualHost 127.0.1.12:80>							# Die 127.0.1.12 ist die gleiche IP wie im host file
			ServerAdmin webmaster@localhost
			ServerName aic.local							# Wie im host file
			DocumentRoot /home/alex/git/uni/aic/sentiments/ # Wo liegt das Projekt?
			<Directory />
				Options FollowSymLinks
				AllowOverride All							# Hier unbedingt auf ALL setzen, sonst funktioniert 
															# rewrite_module ned.
			</Directory>
		
			ErrorLog ${APACHE_LOG_DIR}/error.log
		
			# Possible values include: debug, info, notice, warn, error, crit,
			# alert, emerg.
			LogLevel warn
		
			CustomLog ${APACHE_LOG_DIR}/access.log combined
		
		    Alias /doc/ "/usr/share/doc/"
		    <Directory "/usr/share/doc/">
		        Options Indexes MultiViews FollowSymLinks
		        AllowOverride None
		        Order deny,allow
		        Deny from all
		        Allow from 127.0.0.0/255.0.0.0 ::1/128
		    </Directory>
		
		</VirtualHost>
		
		
			
	b. Lege einen Eintrag im host-file an.
		Auszug aus meinem host-file:
		# These are for college related projects
		127.0.1.10	idp.local
		127.0.1.11	sp.local
		127.0.1.12	aic.local
	c. Unter Debian/Ubuntu/Mint: 
		a2enmod rewrite
		a2ensite sentiments
		Ansonsten unbedingt googlen wie man das Modul einschaltet, sowie die Seite "sentiments"
		Wichtig: "sentiments" weil ich das genau so genannt habe wie mein vhost File.
3. Quick CakePHP Heads-Up:
	a. CakePHP arbeitet nach dem MVC-Pattern (What a surprise! :D).
	b. Jeder Controller, den wir anlegen muss von AppController (oder ein Kind v. AppController) erben.
	c. Jeder Controller hat zumindest ein Model
		c1. Einschub: Controller/Model haben in CakePHP eine Namenskonvention
		c2. Namenskonvention: Modelle sind immer in der Einzahl (Article, Company, ArticleTask...),
							  Controller haben: <Model_Plural>Controller
		c3. Views haben einen Unterordner, der genau so zu heiszen hat wie <Model_Plural> - dort gibt's dann die *.ctp Files.
	d. Aufruf funktioniert (mit mod_rewrite): 
		aic.local/<ViewOrdner>/<Public Function>
		aic.local/articles/grabArticles
			Laedt die Artikel von Yahoo! Finance (via RSS), auszer den "Video" Channel
		aic.local/articles/createTasks
			Laedt alle Artikel aus der DB und macht darausz "Chop Suey" - zerteilt es in kleine leckere Tasks (5 Paragraphen)
				# TODO: Ja, das ist sub-optimal. Input wird gerne angenommen.
				#		Andere Idee: Artikel parsen, nach Companies durchsuchen (tblcompanies beinhaltet die...) & taggen
		aic.local/articles/pushTasksToMW
			Laedt den "Chop Suey" und reicht ihn an MW (im Sandbox Mode) weiter.
			Die Task URL wird persistiert (steht dann in tbltasks)


