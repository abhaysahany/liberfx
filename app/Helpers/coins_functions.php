<?php


use App\Models\MemberDetail;

use App\Models\VoxaTrade;
use App\Models\BnixTrade;
use App\Models\ConvertPrize;

function coinsSetup($cdata, $index, $coin)
{

    if ($cdata[$index]['priceChangePercent'] < 0) {
        $ct = "<span class='color-price-down'>" . number_format($cdata[$index]['priceChangePercent'], 2) . "%</span>";
    } else {
        $ct = "<span class='color-price-up'>+" . number_format($cdata[$index]['priceChangePercent'], 2) . "%</span>";
    }
    return [
        'coin' => $coin,
        'open' => number_format($cdata[$index]['openPrice'], 4),
        'high' => number_format($cdata[$index]['highPrice'], 4),
        'low' => number_format($cdata[$index]['lowPrice'], 4),
        'close' => number_format($cdata[$index]['lastPrice'], 4),
        'change' => $ct,
        'volume' => number_format($cdata[$index]['quoteVolume'], 4),
    ];
}

function plCoinSetup($coin)
{
    if ($coin == 'VOXA/USDT') {
        $var = VoxaTrade::orderBy('time', 'DESC')->first();
        $last24h = date('Y-m-d H:i:00', strtotime('-24hours'));
        $high24 = VoxaTrade::where('time', '>', $last24h)->max('high');
        $low24 = VoxaTrade::where('time', '>', $last24h)->min('low');
        $closelast = VoxaTrade::where('time', '>', $last24h)->orderBy('created_at', 'ASC')->first();
        $volume = $closelast->volume;
    } elseif ($coin == 'BNIX/USDT') {
        $var = BnixTrade::orderBy('time', 'DESC')->first();
        $last24h = date('Y-m-d H:i:00', strtotime('-24hours'));
        $high24 = BnixTrade::where('time', '>', $last24h)->max('high');
        $low24 = BnixTrade::where('time', '>', $last24h)->min('low');
        $closelast = BnixTrade::where('time', '>', $last24h)->orderBy('created_at', 'ASC')->first();
        $volume = $closelast->volume;
    }

    $diff = number_format($var->close - $closelast->close, 4);
    $pre_change = $diff / $closelast->close * 100;
    if ($pre_change < 0) {
        $ct = "<span class='color-price-down'>" . number_format($pre_change, 2) . "%</span>";
    } else {
        $ct = "<span class='color-price-up'>+" . number_format($pre_change, 2) . "%</span>";
    }

    return [
        'coin' => $coin,
        'open' => $var['open'],
        'high' => $high24,
        'low' => $low24,
        'close' => $var['close'],
        'change' => $ct,
        'volume' => $volume
    ];
}

function greenValues($cls)
{
    $price = (float)number_format($cls, 4);
    $first = $price + setChange('First');
    $second = $price + setChange('Second');
    $third = $price + setChange('Third');
    $fourth = $price + setChange('Fourth');
    $fifth = $price + setChange('Fifth');
    $sixth = $price + setChange('Sixth');
    $seventh = $price + setChange('Seventh');
    $eight = $price + setChange('Eight');

    $vol1 = rand(5, 100) . '.' . rand(1250, 9999);
    $vol2 = rand(5, 100) . '.' . rand(1250, 9999);
    $vol3 = rand(5, 100) . '.' . rand(1250, 9999);
    $vol4 = rand(5, 100) . '.' . rand(1250, 9999);
    $vol5 = rand(5, 100) . '.' . rand(1250, 9999);
    $vol6 = rand(5, 100) . '.' . rand(1250, 9999);
    $vol7 = rand(5, 100) . '.' . rand(1250, 9999);
    $vol8 = rand(5, 100) . '.' . rand(1250, 9999);

    $tot1 = number_format(rand(83, 281) / 7, 4);
    $tot2 = number_format($tot1 + ($tot1 / 100 * rand(15, 45)), 4);
    $tot3 = number_format($tot2 + ($tot2 / 100 * rand(65, 65)), 4);
    $tot4 = number_format($tot3 + ($tot3 / 100 * rand(55, 75)), 4);
    $tot5 = number_format($tot4 + ($tot4 / 100 * rand(55, 80)), 4);
    $tot6 = number_format($tot5 + ($tot5 / 100 * rand(45, 85)), 4);
    $tot7 = number_format($tot6 + ($tot6 / 100 * rand(45, 90)), 4);
    $tot8 = number_format($tot7 + ($tot7 / 100 * rand(40, 95)), 4);

    return $data = "<tr>
    
    <td><span class='color-price-up'>{$first}</span></td>
    <td>{$vol1}</td>
    <td>{$tot1}</td>
  </tr>
  <tr>
    <td><span class='color-price-up'>{$second}</span></td>
    <td>{$vol2}</td>
    <td>{$tot2}</td>
  </tr>
  <tr>
    <td><span class='color-price-up'>{$third}</span></td>
    <td>{$vol3}</td>
    <td>{$tot3}</td>
  </tr>
  <tr>
    <td><span class='color-price-up'>{$fourth}</span></td>
    <td>{$vol4}</td>
    <td>{$tot4}</td>
  </tr>
  <tr>
    <td><span class='color-price-up'>{$fifth}</span></td>
    <td>{$vol5}</td>
    <td>{$tot5}</td>
  </tr>
  <tr>
    <td><span class='color-price-up'>{$sixth}</span></td>
    <td>{$vol6}</td>
    <td>{$tot6}</td>
  </tr>
  <tr>
    <td><span class='color-price-up'>{$seventh}</span></td>
    <td>{$vol7}</td>
    <td>{$tot7}</td>
  </tr>
  <tr>
    <td><span class='color-price-up'>{$eight}</span></td>
    <td>{$vol8}</td>
    <td>{$tot8}</td>
  </tr>";
}

function redValues($cls)
{
    $price = (float)number_format($cls, 4);
    $first = $price - setChange('First');
    $second = $price - setChange('Second');
    $third = $price - setChange('Third');
    $fourth = $price - setChange('Fourth');
    $fifth = $price - setChange('Fifth');
    $sixth = $price - setChange('Sixth');
    $seventh = $price - setChange('Seventh');
    $eight = $price - setChange('Eight');

    $vol1 = rand(5, 100) . '.' . rand(1250, 9999);
    $vol2 = rand(5, 100) . '.' . rand(1250, 9999);
    $vol3 = rand(5, 100) . '.' . rand(1250, 9999);
    $vol4 = rand(5, 100) . '.' . rand(1250, 9999);
    $vol5 = rand(5, 100) . '.' . rand(1250, 9999);
    $vol6 = rand(5, 100) . '.' . rand(1250, 9999);
    $vol7 = rand(5, 100) . '.' . rand(1250, 9999);
    $vol8 = rand(5, 100) . '.' . rand(1250, 9999);

    $tot1 = number_format(rand(83, 281) / 7, 4);
    $tot2 = number_format($tot1 - ($tot1 / 100 * rand(15, 45)), 4);
    $tot3 = number_format($tot2 - ($tot2 / 100 * rand(65, 65)), 4);
    $tot4 = number_format($tot3 - ($tot3 / 100 * rand(55, 75)), 4);
    $tot5 = number_format($tot4 - ($tot4 / 100 * rand(55, 80)), 4);
    $tot6 = number_format($tot5 - ($tot5 / 100 * rand(45, 85)), 4);
    $tot7 = number_format($tot6 - ($tot6 / 100 * rand(45, 90)), 4);
    $tot8 = number_format($tot7 - ($tot7 / 100 * rand(40, 95)), 4);

    return $data = " <tr>
    <td><span class='color-price-down'>{$eight}</span></td>
    <td>{$vol8}</td>
    <td>{$tot8}</td>
  </tr>
  <tr>
    <td><span class='color-price-down'>{$seventh}</span></td>
    <td>{$vol7}</td>
    <td>{$tot7}</td>
  </tr>
  <tr>
    <td ><span class='color-price-down'>{$sixth}</span></td>
    <td>{$vol6}</td>
    <td>{$tot6}</td>
  </tr>
  <tr>
    <td ><span class='color-price-down'>{$fifth}</span></td>
    <td>{$vol5}</td>
    <td>{$tot5}</td>
  </tr>
  <tr>
    <td ><span class='color-price-down'>{$fourth}</span></td>
    <td>{$vol4}</td>
    <td>{$tot4}</td>
  </tr>
  <tr>
    <td ><span class='color-price-down'>{$third}</span></td>
    <td>{$vol3}</td>
    <td>{$tot3}</td>
  </tr>
  <tr>
    <td ><span class='color-price-down'>{$second}</span></td>
    <td>{$vol2}</td>
    <td>{$tot1}</td>
  </tr>
  <tr>
    <td ><span class='color-price-down'>{$first}</span></td>
    <td>{$vol1}</td>
    <td>{$tot1}</td>
  </tr>";
}

function setChange($var)
{
    if ($var == 'First') {
        $value = '0.00' . rand(10, 50);
        $change = (float)$value;
    } elseif ($var == 'Second') {
        $value = '0.00' . rand(50, 99);
        $change = (float)$value;
    } elseif ($var == 'Third') {
        $value = '0.0' . rand(100, 150);
        $change = (float)$value;
    } elseif ($var == 'Fourth') {
        $value = '0.0' . rand(150, 199);
        $change = (float)$value;
    } elseif ($var == 'Fifth') {
        $value = '0.0' . rand(200, 250);
        $change = (float)$value;
    } elseif ($var == 'Sixth') {
        $value = '0.0' . rand(250, 299);
        $change = (float)$value;
    } elseif ($var == 'Seventh') {
        $value = '0.0' . rand(300, 350);
        $change = (float)$value;
    } elseif ($var == 'Eight') {
        $value = '0.0' . rand(350, 399);
        $change = (float)$value;
    }


    return $change;
}


function getVoxaPriceSession($close, $flow)
{
    if ($flow == 'High') {
        $change = rand(1, 7);
        if ($change == 1) {
            $value = '0.00' . rand(25, 65);
        } else {
            $value = '0.00' . rand(10, 19);
        }
        $change = (float)$value;
        $rand  = rand(1, 6);
        if ($rand == 1 || $rand == 3 || $rand == 5 || $rand == 6) {
            $price = number_format($close + $change, 4);
        } else {
            $price = number_format($close - $change, 4);
        }
    } elseif ($flow == 'Low') {
        $change = rand(1, 7);
        if ($change == 1) {
            $value = '0.00' . rand(25, 65);
        } else {
            $value = '0.00' . rand(10, 19);
        }
        $change = (float)$value;
        $rand  = rand(1, 6);
        if ($rand == 1 || $rand == 3 || $rand == 5 || $rand == 6) {
            $price = number_format($close - $change, 4);
        } else {
            $price = number_format($close + $change, 4);
        }
    } else {
        $value = '0.00' . rand(15, 35);
        $change = (float)$value;
        $rand  = rand(1, 4);
        if ($rand == 1 || $rand == 2) {
            $price = number_format($close - $change, 4);
        } else {
            $price = number_format($close + $change, 4);
        }
    }

    return $price;
}

function getBnixPriceSession($close, $flow)
{
    if ($flow == 'High') {
        if (rand(1, 7 == 1)) {
            $value = '0.00' . rand(40, 80);
        } else {
            $value = '0.00' . rand(10, 35);
        }
        $change = (float)$value;
        $rand  = rand(1, 5);
        if ($rand == 1 || $rand == 3 || $rand == 5) {
            $price = number_format($close + $change, 4);
        } else {
            $price = number_format($close - $change, 4);
        }
    } elseif ($flow == 'Low') {
        if (rand(1, 7 == 1)) {
            $value = '0.00' . rand(40, 80);
        } else {
            $value = '0.00' . rand(10, 35);
        }
        $change = (float)$value;
        $rand  = rand(1, 5);
        if ($rand == 1 || $rand == 3 || $rand == 5) {
            $price = number_format($close - $change, 4);
        } else {
            $price = number_format($close + $change, 4);
        }
    } else {
        $value = '0.00' . rand(25, 45);
        $change = (float)$value;
        $rand  = rand(1, 4);
        if ($rand == 1 || $rand == 2) {
            $price = number_format($close - $change, 4);
        } else {
            $price = number_format($close + $change, 4);
        }
    }

    return $price;
}

function CoinValue()
{
    $url = 'https://api.binance.com/api/v3/ticker/24hr?symbols=["BTCUSDT","BNBUSDT","TRXUSDT"]';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    curl_close($ch);
    $cdata = json_decode($result, true);
    $btc = $cdata[0]['lastPrice'];
    $bnb = $cdata[1]['lastPrice'];
    $trx = $cdata[2]['lastPrice'];

    $var = ConvertPrize::find(1);
    $var->btc = $btc;
    $var->tron = $trx;
    $var->bnb = $bnb;
    $var->save();
}

function volume24h($coin)
{
    $now = date('Y-m-d H:i:s');
    $last24h = date('Y-m-d H:i:s', strtotime($now . '-1day'));
    if ($coin == 'VOXA') {
        $sum = VoxaTrade::whereBetween('time', [$last24h, $now])->sum('volume');
    } else {
        $sum = BnixTrade::whereBetween('time', [$last24h, $now])->sum('volume');
    }

    return $sum;
}
