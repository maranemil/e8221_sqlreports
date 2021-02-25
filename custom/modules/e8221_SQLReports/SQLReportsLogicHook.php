<?php

/**
 * Created by PhpStorm.
 * User: emil
 * Date: 17.06.15
 * Time: 14:35
 */
class SQLReportsLogicHook {

   function CreateJsonData($focus, $event, $arguments = array()) {
	  //global $JSONDataSQLReport;
	  if (isset($_REQUEST['record'])) {

		 // (&$focus, $event, $arguments) {  // bean
		 // ($bean, $event, $arguments){
		 // $focus->custom_fields->retrieve();

		 global $currentModule, $db;

		 //echo $currentModule."<br>"; // e8221_SQLReports
		 //$sqlQueryReport = BeanFactory::getBean('e8221_SQLReports');

		 // Retrieve related record id: sqlgraph_type   sqlquery_text  sqljson data
		 $db    = DBManagerFactory::getInstance();
		 $query = "SELECT sqlquery_text FROM e8221_sqlreports WHERE id = '" . $_REQUEST['record'] . "'";

		 $result = $db->query($query, true);
		 $row    = $db->fetchByAssoc($result);

		 //$prepareSQL = preg_replace("/&#?[a-z0-9]+;/i","",$row['sqlquery_text']);
		 //$prepareSQL = strip_tags(html_entity_decode($row['sqlquery_text'])); // html_entity_decode htmlspecialchars_decode
		 $prepareSQL = str_replace("&#039;", "'", $row['sqlquery_text']);

		 ///////////////////////////////////////////////////
		 //
		 // PREPARE AND GET DATA
		 //
		 ///////////////////////////////////////////////////

		 /*
		  *
		 $sql = "SELECT your_qurey_here";
		 $res = $db->query($sql);
		 $row = $db->fetchByAssoc($res);
		 $cnt = $db->getRowCount($res);

		  * */

		 //echo "___-------------------------------------___<br>";
		 //echo htmlspecialchars_decode($row['sqlquery_text'],ENT_NOQUOTES);

		 $result       = $db->query(trim($prepareSQL), true); //
		 $rowsJsonData = array();
		 while ($rowx = $db->fetchByAssoc($result)) {
			$rowsJsonData[] = $rowx;
		 }

		 //echo "<pre><code>"; print_r($rowsJsonData); echo "</code></pre>";
		 //print json_encode($rowsJsonData);die();

		 $JSONDataSQLReport = json_encode($rowsJsonData);
		 $db->query("UPDATE e8221_sqlreports SET sqljson_data='" . $JSONDataSQLReport . "' WHERE id = '" . $_REQUEST['record'] . "'");
		 echo '<script>var JSONDataSQLReport = jQuery.parseJSON(' . $jsonData . ');</script>';

		 // die($rowsJsonData);

		 /*
				 <div id="demo"></div>
				 <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
				 <script>
				 (function() {

					 var JSONData = jQuery.parseJSON('<?php echo $jsonData;?>'');

					 var data = JSONData.slice()
					 var format = d3.time.format("%a %b %d %Y")
					 var amountFn = function(d) { return d.amount }
					 var dateFn = function(d) { return format.parse(d.created_at) }

					 var x = d3.time.scale()
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
						 .attr("cy", function(d) { return y(amountFn(d)) })
				 })();

				 var jsonCircles = jQuery.parseJSON(<?php echo $jsonData;?>);
				 var svgContainer = d3.select("body").append("svg")
													 .attr("width", 200)
													 .attr("height", 200);
				 var circles = svgContainer.selectAll("circle")
										   .data(jsonCircles)
										   .enter()
										   .append("circle");

				 var circleAttributes = circles
										.attr("cx", function (d) { return d.x_axis; })
										.attr("cy", function (d) { return d.y_axis; })
										.attr("r", function (d) { return d.radius; })
										.style("fill", function(d) { return d.color; });


				 </script>
		 */

		 /*
		  * [
		  * {"id":"1","user_name":"admin"},{"id":"9da50a4b-7c31-0a25-1682-54076abc15b3","user_name":"SNIPuser"},
		  * {"id":"seed_chris_id","user_name":"chris"},
		  * {"id":"seed_jim_id","user_name":"jim"},
		  * {"id":"seed_max_id","user_name":"max"},
		  * {"id":"seed_sally_id","user_name":"sally"},
		  * {"id":"seed_sarah_id","user_name":"sarah"},
		  * {"id":"seed_will_id","user_name":"will"}]
		  * */

		 //echo "<pre><code>". $row['sqlquery_text'] ."</code></pre>";
		 //$curitem = $focus->retrieve($current_entity,$_REQUEST['record']);
		 //$focus->save();
		 //echo $curitem->id."<br>";

		 //echo "___-------------------------------------___<br>";

	  }
   }

}