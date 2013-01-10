<?php

/**
 * @author grouchy
 */
class sfValidatorDmInternalUrl extends sfValidatorBase {

    protected function configure($options = array(), $messages = array()) {
        parent::configure($options, $messages);

        $this->setMessage('invalid', '"%value%" is not a valid internal URL.');
    }

    protected function doClean($value) {
        if (strncmp($value, 'page:', 5) === 0 && dmDb::table('DmPage')->findOneBySource($value)) {
            return $value;
        } else {
            throw new sfValidatorError($this, 'invalid', array('value' => $value));
        }
    }

}

