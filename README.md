# AimaneCouissi_LoginAsCustomerAssistanceEnforce

[![Latest Stable Version](http://poser.pugx.org/aimanecouissi/module-login-as-customer-assistance-enforce/v)](https://packagist.org/packages/aimanecouissi/module-login-as-customer-assistance-enforce) [![Total Downloads](http://poser.pugx.org/aimanecouissi/module-login-as-customer-assistance-enforce/downloads)](https://packagist.org/packages/aimanecouissi/module-login-as-customer-assistance-enforce) [![Magento Version](https://img.shields.io/badge/magento-2.4.x-E68718)](https://packagist.org/packages/aimanecouissi/module-login-as-customer-assistance-enforce) [![License](http://poser.pugx.org/aimanecouissi/module-login-as-customer-assistance-enforce/license)](https://packagist.org/packages/aimanecouissi/module-login-as-customer-assistance-enforce) [![PHP Version Require](http://poser.pugx.org/aimanecouissi/module-login-as-customer-assistance-enforce/require/php)](https://packagist.org/packages/aimanecouissi/module-login-as-customer-assistance-enforce)

Enforces remote shopping assistance preferences for storefront customer accounts. The module controls the **Allow remote
shopping assistance** opt-in during account creation and account edits according to the **Login as Customer**
configuration.

## Installation

```bash
composer require aimanecouissi/module-login-as-customer-assistance-enforce
bin/magento module:enable AimaneCouissi_LoginAsCustomerAssistanceEnforce
bin/magento setup:upgrade
bin/magento cache:flush
```

## Configuration

Navigate to **Stores → Configuration → Services → Login as Customer → General**. Set **Enforce Remote Shopping
Assistance** to `Yes` to keep remote shopping assistance enabled for customer accounts.

Set **Auto-check Remote Shopping Assistance** to `Yes` to preselect remote shopping assistance during customer account
creation when **Enforce Remote Shopping Assistance** is `No`.

## Usage

When **Enforce Remote Shopping Assistance** is `Yes`, customer repository saves set `assistance_allowed` to the allowed
value and storefront account controls no longer expose the remote shopping assistance opt-in. When **Auto-check Remote
Shopping Assistance** is `Yes` and enforcement is `No`, storefront account creation presents **Allow remote shopping
assistance** selected by default.

## Uninstall

```bash
bin/magento module:disable AimaneCouissi_LoginAsCustomerAssistanceEnforce
composer remove aimanecouissi/module-login-as-customer-assistance-enforce
bin/magento setup:upgrade
bin/magento cache:flush
```

## Changelog

See [CHANGELOG](CHANGELOG.md) for all recent changes.

## License

[MIT](LICENSE)
