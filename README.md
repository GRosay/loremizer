# Loremizer

[![Latest Stable Version](https://poser.pugx.org/grosay/loremizer/v/stable)](https://packagist.org/packages/grosay/loremizer)
[![Total Downloads](https://poser.pugx.org/grosay/loremizer/downloads)](https://packagist.org/packages/grosay/loremizer)
[![Latest Unstable Version](https://poser.pugx.org/grosay/loremizer/v/unstable)](https://packagist.org/packages/grosay/loremizer)
[![License](https://poser.pugx.org/grosay/loremizer/license)](https://packagist.org/packages/grosay/loremizer)

Loremizer is a tool that generate random content based on the famous `Lorem Ipsum`. 

It's a quick way to generate content for your demos and design tests.

# Setup

## Prerequisite

* Composer
* PHP version >=5.6

## Install via Composer

`composer require grosay/loremizer`

# How to use

To use the composer package, make sure your project loads the autoloader from composer, by example:

`require_once __DIR__ . '/vendor/autoload.php';`

Then tell your server you'll use the Loremizer class:

`use Loremizer\loremizer;`


## Phrases
To get a single phrases, call the following method:

`loremizer::getPhrase();`

You can also call multiples phrases by adding a number parameter, by example:

`loremizer::getPhrase(5);`

You may also directly call getParagraph (see below).

## Paragraphs
getParagraph

To generate one or more paragraph, call the method:

`loremizer::getParagraph();`

By default, it will return two paragraphs. If you want more, simply add the number:

`loremizer::getParagraph(25);`

## Titles (words)

You can get a random title by calling the following method:

`loremizer::getTitle();`

If you want directly the title surrounded by the H balise, add the level you want:

```
loremizer::getTitle('h1');
loremizer::getTitle('h3');
```

## Images

Loremizer also let you get a random image from **Unsplash**:

`loremizer::getImg();`

By default, it just returns the URI of the image in 800x600. 

If you directly want the image tag:

`loremizer::getImg(true);`

You can specify image resolution by specifying width and height:

```
loremizer::getImg(false, 1280, 1024); // will return URI for a 1280x1024 image

loremizer::getImg(true, 1920, 1080); // will return image tag for a 1920x1080 image
```

# Development

If you wish to collaborate to this project you are welcome ! Just fork this repo, clone it on your computer and jump into the code !

You can also mount a fully-functional vagrant environnement by launching the command `vagrant up` from your terminal.

Once your work is done, just submit a pull-request and I'll take a look :).

# Licence

This project is under Apache2.0-licence.

# Changelog

* 2018-10-02: Birth of Loremizer

# Credit

All images returned by loremizer are freely shared on [**Unsplash**](https://unsplash.com/).
