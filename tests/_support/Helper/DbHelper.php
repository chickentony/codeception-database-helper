<?php

declare(strict_types=1);

namespace Helper;

use Codeception\Module;

class DbHelper extends Module
{
    /**
     * @return Module
     * @throws \Codeception\Exception\ModuleException
     */
    private function getDbModule(): Module
    {
        return $this->getModule('Db');
    }

    /**
     * @return mixed
     * @throws \Codeception\Exception\ModuleException
     */
    private function getDbDriver()
    {
        return $this->getDbModule()->_getDriver();
    }

    /**
     * @param string $table
     * @param array $params
     * @throws \Codeception\Exception\ModuleException
     */
    public function deleteRecordFromTable(string $table, array $params): void
    {
        /** @var \Codeception\Lib\Driver\Db $db */
        $db = $this->getDbDriver();
        $db->deleteQueryByCriteria($table, $params);
    }
    
    /**
     * @param string $table
     * @throws \Codeception\Exception\ModuleException
     */
    public function clearTable(string $table): void
    {
        /** @var \Codeception\Lib\Driver\Db $db */
        $db = $this->getDbDriver();
        $db->load([sprintf('TRUNCATE TABLE %s', $table)]);
    }
    
    /**
     * @param array $tables
     * @throws \Codeception\Exception\ModuleException
     */
    public function clearTables(array $tables): void
    {
        if (!count($tables)) {
            throw new \Exception('Specify at least one table');
        }

        foreach ($tables as $table) {
            $this->clearTable($table);
        }
    }
}
