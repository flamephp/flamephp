<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenInterfaceCommand extends Command
{
    public function __construct(string $name = null)
    {
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this->setName('gen:interface')
            ->setDescription('Generate typescript interface.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $files = glob(base_path('resource/types/*.json'));
        foreach ($files as $file) {
            $moduleName = basename($file, '.json');

            $content = '';
            $data = json_decode(file_get_contents($file), true);
            if (isset($data['components']['schemas'])) {
                foreach ($data['components']['schemas'] as $type => $schema) {
                    if (! isset($schema['properties'])) {
                        exit($moduleName.' '.$type.' 缺少 properties 参数');
                    }
                    $content .= $this->genCode($type, $schema);
                }
            }

            file_put_contents(base_path('resource/types/'.$moduleName.'.ts'), $content);

            unlink($file);
        }

        return 1;
    }

    private function genCode(string $interface, array $schema): string
    {
        $c = "export interface I$interface {\n";

        foreach ($schema['properties'] as $name => $property) {
            if (isset($property['type'])) {
                $type = $property['type'];
                if (in_array($type, ['integer', 'float'])) {
                    $type = 'number';
                } elseif ($type === 'file') {
                    $type = 'string';
                } elseif ($type === 'array') {
                    if (isset($property['items']['$ref'])) {
                        $type = 'I'.basename($property['items']['$ref']).'[]';
                    } elseif (isset($property['items']['type'])) {
                        $type = $property['items']['type'];
                        if (in_array($type, ['integer', 'float'])) {
                            $type = 'number';
                        }
                        $type = $type.'[]';
                    }
                }
            } elseif (isset($property['$ref'])) {
                $type = 'I'.basename($property['$ref']).'[]';
            } else {
                exit($interface.' 对象 '.var_export($property, true).' 缺失类型');
            }

            $description = isset($property['description']) ? ' // '.$property['description'] : '';

            if (isset($schema['required']) && ! in_array($name, $schema['required'])) {
                $name = $name.'?';
            }

            $c .= "  $name: $type,$description\n";
        }

        return $c."}\n\n";
    }
}
