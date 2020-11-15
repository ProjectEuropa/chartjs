<canvas id="myChart"></canvas>
<script>

var datas =<?php echo $js_datas ?>;
var date_legend =<?php echo $js_date_legend ?>;
var values_1 = Object.values(datas[0]);
var values_2 = Object.values(datas[1]);
var values_3 = Object.values(datas[2]);

var xs = Object.keys(date_legend);

var ctx = document.getElementById('myChart').getContext('2d');

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: xs,
        datasets: [{
            label: '訪問系',
            data: values_1,
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        },{
            label: '入居系',
            data: values_2,
            backgroundColor: 'rgba(75, 192, 192, 0.5)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        },{
            label: '通所系',
            data: values_3,
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }
        ]
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