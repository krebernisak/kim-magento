<?php 
/**
 * Magento
 *
 * @author    Meigeeteam http://www.meaigeeteam.com <nick@meaigeeteam.com>
 * @copyright Copyright (C) 2010 - 2012 Meigeeteam
 *
 */
class Meigee_MeigeewidgetsFlatshop_Model_Templates
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'meigee/meigeewidgetsflatshop/grid.phtml', 'label'=>'Grid'),
            array('value'=>'meigee/meigeewidgetsflatshop/list.phtml', 'label'=>'List'),
            array('value'=>'meigee/meigeewidgetsflatshop/slider.phtml', 'label'=>'Slider')
        );
    }

}