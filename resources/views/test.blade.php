<head>
    <style> body { margin: 0; } </style>

    <script src="//unpkg.com/d3"></script>

    <script src="//unpkg.com/globe.gl"></script>
    <!--<script src="../../dist/globe.gl.js"></script>-->
</head>

<body>
<div id="globeViz"></div>

<script>
    const colorScale = d3.scaleSequentialSqrt(d3.interpolateYlOrRd);

    // GDP per capita (avoiding countries with small pop)
    const getVal = feat => feat.properties.GDP_MD_EST / Math.max(1e5, feat.properties.POP_EST);

    fetch('/data/data.geojson').then(res => res.json()).then(countries =>
    // fetch('/data/population.geojson').then(res => res.json()).then(countries =>
    {
        const maxVal = Math.max(...countries.features.map(getVal));
        colorScale.domain([0, maxVal]);

        const world = Globe()
            // .globeImageUrl('//unpkg.com/three-globe/example/img/earth-night.jpg')
            // .globeImageUrl('//unpkg.com/three-globe/example/img/earth-day.jpg')
            .globeImageUrl('//unpkg.com/three-globe/example/img/earth-blue-marble.jpg')
            .backgroundImageUrl('//unpkg.com/three-globe/example/img/night-sky.png')
            .lineHoverPrecision(0)
            .polygonsData(countries.features.filter(d => d.properties.ISO_A2 !== 'AQ'))
            .polygonAltitude(0.06)
            // .polygonCapColor(feat => { colorScale(getVal(feat)) } )
            .polygonCapColor(feat => {
                let continent = feat.properties.CONTINENT;
                let color_code;
                switch (continent){
                    case "Asia" : color_code = "#ff5555"; break;
                    case "Europe" : color_code = "#55ff55"; break;
                    case "America" : color_code = "#5555ff"; break;
                    case "Oceania" : color_code = "#55ffff"; break;
                    case "Africa" : color_code = "#ff55ff"; break;
                    default : color_code = "#ffff55"; break;
                }
                console.log("color_code",color_code);
                return color_code;
            })
            .polygonSideColor(() => 'rgba(0, 100, 0, 0.15)')
            .polygonStrokeColor(() => '#111')
            .polygonLabel(({ properties: d }) => `
          <b>${d.ADMIN} (${d.ISO_A2}):</b> <br />
          GDP: <i>${d.GDP_MD_EST}</i> M$<br/>
          Population: <i>${d.POP_EST}</i>
        `)
            .onPolygonHover(hoverD => world
                .polygonAltitude(d => d === hoverD ? 0.12 : 0.06)
                .polygonCapColor(d => d === hoverD ? 'steelblue' : colorScale(getVal(d)))
            )
            .polygonsTransitionDuration(300)
            (document.getElementById('globeViz'))
    });
</script>
</body>