<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dmRedirectWidgetView
 *
 * @author grouchy
 */
class dmRedirectWidgetView extends dmWidgetPluginView {
    
    public function configure() {
        parent::configure();
        
        $this->addRequiredVar('redirect_link');
    }
    
    

    public function doRender()
    {
        $user = dmContext::getInstance()->getUser();
        $vars = $this->getViewVars();
        
        $url = $this->getHelper()->link($vars['redirect_link'])->getHref();
        
        if($user->getIsEditMode()) {
            $i18n = dmContext::getInstance()->getServiceContainer()->getService('i18n');
            return $i18n->__('This page will be redirected to: ') . $url;
        } else {
            dmContext::getInstance()->getController()->redirect($url, 0, 302);
        }
    }
    
}

?>
