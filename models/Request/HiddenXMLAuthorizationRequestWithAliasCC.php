<?php

namespace pragmas\datatrans\models\Request;


class HiddenXMLAuthorizationRequestWithAliasCC extends AbstractAuthorizationRequest
{
    /**
     * @var string
     */
    public $hiddenMode = self::BOOL_TRUE;

    /**
     * @var string
     */
    public $useAlias = self::BOOL_TRUE;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(
            parent::rules(),
            [
                [['aliasCC','paymentmethod','expm','expy'], 'required', 'on' => 'cc'],
                [['aliasCC','paymentmethod'], 'required', 'on' => 'pf'],
            ]
        );
    }
}