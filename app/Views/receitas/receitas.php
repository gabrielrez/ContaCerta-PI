<?= comp('head') ?>

<div class="container">
    <h1>Receitas</h1>

    <a href="/dashboard">Voltar</a>
    <br><br>
    <a href="/receitas/novo">Adicionar Receita</a>

    <br><br>

    <?php
    foreach ($receitas as $receita) {
        echo '<div class="receita">';
        echo '<ul>';
        echo '<li><strong>Tipo:</strong> ' . $receita['categoria'] . '</li>';
        echo '<li><strong>Descrição:</strong> ' . $receita['descricao'] . '</li>';
        echo '<li><strong>Valor:</strong> ' . $receita['valor'] . ' R$</li>';
        echo '<a class="delete-btn" data-id="' . $receita['id'] . '">Deletar</a>';
        echo '</ul>';
        echo '</div>';
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

            const receita_id = this.dataset.id;

            if (!confirm('Tem certeza que deseja deletar esta receita?')) {
                return;
            }

            try {
                const response = await fetch(`/receitas/${receita_id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                });

                if (response.ok) {
                    this.closest('.receita').remove();
                }

                location.reload();
            } catch (error) {
                console.error('Erro:', error);
            }
        });
    });
</script>