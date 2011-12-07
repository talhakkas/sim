<?php
function author_caseform() {
        $opera = (F3::get('REQUEST.owner')) ? "not" : "";
        $case = DB::sql("select * from ncase where $opera owner='" . F3::get('SESSION.user') . "'");
        $select = ($opera == "") ? 1 : 0;
        F3::set('case_list', $case);
        F3::set('owner_select', $select);
        render('author_caseform', 'olgu1');
}
?>
