class myMap {

    constructor(map, center){
        this.map = map;
        this.center = center
        this.markers = [];
    }

    initMap() {
        const map = new google.maps.Map(this.map, {
          center: this.center,
          disableDefaultUI: true,
          mapId: "168c94dbe1fb00b3",
          useStaticMap: false,
          zoom: 15,
        });
    }

}

var LFDAMap = new myMap(document.getElementById("section-infos-map"), {lat: 48.879970, lng: 2.308900});
function initMap_1(){
    LFDAMap.initMap();
}