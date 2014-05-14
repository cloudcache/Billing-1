<?php

namespace App\AdminBundle\Business\Staff;


use App\AdminBundle\Business\Base\BaseGridHandler;


class GridHandler extends BaseGridHandler
{

    function buildBaseQuery($query, $baseObject = 'p', $filter)
    {
        $query->select($baseObject)
            ->from('AppUserBundle:User', $baseObject)
            ->andWhere($baseObject.'.roles = :admin')
            ->setParameter('admin', 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}')
        ;

        // Build filter here - Consult arrayToSQL($filter, false)
        $this->container->get('app_admin.helper.kendo_grid')->filter($query, $baseObject, $filter);
    }

    public function postParseRow(&$r)
    {
        $item = $r;

        $r = array();

        $r['id']        = $item['id'];
        $r['firstname'] = $item['firstname'];
        $r['lastname']  = $item['lastname'];
        $r['email']     = $item['email'];
    }
}