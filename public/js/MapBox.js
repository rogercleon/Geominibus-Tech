//TOKEN_MAPBOX = pk.eyJ1IjoicGExMjMiLCJhIjoiY2wwOHdxOXNlMDNmdzNrbXh4cHNvZDVldCJ9.4KFEbiatdIBLxigRTbDFCg

//const { map } = require("lodash")

mapboxgl.accessToken = 'pk.eyJ1IjoicGExMjMiLCJhIjoiY2wwOHdxOXNlMDNmdzNrbXh4cHNvZDVldCJ9.4KFEbiatdIBLxigRTbDFCg'

let map = new mapboxgl.Map({
    container:'map',
    style:'mapbox://styles/mapbox/streets-v11',
    center:[-17.4449866,-66.1275537],
    zoom: 15
})
