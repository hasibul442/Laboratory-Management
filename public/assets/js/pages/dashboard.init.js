!(function (l) {
    "use strict";
    var o = function () {
        (this.$body = l("body")), (this.charts = []);
    };
    (o.prototype.respChart = function (a, r, e, t) {
        var n = Chart.controllers.line.prototype.draw;
        Chart.controllers.line.prototype.draw = function () {
            n.apply(this, arguments);
            var o = this.chart.chart.ctx,
                a = o.stroke;
            o.stroke = function () {
                o.save(),
                    (o.shadowColor = "#aaa"),
                    (o.shadowBlur = 10),
                    (o.shadowOffsetX = 0),
                    (o.shadowOffsetY = 4),
                    a.apply(this, arguments),
                    o.restore();
            };
        };
        var i = a.get(0).getContext("2d"),
            s = l(a).parent();
        return (function () {
            var o;
            switch ((a.attr("width", l(s).width()), r)) {
                case "Line":
                    o = new Chart(i, { type: "line", data: e, options: t });
                    break;
                case "Doughnut":
                    o = new Chart(i, { type: "doughnut", data: e, options: t });
                    break;
                case "Pie":
                    o = new Chart(i, { type: "pie", data: e, options: t });
                    break;
                case "Bar":
                    o = new Chart(i, { type: "bar", data: e, options: t });
                    break;
                case "Radar":
                    o = new Chart(i, { type: "radar", data: e, options: t });
                    break;
                case "PolarArea":
                    o = new Chart(i, {
                        data: e,
                        type: "polarArea",
                        options: t,
                    });
            }
            return o;
        })();
    }),
        (o.prototype.initCharts = function () {
            var o = [],
                a = document
                    .getElementById("sales-chart")
                    .getContext("2d")
                    .createLinearGradient(500, 0, 100, 0);
            a.addColorStop(0, "#0acf97"), a.addColorStop(1, "#02a8b5");
            var r = {
                labels: [
                    "01",
                    "02",
                    "03",
                    "04",
                    "05",
                    "06",
                    "07",
                    "08",
                    "09",
                    "10",
                    "11",
                    "12",
                ],
                datasets: [
                    {
                        label: "Sales",
                        fill: !0,
                        backgroundColor: "rgba(2, 168, 181, 0.1)",
                        borderColor: a,
                        pointBorderColor: a,
                        pointBackgroundColor: a,
                        pointHoverBackgroundColor: a,
                        pointHoverBorderColor: a,
                        data: [18, 41, 86, 49, 20, 65, 64, 86, 49, 30, 45, 25],
                    },
                ],
            };
            o.push(
                this.respChart(l("#sales-chart"), "Line", r, {
                    maintainAspectRatio: !1,
                    responsive: !0,
                    legend: { display: !1 },
                    animation: { easing: "easeInOutBack" },
                    scales: {
                        yAxes: [
                            {
                                display: !1,
                                ticks: {
                                    fontColor: "rgba(0,0,0,0.5)",
                                    fontStyle: "bold",
                                    beginAtZero: !0,
                                    maxTicksLimit: 5,
                                    padding: 0,
                                },
                                gridLines: { drawTicks: !1, display: !1 },
                            },
                        ],
                        xAxes: [
                            {
                                display: !1,
                                gridLines: { zeroLineColor: "transparent" },
                                ticks: {
                                    padding: 0,
                                    fontColor: "rgba(0,0,0,0.5)",
                                    fontStyle: "bold",
                                },
                            },
                        ],
                    },
                })
            );
            o.push(
                this.respChart(
                    l("#high-performing-product"),
                    "Bar",
                    {
                        labels: [
                            "01",
                            "02",
                            "03",
                            "04",
                            "05",
                            "06",
                            "07",
                            "08",
                            "09",
                            "10",
                            "11",
                            "12",
                            "13",
                            "14",
                            "15",
                        ],
                        datasets: [
                            {
                                label: "Sales Analytics",
                                backgroundColor: "#fa5c7c",
                                borderColor: "#fa5c7c",
                                borderWidth: 1,
                                hoverBackgroundColor: "#fa5c7c",
                                hoverBorderColor: "#fa5c7c",
                                data: [
                                    65, 59, 80, 81, 56, 89, 40, 32, 65, 59, 80,
                                    81, 56, 89, 40, 32, 65, 59, 80, 81, 56, 89,
                                    40, 32, 65, 59, 80, 81, 56, 89, 40,
                                ],
                            },
                        ],
                    },
                    {
                        maintainAspectRatio: !1,
                        legend: { display: !1 },
                        scales: {
                            yAxes: [
                                {
                                    gridLines: { display: !1 },
                                    ticks: { max: 100, min: 20, stepSize: 20 },
                                },
                            ],
                            xAxes: [
                                {
                                    barPercentage: 0.2,
                                    gridLines: { color: "rgba(0,0,0,0.03)" },
                                },
                            ],
                        },
                    }
                )
            );
            var e = document
                .getElementById("conversion-chart")
                .getContext("2d")
                .createLinearGradient(0, 300, 0, 100);
            e.addColorStop(0, "#02a8b5"), e.addColorStop(1, "#0acf97");
            var t = {
                labels: ["", "", "", "", "", "", "", ""],
                datasets: [
                    {
                        label: "Conversion Funnels",
                        fill: !0,
                        backgroundColor: e,
                        borderColor: e,
                        pointBorderColor: e,
                        pointBackgroundColor: e,
                        pointHoverBackgroundColor: "transparent",
                        pointHoverBorderColor: "transparent",
                        data: [28, 34, 46, 76, 60, 62, 26, 14],
                    },
                ],
            };
            o.push(
                this.respChart(l("#conversion-chart"), "Line", t, {
                    maintainAspectRatio: !1,
                    legend: { display: !1 },
                    animation: { easing: "easeInOutBack" },
                    elements: {
                        point: { radius: 0, hitRadius: 10, hoverRadius: 5 },
                    },
                    tooltips: { enabled: !1 },
                    scales: {
                        yAxes: [{ display: !1, ticks: { suggestedMin: 0 } }],
                        xAxes: [
                            {
                                scaleShowLabels: !1,
                                gridLines: {
                                    zeroLineColor: "transparent",
                                    color: "rgba(0,0,0,0.03)",
                                },
                                ticks: {
                                    padding: -28,
                                    fontColor: "#dee2e6",
                                    fontStyle: "bold",
                                },
                            },
                        ],
                    },
                })
            );
            r = {
                labels: [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                ],
                datasets: [
                    {
                        label: "Sales Analytics",
                        fill: !0,
                        backgroundColor: "rgba(255,255,255,0.2)",
                        borderColor: "#fff",
                        borderCapStyle: "butt",
                        borderDash: [],
                        borderDashOffset: 0,
                        pointBorderColor: "#fff",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 1,
                        pointRadius: 1,
                        pointHitRadius: 5,
                        data: [65, 59, 80, 81, 56, 55, 40, 35, 30],
                    },
                ],
            };
            o.push(
                this.respChart(l("#lineChart"), "Line", r, {
                    maintainAspectRatio: !1,
                    legend: { display: !1 },
                    animation: { easing: "easeInOutBack" },
                    scales: {
                        yAxes: [
                            {
                                display: !1,
                                ticks: {
                                    fontColor: "rgba(0,0,0,0.5)",
                                    fontStyle: "bold",
                                    beginAtZero: !0,
                                    maxTicksLimit: 10,
                                    padding: 0,
                                },
                                gridLines: { drawTicks: !1, display: !1 },
                            },
                        ],
                        xAxes: [
                            {
                                display: !1,
                                gridLines: { zeroLineColor: "transparent" },
                                ticks: {
                                    padding: -20,
                                    fontColor: "rgba(0,0,0,0.5)",
                                    fontStyle: "bold",
                                },
                            },
                        ],
                    },
                })
            );
            o.push(
                this.respChart(
                    l("#doughnut"),
                    "Doughnut",
                    {
                        labels: ["Wallet Balance", "Travels", "Food & Drinks"],
                        datasets: [
                            {
                                data: [300, 50, 100],
                                backgroundColor: [
                                    "#02a8b5",
                                    "#fa5c7c",
                                    "#ebeff2",
                                ],
                                borderColor: "transparent",
                                borderWidth: "3",
                            },
                        ],
                    },
                    {
                        maintainAspectRatio: !1,
                        cutoutPercentage: 80,
                        legend: { display: !1 },
                    }
                )
            );
            return (
                o.push(
                    this.respChart(
                        l("#datauses-area-1"),
                        "Line",
                        {
                            labels: [
                                "01",
                                "02",
                                "03",
                                "04",
                                "05",
                                "06",
                                "07",
                                "08",
                                "09",
                            ],
                            datasets: [
                                {
                                    label: "Downloads",
                                    fill: !0,
                                    backgroundColor: "rgba(57, 175, 209, 0.2)",
                                    borderColor: "#39afd1",
                                    borderWidth: 2,
                                    lineTension: 0,
                                    pointBorderWidth: 2,
                                    pointBackgroundColor: "#fff",
                                    pointBorderColor: "#39afd1",
                                    pointRadius: 3,
                                    pointHitRadius: 3,
                                    data: [65, 59, 80, 81, 56, 55, 40, 35, 30],
                                },
                                {
                                    label: "Uploads",
                                    fill: !0,
                                    backgroundColor: "rgba(254, 104, 105, 0.2)",
                                    borderColor: "#fe6869",
                                    borderWidth: 2,
                                    lineTension: 0,
                                    pointBorderWidth: 2,
                                    pointBackgroundColor: "#fff",
                                    pointBorderColor: "#fe6869",
                                    pointRadius: 3,
                                    pointHitRadius: 3,
                                    data: [22, 28, 42, 38, 12, 22, 18, 9, 3],
                                },
                            ],
                        },
                        {
                            maintainAspectRatio: !1,
                            legend: { display: !1 },
                            animation: { easing: "easeInOutBack" },
                            plugins: { filler: { propagate: !1 } },
                            scales: {
                                yAxes: [
                                    {
                                        display: !1,
                                        ticks: {
                                            fontColor: "rgba(0,0,0,0.5)",
                                            fontStyle: "bold",
                                            beginAtZero: !0,
                                            padding: 0,
                                        },
                                        gridLines: {
                                            drawTicks: !1,
                                            display: !1,
                                        },
                                    },
                                ],
                                xAxes: [
                                    {
                                        display: !0,
                                        gridLines: {
                                            zeroLineColor: "transparent",
                                        },
                                        ticks: {
                                            padding: 5,
                                            fontColor: "rgba(0,0,0,0.5)",
                                            fontStyle: "bold",
                                        },
                                    },
                                ],
                            },
                        }
                    )
                ),
                o
            );
        }),
        (o.prototype.init = function () {
            l("#datatable").DataTable({
                pageLength: 5,
                searching: !1,
                lengthChange: !1,
            });
                // l("#usa").vectorMap({
                //     map: "usa_en",
                //     enableZoom: !0,
                //     showTooltip: !0,
                //     selectedColor: null,
                //     hoverColor: null,
                //     backgroundColor: "#fff",
                //     color: "#f2f5f7",
                //     borderColor: "#bcbfc7",
                //     colors: { mo: "#02c0ce", fl: "#02c0ce", or: "#02c0ce" },
                //     onRegionClick: function (o, a, r) {
                //         o.preventDefault();
                //     },
                // });
            var a = this;
            (a.charts = this.initCharts()),
                l(window).on("resize", function (o) {
                    l.each(a.charts, function (o, a) {
                        try {
                            a.destroy();
                        } catch (o) {
                            console.log(o);
                        }
                    }),
                        (a.charts = a.initCharts());
                });
        }),
        (l.Dashboard = new o()),
        (l.Dashboard.Constructor = o);
})(window.jQuery),
    (function (o) {
        "use strict";
        window.jQuery.Dashboard.init();
    })();
