let myChart = document.getElementById('myChart').getContext('2d');


Chart.defaults.global.defaultFontFamily = 'Lato';
Chart.defaults.global.defaultFontSize = 18;
Chart.defaults.global.defaultFontColor = '#777';

let carChart = new Chart(myChart, {
  type:'bar',
  data:{
    labels : ['mercedes', 'renault', 'volvo', 'peugeot', 'dacia'],
    datasets:[{
      label: "Car's out",
      data : [
        60,
        22,
        19,
        52,
        55
    ],
      backgroundColor:[
        'rgba(255, 99, 132, 0.6)',
        'rgba(255, 99, 132, 0.6)',
        'rgba(255, 99, 132, 0.6)',
        'rgba(255, 99, 132, 0.6)',
        'rgba(255, 99, 132, 0.6)'
      ],
      borderWidth:1,
      borderColor:'#777',
      hoverBorderWidth:3,
      hoverBorderColor:'#000'
    }]
  },
  options:{
    title:{
      display:true,
      text: "Car's out",
      fontSize:25
    },
    legend:{
      display:true,
      position:'right',
      labels:{
        fontColor:'#000'
      }
    },
    layout:{
      padding:{
        left:50,
        right:0,
        bottom:0,
        top:0
      }
    },
    tooltips:{
      enabled:true
    }
  }
});