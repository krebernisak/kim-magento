<?php class Meigee_MeigeewidgetsFlatshop_Model_Boolean
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'1', 'label'=>Mage::helper('meigeewidgetsflatshop')->__('True')),
            array('value'=>'0', 'label'=>Mage::helper('meigeewidgetsflatshop')->__('False'))
        );
    }

}