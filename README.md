# Filmstadt Arendsee Panel

Das FSA-Center ist gedacht als digitales Zentrum der Filmstadt Arendsee. In ihm sollen die allgemeinen Daten der diversen Projekte zusammen laufen. so zb. die Buchungen für Zimmer, Statistiken über Nutzung, Finanzen, Termine, etc.  
Dabei bleiben die Websites der Projekte eigenständig, jedoch laufen die allgemeinen Daten, welche relevant sind für die gesamte Filmstadt, hier zusammen und können administriert werden.  
  
Das Center kann also Schritt für Schritt um Funktionalität erweitert werden. Parallel dazu können die Websites der Projekte eigenständig erstellt werden. Für die allgemein relevanten daten kann dann die gemeinsame Datenbank des fsa-center genutzt werden.  
Hierbei soll das Konzept so allgemein wie möglich gehalten werden, um spätere noch unabsehbare Ideen direkt unterstützen zu können.

## Instalation
Einfach clonen und dann im verzeuchniss

composer install
php artisan migrate
php artisan key:generate
php artisan serve
npm run dev

ausführen und testen.
"php artisan serve" und "npm run dev" müssen paralel laufen da "npm run dev" den server für die compilierung des css und js stellt

## Programmierung
Programmiert soll das fsa-center in PHP-Laravel werden. Gehostet über Microsoft Azure. Die Datenbank ist eine normale MySQL Datenbank.
Dieser Ansatz sollte ein Kompromiss sein zwischen den Vorteilen von Cloudhosting, Containerization und den damit verbundenen Nachteilen der Abhängigkeit und des Datenschutzes.  Da jederzeit auf Virtuelle- oder Routserver umgestigen werden und auch selbst gehostet werden kann. Auch eine offline Instanz auf dem Campgelände ist denkbar.
Konkret läuft der Code in einem Azure AppService welcher über einen DNS-Tunnel verbunden ist mit der in Azure MySQL Datenbank. Die Projekt websites laufen ebenfall in ihren eigegen AppServices. 
Evtl kann in der Zukunft auch mit Docker Containern gearbeitet werden um schnelles scaling zu ermöglichen. Erstmal sollte das aber nicht nötig sein.

## Erste Entwicklungsschritte
Als eines der ersten Dinge sollte die Buchung für die diversen Projekte hier zusammen geführt werden.
Hierbei sind die Websites der Projekte getrennt von den Buchungen zu betrachten. Die Projektwebsite ist nur die Werbe- und Infomationsplatform für diese. Für die Buchungen werden die Besucher auf die auf die fsa-center-Buchungsmaske weiter geleitet. Die abgeschlossenen Buchungen werden dann dort in der Datenbank erfasst und können ausgelesen werden.
So können weiterlaufenden Daten der Buchung, zb Bezahltstatus, Info mails, etc zentral über ein Webinterface eingesen und bearbeitet werden.
Dazu kann die Projektwebsite die Daten über die Auslastung und Termine der Buchungszeiträume durch eine API von der fsa-panel Datenbank einholen und dynamisch auf der Infoseite anpassen.



#### Memo an mich
Bisher habe ich nur ein laravel projekt angelegt und darin breeze für das login system installiert. dazu habe ich noch localzation, also mehrere sprachen eingerichtet, das heist du kannst suf english die dinge eingeben und dan den string in einer de.json übersetztn. dann haben ich noch die migrations für die ersten tabellen angelegt, aber nciht die für ihre verbunds tabellen, das kannst du dann machen. mehr hab ich noch nciht gemacht. menno. mach weiter und sei kein perfektionist.
