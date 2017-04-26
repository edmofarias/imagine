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

##### Filter Crop Image

```php
    /**
     * @param $width
     * @param $height
     */
    $imageCropFilter = new ImageCropFilter(100, 100);
    
    $filters = new ArrayCollection();
    $filters->add($imageCropFilter);

    $imagine = new Imagine();
    $imagine->output('path/to/my/image.jpg', $filters)->send();
```

##### Filter Resize Image

```php
    /**
     * @param $width
     * @param $height
     */
    $imageResizeFilter = new ImageResizeFilter(100, 100);
    
    $filters = new ArrayCollection();
    $filters->add($imageResizeFilter);

    $imagine = new Imagine();
    $imagine->output('path/to/my/image.jpg', $filters)->send();
```

##### Applying multiple filters

```php
    /**
     * @param $width
     * @param $height
     */
    $imageResizeFilter = new ImageResizeFilter(100, 100);
    
    /**
     * @param $width
     * @param $height
     */
    $imageCropFilter = new ImageCropFilter(50, 50);
    
    $filters = new ArrayCollection();
    $filters->add($imageResizeFilter);
    $filters->add($imageCropFilter);

    $imagine = new Imagine();
    $imagine->output('path/to/my/image.jpg', $filters)->send();
```