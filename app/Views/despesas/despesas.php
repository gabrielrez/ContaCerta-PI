<?= comp('head') ?>

<div class="container">
    <h1>Despesas</h1>

    <a href="/dashboard">Voltar</a>
    <br>
    <br>
    <a href="/despesas/novo">Adicionar Despesa</a>

    <br>
    <br>

    <?php

    foreach ($despesas as $despesa) {
        echo '<ul class="receita">';
        echo '<li>' . '<strong>Tipo:</strong> ' . $despesa['categoria'] . '</li>';
        echo '<li>' . '<strong>Descrição:</strong> ' . $despesa['descricao'] . '</li>';
        echo '<li>' . '<strong>Valor:</strong> ' . $despesa['valor'] .  ' R$' . '</li>';
        echo '<a class="delete-btn" data-id="' . $despesa['id'] . '">Deletar</a>';
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

            const despesa_id = this.dataset.id;

            if (!confirm('Tem certeza que deseja deletar esta despesa?')) {
                return;
            }

            try {
                const response = await fetch(`/despesas/${despesa_id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                });

                if (response.ok) {
                    this.closest('.despesa').remove();
                }

                location.reload();
            } catch (error) {
                console.error('Erro:', error);
            }
        });
    });
</script>