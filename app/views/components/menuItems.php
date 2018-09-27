<?php   
function home() { ?>
    <li>
        <a href="#" navigate-page='landing'><i class="fa fa-home fa-fw"></i> Начало</a>
    </li>
<?php   }

function clients() { ?>
    <li>
        <a href="#" navigate-page="clientsList"><i class="fa fa-users fa-fw"></i> Клиенти<span class="fa arrow"></span></a>
    </li>
<?php   }
        
function estates() { ?>
    <li>
        <a href="#" navigate-page="estatesList"><i class="fa fa-building fa-fw"></i> Имоти<span class="fa arrow"></span></a>
    </li>
<?php   }

function surveysAdvanced() { ?>        
    <li>
        <a href="#" navigate-page="surveysList"><i class="fa fa-eye fa-fw"></i> Огледи<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="#" navigate-page="addSurvey">Добавяне</a>
            </li>
        </ul>
    </li>
<?php   }
        
function messagesAdvanced() { ?>
    <li>
        <a href="#" navigate-page="messagesList"><i class="fa fa-envelope fa-fw"></i> Съобщения<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="#" navigate-page="writeMessage">Напиши</a>
            </li>
        </ul>
    </li>
<?php   }

function calendarAdvanced() { ?>
    <li>
        <a href="#" navigate-page="calendar"><i class="fa fa-calendar fa-fw"></i> Календар<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="#" navigate-page="addEvent">Добави събитие</a>
            </li>
        </ul>
    </li>
<?php   }

function tasksAdvanced() { ?>
    <li>
        <a href="#" navigate-page="tasks"><i class="fa fa-tasks fa-fw"></i> Задачи<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="#" navigate-page="addTask">Добавяне</a>
            </li>
        </ul>
    </li>
<?php   }

function estatesMap() { ?>
    <li>
        <a href="#" navigate-page="estatesMap"><i class="fa fa-map-marker fa-fw"></i> Карта на имотите</a>
    </li>
<?php   }

function settings() { ?>
    <li>
        <a href="#" navigate-page="settings"><i class="fa fa-gear fa-fw"></i> Настройки</a>
    </li>
<?php   }

function statistics() { ?>
    <li>
        <a href="#" navigate-page="statistics"><i class="fa fa-area-chart fa-fw"></i> Статистика</a>
    </li>
<?php   }

function requests() { ?>
    <li>
        <a href="#" navigate-page='requestsList'><i class="fa fa-clipboard"></i> Заявки</a>
    </li>
<?php   }

function requestsAdvanced() { ?>
    <li>
        <a href="#"><i class="fa fa-clipboard"></i> Заявки<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="#" navigate-page='addClient'><i class="fa fa-user"></i> Добави клиент</a>
            </li>
            <li>
                <a href="#" navigate-page="addEstate"><i class="fa fa-home"></i> Добави имот</a>
            </li>
        </ul>
    </li>
<?php   } 