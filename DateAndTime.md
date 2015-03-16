# Date and Time #

Date and Time related problematic.
  * [DateAndTime#Timezone](DateAndTime#Timezone.md) Timezone
  * Daylight saving
  * Datetime provenance (server, client (JS), [NTP](http://fr.wikipedia.org/wiki/Network_Time_Protocol), offset)

## Timezone ##



## Daylight ##



## Provenance ##
  * Client with JavaScript (simplest)
  * Server (date()) (simple but can be erroneous for foreign user)
  * server/client comparison in JS (normal)
  * [NTP](http://fr.wikipedia.org/wiki/Network_Time_Protocol) server (more complex)
  * External/custom (like enterprise time server) (very complex)
=> User prefs: time offset to correct error.

Decision: in first revision, choose one of these options, but implement them as "plugins" in order to let to the user the choice of changing them. HOWTO: create an object interface with some basif function calls and then develop objects based on that interface.


---

# Others infos #

# PHP #

Globally read [Date and Time Related Extensions](http://www.php.net/manual/en/refs.calendar.php).
  * [List of Supported Timezones](http://www.php.net/manual/en/timezones.php)
  * latest version of the [timezonedb](http://www.php.net/manual/en/timezones.php) (via PECL's)
  * **[PHP Date/Time Functions](http://www.php.net/manual/en/book.datetime.php)**
  * [date\_sunrise()](http://www.php.net/manual/en/function.date-sunrise.php) and [date\_sunset()](http://www.php.net/manual/en/function.date-sunset.php)
  * [PHP timezones handlings](http://ch2.php.net/manual/en/class.datetimezone.php)
  * PEAR [Date.php](http://pear.php.net/manual/en/package.datetime.date.php): examples using the extension [here](http://pear.php.net/manual/en/package.datetime.date.examples.php) and [here](http://www.builderau.com.au/program/php/soa/Get-the-correct-time-by-converting-between-time-zones-with-PHP-and-PEAR/0,339028448,339273806,00.htm#)
  * Zend Framework
    * [Zend\_Date](http://framework.zend.com/manual/en/zend.date.html) for date manipulation. Performance issues discussed [here](http://www.wowww.ch/index.php?post/2008/12/25/Zend-Framework-Zend-Date-performance-et-contre-performance) and [here](http://riotech.blogspot.com/2009/03/zenddate-vs-datetime-performance.html)
    * [Zend\_Locale](http://framework.zend.com/manual/en/zend.locale.html) for conversion between locales. Dates and times manipulations [here](http://framework.zend.com/manual/en/zend.locale.date.datesandtimes.html)

# Symfony #
  * Discussion about usage of timezones [here](http://groups.google.com/group/symfony-users/browse_thread/thread/e00be755e772c9df) and continued [here](http://groups.google.com/group/symfony-users/browse_thread/thread/9e73abae893f2aa2)

  * [Timezone choice widget](http://trac.symfony-project.org/browser/branches/1.3/lib/widget/i18n/sfWidgetFormI18nChoiceTimezone.class.php)

# MySQL #

  * [MySQL timezone support](http://dev.mysql.com/doc/refman/5.0/en/time-zone-support.html) and [Date and Time functions](http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html)
  * [Here](http://stackoverflow.com/questions/1003171/why-not-use-mysqls-timestamp-across-the-board) other storage formats than timestamp are suggested.
  * Be carful when using [UNIX\_TIMESTAMP()](http://dev.mysql.com/doc/refman/5.1/en/date-and-time-functions.html#function_unix-timestamp) MySQL function

# PHP and MySQL #

  * [This](http://jokke.dk/blog/2007/07/timezones_in_mysql_and_php) is a tutorial explaining how to handle timezones between PHP and MySQL. Read also the comments.
  * [This](http://www.sjhannah.com/blog/?p=113) and [this](http://www.ultramegatech.com/blog/2009/04/working-with-time-zones-in-php) are possible solution to handle timezones

# Miscellaneous #
  * [Unix Millennium bug, Y2K38](http://en.wikipedia.org/wiki/Year_2038_problem)
  * [RFC 3339](http://tools.ietf.org/html/rfc3339)
  * [W3C specification & RFC 3339 IETF Internet standard](http://www.w3.org/TR/NOTE-datetime)
  * [The Best of Dates, The Worst Of Dates](http://www.exit109.com/~ghealton/y2k/yrexamples.html)


---

# Problematics #
We have to distinguish the storage and the display of the date. The display is made with the user's GMT choice (stored in its preferences) and the date storage should be done with a referential like GMT0 for exemple.
This solution is good as far as users are always inputing their hours in the same GMT than their preferences. If the user want to input his hours in a work travel in different timezone without make himself the conversion, we have to store the GMT for each entries.

# Solution #
#### dbe 2010-12-01: ####

Is needed a 3rd table field to store the DSL information and I propose the followings possibilities:

  1. DSL true/false
  1. timezone -12/+12 (by using this and the 2 times stored you can extract the DST)
  1. region/country info (by using php build in functions you can recover DST, but affected by exceptions i.e. Israel's Ministry of Interior decides every year if DST need to be used)


#### rbo 2010-11-01: ####

In fact, we decided to save two dates: local AND utc. From the comparison of both, we can get all required informations. The user can also set his location with respect to timezones. From this data, we can automatically calculate daylight saving time from TimeZone php classes.


#### dbe + nbo + rbo 2010-11-01: ####

We decided to store the date and time using only 1 timezone (e.g. GMT) in a yet to define format (YYYY-MM-DD hh:mm:ss, unix timestap or personalized version of it) in a table field. So if a New Yorker store 15:30:22 EST the database will have an entry with 20:30:22. In another table field will be stored the the user current time in his timezone.

We though about the daylight saving and we found 3 possibilities:

  1. we ignore daylight savings (the user will enter his times using his current time and have only to pay attention if working during the transition).
  1. user manually select if the times he enters are with or without it (time is stored in database using a timezone without daylight saving, and DST will be saved in another field).
  1. automatic, with time stored in a fixed timezone (can be tricky and exception are hard to manage and need information about user country and region) and an additional table field with region information.

=> check http://www.anicon.ca/timezone-script.php for a custom code....


#### nbo 2009-11-20: ####

I propose the following solution: all date are saved in GMT+0 format in DB. Using the PHP [DateTimeZone](http://ch2.php.net/manual/en/class.datetimezone.php) classes and the [gmdate](http://ch2.php.net/manual/en/function.gmdate.php), [gmmktime](http://ch2.php.net/manual/en/function.gmmktime.php) and [gmstrftime](http://ch2.php.net/manual/en/function.gmstrftime.php) will allow us to deal with GMT/UTC but we need to save user's GMT/UTC preference for each entry in database. A way to do that is tu use the W3C:

Complete date plus hours, minutes and seconds:

YYYY-MM-DDThh:mm:ssTZD (eg 1997-07-16T19:20:30+01:00) where:

```
     YYYY = four-digit year
     MM   = two-digit month (01=January, etc.)
     DD   = two-digit day of month (01 through 31)
     hh   = two digits of hour (00 through 23) (am/pm NOT allowed)
     mm   = two digits of minute (00 through 59)
     ss   = two digits of second (00 through 59)
     s    = one or more digits representing a decimal fraction of a second
     TZD  = time zone designator (Z or +hh:mm or -hh:mm)
```

Read
  * [RFC 3339](http://tools.ietf.org/html/rfc3339)
  * [W3C specification & RFC 3339 IETF Internet standard](http://www.w3.org/TR/NOTE-datetime)
for details. I think RFC 3339 fit all our needs.

#### rbo 20-nov-2009: ####

Why not directly [DateTime](http://ch2.php.net/manual/en/class.datetime.php) and [DateTimeZone](http://ch2.php.net/manual/en/class.datetimezone.php) ? DateTime allows to handle GMT time.

> nbo 2009-11-22:
> It's PHP date function with [RFC 3339 DateTime Node Types](http://ch2.php.net/manual/en/class.datetime.php#datetime.constants.rfc3339)


#### dbe 10-dec-2009: ####

I see the solutions, but I don't see why we choose we need such a system.
Using timezone in mysql, can impact a lot the performances of the application, because most of the databases search use as search parameter the time.

example:
you have to search all events for a user between 08:15 03-aug-2009 and 12:30 18-aug-2008 GMT+2.


- fast solution:

1. mysql query (simple but gives also false positive (but 05:15 03-aug-2009 GMT-6 is retrieved correctly = 13:15 03-aug-2009 GMT+2)):

SELECT **FROM events WHERE user\_id='15' AND endtime > '2009-08-02 22:15:00' AND starttime < '2009-08-19 00:30:00'**


2. php code (clean false positive (09:15 03-aug-2009 GMT+4 should be in list = 07:15 03-aug-2009 GMT+2):

$counter=0;
foreach ($events as $event) {
> if ($event->endTimeIsGreatherThan('2009-08-03 08:15:00','GMT+2') && $event->startTimeIsLessThan('2009-08-18 12:30:00','GMT+2')) {
> > $kept\_events[$count]=$event;
> > $count++;

> }
}

with startTimeIsLessThan() and endTimeIsGreatherThan() methods also recursive for each timezone!

- slow solution:
only MYSQL query that I don't wanna even think about