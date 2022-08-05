<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

it('creates a new Arkitect rule class', function () {
    $fooClass = app_path('Arkitect/Foo.php');

    if (File::exists($fooClass)) {
        unlink($fooClass);
    }

    $this->assertFalse(File::exists($fooClass));

    Artisan::call('make:arkitect Foo');

    $this->assertTrue(File::exists($fooClass));

    $expectedContents = <<<CLASS
<?php

namespace App\Arkitect;

use Arkitect\Rules\DSL\ArchRule;
use Mortexa\LaravelArkitect\Contracts\RuleContract;
use Mortexa\LaravelArkitect\Rules\BaseRule;

class Foo extends BaseRule implements RuleContract
{
    /**
     * Define your architectural rule
     *
     * @link https://github.com/phparkitect/arkitect
     *
     * @return \Arkitect\Rules\DSL\ArchRule
     */
    public static function rule(): ArchRule
    {
        // TODO: Implement rule() method.
    }

    /**
     * Define the path related to your rule
     *
     * @example app/Http/Controllers
     *
     * @return string
     */
    public static function path(): string
    {
        // TODO: Implement path() method.
    }
}
CLASS;

    $this->assertEquals($expectedContents, file_get_contents($fooClass));
});
