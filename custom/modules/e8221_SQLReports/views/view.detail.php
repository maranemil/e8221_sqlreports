<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


require_once('include/MVC/View/views/view.detail.php');

class Custome8221_SQLReportsViewDetail extends ViewDetail
{

	function Custome8221_SQLReportsViewDetail()
	{
		parent::ViewDetail();
	}

	/**
	 * display
	 * Override the display method to support customization for the buttons that display
	 * a popup and allow you to copy the account's address into the selected contacts.
	 * The custom_code_billing and custom_code_shipping Smarty variables are found in
	 * include/SugarFields/Fields/Address/DetailView.tpl (default).  If it's a English U.S.
	 * locale then it'll use file include/SugarFields/Fields/Address/en_us.DetailView.tpl.
	 */
	function display()
	{
		parent::display();

		// Retrieve related record id: sqlgraph_type   sqlquery_text  sqljson data
		$db = DBManagerFactory::getInstance();
		$query = "SELECT sqljson_data FROM e8221_sqlreports WHERE id = '" . $_REQUEST['record'] . "' LIMIT 1"; // sqlquery_head
		$result = $db->query($query, true);
		$row = $db->fetchByAssoc($result);

		//$prepareSQL = preg_replace("/&#?[a-z0-9]+;/i","",$row['sqlquery_text']);
		//$prepareSQL = strip_tags(html_entity_decode($row['sqlquery_text'])); // html_entity_decode htmlspecialchars_decode
		//$prepareSQL = str_replace("&#039;","'",$row['sqljson_data']);

		// echo $JSONDataSQLReport = str_replace(array("[","]"),"",trim("".$row['sqljson_data']));
		$JSONDataSQLReport = $row['sqljson_data'];
		//$JSONHeadSQLReport =  $row['sqlquery_head'];

		//$arJson = (array) json_decode($JSONDataSQLReport,true);
		//$arJson = json_decode(json_encode($JSONDataSQLReport),true); // (array)
		//$arJson = json_decode($JSONDataSQLReport,true); // (array)
		//$arJson = (array) json_decode($JSONDataSQLReport,true);
		//$arJson = array_slice( $arJson, 0, 10 );
		//$arJson = explode("},{",$JSONDataSQLReport);

		//print "<pre>"; print_r( (array) $JSONDataSQLReport); print "</pre>";

		/*$arJsonTmp = array();
		foreach($arJson as $JsonLine){
			//$arJsonTmp[] = "{".str_replace(array("{","}"),"",$JsonLine)."}";
			$arJsonTmp[] = "".str_replace(array("{","}"),"",$JsonLine)."";
			$arLine = explode(",",$arJsonTmp[0]);
		}


		print "<pre>"; print_r($arLine); print "</pre>";*/
		//print "<pre>"; var_dump($arJson); print "</pre>";

		//foreach($arJson AS $prop => $val) {echo '<br/>'. $prop .' - '. $val;}
		// print_r((array) json_decode($object));


		/*
		//------------------------------------------------------
		// file_get_contents - get file content (JSON string in it)
		// json_decode       - decode JSON string to PHP object
		// get_object_vars   - convert PHP object to array
		$data = get_object_vars( json_decode( file_get_contents( 'data.txt' ) ) );
		$data = array_slice( $data, 0, 10 ); // now you can array functions
		echo json_encode( $data );

		//------------------------------------------------------
		// Array of default settings
		$defaults = [];
		$options =  (array) json_decode(json_encode($JSONDataSQLReport), true);
		$options =  json_decode(html_entity_decode($_REQUEST['fields']), true);
		// Merge defaults & options, prioritising options
		$options = array_replace_recursive($defaults, $options);
		// Convert options back to an object
		$options = json_decode(json_encode($options),true);
		//------------------------------------------------------

		$jsonData = json_encode(array(
			array("user"=>"John","age"=>22),
			array("user"=>"smith","age"=>26)
		));

		//------------------------------------------------------
		 * // Strip HTML Tags
		$clear = strip_tags($des);
		// Clean up things like &amp;
		$clear = html_entity_decode($clear);
		// Strip out any url-encoded stuff
		$clear = urldecode($clear);
		// Replace non-AlNum characters with space
		$clear = preg_replace('/[^A-Za-z0-9]/', ' ', $clear);
		// Replace Multiple spaces with single space
		$clear = preg_replace('/ +/', ' ', $clear);
		// Trim the string of leading/trailing space
		$clear = trim($clear);

		 //------------------------------------------------------
		 // Create new stdClass Object
		 $init = new stdClass;

		 // Add some test data
		 $init->foo = "Test data";
		 $init->bar = new stdClass;
		 $init->bar->baaz = "Testing";
		 $init->bar->fooz = new stdClass;
		 $init->bar->fooz->baz = "Testing again";
		 $init->foox = "Just test";

		 // Convert array to object and then object back to array
		 $array = objectToArray($init);
		 $object = arrayToObject($array);

		 // Print objects and array
		 print_r($init);
		 echo "\n";
		 print_r($array);
		 echo "\n";
		 print_r($object);
		//------------------------------------------------------


		*/
		//print "<pre>"; print_r($JSONHeadSQLReport); print "</pre>";

		$jsonData = (string)html_entity_decode($JSONDataSQLReport); //  // strval  (string)
		//$jsonHead = (string) html_entity_decode($JSONHeadSQLReport);

		$phpStdbjData = (array)json_decode($jsonData, true);
		//$phpStdbjHead = (array) json_decode($jsonHead,true);

		//print "<pre>"; print_r($phpStdbj); print "</pre>";
		/*
				foreach($phpStdbj AS $prop => $val) {
					//echo '<br/>'. $prop .' - '. $val
					print "<pre>"; print_r($val); print "</pre>";
				}
		*/

		//$JsonKeys = array_keys($phpStdbjHead[0]);
		//print "<pre>"; print_r($JsonKeys); print "</pre>";

		if (is_array($phpStdbjHead)) {
			foreach ($phpStdbjHead[0] AS $prop => $val) {
				//echo '<br/>'. $prop .' - '. $val;
				if ($prop == "x") {
					$varD3JsX = $val;
				}
				if ($prop == "y") {
					$varD3JsY = $val;
				}
			}
		}
		?>


		<!--        <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>-->
		<script src="http://d3js.org/d3.v3.min.js"></script>
		<style>
			.axis text {
				font: 10px sans-serif;
			}

			.axis path, .axis line {
				fill: none;
				stroke: #000;
				shape-rendering: crispEdges;
			}

			.bar {
				fill: steelblue;
				fill-opacity: .9;
			}

			.x.axis path {
				display: block;
			}

			label {
				position: absolute;
				top: 10px;
				right: 10px;
			}
		</style>
		<script>

			var JSONDataSQLReport = '<?php echo (string) html_entity_decode($JSONDataSQLReport);?>';
			var data = JSONDataSQLReport;
			var jsonObj = $.parseJSON(JSONDataSQLReport); // = JSON.stringify
			console.log(jsonObj);
			/*for (i in jsonObj)
			 {
			 console.log(jsonObj[i]["id"]);
			 }
			 */
			$('#contentTable').append('<div id="demo"></div>');

			//(function() {
			$(document).ready(function () {

				setTimeout(function () {


					//var data = [{"id":"1","user_name":"admin"},{"id":"9da50a4b-7c31-0a25-1682-54076abc15b3","user_name":"SNIPuser"},{"id":"seed_chris_id","user_name":"chris"},{"id":"seed_jim_id","user_name":"jim"},{"id":"seed_max_id","user_name":"max"},{"id":"seed_sally_id","user_name":"sally"},{"id":"seed_sarah_id","user_name":"sarah"},{"id":"seed_will_id","user_name":"will"}];
					//var data = [{"date":"2012-03-20","total":"1","total2":"1"},{"date":"2012-03-24","total":"3","total2":"4"}]
					//var data = [{"date":"2012-03-20","total":3},{"date":"2012-03-21","total":8},{"date":"2012-03-22","total":2},{"date":"2012-03-23","total":10},{"date":"2012-03-24","total":3},{"date":"2012-03-25","total":20},{"date":"2012-03-26","total":12}];

					var margin = {top: 40, right: 40, bottom: 40, left: 40},
						width = 600,
						height = 200;

					/*
					 var x = d3.time.scale()
					 //.domain([new Date(data[0].
					<?php echo $varD3JsX?>), d3.time.day.offset(new Date(data[data.length - 1].date), 1)])
					 //.domain([0, d3.max(data, function(d) { return d.
					<?php echo $varD3JsX?>; })])
					 .rangeRound([0, width - margin.left - margin.right]);

					 var y = d3.scale.linear()
					 //.domain([0, d3.max(data, function(d) { return d.
					<?php echo $varD3JsY?>; })])
					 .range([height - margin.top - margin.bottom, 0]);
					 */

					var parseDate = d3.time.format("%Y-%m").parse;
					var x = d3.scale.ordinal().rangeRoundBands([0, width], .05);
					var y = d3.scale.linear().range([height, 0]);

					var xAxis = d3.svg.axis()
						.scale(x)
						.orient("bottom")
						.tickFormat(d3.time.format("%Y-%m"));

					var yAxis = d3.svg.axis()
						.scale(y)
						.orient("left")
						.ticks(20);

					var svg = d3.select("#demo").append("svg")
						.attr("width", width + margin.left + margin.right)
						.attr("height", height + margin.top + margin.bottom)
						.append("g")
						.attr("transform",
						"translate(" + margin.left + "," + margin.top + ")");

					svg.append("g")
						.attr("class", "x axis")
						.attr("transform", "translate(10," + height + ")")
						.call(xAxis)
						.selectAll("text")
						.style("text-anchor", "end")
						.attr("dx", "-.9em")
						.attr("dy", "-.5em")
						.attr("transform", "rotate(-90)");

					svg.append("g")
						.attr("class", "y axis")
						.call(yAxis)
						.append("text")
						.attr("transform", "rotate(-90)")
						.attr("y", 61)
						.attr("dy", "-.71em")
						.style("text-anchor", "end")
						.text("Value");

					svg.selectAll("bar")
						.data(data)
						.enter().append("rect")
						.style("fill", "teal")
						//.text(function(d) { return d; })
						.attr("x", function (d) {
							return x(d.id);
						})
						.attr("width", x.rangeBand())
						.attr("y", function (d) {
							return d.user_name;
						})
						.attr("height", function (d) {
							return height - height / 4;
						});


					/*




					 [Object { id="2014-09-03 ",  user_name="5"}, Object { id="2014-09-03 ",  user_name="8"}, Object { id="2014-09-03 ",  user_name="5"}, Object { id="2014-09-03 ",  user_name="3"}, Object { id="2014-09-03 ",  user_name="3"}, Object { id="2014-09-03 ",  user_name="5"}, Object { id="2014-09-03 ",  user_name="5"}, Object { id="2014-09-03 ",  user_name="4"}]

					 https://gist.github.com/d3noob/8952219
					 http://www.d3noob.org/2014/02/making-bar-chart-in-d3js.html
					 https://strongriley.github.io/d3/tutorial/bar-1.html
					 http://alignedleft.com/tutorials/d3/making-a-bar-chart
					 http://bost.ocks.org/mike/bar/2/
					 http://bost.ocks.org/mike/bar/3/
					 http://www.sitepoint.com/creating-simple-line-bar-charts-using-d3-js/
					 http://hdnrnzk.me/2012/07/04/creating-a-bar-graph-using-d3js/
					 http://jsfiddle.net/enigmarm/3HL4a/13/



					 //var JSONData = jQuery.parseJSON(JSONDataSQLReport);
					 var JSONData = [{"id":"1","user_name":"admin"},{"id":"9da50a4b-7c31-0a25-1682-54076abc15b3","user_name":"SNIPuser"},{"id":"seed_chris_id","user_name":"chris"},{"id":"seed_jim_id","user_name":"jim"},{"id":"seed_max_id","user_name":"max"},{"id":"seed_sally_id","user_name":"sally"},{"id":"seed_sarah_id","user_name":"sarah"},{"id":"seed_will_id","user_name":"will"}];
					 var data = JSONData.slice()

					 var margin = {top: 20, right: 20, bottom: 30, left: 40},
					 width = 960 - margin.left - margin.right,
					 height = 500 - margin.top - margin.bottom;

					 var formatPercent = d3.format(".0%");

					 var x = d3.scale.ordinal()
					 .rangeRoundBands([0, width], .1, 1);

					 var y = d3.scale.linear()
					 .range([height, 0]);

					 var xAxis = d3.svg.axis()
					 .scale(x)
					 .orient("bottom");

					 var yAxis = d3.svg.axis()
					 .scale(y)
					 .orient("left")
					 .tickFormat(formatPercent);

					 var svg = d3.select("#demo").append("svg")
					 .attr("width", width + margin.left + margin.right)
					 .attr("height", height + margin.top + margin.bottom)
					 .append("g")
					 .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
					 */

					/*var x = d3.time.scale()
					 .range([10, 280])
					 .domain(d3.extent(data, dateFn))

					 var y = d3.scale.linear()
					 .range([180, 10])
					 .domain(d3.extent(data, amountFn))

					 var svg = d3.select("#demo").append("svg:svg")
					 .attr("width", 300)
					 .attr("height", 200)

					 svg.selectAll("circle").data(data).enter()
					 .append("svg:circle")
					 .attr("r", 4)
					 .attr("cx", function(d) { return x(dateFn(d)) })
					 .attr("cy", function(d) { return y(amountFn(d)) })*/


					/*d3.tsv("data.tsv", function(error, data) {

					 data.forEach(function(d) {
					 d.frequency = +d.frequency;
					 });

					 x.domain(data.map(function(d) { return d.letter; }));
					 y.domain([0, d3.max(data, function(d) { return d.frequency; })]);

					 svg.append("g")
					 .attr("class", "x axis")
					 .attr("transform", "translate(0," + height + ")")
					 .call(xAxis);

					 svg.append("g")
					 .attr("class", "y axis")
					 .call(yAxis)
					 .append("text")
					 .attr("transform", "rotate(-90)")
					 .attr("y", 6)
					 .attr("dy", ".71em")
					 .style("text-anchor", "end")
					 .text("Frequency");

					 svg.selectAll(".bar")
					 .data(data)
					 .enter().append("rect")
					 .attr("class", "bar")
					 .attr("x", function(d) { return x(d.letter); })
					 .attr("width", x.rangeBand())
					 .attr("y", function(d) { return y(d.frequency); })
					 .attr("height", function(d) { return height - y(d.frequency); });

					 d3.select("input").on("change", change);

					 var sortTimeout = setTimeout(function() {
					 d3.select("input").property("checked", true).each(change);
					 }, 2000);

					 function change() {
					 clearTimeout(sortTimeout);

					 // Copy-on-write since tweens are evaluated after a delay.
					 var x0 = x.domain(data.sort(this.checked
					 ? function(a, b) { return b.frequency - a.frequency; }
					 : function(a, b) { return d3.ascending(a.letter, b.letter); })
					 .map(function(d) { return d.letter; }))
					 .copy();

					 svg.selectAll(".bar")
					 .sort(function(a, b) { return x0(a.letter) - x0(b.letter); });

					 var transition = svg.transition().duration(750),
					 delay = function(d, i) { return i * 50; };

					 transition.selectAll(".bar")
					 .delay(delay)
					 .attr("x", function(d) { return x0(d.letter); });

					 transition.select(".x.axis")
					 .call(xAxis)
					 .selectAll("g")
					 .delay(delay);
					 }
					 });*/


				}, 1000);

				//})();
			});

		</script>

		<?php


		/*if(empty($this->bean->id)){
			global $app_strings;
			sugar_die($app_strings['ERROR_NO_RECORD']);
		}	*/
		
		/*
		global $mod_strings;
		if(ACLController::checkAccess('Contacts', 'edit', true)) {
			$push_billing = '<span class="id-ff"><button class="button btn_copy" title="' . $mod_strings['LBL_PUSH_CONTACTS_BUTTON_LABEL'] . 
								 '" type="button" onclick=\'open_contact_popup("Contacts", 600, 600, "&account_name=' .
								 urlencode($this->bean->name) . '&html=change_address' .
								 '&primary_address_street=' . str_replace(array("\rn", "\r", "\n"), array('','','<br>'), urlencode($this->bean->billing_address_street)) . 
								 '&primary_address_city=' . $this->bean->billing_address_city . 
								 '&primary_address_state=' . $this->bean->billing_address_state . 
								 '&primary_address_postalcode=' . $this->bean->billing_address_postalcode . 
								 '&primary_address_country=' . $this->bean->billing_address_country .
								 '", true, false);\' value="' . $mod_strings['LBL_PUSH_CONTACTS_BUTTON_TITLE']. '">'.
								 SugarThemeRegistry::current()->getImage("id-ff-copy","",null,null,'.png',$mod_strings["LBL_COPY"]).
								 '</button></span>';
								 
			$push_shipping = '<span class="id-ff"><button class="button btn_copy" title="' . $mod_strings['LBL_PUSH_CONTACTS_BUTTON_LABEL'] . 
								 '" type="button" onclick=\'open_contact_popup("Contacts", 600, 600, "&account_name=' .
								 urlencode($this->bean->name) . '&html=change_address' .
								 '&primary_address_street=' . str_replace(array("\rn", "\r", "\n"), array('','','<br>'), urlencode($this->bean->shipping_address_street)) .
								 '&primary_address_city=' . $this->bean->shipping_address_city .
								 '&primary_address_state=' . $this->bean->shipping_address_state .
								 '&primary_address_postalcode=' . $this->bean->shipping_address_postalcode .
								 '&primary_address_country=' . $this->bean->shipping_address_country .
								 '", true, false);\' value="' . $mod_strings['LBL_PUSH_CONTACTS_BUTTON_TITLE'] . '">'.
								  SugarThemeRegistry::current()->getImage("id-ff-copy",'',null,null,'.png',$mod_strings['LBL_COPY']).
								 '</button></span>';
		} else {
			$push_billing = '';
			$push_shipping = '';
		}

		$this->ss->assign("custom_code_billing", $push_billing);
		$this->ss->assign("custom_code_shipping", $push_shipping);
        
        if(empty($this->bean->id)){
			global $app_strings;
			sugar_die($app_strings['ERROR_NO_RECORD']);
		}		*/

		//$this->dv->process();
		//echo $this->dv->display();
	}
}

?>