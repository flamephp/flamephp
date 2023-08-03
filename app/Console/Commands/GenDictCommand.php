<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Flame\Console\SchemaTrait;
use Flame\Support\Facade\DB;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenDictCommand extends Command
{
    use SchemaTrait;

    private array $ignoreTables = ['migrations'];

    public function __construct(string $name = null)
    {
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this->setName('gen:dict')
            ->setDescription('Generate database dict.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $database = env('DB_DATABASE');
        $tables = DB::query('show tables;');

        $content = "# 数据字典\n\n";
        foreach ($tables as $row) {
            $tableName = implode('', $row);
            if (in_array($tableName, $this->ignoreTables)) {
                continue;
            }

            $tableInfo = DB::query("SELECT `TABLE_COMMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$database' AND TABLE_NAME = '$tableName';");
            $content .= "### {$tableInfo[0]['TABLE_COMMENT']}(`$tableName`)\n";

            $columns = $this->getTableInfo($database, $tableName);
            $content .= $this->getContent($columns);
        }

        file_put_contents(public_path('docs/dict/README.md'), $content);

        return 1;
    }

    public function getContent($columns): string
    {
        $content = "| 列名 | 数据类型 | 索引 | 是否为空 | 描述 |\n";
        $content .= "| ------- | --------- | --------- | --------- | -------------- |\n";
        foreach ($columns as $column) {
            $isNull = $column['Null'] === 'NO' ? '否' : '是';
            $content .= "| {$column['Field']} | {$column['Type']} | {$column['Key']} | $isNull | {$column['Comment']} |\n";
        }
        $content .= "\n";

        return $content;
    }
}
