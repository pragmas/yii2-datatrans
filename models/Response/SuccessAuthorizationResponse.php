<?php

namespace pragmas\datatrans\models\Response;

class SuccessAuthorizationResponse extends AbstractAuthorizationResponse
{
    public $calculatedSign2;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(
            parent::rules(),
            [
                [['responseCode','responseMessage','pmethod','reqtype','acqAuthorizationCode','sign2'], 'required'],
                ['sign2', 'compare', 'compareAttribute' => 'calculatedSign2'],
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function fields()
    {
        return array_merge(
            parent::fields(),
            [
                'calculatedSign2',
            ]
        );
    }
}
