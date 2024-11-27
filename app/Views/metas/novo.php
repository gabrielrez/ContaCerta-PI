<?= comp('head') ?>

<div class="container">
    <div class="top">
        <h1>Nova Receita</h1>
        <a href="/dashboard">Voltar</a>
    </div>

    <form action="/metas" method="POST">
        <div class="input">
            <label for="valor_alvo">Valor</label>
            <input type="number" name="valor_alvo" placeholder="00.00 R$">
        </div>
        <div class="input">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao_text_area"></textarea>
        </div>
        <div class="input">
            <label for="data_meta">Data estimada</label>
            <input type="date" name="data_meta">
        </div>
        <input type="hidden" name="id_usuario" value="<?= sessao()->pegar('usuario.id') ?>">
        <button>Adicionar</button>
    </form>
</div>

<style>
    .container {
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 16px;
    }

    .top {
        margin-bottom: 32px;
        display: flex;
        align-items: center;
        gap: 16px;
    }

    form {
        width: 100%;
        max-width: 400px;
    }

    .input {
        margin-bottom: 16px;
        width: 100%;
    }

    .input label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        font-size: 14px;
    }

    .input input,
    .input select,
    .input textarea {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        box-sizing: border-box;
    }

    .input textarea {
        resize: none;
        height: 120px;
    }

    button {
        width: 100%;
        padding: 12px 16px;
        font-size: 16px;
        color: #fff;
        background-color: #49b759;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #49b759;
    }
</style>