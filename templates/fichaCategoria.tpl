
{$capafilai}
<div id="capacategoria">
    <div class="imgcategoria {$categoriaestilo}"></div>
    <div id="nomcategoria">{$categoriaInicio}</div>
    <div id="nomsubcategoria">
        <ul>
            {iteration:arraySubCategoria}
            {option:arraySubCategoria.numeroAnuncio}
            <li class="flecha"><a href="/{$pestana}/anuncio/listado/{$arraySubCategoria.nombreURL}">{$arraySubCategoria.subNombre}</a></li>
            {/option:arraySubCategoria.numeroAnuncio}
            {option:!arraySubCategoria.numeroAnuncio}
            <li class="flecha disabledList">{$arraySubCategoria.subNombre}</li>
            {/option:!arraySubCategoria.numeroAnuncio}
            {/iteration:arraySubCategoria}
        </ul>
    </div>
</div>
{$capafilaf}