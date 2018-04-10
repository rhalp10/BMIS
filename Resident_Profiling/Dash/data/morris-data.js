$(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2010 Q1',
            Adult: 2666,
            Senior: null,
            Infant: 2647
        }, {
            period: '2010 Q2',
            Adult: 2778,
            Senior: 2294,
            Infant: 2441
        }, {
            period: '2010 Q3',
            Adult: 4912,
            Senior: 1969,
            Infant: 2501
        }, {
            period: '2010 Q4',
            Adult: 3767,
            Senior: 3597,
            Infant: 5689
        }, {
            period: '2011 Q1',
            Adult: 6810,
            Senior: 1914,
            Infant: 2293
        }, {
            period: '2011 Q2',
            Adult: 5670,
            Senior: 4293,
            Infant: 1881
        }, {
            period: '2011 Q3',
            Adult: 4820,
            Senior: 3795,
            Infant: 1588
        }, {
            period: '2011 Q4',
            Adult: 15073,
            Senior: 5967,
            Infant: 5175
        }, {
            period: '2012 Q1',
            iphone: 10687,
            Senior: 4460,
            Infant: 2028
        }, {
            period: '2012 Q2',
            Adult: 8432,
            Senior: 5713,
            Infant: 1791
        }],
        xkey: 'period',
        ykeys: ['Adult', 'Senior', 'Infant'],
        labels: ['Adult', 'Senior', 'Infant'],
        labels: ['Adult', 'Senior', 'Infant'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Download Sales",
            value: 12
        }, {
            label: "In-Store Sales",
            value: 30
        }, {
            label: "Mail-Order Sales",
            value: 20
        }],
        resize: true
    });

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2006',
            a: 100,
            b: 90
        }, {
            y: '2007',
            a: 75,
            b: 65
        }, {
            y: '2008',
            a: 50,
            b: 40
        }, {
            y: '2009',
            a: 75,
            b: 65
        }, {
            y: '2010',
            a: 50,
            b: 40
        }, {
            y: '2011',
            a: 75,
            b: 65
        }, {
            y: '2012',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        hideHover: 'auto',
        resize: true
    });
    
});
