import L from "leaflet";

const map = L.map('mapa', {
    center: [15.52,-90.32],
    zoom : 5,
    maxZoom : 15,
    minZoom : 1,
})
const mapLayer = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
	maxZoom: 19,
	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
})

const carreteraLayer = L.tileLayer('https://tile.waymarkedtrails.org/hiking/{z}/{x}/{y}.png', {
	maxZoom: 18,
	attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors | Map style: &copy; <a href="https://waymarkedtrails.org">waymarkedtrails.org</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
});

const markerLayer = L.layerGroup();
const icono = L.icon({
    iconUrl : './images/marker.svg',
    iconSize : [35, 35]
})

const marcador = L.marker([15.52,-90.32],{
    icon : icono,
    draggable : true
})

L.circle([15.52,-90.32], {radius: 5000}).addTo(markerLayer);
const popup = L.popup()
    .setLatLng([15.52,-90.32])
    .setContent('<p>Hello world!<br />This is a nice popup.</p>')

marcador.bindPopup(popup)
marcador.addTo(markerLayer)

mapLayer.addTo(map)
carreteraLayer.addTo(map)
markerLayer.addTo(map)

map.on('click', (e) => {
    console.log(e);
    alert('diste click sobre el mapa')
})

marcador.on('drag', (e)=>{
    console.log(e);
    console.log('moviendo el marcador');
})