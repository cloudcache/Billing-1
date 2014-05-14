<?php
namespace App\AdminBundle\Business\Client;

use App\AdminBundle\Business\Base\BaseGridHandler;

class GridHandler extends BaseGridHandler
{
    function buildBaseQuery($query, $baseObject = 'p', $filter)
    {
        $query->select($baseObject)
            ->from('AppUserBundle:User', $baseObject)
            ->andWhere($baseObject.'.roles = :null')
            ->setParameter('null', 'a:0:{}')
        ;

        // Build filter here - Consult arrayToSQL($filter, false)
        $this->container->get('app_admin.helper.kendo_grid')->filter($query, $baseObject, $filter);
    }

    public function postParseRow(&$r)
    {
        unset($r['password']);
        unset($r['salt']);

        $r['balance'] = Utils::computeBalance($this->container, $r['id']);
        $r['balance'] = $this->helperFormatter->format($r['balance'], 'money');
    }
}