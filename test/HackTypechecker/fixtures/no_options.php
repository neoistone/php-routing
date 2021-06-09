<?hh

namespace Neoistone\TestFixtures;

function no_options_simple(): \Neoistone\Dispatcher {
    return \Neoistone\simpleDispatcher($collector ==> {});
}

function no_options_cached(): \Neoistone\Dispatcher {
    return \Neoistone\cachedDispatcher($collector ==> {});
}
