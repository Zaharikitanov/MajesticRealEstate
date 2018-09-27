<?php
require_once dirname(dirname(__FILE__))."/views/components/menuItems.php"; 

function ownerMenu() {
    home();
    clients();
    estates();
    surveysAdvanced();
    messagesAdvanced();
    calendarAdvanced();
    tasksAdvanced();
    estatesMap();
    settings();
    statistics();
}

function adminMenu() {
    home();
    clients();
    estates();
    requests();
    settings();
}

function brokerMenu() {
    home();
    clients();
    estates();
    surveysAdvanced();
    requestsAdvanced();
}

