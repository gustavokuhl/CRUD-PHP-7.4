<?php

namespace Magazord\View;

require_once __DIR__ . '/../../vendor/autoload.php';
include __DIR__ . '/../inicio-html.php';
?>

<form method="post" action="/manutencao-contato?processo=manutencao&acao=<?= $bIsInclusao ? 'incluir' : 'alterar' ?>">

    <?php if (!$bIsInclusao) { ?>
        <div class="form-group">
            <label for="idContato">ID</label>
            <input name="id" type="number" class="form-control" id="idContato" value="<?= $xId ?>" readonly>
        </div>
    <?php } ?>

    <div class="form-group">
        <label for="descricao">Descrição</label>
        <input name="descricao" type="text" class="form-control" id="descricao" required value="<?= $xDescricao ?>" placeholder="Ex: Celular" required <?= !$bReadOnly ?: 'readonly' ?>>
    </div>

    <div class="form-group form-check">
        <label class="form-check-label" for="tipo">Tipo</label>
        <input <?= !$xTipo ?: 'checked' ?> name="tipo" type="checkbox" class="form-check-input" id="tipo" <?= !$bReadOnly ?: 'onclick="return false;"' ?>>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Pessoa</label>
        <select name="idPessoa" class="form-control" id="exampleFormControlSelect1" data-live-search="true" required <?= !$bReadOnly ?: 'readonly' ?>>
            <?php
            foreach ($aPessoas as $oPessoa) {
                if ($oContato && $oContato->getPessoa()->getId() === $oPessoa->getId()) {
                    echo "<option selected value=\"{$oPessoa->getId()}\">{$oPessoa->getNome()}</option>";
                } else {
                    echo "<option value=\"{$oPessoa->getId()}\">{$oPessoa->getNome()}</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="mt-1">
    <?php if (!$bReadOnly) { ?>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <?php } ?>
        <a href="/consulta-contatos"" class=" btn btn-outline-warning">Voltar</a>
    </div>
    </div>

</form>

<?php include __DIR__ . '/../fim-html.php' ?>