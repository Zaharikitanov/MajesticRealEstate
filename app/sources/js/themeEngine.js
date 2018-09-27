jQuery(function ($) {
    'use strict';
    // Ajax data calls
    function sendingData(data, responceOutput, page) {

        var location;
        if (page.indexOf("Action") !== -1) {
            location = "app/core/ajaxCalls/" + page + ".php";
        } else {
            location = "app/views/pages/" + page + ".php";
        }

        $.ajax({
            type: "POST",
            url: location,
            cache: false,
            data: data,
            success: function (response) {
                responceOutput(response);
            }
        });
    }

    function outputFunc(response) {
        console.log(response);
    }

    function loadPage(response) {
        $("#page-wrapper").empty().append(response);
    }

    function loadResultsPage(response) {
        $(".resultsList").empty().append(response);
    }

    function brokerSurveysForTheDay(response) {
        $(".surveysCount").html(response);
    }

    function updateBrokerSurveysForTheDay() {
        var data;
        sendingData(data, brokerSurveysForTheDay, "brokerDailySurveyActions");
    }

    function multiselectValues(checkboxValue, valuesArray, thisPointer, appendElement) {
        var targetElement = $(thisPointer).closest(".form-group").find(appendElement);
        if ($(thisPointer).prop('checked') === true) {
            valuesArray.push(checkboxValue);
        } else {
            valuesArray.splice($.inArray(checkboxValue, valuesArray), 1);
        }
        if (valuesArray.length) {
            targetElement.text(valuesArray.join(', '));
        } else {
            targetElement.text('Избери');
        }
    }

    function surveyResults(Object, thisSelector) {
        Object.Date = thisSelector.find(".surveyDate").val();
        Object.Broker = thisSelector.find(".brokerName option:selected").text();
        return Object;
    }

    function estatesResults(Object, thisSelector) {
        Object.Region = thisSelector.find(".estateRegion option:selected").text();
        Object.Neighborhood = thisSelector.find(".estateNeighborhood option:selected").text();
        Object.EstateType = thisSelector.find(".estateType option:selected").text();
        Object.ConstructionType = thisSelector.find(".constructionType option:selected").text();
        Object.Decoration = thisSelector.find(".decoration option:selected").text();
        Object.OwnerPhone = thisSelector.find(".ownerPhone").val();
        Object.AreaFrom = thisSelector.find(".areaFrom").val();
        Object.AreaTo = thisSelector.find(".areaTo").val();
        Object.FloorFrom = thisSelector.find(".floorFrom").val();
        Object.FloorTo = thisSelector.find(".floorTo").val();
        Object.PriceFrom = thisSelector.find(".priceFrom").val();
        Object.PriceTo = thisSelector.find(".priceTo").val();
        return Object;
    }

    function clientsResults(Object, thisSelector) {
        Object.Name = thisSelector.find("input[name='clientName']").val();
        Object.PriceFrom = thisSelector.find(".priceFrom").val();
        Object.PriceTo = thisSelector.find(".priceTo").val();
        Object.Phone = thisSelector.find("input[name='phone']").val();
        Object.FamilyStatus = thisSelector.find(".familyStatus option:selected").text();
        Object.Furnishing = thisSelector.find(".furnishing option:selected").text();
        Object.Urgent = thisSelector.find(".urgent option:selected").text();
        Object.Pet = thisSelector.find(".pet option:selected").text();
        Object.EstateNeighborhood = thisSelector.find(".estateNeighborhoodBtn").text();
        Object.EstateRegion = thisSelector.find(".estateRegionBtn").text();
        Object.EstateType = thisSelector.find(".estateTypeBtn").text();
        return Object;
    }

    function surveyData(surveyObject, thisSelector) {

        surveyObject.Date = thisSelector.find(".surveyDate").val();
        surveyObject.Hour = thisSelector.find(".surveyHour option:selected").text();
        surveyObject.Broker = thisSelector.find(".brokerName option:selected").text();
        surveyObject.Client = thisSelector.find("#client").val();
        surveyObject.ClientId = thisSelector.find(".clientId").val();
        surveyObject.Estate = thisSelector.find("#estate").val();
        surveyObject.EstateId = thisSelector.find(".estateId").val();
        surveyObject.Notes = thisSelector.find(".surveyNote").val();
        return surveyObject;
    }

    function clientData(clientObject, thisSelector) {

        clientObject.Name = thisSelector.find("input[name='clientName']").val();
        clientObject.Phone = thisSelector.find("input[name='phone']").val();
        clientObject.SecondaryPhone = thisSelector.find("input[name='secondaryPhone']").val();
        clientObject.Budget = thisSelector.find("input[name='budget']").val();
        clientObject.FamilyStatus = thisSelector.find(".familyStatus option:selected").text();
        clientObject.Furnishing = thisSelector.find(".furnishing option:selected").text();
        clientObject.Urgent = thisSelector.find(".urgent option:selected").text();
        clientObject.Pet = thisSelector.find(".pet option:selected").text();
        clientObject.EstateType = thisSelector.find(".estateTypeBtn").text().split(",");
        clientObject.EstateRegion = thisSelector.find(".estateRegionBtn").text().split(",");
        clientObject.EstateNeighborhood = thisSelector.find(".estateNeighborhoodBtn").text().split(",");
        clientObject.Notes = thisSelector.find(".notes").val();
        if (thisSelector.find(".brokerName")){
            clientObject.Broker = thisSelector.find(".brokerName").val();
        } else {
            clientObject.Broker = thisSelector.find(".brokerName option:selected").text();
        }
        
        return clientObject;
    }

    function estateData(estateObject, thisSelector, filesList) {

        estateObject.Region = thisSelector.find(".estateRegion option:selected").text();
        estateObject.Neighborhood = thisSelector.find(".estateNeighborhood option:selected").text();
        estateObject.Address = thisSelector.find(".address").val();
        estateObject.Number = thisSelector.find(".number").val();
        estateObject.Entry = thisSelector.find(".entry").val();
        estateObject.Floor = thisSelector.find(".floor").val();
        estateObject.ConstructionType = thisSelector.find(".constructionType option:selected").text();
        estateObject.EstateType = thisSelector.find(".estateType option:selected").text();
        estateObject.Area = thisSelector.find(".area").val();
        estateObject.Decoration = thisSelector.find(".decoration option:selected").text();
        estateObject.Price = thisSelector.find(".price").val();
        estateObject.HeatingType = thisSelector.find(".heatingType option:selected").text();
        estateObject.Status = thisSelector.find(".status").val();
        estateObject.OwnerName = thisSelector.find(".ownerName").val();
        estateObject.OwnerPhone = thisSelector.find(".ownerPhone").val();
        estateObject.OwnerPhone2 = thisSelector.find(".ownerPhone2").val();
        estateObject.OwnerPhone3 = thisSelector.find(".ownerPhone3").val();
        estateObject.PropertyDescriptionFromOwner = thisSelector.find(".propertyDescriptionFromOwner").val();
        estateObject.PropertyDescriptionAboutOwner = thisSelector.find(".propertyDescriptionAboutOwner").val();
        if (thisSelector.find(".brokerName")) {
            estateObject.Broker = thisSelector.find(".brokerName").val();
        } else {
            estateObject.Broker = thisSelector.find(".brokerName option:selected").text();
        }
        estateObject.Pictures = filesList;
        return estateObject;
    }

    function suggestedClientResults(response) {
        $(".suggestions-list").remove();
        $(".clientResults").append(response);
    }

    function suggestedEstateResults(response) {
        $(".suggestions-list").remove();
        $(".estateResults").append(response);
    }

    // Page loading
    $("body").on("click", "a", function (e) {
        e.stopPropagation();
        var hrefValue = $(this).attr("href");
        if (hrefValue === "#") {
            e.preventDefault();
            var page = $(this).attr("navigate-page");
            var id = $(this).attr("item-id");
            var ajax_data;
            if (page) {
                if (id) {
                    ajax_data = {
                        'id': id
                    };
                } else {
                    ajax_data = {
                        'page': page
                    };
                }
                sendingData(ajax_data, loadPage, page);
            }
        }
    });
    // loading results page
    $("body").on("click", ".resultsBtn", function () {
        var page = $(this).attr("result-page");
        var thisSelector = $(this).closest(".container-fluid");
        var object = new Object();

        switch (page) {
            case "surveysListResults":
                object = surveyResults(object, thisSelector);
                break;
            case "estatesListResults":
                object = estatesResults(object, thisSelector);
                break;
            case "clientsListResults":
                object = clientsResults(object, thisSelector);
                break;
        }

        if (page) {
            var ajax_data = {
                'page': page,
                'object': JSON.stringify(object)
            };
            sendingData(ajax_data, loadResultsPage, page);
        }

    });

    // multiselect types
    $("body").on("click", ".estate input", function () {
        var checkboxValue = $(this).val();

        // estates, regions, neighborhoods are declared on requested pages

        if ($(this).closest(".form-group").find(".estateTypeBtn").length)
            multiselectValues(checkboxValue, estates, $(this), ".estateTypeBtn");

        if ($(this).closest(".form-group").find(".estateRegionBtn").length)
            multiselectValues(checkboxValue, regions, $(this), ".estateRegionBtn");

        if ($(this).closest(".form-group").find(".estateNeighborhoodBtn").length)
            multiselectValues(checkboxValue, neighborhoods, $(this), ".estateNeighborhoodBtn");
    });

    // suggested results on search bar 
    $("body").on("keyup", ".search-query", function () {

        var value = $(this).val();
        var type = $(this).attr("id");
        var ajax_data = {
            'type': type,
            'data': value
        };
        if (value) {
            if (type === "client") {
                sendingData(ajax_data, suggestedClientResults, "suggestionActions");
            } else {
                sendingData(ajax_data, suggestedEstateResults, "suggestionActions");
            }
        } else {
            $(".suggestions-list").remove();
        }
    })
            .keyup();

    // selecting item from search bar and showing up results
    $("body").on("click", ".suggestions-list li", function () {
        var choise = $(this).text();
        var type = $(this).parent().attr("id");
        var itemId = $(this).attr("id");

        $(this).parent().hide();
        if (type === "clients") {
            $(this).closest(".clientResults").find(".search-query").val(choise);
            $(this).closest(".clientResults").find(".clientId").val(itemId);
        } else {
            $(this).closest(".estateResults").find(".search-query").val(choise);
            $(this).closest(".estateResults").find(".estateId").val(itemId);
        }
    });

    // add client
    $("body").on("click", ".addClient", function () {
        var thisSelector = $(this).closest(".container-fluid");
        var clientObject = new Object();
        var data;

        var ajax_data = {
            'action': 'add',
            'clientObject': JSON.stringify(clientData(clientObject, thisSelector))
        };

        $('.loading').show();
        setTimeout(function () {
            sendingData(ajax_data, outputFunc, "clientActions");
            sendingData(data, loadPage, "clientsList");
        }, 700);
    });

    // edit client
    $("body").on("click", ".editClient", function () {
        var thisSelector = $(this).closest(".container-fluid");
        var clientObject = new Object();
        var data;

        clientObject.Id = thisSelector.find("input[name='clientName']").attr("clientId");
        var ajax_data = {
            'action': 'edit',
            'clientObject': JSON.stringify(clientData(clientObject, thisSelector))
        };

        $('.loading').show();
        setTimeout(function () {
            sendingData(ajax_data, outputFunc, "clientActions");
            sendingData(data, loadPage, "clientsList");
        }, 700);
    });

    // delete record
    $("body").on("click", ".deleteRecord", function (e) {
        e.stopPropagation();
        var confirmDialogue = confirm("Искате ли да изтриете записа?");
        var data;
        var id = $(this).attr("item-id");
        var type = $(this).attr("type");
        var ajax_data = {
            'id': id,
            'type': type
        };
        if (confirmDialogue){
            sendingData(ajax_data, outputFunc, "deleteRecordActions");
        }
        setTimeout(function () {
            sendingData(data, loadPage, type + "sList");
        }, 300);
        if (type === "survey") {
            updateBrokerSurveysForTheDay();
        }
    });

    // add estate property
    $("body").on("click", ".addEstateProperty", function (e) {
        e.stopPropagation();
        var data;
        var thisSelector = $(this).parent();
        var property = thisSelector.find(".newRecord").val();
        var type = thisSelector.find(".newRecord").attr("recordType");
        var ajax_data = {
            'property': property,
            'type': type
        };

        sendingData(ajax_data, outputFunc, "addEstatePropertyActions");
        $('.loading').show();
        setTimeout(function () {
            sendingData(data, loadPage, type + "sList");
        }, 700);

    });

    // add estate
    $("body").on("click", ".addEstate", function () {
        var thisSelector = $(this).closest(".container-fluid");
        var estateObject = new Object();
        var data;
        var files = thisSelector.find(".addPictures").prop("files");
        var filesList = $.map(files, function (val) {
            return val.name;
        });

        var ajax_data = {
            'action': 'add',
            'estateObject': JSON.stringify(estateData(estateObject, thisSelector, filesList))
        };

        $('.loading').show();
        setTimeout(function () {
            sendingData(ajax_data, outputFunc, "estateActions");
            sendingData(data, loadPage, "estatesList");
        }, 700);
    });

    // edit estate
    $("body").on("click", ".editEstate", function () {
        var thisSelector = $(this).closest(".container-fluid");
        var estateObject = new Object();
        var data;
        var files = thisSelector.find(".addPictures").prop("files");
        var filesList = $.map(files, function (val) {
            return val.name;
        });

        estateObject.Id = thisSelector.find(".ownerName").attr("estateId");
        var ajax_data = {
            'action': 'edit',
            'estateObject': JSON.stringify(estateData(estateObject, thisSelector, filesList))
        };

        $('.loading').show();
        setTimeout(function () {
            sendingData(ajax_data, outputFunc, "estateActions");
            sendingData(data, loadPage, "estatesList");
        }, 700);
    });

    // add survey
    $("body").on("click", ".addSurvey", function () {
        var thisSelector = $(this).closest(".container-fluid");
        var surveyObject = new Object();
        var data;

        var ajax_data = {
            'action': 'add',
            'surveyObject': JSON.stringify(surveyData(surveyObject, thisSelector))
        };
        $('.loading').show();
        setTimeout(function () {
            sendingData(ajax_data, outputFunc, "surveyActions");
            sendingData(data, loadPage, "surveysList");
            updateBrokerSurveysForTheDay();
        }, 700);
    });

    // edit survey 
    $("body").on("click", ".editSurvey", function () {
        var thisSelector = $(this).closest(".container-fluid");
        var surveyObject = new Object();
        var data;

        surveyObject.Id = thisSelector.find(".surveyDate").attr("surveyId");
        var ajax_data = {
            'action': 'edit',
            'surveyObject': JSON.stringify(surveyData(surveyObject, thisSelector))
        };

        $('.loading').show();
        setTimeout(function () {
            sendingData(ajax_data, outputFunc, "surveyActions");
            updateBrokerSurveysForTheDay();
            sendingData(data, loadPage, "surveysList");
        }, 700);
    });
    
});