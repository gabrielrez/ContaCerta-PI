<?php

use Hefestos\Database\Tabela;

return (new Tabela('meta_financeira'))
    ->id()
    ->int('id_usuario')
    ->string('descricao')
    ->int('valor_alvo')
    ->int('valor_atual', nullable: true)
    ->date('data_meta')
    ->foreignKey('id_usuario', 'usuario', 'id');
