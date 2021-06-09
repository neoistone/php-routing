<?php

namespace Neoistone\Dispatcher;

class GroupCountBasedTest extends DispatcherTest
{
    protected function getDispatcherClass()
    {
        return 'Neoistone\\Dispatcher\\GroupCountBased';
    }

    protected function getDataGeneratorClass()
    {
        return 'Neoistone\\DataGenerator\\GroupCountBased';
    }
}
