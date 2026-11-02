<?php

use App\Models\SetRate;
use App\Models\TableCoins;
use App\Models\VoxaTrade;
use App\Models\BnixTrade;

function getVoxaPrice($time, $coins, $close)
{
    $var = SetRate::where([['time', $time], ['coin', $coins]])->first();
    if ($var->set_by == 'Auto') {
        if ($var->flow == 'High') {
            $ch = rand(1, 7);
            if ($ch == 1) {
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
        } elseif ($var->flow == 'Low') {
            $ch = rand(1, 7);
            if ($ch == 1) {
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
    } elseif ($var->set_by == 'Admin') {
        if ($var->flow == 'High') {
            $ch = $var->change;
            if (rand(1, 6) == 1) {
                $change = ($close / 100 * $ch);
                $price = number_format($close + $change, 4);
            } else {
                $change = ($close / 100 * $ch);
                $price = number_format($close + $change, 4);
            }
        } elseif ($var->flow == 'Low') {
            $ch = $var->change;
            if (rand(1, 6) == 1) {
                $change = ($close / 100 * $ch);
                $price = number_format($close + $change, 4);
            } else {
                $change = ($close / 100 * $ch);
                $price = number_format($close - $change, 4);
            }
        }
    }

    return $price;
}

function getBnixPrice($time, $coins, $close)
{
    $var = SetRate::where([['time', $time], ['coin', $coins]])->first();
    if ($var->set_by == 'Auto') {
        if ($var->flow == 'High') {
            $ch = rand(1, 7);
            if ($ch == 1) {
                $value = '0.00' . rand(80, 99);
            } else {
                $value = '0.00' . rand(20, 59);
            }
            $change = (float)$value;
            $rand  = rand(1, 6);
            if ($rand == 1 || $rand == 3 || $rand == 5 || $rand == 6) {
                $price = number_format($close + $change, 4);
            } else {
                $price = number_format($close - $change, 4);
            }
        } elseif ($var->flow == 'Low') {
            $ch = rand(1, 7);
            if ($ch == 1) {
                $value = '0.00' . rand(80, 99);
            } else {
                $value = '0.00' . rand(20, 59);
            }
            $change = (float)$value;
            $rand  = rand(1, 6);
            if ($rand == 1 || $rand == 3 || $rand == 5 || $rand == 6) {
                $price = number_format($close - $change, 4);
            } else {
                $price = number_format($close + $change, 4);
            }
        } else {
            $value = '0.00' . rand(45, 79);
            $change = (float)$value;
            $rand  = rand(1, 4);
            if ($rand == 1 || $rand == 2) {
                $price = number_format($close - $change, 4);
            } else {
                $price = number_format($close + $change, 4);
            }
        }
    } elseif ($var->set_by == 'Admin') {
        if ($var->flow == 'High') {
            $ch = $var->change;
            if (rand(1, 6) == 1) {
                $change = ($close / 100 * $ch);
                $price = number_format($close + $change, 4);
            } else {
                $change = ($close / 100 * $ch);
                $price = number_format($close + $change, 4);
            }
        } elseif ($var->flow == 'Low') {
            $ch = $var->change;
            if (rand(1, 6) == 1) {
                $change = ($close / 100 * $ch);
                $price = number_format($close + $change, 4);
            } else {
                $change = ($close / 100 * $ch);
                $price = number_format($close - $change, 4);
            }
        }
    }

    return $price;
}

//set coins flow functions
function setVoxaFlow($time, $close)
{
    $coin = 'VOXA-USDT';
    $var = SetRate::where([['time', $time], ['coin', $coin]])->first();
    if (!$var) {
        $base = TableCoins::where('code', $coin)->first();
        $base_high = $base->base_price + ($base->base_price / 100 * 0.50);
        $base_low = $base->base_price - ($base->base_price / 100 * 0.50);
        $limit = rand(1, 3);
        if ($close >= $base_high) {
            $flow = 'Low';
            $limit = rand(2, 4);
        } elseif ($close <= $base_low) {
            $flow = 'High';
            $limit = rand(2, 4);
        } else {
            $range = rand(1, 8);
            if ($range == 1) {
                $flow = 'High';
            } elseif ($range == 2) {
                $flow = 'Low';
            } else {
                $flow = 'Range';
                $limit = rand(3, 8);
            }
        }

        for ($i = 0; $i < $limit; $i++) {

            $time = date('Y-m-d H:i:0', strtotime('+' . $i . ' minute'));
            $var = new SetRate();
            $var->coin = $coin;
            $var->time = $time;
            $var->flow = $flow;
            $var->save();
        }
    }
}

function setBnixFlow($time, $close)
{
    $coin = 'BNIX-USDT';
    $var = SetRate::where([['time', $time], ['coin', $coin]])->first();
    if (!$var) {
        $base = TableCoins::where('code', $coin)->first();
        $base_high = $base->base_price + ($base->base_price / 100 * 0.50);
        $base_low = $base->base_price - ($base->base_price / 100 * 0.50);
        $limit = rand(1, 3);
        if ($close >= $base_high) {
            $flow = 'Low';
            $limit = rand(2, 4);
        } elseif ($close <= $base_low) {
            $flow = 'High';
            $limit = rand(2, 4);
        } else {
            $range = rand(1, 8);
            if ($range == 1) {
                $flow = 'High';
            } elseif ($range == 2) {
                $flow = 'Low';
            } else {
                $flow = 'Range';
                $limit = rand(3, 8);
            }
        }

        for ($i = 0; $i < $limit; $i++) {

            $time = date('Y-m-d H:i:0', strtotime('+' . $i . ' minute'));
            $var = new SetRate();
            $var->coin = $coin;
            $var->time = $time;
            $var->flow = $flow;
            $var->save();
        }
    }
}


function precentChange($pre_change)
{
    if ($pre_change < 0) {
        $ct = "<span class='color-price-down'>" . number_format($pre_change, 2) . "%</span>";
    } else {
        $ct = "<span class='color-price-up'>+" . number_format($pre_change, 2) . "%</span>";
    }

    return $ct;
}

function getDifference($diff)
{
    if ($diff < 0) {
        $df = "<span class='color-price-down'>" . $diff . "</span>";
    } else {
        $df = "<span class='color-price-up'>+" . $diff . "</span>";
    }

    return $df;
}

function getClose($diff, $cls)
{
    if ($diff < 0) {
        $close = "<span class='color-price-down'>" . number_format($cls, 4) . "</span>";
    } else {
        $close = "<span class='color-price-up'>" . number_format($cls, 4) . "</span>";
    }

    return $close;
}

function getMarketPrice($cn)
{
    $first = strtolower(substr($cn, 0, 3));
    // $last = strtolower(substr($cn, -3));
    $last = strtoupper(substr($cn, -4)) === 'USDT' ? 'USD' : strtoupper(substr($cn, -3));
    $token = $first . '/' . $last;
    $check = TableCoins::where('coin', $cn)->first();
    if ($check && $check->prefix == 'BINANCE' || $check && $check->prefix == 'BINANCEUS') {
        $symbol = strtoupper($cn); // e.g. BTCUSDT
        $binanceUrl = "https://api.binance.com/api/v3/ticker/price?symbol={$symbol}";
        $response = @file_get_contents($binanceUrl); // Safe error suppression
        $data = json_decode($response, true);
        if (isset($data['price']) && is_numeric($data['price'])) {
            return [
                'code' => 1,
                'data' => $data['price']
            ];
        } else {
            return [
                'code' => 0,
                'data' => ''
            ];
        }
    } else {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.twelvedata.com/time_series?apikey=7d164b32c1ef4493aeaa0928639669b8&interval=1min&country=INDIA&symbol=" . $token . "&outputsize=6&format=JSON&timezone=Asia/Kolkata",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $data = json_decode($response, true);
        if ($err) {
            return [
                'code' => 0,
                'data' => ''
            ];
        } else {
            return [
                'code' => 1,
                'data' => $data['values'][0]['close']
            ];
        }
    }
}

function getJWttoken()
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://api.nowpayments.io/v1/auth");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $post = array(
        "email" => "iroxfxi@gmail.com",
        "password" => "Liberfx@2026#"
    );

    $post = json_encode($post);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
    curl_setopt($curl, CURLOPT_POST, 1);

    $headers = array();
    $headers[] = "Content-Type: application/json";
    $headers[] = "x-api-key: D7X3YPG-XV9MPJT-H5HXZPV-8RR40DP";
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($result, true);
    return $response['token'];
}
