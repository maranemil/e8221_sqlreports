<?php
$module_name = 'e8221_SQLReports';
$viewdefs [$module_name]
    = array(
    'EditView' =>
        array(
            'templateMeta' =>
                array(
                    'maxColumns'          => '2',
                    'widths'              =>
                        array(
                            0 =>
                                array(
                                    'label' => '10',
                                    'field' => '30',
                                ),
                            1 =>
                                array(
                                    'label' => '10',
                                    'field' => '30',
                                ),
                        ),
                    'useTabs'             => false,
                    'tabDefs'             =>
                        array(
                            'DEFAULT'             =>
                                array(
                                    'newTab'       => false,
                                    'panelDefault' => 'expanded',
                                ),
                            'LBL_EDITVIEW_PANEL1' =>
                                array(
                                    'newTab'       => false,
                                    'panelDefault' => 'expanded',
                                ),
                        ),
                    'syncDetailEditViews' => true,
                ),
            'panels'       =>
                array(
                    'default'             =>
                        array(
                            0 =>
                                array(
                                    0 => 'name',
                                    1 => 'assigned_user_name',
                                ),
                            1 =>
                                array(
                                    0 =>
                                        array(
                                            'name'          => 'team_name',
                                            'displayParams' =>
                                                array(
                                                    'display' => true,
                                                ),
                                        ),
                                ),
                            2 =>
                                array(
                                    0 => 'description',
                                ),
                        ),
                    'lbl_editview_panel1' =>
                        array(
                            0 =>
                                array(
                                    0 =>
                                        array(
                                            'name'   => 'sqlgraph_type',
                                            'studio' => 'visible',
                                            'label'  => 'LBL_SQLGRAPH_TYPE',
                                        ),
                                ),
                            1 =>
                                array(
                                    0 =>
                                        array(
                                            'name'   => 'sqlquery_text',
                                            'studio' => 'visible',
                                            'label'  => 'LBL_SQLQUERY_TEXT',
                                        ),
                                ),
                            2 =>
                                array(
                                    0 =>
                                        array(
                                            'name'   => 'sqljson_data',
                                            'studio' => 'visible',
                                            'label'  => 'LBL_SQLJSON_DATA',
                                        ),
                                ),
                        ),
                ),
        ),
);

