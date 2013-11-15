BcDoctrineBundle
================

A collection of useful extensions for Doctrine.

By [Florian Eckerstorfer](http://florianeckerstorfer.com).


Features
--------

### Data Types

- `UTCDateTime`: Converts dates into UTC before storing them in the database

### DQL Functions

- `DATE(expr)`


Installation
------------

    # app/config/config.yml
    doctrine:
        dbal:
            types:
                datetime: Braincrafted\Bundle\DoctrineBundle\DBAL\Type\UTCDateTimeType
        orm:
            dql:
                datetime_functions:
                    DATE: Braincrafted\Bundle\DoctrineBundle\DQL\DateFunction


License
-------

    The MIT License (MIT)

    Copyright (c) 2013 Florian Eckerstorfer <florian@eckerstorfer.co>

    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in
    all copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
    THE SOFTWARE.
