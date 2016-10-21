<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 18.10.2016
 * Time: 11:24
 */
?>
<div class="panel panel-default panel-table">
    <div class="panel-body">
        <div id="openModalSensor">
            <button type="button" class="btn btn-default modalActionButton" id="newDataModalSensor">
                <span class="glyphicon btn-glyphicon glyphicon-plus"></span>
                create new sensor
            </button>
        </div>


        <div id="tabellenkontext">
            <table
                data-advanced-search="true"
                data-classes="table table-hover table-striped table-condensed "
                data-export-types="['csv', 'txt', 'excel']"
                data-icons-prefix="fa"
                data-icons="icons"
                data-height="635"
                data-page-list="[10, 20, 40, 60, 80, 100]"
                data-page-size="20"
                data-pagination="true"
                data-search="true"
                data-search-align="right"
                data-search-time-out="250"
                data-show-columns="true"
                data-show-refresh="true"
                data-show-toggle="false"
                data-show-export="true"
                data-sort-name="name"
                data-sort-order="desc"
                data-striped="true"
                data-toggle="table"
                data-toolbar="#openModalSensor"
                data-toolbar-align="left"
                data-trim-on-search="false"
                data-undefined-text=""
                data-unique-id="pkid"
                data-url="/index/getData"
                id="overviewTable">

                <thead>
                <tr>
                    <th
                        data-field="name"
                        data-sortable="true"
                        data-halign="center"
                        data-valign="middle">name
                    </th>
                    <th
                        data-field="location"
                        data-sortable="true"
                        data-halign="center"
                        data-valign="middle">location
                    </th>
                    <th
                        data-field="userID"
                        data-sortable="true"
                        data-halign="center"
                        data-valign="middle">user
                    </th>
                    <th
                        data-field="created"
                        data-sortable="true"
                        data-halign="center"
                        data-valign="middle"
                        data-sorter="dateSorter">created
                    </th>
                </tr>
                </thead>
            </table>
        </div>

    </div>
</div>
