# Data Transformers
This utility provide to you some transformers for transform your data to another representation. 

#### Installation

composer require new-inventor/transformers

### Simple usage of normalizer

```php
$transformer = new ToInt();
or
$transformer = ToInt::make();
$res = $transformer->transform($value);
```

**Transformers** transform values from different types to needed type and format

### Signatures of normalizer constructors
* ArrayToCsvString - __construct(string $separator = ',', string $enclosure = '"', string $escape = '\\', bool $encloseAll = false) // transform one dimension array to csv string
* AsEmpty - __construct() // transform empty value to null
* BoolToMixed - __construct($true = '1', $false = '0') // transform boll to value according to construct parameters
* ChainTransformer - __construct(TransformerInterface  ...$transformers) // apply transformers for value in same order as in constructor
* CsvStringToArray - __construct(string $separator = ',', string $enclosure = '"', string $escape = '\\') transforms csv string to array
* DateTimeToString - __construct(string $format = 'd.m.Y H:i:s') // transforms \DateTime object to string
* InnerTransformer - __construct(TransformerInterface ...$transformers)// apply transformers to array of values if pass null then value should return as is, if array length > transformers count then last transformer should be applied to array[$key] there $key > transformers count
* StringToCamelCase - __construct()//transform string to camel case (for example 'qwe asd_zxc' transforms to 'qweAsdZxc')
* StringToDateTime - __construct(string $format = 'd.m.Y H:i:s')//transform string to \DateTime object
* StringToLowerCase - __construct()// run strtolower() on string
* StringToPhone - __construct()//transform string to international phone (fore example '5-123-123-23-23' transforms to '+51231232323')
* StringToScreamingSnakeCase - __construct()//transform string to screaming case (for example 'qwe asd_zxc' transforms to 'QWE_ASD_ZXC')
* StringToUpperCase - __construct()// run strtoupper() on string
* ToArray - __construct()//transform object, implementing \Iterator or \ArrayAccess or have toArray method, or scalar to array
* ToBool - __construct()//transform variable to boolean
* ToFloat - __construct()//transform numeric value to float
* ToInt - __construct()//transform numeric value to int
* ToRange - __construct()//transform value to range
* ToString - __construct()//transform value that can be transformed to string
* Utf8StringToAsciiString - __construct()//transform string to ascii string for example '😁' transforms to 'U+1F601'

If you transform value with wrong type then transformer throw \NewInventor\TypeChecker\Exception\TypeException
If transformer can not transform value it throw \NewInventor\Transformers\Exception\TransformationException