<?php

namespace pragmas\datatrans\models\Response;

class FailedAuthorizationResponse extends AbstractAuthorizationResponse
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(
            parent::rules(),
            [
                [['errorCode', 'errorMessage', 'errorDetail', 'pmethod','reqtype'], 'required'],
            ]
        );
    }
}
