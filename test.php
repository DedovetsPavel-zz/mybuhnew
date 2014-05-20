<?php
/**
* Created by JetBrains PhpStorm.
* User: Pasha
* Date: 24.04.14
* Time: 13:14
* To change this template use File | Settings | File Templates.
*/
/***********************************
*
* MSQ Catalog beta v. 0.4
* WB Technology
* Catalog for MODx
* Modul
*
***********************************/

$dbname = $modx->db->config['dbase'];
$dbprefix = $modx->db->config['table_prefix'];
$mod_table = $dbprefix."items";
$f_table = $dbprefix."filters";
$val_table = $dbprefix."filter_vals";
$t_table = $dbprefix."types";
$v_table = $dbprefix."vendors";
$c_table = $dbprefix."collections";
$i_table = $dbprefix."item_images";
$theme = $modx->config['manager_theme'];
$basePath = $modx->config['base_path'];
//session_start();
//unset($_SESSION['params']);
if(!isset($_SESSION['params'])) {
unset($_SESSION['params']);
$_SESSION['params'] = array();
}



echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  lang="en" xml:lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../assets/modules/filters/style/styles.css" />
    <link rel="stylesheet" type="text/css" href="media/style/'.$theme.'/style.css" />
    <script src="/assets/js/jquery.min.js"></script>

</head>
<body>

<br />
<div class="sectionHeader">Управление товарами</div>

<div class="sectionBody">

<script language="JavaScript" type="text/javascript">
    function postForm(action, id){
        document.module.action.value=action;
        if (id != null) document.module.item_id.value=id;
        document.module.submit();
    }

    function addVal() {
        arr = [];
        $("#ii tr").each(function(idx, el) {
            name = $(el).find("input:radio").first().attr("value");
            //num = parseInt(name.substring(5, name.length));
            num = parseInt(name);
            arr.push(num);
        });
        if (isNaN(arr[0])) arr.shift();
        new_val = Math.max.apply(Math, arr) + 1;
        $("#ii tr").last().after("<tr><td><input type=\"file\" name=\"vals[" + new_val + "]\"></td><td><input type=\"radio\" name=\"first\" value=\"" + new_val + "\"></td><td align=\"center\"><input type=\"checkbox\" name=\"del[" + new_val + "]\" value=\"" + new_val + "\"></td></tr>");
    }

    function onType() {
        $("[id^=filt]").hide();
        $("[id^=coll]").hide();

        $("#vend").show();
        ti = $("select[name=tid] option:selected").val();
        vi = $("select[name=vid] option:selected").val();
        $("#filt_" + ti).show();
        $("#coll_" + ti + "_" + vi).show();
    }

    function onVendor() {
        $("[id^=filt]").hide();
        $("[id^=coll]").hide();

        ti = $("select[name=tid] option:selected").val();
        vi = $("select[name=vid] option:selected").val();
        $(".invis").show();
        $("#filt_" + ti).show();
        $("#coll_" + ti + "_" + vi).show();
    }

</script>

<form enctype="multipart/form-data" name="module" method="post">
<input name="action" type="hidden" value="" />
<input name="item_id" type="hidden" value="" />
';

$action = isset($_POST['action']) ? $_POST['action']:'';

switch($action) {

case 'install':
$sql = "CREATE TABLE $mod_table (id INT(11) NOT NULL AUTO_INCREMENT, name VARCHAR(255), vendor_id INT(11), type_id INT(11), PRIMARY KEY (id))";
$modx->db->query($sql);
header("Location: $_SERVER[REQUEST_URI]");
break;

case "uninstall":
$sql = "DROP TABLE $mod_table";
$modx->db->query($sql);
header("Location: $_SERVER[REQUEST_URI]");
break;

case 'add':
if (!empty($_POST['item_id'])){
$query = "SELECT id, art, name, type_id, vendor_id, coll_id, description, price FROM `$mod_table` WHERE id=".$_POST["item_id"];
//$data = mysql_fetch_array($modx->db->select("*", $mod_table, "id = $_POST[item_id]", "", ""));
$data = mysql_fetch_array($modx->db->query($query));
$id = $_POST['item_id'];
$art = $data['art'];
$name = $data['name'];
$vid = $data['vendor_id'];
$cid = $data['coll_id'];
$tid = $data['type_id'];
$price = $data['price'];
$descr = $data['description'];
$save = "update";
}else{
$id = '';
$art = '';
$name = '';
$vid = '';
$cid = '';
$tid = '';
$price = '';
$descr = '';
$save = "save";
}
echo '

<script language="javascript" type="text/javascript" src="../assets/plugins/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
    tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        document_base_url : "/../",
        external_link_list_url  : "/assets/plugins/tinymce/inc/tinymce.linklist.php",
        relative_urls                    : true,
        remove_script_host               : true,
        convert_urls                     : true,
        popup_css_add                    : "/assets/plugins/tinymce/style/popup_add.css",
        forced_root_block                : "p",
        content_css                      : "/assets/plugins/tinymce/style/content.css",

        plugins                          : "style,advimage,advlink,searchreplace,print,contextmenu,paste,fullscreen,nonbreaking,xhtmlxtras,visualchars,media,table",

        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,justifyleft,justifycenter,justifyright,justifyfull,separator,bullist,numlist,separator,undo,redo,separator,link,unlink,separator,image,separator,sup,sub,separator,charmap,separator,code,separator,cite,ins,del,abbr,acronym,separator,spellchecker",

        theme_advanced_buttons2 : "",
        theme_advanced_buttons3 : "",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        paste_use_dialog : false,
        paste_auto_cleanup_on_paste : true,
        paste_convert_headers_to_strong : false,
        paste_strip_class_attributes : "all",
        paste_remove_spans : true,
        paste_remove_styles : true,
        theme_advanced_resizing : true,
        theme_advanced_resize_horizontal : false,
        fix_list_elements : true,
        fix_table_elements : true,
        fix_nesting : true,
        convert_urls : false,
        entities : "38,amp,162,cent,8364,euro,163,pound,165,yen,169,copy,174,reg,8482,trade,8240,permil,60,lt,62,gt,8804,le,8805,ge,176,deg,8722,minus",
        plugins : "advimage,advlink,xhtmlxtras,spellchecker",
        spellchecker_languages : "+Russian=ru,English=en"

    });
</script>

<script language="javascript" type="text/javascript">
    function modx_fb (field_name, url, type, win) {
        if (type == "media") {type = win.document.getElementById("media_type").value;}
        var cmsURL = "/manager/media/browser/mcpuk/browser.php?Connector=/manager/media/browser/mcpuk/connectors/php/connector.php&ServerPath=/&editor=tinymce&editorpath=/assets/plugins/tinymce/";
        switch (type) {
            case "image":
                type = "images";
                break;
            case "media":
            case "qt":
            case "wmp":
            case "rmp":
                type = "media";
                break;
            case "shockwave":
            case "flash":
                type = "flash";
                break;
            case "file":
                type = "files";
                break;
            default:
                return false;
        }
        if (cmsURL.indexOf("?") < 0) {
            //add the type as the only query parameter
            cmsURL = cmsURL + "?type=" + type;
        }
        else {
            //add the type as an additional query parameter
            // (PHP session ID is now included if there is one at all)
            cmsURL = cmsURL + "&type=" + type;
        }

        var windowManager = tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            width : screen.width * 0.7,  // Your dimensions may differ - toy around with them!
            height : screen.height * 0.7,
            resizable : "yes",
            inline : 0,  // This parameter only has an effect if you use the inlinepopups plugin!
            close_previous : "no"
        }, {
            window : win,
            input : field_name
        });
        if (window.focus) {windowManager.focus()}
        return false;
    }
</script>

<span class="title">Создание нового товара</span>
<br/><br/>
<table class="table" width="98%" border="0" cellpadding="5" cellspacing="0">
    <tr >
        <td width="250" ><div style="float: left; width: 100px;">ID</div> ' . $id. '</td>
        <td></td>
    </tr>
    <tr >
        <td>Категория:</td>
        <td>'.$modx->runSnippet("typeList", array("id" => $tid)).'</td>
    </tr>
    <tr id="vend" ';
    if (isset($id)) echo '>';
    else echo 'style="display: none">';
    echo '<td>Производитель:</td>
    <td>'.$modx->runSnippet("vendorList", array("id" => $vid)).'</td>
    </tr>
    <tr class="invis" ';
    if (isset($id)) echo '>';
    else echo 'style="display: none">';
    echo '<td>Коллекция:</td>
    <td>'.$modx->runSnippet("collList", array("id" => $cid, "vid" => $vid, "iid" => $id)).'</td>
    </tr>
    <tr class="invis" ';
    if (isset($id)) echo '>';
    else echo 'style="display: none">';
    echo '<td>Фильтры:</td>
    <td>'.$modx->runSnippet("filterList", array("id" => $id, "tid" => $tid)).'</td>
    </tr>
    <tr >
    <tr class="invis"  ';
    if (isset($id)) echo '>';
    else echo 'style="display: none">';
    echo '<td>Наименование:</td>
    <td><input type="text" name="name" value="'.htmlspecialchars($name).'" /></td>
    </tr>
    <tr class="invis"  ';
    if (isset($id)) echo '>';
    else echo 'style="display: none">';
    echo '<td>Артикул:</td>
    <td><input type="text" name="art" value="'.htmlspecialchars($art).'" /></td>
    </tr>
    <tr class="invis"  ';
    if (isset($id)) echo '>';
    else echo 'style="display: none">';
    echo '<td>Цена:</td>
    <td><input type="text" name="price" value="'.htmlspecialchars($price).'" /></td>
    </tr>
    <tr class="invis"  ';
    if (isset($id)) echo '>';
    else echo 'style="display: none">';
    echo '<td>Описание:</td>
    <td><textarea name="descr">'.htmlspecialchars($descr).'</textarea></td>
    </tr>
    <tr class="invis"  ';
    if (isset($id)) echo '>';
    else echo 'style="display: none">';
    echo '<td colspan="2" style="padding-top: 10px;"><strong>Фотографии</strong></td>
    </tr>
    <tr class="invis"  ';
    if (isset($id)) echo '>';
    else echo 'style="display: none">';
    echo '<td colspan="2" style="padding-top: 10px;">Значения: <br>'.$modx->runSnippet('itemImages', array('id' => $id)).'
        <button type="button" onclick="addVal();">Добавить значение</button>
    </td>
    </tr>
</table>
<br/>
<a href="#" onclick="postForm(\''.$save.'\',\''.$id.'\');return false;"><img src="../assets/modules/items/image/icon/save.gif" align="absmiddle" />Сохранить</a>
&nbsp;
<a href="#" onclick="postForm(\'reload\',null);return false;"><img src="../assets/modules/items/image/icon/back.gif" align="absmiddle" />Отмена</a>
';
break;

case 'save':
$cid = 'cid_'.$_POST['tid'].'_'.$_POST['vid'];
$sql = "INSERT INTO $mod_table VALUES (NULL,'".$_POST['art']."','".$_POST['tid']."','".$_POST['vid']."','".$_POST[$cid]."','".$_POST['name']."','".$_POST['descr']."','','".$_POST['price']."')";

$modx->db->query($sql);
$id0 = $modx->db->getInsertID();
$uploaddir = $basePath.'/images/';
$filename = md5(microtime());
foreach ($_FILES["vals"]["error"] as $key => $error) {
if ($error == UPLOAD_ERR_OK) {
$ext = "";
switch ($_FILES["vals"]["type"][$key]) {
case 'image/gif': $ext=".gif"; break;
case 'image/png': $ext=".png"; break;
case 'image/jpeg': $ext=".jpg"; break;
}
$tmp_name = $_FILES["vals"]["tmp_name"][$key];
$name = md5(microtime()).$ext;
move_uploaded_file($tmp_name, $uploaddir.$name);
if (!$_POST['del'][$key]) {
if ($_POST['first'] == $key) $sql = "INSERT INTO $i_table VALUES (NULL, $id0, '".$name."', 1)";
else $sql = "INSERT INTO $i_table VALUES (NULL, $id0, '".$name."', 0)";
$modx->db->query($sql);
}
}
}
$filters = array();
foreach (array_keys($_POST) as $key) {
if (stripos($key, 'filter') != -1) {
$filters[] = substr($key, 7);
}
}
$fils = array();
foreach ($filters as $fid) {
if ($_POST['filter_'.$fid] > 0)
$fils[] = $fid.'->'.$_POST['filter_'.$fid];
}
$que = "UPDATE $mod_table SET filters='".implode($fils, '=|=')."' WHERE id=".$id0;
$modx->db->query($que);

header("Location: $_SERVER[REQUEST_URI]");
break;

case 'update':
$fields = array(
'art' => $_POST[art],
'vendor_id' => $_POST['vid'],
'type_id' => $_POST['tid'],
'coll_id' => $_POST['cid_'.$_POST['tid'].'_'.$_POST['vid']],
'name' => $_POST[name],
'description' => $_POST[descr],
'filters' => ' ',
'price' => $_POST['price']
);
$query = $modx->db->update($fields, $mod_table, "id = ".$_POST['item_id']."");
$que = "UPDATE $i_table SET `first`=0 WHERE iid=".$_POST['item_id'];
$modx->db->query($que);
$que = "UPDATE $i_table SET `first`=1 WHERE iid=".$_POST['item_id']." AND filename='".$_POST['filename'][$_POST['first']]."'";
$modx->db->query($que);

if ($_FILES) {

$uploaddir = $basePath.'/images/';

foreach ($_FILES["vals"]["error"] as $key => $error) {
if ($error == UPLOAD_ERR_OK) {
$ext = "";
switch ($_FILES["vals"]["type"][$key]) {
case 'image/gif': $ext=".gif"; break;
case 'image/png': $ext=".png"; break;
case 'image/jpeg': $ext=".jpg"; break;
}
$tmp_name = $_FILES["vals"]["tmp_name"][$key];
$name = md5(microtime()).$ext;
move_uploaded_file($tmp_name, $uploaddir.$name);
if (!$_POST['del'][$key]) {
if ($_POST['first'] == $key) $sql = "INSERT INTO $i_table VALUES (NULL, ".$_POST['item_id'].", '".$name."', 1)";
else $sql = "INSERT INTO $i_table VALUES (NULL, ".$_POST['item_id'].", '".$name."', 0)";
$modx->db->query($sql);
}
}
}
}

$filters = array();
foreach (array_keys($_POST) as $key) {
if (stripos($key, 'filter') != -1) {
$filters[] = substr($key, 7);
}
}
$fils = array();
foreach ($filters as $fid) {
if ($_POST['filter_'.$fid] > 0)
$fils[] = $fid.'->'.$_POST['filter_'.$fid];
}
$que = "UPDATE $mod_table SET filters='".implode($fils, '=|=')."' WHERE id=".$_POST['item_id'];
$modx->db->query($que);


if ($_POST['del']) {
foreach ($_POST['del'] as $key => $v) {
$que = "DELETE FROM $i_table WHERE iid='".$_POST['item_id']."' AND filename='".$_POST['filename'][$key]."'";
$modx->db->query($que);
}
}




header("Location: $_SERVER[REQUEST_URI]");
break;


case 'reload':
header("Location: $_SERVER[REQUEST_URI]");
break;

case 'delete':
$modx->db->delete($mod_table, "id = $_POST[item_id]");
header("Location: $_SERVER[REQUEST_URI]");
break;

case 'impcsv':
/// в разработке
break;

case 'reset':
unset($_SESSION['params']);
header("Location: $_SERVER[REQUEST_URI]");
break;


default:
if (mysql_num_rows(mysql_query("show tables from $dbname like '$mod_table'"))==0){

echo '<p><a href="#" onclick="postForm(\'install\',null);return false;">Установить модуль</a></p>';

}else{

echo '
</form>
<div width="50%" align="left" valign="top" style="float: left;">
    <br/>
    <p>
        <a href="#" onclick="postForm(\'add\',null);return false;"><img src="../assets/modules/filters/image/icon/add.gif" align="absmiddle" />Добавить новый товар</a>
    </p>
</div>

';


if(count($_SESSION['params'])) {
foreach($_SESSION['params'] as $key => $param) {
$_POST[$key] = $param;
}
}

//var_dump($_POST);


$query = "SELECT i.id, i.name, t.name tname, t.id tid, v.name vname, c.name cname, c.id cid, i.description, i.price FROM `$mod_table` i, `$t_table` t, $v_table v, $c_table c WHERE i.vendor_id=v.id AND i.coll_id=c.id AND i.type_id=t.id";

$filterSeeVal = $_POST['filterSection'];
if($filterSeeVal) {
$_SESSION['params']['filterSection'] = $filterSeeVal;
}
switch ($filterSeeVal) {
case 'type':
$filterSeeValText=  'Категория';
$filterCatType = ' selected ';
break;
case 'vendor':
$filterCatVendor = ' selected ';
break;
case 'name';
$filterCatName = ' selected ';
break;
default:
$filterSeeValText =  'Наименование';
}

if (isset($_POST['filterSection'], $_POST['filterName'], $_POST['sort'])) {
$filterSee = 'Вы выбрали: ' . $filterSeeValText. ' - ' . $_POST['filterName'].' - Сортировка по: ' . $_POST['sort'] ;
$filterS  = $_POST['filterSection'];
$filterN  = $_POST['filterName'];
$sort = $_POST['sort'];
$_SESSION['params']['filterSection'] = $filterS;
$_SESSION['params']['filterName'] = $filterN;
$_SESSION['params']['sort'] = $_POST['sort'];
}


if ($filterN == '') {
//$data_query = $modx->db->select("*", $mod_table,  "", "id ASC", "");
}
else if ($filterS == '') {
//$data_query = $modx->db->select("*", $mod_table,  "", "id ASC", "");
}
else {
//$data_query = $modx->db->select("*", $mod_table,  " `$filterS` = '$filterN' ", "`$sort` ASC", "");
$query .= " AND ";
if ($filterS == 'type') $query .= "t.name";
elseif ($filterS == 'name') $query .= "c.name";
elseif ($filterS == 'vendor') $query .= "v.name";
$query .= " LIKE '%".$filterN."%'";

}

if($_POST['cat_tovar']) {
$query .= " AND t.id=" . $_POST['cat_tovar'];
$_SESSION['params']['cat_tovar'] = $_POST['cat_tovar'];
}

if($_POST['collection_tovar']) {
$query .= " AND c.id=" . $_POST['collection_tovar'];
$_SESSION['params']['collection_tovar'] = $_POST['collection_tovar'];
}


$query .= " ORDER BY ";
if ($sort == 'type') $query .= "tname";
elseif ($sort == 'name') $query .= "name";
elseif ($sort == 'vendor') $query .= "vname";
elseif ($sort == 'id') $query .= "id";
else $query .= "cname ASC";

$data_query = $modx->db->query($query);
$data_query_category = $modx->db->query($query);
$categoryArr = array();
$collectionArr = array();
while ($data_cat_cat = mysql_fetch_array($data_query_category)){
if(!$categoryArr[$data_cat_cat['tid']]) {
$categoryArr[$data_cat_cat['tid']] = $data_cat_cat['tname'];
}

if(!$collectionArr[$data_cat_cat['cid']]) {
$collectionArr[$data_cat_cat['cid']] = $data_cat_cat['cname'];
}
}

$categorySelect = '';

if(count($categoryArr)) {
$categorySelect .= '<select name="cat_tovar"><option value="0">Выберите категорию</option>';
    foreach($categoryArr as $key => $category) {
    if($_POST['cat_tovar'] == $key) {
    $categorySelect .= '<option value="'.$key.'" selected="selected">'.$category.'</option>';
    } else {
    $categorySelect .= '<option value="'.$key.'">'.$category.'</option>';
    }

    }
    $categorySelect .= '</select>';
}

$collectionSelect = '';
//    echo '<pre>';
//var_dump($collectionArr);
//    echo '</pre>';
if(count($collectionArr)) {
$collectionSelect .= '<select name="collection_tovar"><option value="0">Выберите коллекцию</option>';
    foreach($collectionArr as $key => $collection) {
    if($_POST['collection_tovar'] == $key) {
    $collectionSelect .= '<option value="'.$key.'" selected="selected">'.$collection.'</option>';
    } else {
    $collectionSelect .= '<option value="'.$key.'">'.$collection.'</option>';
    }

    }
    $collectionSelect .= '</select>';
}



echo '<div style="clear: both"/>
<div class="filterblok">
    <div style="padding-left: 15px; padding-top: 5px;">
        <h3>Фильтр</h3>
        <div style="width: 125px; float: left;">
            <form method="post" action="">
                <select name="filterSection" id="filterSection">
                    <option value="vendor" ' .$filterCatVendor. '> &nbsp;&nbsp;Производитель&nbsp;&nbsp;&nbsp; </option>
                    <option value="name" '.$filterCatName.' > &nbsp;&nbsp;Наименование&nbsp;&nbsp;&nbsp; </option>
                </select>
        </div>
        <div style="width: 200px; float: left;">
            Значение: <input type="text" name="filterName" value="'.$filterN.'">
        </div>
        <div style="width: 200px; float: left;">
            Сортируем по: <select name="sort" id="sort">
                <option value=""></option>
                <option value="id"> &nbsp;&nbsp;ID&nbsp;&nbsp;&nbsp; </option>
                <option value="type"> &nbsp;&nbsp;Категория&nbsp;&nbsp;&nbsp; </option>
                <option value="vendor"> &nbsp;&nbsp;Производитель&nbsp;&nbsp;&nbsp; </option>
            </select>
        </div>
        <div align="left" valign="top"  style="float: left;">
            <input type="submit" value="OK">  <input type="submit" value="ОТМЕНА">
        </div>
        <div style="clear:both;"></div><br /><br />
        <div class="cat_select">
            Категория
            '.$categorySelect.'
        </div><br/>
        <div class="cat_select">
            Коллекция
            '.$collectionSelect.'
        </div>
        </form>


        <!--' . $filterSee . '-->
        <br />
        <p><a href="#" onclick="postForm(\'reset\',null);return false;">Сбросить фильтр</a></p>
    </div>
</div>
<br />';

echo '
<table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#cccccc" class="table">
    <thead>
    <tr bgcolor="#666666" align="center">
        <td style="color: #fff;" width="5%"><b>№</b></td>
        <td style="color: #fff;" width="15%"><b>Название</b></td>
        <td style="color: #fff;" width="15%"><b>Производитель</b></td>
        <td style="color: #fff;" width="15%"><b>Коллекция</b></td>
        <td style="color: #fff;" width="15%"><b>Категория</b></td>
        <td style="color: #fff;" width="7%"><b>Обзор</b></td>
        <td style="color: #fff;" width="7%"><b>Удалить</b></td>
    </tr>
    <thead>
    <tbody>
    ';

    $i = 1;
    $array_ids = array();
    while ($data = mysql_fetch_array($data_query)){//выводим записи
        if(!$array_ids[$data["id"]]) {
            continue;
        }
    echo '
    <tr valign="top" bgcolor="#FFFFFF">
        <td align="center"> '.$i.' </td>
        <td><a href="#" title="Редактировать" onclick="postForm(\'add\','.$data["id"].');return false;"> '.$data['name'].' </a></td>
        <td>'.$data['vname'].'</td>
        <td>'.$data['cname'].'</td>
        <td>'.$data['tname'].'</td>
        <td align="center"><a href="#" title="Редактировать" onclick="postForm(\'add\','.$data["id"].');return false;">
            <img src="/assets/modules/items/image/icon/red.gif" align="absmiddle" /></a></td>
        <td  align="center"><a href="#" title="Удалить" onclick="if(confirm(\'Вы уверены?\')){postForm(\'delete\','.$data["id"].')};return false">
            <img src="../assets/modules/items/image/icon/del.gif" align="absmiddle" /></a></td>
    </tr>';
        $i++;
        $array_ids[$data["id"]] = $data["id"];
    }

    echo '
    </tbody>
</table>
';

}

break;
}


echo '
</div>
</body>
</html>
';