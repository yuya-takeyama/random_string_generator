<?php
require_once 'src/RandomStringGenerator/Application.php';
require_once 'src/RandomStringGenerator/RandomStringGeneratorInterface.php';
require_once 'src/RandomStringGenerator/RandomStringGenerator.php';
require_once 'src/RandomStringGenerator/StringRepository.php';
require_once 'src/RandomStringGenerator/HandlerInterface.php';
require_once 'src/RandomStringGenerator/Handler/FileOutputHandler.php';

$app = new RandomStringGenerator_Application(
    // 生成する文字列の数
    1000000,
    // 許容するエラー回数
    100,
    // ランダム文字列生成器
    // RandomStringGenerator を使うときは使用可能な文字列と生成する文字列の長さを引数に指定できる
    new RandomStringGenerator_RandomStringGenerator('23456789abcdefghjkmnpqrstuvwxyz', 6),
    new RandomStringGenerator_StringRepository,
    // ランダム文字列ハンドラ
    // FileOutputHandler を使うときは指定したファイルに改行区切りで書きだす
    new RandomStringGenerator_Handler_FileOutputHandler('./output.txt')
);

exit($app->run());
