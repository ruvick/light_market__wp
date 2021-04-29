<div class="main-block__choice d-flex">

<div class="main-block__select d-flex">
    <p>Сортировать по</p>
    <form id="sortForm" action="">				
    <select onchange= "document.getElementById('sortByParam').value = this.value; document.getElementById('filterForm').submit();" name="sortparam" id="sortSel" class="select-block">
        <option value="def">По умолчанию</option>
        <option value="ASC" option="">По возростанию цены</option>
        <option value="DESC" option="">По убыванию цены</option>
    </select>
    </form>
</div>

<p>Товары <?echo $args["post_count_start"]?>-<?echo $args["post_count_end"]?> из <?echo $args["found_posts"];?></p>
</div>