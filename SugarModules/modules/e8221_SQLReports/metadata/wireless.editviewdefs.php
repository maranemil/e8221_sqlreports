<?php
/*********************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 ********************************************************************************/

$module_name = 'e8221_SQLReports';
$viewdefs[$module_name]['EditView'] = array(
    'templateMeta' => array('maxColumns' => '1',
                            'widths'     => array(
                                array('label' => '10', 'field' => '30'),
                                array('label' => '10', 'field' => '30')
                            ),
    ),

    'panels' => array(
        array(
            'name',
        ),
        array(
            'assigned_user_name',
        ),
        array(
            'team_name',
        ),
    )

);
