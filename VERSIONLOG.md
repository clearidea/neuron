# Versions

## 0.7.3
* Adds Cookie filter.

## 0.7.2 2018-01-15
* Adds Date::only()
* Julian date now strips time before processing.

## 0.7.1 2017-11-19
* Fixes an issue with setting log level in singleton.
* Refactors differenceUnitAsText
* Adds daysAsText

## 0.7.0 2017-08-14
* Added Log singleton wrapper.
* Fixes an issue with inheriting from the singleton memory class.
* PHP7.1 updates to ILogger.

## 0.6.12
* Added DateRange object.
* Refactored DateRange validator to DateWithinRange validator.
* Added DateRange validator.

## 0.6.11

* Fixups for php7
* Adds PolicyTrait

## 0.6.10 2017-02-22

* Adds Time Validation

* Added StringData class.

## 0.6.9 2017-01-09

* Adds filterArray method in Post.

## 0.6.8 2016-10-21

* Adds GpsPoint constructor.
* Adds File\Temporary.
* Adds Formatter.

## 0.6.7

* Adds GpsPoint data object.

## 0.6.6 2016-08-29

* Adds Util/Timer.
* Adds differenceAsText.

## 0.6.4 2016-08-16

* Adds server filter.

## 0.6.3

* Adds Language text mapper.
* Adds memcache singleton.
* More tests.
* Adds Memory settings - mostly only useful for tests.

## 0.6.1

* Fix to observer variadic parameters.

## 0.6.0

* Fixes phpcs/phpmd warnings.
* Adds IRunnable interface.
* Adds Observer pattern.
* Refactors namespaces relating to patterns.

## 0.5.29

* Includes tests for Criteria pattern And, Or and Not.
* Adds KeyValue Criterion.

## 0.5.28

* Updates travis config.

## 0.5.27

* Adds Criteria pattern.
* Adds ArrayHelper.
* Adds DateRange, NotNull and NotEmpty validators.

## 0.5.26

* Data filters for get and post.

## 0.5.25

* Adds column vs data sanity check in CSV parser.

## 0.5.24 2015-12-27
* Fix to IApplication registry methods.

## 0.5.23 2015-12-27

* Adds Singleton mechanisms
* Adds Registry
* Application->run now returns a boolean result

## 0.5.22 2015-12-20

* Adds setRunLevel to ILogger.
* Remaps settings control in ApplicationBase.

## 0.5.21 2015-12-20

* Removes LogMux level mapping. Upon further thought, this should be handled by each individual log's runlevel.

## 0.5.20 2015-12-14
* :|

## 0.5.19 2015-12-14
* Ugh.

## 0.5.18i 2015-12-14
* Fix to applicationbase.

## 0.5.17 2015-12-14

* ApplicationBase now extends LoggableBase.
* Fixes to LoggableBase.

## 0.5.16 2015-12-11

* Adds reset method to LogMux.

## 0.5.15 2015-12-11

* Adds LogMux and the ability to map logs to different levels.
* Adds LogMux unit test.
* Adds a parameter to the plain text log constructor to disable the timestamp.

## 0.5.14 2015-11-09

* Adds LastFirstMI parser.

## 0.5.13 2015-10-25

* Adds initial H\Error class.

## 0.5.12 2015-10-23
* Fix (again) for subtract days.

## 0.5.11 2015-10-23
* Added IApplication
* Added application settings.

## 0.5.10 2015-10-04
* Fixed random text in ISettingSource.php

## 0.5.9 2015-09-24
* Fixed missing $ in subtractDays.

## 0.5.8 2015-09-22
* Added Date::subtractDays

## 0.5.7
* Removed phpdoc cache files.

## 0.5.6 2015-09-09
* Cleanup of --help information for commandline applications.

## 0.5.5 2015-09-08
* More unit tests.
* Beginning of examples.
* Updates to CommandlineApplication.

## 0.5.4 2015-09-03
