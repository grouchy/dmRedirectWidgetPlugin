<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dmRedirectWidgetForm
 *
 * @author grouchy
 */
class dmRedirectWidgetForm extends dmWidgetPluginForm
{
    public function configure()
    {
        $this->widgetSchema['redirect_link'] = new sfWidgetFormInputText(array(), array(
            'class' => 'dm_link_droppable',
            'title' => $this->__('Accepts pages, medias and urls'),
            'label' => 'Internal link'
        ));
        
        $this->validatorSchema['redirect_link'] = new sfValidatorDmInternalUrl();
        
        unset($this['cssClass']);
    }
}

?>
