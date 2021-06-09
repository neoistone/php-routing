<?hh

namespace Neoistone\TestFixtures;

function all_options_simple(): \Neoistone\Dispatcher {
    return \Neoistone\simpleDispatcher(
      $collector ==> {},
      shape(
        'routeParser' => \Neoistone\RouteParser\Std::class,
        'dataGenerator' => \Neoistone\DataGenerator\GroupCountBased::class,
        'dispatcher' => \Neoistone\Dispatcher\GroupCountBased::class,
        'routeCollector' => \Neoistone\RouteCollector::class,
      ),
    );
}

function all_options_cached(): \Neoistone\Dispatcher {
    return \Neoistone\cachedDispatcher(
      $collector ==> {},
      shape(
        'routeParser' => \Neoistone\RouteParser\Std::class,
        'dataGenerator' => \Neoistone\DataGenerator\GroupCountBased::class,
        'dispatcher' => \Neoistone\Dispatcher\GroupCountBased::class,
        'routeCollector' => \Neoistone\RouteCollector::class,
        'cacheFile' => '/dev/null',
        'cacheDisabled' => false,
      ),
    );
}
