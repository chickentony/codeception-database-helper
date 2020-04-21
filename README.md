# Codeception-DbHelper
Helper for working with data in tests. Helper will be improved with latest commits.

### How to use:
- Copy file to your helper directory
- Configure your suite
- Run ```codecept build``` command
- Use helper in your tests
 
### Config example:
In your suite or global config u need to specify connection to your database and enable helper class.
```yaml
actor: AcceptanceTester
modules:
    enabled:
        - \Helper\Acceptance
        - \Helper\DbHelper
        - Db
    config:
        Db:
            dsn: "mysql:host=127.0.0.1;port=3306;dbname=dbName;charset=utf8"
            user: "root"
            password: ''
```
 
### Examples of usage:
U can delete record created in acceptance (ui) test or truncate whole table after test.
```php
 public function _after(AcceptanceTester $I): void
     {
         $I->deleteRecordFromTable('your_table_name_here', [
             'column_1' => 'value_1',
             'column_2' => 'value_2'
         ]);
     }
```
