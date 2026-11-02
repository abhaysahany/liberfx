<?php

namespace App\Http\Controllers;

use App\Models\BnixTrade;
use App\Models\VoxaTrade;
use App\Models\SetRate;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function fetchCoinDatas()
    {

        $url = 'https://api.binance.com/api/v3/ticker/24hr?symbols=["BTCUSDT","BNBUSDT","ETHUSDT","TRXUSDT","SOLUSDT","LTCUSDT","APTUSDT","IDEXUSDT","STXUSDT","GALUSDT","MASKUSDT","XMRUSDT","LTOUSDT","OMGUSDT","COTIUSDT","ONGUSDT","ONEUSDT","ICXUSDT","GLMRUSDT","FLUXUSDT","XNOUSDT","LUNCUSDT","WLDUSDT","ZRXUSDT","TOMOUSDT","MOVRUSDT","WANUSDT","FIOUSDT","SKLUSDT","UFTUSDT","ORNUSDT","UMAUSDT","BATUSDT","LINKUSDT","ATOMUSDT","DYDXUSDT","GMXUSDT","FTTUSDT","TRBUSDT","APEUSDT","MKRUSDT","PNTUSDT","BCHUSDT","REQUSDT","CREAMUSDT","KSMUSDT","DCRUSDT","LOOMUSDT","OXTUSDT","XVSUSDT","WINGUSDT","WOOUSDT"]';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);
        $cdata = json_decode($result, true);

        $data['btcdata'] = coinsSetup($cdata, 0, 'BTC/USDT');
        $data['ethdata'] = coinsSetup($cdata, 1, 'ETH/USDT');
        $data['bnbdata'] = coinsSetup($cdata, 2, 'BNB/USDT');
        $data['ltcdata'] = coinsSetup($cdata, 3, 'LTC/USDT');
        $data['soldata'] = coinsSetup($cdata, 4, 'SOL/USDT');
        $data['trxdata'] = coinsSetup($cdata, 5, 'TRX/USDT');
        $data['aptdata'] = coinsSetup($cdata, 6, 'APT/USDT');
        $data['stxdata'] = coinsSetup($cdata, 7, 'STX/USDT');
        $data['idexdata'] = coinsSetup($cdata, 8, 'IDEX/USDT');
        $data['galdata'] = coinsSetup($cdata, 9, 'GAL/USDT');
        $data['maskdata'] = coinsSetup($cdata, 10, 'MASK/USDT');
        $data['xmrdata'] = coinsSetup($cdata, 11, 'XMR/USDT');
        $data['ltodata'] = coinsSetup($cdata, 12, 'LTO/USDT');
        $data['omgdata'] = coinsSetup($cdata, 13, 'OMG/USDT');
        $data['cotidata'] = coinsSetup($cdata, 14, 'COTI/USDT');
        $data['ongdata'] = coinsSetup($cdata, 15, 'ONG/USDT');
        $data['onedata'] = coinsSetup($cdata, 16, 'ONE/USDT');
        $data['icxdata'] = coinsSetup($cdata, 17, 'ICX/USDT');
        $data['glmrdata'] = coinsSetup($cdata, 18, 'GLMR/USDT');
        $data['fluxdata'] = coinsSetup($cdata, 19, 'FLUX/USDT');
        $data['xnodata'] = coinsSetup($cdata, 20, 'XNO/USDT');
        $data['luncdata'] = coinsSetup($cdata, 21, 'LUNC/USDT');
        $data['wlddata'] = coinsSetup($cdata, 22, 'WLD/USDT');
        $data['zrxdata'] = coinsSetup($cdata, 23, 'ZRX/USDT');
        $data['tomodata'] = coinsSetup($cdata, 24, 'TOMO/USDT');
        $data['movrdata'] = coinsSetup($cdata, 25, 'MOVR/USDT');
        $data['wandata'] = coinsSetup($cdata, 26, 'WAN/USDT');
        $data['fiodata'] = coinsSetup($cdata, 27, 'FIO/USDT');
        $data['skldata'] = coinsSetup($cdata, 28, 'SKL/USDT');
        $data['uftdata'] = coinsSetup($cdata, 29, 'UFT/USDT');
        $data['orndata'] = coinsSetup($cdata, 30, 'ORN/USDT');
        $data['umadata'] = coinsSetup($cdata, 31, 'UMA/USDT');
        $data['batdata'] = coinsSetup($cdata, 32, 'BAT/USDT');
        $data['linkdata'] = coinsSetup($cdata, 33, 'LINK/USDT');
        $data['atomdata'] = coinsSetup($cdata, 34, 'ATOM/USDT');
        $data['dydxdata'] = coinsSetup($cdata, 35, 'DYDX/USDT');
        $data['gmxdata'] = coinsSetup($cdata, 36, 'GMX/USDT');
        $data['fttdata'] = coinsSetup($cdata, 37, 'FTT/USDT');
        $data['trbdata'] = coinsSetup($cdata, 38, 'TRB/USDT');
        $data['apedata'] = coinsSetup($cdata, 39, 'APE/USDT');
        $data['mkrdata'] = coinsSetup($cdata, 40, 'MKR/USDT');
        $data['pntdata'] = coinsSetup($cdata, 41, 'PNT/USDT');
        $data['bchdata'] = coinsSetup($cdata, 42, 'BCH/USDT');
        $data['reqdata'] = coinsSetup($cdata, 43, 'REQ/USDT');
        $data['creamdata'] = coinsSetup($cdata, 44, 'CREAM/USDT');
        $data['ksmdata'] = coinsSetup($cdata, 45, 'KSM/USDT');
        $data['dcrdata'] = coinsSetup($cdata, 46, 'DCR/USDT');
        $data['loomdata'] = coinsSetup($cdata, 47, 'LOOM/USDT');
        $data['oxtdata'] = coinsSetup($cdata, 48, 'OXT/USDT');
        $data['xvsdata'] = coinsSetup($cdata, 49, 'XVS/USDT');
        $data['wingdata'] = coinsSetup($cdata, 50, 'WING/USDT');
        $data['woodata'] = coinsSetup($cdata, 51, 'WOO/USDT');


        $data['voxadata'] = plCoinSetup('VOXA/USDT');
        $data['bnixdata'] = plCoinSetup('BNIX/USDT');

        return response()->json([
            'code' => 1,
            'data' => $data
        ]);
    }


    public function getExchangeData(Request $request)
    {
        $co = $request->post('coin');
        if ($co == 'VOXA/USDT' || $co == 'BNIX/USDT') {

            if ($co == 'VOXA/USDT') {
                if (session()->has('VOXAUSDT') && session('VOXAUSDT') == date('Y-m-d H:i:0') && session()->has('vhigh24')) {
                    $close = session('close');
                    $open = session('open');
                    $high24 = session('vhigh24');
                    $low24 = session('vlow24');
                    $closelast = session('vcloselast');
                } else {
                    $close = session('close');
                    $open = session('open');
                    $last24h = date('Y-m-d H:i:00', strtotime('-24hours'));
                    $high24 = VoxaTrade::where([['coins', 'VOXA-USDT'], ['time', '>', $last24h]])->max('high');
                    $low24 = VoxaTrade::where([['coins', 'VOXA-USDT'], ['time', '>', $last24h]])->min('low');
                    $closelast = VoxaTrade::where([['coins', 'VOXA-USDT'], ['time', '>', $last24h]])->orderBy('created_at', 'ASC')->first();
                    session()->put('vhigh24', $high24);
                    session()->put('vlow24', $low24);
                    session()->put('vcloselast', $closelast);
                }
            } elseif ($co == 'BNIX/USDT') {
                if (session()->has('BNIXUSDT') && session('BNIXUSDT') == date('Y-m-d H:i:0') && session()->has('bhigh24')) {
                    $close = session('close');
                    $open = session('open');
                    $high24 = session('bhigh24');
                    $low24 = session('blow24');
                    $closelast = session('bcloselast');
                } else {
                    $close = session('close');
                    $open = session('open');
                    $last24h = date('Y-m-d H:i:00', strtotime('-24hours'));
                    $high24 = BnixTrade::where([['coins', 'BNIX-USDT'], ['time', '>', $last24h]])->max('high');
                    $low24 = BnixTrade::where([['coins', 'BNIX-USDT'], ['time', '>', $last24h]])->min('low');
                    $closelast = BnixTrade::where([['coins', 'BNIX-USDT'], ['time', '>', $last24h]])->orderBy('created_at', 'ASC')->first();
                    session()->put('bhigh24', $high24);
                    session()->put('blow24', $low24);
                    session()->put('bcloselast', $closelast);
                }
            }

            $diff = number_format($close - $closelast->close, 4);

            $pre_change = number_format($diff / $closelast->close * 100, 2);

            if ($pre_change < 0) {
                $ct = "<span class='text-danger'>" . $pre_change . "%</span>";
            } else {
                $ct = "<span class='text-success'>+" . $pre_change . "%</span>";
            }

            if ($diff < 0) {
                $df = "<span class='text-danger'>" . $diff . "</span>";
                $closed = "<span class='text-danger'>" . $close . "</span>";
            } else {
                $df = "<span class='text-success'>+" . $diff . "</span>";
                $closed = "<span class='text-success'>" . $close . "</span>";
            }

            $data = [

                'coin' => str_replace('/', '-', $co),
                'open' => $open,
                'high' => $high24,
                'low' => $low24,
                'close' => $closed,
                'change' => $ct,
                'change_value' => $df,
                'volume' => session('volume'),
                'greenValue' => greenValues($close),
                'main' => number_format($close, 4),
                'redValue' => redValues($close),

            ];
        } else {
            $cn = str_replace('/', '', $co);
            $url = 'https://api.binance.com/api/v3/ticker/24hr?symbol=' . $cn . '';
            //$curl = 'https://api.binance.com/api/v3/klines?symbol=' . $cn . '&interval=1m&limit=1000';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
            $cdata = json_decode($result, true);

            if ($cdata['priceChangePercent'] < 0) {
                $ct = "<span class='text-danger'>" . number_format($cdata['priceChangePercent'], 2) . "%</span>";
            } else {
                $ct = "<span class='text-success'>+" . number_format($cdata['priceChangePercent'], 2) . "%</span>";
            }

            if ($cdata['priceChange'] < 0) {
                $df = "<span class='text-danger'>" . number_format($cdata['priceChange'], 4) . "</span>";
                $close = "<span class='text-danger'>" . number_format($cdata['lastPrice'], 4) . "</span>";
            } else {
                $df = "<span class='text-success'>+" . number_format($cdata['priceChange'], 4) . "</span>";
                $close = "<span class='text-success'>" . number_format($cdata['lastPrice'], 4) . "</span>";
            }

            $data = [

                'coin' => str_replace('/', '-', $co),
                'open' => number_format($cdata['openPrice'], 4),
                'high' => number_format($cdata['highPrice'], 4),
                'low' => number_format($cdata['lowPrice'], 4),
                'close' => $close,
                'change' => $ct,
                'change_value' => $df,
                'volume' => number_format($cdata['volume'], 4),
                'greenValue' => greenValues($cdata['lastPrice']),
                'main' => number_format($cdata['lastPrice'], 4),
                'redValue' => redValues($cdata['lastPrice']),

            ];
        }

        return response()->json([
            'code' => 1,
            'data' => $data
        ]);
    }

    public function getChartLocalCoins(Request $request)
    {
        $coin = $request->post('coin');
        if ($coin == 'VOXAUSDT') {
            if (session()->has('VOXAUSDT') && session('VOXAUSDT') == date('Y-m-d H:i:0')) {

                if ((date('Y-m-d H:i:s') > date('Y-m-d H:i:20') && date('Y-m-d H:i:s') < date('Y-m-d H:i:25')) || (date('Y-m-d H:i:s') > date('Y-m-d H:i:40') && date('Y-m-d H:i:s') < date('Y-m-d H:i:45'))) {
                    $cd = VoxaTrade::count();
                    if ($cd > 1000) {
                        $skip = $cd - 1000;
                        $cdata = VoxaTrade::skip($skip)->take(1000)->get();
                    } else {

                        $cdata = VoxaTrade::limit(1000)->get();
                        $tdata = VoxaTrade::orderBy('time', 'Desc')->first();
                    }
                    session()->put('timestamp', $cdata[999]['timestamp']);
                    session()->put('cdata', $cdata);
                    session()->put('open', $cdata[999]['open']);
                    session()->put('high', $cdata[999]['high']);
                    session()->put('low', $cdata[999]['low']);
                    session()->put('close', $cdata[999]['close']);
                    session()->put('volume', $cdata[999]['volume']);
                } else {
                    $close = session('close');
                    $high = session('high');
                    $low = session('low');
                    $open = session('open');
                    $flow = session('flow');
                    $price = getVoxaPriceSession($close, $flow);

                    if ($high < $price) {
                        $high = $price;
                    }
                    if ($low > $price) {
                        $low = $price;
                    }

                    session()->put('open', $open);
                    session()->put('high', $high);
                    session()->put('low', $low);
                    session()->put('close', $price);
                    $volume = session('volume') + rand(49, 199);
                    session()->put('volume', $volume);
                    $cdata = session('cdata');
                    $cdata[999]['open'] = $open;
                    $cdata[999]['high'] = $high;
                    $cdata[999]['low'] = $low;
                    $cdata[999]['close'] = $close;
                    session()->put('cdata', $cdata);
                }
            } else {
                $var = SetRate::where([['time', date('Y-m-d H:i:0')], ['coin', 'VOXA-USDT']])->first();
                $cd = VoxaTrade::count();
                if ($cd > 1000) {
                    $skip = $cd - 1000;
                    $cdata = VoxaTrade::skip($skip)->take(1000)->get();
                } else {

                    $cdata = VoxaTrade::limit(1000)->get();
                    $tdata = VoxaTrade::orderBy('time', 'Desc')->first();
                }
                session()->put('VOXAUSDT', date('Y-m-d H:i:0'));
                session()->put('cdata', $cdata);
                session()->put('timestamp', $cdata[999]['timestamp']);
                session()->put('open', $cdata[999]['open']);
                session()->put('high', $cdata[999]['high']);
                session()->put('low', $cdata[999]['low']);
                session()->put('close', $cdata[999]['close']);
                session()->put('volume', $cdata[999]['volume']);
                session()->put('flow', $var['flow']);
            }
        } elseif ($coin == 'BNIXUSDT') {
            if (session()->has('BNIXUSDT') && session('BNIXUSDT') == date('Y-m-d H:i:0')) {

                if ((date('Y-m-d H:i:s') > date('Y-m-d H:i:20') && date('Y-m-d H:i:s') < date('Y-m-d H:i:25')) || (date('Y-m-d H:i:s') > date('Y-m-d H:i:40') && date('Y-m-d H:i:s') < date('Y-m-d H:i:45'))) {
                    $cd = BnixTrade::count();
                    if ($cd > 1000) {
                        $skip = $cd - 1000;
                        $cdata = BnixTrade::skip($skip)->take(1000)->get();
                    } else {

                        $cdata = BnixTrade::limit(1000)->get();
                        $tdata = BnixTrade::orderBy('time', 'Desc')->first();
                    }
                    session()->put('timestamp', $cdata[999]['timestamp']);
                    session()->put('cdata', $cdata);
                    session()->put('open', $cdata[999]['open']);
                    session()->put('high', $cdata[999]['high']);
                    session()->put('low', $cdata[999]['low']);
                    session()->put('close', $cdata[999]['close']);
                    session()->put('volume', $cdata[999]['volume']);
                } else {
                    $close = session('close');
                    $high = session('high');
                    $low = session('low');
                    $open = session('open');
                    $flow = session('flow');
                    $price = getBnixPriceSession($close, $flow);

                    if ($high < $price) {
                        $high = $price;
                    }
                    if ($low > $price) {
                        $low = $price;
                    }

                    session()->put('open', $open);
                    session()->put('high', $high);
                    session()->put('low', $low);
                    session()->put('close', $price);
                    $volume = session('volume') + rand(49, 199);
                    session()->put('volume', $volume);
                    $cdata = session('cdata');
                    $cdata[999]['open'] = $open;
                    $cdata[999]['high'] = $high;
                    $cdata[999]['low'] = $low;
                    $cdata[999]['close'] = $close;
                    session()->put('cdata', $cdata);
                }
            } else {
                $var = SetRate::where([['time', date('Y-m-d H:i:0')], ['coin', 'BNIX-USDT']])->first();
                $cd = BnixTrade::count();
                if ($cd > 1000) {
                    $skip = $cd - 1000;
                    $cdata = BnixTrade::skip($skip)->take(1000)->get();
                } else {

                    $cdata = BnixTrade::limit(1000)->get();
                    $tdata = BnixTrade::orderBy('time', 'Desc')->first();
                }
                session()->put('BNIXUSDT', date('Y-m-d H:i:0'));
                session()->put('cdata', $cdata);
                session()->put('timestamp', $cdata[999]['timestamp']);
                session()->put('open', $cdata[999]['open']);
                session()->put('high', $cdata[999]['high']);
                session()->put('low', $cdata[999]['low']);
                session()->put('close', $cdata[999]['close']);
                session()->put('volume', $cdata[999]['volume']);
                session()->put('flow', $var['flow']);
            }
        }

        return response()->json([
            'data' => $cdata
        ]);
    }

    public function getUDFdata(Request $request)
    {

        $coin =  $request->query('symbol');
        $from =  $request->query('from');
        $to =  $request->query('to');
        $countback =  $request->query('countback');

        if ($coin == 'VOXAUSDT' || $coin == 'BNIXUSDT') {
            if ($coin == 'VOXAUSDT') {
                if (session()->has('VOXAUSDT') && session('VOXAUSDT') == date('Y-m-d H:i:0')) {

                    if ((date('Y-m-d H:i:s') > date('Y-m-d H:i:20') && date('Y-m-d H:i:s') < date('Y-m-d H:i:25')) || (date('Y-m-d H:i:s') > date('Y-m-d H:i:40') && date('Y-m-d H:i:s') < date('Y-m-d H:i:45'))) {

                        $cd = VoxaTrade::count();
                        if ($cd > 1000) {
                            $skip = $cd - 1000;
                            $var = VoxaTrade::skip($skip)->take(1000)->get();
                        }
                        session()->put('timestamp', $var[999]['timestamp']);
                        session()->put('cdata', $var);
                        session()->put('open', $var[999]['open']);
                        session()->put('high', $var[999]['high']);
                        session()->put('low', $var[999]['low']);
                        session()->put('close', $var[999]['close']);
                        session()->put('volume', $var[999]['volume_24']);
                    } else {
                        $close_r = session('close');
                        $high_r = session('high');
                        $low_r = session('low');
                        $open_r = session('open');
                        $flow = session('flow');
                        $price = getVoxaPriceSession($close_r, $flow);

                        if ($high_r < $price) {
                            $high_r = $price;
                        }
                        if ($low_r > $price) {
                            $low_r = $price;
                        }

                        session()->put('open', $open_r);
                        session()->put('high', $high_r);
                        session()->put('low', $low_r);
                        session()->put('close', $price);
                        $volume_r = session('volume') + rand(49, 199);
                        session()->put('volume', $volume_r);
                        $var = session('cdata');
                        $var[999]['open'] = $open_r;
                        $var[999]['high'] = $high_r;
                        $var[999]['low'] = $low_r;
                        $var[999]['close'] = $close_r;
                        session()->put('cdata', $var);
                    }
                } else {
                    $cnx = SetRate::where([['time', date('Y-m-d H:i:0')], ['coin', 'VOXA-USDT']])->first();
                    $cd = VoxaTrade::count();
                    if ($cd > 1000) {
                        $skip = $cd - 1000;
                        $var = VoxaTrade::skip($skip)->take(1000)->get();
                    }
                    session()->put('VOXAUSDT', date('Y-m-d H:i:0'));
                    session()->put('cdata', $var);
                    session()->put('timestamp', $var[999]['timestamp']);
                    session()->put('open', $var[999]['open']);
                    session()->put('high', $var[999]['high']);
                    session()->put('low', $var[999]['low']);
                    session()->put('close', $var[999]['close']);
                    session()->put('volume', $var[999]['volume_24']);
                    session()->put('flow', $cnx['flow']);
                }
            } elseif ($coin == 'BNIXUSDT') {

                if (session()->has('BNIXUSDT') && session('BNIXUSDT') == date('Y-m-d H:i:0')) {

                    if ((date('Y-m-d H:i:s') > date('Y-m-d H:i:20') && date('Y-m-d H:i:s') < date('Y-m-d H:i:25')) || (date('Y-m-d H:i:s') > date('Y-m-d H:i:40') && date('Y-m-d H:i:s') < date('Y-m-d H:i:45'))) {
                        $cd = BnixTrade::count();
                        if ($cd > 1000) {
                            $skip = $cd - 1000;
                            $var = BnixTrade::skip($skip)->take(1000)->get();
                        }
                        session()->put('timestamp', $var[999]['timestamp']);
                        session()->put('cdata', $var);
                        session()->put('open', $var[999]['open']);
                        session()->put('high', $var[999]['high']);
                        session()->put('low', $var[999]['low']);
                        session()->put('close', $var[999]['close']);
                        session()->put('volume', $var[999]['volume_24']);
                    } else {
                        $close_r = session('close');
                        $high_r = session('high');
                        $low_r = session('low');
                        $open_r = session('open');
                        $flow = session('flow');
                        $price = getBnixPriceSession($close_r, $flow);

                        if ($high_r < $price) {
                            $high_r = $price;
                        }
                        if ($low_r > $price) {
                            $low_r = $price;
                        }

                        session()->put('open', $open_r);
                        session()->put('high', $high_r);
                        session()->put('low', $low_r);
                        session()->put('close', $price);
                        $volume_r = session('volume') + rand(49, 199);
                        session()->put('volume', $volume_r);
                        $var = session('cdata');
                        $var[999]['open'] = $open_r;
                        $var[999]['high'] = $high_r;
                        $var[999]['low'] = $low_r;
                        $var[999]['close'] = $close_r;
                        session()->put('cdata', $var);
                    }
                } else {
                    $etls = SetRate::where([['time', date('Y-m-d H:i:0')], ['coin', 'BNIX-USDT']])->first();
                    $cd = BnixTrade::count();
                    if ($cd > 1000) {
                        $skip = $cd - 1000;
                        $var = BnixTrade::skip($skip)->take(1000)->get();
                    }
                    session()->put('BNIXUSDT', date('Y-m-d H:i:0'));
                    session()->put('cdata', $var);
                    session()->put('timestamp', $var[999]['timestamp']);
                    session()->put('open', $var[999]['open']);
                    session()->put('high', $var[999]['high']);
                    session()->put('low', $var[999]['low']);
                    session()->put('close', $var[999]['close']);
                    session()->put('volume', $var[999]['volume_24']);
                    session()->put('flow', $etls['flow']);
                }
            }

            for ($i = 0; $i < 1000; $i++) {
                $timestamp[] = substr($var[$i]['timestamp'], 0, 10);
                $open[] = $var[$i]['open'];
                $high[] = $var[$i]['high'];
                $low[] = $var[$i]['low'];
                $close[] = $var[$i]['close'];
                $volume[] = $var[$i]['volume'];
            }
        } else {

            $url = 'https://api.binance.com/api/v3/klines?symbol=' . $coin . '&interval=1m&limit=1000';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $result = curl_exec($ch);
            curl_close($ch);
            $var = json_decode($result, true);

            for ($i = 0; $i < 1000; $i++) {
                $timestamp[] = substr($var[$i][0], 0, 10);
                $open[] = $var[$i][1];
                $high[] = $var[$i][2];
                $low[] = $var[$i][3];
                $close[] = $var[$i][4];
                $volume[] = $var[$i][7];
            }
        }

        return response()->json([
            "t" => $timestamp,
            "o" => $open,
            "h" => $high,
            "l" => $low,
            "c" => $close,
            "v" => $volume,
            "s" => "ok",
        ]);
    }

    // public function getUDFdata(Request $request)
    // {

    //   $coin =  $request->query('symbol');
    //   $from =  $request->query('from');
    //   $to =  $request->query('to');
    //   $countback =  $request->query('countback');

    //   if ($coin == 'VOXAUSDT' || $coin == 'BNIXUSDT') {
    //         if ($coin == 'VOXAUSDT') {
    //             $cd = VoxaTrade::count();
    //             $skip = $cd - 1000;
    //             $var = VoxaTrade::skip($skip)->take(1000)->get();
    //         }elseif($coin == 'BNIXUSDT'){
    //             $cd = BnixTrade::count();
    //             $skip = $cd - 1000;
    //             $var = BnixTrade::skip($skip)->take(1000)->get();
    //         }

    //       for ($i=0; $i < 1000; $i++) {
    //           $timestamp[] = substr($var[$i]['timestamp'], 0, 10);
    //           $open[] = $var[$i]['open'];
    //           $high[] = $var[$i]['high'];
    //           $low[] = $var[$i]['low'];
    //           $close[] = $var[$i]['close'];
    //           $volume[] = $var[$i]['volume'];
    //       }
    //   }
    //   else{

    //         $url = 'https://api.binance.com/api/v3/klines?symbol='.$coin.'&interval=1m&limit=1000';
    //         $ch = curl_init();
    //         curl_setopt($ch, CURLOPT_URL, $url);
    //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //         $result = curl_exec($ch);
    //         curl_close($ch);
    //         $var = json_decode($result, true);

    //          for ($i=0; $i < 1000; $i++) {
    //               $timestamp[] = substr($var[$i][0], 0, 10);
    //               $open[] = $var[$i][1];
    //               $high[] = $var[$i][2];
    //               $low[] = $var[$i][3];
    //               $close[] = $var[$i][4];
    //               $volume[] = $var[$i][7];
    //           }
    //   }

    //   return response()->json([
    //     "t"=> $timestamp,
    //     "o"=> $open,
    //     "h"=> $high,
    //     "l"=> $low,
    //     "c"=> $close,
    //     "v"=> $volume,
    //     "s"=> "ok",
    //   ]);

    // }

    public function configSet()
    {
        return response()->json([
            "supports_search" => true,
            "supports_group_request" => false,
            "supports_marks" => false,
            "supports_timescale_marks" => false,
            "supports_time" => true,
            "exchanges" => [
                ["value" => "", "name" => "All Exchanges", "desc" => ""],
                ["value" => "Binance", "name" => "BINANCE", "desc" => "Binance"]
            ],
            "symbols_types" => [
                ["name" => "Crypto", "value" => "crypto"]
            ],
            "supported_resolutions" => ["1"],

        ]);
    }

    public function getTime()
    {
        $time = time();
        return response()->json(
            $time
        );
    }

    public function getSymbol(Request $request)
    {
        $coin =  $request->query('symbol');
        if ($coin == 'BTCUSDT') {
            $ticker = 'BTCUSDT';
            $name = 'BTCUSDT';
            $description = 'Bitcoin / TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'ETHUSDT') {
            $ticker = 'ETHUSDT';
            $name = 'ETHUSDT';
            $description = 'Ethereum / TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'TRXUSDT') {
            $ticker = 'TRXUSDT';
            $name = 'TRXUSDT';
            $description = 'TRON / TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'SOLUSDT') {
            $ticker = 'SOLUSDT';
            $name = 'SOLUSDT';
            $description = 'SOL / TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'APTUSDT') {
            $ticker = 'APTUSDT';
            $name = 'APTUSDT';
            $description = 'APT/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'STXUSDT') {
            $ticker = 'STXUSDT';
            $name = 'STXUSDT';
            $description = 'Stacks / TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'BNBUSDT') {
            $ticker = 'BNBUSDT';
            $name = 'BNBUSDT';
            $description = 'Binance Coin / TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'IDEXUSDT') {
            $ticker = 'IDEXUSDT';
            $name = 'IDEXUSDT';
            $description = 'IDEX / TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'GALUSDT') {
            $ticker = 'GALUSDT';
            $name = 'GALUSDT';
            $description = 'GAL / TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'LTCUSDT') {
            $ticker = 'LTCUSDT';
            $name = 'LTCUSDT';
            $description = 'Litecoin / TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'MASKUSDT') {
            $ticker = 'MASKUSDT';
            $name = 'MASKUSDT';
            $description = 'MASK / TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'WRXUSDT') {
            $ticker = 'WRXUSDT';
            $name = 'WRXUSDT';
            $description = 'WRX / TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'LTOUSDT') {
            $ticker = 'LTOUSDT';
            $name = 'LTOUSDT';
            $description = 'LTO / TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'BNIXUSDT') {
            $ticker = 'BNIXUSDT';
            $name = 'BNIXUSDT';
            $description = 'BnixCoin / TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'VOXAUSDT') {
            $ticker = 'VOXAUSDT';
            $name = 'VOXAUSDT';
            $description = 'VoxaCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'OMGUSDT') {
            $ticker = 'OMGUSDT';
            $name = 'OMGUSDT';
            $description = 'OmgCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'COTIUSDT') {
            $ticker = 'COTIUSDT';
            $name = 'COTIUSDT';
            $description = 'CotiCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'ONGUSDT') {
            $ticker = 'ONGUSDT';
            $name = 'ONGUSDT';
            $description = 'OngCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'ONEUSDT') {
            $ticker = 'ONEUSDT';
            $name = 'ONEUSDT';
            $description = 'OneCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'ICXUSDT') {
            $ticker = 'ICXUSDT';
            $name = 'ICXUSDT';
            $description = 'IcxCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'GLMRUSDT') {
            $ticker = 'GLMRUSDT';
            $name = 'GLMRUSDT';
            $description = 'GlmrCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'FLUXUSDT') {
            $ticker = 'FLUXUSDT';
            $name = 'FLUXUSDT';
            $description = 'FluxCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'XNOUSDT') {
            $ticker = 'XNOUSDT';
            $name = 'XNOUSDT';
            $description = 'XnoCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'LUNCUSDT') {
            $ticker = 'LUNCUSDT';
            $name = 'LUNCUSDT';
            $description = 'LuncCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'WLDUSDT') {
            $ticker = 'WLDUSDT';
            $name = 'WLDUSDT';
            $description = 'WldCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'ZRXUSDT') {
            $ticker = 'ZRXUSDT';
            $name = 'ZRXUSDT';
            $description = 'ZrxCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'TOMOUSDT') {
            $ticker = 'TOMOUSDT';
            $name = 'TOMOUSDT';
            $description = 'TomoCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'MOVRUSDT') {
            $ticker = 'MOVRUSDT';
            $name = 'MOVRUSDT';
            $description = 'MovrCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'WANUSDT') {
            $ticker = 'WANUSDT';
            $name = 'WANUSDT';
            $description = 'WanCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'FIOUSDT') {
            $ticker = 'FIOUSDT';
            $name = 'FIOUSDT';
            $description = 'FioCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'SKLUSDT') {
            $ticker = 'SKLUSDT';
            $name = 'SKLUSDT';
            $description = 'SklCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'UFTUSDT') {
            $ticker = 'UFTUSDT';
            $name = 'UFTUSDT';
            $description = 'UftCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'ORNUSDT') {
            $ticker = 'ORNUSDT';
            $name = 'ORNUSDT';
            $description = 'OrnCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'UMAUSDT') {
            $ticker = 'UMAUSDT';
            $name = 'UMAUSDT';
            $description = 'UmaCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'BATUSDT') {
            $ticker = 'BATUSDT';
            $name = 'BATUSDT';
            $description = 'BatCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'LINKUSDT') {
            $ticker = 'LINKUSDT';
            $name = 'LINKUSDT';
            $description = 'LinkCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'ATOMUSDT') {
            $ticker = 'ATOMUSDT';
            $name = 'ATOMUSDT';
            $description = 'AtomCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'DYDXUSDT') {
            $ticker = 'DYDXUSDT';
            $name = 'DYDXUSDT';
            $description = 'DydxCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'GMXUSDT') {
            $ticker = 'GMXUSDT';
            $name = 'GMXUSDT';
            $description = 'GmxCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'FTTUSDT') {
            $ticker = 'FTTUSDT';
            $name = 'FTTUSDT';
            $description = 'FttCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'TRBUSDT') {
            $ticker = 'TRBUSDT';
            $name = 'TRBUSDT';
            $description = 'TrbCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'APEUSDT') {
            $ticker = 'APEUSDT';
            $name = 'APEUSDT';
            $description = 'ApeCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'MKRUSDT') {
            $ticker = 'MKRUSDT';
            $name = 'MKRUSDT';
            $description = 'MkrCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'PNTUSDT') {
            $ticker = 'PNTUSDT';
            $name = 'PNTUSDT';
            $description = 'PntCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'BCHUSDT') {
            $ticker = 'BCHUSDT';
            $name = 'BCHUSDT';
            $description = 'BchCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'REQUSDT') {
            $ticker = 'REQUSDT';
            $name = 'REQUSDT';
            $description = 'ReqCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'CREAMUSDT') {
            $ticker = 'CREAMUSDT';
            $name = 'CREAMUSDT';
            $description = 'CreamCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'KSMUSDT') {
            $ticker = 'KSMUSDT';
            $name = 'KSMUSDT';
            $description = 'KsmCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'DCRUSDT') {
            $ticker = 'DCRUSDT';
            $name = 'DCRUSDT';
            $description = 'DcrCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'LOOMUSDT') {
            $ticker = 'LOOMUSDT';
            $name = 'LOOMUSDT';
            $description = 'LoomCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'OXTUSDT') {
            $ticker = 'OXTUSDT';
            $name = 'OXTUSDT';
            $description = 'OxtCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'XVSUSDT') {
            $ticker = 'XVSUSDT';
            $name = 'XVSUSDT';
            $description = 'XvsCoin/ TetherUS';
            $exchange = 'BINANCE';
        } elseif ($coin == 'WOOUSDT') {
            $ticker = 'WOOUSDT';
            $name = 'WOOUSDT';
            $description = 'WooCoin/ TetherUS';
            $exchange = 'BINANCE';
        }


        return response()->json([
            "ticker" => $ticker,
            "name" => $name,
            "description" => $description,
            "type" => 'symbolItem.type',
            "session" => '24x7',
            "timezone" => 'Etc/UTC',
            "exchange" => $exchange,
            "minmov" => 1,
            "pricescale" => 100,
            "has_intraday" => true,
            "visible_plots_set" => 'ohlcv',
            "has_weekly_and_monthly" => false,
            "supported_resolutions" => ['1', '5', '30', '60', '1D', '1W'],
            "volume_precision" => 2,
            "data_status" => 'streaming',


        ]);
    }

    public function getSymbolInfo(Request $request)
    {
        return response()->json([
            "symbol" => ['AAPL', 'MSFT', 'SPX', 'BTCUSD'],
            "description" => ["Apple Inc", "Microsoft corp", "S&P 500 index", "Binance"],
            "exchange-listed" => "Binance",
            "exchange-traded" => "Binance",
            "minmovement" => 1,
            "minmovement2" => 0,
            "pricescale" => [1, 1, 100],
            "has-dwm" => true,
            "has-intraday" => true,
            "type" => ["stock", "stock", "index", "crypto"],
            "ticker" => ["AAPL~0", "MSFT~0", "SPX500", "bnb"],
            "timezone" => "America/New_York",
            "session-regular" => "0900-1600",
        ]);
    }

    public function searchSymbol()
    {
        return response()->json([
            [
                "symbol" => "BTCUSDT",
                "full_name" => "BTCUSDT",
                "description" => "Bitcoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "ETHUSDT",
                "full_name" => "ETHUSDT",
                "description" => "Ethereum / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "TRXUSDT",
                "full_name" => "TRXUSDT",
                "description" => "TRON / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "SOLUSDT",
                "full_name" => "SOLUSDT",
                "description" => "SOL / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "APTUSDT",
                "full_name" => "APTUSDT",
                "description" => "APT / Tether",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "STXUSDT",
                "full_name" => "STXUSDT",
                "description" => "Stacks / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "BNBUSDT",
                "full_name" => "BNBUSDT",
                "description" => "Binance Coin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "IDEXUSDT",
                "full_name" => "IDEXUSDT",
                "description" => "IDEX / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "GALUSDT",
                "full_name" => "GALUSDT",
                "description" => "GAL / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "LTCUSDT",
                "full_name" => "LTCUSDT",
                "description" => "Litecoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "MASKUSDT",
                "full_name" => "MASKUSDT",
                "description" => "MASK / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "WRXUSDT",
                "full_name" => "WRXUSDT",
                "description" => "WRX / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "LTOUSDT",
                "full_name" => "LTOUSDT",
                "description" => "LTO / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "BNIXUSDT",
                "full_name" => "BNIXUSDT",
                "description" => "BnixCoin/ TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "VOXAUSDT",
                "full_name" => "VOXAUSDT",
                "description" => "VoxaCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],
            [
                "symbol" => "OMGUSDT",
                "full_name" => "OMGUSDT",
                "description" => "OmgCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],
            [
                "symbol" => "COTIUSDT",
                "full_name" => "COTIUSDT",
                "description" => "CotiCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "ONGUSDT",
                "full_name" => "ONGUSDT",
                "description" => "OngCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "ONEUSDT",
                "full_name" => "ONEUSDT",
                "description" => "OneCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "ICXUSDT",
                "full_name" => "ICXUSDT",
                "description" => "IcxCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "GLMRUSDT",
                "full_name" => "GLMRUSDT",
                "description" => "GlmrCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "FLUXUSDT",
                "full_name" => "FlUXUSDT",
                "description" => "FluxCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "XNOUSDT",
                "full_name" => "XNOUSDT",
                "description" => "XnoCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "LUNCUSDT",
                "full_name" => "LUNCUSDT",
                "description" => "LuncCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "WLDUSDT",
                "full_name" => "WLDUSDT",
                "description" => "WldCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "ZRXUSDT",
                "full_name" => "ZRXUSDT",
                "description" => "ZrxCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "TOMOUSDT",
                "full_name" => "TOMOUSDT",
                "description" => "TomoCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "MOVRUSDT",
                "full_name" => "MOVRUSDT",
                "description" => "MovrCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "WANUSDT",
                "full_name" => "WANUSDT",
                "description" => "WanCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "FIOUSDT",
                "full_name" => "FIOUSDT",
                "description" => "FioCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "FIOUSDT",
                "full_name" => "FIOUSDT",
                "description" => "FioCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "SKLUSDT",
                "full_name" => "SKLUSDT",
                "description" => "SklCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "UFTUSDT",
                "full_name" => "UFTUSDT",
                "description" => "UftCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "ORNUSDT",
                "full_name" => "ORNUSDT",
                "description" => "OrnCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "UMAUSDT",
                "full_name" => "UMAUSDT",
                "description" => "UmaCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "BATUSDT",
                "full_name" => "BATUSDT",
                "description" => "BatCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "LINKUSDT",
                "full_name" => "LINKUSDT",
                "description" => "LinkCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "ATOMUSDT",
                "full_name" => "ATOMUSDT",
                "description" => "AtomCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "DYDXUSDT",
                "full_name" => "DYDXUSDT",
                "description" => "DydxCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "GMXUSDT",
                "full_name" => "GMXUSDT",
                "description" => "GmxCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "FTTUSDT",
                "full_name" => "FTTUSDT",
                "description" => "FttCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "TRBUSDT",
                "full_name" => "TRBUSDT",
                "description" => "TrbCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "APEUSDT",
                "full_name" => "APEUSDT",
                "description" => "ApeCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "MKRUSDT",
                "full_name" => "MKRUSDT",
                "description" => "MkrCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "PNTUSDT",
                "full_name" => "PNTUSDT",
                "description" => "PntCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "BCHUSDT",
                "full_name" => "BCHUSDT",
                "description" => "BchCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "REQUSDT",
                "full_name" => "REQUSDT",
                "description" => "ReqCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "CREAMUSDT",
                "full_name" => "CREAMUSDT",
                "description" => "CreamCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "KSMUSDT",
                "full_name" => "KSMUSDT",
                "description" => "KsmCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "DCRUSDT",
                "full_name" => "DCRUSDT",
                "description" => "DcrCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "LOOMUSDT",
                "full_name" => "LOOMUSDT",
                "description" => "LoomCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "OXTUSDT",
                "full_name" => "OXTUSDT",
                "description" => "OxtCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "XVSUSDT",
                "full_name" => "XVSUSDT",
                "description" => "XvsCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ],

            [
                "symbol" => "WOOUSDT",
                "full_name" => "WOOUSDT",
                "description" => "WooCoin / TetherUS",
                "exchange" => "BINANCE",
                "type" => "crypto",
                "logo_urls" => ["https://s3-symbol-logo.tradingview.com/apple.svg"],
                "exchange_logo" => "https://s3-symbol-logo.tradingview.com/country/US.svg"
            ]


        ]);
    }
}
