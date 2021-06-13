<?PHP
/**
 * @copyright Copyright (c) 2017 Julius Härtl <jus@bitgrid.net> Copyright (c) 2021 Luri <vic@luri.dev> for this file
 * @author    Luri <vic@luri.dev> (for this file)
 * @license   GNU AGPL version 3 or any later version
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as
 *  published by the Free Software Foundation, either version 3 of the
 *  License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 * *****************************************************************************
 *
 * Template : Header for 1 class
 * Data Template :
 *  - title : Name Of Class
 *
 * php Namespace must be set BEFORE this template. (see PhpNamepage template)
 *
 */
?>
<?=$this->e($title)?>

<?= str_repeat('=', strlen($title))?>

<?=$this->e($this->PHPDocToRstExtension()->call('RENDER_HERE', $element)) ?>


.. php:class:: DbFactory


	:Parent:
		:php:class:`Luri\\BddI\\DbConfig`



Summary
-------

<?=$this->e($this->PHPDocToRstExtension()->call('NOT_RENDER_HERE', $element)) ?>

Methods
~~~~~~~

* :php:meth:`public static getDbInstance\($db\)<Luri\\BddI\\DbFactory::getDbInstance\(\)>`
* :php:meth:`public static getIdDatabaseDefault\(\)<Luri\\BddI\\DbFactory::getIdDatabaseDefault\(\)>`


Methods
-------

.. rst-class:: public static

	.. php:method:: public static getDbInstance( $db=parent::DEFAULTDATABASE)

		.. rst-class:: phpdoc-description

			| Get a Db object that represent SQL server



		:Parameters:
			* **$db** (string)  database ID


		:Returns: :any:`\\Luri\\BddI\\Common\\Db <Luri\\BddI\\Common\\Db>`
		:Throws: :any:`\\OutOfBoundsException <OutOfBoundsException>` id $db not exist



.. rst-class:: public static

	.. php:method:: public static getIdDatabaseDefault()

		.. rst-class:: phpdoc-description

			| Return default database ID



		:Returns: string



.. rst-class:: phpdoctorst

.. role:: php(code)

	:language: php


Query
=====


.. php:namespace:: Luri\BddI

.. php:class:: Query


	.. rst-class:: phpdoc-description

		| Represent a data to use in a sql request


	:Implements:
		:php:interface:`ArrayAccess` :php:interface:`Countable` :php:interface:`IteratorAggregate`



Summary
-------

Methods
~~~~~~~

* :php:meth:`public static factory\($name, $sql, $datas, $databaseId, $exec\)<Luri\\BddI\\Query::factory\(\)>`
* :php:meth:`public ajout\($Bob\)<Luri\\BddI\\Query::ajout\(\)>`
* :php:meth:`public ajout2\($Bob\)<Luri\\BddI\\Query::ajout2\(\)>`
* :php:meth:`public \_\_construct\($name, $sql, $datas, $databaseId, $exec\)<Luri\\BddI\\Query::\_\_construct\(\)>`
* :php:meth:`public addReq\($sql\)<Luri\\BddI\\Query::addReq\(\)>`
* :php:meth:`public addDatas\($datas, $named\)<Luri\\BddI\\Query::addDatas\(\)>`
* :php:meth:`public exe\(\)<Luri\\BddI\\Query::exe\(\)>`
* :php:meth:`public getDoubleArray\($col\)<Luri\\BddI\\Query::getDoubleArray\(\)>`
* :php:meth:`public getVar\($col\)<Luri\\BddI\\Query::getVar\(\)>`
* :php:meth:`public getColumn\($col\)<Luri\\BddI\\Query::getColumn\(\)>`
* :php:meth:`public getCorrelation\($id, $colId, $colValue\)<Luri\\BddI\\Query::getCorrelation\(\)>`
* :php:meth:`public setColumns\($columns\)<Luri\\BddI\\Query::setColumns\(\)>`
* :php:meth:`public setReturnIndex\($indextype\)<Luri\\BddI\\Query::setReturnIndex\(\)>`
* :php:meth:`public getLine\($col, $value\)<Luri\\BddI\\Query::getLine\(\)>`
* :php:meth:`public getLineNumber\($line\)<Luri\\BddI\\Query::getLineNumber\(\)>`
* :php:meth:`public \_\_toString\(\)<Luri\\BddI\\Query::\_\_toString\(\)>`
* :php:meth:`public getIterator\(\)<Luri\\BddI\\Query::getIterator\(\)>`
* :php:meth:`public count\(\)<Luri\\BddI\\Query::count\(\)>`
* :php:meth:`public offsetExists\($offset\)<Luri\\BddI\\Query::offsetExists\(\)>`
* :php:meth:`public offsetGet\($offset\)<Luri\\BddI\\Query::offsetGet\(\)>`
* :php:meth:`public offsetSet\($offset, $value\)<Luri\\BddI\\Query::offsetSet\(\)>`
* :php:meth:`public offsetUnset\($offset\)<Luri\\BddI\\Query::offsetUnset\(\)>`


Constants
---------

.. php:const:: QUERYCONST = \'Et C\\\'est\-elle là?\'

	.. rst-class:: phpdoc-description

		| constante à l\'intérieur d\'une classe




Methods
-------

.. rst-class:: public static

	.. php:method:: public static factory( $name="<NONAME\>", $sql="", $datas="", $databaseId="", $exec=true)

		.. rst-class:: phpdoc-description

			| Create a new SQL Query

			| All Param is optional



		:Parameters:
			* **$name** (string)  Name of your query. (it's for you)

			* **$sql** (string | array)  SQL query, see addReq for syntax

			* **$datas** (int | bool | string | array)  you're datas, see addDatas for syntax

			* **$databaseId** (string)  Database id where req is executed. If not provided, it's take ddefault database

			* **$exec** (bool)  Provide false if you don't want execute your request now


		:Throws: :any:`\\InvalidArgumentException <InvalidArgumentException>`
		:Returns: :any:`\\Luri\\BddI\\Query <Luri\\BddI\\Query>`



.. rst-class:: public

	.. php:method:: public ajout( $Bob)





.. rst-class:: public

	.. php:method:: public ajout2( $Bob)

		.. rst-class:: phpdoc-description

			| Pour voir si le code est modifié



		:Parameters:
			* **$Bob** (array)  couc


		:Returns: bool commentaire



.. rst-class:: public

	.. php:method:: public __construct( $name="<NONAME\>", $sql="", $datas="", $databaseId="", $exec=true)

		.. rst-class:: phpdoc-description

			| Create a new SQL Query

			| All Param is optional



		:Parameters:
			* **$name** (string)  Name of your query. (it's for you)

			* **$sql** (string | array)  SQL query, see addReq for syntax

			* **$datas** (int | bool | string | array)  you're datas, see addDatas for syntax

			* **$databaseId** (string)  Database id where req is executed. If not provided, it's take default database

			* **$exec** (bool)  Provide false if you don't want execute your request now


		:Throws: :any:`\\InvalidArgumentException <InvalidArgumentException>`



.. rst-class:: public

	.. php:method:: public addReq( $sql)

		.. rst-class:: phpdoc-description

			| Add the SQL request

			| Possible syntax :
			| \- a string : SQL request
			| \- a array :   \[ \'SQL\' =\> SQL request,
			|   \(optionnal\)   \'DATAS\' =\> data associated \(for syntax, see addDatas\)



		:Parameters:
			* **$sql** (string | array)  SQL request with eventually datas


		:Returns: :any:`\\Luri\\BddI\\Query <Luri\\BddI\\Query>` return this object



.. rst-class:: public

	.. php:method:: public addDatas( $datas, $named="")

		.. rst-class:: phpdoc-description

			| Add Data\(s\) to request

			| Possible syntax :
			| \- A data \(int \| string \| bool\) : this data is added successive to the existing data \(anonymous parameter\)
			| \- A array of datas \(int \| string \| bool \| array\) : key represent the parameter \(anonymous for int key, named \(:XXX\) for string key\)
			|
			| Type of data is automatically deducted by the php type : string by default except for int and bool\.
			|
			| bool is replaced by \(int\) 0 for false and \(int\) 1 for true\.
			|
			| You can pass an array for use in a IN\(\)\.
			| Example :
			| addReq\("SELECT \* FROM table WHERE id IN\(:LIST\)"\);
			| addDatas\(\[ \':LIST\' =\> \[1, 3, 5, 7\] \]\);
			|
			| For add one named parameter, you can use this syntax : \-\>addDatas\($value, $named\);
			| example : $Query\-\>addDatas\(2, \':ID\'\);



		:Parameters:
			* **$datas** (mixed)

			* **$named** (string)  Name of named Parameter


		:Returns: :any:`\\Luri\\BddI\\Query <Luri\\BddI\\Query>` return this object



.. rst-class:: public

	.. php:method:: public exe()

		.. rst-class:: phpdoc-description

			| Execute the Query



		:Returns: :any:`\\Luri\\BddI\\Query <Luri\\BddI\\Query>` return this object



.. rst-class:: public

	.. php:method:: public getDoubleArray( $col=0)

		.. rst-class:: phpdoc-description

			| Return a 2 dimension array with index is formed by $col
			| Use this for a column who have more than 1 same value

			| Example : \[\'Generation Z\'\] \[0\] = array \(0 =\> 1, \'position\' =\> 1, 1 =\> \'Allergic to the Sun\', \'title\' =\> \'Allergic to the Sun\' \)
			|           \[\'Generation Z\'\] \[1\] = array \(0 =\> 2, \'position\' =\> 2, 1 =\> \'I Want You\', \'title\' =\> \'I Want You\' \)
			|           \[\'Generation Z\'\] \[2\] = array \(0 =\> 3, \'position\' =\> 3, 1 =\> \'Thousand Years\', \'title\' =\> \'Thousand Years\' \)
			|           \[\'143\'\] \[0\] =  array \(0 =\> 1, \'position\' =\> 1, 1 =\> \'Hopeful\', \'title\' =\> \'Hopeful\' \)
			|           \[\'143\'\] \[1\] =  array \(0 =\> 2, \'position\' =\> 2, 1 =\> \'Breathe\', \'title\' =\> \'Breathe\' \)
			|
			| WARNING : return array can be big\. Be sure you can\'t do diffrerently\.



		:Parameters:
			* **$col** (int | string)  numerical position or name of field


		:Returns: array
		:Throws: :any:`\\BadFunctionCallException <BadFunctionCallException>` if query is not executed before
		:Throws: :any:`\\OutOfBoundsException <OutOfBoundsException>` if field not exist in resut
		:Throws: :any:`\\BadFunctionCallException <BadFunctionCallException>` if query is not executed before
		:Throws: :any:`\\OutOfBoundsException <OutOfBoundsException>` if field not exist in resut



.. rst-class:: public

	.. php:method:: public getVar( $col=0)

		.. rst-class:: phpdoc-description

			| Return a variable \(first line of result\)



		:Parameters:
			* **$col** (int | string)  numerical position or name of field


		:Returns: int | string
		:Throws: :any:`\\BadFunctionCallException <BadFunctionCallException>` if query is not executed before
		:Throws: :any:`\\OutOfBoundsException <OutOfBoundsException>` if field not exist in resut
		:Throws: :any:`\\BadFunctionCallException <BadFunctionCallException>` if query is not executed before
		:Throws: :any:`\\OutOfBoundsException <OutOfBoundsException>` if field not exist in resut



.. rst-class:: public

	.. php:method:: public getColumn( $col=0)

		.. rst-class:: phpdoc-description

			| Return an array wich countain only one field of the result



		:Parameters:
			* **$col** (int | string)  numerical position or name of field


		:Returns: array
		:Throws: :any:`\\BadFunctionCallException <BadFunctionCallException>` if query is not executed before



.. rst-class:: public

	.. php:method:: public getCorrelation( $id, $colId=0, $colValue=1)

		.. rst-class:: phpdoc-description

			| Return correllation between an ID and a value

			| For example : SELECT id, name FROM table
			| This function can return name corresponding to a specific id



		:Parameters:
			* **$id** (mixed)  value to search in column ID

			* **$colId** (int | string)  numerical position or name of field who is id

			* **$colValue** (int | string)  numerical position or name of field who want return


		:Returns: int | string
		:Throws: :any:`\\BadFunctionCallException <BadFunctionCallException>` if query is not executed before



.. rst-class:: public

	.. php:method:: public setColumns( $columns=SqlResponse::ALLCOLUMNS)

		.. rst-class:: phpdoc-description

			| This function allow you to filtered column is returned by class \(in foreach, \[\] or getLine\(\) \)



		:Parameters:
			* **$columns** (string)  (SqlResponse::ALLCOLUMNS for all the columns returned by SQL db)


		:Returns: self \(fluent interface\)



.. rst-class:: public

	.. php:method:: public setReturnIndex( $indextype=SqlResponse::INDEXSTRING)

		.. rst-class:: phpdoc-description

			| This function allox you to choose type of index for the array who contain SQL data ONLY FOR foreach, \[\] or getLine\(\)

			| \- SqlResponse::INDEXINT : Columns are returned into the array having an enumerated index\.
			|
			| \- SqlResponse::INDEXSTRING : Columns are returned into the array having the fieldname as the array index\.  \(by default\)
			|
			| \- SqlResponse::INDEXBOTH : Columns are returned into the array having both a numerical index and the fieldname as the associative index\.  \(this use more space in ram\)



		:Parameters:
			* **$indextype** (int)  SqlResponse::INDEXINT | SqlResponse::INDEXSTRING (default) | SqlResponse::INDEXBOTH


		:Returns: self \(fluent interface\)



.. rst-class:: public

	.. php:method:: public getLine( $col, $value)

		.. rst-class:: phpdoc-description

			| Return the first line of result who countain $value in column $column

			| Column can be set numerically \(1rst column is 0\) or by string \(name of field\)



		:Parameters:
			* **$col** (int | string)

			* **$value** (mixed)


		:Returns: array



.. rst-class:: public

	.. php:method:: public getLineNumber( $line=0)

		.. rst-class:: phpdoc-description

			| Return 1 line of the result

			| Also, you can use \[\] syntax : $query\[$line\]



		:Parameters:
			* **$line** (int)


		:Returns: array



.. rst-class:: public

	.. php:method:: public __toString()





.. rst-class:: public

	.. php:method:: public getIterator()





.. rst-class:: public

	.. php:method:: public count()

		.. rst-class:: phpdoc-description

			| For a SQL SELECT, SHOW, DESCRIBE or EXPLAIN, return the number of rows of the result

			| For a SQL INSERT, UPDATE, REPLACE or DELETE, return  the number of affected rows\.



		:Returns: int



.. rst-class:: public

	.. php:method:: public offsetExists( $offset)





.. rst-class:: public

	.. php:method:: public offsetGet( $offset)





.. rst-class:: public

	.. php:method:: public offsetSet( $offset, $value)





.. rst-class:: public

	.. php:method:: public offsetUnset( $offset)





.. rst-class:: phpdoctorst

.. role:: php(code)

	:language: php


QuerySet
========


.. php:namespace:: Luri\BddI

.. php:class:: QuerySet


	.. rst-class:: phpdoc-description

		| Represent a set of query \(in same database\) who use Transaction

		| \(mùais ça n\'invente pas le système si le driver de bas niveau utilmisé ne supporte pas les transactions


	:Implements:
		:php:interface:`ArrayAccess` :php:interface:`Countable` :php:interface:`IteratorAggregate`



Summary
-------

Methods
~~~~~~~

* :php:meth:`public static factory\($sql, $datas, $databaseId\)<Luri\\BddI\\QuerySet::factory\(\)>`
* :php:meth:`public \_\_construct\($sql, $datas, $databaseId\)<Luri\\BddI\\QuerySet::\_\_construct\(\)>`
* :php:meth:`public addQuery\($name, $sql, $datas\)<Luri\\BddI\\QuerySet::addQuery\(\)>`
* :php:meth:`public exe\(\)<Luri\\BddI\\QuerySet::exe\(\)>`
* :php:meth:`public getIterator\(\)<Luri\\BddI\\QuerySet::getIterator\(\)>`
* :php:meth:`public count\(\)<Luri\\BddI\\QuerySet::count\(\)>`
* :php:meth:`public offsetExists\($offset\)<Luri\\BddI\\QuerySet::offsetExists\(\)>`
* :php:meth:`public offsetGet\($offset\)<Luri\\BddI\\QuerySet::offsetGet\(\)>`
* :php:meth:`public offsetSet\($offset, $value\)<Luri\\BddI\\QuerySet::offsetSet\(\)>`
* :php:meth:`public offsetUnset\($offset\)<Luri\\BddI\\QuerySet::offsetUnset\(\)>`


Methods
-------

.. rst-class:: public static

	.. php:method:: public static factory( $sql="", $datas="", $databaseId="")

		.. rst-class:: phpdoc-description

			| Create a new set of SQL Query

			| If a SQL request is provided\. This request is accessible via key 0 \(\[0\]\)
			|
			| All Param is optional



		:Parameters:
			* **$sql** (string | array)  SQL query, see Query::addReq for syntax

			* **$datas** (int | bool | string | array)  you're datas, see Query::addDatas for syntax

			* **$databaseId** (string)  Database id where req is executed. If not provided, it's take ddefault database


		:Returns: :any:`\\Luri\\BddI\\QuerySet <Luri\\BddI\\QuerySet>` FluentInterface



.. rst-class:: public

	.. php:method:: public __construct( $sql="", $datas="", $databaseId="")

		.. rst-class:: phpdoc-description

			| Create a new set of SQL Query

			| If a SQL request is provided\. This request is accessible via key 0 \(\[0\]\)
			|
			| All Param is optional



		:Parameters:
			* **$sql** (string | array)  SQL query, see Query::addReq for syntax

			* **$datas** (int | bool | string | array)  you're datas, see Query::addDatas for syntax

			* **$databaseId** (string)  Database id where req is executed. If not provided, it's take ddefault database





.. rst-class:: public

	.. php:method:: public addQuery( $name, $sql, $datas="")

		.. rst-class:: phpdoc-description

			| Add a query



		:Parameters:
			* **$name** (string)  name of this request

			* **$sql** (string | array)  SQL query, see Query::addReq for syntax

			* **$datas** (int | bool | string | array)  you're datas, see Query::addDatas for syntax


		:Returns: :any:`\\Luri\\BddI\\QuerySet <Luri\\BddI\\QuerySet>` FluentInterface



.. rst-class:: public

	.. php:method:: public exe()

		.. rst-class:: phpdoc-description

			| Execute All query within a SQL transaction



		:Returns: :any:`\\Luri\\BddI\\QuerySet <Luri\\BddI\\QuerySet>` FluentInterface



.. rst-class:: public

	.. php:method:: public getIterator()


		:Returns: :any:`\\Luri\\BddI\\Query\[\] <Luri\\BddI\\Query>`



.. rst-class:: public

	.. php:method:: public count()





.. rst-class:: public

	.. php:method:: public offsetExists( $offset)


		:Parameters:
			* **$offset** (int)


		:Returns: bool



.. rst-class:: public

	.. php:method:: public offsetGet( $offset)


		:Parameters:
			* **$offset** (int)


		:Returns: :any:`\\Luri\\BddI\\Query <Luri\\BddI\\Query>`



.. rst-class:: public

	.. php:method:: public offsetSet( $offset, $value)





.. rst-class:: public

	.. php:method:: public offsetUnset( $offset)





.. rst-class:: phpdoctorst

.. role:: php(code)

	:language: php


SqlRequestReal
==============


.. php:namespace:: Luri\BddI

.. php:class:: SqlRequestReal


	:Implements:
		:php:interface:`Luri\\BddI\\Common\\SqlRequest`



Summary
-------

Methods
~~~~~~~

* :php:meth:`public \_\_construct\($sql\)<Luri\\BddI\\SqlRequestReal::\_\_construct\(\)>`
* :php:meth:`public setNamedParameter\($val\)<Luri\\BddI\\SqlRequestReal::setNamedParameter\(\)>`
* :php:meth:`public modifyReq\($sql\)<Luri\\BddI\\SqlRequestReal::modifyReq\(\)>`
* :php:meth:`public addDatas\($datas\)<Luri\\BddI\\SqlRequestReal::addDatas\(\)>`
* :php:meth:`public \_\_toString\(\)<Luri\\BddI\\SqlRequestReal::\_\_toString\(\)>`
* :php:meth:`public getDatas\(\)<Luri\\BddI\\SqlRequestReal::getDatas\(\)>`
* :php:meth:`public isData\(\)<Luri\\BddI\\SqlRequestReal::isData\(\)>`


Methods
-------

.. rst-class:: public

	.. php:method:: public __construct( $sql)

		.. rst-class:: phpdoc-description

			| Create a new SQLRequest



		:Parameters:
			* **$sql** (mixed)  See modifyReq() for syntax





.. rst-class:: public

	.. php:method:: public setNamedParameter( $val)

		.. rst-class:: phpdoc-description

			| \{@inheritdoc\}






.. rst-class:: public

	.. php:method:: public modifyReq( $sql)

		.. rst-class:: phpdoc-description

			| \{@inheritdoc\}






.. rst-class:: public

	.. php:method:: public addDatas( $datas)

		.. rst-class:: phpdoc-description

			| \{@inheritdoc\}






.. rst-class:: public

	.. php:method:: public __toString()

		.. rst-class:: phpdoc-description

			| \{@inheritdoc\}






.. rst-class:: public

	.. php:method:: public getDatas()

		.. rst-class:: phpdoc-description

			| \{@inheritdoc\}






.. rst-class:: public

	.. php:method:: public isData()

		.. rst-class:: phpdoc-description

			| \{@inheritdoc\}






.. rst-class:: phpdoctorst

.. role:: php(code)

	:language: php


.. _namespace-root-namespace:

\\
==


.. rst-class:: phpdoctorst

.. role:: php(code)

	:language: php


.. _namespace-Luri-BddI:

BddI
====

\\Luri\\BddI


Classes
-------

.. toctree::
	:maxdepth: 1

	DbFactory <DbFactory>
	Query <Query>
	QuerySet <QuerySet>
	SqlRequestReal <SqlRequestReal>


Constants
---------

.. php:const:: CONSTTEST = \'ici\'

	.. rst-class:: phpdoc-description

		| Est\-ce que cette constante apparait dans la doc ?




Functions
---------

.. php:function:: pourVoirOùSAffiche($adam)

	.. rst-class:: phpdoc-description

		| Une fonction pour voir où elle s\'affiche dans la doc


	:param bool $adam:


.. rst-class:: phpdoctorst

.. _namespaces:

Namespaces
==========

.. toctree::
	:maxdepth: 1

	\ <index>
	\Luri\BddI <Luri/BddI/index>


