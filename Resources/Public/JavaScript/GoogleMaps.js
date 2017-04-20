var map;

function initMap() {
    var frankfurt = {lat: 50.1211277, lng: 8.4964798};
    map = new google.maps.Map(document.getElementById('map'), {
        center: frankfurt,
        zoom: 4
    });
}

// Process JSON
$.getJSON('/?type=1492427013', function (json1) {
    $.each(json1, function (key, data) {
        $.each(data.golfCourses, function (unique, record) {
            var latLng = new google.maps.LatLng(record.latitude, record.longitude);
            // Creating a marker and putting it on the map
            var marker = new google.maps.Marker({
                position: latLng,
                map: map
            });

            var infowindow = new google.maps.InfoWindow({
                content: record.name
            });

            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });
        });
    });
});