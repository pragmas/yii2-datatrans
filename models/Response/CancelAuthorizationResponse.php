<?php

namespace pragmas\datatrans\models\Response;

class CancelAuthorizationResponse extends AbstractAuthorizationResponse
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(
            parent::rules(),
            [
                [['status', 'refno'], 'required'],
            ]
        );
    }
}