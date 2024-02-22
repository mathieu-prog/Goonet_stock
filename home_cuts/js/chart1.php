<script>
Chart.defaults.font. family='quicksand';
function displayData(argument) {
var noms= <?php echo json_encode($noms); ?>;
var qtes= <?php echo json_encode($qtes); ?>;

//setup block
const data={
 labels: noms,
      datasets: [{
        label: 'Quantité disponible',
        data: qtes,
        labelColor:'#4583FF',
        backgroundColor:'#4583FF',
        borderRadius: 7
   }]
  };

//config block
const config={
   type: 'bar',
    data,
    options: {
      scales: {
        x: {
          grid: {
            display: false
          }
        },
        y: {
           beginAtZero: true,
          grid: {
            display: false
          }
        }
      },
       responsive: true,
       maintainAspectRatio: false,
    plugins: {
      legend: {
        position: 'top',
        
        
      },
      title: {
        display: true,
        text: 'Les quantités de tous les articles disponibles dans les stocks',
       
      }
    }
    }
};

//Render block
    const mychart=new Chart(
  document.getElementById('mychart'),
  config);



}
function displayDataLine(argument) {
var qtes= <?php echo json_encode($qtesMonth); ?>;

//setup block
const data={
 labels: ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre' ,'décembre'],
      datasets: [{
        label: 'Quantités sorties',
        data: qtes,
        labelColor:'#FFBF00',
        backgroundColor:'#FFBF00'
   }]
  };

//config block
const config={
   type: 'line',
    data,
    options: {
      scales: {
        x: {
          grid: {
            display: false
          }
        },
        y: {
           beginAtZero: true,
          grid: {
            display: false
          }
        }
      },
       responsive: true,
       maintainAspectRatio: false,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Les quantités sorties par mois autour de l`année actuelle('+new Date().getFullYear()+')'
      }
    }
    }
};

//Render block
    const mychart=new Chart(
  document.getElementById('mychartLine'),
  config);




}

function displayDataTypes(argument) {
var noms= ['Stock principal','Stock client','Stock périmé','Fournisseur'];
var arts= <?php echo json_encode($arts); ?>;

//setup block
const data={
 labels: noms,
      datasets: [{
        label: 'Articles disponibles',
        data: arts,
        labelColor:'#4583FF',
        backgroundColor:['#35FF32','#28BAC7','#5828C7','#B89F10']
   }]
  };

//config block
const config={
   type: 'pie',
    data,
    options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Nombre d`articles par stocks'
      }
    }
    }
};

//Render block
    const mychart=new Chart(
  document.getElementById('piechart'),
  config);




}
displayData();
displayDataLine();
displayDataTypes();
</script>