<?php

for ($num=1; $num <= 100; $num++) {
    switch ($num){
        //Verifica se o número é multiplo de 3 e 5
        case ($num%15 == 0):
            echo "FizzBuzz<br>";
            break;

        //Verifica se o número é multiplo de 3
        case ($num%3 == 0):
            echo "Fizz<br>";
            break;

        //Verifica se o número é multiplo de 5
        case ($num%5 == 0):
            echo "Buzz<br>";
            break;

        //Caso não seja nenhuma das opções acima, imprime o número
        default:
            echo $num."<br>";
    }
}
?>