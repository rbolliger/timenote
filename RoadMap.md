<a href='Hidden comment: 
info to read:
http://en.wikipedia.org/wiki/Technology_roadmap
http://en.wikipedia.org/wiki/Software_release_life_cycle
http://en.wikipedia.org/wiki/Software_versioning
(fr) http://fr.wikipedia.org/wiki/Version_d%27un_logiciel
'></a>

# RoadMap #

A google doc roadmap/feature list [is available here](http://spreadsheets.google.com/pub?key=t8SEjJJ-Nc0JuDbL0_zJ7eQ&output=html).

## Overview ##
| **Version** | **Name** | **Objective** | **User** | **Project** | **Hours/Entry** | **Details** |
|:------------|:---------|:--------------|:---------|:------------|:----------------|:------------|
| 0 | ? |  preliminary research and feasibility study | 	 | 	 | 	 | Discuss and choose well |
| 1 | ? | single user full functional| unlogged, logged | 	global project trees | User see only his hours | User can register, log, enter hour, manage global tree, export hours |
| 2 | ? | small company| unlogged, user, manager | global project trees with permissions | 	User see only his hours, manager see all hours | As above, plus manager permissions (who can edit what), manager can see user's hours, Money aspect  |
| 3 | ? | big compagny| unlogged, user, group manager, manager | 	global project trees complex permissions | User see only his hours, group manager see all group hours, manager see all hours | As above, plus fine manager permissions (group), manager can see group user's hours |
| 4 | ? | multi compagny| (unlogged, user, group manager, manager) for each company	 | (global project trees complex permissions) for each company	 | As above, many permissions | As above, more company, multi domain, etc... |


## Details ##
### 0.x.x ###
| **front/backend** | **category** | **feature** | **description** | **comment** | **check** |
|:------------------|:-------------|:------------|:----------------|:------------|:----------|
| frontend or backend | user, manager, hours, projects | feature name | feature description | comment | check |

<a href='Hidden comment: 
copy for a new line:
|| frontend or backend || user, manager, hours, projects || feature name || feature description || comment || check ||
'></a>


## Versioning ##
**major**.**minor**.**micro**

The major, minor and micro fields are integer numbers represented in decimal notation and have the following meaning:
  * **major** - When the major version changes (in ex. from "1.5.12" to "2.0.0"), then backward compatibility with previous releases is not granted.
  * **minor** - When the minor version changes (in ex. from "1.5.12" to "1.6.0"), then backward compatibility with previous releases is granted, but something changed in the implementation of the Component. (ie it methods could have been added)
  * **micro** - When the micro version changes (in ex. from "1.5.12" to "1.5.13"), then the the changes are small forward compatible bug fixes or documentation modifications etc.
Sources: [apache](http://excalibur.apache.org/apidocs/org/apache/avalon/framework/Version.html), [Symfony](http://trac.symfony-project.org/wiki/HowToContributeToSymfony#Officialreleases), [Wikipedia fr](http://fr.wikipedia.org/wiki/Version_d%27un_logiciel#Forme_g.C3.A9n.C3.A9rale)