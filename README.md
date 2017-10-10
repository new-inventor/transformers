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
* ArrayToCsvString(string $separator = ',', string $enclosure = '"', string $escape = '\\', bool $encloseAll = false) // transform one dimension array to csv string
* AsEmpty() // transform empty value to null
* BoolToMixed($true = '1', $false = '0') // transform boll to value according to construct parameters
* ChainTransformer(TransformerInterface  ...$transformers) // apply transformers for value in same order as in constructor
* CsvStringToArray(string $separator = ',', string $enclosure = '"', string $escape = '\\') transforms csv string to array
* DateTimeToString(string $format = 'd.m.Y H:i:s') // transforms \DateTime object to string
* InnerTransformer(TransformerInterface ...$transformers)// apply transformers to array of values if pass null then value should return as is, if array length > transformers count then last transformer should be applied to array[$key] there $key > transformers count
* StringToCamelCase()//transform string to camel case (for example 'qwe asd_zxc' transforms to 'qweAsdZxc')
* StringToDateTime(string $format = 'd.m.Y H:i:s')//transform string to \DateTime object
* StringToLowerCase()// run strtolower() on string
* StringToPhone()//transform string to international phone (fore example '5-123-123-23-23' transforms to '+51231232323')
* StringToScreamingSnakeCase()//transform string to screaming case (for example 'qwe asd_zxc' transforms to 'QWE_ASD_ZXC')
* StringToUpperCase()// run strtoupper() on string
* ToArray()//transform object, implementing \Iterator or \ArrayAccess or have toArray method, or scalar to array
* ToBool()//transform variable to boolean
* ToFloat()//transform numeric value to float
* ToInt()//transform numeric value to int
* ToRange()//transform value to range
* ToString()//transform value that can be transformed to string
* Utf8StringToAsciiString()//transform string to ascii string for example '😁' transforms to 'U+1F601'

If you transform value with wrong type then transformer throw \NewInventor\TypeChecker\Exception\TypeException
If transformer can not transform value it throw \NewInventor\Transformers\Exception\TransformationException

### Links
* To transform complex objects/arrays use https://github.com/new-inventor/data-structure
* To implement property bags use https://github.com/new-inventor/property-bag