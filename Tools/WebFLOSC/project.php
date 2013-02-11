<?php
$Id = $_GET["Id"];
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>WebSLOC</title>
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojo/resources/dojo.css">
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.6/dijit/themes/claro/claro.css">
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojox/grid/resources/EnhancedGrid.css">
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.6/dojox/grid/resources/claroGrid.css">

		<style>
			.project {
				font-weight: bold;
			}
			/*Grid need a explicit width/height by default*/
			#grid {
			    width: 630px;
			    margin:0px auto;
			}

			#fields {
			    margin:0px auto;
			    text-align: center;
			}
			#indus, #indusLabels, #archi, #archiLabels, #dep, #depLabels, #chart {
			    width: 1000px ;
			    margin-left: auto ;
			    margin-right: auto ;
			}

		</style>
		<!-- load dojo and provide config via data attribute -->
		<script src="http://ajax.googleapis.com/ajax/libs/dojo/1.6.0/dojo/dojo.xd.js"
				data-dojo-config="isDebug: true,parseOnLoad: true">
		</script>
		<script>
			dojo.require("dojox.grid.EnhancedGrid");
			dojo.require("dojo.data.ItemFileWriteStore");
			dojo.require("dijit.form.TextBox");
			dojo.require("dijit.form.Button");
			dojo.require("dijit.form.VerticalSlider");
			dojo.require("dijit.form.VerticalRule");
			dojo.require("dijit.form.VerticalRuleLabels");
			dojo.require('dojox.charting.Chart2D');
			dojo.require('dojox.charting.widget.Chart2D');
			dojo.require('dojox.charting.themes.Harmony');
			dojo.require("dojox.charting.action2d.Tooltip");
			dojo.require("dojox.charting.action2d.Magnify");

			var grid, store, data, myname, myversion, myEditButton, myDeleteButton, indus, archi, dep, localStore;
			dojo.ready(function(){
				/* Project's name and version with button to Edit/Save */
				myname = new dijit.form.TextBox({
				    name: "myname",
				    readOnly: true,
				}, "myname");
				myversion = new dijit.form.TextBox({
				    name: "myversion",
				    readOnly: "disabled",
				}, "myversion");
				dojo.xhrGet({
				    url:  "<?php echo "tonic/docroot/project/$Id"; ?>",
				    handleAs:"json",
				    load: function(result) {
					myname.set('value', result.items.Name);   
					myversion.set('value', result.items.Version);  
					dijit.byId("indus").set("value", result.items.Indus);
					dijit.byId("archi").set("value", result.items.Archi);
					dijit.byId("dep").set("value", result.items.Dep);
				    }
				});
				myEditButton = new dijit.form.Button({
				    name: "myEditButton",
				    label: "Edit",
				    onClick: function() {
				      if (myEditButton.get('label') == "Edit") {
					myname.set('readOnly', false);   
					myversion.set('readOnly', false); 
					dijit.byId("indus").set('readOnly', false);  
					dijit.byId("archi").set('readOnly', false);  
					dijit.byId("dep").set('readOnly', false);  
					myEditButton.set('label', 'Save');
				      } else {
					var project = { 
					  identifier:"Id", 
					  items:{ 
					    Name:myname.get('value'), 
					    Version:myversion.get('value'), 
					    Indus:dijit.byId("indus").get("value"), 
					    Archi:dijit.byId("archi").get("value"),
					    Dep:dijit.byId("dep").get("value")
					  }
					};
					dojo.xhrPut({
					    url: "<?php echo "tonic/docroot/project/$Id"; ?>",
					    putData: dojo.toJson(project),
					    load: function(data) {
						alert(data);
					    },
					    error: function(error) {
						alert(error);
					    }
					});
					myname.set('readOnly', true);   
					myversion.set('readOnly', true);  
					dijit.byId("indus").set('readOnly', true);  
					dijit.byId("archi").set('readOnly', true);  
					dijit.byId("dep").set('readOnly', true);  
					myEditButton.set('label', 'Edit');					
				      }
				    }
				}, "myEditButton");
				myDeleteButton = new dijit.form.Button({
				    name: "myDeletetButton",
				    label: "Delete",
				    onClick: function() {
				      if( confirm("Do you really want to delete this project?" )) {
					dojo.xhrDelete({
					    url: "<?php echo "tonic/docroot/project/$Id"; ?>",
					    handleAs: "text",
					    load: function(data) {
						alert(data);
						dojo.global.back();
					    },
					    error: function(error) {
						alert(error);
					    }
					});	
				      }
				    }
				}, "myDeleteButton");
				/* Call to REST Tonic backend to fetch languages stats */
				store = new dojo.data.ItemFileWriteStore({
					url: "<?php echo "tonic/docroot/languages/$Id"; ?>"
				});
				/* DataGrid to dsplay languages stats */
				grid = new dojox.grid.EnhancedGrid({
					store: store,
					query: { Name: "*" },
					structure: [
						{ name: "Language", field: "Name", width: "300px", classes: "project" },
						{ name: "Sloc", field: "Sloc", width: "100px", cellStyles: "text-align: right;"  },
						{ name: "Ratio", field: "Ratio", width: "100px", cellStyles: "text-align: right;"  },
						{ name: "Function Points", field: "PFna", width: "100px", cellStyles: "text-align: right;" }
					]
				}, "grid");
				grid.startup();
				/* Adjustment factor: industrialization */
				indus = dojo.byId("indus");
				var indusNode = document.createElement('div');
				indus.appendChild(indusNode);
				var indusRuleLabels = new dijit.form.VerticalRuleLabels({
					labels: [
					  "0 : pas d'utilisation d'outils pour gérer le développement (bugtracker, forums...), code source difficile à trouver, pas de roadmap",
					  "1 : seuls quelques processus sont exposés, outillés et utilisés",
					  "2 : processus de développement, de demandes d'évolution, des tests, d'intégration continue... mis en oeuvre, documentés et respectés"
					 ]
				}, dojo.byId("indusLabels"));
				var indusSlider = new dijit.form.VerticalSlider({
				    name: "indus",
				    value: 0,
				    minimum: 0,
				    maximum: 2,
				    discreteValues: 3,
				    readOnly: "disabled",
				    style: "height:90px;"
				}, indus);
				/* Adjustment factor: architecture and modularity */
				archi = dojo.byId("archi");
				var archiNode = document.createElement('div');
				archi.appendChild(archiNode);
				var archiRuleLabels = new dijit.form.VerticalRuleLabels({
					labels: [
					  "0 : code monolithique, langage non objet, pas d'organisation du code en couches ou en modules",
					  "1 : code faiblement architecturé mais proposant quelques principes de factorisation du code, sans que cela soit généralisé à l'ensemble de ce dernier",
					  "2 : code très modulaire, orienté objet avec héritage et utilisation d'interfaces, organisé en modules correspondant à des couches fonctionnelles différentes"
					 ]
				}, dojo.byId("archiLabels"));
				var archiSlider = new dijit.form.VerticalSlider({
				    name: "archi",
				    value: 0,
				    minimum: 0,
				    maximum: 2,
				    discreteValues: 3,
				    readOnly: "disabled",
				    style: "height:90px;"
				}, archi);
				/* Adjustment factor: dependency */
				dep = dojo.byId("dep");
				var depNode = document.createElement('div');
				dep.appendChild(archiNode);
				var depRuleLabels = new dijit.form.VerticalRuleLabels({
					labels: [
					  "0 : logiciel embarquant de nombreuses libraries externes ou de nombreux greffons",
					  "1 : logiciel embarquant quelques librairies externes ou pouvant être étendu via quelques greffons",
					  "2 : logiciel n'embarquant aucune librairie externe et n'étant pas conçu pour être étendu via des greffons"
					 ]
				}, dojo.byId("depLabels"));
				var depSlider = new dijit.form.VerticalSlider({
				    name: "dep",
				    value: 0,
				    minimum: 0,
				    maximum: 2,
				    discreteValues: 3,
				    readOnly: "disabled",
				    style: "height:90px;"
				}, dep);

				//Fetch the data.
				store.fetch({query: {}, onComplete: gotAll});
				function gotAll(items, request) {
				  localStore = items;
				  var chartData = [];
				  dojo.forEach(localStore,function(item,i) {
				      chartData.push({ x: i, y: item["PFna"], tooltip: item["Name"] });
				  });
				  var chart = new dojox.charting.Chart2D('chart').
				    setTheme(dojox.charting.themes.Harmony).
				    addPlot('default', {type: 'Pie', radius: 50, fontColor: 'black', labels: false }).
				    addSeries('Languages', chartData).
				    render();
				  var slice = new dojox.charting.action2d.MoveSlice(chart, 'default');
				  var tip = new dojox.charting.action2d.Tooltip(chart, "default");
				  var magnify = new dojox.charting.action2d.Magnify(chart, "default", { scale: 1.1 } );
				  chart.render();
				}
			});
		</script>

	</head>
	<body class="claro" style="text-align: center;">
		<br/>
		<img src="flosc-logo-small.png" alt="FLOS Complexity"/>
		<br/><br/>
		<div id="fields">
		  <label for="myname">Name: </label>
		  <input type="text" id="myname"></input>
		  <label for="myversion">Version: </label>
		  <input type="text" id="myversion"></input>
		</div>
		<h2>SLOC and Function Points</h2>
		<div id="chart" style="width: 140px; height: 140px;"></div>
		<div id="grid"></div>		
		<h2>Industrialisation du projet</h2>
		<div id="indus"><div id="indusLabels"></div></div>
		<h2>Architecture/modularité du code</h2>
		<div id="archi"><div id="archiLabels"></div></div>
		<h2>Dépendances (librairies et greffons)</h2>
		<div id="dep"><div id="depLabels"></div></div>
		<button id="myEditButton" type="button"></button>
		<button id="myDeleteButton" type="button"></button>
	</body>
	</body>
</html>