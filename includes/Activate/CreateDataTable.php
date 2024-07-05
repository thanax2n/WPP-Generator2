<?php

namespace MXSFWNWPPGNext\Activate;

class CreateDataTable
{

    // Table name
    protected $table         = 'mxsfwn_table';

    // Columns
    protected $columns       = [];

    // SQL query
    protected $sqlContainer = NULL;

    // Global $wpdb
    protected $wpdb          = NULL;

    // Datetime
    protected $datetime      = NULL;

    public function __construct(string $tableName)
    {

        global $wpdb;

        $this->datetime = '0000-00-00 00:00:00';

        $this->wpdb     = $wpdb;

        $this->table    = "{$this->wpdb->prefix}{$tableName}";
    }

    // varchar column.
    public function varchar(string $columnName = 'name', int $length = 10, bool $notNull = false, string $default = NULL): object
    {

        $notNull = $notNull ? 'NOT NULL' : 'NULL';

        $default = $default !== NULL ? 'default \'' . $default . '\'' : '';

        $sql     = "$columnName varchar($length) $notNull $default";

        array_push($this->columns, $sql);

        return $this;
    }

    // longtext column
    public function longText(string $columnName = 'text', bool $notNull = false): object
    {

        $notNull = $notNull ? 'NOT NULL' : 'NULL';

        /**
         * "default" doesn't work for old MySQL versions.
         * */
        // $default = $default !== NULL ? 'default \'' . $default . '\'' : '';

        $sql     = "$columnName longtext $notNull";

        array_push($this->columns, $sql);

        return $this;
    }

    // int column
    public function int(string $columnName = 'integer'): object
    {

        $sql = "$columnName int(11) NOT NULL";

        array_push($this->columns, $sql);

        return $this;
    }

    // datetime column
    public function datetime(string $columnName = 'created', string $default = NULL): object
    {

        $default = $default == NULL ? $this->datetime : $default;

        $sql     = "$columnName datetime NOT NULL default '$default'";

        array_push($this->columns, $sql);

        return $this;
    }

    public function createTable(): bool
    {

        $this->prepareSQL();

        if ($this->sqlContainer === NULL) return false;

        if ($this->wpdb->get_var("SHOW TABLES LIKE '" . $this->table . "'") != $this->table) {

            // Create a table
            $this->wpdb->query($this->sqlContainer);

            return true;
        }

        return false;
    }

    // Create Columns
    protected function prepareSQL(string $id = 'id'): void
    {

        global $wpdb;

        $collate = '';

        if ($wpdb->has_cap('collation')) {

            $collate = $wpdb->get_charset_collate();
        }

        // Get all columns
        $columns = implode(',', $this->columns);

        if (count($this->columns) === 0) {

            $this->sqlContainer = "CREATE TABLE IF NOT EXISTS `$this->table`
                (
                    `$id` int(11) NOT NULL AUTO_INCREMENT,
                    PRIMARY KEY (`$id`)
                ) $collate;";
        } else {

            $this->sqlContainer = "CREATE TABLE IF NOT EXISTS `$this->table`
                (
                    `$id` int(11) NOT NULL AUTO_INCREMENT,
                    $columns,
                    PRIMARY KEY (`$id`)
                ) $collate;";
        }
    }
}
