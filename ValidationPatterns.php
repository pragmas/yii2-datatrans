<?php

namespace pragmas\datatrans;

interface ValidationPatterns
{
    /**
     * validation patterns
     */
    const ALPHA = '/^[a-z]\w*$/i';
    const ALPHA_NUMERIC = '/^[a-z0-9\-]*$/i';
    const NUMERIC = '/^[0-9]*$/';
    const YEAR = '/^[1-9]{1}[0-9]{1}$/';
    const MONTH = '/^(0[1-9]{1})|(1[0-2]{1})$/';
}
