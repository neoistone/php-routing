<?hh

namespace Neoistone\TestFixtures;

function empty_options_simple(): \Neoistone\Dispatcher {
    return \Neoistone\simpleDispatcher($collector ==> {}, shape());
}

function empty_options_cached(): \Neoistone\Dispatcher {
    return \Neoistone\cachedDispatcher($collector ==> {}, shape());
}
