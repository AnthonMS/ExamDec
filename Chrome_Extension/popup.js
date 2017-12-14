var response, parsedResponse;

// Here I Add an event listener til the DOM Content
document.addEventListener('DOMContentLoaded', function()
{
    // referencing the get button and adding event listener til that
    var getOrdersBtn = document.getElementById('getToursBtn');
    getOrdersBtn.addEventListener('click', function()
    {
        // I call a method I made myself to seperate the code a bit
        apiCall();
    }, false);
}, false);

// This is my function that calls the RESTful api.
function apiCall()
{
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "http://localhost/explore_california_api.php", false);
    xhttp.send();

    //------------------------------
    //var testHeader = document.getElementById('testerHeader');
    //var testTitle = document.getElementById('testerTitle');

    // This gets and changes the response so we can work with it
    response = xhttp.responseText;
    parsedResponse = JSON.parse(response);

    var tour_table = document.getElementById("extensionTable");

    // This runs through all the objects in the parsedResponse object
    for (var i = 0; i < parsedResponse.length; i++)
    {
        // Temporary Variables to show the user/client
        var tourId, packageName, tourName, price, difficulty, graphic, length, region, keywords;
        tourId = parsedResponse[i]["tour_id"];
        packageName = parsedResponse[i]["package_title"];
        tourName = parsedResponse[i]["tour_name"]; // this is shown
        price = parsedResponse[i]["price"]; // this is shown
        difficulty = parsedResponse[i]["difficulty"]; // this is shown
        graphic = parsedResponse[i]["graphic"];
        length = parsedResponse[i]["length"]; // this is shown
        region = parsedResponse[i]["region"]; // this is shown
        keywords = parsedResponse[i]["keywords"];

        //After getting all the data and temporarily saved it in some variables
        // We show the user/client the data in the html table.
        tour_table.innerHTML += "<tr><td>" + tourName +"</td><td>" + price +"</td><td>" + difficulty + "</td><td>" + length + "</td><td>" + region + "</td></tr>";
    }

    //------------------------------
}