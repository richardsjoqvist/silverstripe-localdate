<?php

if (!class_exists('SS_Object')) class_alias('Object', 'SS_Object');

// Use old-fashioned way of injecting the custom class
// because using the YAML-method does not always work
SS_Object::useCustomClass('Date', 'LocalDate');
SS_Object::useCustomClass('SS_Datetime', 'LocalDatetime');
SS_Object::useCustomClass('Time', 'LocalTime');