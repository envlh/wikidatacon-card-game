## Description

This project generates cards with images and Wikidata ids. You can then send them to your printer.

This project was used to generate the [WikidataCon Card Game](https://www.wikidata.org/wiki/User:Envlh/WikidataCon_Card_Game).

## Usage

You need PHP with the [ImageMagick](https://www.php.net/manual/en/book.imagick.php) extension.

Put the font you want to use in the `fonts` folder.

Put the images you want to use in the `images` folder. The name of a file must be a Wikidata id (from Q, P or L namespaces), with the `.png` extension. Don't bother to crop or center the content of the images, as it will be done automatically.

Customize the configuration at the beginning of the `generate.php` file.

Run the following command:

    php -f generate.php

Generated cards are available in the `results` folder. Files are optimized for printing (CMYK colorspace).

## License

This project is available under CC0 1.0 Universal (CC0 1.0) license:
<https://creativecommons.org/publicdomain/zero/1.0/>

Fonts and images provided as examples are also under CC0 license or in public domain:
* [Vegur font](http://dotcolon.net/font/vegur/), by Sora Sagano
* [Wikidata logo](https://commons.wikimedia.org/wiki/File:Wikidata-logo.svg), by Planemad
