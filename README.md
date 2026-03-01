# AimaneCouissi_LoginAsCustomerAssistanceEnforce

[![Latest Stable Version](http://poser.pugx.org/aimanecouissi/module-login-as-customer-assistance-enforce/v)](https://packagist.org/packages/aimanecouissi/module-login-as-customer-assistance-enforce) [![Total Downloads](http://poser.pugx.org/aimanecouissi/module-login-as-customer-assistance-enforce/downloads)](https://packagist.org/packages/aimanecouissi/module-login-as-customer-assistance-enforce) [![Magento Version Require](https://img.shields.io/badge/magento-2.4.x-E68718)](https://packagist.org/packages/aimanecouissi/module-login-as-customer-assistance-enforce) [![License](http://poser.pugx.org/aimanecouissi/module-login-as-customer-assistance-enforce/license)](https://packagist.org/packages/aimanecouissi/module-login-as-customer-assistance-enforce) [![PHP Version Require](http://poser.pugx.org/aimanecouissi/module-login-as-customer-assistance-enforce/require/php)](https://packagist.org/packages/aimanecouissi/module-login-as-customer-assistance-enforce) [![Hyvä Compatibility](https://img.shields.io/badge/hyv%C3%A4-compatible-99004D)](https://packagist.org/packages/aimanecouissi/module-login-as-customer-assistance-enforce)

Enforces **Login as Customer** remote shopping assistance and removes the storefront opt-out checkbox.

## Installation
```bash
composer require aimanecouissi/module-login-as-customer-assistance-enforce
bin/magento module:enable AimaneCouissi_LoginAsCustomerAssistanceEnforce
bin/magento setup:upgrade
bin/magento cache:flush
```

## Configuration

Navigate to **Stores → Configuration → Customers → Login as Customer → Login as Customer Settings**. Set **Enforce Shopping Assistance** to `Yes` to mandate remote shopping assistance and remove the opt-out option from the storefront account creation form.

## Usage

When enforcement is enabled, customers cannot opt out of remote shopping assistance. To verify, confirm the **Allow Remote Shopping Assistance** checkbox is absent from the storefront account creation form, then open **Admin → Customers → All Customers**, edit any customer, and confirm the **Allow Remote Shopping Assistance** field is enabled and cannot be turned off.

## Uninstall
```bash
bin/magento module:disable AimaneCouissi_LoginAsCustomerAssistanceEnforce
composer remove aimanecouissi/module-login-as-customer-assistance-enforce
bin/magento setup:upgrade
bin/magento cache:flush
```

## License

[MIT](LICENSE)
