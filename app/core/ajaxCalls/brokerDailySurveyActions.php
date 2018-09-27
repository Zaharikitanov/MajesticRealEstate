<?php

//echo dirname(dirname(__FILE__));
require_once dirname(dirname(__FILE__))."/databaseLayer/retrieve/userName.php";
require_once dirname(dirname(__FILE__))."/databaseLayer/retrieve/brokerSurveysForTheDay.php";

echo brokerSurveysForTheDayCount(getUserName());