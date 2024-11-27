<?= comp('head') ?>

<div class="container">
    <h1>Metas</h1>

    <a href="/dashboard">Voltar</a>
    <br>
    <br>
    <a href="/metas/novo">Adicionar Meta</a>

    <br>
    <br>

    <?php

    foreach ($metas as $meta) {
        echo '<ul class="receita">';
        echo '<li>' . '<strong>Valor:</strong> ' . $meta['valor_alvo'] . '</li>';
        echo '<li>' . '<strong>Valor Atual:</strong> ' . $meta['valor_atual'] . '</li>';
        echo '<li>' . '<strong>Descrição:</strong> ' . $meta['descricao'] . '</li>';
        echo '<li>' . '<strong>Data estimada:</strong> ' . $meta['data_meta'] . '</li>';
        echo '</ul>';
    }

    ?>
</div>

<style>
    h1 {
        text-align: center;
        color: #49b759;
        margin-top: 20px;
    }

    .container {
        max-width: 600px;
        margin: 20px auto;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        padding: 5px 0;
        font-size: 16px;
    }

    .receita {
        border-bottom: 1px solid #E0E0E0;
        padding: 10px 0;
    }

    .receita:last-child {
        border-bottom: none;
    }
</style>