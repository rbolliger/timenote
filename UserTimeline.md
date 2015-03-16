# Introduction #

The user declares his occupation in the "Hours" table. In order to know if the user has worked too much or not enough, timenote must know his planning.
The user\_worktime table contains such data.

# Details #

## Working principle ##

Planned hours are defined as a series until a change is performed. They are generated with a generator function, which accepts some parameters defining which days are considered, which ones have to be ignored (among considered days, ex: easter), starting and leaving hours.

## Generators ##

The generator function is the following:

```

timeline = generate_timeline(date_start, date_end, weekdays, offdays, time_start, time_stop)

```

## Table Content ##


#### Planned hour table ####

| **Field** | **Description** |
|:----------|:----------------|
| ID | working period primary key |
| user\_id | link to user primary key |
| project\_id | link to project pk where the hour is declared |
| category\_id | link to category pk |
| generator\_id | A function is used to automatically generate regular planning |
| date\_start | Date start of the working activity |
| date\_end | Date end of the working period |
| comment | Text area where the user can add notes |

#### Generator table ####

| **Field** | **Description** |
|:----------|:----------------|
| ID | generator pk |
| name | Generator name |
| use\_count | Counting generator usage allows to sort most requested as favorites |
| weekdays | Defines which days in the week have to be worked |
| offdays | Defines which days between date\_start and date\_end (from planned hour table) are considered as legal holidays |
| time\_start | Array defining starting times of working activities each weekday |
| time\_end | Array defining ending times of working activities each weekday |