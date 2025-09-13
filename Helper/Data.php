<?php
/**
 * Aimane Couissi - https://aimanecouissi.com
 * Copyright © Aimane Couissi 2025–present. All rights reserved.
 * Licensed under the MIT License. See LICENSE for details.
 */

declare(strict_types=1);

namespace AimaneCouissi\LoginAsCustomerAssistanceEnforce\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    private const string XML_PATH_LOGIN_AS_CUSTOMER_GENERAL_ENFORCE_SHOPPING_ASSISTANCE = 'login_as_customer/general/enforce_shopping_assistance';

    /**
     * Determines whether the shopping assistance should be enforced.
     *
     * @return bool
     */
    public function shouldEnforceShoppingAssistance(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_LOGIN_AS_CUSTOMER_GENERAL_ENFORCE_SHOPPING_ASSISTANCE);
    }
}
