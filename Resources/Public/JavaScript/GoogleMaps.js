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
        $.each(data.golfCoursesPlayed, function (unique, course) {
            var latLng = new google.maps.LatLng(course.latitude, course.longitude);
            // Creating a marker and putting it on the map
            var marker = new google.maps.Marker({
                position: latLng,
                map: map,
                icon: iconBase + 'map-marker.png'
            });

            var htmlContent = '<h6>' + course.name + '</h6><a href="' + course.website +'">' + course.website + '</a>';

            var infoWindow = new google.maps.InfoWindow({
                content: htmlContent
            });

            marker.addListener('click', function() {
                infoWindow.open(map, marker);
            });

            google.maps.event.addListener(map, 'click', function() {
                infoWindow.close();
            });
        });
        $.each(data.golfCoursesFuture, function (unique, course) {
            var latLng = new google.maps.LatLng(course.latitude, course.longitude);
            // Creating a marker and putting it on the map
            var marker = new google.maps.Marker({
                position: latLng,
                map: map,
                icon: iconBase + 'map-marker-future.png'
            });

            var htmlContent = '<h6>' + course.name + '</h6>' +
                '<div class="dateToPlay">Date to play the course: <span>2017-01-02</span></div>' +
                '<a href="' + course.website +'">' + course.website + '</a>';

            var infoWindow = new google.maps.InfoWindow({
                content: htmlContent
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

