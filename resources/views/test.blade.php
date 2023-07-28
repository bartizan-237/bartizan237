

        <style> body { margin: 0; } </style>

        <script src="//unpkg.com/d3"></script>

        <script src="//unpkg.com/globe.gl"></script>
        <!--<script src="../../dist/globe.gl.js"></script>-->

    <div id="globeViz"></div>

    <script>
        const colorScale = d3.scaleSequentialSqrt(d3.interpolateYlOrRd);

        // GDP per capita (avoiding countries with small pop)
        const getVal = feat => feat.properties.GDP_MD_EST / Math.max(1e5, feat.properties.POP_EST);

        fetch('/data/data.geojson').then(res => res.json()).then(countries =>
        {
            const maxVal = Math.max(...countries.features.map(getVal));
            colorScale.domain([0, maxVal]);

            const world = Globe()
                .globeImageUrl('//unpkg.com/three-globe/example/img/earth-day.jpg')
                // .backgroundImageUrl('//unpkg.com/three-globe/example/img/night-sky.png')
                // .backgroundImageUrl('/image/asia_bg.jpg')
                .backgroundColor('rgb(237,237,237)')
        //         .lineHoverPrecision(0)
        //         .polygonsData(countries.features.filter(d => d.properties.ISO_A2 !== 'AQ'))
        //         .polygonAltitude(0.06)
        //         .polygonCapColor(feat => colorScale(getVal(feat)))
        //         .polygonSideColor(() => 'rgba(0, 100, 0, 0.15)')
        //         .polygonStrokeColor(() => '#111')
        //         .polygonLabel(({ properties: d }) => `
        //   <b>${d.ADMIN} (${d.ISO_A2}):</b> <br />
        //   GDP: <i>${d.GDP_MD_EST}</i> M$<br/>
        //   Population: <i>${d.POP_EST}</i>
        // `)
        //         .onPolygonHover(hoverD => world
        //             .polygonAltitude(d => d === hoverD ? 0.12 : 0.06)
        //             .polygonCapColor(d => d === hoverD ? 'steelblue' : colorScale(getVal(d)))
        //         )
        //         .polygonsTransitionDuration(300)
                (document.getElementById('globeViz'))
        });
    </script>
