<?php

namespace Neoistone\Dispatcher;

class CharCountBasedTest extends DispatcherTest
{
    protected function getDispatcherClass()
    {
        return 'Neoistone\\Dispatcher\\CharCountBased';
    }

    protected function getDataGeneratorClass()
    {
        return 'Neoistone\\DataGenerator\\CharCountBased';
    }
}
