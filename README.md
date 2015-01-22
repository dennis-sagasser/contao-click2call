## Benutzerhandbuch für den Click2Call-Rückrufservice

Contao Extension :: Click2Call - Users can be called back after entering their phone number.

[**1. Anwendungsbeschreibung und Funktionsliste**] (#features)
  
**2. Installation**
  * [**Systemvoraussetzungen**] (#requirements)
  * [**Das Extension Repository**] (#er)
  * [**Aktualisierungen**] (#update)
 
**3. Backend**
  * [**Provider verwalten**] (#provider)
  * [**Dateiverwaltung**] (#files)
  * [**System-Log**] (#log)

**4. Frontend**
  * [**Frontend-Modul Click2Call Rückrufservice**] (#module)
  * [**Formular**] (#form)

**5. Entwicklung**
  * [**Dateistruktur**] (#file_structure)
  * [**Programmierung**] (#coding)
  * [**Updates**] (#updates)

### <a name="features"></a>Anwendungsbeschreibung und Funktionsliste

Click2Call ermöglicht es, eine Contao-Installation um einen Rückrufservice zu erweitern. Es wird ein Zugang zu einem VoIP-Konto benötigt. Nach der Installation steht  im Backend ein zusätzliches Frontend-Modul und ein zusätzlicher Menüpunkt zur Verfügung, unter dem Zugänge zu VoIP-Providern konfiguriert werden. Zusätzlich dazu kann die Verfügbarkeit des Services über die Eingabe von Geschäftszeiten zeitlich begrenzt werden. Der Click2Call Rückrufservice der Firma gispack ist in Verbindung mit einer Aterisk-Telefonlage der Version 1.8 implementiert.

Folgende Auflistung gibt Aufschluss über die Funktionen des Click2Call Rückrufservices. 

* Mit Asterisk 1.8 getestet.
* Geschäftszeiten können eingerichtet werden.
* Stellt ein zusätzliches Backend-Modul zur Verfügung.
* Firmenlogo kann dem Frontend-Modul hinzugefügt werden.
* Nur deutsche Telefonnummern werden akzeptiert.
* Die ID des Empfängers wird im Display angezeigt.
* Formular durch Captcha gesichert.

### <a name="requirements"></a>Systemvoraussetzungen

* Lauffähiges Contao in der Version 2.11
* SOAP-Erweiterung für PHP
* Aktueller Webbrowser möglichst mit aktivierten JavaScript und erlaubten Cookies
* Zugang zu VoIP-Konto (Hostname/IP-Adresse, Benutzername, Passwort)

### <a name="update"></a>Das Extension Repository

Die Anwendung ist im Extension Repository hinterlegt und kann mit wenigen Klicks installiert werden. Die Installation der Anwendung erfolgt im über den Menüpunkt „Erweiterungskatalog“ im Contao Backend. Über verschiedene Filter oder die Volltextsuche kann nach Click2call gesucht werden. Mit der Installation werden automatisch Verzeichnisse, Dateien und Datenbanktabellen angelegt und das Programm ist sofort einsatzbereit.

### <a name="provider"></a>Provider verwalten

Über den Menüpunkt „Einstellungen“ der Kategorie „Click2Call Rückrufservice“ werden Providerdaten hinzugefügt, bearbeitet oder gelöscht. In der folgenden Übersicht werden die Felder der Provider-Konfiguration und die vom System erwarteten Eingabewerte aufgelistet.

| Feldname                  | Beschreibung                                                                                                                                                                       | Eingabeprüfung                                |
|---------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-----------------------------------------------|
| Provider*                 | Name des Providers                                                                                                                                                                 | erweitert alphanumerisch, maximal 128 Zeichen |
| Registrar*                | Host-Name oder die IP-Adresse.                                                                                                                                                     | erweitert alphanumerisch, maximal 128 Zeichen |
| Benutzername*             | Bitte geben Sie den Benutzernamen an, mit dem Sie sich beim Provider anmelden möchten.                                                                                             | alphanumerisch, maximal 64 Zeichen            |
| Passwort*                 | Bitte geben Sie ein Passwort für den Benutzer ein.                                                                                                                                 | beliebig, maximal 32 Zeichen                  |
| Kanal/ Nebenstelle*       | Bitte geben Sie den Kanal / die Nebenstelle an, auf dem / der Sie dieRückrufanfrage entgegennehmen möchten z.B. SIP/XXX, IAX2/XXXX, ZAP/XXXX, local/1NXXNXXXXXX@from-internal usw. | erweitert alphanumerisch, maximal 128 Zeichen |
| Kontext*                  | Kontext für das Rauswählen, standardmäßig „from-internal“ für Asterisk                                                                                                             | erweitert alphanumerisch, maximal 32 Zeichen  |
| Port                      | Port für den Verbindungsaufbau, standardmäßig 5038 für den Asterisk Manager                                                                                                        | numerisch, maximal 5 Zeichen                  |
| Wartezeit                 | Dauer der Rückrufanfrage, nur numerische Zeichen                                                                                                                                   | numerisch, maximal 2 Zeichen                  |
| Priorität                 | Priorität des Anrufs an, 1-4 für Asterisk                                                                                                                                          | numerisch, maximal 2 Zeichen                  |
| Versuche                  | Maximale Anzahl an Rückrufversuchen an                                                                                                                                             | numerisch, maximal 2 Zeichen                  |
| Verfügbarkeit beschränken | Die Checkbox aktiviert Felder für alle Wochentage, in denen minutengenau Uhrezeiten für Start und Stopp des Services eingetragen werden können.                                    | Format hh:mm                                  |

### <a name="files"></a>Dateiverwaltung

Die Dateiverwaltung ist unter der Kategorie „System“ des Backend-Menüs zu finden. Dort lässt sich unter anderem das Logo für den Rückrufservice hochladen, welches dadurch im entsprechenden Modul auswählbar ist. Um ein Bild hochzuladen, wird die Schaltfläche „Datei-Upload“ betätigt und über die Pfeil-Symbole der Ordner ausgewählt, in dem das Bild abgelegt werden soll. Nun kann das Bild über die Schaltfläche „Durchsuchen“ bestimmt und anschließend hochgeladen werden. Es ist auch möglich, mehrere Bilder gleichzeitig hochzuladen. Beim Upload sollte darauf geachtet werden, dass das Bild nicht die in den Contao-Einstellungen angegebenen Maße oder die maximale Dateigröße überschreitet. Nach erfolgreichem Ablauf wird eine entsprechenden Erfolgsmeldung ausgegeben und das Bild steht zur weiteren Verwendung im angegebenen Ordner bereit.  

### <a name="log"></a>System-Log

Das System-Log von Contao befindet sich unter der Kategorie „System“ und bietet eine Übersicht über alle im System gespeicherten Programmmeldungen. An dieser Stelle werden auch Meldungen der Click2Call-Erweiterung gespeichert. Demnach werden Erfolgs- und Fehlermeldungen in folgender Form aufgezeichnet:

* Connection established between „\<Host\>“ and „\<Name\>\<\<Rufnummer\>\>“. 
* Connection refused by <Registrar> (#111).

### <a name="module"></a>Frontend-Modul Click2Call Rückrufservice

In der Bearbeitungsansicht des Moduls wird als Modultyp „Click2Call Rückrufservice“ gewählt, um die Einstellungen für das Frontend-Formular vornehmen zu können. Die folgende Übersicht listet alle hinzugekommenen Felder des Moduls und die erwarteten Eingabewerte auf.

| Feldname            | Beschreibung                                                         | Eingabeprüfung                        |
|---------------------|----------------------------------------------------------------------|---------------------------------------|
| Konfiguration*      | Weist dem Formular eine Provider-Konfiguration zu                    | \<Provider-Name\> \[Benutzername\] (\<ID\>) |
| Teaser              | Text vor dem Formular                                                | erweitert alphanumerisch, kein HTML   |
| Ein Bild hinzufügen | Die Checkbox aktiviert weitere Felder für die Logobild‑Einstellungen |                                       |

Das fertig konfigurierte Modul kann dann entweder im Seitenlayout unter dem Menüpunkt „Themes“ an gewünschter Position oder in einem Artikel als Inhaltselement mit dem Elementtyp Modul eingebunden werden.

### <a name="form"></a>Formular

In der folgenden Übersicht werden die Felder des Frontend-Formulars für den Rückrufservice und die vom System erwarteten Eingabewerte aufgelistet.

| Feldname            | Beschreibung                                                         | Eingabeprüfung                        |
|---------------------|----------------------------------------------------------------------|---------------------------------------|
| Ihr Name*           | Name des Nutzers                                                     | alphabetisch |
| Ihre Nummer*        | Zielrufnummer des Anrufs                                             | deutsche Telefonnummer mit Vorwahl   |
| Sicherheitsabfrage* | Captcha mit Rechenaufgabe                                            | numerisch, Lösung der Rechenaufgabe  

Nach dem Absenden des Formular wird im Erfolgsfall folgende Meldung ausgegeben:

Wir verarbeiten Ihre Rückruf-Anfrage, bitte warten Sie einen Moment…

Sind alle Angaben korrekt, klingelt die in der Konfiguration angegebene Nebenstelle und nach Abnehmen des Hörers wird eine Verbindung zwischen dieser Nebenstelle und dem im Formular eingetragenen Anschluss hergestellt. 

Andernfalls wird eine Fehlermeldung generiert, die Aufschluss über die Ursache des Fehlers gibt. Die folgende Tabelle zeigt mögliche Fehlermeldung, deren wahrscheinliche Ursache und den dazugehörigen Lösungsansatz.

| Fehlermeldung                                                                                                      | Ursache                                                                                                                 | Lösung                                                                                                                               |
|--------------------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------------------------------------------------------------------------------|
| Bitte füllen Sie das Feld <Feldname> aus!                                                                          | Pflichtfeld leer gelassen                                                                                               | Pflichtfeld ausfüllen                                                                                                                |
| Bitte geben Sie nur Buchstaben ein!                                                                                | Pflichtfeld Name enthält nicht alphabetische Zeichen                                                                    | unzulässige Zeichen entfernen                                                                                                        |
| Ihre Nummer* muss eine gültige deutsche Telefonnummer mit Vorwahl sein, die nur Ziffern enthält z.B. 033816198160. | Pflichtfeld für Telefonnummer enthält ungültige Telefonnummer                                                           | deutsche Telefonnummer mit Vorwahl eintragen                                                                                         |
| Bitte beantworten Sie die Sicherheitsfrage!                                                                        | Pflichtfeld für Sicherheitsfrage leer oder Ergebnis der Rechnung falsch                                                 | richtige Antwort der Rechenaufgabe ins Feld eintragen                                                                                |
| Derzeit ist unser Büro leider nicht besetzt.                                                                       | Anfrage liegt außerhalb der angegebenen Bürozeiten                                                                      | Bürozeitenin Erfahrung bringen und erneut versuchen                                                                                  |
| Ein Verbindungsfehler ist aufgetreten. <Fehlerbeschreibung> <Fehlernummer>.                                        | Internetverbindung gestört / Zugang zum Provider falsch konfiguriert / Provider nicht erreichbar oder blockiert Anfrage | Internetverbindung prüfen, Providerkonfiguration prüfen, Provider benachrichtigen, eventuell zum späteren Zeitpunkt erneut versuchen |

### <a name="file_structure"></a>Dateistruktur

Die Ordner- und Dateistruktur folgt dem von Contao vorgegebenen Muster. 

Auf der obersten Ebene befinden sich die Ordner „config“, „dca“, „languages“ und „templates“ sowie die Moduldatei „ModuleClick2Call.php“ und der Hook „HookGermanNumbers.php“. Die Moduldatei enthält die Modulklasse „ModuleClick2Call“, während der Hook die Validierung auf deutsche Telefonnummern für das Frontend-Formular beinhaltet.  Alle Ordner beinhalten eine „.htaccess“-Datei, die vor unerlaubtem Zugriff schützt. 

Der Ordner „config“ beinhaltet die Konfiguration der Erweiterung:

* „config.php“: Registrierung von Front- sowie Backend-Modul und Hook
* „database.sql“: SQL-Tabellenstruktur

Im Ordner „dca“ sind die Data Container Arrays für das Frontend (tl_click2call.php) und Backend (tl_module.php) gespeichert.


Im Ordner „languages“ liegen die Übersetzungen der Erweiterung. Jede Übersetzung bekommt ihren eigenen Ordner mit dem entsprechenden Länderkürzel und enthält folgende Dateien:

* „default.php“: Sonstiges
* „modules.php“: Übersetzung der Modultitel und -beschreibungen
* „tl_click2call.php“: Übersetzung des Frontend-Moduls
* „tl_module.php“: Übersetzung des Backend-Moduls

Schließlich sind im Ordner „templates“ das html5-Template „mod_click2call_form.html5“ und das xhtml-Template „mod_click2call_form.xhtml“ für die Darstellung des Formulars im Frontend zu finden.


### <a name="coding"></a>Programmierung

Jede Datei enthält im Kopfbereich Informationen zu Lizenz, Autor, Paketzugehörigkeit und Copyright. 

Die Klasse „ModuleClick2Call“ befindet sich in der gleichnamigen PHP-Datei und beinhaltet Variablen, Funktionen sowie die Programmlogik. Außerdem gibt sie Aufschluss über die Benennung von Variablen und die übersichtliche Formatierung von Programmcode.

### <a name="updates"></a>Updates

Etwaige Erweiterungen, Anpassungen, Korrekturen oder Verbesserungen des Programmcodes werden im Extension Repository als Releases veröffentlicht und stehen somit als Update zur Verfügung. Hinter Version 1.0.0 stable von „click2call“ steckt also das erste Major-Release, welches stabil läuft und noch keine Minor- und Maintenance-Version zählt. Das Freigabedatum gibt Auskunft über den Zeitpunkt der letzten Aktualisierung. 

Über die Erweiterungsverwaltung der Contao-Installation wird automatisch darauf hingewiesen, ob eine neue Version von Click2Call verfügbar ist. Zudem sind hier Support-Informationen abrufbar und die Erweiterung kann aktualisiert oder deinstalliert werden.

Fragen, Anregungen und Kritik helfen Click2Call zu verbessern und können an folgende E-Mail-Adresse gesendet werden: sagasser@gispack.com. 
