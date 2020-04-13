<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace Core\library\Validators;

/**
 * DefaultValueValidator sets the attribute to be the specified default value.
 *
 * DefaultValueValidator is not really a validator. It is provided mainly to allow
 * specifying attribute default values when they are empty.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PhoneValidator extends BaseValidator
{

    public $message = '{attribute} не является валидным телефоном.';
    public $value;
    public $isNuxt = false;
    /**
     * @var bool this property is overwritten to be false so that this validator will
     * be applied when the value being validated is empty.
     */
    public $skipOnEmpty = false;


    protected function validateValue($value)
    {

    }

    public function validateAttribute($model, $attribute)
    {
        $value = $model->{$attribute};
        if ($this->isNuxt){
            $value = preg_replace('/[ )-]/','',$value);
            $value='+7'.$value;
        }

        if (!(mb_strlen($value)===12)){
            $this->addError($model, $attribute, $this->message);
        }
    }
}
