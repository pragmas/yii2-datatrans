<?php

namespace pragmas\datatrans\models\Response;

use Yii;
use \yii\db\ActiveRecord;

use pragmas\datatrans\DataInterface;
use pragmas\datatrans\ValidationPatterns;

abstract class AbstractAuthorizationResponse extends ActiveRecord implements DataInterface, ValidationPatterns
{
    /**
     * @inheritdoc
     */
    public function encryptData($data, $key, $algo) {
        $keyBin = hex2bin($key);
        return hash_hmac( $algo, $data, $keyBin);
    }

    /**
     * @var string
     */
    public $_csrf;

    /**
     * @var integer
     */
    public $uppTransactionId;

    /**
     * @var string
     */
    public $responseCode;

    /**
     * @var string
     */
    public $errorCode;

    /**
     * @var string
     */
    public $responseMessage;

    /**
     * @var string
     */
    public $errorMessage;

    /**
     * @var string
     */
    public $errorDetail;

    /**
     * @var string
     */
    public $refno;

    /**
     * @var integer
     */
    public $amount;

    /**
     * @var string
     */
    public $currency;

    /**
     * @var string
     */
    public $pmethod;

    /**
     * @var string
     */
    public $reqtype;

    /**
     * @var string
     */
    public $acqAuthorizationCode;

    /**
     * @var string
     */
    public $acqErrorCode;

    /**
     * @var string
     */
    public $status;

    /**
     * @var string
     */
    public $uppMsgType;

    /**
     * @var string
     */
    public $aliasCC;

    /**
     * @var string
     */
    public $maskedCC;

    /**
     * @var string
     */
    public $sign2;

    /**
     * @var integer
     */
    public $virtualCardno;

    /**
     * @var integer
     */
    public $DccAmount;

    /**
     * @var string
     */
    public $DccCurrency;

    /**
     * @var string
     */
    public $DccRate;

    public function isValidStatus($attribute, $params, $validator)
    {
        if (!in_array($this->$attribute, array_keys(\Dominikzogg\ClassHelpers\getConstantsWithPrefix(__CLASS__, 'RESPONSESTATUS_')))) {
            $this->addError($attribute, "Attribute $attribute '{$this->$attribute}' out of bounds.");
        }
    }

    public function isValidResponseCode($attribute, $params, $validator)
    {
        if (!in_array($this->$attribute, array_keys(\Dominikzogg\ClassHelpers\getConstantsWithPrefix(__CLASS__, 'RESPONSECODE_')))) {
            $this->addError($attribute, "Attribute $attribute '{$this->$attribute}' out of bounds.");
        }
    }

    public function isValidReqtype($attribute, $params, $validator)
    {
        if (!in_array($this->$attribute, array_keys(\Dominikzogg\ClassHelpers\getConstantsWithPrefix(__CLASS__, 'REQTYPE_')))) {
            $this->addError($attribute, "Attribute $attribute '{$this->$attribute}' out of bounds.");
        }
    }

    public function isValidPayment($attribute, $params, $validator)
    {
        if (!in_array($this->$attribute, array_keys(\Dominikzogg\ClassHelpers\getConstantsWithPrefix(__CLASS__, 'PAYMENTMETHOD_')))) {
            $this->addError($attribute, "Attribute $attribute '{$this->$attribute}' out of bounds.");
        }
    }

    public function isValidUppMsgType($attribute, $params, $validator)
    {
        if (!in_array($this->$attribute, array_keys(\Dominikzogg\ClassHelpers\getConstantsWithPrefix(__CLASS__, 'MSGTYPE_')))) {
            $this->addError($attribute, "Attribute $attribute '{$this->$attribute}' out of bounds.");
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_csrf'], 'required'],

            ['uppTransactionId', 'integer'],
            [['responseCode', 'errorCode'], 'integer'],
            ['responseCode', 'isValidResponseCode'],
            [['responseMessage', 'errorMessage', 'errorDetail'], 'string'],
            ['refno', 'string', 'length' => [0, 18]],
            ['refno', 'match', 'pattern' => self::ALPHA_NUMERIC],
            [['amount', 'DccAmount'], 'integer'],
            ['DccRate', 'number'],
            [['currency', 'DccCurrency'], 'string', 'length' => [3, 3]],
            [['currency', 'DccCurrency'], 'match', 'pattern' => self::ALPHA],
            ['pmethod', 'isValidPayment'],
            ['reqtype', 'isValidReqtype'],
            [['acqAuthorizationCode', 'acqErrorCode'], 'string'],
            [['acqAuthorizationCode', 'acqErrorCode'], 'match', 'pattern' => self::ALPHA_NUMERIC],
            ['status', 'isValidStatus'],
            ['uppMsgType', 'isValidUppMsgType'],
            ['aliasCC', 'string', 'length' => [0, 20]],
            ['aliasCC', 'match', 'pattern' => self::ALPHA_NUMERIC],
            ['maskedCC', 'string'],
            ['maskedCC', 'match', 'pattern' => self::ALPHA_NUMERIC],
            ['sign2', 'match', 'pattern' => self::ALPHA_NUMERIC],
            ['virtualCardno', 'integer'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function fields()
    {
        return [
            '_csrf',
            'uppTransactionId',
            'responseCode',
            'errorCode',
            'responseMessage',
            'errorMessage',
            'errorDetail',
            'refno',
            'amount',
            'currency',
            'pmethod',
            'reqtype',
            'acqAuthorizationCode',
            'acqErrorCode',
            'status',
            'uppMsgType',
            'aliasCC',
            'maskedCC',
            'sign2',
            'virtualCardno',
            'DccAmount',
            'DccCurrency',
            'DccRate',
        ];
    }
}

