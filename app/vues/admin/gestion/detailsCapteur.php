<button type="button" class="goBack" onclick="goBack()">Retour à la page cuisine</button>

<div class="container">
    <div class="element">
        <div class="photo">
            <img src="<?=ROOT_URL?>/static/image/entreprise/eco-light.png" width="100%" alt="">
        </div>
        <div class="on_off">
            <span>Eteindre/Allumer le capteur</span>
            <label class="toggle-button">
            <input type="checkbox">
            <span class="slider round"></span>
            </label>
        </div>
    </div>
    <div class="info">
        <div class="tete">
        <div class="navbar">
            <ul>
              <li><button type="button" onclick="generale()">Générale</button></li>
              <li><button type="button" onclick="programme()">Programme</button></li>
              <li><button type="button" onclick="reglages()">Réglages</button></li>
              <li><button type="button" onclick="ambiances()">Ambiances</button></li>
            </ul>
        </div>
        </div>
        <div id="tableau_de_bord">
            <div class="tabcontent" id="generale">
                <h2>Période d'utilisation</h2>
                <div id="diagrammeBaton">
                    <img src="<?=ROOT_URL?>/static/image/icon/loading-gif-lp.gif" width="40%" alt="">
                </div>
            </div>
            <div class="tabcontent" id="programme">
                <h2>Programmer un horaire</h2>
                <div class="modal-big-text">
                    <table>
                        <?php
                        for ($i=0; $i < 5; $i++) {
                        ?>
                        <tr>
                            <td>Lundi</td>
                            <td>
                            <p class="heure">22:30</p>
                            <span>Tamisé</span>
                            </td>
                            <td>
                              <label class="toggle-button">
                                <input type="checkbox">
                                <span class="slider round"></span>
                              </label>
                            </td>
                            <td>
                              <a href="#">
                               <img src="<?=ROOT_URL?>/static/image/icon/modifier-icon-lp.png" width="20%" alt="">
                              </a>
                            </td>
                            <td>
                              <a href="#">
                                <img src="<?=ROOT_URL?>/static/image/icon/delete-icon-lp.png" width="20%" alt="">
                             </a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                
            </div>
            <div class="tabcontent" id="reglages">
                <h2>Intensité lumineuse</h2>
                <div class="container-diagrammeCirculaire">
                <div id="diagrammeCirculaire">
                    <img src="<?=ROOT_URL?>/static/image/icon/loading-gif-lp.gif" width="40%" alt="">
                </div>
                <div class="plus_moins">
                    <button type="button" name="button" class="ajouterLuminosite">+</button>
                    <button type="button" name="button" class="diminuerLuminosite">-</button>
                </div>
                </div>
            </div>
            <div class="tabcontent" id="ambiances">
                <h2>Gérer l'ambiance</h2>
                <div class="">
                    <ul>
                        <li>
                            <span>Tamisé</span>
                            <label class="toggle-button">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </li>
                        <li>
                            <span>Travail</span>
                            <label class="toggle-button">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </li>
                        <li>
                            <span>Illumination Max</span>
                            <label class="toggle-button">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
    </div>
    
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

function goBack() {
  document.location.href="<?=ROOT_URL?>?Route=admin&Ctrl=capteur&Vue=vuePrincipale";
}

function generale() {
    var tabcontent;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
    }
    document.getElementById("generale").style.display = "block";
}

function programme() {
    var tabcontent;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    document.getElementById("programme").style.display = "block";

}

function reglages() {
    var tabcontent;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    document.getElementById("reglages").style.display = "block";
}

function ambiances() {
    var tabcontent;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    document.getElementById("ambiances").style.display = "block";
}

/*Diagramme baton*/ 

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBarColors)
function drawBarColors() {
  var data = google.visualization.arrayToDataTable([
    ['Date', 'Heure'],
    ['22/11/2018', 2],
    ['23/11/2018', 4],
    ['24/11/2018', 10],
    ['25/11/2018', 8],
    ['26/11/2018', 3],
  ]);

  var options = {
    width: 550,
    height: 270,
    chartArea: {width: '70%'},
    colors: ['#FFD006'],
    vAxis: {
      title: "Heure d'utilisation",
      minValue: 0,
      maxValue: 24,
    },
    legend: 'none',
  }

  var chart = new google.visualization.ColumnChart(document.getElementById('diagrammeBaton'));
  chart.draw(data, options);

}

/*Diagramme circulaire*/ 

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawChart)

function drawChart() {
// Define the chart to be drawn.
  var data = new google.visualization.DataTable();
  var data_modal = new google.visualization.DataTable();
  data.addColumn('string', 'Element');
  data.addColumn('number', 'Percentage');
  data.addRows([
    ['Utilisé', 90],
    ['Non-utilisé', 10],
  ]);
  data_modal.addColumn('string', 'Element');
  data_modal.addColumn('number', 'Percentage');
  data_modal.addRows([
    ['Utilisé', 60],
    ['Non-utilisé', 40],
  ]);
  var options = {
    'width':'100%',
    'height':220,
    'legend':'none',
    'colors': ['#FFD006', '#FAFAFA'],
    'pieHole': 0.5
  };
  var options_modal = {
    'width':'60%',
    'height':160,
    'legend':'none',
    'colors': ['#FFD006', '#FAFAFA'],
    'pieHole': 0.5
  };
  // Instantiate and draw the chart.
  var chart = new google.visualization.PieChart(document.getElementById('diagrammeCirculaire'));
  chart.draw(data, options);
  var chart_modal = new google.visualization.PieChart(document.getElementById('diagrammeCirculaireModal'));
  chart_modal.draw(data_modal, options_modal)

}
</script>