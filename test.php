<?php
if(!function_exists('signMessage')) {
    /* Хэш-функция */
    function signMessage($message, $secretPhrase) {
        $message = $message.$secretPhrase;
        $result = md5($message).sha1($message);
        for ($i = 0; $i < 1102; $i++) {
            $result = md5($result);
        }
        return $result;
    }
}

$partnerId = 'a06b000000n8QF4AAM';  /* Тестовый - 1-178YO4Z */
$secretPhrase = 'skbtools-secret-n8QF4521'; /* Тестовая 321ewq */

$order_id = $_SESSION['shk_order_id'];
$payment_method = $_SESSION['shk_payment_method'];
$order_price = $_SESSION['shk_order_price'];
if($order_id && $payment_method == 'Купить в кредит') {
    $data = $modx->db->getRow($modx->db->select("id, short_txt, content, allowed, addit, price, currency, DATE_FORMAT(date,'%d.%m.%Y %k:%i') AS date, DATE_FORMAT(sentdate,'%d.%m.%Y %k:%i') AS sentdate, note, status, email, phone, payment, tracking_num,  userid", $modx->getFullTableName('manager_shopkeeper'), "id = '$order_id'", "", ""));
    $data['purchases'] = unserialize($data['content']);
    $data['addit_params'] = unserialize($data['addit']);
    $short_txt = unserialize($data['short_txt']);

    if(count($data['purchases'])) {
        $order = array();
        $order['items'] = array();
        $i = 0;
        foreach($data['purchases'] as $tovar) {
            $tovar_id = $tovar[0];
            $tovar_parent = $modx->runSnippet('DocInfo', array('docid' => $tovar_id, 'field' => 'parent'));
            $parent_name = $modx->runSnippet('DocInfo', array('docid' => $tovar_parent, 'field' => 'pagetitle'));
            $order['items'][$i]['title'] = $tovar[3];
            $order['items'][$i]['category'] = $parent_name;
            $order['items'][$i]['qty'] = (int)$tovar[1];
            $order['items'][$i]['price'] = $tovar[2];
            $i++;
        }


        $fio = explode(' ', $short_txt['name']);
        if($fio[0]) {
            $last_name = $fio[0];
        } else {
            $last_name = '';
        }

        if($fio[1]) {
            $first_name = $fio[1];
        } else {
            $first_name = '';
        }

        if($fio[2]) {
            $middlename = $fio[2];
        } else {
            $middlename = '';
        }

        $order['details'] = array(
            'firstname' => $first_name,
            'lastname' => $last_name,
            'middlename' => $middlename,
            'email' => $short_txt['email'],
            'cellphone' => $short_txt['phone'],
        );

        $order['partnerId'] = $partnerId;
        $order['partnerOrderId'] = 'skbtools.ru_' . $order_id;
        $order['deliveryType'] = '';
    }

    /* Получение base64-строки из массива заказа */
    $json = json_encode($order);
    $base64 = base64_encode($json);

    /* Получение подписи сообщения */
    $sig = signMessage($base64, $secretPhrase);

    echo '
        <script src="https://www.kupivkredit.ru/widget/vkredit.js"> </script>
        <script>
            $(document).ready(function() {

                $(".kredit_button_but").live("click", function() {
                    $("#button_").trigger("click");
                })
                vkredit = new VkreditWidget(1,/*цвет кнопки*/ 144574,
                {
                    order: "'.$base64.'",
                    sig: "'.$sig.'"
                });
                vkredit.insertButton("fieldset");
            });
        </script>
        <style>
            .redsquare {
                background-color:red;
                width:100px;
                height:50px;
                cursor:pointer;
                margin-top:20px;
            }

            .kredit_button_but{
                 text-decoration:none;
                 text-align:center;
                 padding:11px 32px;
                 width: 300px;
                 display:block;
                 margin-top:10px;
                 border:solid 1px #0d6bb3;
                 -webkit-border-radius:4px;
                 -moz-border-radius:4px;
                 border-radius: 4px;
                 font:18px Arial, Helvetica, sans-serif;
                 font-weight:bold;
                 color:#ffffff;
                 background-color:#3BA4C7;
                 background-image: -moz-linear-gradient(top, #3BA4C7 0%, #1982A5 100%);
                 background-image: -webkit-linear-gradient(top, #3BA4C7 0%, #1982A5 100%);
                 background-image: -o-linear-gradient(top, #3BA4C7 0%, #1982A5 100%);
                 background-image: -ms-linear-gradient(top, #3BA4C7 0% ,#1982A5 100%);
                 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#1982A5", endColorstr="#1982A5",GradientType=0 );
                 background-image: linear-gradient(top, #3BA4C7 0% ,#1982A5 100%);
                -webkit-box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff;
                -moz-box-shadow: 0px 0px 2px #bababa,  inset 0px 0px 1px #ffffff;
                 box-shadow:0px 0px 2px #bababa, inset 0px 0px 1px #ffffff;
          }

          img#button_ {
            display:none;
          }

          .kredit_button_but:hover {
            cursor:pointer;
          }

        </style>
        <fieldset id="fieldset" style="margin-top:10px;">
            <span class="kredit_button_but">Перейти к оформлению кредита</span>
        </fieldset>
        ';
}

?>