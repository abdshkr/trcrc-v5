var map;
        var InforObj = [];
        var centerCords = {
            lat: 3.157355,
            lng: 101.6194873
        };
        var markersOnMap = [{
                placeName: "Headquarters (HQ)",
                LatLng: [{
                    lat: 3.157355,
                    lng: 101.6194873
                }]
            },
            {
                placeName: "Banun",
                LatLng: [{
                    lat: 5.4289174,
                    lng: 101.1210215
                }]
            },
            {
                placeName: "Merisuli",
                LatLng: [{
                    lat: 5.1280391,
                    lng: 118.1292064
                }]
            }
        ];
 
        window.onload = function () {
            initMap();
        };
 
        function addMarkerInfo() {
            for (var i = 0; i < markersOnMap.length; i++) {
                var contentString = '<div id="content"><h4>' + markersOnMap[i].placeName +
                    '</h4>';
 
                const marker = new google.maps.Marker({
                    position: markersOnMap[i].LatLng[0],
                    map: map
                });
 
                const infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    maxWidth: 200
                });
 
                marker.addListener('click', function () {
                    closeOtherInfo();
                    infowindow.open(marker.get('map'), marker);
                    InforObj[0] = infowindow;
                });
                // marker.addListener('mouseover', function () {
                //     closeOtherInfo();
                //     infowindow.open(marker.get('map'), marker);
                //     InforObj[0] = infowindow;
                // });
                // marker.addListener('mouseout', function () {
                //     closeOtherInfo();
                //     infowindow.close();
                //     InforObj[0] = infowindow;
                // });
            }
        }
 
        function closeOtherInfo() {
            if (InforObj.length > 0) {
                /* detach the info-window from the marker ... undocumented in the API docs */
                InforObj[0].set("marker", null);
                /* and close it */
                InforObj[0].close();
                /* blank the array */
                InforObj.length = 0;
            }
        }
 
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: centerCords
            });
            addMarkerInfo();
        }