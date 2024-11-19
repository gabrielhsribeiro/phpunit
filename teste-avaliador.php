<?php

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

require 'vendor/autoload.php';

//Arrange - Given / Preparamos o cenário do teste
$leilao = new Leilao('Fiat 147 0km');


$maria = new Usuario('Maria');
$joao = new Usuario('Joao');

$leilao->recebeLance(new Lance($joao, 2000));
$leilao->recebeLance(new Lance($maria, 2500));

$leiloeiro = new Avaliador();

//Act - When / Executamos o código a ser testado
$leiloeiro->avalia($leilao);

$maiorValor = $leiloeiro->getMaiorValor();


// Assert - Then / Verificamos se a saída é a esperada
$valorEsperado = 2500;

if ($maiorValor == $valorEsperado) {
    echo "TESTE OK";
} else {
    echo "TESTE FALHOU";
}

//http://wiki.c2.com/?ArrangeActAssert
//https://medium.com/@pablodarde/testes-unit%C3%A1rios-com-tdd-test-driven-development-657f3dadad06
//https://martinfowler.com/bliki/GivenWhenThen.html
//https://medium.com/@matheus.saraujo/testes-give-when-then-3bf3fef55f5e


//rodar no prompt
//vendor/bin/phpunit --version