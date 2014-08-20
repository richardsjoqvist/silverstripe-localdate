<?php
// Use old-fashioned way of injecting the custom class
// because using the YAML-method does not always work
Object::useCustomClass('Date', 'LocalDate');
Object::useCustomClass('SS_Datetime', 'LocalDatetime');
