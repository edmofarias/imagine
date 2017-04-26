# Imagine

Library for Image manipulation in PHP.

## Requirements

Imagine requires PHP >= 7.0 and extensions for PHP **GD**.

## Installation
First make sure you have either GD installed and enabled on your PHP server.

You can add Imagine to your project easily through composer:

```bash
    $ composer require siritec/imagine
```

## Getting Started

Some simple examples to get you started:

```php
    $imagine = new Imagine();
    $imagine->output('path/to/my/image.jpg')->send();
```