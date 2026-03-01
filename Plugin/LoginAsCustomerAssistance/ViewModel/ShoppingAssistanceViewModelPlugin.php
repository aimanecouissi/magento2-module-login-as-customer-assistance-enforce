<?php
/**
 * Aimane Couissi - https://aimanecouissi.com
 * Copyright © Aimane Couissi 2025–present. All rights reserved.
 * Licensed under the MIT License. See LICENSE for details.
 */

declare(strict_types=1);

namespace AimaneCouissi\LoginAsCustomerAssistanceEnforce\Plugin\LoginAsCustomerAssistance\ViewModel;

use AimaneCouissi\LoginAsCustomerAssistanceEnforce\Helper\Data as ModuleDataHelper;
use Magento\LoginAsCustomerAssistance\ViewModel\ShoppingAssistanceViewModel;

class ShoppingAssistanceViewModelPlugin
{
    /**
     * @param ModuleDataHelper $moduleDataHelper
     */
    public function __construct(private readonly ModuleDataHelper $moduleDataHelper)
    {
    }

    /**
     * Returns false when enforcement is enabled to suppress the opt-in checkbox.
     *
     * @param ShoppingAssistanceViewModel $subject
     * @param bool $result
     * @return bool
     */
    public function afterIsLoginAsCustomerEnabled(ShoppingAssistanceViewModel $subject, bool $result): bool
    {
        return $result && !$this->moduleDataHelper->isShoppingAssistanceEnforced();
    }
}
