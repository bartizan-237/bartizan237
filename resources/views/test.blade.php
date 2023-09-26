<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        html {
            background: #11e8bb; /* Old browsers */
            background: -moz-linear-gradient(top,  #11e8bb 0%, #8200c9 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(top,  #11e8bb 0%,#8200c9 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom,  #11e8bb 0%,#8200c9 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#11e8bb', endColorstr='#8200c9',GradientType=0 ); /* IE6-9 */
            overflow: hidden;
        }
        body { margin: 0; }
    </style>

    <script src="//unpkg.com/d3"></script>
    <script src="//unpkg.com/three"></script>
    <script src="//unpkg.com/globe.gl"></script>
    <!--<script src="../../dist/globe.gl.js"></script>-->
</head>

<body style="background-color: #0093E9; background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);">
<div id="globe" style="background-color: #0093E9; background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);"></div>

<script>
    const colorScale = d3.scaleSequentialSqrt(d3.interpolateYlOrRd);

    // GDP per capita (avoiding countries with small pop)
    const getVal = feat => feat.properties.GDP_MD_EST / Math.max(1e5, feat.properties.POP_EST);

    fetch('/data/data.geojson').then(res => res.json()).then(countries =>
    // fetch('/data/population.geojson').then(res => res.json()).then(countries =>
    {
        const maxVal = Math.max(...countries.features.map(getVal));
        colorScale.domain([0, maxVal]);


        // background-color: #0093E9; background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
        const world = Globe()
            // .globeImageUrl('//unpkg.com/three-globe/example/img/earth-night.jpg')
            // .globeImageUrl('//unpkg.com/three-globe/example/img/earth-day.jpg')
            // .globeImageUrl('//unpkg.com/three-globe/example/img/earth-blue-marble.jpg')
            // .backgroundImageUrl('/image/globe_background.png')
            .backgroundImageUrl('/image/globe_bg.png')
            // .backgroundColor("#0093E9")
            .lineHoverPrecision(0)
            .polygonsData(countries.features.filter(d => d.properties.ISO_A2 !== 'AQ'))
            // .polygonAltitude(0.06)
            .polygonAltitude(0.01)
            // .polygonCapColor(feat => { colorScale(getVal(feat)) } )
            .polygonCapColor(feat => {
                let continent = feat.properties.CONTINENT;
                let color_code;
                switch (continent){
                    case "Asia" : color_code = "rgba(255,100,100,1)"; break;
                    case "America" : color_code = "rgba(100,255,100,1)"; break;
                    case "Europe" : color_code = "rgba(100,100,255,1)"; break;
                    case "Oceania" : color_code = "rgba(100,255,255,1)"; break;
                    case "Africa" : color_code = "rgba(255,100,255,1)"; break;
                    default : color_code = "rgba(255,255,100,1)"; break;
                }
                return color_code;
            })
            // .polygonSideColor(() => 'rgba(0, 100, 0, 0.15)')
            .polygonSideColor(() => 'rgba(100, 100, 100, 0.2)')
            .polygonStrokeColor(() => '#111')
        //     .polygonLabel(({ properties: d }) => `
        //   <b>${d.ADMIN} (${d.ISO_A2}):</b> <br />
        //   GDP: <i>${d.GDP_MD_EST}</i> M$<br/>
        //   Population: <i>${d.POP_EST}</i>
        // `)
            .polygonLabel(({ properties: d }) => `<div style="height:120px; padding: 10px; width: 250px;background: #333333; color:#fdfdfd">
          <p style="font-size: 15px; line-height: 20px;">${d.ADMIN} (${d.ISO_A2})</p>
          <p style="font-size: 15px; line-height: 20px;">GDP: ${d.GDP_MD_EST} M$</p>
          <p style="font-size: 15px; line-height: 20px;">Population: ${d.POP_EST}</p>
        </div>`)
            .onPolygonHover(hoverD => world
                // .polygonAltitude(d => d === hoverD ? 0.12 : 0.06)
                // .polygonCapColor(d => d === hoverD ? 'steelblue' : colorScale(getVal(d)))
                // .polygonCapColor(d => d === hoverD ? 'steelblue' : colorScale(getVal(d)))
                .polygonAltitude(d => d === hoverD ? 0.05 : 0.01)
                .polygonSideColor(d => d === hoverD ? 'rgba(50, 255, 50, 0.2)' : 'rgba(100, 100, 100, 0.2)')
                .polygonStrokeColor(d => d === hoverD ? 'rgba(50, 255, 50, 0.9)' : 'rgba(100, 100, 100, 0.2)')
            )
            .polygonsTransitionDuration(300)
            (document.getElementById('globe'))

        world.globeMaterial().color = new THREE.Color('#0093E9');
    });
</script>
</body>
</html>
