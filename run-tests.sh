#! /bin/bash

docker run --rm -it -v $(pwd):/src -w /src jitesoft/phpunit phpunit StringCalculatorTest.php