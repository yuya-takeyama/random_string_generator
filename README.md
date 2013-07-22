ランダムかつユニークな文字列を生成するやつ
==========================================

使い方
------

オプションとかは `generate.php` を適当に書き換えてください。

```
$ php generate.php
```

拡張
----

### 文字列の生成

`RandomStringGenerator_RandomStringGeneratorInterface` を実装すれば生成パターンを自由に拡張できます。

### 生成された文字列の処理

`RandomStringGenerator_HandlerInterface` を実装すれば、生成された文字列に対して、自由な処理を行うことができます。

デフォルトの `RandomStringGenerator_Handler_FileOutputHandler` はテキストファイルに書き出すだけですが、例えばデータベースに書き出すハンドラと置き換えることもできます。

書いた人
--------

Yuya Takeyama
