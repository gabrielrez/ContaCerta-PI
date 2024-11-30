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
        echo '<ul class="meta">';
        echo '<li>' . '<strong>Valor:</strong> ' . $meta['valor_alvo'] . '</li>';
        echo '<li>' . '<strong>Valor Atual:</strong> ' . $meta['valor_atual'] . '</li>';
        echo '<li>' . '<strong>Descrição:</strong> ' . $meta['descricao'] . '</li>';
        echo '<li>' . '<strong>Data estimada:</strong> ' . $meta['data_meta'] . '</li>';
        echo '<a class="delete-btn" data-id="' . $meta['id'] . '">Deletar</a>';
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

    .delete-btn {
        color: red;
        cursor: pointer;
    }

    .receita {
        border-bottom: 1px solid #E0E0E0;
        padding: 10px 0;
    }

    .receita:last-child {
        border-bottom: none;
    }
</style>

<script>
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', async function(event) {
            event.preventDefault();

            const meta_id = this.dataset.id;

            if (!confirm('Tem certeza que deseja deletar esta meta?')) {
                return;
            }

            try {
                const response = await fetch(`/metas/${meta_id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                });

                if (response.ok) {
                    this.closest('.meta').remove();
                }

                location.reload();
            } catch (error) {
                console.error('Erro:', error);
            }
        });
    });
</script>