var myChart = document.getElementById("myChart").getContext("2d");

// Global Options
Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;
Chart.defaults.global.defaultFontColor = "#777";

var massPopChart = new Chart(myChart, {
    type: "bar", // bar, horizontalBar, pie, line, doughnut, radar, polarArea
    data: {
        labels: ["JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
        datasets: [
            {
                label: "Jumlah Aspirasi Tahun ini",
                backgroundColor: "#007bff",
                borderColor: "#007bff",
                data: [100, 120, 135, 125, 90, 99, 87],
            },
            {
                label: "Jumlah Aspirasi Tahun Lalu",
                backgroundColor: "#ced4da",
                borderColor: "#ced4da",
                data: [17, 127, 124, 200, 100, 98, 90],
            },
        ],
    },
    options: {
        title: {
            display: true,
            text: "Jumlah Aspirasi Bulan Ini",
            fontSize: 25,
            responsive: true,
        },
        legend: {
            display: true,
            position: "right",
            labels: {
                fontColor: "#000",
            },
        },
        layout: {
            padding: {
                left: 50,
                right: 0,
                bottom: 0,
                top: 0,
            },
        },
        tooltips: {
            enabled: true,
        },
    },
});
