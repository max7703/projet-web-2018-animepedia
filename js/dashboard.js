var canvas = document.getElementById("aboParMembre");
var ctx = canvas.getContext('2d');

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 16;

var data = {
    labels: ["Membres", "Abonnés"],
    datasets: [
        {
            fill: true,
            backgroundColor: [
                'green',
                'red'],
            data: [document.getElementById("nombreUtilisateurs").innerText, document.getElementById("nombreUtilisateursAbonnes").innerText],
            borderColor:	['black', 'black'],
            borderWidth: [2,2]
        }
    ]
};

// Notice the rotation from the documentation.
var options = {
    title: {
        display: true,
        text: 'Abonnés par membres',
        position: 'top'
    },
    rotation: -0.7 * Math.PI
};

// Chart declaration:
var myBarChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: options
});
