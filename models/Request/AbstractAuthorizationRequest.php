<?php

namespace pragmas\datatrans\models\Request;

use Yii;
use Yii\db\ActiveRecord;

use pragmas\datatrans\DataInterface;
use pragmas\datatrans\ValidationPatterns;
use pragmas\datatrans\ValidationHelpers;

/**
 * This is the model class for datatrans transaction request.
 *
 */
abstract class AbstractAuthorizationRequest extends ActiveRecord implements DataInterface, ValidationPatterns
{
    /**
     * @var ValidationHelpers
     */
    public $helpers;

    /**
     * @var string
     */
    public $_csrf;

    /**
     * @var string
     */
    public $merchantId;

    /**
     * @var string
     */
    public $amount;

    /**
     * @var string
     */
    public $currency;

    /**
     * @var string
     */
    public $refno;

    /**
     * @var string
     */
    public $sign;

    /**
     * @var string
     */
    public $successUrl;

    /**
     * @var string
     */
    public $errorUrl;

    /**
     * @var string
     */
    public $cancelUrl;

    /**
     * @var string
     */
    public $paymentmethod;

    /**
     * @var string
     */
    public $cardno;

    /**
     * @var string
     */
    public $aliasCC;

    /**
     * @var string
     */
    public $expm;

    /**
     * @var string
     */
    public $expy;

    /**
     * @var string
     */
    public $hiddenMode = self::BOOL_FALSE;

    /**
     * @var string
     */
    public $cvv;

    /**
     * @var string
     */
    public $useAlias;

    /**
     * @var string
     */
    public $language;

    /**
     * @var string
     */
    public $reqtype;

    /**
     * @var string
     */
    public $uppWebResponseMethod = DataInterface::RESPONSEMETHOD_GET;

    /**
     * @var string
     */
    public $uppMobileMode;

    /**
     * @var string
     */
    public $useTouchUI;

    /**
     * @var string
     */
    public $customTheme;

    /**
     * @var string
     */
    public $mfaReference;

    /**
     * @var string
     */
    public $uppReturnMaskedCC;

    /**
     * @var string
     */
    public $refno2;

    /**
     * @var string
     */
    public $Refno3;

    /**
     * @var string
     */
    public $virtualCardNo;

    /**
     * @var string
     */
    public $uppStartTarget;

    /**
     * @var string
     */
    public $uppReturnTarget;

    /**
     * @var string
     */
    public $uppTermsLink;

    /**
     * @var string
     */
    public $uppRememberMe;

    /**
     * @var string
     */
    public $uppDiscountAmount;

    /**
     * @var string
     */
    public $mode;

    /**
     * @var string
     */
    public $uppCustomerDetails;

    /**
     * @var string
     */
    public $uppCustomerTitle;

    /**
     * @var string
     */
    public $uppCustomerName;

    /**
     * @var string
     */
    public $uppCustomerFirstName;

    /**
     * @var string
     */
    public $uppCustomerLastName;

    /**
     * @var string
     */
    public $uppCustomerStreet;

    /**
     * @var string
     */
    public $uppCustomerStreet2;

    /**
     * @var string
     */
    public $uppCustomerCity;

    /**
     * @var string
     */
    public $uppCustomerState;

    /**
     * @var string
     */
    public $uppCustomerCountry;

    /**
     * @var string
     */
    public $uppCustomerZipCode;

    /**
     * @var string
     */
    public $uppCustomerPhone;

    /**
     * @var string
     */
    public $uppCustomerFax;

    /**
     * @var string
     */
    public $uppCustomerEmail;

    /**
     * @var string
     */
    public $uppCustomerGender;

    /**
     * @var string
     */
    public $uppCustomerBirthDate;

    /**
     * @var string
     */
    public $uppCustomerLanguage;

    /**
     * initiate helpers
     * - function to encrypt sign key
     * - function to get datatrans constants by prefix
     */
    public function init() {
        $this->helpers = new ValidationHelpers();
    }

    public function isValidLanguage($attribute, $params, $validator)
    {
        if (!in_array($this->$attribute, array_keys($this->helpers->getClassConstantsByPrefix(__CLASS__, 'LANGUAGE_')))) {
            $this->addError($attribute, "Attribute $attribute '{$this->$attribute}' out of bounds.");
        }
    }

    public function isValidReqtype($attribute, $params, $validator)
    {
        if (!in_array($this->$attribute, array_keys($this->helpers->getClassConstantsByPrefix(__CLASS__, 'REQTYPE_')))) {
            $this->addError($attribute, "Attribute $attribute '{$this->$attribute}' out of bounds.");
        }
    }

    public function isValidPayment($attribute, $params, $validator)
    {
        if (!in_array($this->$attribute, array_keys($this->helpers->getClassConstantsByPrefix(__CLASS__, 'PAYMENTMETHOD_')))) {
            $this->addError($attribute, "Attribute $attribute '{$this->$attribute}' out of bounds.");
        }
    }

    public function isValidUppWebResponseMethod($attribute, $params, $validator)
    {
        if (!in_array($this->$attribute, array_keys($this->helpers->getClassConstantsByPrefix(__CLASS__, 'RESPONSEMETHOD_')))) {
            $this->addError($attribute, "Attribute $attribute '{$this->$attribute}' out of bounds.");
        }
    }

    public function isValidTarget($attribute, $params, $validator)
    {
        if (!in_array($this->$attribute, array_keys($this->helpers->getClassConstantsByPrefix(__CLASS__, 'TARGET_')))) {
            $this->addError($attribute, "Attribute $attribute '{$this->$attribute}' out of bounds.");
        }
    }

    public function isValidRembember($attribute, $params, $validator)
    {
        if (!in_array($this->$attribute, array_keys($this->helpers->getClassConstantsByPrefix(__CLASS__, 'REMBEMBER_')))) {
            $this->addError($attribute, "Attribute $attribute '{$this->$attribute}' out of bounds.");
        }
    }

    public function isValidMode($attribute, $params, $validator)
    {
        if (!in_array($this->$attribute, array_keys($this->helpers->getClassConstantsByPrefix(__CLASS__, 'MODE_')))) {
            $this->addError($attribute, "Attribute $attribute '{$this->$attribute}' out of bounds.");
        }
    }

    public function isValidUppCustomerDetails($attribute, $params, $validator)
    {
        if (!in_array($this->$attribute, array_keys($this->helpers->getClassConstantsByPrefix(__CLASS__, 'CUSTOMERDETAIL_')))) {
            $this->addError($attribute, "Attribute $attribute '{$this->$attribute}' out of bounds.");
        }
    }

    public function isValidUppCustomerGender($attribute, $params, $validator)
    {
        if (!in_array($this->$attribute, array_keys($this->helpers->getClassConstantsByPrefix(__CLASS__, 'GENDER_')))) {
            $this->addError($attribute, "Attribute $attribute '{$this->$attribute}' out of bounds.");
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchantId','amount','currency','refno','sign'], 'required'],

            ['_csrf', 'default', 'value' => function ($model, $attribute) {
                return Yii::$app->request->getCsrfToken();
            }],

            ['merchantId', 'integer', 'min' => 1000000000, 'max' => 9999999999],
            ['sign', 'match', 'pattern' => self::ALPHA_NUMERIC],

            ['amount', 'integer'],
            ['currency', 'string', 'length' => [3, 3]],
            ['currency', 'match', 'pattern' => self::ALPHA],
            ['refno', 'string', 'length' => [0, 18]],
            ['refno', 'match', 'pattern' => self::ALPHA_NUMERIC],

            [['successUrl','errorUrl','cancelUrl'], 'url'],

            ['paymentmethod', 'isValidPayment'],
            [['cardno','aliasCC'], 'string', 'length' => [0, 20]],
            [['cardno','aliasCC'], 'match', 'pattern' => self::ALPHA_NUMERIC],
            ['expm', 'match', 'pattern' => self::MONTH],
            ['expy', 'match', 'pattern' => self::YEAR],
            ['hiddenMode', 'boolean', 'trueValue' => self::BOOL_TRUE, 'falseValue' => self::BOOL_FALSE, 'strict' => true],
            ['cvv', 'integer', 'min' => 100, 'max' => 999],

            ['useAlias', 'boolean', 'trueValue' => self::BOOL_TRUE, 'falseValue' => self::BOOL_FALSE, 'strict' => true],
            ['language', 'isValidLanguage'],
//            ['PostURL', 'url'],
            ['reqtype', 'isValidReqtype'],
            ['uppWebResponseMethod', 'isValidUppWebResponseMethod'],

            ['customTheme', 'string', 'length' => [0, 50]],
            ['customTheme', 'match', 'pattern' => self::ALPHA_NUMERIC],
            ['mfaReference', 'integer', 'min' => 1000000000, 'max' => 9999999999],
            ['uppReturnMaskedCC', 'boolean', 'trueValue' => self::BOOL_TRUE, 'falseValue' => self::BOOL_FALSE, 'strict' => true],
            ['refno2', 'string', 'length' => [0, 27]],
            ['refno2', 'match', 'pattern' => self::ALPHA_NUMERIC],
            ['Refno3', 'string', 'length' => [0, 27]],
            ['Refno3', 'match', 'pattern' => self::ALPHA_NUMERIC],
            ['virtualCardNo', 'integer', 'min' => 1000000000000000000, 'max' => 9999999999999999999],
            [['uppStartTarget','uppReturnTarget'], 'isValidTarget'],
            ['uppTermsLink', 'url'],
            ['uppRememberMe', 'isValidRembember'],
            ['uppDiscountAmount', 'integer'],
            ['mode', 'isValidMode'],
            ['uppCustomerDetails', 'isValidUppCustomerDetails'],
            ['uppCustomerTitle', 'string', 'length' => [0, 30]],
            ['uppCustomerTitle', 'match', 'pattern' => self::ALPHA_NUMERIC],
            [['uppCustomerName','uppCustomerFirstName','uppCustomerLastName','uppCustomerStreet','uppCustomerStreet2','uppCustomerCity','uppCustomerState','uppCustomerEmail'], 'string', 'length' => [0, 100]],
            [['uppCustomerPhone','uppCustomerFax'], 'string', 'length' => [0, 40]],
            [['uppCustomerName','uppCustomerFirstName','uppCustomerLastName','uppCustomerStreet','uppCustomerStreet2','uppCustomerCity','uppCustomerState','uppCustomerPhone','uppCustomerFax','uppCustomerEmail'], 'match', 'pattern' => self::ALPHA_NUMERIC],
            ['uppCustomerEmail', 'email'],
            ['uppCustomerCountry', 'string', 'length' => [3, 3]],
            ['uppCustomerCountry', 'match', 'pattern' => self::ALPHA],
            ['uppCustomerZipCode', 'string', 'length' => [0, 10]],
            ['uppCustomerZipCode', 'match', 'pattern' => self::ALPHA_NUMERIC],
            ['uppCustomerGender', 'isValidUppCustomerGender'],
            ['uppCustomerBirthDate', 'date'],
            ['uppCustomerLanguage', 'string', 'length' => [2, 2]],
            ['uppCustomerLanguage', 'match', 'pattern' => self::ALPHA],
        ];
    }
    /**
     * @inheritdoc
     */
    public function fields()
    {
        return [
            '_csrf',
            'merchantId',
            'amount',
            'currency',
            'refno',
            'sign',
            'successUrl',
            'errorUrl',
            'cancelUrl',
            'paymentmethod',
            'cardno',
            'aliasCC',
            'expm',
            'expy',
            'hiddenMode',
            'cvv',
            'useAlias',
            'language',
            'reqtype',
            'uppWebResponseMethod',
            'customTheme',
            'mfaReference',
            'uppReturnMaskedCC',
            'refno2',
            'Refno3',
            'virtualCardNo',
            'uppStartTarget',
            'uppReturnTarget',
            'uppTermsLink',
            'uppRememberMe',
            'uppDiscountAmount',
            'mode',
            'uppCustomerDetails',
            'uppCustomerTitle',
            'uppCustomerName',
            'uppCustomerFirstName',
            'uppCustomerLastName',
            'uppCustomerStreet',
            'uppCustomerStreet2',
            'uppCustomerCity',
            'uppCustomerCountry',
            'uppCustomerZipCode',
            'uppCustomerState',
            'uppCustomerPhone',
            'uppCustomerFax',
            'uppCustomerEmail',
            'uppCustomerGender',
            'uppCustomerBirthDate',
            'uppCustomerLanguage'
        ];
    }
}
