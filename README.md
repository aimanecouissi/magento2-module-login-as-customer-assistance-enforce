# AimaneCouissi_LoginAsCustomerAssistanceEnforce

[![Latest Stable Version](http://poser.pugx.org/aimanecouissi/module-login-as-customer-assistance-enforce/v)](https://packagist.org/packages/aimanecouissi/module-login-as-customer-assistance-enforce) [![Total Downloads](http://poser.pugx.org/aimanecouissi/module-login-as-customer-assistance-enforce/downloads)](https://packagist.org/packages/aimanecouissi/module-login-as-customer-assistance-enforce) [![Magento Version Require](https://img.shields.io/badge/magento-~2.4.0-E68718)](https://packagist.org/packages/aimanecouissi/module-login-as-customer-assistance-enforce) [![License](http://poser.pugx.org/aimanecouissi/module-login-as-customer-assistance-enforce/license)](https://packagist.org/packages/aimanecouissi/module-login-as-customer-assistance-enforce) [![PHP Version Require](http://poser.pugx.org/aimanecouissi/module-login-as-customer-assistance-enforce/require/php)](https://packagist.org/packages/aimanecouissi/module-login-as-customer-assistance-enforce) [![Hyvä Compatibility](https://img.shields.io/badge/hyv%C3%A4-compatible-99004D)](https://packagist.org/packages/aimanecouissi/module-login-as-customer-assistance-enforce)

Enforces **Login as Customer** remote shopping assistance and removes the storefront opt-in checkbox.

## Installation
```bash
composer require aimanecouissi/module-login-as-customer-assistance-enforce
bin/magento module:enable AimaneCouissi_LoginAsCustomerAssistanceEnforce
bin/magento setup:upgrade
bin/magento cache:flush
```

## Configuration

Navigate to **Stores → Configuration → Customers → Login as Customer → Login as Customer Settings**. Set **Enforce Shopping Assistance** to `Yes` to mandate remove the opt-in option from the storefront account creation form.

## Usage

When enforcement is enabled, the **Allow Remote Shopping Assistance** checkbox is removed from the storefront account creation form. In **Admin → Customers → All Customers**, the **Allow Remote Shopping Assistance** field appears editable but always saves as enabled regardless of the selected value.

## Uninstall
```bash
bin/magento module:disable AimaneCouissi_LoginAsCustomerAssistanceEnforce
composer remove aimanecouissi/module-login-as-customer-assistance-enforce
bin/magento setup:upgrade
bin/magento cache:flush
```

## License

[MIT](LICENSE)
