// import {Checker} from "./Checker.js";

function submitForm() {
    let x = ($('input[name="x"]:checked').val());
    let y = ($('input[name="y"]').val());
    let r = ($('select[name="r"]').val());
    
    const checker = new Checker();
    checker.isCorrect(x, y, r);
    $.ajax({
        type: "GET",
        url: "php/Table.php",
        data: {
            'x': $('input[name="x"]:checked').val(),
            'y': $('input[name="y"]').val(),
            'r': $('select[name="r"]').val()
        },
        dataType: "text",
        cache: false,
        success: function (response) {
            try {
                handleRequest(response);
            } catch (e) {
                alert("Проблемы с ответом от сервера: " + e);
            }
        },
        error: function (response) {
            console.log("error:")
            console.log(data)
        },
        statusCode: {
            404: function() {
                alert("File not found.");
            },
            410: function() {
                alert("Content was removed.");
            },
            500: function() {
                alert("Server error");
            },
            502: function() {
                alert("Bad gateway");
            }
        }
    });
}


function clearSpacesAndChangeCommaToPoint(sendingValue) {
    return sendingValue.replace(',', '.').replace(' ', "");
}

function createArgs(x, y, r) {
    return "2x=" + x + "&y=" + y + "&r=" + r;
}

function handleRequest(response) {
    document.getElementById("receivingData").innerHTML = response;
}


// export default {submitForm};