<canvas id="myChart"></canvas>
<script>

var labels =<?php echo $labels ?>;
var sorted_datas =<?php echo $sorted_datas ?>;

var ctx = document.getElementById('myChart').getContext('2d');

var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: labels,
        datasets: [{
            label: '4',
            data: sorted_datas[3],
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        },{
            label: '3',
            data: sorted_datas[2],
            backgroundColor: 'rgba(255, 206, 86, 0.5)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
        },{
            label: '2',
            data: sorted_datas[1],
            backgroundColor: 'rgba(75, 192, 192, 0.5)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        },{
            label: '1',
            data: sorted_datas[0],
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
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