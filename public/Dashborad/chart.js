
var ctx = document.getElementById('myChart').getContext('2d');
var earnings = document.getElementById('earnings').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
        labels: ["Flipkart","Amazon","meesho"],
        datasets: [{
            label: '# of Votes',
            data: [1200, 1900, 3000],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            // borderColor: [
            //     'rgba(255, 99, 132, 1)',
            //     'rgba(54, 162, 235, 1)',
            //     'rgba(255, 206, 86, 1)'
            // ],
            borderWidth: 1
        }]
    },
    options: {
       responsive: true,
    }
});

var myChart = new Chart(earnings, {
    type: 'bar',
    data: {
        labels: ["January","February","March","April","May","June","july","August","September","October","November","December"],
        datasets: [{
            label: '# of Earnings',
            data: [1200, 1900, 3000,2200,1800,1500,1450,1950,2308,2098,2306,1268],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(220, 206, 86, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(225, 256, 86, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(154, 162, 235, 1)',
                'rgba(75, 206, 86, 1)'

            ],
            // borderColor: [
            //     'rgba(255, 99, 132, 1)',
            //     'rgba(54, 162, 235, 1)',
            //     'rgba(255, 206, 86, 1)'
            // ],
            borderWidth: 1
        }]
    },
    options: {
       responsive: true,
    }
});


