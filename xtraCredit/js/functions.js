function getApi() {
    document.getElementById("table").innerHTML = "";
    document.getElementById("load").style.visibility = "visible";
    var city = document.getElementById("city").value.replace(" ", "+");
    //document.getElementById("table").innerHTML += city;
    
    $.ajax({
        type: "POST",
        url: "php/callApi.php",
        data: { search: city
        },
        dataType: "json",
        success: function(json) {
        var data = JSON.parse(JSON.stringify(json));
        var results = data.results;
        console.dir(results[2]); //DO NOT DELETE!
    
        var table = "<table class='table'><tr><th>Type of Event</th><th>Event Name</th><th>When</th></tr>";

            for(var i = 0; i < results.length; i++) {
            table += "<tr><td>" + results[i].market.marketName + "</td><td>" + results[i].assetName + "</td><td>" + 
                results[i].activityStartDate.substring(0, 10) + "</td></tr>";
            }
            document.getElementById("table").innerHTML += table;
            document.getElementById("load").style.visibility = "hidden";
        },
        error: function(e) {
            document.getElementById("table").innerHTML += "failed";
        }
    });
    
    updateDb(document.getElementById("city").value.toUpperCase());
}

function updateDb(city) {
    document.getElementById("times").innerHTML = "";
    
    $.ajax({
        type: "POST",
        url: "php/updateDb.php",
        data: { city: city
        },
        dataType: "json",
        success: function(json) {
        var data = JSON.parse(JSON.stringify(json));
        var html = "<br>";
         for(var i = 0; i < data.length; i++) {
            if (!data[i].city==""){
                html += data[i].city + " has been searched for " + data[i].times +" time(s)<br>";
            }
         }
        html += "<br>";
    
            document.getElementById("times").innerHTML += html;
            //document.getElementById("load").style.visibility = "hidden";
        },
        error: function(e) {
            document.getElementById("times").innerHTML += "failed";
        }
    });
}