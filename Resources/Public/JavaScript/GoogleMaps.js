var map;
var iconBase = '/typo3conf/ext/golf_courses/Resources/Public/Icons/';

function initMap() {
    var frankfurt = {lat: 50.1211277, lng: 8.4964798};
    map = new google.maps.Map(document.getElementById('map'), {
        center: frankfurt,
        zoom: 4
    });
}

// Process JSON
$.getJSON('/?type=1492427013', function (golfCourses) {
    $.each(golfCourses, function (key, data) {
        $.each(data.golfCourses, function (unique, course) {
            var latLng = new google.maps.LatLng(course.latitude, course.longitude);
            // Creating a marker and putting it on the map
            var marker = new google.maps.Marker({
                position: latLng,
                map: map,
                icon: iconBase + 'map-marker.png'
            });

            var infoWindow = new google.maps.InfoWindow({
                content: course.name
            });

            marker.addListener('click', function() {
                infoWindow.open(map, marker);
            });

            google.maps.event.addListener(map, 'click', function() {
                infoWindow.close();
            });
        });
    });
});

