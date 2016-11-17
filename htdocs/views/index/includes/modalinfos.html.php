<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 27.10.2016
 * Time: 16:11
 */
use Mvc\Library\AppTexts;
$text = new AppTexts();
?>

<div class="modal fade" id="InfoModal" tabindex="-1" role="dialog" aria-labelledby="labelSensorModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="labelInfoModal"><?php if ($_SESSION['language'] == "de") {
                        echo $text->infosensor;
                    } else {
                        echo $text->infosensorEN; }  ?></h4>
            </div>
            <div class="modal-body form-horizontal">

                <p>Deine mudda</p>


                <!-- Hier kannst du deins eintragen-->

                <!-- SVG erstellen ... ???-->

                <svg width="300" height="200"></svg>

                <script>

                    <!-- D3 Minimalbeispiel Test-->

                    var dataset = [ 5, 10, 15, 20, 25, 30 ];

                    d3.select("body").selectAll("p")
                        .data(dataset)
                        .enter()
                        .append("p")
                        .text("Your mom sucks*");

                    <!-- Beispiel Ende -->
                    <!-- Beispiel Ende -->




                    var svg = d3.select("svg"),
                        margin = {top: 20, right: 80, bottom: 30, left: 50},
                        width = svg.attr("width") - margin.left - margin.right,
                        height = svg.attr("height") - margin.top - margin.bottom,
                        g = svg.append("g").attr("transform", "translate(" + margin.left + "," + margin.top + ")");

                    var parseTime = d3.timeParse("%Y-%m-%d %H:%M:%S");

                    var x = d3.scaleTime().range([0, width]),
                        y = d3.scaleLinear().range([height, 0]),
                        z = d3.scaleOrdinal(d3.schemeCategory10);

                    var line = d3.line()
                        .curve(d3.curveBasis)
                        .x(function(d) {
                            return x(d.time);
                        })
                        .y(function(d) {
                            return y(d.sensordata);
                        });

                    d3.csv("sensor_datas.csv", type, function(error, data) {
                        if (error) throw error;

                        var values = data.columns.slice(3).map(function(id) {
                            return {
                                id: id,
                                values: data.map(function(d) {
                                    return {time: d.time, sensordata: d[id]};
                                })
                            };
                        });

                        x.domain(d3.extent(data, function(d) {
                            return d.time;
                        }));

                        y.domain([
                            d3.min(values, function(c) {
                                return d3.min(c.values, function(d) {
                                    return d.sensordata; });
                            }),
                            d3.max(values, function(c) {
                                return d3.max(c.values, function(d) {
                                    return d.sensordata; }); })
                        ]);

                        z.domain(values.map(function(c) {
                            return c.id;
                        }));

                        g.append("g")
                            .attr("class", "axis axis--x")
                            .attr("transform", "translate(0," + height + ")")
                            .call(d3.axisBottom(x));

                        g.append("g")
                            .attr("class", "axis axis--y")
                            .call(d3.axisLeft(y))
                            .append("text")
                            .attr("transform", "rotate(-90)")
                            .attr("y", 6)
                            .attr("dy", "0.71em")
                            .attr("fill", "red")

                        var value = g.selectAll(".value")
                            .data(values)
                            .enter().append("g")
                            .attr("class", "value");

                        value.append("path")
                            .attr("class", "line")
                            .attr("d", function(d) {
                                return line(d.values);
                            })
                            .style("stroke", function(d) {
                                return z(d.id);
                            });

                        value.append("text")
                            .datum(function(d) {
                                return {id: d.id, value: d.values[d.values.length - 1]};
                            })
                            .attr("transform", function(d) {
                                return "translate(" + x(d.value.time) + "," + y(d.value.sensordata) + ")";
                            })
                            .attr("x", 3)
                            .attr("dy", "0.35em")
                            .style("font", "10px sans-serif")
                            .text(function(d) {
                                return d.id;
                            });
                    });

                    function type(d, _, columns) {
                        d.time = parseTime(d.time);
                        for (var i = 1, n = columns.length, c; i < n; ++i) d[c = columns[i]] = +d[c];
                        return d;
                    }

                </script>





            </div >

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php if ($_SESSION['language'] == "de") {
                        echo $text->cancel;
                    } else {
                        echo $text->cancelEN; }  ?></button>
            </div>
        </div>
    </div>
</div>
