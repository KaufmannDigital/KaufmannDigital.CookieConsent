KaufmannDigital.CookieConsent
=============================

A ready-to-run package, that integrates [Cookie Consent](https://cookieconsent.insites.com/) into your [Neos CMS](https://www.neos.io) site.

Installation
------------

The easiest way to install is via composer:

```bash
composer require kaufmanndigital/cookieconsent
```

Afterwards, you should see the Cookie Hint on your page.

To configure the policy-link, you have the following two options:

* Add the NodeType-Mixin `KaufmannDigital.CookieConsent:PolicyPageMixin` to your Home-NodeType (if you have a specific NodeType for home):

  ```yaml
    'Your.Package:Document.Home':
      superTypes:
        'Neos.Neos:Document': true
        'KaufmannDigital.CookieConsent:PolicyPageMixin': true
        ...
  ```

  After that, simply select the policy page in your Neos backend.

* Or use this snippet in your `Settings.yaml`:

  ```yaml
    KaufmannDigital:
      CookieConsent:
        #Global configuration of PolicyPage
        policyPageNode: 'c7a91aa8-fbac-4c24-8326-102eb7307180' #UUID of global page you want to link

        #Configuration per site for multisite installations
        #Replace site1/site2 with your sitename (/sites/sitename/node-a2ufd/.../)
        policyPageNodes:
          site1: 'c7a91aa8-fbac-4c24-8326-102eb7307180' #UUID of policy-page for /sites/site1
          site2: '454d85b6-289b-11e9-b210-d663bd873d93' #UUID of policy-page for /sites/site2
  ```

_Congratulations, you added Cookie Consent to your Neos CMS page. That was easy, right?_


Changing the text
-----------------

The content inside Cookie Consent is managed via translations. If you want to change it, copy the `Packages/Application/KaufmannDigital.CookieConsent/Resources/Private/Translations` folder into your Site-Package and add this configuration to `Settings.yaml`:

```yaml
KaufmannDigital:
  CookieConsent:
    translations:
      package: 'Vendor.Package'
      source: 'Main'
```

From now, the translation from your package (in this example "Vendor.Package") will be used.

Translations for German and English are provided by this package. We are happy to get translations for your language via Pull-Request.

Changing layout & colors
------------------------

You can also change colors and position. To do so, you have to add this snippet to `Settings.yaml`:

```yaml
KaufmannDigital:
  CookieConsent:
    position: 'bottom' # bottom, bottom-left, bottom-right, top, top-left or top-right
    theme: 'block' # block, classic, or edgeless
    layout: 'basic' # basic, basic-close or basic-header
    palette:
      popup:
        background: '#000' #like in css
        text: 'white' #like in css
      button:
        background: 'rgb(255, 0, 0)' #like in css
        text: '#fff' #like in css
```

You don't have to override all values. Just pick what you want to change. More configuration-options can be found at [cookieconsent.insites.com](https://cookieconsent.insites.com)


Using Opt-In or Opt-Out
-----------------------

In order to use Opt-In or Opt-Out functionality, you have to activate it in Settings:

```yaml
KaufmannDigital:
  CookieConsent:
    type: 'opt-in' #Or 'opt-out' (depending on what you want to do)
```

Afterwards, you can listen to the `kd-cookieconsent` event in JavaScript to en-/disable cookies:

```javascript
document.addEventListener("kd-cookieconsent", function (e) {
    if (e.detail === 'enable-cookies') {
        //Enable your cookies here
        //For Google Analytics:
        window['ga-disable-UA-<YOUR-SITE-CODE>'] = false;
    } else if (e.detail === 'disable-cookies') {
        //Disable your cookies here
        //For Google Analytics:
        window['ga-disable-UA-<YOUR-SITE-CODE>'] = true;
    }
});
```

Compile JS & CSS into your own files
------------------------------------

If you don't want this Package to include it's own JS and CSS, you can disable it with in `Settings.yaml`:

```yaml
KaufmannDigital:
  CookieConsent:
    includeJavaScript: false
    includeCss: false
```

If you do so, you have to include JS & CSS of Cookie Consent in your files. [Instructions can be found here](https://github.com/insites/cookieconsent/#installation)


FAQs
----
* Cookie Consent isn't shown in Backend.
  * It's a feature, not a bug ;-)


Known Bugs
----------
Known Bugs are submitted as issue. Please have a look at it, before you supply a bug you found.
You did a bugfix? Great! Please submit it as PR to share it with other users.

Planned Features
----------------
Planned functions are also created as issues and marked as such.
You have another idea? Or would you like to help with the implementation? Gladly! Simply create new issues or PRs.

Maintainer
----------
This package is maintained by [Kaufmann Digital](https://www.kaufmann.digital).
Feel free to send us your questions or requests to [support@kaufmann.digital](mailto:support@kaufmann.digital)

License
-------
Licensed under MIT, see [LICENSE](LICENSE)
