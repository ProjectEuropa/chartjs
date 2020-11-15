<canvas id="myChart"></canvas>
<script>
var datas =<?php echo $js_datas ?>;
var date_legend =<?php echo $js_date_legend ?>;
var values = Object.values(datas[0]);
var xs = Object.keys(date_legend);

var ctx = document.getElementById('myChart').getContext('2d');

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: xs,
        datasets: [{
            label: '施設',
            data: values,
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            xAxes: [{
                stacked: true
            }],
            yAxes: [{
                stacked: true,
                ticks: {
                    beginAtZero: true,
                }
            }]
        }
    }
});
</script>