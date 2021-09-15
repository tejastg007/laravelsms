Highcharts.chart("chart-container", {
    title: {
        text: "Admission statistics in " + new Date().getFullYear(),
    },
    subtitle: {
        // text: 'source: tejas gaikwad '
    },
    xAxis: {
        categories: [
            "Jan",
            "Feb",
            "Mar",
            "April",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sept",
            "Oct",
            "Nov",
            "Dec",
        ],
    },
    yAxis: {
        title: {
            text: "Number of Students",
        },
    },
    legend: {
        // layout: 'vertical',
        // align: 'right',
        // verticalAlign: 'bottom',
    },
    plotOptions: {
        series: {
            allowPointSelect: true,
        },
    },
    series: [
        {
            name: "students",
            data: datas,
        },
    ],
});
