<?php

namespace Neoistone\Dispatcher;

class GroupPosBasedTest extends DispatcherTest
{
    protected function getDispatcherClass()
    {
        return 'Neoistone\\Dispatcher\\GroupPosBased';
    }

    protected function getDataGeneratorClass()
    {
        return 'Neoistone\\DataGenerator\\GroupPosBased';
    }
}
