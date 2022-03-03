<?php

namespace Bringeast\SocialShare\Block;

use Magento\Framework\View\Element\Template;

class SocialShare extends Template
{
    public function isFacebookEnable(){
        return $this->_scopeConfig->getValue('bringeast/social/facebook') === '1';
    }

    public function isTwitterEnable(){
        return $this->_scopeConfig->getValue('bringeast/social/twitter') === '1';
    }

    public function isPinteresEnable(){
        return $this->_scopeConfig->getValue('bringeast/social/pinterest') === '1';
    }

    public function getFbAppId(){
        return $this->_scopeConfig->getValue('bringeast/social/fb_app_id');
    }
}
