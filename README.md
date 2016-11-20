# TuTu Twig extension

This extensions adds new features to Twig

To use extension simply add it to TuTu composer dependencies:

```
$ composer require coduo/tutu-twig-extension
```

Enable extension in TuTu configuration

```
# config/config.yml

extensions:
    Coduo\TuTu\Extension\Twig: ~
```

From now you should be able to use following features in twig:

### Filters

``json_decode`` - decode json into array/object

**Arguments**

* $asArray - true
* $depth - 512

**Examples**

```
{% set user = request.content|json_decode %}
{
    "id": 1,
    "email": {{ user.name }}
}
```
