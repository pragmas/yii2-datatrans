<?php

namespace pragmas\datatrans;

interface DataInterface
{
    const version = '9.2.12';

    const RESPONSESTATUS_SUCCESS = 'success';
    const RESPONSESTATUS_FAILED = 'error';
    const RESPONSESTATUS_CANCEL = 'cancel';

    const MSGTYPE_GET = 'web';
    const MSGTYPE_POST = 'post';

    const BOOL_TRUE = 'yes';
    const BOOL_FALSE = 'no';
    const BOOL_AUTO = 'auto';

    const REQTYPE_AUTHORIZATIONONLY = 'NOA';
    const REQTYPE_AUTHORIZATIONWITHIMMEDIATESETTLEMENT = 'CAA';

    const RESPONSEMETHOD_GET = 'GET';
    const RESPONSEMETHOD_POST = 'POST';

    const CUSTOMERDETAIL_TRUE = 'yes';
    const CUSTOMERDETAIL_FALSE = 'no';
    const CUSTOMERDETAIL_RETURN = 'return';

    const REMBEMBER_TRUE = 'yes';
    const REMBEMBER_FALSE = 'no';
    const REMBEMBER_CHECKED = 'checked';

    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';

    const PAYMENTMETHOD_VISA = 'VIS';
    const PAYMENTMETHOD_MASTERCARD = 'ECA';
    const PAYMENTMETHOD_AMERICANEXPRESS = 'AMX';
    const PAYMENTMETHOD_BILLPAY = 'BPY';
    const PAYMENTMETHOD_DINERSCLUB = 'DIN';
    const PAYMENTMETHOD_DISCOVER = 'DIS';
    const PAYMENTMETHOD_IDEAL = 'DEA';
    const PAYMENTMETHOD_SOFORTUEBERWEISUNG = 'DIB';
    const PAYMENTMETHOD_IDEALVIASOFORTUEBERWEISUNG = 'DII';
    const PAYMENTMETHOD_DANKORT = 'DNK';
    const PAYMENTMETHOD_DELTAVISTA = 'DVI';
    const PAYMENTMETHOD_GERMANELV = 'ELV';
    const PAYMENTMETHOD_ESPONLINEUEBERWEISUNG = 'ESP';
    const PAYMENTMETHOD_SWISSCOMEASYPAY = 'ESY';
    const PAYMENTMETHOD_JCB = 'JCB';
    const PAYMENTMETHOD_JELMOLIBONUSCARD = 'JEL';
    const PAYMENTMETHOD_MAESTRO = 'MAU';
    const PAYMENTMETHOD_MIGROSBANK = 'MDP';
    const PAYMENTMETHOD_MFGROUPCHECKOUT = 'MFA';
    const PAYMENTMETHOD_MFGROUPFINANCIALREQUEST = 'MFG';
    const PAYMENTMETHOD_MFGROUPEASYINTEGRATION = 'MFX';
    const PAYMENTMETHOD_MEDIAMARKTSHOPPINGCARD = 'MMS';
    const PAYMENTMETHOD_MONEYBOOKERS = 'MNB';
    const PAYMENTMETHOD_MANORMYONECARD = 'MYO';
    const PAYMENTMETHOD_PAYPAL = 'PAP';
    const PAYMENTMETHOD_SWISSPOSTFINANCEEFINANCE = 'PEF';
    const PAYMENTMETHOD_SWISSPOSTFINANCECARD = 'PFC';
    const PAYMENTMETHOD_PAYSAFECARD = 'PSC';
    const PAYMENTMETHOD_PAYOLUTIONINSTALLMENTS = 'PYL';
    const PAYMENTMETHOD_PAYOLUTIONINVOICE = 'PYO';
    const PAYMENTMETHOD_REKACARD = 'REK';
    const PAYMENTMETHOD_SWISSBILLING = 'SWB';
    const PAYMENTMETHOD_TWINTWALLET = 'TWI';
    const PAYMENTMETHOD_MASTERPASSWALLET = 'MPW';
    const PAYMENTMETHOD_ACCARDA = 'ACC';
    const PAYMENTMETHOD_BYJUNO = 'INT';
    const PAYMENTMETHOD_LOYLOGIC = 'PPA';
    const PAYMENTMETHOD_GIROSOLUTIONGIROPAY = 'GPA';
    const PAYMENTMETHOD_GIROSOLUTIONEPS = 'GEP';

    const APILANGUAGE_DE = 'de';
    const APILANGUAGE_EN = 'en';
    const APILANGUAGE_FR = 'fr';
    const APILANGUAGE_IT = 'it';
    const APILANGUAGE_ES = 'es';
    const APILANGUAGE_EL = 'el';
    const APILANGUAGE_NO = 'no';
    const APILANGUAGE_DA = 'da';
    const APILANGUAGE_PL = 'pl';
    const APILANGUAGE_PT = 'pt';

    const LANGUAGE_DE = 'de';
    const LANGUAGE_EN = 'en';
    const LANGUAGE_FR = 'fr';
    const LANGUAGE_IT = 'it';

    const TARGET_TOP = '_top';

    const MODE_REDIRECT = 'forceRedirect';

    const RESPONSECODE_SUCCESS = '01';
    const RESPONSECODE_SUCCESSUNLIABLE = '02';

    /**
     * Generate encrypted signature using personal key for datatrans
     *
     * The data transmission is secured by sending the parameter sign, which must contain
     * a digital signature generated by a standard HMAC-SHA-256 hash procedure and using
     * a merchant-specific encryption key. The HMAC key is generated by the system and can be
     * changed at any time in the merchant administration tool https://pilot.datatrans.biz.
     *
     * @param string $data MerchantId, Amount, Currenca and Reference number
     * @param string $key HMAC key
     * @param string $algo encryption algorythm like 'SHA256'
     * @return string signature
     *
     */
    public function encryptData($data, $key, $algo);
}
