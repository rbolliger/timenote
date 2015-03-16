# Introduction #
"Hour" table contains all hours declared by users.


## Freemind representation ##
![http://timenote.googlecode.com/svn/wiki/TableHour.attach/Hour.jpeg](http://timenote.googlecode.com/svn/wiki/TableHour.attach/Hour.jpeg)

## Table Content ##

| **Field** | **Description** |
|:----------|:----------------|
| ID | hour primary key |
| user\_id | link to user primary key |
| project\_id | link to project pk where the hour is declared |
| category\_id | link to category pk |
| date\_start | Date start of the working activity |
| date\_end | Date end of the working activity |
| comment | Text area where the suer can add notes |

pending fields + fields to modify:

| date\_start | Date start of the working activity GMT (no DST) |
|:------------|:------------------------------------------------|
| date\_end | Date end of the working activity GMT (no DST) |
| local\_date\_start | Date start of the working activity in user current timezone (with DST) |
| local\_date\_end | Date end of the working activity in user current timezone (with DST) |
| DST\_start | DST?, timezone or region info at the start of the working activity [see](DateAndTime#dbe_2010-12-01:.md) |
| DST\_end | DST?, timezone or region info at the end of the working activity [see](DateAndTime#dbe_2010-12-01:.md) |
| tags | tag to help searches |