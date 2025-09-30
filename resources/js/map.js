window.mapInitialize = function initialize() {

    $('form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
    const locationInputs = document.getElementsByClassName("map-input");
    var showMarker;
    var hasMap;
    var hasCircle;
    var radius;

    const autocompletes = [];
    const geocoder = new google.maps.Geocoder;
    window.geocoder = geocoder;
    for (let i = 0; i < locationInputs.length; i++) {

        const input = locationInputs[i];
        const fieldKey = input.id.replace("-input", "");
        const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';
        showMarker = $(input).data("show-marker") || false;
        hasMap = $(input).data("has-map") || false;
        hasCircle = $(input).data("has-circle") || false;
        radius = $(input).data("radius") || null;

        const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || 45.4642035;
        const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || 9.189981999999986;

        const autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.setComponentRestrictions(
            {'country': ['it']}
        );
        autocomplete.key = fieldKey;

        if (hasMap) {
            const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
                center: {lat: latitude, lng: longitude},
                zoom: 13,
                mapTypeControl: false,
                fullscreenControl: false,
                streetViewControl: false,
            });
            window.map = map;

            const marker = new google.maps.Marker({
                map: map,
                position: {lat: latitude, lng: longitude},
                draggable: true
            });

            marker.setVisible(isEdit && showMarker);
            autocompletes.push({input: input, map: map, marker: marker, autocomplete: autocomplete});
        } else {
            autocompletes.push({input: input, autocomplete: autocomplete});
        }
    }

    for (let i = 0; i < autocompletes.length; i++) {
        const input = autocompletes[i].input;
        const autocomplete = autocompletes[i].autocomplete;
        if (hasMap) {
            const map = autocompletes[i].map;
            const marker = autocompletes[i].marker;
            window.circle = new google.maps.Circle();

            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                marker.setVisible(false);
                var place = autocomplete.getPlace();
                geocoding(geocoder, autocomplete, place);

                if (!place.formatted_address) {
                    geocoder.geocode({
                        'address': place.name,
                        'componentRestrictions': {
                            'country': 'IT'
                        }
                }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                                continuePlaceFunction(results[0], showMarker, marker, hasCircle, radius);
                            } else {
                                console.log(status);
                            }
                        } else {
                            console.log(status);
                        }
                    });
                } else {
                    continuePlaceFunction(place, showMarker, marker, hasCircle, radius);
                }

            });

            google.maps.event.addListener(marker, 'dragend', function(marker) {
                const lat = marker.latLng.lat();
                const lng = marker.latLng.lng();
                setLocationCoordinates(autocomplete.key, lat, lng);
            });

        } else {
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                geocoding(geocoder, autocomplete, place);
            });
        }
    }

};

window.mapCircle = function createCircle(center, radius) {
    return new google.maps.Circle({
        strokeColor: '#FF0000',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#FF0000',
        fillOpacity: 0.35,
        map: window.map,
        center: center,
        radius: 80 * radius
    })
};

function continuePlaceFunction(place, showMarker, marker, hasCircle, radius) {
    if (!place.geometry) {
        console.log("No details available for input: '" + place.name + "'");
        input.value = "";
        return;
    }

    if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
        if (!showMarker) map.setZoom(12);
    } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);
    }
    marker.setPosition(place.geometry.location);
    marker.setVisible(showMarker);

    circle.setMap(null);

    if (hasCircle) {
        circle = window.mapCircle(marker.getPosition(), radius);
    }
}

function geocoding(geocoder, autocomplete, place){
    if (place.place_id) {
        geocoder.geocode({'placeId': place.place_id}, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                const lat = results[0].geometry.location.lat();
                const lng = results[0].geometry.location.lng();
                setLocationCoordinates(autocomplete.key, lat, lng);
            } else {
                console.log(status)
            }
        });
    } else {
        geocoder.geocode({
            'address': place.name,
            'componentRestrictions': {
                'country': 'IT'
            }
        }, function(results, status) {
            const lat = results[0].geometry.location.lat();
            const lng = results[0].geometry.location.lng();
            setLocationCoordinates(autocomplete.key, lat, lng);
        });
    }
}

function setLocationCoordinates(key, lat, lng) {
    const latitudeField = document.getElementById(key + "-" + "latitude");
    const longitudeField = document.getElementById(key + "-" + "longitude");
    latitudeField.value = lat;
    longitudeField.value = lng;
}
