function initialize() {

    let address = document.getElementById("address");
    let maps_url= document.getElementById("maps_url");
    let lat     = document.getElementById("lat");
    let lng     = document.getElementById("lng");

    var map = new google.maps.Map(document.getElementById("address-map-container"), {
        center: {
            lat: parseFloat(lat.value),
            lng: parseFloat(lng.value)
        },
        zoom: 15,
        mapTypeId: "roadmap"
    });

    var marker = new google.maps.Marker({
        position: {
            lat: parseFloat(lat.value),
            lng: parseFloat(lng.value)
        },
        map: map
    });

    // Create the search box and link it to the UI element.
    var input = document.getElementById("address_input");
    var searchBox = new google.maps.places.SearchBox(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener("bounds_changed", function() {
        searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener("places_changed", function() {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        // Clear out the old markers.
        markers.forEach(function(marker) {
            marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();

        places.forEach(function(place) {
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(
                new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                })
            );

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
                maps_url.value = place.url
                address.value = place.formatted_address
                lat.value = place.geometry.location.lat()
                lng.value = place.geometry.location.lng()

            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });
}
