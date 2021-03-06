<?php

require_once 'globals.php';

$EstatesNeighborhoodArray = array(
    "7ми 11ти километър",
    "Банишора",
    "Белите брези",
    "Бенковски",
    "Борово",
    "Бояна",
    "Бъкстон",
    "Витоша",
    "Военна рампа",
    "Враждебна",
    "Връбница",
    "Връбница 2",
    "Гевгелийски",
    "Гео Милев",
    "Горна баня",
    "Горубляне",
    "Гоце Делчев",
    "Дианабад",
    "Докторски паметник",
    "Драгалевци",
    "Дружба 1",
    "Дружба 2",
    "Дървеница",
    "Западен парк",
    "Захарна фабрика",
    "Зона Б-18",
    "Зона Б-19",
    "Зона Б-5",
    "Зона Б-5-3",
    "Иван Вазов",
    "Изгрев",
    "Изток",
    "Илинден",
    "Илиянци",
    "Карпузица",
    "Княжево",
    "Красна Поляна",
    "Красна поляна 1",
    "Красна поляна 2",
    "Красна поляна 3",
    "Красно село",
    "Кръстова вада",
    "Лагера",
    "Левски",
    "Левски В",
    "Левски Г",
    "Лозенец",
    "Люлин - център",
    "Люлин 1",
    "Люлин 10",
    "Люлин 2",
    "Люлин 3",
    "Люлин 4",
    "Люлин 5",
    "Люлин 6",
    "Люлин 7",
    "Люлин 8",
    "Люлин 9",
    "Малашевци",
    "Малинова долина",
    "Манастирски ливади",
    "Медицинска академия",
    "Младост 1",
    "Младост 1А",
    "Младост 2",
    "Младост 3",
    "Младост 4",
    "Модерно предградие",
    "Мусагеница",
    "Надежда 1",
    "Надежда 2",
    "Надежда 3",
    "Надежда 4",
    "Надежда 5",
    "Надежда 6",
    "Обеля",
    "Обеля 1",
    "Обеля 2",
    "Оборище",
    "Овча купел",
    "Овча купел 1",
    "Овча купел 2",
    "Орландовци",
    "Павлово",
    "Подуяне",
    "Полигона",
    "Разсадника",
    "Редута",
    "Република",
    "Република 2",
    "Света Троица",
    "Свобода",
    "Сердика",
    "Симеоново",
    "Славия",
    "Слатина",
    "Стрелбище",
    "Студентски град",
    "Сухата река",
    "Суходол",
    "Толстой",
    "Триъгълника",
    "Фондови жилища",
    "Хаджи Димитър",
    "Хиподрума",
    "Хладилника",
    "Христо Ботев",
    "Централна гара",
    "Център",
    "Яворов"
);

$EstateRegionsArray = array(
    "Център 1",
    "Център 2",
    "Север 1",
    "Север 2",
    "Север 3",
    "Юг 1",
    "Юг 2",
    "Юг 3",
    "Юг 4",
    "Юг 5",
    "Изток 1",
    "Изток 2",
    "Изток 3",
    "Запад 1"
);

$EstateTypesArray = array (
            "СТАЯ",
            "ПАРТЕР",
            "1-СТАЕН",
            "2-СТАЕН",
            "3-СТАЕН",
            "4-СТАЕН",
            "МНОГОСТАЕН",
            "МЕЗОНЕТ",
            "ОФИС",
            "АТЕЛИЕ",
            "ТАВАН",
            "ЕТАЖ ОТ КЪЩА",
            "КЪЩА",
            "ВИЛА",
            "МАГАЗИН",
            "ЗАВЕДЕНИЕ",
            "СКЛАД",
            "ГАРАЖ",
            "ПРОМ. ПОМЕЩЕНИЕ",
            "ХОТЕЛ",
            "ПАРЦЕЛ", 
            "ЗЕМЕДЕЛСКА ЗЕМЯ"
        );



function estatesProperties($propertiesArray, $table) {
    
    $record = 0;
    $checkedEntries = 0;
    
    foreach ($propertiesArray as $property) {
        $record++;
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $checkForExistingRecord = "SELECT * FROM " . $table . " WHERE name = '" . $property . "' ";
        $conn->query("SET NAMES utf8");
        $result = $conn->query($checkForExistingRecord);

        if($result->num_rows > 0){
            $checkedEntries++;
        } else {
            $sql = "INSERT INTO " . $table . " (name) VALUES ('" . $property . "') ";
            $conn->query("SET NAMES utf8");
            $conn->query($sql);
        }
        $conn->close();
    }
    echo "Records to create for table " . $table . ": ".$record."<br>";
    echo "Entries checked: ".$checkedEntries."<br>";
    
    
}
estatesProperties($EstatesNeighborhoodArray, NEIGHBORHOODS_TABLE);
estatesProperties($EstateRegionsArray, ESTATE_REGIONS_TABLE);
estatesProperties($EstateTypesArray, ESTATE_TYPES_TABLE);


