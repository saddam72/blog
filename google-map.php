<?php
function loadMap() {
    var dhaka = {lat: 23.8103, lng: 90.4125};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      center: dhaka
    });
}
?>