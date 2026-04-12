<?php
/**
 * Aimane Couissi - https://aimanecouissi.com
 * Copyright © Aimane Couissi 2026–present. All rights reserved.
 * Licensed under the MIT License. See LICENSE for details.
 */

declare(strict_types=1);

namespace AimaneCouissi\LoginAsCustomerAssistanceEnforce\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    private const string XML_PATH_LOGIN_AS_CUSTOMER_GENERAL_ENFORCE_SHOPPING_ASSISTANCE = 'login_as_customer/general/enforce_shopping_assistance';

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(private readonly ScopeConfigInterface $scopeConfig)
    {
    }

    /**
     * Checks whether remote shopping assistance enforcement is enabled.
     *
     * @return bool
     */
    public function isShoppingAssistanceEnforced(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_LOGIN_AS_CUSTOMER_GENERAL_ENFORCE_SHOPPING_ASSISTANCE);
    }
}
