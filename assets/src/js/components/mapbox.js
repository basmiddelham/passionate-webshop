import mapboxgl from "mapbox-gl";
import "mapbox-gl/dist/mapbox-gl.css";

function initMap(
  mapElement,
  accessToken,
  mapStyleId,
  mainMarker,
  mainMarkerTitle,
  mainMarkerColor,
  mapZoom,
  mapPitch,
  mapBearing,
  mapOffsetX,
  mapOffsetY,
  rowCount
) {
  mapboxgl.accessToken = accessToken;
  const mapCenter = mainMarker.split(",").reverse();
  const map = new mapboxgl.Map({
    container: mapElement,
    style: mapStyleId,
    center: mapCenter,
    zoom: mapZoom,
    pitch: mapPitch,
    bearing: mapBearing,
    antialias: true,
  });

  /**
   * Set map offset
   */
  map.panBy([mapOffsetX, mapOffsetY], { duration: 0 });

  /**
   * Create default popup
   */
  const popup = new mapboxgl.Popup({
    closeButton: false,
    closeOnClick: false,
    offset: [0, -40],
  })
    .setLngLat(mapCenter)
    .addTo(map);
  if (mainMarkerTitle) {
    popup.setHTML(mainMarkerTitle);
  }

  /**
   * Add main marker
   */
  new mapboxgl.Marker({
    color: mainMarkerColor,
  })
    .setLngLat(mapCenter)
    .addTo(map);

  /**
   * Add Controls
   */
  const nav = new mapboxgl.NavigationControl({ visualizePitch: true });
  map.addControl(nav, "bottom-right");
  map.addControl(new mapboxgl.FullscreenControl());

  /**
   * Add style switch
   */
  const toggleableStyleIds = [
    ["Satelliet", "satellite-v9"],
    ["Navigatie", "navigation-day-v1"],
    ["Kaart", "custom"],
  ];

  let currentStyle = "custom";
  toggleableStyleIds.forEach(function (StyleId, i) {
    const inputWrap = document.createElement("div");
    inputWrap.classList.add("btn-group");
    inputWrap.setAttribute("role", "group");
    inputWrap.setAttribute("aria-label", "Map style menu");

    const input = document.createElement("input");
    input.classList.add("btn-check");
    input.id = "input-" + rowCount + i;
    input.type = "radio";
    input.value = StyleId[1];
    input.name = "menu-" + rowCount;
    if (StyleId[1] === "custom") {
      input.setAttribute("checked", "checked");
    }

    const label = document.createElement("label");
    label.classList.add("btn", "btn-light", "btn-sm");
    label.setAttribute("for", "input-" + rowCount + i);
    label.textContent = StyleId[0];

    const styleMenu = document.getElementById("menu-" + rowCount);
    styleMenu.appendChild(inputWrap);
    inputWrap.append(input, label);

    input.onclick = (layer) => {
      const layerId = layer.target.value;
      if (currentStyle !== layerId) {
        if (layerId === "custom") {
          map.setStyle(mapStyleId);
        } else {
          map.setStyle("mapbox://styles/mapbox/" + layerId + "?optimize=true");
        }
      }
      currentStyle = layerId;
    };
  });

  map.on("style.load", () => {
    /**
     * Add 3D terrain
     */
    // map.addSource('mapbox-dem', {
    // 	type: 'raster-dem',
    // 	url: 'mapbox://mapbox.mapbox-terrain-dem-v1',
    // });
    // map.setTerrain({ source: 'mapbox-dem', exaggeration: 1 });
  });
}

document.addEventListener("DOMContentLoaded", () => {
  const maps = document.querySelectorAll("[data-map]");
  maps.forEach((mapElement) => {
    const data = JSON.parse(mapElement.dataset.map);
    initMap(
      mapElement,
      data.accessToken,
      data.mapStyleId,
      data.mainMarker,
      data.mainMarkerTitle,
      data.mainMarkerColor,
      data.mapZoom,
      data.mapPitch,
      data.mapBearing,
      data.mapOffsetX,
      data.mapOffsetY,
      data.rowCount
    );
  });
});
